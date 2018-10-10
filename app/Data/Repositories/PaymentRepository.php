<?php

namespace App\Data\Repositories;

use Cygnis\Data\Contracts\RepositoryContract;
use Cygnis\Data\Repositories\AbstractRepository;
use App\Data\Models\Payment;
use App\Data\Models\User;
use Carbon\Carbon;
use DB;

class PaymentRepository extends AbstractRepository implements RepositoryContract
{
    /**
     * These will hold the instance of Payment Class.
     *
     * @var    object
     * @access public
     **/
    public $model;

    /**
     * This is the prefix of the cache key to which the
     * App\Data\Repositories data will be stored
     * App\Data\Repositories Auto incremented Id will be append to it
     *
     * Example: Payment-1
     *
     * @var    string
     * @access protected
     **/

    protected $_cacheKey = 'payment';
    protected $_cacheTotalKey = 'total-payment';

    public function __construct(Payment $model)
    {
        $this->model = $model;
        $this->builder = $model;
        $this->userRepo = app('UserRepository');

    }

    public function getTotalByCriteria($crtieria = [], $aggregate = 'count', $field = 'amount', $startDate = null, $endDate = null)
    {
        
        $record = $this->model;

        if($crtieria) {
            $record = $record->where($crtieria);
        }

        if($startDate && $endDate) {
            $record = $record->whereBetween('created_at', [$startDate, $endDate]);
        }

        if($aggregate && $aggregate == 'sum') {
            $record = $record->sum($field);   
        }else{
            $record = $record->count();
        }

        return  $record;
    }

    public function findByAll($pagination = false, $perPage = 10, array $data = [] )
    {

        $this->builder = $this->builder
            ->leftJoin('users', 'subscriptions.user_id', '=', 'users.id');

        if(!empty($data['filter_by_pay_by'])) {
            $this->builder = $this->builder->where('users.role_id', '=', $data['filter_by_pay_by']);
            ;
        }

        if(!empty($data['filter_by_type'])) {
            $this->builder = $this->builder->leftJoin('plans', 'subscriptions.stripe_plan', '=', 'plans.id');
            $this->builder = $this->builder->where('plans.product', '=', $data['filter_by_type']);
            ;
        }

        if(!empty($data['keyword'])) {
            $this->builder = $this->builder
                ->where(
                    function ($query) use ($data) {
                        $query->orWhere(DB::raw('CONCAT(users.first_name," ",users.last_name)'), 'LIKE', '%'.$data['keyword'].'%');
                    }
                );            
        }

        $this->builder = $this->builder
            ->select('subscriptions.id')
            ->orderBy('subscriptions.created_at', 'DESC');

        return  parent::findByAll($pagination, $perPage);
    
    }

    public function findById($id, $refresh = false, $details = false, $encode = true)
    {
        $data = parent::findById($id, $refresh, $details, $encode);
        if($data) {
            $details = ['role' => true];
            $data->full_name = '';
            $data->pay_by = $this->userRepo->findById($data->user_id, false, $details);
            if($data->pay_by) {
                $data->full_name = $data->pay_by->first_name. ' ' .$data->pay_by->last_name;
            }
            $data->formatted_created_at = Carbon::parse($data->created_at)->format('F j, Y');
            $planData = app('PlanRepository')->findById($data->stripe_plan, false);
            $data->type = $planData->product;
            $data->amount = $planData->amount;
        }

        return $data;
    }

    public function create(array $data = [])
    {
        $user = User::find($data['user_id']);
        $stripeToken = $data['stripe_token'];
        $planId = $data['plan_id'];
         try{
             $payment =  $user->newSubscription('', $planId)->create($stripeToken);
             $planRepo = app('PlanRepository')->findById($planId);
             if($planRepo->product == 'featured_profile'){
                $campaignModel = app('CampaignRepository')->model;
                $campaignData = [];
                $campaignData['plan_id'] = $planId;
                $campaignData['user_id'] = $data['user_id'];
                $campaignModel->create($campaignData);
              }
              return $payment;
          } catch (\Stripe\Error\InvalidRequest $e) {
              return $e->getMessage();
          }catch (\Exception $e) {
              return $e->getMessage();
          }
    }
}
