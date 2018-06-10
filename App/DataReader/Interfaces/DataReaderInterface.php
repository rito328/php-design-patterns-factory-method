<?php

namespace App\DataReader\Interfaces;

interface DataReaderInterface
{
    public function convert($json_url);
    public function show();
}