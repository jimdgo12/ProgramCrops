@extends('home.TemplateHome')


@section('items')
    <div class="navbar-nav ms-auto">
        <a href="{{ route('informationCrop', $crop) }}" class="nav-item nav-link">Información</a>
        <a href="{{ route('informationSeeds', $crop) }}" class="nav-item nav-link">Semillas</a>
        <a href="{{ route('informationDiseases', $crop) }}" class="nav-item nav-link">Enfermedades</a>
        <a href="{{ route('informationFertilizers', $crop) }}" class="nav-item nav-link">Fertilizantes</a>
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
                    <h1 class="text-white mb-3"><span class="fw-light text-dark">Enfermedad</h1>
                    <p class="text-white mb-4 animated slideInRight">{{ $disease_selected->nameCommon }}</p>                </div>
                <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s">
                    <div class="card">
                        @isset($disease_selected)
                            <div class="card-body" data-wow-delay="0.1s" >
                                <table id="example1" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Imagen</th>
                                            <th>Descripición</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center"><img src="{{ asset($disease_selected->image) }}"
                                                    alt="{{ $disease_selected->name }}" width="300" height="300">

                                            </td>
                                            <td>
                                                <strong>Nombre: </strong><br>
                                                {{ $disease_selected->nameCommon }}<br>
                                                <strong>Nombre científico: </strong><br>
                                                {{ $disease_selected->nameScientific }}<br>
                                                <strong>Descripción: </strong><br>
                                                {{ $disease_selected->description }}<br>
                                                <strong>Diágnostico: </strong><br>
                                                {{ $disease_selected->diagnosis }}<br>
                                                <strong>Sintomas: </strong><br>
                                                {{ $disease_selected->symptoms }}<br>
                                                <strong>Transmisión: </strong><br>
                                                {{ $disease_selected->transmission }}<br>
                                                <strong>Tipo: </strong><br>
                                                {{ $disease_selected->type }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        @endisset


                    </div>
                </div>
                <div class="mx-auto text-center wow fadeIn  " data-wow-delay="0.1s" style="max-width: 600px;">
                    <br>
                    <br>
                    <h1 class="text-white mb-3"><span class="fw-light text-dark">Plaguicidas</h1>
                    <p class="text-white mb-4 animated slideInRight">{{ $disease_selected->nameCommon }}</p>
                </div>
                <div class="mx-auto text-center wow fadeIn table-responsive" data-wow-delay="0.1s"
                    style="max-height: 30rem">
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
                                    @isset($pesticides)
                                        @foreach ($pesticides as $pesticide)
                                            <tr>
                                                <td class="text-center"><img src="{{ asset($pesticide->image) }}"
                                                        alt="{{ $pesticide->name }}" width="300" height="300">
                                                </td>
                                                <td>
                                                    <strong>Nombre: </strong><br>
                                                    {{ $pesticide->name }}<br>
                                                    <strong>Descrición: </strong><br>
                                                    {{ $pesticide->description }}<br>
                                                    <strong>Descripción: </strong><br>
                                                    {{ $pesticide->description }}<br>
                                                    <strong>Ingrediente Activo: </strong><br>
                                                    {{ $pesticide->activeIngredient }}<br>
                                                    <strong>Precio: </strong><br>
                                                    {{ $pesticide->price }}<br>
                                                    {{-- <strong>Transmisión: </strong><br>
                                                    {{ $pesticide->transmission }}<br>
                                                    <strong>Tipo: </strong><br>
                                                    {{ $pesticide->type }} --}}
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
