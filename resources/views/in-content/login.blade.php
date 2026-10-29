 @extends('in-layout.in-layout')


@section('additional-css')
    <style>


    </style>
@endsection


@section('content')

    <!-- Hero Section: BE BETTER WITH MONEY -->
    <section id="hero-section"
      class="hero-money-bg text-white md:px-8 py-12 md:py-16 relative min-h-[300px] md:min-h-[400px] flex items-center">
      <div class="absolute inset-0 bg-black opacity-40 z-10"></div> <!-- Tapi di atas blur -->
      <div class="container max-w-7xl mx-auto relative z-20 md:px-0 px-4">
        <div class="md:flex md:justify-between md:items-between">
          <!-- Left Side: Logo and Tagline -->
          <div class="flex flex-col sm:flex-col md:flex-row lg:flex-row xl:flex-row 2xl:flex-row md:justify-between md:items-center items-center">
            <img src="/assets/images/logo.png" alt="Omarco Logo in Hero"
            class="md:mx-0 mb-4 md:w-[150px] lg:w-[150px] xl:w-[150px] 2xl:w-[150px] w-[100px] opacity-90">
            <div class="w-[20px]">
              <!--  <span>Driving Financial Inclusion</span>  -->
            </div>
            <h1 class="text-4xl md:text-5xl font-impact uppercase font-bold text-center lg:text-start xl:text-start 2xl:text-start">Be Better With Money
            </h1>
            <div class="h-[20px]"></div>
          </div>

          <!-- Right Side: Login Form -->
@if (true)

          <div id="hero-login-form" class="md:w-4/12 max-w-[220px] mx-auto md:mx-0">
            <form method="POST"  action="{{ route('login-post'); }}"  class="border-4 border-white rounded-lg p-2 space-y-[10px] shadow-2xl" action="user-dashboard.html">
@csrf
              <div class="space-y-1">
                <div class="relative">
                  <span
                    class="material-icons-outlined absolute rounded-tl-md rounded-bl-md text-white bg-omarcogreen p-[4px]">person_outline</span>
                  <input id="cl_nickname" name="cl_nickname" type="text" placeholder="Username"
                    class="bg-white text-black placeholder-gray-300 text-sm rounded-md w-full py-[6px] px-1 pl-10 focus:outline-none focus:ring-2 focus:ring-omarcogreen">
                </div>
                <div class="relative">
                  <span
                    class="material-icons-outlined absolute rounded-tl-md rounded-bl-md text-white bg-omarcogreen p-[4px]">lock</span>
                  <input id="cl_pwd" name="cl_pwd" type="password" placeholder="Password"
                    class="bg-white text-black placeholder-gray-300 text-sm rounded-md w-full py-[6px] px-1 pl-10 focus:outline-none focus:ring-2 focus:ring-omarcogreen">
                </div>
              </div>
              <div class="space-y-1">
                <button type="submit" onclick="doLogin();"
                  class="w-full bg-omarcogreen hover:bg-green-600 text-white font-semibold py-1 px-4 rounded-md transition-colors duration-200 flex items-center justify-center">
                  <span class="material-icons-outlined mr-2">login</span>Login
                </button>
                <div class="text-center">
                  <a href="{{ route('forgot_pwd') }}" class="text-xs text-white hover:text-omarcogreen hover:underline">Forgot your
                    password?</a>
                </div>              
              </div>
              <button
              type="button"
              class="w-full font-bold bg-green-600 hover:bg-green-600 text-white py-1 px-4 text-l rounded-md transition-colors duration-200 flex items-center justify-center">
              <a href="{{ route('registration') }}">
                New Register
              </a>
            </button> 
            </form>             
         </div>
@endif
        </div>        
      </div>
    </section>

    <!-- Win Big Cash Section -->
    <section class="win-cash-bg pb-10 text-center text-white">
      <div class="container mx-auto max-w-7xl">
        <div class="relative mx-auto w-full">
          <img src="/assets/images/big_cash.png" alt="100 Million Rupiah Prize" class="object-cover mx-auto">
        </div>
        <div class="px-4">
          <p class="text-2xl md:text-5xl font-semibold mb-4 md:mb-10 leading-snug">
            <span class="block md:mb-4 mb-2">Buy multi-benefit voucher including valuable Educational Vouchers only for</span>
            <span class="block md:mb-4 mb-2">Rp 5,000 and you can WIN up to 100 Million Rupiah</span>
            <span class="block">and maybe it could be you can winning US$ 10 Million if you can win the international prize</span>
          </p>
          <a href="#"
            class="btn-buy-now inline-block text-white font-bold text-2xl md:text-4xl px-10 md:px-16 py-4 md:py-5 rounded-lg shadow-xl uppercase tracking-wider">
            Buy Now
          </a>
        </div>
      </div>
    </section>

    <!-- Global Draw Section -->
    <section class="global-draw-bg py-6 md:py-10">
      <div class="container mx-auto max-w-7xl px-4">
        <div class="md:flex md:space-x-8 items-start">
          <!-- Left Side: Graphic and Timer -->
          <div class="md:w-6/12 text-center mb-10 md:mb-0">
            <h3 class="text-3xl md:text-5xl font-impact text-white mb-4">GLOBALDRAW</h3>
            <div class="relative mx-auto mb-6">
              <img src="/assets/images/global_draw.png"
                alt="Global Draw $10 Million prize graphic with a stylized globe and currency symbols"
                class="object-cover">
            </div>
            <div class="items-center bg-omarcogrey text-white p-4 md:w-full rounded-lg countdown">
              <div class="flex md:flex-row flex-col md:gap-6 gap-2 items-center">
                <p class="text-xl uppercase text-green-600 font-bold text-left">Game<br class="hidden md:block" /> Close
                  In</p>
                <p class="text-xl md:text-2xl font-bold text-amber-600 mx-auto">100 <span
                    class="text-sm text-green-600">DAYS</span> 15 <span class="text-sm text-green-600">HOURS</span> 20
                  <span class="text-sm text-green-600">MINS</span></p>
              </div>
            </div>
          </div>

          <!-- Right Side: Text Content -->
          <div class="md:w-6/12 text-gray-700">
            <p class="text-sm md:text-xl lg:text-xl xl:text-xl 2xl:text-xl leading-relaxed">
              <span class="font-bold text-green-700">The Omarco Edusav Global Drawing </span>is an exclusive reward
              program
              created to give back to our valued users.
              Every time you purchase Omarco Units, you automatically earn entries into our Global Prize Drawings -
              giving you the chance to win exciting prizes on a regional and international level.
            </p>
            <h4 class="text-xl md:text-2xl font-semibold mb-3 text-green-700">How It Works:</h4>
            <ul class="space-y-2 text-sm md:text-xl lg:text-xl xl:text-xl 2xl:text-xl leading-relaxed">
              <li><strong>Purchase Omarco Units:</strong> Buy Omarco Units through your Omarco Edusav account.</li>
              <li><strong>Earn Draw Entries:</strong> Every purchase qualifies you for entries into the next scheduled
                Global Drawing.</li>
              <li><strong>Win Exclusive Rewards:</strong> Selected winners will receive prizes such as cash rewards,
                digital gadgets, travel experiences, or exclusive educational incentives.</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

<script>
function doLogin(){
  $("#div_login").hide();
  $("#div_loading").show();
  document.getElementById('div_loading').innerHTML=loading();
  var json_dt={
      "cl_nickname" : $("#cl_nickname").val(),
      "cl_pwd" : $("#cl_pwd").val()
    }
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

  $.ajax({
    type: "POST",
    url: BASE_URL + "/do_login_ajax",
    data: json_dt,
    success: function(resp)
    {
      if (resp.rc == "000"){
        localStorage.setItem('LOGIN_DT', JSON.stringify(resp));

        LOGIN_DT = JSON.parse(localStorage.getItem("LOGIN_DT"));

        $("#div_login").hide();
        $("#div_loading").show();
        // document.getElementById('div_loading').innerHTML="";
        window.location.replace(BASE_URL + "/dashboard");

      }else {
        alert(resp.msg);
        $("#div_login").show();
        $("#div_loading").hide();
        document.getElementById('div_loading').innerHTML="";
      }

    },
    error: function (xhr, ajaxOptions, thrownError) {
      alert(xhr.status);
      alert(thrownError);
      alert("Username/password salah. Silakan ulangi kembali");
      $("#div_login").show();
      $("#div_loading").hide();
      document.getElementById('div_loading').innerHTML="";

    }
  });
}

</script>    
  @endsection

