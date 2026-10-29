 @extends('in-layout.in-layout-access')
@section('content')
<section class="bg-white py-6 md:py-10">
  <div class="container mx-auto max-w-7xl px-4">
    <div class="flex md:flex-row flex-col md:gap-8 gap-4">
      <!-- Left Menu -->
      <div class="md:w-[230px] max-w-sm">
        <div class="bg-green-600 text-center text-xl font-semibold text-white border-b border-white py-2">Menu Items</div>
        <ul>
          <!-- Wallet -->
          <li class="group relative">
            <a href="{{ route('wallet.topup') }}" class="cursor-pointer flex items-center text-xl text-white border-b border-white gap-4 bg-winbigcashbg hover:bg-opacity-80 transition">
              <div class="h-full bg-rose-500 p-2">
                <span class="material-icons-outlined">account_balance_wallet</span>
              </div>
              Wallet
            </a>
          </li>
          <!-- Unit -->
          <li class="group relative">
            <a href="{{ route('unit.buy') }}" class="cursor-pointer flex items-center text-xl text-white border-b border-white gap-4 bg-winbigcashbg hover:bg-opacity-80 transition">
              <div class="h-full bg-rose-500 p-2">
                <span class="material-icons-outlined">shopping_cart</span>
              </div>
              Unit
            </a>
          </li>
          <!-- Voucher -->
          <li class="group relative">
            <a href="{{ route('voucher.available') }}" class="cursor-pointer flex items-center text-xl text-white border-b border-white gap-4 bg-winbigcashbg hover:bg-opacity-80 transition">
              <div class="h-full bg-rose-500 p-2">
                <span class="material-icons-outlined">local_offer</span>
              </div>
              Voucher
            </a>
          </li>
          <!-- Invest -->
          <li class="group relative">
            <a href="{{ route('invest.info') }}" class="cursor-pointer flex items-center text-xl text-white border-b border-white gap-4 bg-winbigcashbg hover:bg-opacity-80 transition">
              <div class="h-full bg-rose-500 p-2">
                <span class="material-icons-outlined">trending_up</span>
              </div>
              Invest
            </a>
          </li>
        </ul>
      </div>

      <!-- Main Content -->
      <div class="w-full">
        <p class="lg:text-4xl md:text-2xl text-xl text-green-700 font-bold mb-6">Buy Unit</p>
        <div class="bg-white rounded-lg shadow-lg p-6">
          <form class="space-y-6">
            <div class="grid md:grid-cols-2 grid-cols-1 gap-6">
              <input type="number" placeholder="Amount" class="text-sm rounded-md w-full py-3 px-3 border bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-green-500" />
            </div>
            <div class="flex flex-row gap-2 items-center">
              <input type="checkbox" class="form-checkbox h-5 w-5 text-green-600" value="true" checked />
              <label>Agree with <span class="font-bold underline cursor-pointer text-green-600">Terms & Conditions</span></label>
            </div>
            <div class="flex flex-row gap-2">
              <label class="text-gray-700">Your wallet Balance: <b class="text-green-600">1.000.000</b></label>
            </div>
            <div class="flex flex-row gap-2">
              <label class="text-gray-700">Your unit in this week: <b class="text-green-600">10</b></label>
            </div>
            <div class="grid md:grid-cols-2 grid-cols-1 gap-6">
              <input type="text" placeholder="Extra info" class="text-sm rounded-md w-full py-3 px-3 border bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-green-500" />
            </div>
            <button type="submit" class="w-full bg-rose-500 hover:bg-rose-600 text-white font-semibold p-3 rounded-md transition-colors duration-200 flex items-center justify-center gap-2">
              <span class="material-icons-outlined">shopping_cart</span>
              Buy Unit
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection 
