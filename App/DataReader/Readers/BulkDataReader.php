<?php

namespace App\DataReader\Readers;

use App\DataReader\Interfaces\DataReaderInterface;

class BulkDataReader implements DataReaderInterface
{
    protected $data;

    public function __construct($json)
    {
        $this->data = $this->convert($json);
    }

    public function convert($json_url)
    {
        return json_decode(file_get_contents($json_url));
    }

    public function show()
    {
        foreach ($this->data as $d) {
            echo $d->name . "<br>";
            foreach ($d->prefecture As $c) {
                echo $c->name . " ";
            }
            echo "<br><br>";
        }
    }
}