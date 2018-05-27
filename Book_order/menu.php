<?php
class Menu {
  public $name;
  private $price;
  private $image;
  private $orderCount = 0;
  
public function __construct($name, $price, $image) {
    $this->name = $name;
    $this->price = $price;
    $this->image = $image; 
 }
  

  public function getName() {
    return $this->name;
  }

  public function getPrice() {
    return $this->price;
  }

  public function getImage() {
    return $this->image;
  }

  public function getOrderCount() {
    return $this->orderCount;
  }
  
  public function setOrderCount($orderCount) {
    $this->orderCount = $orderCount;
  }
  
  public function getTaxIncludedPrice() {
    return floor($this->price * 1.08);
  }
  
  public function getTotalPrice() {
    return $this->price * $this->orderCount;
  }

}
?>