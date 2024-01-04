@extends('netflex-newsletter-foundation::layouts.foundation', [
     'bodyBackground' => content('newsletterBodyBackground') ?? config('newsletter-foundation.defaults.body.background'),
])

@section('body')

  @php
    $bodyBackground = content('newsletterBodyBackground') ?? config('newsletter-foundation.defaults.body.background');
    $bodyWidth = config('newsletter-foundation.defaults.body.width');
    $bodyColor = get_newsletter_text_color($bodyBackground);
  @endphp

  <x-blocks
    area="sections"
    :variables="[
      'bodyWidth' => $bodyWidth,
      'bodyBackground' => $bodyBackground,
      'bodyColor' => $bodyColor
    ]"
  />

@endsection
