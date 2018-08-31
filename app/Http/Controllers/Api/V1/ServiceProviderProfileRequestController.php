<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\ServiceProviderProfileRequestRepository;
use App\Data\Models\Role;

class ServiceProviderProfileRequestController extends ApiResourceController
{
    public $_repository;

    public function __construct(ServiceProviderProfileRequestRepository $repository){
       $this->_repository = $repository;
   }

   public function rules($value=''){
    $rules = [];
    
    if($value == 'update'){
        $rules['id']            =  'required|exists:services,id';
        $rules['status']        =  'nullable|in:approved,pending,rejected,in-review';
        $rules['reason']        =  'nullable';
    }

    if($value == 'index'){
        $rules['keyword']    = 'nullable|string';
        $rules['filter_by_business_type'] = 'nullable|in:business,individual';
    }

    return $rules;

}


public function input($value='')
{
    $input = request()->only('id', 'keyword','filter_by_business_type','status','reason', 'pagination', 'filter_by_service',
                            'user_details', 'profile_details');

    $input['user_id'] = request()->user()->id;
    $input['role_id'] = request()->user()->role_id;

    return $input;
}
}