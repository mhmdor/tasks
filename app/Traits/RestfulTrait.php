<?php
namespace App\Traits;


use Validator;

trait RestfulTrait{

    public const STATUS_OK=200;
    public const STATUS_CREATED=201;
    public const STATUS_NO_CONTENT=204;
    public const STATUS_RESET_CONTENT=205;

    public const NOT_MODIFIED=303;

    //Exception
    public const STATUS_BAD_REQUEST=400;
    public const STATUS_UNAUTHORIZED=401;
    public const STATUS_NOT_AUTHENTICATED =402;
    public const STATUS_FORBIDDEN=403;
    public const STATUS_NOT_FOUND=404;
    public const STATUS_VALIDATION=405;

    public function apiResponse($data = null  , $code = 200 , $message = null ){
        $arrayResponse = [
            'data' => $data ,
            'status' => $code == 200 || $code==201 || $code==204 || $code==205 ,
            'message' => $message ,
            'code' => $code ,
        ];
       
        //return with header response accept application/json

        // return response()->json($arrayResponse,$code);
        return response($arrayResponse,$code)->withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ]);
    }
    public function apiValidation($request , $array){
        $validator = Validator::make($request->all(), $array);
        if ($validator->fails()) {
            return $this->apiResponse(null, self::STATUS_VALIDATION, $validator->messages());
        }
        return $validator->valid();
    }
}
