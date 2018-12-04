<?php

namespace App;
use App\traits\KeyCheckTrait;
use App\exceptions\KeyValueStoreNotArrayException;

final class KeyValueStoreArray implements KeyValueStoreInterface
{
    private $storeArr = [];

    public function __construct($array)
    {
        if (!is_array($array)) {
            throw new KeyValueStoreNotArrayException(\printf("You should use array in parameter \n"));
        }
        $this->storeArr = $array;
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
        }
    }

    /**
     * Removes all keys and their values from the storage.
     */
    public function clear()
    {
        $this->storeArr = [];
    }
}
