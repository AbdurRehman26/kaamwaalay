<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\ServiceProviderProfileRequestRepository;

class ServiceProviderProfileRequestController extends ApiResourceController
{
    public $_repository;

    public function __construct(ServiceProviderProfileRequestRepository $repository){
       $this->_repository = $repository;
   }

   public function rules($value=''){
    $rules = [];

    if($value == 'store'){

    }

    if($value == 'update'){

    }


    if($value == 'destroy'){

    }

    if($value == 'show'){

    }

    if($value == 'index'){
        $rules['keyword']    = 'nullable|string';
        $rules['filter_by_business_type'] = 'nullable|in:business,individual';
    }

    return $rules;

}


public function input($value='')
{
    $input = request()->only('id', 'keyword','filter_by_business_type');
    $input['user_id'] = !empty(request()->user()->id) ? request()->user()->id : null ;
    return $input;
}
}