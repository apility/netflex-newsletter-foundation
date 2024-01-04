@props([
    'variables' => [],
])

@php
  $bodyBackground = $variables['bodyBackground'] ?? config('newsletter-foundation.defaults.body.background');
  $bodyWidth = $variables['bodyWidth'] ?? config('newsletter-foundation.defaults.body.width');
@endphp

<!-- One image -->
<x-netflex-newsletter-foundation::grid-1 bodyPadding="0" contentWidth="{{ $bodyWidth }}" contentPadding="0" bodyBackground="{{ $bodyBackground }}">
  <x-netflex-newsletter-foundation::content-block>
    <x-netflex-newsletter-foundation::content-row>
      <x-netflex-newsletter-foundation-image area="col_img" :size="$bodyWidth" />
    </x-netflex-newsletter-foundation::content-row>
  </x-netflex-newsletter-foundation::content-block>
</x-netflex-newsletter-foundation::grid-1>
