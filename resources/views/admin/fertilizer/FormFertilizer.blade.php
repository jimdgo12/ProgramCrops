@csrf
<!-- fertilizer -->

<!-- name -->
<div>
    <label class="form-label" for="name">Nombre :</label>

    <input class="form-control" type="text" name="name" id="name" placeholder="Ingrese el nombre del fertilizante"
        value="{{ old('name', $fertilizer) }}">
    @error('name')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- description -->
<div>
    <label class="form-label" for="description">Descripción:</label>
    <input class="form-control" type="text" name="description" id="description"
        placeholder="Ingrese el nombre cientifico" value="{{ old('description', $fertilizer) }}">
    @error('description')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- dose -->
<div>
    <label class="form-label" for="dose">Dosis:</label>
    <textarea class="form-control" name="dose" id="dose" rows="3" placeholder="Ingrese la dosis">{{ old('dose', $fertilizer) }}</textarea>
    @error('dose')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- price -->
<div>
    <label class="form-label" for="price">Precio :</label>

    <input class="form-control" type="number" name="price" id="price"
        placeholder="Ingrese el precio del fertilizante" value="{{ old('price', $fertilizer) }}">
    @error('price')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- type -->
<div>
    <label class="form-label" for="type">Tipos fertilizantes:</label>
    <select class="form-control" name="type" id="type">
        <option value="Crecimiento" @selected(old('type', $fertilizer) == 'Crecimiento')>Crecimiento</option>
        <option value="Desarrollo" @selected(old('type', $fertilizer) == 'Desarrollo')>Desarrollo</option>
        <option value="Foliar" @selected(old('type', $fertilizer) == 'Foliar')>Foliar</option>
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
        src="@isset($fertilizer->image)
        {{ asset('storage/fertilizer/' . $fertilizer->image) }}
    @else
        {{ asset('img/upload-image.png') }}
    @endisset"
        alt="Previsualizar imagen" class="image-preview">
</div>



@isset($fertilizer)
    @php
        $crop_ids = $fertilizer->crops->pluck('id')->all();

        // print_r($fertilizer->crops);
        
    @endphp

@endisset


<div>
    <label class="form-label" for="name">Cultivo: </label>
    @isset($crops)

        @foreach ($crops as $crop)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="{{ $crop->id }}" id="crop_id"
                    name="crop_ids[]"
                    @isset($fertilizer)

                        @checked(in_array($crop->id, $crop_ids))
                    @else
                        @if (is_array(old('crop_ids')))
                            @checked(in_array($crop->id, old('crop_ids')))
                        @endif
                @endisset
                >
                <label class="form-check-label" for="crop_id">{{ $crop->name }} </label>
            </div>
        @endforeach
    @endisset
    </select>
    @error('crop_ids')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>
