<?php


namespace Neoflow\Data;

class Data implements DataInterface
{
    /**
     * @var array
     */
    protected $values = [];

    /**
     * Constructor.
     *
     * @param array|null $values Initial values
     */
    public function __construct(array $values = null)
    {
        if (!is_null($values)) {
            $this->values = $values;
        }
    }

    /**
     * {@inheritDoc}
     */
    public function count(): int
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
    public function hasValue(string $key): bool
    {
        return isset($this->values[$key]);
    }

    /**
     * {@inheritDoc}
     */
    public function merge(array $values, bool $recursive = true): DataInterface
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
    public function set(array $values): DataInterface
    {
        $this->values = $values;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return (array)$this->values;
    }

    /**
     * {@inheritDoc}
     */
    public function setReference(array &$values): DataInterface
    {
        $this->values = &$values;

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
