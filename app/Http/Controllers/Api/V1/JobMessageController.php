<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\JobMessageRepository;
use Illuminate\Validation\Rule;

class JobMessageController extends ApiResourceController
{
    public $_repository;

    public function __construct(JobMessageRepository $repository){
       $this->_repository = $repository;
   }

   public function rules($value=''){
    $rules = [];

    if($value == 'store'){
        $rules['job_id'] =  'required|exists:jobs,id';
        $rules['job_bid_id'] =  'required|exists:job_bids,id';
    }

    if($value == 'update'){

    }


    if($value == 'destroy'){

    }

    if($value == 'show'){

    }

    if($value == 'index'){

    }

    return $rules;

}


public function input($value='')
{
    $input = request()->only('id', 'text', 'job_id', 'job_bid_id');
    $input['user_id'] = !empty(request()->user()->id) ? request()->user()->id : null ;
    $input['sender_id'] = !empty(request()->user()->id) ? request()->user()->id : null ;
    

    if($value == 'store'){
        unset($input['user_id']);
    }

    return $input;
}

}