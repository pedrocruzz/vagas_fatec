<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../public/assets/css/global.css">
   <link rel="stylesheet" href="../public/assets/bootstrap-5.1.3-dist/css/bootstrap.min.css">
   <title>Document</title>
   <link href="../public/assets/css/sidebars.css" rel="stylesheet">
</head>

<body>
   <div class="container">
      <div class="d-flex justify-content-center">
         <div class="container">
            <div class="row">
               <div class="col-8">
                  <div class="bg-light rounded-3 ">
                     <div class="container-fluid py-5 bg-secondary bg-opacity-10">
                        <h2 class="fw-bold">Desenvolvedor de Software</h2>
                        <a href="#" class="link-secondary"><p class="fw-normal fs-5">Amazon</p></a>
                        <p class="col-md-8">Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.</p>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Desejo me candidatar!</button>
                     </div>
                  </div>
               </div>
               <div class="col-4">
                  <main>
                     <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white" style="width: 380px;">
                        <div class="list-group list-group-flush border-bottom scrollarea">
                           <?php foreach ($data['vagas'] as $vaga) { ?>
                              <a href="#" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                                 <div class="d-flex w-100 align-items-center justify-content-between">
                                    <strong class="mb-1"><?= $vaga['titulo'] ?></strong>
                                    <strong class="mb-1"><?= $vaga['empresa'] ?></strong>
                                    <small>Há 5 dias</small>
                                 </div>
                                 <div class="col-10 mb-1 small" pattern="\d*" maxlength="4"><?= $vaga['descricao']; ?></div>
                              </a>
                           <?php } ?>
                        </div>
                     </div>
                     <div class="b-example-divider"></div>
                  </main>
               </div>
            </div>
         </div>
      </div>

      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Cadastro na Vaga</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <div class="mb-3">
                     <label for="exampleFormControlInput1" class="form-label">E-mail</label>
                     <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                  </div>
                  <div class="mb-3">
                     <label for="formFile" class="form-label">Curriculo:</label>
                     <input class="form-control form-control-sm" id="formFileSm" type="file">
                  </div>
                  <div class="mb-3">
                     <label for="exampleFormControlTextarea1" class="form-label">Deseja informar algo mais?</label>
                     <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                  <button type="button" class="btn btn-primary">Candidatar-se</button>
               </div>
            </div>
         </div>
      </div>
      <script src="../public/assets/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
      <script src="../public/assets/js/sidebars.js"></script>
</body>

</html>