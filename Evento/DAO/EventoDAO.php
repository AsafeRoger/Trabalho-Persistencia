<?php

require_once("modelo/Evento.php");
require_once("modelo/Aniversario.php");
require_once("modelo/Casamento.php");
require_once("util/Conexao.php");

class EventoDAO {

    // Método para inserir um evento
    public function inserirEvento(Evento $evento) {

        $sql = "INSERT INTO eventos 
                (tipo, data, orcamento, qntConvidados, local, nome_aniversariante, tema_festa, noivo, noiva)
                VALUES
                (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $con = Conexao::getCon();

        $stm = $con->prepare($sql);
        if($evento instanceof Aniversario) {
            $stm->execute(array(
                $evento->getTipo(),
                $evento->getData(),
                $evento->getOrcamento(),
                $evento->getQntConvidados(),
                $evento->getLocal(),
                $evento->getNomeAniversariante(),
                $evento->getTemaFesta(),
                null, // Noivo
                null  // Noiva
            ));
        
        } else if($evento instanceof Casamento) {
            $stm->execute(array(
                $evento->getTipo(),
                $evento->getData(),
                $evento->getOrcamento(),
                $evento->getQntConvidados(),
                $evento->getLocal(),
                null, // Nome Aniversariante
                null, // Tema Festa
                $evento->getNoivo(),
                $evento->getNoiva()
            ));
        }
    }

    public function listarEventos() {
        $sql = "SELECT * FROM eventos";

        $con = Conexao::getCon();

        $stm = $con->prepare($sql);
        $stm->execute();
        $registros = $stm->fetchAll();

        $eventos = $this->mapEventos($registros);
        return $eventos;
    }

    public function buscarPorId(int $idEvento) {
        $con = Conexao::getCon();

        $sql = "SELECT * FROM eventos WHERE id = ?";

        $stm = $con->prepare($sql);
        $stm->execute([$idEvento]);

        $registros = $stm->fetchAll();

        $eventos = $this->mapEventos($registros);

        if(count($eventos) > 0)
            return $eventos[0];
        
        return null;
    }

    public function excluirPorId(int $idEvento) {
        $con = Conexao::getCon();

        $sql = "DELETE FROM eventos WHERE id = ?";

        $stm = $con->prepare($sql);
        $stm->execute([$idEvento]);
    }

    private function mapEventos(array $registros) {
        $eventos = array();
        foreach($registros as $reg) {
            $evento = null;
            if($reg['tipo'] == 'Aniversario') {
                $evento = new Aniversario();
                $evento->setNomeAniversariante($reg['nome_aniversariante']);
                $evento->setTemaFesta($reg['tema_festa']);
            } else if($reg['tipo'] == 'Casamento') {
                $evento = new Casamento();
                $evento->setNoivo($reg['noivo']);
                $evento->setNoiva($reg['noiva']);
            }

            $evento->setId($reg['id']);
            $evento->setData($reg['data']);
            $evento->setOrcamento($reg['orcamento']);
            $evento->setQntConvidados($reg['qntConvidados']);
            $evento->setLocal($reg['local']);
            array_push($eventos, $evento);
        }
        return $eventos;
    }

}
