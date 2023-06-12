<?php

namespace DataHandler;

trait DataTrait
{
    /**
     * @var array
     */
    protected array $values = [];

    /**
     * {@inheritDoc}
     */
    public function clear(): void
    {
        $this->values = [];
    }

    /**
     * {@inheritDoc}
     */
    public function count(): int
    {
        return count($this->values);
    }

    /**
     * {@inheritDoc}
     */
    public function delete(string $key): void
    {
        if ($this->has($key)) {
            unset($this->values[$key]);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function each(callable $callback): void
    {
        foreach ($this->values as $key => $value) {
            call_user_func_array($callback, [
                $value,
                $key
            ]);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function get(string $key, mixed $default = null): mixed
    {
        if ($this->has($key)) {
            return $this->values[$key];
        }

        return $default;
    }

    /**
     * {@inheritDoc}
     */
    public function getAll(): array
    {
        return $this->values;
    }

    /**
     * {@inheritDoc}
     */
    public function setAll(array $values): DataInterface
    {
        $this->values = $values;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function has(string $key): bool
    {
        return isset($this->values[$key]);
    }

    /**
     * {@inheritDoc}
     */
    public function pull(string $key, mixed $default = null): mixed
    {
        if ($this->has($key)) {
            $value = $this->get($key);
            $this->delete($key);
            return $value;
        }

        return $default;
    }

    /**
     * {@inheritDoc}
     */
    public function replace(array $values, bool $recursive = true): DataInterface
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
    public function setAllReferenced(array &$values): DataInterface
    {
        $this->values = &$values;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function set(string $key, mixed $value, bool $overwrite = true): DataInterface
    {
        if ($overwrite || !$this->has($key)) {
            $this->values[$key] = $value;
        }

        return $this;
    }
}
