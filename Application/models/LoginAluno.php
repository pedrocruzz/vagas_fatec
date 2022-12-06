<?php

namespace Application\models;

use Application\core\Database;

use PDO;

class LoginAluno
{
    
    public static function findByEmailAndPassword(string $email, string $senha): array
    {
        $conn = new Database();

        $result = $conn->executeQuery(
            'SELECT * FROM aluno WHERE email = :EMAIL AND senha = :SENHA LIMIT 1',
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

            $user = LoginAluno::findByEmailAndPassword($email, $senha);
            if (!$user) {
                echo("Erro");
              }
              else {
                session_start();
                unset($_SESSION['alunoId']);
                $_SESSION['alunoId'] = $user['id'];
                header('location: /vaga');
              }
        }
    }

    public static function logout()
    {
        session_start();

        if(isset($_SESSION['aluno'])):
          unset($_SESSION['aluno']);
        endif;
        
        header('location: /login');
    }
}
