<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CommentController extends Controller
{
    public function store(Request $request) {
        try {
            $validateRequest = $request->validate([
                'complaint_id' => 'required|integer',
                'user_id' => 'nullable|integer|exists:users,id',
                'anonimo' => 'required|boolean',
                'comentario' => 'required|string|min:10',
            ]);
            Comment::create($validateRequest);
            return response()->json('Comentário criada com sucesso', 200);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao criar reclamação'], 500);
        }
    }

    public function getAllComentsByComplaint(int $id) {
        $comment = Comment::where('complaint_id', $id)->get();
        return response()->json($comment);
    }

    public function getComment(int $id) {
        $comment = Comment::find($id);
        return response()->json($comment);
    }

    public function update(Request $request, int $id) {
        try {
            $comment = Comment::findOrFail($id);
            $validateRequest = $request->validate([
                'comentario' => 'required|string|min:5'
            ]);
            $comment->update($validateRequest);
            return response()->json(['message' => 'Comentário atualizada com sucesso'], 200);
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
            $comment = Comment::findOrFail($id);
            $comment->delete();
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
