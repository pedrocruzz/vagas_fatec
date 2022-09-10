<?php

namespace Application\models;

use Application\core\Database;
use PDO;
class Vagas
{
  /** Poderiamos ter atributos aqui */

  /**
  * Este método busca todos os usuários armazenados na base de dados
  *
  * @return   array
  */
  public static function findAll()
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT * FROM vagas');
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  /**
  * Este método busca um usuário armazenados na base de dados com um
  * determinado ID
  * @param    int     $id   Identificador único do usuário
  *
  * @return   array
  */
  public static function findById(int $id)
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT * FROM vagas WHERE id = :ID LIMIT 1', array(
      ':ID' => $id
    ));

    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function cadastrarVaga()
  {
    $conn = new Database();
    $result = $conn->executeQuery('INSERT INTO vagas (titulo, descricao, empresa, parceiro) VALUES (?,?,?,?)');
    $result->prepare($sql)->execute([$titulo, $descricao, $empresa, $parceiro]);
  }

}