@props([
    'variables' => [],
])

@php
  $bodyBackground = $variables['bodyBackground'] ?? config('newsletter-foundation.defaults.body.background');
  $bodyColor = $variables['bodyColor'] ?? get_newsletter_text_color(config('newsletter-foundation.defaults.body.background'));
@endphp

<!-- One column -->

<x-nnf::section-toolbar>

  <x-editor-button
    area="componentSetup"
    type="select"
    :options="[
      'default' => 'Tekst og tittel',
      'textOnly' => 'Kun tekst',
      'imageTextAndTitle' => 'Bilde, tekst og tittel',
      'imageAndText' => 'Bilde og tekst, ingen tittel',
      'imageOnly' => 'Kun bilde',
    ]"
  >
    <i class="fa fa-th-large"></i> Oppsett
  </x-editor-button>


</x-nnf::section-toolbar>

<x-nnf::grid-1 bodyBackground="{{ get_newsletter_background($bodyBackground) }}" bodyColor="{{ get_newsletter_text_color(get_newsletter_background($bodyBackground)) }}">
  <x-nnf::default-content area="col_1" showTitle="{{ in_array(content('componentSetup'), ['imageOnly', 'textOnly', 'imageAndText']) ? false : true }}" showContent="{{ in_array(content('componentSetup'), ['imageOnly']) ? false : true }}" showImage="{{ in_array(content('componentSetup'), ['imageOnly', 'imageTextAndTitle', 'imageAndText']) ? true : false }}" />
</x-nnf::grid-1>
