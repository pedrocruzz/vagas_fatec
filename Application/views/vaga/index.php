<?php

use Application\models\Vagas;


if (isset($_POST['verVaga'])) { //check if form was submitted
    $input = $_POST['verVaga']; //get input text
}


if (isset($_POST['candidatarVaga'])) {
    $data = array(
        'id_vagas' => $_POST['id_vagas']
    );
    
    $result = Vagas::save($data);

    if($result):
        $_SESSION['sucesso'] = 'Médico cadastrado com sucesso!';
        header('location: /vaga');
        die();
      else:
          $_SESSION['erro'] = 'Ocorreu um erro ao cadastrar o médico, verifique as informações e tente novamente!';
      endif;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/assets/css/global.css">
    <link rel="stylesheet" href="../public/assets/bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <title>Document</title>
    <link href="../public/assets/css/sidebars.css" rel="stylesheet">
</head>

<style>
    button {
        all: unset;
        cursor: pointer;
        background: none;
        color: inherit;
        border: none;
        padding: 0;
        font: inherit;
        outline: inherit;
    }

    button:focus {
        outline: orange 5px auto;
    }
</style>

<body>
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <div class="bg-light rounded-3 ">
                            <?php foreach ($data['vagas'] as $key => $vaga) { ?>
                                <?php if ($vaga['id'] == $input) { ?>
                                    <div class="container-fluid py-5 bg-secondary bg-opacity-10">
                                        <h2 class="fw-bold"><?= $vaga['titulo'] ?></h2>
                                        <a href="#" class="link-secondary">
                                            <p class="fw-normal fs-5"><?= $vaga['empresa'] ?></p>
                                        </a>
                                        <p class="col-md-8"><?= $vaga['descricao']; ?></p>
                                        <button type="button" class="botaoSite btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Desejo me candidatar!</button>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-4">
                        <main>
                            <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white" style="width: 380px;">
                                <div class="list-group list-group-flush border-bottom scrollarea">
                                    <form action="" method="post">
                                        <?php foreach ($data['vagas'] as $vaga) { ?>
                                            <button type="submit" name="verVaga" value="<?= $vaga['id'] ?>">
                                                <a href="#" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                                                    <div class="row d-flex w-100 align-items-center justify-content-between">
                                                        <h5 class="col-12 mb-1"><?= $vaga['titulo'] ?></h5>
                                                        <p class="col-4 mb-1 fw-normal" name="empresa"><u><?= $vaga['empresa'] ?></u></p>
                                                        <small class="col-4">Há 5 dias</small>
                                                    </div>
                                                    <div class="col-10 mb-1 small" pattern="\d*" maxlength="4"><?= $vaga['descricao']; ?></div>
                                                </a>
                                            </button>
                                        <?php } ?>
                                    </form>
                                </div>
                            </div>
                            <div class="b-example-divider"></div>
                        </main>
                    </div>
                </div>
            </div>
        </div>

          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <form method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Cadastro na Vaga</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <input type="text" name="id_vagas" class="form-control" placeholder="Nome do médico" required value="<?= $input ?>">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Curriculo:</label>
                                <input class="form-control form-control-sm" id="formFileSm" type="file">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Deseja informar algo mais?</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="botaoSite btn btn-danger" name="candidatarVaga">Candidatar-se</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        <script src="../public/assets/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
        <script src="../public/assets/js/sidebars.js"></script>
</body>

</html>