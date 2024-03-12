@props([
    'href' => '/',
    'background' => config('newsletter-foundation.defaults.button.background'),
    'color' => get_newsletter_text_color(config('newsletter-foundation.defaults.button.background')),
    'padding' => config('newsletter-foundation.button.padding.'.config('newsletter-foundation.defaults.button.padding')),
    'borderRadius' => config('newsletter-foundation.defaults.button.border_radius'),
    'border' => config('newsletter-foundation.defaults.button.border'),
    'fontSize' => config('newsletter-foundation.button.font_size.'.config('newsletter-foundation.defaults.button.size')),
    'fontWeight' => config('newsletter-foundation.defaults.button.font_weight'),
    'text' => config('newsletter-foundation.defaults.button.text'),
    'class' => config('newsletter-foundation.defaults.button.class'),
    'msoLetterSpacing' => '25px',
    'msoTextRaise' => '15px',
    'display' => 'inline-block',
])

<!-- Button -->

<a
    rel="noopener"
    class="{{ $class }}"
    target="_blank"
    href="{{ url($href) }}"
    style="background-color: {{ content('color') ?? $background }}; font-size: {{ $fontSize }}; font-weight: {{ $fontWeight }}; padding: {{ $padding }}; color: {{ $color }}; border-radius: {{ $borderRadius }}; border: {{ $border }}; text-decoration:none; display: {{ $display }}; mso-padding-alt: 0; text-align:center;">
    <!--[if mso]>
  <i style="letter-spacing: 15px; mso-font-width: -100%; mso-text-raise: 20pt;">&nbsp;</i>
  <![endif]-->
    <span style="mso-text-raise: 10pt;">{!! $text !!}</span>
    <!--[if mso]>
  <i style="letter-spacing: 15px; mso-font-width: -100%;">&nbsp;</i>
  <![endif]-->
</a>
