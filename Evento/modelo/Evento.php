<?php 

abstract class Evento {

    //Atributos
    protected int $id;
    protected $data;
    protected int $orcamento;
    protected int $qntConvidados;
    protected string $local;
    protected string $nome;

    //Métodos

    public abstract function getTipo();

    public function getIdentificacao(){
        return $this->nome;
    }

 

 

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of data
     */
    public function getData(): int
    {
        return $this->data;
    }

    /**
     * Set the value of data
     */
    public function setData(int $data): self
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get the value of orcamento
     */
    public function getOrcamento(): int
    {
        return $this->orcamento;
    }

    /**
     * Set the value of orcamento
     */
    public function setOrcamento(int $orcamento): self
    {
        $this->orcamento = $orcamento;

        return $this;
    }

    /**
     * Get the value of qntConvidados
     */
    public function getQntConvidados(): int
    {
        return $this->qntConvidados;
    }

    /**
     * Set the value of qntConvidados
     */
    public function setQntConvidados(int $qntConvidados): self
    {
        $this->qntConvidados = $qntConvidados;

        return $this;
    }

    /**
     * Get the value of local
     */
    public function getLocal(): int
    {
        return $this->local;
    }

    /**
     * Set the value of local
     */
    public function setLocal(int $local): self
    {
        $this->local = $local;

        return $this;
    }
}
