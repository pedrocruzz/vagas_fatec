<?php

use Application\models\Alunos;

if (isset($_POST['alterarPerfil'])) {
    $data = array (
        'linkedin' => $_POST['linkedin'],
        'github'  => $_POST['github'],
        'portifolio' => $_POST['portifolio'],
        'sobreformacao' => $_POST['sobreformacao'],
        'sobrehabilidade' => $_POST['sobrehabilidade'],
        'disponibilidade' => $_POST['disponibilidade'],
         'idioma' => $_POST['idioma'],
    
    );
    $result = Alunos::alterarperfil($data);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <title>Aterar Perfil</title>
</head>
<body>
    <script src="bootstrap-5.1.3-dist/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
    <h3>Aterar meu Perfil Profissional</h3>

    <form class="row g-3 needs-validation" method="post">
        <div class="col-md-6">
            <label for="validationNome" class="form-label"><strong>Nome:</strong></label>
            <input type="text" class="form-control" id="validationNome" value="<?= $data['nome'] ?>" disabled>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-6">
            <label for="validationEmail" class="form-label"><strong>Email:</strong></label>
            <input type="text" class="form-control" id="validationEmail" value="Email" disabled>
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
            <input type="text" class="form-control" id="validationLinkedin" name="linkedin" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-6">
            <label for="validationGitHub" class="form-label"><strong>GitHub:</strong></label>
            <input type="text" class="form-control" id="validationGitHub" name="github" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        </div>
        <div class="col-md-6">
            <label for="validationPortifolio" class="form-label"><strong>Portifólio:</strong></label>
            <input type="text" class="form-control" id="validationPortifolio" name="portifolio" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <h3>Informações Adicionais</h3>
        </div>
        <div class="col-md-6">
            <label for="validationSformacao" class="form-label"><strong>Sobre formação:</strong></label>
            <input type="text" class="form-control" id="validationSformacao" name="sobreformacao" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-6">
            <label for="validationShabilidades" class="form-label"><strong>Sobre habilidades:</strong></label>
            <input type="text" class="form-control" id="validationShabilidades" name="sobrehabilidade" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-6">
            <label for="validationDisponibilidade" class="form-label"><strong>Disponibilidade:</strong></label>
            <input type="text" class="form-control" id="validationDisponibilidade" name="disponibilidade" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-6">
            <label for="validationIdioma" class="form-label"><strong>Idioma:</strong></label>
            <input type="text" class="form-control" id="validationIdioma" name="idioma" required>
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
            <button class="btn btn-primary" type="submit" name="alterarPerfil">Enviar formulário</button>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>