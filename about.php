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

<body class="bg-[#1f2a44]">

<!-- EXISTING NAVBAR (UNCHANGED) -->
<?php include_once '../includes/navbar.php'; ?>

<!-- SPACE BELOW FIXED NAVBAR -->
<div class="h-24"></div>

<!-- ABOUT SECTION -->
<section class="max-w-7xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden">

    <!-- HEADING -->
    <div class="px-6 md:px-10 py-8 border-b">
        <h1 class="text-3xl font-bold text-gray-800">About Us</h1>
        <p class="text-gray-600 mt-2 max-w-2xl">
            CareerNiTi helps students make informed academic and career decisions through expert guidance.
        </p>
    </div>

    <!-- CONTENT -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 px-6 md:px-10 py-12 items-center">

        <!-- IMAGE BLOCK -->
        <div class="w-full max-w-md mx-auto">
            <div class="h-[300px] rounded-lg overflow-hidden shadow-md">
                <img src="../assets/images/student.jpg"
                     alt="Career Guidance"
                     class="w-full h-full object-cover">
            </div>

            <!-- INFO BADGE -->
            <div class="mt-6 text-center bg-[#1f2a44] text-white px-6 py-4 rounded-lg shadow-md inline-block">
                <p class="text-2xl font-bold text-orange-400">2000+</p>
                <p class="text-sm">Students Guided</p>
            </div>
        </div>

        <!-- TEXT CONTENT -->
        <div>
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">
                Empowering Students with Clarity & Confidence
            </h2>

            <p class="text-gray-600 leading-relaxed mb-4">
                CareerNiTi is a career guidance and education consulting platform focused on helping students
                navigate their academic journey with confidence.
            </p>

            <p class="text-gray-600 leading-relaxed mb-6">
                From admissions counselling to exam mentoring, we provide structured guidance
                designed to deliver real outcomes.
            </p>

            <a href="#"
               class="inline-block bg-[#1f2a44] text-white px-6 py-3 rounded-md font-medium hover:bg-orange-500 transition">
                Learn More
            </a>
        </div>

    </div>

    <!-- STATS -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center px-6 md:px-10 py-10 bg-gray-50 border-t">

        <div>
            <p class="text-3xl font-bold text-orange-500">75M+</p>
            <p class="text-sm text-gray-600">Students Learning</p>
        </div>

        <div>
            <p class="text-3xl font-bold text-orange-500">7,000+</p>
            <p class="text-sm text-gray-600">Mentors</p>
        </div>

        <div>
            <p class="text-3xl font-bold text-orange-500">1,000+</p>
            <p class="text-sm text-gray-600">Free Courses</p>
        </div>

        <div>
            <p class="text-3xl font-bold text-orange-500">85k+</p>
            <p class="text-sm text-gray-600">Active Programs</p>
        </div>

    </div>

</section>

<?php include_once '../includes/footer.php'; ?>

</body>
</html>
