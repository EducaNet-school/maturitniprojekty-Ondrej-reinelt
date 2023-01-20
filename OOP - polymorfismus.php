<?php
class Auto {
  public $typ;
  public $znacka;

  public function __construct($typ, $znacka) {
    $this->typ = $typ;
    $this->znacka = $znacka;
  }

  public function VratInfo() {
    return "Typ: " . $this->typ . ", Značka: " . $this->znacka;
  }
}

class Nakladak extends Auto {
  public $nosnost;

  public function __construct($typ, $znacka, $nosnost) {
    parent::__construct($typ, $znacka);
    $this->nosnost = $nosnost;
  }

  public function VratInfo() {
    return parent::VratInfo() . ", Nosnost: " . $this->nosnost . " kg";
  }
}

class ElektrickeAuto extends Auto {
  public $dojezd;

  public function __construct($typ, $znacka, $dojezd) {
    parent::__construct($typ, $znacka);
    $this->dojezd = $dojezd;
  }

  public function VratInfo() {
    return parent::VratInfo() . ", Dojezd: " . $this->dojezd . " km";
  }
}

$auta = array();

$auto1 = new Auto("Sedan", "Toyota");
$nakladak1 = new Nakladak("Nákladní", "Volvo", 2000);
$elektrickeAuto1 = new ElektrickeAuto("Elektromobil", "Tesla", 500);

$auta[] = $auto1;
$auta[] = $nakladak1;
$auta[] = $elektrickeAuto1;

foreach ($auta as $auto) {
    echo $auto->VratInfo();
    echo "<br>";
}

?>
