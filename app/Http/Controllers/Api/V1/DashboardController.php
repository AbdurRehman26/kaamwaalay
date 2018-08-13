<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\DashboardRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use \Validator;

class DashboardController {
    
    public $_repository;

    public function __construct(DashboardRepository $repository){
        $this->_repository = $repository;
    }

    public function dashboard(Request $request)
    {
        $input = $request->only('start_date', 'end_date', 'type');

        $rules = [
                    'start_date'            =>  'required|date',
                    'end_date'              =>  'required|date',
                    'type'                  =>  'required|in:stats,customer_signup,service_provider_signup,job_service_type,pr_over_time,pr_type,top_service_provider,top_customer',
        ];

        $messages = [];

        $validator = Validator::make($input, $rules, $messages);
        // if validation fails
        if ($validator->fails()) {
            $code = 406;
            $output = ['error' => ['code' => $code, 'messages' => $validator->messages()->all()]];
            // if validation passes
        } else {
            $code = 200;
            if($input['type'] == 'stats'){
                $output = $this->_repository->stats($input);
            }else if($input['type'] == 'customer_signup'){
                
            }else if($input['type'] == 'customer_signup'){
                
            }else if($input['type'] == 'service_provider_signup'){
                
            }else if($input['type'] == 'job_service_type'){
                
            }else if($input['type'] == 'pr_over_time'){
                
            }else if($input['type'] == 'pr_type'){
                
            }else if($input['type'] == 'top_service_provider'){
                
            }else if($input['type'] == 'top_customer'){
                
            }
            
        }

        return response()->json($output, $code);
    }

}