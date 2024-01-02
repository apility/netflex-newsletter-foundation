@props([
    'variables' => [],
])

@php
  $bodyBackground = $variables['bodyBackground'] ?? config('newsletter-foundation.defaults.body.background');
  $bodyColor = $variables['bodyColor'] ?? get_newsletter_text_color(config('newsletter-foundation.defaults.body.background'));
  $bodyWidth = $variables['bodyWidth'] ?? config('newsletter-foundation.defaults.body.width');
  $contentWidth = $variables['contentWidth'] ?? (config('newsletter-foundation.defaults.body.width') - (config('newsletter-foundation.defaults.body.padding') * 2));
  $contentPadding = $variables['contentPadding'] ?? config('newsletter-foundation.defaults.content.padding');
  $bodyPadding = $variables['bodyPadding'] ?? config('newsletter-foundation.defaults.body.padding');
@endphp

<x-nnf::section-toolbar>

  <x-editor-button
    area="componentSetup"
    type="select"
    :options="[
      'textOnly' => 'Skjul bilder',
      'imagesOnly' => 'Skjul tekst',
    ]"
  >
    <i class="fa fa-th-large"></i> Oppsett
  </x-editor-button>

</x-nnf::section-toolbar>

@php
  $columnWidth = floor($contentWidth / 4);
  $imageWidth = $columnWidth - ($contentPadding * 2);
@endphp

<!-- Two columns -->

<x-nnf::grid-4
    columnWidth="{{ $columnWidth }}"
    bodyBackground="{{ get_newsletter_background($bodyBackground) }}"
    bodyColor="{{ get_newsletter_text_color(get_newsletter_background($bodyBackground)) }}"
  >
  <x-slot name="columnOneContent">

    <x-nnf::default-content
      area="col_1"
      showImage="{{ !in_array(content('componentSetup'), ['textOnly']) ? true : false }}"
      showContent="{{ !in_array(content('componentSetup'), ['imagesOnly']) ? true : false }}"
      imageWidth="{{ $imageWidth }}"
    />

  </x-slot>

  <x-slot name="columnTwoContent">

    <x-nnf::default-content
      area="col_2"
      showImage="{{ !in_array(content('componentSetup'), ['textOnly']) ? true : false }}"
      showContent="{{ !in_array(content('componentSetup'), ['imagesOnly']) ? true : false }}"
      imageWidth="{{ $imageWidth }}"
    />

  </x-slot>

  <x-slot name="columnThreeContent">

    <x-nnf::default-content
      area="col_3"
      showImage="{{ !in_array(content('componentSetup'), ['textOnly']) ? true : false }}"
      showContent="{{ !in_array(content('componentSetup'), ['imagesOnly']) ? true : false }}"
      imageWidth="{{ $imageWidth }}"
    />

  </x-slot>

  <x-slot name="columnFourContent">

    <x-nnf::default-content
      area="col_4"
      showImage="{{ !in_array(content('componentSetup'), ['textOnly']) ? true : false }}"
      showContent="{{ !in_array(content('componentSetup'), ['imagesOnly']) ? true : false }}"
      imageWidth="{{ $imageWidth }}"
    />

  </x-slot>
</x-nnf::grid-4>
