 @extends('in-layout.in-layout-access')
@section('content')
<section class="bg-white py-6 md:py-10">
  <div class="container mx-auto max-w-7xl px-4 text-center">
    <p class="md:text-4xl text-xl text-black font-bold">{{ $dt_content['title'] }}</p>
    <div class="max-w-3xl flex md:flex-row flex-col py-6 mx-auto items-start">
      <form class="w-full space-y-6" method="POST" action="{{ route('do.wallet.topup') }}">
@csrf
        <div class="grid md:grid-cols-3 grid-cols-1 gap-6">
            <span style="cursor:pointer" onclick="payment(10000)"
              class="w-full bg-omarcogreen hover:bg-green-600 text-white font-semibold p-3 rounded-md transition-colors duration-200 flex items-center justify-center">
            10.000 (2 unit)
            </span>
            <span style="cursor:pointer" onclick="payment(25000)"
              class="w-full bg-omarcogreen hover:bg-green-600 text-white font-semibold p-3 rounded-md transition-colors duration-200 flex items-center justify-center">
            25.000 (5 unit)
            </span>
            <span style="cursor:pointer" onclick="payment(50000)"
              class="w-full bg-omarcogreen hover:bg-green-600 text-white font-semibold p-3 rounded-md transition-colors duration-200 flex items-center justify-center">
            50.000 (10 unit)
            </span>
        </div>
        <div class="grid md:grid-cols-3 grid-cols-1 gap-6">
            <span style="cursor:pointer" onclick="payment(100000)"
              class="w-full bg-omarcogreen hover:bg-green-600 text-white font-semibold p-3 rounded-md transition-colors duration-200 flex items-center justify-center">
            100.000 (20 unit)
            </span>
            <span style="cursor:pointer" onclick="payment(250000)"
              class="w-full bg-omarcogreen hover:bg-green-600 text-white font-semibold p-3 rounded-md transition-colors duration-200 flex items-center justify-center">
            250.000 (50 unit)
            </span>
            <span style="cursor:pointer" onclick="payment(500000)"
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
  async function payment(amount=0) {
		alert("Please register first");
            window.location.replace("{{ config('urls.callbacks.registration') }}" + "");

  }
</script>


@endsection 
