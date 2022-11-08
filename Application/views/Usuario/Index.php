<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>

    <script src="bootstrap-5.1.3-dist/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
    <h3>Meu Perfil Profissional</h3>

    <form>
    <br>
    <div class="container">
      <div class="row mb-2">
        <label for="inputNome" class="col-sm-2 col-form-label"><strong>Nome:</strong></label>
        <div class="col-sm-6">
          <input type="nome" class="form-control" id="inputNome" placeholder="Nome" required>
        </div>
      </div>
      <div class="row mb-2">
        <label for="inputEmail" class="col-sm-2 col-form-label"><strong>Email:</strong></label>
        <div class="col-sm-6">
          <input type="email" class="form-control" id="inputEmail" placeholder="Email" required>
        </div>
      </div>
      <div class="row mb-2">
        <label for="inputCel1" class="col-sm-2 col-form-label"><strong>Celular:</strong></label>
      <div class="col-sm-6">
        <input type="celular" class="form-control" id="inputCel1" placeholder="Celular" required>
      </div>
      </div>
      
      <h3>Redes Sociais</h3>
      <div class="row mb-2">
        <label for="inputdLinkedin" class="col-sm-2 col-form-label"><strong>Linkedin:</strong></label>
        <div class="col-sm-6">
          <input type="linkedin" class="form-control" id="inputLinkedin" placeholder="Linkedin" required>
        </div>
      </div>
      <div class="row mb-2">
        <label for="inputGitHub" class="col-sm-2 col-form-label"><strong>GitHub:</strong></label>
        <div class="col-sm-6">
          <input type="github" class="form-control" id="inputGitHub" placeholder="GitHub" required>
        </div>
      </div>
      
      <h3>Informações Adicionais</h3>
      <div class="row mb-2">
        <label for="inputInformacao" class="col-sm-2 col-form-label"><strong>Sobre formação:</strong></label>
        <div class="col-sm-6">
          <input type="informacao" class="form-control" id="inputInformacao" placeholder="Formacao, objetivos, conquitas" required>
        </div>
      </div>
       <div class="row mb-2">
        <label for="inputInformaçao2" class="col-sm-2 col-form-label"><strong>Sobre habilidades:</strong></label>
        <div class="col-sm-6">
          <input type="informacao2" class="form-control" id="inputInformaçao2" placeholder="Habilidades, Competências, experiência profissional" required>
        </div>
      </div>
      <div class="row mb-2">
        <label for="inputDisponibilidade" class="col-sm-2 col-form-label"><strong>Disponibilidade:</strong></label>
        <div class="col-sm-6">
          <input type="disponibilidade" class="form-control" id="inputDisponibilidade" placeholder="Horários, viagens e mudanças" required>
        </div>
      </div>
      <div class="row mb-2">
        <label for="inputIdioma" class="col-sm-2 col-form-label"><strong>Idioma:</strong></label>
        <div class="col-sm-6">
          <input type="Idioma" class="form-control" id="inputIdioma" placeholder="Idioma" required>
        </div>
      </div>

      <h3>Anexe seu Curriculo</h3>
      </strong> 
      <label><strong> Escolha seu arquivo para enviar: </strong></label>
      <input type="file" id="myFile" /> <br /><br />
        
      <input type="submit" value="submit" />

  </div>
  
  
  </form>


</body>
</html>