<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    {{ $slot }}

    @error($name)
    <div class="invalid-feedback" {{ $attributes->merge(['id' => 'validationFeedbackFor' . $name]) }}>
        {{ $message }}
    </div>
    @endif
</div>
