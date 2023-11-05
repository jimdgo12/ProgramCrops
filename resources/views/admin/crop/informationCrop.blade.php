<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Tutorial Crops</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Poppins:wght@200;600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('admin/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <h1 class="text-center">Cultivos para la vida</h1>
    <br>

    <div class="informationCropBtn">
        <a href="{{ route('informationSeeds', $crop->id) }}" class="btn btn-dark  ">Semillas</a>
        <a href="{{ route('informationDiseases', $crop->id) }}" class="btn btn-dark ">Enfermedades</a>

        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-dark ">Salir</button>
        </form>

        <a href="#" class="btn btn-dark ">Abonos</a>

    </div>






    <div class="d-flex flex-wrap justify-content-center mt-3 gap-3">


        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto">

                <a href="#cultivos" class="nav-item nav-link">Cultivos</a>
                <a href="" class="nav-item nav-link">Products</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu bg-light mt-2">
                        <a href="" class="'dropdown-item">Features</a>
                        <a href="" class="'dropdown-item">How To Use</a>
                        <a href="" class="'dropdown-item">Testimonial</a>
                        <a href="" class="'dropdown-item">Blog Articles</a>
                        <a href="" class="'dropdown-item">404 Page</a>
                    </div>
                </div>
                <a href="" class="nav-item nav-link">Contact</a>
            </div>
            < </div>


                <div class="card mb-3" style="max-width: 900px;">
                    <div class="row g-0 d-flex align-content-center">
                        <div class="col-md-4">
                            <img src="{{ $crop->image }}" class="img-fluid" alt="Card title">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <label for="Nombre Cultivo" class="colorLabel">Nombre Cultivo:</label>
                                <h5 class="texto ">{{ $crop->name }}</h5>
                                <label for="Descripción" class="colorLabel">Descripción:</label>
                                <p class="texto">{{ $crop->description }}</p>
                                <label for="Nombre Científica" class="colorLabel">Nombre Científico:</label>
                                <p class="texto">{{ $crop->nameScientific }}</p>
                                <label for="Historía"class="colorLabel">Historía:</label>
                                <p class="texto ">{{ $crop->history }}</p>
                                <label for="Fases Fertilización" class="colorLabel">Fases Fertilización:</label>
                                <p class="texto ">{{ $crop->phaseFertilizer }}</p>
                                <label for="Fases cosecha"class="colorLabel">Fases Cosecha:</label>
                                <p class="texto ">{{ $crop->phaseHarvest }}</p>
                                <label for="Extensión"class="colorLabel">Extensión:</label>
                                <p class="texto ">{{ $crop->spreading }}</p>



                            </div>
                        </div>
                    </div>
                </div>

        </div>

</body>
