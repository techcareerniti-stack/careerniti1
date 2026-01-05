<?php
include("./db.php");

$exam_slug = filter_input(INPUT_GET, 'exam', FILTER_SANITIZE_STRING);
if (!$exam_slug) {
    die("Exam not specified.");
}

$stmt = $conn->prepare("
    SELECT e.*, c.name AS category_name
    FROM exams e
    JOIN exam_categories c ON e.category_id = c.id
    WHERE e.slug = ?
");
$stmt->bind_param("s", $exam_slug);
$stmt->execute();
$exam = $stmt->get_result()->fetch_assoc();

if (!$exam) {
    echo "<div class='text-center py-20'>Exam not found</div>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?= htmlspecialchars($exam['title']) ?></title>
<link href="./assets/css/output.css" rel="stylesheet">
</head>

<body class="bg-[#f6f7fb] text-gray-800">

<?php include("./includes/navbar.php"); ?>

<!-- TOP BAR -->
<div class="bg-gradient-to-r from-orange-400 to-pink-500 py-5 text-center">
    <h2 class="text-white text-xl font-semibold">Exam</h2>
</div>

<!-- CONTENT -->
 <div class="flex justify-center py-10 px-10">
    <div class="w-full max-w-7xl grid grid-cols-2 lg:grid-cols-2 gap-10">

        <!-- LEFT SECTION -->
        <div class="lg:col-span-2 flex justify-center">
            <div class="w-full max-w-4xl space-y-6">
                <!-- TITLE -->
                <h1 class="text-3xl font-bold text-gray-900">
                    <?= htmlspecialchars($exam['title']) ?>
                </h1>
                <p class="text-sm text-gray-500">
                    Home &gt; Exam &gt; <?= htmlspecialchars($exam['category_name']) ?>
                </p>

                <!-- INTRO -->
                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Introduction</h3>
                    <p class="text-sm text-gray-700 leading-relaxed">
                        <?= nl2br(htmlspecialchars($exam['intro'] ?? '-')) ?>
                    </p>
                </div>

                <!-- OVERVIEW -->
                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Overview</h3>
                    <p class="text-sm text-gray-700 leading-relaxed">
                        <?= nl2br(htmlspecialchars($exam['overview'] ?? '-')) ?>
                    </p>
                </div>

                <!-- EXAM DETAILS -->
                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <h3 class="text-lg font-semibold mb-4">Exam Details</h3>
                    <div class="grid grid-cols-2 gap-y-4 text-sm">
                        <div class="text-gray-500">Exam Level</div>
                        <div class="font-medium"><?= $exam['level'] ?></div>

                        <div class="text-gray-500">Exam Mode</div>
                        <div class="font-medium"><?= $exam['exam_type'] ?></div>

                        <div class="text-gray-500">Duration</div>
                        <div class="font-medium"><?= $exam['exam_duration'] ?></div>

                        <div class="text-gray-500">Total Marks</div>
                        <div class="font-medium"><?= $exam['total_marks'] ?></div>

                        <div class="text-gray-500">Total Questions</div>
                        <div class="font-medium"><?= $exam['total_questions'] ?></div>

                        <div class="text-gray-500">Category</div>
                        <div class="font-medium"><?= $exam['category_name'] ?></div>
                    </div>
                </div>

               
                
            </div>
        </div>

        <!-- RIGHT SIDEBAR -->
        <div class="lg:col-span-1 space-y-6">
            <!-- COUNSELLING -->
            <div class="bg-white p-6 rounded-xl shadow-sm">
                <h3 class="text-sm font-semibold mb-4">
                    KNOW YOUR NEAREST COUNSELLING CENTRE
                </h3>
                <select class="w-full border rounded-lg p-3 text-sm mb-3">
                    <option>State</option>
                </select>
                <select class="w-full border rounded-lg p-3 text-sm mb-4">
                    <option>District</option>
                </select>
                <button class="w-full py-3 rounded-xl text-white font-semibold
                               bg-gradient-to-r from-orange-400 to-pink-500 hover:opacity-95 transition">
                    Get Location
                </button>
            </div>

            <!-- QUICK INFO -->
            <div class="bg-white p-6 rounded-xl shadow-sm text-sm">
                <h3 class="font-semibold mb-2">Quick Info</h3>
                <p class="text-gray-500">Last Updated</p>
                <p><?= date("d M Y", strtotime($exam['updated_at'])) ?></p>
            </div>

            <!-- POPULAR -->
            <div class="bg-white p-6 rounded-xl shadow-sm">
                <h3 class="text-sm font-semibold mb-4">POPULAR</h3>
                <ul class="space-y-4 text-sm">
                    <li class="flex gap-3">
                        <span class="w-8 h-8 bg-orange-400 text-white rounded-full flex items-center justify-center text-xs">N</span>
                        <span>India will need 90,000 forensic scientists in 9 years</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="w-8 h-8 bg-orange-400 text-white rounded-full flex items-center justify-center text-xs">N</span>
                        <span>Update on JEE (Advanced) 2024 Exam date</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="w-8 h-8 bg-orange-400 text-white rounded-full flex items-center justify-center text-xs">N</span>
                        <span>KEAM 2024: Inviting Applications</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


<?php include("./includes/footer.php"); ?>
</body>
</html>
