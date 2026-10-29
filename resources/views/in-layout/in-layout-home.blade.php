<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Omarco - Be Better With Money</title>

  <style>
    .rotate-180 {
      transform: rotate(180deg);
    }
  </style>

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
  <header class="header-bg bg-omarcogray text-white shadow-lg top-0 w-full z-50">
        <div class="container px-4 mx-auto py-3 flex justify-between items-center max-w-7xl">
            <a href="/" class="text-3xl font-bold flex items-center">
                <img src="/assets/images/edusav.png" alt="Omarco Logotype" class="h-8 md:h-10">
            </a>

            <button id="mobile-menu-toggle" class="lg:hidden p-2 rounded focus:outline-none mobile-menu-toggle">
                <span class="material-icons-outlined !text-gray-500">menu</span>
            </button>

           <nav class="hidden lg:flex items-center space-x-1 text-sm lg:text-base" role="navigation" aria-label="Main">
                                <a href="{{ route('home') }}"
                    class="group flex items-center py-2 px-3 rounded-md transition-colors duration-200">
                    <div class="bg-white rounded-full p-1 flex items-center justify-center transition-colors duration-200 group-hover:bg-gray-100">
                    <span class="material-icons-outlined text-gray-600 transition-colors duration-200 group-hover:text-omarcogreen">home</span>
                    </div>
                    <span class="ml-2 text-gray-600 transition-colors duration-200 group-hover:text-omarcogreen">Home</span>
                </a>

                                <a href="{{ route('content-detail',8) }}"
                    class="group flex items-center py-2 px-3 rounded-md transition-colors duration-200">
                    <div class="bg-white rounded-full p-1 flex items-center justify-center transition-colors duration-200 group-hover:bg-gray-100">
                    <span class="material-icons-outlined text-gray-600 transition-colors duration-200 group-hover:text-omarcogreen">info</span>
                    </div>
                    <span class="ml-2 text-gray-600 transition-colors duration-200 group-hover:text-omarcogreen">About Omarco Voucher</span>
                </a>

                                <a href="{{ route('content-detail',9) }}"
                    class="group flex items-center py-2 px-3 rounded-md transition-colors duration-200">
                    <div class="bg-white rounded-full p-1 flex items-center justify-center transition-colors duration-200 group-hover:bg-gray-100">
                    <span class="material-icons-outlined text-gray-600 transition-colors duration-200 group-hover:text-omarcogreen">article</span>
                    </div>
                    <span class="ml-2 text-gray-600 transition-colors duration-200 group-hover:text-omarcogreen">Driving Financial Inclusion</span>
                </a>

                                <a href="{{ route('content-detail',10) }}"
                    class="group flex items-center py-2 px-3 rounded-md transition-colors duration-200">
                    <div class="bg-white rounded-full p-1 flex items-center justify-center transition-colors duration-200 group-hover:bg-gray-100">
                    <span class="material-icons-outlined text-gray-600 transition-colors duration-200 group-hover:text-omarcogreen">contacts</span>
                    </div>
                    <span class="ml-2 text-gray-600 transition-colors duration-200 group-hover:text-omarcogreen">Multiple Benefits</span>
                </a>

                                <a href="{{ route('content-detail',33) }}"
                    class="group flex items-center py-2 px-3 rounded-md transition-colors duration-200">
                    <div class="bg-white rounded-full p-1 flex items-center justify-center transition-colors duration-200 group-hover:bg-gray-100">
                    <span class="material-icons-outlined text-gray-600 transition-colors duration-200 group-hover:text-omarcogreen">dashboard</span>
                    </div>
                    <span class="ml-2 text-gray-600 transition-colors duration-200 group-hover:text-omarcogreen">Prize Draw Info</span>
                </a>

                                                <!--<div class="relative group z-[9999]">                     <button type="button"
                            class="flex items-center py-2 px-3 rounded-md transition-colors duration-200 bg-transparent">
                    <div class="bg-white rounded-full p-1 flex items-center justify-center transition-colors duration-200 group-hover:bg-gray-100">
                        <span class="material-icons-outlined text-gray-600 transition-colors duration-200 group-hover:text-omarcogreen">account_circle</span>
                    </div>
                    <span class="ml-2 text-gray-600 transition-colors duration-200 group-hover:text-omarcogreen">My Account</span>
                    <span class="material-icons-outlined ml-2 text-gray-600 transition-colors duration-200 group-hover:text-omarcogreen">expand_more</span>
                    </button>

                    <ul class="absolute left-0 top-full bg-omarcogreen shadow-lg text-base text-white min-w-full hidden group-hover:block">
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


        <div id="mobile-menu" class="mobile-menu lg:hidden bg-gray-700 hidden overflow-y-auto max-h-[calc(100vh-4rem)]">
            <nav class="flex flex-col p-4 space-y-1">
              <a href="{{ route('home') }}" class="flex items-center py-2 px-3 rounded-md hover:!text-omarcogreen">
                <span class="flex items-center gap-2"><span class="material-icons-outlined">home</span>Home</span>
              </a>
              <a href="{{ route('content-detail',8) }}" class="flex items-center py-2 px-3 rounded-md hover:!text-omarcogreen">
                <span class="flex items-center gap-2"><span class="material-icons-outlined">info</span>About Omarco Voucher</span>
              </a>
              <a href="{{ route('content-detail',9) }}" class="flex items-center py-2 px-3 rounded-md hover:!text-omarcogreen">
                <span class="flex items-center gap-2"><span class="material-icons-outlined">article</span>Driving Financial Inclusion
              </a>
              <a href="{{ route('content-detail',10) }}" class="flex items-center py-2 px-3 rounded-md hover:!text-omarcogreen">
                <span class="flex items-center gap-2"><span class="material-icons-outlined">contacts</span>Multiple Benefits</span>
              </a>
              <a href="{{ route('content-detail',33) }}" class="flex items-center py-2 px-3 rounded-md hover:!text-omarcogreen">
                <span class="flex items-center gap-2"><span class="material-icons-outlined">dashboard</span>Prize Draw Info</span>
              </a>

                <!--<div class="relative">
                    <button id="mobile-account-trigger" class="w-full flex items-center justify-between py-2 px-3 rounded-md hover:!text-omarcogreen">
                        <span class="flex items-center gap-2">
                            <span class="material-icons-outlined">account_circle</span>My Account
                        </span>
                        <span id="mobile-account-icon" class="material-icons-outlined transition-transform duration-300">expand_more</span>
                    </button>

                    <ul id="mobile-account-dropdown" class="relative mt-1 bg-omarcogreen shadow-lg text-base text-white min-w-full hidden rounded-md z-10">
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


  <main>@yield('content')</main>

  <footer class="bg-omarcogrey text-black py-8">
    <!-- unchanged footer -->
    <div class="container px-4 mx-auto max-w-7xl">
      <div class="grid lg:grid-cols-4 grid-cols-2 gap-8 mb-8">
        <!-- ...footer content... -->
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

  <script>
    var BASE_URL = "{{ config('urls.base.web') }}";
    function loading() {
      return '<div align="center"><br /><br /><br /><img src="' + BASE_URL + '/assets/img/icegif-loading.gif" width="30" /> Please wait...</div>';
    }
    const formatWithDecimal = new Intl.NumberFormat('id-ID', {
      minimumFractionDigits: 2,
      maximumFractionDigits: 2
    });
  </script>

  <script src="/js/edusav_all.js"></script>

  @yield('script')
</body>
</html>