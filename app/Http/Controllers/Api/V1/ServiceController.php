<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\Repositories\ServiceRepository;
use App\Data\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\Rule;

class ServiceController extends ApiResourceController
{
    public $_repository;

    public function __construct(ServiceRepository $repository){
       $this->_repository = $repository;
    }

   public function rules($value=''){
    $rules = [];

    if($value == 'store'){

        $rules['parent_id']               = 'nullable|exists:services,id';           
        $rules['title']                   = 'required|unique:services,title'; 
        $rules['description']            = 'required';               
        $rules['is_display_banner']       = 'required|in:0,1';                   
        $rules['is_display_service_nav']  = 'required|in:0,1';                       
        $rules['is_display_footer_nav']   = 'required|in:0,1';                   
        $rules['images']                  = 'required|array';       
        $rules['status']                  = 'required|in:0,1';    
        $rules['user_id'] =  'required|exists:users,id';   
    }

    if($value == 'update'){
        
        
        $rules['id']                      =  'required|exists:services,id';
        $rules['is_display_banner']       = 'nullable|in:0,1';                   
        $rules['is_display_service_nav']  = 'nullable|in:0,1';                       
        $rules['is_display_footer_nav']   = 'nullable|in:0,1';           
        $rules['status']                  = 'nullable|in:0,1';        
        $rules['user_id']                 =  'required|exists:users,id';
        $rules['title']                   = [
                                            'required',
                                            Rule::unique('services')->where(function ($query) {
                                                $query->where('id','!=', $this->input()['id']);
                                            }),
                                            ]; 

    }


    if($value == 'destroy'){

        $rules['id'] =  'required|exists:services,id';
        $rules['user_id'] =  'required|exists:users,id';
        

    }

    if($value == 'show'){

        $rules['id'] =  'required|exists:services,id';
    }

    if($value == 'index'){

        $rules['pagination'] =  'nullable|boolean';
        $rules['keyword']    = 'nullable|string';
        $rules['filter_by_featured'] = 'nullable|in:1,0';
    }

    return $rules;

}


    public function input($value=''){
        $input = request()->only(
                            'id',
                            'title',
                            'title',
                            'images',
                            'parent_id',
                            'pagination',
                            'description',
                            'is_display_banner',
                            'is_display_service_nav',
                            'keyword',
                            'filter_by_featured',
                            'zip_code'
                            );

    $input['user_id'] = !empty(request()->user()->id) ? request()->user()->id : null;
    request()->request->add(['user_id' => !empty(request()->user()->id) ? request()->user()->id : null]);

    return $input;
    }


    //Update single record
    public function update(Request $request, $id)
    {   

        $request->request->add(['id' => $id]);
        $input = $this->input(__FUNCTION__);
        $rules = $this->rules(__FUNCTION__);
        $messages = $this->messages(__FUNCTION__);
        $this->validate($request, $rules, $messages);

        $data = $this->_repository->update($input);
        
        if ($data == 'not_parent') {
            $output = ['errors' => ['parent_id' => ['The parent id does not match']] , 'message' => 'The given data was invalid'];
        }else{
            $output = ['response' => ['data' => $data, 'message' => $this->response_messages(__FUNCTION__)]];
        }

        // HTTP_OK = 200;
        return response()->json($output, Response::HTTP_OK);

    }

    //Create single record
    public function store(Request $request)
    {

        $input = $this->input(__FUNCTION__);
        $rules = $this->rules(__FUNCTION__);
        $messages = $this->messages(__FUNCTION__);

        $this->validate($request, $rules, $messages);

        $data = $this->_repository->create($input);
        if ($data == 'not_parent') {
            $output = ['errors' => ['parent_id' => ['The parent id does not match']] , 'message' => 'The given data was invalid'];
        }else{
            $output = ['response' => ['data' => $data, 'message' => $this->response_messages(__FUNCTION__)]];
        }

        
        // HTTP_OK = 200;

        return response()->json($output, Response::HTTP_OK);

    }
}