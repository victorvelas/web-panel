<?php

use Velas\Echox\Html;

use function Velas\Echox\Functions\renderHTML;

include 'vendor/autoload.php';

Html::$baseFolder = './src/views/';
$sources = array_map(function (object $service) {
    return $service;
    return renderHTML('components/service-card', [
        'service' => $service
    ]);
}, json_decode(file_get_contents('./src/sources/services.json')));

echo renderHTML('main', [
    'services' => $sources,
]);