<?php
namespace App\Core;

class Request {
    public string $method;
    public string $path;
    public array $query;
    public array $body;

    public function __construct() {
        $this->method = strtoupper($_SERVER['REQUEST_METHOD'] ?? 'GET');
        $uri = $_SERVER['REQUEST_URI'] ?? '/';
        $qpos = strpos($uri, '?');
        $this->path = $qpos === false ? $uri : substr($uri, 0, $qpos);
        $this->query = $_GET ?? [];
        // دعم JSON body
        $contentType = $_SERVER['CONTENT_TYPE'] ?? '';
        if (stripos($contentType, 'application/json') !== false) {
            $raw = file_get_contents('php://input');
            $json = json_decode($raw, true);
            $this->body = is_array($json) ? $json : [];
        } else {
            $this->body = $_POST ?? [];
        }
    }
}
