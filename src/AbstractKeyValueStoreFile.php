<?php

namespace App;

use App\exceptions\KeyValueStoreDirException;
use App\exceptions\KeyValueStoreFileException;
use App\traits\KeyCheckTrait;

abstract class AbstractKeyValueStoreFile implements KeyValueStoreInterface
{
    protected $filename;
    protected $storeArr;

    public function __construct($filename)
    {
        // TODO: Filename exception logic
        if ("/"===\substr($filename, -1)) {
            throw new KeyValueStoreDirException(\sprintf("%s it's directory, enter filename", $filename));
        } elseif (!\file_exists($filename)) {
            throw new KeyValueStoreFileException(\sprintf("File %s doesn't exists, enter right filename", $filename));
        } else {
            $this->filename = $filename;
            $this->storeArr = $this->openFromFile();
            if(is_null($this->storeArr)){
                $this->storeArr = [];
            }
        }
    }

    /**
     * Stores value by key.
     *
     * @param string $key Name of the key.
     * @param mixed $value Value to store.
     */
    public function set($key, $value)
    {
        KeyCheckTrait::keyValidate($key);
        $this->storeArr[$key] = $value;
        $this->saveToFile();
    }

    /**
     * Gets value by key.
     *
     * @param string $key Name of the key.
     * @param null|mixed $default Default value.
     *
     * @return mixed Can be of any type: int, string, null, array, e.g.
     * If value does not exist for provided key, $default will be returned.
     */
    public function get($key, $default = null)
    {
        KeyCheckTrait::keyValidate($key);
        if($this->has($key)) {
            return $this->storeArr[$key];
        }
        return $default;
    }

    /**
     * Checks whether value is exist by key.
     *
     * @param string $key Name of key.
     *
     * @return bool Returns true if key exists, false otherwise.
     */
    public function has($key): bool
    {
        KeyCheckTrait::keyValidate($key);
        return array_key_exists($key, $this->storeArr);
    }

    /**
     * Removes value by key.
     *
     * @param string $key Name of key.
     */
    public function remove($key)
    {
        KeyCheckTrait::keyValidate($key);
        if($this->has($key)) {
            unset($this->storeArr[$key]);
            $this->saveToFile();
        }
    }

    /**
     * Removes all keys and their values from the storage.
     */
    public function clear()
    {
        $this->storeArr = [];
        $this->saveToFile();
    }

    /**
     * @return mixed
     */
    abstract protected function openFromFile();

    /**
     * @return mixed
     */
    abstract protected function saveToFile();

}

