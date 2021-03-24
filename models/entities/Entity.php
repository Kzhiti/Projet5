<?php


namespace Entities;


abstract class Entity
{
    protected $id;

    public function __construct(array $data = null) {
        if($data) {
            $this->hydrate($data);
        }
    }

    protected function hydrate($data) {
        foreach($data as $key=>$value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($new_id) {
        $this->id = $new_id;
    }
}