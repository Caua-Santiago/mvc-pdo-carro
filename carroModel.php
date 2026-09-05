<?php

// LISTAR
function listarCarros($pdo)
{
    $stmt = $pdo->prepare("
        SELECT * 
        FROM carro ORDER BY id_carro ASC
    ");

    $stmt->execute();
    return $stmt->fetchAll();
}

// CADASTRAR
function cadastrarCarros($pdo, $dados)
{
    $stmt = $pdo->prepare("
        INSERT INTO carro (modelo, placa) 
        VALUES (?, ?)");
    $stmt->execute([
        $dados["modelo"],
        $dados["placa"]
    ]);
}

// BUSCAR
function buscarCarros($pdo, $id_carro)
{
    $stmt = $pdo->prepare("SELECT * FROM carro WHERE id_carro = ?");
    $stmt->execute([$id_carro]);
    return $stmt->fetch();
}

// EDITAR
function editarCarros($pdo, $dados)
{
    $stmt = $pdo->prepare("
        UPDATE carro
        SET modelo = ?,
            placa = ?
        WHERE id_carro = ?
    ");

    $stmt->execute([
        $dados["modelo"],
        $dados["placa"],
        $dados["id"]
    ]);
}

// EXCLUIR
function excluirCarro($pdo, $id_carro)
{
    $stmt = $pdo->prepare("DELETE FROM carro WHERE id = ?");
    $stmt->execute([$id_carro]);
}