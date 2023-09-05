<?php

namespace DataHandler;

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
     * @param bool $recursive Set FALSE to disable recursive array handling
     */
    public function __construct(array $values = null, bool $recursive = true)
    {
        if (!is_null($values)) {
            $this->setAll($values);
        }

        $this->recursive = $recursive;
    }
}
