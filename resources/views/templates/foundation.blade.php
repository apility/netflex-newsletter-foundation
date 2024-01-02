@extends('nnf::layouts.foundation', [
     'bodyBackground' => content('newsletterBodyBackground') ?? '#ffffff',
])

@section('body')

  @php
    $bodyBackground = content('newsletterBodyBackground') ?? '#ffffff';
    $bodyWidth = '640';
    $bodyColor = get_newsletter_text_color($bodyBackground);
  @endphp

  <x-blocks area="sections" :variables="[
    'bodyWidth' => $bodyWidth,
    'bodyBackground' => $bodyBackground,
    'bodyColor' => $bodyColor
  ]" />

@endsection
