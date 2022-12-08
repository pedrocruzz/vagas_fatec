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
    $result = $conn->executeQuery('SELECT * FROM vagas WHERE ativa = 1 && aprovada = 1 && fechada = 2 ORDER BY id DESC');
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function findAllVagasDessaEmpresa($idEmpresa)
  {
    $conn = new Database();
    $result = $conn->executeQuery("SELECT * FROM vagas WHERE ativa = 1 && aprovada = 1 && fechada = 2 && id_empresa = '$idEmpresa'");
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }
  public static function findAllCandidaturasDesseAluno($idAluno)
  {
    $conn = new Database();
    $result = $conn->executeQuery("SELECT * FROM vagas JOIN vagapreenchida ON (vagas.id = vagapreenchida.id_vagas) WHERE id_aluno = '$idAluno' && vagas.id = vagapreenchida.id_vagas");
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

  public static function checarSeJaCandidatou($idAluno, $idVaga)
  {
    $conn = new Database();
    $result = $conn->executeQuery("SELECT * FROM vagapreenchida WHERE id_aluno = '$idAluno' && id_vagas = '$idVaga'");
    $result->fetchAll(PDO::FETCH_ASSOC);
    if ($result->rowCount() == 0) {
      return false;
    }
    return true;
  }

  public static function save(array $data): bool
  {
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }
    $jaTem = Vagas::checarSeJaCandidatou($_SESSION['alunoId'], $data['id_vagas']);
    if ($jaTem) {
      echo ('<div class="d-flex justify-content-center">
      <div class="alert alert-danger p-2 d-flex justify-content-center" style="width:400px;" role="alert">
      Você já se candidatou a a essa vaga!
      </div>
      </div>');
      return false;
    } else {
      $conn = new Database();
      $result = $conn->executeQuery(
        'INSERT INTO vagapreenchida(id_vagas, id_aluno) VALUES(:id_vagas, :id_aluno)',
        array(
          ':id_vagas' => $data['id_vagas'],
          ':id_aluno' => $_SESSION['alunoId'],
        )
      );

      if ($result->rowCount() == 0) {
        echo ('<div class="d-flex justify-content-center">
        <div class="alert alert-danger p-2 d-flex justify-content-center" style="width:400px;" role="alert">
        Erro!
        </div>
        </div>');
      return false;
      }
      echo ('<div class="d-flex justify-content-center">
      <div class="alert alert-success p-2 d-flex justify-content-center" style="width:400px;" role="alert">
      Inscrição concluída com sucesso!
      </div>
      </div>');
      return true;
    }
  }
  public static function cadastrarVaga(array $data): bool
  {
    $conn = new Database();
    $dataAbrir = $data['dataAbrir'];
    $disponibilidade = $data['disponibilidade'];
    $result = $conn->executeQuery(
      'INSERT INTO vagas(dataAbrir, titulo, salario, descricaoQualificacao, descricaoFuncoes, descricaoBeneficios, tipo, nivelExperiencia, periodoVagaAberta , dataFechar, id_empresa, nome_empresa)
      VALUES (:dataAbrir, :cargo, :salario, :qualificacoes, :funcoes, :beneficios, :tipo, :experiencia, :disponibilidade, :dataFechar, :id_empresa, :nome_empresa)',
      array(
        ':dataAbrir' => $data['dataAbrir'],
        ':cargo' => $data['cargo'],
        ':salario' => $data['salario'],
        ':qualificacoes' => $data['qualificacoes'],
        ':funcoes' => $data['funcoes'],
        ':beneficios' => $data['beneficios'],
        ':tipo' => $data['tipo'],
        ':experiencia' => $data['experiencia'],
        ':disponibilidade' => $data['disponibilidade'],
        ':dataFechar' => date('Y-m-d', strtotime("$dataAbrir + $disponibilidade days")),
        ':id_empresa' => $data['id_empresa'],
        ':nome_empresa' =>  $data['nome_empresa'],
      )
    );
    if ($result->rowCount() == 0) {
      return false;
    }
    return true;
  }

  public static function is_checked($escolha, $opcao)
  {
    if ($escolha == $opcao) {
      return "checked";
    } else {
      return "";
    }
  }

  public static function alterarVaga(array $data): bool
  {
    $cargo = $data['cargo'];
    $salario = $data['salario'];
    $qualificacoes = $data['qualificacoes'];
    $funcoes = $data['funcoes'];
    $beneficios = $data['beneficios'];
    $tipo = $data['tipo'];
    $experiencia = $data['experiencia'];
    $disponibilidade = $data['disponibilidade'];
    $id = $data['id'];
    $conn = new Database();
    $result = $conn->executeQuery(
      "UPDATE vagas SET 
      titulo = '$cargo', 
      salario = '$salario', 
      descricaoQualificacao = '$qualificacoes', 
      descricaoFuncoes = '$funcoes', 
      descricaoBeneficios = '$beneficios', 
      tipo = '$tipo', 
      nivelExperiencia = '$experiencia', 
      periodoVagaAberta = '$disponibilidade'
      WHERE id = '$id'"
    );
    if ($result->rowCount() == 0) {
      return false;
    }
    return true;
  }

  public static function excluirVaga(array $data): bool
  {
    $ativa = $data['ativa'];
    $id = $data['id'];
    $conn = new Database();
    $result = $conn->executeQuery(
      "UPDATE vagas SET 
      ativa = '$ativa' 
      WHERE id = '$id'"
    );
    if ($result->rowCount() == 0) {
      return false;
    }
    return true;
  }

  public static function definirStatusVaga(array $data): bool
  {
    $aprovada = $data['status'];
    $id = $data['id'];
    $conn = new Database();
    $result = $conn->executeQuery(
      "UPDATE vagas SET 
      aprovada = '$aprovada' 
      WHERE id = '$id'"
    );
    if ($result->rowCount() == 0) {
      return false;
    }
    return true;
  }
  public static function findAllVagasRecentes()
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT * FROM vagas WHERE ativa = 1 && aprovada = 1 ORDER BY id DESC LIMIT 6');
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }
  public static function findAllVagasFechadas()
  {
    $conn = new Database();
    $result = $conn->executeQuery('SELECT * FROM vagas WHERE fechada = 1');
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }
  public static function pesquisarVagas($titulo)
  {
    $conn = new Database();
    $result = $conn->executeQuery("SELECT * FROM vagas WHERE titulo LIKE '%$titulo%' && ativa = 1 && aprovada = 1");
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }
  public static function findAllEstagios()
  {
    $conn = new Database();
    $result = $conn->executeQuery("SELECT * FROM vagas WHERE nivelExperiencia LIKE 'Estagiário' && ativa = 1 && aprovada = 1");
    return $result->fetchAll(PDO::FETCH_ASSOC);
  }
}
