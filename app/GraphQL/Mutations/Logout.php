<?php

namespace App\GraphQL\Mutations;

use Illuminate\Support\Facades\Auth;
use Nuwave\Lighthouse\Exceptions\AuthenticationException;

final class Logout
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        if (! Auth::guard('sanctum')->check()) {
            throw new AuthenticationException('Not Authenticated');
        }
        $user = Auth::guard('sanctum')->user();
        $user->tokens()->delete();

        return $user;
    }
}
