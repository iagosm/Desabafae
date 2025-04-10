<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TagController extends Controller
{
    public function index() {
        return response()->json(Tag::all());
    }

    public function show(int $id) {
        $tag = Tag::find($id);
        return response()->json($tag);
    }


    public function store(Request $request) {
        try {
            $validateRequest = $request->validate([
                'name' => 'required|string|min:5'
            ]);
            Tag::create($validateRequest);
            return response()->json('Tag criada com sucesso', 200);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao inserir tag'], 500);
        }
    }

    public function update(Request $request, int $id) {
        try {
            $tag = Tag::findOrFail($id);
            $validateRequest = $request->validate([
                'name' => 'required|string|min:5'
            ]);
            $tag->update($validateRequest);
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
            $tag = Tag::findOrFail($id);
            $tag->delete();
            return response()->json(['message' => 'Tag deletada com sucesso'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Tag não encontrada ou já excluida'], 404);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao deletar tag'], 500);
        }
    }
}
