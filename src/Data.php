<?php


namespace Neoflow\Data;


use ArrayAccess;
use Neoflow\Data\Exception\InvalidDataException;

class Data implements DataInterface
{

    /**
     * @var ArrayAccess|array
     */
    protected $data = [];

    /**
     * Constructor.
     *
     * @param ArrayAccess|array|null $data Initial data
     *
     * @throws InvalidDataException
     */
    public function __construct($data = null)
    {
        if (!is_null($data)) {
            $this->data = $this->validateData($data);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function countValues(): int
    {
        return count((array)$this->data);
    }

    /**
     * {@inheritDoc}
     */
    public function deleteValue(string $key): void
    {
        if ($this->hasValue($key)) {
            unset($this->data[$key]);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getValue(string $key, $default = null, bool $delete = false)
    {
        if ($this->hasValue($key)) {
            $value = $this->data[$key];
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
        return isset($this->data[$key]);
    }

    /**
     * {@inheritDoc}
     *
     * @throws InvalidDataException
     */
    public function mergeData($data, bool $recursive = true): DataInterface
    {
        $data = $this->validateData($data);

        if ($recursive) {
            $this->data = array_replace_recursive($this->data, $data);
        } else {
            $this->data = array_replace($this->data, $data);
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function setValue(string $key, $value, bool $overwrite = true): DataInterface
    {
        if ($overwrite || !$this->hasValue($key)) {
            $this->data[$key] = $value;
        }

        return $this;
    }

    /**
     * {@inheritDoc}
     *
     * @throws InvalidDataException
     */
    public function set($data): DataInterface
    {
        $this->data = $this->validateData($data);

        return $this;
    }

    /**
     * {@inheritDoc}
     *
     * @throws InvalidDataException
     */
    public function setReference(&$data): DataInterface
    {
        $data = $this->validateData($data);

        $this->data = &$data;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return (array)$this->data;
    }

    /**
     * Resolve data.
     *
     * @param ArrayAccess|array $data Data to validate
     *
     * @return ArrayAccess|array
     *
     * @throws InvalidDataException
     */
    protected function validateData($data)
    {
        if (!is_array($data) && !$data instanceof ArrayAccess) {
            throw new InvalidDataException();
        }
        return $data;
    }

}