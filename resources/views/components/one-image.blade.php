@props([
    'variables' => [],
])

@php
  $bodyBackground = $variables['bodyBackground'] ?? config('newsletter-foundation.defaults.body.background');
  $bodyWidth = $variables['bodyWidth'] ?? config('newsletter-foundation.defaults.body.width');
@endphp

<!-- One image -->
<x-nnf::grid-1 bodyPadding="0" contentWidth="{{ $bodyWidth }}" contentPadding="0" bodyBackground="{{ $bodyBackground }}">
  <x-nnf::content-block>
    <x-nnf::content-row>
      <x-nnf-image area="col_img" :size="$bodyWidth" />
    </x-nnf::content-row>
  </x-nnf::content-block>
</x-nnf::grid-1>
