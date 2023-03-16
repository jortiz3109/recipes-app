<x-forms.input :label="$label" :name="$name">
    <input type="email" class="input w-full max-w-xs input-bordered @error($name) input-error @enderror" {{ $attributes->merge([
    'name' => $name,
    'id' => $name,
    'value' => $value,
    'placeholder' => $placeholder
    ]) }}>
</x-forms.input>
