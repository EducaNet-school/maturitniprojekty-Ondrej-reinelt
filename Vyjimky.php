<?php

header('Content-Type: text/html; charset=utf-8');

class Kino {
  public function ProdejLístku(Film $film, Divak $divak) {
    if ($divak->getVek() < $film->getMinimalniVek()) {
      throw new CustomerTooYoungException("Divák je příliš mladý pro tento film");
    }
    if ($divak->getPenize() < $film->getCena()) {
      throw new MissingMoneyException("Divák nemá dostatek peněz na zakoupení lístku");
    }
    $divak->odeberPenize($film->getCena());
    echo "Prodáno";
  }
}

class Film {
  private $nazev;
  private $minimalniVek;
  private $cena;

  public function __construct($nazev, $minimalniVek, $cena) {
    $this->nazev = $nazev;
    $this->minimalniVek = $minimalniVek;
    $this->cena = $cena;
  }

  public function getNazev() {
    return $this->nazev;
  }

  public function getMinimalniVek() {
    return $this->minimalniVek;
  }

  public function getCena() {
    return $this->cena;
  }
}

class Divak {
  private $jmeno;
  private $vek;
  private $penize;

  public function __construct($jmeno, $vek, $penize) {
    $this->jmeno = $jmeno;
    $this->vek = $vek;
    $this->penize = $penize;
  }

  public function getJmeno() {
    return $this->jmeno;
  }

  public function getVek() {
    return $this->vek;
  }

  public function getPenize() {
    return $this->penize;
  }

  public function odeberPenize($cena) {
    $this->penize -= $cena;
  }
}

class CustomerTooYoungException extends Exception {}
class MissingMoneyException extends Exception {}



$kino = new Kino();
$divak = new Divak("Klára Severa", 18, 121);
$film = new Film("Pán prstenů: Návrat Krále", 12, 120);

try {
  $kino->ProdejLístku($film, $divak);
} catch (CustomerTooYoungException $e) {
  echo "Chyba: " . $e->getMessage();
} catch (MissingMoneyException $e) {
  echo "Chyba: " . $e->getMessage();
}

?>