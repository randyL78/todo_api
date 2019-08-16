<?php

/**
 * Stores the Api's setting info as a dependency injection
 * @author Randy D. Layne <randydavidl78@gmail.com>
 */

namespace App\Domain;

class Api implements ApiInterface
{
    /**
     * @var string The root url of the API
     */
    protected $base_url;
    /**
     * @var string The current version of the API
     */
    protected $version;

    /**
     * @param array $settings
     */
    public function __construct($settings)
    {
        $this->base_url = $settings['base_url'];
        $this->version = $settings['version'];
    }

    /**
     * @inheritDoc
     */
    public function getBaseUrl(): string
    {
        return $this->base_url;
    }

    /**
     * @inheritDoc
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @inheritDoc
     */
    public function getApiUrl(): string
    {
        return $this->base_url . '/api/' . $this->version;
    }
}
