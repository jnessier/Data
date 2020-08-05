<?php


namespace Neoflow\Data;

use ArrayAccess;

interface DataInterface
{
    /**
     * Count number of values in data.
     *
     * @return int
     */
    public function countValues(): int;

    /**
     * Delete value by key from data.
     *
     * @param string $key Key as identifier of the value
     */
    public function deleteValue(string $key): void;

    /**
     * Get value by key from data.
     *
     * @param string $key Key as identifier of the value
     * @param mixed $default Default value, when key doesn't exists
     * @param bool $delete Set TRUE to delete value afterwards
     *
     * @return mixed
     */
    public function getValue(string $key, $default = null, bool $delete = false);

    /**
     * Check whether value exists by key in data.
     *
     * @param string $key Key as identifier of the value
     *
     * @return bool
     */
    public function hasValue(string $key): bool;

    /**
     * Merge data. Existing values with similar keys will be overwritten.
     *
     * @param ArrayAccess|array $data Data to merge
     * @param bool $recursive Set FALSE to prevent recursive merge
     *
     * @return self
     */
    public function mergeData($data, bool $recursive = true): self;

    /**
     * Set data. Existing data will be overwritten.
     *
     * @param ArrayAccess|array $data Data to set
     *
     * @return self
     */
    public function set($data): self;

    /**
     * Set referenced data. Existing data will be overwritten.
     *
     * @param ArrayAccess|array $data Data to set as reference
     *
     * @return self
     */
    public function setReference(&$data): self;

    /**
     * Set value by key into data.
     *
     * @param string $key Key as identifier of the value
     * @param mixed $value Value to add into data
     * @param bool $overwrite Set FALSE to prevent overwrite existing value
     *
     * @return self
     */
    public function setValue(string $key, $value, bool $overwrite = true): self;

    /**
     * Get data as array.
     *
     * @return array
     */
    public function toArray(): array;
}
