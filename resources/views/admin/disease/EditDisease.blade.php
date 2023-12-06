@extends('admin.BaseAdmin')

@section('title')
    Actualizar una Enfermedad
@endsection

@section('content')
    <div class="row">
        <div class="offset-3 col-6">
            <div class="card">
                <div class="card-body">
                    <!-- enctype="multipart/form-data"
                                adjuntar archivos a la petición del formulario
                                adjuntar un archivo de imagen (.jpg, .png)
                            -->
                    <form action="{{ route('diseases.update', $disease) }}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @include('admin.disease.FormDisease')
                        <br>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-warning" type="submit"> Actualizar </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <!-- bs-custom-file-input -->
    <script src="{{ asset('admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            bsCustomFileInput.init();

            // Previsualización de la imagen al cargar la página (si ya hay una imagen)
            let currentImage = '{{ isset($disease->image) ? asset("storage/disease/$disease->image") : asset("img/upload-image.png") }}';
            $('#preview-image-before-upload').attr('src', currentImage);

            $('#customFile').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-image-before-upload').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
@endsection


