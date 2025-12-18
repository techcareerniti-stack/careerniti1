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
    <title>About Us | CareerNiTi</title>

    <link href="../assets/css/output.css" rel="stylesheet">
</head>

<body class="bg-[#1f2a44] font-core">
>

<?php include '../includes/navbar.php'; ?>

<!-- SPACE BELOW FIXED NAVBAR -->
<div class="h-24"></div>

<!-- MAIN ABOUT SECTION -->
<section class="max-w-7xl mx-auto bg-white rounded-2xl shadow-xl overflow-hidden">

    <!-- HERO -->
    <div class="px-6 md:px-12 py-14 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-800 animate-pulse">
            About <span class="text-orange-500">CareerNiTi</span>
        </h1>
        <p class="mt-5 text-lg text-gray-600 max-w-4xl mx-auto">
            Empowering students with clarity, confidence, and the right direction
            to build successful academic and professional careers.
        </p>
    </div>

    <!-- WHO WE ARE -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 px-6 md:px-12 py-14 items-center">

        <!-- TEXT -->
        <div class="space-y-5">
            <h2 class="text-3xl font-semibold text-gray-800">
                Who We Are
            </h2>

            <p class="text-gray-600 leading-relaxed">
                CareerNiTi is a career guidance and education consulting platform
                designed to help students make informed academic and career decisions.
            </p>

            <p class="text-gray-600 leading-relaxed">
                We bridge the gap between ambition and achievement by offering
                expert counselling, structured mentoring, and exam-focused guidance.
            </p>
        </div>

        <!-- IMAGE -->
        <div class="flex justify-center">
            <img src="../assets/images/student.jpg"
                 alt="Career Guidance"
                 class="w-full max-w-md rounded-xl shadow-lg">
        </div>
    </div>

    <!-- MISSION & VISION -->
    <div class="bg-gray-50 px-6 md:px-12 py-14">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

            <div class="bg-white p-8 rounded-xl shadow hover:shadow-lg transition">
                <h3 class="text-2xl font-semibold text-gray-800 mb-3">
                    Our Mission
                </h3>
                <p class="text-gray-600 leading-relaxed">
                    To provide accessible, reliable, and result-oriented career
                    guidance that empowers students to choose the right path
                    with confidence.
                </p>
            </div>

            <div class="bg-white p-8 rounded-xl shadow hover:shadow-lg transition">
                <h3 class="text-2xl font-semibold text-gray-800 mb-3">
                    Our Vision
                </h3>
                <p class="text-gray-600 leading-relaxed">
                    To become a trusted career partner for students across India,
                    shaping futures through knowledge, mentorship, and innovation.
                </p>
            </div>

        </div>
    </div>

    <!-- WHY CAREERNITI -->
    <div class="px-6 md:px-12 py-14">
        <h2 class="text-3xl font-semibold text-center text-gray-800 mb-10">
            Why Choose CareerNiTi?
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">

            <div class="p-6 rounded-xl border hover:border-orange-500 transition">
                <h4 class="text-xl font-semibold text-gray-800 mb-2">
                    Expert Guidance
                </h4>
                <p class="text-gray-600">
                    Learn from experienced mentors and career counsellors.
                </p>
            </div>

            <div class="p-6 rounded-xl border hover:border-orange-500 transition">
                <h4 class="text-xl font-semibold text-gray-800 mb-2">
                    Structured Approach
                </h4>
                <p class="text-gray-600">
                    Clear roadmaps for admissions, exams, and career planning.
                </p>
            </div>

            <div class="p-6 rounded-xl border hover:border-orange-500 transition">
                <h4 class="text-xl font-semibold text-gray-800 mb-2">
                    Student-Centric
                </h4>
                <p class="text-gray-600">
                    Personalized support focused on real student needs.
                </p>
            </div>

        </div>
    </div>

    <!-- FAQ SECTION -->
<div class="bg-white px-6 py-12 border-t">
    <div class="max-w-4xl mx-auto">

        <h2 class="text-2xl font-semibold text-gray-800 text-center mb-8">
            Frequently Asked Questions
        </h2>

        <div class="divide-y">

            <!-- FAQ -->
            <details class="py-4 group">
                <summary class="flex justify-between items-center cursor-pointer text-gray-800 font-medium">
                    <span>What is CareerNiTi?</span>
                    <span class="text-gray-400 group-open:rotate-180 transition">+</span>
                </summary>
                <p class="mt-3 text-sm text-gray-600 leading-relaxed">
                    CareerNiTi is a career guidance platform that helps students
                    make informed academic and career decisions.
                </p>
            </details>

            <details class="py-4 group">
                <summary class="flex justify-between items-center cursor-pointer text-gray-800 font-medium">
                    <span>Is CareerNiTi free to use?</span>
                    <span class="text-gray-400 group-open:rotate-180 transition">+</span>
                </summary>
                <p class="mt-3 text-sm text-gray-600 leading-relaxed">
                    We offer both free resources and premium personalized guidance
                    based on student needs.
                </p>
            </details>

            <details class="py-4 group">
                <summary class="flex justify-between items-center cursor-pointer text-gray-800 font-medium">
                    <span>Who can take guidance from CareerNiTi?</span>
                    <span class="text-gray-400 group-open:rotate-180 transition">+</span>
                </summary>
                <p class="mt-3 text-sm text-gray-600 leading-relaxed">
                    School students, college students, and graduates can benefit
                    from CareerNiTi guidance.
                </p>
            </details>

            <details class="py-4 group">
                <summary class="flex justify-between items-center cursor-pointer text-gray-800 font-medium">
                    <span>How do I book a counselling session?</span>
                    <span class="text-gray-400 group-open:rotate-180 transition">+</span>
                </summary>
                <p class="mt-3 text-sm text-gray-600 leading-relaxed">
                    After registration, students can book sessions through
                    the CareerNiTi platform.
                </p>
            </details>

        </div>

    </div>
</div>

</div>

    </div>

</section>

<?php include_once '../includes/footer.php'; ?>

</body>
</html>
