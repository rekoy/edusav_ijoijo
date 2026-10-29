 @extends('in-layout.in-layout-access')
@section('content')
<section class="bg-white py-6 md:py-10">
<!--  
  <div class="container mx-auto max-w-7xl px-4 text-center">
    <p class="md:text-4xl text-xl text-black font-bold">{{ $dt_content['title']}}</p>
    <div class="max-w-3xl flex md:flex-row flex-col py-6 mx-auto items-start">
      <div class="fresh-datatables" id="div_datatables">
        <table class="table table-striped table-no-bordered table-hover w-full">
          <thead>
            <tr>
              <th>No</th>
              <th>User ID</th>
              <th>Name</th>
              <th>Type</th>
              <th>Date</th>
              <th>Content</th>
              <th>Voucher</th>
            </tr>
          </thead>
          <tbody>
            @foreach($dt_content['dt_row'] as $row)
                           <tr>
                <td align="right">{{ $loop->iteration}}</td>
                <td align="left">{{ $row['cl_userid'] }}</td>
                <td align="left">{{ $row['cl_name'] }}</td>
                <td align="center">{{ $row['ccr_fecha'] }}</td>
                <td align="center">{{ $row['ccr_type'] }}</td>
                <td align="right">{{ number_format($row['ccr_videos']) }}</td>
                <td align="right">{{ number_format($row['ccr_vouchers']) }}</td>
            </tr>
            @endforeach;
          </tbody>
        </table>
      </div>
    </div>
  </div>
-->
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


          <div class="w-full">
            <p class="lg:text-4xl md:text-2xl text-xl text-green-700 font-bold">
              <span class="material-icons-outlined text-green-700 md:text-4xl text-xl leading-none">photo_camera</span>
              {{ $dt_content['title']}}
            <div class="grid grid-cols-1  lg:gap-8 gap-4 mt-6">
              <div class="w-full flex md:flex-row flex-col py-6 items-start justify-start">
                <div class="overflow-x-auto w-full" id="div_datatables">
                <table class="w-full border border-gray-300 text-sm">
                  <thead>
                    <tr class="bg-lime-600 text-white">
                      <th class="px-4 py-2 text-center w-1/12">No</th>
                      <th class="px-4 py-2 text-center w-2/12">Name</th>
                      <th class="px-4 py-2 text-center w-3/12">Transaction Date</th>
                      <th class="px-4 py-2 text-center w-2/12">Type</th>
                      <th class="px-4 py-2 text-center w-2/12">Content</th>
                      <th class="px-4 py-2 text-center w-2/12">voucher</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($dt_content['dt_row'] as $row)
                    <?php
                    ?>          
                    <tr class="bg-white">
                      <td class="px-4 py-2 border align-top">{{ $loop->iteration}}</td>
                      <td class="px-4 py-2 border align-top">{{ $row['cl_name'] }}</td>
                      <td class="px-4 py-2 border align-top">{{ $row['ccr_fecha'] }}</td>
                      <td class="px-4 py-2 border align-top">{{ $row['ccr_type'] }}</td>
                      <td class="px-4 py-2 border  align-top text-right">{{ number_format($row['ccr_videos']) }}</td>
                      <td class="px-4 py-2 border  align-top text-right">{{ number_format($row['ccr_vouchers']) }}</td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
          
              </div>
            </div>


              </div>
            </div>
          </div>
        </div>
      </div>

</section>
<script>
  </script>
@endsection 
