<?php
namespace Application\models;

use Application\core\Database;

use PDO;

class Alunos{
public static function save(array $data) : bool{
    $conn = new Database();
    $result = $conn->executeQuery(
      'INSERT INTO aluno(nome, sobrenome, dataNascimento, cpf, telefone, email, ra, cep, cidade, endereco, curso, periodo, areaInteresse, curriculo, senha)
      VALUES (:nome, :sobrenome, :dataNascimento, :cpf, :telefone, :email, :ra, :cep, :cidade, :endereco, :curso, :periodo, :areaInteresse, :curriculo, :senha)',
      array(
        ':nome' => $data['nome'],
        ':sobrenome' => $data['sobrenome'],
        ':dataNascimento' => $data['dataNascimento'],
        ':cpf' => $data['cpf'],
        ':telefone' => $data['telefone'],
        ':email' => $data['email'],
        ':ra' => $data['ra'],
        ':cep' => $data['cep'],
        ':cidade' => $data['cidade'],
        ':endereco' => $data['endereco'],
        ':curso' => $data['curso'],
        ':periodo' => $data['periodo'],
        ':areaInteresse' => $data['areaInteresse'],
        ':curriculo' => $data['curriculo'],
        ':senha' => $data['senha'],
      )
    );
    if ($result->rowCount() == 0 ) {
      return false;
    }
    return true;
  }

  public static function findAll()
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT * FROM aluno');
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function alterarperfil(array $data): bool
  {
    $linkedin = $data['linkedin'];    
    $conn = new Database();
    $result = $conn->executeQuery(
      "UPDATE aluno SET
      linkedin = '$linkedin'
      github = '$github'
      portifolio = '$portifolio'
      sobreformacao = '$sobreformacao'
      sobrehabilidade = '$sobrehabilidade'
      disponibilidade = '$disponibilidade'
      idioma = '$idioma'  
      WHERE id = 2"
    );
    if ($result->rowCount() == 0) {
      return false;
    }
    return true;
  }
}