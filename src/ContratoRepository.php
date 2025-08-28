<?php
namespace App;

use PDO;

class ContratoRepository {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function listarContratos(): array {
        $sql = "
            SELECT b.nome AS banco, c.verba, ctr.codigo AS contrato, ctr.data_inclusao,
                   ctr.valor, ctr.prazo
            FROM Tb_contrato ctr
            INNER JOIN Tb_convenio_servico cs ON ctr.convenio_servico = cs.codigo
            INNER JOIN Tb_convenio c ON cs.convenio = c.codigo
            INNER JOIN Tb_banco b ON c.banco = b.codigo
            ORDER BY b.nome, c.verba, ctr.codigo;
        ";

        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
