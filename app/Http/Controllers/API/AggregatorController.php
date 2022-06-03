<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Model\Sme;
use DB;

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

        $id = auth()->user()->id;

        // echo $id; die;

        $filterby_created_at = !empty($request->filterby_created_at)?$request->filterby_created_at:'';
        $filterby_updated_at = !empty($request->filterby_updated_at)?$request->filterby_updated_at:'';

        

        $data = DB::table('smes')->select('*');
        // $data = Sme::select('*');

        if(!empty($filterby_created_at)){
            $filterby_created_at = date('Y-m-d', strtotime($filterby_created_at));
            // echo $filterby_created_at; die;
            $data = $data->whereRaw(" DATE_FORMAT(created_at, '%Y-%m-%d') = '".$filterby_created_at."' ");
        }
        if(!empty($filterby_updated_at)){
            $filterby_updated_at = date('Y-m-d', strtotime($filterby_updated_at));
            $data = $data->whereRaw(" DATE_FORMAT(updated_at, '%Y-%m-%d') = '".$filterby_updated_at."' ");
        }

        $data = $data->where('aggregator_id', $id)->get();

        if (count($data) > 0) {
            return successResponse('Aggregator wise SME list', $data);
        } else {
            return successResponse('No SME data found');
        }
    }
}