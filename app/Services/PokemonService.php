<?php 

namespace App\Services;

use App\Models\Pokemon;

class PokemonService
{
    /**
     * Class properties
     * 
     * @property 
     */
    private $pokemon;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() 
    {
        $this->pokemon = new Pokemon;
    }

    /**
     * Get list of paginated records from storage
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function paginatedRecords()
    {
        return Pokemon::paginate();
    }

}
