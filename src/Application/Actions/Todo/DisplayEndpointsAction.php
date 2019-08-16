<?php

namespace App\Application\Actions\Todo;

use App\Application\Actions\Action;
use App\Domain\ApiInterface;
use Psr\Log\LoggerInterface;
use Psr\Http\Message\ResponseInterface as Response;

class DisplayEndpointsAction extends Action
{
    protected $api;

    public function __construct(LoggerInterface $logger, ApiInterface $api)
    {
        parent::__construct($logger);
        $this->api = $api;
    }

    protected function action(): Response
    {

        $base_url = $this->api->getBaseUrl();
        $api_url = $this->api->getApiUrl();
        $endpoints = [
            'all todos' => [
                'url' => $api_url . '/todos',
                'method' => 'GET'
            ],
            'create todo' => [
                'url' => $api_url . '/todos',
                'method' => 'POST'
            ],
            'single todo' => [
                'url' => $api_url . '/todos{id}',
                'method' => 'GET'
            ],
            'update todo' => [
                'url' => $api_url . '/todos/{id}',
                'method' => 'PUT'
            ],
            'delete todo' => [
                'url' => $api_url . '/todos/{id}',
                'method' => 'DELETE'
            ],
            'help' => [
                'url' =>  $base_url,
                'method' => 'GET'
            ]
        ];
        $data = [
            'endpoints' => $endpoints,
            'version' => $this->api->getVersion(),
            'timestamp' => time()
        ];

        $this->logger->info('Endpoints have been viewed');

        return $this->respondWithData($data);
    }
}
