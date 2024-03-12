@props([
  'area' => 'col_buttons'
])

<x-netflex-newsletter-foundation::content-block>

  <x-netflex-newsletter-foundation::content-row>

    <x-netflex-newsletter-foundation::section-toolbar :hideBackground="true" >

      <x-editor-button
        area="{{ $area }}"
        type="contentlist"
        name="Rediger knapper"
        description="Legg til eller fjern knapper ved å legge til/fjerne rader. For å endre rekkefølge bruker du dra/slipp. Du kan endre lenke,farge og størrelse på knappene når du har lukket vinduet."
      >
        <i class="fa fa-list"></i> Rediger knapper
      </x-editor-button>


    </x-netflex-newsletter-foundation::section-toolbar>

    @foreach(content($area) as $hash => $button)

    <x-netflex-newsletter-foundation::section-toolbar :hideBackground="true" >

      <small>{!! $button->name !!}:</small>

      <x-editor-button
        area="{{ $hash }}_link"
        type="link"
      >
        <i class="fa fa-link"></i> Lenke
      </x-editor-button>

      <x-editor-button
        area="{{ $hash }}_size"
        type="select"
        :options="config('newsletter-foundation.button.sizes')"
      >
        <i class="fa fa-arrows-alt"></i> Størrelse
      </x-editor-button>

      <x-editor-button
        area="{{ $hash }}_color"
        type="select"
        :options="get_newsletter_theme_colors()"
      >
        <i class="fa fa-paint-brush"></i> Farge
      </x-editor-button>

      <x-editor-button
        area="{{ $hash }}_fullWidth"
        type="checkbox"
        description="Huk av for å vise knapp i full bredde."
      >
        <i class="fa fa-arrows-h"></i> Full bredde
      </x-editor-button>

    </x-netflex-newsletter-foundation::section-toolbar>

    @endforeach

    @foreach(content($area) as $hash => $button)

      <x-netflex-newsletter-foundation::button
        text="{!! $button->name !!}"
        href="{{ content($hash.'_link') ?  content($hash.'_link')->url : '/' }}"
        background="{{ content($hash.'_color') ?? config('newsletter-foundation.defaults.button.background') }}"
        color="{{ get_newsletter_text_color(content($hash.'_color') ?? config('newsletter-foundation.defaults.button.background')) }}"
        padding="{{ get_newsletter_button_padding(content($hash.'_size') ?? config('newsletter-foundation.defaults.button.padding')) }}"
        fontSize="{{ get_newsletter_button_fontsize(content($hash.'_size') ?? config('newsletter-foundation.defaults.button.font_size')) }}"
        display="{{ content($hash.'_fullWidth') ? 'block' : 'inline-block' }}"
      />

    @endforeach

  </x-netflex-newsletter-foundation::content-row>

</x-netflex-newsletter-foundation::content-block>
