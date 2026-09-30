<?php

require_once "Korrikalari.php";
require_once "Txapelketa.php";

try {
    $korrikalari1 = new Korrikalari("Iker", "A01");
    $korrikalari2 = new Korrikalari("Ane", "B02");
    $korrikalari3 = new Korrikalari("Mikel", "C03");
    $korrikalari4 = new Korrikalari("June", "D04");

    $txapelketa = new Txapelketa();

    $txapelketa->korrikalariagehitu($korrikalari1);
    $txapelketa->korrikalariagehitu($korrikalari2);
    $txapelketa->korrikalariagehitu($korrikalari3);
    $txapelketa->korrikalariagehitu($korrikalari4);

    $txapelketa->gehitulasterketakorrikalariari("A01", 12);
    $txapelketa->gehitulasterketakorrikalariari("A01", 18);
    $txapelketa->gehitulasterketakorrikalariari("A01", 20);

    $txapelketa->gehitulasterketakorrikalariari("B02", 10);
    $txapelketa->gehitulasterketakorrikalariari("B02", 17);
    $txapelketa->gehitulasterketakorrikalariari("B02", 19);

    $txapelketa->gehitulasterketakorrikalariari("C03", 8);
    $txapelketa->gehitulasterketakorrikalariari("C03", 14);
    $txapelketa->gehitulasterketakorrikalariari("C03", 16);

    $txapelketa->gehitulasterketakorrikalariari("D04", 15);
    $txapelketa->gehitulasterketakorrikalariari("D04", 21);
    $txapelketa->gehitulasterketakorrikalariari("D04", 22);

    echo "Batez bestekoa: " . $txapelketa->lehenengoLasterketarenBatezbestekoa() . "<br>";

    $azkarra = $txapelketa->korrikalariAzkarra();

    if ($azkarra != null) {
        echo "Korrikalari azkarra: " . $azkarra->getIzena() . "<br>";
    }

    echo "15 segundutik gorako bi lasterketa dituztenak:<br>";

    $zerrenda = $txapelketa->15segundutikGorakoBiLasterketa();

    foreach ($zerrenda as $izena) {
        echo $izena . "<br>";
    }

    echo "E letraz amaitzen direnak:<br>";

    $zerrenda2 = $txapelketa->eAmaieraDutenKorrikalariak();

    foreach ($zerrenda2 as $izena) {
        echo $izena . "<br>";
    }
}
catch (Exception $e) {
    echo $e->getMessage();
}

?>