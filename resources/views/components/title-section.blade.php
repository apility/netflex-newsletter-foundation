@props([
    'variables' => [],
])

@php
  $bodyBackground = $variables['bodyBackground'] ?? config('newsletter-foundation.defaults.body.background');
  $bodyColor = $variables['bodyColor'] ?? get_newsletter_text_color(config('newsletter-foundation.defaults.body.background'));
  $contentPadding = 0;
  $bodyPadding = 0;
  $contentWidth = config('newsletter-foundation.defaults.body.width');
  $bodyWidth = config('newsletter-foundation.defaults.body.width');;
@endphp

<!-- Title section -->

<x-netflex-newsletter-foundation::section-toolbar/>

<x-netflex-newsletter-foundation::grid-1 alignment="left" bodyBackground="{{ get_newsletter_background($bodyBackground) }}" bodyColor="{{ get_newsletter_text_color(get_newsletter_background($bodyBackground)) }}">
  <x-inline is="h4" area="title" style="text-align:left;">{{ config('newsletter-foundation.defaults.content.title') }}</x-inline>
  <x-netflex-newsletter-foundation::rule area="ruleColor" />
</x-netflex-newsletter-foundation::grid-1>
