<div class="form-group form-check">
    <input type="checkbox" class="form-check-input" {{ @$valueBd == $value ? 'checked' : '' }} value="{{ $value }}" id="{{ $id }}" name="{{ $name }}">
    <label class="form-check-label" for="{{ $id }}">{{ $label }}</label>
</div>