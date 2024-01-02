@props([
  'bodyWidth' => config('newsletter-foundation.defaults.toolbar.width'),
  'contentWidth' => config('newsletter-foundation.defaults.toolbar.width'),
  'bodyBackground' => config('newsletter-foundation.defaults.toolbar.background'),
  'bodyPadding' => config('newsletter-foundation.defaults.toolbar.padding'),
  'contentPadding' => 0,
])

@if(if_mode('edit'))
  <x-nnf::grid-1 contentPadding="{{ $contentPadding }}" bodyPadding="{{ $bodyPadding }}" bodyWidth="{{ $bodyWidth }}" contentWidth="{{ $bodyWidth }}" bodyBackground="{{ $bodyBackground }}">
    <x-nnf::content-block>
      <x-nnf::content-row>
@endif
    {!! $slot !!}
@if(if_mode('edit'))
      </x-nnf::content-row>
    </x-nnf::content-block>
  </x-nnf::grid-1>
@endif
