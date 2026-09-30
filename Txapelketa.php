<?php

class Txapelketa
{
    private $korrikalariak;

    public function __construct()
    {
        $this->korrikalariak = [];
    }

    public function getKorrikalariak()
    {
        return $this->korrikalariak;
    }

    public function setKorrikalariak($korrikalariak)
    {
        $this->korrikalariak = $korrikalariak;
    }

    public function korrikalariagehitu($korrikalaria)
    {
        $kodea = $korrikalaria->getKodea();
        $this->korrikalariak[$kodea] = $korrikalaria;
    }

    public function gehitulasterketakorrikalariari($kodea, $denbora)
    {
        if (!isset($this->korrikalariak[$kodea])) {
            throw new Exception("Ez da aurkitu korrikalaria.");
        }

        $this->korrikalariak[$kodea]->lasterketagehitu($denbora);
    }

    public function lehenengoLasterketarenBatezbestekoa()
    {
        if (count($this->korrikalariak) == 0) {
            return 0;
        }

        $suma = 0;
        $kopurua = 0;

        foreach ($this->korrikalariak as $korrikalaria) {
            $lasterketak = $korrikalaria->getLasterketak();

            if (isset($lasterketak[0])) {
                $suma = $suma + $lasterketak[0];
                $kopurua++;
            }
        }

        if ($kopurua == 0) {
            return 0;
        }

        return $suma / $kopurua;
    }

    public function korrikalariAzkarra()
    {
        $azkarrena = null;
        $denboraAzkarra = null;

        foreach ($this->korrikalariak as $korrikalaria) {
            $lasterketak = $korrikalaria->getLasterketak();

            if (isset($lasterketak[0])) {
                if ($denboraAzkarra == null || $lasterketak[0] < $denboraAzkarra) {
                    $denboraAzkarra = $lasterketak[0];
                    $azkarrena = $korrikalaria;
                }
            }
        }

        return $azkarrena;
    }

    public function 15segundutikGorakoBiLasterketa()
    {
        $emaitza = [];

        foreach ($this->korrikalariak as $korrikalaria) {
            $kopurua = 0;

            foreach ($korrikalaria->getLasterketak() as $denbora) {
                if ($denbora > 15) {
                    $kopurua++;
                }
            }

            if ($kopurua >= 2) {
                $emaitza[] = $korrikalaria->getIzena();
            }
        }

        return $emaitza;
    }

    public function eAmaieraDutenKorrikalariak()
    {
        $emaitza = [];

        foreach ($this->korrikalariak as $korrikalaria) {
            $izena = $korrikalaria->getIzena();

            if (strtolower(substr($izena, -1)) == "e") {
                $emaitza[] = $izena;
            }
        }

        return $emaitza;
    }
}