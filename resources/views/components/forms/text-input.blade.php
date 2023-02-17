@props([
    'type' => 'text', 'name' => '', 'placeholder', "disabled" => false
])

<input 
    type="{{ $type }}"
    {{ $name ? "name=$name" : '' }}
    placeholder="{{ $placeholder }}"
    {{ $attributes->merge(['class' => 'input-form placeholder-m-m']) }}
    {{ $disabled == true ? 'disabled' : '' }}
>