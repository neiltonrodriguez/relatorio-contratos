<?php
namespace App;

use PDO;
use PDOException;

class Database {
    private $pdo;

    public function __construct($filePath = __DIR__ . '/../database/contratos.db') {
        try {
            $this->pdo = new PDO("sqlite:" . $filePath);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }
    }

    public function getConnection(): PDO {
        return $this->pdo;
    }
}
