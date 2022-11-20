<?php
namespace Application\models;

use Application\core\Database;

use PDO;

class perfilprofissional{
public static function save(array $data) : bool{
    $conn = new Database();
    $result = $conn->executeQuery(
      'INSERT INTO perfilprofissional(nome, email, telefone, linkedin, github, portifolio, sobreformacao, sobrehabilidade, disponibilidade, idioma, meuarquivo)
      VALUES (:nome, :email, :telefone, :linkedin, :github, :portifolio, :sobreformacao, :sobrehabilidade, :disponibilidade, :idioma, :meuarquivo)',
      array(
        ':nome' => $data['nome'],
        ':email' => $data['email'],
        ':telefone' => $data['telefone'],
        ':linkedin' => $data['linkedin'],
        ':github' => $data['github'],
        ':portifolio' => $data['portifolio'],
        ':sobreformacao' => $data['sobreformacao'],
        ':sobrehabilidade' => $data['sobrehabilidade'],
        ':disponibilidade' => $data['disponibilidade'],
        ':idioma' => $data['idioma'],
        ':meuarquivo' => $data['meuarquivo'],
        
      )
    );
    if ($result->rowCount() == 0 ) {
      return false;
    }
    return true;
  }
}