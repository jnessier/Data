<?php


namespace Neoflow\Data;

interface DataInterface
{
    /**
     * Apply callback.
     *
     * @param callable $callback Callback to apply
     * @param array $args Additional arguments for the callback
     *
     * @return mixed
     */
    public function apply(callable $callback, array $args = []);

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
    public function deleteValue(string $key): void;

    /**
     * Iterate trough each value
     *
     * @param callable $callback Callback for each value
     * @return mixed
     */
    public function each(callable $callback);

    /**
     * Get value by key.
     *
     * @param string $key Key as identifier of the value
     * @param mixed $default Default value, when key doesn't exists
     * @param bool $delete Set TRUE to delete value afterwards
     *
     * @return mixed
     */
    public function getValue(string $key, $default = null, bool $delete = false);

    /**
     * Check whether value exists by key.
     *
     * @param string $key Key as identifier of the value
     *
     * @return bool
     */
    public function hasValue(string $key): bool;

    /**
     * Merge values. Existing values with similar keys will be overwritten.
     *
     * @param array $values Values to merge
     * @param bool $recursive Set TRUE to enable recursive merge
     *
     * @return self
     */
    public function merge(array $values, bool $recursive = true): self;

    /**
     * Set values. Existing values will be overwritten.
     *
     * @param array $values Values to set
     *
     * @return self
     */
    public function set(array $values): self;

    /**
     * Set referenced values. Existing values will be overwritten.
     *
     * @param array $values Values to set referenced
     *
     * @return self
     */
    public function setReference(array &$values): self;

    /**
     * Set value by key.
     *
     * @param string $key Key as identifier of the value
     * @param mixed $value Value to set
     * @param bool $overwrite Set FALSE to prevent overwrite existing value
     *
     * @return self
     */
    public function setValue(string $key, $value, bool $overwrite = true): self;

    /**
     * Get values as array.
     *
     * @return array
     */
    public function toArray(): array;
}
