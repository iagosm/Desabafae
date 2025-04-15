<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CompanyRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CompanyRequestController extends Controller
{
    public function index() {
        return response()->json(CompanyRequest::all());
    }

    public function store(Request $request) {
        try {
            $validRequest = $request->validate([
                'user_id' => 'required|integer|exists:users,id',
                'empresa_nome' => 'required|min:5',
                'cnpj' => 'nullable|string|min:14|max:18',
                'motivo' => 'required|string',
                'status' => 'required|string|in:pendente,aprovado,rejeitado'
            ]);
            CompanyRequest::create($validRequest);
            return response()->json('Requisição criada com sucesso', 200);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao inserir tag'], 500);
        }
    }

    public function update(Request $request, int $id) {
        try {
            $company = CompanyRequest::findOrFail($id);
            $validRequest = $request->validate([
                'user_id' => 'required|integer|exists:users,id',
                'empresa_nome' => 'required|min:5',
                'cnpj' => 'nullable|string|min:14|max:18',
                'motivo' => 'required|string',
                'status' => 'required|string|in:pendente,aprovado,rejeitado',
            ]);
            $company->update($validRequest);
            return response()->json('Requisição atualizada com sucesso', 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Requisição não encontrada'], 404);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao atualizar requisição'], 500);
        }
    }

    public function destroy(int $id) {
        try{
            $company = CompanyRequest::findOrFail($id);
            $company->delete();
            return response()->json(['message' => 'Requisição deletada com sucesso'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Requisição não encontrada ou já excluida'], 404);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao deletar requisição'], 500);
        }
    }
}
