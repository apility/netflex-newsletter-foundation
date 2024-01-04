@php
//For translations
app()->setLocale(content('newsletterLocale', 'select') ?? app()->getLocale());
@endphp

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="no"
      xmlns="http://www.w3.org/1999/xhtml"
      xmlns:v="urn:schemas-microsoft-com:vml"
      xmlns:o="urn:schemas-microsoft-com:office:office">
<head>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="x-apple-disable-message-reformatting">
  <meta name="color-scheme" content="light">
  <meta name="supported-color-schemes" content="light">

  <title>{{ current_newsletter()->subject }}</title>

  <!-- Include styles from paths in config -->
  @foreach(config('newsletter-foundation.css_paths') as $path)
    @include($path)
  @endforeach

  <!--[if mso | IE]>
    <xml>
        <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
    </xml>
  <![endif]-->

</head>

@php
  $background = content('newsletterBackground', 'text') ? (content('newsletterBackground', 'text') === 'custom' ? content('newsletterBackgroundColorCode', 'text') : content('newsletterBackground', 'text')) : config('newsletter-foundation.defaults.body.background');
  $bodyBackground = content('newsletterBodyBackground', 'text') ?? config('newsletter-foundation.defaults.content.background');
@endphp

<body style="margin:0; padding:0; background-color:{{ $background }}; mso-line-height-rule: exactly;">

  <x-netflex-newsletter-foundation::preview-text />
  <x-netflex-newsletter-foundation::newsletter-toolbar />

  <center>

    <!-- Place header logic here -->

    <!-- Before body spacing -->
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="{{ $background }}">
      <tr>
          <td align="center" valign="top">
              <x-netflex-newsletter-foundation::content-block>
                  <x-netflex-newsletter-foundation::spacing height="25" />
              </x-netflex-newsletter-foundation::content-block>
          </td>
      </tr>
    </table>

    <!-- Body -->
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="{{ $background }}">
        <tr>
            <td align="center" valign="top">
                @yield('body')
            </td>
        </tr>
    </table>

    <!-- After body spacing -->

    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="{{ $background }}">
      <tr>
          <td align="center" valign="top">
              <x-netflex-newsletter-foundation::content-block>
                  <x-netflex-newsletter-foundation::spacing height="25" />
              </x-netflex-newsletter-foundation::content-block>
          </td>
      </tr>
    </table>

    <!-- Place footer logic here -->

  </center>

  <x-editor-tools />

</body>
</html>
