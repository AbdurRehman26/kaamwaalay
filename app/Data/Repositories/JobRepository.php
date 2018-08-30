<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\Job;
use Carbon\Carbon;

class JobRepository extends AbstractRepository implements RepositoryContract
{
/**
     *
     * These will hold the instance of Job Class.
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
     * Example: Job-1
     *
     * @var string
     * @access protected
     *
     **/

    protected $_cacheKey = 'Job';
    protected $_cacheTotalKey = 'total-Job';

    public function __construct(Job $model)
    {
        $this->model = $model;
        $this->builder = $model;

    }

    public function update(array $data = []) {
        $data = parent::update($data);
        return $data;
    }

    public function findByAll($pagination = false, $perPage = 10, array $input = [] ) {

        $this->builder = $this->model->orderBy('id' , 'desc');
        
        if(!empty($input['filter_by_me'])){
            $input['filter_by_user'] = request()->user()->id;            
        }


        if (!empty($input['keyword'])) {

            $this->builder = $this->builder->where(function($query)use($input){
                $query->where('title', 'LIKE', "%{$input['keyword']}%");
            });
        }

        if(!empty($input['filter_by_status'])){
            $this->builder = $this->builder->where('status', '=', $input['filter_by_status']);            
        }
        
        if(!empty($input['filter_by_service'])){

            $ids = app('ServiceRepository')->model->where('id' , $input['filter_by_service'])
            ->orWhere('parent_id', $input['filter_by_service'])
            ->pluck('id')->toArray();

            $this->builder = $this->builder->whereIn('service_id', $ids);            
        }

        if(!empty($input['filter_by_user'])){
            $this->builder = $this->builder->where('user_id', '=', $input['filter_by_user']);            
        }

        if(!empty($input['filter_by_service_provider'])){

            $this->builder = $this->builder->leftJoin('job_bids', function ($join)  use($input){
                $join->on('jobs.id', '=', 'job_bids.job_id');
            })->where([
                [ 'job_bids.user_id', $input['filter_by_service_provider']],
                [ 'job_bids.is_awarded', 1]
            ])->select('jobs.*');
        }

        $data = parent::findByAll($pagination, $perPage, $input);

        return $data;   
    }



    public function findById($id, $refresh = false, $details = false, $encode = true)
    {
        $data = parent::findById($id, $refresh, $details, $encode);

        if($data){

            $data->formatted_created_at = Carbon::parse($data->created_at)->format('F j, Y');
            $data->service = app('ServiceRepository')->findById($data->service_id);

            if($data->schedule_at && $data->preference == 'choose_date'){
                $data->formatted_schedule_at = Carbon::parse($data->schedule_at)->format('F j, Y');
            }

            // Copied from user
            $country = app('CountryRepository')->findById($data->country_id);             
            $data->country = !empty($country->name) ? $country->name : '';
            $City = app('CityRepository')->findById($data->city_id);                
            $data->city = !empty($City->name)?$City->name:'';
            $state = app('StateRepository')->findById($data->state_id);                
            $data->state = !empty($state->name)?$state->name:'';

            $bidsCriteria = ['job_id' => $data->id];
            $bidsWhereIn = ['status' => ['pending' , 'completed', 'invited']];
            $data->bids_count = app('JobBidRepository')->findByCriteria($bidsCriteria, false, false, false, $bidsWhereIn, true);

            $bidsCriteria['is_awarded'] = 1;
            $awardedBid = app('JobBidRepository')->findByCriteria($bidsCriteria, false, false);

            if($awardedBid){
                $data->awarded_to = app('UserRepository')->findById($awardedBid->user_id);
            }

            $ratingCriteria = ['user_id' => $data->user_id];
            $data->job_rating = app('UserRatingRepository')->findByCriteria($ratingCriteria, false, false, false, false, true);

            $avgCriteria = ['user_id' => $data->user_id,'status'=>'approved','job_id'=>$data->id];
            $avgRating = app('UserRatingRepository')->getAvgRatingCriteria($avgCriteria, false);
            $data->avg_rating = $avgRating;
            
            $details = ['user_rating' => true];
            $data->user = app('UserRepository')->findById($data->user_id, false, $details);

            if ($data->status == 'awarded' || $data->status == 'initiated' || $data->status == 'completed') {
                $bidsCriteria = ['job_bids.job_id' => $data->id,'job_bids.is_awarded'=>1];
                $jobAmount = app('JobBidRepository')->getAwardedJobAmount($bidsCriteria);
                $data->job_amount = $jobAmount;

                $bidsCriteria = ['job_bids.job_id' => $data->id,'job_bids.is_awarded'=>1];
                $servicerProvider = app('JobBidRepository')->getJobServiceProvider($bidsCriteria);
                $data->service_provider = (!empty($servicerProvider['first_name']) && !empty($servicerProvider['last_name'])) ? 
                $servicerProvider['first_name'] .' '.$servicerProvider['last_name'] : '-';
                
                if($data->status == 'completed'){
                    $data->review_details = app('UserRatingRepository')->findByAttribute('job_id' , $data->id);
                }


            }

        }

        return $data;
    }


    public function getTotalCountByCriteria($crtieria = [], $startDate = NULL, $endDate = NULL , $orCrtieria = []) {

        if($crtieria){

            $this->model = $this->model->where($crtieria);
        }

        // or Criteria must be an array 
        if($crtieria && $orCrtieria){
            foreach ($orCrtieria as $key => $where) {
                $this->model  = $this->model->orWhere($where);
            }
        }


        if($startDate && $endDate){
            $this->model = $this->model->whereBetween('created_at', [$startDate, $endDate]);
        }

        return  $this->model->count();
    }

}
