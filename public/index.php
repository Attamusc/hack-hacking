<?hh namespace app;
require_once '../vendor/autoload.php';

require_once '../lib/Router.php';

use \HH\Map;
use \lib\Router;

$app = new \Slim\Slim();

Router::loadRoutes();
Router::generateRoutingTable($app, Map {
  'get /' => '\app\Test::index',
  'get /hello' => '\app\Test::blankHello',
  'get /hello/:name' => '\app\Test::namedHello'
});

$app->run();
