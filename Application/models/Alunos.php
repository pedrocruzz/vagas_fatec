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
    $linkedin =  $data['linkedin'];
    $github = $data['github'];
    $portifolio = $data['portifolio'];
    $sobreformacao = $data['sobreformacao'];
    $sobrehabilidade = $data['sobrehabilidade'];
    $disponibilidade = $data['disponibilidade'];
    $idioma = $data['idiomas'];
    $id = $_SESSION['alunoId'];
    $conn = new Database();
    $result = $conn->executeQuery(
      "UPDATE aluno SET
      linkedin =  $linkedin,
      github = $github,
      portifolio = $portifolio,
      sobreformacao = $sobreformacao,
      sobrehabilidade = $sobrehabilidade,
      disponibilidade = $disponibilidade,
      idioma = $idioma
      WHERE id = $id"
    );
    if ($result->rowCount() == 0) {
      return false;
    }
    return true;
  }
  public static function findId($email)
  {
    $conn = new Database();
    $result = $conn->executeQuery("SELECT id FROM aluno WHERE email = '$email'");
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }
}