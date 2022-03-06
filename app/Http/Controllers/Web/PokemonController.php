<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Services\PokemonService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePokemonRequest;

class PokemonController extends Controller
{
    /**
     * Class properties
     * 
     * @property 
     */
    private $pokemonService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PokemonService $pokemonService) 
    {
        $this->pokemonService = $pokemonService;
    }

    /**
     * List all pokemon
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pokemons = $this->pokemonService->paginatedRecords();

        return view('all_pokemons', compact('pokemons'));
    }

    /**
     * * Dsiplay details of a pokemon
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $pokemon = $this->pokemonService->findRecord($id);

        return view('show_pokemon', compact('pokemon'));
    }

    /**
     * Dsiplay the edit page with the details of a pokemon
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $pokemon = $this->pokemonService->findRecord($id);
        
        return view('edit_pokemon', compact('pokemon'));
    }

    /**
     * Update the details of a pokemon
     * 
     * @param  \App\Http\Requests\UpdatePokemonRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePokemonRequest $request, $id)
    {
        DB::beginTransaction();
        $updated = $this->pokemonService->updateRecord($id, $request->all());
        DB::commit();

        if (! $updated) return redirect()->back()->with('error', 'Failed to updated Pokemon!');

        return redirect()->back()->with('success', 'Pokemon updated successfully!');
    }

}
