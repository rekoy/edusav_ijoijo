@extends('in-layout.in-layout-access-top')


@section('additional-css')
    <style>
    </style>
@endsection


@section('content')

<div class="flex justify-center">
@if(strtoupper($dt_content['data']["cvi_type"]) == "VIDEO")
  <video  id="vid" class="w-full max-w-5xl h-auto" controls  preload="metadata">
        <source src="{{ $dt_content['url'] }}" type="video/mp4">
    Your browser does not support the video tag.
</video>

<script>
const video = document.getElementById('vid');
video.addEventListener('error', e => {
    const error = video.error;
    if (error) {
        console.log('Video error:', error.code, error.message);
    }
});
</script>

@else
  <script>

    const url = "{{ $dt_content['url'] }}"; // URL kamu
    window.location=url;

  </script>

@endif
</div>
<div class="max-w-4xl mx-auto p-4">
  <!-- Judul -->
  <h1 class="text-lg font-bold">
    {{ $dt_content['data']["cvi_titulo"]}}
  </h1>
 <div class="flex items-center justify-between">
    <div class="flex items-center space-x-3">
      <!-- Avatar -->

      <!-- Nama Channel -->
      <div>
        <p class="text-sm text-gray-500">{{ $dt_content['data']["cvi_type"]}}</p>
        <p class="text-sm text-gray-500">{{ $dt_content['data']["cvi_clase"]}}</p>
      </div>
    </div>
</div>


<script>
    $(document).ready(function() {

    });

</script>

  @endsection

