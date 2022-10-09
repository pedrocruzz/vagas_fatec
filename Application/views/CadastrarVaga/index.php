<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minhas Vagas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        #corpoCartao {
            height: 600px;
            overflow-y: scroll;
        }

        #bolinhas {
            margin-right: 5%;
        }
    </style>
</head>

<body>
    <div class="container">
        <h3 class="display-6 text-center" style="padding-top: 5%;">Bem-vindo(a) à sua área de vagas!</h3>

        <div class="card" style="margin-left: 5%; margin-right:5%; margin-bottom: 5%;">
            <div class="card-header lead fw-normal">
                <div class="row">
                    <div class="col">
                        Minhas Vagas
                    </div>
                    <div class="col text-end">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Cadastrar Nova Vaga
                        </button>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Cadastrar Nova Vaga</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="padding-left: 10%; padding-right: 10%;">
                                <form action="" method="POST">
                                    <label for="data" class="lead fw-normal">Data de publicação:</label><br>
                                    <input type="date" name="data" id="data" required><br>
                                    <br><label for="cargo" class="lead fw-normal">Cargo:</label><br>
                                    <input type="text" style="padding-right: 55%;" name="cargo" id="cargo" required><br>
                                    <br><label for="salario" class="lead fw-normal">Salário:</label><br>
                                    <input type="text" name="salario" id="salario" required><br>
                                    <br><label for="qualificacoes" class="lead fw-normal">Qualificações
                                        necessárias:</label><br>
                                    <textarea name="qualificacoes" id="qualificacoes" rows="6" cols="60"
                                        required></textarea><br>
                                    <br><label for="funcoes" class="lead fw-normal">Funções que serão
                                        exercidas:</label><br>
                                    <textarea name="funcoes" id="funcoes" rows="6" cols="60" required></textarea><br>
                                    <br><label for="beneficios" class="lead fw-normal">Benefícios:</label><br>
                                    <textarea name="beneficios" id="beneficios" rows="6" cols="60" required></textarea>
                                    <br>
                                    <br>
                                    <p class="lead fw-normal">Tipo:</p>
                                    <label for="homeOffice" class="lead">Home Office</label>
                                    <input type="radio" id="bolinhas" name="escolha" value="homeOffice" required>
                                    <label for="hibrido" class="lead">Híbrido</label>
                                    <input type="radio" id="bolinhas" name="escolha" value="hibrido" required>
                                    <label for="Presencial" class="lead">Presencial</label>
                                    <input type="radio" id="bolinhas" name="escolha" value="presencial" required><br>
                                    <br>
                                    <p class="lead fw-normal">Nível de Experiência necessário:</p>
                                    <label for="estagiario" class="lead">Estagiário</label>
                                    <input type="radio" id="bolinhas" name="escolha2" value="estagiario" required>
                                    <label for="junior" class="lead">Júnior</label>
                                    <input type="radio" id="bolinhas" name="escolha2" value="junior" required>
                                    <label for="pleno" class="lead">Pleno</label>
                                    <input type="radio" id="bolinhas" name="escolha2" value="pleno" required>
                                    <label for="senior" class="lead">Sênior</label>
                                    <input type="radio" id="bolinhas" name="escolha2" value="senior" required>
                                    <label for="indefinido" class="lead">Indefinido</label>
                                    <input type="radio" id="bolinhas" name="escolha2" value="indefinido" required><br>
                                    <br>
                                    <p class="lead fw-normal">O cadastro nessa vaga ficará disponível por:</p>
                                    <label for="7" class="lead">7 dias</label>
                                    <input type="radio" id="bolinhas" name="escolha3" value="7" required>
                                    <label for="15" class="lead">15 dias</label>
                                    <input type="radio" id="bolinhas" name="escolha3" value="15" required>
                                    <label for="30" class="lead">30 dias</label>
                                    <input type="radio" id="bolinhas" name="escolha3" value="30" required>
                                    <label for="60" class="lead">60 dias</label>
                                    <input type="radio" id="bolinhas" name="escolha3" value="60" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-danger">Cadastrar vaga</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container" id="corpoCartao">
                <div class="card-body">
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <div class="card-header lead fw-normal">
                                    <div class="row">
                                        <div class="col">
                                            Vaga
                                        </div>
                                        <div class="col text-end">
                                            <button type="button" class="btn btn-secondary">
                                                Currículos submetidos
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body">
                                    <strong>This is the first item's accordion body.</strong> It is shown by default,
                                    until
                                    the collapse
                                    plugin adds the appropriate classes that we use to style each element. These classes
                                    control the
                                    overall appearance, as well as the showing and hiding via CSS transitions. You can
                                    modify any of
                                    this with custom CSS or overriding our default variables. It's also worth noting
                                    that
                                    just about any
                                    HTML can go within the <code>.accordion-body</code>, though the transition does
                                    limit
                                    overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <div class="card-header lead fw-normal">
                                    <div class="row">
                                        <div class="col">
                                            Vaga
                                        </div>
                                        <div class="col text-end">
                                            <button type="button" class="btn btn-secondary">
                                                Currículos submetidos
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body">
                                    <strong>This is the first item's accordion body.</strong> It is shown by default,
                                    until
                                    the collapse
                                    plugin adds the appropriate classes that we use to style each element. These classes
                                    control the
                                    overall appearance, as well as the showing and hiding via CSS transitions. You can
                                    modify any of
                                    this with custom CSS or overriding our default variables. It's also worth noting
                                    that
                                    just about any
                                    HTML can go within the <code>.accordion-body</code>, though the transition does
                                    limit
                                    overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <div class="card-header lead fw-normal">
                                    <div class="row">
                                        <div class="col">
                                            Vaga
                                        </div>
                                        <div class="col text-end">
                                            <button type="button" class="btn btn-secondary">
                                                Currículos submetidos
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body">
                                    <strong>This is the first item's accordion body.</strong> It is shown by default,
                                    until
                                    the collapse
                                    plugin adds the appropriate classes that we use to style each element. These classes
                                    control the
                                    overall appearance, as well as the showing and hiding via CSS transitions. You can
                                    modify any of
                                    this with custom CSS or overriding our default variables. It's also worth noting
                                    that
                                    just about any
                                    HTML can go within the <code>.accordion-body</code>, though the transition does
                                    limit
                                    overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <div class="card-header lead fw-normal">
                                    <div class="row">
                                        <div class="col">
                                            Vaga
                                        </div>
                                        <div class="col text-end">
                                            <button type="button" class="btn btn-secondary">
                                                Currículos submetidos
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body">
                                    <strong>This is the first item's accordion body.</strong> It is shown by default,
                                    until
                                    the collapse
                                    plugin adds the appropriate classes that we use to style each element. These classes
                                    control the
                                    overall appearance, as well as the showing and hiding via CSS transitions. You can
                                    modify any of
                                    this with custom CSS or overriding our default variables. It's also worth noting
                                    that
                                    just about any
                                    HTML can go within the <code>.accordion-body</code>, though the transition does
                                    limit
                                    overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <div class="card-header lead fw-normal">
                                    <div class="row">
                                        <div class="col">
                                            Vaga
                                        </div>
                                        <div class="col text-end">
                                            <button type="button" class="btn btn-secondary">
                                                Currículos submetidos
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body">
                                    <strong>This is the first item's accordion body.</strong> It is shown by default,
                                    until
                                    the collapse
                                    plugin adds the appropriate classes that we use to style each element. These classes
                                    control the
                                    overall appearance, as well as the showing and hiding via CSS transitions. You can
                                    modify any of
                                    this with custom CSS or overriding our default variables. It's also worth noting
                                    that
                                    just about any
                                    HTML can go within the <code>.accordion-body</code>, though the transition does
                                    limit
                                    overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <div class="card-header lead fw-normal">
                                    <div class="row">
                                        <div class="col">
                                           Vaga
                                        </div>
                                        <div class="col text-end">
                                            <button type="button" class="btn btn-secondary">
                                                Currículos submetidos
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body">
                                    <strong>This is the first item's accordion body.</strong> It is shown by default,
                                    until
                                    the collapse
                                    plugin adds the appropriate classes that we use to style each element. These classes
                                    control the
                                    overall appearance, as well as the showing and hiding via CSS transitions. You can
                                    modify any of
                                    this with custom CSS or overriding our default variables. It's also worth noting
                                    that
                                    just about any
                                    HTML can go within the <code>.accordion-body</code>, though the transition does
                                    limit
                                    overflow.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>