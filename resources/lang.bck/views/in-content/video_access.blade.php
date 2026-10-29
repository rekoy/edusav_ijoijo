@extends('in-layout.in-layout-access-top')


@section('additional-css')
    <style>
    </style>
@endsection


@section('content')


<video width="640" height="360" controls>
    <source src="{{ $dt_content['url'] }}" type="video/mp4">
    Your browser does not support the video tag.
</video>


<script>
    $(document).ready(function() {

    });

</script>

  @endsection

