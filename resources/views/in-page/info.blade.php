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
    <section id="hero-section"
      class="hero-money-bg text-white md:px-8 relative min-h-[110px] md:min-h-[150px] flex items-center">
      <div class="absolute inset-0 bg-black opacity-40 z-10"></div> <!-- Tapi di atas blur A001 -->
      <div class="container max-w-7xl mx-auto relative z-20 md:px-0 px-4 py-5">
        <!-- Left Side: Logo and Tagline -->
        <div class="flex md:flex-row flex-col text-center items-center md:gap-15 md:text-left mb-8 md:mb-0">
          <div class="lg:w-4/12 md:w-5/12 w-full">
            <!-- Placeholder for logo.png -->
            <img src="assets/images/logo.png" alt="Omarco Logo in Hero"
              class="mx-auto md:mx-0 mb-4 h-12 md:h-24 opacity-90">
          </div>
          <div class="lg:w-9/12 md:w-7/12 w-full">
            <div class="flex flex-col md:gap-7 gap-3 text-center md:text-end xl:text-end lg:text-end 2xl:text-end items-center md:items-end lg:items-end xl:items-end 2xl:text-end">
              <h1 class="text-2xl md:text-4xl font-impact uppercase w-fit">
                  Be Better With Money
              </h1>
              <button type="button"
                  class="w-fit font-bold bg-green-700 hover:bg-green-600 text-white py-2 px-4 text-xl transition-colors duration-200 rounded-md">
                  <a href="{{ route('registration') }}" class="text-white no-underline">
                      Join in
                  </a>
              </button>
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
            <img src="/assets/images/big_cash.png" alt="100 Million Rupiah Prize" class="object-cover mx-auto">
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
            <b>{{ $dt_content['message'] }}</b>
            <p><i><a href="/">reload</a></i></p>
          <a href="/index">Back to home</a>
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
