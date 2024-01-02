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

<x-nnf::section-toolbar/>

<x-nnf::grid-1 alignment="left" bodyBackground="{{ get_newsletter_background($bodyBackground) }}" bodyColor="{{ get_newsletter_text_color(get_newsletter_background($bodyBackground)) }}">
  <x-inline is="h4" area="title" style="text-align:left;">{{ config('newsletter-foundation.defaults.content.title') }}</x-inline>
  <x-nnf::rule area="ruleColor" />
</x-nnf::grid-1>
