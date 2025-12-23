<?php
$tab = $_GET['tab'] ?? 'career';

function tabClass($current, $active) {
    return $current === $active
        ? "text-orange-600 border-b-2 border-orange-600"
        : "text-gray-600 hover:text-gray-900 hover:bg-gray-50";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Notification</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./assets/css/output.css" rel="stylesheet">
</head>

<body class="bg-gray-50 font-sans">

<?php include("./includes/navbar.php"); ?>

<!-- HEADER -->
<div class="text-center py-8 bg-gradient-to-r from-orange-400 to-pink-600 text-white">
    <h1 class="text-3xl md:text-4xl font-bold">Notification</h1>
</div>

<!-- TABS -->
<div class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-4">
        <nav class="flex overflow-x-auto whitespace-nowrap">
            <a href="?tab=career" class="px-6 py-4 text-sm font-medium <?= tabClass($tab,'career') ?>">Career</a>
            <a href="?tab=exam" class="px-6 py-4 text-sm font-medium <?= tabClass($tab,'exam') ?>">Exam</a>
            <a href="?tab=admission" class="px-6 py-4 text-sm font-medium <?= tabClass($tab,'admission') ?>">Admission</a>
        </nav>
    </div>
</div>

<!-- MAIN CONTENT -->
<div class="max-w-7xl mx-auto px-4 py-8">
    <div class="flex flex-col lg:flex-row gap-8">

        <!-- LEFT CONTENT -->
        <div class="lg:w-2/3">
            <div class="bg-white rounded-xl shadow-sm border p-6">
                <?php
                if ($tab === 'exam') {
                    include "./notification/notifyExam.php";
                } elseif ($tab === 'admission') {
                    include "./notification/notifyAdmission.php";
                } else {
                    include "./notification/notifyCareer.php";
                }
                ?>
            </div>
        </div>

        <!-- RIGHT SIDEBAR -->
        <div class="lg:w-1/3 space-y-8">

            <!-- COUNSELLING -->
            <div class="bg-white rounded-xl shadow-sm border p-6">
                <h2 class="text-lg font-bold text-center mb-4">
                    KNOW YOUR NEAREST COUNSELLING CENTRE
                </h2>

                <div class="space-y-4">
                    <select class="w-full px-4 py-3 border rounded-lg">
                        <option>State</option>
                        <option>Maharashtra</option>
                        <option>Karnataka</option>
                        <option>Goa</option>
                    </select>

                    <select class="w-full px-4 py-3 border rounded-lg">
                        <option>District</option>
                        <option>Sangli</option>
                        <option>Kolhapur</option>
                        <option>Satara</option>
                    </select>

                    <a href="./contact.php"
                       class="block text-center py-3 bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-lg">
                        Get Location
                    </a>
                </div>
            </div>

            <!-- POPULAR -->
            <div class="bg-white rounded-xl shadow-sm border p-6">
                <h2 class="text-lg font-bold mb-6 border-b pb-3">POPULAR</h2>

                <div class="space-y-4">
                    <a href="?tab=career" class="flex items-start gap-4 p-3 hover:bg-gray-50 rounded-lg">
                        <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center font-bold text-orange-600">N</div>
                        <div>
                            <p class="text-sm font-medium">India will need 90,000 forensic scientists in 9 years</p>
                            <p class="text-xs text-gray-500">4.4k views</p>
                        </div>
                    </a>

                    <a href="?tab=exam" class="flex items-start gap-4 p-3 hover:bg-gray-50 rounded-lg">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center font-bold text-blue-600">E</div>
                        <div>
                            <p class="text-sm font-medium">Update on JEE (Advanced) Exam</p>
                            <p class="text-xs text-gray-500">4.4k views</p>
                        </div>
                    </a>

                    <a href="?tab=admission" class="flex items-start gap-4 p-3 hover:bg-gray-50 rounded-lg">
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center font-bold text-green-600">A</div>
                        <div>
                            <p class="text-sm font-medium">KEAM 2024 : Inviting Applications</p>
                            <p class="text-xs text-gray-500">4.4k views</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- HELP -->
            <div class="bg-gradient-to-r from-orange-500 to-red-500 rounded-xl p-6 text-white">
                <h3 class="font-bold text-lg mb-3">Need Help?</h3>
                <p class="text-sm mb-4">Get personalized career counseling</p>

                <a href="./contact.php"
                   class="block text-center py-2 bg-white text-orange-600 rounded-lg font-semibold hover:bg-orange-100 transition">
                    Book Session
                </a>
            </div>

        </div>
    </div>
</div>

</body>
</html>
