<?php

namespace App\Domain;

interface ApiInterface
{
    public function getBaseUrl();

    public function getVersion();

    public function getApiUrl();
}
