<?php

namespace App\GraphQL\Mutations;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

final class Register
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $user = \App\Models\User::create([
            'name' => $args['name'],
            'email' => $args['email'],
            'password' => Hash::make($args['password'])
        ]);

        event(new Registered($user));

        return $user;
    }
}