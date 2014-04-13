<?hh
require_once '../vendor/autoload.php';

require_once '../lib/Router.hh';

use \HH\Map;

$app = new \Slim\Slim();

Router::loadRoutes();
Router::generateRoutingTable($app, Map {
  'get /' => 'Test::index',
  'get /hello/:name' => 'Test::hello'
});

$app->run();
