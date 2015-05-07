<?php
namespace desa\Model\Entity;

class auto {

    protected $_id;
    protected $_plate;
	protected $_departure;
    protected $_destination;
	protected $_carry;

    public function __construct(array $options = null) {
        if (is_array($options)) {
            $this->setOptions($options);
        }
    }

    public function __set($name, $value) {
        $method = 'set' . $name;
        if (!method_exists($this, $method)) {
            throw new Exception('Invalid Method');
        }
        $this->$method($value);
    }

    public function __get($name) {
        $method = 'get' . $name;
        if (!method_exists($this, $method)) {
            throw new Exception('Invalid Method');
        }
        return $this->$method();
    }

    public function setOptions(array $options) {
        $methods = get_class_methods($this);
        foreach ($options as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (in_array($method, $methods)) {
                $this->$method($value);
            }
        }
        return $this;
    }

    public function getId() {
        return $this->_id;
    }

    public function setId($id) {
        $this->_id = $id;
        return $this;
    }

    public function getPlate() {
        return $this->_plate;
    }

    public function setPlate($plate) {
        $this->_plate = $plate;
        return $this;
    }

    public function getDeparture() {
        return $this->_departure;
    }

    public function setDeparture($departure) {
        $this->_departure = $departure;
        return $this;
    }
	    public function getDestination() {
        return $this->_destination;
    }

    public function setDestination($destination) {
        $this->_destination = $destination;
        return $this;
    }
	    public function getCarry() {
        return $this->_carry;
    }

    public function setCarry($carry) {
        $this->_carry = $carry;
        return $this;
    }

}