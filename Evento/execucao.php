<?php
require_once("modelo/Evento.php");
require_once("modelo/Aniversario.php");
require_once("modelo/Casamento.php");
require_once("dao/EventoDAO.php"); // Alterei para EventoDAO

//Teste da conexão
/*require_once("util/Conexao.php");
$con = Conexao::getCon();
print_r($con);*/

do {
    echo "\n\n----TABELA DE EVENTOS----\n";
    echo "1- Novo Evento (Aniversário)\n";
    echo "2- Novo Evento (Casamento)\n";
    echo "3- Listar Eventos\n";
    echo "4- Buscar Evento\n";
    echo "5- Excluir Evento\n";
    echo "0- Sair\n";

    $opcao = readline("Informe a opção: ");
    switch ($opcao) {
        case 1:
            // Criar o objeto Aniversario
            $evento = new Aniversario();
            $evento->setData(readline("Informe a data do evento: "));
            $evento->setOrcamento(readline("Informe o orçamento do evento: "));
            $evento->setQntConvidados(readline("Informe a quantidade de convidados: "));
            $evento->setLocal(readline("Informe o local do evento: "));
            $evento->setNomeAniversariante(readline("Informe o nome do aniversariante: "));
            $evento->setTemaFesta(readline("Informe o tema da festa: "));

            // Chamar o método do DAO para persistir o evento
            $eventoDAO = new EventoDAO();
            $eventoDAO->inserirEvento($evento);

            echo "Evento de Aniversário cadastrado com sucesso!\n";
            break;

        case 2:
            // Criar o objeto Casamento
            $evento = new Casamento();
            $evento->setData(readline("Informe a data do evento: "));
            $evento->setOrcamento(readline("Informe o orçamento do evento: "));
            $evento->setQntConvidados(readline("Informe a quantidade de convidados: "));
            $evento->setLocal(readline("Informe o local do evento: "));
            $evento->setNoivo(readline("Informe o nome do noivo: "));
            $evento->setNoiva(readline("Informe o nome da noiva: "));

            // Chamar o método do DAO para persistir o evento
            $eventoDAO = new EventoDAO();
            $eventoDAO->inserirEvento($evento);

            echo "Evento de Casamento cadastrado com sucesso!\n";
            break;

        case 3:
            // Buscar os eventos no banco de dados
            $eventoDAO = new EventoDAO();
            $eventos = $eventoDAO->listarEventos();

            // Exibir os dados dos eventos
            foreach($eventos as $e) {
                echo "ID: " . $e->getId() . " | Tipo: " . $e->getTipo() . "\n";
                echo "Data: " . $e->getData() . " | Orçamento: " . $e->getOrcamento() . "\n";
                echo "Quantidade de Convidados: " . $e->getQntConvidados() . " | Local: " . $e->getLocal() . "\n";
                if($e instanceof Aniversario) {
                    echo "Aniversariante: " . $e->getNomeAniversariante() . " | Tema da Festa: " . $e->getTemaFesta() . "\n";
                } elseif($e instanceof Casamento) {
                    echo "Noivo: " . $e->getNoivo() . " | Noiva: " . $e->getNoiva() . "\n";
                }
                echo "\n";
            }
            break;

        case 4:
            // Buscar um evento pelo seu ID
            $id = readline("Informe o ID do evento: ");
            $eventoDAO = new EventoDAO();
            $evento = $eventoDAO->buscarPorId($id);

            if($evento != null) {
                echo "ID: " . $evento->getId() . " | Tipo: " . $evento->getTipo() . "\n";
                echo "Data: " . $evento->getData() . " | Orçamento: " . $evento->getOrcamento() . "\n";
                echo "Quantidade de Convidados: " . $evento->getQntConvidados() . " | Local: " . $evento->getLocal() . "\n";
                if($evento instanceof Aniversario) {
                    echo "Aniversariante: " . $evento->getNomeAniversariante() . " | Tema da Festa: " . $evento->getTemaFesta() . "\n";
                } elseif($evento instanceof Casamento) {
                    echo "Noivo: " . $evento->getNoivo() . " | Noiva: " . $evento->getNoiva() . "\n";
                }
            } else {
                echo "Evento não encontrado!\n";
            }
            break;

        case 5:
            // Exclusão de evento pelo ID
            $eventoDAO = new EventoDAO();
            $eventos = $eventoDAO->listarEventos();

            foreach($eventos as $e) {
                echo "ID: " . $e->getId() . " | Tipo: " . $e->getTipo() . "\n";
            }

            $id = readline("Informe o ID do evento a ser excluído: ");
            $evento = $eventoDAO->buscarPorId($id);

            if($evento) {
                $eventoDAO->excluirPorId($id);
                echo "Evento excluído com sucesso!\n";
            } else {
                echo "Evento não encontrado!\n";
            }
            break;

        case 0:
            echo "Programa encerrado!\n";
            break;

        default:
            echo "Opção inválida!\n";
    }
} while($opcao != 0);
