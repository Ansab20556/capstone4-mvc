<?php
namespace App\Core;

class Response {
    public function json($data, int $code = 200): void {
        http_response_code($code);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    public function redirect(string $url): void {
        header('Location: ' . $url);
        exit;
    }
}
