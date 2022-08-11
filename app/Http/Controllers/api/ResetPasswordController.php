<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\User;
use App\Models\ResetCodePassword;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{

     /**
     * @OA\Post(
     * path="/api/password/reset",
     * summary="reset password",
     * description="Enter email and code to reset password !",
     * operationId="Reset Password",
     * security={{"bearer_token":{}}},
     * tags={"Forgot password"}, 
     *
     *     @OA\Parameter(
     *          name="code",
     *          description="Enter code",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *       ),
     *
     *   @OA\Parameter(
     *          name="password",
     *          description="Enter new password",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *       ),
     *
     *   @OA\Parameter(
     *          name="password_confirmation",
     *          description="Re_Enter password",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *       ),
     *
     *
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successfully !"
     *     ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Wrong Input",
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

     public function __invoke(Request $request)
    {
        $request->validate([
            'code' => 'required|string|min:6|max:6|exists:reset_code_passwords',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // find the code
        $passwordReset = ResetCodePassword::firstWhere('code', $request->code);

        // check if it does not expired: the time is one hour
        if ($passwordReset->created_at > now()->addHour()) {
            $passwordReset->delete();
            return response()->json(['message' => trans('passwords code is expire')],422);
        }

        // find user's email 
        $user = User::firstWhere('email', $passwordReset->email);

        // update user password
        $user->update(['password'=>Hash::make($request->password)]);

        // delete current code 
        $passwordReset->delete();

        return response()->json(['message' =>'Password has been successfully reset'], 200);
    }
}
