@section('additional-css')
    <style>


    </style>
@endsection


@section('content')
    <section class="bg-white py-6 md:py-10">
      <div class="container mx-auto max-w-7xl px-4">
        <div class="flex md:flex-row flex-col md:gap-8 gap-4">


          <div class="w-full flex md:flex-row flex-col md:gap-8 gap-4">
            <div class="md:flex hidden lg:w-[150px] lg:h-[150px] h-[100px] w-[100px] rounded-full bg-green-600">
@if(isset($dt_content['contents']) && is_array($dt_content['contents']))
@if (strlen($dt_content['dt_user']['cl_link'])>5)
              <img width="200" src="{{ $dt_content['dt_user']['cl_link'] }}">
@else
              <span class="material-icons text-white lg:text-[150px] text-[100px]">
              account_circle
              </span>
@endif
@endif               
            </div>
            <div class="w-full">
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
        </div>
      </div>
    </section>

    <section class="bg-white py-6 md:py-10">
      <div class="container mx-auto max-w-7xl px-4">
        <div class="flex items-center justify-between">
          <p class="flex items-center gap-3 md:text-4xl text-xl text-green-700 font-bold">
            <span class="material-icons-outlined text-green-700 md:text-4xl text-xl leading-none">photo_camera</span>
            Latest Content
          </p>
          <p class="text-green-700 text-sm hover:underline cursor-pointer"><a href="{{ route('content-video')}}">Show more</a></p>
        </div>
        <div class="py-6 md:py-10">
          <div id="div_latest_video" class="grid grid-cols-1 lg:grid-cols-4 md:grid-cols-3 gap-4">
          </div>
        </div>
      </div>
    </section>

    <section class="bg-white py-6 md:py-10">
      <div class="container mx-auto max-w-7xl px-4">
        <div class="flex items-center justify-between md:mb-0 mb-4">
          <p class="flex items-center gap-3 md:text-4xl text-xl text-green-700 font-bold line-clamp-1 text-ellipsis">
            <span
              class="material-icons-outlined text-green-700 md:text-4xl text-xl leading-none">confirmation_number</span>
            Latest Voucher Discount
          </p>
          <p class="text-green-700 text-sm hover:underline cursor-pointer"><a href="{{ route('content-voucher')}}">Show more</a></p>
        </div>
        <div class="py-6 md:py-10">
          <div id="div_latest_voucher" class="grid grid-cols-1 lg:grid-cols-4 md:grid-cols-3 gap-4">
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

          @if(isset($dt_content['contents']) && is_array($dt_content['contents']))
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
          @endif

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
<div class="modal" id="myModal">
  <div class="modal-content">
    <span class="close">&times;</span>
		<div id="div_my_modal">
		</div>
  </div>
</div>

  @endsection

