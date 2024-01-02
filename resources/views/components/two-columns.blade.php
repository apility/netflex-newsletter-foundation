@props([
    'variables' => [],
])

@php
  $bodyBackground = $variables['bodyBackground'] ?? '#ffffff';
  $bodyColor = $variables['bodyColor'] ?? '#000000';
  $bodyWidth = $variables['bodyWidth'] ?? 640;
  $contentWidth = $variables['contentWidth'] ?? 620;
  $contentPadding = $variables['contentPadding'] ?? 10;
@endphp

<x-nnf::section-toolbar>

  <x-editor-button
    area="componentSetup"
    type="select"
    :options="[
      'default' => 'Bilder og tekst i begge kolonner',
      'textOnly' => 'Skjul bilder',
      'imagesOnly' => 'Skjul tekst',
      'imageLeftTextRight' => 'Bilde til venstre, tekst til høyre',
      'textLeftImageRight' => 'Tekst til venstre, bilde til høyre'
    ]"
  >
    <i class="fa fa-th-large"></i> Oppsett
  </x-editor-button>

  <x-editor-button
    area="columnWidth"
    type="select"
    style="margin-left: 5px; position: static;"
    :options="[
      'default' => 'Like brede kolonner',
      'narrowLeft' => 'Smal venstre, bred høyre',
      'narrowRight' => 'Bred venstre, smal høyre'
    ]"
  >
    <i class="fa fa-arrows-h"></i> Bredde
  </x-editor-button>

</x-nnf::section-toolbar>


@php

  if(content('columnWidth') === 'narrowRight') {

    $columnOneWidth = ($contentWidth / 3) * 2;
    $columnTwoWidth = ($contentWidth / 3) * 1;

  } elseif(content('columnWidth') === 'narrowLeft') {

    $columnOneWidth = ($contentWidth / 3) * 1;
    $columnTwoWidth = ($contentWidth / 3) * 2;

  } else {

    $columnOneWidth = $contentWidth / 2;
    $columnTwoWidth = $contentWidth / 2;

  }

@endphp

<!-- Two columns -->

<x-nnf::grid-2
    columnOneWidth="{{ $columnOneWidth }}"
    columnTwoWidth="{{ $columnTwoWidth }}"
    bodyBackground="{{ get_newsletter_background($bodyBackground) }}"
    bodyColor="{{ get_newsletter_text_color(get_newsletter_background($bodyBackground)) }}"
  >
  <x-slot name="columnOneContent">

    <x-nnf::default-content
      area="col_1"
      showImage="{{ !in_array(content('componentSetup'), ['textOnly', 'textLeftImageRight']) ? true : false }}"
      showContent="{{ !in_array(content('componentSetup'), ['imagesOnly', 'imageLeftTextRight']) ? true : false }}"
      imageWidth="{{ $columnOneWidth - ($contentPadding * 2) }}"
    />

  </x-slot>

  <x-slot name="columnTwoContent">

    <x-nnf::default-content
      area="col_2"
      showImage="{{ !in_array(content('componentSetup'), ['textOnly', 'imageLeftTextRight']) ? true : false }}"
      showContent="{{ !in_array(content('componentSetup'), ['imagesOnly', 'textLeftImageRight']) ? true : false }}"
      imageWidth="{{ $columnTwoWidth - ($contentPadding * 2) }}"
    />

  </x-slot>
</x-nnf::grid-2>
