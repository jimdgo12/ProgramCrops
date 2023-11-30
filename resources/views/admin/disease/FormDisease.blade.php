@csrf
<!-- crop -->
<!-- nameCommon -->
<div>
    <label class="form-label" for="nameCommon">Nombre Comun:</label>

    <input class="form-control" type="text" name="nameCommon" id="nameCommon"
        placeholder="Ingrese el nombre de la Enfermedad" value="{{ old('nameCommon', $disease) }}">
    @error('nameCommon')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>
<!-- nameScientific -->

<div>
    <label class="form-label" for="nameScientific">Nombre Científico:</label>
    <input class="form-control" type="text" name="nameScientific" id="nameScientific"
        placeholder="Ingrese el nombre cientifico" value="{{ old('nameScientific', $disease) }}">
    @error('nameScientific')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>


<!-- description -->

<div>
    <label class="form-label" for="description">Descripción:</label>
    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Ingrese la descripción">{{ old('description', $disease) }}</textarea>
    @error('description')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>


<!-- diagnosis -->


<div>
    <label class="form-label" for="diagnosis">Diagnóstico:</label>
    <textarea class="form-control" name="diagnosis" id="diagnosis" rows="3" placeholder="Ingrese el diagnóstico">{{ old('diagnosis', $disease) }}</textarea>
    @error('diagnosis')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>


<!-- symptoms -->

<div>
    <label class="form-label" for="symptoms">simtomas:</label>
    <textarea class="form-control" name="symptoms" id="symptoms" rows="3" placeholder="Ingrese los simtomas">{{ old('symptoms', $disease) }}</textarea>
    @error('symptoms')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>


<!-- transmission -->

<div>
    <label class="form-label" for="transmission">transmisión:</label>
    <textarea class="form-control" name="transmission" id="transmission" rows="3"
        placeholder="Ingrese la transmision">{{ old('transmission', $disease) }}</textarea>
    @error('transmission')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>




<!-- type -->
<div>
    <label class="form-label" for="type">Tipos Enfermedades:</label>
    {{-- <input class="form-control" type="text" name="type" id="type" placeholder="Extensión" --}}
    <select class="form-control" name="type" id="type">
        <option value="Bacterias" @selected(old('type', $disease) == 'Bacterias')>Bacterias</option>
        <option value="Insectos" @selected(old('type', $disease) == 'Insectos')>Insectos</option>
        <option value="Insectos" @selected(old('type', $disease) == 'Hongos')>Hongos</option>

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
        {{ asset('storage/disease/' . $disease->name) }}
    @else
        {{ asset('img/upload-image.png') }}
    @endisset"
        alt="Previsualizar imagen" class="image-preview">
</div>


@isset($disease)

    {{ $crop_ids = $disease->crops->pluck('id') }}
@endisset


<div>
    <label class="form-label" for="nameCommon">Cultivo: </label>
    @isset($crops)
        @foreach ($crops as $crop)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="{{ $crop->id }}" id="crop_id" name="crop_ids[]"
                    @isset($disease)
                        @checked(in_array($crop->id, $crop_ids))
                    @else
                        @if (is_array(old('crop_ids')))
                            @checked(in_array($crop->id, old('crop_ids')))
                        @endif
                @endisset>

                <label class="form-check-label" for="crop_id">{{ $crop->name }} </label>
            </div>
        @endforeach
    @endisset
    </select>
    @error('crop_ids')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>
