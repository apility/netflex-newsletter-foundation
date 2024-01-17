@props([
    'bodyBackground' => config('newsletter-foundation.defaults.body.background'),
    'bodyColor' => get_newsletter_text_color(config('newsletter-foundation.defaults.body.background')),
    'bodyWidth' => config('newsletter-foundation.defaults.body.width'),
    'bodyPadding' => config('newsletter-foundation.defaults.body.padding'),
    'contentWidth' => (config('newsletter-foundation.defaults.body.width') - (config('newsletter-foundation.defaults.body.padding') * 2)),
    'contentPadding' => config('newsletter-foundation.defaults.content.padding'),
    'columnWidth' => ((config('newsletter-foundation.defaults.body.width') - (config('newsletter-foundation.defaults.body.padding') * 2))) / 4,
])

<!--[if mso]>
  <table role="presentation" width="{{ $bodyWidth }}" cellspacing="0" cellpadding="0" border="0" align="center">
    <tr>
      <td>
<![endif]-->

<table width="{{ $bodyWidth }}" cellspacing="0" cellpadding="0" border="0" class="wrapper" align="center" style="max-width:{{ $bodyWidth }}px; width:100%; color:{{ $bodyColor }};" bgcolor="{{ $bodyBackground }}">
  <tr>
    <td align="center" valign="top" style="padding:{{ $bodyPadding }}px;">

      <table width="{{ $contentWidth }}" cellspacing="0" cellpadding="0" border="0" class="{{ $bodyPadding ? 'container' : 'container-full'}}" align="center" style="max-width:{{ $contentWidth }}px; width:100%;">
        <tr>
          <th width="{{ floor($columnWidth) }}" align="center" class="{{ $contentPadding ? 'mobile' : 'mobile-full'}}" valign="top" style="padding:{{ $contentPadding }}px;">
            {!! $columnOneContent ?? '&nbsp;' !!}
          </th>
          <th width="{{ floor($columnWidth) }}" align="center" class="{{ $contentPadding ? 'mobile' : 'mobile-full'}}" valign="top" style="padding:{{ $contentPadding }}px;">
            {!! $columnTwoContent ?? '&nbsp;' !!}
          </th>
          <th width="{{ floor($columnWidth) }}" align="center" class="{{ $contentPadding ? 'mobile' : 'mobile-full'}}" valign="top" style="padding:{{ $contentPadding }}px;">
            {!! $columnThreeContent ?? '&nbsp;' !!}
          </th>
          <th width="{{ floor($columnWidth) }}" align="center" class="{{ $contentPadding ? 'mobile' : 'mobile-full'}}-last" valign="top" style="padding:{{ $contentPadding }}px;">
            {!! $columnFourContent ?? '&nbsp;' !!}
          </th>
        </tr>
      </table>

    </td>
  </tr>
</table>

<!--[if mso]>
      </td>
    </tr>
  </table>
<![endif]-->
