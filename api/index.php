<?php
echo "Index PHP Version: " . PHP_VERSION;
exit;

// Create a writable directory for compiled Blade templates in serverless /tmp
if (!is_dir('/tmp/views')) {
    mkdir('/tmp/views', 0755, true);
}

// Forward all requests to the Laravel public index entry point
require __DIR__ . '/../public/index.php';
