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

<x-nnf::content-block>

  @if($showImage)
  <x-nnf::content-row>
    <x-nnf-image area="{{ $area }}_image" size="{{ $imageWidth }}" class="{{ $imageClass }}" />
  </x-nnf::content-row>
  @endif

  @if($showImage && ($showContent || $showTitle))
    <x-nnf::spacing height="10" />
  @endif

  @if($showTitle)
  <x-nnf::content-row>
    <x-inline area="{{ $area }}_title">
      @if($title)
        {!! $title !!}
      @else
        {!! Config::get('newsletter-foundation.defaults.content.title')!!}
      @endif
    </x-inline>
  </x-nnf::content-row>
  @endif

  @if($showContent)
  <x-nnf::content-row>
    <x-inline area="{{ $area }}_content">
      @if($content)
        {!! $content !!}
      @else
        {!! Config::get('newsletter-foundation.defaults.content.paragraph') !!}
      @endif
    </x-inline>
  </x-nnf::content-row>
  @endif

</x-nnf::content-block>
