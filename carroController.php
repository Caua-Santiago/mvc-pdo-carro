<?php

// Define que a resposta será em JSON
header("Content-Type: application/json; charset=utf-8");

// Importa a conexão e o Model
require __DIR__ . "/database.php";
require __DIR__ . "/CarroModel.php";

// Conecta ao banco
$pdo = conectarBanco();

// Recebe a ação enviada pelo JavaScript
$acao = $_REQUEST["acao"] ?? "listar";


// Decide qual operação executar
switch ($acao) {

    // LISTAR
    case "listar":
        $carro = listarCarros($pdo);

        echo json_encode([
            "sucesso" => true,
            "mensagem" => "Carros listados.",
            "dados" => $carro
        ]);
        break;


    // BUSCAR
    case "buscar":
        $carro = buscarCarros($pdo, $_GET["id_carro"]);

        echo json_encode([
            "sucesso" => true,
            "mensagem" => "Carro encontrado.",
            "dados" => $carro
        ]);
        break;

    // CADASTRAR
    case "cadastrar":
        cadastrarCarros($pdo, $_POST);

        echo json_encode([
            "sucesso" => true,
            "mensagem" => "Carro cadastrado com sucesso.",
            "dados" => null
        ]);
        break;

    // EDITAR
    case "editar":
        editarCarros($pdo, $_POST);

        echo json_encode([
            "sucesso" => true,
            "mensagem" => "Carro atualizado com sucesso.",
            "dados" => null
        ]);
        break;

    // EXCLUIR
    case "excluir":
        excluirCarro($pdo, $_POST["id_carro"]);

        echo json_encode([
            "sucesso" => true,
            "mensagem" => "Carro excluído com sucesso.",
            "dados" => null
        ]);
        break;

    // Ação não encontrada
    default:
        echo json_encode([
            "sucesso" => false,
            "mensagem" => "Ação inválida.",
            "dados" => null
        ]);
}