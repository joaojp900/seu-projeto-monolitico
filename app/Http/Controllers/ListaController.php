<?php

namespace App\Http\Controllers;

use App\Models\Lista;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
     return Lista::withTrashed()->get();

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
         $validated = $request->validate([
        'titulo' => 'required|string|max:255',
        'descricao' => 'nullable|string',
        'status' => 'required|in:pendente,concluida',
    ]);

        Lista::create($validated);

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lista $lista)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lista $lista)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $lista = Lista::findOrFail($id);
        $lista->update($request->only('titulo','descricao', 'status'));

         return response()->json(['message' => 'Tarefa atualizada com sucesso']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $lista = Lista::findOrFail($id);
        $lista->delete();

        return response()->json(['message' => 'Tarefa Excluida com sucesso']);
    }

    public function restaurar($id){

       $lista = Lista::withTrashed()->findOrFail($id);

    if ($lista->trashed()) {
        $lista->restore();
        return response()->json(['mensagem' => 'lista restaurada com sucesso.']);
    }

    return response()->json(['mensagem' => 'lista não está excluída.']);
    }
}
