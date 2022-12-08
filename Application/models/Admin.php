<?php

namespace Application\models;

use Application\core\Database;
use PDO;

class Admin
{
  public static function findAllVagasPendentes()
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT * FROM vagas WHERE aprovada = 2  && ativa = 1 ORDER BY id ASC');
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }
  public static function findAllEmpresasPendentes()
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT * FROM empresa WHERE aprovada = 2 ORDER BY id ASC');
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }
  public static function findAllEmpresasSemParceria()
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT * FROM empresa WHERE parceria = 0 && aprovada = 1 ORDER BY id ASC');
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }
  public static function findAllEmpresas()
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT * FROM empresa WHERE aprovada = 1 ORDER BY id ASC');
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }
  public static function countEmpresas()
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT COUNT(id) as "empresasCadastradas" FROM empresa WHERE aprovada = 1 LIMIT 1');
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }
  public static function countAlunos()
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT COUNT(id) AS "alunosCadastrados" FROM aluno LIMIT 1');
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }
  public static function countVagas()
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT COUNT(id) AS "vagasCadastradas" FROM vagas  WHERE ativa = 1 && aprovada = 1 && fechada = 2 LIMIT 1');
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }
  public static function countEmpresasRejeitadas()
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT COUNT(id) as "empresasRejeitadas" FROM empresa WHERE aprovada = 0 LIMIT 1');
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }
  public static function countVagasRejeitadas()
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT COUNT(id) AS "vagasRejeitadas" FROM vagas  WHERE aprovada = 0 LIMIT 1');
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }
  public static function countVagasExcluidas()
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT COUNT(id) AS "vagasExcluidas" FROM vagas  WHERE ativa = 0 && aprovada = 1 LIMIT 1');
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }
  public static function countVagasFechadas()
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT COUNT(id) AS "vagasFechadas" FROM vagas  WHERE ativa = 1 && aprovada = 1  && fechada = 1 LIMIT 1');
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }
  public static function selecionarCandidataçoes()
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT COUNT(DISTINCT(id_aluno)) as "candidatos" FROM vagapreenchida GROUP BY id_vagas');
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }
  public static function alunoMaisRecente()
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT * FROM aluno ORDER BY id DESC LIMIT 1');
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }
  public static function empresaMaisRecente()
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT * FROM empresa ORDER BY id DESC LIMIT 1');
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }
  public static function vagaMaisRecente()
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT * FROM vagas ORDER BY id DESC LIMIT 1');
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }
  public static function candidataçaoMaisRecente()
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT * FROM vagas JOIN vagapreenchida ON(vagas.id = vagapreenchida.id_vagas) JOIN aluno ON (vagapreenchida.id_aluno = aluno.id) ORDER BY vagapreenchida.id DESC LIMIT 1');
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }
}
