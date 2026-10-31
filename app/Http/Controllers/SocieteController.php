<?php

namespace App\Http\Controllers;

use App\Models\Societe;
use App\Http\Requests\StoreSocieteRequest;
use App\Http\Requests\UpdateSocieteRequest;

class SocieteController extends Controller
{
    /**
     * Afficher la liste des sociétés.
     */
    public function index()
    {
        $societes = Societe::latest()->get();

        return view('societes.index', compact('societes'));
    }

    /**
     * Afficher le formulaire de création.
     */
    public function create()
    {
        return view('societes.create');
    }

    /**
     * Enregistrer une nouvelle société.
     */
    public function store(StoreSocieteRequest $request)
    {
        Societe::create($request->validated());

        return redirect()
            ->route('societes.index')
            ->with('success', 'La société a été créée avec succès.');
    }

    /**
     * Afficher les détails d'une société.
     */
    public function show(Societe $societe)
    {
        return view('societes.show', compact('societe'));
    }

    /**
     * Afficher le formulaire de modification.
     */
    public function edit(Societe $societe)
    {
        return view('societes.edit', compact('societe'));
    }

    /**
     * Mettre à jour une société.
     */
    public function update(UpdateSocieteRequest $request, Societe $societe)
    {
        $societe->update($request->validated());

        return redirect()
            ->route('societes.index')
            ->with('success', 'La société a été mise à jour avec succès.');
    }

    /**
     * Supprimer une société.
     */
    public function destroy(Societe $societe)
    {
        $societe->delete();

        return redirect()
            ->route('societes.index')
            ->with('success', 'La société a été supprimée avec succès.');
    }
}
