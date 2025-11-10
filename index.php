<?php

use Velas\Echox\Html;

use function Velas\Echox\Functions\renderHTML;

include 'vendor/autoload.php';

if (!function_exists('hexToRGB')) 
{
    function hexToRGB(string $hexColor, float $alpha = 0.5) : object 
    {
        $hex = ltrim($hexColor, '#');
        if (strlen($hex) === 3) {
            $r = hexdec(str_repeat(substr($hex, 0, 1), 2));
            $g = hexdec(str_repeat(substr($hex, 1, 1), 2));
            $b = hexdec(str_repeat(substr($hex, 2, 1), 2));
        } else {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
        }
        return (object) [
            'structure' => ['r' => $r, 'g' => $g, 'b' => $b, 'a' => $alpha],
            'rgba' => "rgba($r, $g, $b, $alpha)",
            'modern' => 'rgb(from '.$hexColor.' r g b / 0.5)'
        ];
    }

}

Html::$baseFolder = './src/views/';
$sources = array_map(function (object $service) : Html{
    $service->cssColors = hexToRGB($service->color, 0.7);
    return renderHTML('components/service-card', [
        'service' => $service
    ]);
}, array_filter(json_decode(file_get_contents('./src/sources/services.json')), function (object $s) {
    return $s->active;
}));

echo renderHTML('main', [
    'services' => $sources,
]);