<?php

require_once("Evento.php");

class Aniversario extends Evento {

    //Atributos
    private string $nomeAniversariante;
    private string $temaFesta;
    

    //Métodos
  

    public function getTipo() {
        return "Aniversario";
    }

    

    /**
     * Get the value of nomeAniversariante
     */
    public function getNomeAniversariante(): string
    {
        return $this->nomeAniversariante;
    }

    /**
     * Set the value of nomeAniversariante
     */
    public function setNomeAniversariante(string $nomeAniversariante): self
    {
        $this->nomeAniversariante = $nomeAniversariante;

        return $this;
    }

    /**
     * Get the value of temaFesta
     */
    public function getTemaFesta(): string
    {
        return $this->temaFesta;
    }

    /**
     * Set the value of temaFesta
     */
    public function setTemaFesta(string $temaFesta): self
    {
        $this->temaFesta = $temaFesta;

        return $this;
    }
}
