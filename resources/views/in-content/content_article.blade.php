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
            {{ $dt_content['title']; }}
          </p>
        </div>

        <div class="py-6 md:py-10">
					<div>
<div>
	<select id="clase_id">
		<option >category 1</option>
    <option >category 1</option>
    <option >category 1</option>
    <option >category 1</option>
	</select>
	<input type="text" size=40>
	<button onclick="listLatestVideo();">           
		<span class="material-icons-outlined">search</span>
		search
	</button>
</div>
<br>

					</div>
          <div id="div_latest_video" class="grid grid-cols-1 lg:grid-cols-4 md:grid-cols-3 gap-4">
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
      listLatestVideo();
  // Tutup modal saat klik tombol close
    });


  function listLatestVideo(div_id="div_latest_video"){
    var prevTxt=document.getElementById(div_id).textContent;
    document.getElementById(div_id).innerHTML=loading();
    var txt="";
    var json_dt = {
    }
    var url ="{{ config('urls.base.api') }}/api/libvid/list";
    $.ajax({
      type: 'POST',
      url: url,
      headers: {
        "Authorization": "Bearer {{ $dt_content['access_token'] }}",
      },
      data: json_dt,
      success: function(resp)
      {
        txt="";
        if (resp.rc=="000"){
          no=0;
          for(k=0;k<resp.data.row.length;k++){
            no++;
            dt=resp.data.row[k];
txt +="            <div class=\"flex flex-col rounded-xl bg-teal-500\">";
txt +="              <div class=\"relative w-full h-[200px] bg-neutral-200 rounded-tl-xl rounded-tr-xl\">";
txt +="<img width=\"100%\" src=\"{{ config('urls.external.placeholder_image') }}\">";
txt +="              </div>";
txt +="              <div class=\"text-white p-4 text-left space-y-4\">";
txt +="                <p class=\"text-lg line-clamp-2 text-ellipsis uppercase font-semibold\">";
txt +=dt.lvd_title;
txt +="                <p class=\"line-clamp-3 text-ellipsis\">";
txt +="Category:"+dt.lvd_clase;
txt +="<br>Unit:"+dt.lvd_cost;
txt +="</p>";
txt +="              </div>";
txt +="              <button class=\"uppercase text-white p-6 font-bold hover:underline hover:text-neutral-300\">";
txt +="                read more";
txt +="              </button>";
txt +="            </div>";

          }

          document.getElementById(div_id).innerHTML=txt;
        }else{
          document.getElementById(div_id).innerHTML=prevTxt;
        }
      },
        error: function(jqXHR,error, errorThrown) {
          alert("RRP"+jqXHR.responseText+" -- "+error);
          document.getElementById(div_id).innerHTML=prevTxt;
        }
      });
	}

</script>

  @endsection

