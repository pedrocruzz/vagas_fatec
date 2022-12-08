<?php
if (!isset($_SESSION['adminId'])) {
    header('location: /administrador/login');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

</head>

<body>
    <?php include('index.php') ?>
    <div class="container" style="padding-left: 200px;">
        <div class="card" <?php if (empty($data['alunos'])) {
                                echo 'style="margin-top: 25%;margin-bottom: 25%;"';
                            } ?>>
            <h2 class="card-header text-center bg-light link-secondary">Alunos Cadastrados</h2>
            <div class="container p-3">
                <div class="card-body">
                    <?php if (empty($data['alunos'])) {
                        echo '<p class=" text-center text-muted">Não há nehuma empresa pendendo aprovação no momento.</p>';
                    } ?>
                    <?php foreach ($data['alunos'] as $key => $aluno) { ?>
                        <div class="card" style="margin-bottom: 3%;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col text-start">
                                        <h5 class="card-title"><?= $aluno['nome'] ?> <nobr class="card-title"><?= $aluno['sobrenome'] ?></nobr>
                                        </h5>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p class="fw-normal"> Curso:
                                            <nobr class="text-muted"><?= $aluno['curso'] ?></nobr>
                                        </p>
                                    </div>
                                    <div class="col">
                                        <p class="fw-normal"> RA:
                                            <nobr class="text-muted"><?= $aluno['ra'] ?></nobr>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p class="fw-normal"> Email:
                                            <nobr class="text-muted"><?= $aluno['email'] ?></nobr>
                                        </p>
                                    </div>
                                    <div class="col">
                                        <p class="fw-normal"> Telefone:
                                            <nobr class="text-muted"><?= $aluno['telefone'] ?></nobr>
                                        </p>
                                    </div>
                                </div>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <form action="../aluno/perfil" method="POST">
                                        <input type="hidden" name="id" value="<?= $aluno['id'] ?>">
                                        <button class="btn btn-primary" name="verAluno" type="submit">Ver Perfil</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>