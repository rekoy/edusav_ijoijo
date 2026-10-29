 @extends('in-layout.in-layout-access')


@section('additional-css')
    <style>


    </style>
@endsection


@section('content')



    <section class="bg-white py-6 md:py-10">
      <div class="container mx-auto max-w-7xl px-4">
        <div class="flex items-center justify-between">
          <p class="flex items-center gap-3 md:text-4xl text-xl text-green-700 font-bold">
            <span class="material-icons-outlined text-green-700 md:text-4xl text-xl leading-none">photo_camera</span>
            Available Discounts        </p>
          <p  class="text-green-700 text-sm hover:underline cursor-pointer">
            <a href="{{ route('coupon.my') }}">
              <button 
                    class="hover:opacity-90 font-bold bg-gradient-to-br from-teal-500 to-green-500 py-2 px-6 mt-4 text-white rounded-full shadow-lg flex ml-auto">
                    My Coupon
              </button>
            </a>                        
          </p>
        </div>
        <div class="py-6 md:py-10">
<div>
  <input type="text" id="search_txt" size=40 class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
  <button onclick="listSearchCoupon();" class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
    <span class="material-icons-outlined">search</span>
    search
  </button>
</div>
<br>
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
<div class="modal" id="myModal">
  <div class="modal-content">
    <span class="close">&times;</span>
		<div id="div_my_modal">
		</div>
  </div>
</div>

<script>
    $(document).ready(function() {
      data = {
        div_id : "div_latest_voucher",
        url : "{{ config('urls.base.api') }}/api/libvou/list",
        max  : 100,
      }
      listCoupon(data);
  // Tutup modal saat klik tombol close
    });


  function listSearchCoupon(div_id=""){
      data = {
        div_id : "div_latest_voucher",
        url : "{{ config('urls.base.api') }}/api/libvou/list",
        max  : 100,
      }
      listCoupon(data);

  }

</script>

  @endsection

