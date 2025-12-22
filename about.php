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
    <link href="../assets/css/output.css" rel="stylesheet">
</head>

<body>

<?php include("../includes/usernavbar.php"); ?>

<!-- Header -->

    <div class="relative text-center py-8 bg-gradient-to-r from-orange-400 to-pink-600 text-white">
        <h1 class="text-3xl md:text-4xl font-bold">About Us</h1>
       
    </div>


<!-- Main Content -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <!-- About Card -->
    <div class="bg-white rounded-xl p-6 md:p-10">
        <h2 class="text-2xl md:text-3xl font-semibold">
            Welcome to CareerNiTi; your singular solution for a bright future.
        </h2>

        <p class="mb-4 text-gray-700 text-justify leading-relaxed">
            We have been transforming student's confusion into clarity since 2021 by providing comprehensive career guidance and admission support across India. Through personalised mentorship and a compassionate approach, we help student's embark on a journey of self-discovery. By understanding their strengths and interests, we empower them to make informed decisions about their future.
        </p>

        <p class="mb-4 text-gray-700 text-justify leading-relaxed">
            We offer career guidance, career counselling, exam guidance and counselling, psychological counselling, and admission counselling, making course and college selection easy for students. Our site provides a personalised experience based on educational background and career interest, enabling well-informed decisions.
        </p>

        <p class="text-gray-700 text-justify leading-relaxed">
           With a legacy of commitment and excellence, we have provided counselling to over <strong>2000+</strong>students, guided more than <strong>10,000+</strong> students, and connected with <strong> 200 </strong> classes. This fosters a legacy of personalised support and impactful educational experiences as a trusted educational partner.
        </p>
    </div>

   <!-- Vision -->
<div class="grid md:grid-cols-2 gap-8 items-center mb-10 bg-white rounded-xl p-6 md:p-10">

    <!-- Text FIRST on mobile -->
    <div class="order-1 md:order-1">
        <h2 class="text-2xl font-semibold mb-4">Our Vision</h2>
        <p class="text-gray-700 text-justify leading-relaxed">
            At CareerNiTi, our bold vision is to revolutionise the Indian education landscape by decolonising the mindset of our youth. We are on a mission to break free from traditional confines, empowering students across India to embrace their unique identities, ideas, and aspirations.
        </p>
    </div>

    <!-- Image BELOW text on mobile -->
    <div class="order-2 md:order-2">
        <img 
            src="../assets/images/vision.jpeg" 
            alt="Our Vision" 
            class="w-full h-auto rounded-lg object-cover"
        >
    </div>

</div>


    <!-- Mission -->
    <div class="grid md:grid-cols-2 gap-8 items-center bg-white rounded-xl p-6 md:p-10">
        <div class="order-2 md:order-1">
            <img 
                src="../assets/images/misssion.jpg" 
                alt="Our Mission" 
                class="w-full h-auto rounded-lg object-cover"
            >
        </div>
        <div class="order-1 md:order-2">
            <h2 class="text-2xl font-semibold mb-4">Our Mission</h2>
            <p class="text-gray-700  text-justify leading-relaxed">
                At CareerNiTi, our purpose is deeply rooted in the experiences of our founders, who emerged from middle-class backgrounds and navigated the challenges of education. With an unwavering commitment to pay forward the opportunities they fought for, our mission is to provide comprehensive career guidance and admission support to students across India.
            </p>
        </div>
    </div>

</section>

<?php include("../includes/footer.php"); ?>

</body>
</html>