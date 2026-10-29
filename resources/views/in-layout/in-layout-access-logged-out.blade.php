<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Content - Omarco</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="/assets/css/style.css">
  <script src="/assets/js/tailwind.config.js"></script>
  @yield('additional-css')
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
</head>

<body>

  <!-- Header -->
  <header class="header-bg bg-omarcogrey text-white shadow-lg sticky top-0 z-50">
        <div class="container px-4 mx-auto py-3 flex justify-between items-center max-w-7xl">
            <a href="/" class="text-3xl font-bold flex items-center">
                <img src="/assets/images/logo.png" alt="Omarco Logotype" class="h-8 md:h-10">
            </a>

            <button id="mobile-menu-toggle" class="md:hidden p-2 rounded focus:outline-none mobile-menu-toggle">
                <span class="material-icons-outlined !text-gray-500">menu</span>
            </button>

            <nav class="hidden md:flex items-center space-x-4 text-sm lg:text-base">
              <a href="{{ route('home') }}" class="transition-colors duration-200 flex items-center py-2 px-3 rounded-md hover:text-omarcogreen">
                <span class="nav-icon-container text-omarcogrey"><span
                  class="material-icons-outlined">home</span></span>Home
              </a>
              <a href="{{ route('content-detail',8) }}" class="transition-colors duration-200 flex items-center py-2 px-3 rounded-md hover:text-omarcogreen">
                <span class="nav-icon-container text-omarcogrey"><span
                            class="material-icons-outlined">info</span></span>About Omarco Voucher
              </a>
              <a href="{{ route('content-detail',9) }}" class="transition-colors duration-200 flex items-center py-2 px-3 rounded-md hover:text-omarcogreen">
                <span class="nav-icon-container text-omarcogrey"><span
                  class="material-icons-outlined">article</span></span>Driving Financial Inclusion
              </a>
              <a href="{{ route('content-detail',10) }}" class="transition-colors duration-200 flex items-center py-2 px-3 rounded-md hover:text-omarcogreen">
                <span class="nav-icon-container text-omarcogrey"><span
                  class="material-icons-outlined">contacts</span></span>Multiple Benefits
              </a>
              <a href="{{ route('content-detail',33) }}" class="transition-colors duration-200 flex items-center py-2 px-3 rounded-md hover:text-omarcogreen">
                <span class="nav-icon-container text-omarcogrey"><span
                  class="material-icons-outlined">dashboard</span></span>Prize Draw Info
              </a>

              <!-- Desktop dropdown -->
              <!--<div class="relative group">
                <div class="flex items-center py-2 px-3 rounded-md hover:text-omarcogreen cursor-pointer">
                  <span class="nav-icon-container text-omarcogrey"><span
                    class="material-icons-outlined">account_circle</span></span>My Account
                  <span class="material-icons-outlined mr-1">expand_more</span>
                </div>
                <ul class="absolute left-0 top-full bg-green-600 shadow-lg text-base text-white min-w-full hidden group-hover:block z-10">
                  <li><a href="{{ route('profile') }}" class="flex items-center gap-2 p-2 hover:bg-green-700/90"><span class="material-icons-outlined">dashboard</span>My Profile</a></li>
                  <li><a href="{{ route('dashboard') }}" class="flex items-center gap-2 p-2 hover:bg-green-700/90"><span class="material-icons-outlined">dashboard</span>Dashboard</a></li>
                  <li><a href="{{ route('drawing.my') }}" class="flex items-center gap-2 p-2 hover:bg-green-700/90"><span class="material-icons-outlined">dashboard</span>My Live Draw</a></li>
                  <li><a href="{{ route('content-history') }}" class="flex items-center gap-2 p-2 hover:bg-green-700/90"><span class="material-icons-outlined">dashboard</span>My Library</a></li>
                  <li><a href="{{ route('draw-my-win') }}" class="flex items-center gap-2 p-2 hover:bg-green-700/90"><span class="material-icons-outlined">settings</span>Draw History</a></li>
                  <li><a href="{{ route('credit.my') }}" class="flex items-center gap-2 p-2 hover:bg-green-700/90"><span class="material-icons-outlined">settings</span>Transaction History</a></li>
                  <li><a href="{{ route('coupon.my') }}" class="flex items-center gap-2 p-2 hover:bg-green-700/90"><span class="material-icons-outlined">settings</span>Benefit Use History</a></li>
                  <li><a href="{{ route('logout') }}" class="flex items-center gap-2 p-2 hover:bg-green-700/90"><span class="material-icons-outlined">logout</span>Logout</a></li>
                </ul>
              </div>-->
            </nav>
          </div>

          <!-- Mobile menu -->
          <div id="mobile-menu" class="mobile-menu md:hidden bg-gray-700 hidden overflow-y-auto max-h-[calc(100vh-4rem)]">
            <nav class="flex flex-col p-4 space-y-1">
              <a href="{{ route('home') }}" class="flex items-center py-2 px-3 rounded-md hover:text-omarcogreen">
                <span class="flex items-center gap-2"><span class="material-icons-outlined">home</span>Home</span>
              </a>
              <a href="{{ route('content-detail',8) }}" class="flex items-center py-2 px-3 rounded-md hover:text-omarcogreen">
                <span class="flex items-center gap-2"><span class="material-icons-outlined">info</span>About Omarco Voucher</span>
              </a>
              <a href="{{ route('content-detail',9) }}" class="flex items-center py-2 px-3 rounded-md hover:text-omarcogreen">
                <span class="flex items-center gap-2"><span class="material-icons-outlined">article</span>Driving Financial Inclusion
              </a>
              <a href="{{ route('content-detail',10) }}" class="flex items-center py-2 px-3 rounded-md hover:text-omarcogreen">
                <span class="flex items-center gap-2"><span class="material-icons-outlined">contacts</span>Multiple Benefits</span>
              </a>
              <a href="{{ route('content-detail',33) }}" class="flex items-center py-2 px-3 rounded-md hover:text-omarcogreen">
                <span class="flex items-center gap-2"><span class="material-icons-outlined">dashboard</span>Prize Draw Info</span>
              </a>

              <!-- Mobile dropdown -->
              <!--<div class="relative">
                <button id="mobile-account-trigger" class="w-full flex items-center justify-between py-2 px-3 rounded-md hover:text-omarcogreen">
                  <span class="flex items-center gap-2">
                    <span class="material-icons-outlined">account_circle</span>My Account
                  </span>
                  <span id="mobile-account-icon" class="material-icons-outlined transition-transform duration-300">expand_more</span>
                </button>

                <ul id="mobile-account-dropdown" class="relative mt-1 bg-green-600 shadow-lg text-base text-white min-w-full hidden rounded-md">
                  <li><a href="{{ route('profile') }}" class="flex items-center gap-2 p-2 hover:bg-green-700/90"><span class="material-icons-outlined">dashboard</span>My Profile</a></li>
                  <li><a href="{{ route('dashboard') }}" class="flex items-center gap-2 p-2 hover:bg-green-700/90"><span class="material-icons-outlined">dashboard</span>Dashboard</a></li>
                  <li><a href="{{ route('drawing.my') }}" class="flex items-center gap-2 p-2 hover:bg-green-700/90"><span class="material-icons-outlined">dashboard</span>My Live Draw</a></li>
                  <li><a href="{{ route('content-history') }}" class="flex items-center gap-2 p-2 hover:bg-green-700/90"><span class="material-icons-outlined">dashboard</span>My Library</a></li>
                  <li><a href="{{ route('draw-my-win') }}" class="flex items-center gap-2 p-2 hover:bg-green-700/90"><span class="material-icons-outlined">settings</span>Draw History</a></li>
                  <li><a href="{{ route('credit.my') }}" class="flex items-center gap-2 p-2 hover:bg-green-700/90"><span class="material-icons-outlined">settings</span>Transaction History</a></li>
                  <li><a href="{{ route('coupon.my') }}" class="flex items-center gap-2 p-2 hover:bg-green-700/90"><span class="material-icons-outlined">settings</span>Benefit Use History</a></li>
                  <li><a href="{{ route('logout') }}" class="flex items-center gap-2 p-2 hover:bg-green-700/90"><span class="material-icons-outlined">logout</span>Logout</a></li>
                </ul>
              </div>-->
            </nav>
          </div>
    </header>

  <!-- Main Content -->
  <main>
    <section id="hero-section"
      class="hero-money-bg text-white md:px-8 relative min-h-[110px] md:min-h-[150px] flex items-center">
      <div class="absolute inset-0 bg-black opacity-40 z-10"></div> <!-- Tapi di atas blur -->
      <div class="container max-w-7xl mx-auto relative z-20 md:px-0 px-4 py-5">
        <!-- Left Side: Logo and Tagline -->
        <div class="flex md:flex-row flex-col text-center items-center md:gap-15 md:text-left mb-8 md:mb-0">
          <div class="lg:w-4/12 md:w-5/12 w-full">
            <!-- Placeholder for logo.png -->
            <img src="/assets/images/logo.png" alt="Omarco Logo in Hero"
              class="mx-auto md:mx-0 mb-4 h-12 md:h-24 opacity-90">
          </div>
          <div class="lg:w-9/12 md:w-7/12 w-full">
            <div class="flex flex-col md:gap-7 gap-3 text-center md:text-end xl:text-end lg:text-end 2xl:text-end items-center md:items-end lg:items-end xl:items-end 2xl:text-end">
              <h1 class="text-2xl md:text-4xl font-impact uppercase w-fit">
                  Be Better With Money
              </h1>
          </div>
          </div>

        </div>

      </div>
    </section>

    <!-- Win Big Cash Section -->
    <section class="win-cash-bg text-center text-white">
      <div class="container mx-auto max-w-7xl">
        <div class="flex md:flex-row flex-col items-center">
          <div class="md:w-4/12 relative mx-auto w-full">
            <img src="/assets/images/big_cash.png" alt="100 Million Rupiah Prize" class="object-cover w-full">
          </div>
          <div class="md:w-8/12 md:text-center text-center py-6">
            <p class="uppercase text-4xl md:text-7xl font-bold">one step ahead</p>
            <p class="uppercase md:text-3xl text-lg font-bold">chance to win 100 million rupiah</p>
            <p class="uppercase md:text-3xl text-lg font-bold">only with Rp 5,000 / unit</p>
          </div>
        </div>
      </div>
    </section>

    <section class="bg-white">
      <div class="container mx-auto max-w-7xl px-0">
        <ul class="grid grid-cols-2 md:grid-cols-5">

<!--

          <li class="relative border-r border-rose-600 group">
            <a href="{{ route('dashboard') }}"
              class="cursor-pointer flex items-center justify-between md:text-xl text-base text-white border-b border-white gap-2 bg-rose-500 hover:bg-opacity-80 transition px-4 py-2">
              <div class="flex items-center gap-2">
                <span class="material-icons-outlined">account_balance_wallet</span>
                My Wallet
              </div>
            </a>
          </li>
          <li class="relative border-r border-rose-600 group">
            <a href="{{ route('coupon.my') }}"
              class="cursor-pointer flex items-center justify-between md:text-xl text-base text-white border-b border-white gap-2 bg-rose-500 hover:bg-opacity-80 transition px-4 py-2">
              <div class="flex items-center gap-2">
                <span class="material-icons-outlined">book_online</span>
                My Coupon
              </div>
            </a>
          </li>
          <li class="relative border-r border-rose-600 group">
            <a href="{{ route('content-history') }}"
              class="cursor-pointer flex items-center justify-between md:text-xl text-base text-white border-b border-white gap-2 bg-rose-500 hover:bg-opacity-80 transition px-4 py-2">
              <div class="flex items-center gap-2">
                <span class="material-icons-outlined">redeem</span>
                My Library
              </div>
            </a>
          </li>
          <li class="relative border-r border-rose-600 group">
            <a href="{{ route('content') }}"
              class="cursor-pointer flex items-center justify-between md:text-xl text-base text-white border-b border-white gap-2 bg-rose-500 hover:bg-opacity-80 transition px-4 py-2">
              <div class="flex items-center gap-2">
                <span class="material-icons-outlined">wallet</span>
                Content
              </div>
            </a>
          </li>
          <li class="relative border-r border-rose-600 group">
            <a href="{{ route('coupon-available') }}"
              class="cursor-pointer flex items-center justify-between md:text-xl text-base text-white border-b border-white gap-2 bg-rose-500 hover:bg-opacity-80 transition px-4 py-2">
              <div class="flex items-center gap-2">
                <span class="material-icons-outlined">wallet</span>
              	Shop & Save
							</div>
            </a>
          </li>

          <li class="relative border-r border-rose-600 group">
            <a href="{{ route('drawing') }}"
              class="cursor-pointer flex items-center justify-between md:text-xl text-base text-white border-b border-white gap-2 bg-rose-500 hover:bg-opacity-80 transition px-4 py-2">
              <div class="flex items-center gap-2">
                <span class="material-icons-outlined">photo_camera</span>
                Winner
              </div>
            </a>
          </li>
          <li class="relative border-r border-rose-600 group">
            <div
              class="cursor-pointer flex items-center justify-between md:text-xl text-base text-white border-b border-white gap-2 bg-rose-500 hover:bg-opacity-80 transition px-4 py-2">
              <div class="flex items-center gap-2">
                <span class="material-icons-outlined">account_circle</span>
                Profile
              </div>
              <span class="material-icons-outlined">expand_more</span>
            </div>
            <ul
              class="absolute left-0 top-full bg-green-600 shadow-lg md:text-xl text-base text-white min-w-full hidden group-hover:block z-10">
              <li class="border-b border-white">
                <a href="{{ route('drawing.my') }}" class="flex items-center gap-2 p-2 hover:bg-green-700/90 transition">
                  <span class="material-icons-outlined">dashboard</span>
                  <span>Current Draw</span>
                </a>
              </li>
              <li class="border-b border-white">
                <a href="#wallet-history" class="flex items-center gap-2 p-2 hover:bg-green-700/90 transition">
                  <span class="material-icons-outlined">settings</span>
                  <span>Draw History</span>
                </a>
              </li>
              <li class="border-b border-white">
                <a href="#wallet-history" class="flex items-center gap-2 p-2 hover:bg-green-700/90 transition">
                  <span class="material-icons-outlined">settings</span>
                  <span>Transaction History</span>
                </a>
              </li>

              <li>
                <a href="{{ route('logout') }}" class="flex items-center gap-2 p-2 hover:bg-green-700/90 transition">
                  <span class="material-icons-outlined">logout</span>
                  <span>Logout</span>
                </a>
              </li>
            </ul>
          </li>
-->
				</ul>
      </div>
    </section>

     @yield('content')

  </main>

  <!-- Footer -->
  <footer class="bg-omarcogrey text-black py-8">
    <div class="container px-4 mx-auto max-w-7xl">
      <div class="grid lg:grid-cols-4 grid-cols-2 gap-8 mb-8">
        <!-- Column 1: Omarco Edusav -->
        <div>
          <h5 class="font-bold text-lg mb-3">Omarco Edusav</h5>
          <ul class="space-y-2 text-sm">
            <li><a href="{{ route('home') }}" class="hover:text-omarcogreen transition-colors">Home</a></li>
            <li><a href="{{ route('content-detail',8 ) }}" class="hover:text-omarcogreen transition-colors">About</a></li>
            <li><a href="{{ route('content-detail',21 ) }}" class="hover:text-omarcogreen transition-colors">Service</a></li>
            <li><a href="{{ route('content-video') }}" class="hover:text-omarcogreen transition-colors">Search</a></li>
            <li><a href="{{ route('content-detail',22 ) }}" class="hover:text-omarcogreen transition-colors">Contact</a></li>
          </ul>
        </div>

        <!-- Column 2: Legal -->
        <div>
          <h5 class="font-bold text-lg mb-3">Legal</h5>
          <ul class="space-y-2 text-sm">
            <li><a href="{{ route('content-detail',23 ) }}" class="hover:text-omarcogreen transition-colors">Terms of service</a></li>
            <li><a href="{{ route('content-detail',24 ) }}" class="hover:text-omarcogreen transition-colors">Trademarks</a></li>
            <li><a href="{{ route('content-detail',25 ) }}" class="hover:text-omarcogreen transition-colors">Privacy Policy</a></li>
          </ul>
        </div>

        <!-- Column 3: Company -->
        <div>
          <h5 class="font-bold text-lg mb-3">Company</h5>
          <ul class="space-y-2 text-sm">
            <li><a href="{{ route('content-detail',26 ) }}" class="hover:text-omarcogreen transition-colors">Careers</a></li>
            <li><a href="{{ route('content-detail',27 ) }}" class="hover:text-omarcogreen transition-colors">Made in Indonesia</a></li>
            <li><a href="{{ route('content-detail',28 ) }}" class="hover:text-omarcogreen transition-colors">Advertise</a></li>
            <li><a href="{{ route('content-detail',29 ) }}" class="hover:text-omarcogreen transition-colors">Help</a></li>
          </ul>
        </div>

        <!-- Column 4: Connect With Us -->
        <div>
          <h5 class="font-bold text-lg mb-3">Connect With Us</h5>
          <div class="flex space-x-3">
            <a href="#" class="text-gray-400 hover:text-omarcogreen"><img
                src="{{ config('urls.social_icons.facebook') }}"
                alt="Facebook social media icon" class="rounded w-6 h-6"></a>
            <a href="#" class="text-gray-400 hover:text-omarcogreen"><img
                src="{{ config('urls.social_icons.twitter') }}"
                alt="Twitter social media icon" class="rounded w-6 h-6"></a>
            <a href="#" class="text-gray-400 hover:text-omarcogreen"><img
                src="{{ config('urls.social_icons.instagram') }}"
                alt="Instagram social media icon" class="rounded w-6 h-6"></a>
          </div>
        </div>
      </div>
      <div class="border-t pt-8 text-center text-sm">
        <p>© 2025 Omarco Edusav. All Rights Reserved.</p>
      </div>
    </div>
  </footer>

  <script>
      const menuToggle = document.getElementById('mobile-menu-toggle');
      const mobileMenu = document.getElementById('mobile-menu');
      const mobileMenuLinks = mobileMenu.querySelectorAll('a');
      const dropdownTrigger = document.getElementById('mobile-account-trigger');
      const dropdownMenu = document.getElementById('mobile-account-dropdown');
      const dropdownIcon = document.getElementById('mobile-account-icon');

      function closeMobileMenu() {
        if (mobileMenu.classList.contains('open')) {
          mobileMenu.classList.remove('open');
          mobileMenu.classList.add('hidden');
          menuToggle.innerHTML = '<span class="material-icons-outlined !text-gray-500">menu</span>';
        }
      }

      function collapseAccountDropdown() {
        if (!dropdownMenu.classList.contains('hidden')) {
          dropdownMenu.classList.add('hidden');
          dropdownIcon.classList.remove('rotate-180');
        }
      }

      menuToggle?.addEventListener('click', () => {
        console.log("Menu toggle clicked");
        mobileMenu.classList.toggle('hidden');
        mobileMenu.classList.toggle('open');
        if (mobileMenu.classList.contains('open')) {
          menuToggle.innerHTML = '<span class="material-icons-outlined !text-gray-500">close</span>';
        } else {
          menuToggle.innerHTML = '<span class="material-icons-outlined !text-gray-500">menu</span>';
          collapseAccountDropdown();
        }
      });

      mobileMenuLinks.forEach(link => {
        link.addEventListener('click', () => {
          collapseAccountDropdown();
          closeMobileMenu();
        });
      });

      dropdownTrigger?.addEventListener('click', e => {
        e.preventDefault();
        dropdownMenu.classList.toggle('hidden');
        dropdownIcon.classList.toggle('rotate-180');
      });

        document.addEventListener('DOMContentLoaded', () => {
        const menuToggles = document.querySelectorAll('.content-menu-toggle');

        menuToggles.forEach(toggle => {
            if (window.innerWidth < 768) { 
            toggle.addEventListener('click', function() {
                const dropdown = this.nextElementSibling;
                const toggleIcon = this.querySelector('.toggle-icon');
                
                if (dropdown && dropdown.classList.contains('content-dropdown')) {
                const isHidden = dropdown.classList.contains('hidden');
                
                document.querySelectorAll('.content-dropdown').forEach(dd => {
                    if (dd !== dropdown) {
                    dd.classList.add('hidden');
                    dd.previousElementSibling.querySelector('.toggle-icon').classList.remove('rotate-180');
                    }
                });

                if (isHidden) {
                    dropdown.classList.remove('hidden');
                    toggleIcon.classList.add('rotate-180');
                } else {
                    dropdown.classList.add('hidden');
                    toggleIcon.classList.remove('rotate-180');
                }
                }
            });
            }
        });

        window.addEventListener('resize', () => {
            location.reload();
        });
        });

        

        // ** START New JavaScript for Mobile Dropdown **
        document.addEventListener('DOMContentLoaded', function () {
            const dropdownTrigger = document.getElementById('mobile-account-trigger');
            const dropdownMenu = document.getElementById('mobile-account-dropdown');
            const dropdownIcon = document.getElementById('mobile-account-icon');

            if (dropdownTrigger && dropdownMenu) {
                dropdownTrigger.addEventListener('click', function (e) {
                    e.preventDefault(); // Prevent any default link/button action

                    // Toggle the 'hidden' class on the dropdown menu
                    dropdownMenu.classList.toggle('hidden');

                    // Toggle the 'rotate-180' class on the icon
                    if (dropdownIcon) {
                        dropdownIcon.classList.toggle('rotate-180');
                    }
                });
            }
        });
        // ** END New JavaScript for Mobile Dropdown **
    </script>
  @yield('additional-js')

</body>

<script>
var BASE_URL="{{ config('urls.base.web') }}";
var API_URL="{{ config('urls.base.api') }}/api";

function loading(){
    var output = '<div align="center"><br /><br /><br />';
    output += '<img src="'+BASE_URL+'/assets/img/icegif-loading.gif" width="30" /> Please wait...</div>';
    return output;
  }

const formatWithDecimal = new Intl.NumberFormat('id-ID', {
  minimumFractionDigits: 2,
  maximumFractionDigits: 2
});
</script>
<script src="/js/edusav_all.js"></script>
</html>
