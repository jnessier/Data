<?php


namespace Neoflow\Data;

abstract class AbstractData implements DataInterface
{
    /**
     * @var array
     */
    protected $values = [];

    /**
     * {@inheritDoc}
     */
    public function countValues(): int
    {
        return count((array)$this->values);
    }

    /**
     * {@inheritDoc}
     */
    public function deleteValue(string $key): void
    {
        if ($this->hasValue($key)) {
            unset($this->values[$key]);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function eachValue(callable $callback)
    {
        $values = $this->values;

        return array_walk($values, $callback);
    }

    /**
     * {@inheritDoc}
     */
    public function getValue(string $key, $default = null, bool $delete = false)
    {
        if ($this->hasValue($key)) {
            $value = $this->values[$key];
            if ($delete) {
                $this->deleteValue($key);
            }

            return $value;
        }

        return $default;
    }

    /**
     * {@inheritDoc}
     */
    public function getValues(): array
    {
        return (array)$this->values;
    }

    /**
     * {@inheritDoc}
     */
    public function setValues(array $values): DataInterface
    {
        $this->values = $values;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function hasValue(string $key): bool
    {
        return isset($this->values[$key]);
    }

    /**
     * {@inheritDoc}
     */
    public function mergeValues(array $values, bool $recursive = true): DataInterface
    {
        if ($recursive) {
            $this->values = array_replace_recursive($this->values, $values);
        } else {
            $this->values = array_replace($this->values, $values);
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setValue(string $key, $value, bool $overwrite = true): DataInterface
    {
        if ($overwrite || !$this->hasValue($key)) {
            $this->values[$key] = $value;
        }

        return $this;
    }
}
