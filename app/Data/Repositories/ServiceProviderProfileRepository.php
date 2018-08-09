<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\ServiceProviderProfile;

class ServiceProviderProfileRepository extends AbstractRepository implements RepositoryContract
{
/**
     *
     * These will hold the instance of ServiceProviderProfile Class.
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
     * Example: ServiceProviderProfile-1
     *
     * @var string
     * @access protected
     *
     **/

    protected $_cacheKey = 'ServiceProviderProfile';
    protected $_cacheTotalKey = 'total-ServiceProviderProfile';

    public function __construct(ServiceProviderProfile $model)
    {
        $this->model = $model;
        $this->builder = $model;

    }

    public function findById($id, $refresh = false, $details = false, $encode = true, $input =  []) {
        $data = parent::findById($id, $refresh, $details, $input);

        if ($data) {
            $data->user_detail = app('UserRepository')->findById($data->user_id);

            $bidsCriteria = ['user_id' => $data->user_id,'is_awarded'=>1];
            $awardedJobs = app('JobBidRepository')->getCountByCriteria($bidsCriteria, false);
            $data->initiated_jobs = $awardedJobs;

            $bidsCriteria = ['job_bids.user_id' => $data->user_id,'.job_bids.status'=>'completed'];
            $finishedJobs = app('JobBidRepository')->getCompletedJobs($bidsCriteria, false);
            $data->finished_jobs = $finishedJobs;

            $bidsCriteria = ['job_bids.user_id' => $data->user_id,'job_bids.status'=>'completed'];
            $urgentJobsCompleted = app('JobBidRepository')->getUrgentJobsCompleted($bidsCriteria);
            $data->urgent_jobs_completed = $urgentJobsCompleted;

            $bidsCriteria = ['job_bids.user_id' => $data->user_id,'job_bids.status'=>'completed'];
            $totalRevenue = app('JobBidRepository')->getTotalRevenueCriteria($bidsCriteria);
            $data->total_revenue = $totalRevenue;

            $avgCriteria = ['user_id' => $data->user_id,'status'=>'approved'];
            $avgRating = app('UserRatingRepository')->getAvgRatingCriteria($avgCriteria, false);
            $data->avg_rating = $avgRating;

            $avgCriteria = ['user_id' => $data->user_id,'status'=>'approved'];
            $totalFeedbackCount = app('UserRatingRepository')->getTotalFeedbackCriteria($avgCriteria, false);
            $data->total_feedback_count = $totalFeedbackCount;      

            $servicesCriteria = ['service_provider_profile_requests.user_id' => $data->user_id,'service_provider_profile_requests.status'=>'approved'];
            $subServices = app('ServiceProviderProfileRequestRepository')->getSubServices($servicesCriteria, false);
            $data->services_offered = $subServices;      
        }
        
        return $data;
    }


    public function findByAll($pagination = false,$perPage = 10, $data = []){       

        $this->builder = $this->model->orderBy('created_at','desc');

        if (!empty($data['keyword'])) {
            
            $this->builder = $this->builder->where(function($query)use($data){
                $query->where('service_provider_profiles.business_name', 'LIKE', "%{$data['keyword']}%");
                $query->orWhere('service_provider_profiles.business_details', 'like', "%{$data['keyword']}%");
            
            });
        }
        if(!empty($data['filter_by_business_type'])){
            $this->builder = $this->builder->where('business_type','=',$data['filter_by_business_type']);
        }
        
        return parent::findByAll($pagination, $perPage, $data);

    }
}
