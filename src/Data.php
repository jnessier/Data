<?php


namespace Neoflow\Data;

class Data extends AbstractData
{
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
}
