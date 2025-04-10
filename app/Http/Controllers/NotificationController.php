<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NotificationController extends Controller
{
    //
    //   'user_id', 'titulo', 'mensagem', 'lida', 'lida_em',

    // public function index() {
    //     return response()->json(Tag::all());
    // }

    public function show(int $id) { // Pegar as notificações do usuario
        $tag = Notification::where('user_id', $id)->get();
        return response()->json($tag);
    }


    public function store(Request $request) {
        try {
            $validateRequest = $request->validate([
                'user_id' => 'required|integer|exists:users,id',
                'titulo' => 'required|string|min:5',
                'mensagem' => 'required|string|min:5',
                'lida' => 'required|boolean',
                'lida_em' => 'nullable|datetime'
            ]);
            Notification::create($validateRequest);
            return response()->json('Notificação criada com sucesso', 200);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao inserir notificação'], 500);
        }
    }

    // public function update(Request $request, int $id) {
    //     try {
    //         $tag = Tag::findOrFail($id);
    //         $validateRequest = $request->validate([
    //             'name' => 'required|string|min:5'
    //         ]);
    //         $tag->update($validateRequest);
    //         return response()->json(['message' => 'Comentário atualizada com sucesso'], 200);
    //     } catch (ModelNotFoundException $e) {
    //         return response()->json(['error' => 'Comentário não encontrada'], 404);
    //     } catch (ValidationException $e) {
    //         return response()->json(['errors' => $e->errors()], 422);
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => 'Erro ao atualizar comentário'], 500);
    //     }
    // }

    public function destroy(int $id) {
        try {
            $notification = Notification::findOrFail($id);
            $notification->delete();
            return response()->json(['message' => 'Notificação deletada com sucesso'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Notificação não encontrada ou já excluida'], 404);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao deletar notificação'], 500);
        }
    }
}
