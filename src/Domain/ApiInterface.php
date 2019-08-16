<?php

/**
 * Defines functions for retrieving API settings
 * @author Randy D. Layne <randydavidl78@gmail.com>
 */

namespace App\Domain;

interface ApiInterface
{
    /**
     * @return string The url of the base route
     */
    public function getBaseUrl(): string;

    /**
     * @return string The Api's version number
     */
    public function getVersion(): string;

    /**
     * @return string The url of the current api version's main route
     */
    public function getApiUrl(): string;
}
