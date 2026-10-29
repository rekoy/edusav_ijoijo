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
        <p class="lg:text-4xl md:text-2xl text-xl text-green-700 font-bold mb-6">Unit Transactions</p>
        <div class="bg-white rounded-lg shadow-lg p-6">
          <div class="fresh-datatables" id="div_datatables">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User ID</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">1</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">user01</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Nama User</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2024-06-01</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">5</td>
                </tr>
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">user02</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Nama User 2</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2024-06-02</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">10</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection 
