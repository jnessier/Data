<?php


namespace Neoflow\Data;

class Data implements DataInterface
{
    /**
     * Traits
     */
    use DataTrait;

    /**
     * Constructor.
     *
     * @param array|null $values Array with key/value pairs
     */
    public function __construct(array $values = null)
    {
        if (!is_null($values)) {
            $this->setValues($values);
        }
    }

    /**
     * Set referenced array as values. Existing values will be overwritten.
     *
     * @param array $values Array with key/value pairs
     *
     * @return self
     */
    public function setReferencedValues(array &$values): self
    {
        $this->values = &$values;

        return $this;
    }
}
