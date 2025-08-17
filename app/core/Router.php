<?php
namespace App\Core;

class Router {
    private array $routes = [];

    public function add(string $method, string $pattern, callable $handler): void {
        $this->routes[] = [$method, $this->compile($pattern), $handler, $pattern];
    }

    private function compile(string $pattern): string {
        // تحويل /users/{id} إلى تعبير نمطي
        $regex = preg_replace('#\\{([a-zA-Z_][a-zA-Z0-9_]*)\\}#', '(?P<$1>[^/]+)', $pattern);
        return '#^' . $regex . '$#';
    }

    public function dispatch(Request $req, Response $res) {
        $path = $req->path;
        $method = $req->method;
        foreach ($this->routes as [$m, $regex, $handler, $pattern]) {
            if ($m === $method && preg_match($regex, $path, $matches)) {
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                return $handler($req, $res, $params);
            }
        }
        http_response_code(404);
        echo "Route not found for {$method} {$path}";
    }
}
