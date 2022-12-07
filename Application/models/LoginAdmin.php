<?php

namespace Application\models;

use Application\core\Database;

use PDO;

class LoginAdmin
{

    public static function findByEmailAndPassword(string $email, string $senha): array
    {
        $conn = new Database();

        $result = $conn->executeQuery(
            'SELECT * FROM fatec WHERE email = :EMAIL AND senha = :SENHA LIMIT 1',
            array(
                ':EMAIL' => $email,
                ':SENHA' => $senha
            )
        );
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        return isset($result[0]) ? $result[0] : array();
    }

    public static function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $user = LoginAdmin::findByEmailAndPassword($email, $senha);
            if (!$user) {
                echo ('<div class="alert alert-danger m-5" role="alert">
                Esse usuário não existe!
              </div>');
            } else {
                session_start();
                unset($_SESSION['adminId']);
                $_SESSION['adminId'] = $user['id'];
                header('location: /administrador/dashboard');
            }
        }
    }
}