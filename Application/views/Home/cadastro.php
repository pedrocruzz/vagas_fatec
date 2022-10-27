<?php

use Application\models\Alunos;

if (isset($_POST['candidatarVaga'])) {
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

    if($result):
        $_SESSION['sucesso'] = 'Médico cadastrado com sucesso!';
        header('location: /vaga');
        die();
      else:
          $_SESSION['erro'] = 'Ocorreu um erro ao cadastrar o médico, verifique as informações e tente novamente!';
      endif;
}
?>

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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
        <div class="row" style="background-color: #d3d3d3; margin-left: 10%; margin-right: 10%; padding-bottom: 10%; padding-top: 5%;">
            <h3 class="display-6 text-center" style="padding-top: 4%;padding-bottom: 4%; color: white;">Que tipo de cadastro deseja
                fazer?</h3>
            <div class="row">
                <div class="col">
                    <div class="card mx-auto" style="width: 70%;">
                        <figure class="figure d-flex justify-content-center p-5" style="padding-top: 4%;padding-bottom: 4%;">
                            <img src="/assets/img/alunos.png" class="figure-img img-fluid rounded" alt="Ícone do aluno">
                        </figure>
                        <div class="card-body">
                            <button class="btn btn-primary p-2 " data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Aluno</button>
                            <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalToggleLabel">Cadastro do Aluno
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body" style="padding-left: 15%; padding-right: 15%;">
                                            <form method="post">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-floating">
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
                                                <div class="row" style="padding-bottom: 4%;">
                                                    <div class="col">
                                                        <div class="form-floating">
                                                            <input type="password" class="form-control" id="floatingInput" value="" name="senha" required>
                                                            <label for="floatingInput">Senha</label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-floating">
                                                            <input type="password" class="form-control" id="floatingInput" value="" name="senhaConfirmada" required>
                                                            <label for="floatingInput">Confirme a senha
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="d-flex justify-content-center" style="margin-right:3%; margin-bottom:3%;">
                                            <button type="submit" name="candidatarVaga" class="btn btn-primary" style="width: 200px;">Salvar</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mx-auto" style="width: 70%;">
                        <figure class="figure d-flex justify-content-center p-5">
                            <img src="/assets/img/empresas.png" class="figure-img img-fluid rounded" alt="Ícone da empresa">
                        </figure>
                        <div class="card-body">
                            <button class="btn btn-primary p-2" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Empresa</button>
                            <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalToggleLabel2">Cadastro da
                                                Empresa</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body" style="padding-left: 15%; padding-right: 15%;">
                                            <form action="http://localhost:8080/home/cadastrarAluno" method="post">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="floatingInput" value="" name="razaoSocial" required>
                                                            <label for="floatingInput">Razão Social</label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="floatingInput" value="" name="nomeFantasia" required>
                                                            <label for="floatingInput">Nome Fantasia</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row" style="padding-bottom: 4%;">
                                                    <div class="col">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="floatingInput" value="" maxlength="14" name="cnpj" required>
                                                            <label for="floatingInput">CNPJ</label>
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
                                                            <label for="floatingInput">Email de Contato</label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="floatingInput" value="" name="nomeResponsavel" required>
                                                            <label for="floatingInput">Nome Completo do
                                                                Responsável</label>
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
                                                            <input type="url" class="form-control" id="floatingInput" value="" name="site">
                                                            <label for="floatingInput">Website</label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-floating">
                                                            <input type="text" class="form-control" id="floatingInput" value="" name="areaAtuacao" required>
                                                            <label for="floatingInput">Área de Atuação</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col">
                                                        <p class="text-muted">Conte um pouco sobre a história da
                                                            empresa e
                                                            as
                                                            oportunidades que ela tem a oferecer para candidatos:
                                                        </p>
                                                        <div class="form-floating">
                                                            <input type="textarea" class="form-control" id="floatingInput" rows="6" cols="60" name="descricao" required>
                                                            <label for="floatingInput">Descrição</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row" style="padding-bottom: 4%;">
                                                    <div class="col">
                                                        <div class="form-floating">
                                                            <input type="password" class="form-control" id="floatingInput" value="" name="senha" required>
                                                            <label for="floatingInput">Senha</label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-floating">
                                                            <input type="password" class="form-control" id="floatingInput" value="" name="senhaConfirmada" required>
                                                            <label for="floatingInput">Confirme a senha
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="d-flex justify-content-center" style="margin-right:3%; margin-bottom:3%;">
                                            <button type="submit" class="btn btn-primary" style="width: 200px;">Salvar</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</body>

</html>