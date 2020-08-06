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
}
