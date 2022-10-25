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

  public static function save(array $data) : bool{
    $conn = new Database();
    $result = $conn->executeQuery(
      'INSERT INTO vagapreenchida(id_vagas) VALUES(:id_vagas)',
      array(
        ':id_vagas' => $data['id_vagas']

      )
    );

    if ($result->rowCount() == 0 ) {
      return false;
    }
    return true;
  }

}