
@php
   $date = now();
  $to_day = $date->format('Y-m-d')
@endphp
<h1>today {{ $to_day }}</h1>
<p> Have you paid your card bill</p>
