<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\UserRatingRepository;

class UserRatingController extends ApiResourceController
{
    public $_repository;

    public function __construct(UserRatingRepository $repository)
    {
        $this->_repository = $repository;
    }

    public function rules($value='')
    {
        $rules = [];

        if($value == 'store') {
              $rules['job_id']        =  'required|numeric|exists:jobs,id';
              $rules['message']       =  'required|alpha_num';
              $rules['rating']        =  'required|numeric|max:5';
              $rules['user_service_id']        =  'required|numeric|exists:service_provider_services,id';
              $rules['user_id']        =  'required|numeric|exists:users,id';
              //$rules['rated_by']       =  'required';
        }

        if($value == 'update') {

        }


        if($value == 'destroy') {

        }

        if($value == 'show') {
              $rules['id']                =  'required|numeric|exists:user_ratings,id';
        }

        if($value == 'index') {
              $rules['user_id']           =  'required|numeric|exists:users,id';
              $rules['pagination']        =  'nullable|boolean';
        }

        return $rules;

    }


    public function input($value='')
    {
        $input = request()->only('id', 'pagination', 'rating', 'message', 'job_id', 'user_service_id', 'rated_by', 'user_id');
        //$input['user_id'] = !empty(request()->user()->id) ? request()->user()->id : null ;

        if($value == 'store') {
            $input['rated_by'] = !empty(request()->user()->id) ? request()->user()->id : null ;
        }

        return $input;
    }

}
