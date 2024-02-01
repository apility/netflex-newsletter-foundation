@props([
  'area',
  'showImage' => false,
  'showContent' => true,
  'showTitle' => false,
  'imageWidth' => (config('newsletter-foundation.defaults.body.width') - (config('newsletter-foundation.defaults.body.padding') * 2)) - (config('newsletter-foundation.defaults.content.padding') * 2),
  'title' => null,
  'content' => null,
  'defaultImage' => null,
  'imageClass' => null
])

<x-netflex-newsletter-foundation::content-block>

  @if($showImage)
  <x-netflex-newsletter-foundation::content-row>
    <x-netflex-newsletter-foundation::image area="{{ $area }}_image" size="{{ $imageWidth }}" class="{{ $imageClass }}" />
  </x-netflex-newsletter-foundation::content-row>
  @endif

  @if($showImage && ($showContent || $showTitle))
    <x-netflex-newsletter-foundation::spacing height="10" />
  @endif

  @if($showTitle)
  <x-netflex-newsletter-foundation::content-row>
    <x-inline area="{{ $area }}_title">
      @if($title)
        {!! $title !!}
      @else
        {!! Config::get('newsletter-foundation.defaults.content.title')!!}
      @endif
    </x-inline>
  </x-netflex-newsletter-foundation::content-row>
  @endif

  @if($showContent)
  <x-netflex-newsletter-foundation::content-row>
    <x-inline area="{{ $area }}_content">
      @if($content)
        {!! $content !!}
      @else
        {!! Config::get('newsletter-foundation.defaults.content.paragraph') !!}
      @endif
    </x-inline>
  </x-netflex-newsletter-foundation::content-row>
  @endif

</x-netflex-newsletter-foundation::content-block>
