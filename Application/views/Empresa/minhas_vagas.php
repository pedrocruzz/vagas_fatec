<?php

use Application\models\Vagas;
use Application\models\Empresas;


session_start();

$minhasVagas = Empresas::findAll($_SESSION['empresaId']);

if (isset($_POST['cadastrarVaga'])) {
    $data = array(
        'dataAbrir' => $_POST['dataAbrir'],
        'cargo' => $_POST['cargo'],
        'salario' => $_POST['salario'],
        'qualificacoes' => $_POST['qualificacoes'],
        'funcoes' => $_POST['funcoes'],
        'beneficios' => $_POST['beneficios'],
        'tipo' => $_POST['tipo'],
        'experiencia' => $_POST['experiencia'],
        'disponibilidade' => $_POST['disponibilidade'],
        'id_empresa' => $_SESSION['empresaId'],
        'nome_empresa' => $_SESSION['nomeEmpresa'],
    );
    $result = Vagas::cadastrarVaga($data);
    header('location:/empresa/minhas_vagas');
}

if (isset($_POST['alterarDados'])) {
    $data = array(
        'cargo' => $_POST['cargo'],
        'salario' => $_POST['salario'],
        'qualificacoes' => $_POST['qualificacoes'],
        'funcoes' => $_POST['funcoes'],
        'beneficios' => $_POST['beneficios'],
        'tipo' => $_POST['tipo'],
        'experiencia' => $_POST['experiencia'],
        'disponibilidade' => $_POST['disponibilidade'],
        'id' => $_POST['id'],
    );
    $result = Vagas::alterarVaga($data);
    header('location:/empresa/minhas_vagas');
}
if (isset($_POST['excluirVaga'])) {
    $data = array(
        'ativa' => $_POST['ativa'],
        'id' => $_POST['id'],
    );
    $result = Vagas::excluirVaga($data);
    header('location:/empresa/minhas_vagas');
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minhas Vagas</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js" type="text/javascript"></script>
    <script src="https://kit.fontawesome.com/f8536a8b01.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <style>
        #corpoCartao {
        height: 600px;
        overflow-y: scroll;
        }
        textarea{
        white-space: pre-wrap;
        overflow: auto;
        }
        </style>
</head>

<body>
    <div class="container">
        <h3 class="display-6 text-center" style="padding-top: 5%;">Bem-vindo(a) à sua área de vagas!</h3>

        <div class="card" style="margin-left: 5%; margin-right:5%; margin-bottom: 5%;">
            <div class="card-header  fw-normal">
                <div class="row">
                    <div class="col" style="font-size:40px;">
                        Minhas Vagas
                    </div>
                    <div class="col text-end">
                        <button type="button" class="btn btn-danger" style="margin-top:2.5%;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Cadastrar Nova Vaga
                        </button>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Cadastrar Nova Vaga</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="post">
                                <div class="modal-body" style="padding-left: 10%; padding-right: 10%;">
                                    <div class="row" style="padding-bottom: 5%;">
                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="date" class="form-control text-muted" id="floatingInput" value="" name="dataAbrir" required>
                                                <label for="floatingInput">Data de Publicação:</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control text-muted" id="floatingInput" value="" name="cargo" required>
                                                <label for="floatingInput">Cargo:</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-floating">
                                                <input type="text" class="form-control text-muted" id="floatingInput" value="" name="salario" required>
                                                <label for="floatingInput">Salário:</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="padding-bottom: 5%;">
                                        <div class="form-floating">
                                            <textarea name="qualificacoes" class="form-control text-muted text-break" id="floatingInput" rows="6" onkeyup="expandirTextarea();" cols="60" required></textarea>
                                            <label for="floatingInput" style="padding-left: 4%;">Qualificações
                                                necessárias:</label>
                                        </div>
                                    </div>
                                    <div class="row" style="padding-bottom: 5%;">
                                        <div class="form-floating">
                                            <textarea name="funcoes" class="form-control text-muted text-break" id="floatingInput" rows="6" onkeyup="expandirTextarea();" cols="60" required></textarea>
                                            <label for="floatingInput" style="padding-left: 4%;">Funções que serão
                                                exercidas:</label>
                                        </div>
                                    </div>
                                    <div class="row" style="padding-bottom: 5%;">
                                        <div class="form-floating">
                                            <textarea name="beneficios" class="form-control text-muted text-break" id="floatingInput" rows="6" onkeyup="expandirTextarea();" cols="60" required></textarea>
                                            <label for="floatingInput" style="padding-left: 4%;">Benefícios:</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <p class="text-muted">Tipo:</p>
                                        <div class="row" style="padding-bottom: 5%;">
                                            <div class="col">
                                                <label for="Home Office">Home Office</label>
                                                <input type="radio" class="text-muted" name="tipo" value="Home Office" required>
                                            </div>
                                            <div class="col">
                                                <label for="Híbrido">Híbrido</label>
                                                <input type="radio" class="text-muted" name="tipo" value="Híbrido" required>
                                            </div>
                                            <div class="col">
                                                <label for="Presencial">Presencial</label>
                                                <input type="radio" class="text-muted" name="tipo" value="Presencial" required><br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <p class="text-muted">Nível de Experiência necessário:</p>
                                        <div class="row" style="padding-bottom: 5%;">
                                            <div class="col">
                                                <label for="Estagiário">Estagiário</label>
                                                <input type="radio" class="text-muted" name="experiencia" value="Estagiário" required>
                                            </div>
                                            <div class="col">
                                                <label for="Júnior">Júnior</label>
                                                <input type="radio" class="text-muted" name="experiencia" value="Júnior" required>
                                            </div>
                                            <div class="col">
                                                <label for="Pleno">Pleno</label>
                                                <input type="radio" class="text-muted" name="experiencia" value="Pleno" required>
                                            </div>
                                            <div class="col">
                                                <label for="Sênior">Sênior</label>
                                                <input type="radio" class="text-muted" name="experiencia" value="Sênior" required>
                                            </div>
                                            <div class="col">
                                                <label for="indefinido">Indefinido</label>
                                                <input type="radio" class="text-muted" name="experiencia" value="indefinido" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <p class=" text-muted">O cadastro nessa vaga ficará disponível por:</p>
                                        <div class="row" style="padding-bottom: 5%;">
                                            <div class="col">
                                                <label for="7">7 dias</label>
                                                <input type="radio" class="text-muted" id="vagaPeriodoAberto" name="disponibilidade" value="7" required>
                                            </div>
                                            <div class="col">
                                                <label for="15">15 dias</label>
                                                <input type="radio" class="text-muted" id="vagaPeriodoAberto" name="disponibilidade" value="15" required>
                                            </div>
                                            <div class="col">
                                                <label for="30">30 dias</label>
                                                <input type="radio" class="text-muted" id="vagaPeriodoAberto" name="disponibilidade" value="30" required>
                                            </div>
                                            <div class="col">
                                                <label for="60">60 dias</label>
                                                <input type="radio" class="text-muted" id="vagaPeriodoAberto" name="disponibilidade" value="60" required>
                                            </div>
                                            <div class="col">
                                                <label for="0">Indefinido</label>
                                                <input type="radio" class="text-muted" id="vagaPeriodoAberto" name="disponibilidade" value="0" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" name="cadastrarVaga" class="btn btn-danger">Cadastrar vaga</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container" id="corpoCartao">
                <div class="card-body">
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <?php if (empty($minhasVagas)) {
                            echo '<h3 class=" text-center text-muted" style="padding-top: 25%;">Você não possui vagas no momento. Para cadastrar uma vaga, clique no botão acima!</h3>';
                        } ?>
                        <?php foreach ($minhasVagas as $key => $vaga) { ?>
                            <div class="accordion-item">
                                <div class="accordion-header" id="panelsStayOpen-headingOne">
                                    <div class="card-header  fw-normal">
                                        <div class="row">
                                            <div class="col" style="font-size: 30px;">
                                                <?= $vaga['titulo'] ?>
                                                <?php if ($vaga['aprovada'] == 2) { ?>
                                                    <div class="col">
                                                        <h5 class="link-primary" style="font-size: 18px;">
                                                            Aprovação pendente...
                                                        </h5>
                                                    </div>
                                                <?php } elseif ($vaga['aprovada'] == 1) { ?>
                                                    <div class="col">
                                                        <h5 class="link-success" style="font-size: 18px;">
                                                            Vaga Aprovada
                                                        </h5>
                                                    </div>
                                                <?php } elseif ($vaga['aprovada'] == 0) { ?>
                                                    <div class="col">
                                                        <h5 class="link-danger" style="font-size: 18px;">
                                                            Vaga Rejeitada
                                                        </h5>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <div class="col text-end" style="padding-top: 2%;padding-bottom: 2%;">
                                                <?php if ($vaga['aprovada'] == 1) { ?>
                                                    <button type="button" class="btn btn-secondary" name="verCurriculos">
                                                        <i class="fa-solid fa-file"></i> Currículos submetidos
                                                    </button>
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAterar<?= $vaga['id'] ?>">
                                                        <i class="fa-solid fa-pencil"></i>
                                                    </button>
                                                    <div class="modal fade" id="modalAterar<?= $vaga['id'] ?>" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Alterar Vaga</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body text-start" style="padding-left: 10%; padding-right: 10%;font-size:15px;">
                                                                    <form method="post">
                                                                        <div class="row" style="padding-bottom: 5%;">
                                                                            <div class="col">
                                                                                <div class="form-floating">
                                                                                    <input class="form-control text-muted" id="floatingInput" disabled="true" value="<?= $vaga['dataAbrir'] ?>" name="dataAbrir" required>
                                                                                    <label for="floatingInput">Data de Publicação:</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col">
                                                                                <div class="form-floating">
                                                                                    <input type="text" class="form-control text-muted" id="floatingInput" value="<?= $vaga['titulo'] ?>" name="cargo" required>
                                                                                    <label for="floatingInput">Cargo:</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col">
                                                                                <div class="form-floating">
                                                                                    <input type="text" class="form-control text-muted" id="floatingInput" value="<?= $vaga['salario'] ?>" name="salario" required>
                                                                                    <label for="floatingInput">Salário:</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row" style="padding-bottom: 5%;">
                                                                            <div class="form-floating">
                                                                                <textarea name="qualificacoes" class="form-control text-muted" id="floatingInput" rows="6" cols="60" required><?= $vaga['descricaoQualificacao'] ?></textarea>
                                                                                <label for="floatingInput" style="padding-left: 4%;">Qualificações
                                                                                    necessárias:</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row" style="padding-bottom: 5%;">
                                                                            <div class="form-floating">
                                                                                <textarea name="funcoes" class="form-control text-muted" id="floatingInput" rows="6" cols="60" required><?= $vaga['descricaoFuncoes'] ?></textarea>
                                                                                <label for="floatingInput" style="padding-left: 4%;">Funções que serão
                                                                                    exercidas:</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row" style="padding-bottom: 5%;">
                                                                            <div class="form-floating">
                                                                                <textarea name="beneficios" class="form-control text-muted" id="floatingInput" rows="6" cols="60" required><?= $vaga['descricaoBeneficios'] ?></textarea>
                                                                                <label for="floatingInput" style="padding-left: 4%;">Benefícios:</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <p class="text-muted">Tipo:</p>
                                                                            <div class="row" style="padding-bottom: 5%;">
                                                                                <div class="col">
                                                                                    <label for="Home Office">Home Office</label>
                                                                                    <input type="radio" class="text-muted" name="tipo" value="Home Office" <?php echo Vagas::is_checked($vaga['tipo'], "Home Office") ?> required>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <label for="Híbrido">Híbrido</label>
                                                                                    <input type="radio" class="text-muted" name="tipo" value="Híbrido" <?php echo Vagas::is_checked($vaga['tipo'], "Híbrido") ?> required>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <label for="Presencial">Presencial</label>
                                                                                    <input type="radio" class="text-muted" name="tipo" value="Presencial" <?php echo Vagas::is_checked($vaga['tipo'], "Presencial") ?> required><br>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <p class="text-muted">Nível de Experiência necessário:</p>
                                                                            <div class="row" style="padding-bottom: 5%;">
                                                                                <div class="col">
                                                                                    <label for="Estagiário">Estagiário</label>
                                                                                    <input type="radio" class="text-muted" name="experiencia" value="Estagiário" <?php echo Vagas::is_checked($vaga['nivelExperiencia'], "Estagiário") ?> required>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <label for="Júnior">Júnior</label>
                                                                                    <input type="radio" class="text-muted" name="experiencia" value="Júnior" <?php echo Vagas::is_checked($vaga['nivelExperiencia'], "Júnior") ?> required>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <label for="Pleno">Pleno</label>
                                                                                    <input type="radio" class="text-muted" name="experiencia" value="Pleno" <?php echo Vagas::is_checked($vaga['nivelExperiencia'], "Pleno") ?> required>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <label for="Sênior">Sênior</label>
                                                                                    <input type="radio" class="text-muted" name="experiencia" value="Sênior" <?php echo Vagas::is_checked($vaga['nivelExperiencia'], "Sênior") ?> required>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <label for="indefinido">Indefinido</label>
                                                                                    <input type="radio" class="text-muted" name="experiencia" value="indefinido" <?php echo Vagas::is_checked($vaga['nivelExperiencia'], "indefinido") ?> required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <p class=" text-muted">O cadastro nessa vaga ficará disponível por:</p>
                                                                            <div class="row" style="padding-bottom: 5%;">
                                                                                <div class="col">
                                                                                    <label for="7">7 dias</label>
                                                                                    <input type="radio" class="text-muted" name="disponibilidade" value="7" <?php echo Vagas::is_checked($vaga['periodoVagaAberta'], "7") ?> required>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <label for="15">15 dias</label>
                                                                                    <input type="radio" class="text-muted" name="disponibilidade" value="15" <?php echo Vagas::is_checked($vaga['periodoVagaAberta'], "15") ?> required>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <label for="30">30 dias</label>
                                                                                    <input type="radio" class="text-muted" name="disponibilidade" value="30" <?php echo Vagas::is_checked($vaga['periodoVagaAberta'], "30") ?> required>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <label for="60">60 dias</label>
                                                                                    <input type="radio" class="text-muted" name="disponibilidade" value="60" <?php echo Vagas::is_checked($vaga['periodoVagaAberta'], "60") ?> required>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <label for="0">Indefinido</label>
                                                                                    <input type="radio" class="text-muted" name="disponibilidade" value="0" <?php echo Vagas::is_checked($vaga['periodoVagaAberta'], "0") ?> required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <input type="hidden" name="id" id="id" value="<?= $vaga['id'] ?>">
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                                            <button type="submit" name="alterarDados" class="btn btn-danger">Alterar vaga</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-danger" name="excluirVaga" data-bs-toggle="modal" data-bs-target="#modalExcluir<?= $vaga['id'] ?>">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                    <div class="modal fade" id="modalExcluir<?= $vaga['id'] ?>" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Excluir vaga</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body" style="font-size:15px;">
                                                                    <p class="text-start">Tem certeza que quer excluir essa vaga?</p>
                                                                    <form method="post">
                                                                        <input type="hidden" name="ativa" id="ativa" value="0">
                                                                        <input type="hidden" name="id" value="<?= $vaga['id'] ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                                    <button type="submit" name="excluirVaga" class="btn btn-danger">Excluir</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } elseif ($vaga['aprovada'] == 2) { ?>
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAterar<?= $vaga['id'] ?>">
                                                        <i class="fa-solid fa-pencil"></i>
                                                    </button>
                                                    <div class="modal fade" id="modalAterar<?= $vaga['id'] ?>" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Alterar Vaga</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body text-start" style="padding-left: 10%; padding-right: 10%;font-size:15px;">
                                                                    <form method="post">
                                                                        <div class="row" style="padding-bottom: 5%;">
                                                                            <div class="col">
                                                                                <div class="form-floating">
                                                                                    <input class="form-control text-muted" id="floatingInput" disabled="true" value="<?= $vaga['dataAbrir'] ?>" name="dataAbrir" required>
                                                                                    <label for="floatingInput">Data de Publicação:</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col">
                                                                                <div class="form-floating">
                                                                                    <input type="text" class="form-control text-muted" id="floatingInput" value="<?= $vaga['titulo'] ?>" name="cargo" required>
                                                                                    <label for="floatingInput">Cargo:</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col">
                                                                                <div class="form-floating">
                                                                                    <input type="text" class="form-control text-muted" id="floatingInput" value="<?= $vaga['salario'] ?>" name="salario" required>
                                                                                    <label for="floatingInput">Salário:</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row" style="padding-bottom: 5%;">
                                                                            <div class="form-floating">
                                                                                <textarea name="qualificacoes" class="form-control text-muted" id="floatingInput" rows="6" cols="60" required><?= $vaga['descricaoQualificacao'] ?></textarea>
                                                                                <label for="floatingInput" style="padding-left: 4%;">Qualificações
                                                                                    necessárias:</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row" style="padding-bottom: 5%;">
                                                                            <div class="form-floating">
                                                                                <textarea name="funcoes" class="form-control text-muted" id="floatingInput" rows="6" cols="60" required><?= $vaga['descricaoFuncoes'] ?></textarea>
                                                                                <label for="floatingInput" style="padding-left: 4%;">Funções que serão
                                                                                    exercidas:</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row" style="padding-bottom: 5%;">
                                                                            <div class="form-floating">
                                                                                <textarea name="beneficios" class="form-control text-muted" id="floatingInput" rows="6" cols="60" required><?= $vaga['descricaoBeneficios'] ?></textarea>
                                                                                <label for="floatingInput" style="padding-left: 4%;">Benefícios:</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <p class="text-muted">Tipo:</p>
                                                                            <div class="row" style="padding-bottom: 5%;">
                                                                                <div class="col">
                                                                                    <label for="Home Office">Home Office</label>
                                                                                    <input type="radio" class="text-muted" name="tipo" value="Home Office" <?php echo Vagas::is_checked($vaga['tipo'], "Home Office") ?> required>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <label for="Híbrido">Híbrido</label>
                                                                                    <input type="radio" class="text-muted" name="tipo" value="Híbrido" <?php echo Vagas::is_checked($vaga['tipo'], "Híbrido") ?> required>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <label for="Presencial">Presencial</label>
                                                                                    <input type="radio" class="text-muted" name="tipo" value="Presencial" <?php echo Vagas::is_checked($vaga['tipo'], "Presencial") ?> required><br>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <p class="text-muted">Nível de Experiência necessário:</p>
                                                                            <div class="row" style="padding-bottom: 5%;">
                                                                                <div class="col">
                                                                                    <label for="Estagiário">Estagiário</label>
                                                                                    <input type="radio" class="text-muted" name="experiencia" value="Estagiário" <?php echo Vagas::is_checked($vaga['nivelExperiencia'], "Estagiário") ?> required>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <label for="Júnior">Júnior</label>
                                                                                    <input type="radio" class="text-muted" name="experiencia" value="Júnior" <?php echo Vagas::is_checked($vaga['nivelExperiencia'], "Júnior") ?> required>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <label for="Pleno">Pleno</label>
                                                                                    <input type="radio" class="text-muted" name="experiencia" value="Pleno" <?php echo Vagas::is_checked($vaga['nivelExperiencia'], "Pleno") ?> required>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <label for="Sênior">Sênior</label>
                                                                                    <input type="radio" class="text-muted" name="experiencia" value="Sênior" <?php echo Vagas::is_checked($vaga['nivelExperiencia'], "Sênior") ?> required>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <label for="indefinido">Indefinido</label>
                                                                                    <input type="radio" class="text-muted" name="experiencia" value="indefinido" <?php echo Vagas::is_checked($vaga['nivelExperiencia'], "indefinido") ?> required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <p class=" text-muted">O cadastro nessa vaga ficará disponível por:</p>
                                                                            <div class="row" style="padding-bottom: 5%;">
                                                                                <div class="col">
                                                                                    <label for="7">7 dias</label>
                                                                                    <input type="radio" class="text-muted" name="disponibilidade" value="7" <?php echo Vagas::is_checked($vaga['periodoVagaAberta'], "7") ?> required>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <label for="15">15 dias</label>
                                                                                    <input type="radio" class="text-muted" name="disponibilidade" value="15" <?php echo Vagas::is_checked($vaga['periodoVagaAberta'], "15") ?> required>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <label for="30">30 dias</label>
                                                                                    <input type="radio" class="text-muted" name="disponibilidade" value="30" <?php echo Vagas::is_checked($vaga['periodoVagaAberta'], "30") ?> required>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <label for="60">60 dias</label>
                                                                                    <input type="radio" class="text-muted" name="disponibilidade" value="60" <?php echo Vagas::is_checked($vaga['periodoVagaAberta'], "60") ?> required>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <label for="0">Indefinido</label>
                                                                                    <input type="radio" class="text-muted" name="disponibilidade" value="0" <?php echo Vagas::is_checked($vaga['periodoVagaAberta'], "0") ?> required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <input type="hidden" name="id" id="id" value="<?= $vaga['id'] ?>">
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                                            <button type="submit" name="alterarDados" class="btn btn-danger">Alterar vaga</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-danger" name="excluirVaga" data-bs-toggle="modal" data-bs-target="#modalExcluir<?= $vaga['id'] ?>">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                    <div class="modal fade" id="modalExcluir<?= $vaga['id'] ?>" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Excluir vaga</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body" style="font-size:15px;">
                                                                    <p class="text-start">Tem certeza que quer excluir essa vaga?</p>
                                                                    <form method="post">
                                                                        <input type="hidden" name="ativa" id="ativa" value="0">
                                                                        <input type="hidden" name="id" value="<?= $vaga['id'] ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                                    <button type="submit" name="excluirVaga" class="btn btn-danger">Excluir</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } elseif ($vaga['aprovada'] == 0) { ?>
                                                    <button type="button" class="btn btn-danger" name="excluirVaga" data-bs-toggle="modal" data-bs-target="#modalExcluir<?= $vaga['id'] ?>">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                    <div class="modal fade" id="modalExcluir<?= $vaga['id'] ?>" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Excluir vaga</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body" style="font-size:15px;">
                                                                    <p class="text-start">Tem certeza que quer excluir essa vaga?</p>
                                                                    <form method="post">
                                                                        <input type="hidden" name="ativa" id="ativa" value="0">
                                                                        <input type="hidden" name="id" value="<?= $vaga['id'] ?>">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                                    <button type="submit" name="excluirVaga" class="btn btn-danger">Excluir</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                    <div class="accordion-body" style="font-size: 15px;">
                                        <div class="row">
                                            <h5 class="fw-normal">Funções</h5>
                                        </div>
                                        <div class="row text-break fw-light" style="padding-bottom: 3%; padding-left: 2%;">
                                            <?= $vaga['descricaoFuncoes'] ?>
                                        </div>
                                        <div class="row text-break">
                                            <h5 class="fw-normal">Qualificações</h5>
                                        </div>
                                        <div class="row text-break fw-light" style="padding-bottom: 3%; padding-left: 2%;">
                                            <?= $vaga['descricaoQualificacao'] ?>
                                        </div>
                                        <div class="row text-break fw-light">
                                            <h5 class="fw-normal">Benefícios</h5>
                                        </div>
                                        <div class="row text-break fw-light" style="padding-bottom: 3%; padding-left: 2%;">
                                            <?= $vaga['descricaoBeneficios'] ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>