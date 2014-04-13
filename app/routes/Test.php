<?hh namespace app;

class Test {
  public static function index(): void {
    echo "Test of Hack with Slim";
  }

  public static function blankHello(): void {
    echo "Hello, user";
  }

  public static function namedHello(string $name): void {
    echo "Hello, $name";
  }
}
