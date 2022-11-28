<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vagas Ativas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
   
</head>

<body>
    <?php include('index.php') ?>
    <div class="container" style="padding-left: 200px;">
        <div class="card" <?php if (empty($data['vagas'])) {
                                echo 'style="margin-top: 25%;margin-bottom: 25%;"';
                            } ?>>
            <h2 class="card-header text-center bg-light link-secondary">Vagas Ativas</h2>
            <div class="container p-3">
                <div class="card-body">
                    <?php if (empty($data['vagas'])) {
                        echo '<p class=" text-center text-muted">Não há nehuma vaga pendendo aprovação no momento.</p>';
                    } ?>
                    <?php foreach ($data['vagas'] as $key => $vaga) { ?>
                        <div class="card" style="margin-bottom: 3%;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col text-start">
                                        <h5 class="card-title"><?= $vaga['titulo'] ?></h5>
                                    </div>
                                    <div class="col text-end">
                                        <h6 class="card-text">Data de Inserção: <?= date('d/m/Y',strtotime($vaga['dataAbrir']))?></h6>
                                    </div>
                                </div>
                                <h6 class="card-subtitle mb-2 text-muted">publicada por <?= $vaga['nome_empresa'] ?></h6>
                                <div class="row">
                                    <div class="col">
                                        <p class="fw-normal"> Salário:
                                            <nobr class="text-muted"><?= $vaga['salario'] ?></nobr>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p class="fw-normal"> Tipo de vaga:
                                            <nobr class="text-muted"><?= $vaga['tipo'] ?></nobr>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p class="fw-normal"> Nível de experiência necessário:
                                            <nobr class="text-muted"><?= $vaga['nivelExperiencia'] ?></nobr>
                                        </p>
                                    </div>
                                </div>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <form action="../vaga/index" method="POST">
                                        <input type="hidden" name="id" value="<?= $vaga['id'] ?>">
                                        <button class="btn btn-primary" name="VerVagaEspecifica" type="submit">Ver Mais</button>
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