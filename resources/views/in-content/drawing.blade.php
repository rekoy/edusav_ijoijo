 @extends('in-layout.in-layout-access')


@section('additional-css')
    <style>


    </style>
@endsection


@section('content')

    <section id="hero-section"
      class="hero-money-bg text-white md:px-8 relative min-h-[110px] md:min-h-[150px] flex items-center">
      <div class="absolute inset-0 bg-black opacity-40 z-10"></div> <!-- Tapi di atas blur -->
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
        <div class="flex md:flex-row flex-col items-center">
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

    <section class="bg-white">
      <div class="container mx-auto max-w-7xl px-0">
        <ul class="grid grid-cols-2 md:grid-cols-6">
          <li class="border-r border-rose-600">
            <a href="#top-up"
              class="flex items-center md:text-xl text-base text-white border-b border-white gap-2 bg-rose-500 hover:bg-opacity-80 transition px-4 py-2">
              <span class="material-icons-outlined">account_balance_wallet</span>
              Wallet
            </a>
          </li>

          <li class="relative border-r border-rose-600 group">
            <div
              class="cursor-pointer flex items-center justify-between md:text-xl text-base text-white border-b border-white gap-2 bg-rose-500 hover:bg-opacity-80 transition px-4 py-2">
              <div class="flex items-center gap-2">
                <span class="material-icons-outlined">photo_camera</span>
                Content
              </div>
              <span class="material-icons-outlined">expand_more</span>
            </div>
            <!-- Dropdown -->
            <ul
              class="absolute left-0 top-full bg-green-600 shadow-lg md:text-xl text-base text-white min-w-full hidden group-hover:block z-10">
              <li class="border-b border-white">
                <a href="#wallet-history" class="flex items-center gap-2 p-2 hover:bg-green-700/90 transition">
                  <span class="material-icons-outlined">chevron_right</span>
                  <span>Item 1</span>
                </a>
              </li>
              <li>
                <a href="#wallet-history" class="flex items-center gap-2 p-2 hover:bg-green-700/90 transition">
                  <span class="material-icons-outlined">chevron_right</span>
                  <span>Item 2</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="border-r border-rose-600">
            <a href="#top-up"
              class="flex items-center md:text-xl text-base text-white border-b border-white gap-2 bg-rose-500 hover:bg-opacity-80 transition px-4 py-2">
              <span class="material-icons-outlined">confirmation_number</span>
              Voucher
            </a>
          </li>
          <li class="border-r border-rose-600">
            <a href="user-drawing.html"
              class="flex items-center md:text-xl text-base text-white border-b border-white gap-2 bg-rose-500 hover:bg-opacity-80 transition px-4 py-2">
              <span class="material-icons-outlined">currency_exchange</span>
              Winner
            </a>
          </li>

          <li class="border-r border-rose-600">
            <a href="#top-up"
              class="flex items-center md:text-xl text-base text-white border-b border-white gap-2 bg-rose-500 hover:bg-opacity-80 transition px-4 py-2">
              <span class="material-icons-outlined">search</span>
              Search
            </a>
          </li>
          <li class="relative border-r border-rose-600 group">
            <div
              class="cursor-pointer flex items-center justify-between md:text-xl text-base text-white border-b border-white gap-2 bg-rose-500 hover:bg-opacity-80 transition px-4 py-2">
              <div class="flex items-center gap-2">
                <span class="material-icons-outlined">account_circle</span>
                Account
              </div>
              <span class="material-icons-outlined">expand_more</span>
            </div>
            <!-- Dropdown -->
            <ul
              class="absolute left-0 top-full bg-green-600 shadow-lg md:text-xl text-base text-white min-w-full hidden group-hover:block z-10">
              <li class="border-b border-white">
                <a href="#wallet-history" class="flex items-center gap-2 p-2 hover:bg-green-700/90 transition">
                  <span class="material-icons-outlined">chevron_right</span>
                  <span>Item 1</span>
                </a>
              </li>
              <li>
                <a href="#wallet-history" class="flex items-center gap-2 p-2 hover:bg-green-700/90 transition">
                  <span class="material-icons-outlined">chevron_right</span>
                  <span>Item 2</span>
                </a>
              </li>
            </ul>
          </li>
      </div>
    </section>

    <section class="bg-white py-6 md:py-10">
      <div class="container mx-auto max-w-7xl px-4">
        <div class="flex md:flex-row flex-col md:gap-8 gap-4">
          <div class="md:w-4/12 global-draw-bg text-center p-6 rounded-lg space-y-6">
            <p class="md:text-2xl sm:text-5xl lg:text-4xl text-3xl font-impact text-white mb-4">GLOBALDRAW</p>
            <div class="relative w-full">
              <img src="/assets/images/global_draw.png"
                alt="Global Draw $10 Million prize graphic with a stylized globe and currency symbols"
                class="object-contain">
            </div>
            <div class="w-fit mx-auto items-center bg-omarcogrey text-white p-4 rounded-lg countdown">
              <div class="flex lg:flex-row flex-col md:gap-6 gap-2 items-center">
                <p class="text-xl md:text-lg uppercase text-green-600 font-bold text-left">Game<br
                    class="hidden md:block" /> Close
                  In</p>
                <p class="lg:text-lg text-sm font-bold text-amber-600">100 <span
                    class="text-sm text-green-600">DAYS</span> 15 <span class="text-sm text-green-600">HOURS</span> 20
                  <span class="text-sm text-green-600">MINS</span></p>
              </div>
            </div>
            <p class="text-sm md:text-base leading-relaxed text-left ">
              <span class="font-bold text-green-700">The Omarco Edusav Global Drawing </span>is an exclusive reward
              program
              created to give back to our valued users.
              Every time you purchase Omarco Units, you automatically earn entries into our Global Prize Drawings -
              giving you the chance to win exciting prizes on a regional and international level.
            </p>
            <div class="text-left">
              <h4 class="text-sm md:text-base font-semibold text-green-700">How It Works:</h4>
              <ul class="space-y-2 text-sm md:text-base leading-relaxed ml-4">
                <li><strong>Purchase Omarco Units:</strong> Buy Omarco Units through your Omarco Edusav account.</li>
                <li><strong>Earn Draw Entries:</strong> Every purchase qualifies you for entries into the next scheduled
                  Global Drawing.</li>
                <li><strong>Win Exclusive Rewards:</strong> Selected winners will receive prizes such as cash rewards,
                  digital gadgets, travel experiences, or exclusive educational incentives.</li>
              </ul>
            </div>
          </div>
          <div class="md:w-8/12 w-full">
            <div class="flex flex-col md:space-y-32 space-y-12">
              <div class="flex md:flex-row flex-col md:gap-8 gap-4">
                <div class="md:flex hidden lg:w-[150px] lg:h-[150px] h-[100px] w-[100px] rounded-full bg-green-600">
                  <span class="material-icons text-white lg:text-[150px] text-[100px]">account_circle</span>
                </div>
                <div class="w-full">
                  <p class="lg:text-4xl md:text-2xl text-xl text-green-700 font-bold">Halo User 00021213</p>
                  <div class="grid grid-cols-1 lg:grid-cols-2 md:gap-8 gap-4 mt-6">
                    <div>
                      <div class="rounded-md shadow-lg p-4">
                        <div class="flex items-center justify-between">
                          <p class="font-bold text-2xl">Wallet Balance</p>

                          <!-- Wrapper icon dengan relative positioning -->
                          <div
                            class="relative rounded-full h-8 w-8 p-1 bg-gradient-to-br from-teal-500 to-green-500 text-center">
                            <span class="material-icons-outlined text-white">notifications</span>

                            <!-- Badge notifikasi -->
                            <div
                              class=" shadow-xl absolute -top-2 -right-2 bg-neutral-200 text-neutral-700 text-xs font-bold w-5 h-5 flex items-center justify-center rounded-full">
                              3
                            </div>
                          </div>
                        </div>

                        <div
                          class="flex py-2 w-full bg-gradient-to-br from-teal-500 to-green-500 px-4 text-white rounded-lg mt-4 items-center justify-between">
                          <p class="text-2xl font-bold">Rp 150,000</p>
                          <div class="rounded-full h-8 w-8 p-1 bg-white text-center">
                            <span class="material-icons-outlined text-neutral-500">priority_high</span>
                          </div>

                        </div>
                      </div>
                      <button
                        class="hover:opacity-90 font-bold bg-gradient-to-br from-teal-500 to-green-500 py-2 px-6 mt-4 text-white rounded-full shadow-lg flex ml-auto">
                        Topup
                      </button>
                    </div>
                    <div>
                      <div class="rounded-md shadow-lg p-4">
                        <div class="flex items-center justify-between">
                          <p class="font-bold text-2xl">Unit Balance</p>

                          <!-- Wrapper icon dengan relative positioning -->
                          <div
                            class="relative rounded-full h-8 w-8 p-1 bg-gradient-to-br from-teal-500 to-green-500 text-center">
                            <span class="material-icons-outlined text-white">notifications</span>

                            <!-- Badge notifikasi -->
                            <div
                              class=" shadow-xl absolute -top-2 -right-2 bg-neutral-200 text-neutral-700 text-xs font-bold w-5 h-5 flex items-center justify-center rounded-full">
                              3
                            </div>
                          </div>
                        </div>

                        <div
                          class="flex py-2 w-full bg-gradient-to-br from-teal-500 to-green-500 px-4 text-white rounded-lg mt-4 items-center justify-between">
                          <p class="text-2xl font-bold">50 Units</p>
                          <div class="rounded-full h-8 w-8 p-1 bg-white text-center">
                            <span class="material-icons-outlined text-neutral-500">priority_high</span>
                          </div>

                        </div>
                      </div>
                      <button
                        class="hover:opacity-90 font-bold bg-gradient-to-br from-teal-500 to-green-500 py-2 px-6 mt-4 text-white rounded-full shadow-lg flex ml-auto">
                        Convert
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="flex flex-col gap-2">
                <p class="md:text-4xl text-xl text-green-700 font-bold">
                  <span
                    class="material-icons-outlined text-green-700 md:text-4xl text-xl leading-none">confirmation_number</span>
                  Ticket Drawing
                </p>

                <div class="shadow-lg rounded-lg p-4 grid grid-cols-3 border border-neutral-100">
                  <div class="flex flex-col space-y-4 border-r-2 border-dashed border-neutral-300 h-20">
                    <p class="text-green-700 font-bold md:text-xl text-base text-center">Available Ticket</p>
                  </div>
                  <div class="flex flex-col space-y-4 border-r-2 border-dashed border-neutral-300 h-20">
                    <p class="text-green-700 font-bold md:text-xl text-base text-center">Winning Ticket</p>
                  </div>
                  <div class="flex flex-col space-y-4 h-20">
                    <div class="flex flex-row mx-4">
                      <p class="text-green-700 font-bold md:text-xl text-base text-center">Search Ticket</p>
                      <button class="ml-auto p-1 rounded-lg bg-indigo-400 text-base"><span
                          class="material-icons-outlined text-white">search</span></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="bg-white pt-6">
      <div class="container mx-auto max-w-7xl px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 md:gap-8 gap-4">
          <div>
            <div class="flex items-center justify-between">
              <p class="flex items-center gap-3 md:text-4xl text-xl text-green-700 font-bold">
                <span class="material-icons-outlined text-green-700 md:text-4xl text-xl leading-none">leaderboard</span>
                Winner List
              </p>
              <p class="text-green-700 text-sm hover:underline cursor-pointer">Show more</p>
            </div>
            <div class="py-6 md:py-10">
              <div class="flex flex-col gap-4">
                <div class="rounded-lg p-8 bg-neutral-200">
                </div>
                <div class="rounded-lg p-8 bg-neutral-200">
                </div>
                <div class="rounded-lg p-8 bg-neutral-200">
                </div>
                <div class="rounded-lg p-8 bg-neutral-200">
                </div>
              </div>
            </div>
          </div>
          <div>
            <div class="flex items-center justify-between">
              <p class="flex items-center gap-3 md:text-4xl text-xl text-green-700 font-bold">
                <span
                  class="material-icons-outlined text-green-700 md:text-4xl text-xl leading-none">emoji_events</span>
                Past Winner List
              </p>
              <p class="text-green-700 text-sm hover:underline cursor-pointer">Show more</p>
            </div>
            <div class="py-6 md:py-10">
              <div class="flex flex-col gap-4">
                <div class="rounded-lg p-8 bg-neutral-200">
                </div>
                <div class="rounded-lg p-8 bg-neutral-200">
                </div>
                <div class="rounded-lg p-8 bg-neutral-200">
                </div>
                <div class="rounded-lg p-8 bg-neutral-200">
                </div>
              </div>
            </div>
          </div>
          <div>

          </div>
        </div>
      </div>
    </section>

    <section class="bg-white py-6">
      <div class="container mx-auto max-w-7xl px-4">
        <p class="flex items-center gap-3 md:text-4xl text-xl text-green-700 font-bold">
          <img src="/assets/images/news-ico.png" class="h-8 md:h-10">Omarco News
        </p>
        <div class="py-6 md:py-10">
          <div class="grid grid-cols-1 lg:grid-cols-4 md:grid-cols-3 gap-4">
            <div class="flex flex-col">
              <div class="relative w-full h-[200px] border">
                <img src="/assets/images/news1.png" alt="News 1" class="object-cover h-[200px] w-full">
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
                <img src="/assets/images/news2.png" alt="News 1" class="object-cover h-[200px] w-full">
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
                <img src="/assets/images/news3.png" alt="News 1" class="object-cover h-[200px] w-full">
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
                <img src="/assets/images/news4.png" alt="News 1" class="object-cover h-[200px] w-full">
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
  @endsection

