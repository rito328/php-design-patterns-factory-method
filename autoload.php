<?php

function scanFiles($dir) {
    $list = $tmp = array();
    foreach(glob( $dir. '*/', GLOB_ONLYDIR) as $child_dir) {
        if ($tmp = scanFiles($child_dir)) {
            $list = array_merge($list, $tmp);
        }
    }

    foreach(glob($dir . '{*.php}', GLOB_BRACE) as $path) {
        $list[] = $path;
    }

    return $list;
}

$require_dir_list = [
    'App'
];
$list = [];
foreach ($require_dir_list as $path) {
    $list = array_merge($list, scanFiles($path));
}

foreach ($list as $file_path) {
    require_once $file_path;
}