<div class="form-control w-full max-w-xs">
    <label for="{{ $name }}" class="label">{{ $label }}</label>
    {{ $slot }}
    @error($name)
    <label class="label text-red-500" {{ $attributes->merge(['id' => 'validationFeedbackFor' . $name]) }}>
        {{ $message }}
    </label>
    @endif
</div>
