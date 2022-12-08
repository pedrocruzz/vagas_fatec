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
    <title>Empresas Cadastradas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>

</head>

<body>
    <?php include('index.php') ?>
    <div class="container" style="padding-left: 200px;">
        <div class="card" <?php if (empty($data['empresas'])) {
                                echo 'style="margin-top: 25%;margin-bottom: 25%;"';
                            } ?>>
            <h2 class="card-header text-center bg-light link-secondary">Empresas Cadastradas</h2>
            <div class="container p-3">
                <div class="card-body">
                    <?php if (empty($data['empresas'])) {
                        echo '<p class=" text-center text-muted">Não há nenhuma empresa cadastrada no site.</p>';
                    } ?>
                    <?php foreach ($data['empresas'] as $key => $empresa) { ?>
                        <div class="card" style="margin-bottom: 3%;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col text-start">
                                        <h5 class="card-title"><?= $empresa['nomeFantasia'] ?> <?php if ($empresa['parceria'] == 1) { ?>
                                                <i class="fa-solid fa-medal" data-bs-toggle="tooltip" title="Selo de parceria" style="color:#dc3545;"></i>
                                            <?php } ?>
                                        </h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p class="fw-normal"> Razão Social:
                                            <nobr class="text-muted"><?= $empresa['razaoSocial'] ?></nobr>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p class="fw-normal"> Responsável:
                                            <nobr class="text-muted"><?= $empresa['responsavel'] ?></nobr>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <p class="fw-normal">Descrição:
                                    <p class="text-muted"> <?= $empresa['descricao'] ?></p>
                                    </p>
                                </div>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <form action="../empresa/perfil" method="POST">
                                        <input type="hidden" name="id" value="<?= $empresa['id'] ?>">
                                        <button class="btn btn-primary" name="verEmpresa" type="submit">Ver Perfil</button>
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