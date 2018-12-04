<?php

namespace App;

use Symfony\Component\Yaml\Yaml;

final class KeyValueStoreYAML extends AbstractKeyValueStoreFile implements KeyValueStoreInterface
{
    protected function openFromFile()
    {
        return Yaml::parseFile($this->filename);
    }

    protected function saveToFile()
    {
        return file_put_contents($this->filename, Yaml::dump($this->storeArr));
    }
}

