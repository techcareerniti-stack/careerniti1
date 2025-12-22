<?php
session_start();

// Define exam categories with real info
$examCategories = [
    [
        "title" => "Medical",
        "image" => "../assets/images/med.png",
        "type" => "UG",
        "description" => "Medical entrance exams for undergraduate programs",
        "details" => [
            "held" => "Twice a year (NEET UG)",
            "duration" => "3 hours",
            "syllabus" => "Physics, Chemistry, Biology",
            "eligibility" => "10+2 with PCB",
            "official_link" => "https://ntaneet.nic.in/"
        ]
    ],
    [
        "title" => "Engineering",
        "image" => "../assets/images/eng.png",
        "type" => "UG",
        "description" => "Engineering entrance exams for undergraduate programs",
        "details" => [
            "held" => "Once a year (JEE Main + Advanced)",
            "duration" => "3 hours",
            "syllabus" => "Physics, Chemistry, Mathematics",
            "eligibility" => "10+2 with PCM",
            "official_link" => "https://jeemain.nta.nic.in/"
        ]
    ],
    [
        "title" => "Pure Science",
        "image" => "../assets/images/PureSc.jpeg",
        "type" => "UG",
        "description" => "Science entrance exams for undergraduate programs",
        "details" => [
            "held" => "Once a year (IISER, JEST, KVPY)",
            "duration" => "2–3 hours depending on exam",
            "syllabus" => "Physics, Chemistry, Mathematics, Biology",
            "eligibility" => "10+2 with Science subjects",
            "official_link" => "https://www.iiseradmission.in/"
        ]
    ],
    [
        "title" => "MBA",
        "image" => "../assets/images/med.png",
        "type" => "PG",
        "description" => "Management entrance exams for postgraduate programs",
        "details" => [
            "held" => "Once a year (CAT, XAT, NMAT, GMAT)",
            "duration" => "2–3 hours",
            "syllabus" => "Quantitative Ability, Verbal, Logical Reasoning, Data Interpretation",
            "eligibility" => "Bachelor's degree in any discipline",
            "official_link" => "https://iimcat.ac.in/"
        ]
    ],
    [
        "title" => "MTech",
        "image" => "../assets/images/PureSc.jpeg",
        "type" => "PG",
        "description" => "Technology entrance exams for postgraduate programs",
        "details" => [
            "held" => "Once a year (GATE)",
            "duration" => "3 hours",
            "syllabus" => "Engineering subjects specific to branch",
            "eligibility" => "Bachelor's in Engineering/Technology",
            "official_link" => "https://gate.iitkgp.ac.in/"
        ]
    ],
    [
        "title" => "Medical PG",
        "image" => "../assets/images/PureSc.jpeg",
        "type" => "PG",
        "description" => "Medical entrance exams for postgraduate programs",
        "details" => [
            "held" => "Once a year (NEET PG, AIIMS PG, JIPMER PG)",
            "duration" => "3 hours 30 mins",
            "syllabus" => "MBBS syllabus with emphasis on clinical subjects, preventive & paraclinical",
            "eligibility" => "MBBS degree with internship completed",
            "official_link" => "https://nbe.edu.in/"
        ]
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Exam Categories - Career Guidance</title>

<!-- Tailwind CSS -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    .filter-tab { transition: all 0.3s ease; cursor: pointer; }
    .filter-tab.active { background: linear-gradient(to right, #f97316, #ec4899); color: white; box-shadow: 0 4px 12px rgba(249, 115, 22, 0.3); }
    .filter-tab:not(.active):hover { background-color: #f3f4f6; }
    .exam-card { transition: all 0.3s ease; transform-origin: center; }
    .exam-card:hover { transform: translateY(-5px); box-shadow: 0 10px 25px rgba(0,0,0,0.1); border-color: #f97316; }
    .exam-card:hover .exam-image { transform: scale(1.05); }
    .fade-in-up { animation: fadeInUp 0.5s ease forwards; }
    @keyframes fadeInUp { from {opacity:0; transform:translateY(20px);} to {opacity:1; transform:translateY(0);} }
    #examModal { display:none; position:fixed; inset:0; background:rgba(0,0,0,0.7); justify-content:center; align-items:center; z-index:1000; backdrop-filter: blur(5px); }
    #examModal.active { display:flex; animation: modalFadeIn 0.3s ease; }
    @keyframes modalFadeIn { from {opacity:0; backdrop-filter: blur(0);} to {opacity:1; backdrop-filter: blur(5px);} }
    .modal-content { background:white; border-radius:1rem; max-width:600px; width:90%; transform:scale(0.9); transition: transform 0.3s ease; }
    #examModal.active .modal-content { transform: scale(1); }
</style>
</head>
<body class="bg-gray-50 min-h-screen">

<?php include("../includes/usernavbar.php"); ?>

<section class="mb-10">
<div class="relative text-center py-8 bg-gradient-to-r from-orange-400 to-pink-500 text-white">
    <div class="absolute inset-0 bg-black opacity-10"></div>
    <div class="relative z-10">
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold px-4">Exam</h1>
    </div>
</div>
</section>

<!-- Filter Tabs -->
<div class="container mx-auto px-4 mb-8">
<div class="mt-10 mb-10 flex w-64 mx-auto h-10 rounded-xl overflow-hidden border-2 border-orange-200 shadow-md">
    <div class="filter-tab w-1/2 flex items-center justify-center bg-orange-500 text-white font-medium" id="ugTab" onclick="filterExams('UG')">
        <span class="font-semibold flex items-center"><i class="fas fa-graduation-cap mr-2 text-sm"></i>UG</span>
    </div>
    <div class="filter-tab w-1/2 flex items-center justify-center bg-gray-100 text-gray-600 font-medium" id="pgTab" onclick="filterExams('PG')">
        <span class="font-semibold flex items-center"><i class="fas fa-user-graduate mr-2 text-sm"></i>PG</span>
    </div>
</div>
</div>

<!-- Exam Cards Grid -->
<div class="container mx-auto px-4 mb-16">
<div id="examGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
<?php foreach($examCategories as $exam): ?>
<div class="exam-card fade-in-up max-w-sm bg-white rounded-xl border border-gray-200 overflow-hidden shadow-sm hover:shadow-xl" data-type="<?= $exam['type'] ?>">
    <div class="w-full h-48 overflow-hidden bg-gradient-to-br from-orange-50 to-pink-50">
        <img src="<?= $exam['image'] ?>" alt="<?= $exam['title'] ?>" class="w-full h-full object-contain exam-image p-4">
    </div>
    <div class="p-5">
        <div class="flex items-center justify-between">
            <div class="flex-1">
                <div class="flex items-center mb-2">
                    <h3 class="text-xl font-bold text-gray-800"><?= $exam['title'] ?></h3>
                    <span class="ml-3 px-3 py-1 text-xs font-semibold rounded-full <?= $exam['type']=='UG'?'bg-blue-100 text-blue-600':'bg-purple-100 text-purple-600' ?>"><?= $exam['type'] ?></span>
                </div>
                <p class="text-gray-600 text-sm mb-3"><?= $exam['description'] ?></p>
            </div>
        </div>
        <div class="mt-4 pt-4 border-t border-gray-100 flex items-center justify-between">
            <span class="text-sm text-gray-500"><i class="fas fa-book-open mr-1"></i>Entrance Exams</span>
            <button onclick='showExamDetails(<?= json_encode($exam) ?>)' class="text-orange-500 hover:text-orange-600 font-medium text-sm transition-colors duration-200">
                Explore <i class="fas fa-arrow-right ml-1 text-xs"></i>
            </button>
        </div>
    </div>
</div>
<?php endforeach; ?>
</div>
<div id="noResults" class="hidden text-center py-12">
    <div class="text-gray-400 mb-4"><i class="fas fa-search fa-3x"></i></div>
    <h3 class="text-xl font-semibold text-gray-600 mb-2">No exams found</h3>
    <p class="text-gray-500">Try selecting a different category</p>
</div>
</div>

<!-- Modal -->
<div id="examModal" class="hidden">
<div class="modal-content p-0 overflow-hidden">
    <div class="bg-gradient-to-r from-orange-400 to-pink-600 text-black p-6">
        <div class="flex justify-between items-center">
            <h2 id="modalExamTitle" class="text-2xl font-bold"></h2>
            <button onclick="closeExamModal()" class="text-white hover:text-gray-200 text-2xl font-bold transition-colors duration-200"><i class="fas fa-times"></i></button>
        </div>
        <p id="modalExamType" class="text-orange-100 mt-1"></p>
    </div>
    <div class="p-6 space-y-6">
        <p id="modalExamDescription" class="text-gray-700 text-base leading-relaxed"></p>
        <div class="bg-white rounded-xl shadow-md p-6 space-y-4 border border-gray-100">
            <h4 class="font-semibold text-gray-800 mb-4 flex items-center text-lg"><i class="fas fa-info-circle text-orange-500 mr-2"></i>Exam Information</h4>
            <ul class="space-y-3">
                <li class="flex items-center">
                    <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-full bg-orange-100 text-orange-500 mr-3"><i class="fas fa-calendar-alt"></i></span>
                    <span class="text-gray-700 text-sm" id="modalHeld"></span>
                </li>
                <li class="flex items-center">
                    <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-full bg-pink-100 text-pink-500 mr-3"><i class="fas fa-clock"></i></span>
                    <span class="text-gray-700 text-sm" id="modalDuration"></span>
                </li>
                <li class="flex items-center">
                    <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-full bg-blue-100 text-blue-500 mr-3"><i class="fas fa-book"></i></span>
                    <span class="text-gray-700 text-sm" id="modalSyllabus"></span>
                </li>
                <li class="flex items-center">
                    <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-full bg-green-100 text-green-500 mr-3"><i class="fas fa-user-graduate"></i></span>
                    <span class="text-gray-700 text-sm" id="modalEligibility"></span>
                </li>
                <li class="flex items-center">
                    <span class="flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-full bg-purple-100 text-purple-500 mr-3"><i class="fas fa-link"></i></span>
                    <span class="text-gray-700 text-sm">Official Link: <a href="#" target="_blank" id="modalLink" class="text-orange-500 underline">Visit</a></span>
                </li>
            </ul>
        </div>
        <div class="flex flex-col sm:flex-row gap-3">
            <button onclick="closeExamModal()" class="flex-1 border border-gray-300 text-gray-700 font-semibold py-3 px-6 rounded-lg hover:bg-gray-50 transition-all duration-300"><i class="fas fa-times mr-2"></i>Close</button>
        </div>
    </div>
</div>
</div>

<?php include("../includes/footer.php"); ?>

<script>
document.addEventListener('DOMContentLoaded', function(){
    filterExams('UG');  // Show UG by default
    const cards = document.querySelectorAll('.fade-in-up');
    cards.forEach((card, i)=>{card.style.animationDelay=`${i*0.1}s`; card.style.opacity='0';});
    setTimeout(()=>{cards.forEach(card=>card.style.opacity='1');},100);
});

function filterExams(type){
    const examCards = document.querySelectorAll('.exam-card');
    const ugTab = document.getElementById('ugTab');
    const pgTab = document.getElementById('pgTab');
    const noResults = document.getElementById('noResults');

    if(type==='UG'){
        ugTab.classList.add('active'); pgTab.classList.remove('active');
        ugTab.classList.add('bg-orange-500','text-white'); pgTab.classList.add('bg-gray-100','text-gray-600');
    } else {
        pgTab.classList.add('active'); ugTab.classList.remove('active');
        pgTab.classList.add('bg-orange-500','text-white'); ugTab.classList.add('bg-gray-100','text-gray-600');
    }
    if(type==='PG'){
        ugTab.classList.add('active'); pgTab.classList.remove('active');
        ugTab.classList.add('bg-orange-500','text-white'); pgTab.classList.add('bg-gray-100','text-gray-600');
    } else {
        pgTab.classList.add('active'); ugTab.classList.remove('active');
        pgTab.classList.add('bg-orange-500','text-white'); ugTab.classList.add('bg-gray-100','text-gray-600');
    }

    let visibleCount=0;
    examCards.forEach(card=>{
        if(card.dataset.type===type){
            card.style.display='block';
            visibleCount++;
            card.style.animation='none';
            setTimeout(()=>{card.style.animation='fadeInUp 0.5s ease forwards';},10);
        } else {
            card.style.display='none';
        }
    });

    visibleCount===0 ? noResults.classList.remove('hidden') : noResults.classList.add('hidden');
}

function showExamDetails(exam){
    const modal = document.getElementById('examModal');
    document.getElementById('modalExamTitle').textContent = exam.title;
    document.getElementById('modalExamDescription').textContent = exam.description;
    document.getElementById('modalExamType').textContent = exam.type==='PG' ? 'Postgraduate Entrance Exam' : 'Undergraduate Entrance Exam';
    document.getElementById('modalHeld').textContent = 'Typically held: '+exam.details.held;
    document.getElementById('modalDuration').textContent = 'Duration: '+exam.details.duration;
    document.getElementById('modalSyllabus').textContent = 'Syllabus: '+exam.details.syllabus;
    document.getElementById('modalEligibility').textContent = 'Eligibility: '+exam.details.eligibility;
    document.getElementById('modalLink').href = exam.details.official_link;

    modal.classList.add('active'); modal.classList.remove('hidden'); 
    document.body.style.overflow='hidden';
}

function closeExamModal(){
    const modal=document.getElementById('examModal');
    modal.classList.remove('active'); 
    setTimeout(()=>{modal.classList.add('hidden');},300); 
    document.body.style.overflow='auto';
}

document.getElementById('examModal').addEventListener('click', function(e){
    if(e.target===this) closeExamModal();
});
document.addEventListener('keydown', function(e){
    if(e.key==='Escape') closeExamModal();
});
</script>
</body>
</html>
