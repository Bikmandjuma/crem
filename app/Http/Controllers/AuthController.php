<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }


     /**
     * @OA\Post(
     * path="/api/login",
     * summary="Sign in",
     * description="Login by email, password",
     * operationId="authLogin",
     * tags={"Authentication"}, 
     *      @OA\Parameter(
     *          name="email",
     *          description="use email to login",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *       ),
     *      @OA\Parameter(
     *          name="password",
     *          description="use password to login",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="Successfull logged in."
     *     ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad user Input",
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

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');
        $token = Auth::attempt($credentials);

        $user = Auth::user();
        
        if (!$token) {
            return response()->json([
                'message' => 'Wrong credentials',
            ], 401);

        }
            return response()->json([
                'status' => 'Login .',
                'user' => $user,
                'authorisation' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ]);
        
    }


     // /**
     // * @OA\Post(
     // * path="/api/register",
     // * summary="Register",
     // * description="Register by nfullname,email, password",
     // * operationId="authRegister",
     // * tags={"Authentication"}, 

     // *     @OA\Parameter(
     // *          name="fullname",
     // *          description="Enter name",
     // *          required=true,
     // *          in="query",
     // *          @OA\Schema(
     // *              type="string"
     // *          )
     // *      ),
     // *
     // *      @OA\Parameter(
     // *          name="email",
     // *          description="Enter email",
     // *          required=true,
     // *          in="query",
     // *          @OA\Schema(
     // *              type="string"
     // *          )
     // *       ),
     // *
     // *      @OA\Parameter(
     // *          name="password",
     // *          description="Enter password",
     // *          required=true,
     // *          in="query",
     // *          @OA\Schema(
     // *              type="string"
     // *          )
     // *       ),
     // *      @OA\Response(
     // *          response=200,
     // *          description="Successfull logged in."
     // *     ),
     // *      @OA\Response(
     // *          response=204,
     // *          description="Successful operation",
     // *          @OA\JsonContent()
     // *       ),
     // *      @OA\Response(
     // *          response=400,
     // *          description="Bad user Input",
     // *      ),
     // *      @OA\Response(
     // *          response=401,
     // *          description="Unauthenticated",
     // *      ),
     // *      @OA\Response(
     // *          response=403,
     // *          description="Forbidden"
     // *      ),
     // *      @OA\Response(
     // *          response=404,
     // *          description="Resource Not Found"
     // *      )
     // * )
     // */

    public function register(Request $request){
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = Auth::login($user);
        return response()->json([
            'message' => 'User created',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }

    
     /**
     * @OA\Get(
     * path="/api/logout",
     * summary="Logout of the system",
     * description="Get out of the system !",
     * operationId="Logout",
     * tags={"Authentication"}, 
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


    public function logout()
    {
        Auth::logout();
        return response()->json([
            'message' => 'Successfully logged out',
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }

}

