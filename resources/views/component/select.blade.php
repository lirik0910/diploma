<label id="label-language">{{ $label }}</label>
<select id="{{ $type }}" name="{{ $type }}">
    @foreach($criterias['speed'] as $key => $value)
        <option value="{{ $value }}">{{ $key }}</option>
    @endforeach
</select>
