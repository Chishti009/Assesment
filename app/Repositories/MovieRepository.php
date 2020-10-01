<?php

namespace App\Repositories;

use App\Models\Movie;
use App\Repositories\BaseRepository;

/**
 * Class MovieRepository
 * @package App\Repositories
 * @version September 23, 2020, 3:05 pm UTC
*/

class MovieRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'release_date',
        'rating',
        'ticket_price',
        'country',
        'genre',
        'photo'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Movie::class;
    }

    public function getMovieDetail($slug=''){
        $movie = Movie::where(['slug'=>$slug])->first();
        if(empty($movie)){
            return false;
        }else{
            return $movie;
        }
    }
}
