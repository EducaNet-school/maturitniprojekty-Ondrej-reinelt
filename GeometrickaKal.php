<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <title>Geometrický kalkulátor</title>
</head>
<body>
<form action="" method="get">
  <label for="shape">Tvar:</label>
  <select name="shape" id="shape">
    <option value="square">Čtverec</option>
    <option value="rectangle">Obdélník</option>
    <option value="triangle-equilateral">Rovnostranný trojúhelník</option>
    <option value="triangle-not-equilateral">Rovnoramenný trojúhelník</option>
  </select>
  <br>
  <label for="attributes">Atributy (čárkou oddělené):</label>
  <input type="text" name="attributes" id="attributes" required>
  <br>
  <label for="operation">Operace:</label>
  <select name="operation" id="operation">
    <option value="perimeter">Obvod</option>
    <option value="area">Obsah</option>
  </select>
  <br>
  <input type="submit" value="Spočítat">
</form>


</body>
</html>

<?php
class Shape {
  protected $attributes;

  public function __construct($attributes) {
    $this->attributes = $attributes;
  }

  public function perimeter() {
    // To be implemented by subclasses
  }

  public function area() {
    // To be implemented by subclasses
  }
}

class Square extends Shape {
  public function perimeter() {
    return 4 * $this->attributes[0];
  }

  public function area() {
    return pow($this->attributes[0], 2);
  }
}

class Rectangle extends Shape {
  public function perimeter() {
    return 2 * ($this->attributes[0] + $this->attributes[1]);
  }

  public function area() {
    return $this->attributes[0] * $this->attributes[1];
  }
}

class Triangle extends Shape {
  public function perimeter() {
    return array_sum($this->attributes);
  }

  public function area() {
    if (count($this->attributes) == 1) {
      $a = $this->attributes[0];
      return pow($a, 2) * sqrt(3) / 4;
    } else {
      $a = max($this->attributes);
      $b = min($this->attributes);
      return $a * $b / 2;
    }
  }
}

$shape_class = [
  'square' => Square::class,
  'rectangle' => Rectangle::class,
  'triangle-equilateral' => Triangle::class,
  'triangle-not-equilateral' => Triangle::class,
];

$shape_type = $_GET['shape'];
$shape_attributes = explode(",", $_GET['attributes']);
$operation = $_GET['operation'];

$shape = new $shape_class[$shape_type]($shape_attributes);

switch ($operation) {
  case 'perimeter':
    $result = $shape->perimeter();
    break;
  case 'area':
    $result = $shape->area();
    break;
}

echo $result;
