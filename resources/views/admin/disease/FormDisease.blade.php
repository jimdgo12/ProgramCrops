@csrf


<!-- nameCommon -->
<div>
    <label class="form-label" for="nameCommon">Nombre Comun:</label>

    <input class="form-control" type="text" name="nameCommon" id="nameCommon"
        placeholder="Ingrese el nombre de la Enfermedad" value="{{ old('nameCommon', $diseases) }}">
    @error('nameCommon')
        <div class="text-small text-danger">{{ $message }}</div>
        
    @enderror
</div>
<!-- nameScientific -->

<div>
    <label class="form-label" for="NameScientific">Nombre Científico:</label>
<input class="form-control" type="text" name="NameScientific" id="NameScientific"
    placeholder="Ingrese el nombre cientifico" value="{{ old('NameScientific', $diseases) }}">
@error('NameScientific')
    <div class="text-small text-danger">{{ $message }}</div>
@enderror
</div>


<!-- description -->

<div>
    <label class="form-label" for="description">Descripción:</label>
    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Ingrese la descripción">{{ old('description', $diseases) }}</textarea>
    @error('description')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>


<!-- diagnosis -->


<div>
    <label class="form-label" for="diagnosis">Diagnóstico:</label>
    <textarea class="form-control" name="diagnosis" id="diagnosis" rows="3" placeholder="Ingrese el diagnóstico">{{ old('diagnosis', $diseases) }}</textarea>
    @error('diagnosis')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>


<!-- symptoms -->

<div>
    <label class="form-label" for="symptoms">simtomas:</label>
    <textarea class="form-control" name="symptoms" id="symptoms" rows="3" placeholder="Ingrese los simtomas">{{ old('symptoms', $diseases) }}</textarea>
    @error('symptoms')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>


<!-- transmission -->

<div>
    <label class="form-label" for="transmission">transmisión:</label>
    <textarea class="form-control" name="transmission" id="transmission" rows="3"
        placeholder="Ingrese la transmision">{{ old('transmission', $diseases) }}</textarea>
    @error('transmission')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>




<!-- type -->
<div>
    <label class="form-label" for="type">Tipos Enfermedades:</label>
    {{-- <input class="form-control" type="text" name="type" id="type" placeholder="Extensión" --}}
    <select class="form-control" name="type" id="type">
        <option value="Bacterias" @selected(old('type', $diseases) == 'Bacterias')>Bacterias</option>
        <option value="Insectos" @selected(old('type', $diseases) == 'Insectos')>Insectos</option>
        <option value="Insectos" @selected(old('type', $diseases) == 'Hongos')>Hongos</option>

    </select>

    @error('type')
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
        src="@isset($disease)
        {{ asset('storage/disease/' . $diseases->image) }}
    @else
        {{ asset('img/upload-image.png') }}
    @endisset"
        alt="Previsualizar imagen" class="image-preview">
</div>
