<x-forms.input :label="$label" :name="$name">
    <input type="text" class="input w-full input-bordered @error($name) input-error @enderror" {{ $attributes->merge([
    'name' => $name,
    'id' => $name,
    'value' => $value,
    'placeholder' => $placeholder
    ]) }}>
</x-forms.input>
