<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Vote;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class VoteController extends Controller
{
    public function store(Request $request) {
        try {
            $validateRequest = $request->validate([
                'complaint_id' => 'required|integer',
                'user_id' => 'nullable|integer|exists:users,id',
                'tipo' => 'required|string|in:like,dislike',
            ]);
            if($validateRequest){
                $id = $request->input('user_id');
                $complaint = $request->input('complaint_id');
                $existVote = Vote::where('user_id', $id)->where('complaint_id', $complaint)->first();
                if($existVote === NULL) { 
                    Vote::create($validateRequest);
                    return response()->json('Voto inserido com sucesso', 200);
                } else {
                    return response()->json('Voto já realizado', 200);
                }
            }
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao inserir o voto'], 500);
        }
    }

    public function update(Request $request, int $id) {
        try {
            $vote = Vote::findOrFail($id);
            $validateRequest = $request->validate([
                'complaint_id' => 'required|integer',
                'user_id' => 'nullable|integer|exists:users,id',
                'tipo' => 'required|string|in:like,dislike',
            ]);
            $tipoEnviado = $request->input('tipo');
            $existVote = Vote::where('user_id', 1)->where('complaint_id', 31)->first();
            if($existVote && $existVote->tipo !== $tipoEnviado) {
                $vote->update($validateRequest);
                return response()->json(['message' => 'Comentário atualizada com sucesso'], 200);
            }
            return response()->json(['message' => 'O voto já possui esse valor'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Comentário não encontrada'], 404);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao atualizar comentário'], 500);
        }
    }

    public function destroy(int $id) {
        try {
            $vote = Vote::findOrFail($id);
            $vote->delete();
            return response()->json(['message' => 'Voto deletado com sucesso'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Voto não encontrada ou já excluida'], 404);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao deletar Voto'], 500);
        }
    }
}
