<?php
use Slim\Http\Request;
use Slim\Http\Response;

require_once __DIR__ . "/../vendor/autoload.php";

$app = new \Slim\App();

$app->get(
    "/person/{id}",
    function (Request $request, Response $response, array $args){
        $response = $response->withJson(
            [
                "first_name" => "Mark",
                "last_name" => "Bradley",
            ],
            200
        );
        $response = $response->withHeader("Content-Type", "application/json");

        return $response;
    });

$app->run();

