<?php
session_start();

// Services array with long description
$services = [
    ["title"=>"Career Counseling","desc"=>"Personalized guidance","long_desc"=>"We provide detailed counseling sessions to understand your skills, interests, and goals. Our experts help you identify the right career path and future opportunities.","img"=>"careerCounciling.png"],
    ["title"=>"Aptitude Tests","desc"=>"Assess strengths","long_desc"=>"Our aptitude tests analyze your strengths, weaknesses, and personality traits to guide you in making informed career decisions. Reports and detailed feedback are provided.","img"=>"aptitudeTest.png"],
    ["title"=>"Skill Development","desc"=>"Enhance skills","long_desc"=>"Join our workshops and courses to improve your technical knowledge, communication, and problem-solving skills. Tailored programs for career advancement.","img"=>"serviceCareer.png"],
    ["title"=>"Resume Building","desc"=>"Professional resume","long_desc"=>"We help you craft a professional and impactful resume that highlights your skills, experience, and achievements. Templates and personalized guidance are provided.","img"=>"serviceEntrance.png"],
    ["title"=>"Interview Preparation","desc"=>"Boost confidence","long_desc"=>"Our mock interview sessions, tips, and guidance help you perform confidently in interviews. Learn how to answer tricky questions and make a strong impression.","img"=>"serviceAdmission.png"],
    ["title"=>"Career Guidance","desc"=>"Step-by-step guidance","long_desc"=>"We provide a roadmap for your academic and professional growth, from course selection to career planning. Mentorship is provided throughout your journey.","img"=>"careerGuidence.png"]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Services | Careerniti</title>
<script src="https://cdn.tailwindcss.com"></script>
<style>
/* Modal overlay */
.modal {
    display: none;
    position: fixed;
    z-index: 50;
    left: 0; top: 0;
    width: 100%; height: 100%;
    background-color: rgba(0,0,0,0.6);
    justify-content: center;
    align-items: center;
    overflow-y: auto;
    padding: 20px;
}

/* Modal box */
.modal-content {
    background-color: #fff;
    border-radius: 12px;
    padding: 20px;
    max-width: 600px;
    width: 100%;
    box-shadow: 0 10px 25px rgba(0,0,0,0.3);
    animation: fadeIn 0.3s ease;
    position: relative;
    text-align: center;
}
.modal-content img {
    height: 100px; width: 100px; margin: 0 auto 15px; display: none; /* Hidden by default */
}
.modal-content h2 { font-size: 1.5rem; font-weight: bold; margin-bottom: 10px; }
.modal-content p { color: #374151; line-height: 1.6; text-align: center; }
.modal-content #close {
    position: absolute;
    top: 10px; right: 15px;
    font-size: 1.5rem;
    cursor: pointer;
}

/* Animation */
@keyframes fadeIn {
    from { opacity: 0; transform: scale(0.95); }
    to { opacity: 1; transform: scale(1); }
}

/* Mobile optimization */
@media (max-width: 768px) {
    .modal-content { padding: 15px; width: 90%; }
    .modal-content img { height: 80px; width: 80px; }
}
</style>
</head>
<body class="bg-gray-100">

<!-- NAVBAR -->
<nav class="bg-white shadow-md fixed top-0 left-0 w-full z-50">
  <div class="max-w-7xl mx-auto px-4">
    <div class="flex items-center h-16">
      <img src="assets/images/Careerniti_logo.png" alt="Logo" class="h-10 w-auto">
      <div class="flex-1"></div>
      <div class="hidden md:flex items-center gap-6">
        <a href="index.php" class="text-gray-700 hover:text-orange-500 font-medium">Home</a>
        <a href="about.php" class="text-gray-700 hover:text-orange-500 font-medium">About Us</a>
        <a href="services.php" class="text-orange-500 font-semibold">Services</a>
        <a href="contact.php" class="text-gray-700 hover:text-orange-500 font-medium">Contact Us</a>
        <a href="register.php" class="bg-gradient-to-r from-orange-500 to-pink-500 text-white px-5 py-2 rounded-md hover:opacity-90 transition">Register</a>
        <a href="login.php" class="bg-gradient-to-r from-orange-500 to-pink-500 text-white px-5 py-2 rounded-md hover:opacity-90 transition">Login</a>
      </div>
      <button id="menu-btn" class="md:hidden text-2xl text-gray-700 ml-2">☰</button>
    </div>
  </div>
  <div id="mobile-menu" class="hidden md:hidden bg-white border-t shadow-lg">
    <div class="px-4 py-4 space-y-3">
      <a href="index.php" class="block py-2 hover:bg-gray-50">Home</a>
      <a href="about.php" class="block py-2 hover:bg-gray-50">About Us</a>
      <a href="services.php" class="block py-2 text-orange-500 font-semibold">Services</a>
      <a href="contact.php" class="block py-2 hover:bg-gray-50">Contact Us</a>
      <a href="register.php" class="block text-center border border-orange-500 text-orange-500 px-6 py-2 rounded-md hover:bg-orange-500 hover:text-white transition">Register</a>
      <a href="login.php" class="block text-center bg-gradient-to-r from-orange-500 to-pink-500 text-white px-6 py-2 rounded-md hover:opacity-90 transition">Login</a>
    </div>
  </div>
</nav>

<div class="h-16"></div>

<!-- HERO -->
<div class="relative text-center py-8 bg-gradient-to-r from-orange-400 to-pink-600 text-white">
  <h1 class="text-3xl md:text-4xl font-bold">Our Services</h1>
</div>

<!-- SEARCH -->
<div class="max-w-3xl mx-auto mt-8 px-4">
    <input type="text" id="search" placeholder="Search services..." class="w-full p-3 rounded-lg border focus:outline-none focus:ring-2 focus:ring-orange-500">
</div>

<!-- SERVICES GRID -->
<section class="max-w-7xl mx-auto px-4 py-16">
  <div id="servicesGrid" class="grid gap-8 md:grid-cols-3 sm:grid-cols-2 grid-cols-1">
    <?php foreach($services as $service): ?>
      <div class="service-card bg-white shadow-lg rounded-xl p-6 text-center hover:shadow-2xl hover:scale-105 transition transform cursor-pointer"
           data-title="<?= $service['title'] ?>"
           data-desc="<?= htmlspecialchars($service['long_desc']) ?>"
           data-img="<?= 'assets/images/' . $service['img'] ?>">
        <img src="<?= 'assets/images/' . $service['img'] ?>" alt="<?= $service['title'] ?>" class="h-24 w-24 mx-auto mb-4">
        <h2 class="text-xl font-bold mb-2"><?= $service['title'] ?></h2>
        <p class="text-gray-700 mb-4"><?= substr($service['desc'], 0, 60) ?>...</p>
        <button class="px-5 py-2 bg-gradient-to-r from-orange-500 to-pink-500 text-white rounded-md hover:opacity-90 transition read-more">Read More</button>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- MODAL -->
<div id="modal" class="modal">
  <div class="modal-content">
    <span id="close">&times;</span>
    <img id="modalImg" src="">
    <h2 id="modalTitle"></h2>
    <p id="modalDesc"></p>
  </div>
</div>

<script>
const btn = document.getElementById("menu-btn");
const menu = document.getElementById("mobile-menu");
btn.addEventListener("click", () => menu.classList.toggle("hidden"));

const modal = document.getElementById("modal");
const modalTitle = document.getElementById("modalTitle");
const modalDesc = document.getElementById("modalDesc");
const modalImg = document.getElementById("modalImg");
const closeBtn = document.getElementById("close");

// Read More click
document.querySelectorAll(".read-more").forEach(button => {
  button.addEventListener("click", e => {
    const card = e.target.closest(".service-card");
    modalTitle.textContent = card.dataset.title;
    modalDesc.textContent = card.dataset.desc;
    
    if(card.dataset.img){
        modalImg.src = card.dataset.img;
        modalImg.style.display = "block";
    } else {
        modalImg.style.display = "none";
    }
    
    modal.style.display = "flex";
    document.body.style.overflow = "hidden"; // prevent background scroll
  });
});

// Close modal
closeBtn.onclick = () => { modal.style.display = "none"; document.body.style.overflow = "auto"; };
window.onclick = e => { if(e.target == modal){ modal.style.display = "none"; document.body.style.overflow = "auto"; } };

// Search functionality
document.getElementById("search").addEventListener("input", e => {
  const val = e.target.value.toLowerCase();
  document.querySelectorAll(".service-card").forEach(card => {
    card.style.display = card.dataset.title.toLowerCase().includes(val) ? "" : "none";
  });
});
</script>
</body>
</html>
