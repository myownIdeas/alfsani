<?php
/**
 * Created by PhpStorm.
 * User: Waqas
 * Date: 12/14/2016
 * Time: 10:47 PM
 */

namespace App\Http\Response\Response;
use App\Http\Response\Interfaces\ApiResponseInterface;
use App\Http\Response\Response as AppResponse;
use App\Traits\RequestHelper;

class ApiResponse extends AppResponse implements ApiResponseInterface
{
    use RequestHelper;
    public function response(array $response , array $headers =[])
    {
        $response['status'] = ($this->getHttpStatus() == 200?1:0);
        $response['message'] = (isset($data['message']))?$data['message']:(($response['status'] == 1)?config('constants.SUCCESS_MESSAGE'):config('constants.ERROR_MESSAGE'));
        $response['access_token'] = $this->computeAccessToken($response);
        return response()->json($response, $this->getHttpStatus(), $headers);
    }
    public function respondWithErrors()
    {
       return  $this->response([
            'status'=>0,
            'error'=>[
                    'message'=>$this->getErrorMessages(),
                    'code'=>$this->getCustomStatus(),
                    'http_status' => $this->getHttpStatus(),
            ],
            'data'=>null,
        ]);
    }
    public function respondWithValidationErrors()
    {
        return $this->respondWithErrors();
    }
    public function computeAccessToken($response)
    {
        if(isset($response['access_token']))
            $access_token = $response['access_token'];
        else if(isset($response['data']) && isset($response['data']['authUser'])){
            $access_token = $response['data']['authUser']->accessToken;
        }else{
            $access_token = $this->getAccessToken();
        }
        return $access_token;
    }


}