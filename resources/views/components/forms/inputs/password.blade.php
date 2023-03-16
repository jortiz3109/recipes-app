<x-forms.input :label="$label" :name="$name">
    <input type="password" class="input w-full max-w-xs @error($name) is-invalid @enderror" {{
        $attributes->merge([
            'name' => $name,
            'id' => $name,
        ]) }}>
</x-forms.input>
