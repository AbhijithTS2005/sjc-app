<?php
$root = __DIR__ . '/../resources/views/academics';
$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($root));
$changed = [];
foreach ($files as $file) {
    if (!$file->isFile()) continue;
    if (pathinfo($file->getFilename(), PATHINFO_EXTENSION) !== 'php') continue;
    $path = $file->getRealPath();
    $content = file_get_contents($path);
    if (strpos($content, 'Explore Other Programs') === false) continue;

    // Find the sidebar section that contains Explore Other Programs
    $pattern = '/<div\s+class="sidebar-section">[\s\S]*?<div\s+class="sidebar-title">\s*Explore Other Programs\s*<\/div>[\s\S]*?<\/div>/i';
    $new = preg_replace($pattern, "@include('partials.explore-programs', ['dept' => \$dept])", $content, -1, $count);
    if ($count > 0 && $new !== null) {
        file_put_contents($path, $new);
        $changed[] = $path;
    }
}

if (count($changed) === 0) {
    echo "No files changed.\n";
} else {
    echo "Updated files:\n" . implode("\n", $changed) . "\n";
}
