<?php
session_start();

// Validate input
if (!isset($_GET['id']) || !is_numeric($_GET['id']) || $_GET['id'] <= 0) {
    header('Location: ../../admission.php'); 
    exit();
}

$process_id = intval($_GET['id']);
require_once '../../config/db.php';
$database = new Database();
$conn = $database->getConnection();

// Fetch process details
$query = "SELECT ap.*, p.title as program_title, p.program_key 
          FROM admission_processes ap 
          JOIN admission_programs p ON ap.program_id = p.id 
          WHERE ap.id = ? AND ap.is_active = 1";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $process_id);
$stmt->execute();
$result = $stmt->get_result();
$process = $result->fetch_assoc();
$stmt->close();

if (!$process) {
    $conn->close();
    header('Location: ../../admission.php');
    exit();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CareerNiti - <?php echo htmlspecialchars($process['title']); ?></title>
<link rel="icon" type="image/png" href="../../assets/images/title-logo.png">
<link rel="stylesheet" href="../../assets/css/output.css">
<style>
html { scroll-behavior: smooth; scroll-padding-top: 120px; }

/* Sticky nav */
.section-active { background: linear-gradient(135deg, #f97316 0%, #db2777 100%); color: white; }
.sticky-nav-container{position:sticky;top:60px;z-index:40;background-color:#f9fafb;padding:1rem 0;}

/* Table styling */
.prose table { border-collapse: collapse; width: 100%; margin-bottom: 1em; }
.prose th, .prose td { border: 1px solid #ddd; padding: 8px; text-align: left; }
.prose th { background-color: #f2f2f2; }
.prose tbody tr:nth-child(even) { background-color: #f9f9f9; }

/* List styling */
.prose ul { list-style-type: disc; margin-left: 1.5em; margin-bottom: 1em; }
.prose ol { list-style-type: decimal; margin-left: 1.5em; margin-bottom: 1em; }
.prose li { margin-bottom: 0.5em; }

/* Layout */
.main-content-wide { width: 100%; }
@media (min-width:1024px){ .main-content-wide{width:70%;} }
.sidebar-narrow{width:100%;}
@media (min-width:1024px){ .sidebar-narrow{width:30%;} .sticky-sidebar{position:sticky;top:120px;} }
</style>
</head>
<body>
<?php include '../../includes/navbar.php'; ?>

<!-- HERO -->
<div class="relative text-center py-8 bg-gradient-to-r from-orange-400 to-pink-600 text-white">
    <h1 class="text-4xl font-bold">Admission - <?php echo htmlspecialchars($process['program_title']); ?></h1>
</div>

<div class="min-h-screen bg-gray-50">
    <div class="max-w-7xl mx-auto flex flex-col lg:flex-row gap-8 p-4 lg:p-8">
        
        <!-- MAIN CONTENT -->
        <div class="main-content-wide flex flex-col gap-8">
            
            <!-- Title & Breadcrumb -->
            <div class="mb-8">
                <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-2">
                    <?php echo htmlspecialchars($process['title']); ?>
                </h1>
                <nav class="text-sm text-gray-500">
                    <a href="../../index.php" class="hover:text-orange-500">Home</a> &gt; 
                    <a href="../../admission.php" class="hover:text-orange-500">Admission</a> &gt; 
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

            <!-- Eligibility -->
            <div id="eligibility" class="bg-white rounded-lg shadow-sm scroll-mt-32 p-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Eligibility</h2>
                <div class="text-gray-600 prose max-w-none">
                    <?php
                    if(!empty($process['eligibility'])){
                        $text = htmlspecialchars_decode($process['eligibility']);
                        // remove weird chars
                        $text = preg_replace('/[^\x{0000}-\x{007F}\x{00A0}-\x{FFFF}]/u','',$text);
                        $lines = preg_split("/\r\n|\n|\r/", $text);
                        $ulOpen = false;
                        foreach($lines as $line){
                            $line = trim($line);
                            if($line==='') { if($ulOpen){echo "</ul>"; $ulOpen=false;} continue; }
                            // heading detection
                            if(preg_match('/^(Eligibility|Eligibility For|Eligibility Condition|Eligibility criteria)/i',$line)){
                                if($ulOpen){echo "</ul>"; $ulOpen=false;}
                                echo "<h3 class='mt-4 mb-2'>" . htmlspecialchars($line) . "</h3>";
                            }
                            // bullet detection
                            elseif(preg_match('/^[•\*\-]\s*(.*)/u', $line,$matches)){
                                if(!$ulOpen){echo "<ul class='list-disc ml-6 mb-4'>"; $ulOpen=true;}
                                echo "<li>" . htmlspecialchars($matches[1]) . "</li>";
                            }
                            else{
                                if(!$ulOpen){echo "<p class='mb-2'>" . htmlspecialchars($line) . "</p>";}
                                else{ echo "<li>" . htmlspecialchars($line) . "</li>"; }
                            }
                        }
                        if($ulOpen){echo "</ul>";}
                    }else{ echo '<p class="text-gray-500 italic">No eligibility criteria specified.</p>'; }
                    ?>
                </div>
            </div>

            <!-- Reservation Policy -->
            <div id="reservation-policy" class="bg-white rounded-lg shadow-sm scroll-mt-32 p-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Reservation Policy</h2>
                <div class="text-gray-600 prose max-w-none">
                    <?php
                    if(!empty($process['reservation_policy'])){
                        $lines = preg_split("/\r\n|\n|\r/", $process['reservation_policy']);
                        echo "<table class='w-full border border-gray-300'>";
                        echo "<thead class='bg-gray-100'><tr><th>Category</th><th>Reservation %</th></tr></thead><tbody>";
                        foreach($lines as $line){
                            $line = trim($line);
                            if($line==='') continue;
                            $parts = preg_split('/\s{2,}|\t+/', $line);
                            if(count($parts)>=2){
                                $category = implode(' ', array_slice($parts,0,count($parts)-1));
                                $percentage = $parts[count($parts)-1];
                                echo "<tr><td>" . htmlspecialchars($category) . "</td><td>" . htmlspecialchars($percentage) . "</td></tr>";
                            }
                        }
                        echo "</tbody></table>";
                    }else{ echo '<p class="text-gray-500 italic">No reservation policy specified.</p>'; }
                    ?>
                </div>
            </div>

            <!-- Fees -->
<div id="fees" class="bg-white rounded-lg shadow-sm scroll-mt-32 p-6">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Fees</h2>
    <div class="text-gray-600 prose max-w-none">
        <?php
        if(!empty($process['fees'])){

            $text = htmlspecialchars_decode($process['fees']);
            $text = preg_replace('/[^\x{0000}-\x{007F}\x{00A0}-\x{FFFF}]/u','',$text);
            $lines = preg_split("/\r\n|\n|\r/",$text);

            $headers = [];
            $rows = [];

            foreach($lines as $line){
                $line = trim($line);
                if($line==='') continue;

                $parts = preg_split('/\t+|\s{2,}/',$line);
                $parts = array_map('trim',$parts);

                // 🔹 Section heading (single column)
                if(count($parts) === 1){

                    // Print previous table if exists
                    if(!empty($headers) && !empty($rows)){
                        echo "<table class='w-full border border-gray-300 mb-6'>";
                        echo "<thead class='bg-gray-100'><tr>";
                        foreach($headers as $head){
                            echo "<th class='border px-2 py-1 font-semibold'>"
                                 . htmlspecialchars($head) .
                                 "</th>";
                        }
                        echo "</tr></thead><tbody>";

                        foreach($rows as $row){
                            echo "<tr>";
                            for($i=0;$i<count($headers);$i++){
                                $cell = $row[$i] ?? '';
                                echo "<td class='border px-2 py-1'>"
                                     . htmlspecialchars($cell) .
                                     "</td>";
                            }
                            echo "</tr>";
                        }
                        echo "</tbody></table>";
                    }

                    // Print section title
                    echo "<h3 class='text-lg font-semibold mt-6 mb-2 text-gray-800'>"
                         . htmlspecialchars($parts[0]) .
                         "</h3>";

                    // Reset for next table
                    $headers = [];
                    $rows = [];
                    continue;
                }

                // Header row
                if(empty($headers)){
                    $headers = $parts;
                }else{
                    $rows[] = $parts;
                }
            }

            // Print last table
            if(!empty($headers) && !empty($rows)){
                echo "<table class='w-full border border-gray-300'>";
                echo "<thead class='bg-gray-100'><tr>";
                foreach($headers as $head){
                    echo "<th class='border px-2 py-1 font-semibold'>"
                         . htmlspecialchars($head) .
                         "</th>";
                }
                echo "</tr></thead><tbody>";

                foreach($rows as $row){
                    echo "<tr>";
                    for($i=0;$i<count($headers);$i++){
                        $cell = $row[$i] ?? '';
                        echo "<td class='border px-2 py-1'>"
                             . htmlspecialchars($cell) .
                             "</td>";
                    }
                    echo "</tr>";
                }
                echo "</tbody></table>";
            }

        }else{
            echo '<p class="text-gray-500 italic">Fee structure not available.</p>';
        }
        ?>
    </div>
</div>

            <!-- Process Flow -->
            <div id="process-flow" class="bg-white rounded-lg shadow-sm scroll-mt-32 p-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Process Flow</h2>
                <div class="text-gray-600 prose max-w-none">
                    <?php
                    if(!empty($process['process_flow'])){
                        $text = htmlspecialchars_decode($process['process_flow']);
                        $text = preg_replace('/[^\x{0000}-\x{007F}\x{00A0}-\x{FFFF}]/u','',$text);
                        $lines = preg_split("/\r\n|\n|\r/",$text);
                        foreach($lines as $line){
                            $line = trim($line);
                            if($line==='') continue;
                            // heading detection
                            if(preg_match('/^(Round\s*\d+|Final Stray Vacancy Round)$/i',$line,$matches)){
                                echo "<h3 class='mt-4 mb-2 font-semibold text-gray-700'>".$matches[1]."</h3>";
                                continue;
                            }
                            $line = preg_replace('/^[•\*\-]\s*/u','',$line);
                            echo "<p class='mb-1'>" . htmlspecialchars($line) . "</p>";
                        }
                    }else{ echo '<p class="text-gray-500 italic">Process flow not specified.</p>'; }
                    ?>
                </div>
            </div>
            

        </div>

        <!-- RIGHT COLUMN -->
        <div class="sidebar-narrow flex flex-col gap-6 sticky-sidebar">
            <!-- Popular Articles -->
           

            <!-- Counselling -->
            <div class="bg-white p-6 rounded-xl shadow-lg">
                <h3 class="text-sm font-semibold mb-4">Know Your Nearest Counselling Centre</h3>
                <div class="space-y-4">
                    <div class="relative">
                        <select id="stateSelect" class="w-full p-3 border rounded-lg text-gray-600">
                            <option value="" disabled selected>Select State</option>
                            <option value="maharashtra">Maharashtra</option>
                            <option value="karnataka">Karnataka</option>
                            <option value="goa">Goa</option>
                        </select>
                    </div>
                    <div class="relative">
                        <select id="districtSelect" class="w-full p-3 border rounded-lg text-gray-600" disabled>
                            <option value="" disabled selected>Select District</option>
                        </select>
                    </div>
                    <button id="findLocationBtn" class="w-full py-3 bg-gradient-to-r from-orange-500 to-pink-500 text-white rounded-lg disabled:opacity-50" disabled>
                        Get Location
                    </button>
                </div>
            </div>
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

<?php include '../../whatsapp.php'; ?>
<?php include '../../includes/footer.php'; ?>

<script>
function scrollToSection(sectionId){
    const section=document.getElementById(sectionId);
    if(section){ window.scrollTo({top: section.offsetTop-120, behavior:'smooth'}); updateActiveTab(sectionId); }
}

function updateActiveTab(activeId){
    const buttons=document.querySelectorAll('.sticky-nav-container button');
    buttons.forEach(button=>{
        const match = button.getAttribute('onclick')?.match(/'([^']+)'/);
        const section = match ? match[1] : null;
        if(section===activeId){
            button.classList.add('section-active');
            button.classList.remove('bg-white','text-gray-600','border','border-gray-200');
        }else{
            button.classList.remove('section-active');
            button.classList.add('bg-white','text-gray-600','border','border-gray-200');
        }
    });
}

let scrollTimeout;
function updateActiveSection(){
    const sections=['introduction','eligibility','reservation-policy','fees','process-flow','faq'];
    const scrollPosition = window.scrollY + 140;
    let activeSection='introduction';
    sections.forEach(sectionId=>{
        const section=document.getElementById(sectionId);
        if(section && scrollPosition>=section.offsetTop && scrollPosition<section.offsetTop+section.offsetHeight){
            activeSection=sectionId;
        }
    });
    updateActiveTab(activeSection);
}

window.addEventListener('scroll',()=>{clearTimeout(scrollTimeout); scrollTimeout=setTimeout(updateActiveSection,100);});
document.addEventListener('DOMContentLoaded', updateActiveSection);
</script>

</body>
</html>
