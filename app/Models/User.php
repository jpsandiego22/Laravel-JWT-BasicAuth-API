<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User implements Authenticatable, JWTSubject
{
    protected $client_id;
    protected $client_secret;

    public function __construct($client_id, $client_secret)
    {
        $this->client_id = $client_id;
        $this->client_secret = $client_secret;
    }

    // JWTSubject methods
    public function getJWTIdentifier()
    {
        return $this->client_id;
    }

    public function getJWTCustomClaims()
    {
        return [
            'client_id' => $this->client_id,
        ];
    }

    // Authenticatable methods (needed by Laravel Auth)
    public function getAuthIdentifierName()
    {
        return 'client_id';
    }

    public function getAuthIdentifier()
    {
        return $this->client_id;
    }

    public function getAuthPassword()
    {
        return $this->client_secret;
    }

    public function getRememberToken() {}
    public function setRememberToken($value) {}
    public function getRememberTokenName() {}
}
