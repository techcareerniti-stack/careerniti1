<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Define cards
$cards = [
    [
        "title" => "Aptitude Test",
        "image" => "assets/images/aptitudeTest.png",
        "field" => "Aptitude",
        "desc" => "Evaluate your skills and strengths to guide your career path.",
        "badge" => "Popular"
    ],
    [
        "title" => "Career Guidance",
        "image" => "assets/images/careerGuidence.png",
        "field" => "Career Guidance",
        "desc" => "Get professional advice to choose the right career.",
        "badge" => "Recommended"
    ],
    [
        "title" => "Career Counseling",
        "image" => "assets/images/careerCounciling.png",
        "field" => "Career Counseling",
        "desc" => "Personalized counseling to help you achieve career goals.",
        "badge" => ""
    ],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Career</title>

<!-- Tailwind CSS -->
<link href="assets/css/output.css" rel="stylesheet">

<style>
/* Card Hover Effect */
.glow:hover {
    box-shadow: 0 0 20px rgba(236,134,35,0.5),
                0 0 40px rgba(236,134,35,0.2);
    transform: scale(1.05);
}

/* Pulse animation */
@keyframes pulse {
    0%,100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}
.pulse {
    animation: pulse 2s infinite;
}

/* Modal */
#modal {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.6);
    justify-content: center;
    align-items: center;
    z-index: 50;
}
#modal.active {
    display: flex;
}
.modal-content {
    background: #fff;
    padding: 2rem;
    border-radius: 1rem;
    max-width: 500px;
    width: 90%;
    text-align: center;
    position: relative;
    animation: slideDown 0.3s ease-out;
}
.close-modal {
    position: absolute;
    top: 10px;
    right: 15px;
    font-size: 1.5rem;
    font-weight: bold;
    color: #EC8623;
    cursor: pointer;
}
@keyframes slideDown {
    from { transform: translateY(-40px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}

/* Book Appointment Button */
.btn-appointment {
    background: linear-gradient(to right, #EC8623, #D24753);
    color: #fff;
    font-weight: 600;
    padding: 0.75rem 1.8rem;
    border-radius: 9999px;
    display: inline-block;
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    transition: all 0.3s ease;
}
.btn-appointment:hover {
    background: linear-gradient(to right, #D24753, #EC8623);
    box-shadow: 0 10px 25px rgba(0,0,0,0.3);
}
</style>
</head>

<body class="pt-[80px] bg-gray-50 min-h-screen font-[Poppins]">

<!-- Navbar -->
<?php include("includes/navbar.php"); ?>

<!-- Header -->
<section>
    <div class="bg-gradient-to-r from-orange-500 to-pink-500 py-10 text-center text-white">
        <h1 class="text-3xl md:text-4xl font-bold">Career</h1>
    </div>
</section>

<!-- Cards Section -->
<div class="my-12 flex flex-wrap justify-center gap-10 px-6 md:px-10">
<?php foreach ($cards as $card): ?>
    <div
        class="card glow relative w-[260px] cursor-pointer rounded-2xl border border-gray-300 bg-white p-6 text-center shadow-md transition-all"
        data-title="<?= $card['title'] ?>"
        data-desc="<?= $card['desc'] ?>"
    >

        <?php if (!empty($card['badge'])): ?>
        <span class="absolute top-2 left-2 bg-gradient-to-r from-[#EC8623] to-[#D24753] text-white text-xs px-3 py-1 rounded-full font-semibold">
            <?= $card['badge'] ?>
        </span>
        <?php endif; ?>

        <img src="<?= $card['image'] ?>" alt="<?= $card['title'] ?>"
             class="mx-auto h-[140px] object-contain">

        <p class="mt-4 text-lg font-semibold text-gray-700">
            <?= $card['title'] ?>
        </p>
    </div>
<?php endforeach; ?>
</div>

<!-- Modal -->
<div id="modal">
    <div class="modal-content">
        <span class="close-modal" onclick="closeModal()">&times;</span>
        <h2 id="modalTitle" class="text-2xl font-bold mb-3"></h2>
        <p id="modalDesc" class="text-gray-700 mb-6"></p>

        <!-- Redirects to contact.php -->
        <a href="contact.php" class="btn-appointment pulse">
            Book Appointment
        </a>
    </div>
</div>

<!-- JS -->
<script>
document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById("modal");
    const modalTitle = document.getElementById("modalTitle");
    const modalDesc = document.getElementById("modalDesc");

    document.querySelectorAll(".card").forEach(card => {
        card.addEventListener("click", () => {
            modalTitle.textContent = card.dataset.title;
            modalDesc.textContent = card.dataset.desc;
            modal.classList.add("active");
        });
    });

    window.closeModal = function () {
        modal.classList.remove("active");
    };

    window.onclick = function (e) {
        if (e.target === modal) {
            closeModal();
        }
    };
});
</script>

<!-- Footer -->
<?php include("includes/footer.php"); ?>

</body>
</html>
