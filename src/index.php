<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Database;
use App\ContratoRepository;

$db = new Database();
$repo = new ContratoRepository($db->getConnection());

$isCli = php_sapi_name() === 'cli';
$tipo = $isCli ? ($argv[1] ?? 'tarefa1') : ($_GET['tipo'] ?? 'tarefa1');

$contratos = $tipo === 'tarefa2' ? $repo->listarContratosAgrupados() : $repo->listarContratos();

if ($isCli) {
    foreach ($contratos as $ctr) {
        echo implode(' | ', $ctr) . PHP_EOL;
    }
} else {
    echo "<!DOCTYPE html><html><head><meta charset='UTF-8'><title>Contratos</title>";
    echo "<style>table {border-collapse: collapse;} td, th {border: 1px solid #333; padding: 5px;}</style></head><body>";
    echo "<table><thead><tr>";
    
    foreach (array_keys($contratos[0] ?? []) as $col) {
        echo "<th>" . htmlspecialchars($col) . "</th>";
    }
    echo "</tr></thead><tbody>";
    
    foreach ($contratos as $ctr) {
        echo "<tr>";
        foreach ($ctr as $valor) {
            echo "<td>" . htmlspecialchars($valor) . "</td>";
        }
        echo "</tr>";
    }
    
    echo "</tbody></table></body></html>";
}
