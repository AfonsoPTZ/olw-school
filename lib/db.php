<?php
// Conexão PDO com SQLite
function get_pdo(): PDO {                    // Define função que retorna um PDO
    $dbPath = __DIR__ . '/../data/app.db';  // Caminho do arquivo do banco (data/app.db)
    if (!file_exists(dirname($dbPath))) {   // Se a pasta /data não existir
        mkdir(dirname($dbPath), 0777, true);// cria a pasta com permissão
    }
    $pdo = new PDO('sqlite:' . $dbPath);    // Abre conexão com o SQLite
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Erros como exceção
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // Retorno em array assoc
    return $pdo;                            // Devolve a conexão
}
