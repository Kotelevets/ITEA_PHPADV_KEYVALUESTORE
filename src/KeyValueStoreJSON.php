<?php

namespace App;

final class KeyValueStoreJSON extends AbstractKeyValueStoreFile implements KeyValueStoreInterface
{

    protected function openFromFile()
    {
        return json_decode(file_get_contents($this->filename), true);
    }

    protected function saveToFile()
    {
        return file_put_contents($this->filename, json_encode($this->storeArr));
    }
}

