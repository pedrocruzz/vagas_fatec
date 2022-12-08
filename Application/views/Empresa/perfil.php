<?php

use Application\models\Vagas;
use Application\models\Empresas;

if (isset($_POST['verEmpresa'])) {
    $idEmpresa = $_POST['id'];
    $dataVagas = Vagas::findAllVagasDessaEmpresa($idEmpresa);
    $dadosEempresa = Empresas::selectEmpresa($idEmpresa);
} else if (isset($_SESSION['empresaId'])) {
    $idEmpresa = $_SESSION['empresaId'];
    $dataVagas = Vagas::findAllVagasDessaEmpresa($idEmpresa);
    $dadosEmpresa = Empresas::selectEmpresa($idEmpresa);
}
if (isset($_POST["adicionarProfilePic"])) {
    $target_dir = "C:/xampp/htdocs/vagas_fatec/public/assets/profilePicsEmpresas/";
    $target_file = $target_dir . basename($_FILES["fotoPerfil"]["name"]);
    $uploadOk = 1;
    $FileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Arquivo não foi armazenado.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fotoPerfil"]["tmp_name"], $target_file)) {
            $data = array(
                'fotoPerfil' => basename($_FILES["fotoPerfil"]["name"]),
                'id' => $_POST['id'],
            );

            $result = Empresas::addFotoPerfil($data);
            header('location:/empresa/perfil');
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/f8536a8b01.js" crossorigin="anonymous"></script>
    <title>Perfil</title>
    <style>
        #addPic {
            <?php if (!(isset($_SESSION) &&  isset($_SESSION['empresaId']) && $_SESSION['empresaId'] != 0)) {
                echo 'visibility: hidden;';
            } else {
                echo 'visibility: visible;';
            } ?>
        }
    </style>
    <?php foreach ($dadosEmpresa  as $key => $empresa) {
        if ($empresa['aprovada'] == 2) {
            echo '    <script>
document.getElementById("podeVer").style.visibility = "hidden";
document.getElementById("podeVer").style.display = "none";
</script>';
        }
    }
    ?>
</head>

<body>
    <div class="container">
        <div class="row">
            <?php foreach ($dadosEmpresa  as $key => $empresa) { ?>
                <?php
                if ($empresa['aprovada'] == 2) {
                    echo ('<div class="d-flex justify-content-center">
                    <div class="alert alert-warning p-2 d-flex justify-content-center" style="width:400px;" role="alert">
                    Aguardando Aprovação do Cadastro...
                    </div>
                    </div>');
                }
                ?>
                <div class="col">
                    <div class="rounded-circle" style="background-color:#6C757D1A;height:350px;width:350px;padding:5.2%;">
                        <?php if ($empresa['fotoPerfil'] == NULL) {
                            echo '<figure class="figure d-flex justify-content-center" style="padding-top: 5px;padding-bottom: 5px;">
                            <img src="/assets/img/user.png" class="figure-img img-fluid rounded" alt="Ícone user" width="310px" height="310px">
                            </figure>';
                        } else {
                            echo '<img class="rounded-circle d-flex justify-content-center" src="/assets/profilePicsEmpresas/';
                            echo $empresa["fotoPerfil"];
                            echo '"height="310px" width="310px" >';
                        } ?>
                    </div>
                    <div class="col d-flex justify-content-start" id="addPic">
                        <button type="button" class="btn btn-secondary" style="height: 45px;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fa-solid fa-pencil"></i>
                        </button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Alterar Foto de Perfil</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="/empresa/perfil" enctype="multipart/form-data">
                                            <label for="fotoPerfil" class="form-label">Selecione uma foto....</label>
                                            <input type="file" class="form-control form-control-sm text-muted" name="fotoPerfil" id="fotoPerfil">
                                            <input type="hidden" value="<?= $_SESSION['empresaId'] ?>" name="id">
                                    </div>
                                    <div class="modal-footer d-flex justify-content-center">
                                        <button class="btn btn-primary" type="submit" name="adicionarProfilePic" id="adicionarProfilePic">Salvar</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body" style="width: 700px;height: auto;">
                            <div class="row">
                                <div class="col text-start border-bottom">
                                    <h1 class="card-title"><?= $empresa['nomeFantasia'] ?> <?php if ($empresa['parceria'] == 1) { ?>
                                            <i class="fa-solid fa-medal" data-bs-toggle="tooltip" title="Selo de parceria" style="color:#dc3545;"></i>
                                        <?php } ?>
                                    </h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col border-bottom p-2">
                                    <h5 class="fw-normal"> Contato</h5>
                                    <p class="text-muted" style="padding-bottom: 0%;margin-bottom: 0%;"><?= $empresa['telefone'] ?> </p>
                                    <p class="text-muted"><?= $empresa['email'] ?> </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col border-bottom p-2">
                                    <h5 class="fw-normal">Endereço</h5>
                                    <nobr class="text-muted"><?= $empresa['cidade'] ?></nobr>
                                    <nobr class="text-muted"><?= $empresa['endereco'] ?></nobr>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <h5 class="fw-normal p-2">Sobre a empresa</h5>
                                <p class="text-muted"> <?= $empresa['descricao'] ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="card" style="margin-top: 2rem;">
                        <h1 class="card-title text-center border-bottom p-2"> Vagas</h1>
                        <div class="card-body" style="height: 500px;overflow-y: scroll;">
                            <?php if (empty($dataVagas)) {
                                echo '<h3 class=" text-center text-muted" style="padding-top:25%;">Essa empresa não possui vagas no momento.</h3>';
                            } ?>
                            <?php foreach ($dataVagas as $key => $vaga) { ?>
                                <div class="card m-2 fw-normal p-2">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <div class="col text-start">
                                            <h5 style="padding-bottom: 0;"><?= $vaga['titulo'] ?></h5>
                                        </div>
                                        <div class="col text-end">
                                            <form action="../vaga/index" method="POST">
                                                <input type="hidden" name="id" value="<?= $vaga['id'] ?>">
                                                <button class="btn btn-primary" name="VerVagaEspecifica" type="submit">Ver Detalhes</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="row" style="padding-top: 0; font-size: 13px;">
                                        <p class="sm text-muted">
                                            publicada há <?= date('d', time() - strtotime($vaga['dataAbrir'])) ?> dias
                                        </p>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
                </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>