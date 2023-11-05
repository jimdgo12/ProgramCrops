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
    <section class="page-section bg-primary" id="semillas">
        <div class="container-fluid how-to-use bg-primary my-5 py-5">
            <div class="container text-white py-5">
                <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="text-white mb-3"><span class="fw-light text-dark">Nombre</h1>
                    <p class="text-white mb-4 animated slideInRight">{{ $crop->name }}</p>
                </div>
                <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="text-white mb-3"><span class="fw-light text-dark">Nombre cientifíco</h1>
                    <p class="text-white mb-4 animated slideInRight">{{ $crop->nameScientific }}</p>
                </div>
                <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="text-white mb-3"><span class="fw-light text-dark">Descripción</h1>
                    <p class="text-white mb-4 animated slideInRight">{{ $crop->description }}</p>
                </div>
                <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="text-white mb-3"><span class="fw-light text-dark">Historia</h1>
                    <p class="text-white mb-4 animated slideInRight">{{ $crop->history }}</p>
                </div>
                <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="text-white mb-3"><span class="fw-light text-dark">Fases de fertilización</h1>
                    <p class="text-white mb-4 animated slideInRight">{{ $crop->phaseFertilizer }}</p>
                </div>
                <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="text-white mb-3"><span class="fw-light text-dark">Fases de cosecha</h1>
                    <p class="text-white mb-4 animated slideInRight">{{ $crop->phaseHarvest }}</p>
                </div>
                <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="text-white mb-3"><span class="fw-light text-dark">Extensión</h1>
                    <p class="text-white mb-4 animated slideInRight">{{ $crop->spreading }}</p>
                </div>
            </div>

        </div>






    </section>
@endsection
