<?php
// about.php
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
    <link rel="icon" type="image/png" href="../assets/images/Careerniti_logo.png">
    <link href="../assets/css/tailwind.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="font-sans antialiased bg-orange-50">

    <!-- Navbar -->
    <?php include_once '../includes/navbar.php'; ?>

    <!-- Header Section -->
<header class="relative text-center py-6 sm:py-10 bg-gradient-to-r from-orange-500 to-red-500 text-white shadow-xl rounded-b-3xl">
    <h1 class="text-2xl sm:text-3xl md:text-4xl font-extrabold tracking-wide">
        About Us
    </h1>
    <p class="mt-2 text-xs sm:text-sm md:text-base opacity-90 px-4">
        Learn more about our mission, values & vision.
    </p>
</header>


    <!-- About Us Content -->
    <section class="max-w-5xl mx-auto px-5 sm:px-8 mt-10 space-y-8">
        <div class="bg-white rounded-3xl shadow-xl p-6 sm:p-10 border border-orange-100">
            <h2 class="text-2xl font-bold mb-4 text-orange-600">Welcome to CareerNiTi</h2>
            <p class="mb-4">
                CareerNiTi is your singular solution for a bright future. Since 2021, we have been transforming students' confusion into clarity by providing comprehensive career guidance and admission support across India. Through personalized mentorship and a compassionate approach, we help students embark on a journey of self-discovery. By understanding their strengths and interests, we empower them to make informed decisions about their future.
            </p>
            <p class="mb-4">
                We offer career guidance, career counselling, exam guidance, psychological counselling, and admission counselling, making course and college selection easy for students. Our platform provides a personalized experience based on educational background and career interests, enabling well-informed decisions.
            </p>
            <p class="mb-4">
                With a legacy of commitment and excellence, we have counselled over 2,000 students, guided more than 10,000 students, and connected with 200 classes, fostering a tradition of personalized support and impactful educational experiences as a trusted educational partner.
            </p>
        </div>

        <!-- Mission & Vision Section -->
        <div x-data="{ openSection: null }" class="space-y-4">
            <!-- Vision -->
            <div class="bg-white rounded-2xl shadow-lg p-4 border border-orange-100">
                <button @click="openSection = openSection === 'vision' ? null : 'vision'" class="w-full flex justify-between items-center text-left focus:outline-none">
                    <span class="text-orange-600 font-semibold">Our Vision</span>
                    <svg :class="{'rotate-180': openSection === 'vision'}" class="h-5 w-5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="openSection === 'vision'" x-transition class="mt-2 text-sm text-gray-700">
                    At CareerNiTi, our bold vision is to revolutionize the Indian education landscape by decolonizing the mindset of our youth. We empower students to embrace their unique identities, ideas, and aspirations.
                </div>
            </div>

            <!-- Mission -->
            <div class="bg-white rounded-2xl shadow-lg p-4 border border-orange-100">
                <button @click="openSection = openSection === 'mission' ? null : 'mission'" class="w-full flex justify-between items-center text-left focus:outline-none">
                    <span class="text-orange-600 font-semibold">Our Mission</span>
                    <svg :class="{'rotate-180': openSection === 'mission'}" class="h-5 w-5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="openSection === 'mission'" x-transition class="mt-2 text-sm text-gray-700">
                    Rooted in the experiences of our founders, who emerged from middle-class backgrounds and navigated the challenges of education, our mission is to pay forward the opportunities they fought for. We are committed to providing comprehensive career guidance and admission support to students across India.
                </div>
            </div>
        </div>

        <!-- Premium Features Section -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-6">
            <div class="bg-white rounded-2xl shadow-lg p-6 text-center hover:shadow-2xl transition-shadow">
                <h4 class="text-xl font-semibold text-orange-600 mb-2">Career Guidance</h4>
                <p>Expert mentorship to explore your career paths and strengths.</p>
            </div>
            <div class="bg-white rounded-2xl shadow-lg p-6 text-center hover:shadow-2xl transition-shadow">
                <h4 class="text-xl font-semibold text-orange-600 mb-2">Admission Support</h4>
                <p>Guidance in selecting colleges and courses tailored to you.</p>
            </div>
            <div class="bg-white rounded-2xl shadow-lg p-6 text-center hover:shadow-2xl transition-shadow">
                <h4 class="text-xl font-semibold text-orange-600 mb-2">Exam Counselling</h4>
                <p>Personalized coaching for exams like JEE, NEET, CAT, GATE, and more.</p>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 text-center mt-10">
            <div class="bg-orange-100 rounded-2xl p-6 shadow-inner">
                <p class="text-3xl font-bold text-orange-600">2000+</p>
                <p>Students Counseled</p>
            </div>
            <div class="bg-orange-100 rounded-2xl p-6 shadow-inner">
                <p class="text-3xl font-bold text-orange-600">10000+</p>
                <p>Guided Students</p>
            </div>
            <div class="bg-orange-100 rounded-2xl p-6 shadow-inner">
                <p class="text-3xl font-bold text-orange-600">200</p>
                <p>Connected Classes</p>
            </div>
        </div>
    </section>

    <div class="py-10"></div>

    <!-- Footer -->
    <?php include_once '../includes/footer.php'; ?>

</body>
</html>
