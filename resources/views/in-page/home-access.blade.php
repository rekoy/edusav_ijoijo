
@extends('in-layout.in-layout-access-home')


@section('additional-css')
    <style>
      section {
        overflow-x: hidden;
      }
    </style>
@endsection

@section('content')

<!-- Hero Section: BE BETTER WITH MONEY -->
@if ($dt_content['sessionService']->has_access() == \App\Constants\General::INVALID)
    <section id="hero-section"
        class="hero-money-bg text-white md:px-8 py-3 relative min-h-[150px] md:min-h-[180px] flex">
      <div class="absolute inset-0 bg-black opacity-40 z-10"></div> <!-- Tapi di atas blur -->
      <div class="container max-w-7xl mx-auto relative z-20 md:px-0 px-4 py-0">
        <div class= "flex flex-col sm:flex-col md:flex-row lg:flex-row xl:flex-row 2xl:flex-row md:justify-between md:items-center items-center">
          <img src="assets/images/logo.png" alt="Omarco Logo in Hero"
            class="md:mx-0 mb-4 md:w-[150px] lg:w-[150px] xl:w-[150px] 2xl:w-[150px] w-[100px] opacity-90">
          <div class= "w-[30px] "></div>
          <div class= "w-full flex sm:justify-center sm:items-center justify-center items-center">
            <h1 class="text-4xl md:text-5xl font-impact uppercase font-bold text-center">Be Better With Money
            </h1>
          </div>
          <div class= "h-[20px] "></div>

          <!-- Right Side: Login Form -->

          <div id="hero-login-form" class="md:w-4/12 max-w-[220px] mx-auto md:mx-0">
            {{-- Corrected the form tag by removing the duplicate 'action' attribute and the semicolon --}}
            <form method="POST" action="{{ route('login-post') }}" class="border-4 border-white rounded-lg p-2 space-y-[10px] shadow-2xl">
              @csrf
              <div class="space-y-1">
                <div class="relative">
                  <span
                    class="material-icons-outlined absolute rounded-tl-md rounded-bl-md text-white bg-omarcogreen p-[4px]">person_outline</span>
                  <input id="cl_nickname" name="cl_nickname" type="text" placeholder="Username"
                    class="bg-white text-black placeholder-gray-300 text-sm rounded-md w-full py-[6px] px-1 pl-10 focus:outline-none focus:ring-2 focus:ring-omarcogreen">
                </div>
                <div class="relative">
                  <span
                    class="material-icons-outlined absolute rounded-tl-md rounded-bl-md text-white bg-omarcogreen p-[4px]">lock</span>
                  <input id="cl_pwd" name="cl_pwd" type="password" placeholder="Password"
                    class="bg-white text-black placeholder-gray-300 text-sm rounded-md w-full py-[6px] px-1 pl-10 focus:outline-none focus:ring-2 focus:ring-omarcogreen">
                </div>
              </div>
              <div class="space-y-1">
                <button type="submit"
                  class="w-full bg-omarcogreen hover:bg-green-600 text-white font-semibold py-[4px] px-4 rounded-md transition-colors duration-200 flex items-center justify-center">
                  <span class="material-icons-outlined mr-1">login</span>Login
                </button>
                <div class="text-center">
                  <a href="{{ route('forgot_pwd') }}" class="text-xs text-white hover:text-omarcogreen hover:underline">Forgot your
                    password?</a>
                </div>                
              </div>
              <button
              type="button"
              class="w-full font-bold bg-green-600 hover:bg-green-600 text-white py-1 px-4 text-l rounded-md transition-colors duration-200 flex items-center justify-center">
              <a href="{{ route('registration') }}">
                New Register
              </a>
            </button>
            </form>          
          </div>
        </div>        
      </div>
    </section>
@endif

<?php
  $landing_image_1="";
  $landing_image_2="";
  foreach($dt_content['contents'] ?? [] as $row){
    
    if ($row['lco_id']==14){
      $landing_image_1 = $row['lco_image'];
    }else if ($row['lco_id']==30){
      $landing_image_2 = $row['lco_image'];
      $landing_content_2 = $row['lco_content'];
    }
  }
?>
    <!-- Win Big Cash Section -->
    <section class="win-cash-bg text-center text-white w-full">
    <div class="w-full">
      <div class="flex md:flex-row flex-col md:items-start items-center md:pb-0 md:gap-8 w-full">
        <div class="w-full">
          <img src="{{ $landing_image_1}}" alt="100 Million Rupiah Prize" class="object-cover mx-auto">
        </div>
        <div class="relative mx-auto w-fit px-5 py-5">
 <!--
              <div class="rounded-md bg-green-600 md:max-w-[300px] min-w-[240px] mx-auto">
                <div class="bg-green-700 px-2 py-1 rounded-tl-md rounded-tr-md">
                  <p class="items-center justify-center text-sm text-left flex"><span
                      class="material-icons-outlined text-white mr-0">key</span>Register
                      a new account</p>
                </div>
                <div id="hero-login-form" class="mx-auto md:mx-0">
                  <form method="POST" class="px-3 py-1 space-y-2" action="{{ route('registration_first') }}">
  @csrf                   
                    <div class="space-y-1">
                      <div class="relative">
                        <span
                          class="material-icons-outlined absolute rounded-tl-md rounded-bl-md text-white bg-green-700 p-[3px]">person_outline</span>
                        <input type="text" name="cl_nickname" placeholder="Username"
                          class="bg-white text-black placeholder-gray-300 text-sm rounded-md w-full py-[5px] px-[5px] pl-10 focus:outline-none">
                      </div>
                      <div class="relative">
                        <span
                          class="material-icons-outlined absolute rounded-tl-md rounded-bl-md text-white bg-green-700 p-[3px]">lock</span>
                        <input type="password" name="cl_pwd" placeholder="Password"
                          class="bg-white text-black placeholder-gray-300 text-sm rounded-md w-full py-[5px] px-[5px] pl-10 focus:outline-none">
                      </div>
                      <div class="relative">
                        <span
                          class="material-icons-outlined absolute rounded-tl-md rounded-bl-md text-white bg-green-700 p-[3px]">email</span>
                        <input type="email" name="cl_email" placeholder="Email"
                          class="bg-white text-black placeholder-gray-300 text-sm rounded-md w-full py-[5px] px-[5px] pl-10 focus:outline-none">
                      </div>
                    </div>
                    <div class="space-y-1">
                    <button type="submit"
                      class="w-full bg-green-700 hover:bg-green-700/80 text-white font-semibold py-0 px-3 rounded-md transition-colors duration-200 flex items-center justify-center">Sign
                      Up
                    </button>
                    <div class="text-center">
                      <a href="{{ route('login') }}" class="text-xs text-white hover:underline">Already have an
                        account?</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
-->
          </div>
        </div>
      </div>
    </section>

    <section class="bg-white py-6 md:py-10">
      <div class="container mx-auto max-w-7xl px-4 text-center">
        <a href="{{ route('registration') }}">
          <p class="md:text-8xl text-3xl text-green-700 font-bold">Register Now!</p>
        </a>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:space-y-0 space-y-8 py-6 md:py-10">
          <?php 
             $k=0;
          ?>
          @foreach($dt_content['contents'] ?? [] as $row)
          @if ($row['lco_cat_ref']==3)
          <?php
            $k++;
            $color="";
            if ($k % 3 == 1){
              $color = "bg-cardorange";
            }else if ($k % 3 == 2){
              $color = "bg-cardblue";
            }else {
              $color = "bg-cardgreen";
            } 
          ?>
            <div class="flex flex-col gap-6">
              <div class="relative w-full border">
                <img src="{{ $row['lco_image'] }}" alt="Learn to win" class="object-contain w-full">
              </div>
              <div class="{{ $color}} text-white p-6 text-left lg:h-[350px] md:h-[520px]">
                <p class="text-xl">{!! $row['lco_slug'] !!}</p>
              </div>
              <a href="{{ route('content-detail',$row['lco_id'] ) }}">
                <button
                  class="group w-fit mx-auto rounded-full bg-gradient-to-br from-lime-400 to-lime-600 p-1.5 transition duration-300 ease-in-out hover:bg-gradient-to-tl hover:from-lime-400 hover:to-lime-600">
                  <div class="bg-white flex flex-row gap-2 py-2 px-4 items-center justify-center rounded-full">
                    Learn More
                    <div
                      class="size-7 flex items-center justify-center text-white bg-gradient-to-br from-lime-400 to-lime-600 rounded-full transition duration-300 ease-in-out group-hover:bg-gradient-to-tl group-hover:from-lime-400 group-hover:to-lime-600">
                      <span class="material-icons-outlined">chevron_right</span>
                    </div>
                  </div>
                </button>
              </a>
            </div>
          @endif
          @endforeach          
        </div>
      </div>
    </section>

    <!-- Global Draw Section -->
    <section class="global-draw-bg py-6 md:py-10">
      <div class="container mx-auto max-w-7xl px-4">
        <div class="md:flex md:space-x-8 items-start">
          <!-- Left Side: Graphic and Timer -->
          <div class="md:w-6/12 text-center mb-10 md:mb-0">
            <h3 class="text-3xl md:text-5xl font-impact text-white mb-4">GLOBALDRAW</h3>
            <div class="relative mx-auto mb-6">
              <img src="{{ $landing_image_2}}"
                alt="Global Draw $10 Million prize graphic with a stylized globe and currency symbols"
                class="object-cover">
            </div>
            <div class="items-center bg-omarcogrey text-white p-4 md:w-full rounded-lg countdown">
              <div class="flex md:flex-row flex-col md:gap-6 gap-2 items-center">
                <p class="text-xl uppercase text-green-600 font-bold text-left">Game<br class="hidden md:block" /> Close
                  In</p>
                <p class="text-xl md:text-2xl font-bold text-amber-600 mx-auto">{{ $dt_content['counting']['hari'] ?? 0 }} <span
                    class="text-sm text-green-600">DAYS</span> {{ $dt_content['counting']['jam'] ?? 0 }} <span class="text-sm text-green-600">HOURS</span> {{ $dt_content['counting']['menit'] ?? 0 }}
                  <span class="text-sm text-green-600">MINS</span></p>
              </div>
            </div>
          </div>

          <!-- Right Side: Text Content -->
          <div class="md:w-6/12 text-gray-700">
                <div class="md:w-full text-gray-700">
                    <p class="text-lg pb-5 md:text-xl leading-relaxed">
                        <span class="font-bold text-green-700">The Omarco Edusav Global Drawing</span>&nbsp;is an exclusive reward program created to give back to our valued users. Every time you purchase Omarco Units, you automatically earn entries into our Global Prize Drawings - giving you the chance to win exciting prizes on a regional and international level.
                    </p>
                    <h4 class="text-xl md:text-2xl font-semibold mb-3 text-green-700">
                        How it Works:
                    </h4>
                    <ul class="space-y-2 text-lg md:text-xl leading-relaxed">
                        <li class="flex items-start">
                            <span class="mr-2 text-green-700">&#8226;</span>
                            <span>
                                <span class="font-bold">Purchase Omarco Units:</span>
                                &nbsp;Buy Omarco Units through your Omarco Edusav account.
                            </span>
                        </li>
                        <li class="flex items-start">
                            <span class="mr-2 text-green-700">&#8226;</span>
                            <span>
                                <span class="font-bold">Earn Draw Entries:</span>
                                &nbsp;Every purchase qualifies you for entries into the next scheduled Global Drawing.
                            </span>
                        </li>
                        <li class="flex items-start">
                            <span class="mr-2 text-green-700">&#8226;</span>
                            <span>
                                <span class="font-bold">Win Exclusive Rewards:</span>
                                &nbsp;Selected winners will receive prizes such as cash rewards, digital gadgets, travel experiences, or exclusive educational incentives.
                            </span>
                        </li>
                    </ul>

                    <!-- Join Now Button -->
                    <a href="{{ config('urls.base.web') }}/" class="mt-4 btn-buy-now w-full md:w-fit text-center inline-block text-white font-bold text-2xl md:text-4xl px-10 md:px-16 py-4 md:py-5 rounded-lg shadow-xl uppercase tracking-wider">
                        Join Now
                    </a>
                </div>
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

          @foreach($dt_content['contents'] ?? [] as $row)
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


    <section class="bg-[#b3d236] py-6 md:py-10">
      <div class="container max-w-7xl mx-auto px-4">
        <p class="text-center uppercase text-white md:text-4xl text-xl font-bold">omarco edusav benefits</p>
        <div class="py-6 md:py-10">
          <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 gap-x-4 gap-y-14">
          @foreach($dt_content['contents'] ?? [] as $row)
          @if ($row['lco_cat_ref']==5)

            <div class="flex flex-row gap-4">
              <div class="relative h-[100px] w-[100px] aspect-square rounded-full bg-white">
                <img src="{{ $row['lco_image'] }}" alt="{{ $row['lco_title'] }}"
                  class="object-cover h-[100px] w-[100px] rounded-full p-2">
              </div>
              <div class="w-8/12 flex flex-col gap-1 text-white">
                <p class="font-bold text-xl">{{ $row['lco_title'] }}</p>
                <p class="text-sm font-light">{!! $row['lco_slug'] !!}</p>
              </div>
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
