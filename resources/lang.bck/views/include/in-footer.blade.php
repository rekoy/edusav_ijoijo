  <!-- Footer -->
  <footer class="bg-omarcogrey text-black py-8">
    <div class="container mx-auto">
      <div class="mx-auto max-w-7xl md:px-0 px-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
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

</html>
