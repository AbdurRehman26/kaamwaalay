<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\Campaign;
use Cache;
class CampaignRepository extends AbstractRepository implements RepositoryContract
{
/**
     *
     * These will hold the instance of Campaign Class.
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
     * Example: Campaign-1
     *
     * @var string
     * @access protected
     *
     **/

    protected $_cacheKey = 'Campaign';
    protected $_cacheTotalKey = 'total-Campaign';

    public function __construct(Campaign $model)
    {
        $this->model = $model;
        $this->builder = $model;
        $this->serviceProviderProfileRepo = app('ServiceProviderProfileRepository');

    }

    public function findById($id, $refresh = false, $details = false, $encode = true) {
        $data = Cache::get($this->_cacheKey.$id);

        if ($data == NULL || $refresh == true) {
            $query = $this->model->with('plan')->find($id);
            if ($query != NULL) {

                $data = new \stdClass;
                foreach ($query->getAttributes() as $column => $value) {
                    $data->{$column} = $query->{$column};
                }

                $data->plan = $query->plan;
                Cache::forever($this->_cacheKey.$id, $data);
            } else {
                return null;
            }
        }
        return $data;
    }

    public function findByAll($pagination = false, $perPage = 10, array $data = [] ) {
        $this->builder = $this->builder
                            ->where('user_id', '=' , $data['user_id'])
                            ->orderBy('id', 'ASC')
                            ;   
        return  parent::findByAll($pagination, $perPage);
    
    }

    public function create(array $input = []) {
        
        $return = parent::create($input);
        if($return){
            $this->serviceProviderProfileRepo->update(['id'=>$input['user_id'],'is_featured'=>1]);
        }

        return $return;
        
    }

    public function updateCampaign($input)
    {
        $model = $this->model
                ->where('user_id', '=', $input['service_provider_user_id'])
                ->where('is_completed', '=', 0)
                ->first()
                ;

        if($model){
            if($input['type'] == 'view'){
                $model->views++;
            }else{
                $model->clicks++;
            }

            $getPlanViews = $this->findById($model->id);
            if($getPlanViews && !empty($getPlanViews->plan->quantity) && $model->views >= $getPlanViews->plan->quantity ){
                $model->is_completed = 1;
                $this->serviceProviderProfileRepo->update(['id'=>$input['service_provider_user_id'],'is_featured'=>0]);
            }

            if($model->save()){
                Cache::forget($this->_cacheKey.$model->id);
                return true;
            }

        }

        return false;
    }
}
