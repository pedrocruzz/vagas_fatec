<?php

namespace Application\models;

use Application\core\Database;

use PDO;

class LoginEmpresa
{

    public static function findByCnpjAndPassword(string $cnpj, string $senha): array
    {
        $conn = new Database();

        $result = $conn->executeQuery(
            'SELECT * FROM empresa WHERE cnpj = :CNPJ AND senha = :SENHA LIMIT 1',
            array(
                ':CNPJ' => $cnpj,
                ':SENHA' => $senha
            )
        );
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        return isset($result[0]) ? $result[0] : array();
    }

    public static function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cnpj = $_POST['cnpj'];
            $senha = $_POST['senha'];

            $user = LoginEmpresa::findByCnpjAndPassword($cnpj, $senha);
            if (!$user) {
                echo ('<div class="alert alert-danger m-5" role="alert">
                Esse usuário não existe!
              </div>');
            } else {
                session_start();
                unset($_SESSION['empresaId']);
                unset($_SESSION['nomeEmpresa']);
                $_SESSION['nomeEmpresa'] = $user['nomeFantasia'];
                $_SESSION['empresaId'] = $user['id'];
                header('location: /empresa/minhas_vagas');
            }
        }
    }
}