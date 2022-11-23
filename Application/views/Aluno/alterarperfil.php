<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <title>Aterar Perfil</title>
</head>
<body>

    <script src="bootstrap-5.1.3-dist/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
    <h3>Aterar meu Perfil Profissional</h3>
        <form class="row g-3 needs-validation" novalidate>
        <div class="col-md-6">
            <label for="validationNome" class="form-label"><strong>Nome:</strong></label>
            <input type="text" class="form-control" id="validationNome" value="Nome" required>
            <div class="valid-feedback">
            Looks good!
        </div>
        </div>
        <div class="col-md-6">
            <label for="validationEmail" class="form-label"><strong>Email:</strong></label>
            <input type="text" class="form-control" id="validationEmail" value="Email" required>
            <div class="valid-feedback">
            Looks good!
            </div>
        </div>
        <div class="col-md-6">
            <label for="validationCelular" class="form-label"><strong>Celular:</strong></label>
            <input type="text" class="form-control" id="validationCelular" value="Celular" required>
            <div class="valid-feedback">
            Looks good!
            </div>
        </div>

        <h3>Redes Sociais</h3>
        </div>
        <div class="col-md-6">
            <label for="validationLinkedin" class="form-label"><strong>Linkedin:</strong></label>
            <input type="text" class="form-control" id="validationLinkedin" value="Linkedin" required>
            <div class="valid-feedback">
            Looks good!
            </div>
        </div>
        <div class="col-md-6">
            <label for="validationGitHub" class="form-label"><strong>GitHub:</strong></label>
            <input type="text" class="form-control" id="validationGitHub" value="GitHub" required>
            <div class="valid-feedback">
            Looks good!
            </div>
        </div>
        </div>
        <div class="col-md-6">
            <label for="validationPortifolio" class="form-label"><strong>Portifólio:</strong></label>
            <input type="text" class="form-control" id="validationPortifolio" value="Portifólio" required>
            <div class="valid-feedback">
            Looks good!
            </div>
        </div>
        <h3>Informações Adicionais</h3>
        </div>
        <div class="col-md-6">
            <label for="validationSformacao" class="form-label"><strong>Sobre formação:</strong></label>
            <input type="text" class="form-control" id="validationSformacao" value="Formação, objetivos, conquistas" required>
            <div class="valid-feedback">
            Looks good!
            </div>
        </div>
        <div class="col-md-6">
            <label for="validationShabilidades" class="form-label"><strong>Sobre habilidades:</strong></label>
            <input type="text" class="form-control" id="validationShabilidades" value="Habilidades, competências e experiência profissional." required>
            <div class="valid-feedback">
            Looks good!
            </div>
        </div>
        <div class="col-md-6">
            <label for="validationDisponibilidade" class="form-label"><strong>Disponibilidade:</strong></label>
            <input type="text" class="form-control" id="validationDisponibilidade" value="Horários, viagens e mudanças." required>
            <div class="valid-feedback">
            Looks good!
            </div>
        </div>
        <div class="col-md-6">
            <label for="validationIdioma" class="form-label"><strong>Idioma:</strong></label>
            <input type="text" class="form-control" id="validationIdioma" value="Idioma" required>
            <div class="valid-feedback">
            Looks good!
            </div>
        </div>


        </div>
        <div class="col-12">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
            <label class="form-check-label" for="invalidCheck">
            Concorde com os termos e condições
            </label>
            <div class="invalid-feedback">
            Você deve concordar antes de enviar.
            </div>
          </div>
        </div>
        <div class="col-12">
          <button class="btn btn-primary" type="submit">Enviar formulário</button>
        </div>
        </form>

</body>
</html>
