@props([
    'variables' => [],
    'area' => 'bodyBackground'
])

@php
  $bodyBackground = $variables['bodyBackground'] ?? config('newsletter-foundation.defaults.rule.background');
  $height = $variables['height'] ?? config('newsletter-foundation.defaults.rule.height');
  $bodyPadding = 0;
  $contentPadding = 0;
@endphp

<x-netflex-newsletter-foundation::section-toolbar>

    <x-editor-button area="ruleHeight" name="Sett høyde på spacer/strek" description="" type="text"
        style="font-size:10px; padding:3px 6px; position: static; top: 0; left: 0; display: inline-block;">
        <i class="fa fa-arrows-v"></i> Høyde
    </x-editor-button>

</x-netflex-newsletter-foundation::section-toolbar>

<x-netflex-newsletter-foundation::grid-1
    bodyBackground="{{ get_newsletter_background($bodyBackground) }}"
    contentPadding="{{ $contentPadding }}"
    bodyPadding="{{ $bodyPadding }}"
  >
    <x-netflex-newsletter-foundation::content-block>
      <x-netflex-newsletter-foundation::spacing height="{{ content('ruleHeight') ?? $height }}" />
    </x-netflex-newsletter-foundation::content-block>
</x-netflex-newsletter-foundation::grid-1>
