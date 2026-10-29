@extends('in-layout.in-layout-access')


@section('additional-css')
    <style>
    </style>
@endsection


@section('content')
<section class="bg-white py-6 md:py-10">
  <div class="container mx-auto max-w-7xl px-4 flex flex-col lg:flex-row gap-6">

    <!-- === LEFT: Video Player === -->
    <div class="flex-1 flex flex-col items-start">

@if(strtoupper($dt_content['data']["cvi_type"]) == "VIDEO")
  <div class="w-full aspect-video">
    <video
      id="vid"
      class="w-full object-contain rounded-xl shadow-lg"
      controls
      preload="metadata"
    >
      <source src="{{ $dt_content['url'] }}" type="video/mp4">
  Your browser does not support the video tag.
    </video>
  </div>

<script>
const video = document.getElementById('vid');
video.addEventListener('error', e => {
    const error = video.error;
    if (error) {
        console.log('Video error:', error.code, error.message);
    }
});
</script>

@elseif(strtoupper($dt_content['data']["cvi_type"]) == "AUDIO")

  <video  id="vid" class="w-full max-w-5xl h-auto" controls  preload="metadata">
        <source src="{{ $dt_content['url'] }}" type="video/mp4">
    Your browser does not support the video tag.
</video>

@else
<!--
  <script>

    const url = "{{ $dt_content['url'] }}"; // URL kamu
    window.location=url;

  </script>
-->
  <div id="viewer" style="width:100%; height:800px; overflow:auto; background:#eee;"></div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
  <script>
    pdfjsLib.GlobalWorkerOptions.workerSrc =
      "https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js";
  </script>
<script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>

 <script>
  const url = '{{ $dt_content['url'] }}';

    const loadingTask = pdfjsLib.getDocument(url);
    loadingTask.promise.then(pdf => {
      console.log('Total halaman: ' + pdf.numPages);

      // render semua halaman PDF ke canvas
      for (let pageNum = 1; pageNum <= pdf.numPages; pageNum++) {
        pdf.getPage(pageNum).then(page => {
          const scale = 1.2;
          const viewport = page.getViewport({ scale });

          const canvas = document.createElement('canvas');
          const context = canvas.getContext('2d');
          canvas.height = viewport.height;
          canvas.width = viewport.width;
          canvas.style.display = 'block';
          canvas.style.margin = '10px auto';
          document.getElementById('viewer').appendChild(canvas);

          page.render({ canvasContext: context, viewport });
        });
      }
    });
  </script>


@endif
  <!-- Judul -->
 <!-- Deskripsi -->
  <div class="mt-4 text-left px-4">
    <h1 class="text-xl font-bold mb-1">
      {{ $dt_content['data']["cvi_titulo"] }}
    </h1>
    <p class="text-sm text-gray-500">{{ $dt_content['data']["cvi_type"] }}</p>
    <p class="text-sm text-gray-500">{{ $dt_content['data']["cvi_clase"] }}</p>
  </div>
    
	</div>

    <!-- === RIGHT: Other Contents (scrollable) === -->
    <div class="w-full lg:w-[40%] flex flex-col border border-gray-200 rounded-xl shadow-inner">

      <!-- Fixed search/filter area -->
      <div class="p-4 border-b sticky top-0 bg-white z-10">
        <p class="flex items-center gap-2 md:text-2xl text-lg text-green-700 font-bold mb-3">
          <span class="material-icons-outlined text-green-700 md:text-3xl text-lg leading-none">photo_camera</span>
          Other Contents
        </p>

        <div class="flex gap-2">
          <select
            id="lvd_type"
            onchange="listLatestVideo();"
            class="border border-gray-300 rounded-lg px-2 py-1 flex-1 focus:outline-none focus:ring-2 focus:ring-teal-500"
          >
            <option value="VIDEO">Video</option>
            <option value="ARTICLE">Article</option>
            <option value="EBOOK">Ebook</option>
            <option value="AUDIO">Audio</option>
          </select>

          <input
            type="text"
            id="search_txt"
            onchange="listLatestVideo();"
            placeholder="search..."
            class="border border-gray-300 rounded-lg px-2 py-1 flex-1 focus:outline-none focus:ring-2 focus:ring-teal-500"
          />

          <button
            onclick="listLatestVideo();"
            class="border border-gray-300 rounded-lg px-3 py-1 focus:outline-none focus:ring-2 focus:ring-teal-500"
          >
            <span class="material-icons-outlined">search</span>
          </button>
        </div>
      </div>

      <!-- Scrollable content list -->
      <div
        id="div_latest_video"
        class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4 overflow-y-auto"
        style="max-height: calc(70vh - 90px);"
      >

        <div class="rounded-lg overflow-hidden shadow">
          <img src="/path/thumb.jpg" class="w-full h-32 object-cover" />
          <div class="bg-teal-500 text-white p-2 text-sm text-center font-semibold">
            SAMPLE TITLE
          </div>
        </div>

      </div>
    </div>

  </div>
</section>


<script>
    $(document).ready(function() {
     listVideo({ url : "{{ config('urls.base.api') }}/api/libvid/list", div_id: "div_latest_video",max:100000,ver:2});

    });

  function listLatestVideo(div_id="div_latest_video"){
     listVideo({ url : "{{ config('urls.base.api') }}/api/libvid/list", div_id: "div_latest_video",max:10000, ver:2});

  }

</script>

  @endsection

