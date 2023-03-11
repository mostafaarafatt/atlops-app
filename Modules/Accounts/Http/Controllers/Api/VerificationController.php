<?php

namespace Modules\Accounts\Http\Controllers\Api;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Modules\Accounts\Entities\Customer;
use Modules\Accounts\Entities\User;
use Modules\Accounts\Entities\Verification;
use Modules\Accounts\Events\VerificationCreated;
use Modules\Accounts\Http\Requests\Api\VerificationRequest;
use Modules\Accounts\Http\Requests\Api\VerifyRequest;
use Modules\Support\Traits\ApiTrait;

class VerificationController extends Controller
{
    use AuthorizesRequests, ValidatesRequests, ApiTrait;

    /**
     * Send or resend the verification code.
     *
     * @param VerifyRequest $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function send(VerifyRequest $request): JsonResponse
    {
        $user = User::where(function (Builder $query) use ($request) {
            $query->where('email', $request->phone);
            $query->orWhere('phone', $request->phone);
        })->first();

        if (!$user) {
            return $this->sendError(trans('accounts::auth.failed'));
        }

        $verification = Verification::updateOrCreate([
            'user_id' => $user->id,
            'phone' => $request->phone,
        ], [
            'code' => random_int(1111, 9999),
        ]);
        if ($request->test_mode != 1 || !$request->test_mode) {
            event(new VerificationCreated($verification));
        }

        return response()->json([
            'code' => $verification->code,
            'message' => trans('accounts::verification.sent'),
        ]);
    }

    /**
     * Verify the user's phone number.
     *
     * @param VerificationRequest $request
     * @return JsonResponse
     */
    public function verify(VerificationRequest $request): JsonResponse
    {
        $user = User::wherePhone($request->phone)->first();

        if (!$user) {
            return $this->sendError(trans('accounts::auth.failed'));
        }

        $verification = Verification::where([
            'user_id' => $user->id,
            'code' => $request->code,
        ])->first();

        if (!$verification || $verification->isExpired()) {
            return $this->sendError(trans('accounts::verification.invalid'));
        }

        $user->forceFill([
            'phone' => $verification->phone,
            'email_verified_at' => now(),
        ])->save();

        $verification->delete();

        $data = $user->getResource();
        $data['token'] = $user->createTokenForDevice($request->device_name);
        return $this->sendResponse($data, trans('accounts::verification.is_verified'));
    }
}
