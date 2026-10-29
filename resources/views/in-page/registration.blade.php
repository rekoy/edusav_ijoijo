 @extends('in-layout.in-layout-home')


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
?>

    <!-- Hero Section: BE BETTER WITH MONEY -->
     <!-- <section id="hero-section"
      class="hero-money-bg text-white md:px-8 relative min-h-[110px] md:min-h-[150px] flex items-center"> -->
      <!-- <div class="absolute inset-0 bg-black opacity-40 z-10"></div> Tapi di atas blur A001 -->
      <!-- <div class="container max-w-7xl mx-auto relative z-20 md:px-0 px-4 py-5"> -->
        <!-- Left Side: Logo and Tagline -->
        <!-- <div class="flex md:flex-row flex-col text-center items-center md:gap-15 md:text-left mb-8 md:mb-0"> -->
          <!-- <div class="lg:w-4/12 md:w-5/12 w-full"> -->
            <!-- Placeholder for logo.png -->
            <!-- <img src="assets/images/logo.png" alt="Omarco Logo in Hero"
              class="mx-auto md:mx-0 mb-4 h-12 md:h-24 opacity-90">
          </div>
          <div class="lg:w-9/12 md:w-7/12 w-full">
            <div class="flex flex-col md:gap-7 gap-3 text-center md:text-end xl:text-end lg:text-end 2xl:text-end items-center md:items-end lg:items-end xl:items-end 2xl:text-end">
              <h1 class="overflow-y-hidden text-2xl md:text-4xl font-impact uppercase w-fit">
                  Be Better With Money
              </h1>
              <button type="button"
                  class="w-fit font-bold bg-green-700 hover:bg-green-600 text-white py-2 px-4 text-xl transition-colors duration-200 rounded-md">
                  <a href="/index" class="text-white no-underline">
                      Join in
                  </a>
              </button>
          </div>
          </div>

        </div>

      </div>
    </section> -->

    <!-- Win Big Cash Section -->
    <!-- <section class="win-cash-bg text-center text-white">
      <div class="container mx-auto max-w-7xl">
        <div class="flex md:flex-row flex-col items-center h-full">
          <div class="md:w-4/12 relative mx-auto w-full">
            <img src="/assets/images/big_cash.png" alt="100 Million Rupiah Prize" class="object-cover w-full">
          </div>
          <div class="overflow-y-hidden md:w-8/12 md:text-center text-center py-6">
            <p class="overflow-y-hidden uppercase text-4xl md:text-7xl font-bold">one step ahead</p>
            <p class="overflow-y-hidden uppercase md:text-3xl text-lg font-bold">chance to win 100 million rupiah</p>
            <p class="overflow-y-hidden uppercase md:text-3xl text-lg font-bold">only with Rp 5,000 / unit</p>
          </div>
        </div>
      </div>
    </section> -->

    <section class="bg-white py-6 md:py-10">
      <div class="container mx-auto max-w-7xl px-4 text-left">
        
        <div class="max-w-3xl flex md:flex-row flex-col py-6 mx-auto items-start">

          <!-- <div>
            <span class="md:flex hidden material-icons-outlined text-lime-400 text-[10rem]">remember_me</span>
          </div> -->
          <form class="w-full space-y-6" method="POST" action="{{ route('do_registration') }}">
@csrf
          <div class="grid md:grid-cols-2 grid-cols-1 gap-6">
            <p class="md:text-4xl text-xl text-black font-bold">Create your account</p>
        <p class="text-sm text-neutral-500 max-w-md mx-auto"></p>
              <input type="text" name="cl_name" value="" placeholder="First Name"
                class="text-sm rounded-md w-full py-3 px-3 border bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-gray-200" />
              <input type="text" name="cl_lastname" placeholder="Last Name"
                class="text-sm rounded-md w-full py-3 px-3 border bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-gray-200" />
            </div>
            <input type="email" placeholder="Email Account" name="cl_email" value="{{ $dt_content['cl_email'] }}"
              class="text-sm rounded-md w-full py-3 px-3 border bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-gray-200" />
            <input type="text" placeholder="Username" name="cl_nickname" value="{{ $dt_content['cl_nickname'] }}"
              class="text-sm rounded-md w-full py-3 px-3 border bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-gray-200" />
<!--
            <div class="flex flex-row md:items-start items-center gap-4 bg-neutral-100 border rounded-md py-3 px-3">
              <p class="text-black">Birthday</p>
              <div
                class="flex md:flex-row flex-col md:gap-0 gap-4 md:items-center items-start justify-between w-full px-8">

                <input type="date" name="cl_dob" placeholder=""
                    class="text-sm rounded-md w-full py-3 px-3 border bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-gray-200" />
-->
                    <!--
                                <div class="text-neutral-500">
                  <label>Day</label>
                  <select class="bg-gray-100 text-black">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                  </select>
                </div>
                <div class="text-neutral-500">
                  <label>Month</label>
                  <select class="bg-gray-100 text-black">
                    <option>Januari</option>
                    <option>Februari</option>
                    <option>Maret</option>
                    <option>April</option>
                    <option>Mei</option>
                  </select>
                </div>
                <div class="text-neutral-500">
                  <label>Year</label>
                  <select class="bg-gray-100 text-black">
                    <option>2000</option>
                    <option>1999</option>
                    <option>1998</option>
                    <option>1997</option>
                    <option>1996</option>
                    <option>1995</option>
                    <option>1994</option>
                    <option>1993</option>
                    <option>1992</option>
                    <option>1991</option>
                    <option>1990</option>
                  </select>
                </div>
-->
<!--                
              </div>
            </div>
-->
            <div class="relative">
                <input type="password" name="cl_pwd" value="{{ $dt_content['cl_pwd'] ?? '' }}" placeholder="Password"
                    class="text-sm rounded-md w-full py-3 px-3 border bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-gray-200 pr-10" id="cl_pwd" />
                <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 flex items-center px-4 text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path id="eye-path" stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.575 3.01 9.963 7.173a1.012 1.012 0 010 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.575-3.01-9.963-7.173z" />
                        <path id="eye-center-path" stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path id="slash-path" stroke-linecap="round" stroke-linejoin="round" class="hidden" d="M3 3L21 21" />
                    </svg>
                </button>
            </div>

            <div class="relative">
                <input type="password" name="cl_pwd_confirmation" placeholder="Re-enter Password"
                    class="text-sm rounded-md w-full py-3 px-3 border bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-gray-200 pr-10" id="cl_pwd_confirmation" />
                <button type="button" id="togglePasswordConf" class="absolute inset-y-0 right-0 flex items-center px-4 text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path id="eye-path-conf" stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.575 3.01 9.963 7.173a1.012 1.012 0 010 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.575-3.01-9.963-7.173z" />
                        <path id="eye-center-path-conf" stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path id="slash-path-conf" stroke-linecap="round" stroke-linejoin="round" class="hidden" d="M3 3L21 21" />
                    </svg>
                </button>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Toggle logic for the first password field
                    const passwordInput = document.getElementById('cl_pwd');
                    const toggleButton = document.getElementById('togglePassword');
                    const slashPath = document.getElementById('slash-path');

                    toggleButton.addEventListener('click', function() {
                        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                        passwordInput.setAttribute('type', type);
                        slashPath.classList.toggle('hidden');
                    });

                    // Toggle logic for the password confirmation field
                    const passwordInputConf = document.getElementById('cl_pwd_confirmation');
                    const toggleButtonConf = document.getElementById('togglePasswordConf');
                    const slashPathConf = document.getElementById('slash-path-conf');

                    toggleButtonConf.addEventListener('click', function() {
                        const type = passwordInputConf.getAttribute('type') === 'password' ? 'text' : 'password';
                        passwordInputConf.setAttribute('type', type);
                        slashPathConf.classList.toggle('hidden');
                    });
                });
            </script>

 <!--           <input type="text" name="cl_dni" placeholder="ID Number"
              class="text-sm rounded-md w-full py-3 px-3 border bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-gray-200" />
              --> 
              <input type="number" name="cl_phone" placeholder="Phone Number"
              class="text-sm rounded-md w-full py-3 px-3 border bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-gray-200" />
<!--
              <div class="flex flex-row gap-4">
              <div class="p-1 rounded-md bg-neutral-100 cursor-pointer">
                <span class="material-icons-outlined text-green-500 text-3xl">autorenew</span>
              </div>
              <input type="number" placeholder="Random 7 Number (Mandatory)"
                class="text-sm rounded-md w-full py-3 px-3 border bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-gray-200" />
              <div class="p-1 rounded-md bg-neutral-100 cursor-pointer">
                <span class="material-icons-outlined text-red-500 text-3xl">highlight_off</span>
              </div>
            </div>
-->
            <div class="flex flex-row gap-2">
              <input type="checkbox" value="true" checked />
              <label>Agree with <span class="font-bold underline cursor-pointer">Terms & Conditions</span></label>
            </div>
            <button type="submit"
              class="w-full bg-omarcogreen hover:bg-green-600 text-white font-semibold p-3 rounded-md transition-colors duration-200 flex items-center justify-center">CREATE
              ACCOUNT
            </button>
            <div class =text-end col>
              <a href="/"style="color: #065c3cff;"> Already have account?</a>
           
              </div>
<!--            
            <p class="mx-auto text-sm text-neutral-500">or</p>
            <button type="button"
              class="p-2 border border-neutral-300 hover:bg-neutral-100 rounded-md flex flex-row items-center justify-center gap-2 mx-auto">
              <img src="/assets/images/google.png" alt="Google Logo" class="size-8" />
              <span>Sign in with Google</span>
            </button>
-->
          </form>


        </div>
      </div>
    </section>

    <!-- Global Draw Section -->

    <!-- Global Draw Section -->
    <!-- <section class="global-draw-bg py-6 md:py-10">
      <div class="container mx-auto max-w-7xl px-4">
        <div class="md:flex md:space-x-8 items-start"> -->
          <!-- Left Side: Graphic and Timer -->
          <!-- <div class="md:w-6/12 text-center mb-10 md:mb-0">
            
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
          </div> -->

          <!-- Right Side: Text Content -->
          <!-- <div class="md:w-6/12 text-gray-700">
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
                    </ul> -->

                    <!-- Join Now Button -->
                    <a href="{{ route('registration') }}" class="mt-4 btn-buy-now w-full md:w-fit text-center inline-block text-white font-bold text-2xl md:text-4xl px-10 md:px-16 py-4 md:py-5 rounded-lg shadow-xl uppercase tracking-wider">
                        Join Now
                    </a>
                </div>
            </div>
        </div>
      </div>
    </section> -->



    <!-- <section class="bg-white py-6 md:py-10">
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

    </section> -->


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
