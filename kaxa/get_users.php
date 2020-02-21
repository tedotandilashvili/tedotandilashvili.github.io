<?php
$files = [
    'afterhome.xls',
    'afterhome.php'
];

foreach ($files as $file) {
    if (file_exists($file)) {
        unlink($file);
    } else {
        // File not found.
    }
}
?>