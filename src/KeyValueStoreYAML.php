<?php

namespace App;


final class KeyValueStoreYAML implements KeyValueStoreInterface
{

    /**
     * Stores value by key.
     *
     * @param string $key Name of the key.
     * @param mixed $value Value to store.
     */
    public function set($key, $value)
    {
        // TODO: Implement set() method.
        KeyCheckTrait::keyValidate($key);
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
        // TODO: Implement remove() method.
        KeyCheckTrait::keyValidate($key);
    }

    /**
     * Removes all keys and their values from the storage.
     */
    public function clear()
    {
        // TODO: Implement clear() method.
    }
}
