<?php
echo "Object Oriented Programming in PHP" . "<br>";

class Car
{

  // var $id;
  public $name;
  public $color;
  public $company;

  static $country;

  function set_country($country)
  {
    Car::$country = $country;
  }
  public function __construct($name, $color, $company)
  {
    $this->name = $name;
    $this->color = $color;
    $this->company = $company;
  }
  public function display()
  {
    echo "<br>" . $this->name . "<br>";
    echo $this->company . "<br>";
    echo $this->color . "<br>";
    echo Car::$country . "<br>";
  }
}

class ECar extends Car
{
  protected $battery;
  private $price;

  public function __construct($name, $color, $company, $battery)
  {
    $this->name = $name;
    $this->color = $color;
    $this->company = $company;
    $this->battery = $battery;
  }

  public function set_price($price)
  {
    $this->price = $price;
  }
  public function set_battery($battery)
  {
    $this->battery = $battery;
  }
  public function display()
  {
    echo "<br>" . $this->name . "<br>";
    echo $this->company . "<br>";
    echo $this->color . "<br>";
    echo $this->battery . "<br>";
    echo $this->price . "<br>";
  }
}

// if (class_exists("Car")) {
//   echo "<br>Exists<br>";
// } else {
//   echo "<br>not exists<br>";
// }
// if (method_exists("Car", "start")) {
//   echo "<br>Exists<br>";
// } else {
//   echo "<br>not exists<br>";
// }

$car = new Car("GLI", "Black", "Toyota");
$car->set_country("pakistan");
$car->display();

$ecar = new ECar("GLI", "Black", "Toyota", "5000 MAH");
$ecar->set_battery("1000 MAH");
$ecar->set_price("1000K");
$ecar->set_country("pakistan");
$ecar->display();
