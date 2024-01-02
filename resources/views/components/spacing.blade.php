@props([
  'height' => 10,
  'class' => null
])

<!-- Spacing -->

<tr>
  <td height="{{ $height }}" class="{{ $class }}" style="font-size:{{ $height }}px; line-height:{{ $height }}px;">&nbsp;</td>
</tr>
