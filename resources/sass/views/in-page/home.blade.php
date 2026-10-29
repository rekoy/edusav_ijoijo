 @extends('in-layout.in-layout')


@section('additional-css')
    <style>


    </style>
@endsection


@section('content')
    <!-- Hero Section: BE BETTER WITH MONEY -->
    <section id="hero-section"
      class="hero-money-bg text-white md:px-8 relative min-h-[110px] md:min-h-[150px] flex items-center">
      <div class="absolute inset-0 bg-black opacity-40 z-10"></div> <!-- Tapi di atas blur -->
      <div class="container max-w-7xl mx-auto relative z-20 md:px-0 px-4 py-5">
        <!-- Left Side: Logo and Tagline -->
        <div class="flex md:flex-row flex-col text-center items-center md:gap-15 md:text-left mb-8 md:mb-0">
          <div class="lg:w-4/12 md:w-5/12 w-full">
            <!-- Placeholder for logo.png -->
            <img src="assets/images/logo.png" alt="Omarco Logo in Hero"
              class="mx-auto md:mx-0 mb-4 h-12 md:h-24 opacity-90">
          </div>
          <div class="lg:w-9/12 md:w-7/12 w-full">
            <div class="flex flex-col md:gap-7 gap-3 sm:items-center md:items-end lg:items-end xl:items-end">
              <h1 class="text-2xl md:text-4xl font-impact uppercase text-center xs:text-end w-fit">
                  Be Better With Money
              </h1>
              <button type="button"
                  class="w-fit font-bold bg-green-700 hover:bg-green-600 text-white py-2 px-4 text-xl transition-colors duration-200 rounded-md">
                  <a href="#" class="text-white no-underline">
                      Join in
                  </a>
              </button>
          </div>
          </div>

        </div>

      </div>
    </section>

    <!-- Win Big Cash Section -->
    <section class="win-cash-bg text-center text-white w-full">
    <div class="w-full">
      <div class="flex md:flex-row flex-col md:items-start items-center md:pb-0 md:gap-8 w-full">
        <div class="w-full">
          <img src="assets/images/big_cash.png" alt="100 Million Rupiah Prize" class="object-cover mx-auto">
        </div>
        <div class="relative mx-auto w-fit px-5 py-5">
  @if ($dt_content['sessionService']->has_access() == \App\Constants\General::INVALID)
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
@endif
          </div>
        </div>
      </div>
    </section>

    <section class="bg-white py-6 md:py-10">
      <div class="container mx-auto max-w-7xl px-4 text-center">
        <p class="md:text-8xl text-3xl text-green-700 font-bold">Register Now!</p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:space-y-0 space-y-8 py-6 md:py-10">
          <div class="flex flex-col gap-6">
            <div class="relative w-full border">
              <img src="assets/images/learn_to_win.png" alt="Learn to win" class="object-contain w-full">
            </div>
            <div class="bg-cardorange text-white p-6 text-left lg:h-[350px] md:h-[520px]">
              <p class="text-xl">
                Learn to Win is an engaging,
                time-bound learning initiative
                designed to empower participants with new knowledge or
                skills-while giving them the
                exciting opportunity to win a
                grand prize.</p>
            </div>
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
          </div>
          <div class="flex flex-col gap-6">
            <div class="relative w-full border">
              <img src="assets/images/save_to_win.png" alt="Learn to win" class="object-contain w-full">
            </div>
            <div class="bg-cardblue text-white p-6 text-left lg:h-[350px] md:h-[520px]">
              <p class="text-xl">
                Save to Win is an exciting rewards
                program designed to encourage
                customers to save while they shop.
                By collecting and applying discount
                vouchers through our platform, users
                not only enjoy instant savings on
                their purchases but also eam entries
                into regular prize draws for a chance
                to win exclusive rewards.</p>
            </div>
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
          </div>
          <div class="flex flex-col gap-6">
            <div class="relative w-full border">
              <img src="assets/images/shop_to_win.png" alt="Learn to win" class="object-contain w-full">
            </div>
            <div class="bg-cardgreen text-white p-6 text-left lg:h-[350px] md:h-[520px]">
              <p class="text-xl">
                Shop to Win is a fun and rewarding
                loyalty program that turns your
                everyday shopping into exciting
                opportunities to win prizes. Every
                purchase you make through our app
                doesn't just get you great products —
                it also earns you entries into exclusive
                prize draws, bonus rewards. and
                special promotions.</p>
            </div>
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
          </div>
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
            <a href="{{ route('registration') }}"
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
          <img src="assets/images/news-ico.png" class="h-8 md:h-10">Omarco News
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

    <section class="bg-[#b3d236] py-6 md:py-10">
      <div class="container max-w-7xl mx-auto px-4">
        <p class="text-center uppercase text-white md:text-4xl text-xl font-bold">omarco edusav benefits</p>
        <div class="py-6 md:py-10">
          <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 gap-x-4 gap-y-14">
            <div class="flex flex-row gap-4">
              <div class="relative h-[100px] w-[100px] aspect-square rounded-full bg-white">
                <img src="assets/images/main_goals.png" alt="Benefit 1"
                  class="object-cover h-[100px] w-[100px] rounded-full p-2">
              </div>
              <div class="w-8/12 flex flex-col gap-1 text-white">
                <p class="font-bold text-xl">Main Goals</p>
                <p class="text-sm font-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque
                  venenatis ac sem eu feugiat.
                  Aliquam nec ante risus.</p>
              </div>
            </div>
            <div class="flex flex-row gap-4">
              <div class="relative h-[100px] w-[100px] aspect-square rounded-full bg-white">
                <img src="assets/images/grow_up.png" alt="Benefit 1" class="object-cover h-[100px] w-[100px] rounded-full p-2">
              </div>
              <div class="w-8/12 flex flex-col gap-1 text-white">
                <p class="font-bold text-xl">Grow Up</p>
                <p class="text-sm font-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque
                  venenatis ac sem eu feugiat.
                  Aliquam nec ante risus.</p>
              </div>
            </div>
            <div class="flex flex-row gap-4">
              <div class="relative h-[100px] w-[100px] aspect-square rounded-full bg-white border">
                <img src="assets/images/new_ideas.png" alt="Benefit 1"
                  class="object-cover h-[100px] w-[100px] rounded-full p-2">
              </div>
              <div class="w-8/12 flex flex-col gap-1 text-white">
                <p class="font-bold text-xl">New Ideas</p>
                <p class="text-sm font-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque
                  venenatis ac sem eu feugiat.
                  Aliquam nec ante risus.</p>
              </div>
            </div>
            <div class="flex flex-row gap-4">
              <div class="relative h-[100px] w-[100px] aspect-square rounded-full bg-white border">
                <img src="assets/images/planning.png" alt="Benefit 1"
                  class="object-cover h-[100px] w-[100px] rounded-full p-2">
              </div>
              <div class="w-8/12 flex flex-col gap-1 text-white">
                <p class="font-bold text-xl">Planning</p>
                <p class="text-sm font-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque
                  venenatis ac sem eu feugiat.
                  Aliquam nec ante risus.</p>
              </div>
            </div>
            <div class="flex flex-row gap-4">
              <div class="relative h-[100px] w-[100px] aspect-square rounded-full bg-white border">
                <img src="assets/images/partnership.png" alt="Benefit 1"
                  class="object-cover h-[100px] w-[100px] rounded-full p-2">
              </div>
              <div class="w-8/12 flex flex-col gap-1 text-white">
                <p class="font-bold text-xl">Partnership</p>
                <p class="text-sm font-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque
                  venenatis ac sem eu feugiat.
                  Aliquam nec ante risus.</p>
              </div>
            </div>
            <div class="flex flex-row gap-4">
              <div class="relative h-[100px] w-[100px] aspect-square rounded-full bg-white border">
                <img src="assets/images/protection.png" alt="Benefit 1"
                  class="object-cover h-[100px] w-[100px] rounded-full p-2">
              </div>
              <div class="w-8/12 flex flex-col gap-1 text-white">
                <p class="font-bold text-xl">Protection</p>
                <p class="text-sm font-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque
                  venenatis ac sem eu feugiat.
                  Aliquam nec ante risus.</p>
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
