<?php

if (isset($_POST['verAluno'])) {
    $idAluno = $_POST['id'];
}
else if (isset($_SESSION['alunoId'])) {
    $idAluno= $_SESSION['alunoId'];
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
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <figure class="figure d-flex justify-content-center" style="padding-top: 5px;padding-bottom: 5px;">
                    <img src="/assets/img/user.png" class="figure-img img-fluid rounded" alt="Ícone user" width="350px" height="350px">
                </figure>
            </div>
            <div class="col">
                <?php foreach ($data['alunos'] as $key => $aluno) { ?>
                    <?php if ($aluno['id'] == $idAluno) { ?>
                        <div class="card">
                            <div class="card-body" style="width: 800px;height: auto;">
                                <div class="row">
                                    <div class="col text-start border-bottom">
                                        <h1 class="card-title"><?= $aluno['nome'] ?> <?= $aluno['sobrenome'] ?></h1>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col border-bottom p-2">
                                        <h5 class="fw-normal"> Contato</h5>
                                        <p class="text-muted" style="padding-bottom: 0%;margin-bottom: 0%;"><?= $aluno['telefone'] ?> </p>
                                        <p class="text-muted"><?= $aluno['email'] ?> </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col border-bottom p-2">
                                        <h5 class="fw-normal">Cursando</h5>
                                        <nobr class="text-muted">
                                            <?php if ($aluno['curso'] == "GE") {
                                                echo 'Gestão Empresarial';
                                            } else if ($aluno['curso'] == "GP") {
                                                echo 'Gestão da Produção Industrial';
                                            } else if ($aluno['curso'] == "GTI") {
                                                echo 'Gestão da Tecnologia da Informação';
                                            } else if ($aluno['curso'] == "DSM") {
                                                echo 'Desenvolvimento de Software Multiplataforma';
                                            }
                                            ?>
                                        </nobr>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col border-bottom p-2">
                                        <h5 class="fw-normal">Área de Interesse</h5>
                                        <nobr class="text-muted"><?= $aluno['areaInteresse'] ?></nobr>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <h5 class="fw-normal p-2">Currículo</h5>
                                    <iframe  src="/assets/uploads/<?= $aluno["curriculo"]?>" style="visibility: visible;" height="900px" frameborder="0"></iframe>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>