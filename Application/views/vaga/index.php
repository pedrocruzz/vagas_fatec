<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../public/css/global.css">
  <link rel="stylesheet" href="../public/bootstrap-5.1.3-dist/css/bootstrap.min.css">
  <title>Document</title>
  <link href="../public/css/sidebars.css" rel="stylesheet">
</head>

<body>
<?php foreach ($data['vagas'] as $vaga) { ?>
            <tr>
              <td><?= $vaga['id'] ?></td>
              <td><?= $vaga['titulo'] ?></td>
            </tr>
            <?php }?>
  <header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 link-secondary">Overview</a></li>
          <li><a href="#" class="nav-link px-2 link-dark">Inventory</a></li>
          <li><a href="#" class="nav-link px-2 link-dark">Customers</a></li>
          <li><a href="#" class="nav-link px-2 link-dark">Products</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>

        <div class="dropdown text-end">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>
  <div class="container">
  <div class="d-flex justify-content-center">
    <div class="container">
      <div class="row">
        <div class="col-8">
          <div class="bg-light rounded-3">
            <div class="container-fluid py-5">
              <h1 class="display-5 fw-bold">Custom jumbotron</h1>
              <p class="col-md-8 fs-4">Using a  series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.</p>
              <button class="btn btn-primary btn-lg" type="button">Example button</button>
            </div>
          </div>
        </div>
        <div class="col-4">
          <main>
            <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white" style="width: 380px;">
              <div class="list-group list-group-flush border-bottom scrollarea">
                <a href="#" class="list-group-item list-group-item-action active py-3 lh-tight" aria-current="true">
                  <div class="d-flex w-100 align-items-center justify-content-between">
                    <strong class="mb-1">List group item heading</strong>
                    <small>Wed</small>
                  </div>
                  <div class="col-10 mb-1 small">Some placeholder content in a paragraph below the heading and date.
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action py-3 lh-tight">
                  <div class="d-flex w-100 align-items-center justify-content-between">
                    <strong class="mb-1">List group item heading</strong>
                    <small class="text-muted">Tues</small>
                  </div>
                  <div class="col-10 mb-1 small">Some placeholder content in a paragraph below the heading and date.
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action py-3 lh-tight">
                  <div class="d-flex w-100 align-items-center justify-content-between">
                    <strong class="mb-1">List group item heading</strong>
                    <small class="text-muted">Mon</small>
                  </div>
                  <div class="col-10 mb-1 small">Some placeholder content in a paragraph below the heading and date.
                  </div>
                </a>

                <a href="#" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                  <div class="d-flex w-100 align-items-center justify-content-between">
                    <strong class="mb-1">List group item heading</strong>
                    <small class="text-muted">Wed</small>
                  </div>
                  <div class="col-10 mb-1 small">Some placeholder content in a paragraph below the heading and date.
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action py-3 lh-tight">
                  <div class="d-flex w-100 align-items-center justify-content-between">
                    <strong class="mb-1">List group item heading</strong>
                    <small class="text-muted">Tues</small>
                  </div>
                  <div class="col-10 mb-1 small">Some placeholder content in a paragraph below the heading and date.
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action py-3 lh-tight">
                  <div class="d-flex w-100 align-items-center justify-content-between">
                    <strong class="mb-1">List group item heading</strong>
                    <small class="text-muted">Mon</small>
                  </div>
                  <div class="col-10 mb-1 small">Some placeholder content in a paragraph below the heading and date.
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                  <div class="d-flex w-100 align-items-center justify-content-between">
                    <strong class="mb-1">List group item heading</strong>
                    <small class="text-muted">Wed</small>
                  </div>
                  <div class="col-10 mb-1 small">Some placeholder content in a paragraph below the heading and date.
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action py-3 lh-tight">
                  <div class="d-flex w-100 align-items-center justify-content-between">
                    <strong class="mb-1">List group item heading</strong>
                    <small class="text-muted">Tues</small>
                  </div>
                  <div class="col-10 mb-1 small">Some placeholder content in a paragraph below the heading and date.
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action py-3 lh-tight">
                  <div class="d-flex w-100 align-items-center justify-content-between">
                    <strong class="mb-1">List group item heading</strong>
                    <small class="text-muted">Mon</small>
                  </div>
                  <div class="col-10 mb-1 small">Some placeholder content in a paragraph below the heading and date.
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                  <div class="d-flex w-100 align-items-center justify-content-between">
                    <strong class="mb-1">List group item heading</strong>
                    <small class="text-muted">Wed</small>
                  </div>
                  <div class="col-10 mb-1 small">Some placeholder content in a paragraph below the heading and date.
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action py-3 lh-tight">
                  <div class="d-flex w-100 align-items-center justify-content-between">
                    <strong class="mb-1">List group item heading</strong>
                    <small class="text-muted">Tues</small>
                  </div>
                  <div class="col-10 mb-1 small">Some placeholder content in a paragraph below the heading and date.
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action py-3 lh-tight">
                  <div class="d-flex w-100 align-items-center justify-content-between">
                    <strong class="mb-1">List group item heading</strong>
                    <small class="text-muted">Mon</small>
                  </div>
                  <div class="col-10 mb-1 small">Some placeholder content in a paragraph below the heading and date.
                  </div>
                </a>
              </div>
            </div>
          </main>
        </div>
      </div>
    </div>
  </div>
  <script src="../public/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
  <script src="../public/js/sidebars.js"></script>
</body>

</html>