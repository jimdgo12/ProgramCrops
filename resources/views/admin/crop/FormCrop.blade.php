@csrf



<div>
    <label class="form-label" for="name">Nombre:</label>

    <input class="form-control" type="text" name="name" id="name" placeholder="Ingrese el nombre cultivo"
        value="{{ old('name', $crop) }}">
    @error('name')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>
<!-- description -->
<div>
    <label class="form-label" for="description">Descripción:</label>
    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Ingrese la descripción">{{ old('description', $crop) }}</textarea>
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
    <textarea class="form-control" name="history" id="history" rows="3" placeholder="Ingrese la historía">{{ old('history', $crop) }}</textarea>
    @error('history')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>


<!-- phaseFertilizer -->


<div>
    <label class="form-label" for="phaseFertilizer">fases de fertilización:</label>
    <textarea class="form-control" name="phaseFertilizer" id="phaseFertilizer" rows="3"
        placeholder="Ingrese las fases de fertilizacio">{{ old('phaseFertilizer', $crop) }}</textarea>
    @error('phaseFertilizer')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>


<!-- phaseHarvest -->

<div>
    <label class="form-label" for="phaseHarvest">fases de cosecha:</label>
    <textarea class="form-control" name="phaseHarvest" id="phaseHarvest" rows="3" placeholder="Ingrese la cosecha">{{ old('phaseHarvest', $crop) }}</textarea>
    @error('phaseHarvest')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>




<!-- spreading -->
<div>
    <label class="form-label" for="spreading">Propagación:</label>
    {{-- <input class="form-control" type="text" name="spreading" id="spreading" placeholder="Extensión" --}}
    <select class="form-control" name="spreading" id="spreading">
        <option value="Estaca" @selected(old('spreading', $crop) == 'Estaca')>Estaca</option>
        <option value="Semilla" @selected(old('spreading', $crop) == 'Semilla')>Semilla</option>
    </select>

    @error('spreading')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>


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
        src="@isset($crop)
        {{ asset('storage/crop/' . $crop->image) }}
    @else
        {{ asset('img/upload-image.png') }}
    @endisset"
        alt="Previsualizar imagen" class="image-preview">
</div>
