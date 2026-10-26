@props(['name', 'label', 'icon' => 'user', 'type' => 'text', 'value' => null, 'placeholder' => ''])
<label class="auth-control">
    <span class="auth-control-meta">
        @if($icon === 'mail')
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="3"/><path d="m4 7 8 6 8-6"/></svg>
        @elseif($icon === 'lock')
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="4.5" y="10" width="15" height="11" rx="2.5"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/></svg>
        @elseif($icon === 'shield')
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 2 20 6v6c0 5-3.5 8-8 10-4.5-2-8-5-8-10V6z"/><path d="m9 12 2 2 4-4"/></svg>
        @else
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="8" r="4"/><path d="M4 21v-2a8 8 0 0 1 16 0v2"/></svg>
        @endif
        <span>{{ $label }}</span>
    </span>
    <input
        type="{{ $type }}"
        name="{{ $name }}"
        @if($type !== 'password') value="{{ old($name, $value ?? '') }}" @endif
        placeholder="{{ $placeholder }}"
        {{ $attributes->class(['auth-control-input']) }}
    >
</label>
