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
     * @param  int  $id
     * @return \App\Models\Pokemon
     */
    public function findRecord(int $id)
    {
        return $this->pokemon->find($id);
    }

    /**
     * Get list of paginated records from storage
     * 
     * @param  int  $id
     * @param  int  $data
     * @return \App\Models\Pokemon
     */
    public function updateRecord(int $id, array $data)
    {
        $pokemon = $this->pokemon->find($id);
        
        $pokemon->update([
            'identifier' => $data['pokemon_name'],
            'height' => $data['height'],
            'weight' => $data['weight'],
            'base_experience' => $data['base_experience'],
        ]);

        $pokemon->species->generation->update([
            'region_id' => $data['region'],
        ]);

        $pokemon->species->update([
            'generation_id' => $data['generation'],
            'habitat_id' => $data['habitat'],
            'color_id' => $data['color'],
            'shape_id' => $data['shape'],
        ]);

        return $pokemon;
    }

}
