<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request) {
        $rules = [
            'reg_no' => 'string|required',
            'password' => 'string|required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            throw new \Exception();
        }
        $credentials = $request->only(['reg_no', 'password']);
        if (!Auth::attempt($credentials)) {
            return $this->sendErrorResponse("Invalid reg number and/or password", 401);
        }
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        $token->expires_at = Carbon::now()->addWeeks(20);
        $token->save();
        $response = [
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString(),
        ];
        return $this->sendSuccessResponse($response);
    }
}