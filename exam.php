<?php
require_once 'config/db.php';
$database = new Database();
$db = $database->getConnection();

$currentTab = isset($_GET['tab']) ? $_GET['tab'] : 'UG';

// Fetch programs
$query = "SELECT * FROM exam_programs WHERE is_active=1 ORDER BY display_order";
$result = $db->query($query);
$programs = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CareerNiti - Exams</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

<?php include 'includes/navbar.php'; ?>

<div class="text-center py-8 bg-gradient-to-r from-orange-400 to-pink-600 text-white">
    <h1 class="text-3xl font-bold">Exams</h1>
</div>

<!-- UG/PG Tabs -->
<div class="flex justify-center my-12">
    <div class="flex rounded-xl shadow overflow-hidden">
        <button onclick="window.location.href='?tab=UG'" class="px-6 py-2 font-semibold <?php echo $currentTab==='UG'?'bg-orange-500 text-white':'bg-gray-200'; ?>">UG</button>
        <button onclick="window.location.href='?tab=PG'" class="px-6 py-2 font-semibold <?php echo $currentTab==='PG'?'bg-orange-500 text-white':'bg-gray-200'; ?>">PG</button>
    </div>
</div>

<div id="programCards" class="flex flex-wrap justify-center gap-6">
<?php foreach($programs as $program): ?>
    <div class="w-60 bg-white shadow rounded-xl p-4 cursor-pointer text-center"
         onclick="loadProcesses(<?php echo $program['id']; ?>, '<?php echo $currentTab; ?>', '<?php echo addslashes($program['title']); ?>')">
        <img src="<?php echo $program['image_path']; ?>" class="h-32 mx-auto mb-2 object-contain">
        <h3 class="font-semibold"><?php echo $program['title']; ?></h3>
        <span class="text-sm text-gray-500"><?php echo $currentTab; ?></span>
    </div>
<?php endforeach; ?>
</div>

<!-- Sub-Exams -->
<div id="detailSection" class="hidden mt-10 px-4">
    <h2 id="sectionTitle" class="text-center text-2xl text-gray-600 mb-8"></h2>
    <div id="subExamsSection" class="flex flex-wrap justify-center gap-6"></div>
</div>

<script>
async function loadProcesses(programId, type, programTitle){
    document.getElementById('detailSection').classList.remove('hidden');
    document.getElementById('sectionTitle').innerText = "Exams for " + programTitle;
    const sub = document.getElementById('subExamsSection');
    sub.innerHTML = 'Loading...';

    const response = await fetch('fetch_processes.php?program_id='+programId+'&type='+type);
    const data = await response.json();

    if(data.length > 0){
        sub.innerHTML = '';
        data.forEach(proc => {
            sub.innerHTML += `
                <div onclick="redirectExam('${proc.id}')" class="w-32 text-center cursor-pointer">
                    <img src="${proc.image_path}" class="h-32 mx-auto mb-2 object-contain">
                    <p class="font-medium">${proc.title}</p>
                </div>
            `;
        });
    } else {
        sub.innerHTML = 'No exams available';
    }
}

function redirectExam(id){
    window.location.href = 'exam_details.php?id='+id;
}
</script>

<?php include 'includes/footer.php'; ?>
</body>
</html>
