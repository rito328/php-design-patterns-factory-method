<?php

namespace App\DataReader\Readers;

use App\DataReader\Interfaces\DataReaderInterface;

class SplitDataReader implements DataReaderInterface
{
    protected $regions;
    protected $prefectures;

    public function __construct($json_array)
    {
        $this->regions = $this->convert($json_array[0]);
        $this->prefecture = $this->convert($json_array[1]);
    }

    public function convert($json_url)
    {
        return json_decode(file_get_contents($json_url));
    }

    public function show()
    {
        foreach ($this->regions as $r) {
            echo $r->name . "<br>";
            $region_id = $r->id;
            foreach ($this->prefecture->$region_id as $p) {
                echo $p->name . ' ';
            }
            echo "<br><br>";
        }
    }
}