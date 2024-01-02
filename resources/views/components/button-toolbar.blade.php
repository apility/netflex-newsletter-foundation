@if(if_mode('edit'))
  <div style="position: relative; ">
    <div style="background: #dfdfdf; padding:3px 6px; display:block; line-height: 12px;">
      {!! $slot !!}
    </div>
  </div>
@else
  {!! $slot !!}
@endif
