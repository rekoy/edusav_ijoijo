<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Omarco - Be Better With Money</title>
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
      <!-- Logo -->
      <a href="/" class="text-3xl font-bold flex items-center">
        <img src="/assets/images/logo.png" alt="Omarco Logotype" class="h-8 md:h-10">
      </a>

      <!-- Mobile Menu Toggle -->
      <button id="mobile-menu-toggle" class="md:hidden p-2 rounded focus:outline-none mobile-menu-toggle">
        <span class="material-icons-outlined">menu</span>
      </button>

      <!-- Desktop Navigation -->
      <nav class="hidden md:flex items-center space-x-4 text-sm lg:text-base">
        <a href="{{ route('home') }}" class="transition-colors duration-200 flex items-center py-2 px-3 rounded-md hover:text-omarcogreen">
          <span class="nav-icon-container text-omarcogrey"><span class="material-icons-outlined">home</span></span>Home
        </a>
        <a href="#" class="transition-colors duration-200 flex items-center py-2 px-3 rounded-md hover:text-omarcogreen">
          <span class="nav-icon-container text-omarcogrey"><span class="material-icons-outlined">info</span></span>About Omarco Voucher
        </a>
        <a href="#" class="transition-colors duration-200 flex items-center py-2 px-3 rounded-md hover:text-omarcogreen">
          <span class="nav-icon-container text-omarcogrey"><span
              class="material-icons-outlined">article</span></span>Driving Financial Inclusion
        </a>
        <a href="#" class="transition-colors duration-200 flex items-center py-2 px-3 rounded-md hover:text-omarcogreen">
          <span class="nav-icon-container text-omarcogrey"><span
              class="material-icons-outlined">contacts</span></span>Multiple Benefits
        </a>
        <!--<a href="#" class="transition-colors duration-200 flex items-center py-2 px-3 rounded-md hover:text-omarcogreen">
          <span class="nav-icon-container text-omarcogrey"><span
              class="material-icons-outlined">settings</span></span>Settings
        </a>-->
        <a href="{{ route('dashboard') }}" class="transition-colors duration-200 flex items-center py-2 px-3 rounded-md hover:text-omarcogreen">
          <span class="nav-icon-container text-omarcogrey"><span
              class="material-icons-outlined">dashboard</span></span>Prize Draw Info
        </a>

      </nav>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="mobile-menu md:hidden bg-gray-700">
      <nav class="flex flex-col p-4 space-y-1">
        <a href="{{ route('home') }}" class="transition-colors duration-200 flex items-center py-2 px-3 rounded-md hover:text-omarcogreen">
          <span class="nav-icon-container text-omarcogrey"><span class="material-icons-outlined">home</span></span>Home
        </a>
        <a href="#" class="transition-colors duration-200 flex items-center py-2 px-3 rounded-md hover:text-omarcogreen">
          <span class="nav-icon-container text-omarcogrey"><span class="material-icons-outlined">info</span></span>About Omarco Voucher
        </a>
        <a href="#" class="transition-colors duration-200 flex items-center py-2 px-3 rounded-md hover:text-omarcogreen">
          <span class="nav-icon-container text-omarcogrey"><span
              class="material-icons-outlined">article</span></span>Driving Financial Inclusion
        </a>
        <a href="#" class="transition-colors duration-200 flex items-center py-2 px-3 rounded-md hover:text-omarcogreen">
          <span class="nav-icon-container text-omarcogrey"><span
              class="material-icons-outlined">contacts</span></span>Multiple Benefits
        </a>
        <!--<a href="#" class="transition-colors duration-200 flex items-center py-2 px-3 rounded-md hover:text-omarcogreen">
          <span class="nav-icon-container text-omarcogrey"><span
              class="material-icons-outlined">settings</span></span>Settings
        </a>-->
        <a href="{{ route('dashboard') }}" class="transition-colors duration-200 flex items-center py-2 px-3 rounded-md hover:text-omarcogreen">
          <span class="nav-icon-container text-omarcogrey"><span
              class="material-icons-outlined">dashboard</span></span>Prize Draw Info
        </a>
      </nav>
    </div>
  </header>

  <!-- Main Content -->
  <main>
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
            <li><a href="#" class="hover:text-omarcogreen transition-colors">Home</a></li>
            <li><a href="#" class="hover:text-omarcogreen transition-colors">About</a></li>
            <li><a href="#" class="hover:text-omarcogreen transition-colors">Service</a></li>
            <li><a href="#" class="hover:text-omarcogreen transition-colors">Search</a></li>
            <li><a href="#" class="hover:text-omarcogreen transition-colors">Contact</a></li>
          </ul>
        </div>

        <!-- Column 2: Legal -->
        <div>
          <h5 class="font-bold text-lg mb-3">Legal</h5>
          <ul class="space-y-2 text-sm">
            <li><a href="#" class="hover:text-omarcogreen transition-colors">Terms of service</a></li>
            <li><a href="#" class="hover:text-omarcogreen transition-colors">Trademarks</a></li>
            <li><a href="#" class="hover:text-omarcogreen transition-colors">Privacy Policy</a></li>
          </ul>
        </div>

        <!-- Column 3: Company -->
        <div>
          <h5 class="font-bold text-lg mb-3">Company</h5>
          <ul class="space-y-2 text-sm">
            <li><a href="#" class="hover:text-omarcogreen transition-colors">Careers</a></li>
            <li><a href="#" class="hover:text-omarcogreen transition-colors">Made in Indonesia</a></li>
            <li><a href="#" class="hover:text-omarcogreen transition-colors">Advertise</a></li>
            <li><a href="#" class="hover:text-omarcogreen transition-colors">Help</a></li>
          </ul>
        </div>

        <!-- Column 4: Connect With Us -->
        <div>
          <h5 class="font-bold text-lg mb-3">Connect With Us</h5>
          <div class="flex space-x-3">
            <a href="#" class="text-gray-400 hover:text-omarcogreen"><img
                src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/93a3212f-25ff-4ac6-b507-119de3daf31f.png"
                alt="Facebook social media icon" class="rounded w-6 h-6"></a>
            <a href="#" class="text-gray-400 hover:text-omarcogreen"><img
                src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/2aed0bbd-40b9-48e0-8b58-1760e8bbde02.png"
                alt="Twitter social media icon" class="rounded w-6 h-6"></a>
            <a href="#" class="text-gray-400 hover:text-omarcogreen"><img
                src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/1cc59efe-223c-47aa-ba0c-2d7b5b3aae0b.png"
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
    // Mobile menu toggle
    const menuToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileMenuLinks = mobileMenu.querySelectorAll('a'); // Get all links in mobile menu

    if (menuToggle && mobileMenu) {
      menuToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('open');
        if (mobileMenu.classList.contains('open')) {
          menuToggle.innerHTML = '<span class="material-icons-outlined text-white">close</span>';
        } else {
          menuToggle.innerHTML = '<span class="material-icons-outlined text-white">menu</span>';
        }
      });

      // Close mobile menu when a link is clicked
      mobileMenuLinks.forEach(link => {
        link.addEventListener('click', () => {
          if (mobileMenu.classList.contains('open')) {
            mobileMenu.classList.remove('open');
            menuToggle.innerHTML = '<span class="material-icons-outlined text-white">menu</span>';
          }
        });
      });
    }
  </script>

</body>
<script>
var BASE_URL="{{ config('urls.base.web') }}";
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
