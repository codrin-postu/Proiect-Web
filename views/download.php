<?php

/**
 * download.php
 */

if (!empty($_GET['file'])) {
    // Security, down allow to pass ANY PATH in your server
    $fileName = basename($_GET['file']);
} else {
    return;
}

$filePath = 'uploads/' . $fileName;
if (!file_exists($filePath)) {
    return;
}

header("Content-disposition: attachment; filename=" . $fileName);
header("Content-type: application/pdf");
readfile($filePath);
