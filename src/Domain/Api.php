<?php

namespace App\Domain;


class Api implements ApiInterface
{

    protected $base_url;
    protected $version;


    public function __construct($settings)
    {
        $this->base_url = $settings['base_url'];
        $this->version = $settings['version'];
    }

    public function getBaseUrl()
    {
        return $this->base_url;
    }

    public function getVersion()
    {
        return $this->version;
    }

    public function getApiUrl()
    {
        return $this->base_url . '/api/' . $this->version;
    }
}
