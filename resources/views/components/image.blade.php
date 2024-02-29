<x-netflex-newsletter-foundation::toolbar>

  @if($default && !content($area, 'image'))

    <x-editor-button
      area="{{ $area }}"
      name="Velg bilde"
      description="Velg bildefil"
      type="image"
      style="font-size:10px; padding:3px 6px; position: static; top: 0; left: 0; display: inline-block;"
    >
        <i class="fa fa-pencil"></i> Bytt bilde
    </x-editor-button>

  @endif

  <x-editor-button
    area="{{ $area }}__mode"
    name="Bildets format"
    description="Velg format på bildet"
    type="select"
    style="font-size:10px; padding:3px 6px; position: static; top: 0; left: 0; display: inline-block;"
    :options="$imageFormats()"
  >
      <i class="fa fa-crop"></i> Format
  </x-editor-button>

  @if(content($area . '__mode', 'select') === 'custom')
    <x-editor-button
      area="{{ $area }}__customMode"
      name="Bildets proporsjoner"
      description="Skriv inn proporsjon i proporsjon b:h (f.eks 16:9, som er et avlangt format)"
      type="text"
      style="font-size:10px; padding:3px 6px; position: static; top: 0; left: 0; display: inline-block;"
    >
        <i class="fa fa-pencil"></i> Egendefinert
    </x-editor-button>
  @endif

  <x-editor-button
    area="{{ $area }}__link"
    name="Lenke på bildet"
    description="Velg om bildet skal ha lenke"
    type="link"
    style="font-size:10px; padding:3px 6px; position: static; top: 0; left: 0; display: inline-block;"
  >
      <i class="fa fa-link"></i> Lenke
  </x-editor-button>

</x-netflex-newsletter-foundation::toolbar>

@if(!if_mode('edit') && (content($area . '__link') || $href))
<a
  target="{{ content($area . '__link')->target ?? '_blank' }}"
  @if(content($area . '__link'))
    href="{{ Str::startsWith(content($area . '__link')->url, ['mailto:', 'http://', 'https://']) ? content($area . '__link')->url : Str::replaceFirst('/', 'https://' . variable('site_url') . '/', content($area . '__link')->url) }}"
  @elseif($href)
    href="{{ $href }}"
  @endif
>
@endif

<div class="imageArea" style="position:relative;">

  @if(current_mode() === 'edit' && (!$default || content($area, 'image')))
    <x-image
      area="{{ $area }}"
      mode="rc"
      size="{{ $dimensions }}"
      style="max-width:{{ $size }}px; width: 100%; height: auto;"
      class="g-img img {{ $class }}"
      src="{{ is_array($default) && array_key_exists('path', $default) ? $default['path'] : $default }}"
    />
  @else
    @if($src)
    <img
      src="{{ $src }}"
      width="{{ $size }}"
      height="{{ $getHeight() }}"
      style="max-width:{{ $size }}px; width: 100%; height: auto; margin:0; padding:0; border:none; display:block;"
      class="g-img img {{ $class }}"
      border="0"
      alt="{{ $alt }}"
      title="{{ $title }}"
    />
    @endif
  @endif

</div>

@if(!if_mode('edit') && content($area . '__link'))
</a>
@endif

