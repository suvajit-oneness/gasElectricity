<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Model\Sme;

class AggregatorController extends Controller
{
    use Authenticatable;

    public function __construct()
    {
        // die('Hi');
        $this->middleware('auth:api', ['except' => ['aggregatorLogin']]);
        
        // $this->middleware('auth:api', ['except' => ['aggregatorLogin']]);
    }

    protected function respondWithToken($token) {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

    public function aggregatorLogin()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->guard('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
    }

    public function aggregatorProfile()
    {
        return response()->json(auth()->guard('api')->user());
    }

    public function aggregatorLogout()
    {
        auth()->guard('api')->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    // protected function respondWithToken($token)
    // {
    //     return response()->json([
    //         'access_token' => $token,
    //         'token_type' => 'bearer',
    //         'expires_in' => auth('api')->factory()->getTTL() * 60
    //     ]);
    // }

    public function aggregatorSmeList(Request $request)
    {
        $id = !empty($request->id)?$request->id:'';

        if(empty($id))
            return errorResponse("Param ID is required");
        
        $data = Sme::where('aggregator_id', $request->id)->get();

        if (count($data) > 0) {
            return successResponse('Aggregator wise SME list', $data);
        } else {
            return successResponse('No SME data found');
        }
    }
}