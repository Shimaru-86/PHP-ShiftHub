<?php
class Route {
  private static $routes = [];

  public static function get($url, $callback, $middlewares = []) {
    self::$routes['GET'][$url] = compact('callback', 'middlewares');
  }

  public static function dispatch() {
    $requestedUrl = isset($_GET['url']) ? '/' . trim($_GET['url'], '/') : '/';
    $method = $_SERVER['REQUEST_METHOD'];

    if (isset(self::$routes[$method][$requestedUrl])) {
      $route = self::$routes[$method][$requestedUrl];
      $callback = $route['callback'];
      $middlewares = $route['middlewares'];

      // Encadeia middlewares
      $next = function () use ($callback) {
          return call_user_func($callback);
      };

      foreach (array_reverse($middlewares) as $middleware) {
        $next = function () use ($middleware, $next) {
          return call_user_func([$middleware, 'handle'], $next);
        };
      }
      
      echo $next();
    } else {
      http_response_code(404);
      echo "Página não encontrada.";
    }
  }
}
?>