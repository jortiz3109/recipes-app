<x-forms.input :label="$label" :name="$name">
    <input type="email" class="form-control @error($name) is-invalid @enderror" {{ $attributes->merge([
    'name' => $name,
    'id' => $name,
    'value' => $value,
    'placeholder' => $placeholder
    ]) }}>
</x-forms.input>
