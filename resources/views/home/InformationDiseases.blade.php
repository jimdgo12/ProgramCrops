@extends('home.TemplateHome')


@section('items')
    <div class="navbar-nav ms-auto">
        <a href="{{ route('informationCrop', $crop) }}" class="nav-item nav-link">Información</a>
        <a href="{{ route('informationSeeds', $crop) }}" class="nav-item nav-link">Semillas</a>
        <a href="{{ route('informationDiseases', $crop) }}" class="nav-item nav-link">Enfermedades</a>
        <a href="{{ route('informationFertilizers', $crop) }}" class="nav-item nav-link">Abonos</a>
    </div>
@endsection

@section('title')
    {{ $crop->name }}
@endsection

@section('image')
    <img class="img-fluid animated pulse infinite" src="{{ $crop->image }}" alt="">
@endsection



@section('content')
    <section class="page-section bg-primary" id="information">
        <div class="container-fluid how-to-use bg-primary my-5 py-5">
            <div class="container text-white py-5">
                <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="text-white mb-3"><span class="fw-light text-dark">Enfermedades</h1>
                    <p class="text-white mb-4 animated slideInRight">{{ $crop->name }}</p>
                </div>
                <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s">
                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Imagen</th>
                                        <th>Descripición</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($diseases)
                                        @foreach ($diseases as $disease)
                                            <tr>
                                                <td class="text-center"><img src="{{ asset($disease->image) }}"
                                                        alt="{{ $disease->name }}" width="300" height="300">
                                                    <br>
                                                    <br>
                                                    <a href="{{ route('informationPesticides', ['crop' => $crop, 'disease' => $disease]) }}"
                                                        class="btn btn-success">
                                                        Consulta los plagicidas
                                                    </a>
                                                </td>
                                                <td>
                                                    <strong>Nombre: </strong><br>
                                                    {{ $disease->nameCommon }}<br>
                                                    <strong>Nombre científico: </strong><br>
                                                    {{ $disease->nameScientific }}<br>
                                                    <strong>Descripción: </strong><br>
                                                    {{ $disease->description }}<br>
                                                    <strong>Diágnostico: </strong><br>
                                                    {{ $disease->diagnosis }}<br>
                                                    <strong>Sintomas: </strong><br>
                                                    {{ $disease->symptoms }}<br>
                                                    <strong>Transmisión: </strong><br>
                                                    {{ $disease->transmission }}<br>
                                                    <strong>Tipo: </strong><br>
                                                    {{ $disease->type }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endisset

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>






    </section>
@endsection
