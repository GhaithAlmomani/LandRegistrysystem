<?php

namespace MVC\core;

class Response
{
    public function setStatusCode(int $code): void {
        http_response_code($code);
    }
    public function json($data): void {
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}