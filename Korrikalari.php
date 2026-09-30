<?php

class Korrikalari
{
    private $izena;
    private $kodea;
    private $lasterketak;

    public function __construct($izena, $kodea)
    {
        $this->izena = $izena;
        $this->kodea = $kodea;
        $this->lasterketak = [];
    }

    public function getIzena()
    {
        return $this->izena;
    }

    public function setIzena($izena)
    {
        $this->izena = $izena;
    }

    public function getKodea()
    {
        return $this->kodea;
    }

    public function setKodea($kodea)
    {
        $this->kodea = $kodea;
    }

    public function getLasterketak()
    {
        return $this->lasterketak;
    }

    public function setLasterketak($lasterketak)
    {
        $this->lasterketak = $lasterketak;
    }

    public function lasterketagehitu($denbora)
    {
        if ($denbora < 5) {
            throw new Exception("Lasterketaren denbora 5 segundutik beherakoa da.");
        }

        if (count($this->lasterketak) >= 5) {
            throw new Exception("Korrikalariak ezin ditu 5 lasterketa baino gehiago egin.");
        }

        $this->lasterketak[] = $denbora;
    }
}