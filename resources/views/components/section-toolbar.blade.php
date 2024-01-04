@props([
  'hideBackground' => false
])

<x-netflex-newsletter-foundation::toolbar>

  @if(!$hideBackground)
    <x-editor-button
      area="bodyBackground"
      name="Bakgrunnsfarge"
      description=""
      type="select"
      style="font-size:10px; padding:3px 6px; position: static; top: 0; left: 0; display: inline-block;"
      :options="get_newsletter_theme_colors()"
    >
        <i class="fa fa-pencil"></i> Bakgrunn
    </x-editor-button>
  @endif

  @if(content('bodyBackground') === 'custom')
    <x-editor-button
      area="bodyBackgroundColorCode"
      name="Legg inn fargekode"
      description=""
      type="color"
      style="font-size:10px; padding:3px 6px; position: static; top: 0; left: 0; display: inline-block;"
    >
        <i class="fa fa-pencil"></i> Fargekode
    </x-editor-button>
  @endif

  {!! $slot !!}

</x-netflex-newsletter-foundation::toolbar>

