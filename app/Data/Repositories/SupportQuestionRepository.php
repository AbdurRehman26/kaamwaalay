<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\SupportQuestion;

class SupportQuestionRepository extends AbstractRepository implements RepositoryContract
{
/**
     *
     * These will hold the instance of SupportQuestion Class.
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
     * Example: SupportQuestion-1
     *
     * @var string
     * @access protected
     *
     **/

    protected $_cacheKey = 'SupportQuestion';
    protected $_cacheTotalKey = 'total-SupportQuestion';

    public function __construct(SupportQuestion $model)
    {
        $this->model = $model;
        $this->builder = $model;

    }

    public function findByAll($pagination = false, $perPage = 10, array $data = [] ) {
        $this->builder = $this->model
                            ->where('role_id', '=' , $data['role_id'])
                            ->orderBy('question', 'ASC')
                            ;   
        return  parent::findByAll($pagination, $perPage);
    
    }
}
