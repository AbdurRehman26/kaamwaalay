<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\JobBidRepository;
use Illuminate\Validation\Rule;

class JobBidController extends ApiResourceController
{
    public $_repository;

    public function __construct(JobBidRepository $repository){
       $this->_repository = $repository;
   }

   public function rules($value=''){
    $rules = [];

    if($value == 'store'){

        $rules['amount'] =  'required_without:is_tbd';    
        $rules['is_tbd'] =  'required_without:amount';    
        $rules['job_id'] = [
            'required',
            'exists:jobs,id',
            Rule::unique('job_bids')->where(function ($query) {
                $query->where('user_id', $this->input()['user_id']);
            }),
        ];


    }

    if($value == 'update'){
        $rules['user_id'] = [
            'required',
            Rule::exists('jobs')->where(function ($query) {
                $query->where('user_id', $this->input()['user_id']);
            }),
        ];

        $rules['job_id'] = [
            'required',
            Rule::exists('job_bids')->where(function ($query) {
                $query->where('user_id', $this->input()['user_id']);
            }),
        ];


    }
    
    return $rules;

}


public function input($value='')
{
    $input = request()->only('id', 'job_id', 'description', 'is_tbd', 'amount', 'status', 'filter_by_status', 'filter_by_job_id', 'pagination');
        
    if(!empty($input['amount'])){
        unset($input['is_tbd']);
    }

    if(!empty($input['is_tbd'])){
        unset($input['amount']);
    }

    if($value == 'store' || $value == 'update'){

        unset(
            $input['status'], $input['filter_by_status'], $input['filter_by_job_id'], $input['pagination']
        );

    }


    $input['user_id'] = request()->user()->id;

    return $input;
}

public function messages($value = '')
{
    $messages = [
        'job_id.unique' => 'A bid has already been placed.',
    ];
    return $messages;
}


}