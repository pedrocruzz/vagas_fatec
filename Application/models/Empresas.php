<?php

namespace Application\models;

use Application\core\Database;
use PDO;

class Empresas
{

  public static function save(array $data): bool
  {
    $date = GETDATE();
    $conn = new Database();
    $result = $conn->executeQuery(
      'INSERT INTO empresa(razaoSocial, nomeFantasia, cnpj, telefone, email, responsavel, cep, cidade, endereco, website, areaAtuacao, descricao, senha)
        VALUES (:razaoSocial, :nomeFantasia, :cnpj, :telefone, :enderecoemail, :responsavel, :cep, :cidade, :endereco, :website, :areaAtuacao, :descricao, :senha)',
      array(
        ':razaoSocial' => $data['razaoSocial'],
        ':nomeFantasia' => $data['nomeFantasia'],
        ':cnpj' => $data['cnpj'],
        ':telefone' => $data['telefone'],
        ':enderecoemail' => $data['enderecoemail'],
        ':responsavel' => $data['responsavel'],
        ':cep' => $data['cep'],
        ':cidade' => $data['cidade'],
        ':endereco' => $data['endereco'],
        ':website' => $data['website'],
        ':areaAtuacao' => $data['areaAtuacao'],
        ':descricao' => $data['descricao'],
        ':senha' => $data['senha'],
      )
    );
    if ($result->rowCount() == 0) {
      return false;
    }
    return true;
  }

  public static function findAll($idEmpresa)
  {
    $conn = new Database();
    $result = $conn->executeQuery("SELECT * FROM vagas WHERE id_empresa = '$idEmpresa' && ativa = 1 ORDER BY id DESC");
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function definirStatusEmpresa(array $data): bool
  {
    $aprovada = $data['status'];
    $id = $data['id'];
    $conn = new Database();
    $result = $conn->executeQuery(
      "UPDATE empresa SET 
      aprovada = '$aprovada' 
      WHERE id = '$id'"
    );
    if ($result->rowCount() == 0) {
      return false;
    }
    return true;
  }

  public static function concederParceria(array $data): bool
  {
    $parceria = $data['parceria'];
    $id = $data['id'];
    $conn = new Database();
    $result = $conn->executeQuery(
      "UPDATE empresa SET 
      parceria = '$parceria' 
      WHERE id = '$id'"
    );
    if ($result->rowCount() == 0) {
      return false;
    }
    return true;
  }
  public static function findAllEmpresasPorAreaComercio()
  {
    $conn = new Database();
    $result = $conn->executeQuery("SELECT * FROM empresa WHERE aprovada = 1 && areaAtuacao LIKE 'comercio'");
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }
  public static function findAllEmpresasPorAreaServicos()
  {
    $conn = new Database();
    $result = $conn->executeQuery("SELECT * FROM empresa WHERE aprovada = 1 && areaAtuacao LIKE 'servicos'");
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }
  public static function findAllEmpresasPorAreaIndustria()
  {
    $conn = new Database();
    $result = $conn->executeQuery("SELECT * FROM empresa WHERE aprovada = 1 && areaAtuacao LIKE 'industria'");
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function findId($nomeEmpresa)
  {
    $conn = new Database();
    $result = $conn->executeQuery("SELECT id FROM empresa WHERE nomeEmpresa = '$nomeEmpresa'");
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }
}
