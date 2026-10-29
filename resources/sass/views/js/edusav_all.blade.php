var DT_DATA={};
var BASE_URL = "{{ config('urls.base.web') }}";
var LOGIN_DT = JSON.parse(localStorage.getItem("LOGIN_DT"));


function getWalletBalance(data){
    var access_token="{{ $dt_content['access_token']}}";
    var div_id=data.div_credit_summary;
    var div_id2=data.div_voucher_balance;

    var prevTxt=document.getElementById(div_id).textContent;
    document.getElementById(div_id).innerHTML=loading();
		var prevTxt2=document.getElementById(div_id2).textContent;
    document.getElementById(div_id2).innerHTML=loading();
    var txt="";
    var txt2="";
		var json_dt = {
		}
    var url = data.url;
    $.ajax({
      type: 'POST',
      url: url,
      headers: {
        "Authorization": "Bearer "+access_token,
      },
      data: json_dt,
      success: function(resp)
      {
				if (resp.rc=="000"){
//					txt += "Rp "+formatWithDecimal.format(resp.data);
					txt += "available : ";
					txt += ""+resp.data['video_balance'];
          txt += ", used : ";
					txt += ""+resp.data['video_used'];
          document.getElementById(div_id).innerHTML=txt;
					txt2 += "available : ";
					txt2 += ""+resp.data['voucher_balance'];
          txt2 += ", used : ";
					txt2 += ""+resp.data['voucher_used'];
          document.getElementById(div_id2).innerHTML=txt2;

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

  function listVideo(data){
    var div_id1=data.div_id;
    var access_token="{{ $dt_content['access_token']}}";
    var max = data.max;

    var prevTxt1=document.getElementById(div_id1).textContent;
    document.getElementById(div_id1).innerHTML=loading();
    var txt1="";

    var json_dt = {
      'num' : max,
    }
    var url=data.url;
    $.ajax({
      type: 'POST',
      url: url,
      headers: {
        "Authorization": "Bearer "+access_token,
      },
      data: json_dt,
      success: function(resp)
      {
        txt="";
        txt2="";
        if (resp.rc=="000"){
          no=0;
          for(k=0;k<resp.data.row.length;k++){
            no++;
            dt=resp.data.row[k];
            txt +="     <div id=\""+div_id1+"_data_"+k+"\">";            
            txt +="            <div class=\"flex flex-col rounded-xl bg-teal-500\">";
            txt +="              <div class=\"relative w-full h-[200px] bg-neutral-200 rounded-tl-xl rounded-tr-xl\">";
            txt +="<img width=\"100%\" src=\""+dt.lvd_image+"\">";
            txt +="              </div>";
            txt +="              <div class=\"text-white p-4 text-left space-y-4\">";
            txt +="                <p class=\"text-lg line-clamp-2 text-ellipsis uppercase font-semibold\">";
            txt +=dt.lvd_title;
            txt +="                <p class=\"line-clamp-3 text-ellipsis\">";
//            txt +="Category:"+dt.lvd_clase;
            txt +="<br>Unit:"+dt.lvd_cost;
            txt +="</p>";
            txt +="              </div>";
            txt +="              <button onclick=\"accessVideo('"+dt.lvd_id+"','"+div_id1+"','"+k+"')\" class=\"uppercase text-white p-6 font-bold hover:underline hover:text-neutral-300\">";
            txt +="                See Content";
            txt +="              </button></a>";
            txt +="            </div>";
            txt +="     </div>";
            txt +=" <div id=\""+div_id1+"_loading_"+k+"\" style=\"display:none\"></div>";
            if (k==max-1){
              break;
            }
          }

          document.getElementById(div_id1).innerHTML=txt;
        }else{
          document.getElementById(div_id1).innerHTML=prevTxt1;
        }
      },
        error: function(jqXHR,error, errorThrown) {
  //        alert("RRP"+jqXHR.responseText+" -- "+error);
          document.getElementById(div_id1).innerHTML=prevTxt1;
        }
      });
}


  function accessVideo(idcontent,div_id,k){
    $("#"+div_id+"_data_"+k).hide();
    $("#"+div_id+"_loading_"+k).show();
    document.getElementById(div_id+"_loading_"+k).innerHTML=loading();

    var access_token="{{ $dt_content['access_token']}}";

    var json_dt = {
      'idcontent' : idcontent,
    }
    var url = LOGIN_DT.config.API_URL_GET_CONTENT;
    $.ajax({
      type: 'POST',
      url: url,
      headers: {
        "Authorization": "Bearer "+access_token,
      },
      data: json_dt,
      success: function(resp)
      {
        txt="";
        if (resp.rc=="000"){
          no=0;
//          alert(resp.message);
            content_key = resp.data.clv_key;
            //window.open('https://www.example.com', '_blank');
//        window.open(LOGIN_DT.config.WEB_URL_VIDEO_ACCESS + "/"+content_key);
        window.location.replace(LOGIN_DT.config.WEB_URL_VIDEO_ACCESS + "/"+content_key);
        }else{
          alert(resp.message);
        }
        $("#"+div_id+"_data_"+k).show();
        $("#"+div_id+"_loading_"+k).hide();
      },
        error: function(jqXHR,error, errorThrown) {
//          alert("RRP"+jqXHR.responseText+" -- "+error);
          alert('something wrong. please try again');
        $("#"+div_id+"_data_"+k).show();
        $("#"+div_id+"_loading_"+k).hide();
        }
      });
      }


  function listMyContent(data){
    var div_id1=data.div_id;
    var access_token="{{ $dt_content['access_token']}}";
    var max = data.max;

    var prevTxt1=document.getElementById(div_id1).textContent;
    document.getElementById(div_id1).innerHTML=loading();
    var txt1="";

    var json_dt = {
      'num' : max,
    }
    var url=data.url;
    $.ajax({
      type: 'POST',
      url: url,
      headers: {
        "Authorization": "Bearer "+access_token,
      },
      data: json_dt,
      success: function(resp)
      {
        txt="";
        txt2="";
        if (resp.rc=="000"){
          no=0;
          for(k=0;k<resp.data.row.length;k++){
            no++;
            dt=resp.data.row[k];
            txt += "            <div class=\"flex flex-col rounded-xl bg-teal-500\">";
            txt += "              <div class=\"relative w-full h-[200px] bg-neutral-200 rounded-tl-xl rounded-tr-xl\">";
            txt +="<img width=\"100%\" src=\""+dt.lvd_image+"\">";
            txt += "              </div>";
            txt += "              <div class=\"text-white p-4 text-left space-y-4\">";
            txt += "                <p class=\"text-lg line-clamp-2 text-ellipsis uppercase font-semibold\">";
            txt +=dt.lvd_title;
            txt += "                 </p>";
            txt += "                <p class=\"line-clamp-3 text-ellipsis\">";
            txt +=dt.lvd_title;
            txt += "                </p>";
            txt += "              </div>";
            txt += "              <a href=\""+LOGIN_DT.config.WEB_URL_VIDEO_ACCESS + "/"+dt.clv_key+"\" target=\"_blank\"><button class=\"uppercase text-white p-6 font-bold hover:underline hover:text-neutral-300\">";
            txt += "                See Again";
            txt += "              </button></a>";
            txt += "            </div>";


            if (k==max-1){
              break;
            }
          }

          document.getElementById(div_id1).innerHTML=txt;
        }else{
          document.getElementById(div_id1).innerHTML=prevTxt1;
        }
      },
        error: function(jqXHR,error, errorThrown) {
  //        alert("RRP"+jqXHR.responseText+" -- "+error);
          document.getElementById(div_id1).innerHTML=prevTxt1;
        }
      });
}

  function listCoupon(data){
    var div_id = data.div_id;
    var access_token=LOGIN_DT.access_token;//LOGIN_DT.access_token;;
    var max = data.max;
    var prevTxt=document.getElementById(div_id).textContent;
    document.getElementById(div_id).innerHTML=loading();
    var txt="";
    var json_dt = {
    }
    var url = data.url;
    $.ajax({
      type: 'POST',
      url: url,
      headers: {
        "Authorization": "Bearer "+access_token,
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

console.log(JSON.stringify(dt));
            txt +="     <div id=\"div_data_listCoupon_"+k+"\">";
            txt +="            <div class=\"flex flex-col rounded-xl bg-teal-500\">";
            txt +="             <a href=\""+dt.sto_adre+"\" target=\"_blank\">";
            txt +="              <div class=\"relative w-full h-[200px] bg-neutral-200 rounded-tl-xl rounded-tr-xl\">";
            txt +="<img height=\"100%\" src=\""+dt.lvo_image+"\">";
            txt +="              </div>";
            txt +="              <div class=\"text-white p-4 text-left space-y-4\">";
            txt +="                <p class=\"text-lg line-clamp-2 text-ellipsis uppercase font-semibold\">";
            txt +=dt.lvo_prodname;
            txt +="</p>";
            txt +="                <p class=\"line-clamp-3 text-ellipsis\">";
            txt +="<b>"+dt.sto_name+"</b> ";
            txt +="<br>until "+dt.lvo_limitdate;
//            txt +="<br>Unit:"+dt.lvo_cost;
            txt +="</p>";
            txt +="              </div>";
            txt +="              </a>";
            txt +="              <button onclick=\"getCoupon('"+dt.lvo_idproduct+"','"+k+"');\" class=\"uppercase text-white p-6 font-bold hover:underline hover:text-neutral-300\">";
            txt +="                Get Coupon";
            txt +="              </button>";
            txt +="            </div>";
            txt +="     </div>";
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

  function listMyCoupon(data){
    var div_id = data.div_id;
    var access_token="{{ $dt_content['access_token']}}";
    var max = data.max;

    var prevTxt=document.getElementById(div_id).textContent;
    document.getElementById(div_id).innerHTML=loading();
    var txt="";
    var json_dt = {
    }
    var url = data.url;
    $.ajax({
      type: 'POST',
      url: url,
      headers: {
        "Authorization": "Bearer "+access_token,
      },
      data: json_dt,
      success: function(resp)
      {
        txt="";
console.log("resp:"+JSON.stringify(resp));
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
            txt +="<Br><span style=\"font-size:12px\">Toko 1</span> ";
            txt +="</p>";
            txt +="                <p class=\"line-clamp-3 text-ellipsis\">";
//            txt +="Category:"+dt.lvo_idproduct;
            txt +="<br>Unit:"+dt.lvo_cost;
            txt +="</p>";
            txt +="              </div>";
            txt +="<img height=\"100%\" src=\""+BASE_URL+"/assets/edusav/barcodes/"+dt.clv_barcode+".png\">";
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

  function getCoupon(idproduct,k){
    $("#div_data_listCoupon_"+k).hide();
    $("#div_loading_listCoupon_"+k).show();
    document.getElementById('div_loading_listCoupon_'+k).innerHTML=loading();

    var access_token="{{ $dt_content['access_token']}}";
    var max = data.max;

    var json_dt = {
      'idproduct' : idproduct,
    }
    var url = LOGIN_DT.config.API_URL_GET_COUPON;
    $.ajax({
      type: 'POST',
      url: url,
      headers: {
        "Authorization": "Bearer "+access_token,
      },
      data: json_dt,
      success: function(resp)
      {
        txt="";
        if (resp.rc=="000"){
          no=0;
          alert(resp.message);
        window.location.replace(BASE_URL + "/coupon/my");
        }else{
          alert(resp.message);
        }
        $("#div_data_listCoupon_"+k).show();
        $("#div_loading_listCoupon_"+k).hide();
      },
        error: function(jqXHR,error, errorThrown) {
//          alert("RRP"+jqXHR.responseText+" -- "+error);
          alert('something wrong. please try again');
        $("#div_data_listCoupon_"+k).show();
        $("#div_loading_listCoupon_"+k).hide();
        }
      });
	}


