 @extends('in-layout.in-layout-home')


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
            <h1 class="text-4xl md:text-5xl font-impact uppercase font-bold text-left">Be Better With Money
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
@else
    <section id="hero-section"
      class="hero-money-bg text-white md:px-8 relative min-h-[110px] md:min-h-[150px] flex items-center">
      <div class="absolute inset-0 bg-black opacity-40 z-10"></div>
      <div class="container max-w-7xl mx-auto relative z-20 md:px-0 px-4 py-5">
        <!-- Left Side: Logo and Tagline -->
        <div class="flex md:flex-row flex-col text-center items-center md:gap-15 md:text-left mb-8 md:mb-0">
          <div class="lg:w-4/12 md:w-5/12 w-full">
            <!-- Placeholder for logo.png -->
            <img src="assets/images/edusav.png" alt="Omarco Logo in Hero"
              class="mx-auto md:mx-0 mb-4 h-12 md:h-24 opacity-90">
          </div>
          <div class="lg:w-9/12 md:w-7/12 w-full">
            <div class="flex flex-col md:gap-7 gap-3 text-center md:text-end xl:text-end lg:text-end 2xl:text-end items-center md:items-end lg:items-end xl:items-end 2xl:text-end">
              <h1 class="text-2xl md:text-4xl font-impact uppercase w-fit">
                  Be Better With Money
              </h1>
          </div>
          </div>

        </div>

      </div>
    </section>
@endif

<?php
  $landing_image_1="";
  $landing_image_bawah="";
  $landing_image_tengah="";
	if ($dt_content['contents']){
  foreach($dt_content['contents'] ?? [] as $row){
    
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
	}
?>

    <!-- Win Big Cash Section -->
    <section class="win-cash-bg pb-10 text-center text-white"> 
      <div class="w-full">
        <div class="relative w-full">  
          <img src="{{ $landing_image_1 }}" alt="100 Million Rupiah Prize" class="object-cover w-full">
        </div>
        <div class="px-4">
          <p class="text-2xl md:text-5xl font-semibold mb-4 md:mb-10 leading-snug" style="">
            <span class="block md:mb-4 mb-2" style="">
              Buy multi-benefit voucher including valuable Educational Vouchers only for
            </span>
            <span class="block md:mb-4 mb-2" style="">
              Rp 5,000 and you can WIN up to 100 Million Rupiah
            </span>
            <span class="block" style="">
              and maybe it could be you can winning US$ 10 Million if you can win the international prize
            </span>
          </p>
          <p>
            <a href="{{ config('urls.base.web') }}/buy" class="btn-buy-now inline-block text-white font-bold text-2xl md:text-4xl px-10 md:px-16 py-4 md:py-5 rounded-lg shadow-xl uppercase tracking-wider" style="">
              Buy Now
            </a>
          </p>
        </div>
      </div>
    </section>

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
                <p class="text-xl md:text-2xl font-bold text-amber-600 mx-auto">{{ $dt_content['counting']['hari'] ?? ""}} <span
                    class="text-sm text-green-600">DAYS</span> {{ $dt_content['counting']['jam'] ?? ""}} <span class="text-sm text-green-600">HOURS</span> {{ $dt_content['counting']['menit'] ?? ""}}
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
                    <a href="{{ route('registration') }}" class="mt-4 btn-buy-now w-full md:w-fit text-center inline-block text-white font-bold text-2xl md:text-4xl px-10 md:px-16 py-4 md:py-5 rounded-lg shadow-xl uppercase tracking-wider">
                        Join Now
                    </a>
                </div>
            </div>
        </div>
      </div>
    </section>

  @endsection

