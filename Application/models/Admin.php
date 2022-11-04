<?php

namespace Application\models;

use Application\core\Database;
use PDO;

class Admin
{
public static function findAllVagasPendentes()
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT * FROM vagas WHERE aprovada = 2 && ativa = 1 ORDER BY id ASC');
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }
}