 @extends('in-layout.in-layout-home')


@section('additional-css')
    <style>
      section {
        overflow-x: hidden;
      }
    </style>
@endsection


@section('content')


    <section id="hero-section"
      class="hero-money-bg text-white md:px-8 relative min-h-[110px] md:min-h-[150px] flex items-center">
      <div class="absolute inset-0 bg-black opacity-40 z-10"></div> 
      
      <!-- Tapi di atas blur -->
      <div class="container max-w-7xl mx-auto relative z-20 md:px-0 px-4 py-5">
        <!-- Left Side: Logo and Tagline -->
        <div class="flex md:flex-row flex-col text-center items-center md:gap-15 md:text-left mb-8 md:mb-0">
          <div class="lg:w-4/12 md:w-5/12 w-full">
            <!-- Placeholder for logo.png -->
            <img src="/assets/images/logo.png" alt="Omarco Logo in Hero"
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

    <!-- Win Big Cash Section -->
    <section class="win-cash-bg text-center text-white">
      <div class="container mx-auto max-w-7xl">
        <div class="flex md:flex-row flex-col items-center h-full">
          <div class="md:w-4/12 relative mx-auto w-full">
            <img src="/assets/images/big_cash.png" alt="100 Million Rupiah Prize" class="object-cover w-full">
          </div>
          <div class="md:w-8/12 md:text-center text-center py-6">
            <p class="uppercase text-4xl md:text-7xl font-bold">one step ahead</p>
            <p class="uppercase md:text-3xl text-lg font-bold">chance to win 100 million rupiah</p>
            <p class="uppercase md:text-3xl text-lg font-bold">only with Rp 5,000 / unit</p>
          </div>
        </div>
      </div>
    </section>

    <section class="bg-white py-6 md:py-10">
      <div class="container mx-auto max-w-7xl px-4 text-center">
        <p class="md:text-4xl text-xl text-black font-bold">{{ $dt_content['title']}}</p>
        <p class="text-sm text-neutral-500 max-w-md mx-auto"></p>
        <div class="max-w-3xl flex md:flex-row flex-col py-6 mx-auto items-start">
          <div>
            <span class="md:flex hidden material-icons-outlined text-lime-400 text-[10rem]">remember_me</span>
          </div>
          <form class="w-full space-y-6" method="POST" action="{{ route('do_forgot_pwd') }}">
@csrf
          <div class="grid md:grid-cols-2 grid-cols-1 gap-6">
              <input type="text" name="cl_nickname" placeholder="User Name"
                class="text-sm rounded-md w-full py-3 px-3 border bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-gray-200" />
              <input type="text" name="cl_userid" value="" placeholder="UserId"
                class="text-sm rounded-md w-full py-3 px-3 border bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-gray-200" />
            </div>
            <button type="submit"
              class="w-full bg-omarcogreen hover:bg-green-600 text-white font-semibold p-3 rounded-md transition-colors duration-200 flex items-center justify-center">
              FORGOT PASSWORD
            </button>
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
