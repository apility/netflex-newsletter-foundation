@props([
  'bodyWidth' => config('newsletter-foundation.defaults.toolbar.width'),
  'contentWidth' => config('newsletter-foundation.defaults.toolbar.width'),
  'bodyBackground' => config('newsletter-foundation.defaults.toolbar.background'),
  'bodyPadding' => config('newsletter-foundation.defaults.toolbar.padding'),
  'contentPadding' => 0,
])

@if(if_mode('edit'))
  <x-netflex-newsletter-foundation::grid-1 contentPadding="{{ $contentPadding }}" bodyPadding="{{ $bodyPadding }}" bodyWidth="{{ $bodyWidth }}" contentWidth="{{ $bodyWidth }}" bodyBackground="{{ $bodyBackground }}">
    <x-netflex-newsletter-foundation::content-block>
      <x-netflex-newsletter-foundation::content-row>
@endif
    {!! $slot !!}
@if(if_mode('edit'))
      </x-netflex-newsletter-foundation::content-row>
    </x-netflex-newsletter-foundation::content-block>
  </x-netflex-newsletter-foundation::grid-1>
@endif
