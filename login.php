<?php
session_start();

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    // You can add your login validation here
    //🔹 Demo validation (replace with DB later)
    if ($username === 'student' && $password === '1234') {

        // Store session
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'student';

        // ✅ Redirect to student folder
        header("Location: student/index.php");
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Careerniti Login</title>

<!-- ✅ Tailwind CSS -->
<link rel="stylesheet" href="/career/assets/css/output.css">

</head>
<body class="bg-gray-100">

<!-- ✅ NAVBAR INCLUDE (CORRECT PATH) -->
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/career/includes/navbar.php';
?>

  

<!-- SPACE FOR NAVBAR -->
<div class="h-16"></div>

<!-- LOGIN FORM -->
<div class="flex justify-center items-center min-h-screen px-4">
  <div class="bg-white shadow-lg rounded-xl overflow-hidden flex flex-col md:flex-row max-w-4xl w-full">

    <!-- LEFT FORM -->
    <div class="w-full md:w-1/2 p-8 md:p-10">
      <h2 class="text-3xl font-bold text-center mb-6">Login to Careerniti</h2>

      <?php if($error): ?>
        <div class="bg-red-100 text-red-700 text-center py-2 mb-4 rounded"><?= $error ?></div>
      <?php endif; ?>

      <form method="POST" class="space-y-5">
        <div>
          <label class="block text-gray-700 mb-2">Username</label>
          <input type="text" name="username" placeholder="Enter your username" required class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-orange-500 focus:outline-none"/>
        </div>
        <div>
          <label class="block text-gray-700 mb-2">Password</label>
          <input type="password" name="password" placeholder="Enter your password" required class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-orange-500 focus:outline-none"/>
        </div>

        <button type="submit" class="w-full py-3 bg-gradient-to-r from-orange-500 to-pink-500 text-white font-semibold rounded-lg hover:opacity-90 transition">Login</button>
      </form>

      <!-- Login with Google -->
      <button class="w-full mt-4 py-3 border border-gray-300 flex items-center justify-center rounded-lg hover:bg-gray-100 transition">
        <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/google/google-original.svg" class="h-6 w-6 mr-2" alt="Google Logo">
        Login with Google
      </button>

      <p class="text-center mt-4 text-gray-500">Don't have an account? <a href="register.php" class="text-orange-500 font-semibold">Register</a></p>
    </div>

    <!-- RIGHT IMAGE -->
    <div class="w-full md:w-1/2 bg-cover bg-center h-60 md:h-auto" style="background-image:url('assets/images/login1.png');"></div>

  </div>
</div>
<?php include 'includes/footer.php'; ?>
<!-- MOBILE MENU SCRIPT -->
<script>
const btn = document.getElementById("menu-btn");
const menu = document.getElementById("mobile-menu");
btn.addEventListener("click", () => {
  menu.classList.toggle("hidden");
});
</script>

</body>
</html>
