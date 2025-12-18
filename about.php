<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About Us - CareerNiTi</title>
<meta name="description" content="Learn about CareerNiTi's mission, vision, services, and how we empower students across India to achieve their career goals.">
<meta name="keywords" content="Career guidance, Admission support, Exam counselling, CareerNiTi, Education India">
<link rel="icon" type="image/png" href="../assets/images/Careerniti_logo.png">
<link href="../assets/css/output.css" rel="stylesheet">
</head>
<body class="bg-orange-50 font-sans antialiased">

<!-- Navbar -->
<?php include_once '../includes/navbar.php'; ?>

<div class="h-20"></div>

<!-- Breadcrumb -->
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-4 text-sm text-gray-600">
    <a href="../index.php" class="hover:text-orange-600">Home</a> &gt; <span>About Us</span>
</div>

<!-- Header -->
<header class="text-center py-12 bg-gradient-to-r from-orange-500 to-red-500 text-white shadow-md">
    <h1 class="text-3xl md:text-4xl font-extrabold tracking-wide">About Us</h1>
    <p class="mt-3 text-sm md:text-base opacity-90 max-w-xl mx-auto">
        Empowering students across India with structured career guidance and support.
    </p>
</header>

<main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 mt-12">

    <!-- Stylish About Card -->
    <section class="relative bg-gradient-to-br from-white via-orange-50 to-white rounded-3xl shadow-2xl p-10 sm:p-16 space-y-8 overflow-hidden">
        <!-- Decorative circles -->
        <div class="absolute -top-16 -left-16 w-40 h-40 bg-orange-200 rounded-full opacity-20"></div>
        <div class="absolute -bottom-16 -right-16 w-56 h-56 bg-red-200 rounded-full opacity-20"></div>

        <h2 class="text-3xl font-bold text-orange-600 text-center">Welcome to CareerNiTi</h2>
        
        <p class="text-gray-700 leading-relaxed text-center max-w-3xl mx-auto">
            CareerNiTi is your singular solution for a bright future. Since 2021, we have helped students across India transform confusion into clarity through structured career guidance and admission support.
        </p>
        
        <p class="text-gray-700 leading-relaxed text-center max-w-3xl mx-auto">
            We provide career guidance, counselling, exam mentoring, psychological support, and admission counselling, enabling students to make confident, informed decisions.
        </p>
        
        <p class="text-gray-700 leading-relaxed text-center max-w-3xl mx-auto">
            With over <strong>2,000 students counselled</strong> and <strong>10,000+ guided</strong>, CareerNiTi stands as a trusted educational partner.
        </p>

        <!-- Mission & Vision -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
            <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-lg transition">
                <h3 class="text-lg font-semibold text-orange-600 mb-2 flex items-center space-x-2">
                    <span>🌟</span>
                    <span>Our Vision</span>
                </h3>
                <p class="text-gray-700 leading-relaxed text-sm">
                    To revolutionize the Indian education ecosystem by empowering students to discover their true potential and pursue careers aligned with their strengths.
                </p>
            </div>
            <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-lg transition">
                <h3 class="text-lg font-semibold text-orange-600 mb-2 flex items-center space-x-2">
                    <span>🎯</span>
                    <span>Our Mission</span>
                </h3>
                <p class="text-gray-700 leading-relaxed text-sm">
                    To provide accessible, ethical, and personalized career guidance and admission support to students across India.
                </p>
            </div>
            <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-lg transition">
                <h3 class="text-lg font-semibold text-orange-600 mb-2 flex items-center space-x-2">
                    <span>💡</span>
                    <span>Our Values</span>
                </h3>
                <ul class="text-gray-700 text-sm list-disc list-inside space-y-1">
                    <li>Integrity & transparency</li>
                    <li>Student-centric approach</li>
                    <li>Innovation in mentoring</li>
                    <li>Continuous learning</li>
                    <li>Empowering decisions</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-12">
        <div class="bg-white rounded-xl shadow-md p-6 text-center hover:shadow-lg transition">
            <h4 class="text-lg font-semibold text-orange-600 mb-2">Career Guidance</h4>
            <p class="text-gray-700 text-sm">Expert mentorship to explore strengths and career paths.</p>
        </div>
        <div class="bg-white rounded-xl shadow-md p-6 text-center hover:shadow-lg transition">
            <h4 class="text-lg font-semibold text-orange-600 mb-2">Admission Support</h4>
            <p class="text-gray-700 text-sm">Personalized college and course selection.</p>
        </div>
        <div class="bg-white rounded-xl shadow-md p-6 text-center hover:shadow-lg transition">
            <h4 class="text-lg font-semibold text-orange-600 mb-2">Exam Counselling</h4>
            <p class="text-gray-700 text-sm">Guidance for JEE, NEET, CAT, GATE & more.</p>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="grid grid-cols-1 sm:grid-cols-3 gap-6 mt-12 text-center">
        <div class="bg-orange-100 rounded-xl p-6">
            <p class="text-3xl font-bold text-orange-600">2000+</p>
            <p class="text-sm">Students Counseled</p>
        </div>
        <div class="bg-orange-100 rounded-xl p-6">
            <p class="text-3xl font-bold text-orange-600">10000+</p>
            <p class="text-sm">Guided Students</p>
        </div>
        <div class="bg-orange-100 rounded-xl p-6">
            <p class="text-3xl font-bold text-orange-600">200+</p>
            <p class="text-sm">Connected Classes</p>
        </div>
    </section>

</main>

<div class="py-16"></div>

<!-- Footer -->
<?php include_once '../includes/footer.php'; ?>

</body>
</html>
