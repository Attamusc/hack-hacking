<?hh namespace lib;

use \HH\Map;

class Router {
  public static function loadRoutes() {
    // Load all the routes into the global namespace
    foreach (glob($_SERVER['DOCUMENT_ROOT'] . "../app/routes/*.hh") as $filename) {
      require_once $filename;
    }
  }

  public static function generateRoutingTable(\Slim\Slim $app, Map<string, string> $routes) {
    foreach ($routes as $route => $func) {
      list($verb, $uri) = explode(' ', $route);
      call_user_func_array([$app, $verb], [$uri, (...) ==> call_user_func_array($func, func_get_args())]);
    }
  }
}
