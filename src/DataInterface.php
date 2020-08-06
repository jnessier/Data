<?php


namespace Neoflow\Data;

interface DataInterface
{

    /**
     * Clear values.
     */
    public function clearValues(): void;

    /**
     * Count number of values.
     *
     * @return int
     */
    public function countValues(): int;

    /**
     * Delete value by key.
     *
     * @param string $key Key as identifier of the value
     */
    public function deleteValue(string $key): void;

    /**
     * Iterate trough values.
     *
     * @param callable $callback Callback for each key/value pair
     *
     * @return mixed
     */
    public function eachValue(callable $callback): void;

    /**
     * Get value by key.
     *
     * @param string $key Key as identifier of the value
     * @param mixed $default Default value, when key doesn't exists
     *
     * @return mixed
     */
    public function getValue(string $key, $default = null);

    /**
     * Get values as array.
     *
     * @return array
     */
    public function getValues(): array;

    /**
     * Check whether value exists by key.
     *
     * @param string $key Key as identifier of the value
     *
     * @return bool
     */
    public function hasValue(string $key): bool;

    /**
     * Pull value by key and delete it afterwards.
     *
     * @param string $key Key as identifier of the value
     * @param mixed $default Default value, when key doesn't exists
     *
     * @return mixed
     */
    public function pullValue(string $key, $default = null);

    /**
     * Replace values by key. Existing values with similar keys will be overwritten.
     *
     * @param array $values Array with key/value pairs
     * @param bool $recursive Set TRUE to enable recursive merge
     *
     * @return self
     */
    public function replaceValues(array $values, bool $recursive = true): DataInterface;

    /**
     * Set referenced array as values. Existing values will be overwritten.
     *
     * @param array $values Array with key/value pairs
     *
     * @return self
     */
    public function setReferencedValues(array &$values): DataInterface;

    /**
     * Set value by key.
     *
     * @param string $key Key as identifier of the value
     * @param mixed $value Value to set
     * @param bool $overwrite Set FALSE to prevent overwrite existing value
     *
     * @return self
     */
    public function setValue(string $key, $value, bool $overwrite = true): DataInterface;

    /**
     * Set array as values. Existing values will be overwritten.
     *
     * @param array $values Array with key/value pairs
     *
     * @return self
     */
    public function setValues(array $values): DataInterface;
}
