<?php

namespace DataHandler;

interface DataInterface
{
    /**
     * Clear values.
     */
    public function clear(): void;

    /**
     * Count number of values.
     *
     * @return int
     */
    public function count(): int;

    /**
     * Delete value by key.
     *
     * @param string $key Key as identifier of the value
     */
    public function delete(string $key): void;

    /**
     * Iterate trough values.
     *
     * @param callable $callback Callback for each key/value pair
     *
     * @return void
     */
    public function each(callable $callback): void;

    /**
     * Get value by key.
     *
     * @param string $key Key as identifier of the value
     * @param mixed $default Default value, when key doesn't exists
     *
     * @return mixed
     */
    public function get(string $key, mixed $default = null): mixed;

    /**
     * Get values as array.
     *
     * @return array
     */
    public function getAll(): array;

    /**
     * Check whether value exists by key.
     *
     * @param string $key Key as identifier of the value
     *
     * @return bool
     */
    public function has(string $key): bool;

    /**
     * Pull value by key and delete it afterwards.
     *
     * @param string $key Key as identifier of the value
     * @param mixed $default Default value, when key doesn't exists
     *
     * @return mixed
     */
    public function pull(string $key, mixed $default = null): mixed;

    /**
     * Replace values by key. Existing values with similar keys will be overwritten.
     *
     * @param array $values Array with key/value pairs
     * @param bool $recursive Set TRUE to enable recursive merge
     *
     * @return self
     */
    public function replace(array $values, bool $recursive = true): DataInterface;

    /**
     * Set referenced array as values. Existing values will be overwritten.
     *
     * @param array $values Array with key/value pairs
     *
     * @return self
     */
    public function setAllReferenced(array &$values): DataInterface;

    /**
     * Set value by key.
     *
     * @param string $key Key as identifier of the value
     * @param mixed $value Value to set
     * @param bool $overwrite Set FALSE to prevent overwrite existing value
     *
     * @return self
     */
    public function set(string $key, mixed $value, bool $overwrite = true): DataInterface;

    /**
     * Set array as values. Existing values will be overwritten.
     *
     * @param array $values Array with key/value pairs
     *
     * @return self
     */
    public function setAll(array $values): DataInterface;
}
