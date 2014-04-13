<?hh namespace app;

class Test {
  public static function index(): void {
    echo "Test of Hack with Slim";
  }

  public static function hello(string $name): void {
    echo "Hello, $name";
  }
}
