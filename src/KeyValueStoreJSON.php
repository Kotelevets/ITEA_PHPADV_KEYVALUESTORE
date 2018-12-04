<?php

namespace App;


final class KeyValueStoreJSON implements KeyValueStoreInterface
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
        // TODO: Implement get() method.
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
        // TODO: Implement has() method.
    }

    /**
     * Removes value by key.
     *
     * @param string $key Name of key.
     */
    public function remove($key)
    {
        // TODO: Implement remove() method.
    }

    /**
     * Removes all keys and their values from the storage.
     */
    public function clear()
    {
        // TODO: Implement clear() method.
    }
}
