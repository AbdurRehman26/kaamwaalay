<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\Country;

class CountryRepository extends AbstractRepository implements RepositoryContract
{
/**
     *
     * These will hold the instance of Country Class.
     *
     * @var object
     * @access public
     *
     **/
    public $model;

    /**
     *
     * This is the prefix of the cache key to which the
     * App\Data\Repositories data will be stored
     * App\Data\Repositories Auto incremented Id will be append to it
     *
     * Example: Country-1
     *
     * @var string
     * @access protected
     *
     **/

    protected $_cacheKey = 'Country';
    protected $_cacheTotalKey = 'total-Country';

    public function __construct(Country $model)
    {
        $this->model = $model;
        $this->builder = $model;

    }
}
