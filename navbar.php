<!-- FIXED NAVBAR -->
<nav class="bg-white shadow-md fixed top-0 left-0 w-full z-50">
  <div class="max-w-7xl mx-auto px-4">
    <div class="flex items-center h-16">

      <!-- LEFT: Logo -->
      <div class="flex items-center">
        <img
          src="assets/images/Careerniti_logo.png"
          alt="Careerniti Logo"
          class="h-10 w-auto"
        />
      </div>

      <!-- FLEX SPACER (CREATES BIG GAP) -->
      <div class="flex-1"></div>

      <!-- RIGHT: Desktop Menu -->
      <div class="hidden md:flex items-center space-x-10">
        <a href="index.php" class="text-gray-700 hover:text-orange-500 font-medium no-underline">Home</a>
        <a href="career.php" class="text-gray-700 hover:text-orange-500 font-medium no-underline">Career</a>
        <a href="exam.php" class="text-gray-700 hover:text-orange-500 font-medium no-underline">Exam</a>
        <a href="admission.php" class="text-gray-700 hover:text-orange-500 font-medium no-underline">Admission</a>
        <a href="notification.php" class="text-gray-700 hover:text-orange-500 font-medium no-underline">Notification</a>
        <a href="about.php" class="text-gray-700 hover:text-orange-500 font-medium no-underline">About Us</a>
        <a href="contact.php" class="text-gray-700 hover:text-orange-500 font-medium no-underline">Contact Us</a>

        <!-- Login Button (LAST ITEM) -->
        <a
          href="login.php"
          class="border border-orange-500 text-orange-500 px-8 py-1 rounded-md hover:bg-orange-500 hover:text-white transition-colors duration-200"
        >
          Login
        </a>
      </div>

      <!-- Mobile Menu Button (RIGHT END) -->
      <button
        id="menu-btn"
        class="md:hidden text-2xl text-gray-700 focus:outline-none"
        aria-label="Toggle Menu"
      >
        <span id="open-icon">☰</span>
        <span id="close-icon" class="hidden">✖</span>
      </button>

    </div>
  </div>

  <!-- Mobile Menu -->
  <div id="mobile-menu" class="hidden md:hidden bg-white border-t shadow-lg">
    <div class="px-4 py-4 space-y-3">
      <a href="index.php" class="block text-gray-700 no-underline py-2 hover:bg-gray-50">Home</a>
      <a href="career.php" class="block text-gray-700 no-underline py-2 hover:bg-gray-50">Career</a>
      <a href="exam.php" class="block text-gray-700 no-underline py-2 hover:bg-gray-50">Exam</a>
      <a href="admission.php" class="block text-gray-700 no-underline py-2 hover:bg-gray-50">Admission</a>
      <a href="notification.php" class="block text-gray-700 no-underline py-2 hover:bg-gray-50">Notification</a>
      <a href="about.php" class="block text-gray-700 no-underline py-2 hover:bg-gray-50">About Us</a>
      <a href="contact.php" class="block text-gray-700 no-underline py-2 hover:bg-gray-50">Contact Us</a>

      <a
        href="login.php"
        class="inline-block border border-orange-500 text-orange-500 px-8 py-2 rounded-md hover:bg-orange-500 hover:text-white transition-colors duration-200"
      >
        Login
      </a>
    </div>
  </div>
</nav>

<!-- SPACE FOR FIXED NAVBAR -->
<div class="h-16"></div>

<!-- Mobile Menu Toggle Script - FIXED VERSION -->
<script>
// Check if navbar script already ran
if (!window.navbarInitialized) {
  window.navbarInitialized = true;
  
  const btn = document.getElementById("menu-btn");
  const menu = document.getElementById("mobile-menu");
  const openIcon = document.getElementById("open-icon");
  const closeIcon = document.getElementById("close-icon");
  
  // Only add event listeners if elements exist
  if (btn && menu && openIcon && closeIcon) {
    btn.addEventListener("click", (e) => {
      e.stopPropagation(); // Prevent event bubbling
      menu.classList.toggle("hidden");
      openIcon.classList.toggle("hidden");
      closeIcon.classList.toggle("hidden");
    });
    
    // Close menu when clicking outside
    document.addEventListener('click', function(event) {
      if (!menu.contains(event.target) && !btn.contains(event.target)) {
        menu.classList.add('hidden');
        openIcon.classList.remove('hidden');
        closeIcon.classList.add('hidden');
      }
    });
    
    // Close menu when clicking a link
    const mobileLinks = menu.querySelectorAll('a');
    mobileLinks.forEach(link => {
      link.addEventListener('click', () => {
        menu.classList.add('hidden');
        openIcon.classList.remove('hidden');
        closeIcon.classList.add('hidden');
      });
    });
  }
}
</script>
