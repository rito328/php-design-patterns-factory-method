<?php
require_once 'autoload.php';

use App\DataReader\Factories\ReaderFactory;

$factory = new ReaderFactory();

// パターンA　１つのjsonファイルを処理する
$json = 'App/files/japan.json';
$pattern_a = $factory->create($json);
$pattern_a->show();

echo "<hr>";

// パターンB　２つのjsonファイルを処理する
$json_array[] = 'App/files/region.json';
$json_array[] = 'App/files/prefectures.json';
$pattern_b = $factory->create($json_array);
$pattern_b->show();
