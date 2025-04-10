<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ComplaintController extends Controller
{

//     index() → listar reclamações (com filtros, ordenação)

// store() → criar nova reclamação

// show($id) → ver detalhes de uma reclamação

// update($id) → editar reclamação (somente dono)

// destroy($id) → deletar (ou arquivar) reclamação

// myComplaints() → listar reclamações do usuário logado

    public function index() {
        return response()->json(Complaint::all(), 200);
    }
    public function store(Request $request) {
        try {
            $validateRequest = $request->validate([
                'nome_empresa' => 'required|string|min:5',
                'titulo' => 'required|string|min:5',
                'descricao' => 'required|string|min:5',
                'status' => 'required|string|in:pendente,em_analise,resolvido',
                'anonimo' => 'required|boolean',
                'user_id' => 'nullable|integer|exists:users,id',
            ]);
            Complaint::create($validateRequest);
            return response()->json('Reclamação criada com sucesso', 200);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao criar reclamação'], 500);
        }
    }

    public function show(int $id) {
        $complaint = Complaint::find($id);
        return response()->json($complaint);
    }

    public function update(Request $request, int $id) {
        try {
            $complaint = Complaint::findOrFail($id);
            $validateRequest = $request->validate([
                'nome_empresa' => 'required|string|min:5',
                'titulo' => 'required|string|min:5',
                'descricao' => 'required|string|min:5',
                'status' => 'required|string|in:pendente,em_analise,resolvido',
                'anonimo' => 'required|boolean',
                'user_id' => 'nullable|integer|exists:users,id',
            ]);
            $complaint->update($validateRequest);
            return response()->json(['message' => 'Reclamação atualizada com sucesso'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Reclamação não encontrada'], 404);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao atualizar reclamação'], 500);
        }
    }

    public function destroy(int $id) {
        try {
            $complaint = Complaint::findOrFail($id);
            $complaint->delete();
            return response()->json(['message' => 'Reclamação deletada com sucesso'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Reclamação não encontrada ou já excluida'], 404);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao deletar reclamação'], 500);
        }
    }
}
