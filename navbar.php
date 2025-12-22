<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Navbar</title>

  <!-- Tailwind CSS -->
  <link rel="stylesheet" href="/career/assets/css/output.css">

</head>

<body class="bg-gray-100">

<!-- FIXED NAVBAR -->
<nav class="bg-white shadow-md fixed top-0 left-0 w-full z-50">
  <div class="max-w-7xl mx-auto px-4">
    <div class="flex items-center h-16">

      <!-- LOGO -->
      <div class="flex items-center">
        <img
          src="assets/images/Careerniti_logo.png"
          alt="Careerniti Logo"
          class="h-10 w-auto"
        />
      </div>

      <!-- SPACE -->
      <div class="flex-1"></div>

      <!-- DESKTOP MENU -->
      <div class="hidden md:flex items-center gap-6 h-16">

        <a href="index.php"
           class="text-gray-700 hover:text-orange-500 font-medium">
          Home
        </a>

        <a href="career.php"
           class="text-gray-700 hover:text-orange-500 font-medium">
          career
        </a>

        <a href="exam.php"
           class="text-gray-700 hover:text-orange-500 font-medium">
          Exam
        </a>

        <a href="admission.php"
           class="text-gray-700 hover:text-orange-500 font-medium">
          Admission
        </a>
        <a href="notification.php"
           class="text-gray-700 hover:text-orange-500 font-medium">
          Notification
        </a>

        <a href="about.php"
           class="text-gray-700 hover:text-orange-500 font-medium">
          About Us
        </a>

       

        <a href="contact.php"
           class="text-gray-700 hover:text-orange-500 font-medium">
          Contact Us
        </a>

        <!-- REGISTER
        <a href="register.php"
           class="bg-gradient-to-r
            from-orange-500 to-pink-500 text-white px-10 py-2 
            rounded-md hover:opacity-90 transition">
          Register
        </a> -->

        <!-- LOGIN -->
        <a href="login.php"
           class="bg-gradient-to-r 
           from-orange-500 to-pink-500 text-white 
           px-8 py-2 rounded-md hover:opacity-90 transition">
          Login
        </a>
      </div>

      <!-- MOBILE BUTTON -->
      <button
        id="menu-btn"
        class="md:hidden text-2xl text-gray-700 focus:outline-none"
        aria-label="Toggle Menu">
        <span id="open-icon">☰</span>
        <span id="close-icon" class="hidden">✖</span>
      </button>

    </div>
  </div>

  <!-- MOBILE MENU -->
  <div id="mobile-menu" class="hidden md:hidden bg-white border-t shadow-lg">
    <div class="px-4 py-4 space-y-3">

      <a href="index.php" class="block py-2 text-gray-700 hover:bg-gray-50 no-underline">
        Home
      </a>

      <a href="about.php" class="block py-2 text-gray-700 hover:bg-gray-50 no-underline">
        About Us
      </a>

      <a href="services.php" class="block py-2 text-gray-700 hover:bg-gray-50 no-underline">
        Services
      </a>

      <a href="contact.php" class="block py-2 text-gray-700 hover:bg-gray-50 no-underline">
        Contact Us
      </a>

      <!-- REGISTER -->
      <a href="register.php"
         class="block text-center border border-orange-500 text-orange-500
                px-6 py-2 rounded-md
                hover:bg-orange-500 hover:text-white
                transition duration-200">
        Register
      </a>

      <!-- LOGIN -->
      <a href="login.php"
         class="block text-center bg-gradient-to-r from-orange-500 to-pink-500 text-white
                px-6 py-2 rounded-md
                hover:opacity-90 transition duration-200">
        Login
      </a>

    </div>
  </div>
</nav>

<!-- SPACE FOR FIXED NAVBAR -->
<div class="h-16"></div>

<!-- SCRIPT -->
<script>
if (!window.navbarInitialized) {
  window.navbarInitialized = true;

  const btn = document.getElementById("menu-btn");
  const menu = document.getElementById("mobile-menu");
  const openIcon = document.getElementById("open-icon");
  const closeIcon = document.getElementById("close-icon");

  btn.addEventListener("click", function (e) {
    e.stopPropagation();
    menu.classList.toggle("hidden");
    openIcon.classList.toggle("hidden");
    closeIcon.classList.toggle("hidden");
  });

  document.addEventListener("click", function (e) {
    if (!menu.contains(e.target) && !btn.contains(e.target)) {
      menu.classList.add("hidden");
      openIcon.classList.remove("hidden");
      closeIcon.classList.add("hidden");
    }
  });
}
</script>

</body>
</html>
