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
     * @param  int  $page
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function paginatedRecords(int $page = 15)
    {
        return $this->pokemon->paginate($page);
    }

    /**
     * Get list of paginated records from storage
     * 
     * @param  int  $page
     * @return \App\Models\Pokemon
     */
    public function findRecord(int $id)
    {
        return $this->pokemon->find($id);
    }

}
