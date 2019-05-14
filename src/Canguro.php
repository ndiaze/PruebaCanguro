<?php

namespace App;

class Canguro
{

    public function Encuentro(int $posicionPrimer, int $velocidadPrimer,int $posicionSegundo, int $velocidadSegundo) 
    {
        $this->Valida($posicionPrimer, $velocidadPrimer, $posicionSegundo, $velocidadSegundo);

        $resto = ($posicionPrimer - $posicionSegundo) % ($velocidadSegundo - $velocidadPrimer) == 0;
        $velocidad = (($posicionPrimer-$posicionSegundo > 0) && $velocidadSegundo > $velocidadPrimer) || (($posicionPrimer-$posicionSegundo < 0) && $velocidadPrimer > $velocidadSegundo);
        return  $resto && $velocidad ? 'YES': 'NO';
    }

    public function Valida(int $posicionPrimer, int $velocidadPrimer, int $posicionSegundo, int $velocidadSegundo)
    {
        try {
            
            if(!$this->ValidaPosicion($posicionPrimer,$posicionSegundo)){
                throw new \InvalidArgumentException("Error en los valores ingresado según restricción de posición", 100);
            }

            if(!$this->ValidaVelocidadPrimer($velocidadPrimer)){
                throw new \InvalidArgumentException("Error en los valores ingresado según restricción primera velocidad", 100);
            }

            if(!$this->ValidaVelocidadPrimer($velocidadSegundo)){
                throw new \InvalidArgumentException("Error en los valores ingresado según restricción segunda velocidad", 100);
            }

        } catch (\InvalidArgumentException $th) {
            throw $th;
        }
    }

    public function ValidaPosicion(int $posicionPrimer, int $posicionSegundo)
    {
        return $posicionPrimer >= 0 && $posicionPrimer < $posicionSegundo && $posicionPrimer <= 10000 && $posicionSegundo <= 10000? true : false;
    }

    public function ValidaVelocidadPrimer(int $velocidadPrimer)
    {
        return $velocidadPrimer >= 1 && $velocidadPrimer <= 10000 ? true : false;
    }

    public function ValidaVelocidadSegundo(int $velocidadSegundo)
    {
        return $velocidadSegundo >= 1 && $velocidadSegundo <= 10000 ? true : false;
    }

   
}