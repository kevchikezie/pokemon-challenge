<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\PokemonService;
use App\Http\Controllers\Controller;
use App\Http\Resources\PokemonResource;
use App\Http\Resources\PokemonCollection;


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

        return new PokemonCollection($pokemons);
    }

    /**
     * Dsiplay details of a pokemon
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $pokemon = $this->pokemonService->findRecord($id);

        if (! $pokemon) {
            return response()->json([
                'status' => 'error',
                'message' => 'Pokemons not found!',
            ], 404);
        }

        return new PokemonResource($pokemon);
    }

}
