// Simpan fungsi asli
const originalSetItem = localStorage.setItem;

localStorage.setItem = function(key, value) {
  // Panggil fungsi aslinya
  originalSetItem.apply(this, arguments);

  // Trigger event custom di window
  window.dispatchEvent(new CustomEvent("localstorage-changed", {
    detail: { key, value }
  }));
};

// Listener untuk menangkap perubahan
window.addEventListener("localstorage-changed", function(e) {
  console.log("LocalStorage berubah:", e.detail.key, "=", e.detail.value);
  // Di sini bisa jalankan update UI, refresh state, dll.
});


var DT_DATA={};
var BASE_URL = "{{ config('urls.base.web') }}";
var LOGIN_DT = JSON.parse(localStorage.getItem("LOGIN_DT"));

function capitalizeWords(str) {
  return str
    .toLowerCase() // biar konsisten dulu semua kecil
    .split(' ')    // pisahkan per spasi
    .map(word => word.charAt(0).toUpperCase() + word.slice(1))
    .join(' ');
}



function getWalletBalance(data){

//  var access_token="{{ $dt_content['access_token']}}";
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
		var ver = data.ver?? "1";

    var prevTxt1=document.getElementById(div_id1).textContent;
    document.getElementById(div_id1).innerHTML=loading();
    var txt1="";
    var json_dt = {
      search_txt : $("#search_txt").val(),
			lvd_type : $("#lvd_type").val(),
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
//alert("K:"+resp.data.row.length);
          for(k=0;k<resp.data.row.length;k++){
            no++;
            dt=resp.data.row[k];

if (data.ver==23){
txt += "<div id=\"id_div_2\" class=\"rounded-lg overflow-hidden shadow border\">";
txt += "    <img src=\"{{ asset('path/to/sample.jpg') }}\" class=\"w-full h-32 object-cover\" />";
txt += "    <div class=\"bg-teal-500 text-white p-2 text-sm text-center font-semibold\">";
txt += "      <p class=\"text-lg line-clamp-2 h-[60px] uppercase font-semibold\">";
txt += "        Judul Video";
txt += "      </p>";
txt += "      <p class=\"line-clamp-3 text-ellipsis\">";
txt += "        Video (1 unit)<br>";
txt += "        Category : umum";
txt += "      </p>";
txt += "      <button";
txt += "        onclick=\"accessVideo('VIDEO','1','1','1')\"";
txt += "        class=\"uppercase text-white mt-2 py-1 px-3 font-bold bg-teal-700 rounded hover:bg-teal-600 transition\"";
txt += "      >";
txt += "        See Content";
txt += "      </button>";
txt += "    </div>";
txt += "  </div> ";

//            txt +=" <div id=\""+div_id1+"_loading_"+k+"\" style=\"display:none\"></div>";
}else if (data.ver==2){

            txt +="     <div id=\""+div_id1+"_data_"+k+"\">";
            txt +="            <div  onclick=\"accessVideo('"+dt.lvd_type+"','"+dt.lvd_id+"','"+div_id1+"','"+k+"')\" style=\"cursor:pointer\" class=\"flex flex-col rounded-xl bg-teal-500\">";
            txt +="              <div class=\"relative h-[120px] bg-neutral-200 rounded-tl-xl rounded-tr-xl\">";
            txt +="<img width=\"100%\" src=\""+dt.lvd_image+"\" class=\" h-full object-cover\">";
            txt +="              </div>";
            txt +="              <div class=\"text-white h-[70px] p-4 text-left space-y-4\">";
            txt +="                <p class=\"text-lg line-clamp-2 h-[20px] text-ellipsis uppercase font-semibold\">";
            txt +=dt.lvd_title;
						txt +="</p>";
              txt +=""+capitalizeWords(dt.lvd_type) +" (<i>"+dt.lvd_cost+" unit</i>)";
//            txt +="<br>Category:"+dt.lvd_clase;
//            txt +="<br>Unit:"+dt.lvd_cost;
            txt +="</p>";
            txt +="              </div>";
/*
            txt +="              <button onclick=\"accessVideo('"+dt.lvd_type+"','"+dt.lvd_id+"','"+div_id1+"','"+k+"')\" class=\"uppercase text-white p-6 font-bold hover:underline hover:text-neutral-300\">";
            txt +="                See Content";
            txt +="              </button></a>";
*/
            txt +="            </div>";
            txt +="     </div>";
            txt +=" <div id=\""+div_id1+"_loading_"+k+"\" style=\"display:none\"></div>";

}else{
            txt +="     <div id=\""+div_id1+"_data_"+k+"\">";            
            txt +="            <div class=\"flex flex-col rounded-xl bg-teal-500\">";
            txt +="              <div class=\"relative w-full h-[200px] bg-neutral-200 rounded-tl-xl rounded-tr-xl\">";
            txt +="<img width=\"100%\" src=\""+dt.lvd_image+"\" class=\"w-full h-full object-cover\">";
            txt +="              </div>";
            txt +="              <div class=\"text-white h-[180px] p-4 text-left space-y-4\">";
            txt +="                <p class=\"text-lg line-clamp-2 h-[60px] text-ellipsis uppercase font-semibold\">";
            txt +=dt.lvd_title;
            txt +="                <p class=\"line-clamp-3 text-ellipsis\">";
              txt +=""+capitalizeWords(dt.lvd_type) +" (<i>"+dt.lvd_cost+" unit</i>)";
	          txt +="<br>Category:"+dt.lvd_clase;
//            txt +="<br>Unit:"+dt.lvd_cost;
            txt +="</p>";
            txt +="              </div>";
            txt +="              <button onclick=\"accessVideo('"+dt.lvd_type+"','"+dt.lvd_id+"','"+div_id1+"','"+k+"')\" class=\"uppercase text-white p-6 font-bold hover:underline hover:text-neutral-300\">";
            txt +="                See Content";
            txt +="              </button></a>";
            txt +="            </div>";
            txt +="     </div>";
            txt +=" <div id=\""+div_id1+"_loading_"+k+"\" style=\"display:none\"></div>";
}
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


  function accessVideo(lvd_type,idcontent,div_id,k){
    $("#"+div_id+"_data_"+k).hide();
    $("#"+div_id+"_loading_"+k).show();
    document.getElementById(div_id+"_loading_"+k).innerHTML=loading();

    var access_token="{{ $dt_content['access_token']}}";

    var json_dt = {
      'lvd_type' : lvd_type,
      'idcontent' : idcontent,
    }
//    var url = LOGIN_DT.config.API_URL_GET_CONTENT;
	var url="{{ config('urls.base.api') }}/api/libvid/get";
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
					if (lvd_type.toUpperCase() == "VIDEO" || lvd_type.toUpperCase() == "AUDIO"){
//  	      window.location.replace(LOGIN_DT.config.WEB_URL_VIDEO_ACCESS + "/"+content_key);
		        window.location.replace("{{ config('urls.base.web') }}/video/access" + "/"+content_key);
					}else{
            window.location.replace("{{ config('urls.base.web') }}/video/access" + "/"+content_key);
//		        window.open("{{ config('urls.base.web') }}/video/access" + "/"+content_key);
					}
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
/*
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
*/
            txt +="     <div id=\""+div_id1+"_data_"+k+"\">";
            txt +="            <div class=\"flex flex-col rounded-xl bg-teal-500\">";
            txt +="              <div class=\"relative w-full h-[200px] bg-neutral-200 rounded-tl-xl rounded-tr-xl\">";
            txt +="<img width=\"100%\" src=\""+dt.lvd_image+"\" class=\"w-full h-full object-cover\">";
            txt +="              </div>";
            txt +="              <div class=\"text-white h-[180px] p-4 text-left space-y-4\">";
            txt +="                <p class=\"text-lg line-clamp-2 h-[60px] text-ellipsis uppercase font-semibold\">";
            txt +=dt.lvd_title;
            txt +="                <p class=\"line-clamp-3 text-ellipsis\">";
              txt +=""+capitalizeWords(dt.lvd_type) +" (<i>"+dt.lvd_cost+" unit</i>)";
            txt +="<br>Category:"+dt.lvd_clase;
//            txt +="<br>Unit:"+dt.lvd_cost;
            txt +="</p>";
            txt +="              </div>";
//            txt += "              <a href=\""+LOGIN_DT.config.WEB_URL_VIDEO_ACCESS + "/"+dt.clv_key+"\">";
            txt +="              <button onclick=\"accessMyVideo('"+dt.lvd_type+"','"+dt.clv_key+"','"+div_id1+"','"+k+"')\" class=\"uppercase text-white p-6 font-bold hover:underline hover:text-neutral-300\">";
//            txt +="              <button  class=\"uppercase text-white p-6 font-bold hover:underline hover:text-neutral-300\">";
            txt +="                See Again";
            txt +="              </button></a>";
            txt +="            </div>";
            txt +="     </div>";
            txt +=" <div id=\""+div_id1+"_loading_"+k+"\" style=\"display:none\"></div>";


            if (k==max-1){
              //break;
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

  function accessMyVideo(lvd_type,content_key,div_id,k){
    $("#"+div_id+"_data_"+k).hide();
    $("#"+div_id+"_loading_"+k).show();
    document.getElementById(div_id+"_loading_"+k).innerHTML=loading();

    var access_token="{{ $dt_content['access_token']}}";

      if (lvd_type.toUpperCase() == "VIDEO" || lvd_type.toUpperCase() == "AUDIO"){
//          window.location.replace(LOGIN_DT.config.WEB_URL_VIDEO_ACCESS + "/"+content_key);
        window.location.replace("{{ config('urls.base.web') }}/video/access" + "/"+content_key);
      }else{
            window.location.replace("{{ config('urls.base.web') }}/video/access" + "/"+content_key);
//        window.open("{{ config('urls.base.web') }}/video/access" + "/"+content_key);
      }
  }


  function listCoupon(data){
    var div_id = data.div_id;
    var access_token=LOGIN_DT.access_token;//LOGIN_DT.access_token;;
    var max = data.max;
    var prevTxt=document.getElementById(div_id).textContent;
    document.getElementById(div_id).innerHTML=loading();
    var txt="";
    var json_dt = {
      search_txt : $("#search_txt").val(),
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
console.log("url:"+url+" ==> Hasil available coupon:"+JSON.stringify(resp));
        if (resp.rc=="000"){
          no=0;
          for(k=0;k<resp.data.row.length;k++){
            no++;
            dt=resp.data.row[k];

console.log(JSON.stringify(dt));
            txt +="     <div id=\"div_data_listCoupon_"+k+"\">";
            txt +="            <div class=\"flex flex-col rounded-xl bg-teal-500 h-[450px]\">";
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
            txt +="<br>Unit:"+dt.lvo_cost;
            txt +="</p>";
            txt +="              </div>";
            txt +="              </a>";
            txt +="              <center><button onclick=\"getCoupon('"+dt.lvo_idproduct+"','"+k+"');\" class=\"uppercase text-white p-6 font-bold hover:underline hover:text-neutral-300\">";
            txt +="                Get Coupon";
            txt +="              </button></center>";
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
      search_txt : $("#search_txt").val(),
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
            txt +="<Br><span style=\"font-size:12px\">";
						if (dt.sto_name){
							txt +=dt.sto_name;
						}
						txt +="</span> ";
            txt +="</p>";
            txt +="                <p class=\"line-clamp-3 text-ellipsis\">";
            txt +="Category:"+dt.lvo_idproduct;
            txt +="<br>Unit:"+dt.lvo_cost;
            txt +="</p>";
            txt +="              </div>";

            txt +="              <center><a target=\"_blank\" href=\""+BASE_URL+"/content/access/"+dt.clv_barcode+"\"><button class=\"uppercase text-white p-6 font-bold hover:underline hover:text-neutral-300\">";
            txt +="                View Detail";
            txt +="              </button></a></center>";
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
//    var max = data.max;

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


async function updateProfile() {
    DT_DATA={};

    const dt_resp2= await simpanLink(0);
    if (dt_resp2.rc != '000'){
        alert(dt_resp2.message);
        return false;
    }
 
    DT_DATA["cl_id"] = $("#cl_id").val() ? $("#cl_id").val() : 0;
    DT_DATA["cl_name"] = $("#cl_name").val() ? $("#cl_name").val() : 0;
    DT_DATA["cl_lastname"] = $("#cl_lastname").val() ? $("#cl_lastname").val() : 0;
    DT_DATA["cl_phone"] = $("#cl_phone").val() ? $("#cl_phone").val() : 0;
    DT_DATA["cl_address"] = $("#cl_address").val() ? $("#cl_address").val() : 0;
    DT_DATA["doc_file_link"] = $("#doc_file_link").val();
    DT_DATA["ext_file_link"] = $("#ext_file_link").val();
    DT_DATA["name_file_link"] = $("#name_file_link").val();


    var url = LOGIN_DT.config.API_URL_CLIENT_UPDATE;
    $.ajax({
        type: 'POST',
        url: url,
        headers: {
        "Authorization": "Bearer "+LOGIN_DT.access_token,
        },
        data: DT_DATA,
        success: function(resp)
            {
                alert(resp.message)
                if (resp.rc =="000"){
                    k=0;
        window.location.replace("/profile");

                }
            },
        error: function(jqXHR,error, errorThrown) {
            alert("RRP"+jqXHR.responseText+" -- "+error);
        }
    });
}


async function simpanLink(opsi=1) {
    file = document.getElementById('file_link').files[0];
    if (file){
        return new Promise((resolve, reject) => {
            var reader = new FileReader();
            reader.readAsBinaryString(file);
            reader.onload = function() {
                $("#doc_file_link").val(btoa(reader.result));
                $("#ext_file_link").val(file.name.split('.').pop().toLowerCase());
                $("#name_file_link").val(file.name);
                resolve ({ "rc": "000", "message": "Success"});
            }
            reader.onerror = function() {
                reject ({ "rc": "001", "message":"error on upload image. Try again"});
            };
        });

    }else{
        if (opsi==1){
            return { "rc": "001", "message":"File Image empty. You must upload image"};
        }else{
            return { "rc": "000", "message": "Success"};
        }
    }
}



function getDataDraw(data_id, callback){
LOGIN_DT = JSON.parse(localStorage.getItem("LOGIN_DT"));

  var txt="";
    document.getElementById("label_title_modal").innerHTML = "Edit Data";        
    var json_dt = {
        draw_id : data_id,
    }
    var url = LOGIN_DT.config.API_URL_DRAW_DETAIL;
    alert(JSON.stringify(LOGIN_DT));
    $.ajax({
        type: 'POST',
        url: url,
        headers: {
            "Authorization": "Bearer "+LOGIN_DT.access_token,
        },
        data: json_dt,
        success: function(resp)
        {
            callback(resp);
        },
        error: function(jqXHR,error, errorThrown) {
            alert("RRP"+jqXHR.responseText+" -- "+error);
//            $('#exampleModal').modal('hide');
        }
    });

}

