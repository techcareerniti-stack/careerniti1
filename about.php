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

    <!-- Tailwind CSS -->
    <link href="./assets/css/output.css" rel="stylesheet">
</head>

<body>

<?php include("./includes/navbar.php"); ?>

<!-- Header -->
<section>
    <div class="bg-gradient-to-r from-orange-400 to-pink-600 py-10 text-center text-white">
        <h1 class="text-3xl md:text-4xl font-bold">About Us</h1>
    </div>
</section>

<!-- Main Content -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <!-- About Card -->
    <div class="bg-white rounded-xl p-6 md:p-10 mb-10">
        <h2 class="text-2xl md:text-3xl font-semibold mb-5">
            Welcome to CareerNiTi
        </h2>

        <p class="mb-4 text-gray-700 leading-relaxed">
            We have been transforming students' confusion into clarity since 2021 by providing
            comprehensive career guidance and admission support across India.
            Through personalised mentorship and a compassionate approach, we help students
            embark on a journey of self-discovery.
        </p>

        <p class="mb-4 text-gray-700 leading-relaxed">
            We offer career guidance, career counselling, exam guidance, psychological counselling,
            and admission counselling — making course and college selection easy and stress-free.
        </p>

        <p class="text-gray-700 leading-relaxed">
            With counselling provided to over <strong>2000+</strong> students and guidance
            extended to <strong>10,000+</strong> learners, CareerNiTi stands as a trusted
            educational partner across India.
        </p>
    </div>

    <!-- Vision -->
    <div class="grid md:grid-cols-2 gap-8 items-center mb-10 bg-white rounded-xl  p-6 md:p-10">
        <div>
            <h2 class="text-2xl font-semibold mb-4">Our Vision</h2>
            <p class="text-gray-700 leading-relaxed">
                Our vision is to revolutionise the Indian education landscape by decolonising
                the mindset of youth. We aim to empower students to embrace their unique identities,
                ideas, and aspirations beyond traditional boundaries.
            </p>
        </div>
        <div>
            <img 
                src="./assets/images/vision.jpeg" 
                alt="Our Vision" 
                class="w-full h-auto rounded-lg object-cover"
            >
        </div>
    </div>

    <!-- Mission -->
    <div class="grid md:grid-cols-2 gap-8 items-center bg-white rounded-xl p-6 md:p-10">
        <div class="order-2 md:order-1">
            <img 
                src="./assets/images/misssion.jpg" 
                alt="Our Mission" 
                class="w-full h-auto rounded-lg object-cover"
            >
        </div>
        <div class="order-1 md:order-2">
            <h2 class="text-2xl font-semibold mb-4">Our Mission</h2>
            <p class="text-gray-700 leading-relaxed">
                Rooted in the experiences of our founders from middle-class backgrounds,
                our mission is to provide accessible, honest, and comprehensive career guidance
                and admission support to students across India — helping them succeed with confidence.
            </p>
        </div>
    </div>

</section>

<?php include("./includes/footer.php"); ?>

</body>
</html>
