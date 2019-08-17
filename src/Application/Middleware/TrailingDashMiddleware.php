<?php

/**
 * from the Slim Frameork doc under cookbook.
 * ! Doesn't work - middleware not being called before routes handler
 * ! Even though it is listed first in the index.php file
 */


declare(strict_types=1);

namespace App\Application\Middleware;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\MiddlewareInterface as Middleware;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

class TrailingDashMiddleware implements Middleware
{
    /**
     * {@inheritdoc}
     */
    public function process(Request $request, RequestHandler $handler): Response
    {
        $uri = $request->getUri();
        $path = $uri->getPath();

        if ($path != '/' && substr($path, -1) == '/') {

            // permanently redirect paths with a trailing slash
            // to their non-trailing counterpart
            $uri = $uri->withPath(substr($path, 0, -1));

            if ($request->getMethod() == 'GET') {
                $response = new \Slim\Psr7\Response();
                return $response
                    ->withHeader('Location', (string) $uri)
                    ->withStatus(301);
            } else {
                $request = $request->withUri($uri);
            }
        }

        return $handler->handle($request);
    }
}
