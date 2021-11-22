<?php

namespace App\Http\Controllers;

class AuthController extends Controller
{
    /**
     * 需要通过jwt鉴权才能通过的控制器访问，要加上这段构造函数.
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * 获取token.
     * 使用username和password鉴权，数据来源默认admin_users表.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['username', 'password']);

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => '未通过的授权！'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * 返回token结构体.
     *
     * @param string $token
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken(string $token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

    /**
     * 获取当前jwt用户信息.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth('api')->user());
    }

    /**
     * 注销jwt.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth('api')->logout();

        return response()->json(['message' => '注销成功！']);
    }

    /**
     * 刷新token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }
}
