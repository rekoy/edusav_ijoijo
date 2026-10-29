 @extends('in-layout.in-layout-access')


@section('additional-css')
    <style>


    </style>
@endsection


@section('content')
    <section class="bg-white py-6 md:py-10">
      <div class="container mx-auto max-w-7xl px-4">
        <div class="flex md:flex-row flex-col md:gap-8 gap-4">

          <div class="md:w-5/12 md:block hidden global-draw-bg text-center p-6 rounded-lg space-y-6">
            <h3 class="text-2xl md:text-4xl font-impact text-white">GLOBALDRAW</h3>
            <div class="relative w-full">
              <img src="/assets/images/global_draw.png"
                alt="Global Draw $10 Million prize graphic with a stylized globe and currency symbols"
                class="object-cover">
            </div>
            <div class="w-full items-center bg-omarcogrey text-white py-2 rounded-lg countdown">
              <div class="flex flex-col gap-2 items-center">
                <p class="text-lg uppercase text-green-600 font-bold text-left">Game Close In</p>
                <p class="text-base font-bold text-amber-600">
                  {{ $dt_content['counting']['hari'] ?? 0 }} <span class="text-sm text-green-600">DAYS</span>
                  {{ $dt_content['counting']['jam'] ?? 0 }} <span class="text-sm text-green-600">HOURS</span>
                  {{ $dt_content['counting']['menit'] ?? 0 }} <span class="text-sm text-green-600">MINS</span>
                </p>
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
              <ul class="list-disc list-outside space-y-2 text-sm md:text-base leading-relaxed ml-4">
                <li><strong>Purchase Omarco Units:</strong> Buy Omarco Units through your Omarco Edusav account.</li>
                <li><strong>Earn Draw Entries:</strong> Every purchase qualifies you for entries into the next scheduled
                  Global Drawing.</li>
                <li><strong>Win Exclusive Rewards:</strong> Selected winners will receive prizes such as cash rewards,
                  digital gadgets, travel experiences, or exclusive educational incentives.</li>
              </ul>
            </div>
          </div>

@if (array_key_exists('dt_draw',$dt_content)) {
@if ($dt_content['dt_draw']['draw_title']) {

          <div class="w-full">
            <p class="lg:text-4xl md:text-2xl text-xl text-green-700 font-bold">Drawing {{ $dt_content['dt_draw']['draw_title']}} 
              <br><label style="font-size:16px" id="lbl_user_name">{{ $dt_content['dt_draw']['draw_start_date']}} till {{ $dt_content['dt_draw']['draw_end_date']}}</label><!-- Halo User 00021213--></p>
            <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-8 gap-4 mt-6">
          
              @foreach($dt_content['dt_draw']['wcat'] as $row)
              <div>
                  <div class="rounded-md shadow-lg p-4">
                    <div class="flex items-center justify-between">
                      <p class="font-bold text-2xl">{{ number_format($row['wcat_amount']) }}<label style="font-size:14px"> (for {{ $row['wcat_max']}} winner)</label><br>
                      <label style="font-size:16px"><i>{{ $row['wcat_note']}}</i></p>

                      <!-- Wrapper icon dengan relative positioning -->
                      <a href="#">
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
                      <p class="text-2xl font-bold">
                      @foreach($dt_content['dt_draw']['winner'] as $row_b)
                        @if ($row_b['win_cat']==$row['wcat_category'])
                          <label style="font-size:14px">{{$row_b['win_number']}}</label><br>
                        @endif                        
                      @endforeach
                      </p>
                      <div class="rounded-full h-8 w-8 p-1 bg-white text-center">
                        <span class="material-icons-outlined text-neutral-500">priority_high</span>
                      </div>

                    </div>
                  </div>

                </div>
              @endforeach

              <!--                
                <div>
                  <div class="rounded-md shadow-lg p-4">
                    <div class="flex items-center justify-between">
                      <p class="font-bold text-2xl">Discount Coupon</p>
                      <a href="{{ route('coupon.my') }}">
                        <div  
                          class="relative rounded-full h-8 w-8 p-1 bg-gradient-to-br from-teal-500 to-green-500 text-center">
                          <span class="material-icons-outlined text-white">menu</span>

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
              -->
              </div>
            </div>


              </div>
            </div>
          </div>
        </div>
      </div>
@endif
@endif
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

  <script>
  var CONTENT_TYPE="VIDEO";
    $(document).ready(function() {

    });

  function setContentType(type){
//    CONTENT_TYPE=type;
      listLatestVideo();
  }  


</script>

@endsection
