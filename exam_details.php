<?php
session_start();
require_once('config/db.php');


$database = new Database();
$conn = $database->getConnection();

// Validate input
$process_id = isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0 ? intval($_GET['id']) : 0;

// Fetch process details
$process = null;
if($process_id > 0){
    $query = "SELECT ap.*, p.title as program_title, p.program_key 
              FROM exam_processes ap 
              JOIN exam_programs p ON ap.program_id = p.id 
              WHERE ap.id = ? AND ap.is_active = 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $process_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $process = $result->fetch_assoc();
    $stmt->close();
}

// If process not found → redirect
if(!$process){
    header('Location: ../../exam.php');
    exit();
}
$popularArticles = [];
$popQuery = "SELECT id, title FROM popular_articles ORDER BY created_at DESC LIMIT 5";
$popResult = $conn->query($popQuery);

if($popResult){
    while($row = $popResult->fetch_assoc()){
        $popularArticles[] = $row;
    }
} else {
    echo "Query Error: " . $conn->error;
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CareerNiti - <?php echo htmlspecialchars($process['title']); ?></title>
<link rel="icon" type="image/png" href="./assets/images/title-logo.png">
<link rel="stylesheet" href="./assets/css/output.css">
<style>
html { scroll-behavior: smooth; scroll-padding-top: 120px; }
.section-active { background: linear-gradient(135deg, #f97316 0%, #db2777 100%); color: white; }
.sticky-nav-container{position:sticky;top:60px;z-index:40;background-color:#f9fafb;padding:1rem 0;}
.prose table { border-collapse: collapse; width: 100%; margin-bottom: 1em; }
.prose th, .prose td { border: 1px solid #ddd; padding: 8px; text-align: left; }
.prose th { background-color: #f2f2f2; }
.prose tbody tr:nth-child(even) { background-color: #f9f9f9; }
.prose ul, .prose ol { margin-left: 1.5em; margin-bottom: 1em; }
.prose li { margin-bottom: 0.5em; }
.main-content-wide { width: 100%; }
@media (min-width:1024px){ .main-content-wide{width:70%;} }
.sidebar-narrow{width:100%;}
@media (min-width:1024px){ .sidebar-narrow{width:30%;} .sticky-sidebar{position:sticky;top:120px;} }
</style>
</head>
<body>
<?php include './includes/navbar.php'; ?>

<!-- HERO -->
<div class="relative text-center py-8 bg-gradient-to-r from-orange-400 to-pink-600 text-white">
    <h1 class="text-4xl font-bold">Exam - <?php echo htmlspecialchars($process['program_title']); ?></h1>
</div>

<div class="min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto flex flex-col lg:flex-row gap-8 p-4 lg:p-8">
        
        <!-- MAIN CONTENT -->
        <div class="main-content-wide flex flex-col gap-8">
            
            <!-- Title & Breadcrumb -->
            <div class="mb-8">
                <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-2"><?php echo htmlspecialchars($process['title']); ?></h1>
                <nav class="text-sm text-gray-500">
                    <a href="../../index.php" class="hover:text-orange-500">Home</a> &gt; 
                    <a href="../../exam.php" class="hover:text-orange-500">Exam</a> &gt; 
                    <span class="text-gray-700"><?php echo htmlspecialchars($process['program_title']); ?></span>
                </nav>
            </div>
            
            <!-- Sticky Nav -->
            <div class="sticky-nav-container mb-8">
                <div class="flex flex-wrap gap-3 justify-start lg:justify-center">
                    <button onclick="scrollToSection('introduction')" class="px-4 py-2 rounded-full section-active">Introduction</button>
                    <button onclick="scrollToSection('eligibility')" class="px-4 py-2 rounded-full bg-white text-gray-600 border border-gray-200 hover:bg-gray-100">Eligibility</button>
                    <button onclick="scrollToSection('reservation-policy')" class="px-4 py-2 rounded-full bg-white text-gray-600 border border-gray-200 hover:bg-gray-100">Reservation Policy</button>
                    <button onclick="scrollToSection('fees')" class="px-4 py-2 rounded-full bg-white text-gray-600 border border-gray-200 hover:bg-gray-100">Fees</button>
                    <button onclick="scrollToSection('process-flow')" class="px-4 py-2 rounded-full bg-white text-gray-600 border border-gray-200 hover:bg-gray-100">Process Flow</button>
                    <?php if(!empty($process['faqs'])): ?>
                    <button onclick="scrollToSection('faq')" class="px-4 py-2 rounded-full bg-white text-gray-600 border border-gray-200 hover:bg-gray-100">FAQ</button>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Sections -->
            <div id="introduction" class="bg-white rounded-lg shadow-sm scroll-mt-32 p-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Introduction</h2>
                <div class="text-gray-600 prose max-w-none">
                    <?php echo $process['description'] ? htmlspecialchars_decode($process['description']) : '<p class="text-gray-500 italic">No description available.</p>'; ?>
                </div>
            </div>

            <div id="eligibility" class="bg-white rounded-lg shadow-sm scroll-mt-32 p-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Eligibility</h2>
                <div class="text-gray-600 prose max-w-none">
                    <?php echo $process['eligibility'] ? htmlspecialchars_decode($process['eligibility']) : '<p class="text-gray-500 italic">No eligibility criteria specified.</p>'; ?>
                </div>
            </div>

            <div id="reservation-policy" class="bg-white rounded-lg shadow-sm scroll-mt-32 p-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Reservation Policy</h2>
                <div class="text-gray-600 prose max-w-none">
                    <?php echo $process['reservation_policy'] ? htmlspecialchars_decode($process['reservation_policy']) : '<p class="text-gray-500 italic">No reservation policy specified.</p>'; ?>
                </div>
            </div>

            <div id="fees" class="bg-white rounded-lg shadow-sm scroll-mt-32 p-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Fees</h2>
                <div class="text-gray-600 prose max-w-none">
                    <?php echo $process['fees'] ? htmlspecialchars_decode($process['fees']) : '<p class="text-gray-500 italic">Fee structure not available.</p>'; ?>
                </div>
            </div>

            <div id="process-flow" class="bg-white rounded-lg shadow-sm scroll-mt-32 p-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Process Flow</h2>
                <div class="text-gray-600 prose max-w-none">
                    <?php echo $process['process_flow'] ? htmlspecialchars_decode($process['process_flow']) : '<p class="text-gray-500 italic">Process flow not specified.</p>'; ?>
                </div>
            </div>

            <?php if(!empty($process['faqs'])): ?>
            <div id="faq" class="bg-white rounded-lg shadow-sm mb-8 overflow-hidden scroll-mt-32 p-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">FAQs</h2>
                <div class="space-y-4">
                <?php
                $lines = explode("\n", $process['faqs']);
                $question = '';
                $answer = '';
                foreach($lines as $line){
                    $line = trim($line);
                    if($line==='') continue;
                    if(substr($line,-1)==='?'){
                        if($question!==''){
                            echo "<div class='p-4 bg-gray-50 rounded-lg shadow-sm'>
                                  <p class='font-bold text-gray-800 mb-2'>".htmlspecialchars($question)."</p>
                                  <p class='text-gray-700'>".nl2br(htmlspecialchars($answer))."</p></div>";
                        }
                        $question=$line; $answer='';
                    } else {
                        $answer .= ($answer==='' ? '' : "\n") . $line;
                    }
                }
                if($question!==''){
                    echo "<div class='p-4 bg-gray-50 rounded-lg shadow-sm'>
                          <p class='font-bold text-gray-800 mb-2'>".htmlspecialchars($question)."</p>
                          <p class='text-gray-700'>".nl2br(htmlspecialchars($answer))."</p></div>";
                }
                ?>
                </div>
            </div>
            <?php endif; ?>

        </div>

        <!-- RIGHT COLUMN -->
        <div class="sidebar-narrow flex flex-col gap-6 sticky-sidebar">
            <div class="bg-white p-6 rounded-xl shadow-lg">
                <h3 class="text-sm font-semibold mb-4">Popular Articles</h3>
                <ul class="space-y-2 text-sm">
                    <?php if(!empty($popularArticles)): ?>
                        <?php foreach($popularArticles as $article): ?>
                            <li>📌 
                                <a href="../../notification.php?id=<?= $article['id'] ?>" class="hover:text-orange-500">
                                    <?= htmlspecialchars($article['title']) ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li>No articles available.</li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>

    </div>
</div>

<?php include './whatsapp.php'; ?>
<?php include './includes/footer.php'; ?>

<script>
function scrollToSection(sectionId){
    const section=document.getElementById(sectionId);
    if(section){ window.scrollTo({top: section.offsetTop-120, behavior:'smooth'}); }
}
</script>

</body>
</html>
