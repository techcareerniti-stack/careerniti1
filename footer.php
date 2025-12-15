<footer class="bg-gray-200 text-gray-700 pt-12">
  <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-5 gap-8">

    <!-- TOP STREAMS -->
    <div>
      <h4 class="text-gray-900 font-semibold mb-4">TOP STREAMS</h4>
      <ul class="space-y-2 text-sm">
        <li><a href="#" class="hover:text-indigo-600">Engineering</a></li>
        <li><a href="#" class="hover:text-indigo-600">Medical</a></li>
        <li><a href="#" class="hover:text-indigo-600">Management</a></li>
        <li><a href="#" class="hover:text-indigo-600">Law</a></li>
      </ul>
    </div>

    <!-- TOP COURSES -->
    <div>
      <h4 class="text-gray-900 font-semibold mb-4">TOP COURSES</h4>
      <ul class="space-y-2 text-sm">
        <li><a href="#" class="hover:text-indigo-600">B.Tech / B.E</a></li>
        <li><a href="#" class="hover:text-indigo-600">M.Tech</a></li>
        <li><a href="#" class="hover:text-indigo-600">MBBS</a></li>
        <li><a href="#" class="hover:text-indigo-600">BHMS</a></li>
      </ul>
    </div>

    <!-- TOP EXAMS -->
    <div>
      <h4 class="text-gray-900 font-semibold mb-4">TOP EXAMS</h4>
      <ul class="space-y-2 text-sm">
        <li><a href="#" class="hover:text-indigo-600">JEE Main</a></li>
        <li><a href="#" class="hover:text-indigo-600">NEET</a></li>
        <li><a href="#" class="hover:text-indigo-600">CAT</a></li>
        <li><a href="#" class="hover:text-indigo-600">GATE</a></li>
      </ul>
    </div>

    <!-- TOP COLLEGES -->
    <div>
      <h4 class="text-gray-900 font-semibold mb-4">TOP COLLEGES</h4>
      <ul class="space-y-2 text-sm">
        <li><a href="#" class="hover:text-indigo-600">VIT</a></li>
        <li><a href="#" class="hover:text-indigo-600">IIT Delhi</a></li>
        <li><a href="#" class="hover:text-indigo-600">AIIMS Delhi</a></li>
      </ul>
    </div>

    <!-- SUBSCRIBE -->
    <div>
      <h4 class="text-gray-900 font-semibold mb-4">Subscribe</h4>
      <form class="space-y-3">
        <input
          type="email"
          placeholder="Enter your email"
          class="w-full px-4 py-2 rounded bg-white border border-gray-300 focus:outline-none focus:border-indigo-500"
        >
        <button
          type="submit"
          class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded">
          Subscribe
        </button>
      </form>
      <p class="text-xs text-gray-600 mt-3">
        By subscribing to our newsletter you agree with our
        <a href="/privacy" class="text-indigo-600 hover:underline">Privacy Policy</a>
      </p>
    </div>

  </div>

  <!-- LOGO + COPYRIGHT -->
  <div class="border-t border-gray-300 mt-10 py-6 text-center">
    <img
      src="/careerniti/assets/images/FooterLogo.png"
      alt="Career NiTi Logo"
      class="mx-auto mb-3 w-32"
    >
    <p class="text-sm text-gray-600">
      © Copyright <?= date("Y"); ?> Career NiTi. All Rights Reserved
    </p>
  </div>
</footer>
