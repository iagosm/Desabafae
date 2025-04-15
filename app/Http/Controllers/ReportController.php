<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ReportController extends Controller
{
    public function index() {
        return response()->json(Report::all());
    }

    public function show(int $id) {
        $tag = Report::find($id);
        return response()->json($tag);
    }

    public function store(Request $request) {
        try {
            $validRequest = $request->validate([
                'user_id' => 'required|integer|exists:users,id',
                'complaint_id' => 'nullable|integer|exists:complaints,id',
                'comment_id' => 'nullable|integer|exists:comments,id',
                'motivo' => 'required|string|min:5',
                'descricao' => 'required|string|min:10',
                'status' => 'required|string|in:pendente,aprovado,rejeitado'
            ]);
            Report::create($validRequest);
            return response()->json('Reporte criada com sucesso', 200);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao inserir tag'], 500);
        }
    }

    public function update(Request $request, int $id) {
        try {
            $report = Report::findOrFail($id);
            $validRequest = $request->validate([
                'user_id' => 'required|integer|exists:users,id',
                'complaint_id' => 'nullable|integer|exists:complaints,id',
                'comment_id' => 'nullable|integer|exists:comments,id',
                'motivo' => 'required|string|min:5',
                'descricao' => 'required|string|min:10',
                'status' => 'required|string|in:pendente,aprovado,rejeitado'
            ]);
            $report->update($validRequest);
            return response()->json('Reporte atualizado com sucesso', 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Reporte não encontrado'], 404);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao atualizar reporte'], 500);
        }
    }

    public function destroy(int $id) {
        try{
            $report = Report::findOrFail($id);
            $report->delete();
            return response()->json(['message' => 'Reporte deletado com sucesso'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Reporte não encontrada ou já excluida'], 404);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao deletar reporte'], 500);
        }
    }
}
