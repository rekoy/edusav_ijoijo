 @extends('in-layout.in-layout')


@section('additional-css')
    <style>


    </style>
@endsection


@section('content')


    <!-- Hero Section: BE BETTER WITH MONEY -->
    <section id="hero-section"
      class="hero-money-bg text-white md:px-8 py-12 md:py-16 relative min-h-[300px] md:min-h-[400px] flex items-center">
      <div class="absolute inset-0 bg-black opacity-40 z-10"></div> <!-- Tapi di atas blur A002 -->
      <div class="container max-w-7xl mx-auto relative z-20 md:px-0 px-4">
        <!-- Left Side: Logo and Tagline -->
        <div class="flex md:flex-row flex-col text-center items-center md:gap-20 md:text-left mb-8 md:mb-0">
          <div class="lg:w-4/12 md:w-5/12 w-full">
            <img src="assets/images/logo.png" alt="Omarco Logo in Hero"
              class="mx-auto md:mx-0 mb-4 h-20 md:h-44 opacity-90">
            <div class="bg-green-700 font-semibold p-2 md:text-sm uppercase w-fit md:mx-0 mx-auto my-4">
              <!--  <span>Driving Financial Inclusion</span>  -->
            </div>
          </div>
          <div class="lg:w-9/12 md:w-7/12 w-full">
            <h1 class="text-4xl md:text-6xl font-impact uppercase lg:text-right text-center">Be Better With Money
            </h1>
          </div>
        </div>
      </div>
    </section>

    <!-- Win Big Cash Section -->
    <section class="win-cash-bg text-center text-white">
      <div class="container mx-auto max-w-7xl">
        <div class="flex md:flex-row flex-col items-center h-full">
          <div class="md:w-4/12 relative mx-auto w-full">
            <img src="assets/images/big_cash.png" alt="100 Million Rupiah Prize" class="object-cover mx-auto">
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
            <p><i><a href="{{ $dt_content['reload'] }}">reload</a></i></p>
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
              <img src="assets/images/global_draw.png"
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
            <p class="text-lg md:text-xl leading-relaxed">
              <span class="font-bold text-green-700">The Omarco Edusav Global Drawing </span>is an exclusive reward
              program
              created to give back to our valued users.
              Every time you purchase Omarco Units, you automatically earn entries into our Global Prize Drawings -
              giving you the chance to win exciting prizes on a regional and international level.
            </p>
            <h4 class="text-xl md:text-2xl font-semibold mb-3 text-green-700">How It Works:</h4>
            <ul class="space-y-2 text-lg md:text-xl leading-relaxed">
              <li><strong>Purchase Omarco Units:</strong> Buy Omarco Units through your Omarco Edusav account.</li>
              <li><strong>Earn Draw Entries:</strong> Every purchase qualifies you for entries into the next scheduled
                Global Drawing.</li>
              <li><strong>Win Exclusive Rewards:</strong> Selected winners will receive prizes such as cash rewards,
                digital gadgets, travel experiences, or exclusive educational incentives.</li>
            </ul>
            <a href="#"
              class="mt-4 btn-buy-now md:w-fit w-full text-center inline-block text-white font-bold text-2xl md:text-4xl px-10 md:px-16 py-4 md:py-5 rounded-lg shadow-xl uppercase tracking-wider">
              Join Now
            </a>
          </div>
        </div>
      </div>
    </section>

    <section class="bg-white py-6 md:py-10">
      <div class="container mx-auto max-w-7xl px-4">
        <p class="flex items-center gap-3 md:text-4xl text-xl text-green-700 font-bold">
          <span class="material-icons-outlined text-green-700 md:text-4xl text-xl leading-none">article</span>
          Omarco News
        </p>
        <div class="py-6 md:py-10">
          <div class="grid grid-cols-1 lg:grid-cols-4 md:grid-cols-3 gap-4">
            <div class="flex flex-col">
              <div class="relative w-full h-[200px] border">
                <img src="assets/images/news1.png" alt="News 1" class="object-cover h-[200px] w-full">
              </div>
              <div class="text-black py-4 text-left">
                <p class="text-lg line-clamp-2 text-ellipsis">
                  Rubio Eulogizes Tiananmen
                  Protesters as Tariffs Test China
                  Ties</p>
              </div>
            </div>
            <div class="flex flex-col">
              <div class="relative w-full h-[200px] border">
                <img src="assets/images/news2.png" alt="News 1" class="object-cover h-[200px] w-full">
              </div>
              <div class="text-black py-4 text-left">
                <p class="text-lg line-clamp-2 text-ellipsis">
                  Review
                  Huawei's Pura X Is An Intriguing
                  New Foldable — If You're
                  Outside the US</p>
              </div>
            </div>
            <div class="flex flex-col">
              <div class="relative w-full h-[200px] border">
                <img src="assets/images/news3.png" alt="News 1" class="object-cover h-[200px] w-full">
              </div>
              <div class="text-black py-4 text-left">
                <p class="text-lg line-clamp-2 text-ellipsis">
                  Garuda Said in Talks for $500
                  Million From Indonesia Wealth
                  Fund</p>
              </div>
            </div>
            <div class="flex flex-col">
              <div class="relative w-full h-[200px] border">
                <img src="assets/images/news4.png" alt="News 1" class="object-cover h-[200px] w-full">
              </div>
              <div class="text-black py-4 text-left">
                <p class="text-lg line-clamp-2 text-ellipsis">
                  The Big rake
                  Nintendo Can't Afford a Slip Up
                  With Switch P</p>
              </div>
            </div>
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
