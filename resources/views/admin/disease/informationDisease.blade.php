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

    <div class="card mb-3" style="max-width: 900px;">
        <div class="row g-0 d-flex align-content-center">
            <div class="col-md-4">
                <img src="{{ $inforCropDisease->image }}" class="img-fluid" alt="Card title">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <label for="Nombre Cultivo" class="colorLabel">Nombre Cultivo:</label>
                    <h5 class="texto ">{{ $inforCropDisease->name }}</h5>
                    <label for="Descripción" class="colorLabel">Descripción:</label>
                    <p class="texto">{{ $inforCropDisease->description }}</p>
                    <label for="Nombre Científica" class="colorLabel">Nombre Científico:</label>
                    <p class="texto">{{ $inforCropDisease->nameScientific }}</p>
                    <label for="Historía"class="colorLabel">Historía:</label>
                    <p class="texto ">{{ $inforCropDisease->history }}</p>
                    <label for="Fases Fertilización" class="colorLabel">Fases Fertilización:</label>
                    <p class="texto ">{{ $inforCropDisease->phaseFertilizer }}</p>
                    <label for="Fases cosecha"class="colorLabel">Fases Cosecha:</label>
                    <p class="texto ">{{ $inforCropDisease->phaseHarvest }}</p>
                    <label for="Extensión"class="colorLabel">Extensión:</label>
                    <p class="texto ">{{ $inforCropDisease->spreading }}</p>



                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-end">
                        {{-- <a href="{{ route('seed.create') }}" class="btn btn-warning"> --}}
                        <i class="fas fa-plus-circle nav-icon"> </i>
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Nombre</th>
                                <th>Nombre Cientifico</th>
                                <th>Descripción</th>
                                <th>Diagnóstico</th>
                                <th>Símtomas</th>
                                <th>Transmisión</th>
                                <th>tipo</th>
                                <th>Editar</th>
                                <th>Eliminar</th>

                            </tr>
                        </thead>
                        <tbody>
                            @isset($inforCropDisease)
                                @foreach ($inforCropDiseases as $inforCropDisease)
                                    <tr>
                                        <td><img src="{{ asset($inforCropDisease->image) }}"
                                                alt="{{ $inforCropDisease->nameCommon }}" width="60" height="80">
                                        </td>
                                        <td>{{ $inforCropDisease->nameScientific }}</td>
                                        <td>{{ $inforCropDisease->description }}</td>
                                        <td>{{ $inforCropDisease->diagnosis }}</td>
                                        <td>{{ $inforCropDisease->symptoms }}</td>
                                        <td>{{ $inforCropDisease->transmission }}</td>
                                        <td>{{ $inforCropDisease->type }}</td>

                                        <td class="text-center">
                                            <a href="" class="btn btn-info">
                                                <i class="fas fa-edit nav-icon"></i>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <form action="">
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-minus-circle nav-icon"> </i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endisset

                        </tbody>
                    </table>
                </div>
            </div>



            <!-- DataTables  & Plugins -->
            <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
            <script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
            <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
            <script src="{{ asset('admin/plugins/jszip/jszip.min.js') }}"></script>
            <script src="{{ asset('admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
            <script src="{{ asset('admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
            <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
            <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
            <script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

            <script type="text/javascript">
                $(function() {
                    $("#example1").DataTable({
                        "responsive": true,
                        "lengthChange": true,
                        "autoWidth": true,
                        "language": {
                            "lengthMenu": "Mostrar " +
                                `<select class="custom-select custom-select-sm form-control form-control-sm">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>` +
                                " registros por página",
                            "zeroRecords": "No hay registros",
                            "info": "Mostrando la página _PAGE_ de _PAGES_",
                            "infoEmpty": "No hay registros disponibles",
                            "infoFiltered": "(filtrado de _MAX_ registros totales)",
                            "search": "Buscar:",
                            "paginate": {
                                "next": "Siguiente",
                                "previous": "Anterior"
                            },
                            "processing": "Procesando...",
                            "buttons": {
                                "copy": "Copiar",
                                "print": "Imprimir",
                                "colvis": "Ocultar columnas"
                            }
                        },
                        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                });
            </script>


</body>
