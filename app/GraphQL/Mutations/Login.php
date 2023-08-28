<?php

namespace App\GraphQL\Mutations;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

final class Login
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     * @return array
     */
    public function __invoke($_, array $args): array
    {
        $user = \App\Models\User::query()
            ->where('email', $args['data']['email'])
            ->first();
        
        if (! $user || ! Hash::check($args['data']['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The credentials provided do not exists in our records']
            ]);
        }

        return [
            'user' => $user,
            'token' => $user->createToken($args['data']['device'])->plainTextToken
        ];
    }
}
