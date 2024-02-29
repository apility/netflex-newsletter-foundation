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


<x-netflex-newsletter-foundation::section-toolbar>

  <x-editor-button
    area="componentSetup"
    type="select"
    style="font-size:10px; padding:3px 6px; position: static; top: 0; left: 0; display: inline-block;"
    :options="[
      'twoColumns' => 'To kolonner',
      'threeColumns' => 'Tre kolonner',
      'list' => 'Liste',
    ]"
  >
    <i class="fa fa-th-large"></i> Oppsett
  </x-editor-button>

  <x-editor-button
    area="entries"
    style="font-size:10px; padding:3px 6px; position: static; top: 0; left: 0; display: inline-block;"
    type="entries"
    :model="config('newsletter-foundation.entry_list.models')"
  >
    <i class="fa fa-tags"></i> Velg oppføringer
  </x-editor-button>

</x-netflex-newsletter-foundation::section-toolbar>


@php
  $setup = content('componentSetup') ?? config('newsletter-components.defaults.entry_list.setup');
@endphp

@if($setup === 'list')

  @php
    $columnOneWidth = ($contentWidth / 3) * 1;
    $columnTwoWidth = ($contentWidth / 3) * 2;
  @endphp

  @foreach(content('entries') as $entry)

    <x-netflex-newsletter-foundation::grid-2
      columnOneWidth="{{ $columnOneWidth }}"
      columnTwoWidth="{{ $columnTwoWidth }}"
      bodyBackground="{{ get_newsletter_background($bodyBackground) }}"
      bodyColor="{{ get_newsletter_text_color(get_newsletter_background($bodyBackground)) }}"
    >
      <x-slot name="columnOneContent">
        <x-netflex-newsletter-foundation::entry-content
          :entry="$entry"
          :withImage="true"
          :withTitle="false"
          :withContent="false"
          :imageWidth="($columnTwoWidth - ($contentPadding * 2))"
        />
      </x-slot>

      <x-slot name="columnTwoContent">
        <x-netflex-newsletter-foundation::entry-content
          :entry="$entry"
          :withImage="false"
        />
      </x-slot>

    </x-netflex-newsletter-foundation::grid-2>

  @endforeach

@elseif($setup === 'twoColumns')

  @foreach(content('entries')->chunk(2) as $chunk)

    @php
      $columnOneWidth = $contentWidth / 2;
      $columnTwoWidth = $contentWidth / 2;
    @endphp

    <x-netflex-newsletter-foundation::grid-2
      columnOneWidth="{{ $columnOneWidth }}"
      columnTwoWidth="{{ $columnTwoWidth }}"
      bodyBackground="{{ get_newsletter_background($bodyBackground) }}"
      bodyColor="{{ get_newsletter_text_color(get_newsletter_background($bodyBackground)) }}"
    >
      <x-slot name="columnOneContent">
        @if($entry = $chunk->shift())
          <x-netflex-newsletter-foundation::entry-content
            area="col_1"
            :entry="$entry"
            :withImage="true"
            :withTitle="true"
            :withContent="true"
            :imageWidth="($columnOneWidth - ($contentPadding * 2))"
            :isCard="true"
          />
        @endif
      </x-slot>

      <x-slot name="columnTwoContent">
        @if($entry = $chunk->shift())
          <x-netflex-newsletter-foundation::entry-content
            area="col_2"
            :entry="$entry"
            :withImage="true"
            :withTitle="true"
            :withContent="true"
            :imageWidth="($columnTwoWidth - ($contentPadding * 2))"
            :isCard="true"
          />
        @endif
      </x-slot>

    </x-netflex-newsletter-foundation::grid-2>

  @endforeach

@elseif($setup === 'threeColumns')

  @php
    $columnWidth = $contentWidth / 3;
  @endphp

  @foreach(content('entries')->chunk(3) as $chunk)

    <x-netflex-newsletter-foundation::grid-3
      bodyBackground="{{ get_newsletter_background($bodyBackground) }}"
      bodyColor="{{ get_newsletter_text_color(get_newsletter_background($bodyBackground)) }}"
    >
      <x-slot name="columnOneContent">
        @if($entry = $chunk->shift())
          <x-netflex-newsletter-foundation::entry-content
            area="col_1"
            :entry="$entry"
            :withImage="true"
            :imageWidth="($columnWidth - ($contentPadding * 2))"
            :isCard="true"
          />
        @endif
      </x-slot>

      <x-slot name="columnTwoContent">
        @if($entry = $chunk->shift())
          <x-netflex-newsletter-foundation::entry-content
            area="col_2"
            :entry="$entry"
            :withImage="true"
            :imageWidth="($columnWidth - ($contentPadding * 2))"
            :isCard="true"
          />
        @endif
      </x-slot>

      <x-slot name="columnThreeContent">
        @if($entry = $chunk->shift())
          <x-netflex-newsletter-foundation::entry-content
            area="col_3"
            :entry="$entry"
            :withImage="true"
            :imageWidth="($columnWidth - ($contentPadding * 2))"
            :isCard="true"
          />
        @endif
      </x-slot>

    </x-netflex-newsletter-foundation::grid-3>

  @endforeach

@endif
