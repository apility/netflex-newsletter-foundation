@props([
  'class' => null
])
<!-- Content block -->

<table width="100%" cellpadding="0" cellspacing="0" border="0" class="{{ $class }}">
  {!! $slot !!}
</table>
