<?php declare(strict_types=1);

namespace Maltehuebner\WarmingStripesCss\Converter;

use Maltehuebner\WarmingStripesCss\Converter\Image\ImageFactory;
use Maltehuebner\WarmingStripesCss\Converter\Stripe\StripeListToStringConverter;

require_once '../vendor/autoload.php';

$filename = $argv[1];

$image = ImageFactory::createFromFile($filename);

$stripeList = ImageAnalyzer::analyze($image);

ImageFactory::destroy($image);

$stripeList = PositionCalculator::calculate($stripeList);

echo StripeListToStringConverter::toString($stripeList);
