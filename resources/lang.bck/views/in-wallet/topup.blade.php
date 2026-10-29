 @extends('in-layout.in-layout-access')
@section('content')
<section class="bg-white py-6 md:py-10">
  <div class="container mx-auto max-w-7xl px-4 text-center">
    <p class="md:text-4xl text-xl text-black font-bold">{{ $dt_content['title'] }}</p>
    <div class="max-w-3xl flex md:flex-row flex-col py-6 mx-auto items-start">
      <form class="w-full space-y-6" method="POST" action="{{ route('do.wallet.topup') }}">
@csrf
        <div class="grid md:grid-cols-3 grid-cols-1 gap-6">
            <span onclick="payment(10000)"
              class="w-full bg-omarcogreen hover:bg-green-600 text-white font-semibold p-3 rounded-md transition-colors duration-200 flex items-center justify-center">
            10.000 (2 unit)
            </span>
            <span onclick="payment(25000)"
              class="w-full bg-omarcogreen hover:bg-green-600 text-white font-semibold p-3 rounded-md transition-colors duration-200 flex items-center justify-center">
            25.000 (5 unit)
            </span>
            <span onclick="payment(50000)"
              class="w-full bg-omarcogreen hover:bg-green-600 text-white font-semibold p-3 rounded-md transition-colors duration-200 flex items-center justify-center">
            50.000 (10 unit)
            </span>
        </div>
        <div class="grid md:grid-cols-3 grid-cols-1 gap-6">
            <span onclick="payment(100000)"
              class="w-full bg-omarcogreen hover:bg-green-600 text-white font-semibold p-3 rounded-md transition-colors duration-200 flex items-center justify-center">
            100.000 (20 unit)
            </span>
            <span onclick="payment(25000)"
              class="w-full bg-omarcogreen hover:bg-green-600 text-white font-semibold p-3 rounded-md transition-colors duration-200 flex items-center justify-center">
            250.000 (50 unit)
            </span>
            <span onclick="payment(500000)"
              class="w-full bg-omarcogreen hover:bg-green-600 text-white font-semibold p-3 rounded-md transition-colors duration-200 flex items-center justify-center">
            500.000 (100 unit)
            </span>
        </div>
<!--
        <div class="grid md:grid-cols-3 grid-cols-1 gap-6">
					<i>another amount</i>
          <input type="number" placeholder="amount voucher" id="amount" name="amount"
            class="text-sm rounded-md w-full py-3 px-3 border bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-gray-200" />
        <span onclick="payment(0)"
          class="w-full bg-rose-500 hover:bg-blue-600 text-white font-semibold p-3 rounded-md transition-colors duration-200 flex items-center justify-center">Purchase
</span>

          </div>
-->          
        <div class="flex flex-row gap-2">
					<i>*) 1 voucher = Rp 5.000 </i>
        </div>

        <div class="flex flex-row gap-2">
          <input type="checkbox" value="true" checked />
          <label>Agree with <span class="font-bold underline cursor-pointer">Terms & Conditions</span></label>
        </div>
      </form>
    </div>
  </div>
</section>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.2.0/crypto-js.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="https://sandbox.doku.com/jokul-checkout-js/v1/jokul-checkout-1.0.0.js"></script>
<script>

  var invoice;
  var requestDate;
  var clientId;
  var requestTarget;
  var ORDER_AMOUNT=0;
  function payment(amount=0) {
    if (amount==0){
      ORDER_AMOUNT = document.getElementById("amount").value;
    }else{
      ORDER_AMOUNT=amount;
    }

    requestTarget = "/checkout/v1/payment";
    invoice = "{{$data["dt_user"]["cl_userid"]}}"+Math.floor(Math.random() * (100000 - 200000)) + Math.floor(Math.random()*100000);
    clientId = "{{$data['MALLID']}}";
    requestDate = new Date().toISOString().slice(0, 19) + "Z";
    var environmentUrl = 'https://sandbox.doku.com';
//    var environmentUrl = 'https://jokul.doku.com';

    var body = prepareBody();
    var headers = createHeader(body);

    var requestOptions = {
      method: 'POST',
      headers: headers,
      body: body,
    };

    var jsondata;
    fetch(environmentUrl + requestTarget, requestOptions)
      .then((response) => {
        response.json().then((data) => {

          if(response.status !== 200){

            return catchFailed(JSON.stringify(data.error.message));
          }
          jsondata = data.response.payment.url;
          $(".jokul-modal").remove();
          loadJokulCheckout(jsondata);

        }).catch(error => {
          catchFailed("")
        })
      });
  }

  function createHeader(body) {
    var headers = new Headers();

    headers.append("Content-Type", "application/json");
    headers.append("Signature", 'HMACSHA256='+createSignature(body));
    headers.append("Request-Id", invoice);
    headers.append("Client-Id", clientId);
    headers.append("Request-Timestamp", requestDate);
    return headers;
  }

  function prepareBody() {
    var order_amount = ORDER_AMOUNT;
    var order_invoice_number = invoice;
    // var session_id = Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);
    var session_id = makeSession(32);
    var today = new Date();
    var request_date_time = today.getFullYear() + '0' + (today.getMonth() + 1) + '' + today.getDate() + today.getHours() + "" + today.getMinutes() + "" + today.getSeconds();
    var order_callback_url = "{{$data['BACKURL']}}";
    var doku_wallet_notify_url = "{{$data['URL']}}";
    var customer_id = "{{$data['dt_user']['cl_userid']}}";
    const item_sku = 'EDUSAV-UNIT';
    const item_category = 'UNIT';
    const item_type = 'WALLET';
    const item_image_url = '';
    const item_url = '';
    var item_name = 'UNIT Edusav';
    var item_price = ORDER_AMOUNT;
    var item_quantity = 1;
    var customer_name = "{{$data['dt_user']['cl_name']}}";
    var customer_lastname = "";
    var customer_email = "agus@agus.com";
    var customer_phone = "0815101010103";
    var customer_address = "jakarta";
    const customer_country = 'ID';
    const customer_state = 'Indonesia';
    const customer_city = 'Jakarta';
    const customer_postcode = '10110';
/*
    var body = "{\n" +
      "\t\"customer\": {\n" +
      "        \"id\": \"" + customer_id + "\",\n" +
      "        \"address\": \"" + customer_address + "\",\n" +
      "        \"country\": \""+customer_country+"\",\n" +
      "        \"state\": \""+customer_state+"\",\n" +
      "        \"city\": \""+customer_city+"\",\n" +
      "        \"postcode\": \""+customer_postcode+"\",\n" +
      "        \"last_name\": \""+customer_lastname+"\",\n" +
      "        \"email\": \"" + customer_email + "\",\n" +
      "        \"name\": \"" + customer_name + "\",\n" +
      "        \"phone\": \"" + customer_phone + "\"\n" +
      "    },\n" +
      "\t\"order\": {\n" +
      "        \"amount\": " + order_amount + ",\n" +
      "        \"callback_url\": \"" + order_callback_url + "\",\n" +
      "        \"currency\": \"IDR\",\n" +
      "        \"invoice_number\": \"" + order_invoice_number + "\",\n" +
      "        \"line_items\": [\n" +
      "            {\n" +
      "                \"type\": \"" + item_type + "\",\n" +
      "                \"image_url\": \"" + item_image_url + "\",\n" +
      "                \"url\": \"" + item_url + "\",\n" +
      "                \"sku\": \"" + item_sku + "\",\n" +
      "                \"category\": \"" + item_category + "\",\n" +
      "                \"name\": \"" + item_name + "\",\n" +
      "                \"price\": " + item_price + ",\n" +
      "                \"quantity\": " + item_quantity + "\n" +
      "            }\n" +
      "        ],\n" +
      "        \"session_id\": \"" + session_id + "\"\n" +
      "    },\n" +
      "\t\"payment\": {\n" +
      "        \"payment_due_date\": 1440\n" +
      "    },\n" + 
      "\t\"additional_info\": {\n" +
      "        \"doku_wallet_notify_url\": \"" + doku_wallet_notify_url + "\"\n" +
      "    },\n" + 
      "}";
*/
    var body = "{\n" +
      "\t\"customer\": {\n" +
      "        \"address\": \"" + customer_address + "\",\n" +
      "        \"country\": \"ID\",\n" +
      "        \"email\": \"" + customer_email + "\",\n" +
      "        \"name\": \"" + customer_name + "\",\n" +
      "        \"phone\": \"" + customer_phone + "\"\n" +
      "    },\n" +
      "\t\"order\": {\n" +
      "        \"amount\": " + order_amount + ",\n" +
      "        \"callback_url\": \"" + order_callback_url + "\",\n" +
      "        \"currency\": \"IDR\",\n" +
      "        \"invoice_number\": \"" + order_invoice_number + "\",\n" +
      "        \"line_items\": [\n" +
      "            {\n" +
      "                \"name\": \"" + item_name + "\",\n" +
      "                \"price\": " + item_price + ",\n" +
      "                \"quantity\": " + item_quantity + "\n" +
      "            }\n" +
      "        ],\n" +
      "        \"session_id\": \"" + session_id + "\"\n" +
      "    },\n" +
      "\t\"payment\": {\n" +
      "        \"payment_due_date\": 1440\n" +
      "    }\n" +
      "}";
      
console.log("Body:"+JSON.stringify(body));
    return body;
  }
  function makeSession(length) {
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
  }
  function consumeDigest(digest) {
    var processedDigest =
      "Client-Id:" + clientId + "\n"
      + "Request-Id:" + invoice + "\n"
      + "Request-Timestamp:" + requestDate + "\n"
      + "Request-Target:" + requestTarget + "\n"
      + "Digest:" + digest;
    return processedDigest;
  }

  function createSignature(body) {
    var digest = CryptoJS.enc.Base64.stringify(CryptoJS.SHA256(body));
    var rawSignature = consumeDigest(digest);
    var key = "{{$data['KEY']}}";
    var signature = CryptoJS.enc.Base64.stringify(CryptoJS.HmacSHA256(rawSignature, key));
    return signature;
  }

  function catchFailed(error) {
    swal({
      title: "Order Failed",
      text: error,
      icon: "error",
      button: "Close",
    });
  }
</script>


@endsection 
