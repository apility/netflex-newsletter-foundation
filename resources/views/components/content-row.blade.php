@props([
  'alignment' => 'left'
])
<!-- Content row -->
<tr>
  <td valign="top" align="{{ $alignment }}">
    {!! $slot !!}
  </td>
</tr>
