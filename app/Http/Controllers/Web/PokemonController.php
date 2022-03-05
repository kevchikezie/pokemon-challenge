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

        dd($pokemons);
    }

}
