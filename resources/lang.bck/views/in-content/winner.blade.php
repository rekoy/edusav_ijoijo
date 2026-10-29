

@extends('in-layout.in-layout-access')


@section('additional-css')
    <style>
      section {
        overflow-x: hidden;
      }
    </style>
@endsection


@section('content')

<?php
  $landing_image_1="";
  $landing_image_bawah="";
  $landing_image_tengah="";
  foreach($dt_content['contents'] as $row){
    
    if ($row['lco_id']==14){
      $landing_image_1 = $row['lco_image'];
    }else if ($row['lco_id']==30){
      $landing_image_bawah = $row['lco_image'];
      $landing_content_bawah = $row['lco_content'];
    }else if ($row['lco_id']==31){
      $landing_image_tengah = $row['lco_image'];
      $landing_content_tengah = $row['lco_content'];
    }
  }
?>


    <section class="bg-white py-6 md:py-10">
      <div class="container mx-auto max-w-7xl px-4 text-center">
        <p class="md:text-4xl text-xl text-black font-bold">Profile</p>
        <p class="text-sm text-neutral-500 max-w-md mx-auto"></p>
        <div class="max-w-3xl flex md:flex-row flex-col py-6 mx-auto items-start">
          <div class="w-full space-y-6" ">
          </div>

        </div>
      </div>
    </section>

    <!-- Global Draw Section -->

    <!-- Global Draw Section -->
    <section class="global-draw-bg py-6 md:py-10">
      <div class="container mx-auto max-w-7xl px-4">
        <div class="md:flex md:space-x-8 items-start">
          <!-- Left Side: Graphic and Timer -->
          <div class="md:w-6/12 text-center mb-10 md:mb-0">
            
            <div class="relative mx-auto mb-6">
              <img src="{{ $landing_image_bawah }}"
                alt="Global Draw $10 Million prize graphic with a stylized globe and currency symbols"
                class="object-cover">
            </div>
            <div class="items-center bg-omarcogrey text-white p-4 md:w-full rounded-lg countdown">
              <div class="flex md:flex-row flex-col md:gap-6 gap-2 items-center">
                <p class="text-xl uppercase text-green-600 font-bold text-left">Game<br class="hidden md:block" /> Close
                  In</p>
                <p class="text-xl md:text-2xl font-bold text-amber-600 mx-auto">100 <span
                    class="text-sm text-green-600">DAYS</span> 15 <span class="text-sm text-green-600">HOURS</span> 20
                  <span class="text-sm text-green-600">MINS</span></p>
              </div>
            </div>
          </div>

          <!-- Right Side: Text Content -->
          <div class="md:w-6/12 text-gray-700">
          {!! $landing_content_bawah !!}
        </div>
        </div>
      </div>
    </section>



    <section class="bg-white py-6 md:py-10">
      <div class="container mx-auto max-w-7xl px-4">
        <p class="flex items-center gap-3 md:text-4xl text-xl text-green-700 font-bold">
          <img src="/assets/images/news-ico.png" class="h-8 md:h-10">Omarco News
        </p>
        <div class="py-6 md:py-10">
          <div class="grid grid-cols-1 lg:grid-cols-4 md:grid-cols-3 gap-4">

          @foreach($dt_content['contents'] as $row)
          @if ($row['lco_cat_ref']==1)
            <div class="flex flex-col">
              <a href="{{ route('content-detail',$row['lco_id'] ) }}">
                <div class="relative w-full h-[200px] border">
                  <img src="{{$row['lco_image']}}" alt="News 1" class="object-cover h-[200px] w-full">
                </div>
                <div class="text-black py-4 text-left">
                  <p class="text-lg line-clamp-2 text-ellipsis">
                    {{$row['lco_title']}}</p>
                </div>
              </a>
            </div>
          @endif
          @endforeach

          </div>
        </div>
      </div>

    </section>


    <section class="bg-[#ed1b24] py-6 md:py-10">
      <div class="container mx-auto max-w-7xl px-4">
        <p class="text-center text-white md:text-4xl text-xl font-bold">Subscribe to us</p>
        <div class="py-6 md:py-10">
          <form class="flex flex-row mx-auto gap-2 max-w-md">
            <input type="email" placeholder="e-mail address"
              class="bg-white text-black placeholder-gray-300 text-sm rounded-md w-full py-3 px-3 focus:outline-none">
            <button type="submit"
              class="py-2 px-4 bg-amber-500 text-white rounded-md hover:bg-amber-500/90">Subscribe</button>
          </form>
        </div>
      </div>
    </section>

  @endsection
