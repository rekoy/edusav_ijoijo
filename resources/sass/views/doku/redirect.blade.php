  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.2.0/crypto-js.min.js"></script>

<script src="https://sandbox.doku.com/jokul-checkout-js/v1/jokul-checkout-1.0.0.js"></script>
<script>

  var invoice;
  var requestDate;
  var clientId;
  var requestTarget;
  function payment() {
    requestTarget = "/checkout/v1/payment";
    invoice = "{{$data["dt_user"]["cl_userid"]}}"+Math.floor(Math.random() * (100000 - 200000)) + 100000;
    clientId = "{{$data['MALLID']}}";
    requestDate = new Date().toISOString().slice(0, 19) + "Z";
    var environmentUrl = 'https://sandbox.doku.com';

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
    var order_amount = "{{$data['AMOUNT']}}";
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
    const item_type = 'WALLER';
    const item_image_url = '';
    const item_url = '';
    var item_name = 'UNIT Edusav';
    var item_price = "{{$data['AMOUNT']}}";
    var item_quantity = 1;
    var customer_name = "{{$data['dt_user']['cl_name']}}";
    var customer_lastname = "";
    var customer_email = "";
    var customer_phone = "";
    var customer_address = "";
    const customer_country = 'ID';
    const customer_state = 'Indonesia';
    const customer_city = 'Jakarta';
    const customer_postcode = '10110';

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
      "        \"payment_due_date\": 60\n" +
      "    },\n" + 
      "\t\"additional_info\": {\n" +
      "        \"doku_wallet_notify_url\": \"" + doku_wallet_notify_url + "\"\n" +
      "    },\n" + 
      "\t\"shipping_address\":{},\r\n"+
      "\t\"billing_address\":{}"+
      "}";

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


<script>
//    $(document).ready(function() {
        payment("{{$data['dt_user']['cl_userid']}}")
//  });
</script>
