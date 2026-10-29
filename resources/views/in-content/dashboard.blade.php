 @extends('in-layout.in-layout-access')


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
@if (strlen($dt_content['dt_user']['cl_link'])>5)
              <img width="200" src="{{ $dt_content['dt_user']['cl_link'] }}">
@else
              <span class="material-icons text-white lg:text-[150px] text-[100px]">
              account_circle
              </span>
@endif               
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

<script>
    $(document).ready(function() {
      dt={
        url : "{{ $dt_content['url']['get_credit_summary_client'] }}",
        div_credit_summary: "div_credit_summary",
        div_voucher_balance: "div_voucher_balance",
      }
      getWalletBalance(dt);

      //			getWalletBalance();
      listLatestVoucher();
      listVideo({ url : "{{ config('urls.base.api') }}/api/libvid/list", div_id: "div_latest_video",max:4});

//      listLatestVideo();
  // Tutup modal saat klik tombol close
  $('.close').click(function() {
    $('#myModal').fadeOut();
  });

  // Tutup modal saat klik area luar modal
  $(window).click(function(e) {
    if ($(e.target).is('#myModal')) {
      $('#myModal').fadeOut();
    }
  });
    });

  function topupWallet(div_id="div_my_modal"){
    $('#myModal').fadeIn();
    var prevTxt=document.getElementById(div_id).textContent;
    document.getElementById(div_id).innerHTML=loading();
    var txt="";

    txt +="    <section class=\"bg-white py-6 md:py-10\">";
    txt +="      <div class=\"container mx-auto max-w-7xl px-4 text-center\">";
    txt +="        <p class=\"md:text-4xl text-xl text-black font-bold\">Topup Wallet</p>";
    txt +="        <div class=\"max-w-3xl flex md:flex-row flex-col py-6 mx-auto items-start\">";
    txt +="          <form class=\"w-full space-y-6\">";
    txt +="            <div class=\"grid md:grid-cols-2 grid-cols-1 gap-6\">";
    txt +="              <input type=\"number\" placeholder=\"amount\"";
    txt +="                class=\"text-sm rounded-md w-full py-3 px-3 border bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-gray-200\" />";
    txt +="            </div>";
    txt +="            <div class=\"flex flex-row gap-2\">";
    txt +="              <input type=\"checkbox\" value=\"true\" checked />";
    txt +="              <label>Agree with <span class=\"font-bold underline cursor-pointer\">Terms & Conditions</span></label>";
    txt +="            </div>";
    txt +="            <button onclick=\"doTopupWallet();\"";
    txt +="              class=\"w-full bg-omarcogreen hover:bg-green-600 text-white font-semibold p-3 rounded-md transition-colors duration-200 flex items-center justify-center\">Topup";
    txt +="            </button>";
    txt +="           </form> ";
    txt +="";
    txt +="        </div>";
    txt +="      </div>";
    txt +="    </section>";
    
    document.getElementById(div_id).innerHTML=txt;
  }
  function doTopupWallet(div_id="div_my_modal"){
    $('#myModal').fadeOut();
  }
    function inputKodeRetailWallet(div_id="div_my_modal"){
    $('#myModal').fadeIn();
    var prevTxt=document.getElementById(div_id).textContent;
    document.getElementById(div_id).innerHTML=loading();
    var txt="";

    txt +="    <section class=\"bg-white py-6 md:py-10\">";
    txt +="      <div class=\"container mx-auto max-w-7xl px-4 text-center\">";
    txt +="        <p class=\"md:text-4xl text-xl text-black font-bold\">Input Retail Code</p>";
    txt +="        <div class=\"max-w-3xl flex md:flex-row flex-col py-6 mx-auto items-start\">";
    txt +="          <form class=\"w-full space-y-6\">";
    txt +="            <div class=\"grid md:grid-cols-2 grid-cols-1 gap-6\">";
    txt +="              <input type=\"text\" placeholder=\"input kode\"";
    txt +="                class=\"text-sm rounded-md w-full py-3 px-3 border bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-gray-200\" />";
    txt +="            </div>";
    txt +="            <div class=\"flex flex-row gap-2\">";
    txt +="              <input type=\"checkbox\" value=\"true\" checked />";
    txt +="              <label>Agree with <span class=\"font-bold underline cursor-pointer\">Terms & Conditions</span></label>";
    txt +="            </div>";
    txt +="            <button onclick=\"doInputKodeRetailWallet();\"";
    txt +="              class=\"w-full bg-omarcogreen hover:bg-green-600 text-white font-semibold p-3 rounded-md transition-colors duration-200 flex items-center justify-center\">Submit";
    txt +="            </button>";
    txt +="           </form> ";
    txt +="";
    txt +="        </div>";
    txt +="      </div>";
    txt +="    </section>";
    
    document.getElementById(div_id).innerHTML=txt;
  }

  function doInputKodeRetailWallet(div_id="div_my_modal"){
    $('#myModal').fadeOut();

  }
  

  function listLatestVideo(div_id="div_latest_video"){
    var prevTxt=document.getElementById(div_id).textContent;
    document.getElementById(div_id).innerHTML=loading();
    var txt="";
    var json_dt = {
      'num' : 4,
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
            txt +=""+dt.lvd_type;
            txt +="<br>Category:"+dt.lvd_clase;
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


  function listLatestVoucher(div_id="div_latest_voucher"){
    var prevTxt=document.getElementById(div_id).textContent;
    document.getElementById(div_id).innerHTML=loading();
    var txt="";
    var json_dt = {
      'num' : 4,
    }
    var url ="{{ config('urls.base.api') }}/api/libvou/list";
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
            txt +="<img height=\"100%\" src=\""+dt.lvo_image+"\">";
            txt +="              </div>";
            txt +="              <div class=\"text-white p-4 text-left space-y-4\">";
            txt +="                <p class=\"text-lg line-clamp-2 text-ellipsis uppercase font-semibold\">";
            txt +=dt.lvo_prodname;
            txt +="<Br><span style=\"font-size:12px\">"+dt.sto_name+"</span> ";
            txt +="</p>";
            txt +="                <p class=\"line-clamp-3 text-ellipsis\">";
//            txt +="Category:"+dt.lvo_idproduct;
            txt +="<br>Unit:"+dt.lvo_cost;
            txt +="</p>";
            txt +="              </div>";
            txt +="              <button  onclick=\"getCoupon('"+dt.lvo_idproduct+"','"+k+"');\"  class=\"uppercase text-white p-6 font-bold hover:underline hover:text-neutral-300\">";
            txt +="                Get Coupon";
            txt +="              </button>";
            txt +="            </div>";
            txt +=" <div id=\"div_loading_listCoupon_"+k+"\" style=\"display:none\"></div>";
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


  
function listTrxCredit(div_id="div_my_modal",credit_type=""){
    var prevTxt=document.getElementById(div_id).textContent;
    document.getElementById(div_id).innerHTML=loading();
    var txt="";
    var json_dt = {
    }
    var url ="{{ $dt_content['url']['wallet_list_trx'] }}";
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
        txt +="    <section class=\"bg-white py-6 md:py-10\">";
        txt +="      <div class=\"container mx-auto max-w-7xl px-4 text-center\">";
        txt +="        <p class=\"md:text-4xl text-xl text-black font-bold\">Wallet Transaction</p>";
        txt +="        <div class=\"max-w-3xl flex md:flex-row flex-col py-6 mx-auto items-start\">";
        if (resp.rc=="000"){
          txt +="                  <div class=\"fresh-datatables\" id=\"div_datatables\" >";
          txt +="                    <table id=\"datatables\" class=\"table table-striped table-no-bordered table-hover\" cellspacing=\"0\" width=\"100%\" style=\"width:100%\">";
          txt +="                        <thead>";
          txt +="                            <tr>";
          txt +="                                <th>No</th>";
          txt +="                                <th>User ID</th>";
          txt +="                                <th>Nama</th>";
          txt +="                                <th>Tanggal</th>";
          txt +="                                <th>Tipe</th>";
          txt +="                                <th>Amount</th>";
          txt +="                                <th>Balance</th>";
          txt +="                            </tr>";
          txt +="                        </thead>";
          txt +="                        <tbody>";
          no=0;
          for(k=0;k<resp.data.row.length;k++){
            no++;
            dt=resp.data.row[k];
            txt +="                           <tr>";
            txt +="                                <td align=\"right\">"+no+"</td>";
            txt +="                                <td align=\"left\">"+dt.cl_userid+"</td>";
            txt +="                                <td align=\"left\">"+dt.cl_name+"</td>";
            txt +="                                <td align=\"center\">"+dt.clw_date+"</td>";
            txt +="                                <td align=\"center\">"+dt.clw_type+"</td>";
            txt +="                                <td align=\"right\">"+formatWithDecimal.format(dt.clw_amount)+"</td>";
            txt +="                                <td align=\"right\">"+formatWithDecimal.format(dt.clw_balance)+"</td>";
            txt +="                            </tr>";
          }
          txt +="                        </tbody>";
          txt +="                    </table>";
          txt +="";
          txt +="                  </div>";
          txt +="        </div>";
          txt +="      </div>";
          txt +="    </section>";

          document.getElementById(div_id).innerHTML=txt;
        }else{
          document.getElementById(div_id).innerHTML=prevTxt;
        }
      },
        error: function(jqXHR,error, errorThrown) {
//  //        alert("RRP"+jqXHR.responseText+" -- "+error);
          document.getElementById(div_id).innerHTML=prevTxt;
        }
      });
	}


  function listTrxWallet(div_id="div_my_modal"){
    $('#myModal').fadeIn();
    var prevTxt=document.getElementById(div_id).textContent;
    document.getElementById(div_id).innerHTML=loading();
    var txt="";
    var json_dt = {
    }
    var url ="{{ $dt_content['url']['wallet_list_trx'] }}";
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
        txt +="    <section class=\"bg-white py-6 md:py-10\">";
        txt +="      <div class=\"container mx-auto max-w-7xl px-4 text-center\">";
        txt +="        <p class=\"md:text-4xl text-xl text-black font-bold\">Wallet Transaction</p>";
        txt +="        <div class=\"max-w-3xl flex md:flex-row flex-col py-6 mx-auto items-start\">";
        if (resp.rc=="000"){
          txt +="                  <div class=\"fresh-datatables\" id=\"div_datatables\" >";
          txt +="                    <table id=\"datatables\" class=\"table table-striped table-no-bordered table-hover\" cellspacing=\"0\" width=\"100%\" style=\"width:100%\">";
          txt +="                        <thead>";
          txt +="                            <tr>";
          txt +="                                <th>No</th>";
          txt +="                                <th>User ID</th>";
          txt +="                                <th>Nama</th>";
          txt +="                                <th>Tanggal</th>";
          txt +="                                <th>Tipe</th>";
          txt +="                                <th>Amount</th>";
          txt +="                                <th>Balance</th>";
          txt +="                            </tr>";
          txt +="                        </thead>";
          txt +="                        <tbody>";
          no=0;
          for(k=0;k<resp.data.row.length;k++){
            no++;
            dt=resp.data.row[k];
            txt +="                           <tr>";
            txt +="                                <td align=\"right\">"+no+"</td>";
            txt +="                                <td align=\"left\">"+dt.cl_userid+"</td>";
            txt +="                                <td align=\"left\">"+dt.cl_name+"</td>";
            txt +="                                <td align=\"center\">"+dt.clw_date+"</td>";
            txt +="                                <td align=\"center\">"+dt.clw_type+"</td>";
            txt +="                                <td align=\"right\">"+formatWithDecimal.format(dt.clw_amount)+"</td>";
            txt +="                                <td align=\"right\">"+formatWithDecimal.format(dt.clw_balance)+"</td>";
            txt +="                            </tr>";
          }
          txt +="                        </tbody>";
          txt +="                    </table>";
          txt +="";
          txt +="                  </div>";
          txt +="        </div>";
          txt +="      </div>";
          txt +="    </section>";

          document.getElementById(div_id).innerHTML=txt;
        }else{
          document.getElementById(div_id).innerHTML=prevTxt;
        }
      },
        error: function(jqXHR,error, errorThrown) {
  //        alert("RRP"+jqXHR.responseText+" -- "+error);
          document.getElementById(div_id).innerHTML=prevTxt;
        }
      });
	}

  function listTrxVoucher(div_id="div_my_modal"){
    $('#myModal').fadeIn();
    var prevTxt=document.getElementById(div_id).textContent;
    document.getElementById(div_id).innerHTML=loading();
    var txt="";
    var json_dt = {
    }
    var url ="{{ config('urls.base.api') }}/api/credit/list";
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
        txt +="    <section class=\"bg-white py-6 md:py-10\">";
        txt +="      <div class=\"container mx-auto max-w-7xl px-4 text-center\">";
        txt +="        <p class=\"md:text-4xl text-xl text-black font-bold\">Voucher Anda</p>";
        txt +="        <div class=\"max-w-3xl flex md:flex-row flex-col py-6 mx-auto items-start\">";
        if (resp.rc=="000"){
          txt +="                  <div class=\"fresh-datatables\" id=\"div_datatables\" >";
          txt +="                    <table id=\"datatables\" class=\"table table-striped table-no-bordered table-hover\" cellspacing=\"0\" width=\"100%\" style=\"width:100%\">";
          txt +="                        <thead>";
          txt +="                            <tr>";
          txt +="                                <th>No</th>";
          txt +="                                <th>User ID</th>";
          txt +="                                <th>Nama</th>";
          txt +="                                <th>Beli Unit</th>";
          txt +="                                <th>Konten<br>yg digunakan</th>";
          txt +="                                <th>Saldo Konten</th>";
          txt +="                                <th>Voucher Bonus<br>Yg Digunakan</th>";
          txt +="                                <th>Saldo Voucher</th>";
          txt +="                            </tr>";
          txt +="                        </thead>";
          txt +="                        <tbody>";
          no=0;
          for(k=0;k<resp.data.row.length;k++){
            no++;
            dt=resp.data.row[k];
            txt +="                           <tr>";
            txt +="                                <td align=\"right\">"+no+"</td>";
            txt +="                                <td align=\"left\">"+dt.cl_userid+"</td>";
            txt +="                                <td align=\"left\">"+dt.cl_name+"</td>";
            txt +="                                <td align=\"right\">"+formatWithDecimal.format(dt.cantcredits)+"</td>";
            txt +="                                <td align=\"right\">"+formatWithDecimal.format(dt.cantvidused)+"</td>";
            txt +="                                <td align=\"right\">"+formatWithDecimal.format(dt.balanvideos)+"</td>";
            txt +="                                <td align=\"right\">"+formatWithDecimal.format(dt.cantvouused)+"</td>";
            txt +="                                <td align=\"right\">"+formatWithDecimal.format(dt.balanvouchers)+"</td>";
            txt +="                            </tr>";
          }
          txt +="                        </tbody>";
          txt +="                    </table>";
          txt +="";
          txt +="                  </div>";
          txt +="        </div>";
          txt +="      </div>";
          txt +="    </section>";

          document.getElementById(div_id).innerHTML=txt;
        }else{
          document.getElementById(div_id).innerHTML=prevTxt;
        }
      },
        error: function(jqXHR,error, errorThrown) {
  //        alert("RRP"+jqXHR.responseText+" -- "+error);
          document.getElementById(div_id).innerHTML=prevTxt;
        }
      });
	}

  function availableVoucher(div_id="div_my_modal"){
    $('#myModal').fadeIn();
    var prevTxt=document.getElementById(div_id).textContent;
    document.getElementById(div_id).innerHTML=loading();
    var txt="";

    txt +="    <section class=\"bg-white py-6 md:py-10\">";
    txt +="      <div class=\"container mx-auto max-w-7xl px-4 text-center\">";
    txt +="        <p class=\"md:text-4xl text-xl text-black font-bold\">Topup Wallet</p>";
    txt +="        <div class=\"max-w-3xl flex md:flex-row flex-col py-6 mx-auto items-start\">";
    txt +="          <form class=\"w-full space-y-6\">";
    txt +="            <div class=\"grid md:grid-cols-2 grid-cols-1 gap-6\">";
    txt +="              <input type=\"number\" placeholder=\"amount\"";
    txt +="                class=\"text-sm rounded-md w-full py-3 px-3 border bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-gray-200\" />";
    txt +="            </div>";
    txt +="            <div class=\"flex flex-row gap-2\">";
    txt +="              <input type=\"checkbox\" value=\"true\" checked />";
    txt +="              <label>Agree with <span class=\"font-bold underline cursor-pointer\">Terms & Conditions</span></label>";
    txt +="            </div>";
    txt +="            <button onclick=\"doBuyUnit();\"";
    txt +="              class=\"w-full bg-omarcogreen hover:bg-green-600 text-white font-semibold p-3 rounded-md transition-colors duration-200 flex items-center justify-center\">Topup";
    txt +="            </button>";
    txt +="           </form> ";
    txt +="";
    txt +="        </div>";
    txt +="      </div>";
    txt +="    </section>";
    
    document.getElementById(div_id).innerHTML=txt;
  }

  function doPilihVoucher(div_id="div_my_modal"){
    $('#myModal').fadeOut();

  }

localStorage.setItem('ACCESS_TOKEN', "{{ $dt_content['access_token'] }}");
</script>

  @endsection

