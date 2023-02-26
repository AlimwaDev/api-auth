<?php

namespace Alimwa\Auth\app\HTTP\Controllers\API;

use Illuminate\Http\JsonResponse;
use Alimwa\Auth\app\HTTP\Controllers\Controller;
use Alimwa\Auth\app\HTTP\Actions\AuthAPI\UserAction;
use Alimwa\Auth\app\HTTP\Requests\Auth\LoginRequest;
use Alimwa\Auth\app\HTTP\Actions\AuthAPI\LoginAction;
use Alimwa\Auth\app\HTTP\Actions\AuthAPI\LogoutAction;
use Alimwa\Auth\app\HTTP\Actions\AuthAPI\RefreshAction;

class AuthAPIController extends Controller
{
	/**
	 * @OA\Post(
	 *      path="/login",
	 *      summary="loginUser",
	 *      tags={"API Auth"},
	 *      description="Login user on API and receive token for subsequent requests.",
	 *      @OA\RequestBody(
	 *        required=true,
	 *        @OA\JsonContent(
	 *              type="object",
	 *              @OA\Property(
	 *                  property="email",
	 *                  type="string"
	 *              ),
	 *              @OA\Property(
	 *                  property="password",
	 *                  type="string"
	 *              )
	 *          )
	 *      ),
	 *      @OA\Response(
	 *          response=200,
	 *          description="successful operation",
	 *          @OA\JsonContent(
	 *              type="object",
	 *              @OA\Property(
	 *                  property="errors",
	 *                  type="array"
	 *              ),
	 *              @OA\Property(
	 *                  property="data",
	 *                  ref="#/components/schemas/User"
	 *              ),
	 *              @OA\Property(
	 *                  property="message",
	 *                  type="string"
	 *              )
	 *          )
	 *      )
	 * )
	 */
    public function login(LoginAction $loginAction, LoginRequest $request): JsonResponse
    {
        return $loginAction->execute($request)
            ->getResponse();
    }

	/**
	 * @OA\Get(
	 *      path="/logout",
	 *      summary="logoutUser",
	 *      tags={"API Auth"},
	 *      description="Logs out authenticated user.",
	 *      @OA\Response(
	 *          response=200,
	 *          description="successful operation",
	 *          @OA\JsonContent(
	 *              type="object",
	 *              @OA\Property(
	 *                  property="errors",
	 *                  type="array"
	 *              ),
	 *              @OA\Property(
	 *                  property="data",
	 *                  type="array",
	 *                  @OA\Items(ref="#/components/schemas/User")
	 *              ),
	 *              @OA\Property(
	 *                  property="message",
	 *                  type="string"
	 *              )
	 *          )
	 *      )
	 * )
	 */
    public function logout(LogoutAction $logoutAction): JsonResponse
    {
        return $logoutAction->execute()
            ->getResponse();
    }

	/**
	 * @OA\Get(
	 *      path="/refresh",
	 *      summary="refreshUserToken",
	 *      tags={"API Auth"},
	 *      description="Refreshes the authenticated user's token",
	 *      @OA\Response(
	 *          response=200,
	 *          description="successful operation",
	 *          @OA\JsonContent(
	 *              type="object",
	 *              @OA\Property(
	 *                  property="errors",
	 *                  type="array"
	 *              ),
	 *              @OA\Property(
	 *                  property="data",
	 *                  type="array",
	 *                  @OA\Items(ref="#/components/schemas/User")
	 *              ),
	 *              @OA\Property(
	 *                  property="message",
	 *                  type="string"
	 *              )
	 *          )
	 *      )
	 * )
	 */
    public function refresh(RefreshAction $refreshAction): JsonResponse
    {
        return $refreshAction->execute()
            ->getResponse();
    }

	/**
	 * @OA\Get(
	 *      path="/user",
	 *      summary="loggedInUser",
	 *      tags={"API Auth"},
	 *      description="Get data on the currently logged in user.",
	 *      @OA\Response(
	 *          response=200,
	 *          description="successful operation",
	 *          @OA\JsonContent(
	 *              type="object",
	 *              @OA\Property(
	 *                  property="errors",
	 *                  type="array"
	 *              ),
	 *              @OA\Property(
	 *                  property="data",
	 *                  type="array",
	 *                  @OA\Items(ref="#/components/schemas/User")
	 *              ),
	 *              @OA\Property(
	 *                  property="message",
	 *                  type="string"
	 *              )
	 *          )
	 *      )
	 * )
	 */
    public function user(UserAction $userAction): JsonResponse
    {
        return $userAction->execute()
            ->getResponse();
    }
}