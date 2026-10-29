 @extends('in-layout.in-layout-access')
@section('content')
<section class="bg-white py-6 md:py-10">
  <div class="container mx-auto max-w-7xl px-4 text-center">
    <p class="md:text-4xl text-xl text-black font-bold">Info Investasi</p>
    <div class="max-w-3xl flex md:flex-row flex-col py-6 mx-auto items-start">
      <div class="fresh-datatables" id="div_datatables">
        <table class="table table-striped table-no-bordered table-hover w-full">
          <thead>
            <tr>
              <th>No</th>
              <th>User ID</th>
              <th>Nama</th>
              <th>Tanggal</th>
              <th>Tipe</th>
              <th>Amount</th>
              <th>Balance</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td><td>user01</td><td>Nama User</td><td>2024-06-01</td><td>Invest</td><td>500.000</td><td>2.000.000</td>
            </tr>
            <tr>
              <td>2</td><td>user02</td><td>Nama User 2</td><td>2024-06-02</td><td>Withdraw</td><td>100.000</td><td>1.900.000</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
@endsection 
