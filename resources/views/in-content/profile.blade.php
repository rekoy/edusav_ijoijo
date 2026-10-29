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
              <input type="hidden" name="cl_id" id="cl_id" value="{{ $dt_content['dt_user']['cl_id'] }}" placeholder="First Name"
                class="text-sm rounded-md w-full py-3 px-3 border bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-gray-200" />

              Name:
            <div class="grid md:grid-cols-2 grid-cols-1 gap-12">
              <input type="text" name="cl_name" id="cl_name" value="{{ $dt_content['dt_user']['cl_name'] }}" placeholder="First Name"
                class="text-sm rounded-md w-full py-3 px-3 border bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-gray-200" />
            </div>
            E-mail:
            <div class="grid md:grid-cols-2 grid-cols-1 gap-12">
            <input type="email" placeholder="Email Account" id="cl_email" name="cl_email" value="{{ $dt_content['dt_user']['cl_email'] }}"
              class="text-sm rounded-md w-full py-3 px-3 border bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-gray-200" />
            </div>
            Phone:
            <div class="grid md:grid-cols-2 grid-cols-1 gap-12">
            <input type="number" placeholder="Phone" name="cl_phone"  id="cl_phone"  value="{{ $dt_content['dt_user']['cl_phone'] }}"
              class="text-sm rounded-md w-full py-3 px-3 border bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-gray-200" />
            </div>
            ID No(KTP):
            <div class="grid md:grid-cols-2 grid-cols-1 gap-12">
            <input type="number" placeholder="ID No" name="cl_dni"  id="cl_dni"   value="{{ $dt_content['dt_user']['cl_dni'] }}"
              class="text-sm rounded-md w-full py-3 px-3 border bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-gray-200" />
            <center>
<!--              <img width="300" src="{{ $dt_content['dt_user']['cl_link'] }}"> -->
            </center>
            </div>
            Address:
            <div class="grid md:grid-cols-2 grid-cols-1 gap-12">
              <input type="text" placeholder="Address" name="cl_address"  id="cl_address"   value="{{ $dt_content['dt_user']['cl_address'] }}"
              class="text-sm rounded-md w-full py-3 px-3 border bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-gray-200" />
            </div>
            Update Photo Profile
            <div class="grid md:grid-cols-2 grid-cols-1 gap-12">

            <input type="file" placeholder="file" name="file_link" id="file_link" class="text-sm rounded-md w-full py-3 px-3 border bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-gray-200" />
            <input type="hidden" id="doc_file_link" name="doc_file_link" value="">
            <input type="hidden" id="ext_file_link" name="ext_file_link" value="">
            <input type="hidden" id="name_file_link" name="name_file_link" value="">
            </div>
            &nbsp;&nbsp;
            <div class="grid md:grid-cols-2 grid-cols-1 gap-12">
            <button  onclick="updateProfile();"
              class="w-full bg-omarcogreen hover:bg-green-600 text-white font-semibold p-3 rounded-md transition-colors duration-200 flex items-center justify-center">UPDATE PROFILE
            </button>

            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Toggle logic for the first password field
                    const passwordInput = document.getElementById('cl_pwd');
                    const toggleButton = document.getElementById('togglePassword');
                    const slashPath = document.getElementById('slash-path');

                    toggleButton.addEventListener('click', function() {
                        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                        passwordInput.setAttribute('type', type);
                        slashPath.classList.toggle('hidden');
                    });

                    // Toggle logic for the password confirmation field
                    const passwordInputConf = document.getElementById('cl_pwd_confirmation');
                    const toggleButtonConf = document.getElementById('togglePasswordConf');
                    const slashPathConf = document.getElementById('slash-path-conf');

                    toggleButtonConf.addEventListener('click', function() {
                        const type = passwordInputConf.getAttribute('type') === 'password' ? 'text' : 'password';
                        passwordInputConf.setAttribute('type', type);
                        slashPathConf.classList.toggle('hidden');
                    });
                });
            </script>
              </div>


            </div>
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
  });

  // Tutup modal saat klik area luar modal
  $(window).click(function(e) {
    if ($(e.target).is('#myModal')) {
      $('#myModal').fadeOut();
    }
  });

</script>

  @endsection

