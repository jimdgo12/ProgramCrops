@csrf

<div>
    <label class="form-label" for="name">Nombre:</label>
    <input class="form-control" type="text" name="name" id="name"
        placeholder="Ingrese el nombre cultivo" value="{{ old('name', $crop) }}">
    @error('name')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>
<!-- description -->
<div>
    <label class="form-label" for="description">Descripción:</label>
    <input class="form-control" type="text" name="description" id="description"
        placeholder="Ingrese la descripción" value="{{ old('description', $crop) }}">
    @error('description')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>
<!-- nameScientific -->
<div>
    <label class="form-label" for="nameScientific">Nombre Científico:</label>
    <input class="form-control" type="text" name="nameScientific" id="nameScientific"
        placeholder="Ingrese el nombre Científico" value="{{ old('nameScientific', $crop) }}">
    @error('breed')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>
<!-- history -->
<div>
    <label class="form-label" for="history">Historía:</label>
    <input class="form-control" type="text" name="history" id="history" placeholder="Ingrese la historia"
        value="{{ old('nameScientific', $crop) }}">
    @error('breed')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>
<!-- phaseFertilizer -->
<div>
    <label class="form-label" for="phaseFertilizer">fases de fertilización:</label>
    <input class="form-control" type="text" name="phaseFertilizer" id="phaseFertilizer"
        placeholder="Ingrese las fases de fertilización" value="{{ old('phaseFertilizer', $crop) }}">
    @error('breed')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>
<!-- phaseHarvest -->
<div>
    <label class="form-label" for="phaseHarvest">Fases de Cosecha:</label>
    <input class="form-control" type="text" name="phaseHarvest" id="phaseHarvest"
        placeholder="Ingrese las fases de cosecha" value="{{ old('phaseHarvest', $crop) }}">
    @error('breed')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- spreading -->
<div>
    <label class="form-label" for="spreading">Extensión:</label>
    <input class="form-control" type="text" name="spreading" id="spreading" placeholder="Extensión"
        value="{{ old('spreading', $crop) }}">
    @error('breed')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>

{{--
<!-- image -->
<div>
    <label for="customFile" class="form-label">Imagen:</label>
    <div class="custom-file">
        <input type="file" class="custom-file-input" name="image" id="customFile"
            placeholder="Selecciona una imagen">
        <label class="custom-file-label" for="customFile">Seleccionar</label>
    </div>
    @error('image')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>

<br>
<div class="d-flex justify-content-center">
    <img name="image" id="preview-image-before-upload"
        src="@isset($pet)
        {{ asset('storage/pets/' . $crop->image) }}
    @else
        {{ asset('img/upload-image.png') }}
    @endisset"
        alt="Previsualizar imagen" class="image-preview">
</div> --}}
