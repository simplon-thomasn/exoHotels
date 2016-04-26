<?php

namespace exoHotels\Domain;

class Hotel
{
    /**
     * Hotel id.
     *
     * @var integer
     */
    private $id;

    /**
     * Hotel name.
     *
     * @var string
     */
    private $name;

    /**
     * Hotel address.
     *
     * @var string
     */
    private $address;

    /**
     * Hotel class.
     *
     * @var integer
     */
    private $class;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function getClass() {
      return $this->class;
    }

    public function setClass($class) {
      $this->class = $class;
    }
}
