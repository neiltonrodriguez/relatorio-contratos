<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Database;
use App\ContratoRepository;

$db = new Database();
$repo = new ContratoRepository($db->getConnection());

$tipo = $_GET['tipo'] ?? 'tarefa1';

if ($tipo === 'tarefa2') {
    $contratos = $repo->listarContratosAgrupados();
} else {
    $contratos = $repo->listarContratos();
}

foreach ($contratos as $ctr) {
    echo implode(' | ', $ctr) . PHP_EOL;
}
