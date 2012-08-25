<?php
namespace MovingBazar\Model;
class Product
{
    private $name;
    private $amount;
    private $quantity;
    private $picture;
    private $description;
    private $fullpath;
    public $lastPath;
	/**
	 * @return the $name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @return the $amount
	 */
	public function getAmount() {
		return $this->amount;
	}

	/**
	 * @return the $quantity
	 */
	public function getQuantity() {
		return $this->quantity;
	}

	/**
	 * @return the $picture
	 */
	public function getPicture() {
		return base64_encode($this->picture);
	}

	/**
	 * @return the $description
	 */
	public function getDescription() {
		return $this->description;
	}
	
	/**
	 * @return the $fullpath
	 */
	public function getFullpath() {
		$parts = explode('/', $this->fullpath);
		$this->lastPath = array_pop($parts);
		return base64_encode($this->fullpath);
	}

	/**
	 * @param field_type $name
	 */
	public function setName($name) {
		$this->name = filter_var($name, FILTER_SANITIZE_STRING);
		return $this;
	}

	/**
	 * @param field_type $amount
	 */
	public function setAmount($amount) {
		$this->amount = filter_var($amount, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION | FILTER_FLAG_ALLOW_THOUSAND);
		return $this;
	}

	/**
	 * @param field_type $quantity
	 */
	public function setQuantity($quantity) {
		$this->quantity = filter_var($quantity, FILTER_SANITIZE_NUMBER_INT);
		return $this;
	}

	/**
	 * @param field_type $picture
	 */
	public function setPicture($picture) {
		$this->picture = $picture;
		return $this;
	}

	/**
	 * @param field_type $description
	 */
	public function setDescription($description) {
		$this->description = filter_var($description, FILTER_SANITIZE_STRING);
		return $this;
	}
	
	/**
	 * @param field_type $fullpath
	 */
	public function setFullpath($fullpath) {
		$this->fullpath = $fullpath;
		return $this;
	}


    
}