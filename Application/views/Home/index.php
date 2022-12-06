<!DOCTYPE html>
<html lang="pt-br">

<head>
    <metbutton charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
        <style>
            .pesquisa {
                margin-left: 23%;
                margin-right: 23%;
                <?php if ($data['vagas'] == NULL) {
                    echo 'padding-top: 46.5%;';
                } else {
                    echo 'padding-top: 26.5%;';
                } ?>
            }
        </style>
</head>

<body>
    <div class="container">
        <div class="card rounded-0 mb-3" style="border: none;">
            <img src="/assets/img/imagemHome.png" class="rounded float-end" alt="Pessoas em uma entrevista de emprego">
            <div class="card-img-overlay">
                <h1 class="display-6 row align-items-start text-center">Conheça
                    a sua nova comunidade
                    profissional e
                    encontre o emprego ou estágio certo para você!</h1>
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php $i = 1; ?>
                        <?php foreach (array_chunk($data['vagas'], 2) as $group) { ?>
                            <div class="carousel-item  <?php if ($i == 1) {
                                                            echo 'active';
                                                        } ?>" data-bs-interval="10000">
                                <div class="row">
                                    <?php foreach ($group as $vaga) { ?>
                                        <div class="col">
                                            <div class="card" style="width: 30rem; height: 12rem; margin: 10px;">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?= $vaga['titulo'] ?></h5>
                                                    <h6 class="card-subtitle mb-2 text-muted">publicada por <?= $vaga['nome_empresa'] ?></h6>
                                                    <p class="card-text">
                                                    <p class="fw-normal" style="margin-bottom: 4px;">Qualificações necessárias: </p>
                                                    <p class="text-muted"> <?php if (strlen($vaga['descricaoQualificacao']) > 60) {
                                                                                echo substr($vaga['descricaoQualificacao'], 0, 60) . '...';
                                                                            } else {
                                                                                echo $vaga['descricaoQualificacao'];
                                                                            } ?>
                                                    </p>
                                                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                                        <form action="../vaga/index" method="POST">
                                                            <input type="hidden" name="id" value="<?= $vaga['id'] ?>">
                                                            <button class="btn btn-primary btn-sm" name="VerVagaEspecifica" type="submit">Ver Mais</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $i++; ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" style="margin-left: 4px;" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon visually-hidden" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" style="margin-right: 4px;" data-bs-slide="next">
                        <span class="carousel-control-next-icon visually-hidden" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="pesquisa">
                    <div class="ratio" style="--bs-aspect-ratio: 9%;">
                        <form method="POST" action="../vaga/index">
                            <input class=" border border-1-white rounded-pill lead fst-italic p-3" style="width: 100%;" type="search" name="titulo" placeholder="O que você procura?" aria-label="Search">
                            <input type="submit" name="pesquisaDeVagas" style="display: none">
                        </form>
                    </div>
                </div>
                <div class="card-group" style="padding-top: 25%;">
                    <div class="card" style="width: 15rem;">
                        <figure class="figure d-flex justify-content-center p-5">
                            <img src="/assets/img/empregos.png" class="figure-img img-fluid rounded" alt="Ícone de emprego">
                        </figure>
                        <div class="card-body">
                            <h5 class="lead fw-normal">Empregos</h5>
                            <p class="lead">Conheça todas as oportunidades de emprego disponíveis no momento!</p>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a class="btn btn-danger btn-sm" href="/vaga/index" role="button">Ver Mais</a>
                            </div>
                        </div>
                    </div>
                    <div class="card" style="width: 15rem;">
                        <figure class="figure d-flex justify-content-center p-5">
                            <img src="/assets/img/empresas.png" class="figure-img img-fluid rounded" alt="Ícone da empresa">
                        </figure>
                        <div class="card-body">
                            <h5 class="lead fw-normal">Empresas</h5>
                            <p class="lead">Conheça as empresas aqui cadastradas e as oportunidades
                                que elas oferecem!</p>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a class="btn btn-danger btn-sm" href="/home/empresasCadastradas" role="button">Ver Mais</a>
                            </div>
                        </div>
                    </div>
                    <div class="card" style="width: 15rem;">
                        <figure class="figure d-flex justify-content-center p-5">
                            <img src="/assets/img/estagios.png" class="figure-img img-fluid rounded" alt="Ícone do estágio">
                        </figure>
                        <div class="card-body">
                            <h5 class="lead fw-normal">Estágios</h5>
                            <p class="lead">Conheça todas as oportunidades de estágios disponíveis no momento! </p>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <form method="POST" action="../vaga/index">
                                    <button class="btn btn-danger btn-sm" type="submit" name="VerApenasEstagios">Ver Mais</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>