<?php

namespace App\DataReader\Factories;

use App\DataReader\Readers\BulkDataReader;
use App\DataReader\Readers\SplitDataReader;

class ReaderFactory
{
    public function create($json)
    {
        return $this->createReader($json);
    }

    public function createReader($json)
    {
        if(is_array($json)) {
            return new SplitDataReader($json);
        } else {
            return new BulkDataReader($json);
        }
    }
}