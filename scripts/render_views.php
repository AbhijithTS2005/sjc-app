<?php
require __DIR__ . '/../vendor/autoload.php';

$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$views = [
    ['view' => 'academics.physics.syllabus', 'dept' => 'physics', 'page' => 'syllabus'],
    ['view' => 'academics.economics.syllabus', 'dept' => 'economics', 'page' => 'syllabus'],
];

foreach ($views as $v) {
    echo "===Rendering {$v['view']}===\n";
    try {
        echo app('view')->make($v['view'], ['dept' => $v['dept'], 'page' => $v['page']])->render();
    } catch (Throwable $e) {
        echo "ERROR: " . $e->getMessage() . "\n";
    }
    echo "\n===DONE===\n\n";
}
