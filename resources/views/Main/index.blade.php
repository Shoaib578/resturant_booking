@extends('layouts.main_layout')

@section('content')
<style>
    .footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: red;
  color: white;
  text-align: center;
}
</style>


@foreach ($footers as $footer)
<div class="footer">
  <p>{{ $footer->footer_text }}</p>
</div>
@endforeach

@endsection