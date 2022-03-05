<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Services\PokemonService;
use App\Http\Controllers\Controller;

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
     * List all pokemon
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
     * List all pokemon
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

}
