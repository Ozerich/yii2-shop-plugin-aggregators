<?php

namespace ozerich\shop\plugins\onliner\sdk\models;

class Manufacture
{
    private $id;

    private $name;

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($value)
    {
        $this->name = $value;
    }

    public function getName()
    {
        return $this->name;
    }

    public function toJSON()
    {
        return [
            'id' => $this->id,
            'name' => $this->name
        ];
    }
}
