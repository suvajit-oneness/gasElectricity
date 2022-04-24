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
        $this->middleware('auth:api', ['except' => ['aggregatorLogin']]);
    }

    public function aggregatorLogin()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
    }

    public function aggregatorProfile()
    {
        return response()->json(auth()->user());
    }

    public function aggregatorLogout()
    {
        auth()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function aggregatorSmeList(Request $request)
    {
        $data = Sme::where('aggregator_id', $request->id)->get();

        if (count($data) > 0) {
            return successResponse('Aggregator wise SME list', $data);
        } else {
            return successResponse('No SME data found');
        }
    }
}