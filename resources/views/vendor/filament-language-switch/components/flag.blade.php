@props([
'src',
'alt' => '',
'circular' => false,
'switch' => false,
])
<img src="{{ $src }}" {{ $attributes ->class([
'object-cover object-center',
'rounded-full' => $circular,
'rounded-none' => ! $circular && ! $switch,
'rounded-none' => ! $circular && $switch,
])
}}
/>