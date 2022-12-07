<?php

use Application\models\Empresas;

if (isset($_POST['cadastrarEmpresa'])) {
    $data = array(
        'razaoSocial' => $_POST['razaoSocial'],
        'nomeFantasia' => $_POST['nomeFantasia'],
        'cnpj' => $_POST['cnpj'],
        'telefone' => $_POST['telefone'],
        'enderecoemail' => $_POST['enderecoemail'],
        'responsavel' => $_POST['responsavel'],
        'cep' => $_POST['cep'],
        'cidade' => $_POST['cidade'],
        'endereco' => $_POST['endereco'],
        'website' => $_POST['website'],
        'areaAtuacao' => $_POST['areaAtuacao'],
        'descricao' => $_POST['descricao'],
        'senha' => $_POST['senha'],
    );

    $result = Empresas::save($data);
    session_start();
    unset($_SESSION['empresaId']);
    unset($_SESSION['nomeEmpresa']);
    $_SESSION['nomeEmpresa'] = $POST_['nomeFantasia'];
    $_SESSION['empresaId'] = Empresas::findId($POST_['nomeFantasia']);
    header('location:../empresa/minhas_vagas');
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

    <script type="text/javascript">
        var check = function() {
            if (document.getElementById('floatingInputSenha1').value ==
                document.getElementById('floatingInputSenha2').value) {
                document.getElementById("message").style.visibility = "none";
                document.getElementById("message").style.display = "none";
                document.getElementById('senha1').style.color = 'green';
                document.getElementById('senha2').style.color = 'green';
                document.getElementById('cadastrarEmpresa').removeAttribute("disabled");

            } else {
                document.getElementById("message").style.visibility = "visible";
                document.getElementById("message").style.display = "block";
                document.getElementById('senha1').style.color = 'red';
                document.getElementById('senha2').style.color = 'red';
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'Senhas inseridas não são iguais!';
                document.getElementById('cadastrarEmpresa').setAttribute("disabled", "disabled");
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
            <h5 class="card-title text-center text-muted" style="padding-top: 3%;">Cadastro da Empresa</h5>
            <div class="card-body" style="padding-left: 15%; padding-right: 15%;">
                <form method="post">
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
                                <input type="email" class="form-control" id="floatingInput" value="" name="enderecoemail" required>
                                <label for="floatingInput">Email de Contato</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInput" value="" name="responsavel" required>
                                <label for="floatingInput">Nome Completo do Responsável</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInput" value="" maxlength="10" name="cep" required>
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
                                <input type="url" class="form-control" id="floatingInput" value="" name="website">
                                <label for="floatingInput">Website</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <select class="form-select text-muted" name="areaAtuacao" required>
                                    <option selected disabled>Segmento</option>
                                    <option value="servicos">Serviços</option>
                                    <option value="comercio">Comércio</option>
                                    <option value="industria">Indústria</option>
                                </select>
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
                    <span id='message'></span>
                    <div class="row" style="padding-bottom: 4%;">
                        <div class="col">
                            <div class="form-floating">
                                <input type="password" class="form-control" id="floatingInputSenha1" value="" name="senha" required>
                                <label for="floatingInputSenha" id="senha1">Senha</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-floating">
                                <input type="password" class="form-control" id="floatingInputSenha2" value="" name="senhaConfirmada" onkeyup='check();' required>
                                <label for="floatingInputSenha" id="senha2">Confirme a senha
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center" style="margin-right:3%; margin-bottom:3%;">
                        <button type="submit" class="btn btn-primary" name="cadastrarEmpresa" id="cadastrarEmpresa" style="width: 200px;">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</body>

</html>