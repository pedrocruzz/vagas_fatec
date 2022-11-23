<?php

use Application\models\Alunos;

if (isset($_POST['cadastrarAluno'])) {
    $data = array(
        'nome' => $_POST['nome'],
        'sobrenome' => $_POST['sobrenome'],
        'dataNascimento' => $_POST['dataNascimento'],
        'cpf' => $_POST['cpf'],
        'telefone' => $_POST['telefone'],
        'email' => $_POST['email'],
        'ra' => $_POST['ra'],
        'cep' => $_POST['cep'],
        'cidade' => $_POST['cidade'],
        'endereco' => $_POST['endereco'],
        'curso' => $_POST['curso'],
        'periodo' => $_POST['periodo'],
        'areaInteresse' => $_POST['areaInteresse'],
        'senha' => $_POST['senha'],
    );

    $result = Alunos::save($data);
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script type="text/javascript">
        var check = function() {
            if (document.getElementById('floatingInputSenha1').value ==
                document.getElementById('floatingInputSenha2').value) {
                document.getElementById("message").style.visibility = "none";
                document.getElementById("message").style.display = "none";
                document.getElementById('senha1').style.color = 'green';
                document.getElementById('senha2').style.color = 'green';
                document.getElementById('cadastrarAluno').removeAttribute("disabled");

            } else {
                document.getElementById("message").style.visibility = "visible";
                document.getElementById("message").style.display = "block";
                document.getElementById('senha1').style.color = 'red';
                document.getElementById('senha2').style.color = 'red';
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'Senhas inseridas não são iguais!';
                document.getElementById('cadastrarAluno').setAttribute("disabled", "disabled");
            }
        }
    </script>
    <style>
        .exampleModalToggle {
            margin: 15%;
        }

        button {
            margin-right: 35%;
            margin-left: 35%;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="card">
            <h5 class="card-title text-center text-muted" style="padding-top: 3%;">Cadastro do Aluno</h5>
            <div class="card-body" style="padding-left: 15%; padding-right: 15%;">
                <form method="post">
                    <div class="row">
                        <div class="col">
                            <div class="form-floating" action="cadastro_aluno">
                                <input type="text" class="form-control" id="floatingInput" value="" name="nome" required>
                                <label for="floatingInput">Nome</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInput" value="" name="sobrenome" required>
                                <label for="floatingInput">Sobrenome</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="date" class="form-control text-muted" id="floatingInput" value="" name="dataNascimento" required>
                                <label for="floatingInput">Data de Nascimento</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row" style="padding-bottom: 4%;">
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInput" value="" maxlength="11" name="cpf" required>
                                <label for="floatingInput">CPF</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="tel" class="form-control" id="floatingInput" value="" name="telefone" required>
                                <label for="floatingInput">Telefone</label>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding-bottom: 4%;">
                        <div class="col">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="floatingInput" value="" name="email" required>
                                <label for="floatingInput">Email Institucional</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInput" value="" name="ra" required>
                                <label for="floatingInput">RA</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInput" value="" maxlength="8" name="cep" required>
                                <label for="floatingInput">CEP</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInput" value="" name="cidade" required>
                                <label for="floatingInput">Cidade</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInput" value="" name="endereco" required>
                                <label for="floatingInput">Endereço</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <p class="text-muted">Informações adicionais:</p>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating">
                                <select class="form-select text-muted" name="curso">
                                    <option selected>Curso</option>
                                    <option value="DSM">DSM</option>
                                    <option value="GTI">GTI</option>
                                    <option value="GP">GP</option>
                                    <option value="GE">GE</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInput" value="" name="periodo" required>
                                <label for="floatingInput">Período</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" style="padding-top: 4%;">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInput" value="" name="areaInteresse" required>
                                <label for="floatingInput">Área de Interesse</label>
                            </div>
                        </div>
                        <div class="col text-muted" style="padding-top: 3.3%;">
                            <div class="mb-3">
                                <label for="formFileSm" class="form-label">Insira o seu currículo:</label>
                                <input class="form-control form-control-sm text-muted" name="curriculo" id="formFileSm" type="file">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <script>
                    </script>
                    <span id='message'></span>
                    <div class="row" style="padding-bottom: 4%;">
                        <div class="col">
                            <div class="form-floating">
                                <input type="password" class="form-control" id="floatingInputSenha1" value="" name="senha" required>
                                <label for="floatingInput" id="senha1">Senha</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="password" class="form-control" id="floatingInputSenha2" value="" name="senhaConfirmada" onkeyup='check();' required>
                                <label for="floatingInput" id="senha2">Confirme a senha
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center" style="margin-right:3%; margin-bottom:3%;">
                        <button type="submit" name="cadastrarAluno" id="cadastrarAluno" class="btn btn-primary" style="width: 200px;">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</body>

</html>