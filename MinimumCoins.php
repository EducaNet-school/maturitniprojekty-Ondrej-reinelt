<?php
function prevodNaKoruny($castka) {
    $bankovky = array(1000, 500, 200, 100, 50, 20, 10, 5, 2, 1);
    $vysledek = "";
    $zbyvajiciCastka = $castka;
    foreach($bankovky as $bankovka) {
        while ($zbyvajiciCastka >= $bankovka) {
            $vysledek .= "{$bankovka} Kc bankovka<br>";
            $zbyvajiciCastka = $zbyvajiciCastka - $bankovka;
        }
    }
    return $vysledek;
}
$nahodnaCastka = (1254);
echo "Pro castku {$nahodnaCastka} Kc, budeme pouzivat:<br>".prevodNaKoruny($nahodnaCastka);
?>
