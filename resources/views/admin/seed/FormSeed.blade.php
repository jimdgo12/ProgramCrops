@csrf
<!-- category -->
<div>
    <label class="form-label" for="name">Cultivos:</label>
    <select class="form-control" name="crop_id" id="crop_id">
        <option value="0" selected>Seleccione un cultivo </option>
        <!-- old() función que obtiene el valor anterior en la recarga de un formulario
            o el valor asignado  -->
        @isset($crops)
            @foreach ($crops as $crop)
                <option value="{{ $crop->id }}"
                    @isset($seed)
                        @selected(old('crop_id', $seed) == $seed->crop->id)
                    @else
                        @selected(old('crop_id', $seed) == $crop->id)
                    @endisset>
                    {{ $crop->name }}
                </option>
            @endforeach
        @endisset
    </select>
    @error('crop_id')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Name-->

<div>
    <label class="form-label" for="name">Nombre:</label>

    <input class="form-control" type="text" name="name" id="name" placeholder="Ingrese el nombre cultivo"
        value="{{ old('name', $seed) }}">
    @error('name')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>


<!-- NameScientific-->

<div>
    <label class="form-label" for="name">Nombre Científico:</label>

    <input class="form-control" type="text" name="nameScientific" id="nameScientific"
        placeholder="Ingrese el nombre cientifico del cultivo" value="{{ old('nameScientific', $seed) }}">
    @error('nameScientific')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Origen -->
<div>
    <label class="form-label" for="origin">Origen:</label>
    <textarea class="form-control" name="origin" id="origin" rows="3" placeholder="Ingrese el origen">{{ old('origin', $seed) }}</textarea>
    @error('origin')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- Morfología -->

<div>
    <label class="form-label" for="morphology">Morfología:</label>
    <textarea class="form-control" name="morphology" id="morphology" rows="3" placeholder="Ingrese la morfología">{{ old('morphology', $seed) }}</textarea>
    @error('morphology')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>


<!-- type -->
<div>
    <label class="form-label" for="type">tipo:</label>
    {{-- <input class="form-control" type="text" name="type" id="type" placeholder="Extensión" --}}
    <select class="form-control" name="type" id="type">
        <option value="Estaca" @selected(old('type', $seed) == 'Criolla')>Criolla</option>
        <option value="Semilla" @selected(old('type', $seed) == 'Transgenica')>Transgenica</option>
    </select>
    @error('type')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>


<!-- type -->
<div>
    <label class="form-label" for="quality">cualidad:</label>
    {{-- <input class="form-control" type="text" name="quality" id="quality" placeholder="Extensión" --}}
    <select class="form-control" name="quality" id="quality">
        <option value="Estaca" @selected(old('quality', $seed) == 'Sana')>Sana</option>
        <option value="Semilla" @selected(old('quality', $seed) == 'dañada')>Dañada</option>
    </select>
    @error('quality')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror

</div>

<!-- Extensión-->
<div>
    <label class="form-label" for="spreading">Extensión:</label>

    <input class="form-control" type="text" name="spreading" id="spreading"
        placeholder="Ingrese la extensión cultivo" value="{{ old('spreading', $seed) }}">
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
        src="@isset($seed)
        {{ asset('storage/seed/' . $seed->image) }}
    @else
        {{ asset('img/upload-image.png') }}
    @endisset"
        alt="Previsualizar imagen" class="image-preview">
</div>
