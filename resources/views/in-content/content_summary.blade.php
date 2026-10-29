 @extends('in-layout.in-layout-access')


@section('additional-css')
    <style>


    </style>
@endsection


@section('content')
    <!-- Win Big Cash Section -->

<section class="bg-white py-6 md:py-10">
  <div class="container mx-auto max-w-7xl px-4 text-center">
    <a href="{{ route('registration') }}">
      <p class="md:text-5xl text-3xl text-green-700 font-bold">Type of Media</p>
    </a>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 py-10">

      <!-- Video -->
      <div class="flex items-center gap-4 rounded-2xl p-4 shadow-md bg-[#00B5FF] text-white">
        <div class="bg-white/20 p-3 rounded-xl">
          <span class="material-icons text-4xl">movie</span>
        </div>
        <div class="text-left">
          <a href="/content_video">
          <p class="text-lg font-semibold">Video</p>
          <p class="text-sm opacity-90">{{ $dt_content['summary']['content']['video'] }} items</p>
          </a>
        </div>
      </div>

      <!-- Ebook -->
      <div class="flex items-center gap-4 rounded-2xl p-4 shadow-md bg-[#FF8C00] text-white">
        <div class="bg-white/20 p-3 rounded-xl">
          <span class="material-icons text-4xl">menu_book</span>
        </div>
        <div class="text-left">
          <a href="/content_video">
          <p class="text-lg font-semibold">Ebook</p>
          <p class="text-sm opacity-90">{{ $dt_content['summary']['content']['ebook'] }} items</p>
          </a>
        </div>
      </div>

      <!-- Artikel -->
      <div class="flex items-center gap-4 rounded-2xl p-4 shadow-md bg-[#8A2BE2] text-white">
        <div class="bg-white/20 p-3 rounded-xl">
          <span class="material-icons text-4xl">description</span>
        </div>
        <div class="text-left">
          <a href="/content_video">
          <p class="text-lg font-semibold">Artikel</p>
          <p class="text-sm opacity-90">{{ $dt_content['summary']['content']['article'] }} items</p>
          </a>
        </div>
      </div>

      <!-- Audio -->
      <div class="flex items-center gap-4 rounded-2xl p-4 shadow-md bg-[#FF4B4B] text-white">
        <div class="bg-white/20 p-3 rounded-xl">
          <span class="material-icons text-4xl">music_note</span>
        </div>
        <div class="text-left">
					<a href="/content_video">
          <p class="text-lg font-semibold">Audio</p>
          <p class="text-sm opacity-90">{{ $dt_content['summary']['content']['audio'] }} items</p>
					</a>
        </div>
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

					@if (isset($dt_content['contents']))
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

<script>
    $(document).ready(function() {
//      listLatestVideo();
     listVideo({ url : "{{ config('urls.base.api') }}/api/libvid/list", div_id: "div_latest_video",max:100});

  // Tutup modal saat klik tombol close
    });

</script>

  @endsection

