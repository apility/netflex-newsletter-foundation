@props([
    'variables' => [],
])

@php
  $bodyBackground = $variables['bodyBackground'] ?? config('newsletter-foundation.defaults.body.background');
  $bodyWidth = $variables['bodyWidth'] ?? config('newsletter-foundation.defaults.body.width');
@endphp

<x-nnf::section-toolbar>

  <x-editor-button
    area="componentSetup"
    type="select"
    style="font-size:10px; padding:3px 6px; position: static; top: 0; left: 0; display: inline-block;"
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

  <x-editor-button
    area="entry"
    type="entries"
    style="font-size:10px; padding:3px 6px; position: static; top: 0; left: 0; display: inline-block;"
    max="1"
    :model="config('newsletter-foundation.entry_list.models')"
  >
    <i class="fa fa-calendar"></i> Velg oppføringer
  </x-editor-button>

</x-nnf::section-toolbar>

@if(content('entry')->count())
  <!-- One image event image -->
  @if(!content('componentSetup') || in_array(content('componentSetup'), ['imageOnly', 'imageTextAndTitle', 'imageAndText']))
    <x-nnf::grid-1 bodyPadding="0" contentWidth="{{ $bodyWidth }}" contentPadding="0" bodyBackground="{{ $bodyBackground }}">
      <x-nnf::content-block>
        <x-nnf::content-row >
          <x-nnf-image area="col_img" :size="$bodyWidth" :default="content('entry')->first()->newsletterImage" />
        </x-nnf::content-row>
      </x-nnf::content-block>
    </x-nnf::grid-1>
  @endif
  <!-- One column event content -->
  <x-nnf::grid-1 bodyBackground="{{ get_newsletter_background($bodyBackground) }}" bodyColor="{{ get_newsletter_text_color(get_newsletter_background($bodyBackground)) }}">
    <x-nnf-entry-content
      :event="content('entry')->first()"
      alignment="left"
      :withImage="false"
      :withTitle="in_array(content('componentSetup'), ['imageOnly', 'textOnly', 'imageAndText']) ? false : true"
      :withContent="in_array(content('componentSetup'), ['imageOnly']) ? false : true"
      :withEventDescription="true"
      :settings="[
        'alignment' => 'left',
        'titleHeaderSelector' => 'h1',
        'buttonClass' => 'main-entry-button'
      ]"
    />
  </x-nnf::grid-1>
@endif