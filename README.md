# PHP SDK for Yandex.Market

A simple PHP SDK for service [market-scanner.ru](https://market-scanner.ru).

## Install

### git
Add the repository as a [submodule](https://git-scm.com/book/en/v2/Git-Tools-Submodules) to your project
```
$ git submodule add git://github.com/demyashev/market-scanner.git </path/to/clone>
```

### composer
Add these lines to the file `composer.json`

```
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/demyashev/market-scanner"
        }
    ],
    "require": {
        "demyashev/market-scanner": "@dev"
    }
}
```

## How to
```
include __DIR__ . '/../src/vendor/autoload.php';

$key = '<auth_key>';
$productId = 415763024;

$scanner = new \MarketScanner\Scanner($key);

$balance = $scanner->getBalance();
// $balance = (new \MarketScanner\Model\Balance($key))->getBalance();

$info = $scanner->getInfo($productId);
// $info = new \MarketScanner\Model\Info($key, $productId);

$photos = $scanner->getPhotos($productId);
// $photos = (new \MarketScanner\Model\Photos($key, $productId))->getPictures();

$specs = $scanner->getSpecs($productId);
// $specs = (new \MarketScanner\Model\Specs($key, $productId))->getSpecifications();
```

You can find more information in [example](/docs/example.php) file.

## License
[Apache 2.0](https://www.apache.org/licenses/LICENSE-2.0)