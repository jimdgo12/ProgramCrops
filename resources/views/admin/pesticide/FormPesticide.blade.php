@csrf
<!-- crop -->


@isset($pesticide)
    {{ $disease_ids = $pesticide->diseases->pluck('id') }}
    {{-- {{  gettype($disease_ids) }} --}}
@endisset


<div>
    <label class="form-label" for="nameCommon">Enfermedades: </label>
    @isset($diseases)


        @foreach ($diseases as $disease)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="{{ $disease->id }}" id="disease_id" name="disease_ids[]"
                    @if(!empty($disease_ids))
                        {{-- @checked(in_array($disease->id, $disease_ids)) --}}
                    @else
                        @if (is_array(old('disease_ids')))
                            @checked(in_array($disease->id, old('disease_ids')))
                        @endif
                @endif>
                <label class="form-check-label" for="disease_id">{{ $disease->nameCommon }} </label>
            </div>
        @endforeach
    @endisset
    </select>
    @error('disease_ids')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>



<!-- name -->
<div>
    <label class="form-label" for="name">Nombre :</label>

    <input class="form-control" type="text" name="name" id="name"
        placeholder="Ingrese el nombre del plaguicida" value="{{ old('name', $pesticide) }}">
    @error('name')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>



<!-- description -->

<div>
    <label class="form-label" for="description">Descripción:</label>
    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Ingrese la descripción">{{ old('description', $pesticide) }}</textarea>
    @error('description')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>

<!-- activeIngredient -->

<div>
    <label class="form-label" for="activeIngredient">Ingrediente Activo:</label>
    <input class="form-control" type="text" name="activeIngredient" id="activeIngredient"
        placeholder="Ingrese el ingrediente activo" value="{{ old('activeIngredient', $pesticide) }}">
    @error('activeIngredient')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>



<!-- Precio -->

<div>
    <label class="form-label" for="price">Precio:</label>
    <input class="form-control" type="text" name="price" id="price" placeholder="Ingrese el precio"
        value="{{ old('price', $pesticide) }}">
    @error('price')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>


<!-- type -->
<div>
    <label class="form-label" for="type">Tipo plaguicidas:</label>
    {{-- <input class="form-control" type="text" name="type" id="type" placeholder="Extensión" --}}
    <select class="form-control" name="type" id="type">
        <option value="protectante" @selected(old('type', $pesticide) == 'protectante')>protectante</option>
        <option value="sistémico" @selected(old('type', $pesticide) == 'sistémico')>sistémico</option>
        <option value="Insectos" @selected(old('type', $pesticide) == 'Hongos')>Hongos</option>

    </select>

    @error('type')
        <div class="text-small text-danger">{{ $message }}</div>
    @enderror
</div>


<!-- dosis -->

<div>
    <label class="form-label" for="dose">Doses:</label>
    <input class="form-control" type="text" name="dose" id="dose" placeholder="Ingrese la dosis"
        value="{{ old('dose', $pesticide) }}">
    @error('dose')
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
        src="@isset($pesticide)
        {{ asset('storage/pesticide/' . $pesticide->image) }}
    @else
        {{ asset('img/upload-image.png') }}
    @endisset"
        alt="Previsualizar imagen" class="image-preview">
</div>
