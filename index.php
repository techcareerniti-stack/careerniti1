<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Dashboard | CareerNiti</title>

<!-- ✅ Tailwind CSS -->
<link rel="stylesheet" href="/career/assets/css/output.css">

<!-- Font Awesome -->
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-100">

<!-- ✅ NAVBAR INCLUDE (CORRECT PATH) -->
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/career/includes/usernavbar.php';
?>

<!-- SPACE FOR FIXED NAVBAR -->
<div class="h-16"></div>

<!-- ✅ PAGE CONTENT -->
<section class="max-w-7xl mx-auto px-6 py-10">
  <h1 class="text-3xl font-bold text-gray-800 mb-4">
    Welcome to Student Dashboard
  </h1>

  <p class="text-gray-600 mb-8">
    Explore careers, courses, colleges, and guidance tailored for you.
  </p>

  <!-- CARDS -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

    <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
      <i class="fa-solid fa-graduation-cap text-3xl text-orange-500 mb-4"></i>
      <h3 class="text-xl font-semibold mb-2">Career Guidance</h3>
      <p class="text-gray-600">Get expert career counseling.</p>
    </div>

    <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
      <i class="fa-solid fa-book text-3xl text-blue-500 mb-4"></i>
      <h3 class="text-xl font-semibold mb-2">Courses</h3>
      <p class="text-gray-600">Find best courses for your future.</p>
    </div>

    <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
      <i class="fa-solid fa-building-columns text-3xl text-green-500 mb-4"></i>
      <h3 class="text-xl font-semibold mb-2">Colleges</h3>
      <p class="text-gray-600">Explore top colleges in India.</p>
    </div>

  </div>
</section>

<!-- ✅ FOOTER INCLUDE -->
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/career/includes/footer.php';
?>

</body>
</html>