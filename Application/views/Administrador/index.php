<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Sidebars · Bootstrap v5.1</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/f8536a8b01.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script>
        function generatePDF() {
            const element = document.getElementById('relatorio');
            var opt = {
                margin: 10,
                filename: 'relatorio.pdf',
                image: {
                    type: 'jpeg',
                    quality: 5
                },
                html2canvas: {
                    dpi: 192,
                    scale: 4,
                    letterRendering: true,
                    useCORS: true
                },
                jsPDF: {
                    unit: 'mm',
                    format: 'a4',
                    orientation: 'landscape'
                }
            };
            // Choose the element that our invoice is rendered in.
            html2pdf().set(opt).from(element).save();
        }
    </script>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sidebars/">



    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .sidebar {
            margin: 0;
            padding: 0;
            width: 200px;
            background-color: white;
            position: fixed;
            height: 100%;
            overflow: auto;
            /* Stay on top */
            top: 73px;
            /* Stay at the top */
            left: 0;
            overflow-y: hidden;
            /* Disable horizontal scroll */
            padding-top: 15px;
        }

        a {
            text-decoration: none;
        }
        #itemEscondido{
            visibility: none; 
            display: none;
        }

    </style>


    <!-- Custom styles for this template -->
    <link href="sidebars.css" rel="stylesheet">
</head>

<body>

        <main>
            <nav class="sidebar">
                <div class="d-flex flex-column flex-shrink-0">
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li>
                            <a href="dashboard" class="nav-link link-dark">
                                <i class="fa-solid fa-house"></i> Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="alunosCadastrados" class="nav-link link-dark">
                                <i class="fa-solid fa-graduation-cap"></i> Alunos
                            </a>
                        </li>
                        <li>
                        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" style="padding-left:1.1rem;padding-top:0.5rem;" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-suitcase"></i> Vagas
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="padding-left:10px;">
                                <li><a href="vagas_pendentes" class="link-dark rounded"><i class="fa-solid fa-circle-exclamation"></i> Pendentes</a></li>
                                <li><a href="vagasAtivas" class="link-dark rounded"><i class="fa-solid fa-circle-check"></i> Ativas</a></a></li>
                                <li><a href="#" class="link-dark rounded"><i class="fa-regular fa-circle-xmark"></i> Fechadas</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" style="padding-left:1.1rem;padding-top:1rem;" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-building"></i> Empresas
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink2" style="padding-left:10px;">
                                <li><a href="empresasPendentes" class="link-dark rounded"><i class="fa-solid fa-circle-exclamation"></i> Pendentes</a></li>
                                <li><a href="empresasCadastradas" class="link-dark rounded"><i class="fa-solid fa-circle-check"></i> Ativas</a></li>
                                <li><a href="concederParceria" class="link-dark rounded"><i class="fa-solid fa-handshake"></i> Selo de Parceria</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="dropdown" id="itemEscondido" style="padding-top: 310%; padding-left: 10px;">
                        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-circle-user rounded-circle me-2"></i>
                            <strong>Admin
                            </strong>
                        </a>
                        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                            <li><a class="dropdown-item" type="button" onclick=" generatePDF()"><i class="fa-solid fa-file"></i> Gerar relatório...</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </main>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="/assets/js/sidebars.js"></script>
</body>

</html>