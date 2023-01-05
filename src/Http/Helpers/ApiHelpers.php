<?php
namespace Virtsevda\LaravelCatalog\Http\Helpers;

use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Auth;

trait ApiHelpers
{

    protected function isAdmin($user): bool
    {
        if (!empty($user)) {
            return $user->hasRole('admin');
        }

        return false;
    }

    protected function isChina($user): bool
    {
        if (!empty($user)) {
            return $user->hasRole('china');
        }

        return false;
    }

    /*
    protected function isWriter($user): bool
    {

        if (!empty($user)) {
            return $user->tokenCan('writer');
        }

        return false;
    }

    protected function isSubscriber($user): bool
    {
        if (!empty($user)) {
            return $user->tokenCan('subscriber');
        }

        return false;
    }
    */

    protected function onSuccess($data, string $message = '', int $code = 200): JsonResponse
    {
        return response()->json([
            'status' => $code,
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    protected function onError(int $code, $message): JsonResponse
    {
        if (is_array($message))
            return response()->json([
                'status' => $code,
                'errors' => $message,
            ], $code);

        return response()->json([
            'status' => $code,
            'errors' => $message,
        ], $code);
    }

    protected function onErrorValidation($validator): String
    {
        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            $msg = implode(';',$messages);
        }
        return $msg;
    }

    protected function addDateTime($array): array
    {
        return array_merge($array,['created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]);
    }

    protected function addUser($array):array
    {
        return array_merge($array,['user_id'=>Auth::user()->id]);
    }

    protected function isOwner($user_id):bool
    {
        return (Auth::user()->id === $user_id) ? true : false;
    }
    /*
        protected function postValidationRules(): array
        {
            return [
                'title' => 'required|string',
                'content' => 'required|string',
            ];
        }

        protected function userValidatedRules(): array
        {
            return [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ];
        }
    */
}

?>
