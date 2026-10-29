 @extends('in-layout.in-layout-access')
@section('content')
<section class="bg-white py-6 md:py-10">
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
</section>
<script>
  </script>
@endsection 
