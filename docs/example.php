<?php

include __DIR__ . '/../src/vendor/autoload.php';

/**
 * Settings
 */
$key = '<auth_key>';
$productId = 415763024;

/**
 * Init base class
 */
$scanner = new \MarketScanner\Scanner($key);

$balance = $scanner->getBalance();
// $balance = new \MarketScanner\Model\Balance($key);

echo "<b>Balance</b><br>";
echo "Current: {$balance->getBalance()}<br>";

$info = $scanner->getInfo($productId);
// $info = new \MarketScanner\Model\Info($key, $productId);

echo "<b>Info</b><br>";
echo "Name: {$info->getName()}<br>";
echo "Price: {$info->getPrice()}<hr>";

// All methods:
//
// $info->getName()
// $info->getUrl()
// $info->getCategoryId()
// $info->getBrandId()
// $info->getSpecsQuantity()
// $info->getReviewsQuantity()
// $info->getPhotosQuantity()
// $info->getRating()
// $info->getModof()
// $info->getPrice()
// $info->getPriceUpdated()

$photos = $scanner->getPhotos($productId);
// $photos = (new \MarketScanner\Model\Photos($key, $productId))->getPictures();

echo "<b>Photos</b><br>";

foreach ($photos as $photoNumber => $photoCollection) {
    foreach ($photoCollection as $photoItem) {
        echo $photoItem->size . '  ' . $photoItem->url . '<br>';
    }

    echo "<br>";
}

echo "<hr>";

$specs = $scanner->getSpecs($productId);
// $specs = (new \MarketScanner\Model\Specs($key, $productId))->getSpecifications();

echo "<b>Specifications</b><br><br>";

foreach ($specs as $specNumber => $specCollection) {

    foreach ($specCollection as $specCollectionNumber => $specCollectionItem) {

        if (is_string($specCollectionItem)) {
            echo '<b>' . $specCollectionItem . '</b><br>';
        }

        if (is_array($specCollectionItem)) {
            foreach ($specCollectionItem as $specCollectionItemParams) {

                echo $specCollectionItemParams->name . ' - "' . $specCollectionItemParams->value . '"<br>';
            }
        }

    }
}

