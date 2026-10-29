 @extends('in-layout.in-layout-access')


@section('additional-css')
    <style>


    </style>
@endsection


@section('content')

    <section class="bg-white py-6 md:py-10">
      <div class="container mx-auto max-w-7xl px-4">
        <div class="flex md:flex-row flex-col md:gap-8 gap-4">
          <div class="md:w-4/12 global-draw-bg text-center p-6 rounded-lg space-y-6">
            <p class="md:text-2xl sm:text-5xl lg:text-4xl text-3xl font-impact text-white mb-4">GLOBALDRAW</p>
            <div class="relative w-full">
              <img src="assets/images/global_draw.png"
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
              <p class="lg:text-4xl md:text-2xl text-xl text-green-700 font-bold">Halo <label id="lbl_user_name">{{ $dt_content['dt_user']['cl_name']}} ({{ $dt_content['dt_user']['cl_userid']}})</label><!-- Halo User 00021213--></p>
              <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-8 gap-4 mt-6">

                      <div>
                        <div class="rounded-md shadow-lg p-4">
                          <div class="flex items-center justify-between">
                            <p class="font-bold text-2xl">Education Credit</p>

                            <!-- Wrapper icon dengan relative positioning -->
                            <a href="{{ route('credit.my') }}">
                              <div  
                                class="relative rounded-full h-8 w-8 p-1 bg-gradient-to-br from-teal-500 to-green-500 text-center">
                                <span class="material-icons-outlined text-white">menu</span>

                                <!-- Badge notifikasi -->
                                <div
                                  class=" shadow-xl absolute -top-2 -right-2 bg-neutral-200 text-neutral-700 text-xs font-bold w-5 h-5 flex items-center justify-center rounded-full">
                                  <label id="label_jumlah_credit_content"></label>
                                </div>
                              </div>
                            </a>
                          </div>

                          <div
                            class="flex py-2 w-full bg-gradient-to-br from-teal-500 to-green-500 px-4 text-white rounded-lg mt-4 items-center justify-between">
                            <p class="text-2xl font-bold"><div id="div_credit_summary"></div></p>
                            <div class="rounded-full h-8 w-8 p-1 bg-white text-center">
                              <span class="material-icons-outlined text-neutral-500">priority_high</span>
                            </div>

                          </div>
                        </div>

                        <a href="{{ route('wallet.topup') }}"><button  
                          class="hover:opacity-90 font-bold bg-gradient-to-br from-teal-500 to-green-500 py-2 px-6 mt-4 text-white rounded-full shadow-lg flex ml-auto">
                          Purchase
                        </button></a>
                      </div>



                      <div>
                        <div class="rounded-md shadow-lg p-4">
                          <div class="flex items-center justify-between">
                            <p class="font-bold text-2xl">Discount Coupon</p>

                            <!-- Wrapper icon dengan relative positioning -->
                            <a href="{{ route('coupon.my') }}">
                              <div  
                                class="relative rounded-full h-8 w-8 p-1 bg-gradient-to-br from-teal-500 to-green-500 text-center">
                                <span class="material-icons-outlined text-white">menu</span>

                                <!-- Badge notifikasi -->
                                <div
                                  class=" shadow-xl absolute -top-2 -right-2 bg-neutral-200 text-neutral-700 text-xs font-bold w-5 h-5 flex items-center justify-center rounded-full">
                                  <label id="label_jumlah_credit_voucher"></label>
                                </div>
                              </div>
                            </a>
                          </div>

                          <div
                            class="flex py-2 w-full bg-gradient-to-br from-teal-500 to-green-500 px-4 text-white rounded-lg mt-4 items-center justify-between">
                            <p class="text-2xl font-bold"><div id="div_voucher_balance"></div></p>
                            <div class="rounded-full h-8 w-8 p-1 bg-white text-center">
                              <span class="material-icons-outlined text-neutral-500">priority_high</span>
                            </div>

                          </div>
                        </div>
                        <a href="{{ route('content-voucher') }}"><button 
                          class="hover:opacity-90 font-bold bg-gradient-to-br from-teal-500 to-green-500 py-2 px-6 mt-4 text-white rounded-full shadow-lg flex ml-auto">
                          Get Discount Coupon
                        </button>
                        </a>
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
<script>
  var CONTENT_TYPE="VIDEO";
    $(document).ready(function() {
      dt={
        url : "{{ $dt_content['url']['get_credit_summary_client'] }}",
        div_credit_summary: "div_credit_summary",
        div_voucher_balance: "div_voucher_balance",
      }
      getWalletBalance(dt);
      listVideo({ url : "{{ config('urls.base.api') }}/api/libvid/list", div_id: "div_latest_video",max:4});
      listVideo({ url : "{{ config('urls.base.api') }}/api/libvid/list", div_id: "div_most_video",max:3});
      listVideo({ url : "{{ config('urls.base.api') }}/api/libvid/list", div_id: "div_top_video",max:4});

    });

  function setContentType(type){
//    CONTENT_TYPE=type;
      listLatestVideo();
  }  


</script>
@endsection
