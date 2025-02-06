<?php

require_once("Evento.php");

class Casamento extends Evento{

    //Atributos
    private string $noivo;
    private string $noiva;
   

    //Métodos


    public function getTipo() {
        return "Casamento";
    }



    /**
     * Get the value of noivo
     */
    public function getNoivo(): string
    {
        return $this->noivo;
    }

    /**
     * Set the value of noivo
     */
    public function setNoivo(string $noivo): self
    {
        $this->noivo = $noivo;

        return $this;
    }

    /**
     * Get the value of noiva
     */
    public function getNoiva(): string
    {
        return $this->noiva;
    }

    /**
     * Set the value of noiva
     */
    public function setNoiva(string $noiva): self
    {
        $this->noiva = $noiva;

        return $this;
    }
}
