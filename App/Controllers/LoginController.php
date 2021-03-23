<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class LoginController {
    public function Login(Request $request, Response $response, array $args){
        $data = $request->getParsedBody();
        if(empty($data['name'])){
            return $response->withStatus(401)->withJson([
                "error" => "Oops, ocorreu um erro e não foi possível iniciar!"
            ]);
        }
        if(empty($data['image'])){
            return $response->withStatus(401)->withJson([
                "error" => "Oops, ocorreu um erro e não foi possível iniciar!"
            ]);
        }
        $token = [
            'name' => $data['name'],
            'image' => $data['image']
        ];
        if($_SESSION['token'] = $token){
            return $response->withStatus(302)->withHeader('Location', './');
        } else {
            return $response->withStatus(401)->withJson([
                "error" => "Oops, ocorreu um erro e não foi possível iniciar!"
            ]);
        }
    }
    public function Logout(Request $request, Response $response, array $args){
        if(session_destroy()){
            return $response->withStatus(302)->withHeader('Location', './login');
        }
    }
}
