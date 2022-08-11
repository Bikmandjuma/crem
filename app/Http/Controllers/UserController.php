<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;;

class UserController extends Controller
{
      /**
     * @OA\get(
     * path="/api/user/info",
     * summary="View user info",
     * description="User information !",
     * operationId="UserInfo",
     * security={{"bearer_token":{}}},
     * tags={"User"}, 
     *      @OA\Response(
     *          response=200,
     *          description="User info fetched successfully ."
     *     ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Wrong fetch",
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */

    function myinfo(){
        $user=Auth()->user();
        if (!$user) {
            return response()->json([
                'error'=>'no user data found']);
        }else{
            return response()->json([
                "message" =>"My information",
                "Users"=>$user
            ],200);
        }

    }   

     /**
     * @OA\Post(
     * path="/api/update/user/info",
     * summary="Update your info",
     * description="Update your information !",
     * operationId="UpdateUserInfo",
     * security={{"bearer_token":{}}},
     * tags={"User"}, 
     *
     *      @OA\Parameter(
     *          name="fullname",
     *          description="Enter full name",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *       ),
     *
     *
     *      @OA\Parameter(
     *          name="email",
     *          description="enter email",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *       ),
     *
     *
     *      @OA\Parameter(
     *          name="password",
     *          description="use password",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *       ),
     *
     *      @OA\Parameter(
     *          name="password_confirmation",
     *          description="Re_enter password",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *       ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="Invalid email."
     *     ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Wrong email !",
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */

    function UpdateInfo(Request $request){
        $validator = Validator::make($request->all(),[
            'fullname' => 'required|max:200',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user=User::find(Auth::user()->id);
        $user->fullname=$request->fullname;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->save();
            return response()->json([
                "Message"=>"My info successful edited",
                "user"=>$user,
            ],201);
    }


}
