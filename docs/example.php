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
// $balance = (new \MarketScanner\Model\Balance($key))->getBalance();

echo "<b>Balance</b><br>";
echo "Current: {$balance}<br>";

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

$reviews = $scanner->getReviews($productId, 10, 4);
// $reviews = $scanner->getReviews($productId);

echo "<b>Reviews:</b><br>";

foreach ($reviews as $review) {
    echo $review->uid . '<br>';
    echo $review->author . '<br>';
    echo $review->avatar . '<br>';
    echo $review->rating . '<br>';
    echo $review->pluses . '<br>';
    echo $review->minuses . '<br>';
    echo $review->comment . '<br>';
    echo $review->postdate . '<br>';

    if ($review->pictures) {
        foreach ($review->pictures as $picture) {
            echo $picture . '<br>';
        }
    }

    if ($review->subcomments) {
        foreach ($review->subcomments as $subcommentIndex => $subcomment) {
            echo $subcomment->author . '<br>';
            echo $subcomment->comment . '<br>';
            echo $subcomment->postdate . '<br>';
            echo $subcomment->avatar . '<br>';
        }
    }

    echo '<hr>';
}

$photos = $scanner->getPhotos($productId);
// $photos = $scanner->getPhotos($productId, '50x50');
// $photos = (new \MarketScanner\Model\Photos($key, $productId))->getPictures('original');

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

