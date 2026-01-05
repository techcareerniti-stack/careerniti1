<?php
include("db.php");

// GET filters
$course_type = $_GET['course_type'] ?? '';
$level       = $_GET['level'] ?? '';
$city        = $_GET['city'] ?? '';

// SQL
$sql = "SELECT * FROM TopToExplore WHERE status=1";
$params = [];
$types  = "";

if($city){ $sql .= " AND city=?"; $params[]=$city; $types.="s"; }
if($course_type){ $sql .= " AND course_type=?"; $params[]=$course_type; $types.="s"; }
if($level){ $sql .= " AND level=?"; $params[]=$level; $types.="s"; }

$stmt = $conn->prepare($sql);
if(!empty($params)){ $stmt->bind_param($types, ...$params); }
$stmt->execute();
$result = $stmt->get_result();

// Dropdown data
$citiesArr=[]; $coursesArr=[]; $levelsArr=[];
$cities  = $conn->query("SELECT DISTINCT city FROM TopToExplore WHERE status=1");
$courses = $conn->query("SELECT DISTINCT course_type FROM TopToExplore WHERE status=1");
$levels  = $conn->query("SELECT DISTINCT level FROM TopToExplore WHERE status=1");

while($c=$cities->fetch_assoc())  $citiesArr[]  = $c['city'];
while($c=$courses->fetch_assoc()) $coursesArr[] = $c['course_type'];
while($l=$levels->fetch_assoc())  $levelsArr[]  = $l['level'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Explore Colleges</title>
<link href="assets/css/output.css" rel="stylesheet">
<style>
body{background:#f5f6fa;font-family:Inter,sans-serif}
.card{border-left:4px solid;border-image:linear-gradient(to bottom,#fb923c,#ec4899) 1;cursor:pointer;transition:all 0.3s ease}
.card:hover{transform:translateY(-3px);box-shadow:0 10px 25px rgba(0,0,0,0.1)}
.tag{padding:3px 10px;font-size:12px;border-radius:999px;font-weight:500}
#detailsModal{display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.5);z-index:1000;justify-content:center;align-items:center}
#detailsModal .modal-content{background:#fff;max-width:800px;width:90%;border-radius:12px;padding:20px;position:relative}
#detailsModal .close{position:absolute;top:10px;right:15px;font-size:20px;font-weight:bold;cursor:pointer}
</style>
</head>

<body>
<?php include("./includes/usernavbar.php"); ?>

<!-- HERO -->
<div class="bg-gradient-to-r from-orange-400 to-pink-600 text-white p-8 text-center">
    <h1 class="text-4xl font-extrabold">Explore Colleges</h1>
    <p class="mt-2">Find colleges by City, Course & Level</p>
</div>

<!-- FILTER BAR -->
<form method="GET" class="sticky top-0 z-50 bg-white shadow-lg p-4 flex flex-wrap gap-3">
    <select name="city" class="border px-4 py-2 rounded-lg">
        <option value="">All Cities</option>
        <?php foreach($citiesArr as $c): ?>
            <option value="<?= $c ?>" <?= ($city==$c)?'selected':'' ?>><?= ucfirst($c) ?></option>
        <?php endforeach; ?>
    </select>

    <select name="course_type" class="border px-4 py-2 rounded-lg">
        <option value="">All Courses</option>
        <?php foreach($coursesArr as $c): ?>
            <option value="<?= $c ?>" <?= ($course_type==$c)?'selected':'' ?>><?= ucfirst($c) ?></option>
        <?php endforeach; ?>
    </select>

    <select name="level" class="border px-4 py-2 rounded-lg">
        <option value="">UG / PG</option>
        <?php foreach($levelsArr as $l): ?>
            <option value="<?= $l ?>" <?= ($level==$l)?'selected':'' ?>><?= strtoupper($l) ?></option>
        <?php endforeach; ?>
    </select>

    <button class="bg-orange-500 text-white px-6 py-2 rounded-lg">Apply</button>
    <a href="colleges.php" class="bg-gray-200 px-6 py-2 rounded-lg">Reset</a>
</form>

<!-- COLLEGE LIST -->
<div class="max-w-7xl mx-auto p-4 space-y-4">
<?php while($row=$result->fetch_assoc()): ?>
<div class="card bg-white rounded-xl shadow p-4 flex flex-col md:flex-row gap-4" onclick="showDetails(<?= $row['id'] ?>)">
    <div class="w-32 h-32 bg-gray-100 rounded-lg flex items-center justify-center">
        <img src="assets/images/<?= $row['logo'] ?: 'default.png' ?>" class="object-contain w-full h-full p-2">
    </div>

    <div class="flex-1">
        <h3 class="text-xl font-bold text-indigo-900"><?= htmlspecialchars($row['name']) ?> <span class="text-yellow-400 text-sm">★★★★☆</span></h3>
        <p class="text-sm text-gray-500 mb-2">📍 <?= ucfirst($row['city']) ?></p>
        <div class="flex flex-wrap gap-2 mb-3">
            <span class="tag bg-indigo-100 text-indigo-800"><?= ucfirst($row['course_type']) ?></span>
            <span class="tag bg-green-100 text-green-800"><?= strtoupper($row['level']) ?></span>
            <span class="tag bg-yellow-100 text-yellow-800">Fees: <?= $row['fees'] ?></span>
            <span class="tag bg-purple-100 text-purple-800">Exams: <?= $row['exams'] ?></span>
        </div>
    </div>
</div>
<?php endwhile; ?>
</div>

<!-- DETAILS MODAL -->
<div id="detailsModal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <div id="modalBody">Loading...</div>
    </div>
</div>

<script>
// AJAX fetch details
function showDetails(id){
    var modal = document.getElementById('detailsModal');
    var body = document.getElementById('modalBody');
    modal.style.display = 'flex';
    body.innerHTML = 'Loading...';

    var xhr = new XMLHttpRequest();
    xhr.open('GET','college-details-ajax.php?id='+id,true);
    xhr.onload = function(){
        if(xhr.status===200){
            body.innerHTML = xhr.responseText;
        } else {
            body.innerHTML = 'Error loading details';
        }
    }
    xhr.send();
}

function closeModal(){
    document.getElementById('detailsModal').style.display='none';
}
</script>

</body>
</html>
