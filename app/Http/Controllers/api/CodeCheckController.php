<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use mail;
use App\Models\ResetCodePassword;


class CodeCheckController extends Controller
{

     /**
     * @OA\Post(
     * path="/api/password/code/check",
     * summary="Check code",
     * description="Enter code to see if is valid !",
     * operationId="CodeCheck",
     * security={{"bearer_token":{}}},
     * tags={"Forgot password"}, 

     *     @OA\Parameter(
     *          name="code",
     *          description="Enter name",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *       ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="Valid code."
     *     ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Wrong code !",
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
            'code' => 'required|string|exists:reset_code_passwords',
        ]);

        // find the code
        $passwordReset = ResetCodePassword::firstWhere('code', $request->code);

        // check if it does not expired: the time is one hour
        if ($passwordReset->created_at > now()->addHour()) {
            $passwordReset->delete();
            return response()->json(['message' => trans('passwords code is expired')], 422);
        }

        return response()->json([
            'code' => $passwordReset->code,
            'message' => trans('password\'s code is valid !')
        ], 200);
    }

}
