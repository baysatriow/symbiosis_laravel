<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

if ($response->status() == 200) {
    echo "Homepage rendered successfully!";
    $content = $response->getContent();
    if (strpos($content, 'Youtube Channel') !== false) {
        echo " Data 'Youtube Channel' found in view.";
    } else {
        echo " Data 'Youtube Channel' NOT found in view.";
    }
} else {
    echo "Homepage failed to render. Status: " . $response->status();
}
