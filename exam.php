<?php
session_start();

/* ============================
   EXAM DATA (UG + PG)
============================ */
$examCategories = [

    /* UG EXAMS */
    [
        "title"=>"Medical", 
        "image"=>"./assets/images/med.png",
        "type"=>"UG",
        "description"=>"Medical entrance exams for undergraduate programs",
        "sub_exams"=>[
            ["title"=>"NEET UG","image"=>"./assets/images/NEET.jpeg"],
            ["title"=>"AIIMS","image"=>"./assets/images/AIMAP.jpeg"]
        ]
    ],

    [
        "title"=>"Engineering",
        "image"=>"./assets/images/eng.png",
        "type"=>"UG",
        "description"=>"Engineering entrance exams for undergraduate programs",
        "sub_exams"=>[
             ["title"=>"BVP CET","image"=>"./assets/images/BVPCET.jpeg"],
            ["title"=>"COMEDK","image"=>"./assets/images/COMEDK.jpeg"],
            ["title"=>"CUET","image"=>"./assets/images/CUET.jpeg"],
            ["title"=>"JEE ADVANCED","image"=>"./assets/images/JEEAD.jpeg"],
            ["title"=>"JEE MAINS","image"=>"./assets/images/JEEMAIN.jpeg"],
            ["title"=>"MANIPAL","image"=>"./assets/images/MANIPAL.jpeg"],
            ["title"=>"MHT CET","image"=>"./assets/images/MHTCET.jpeg"],
            ["title"=>"VITEEE","image"=>"./assets/images/VIT.jpeg"]
        ]
    ],

    [
        "title"=>"Pure Science",
        "image"=>"./assets/images/PureSc.jpeg",
        "type"=>"UG"
    ],

    /* PG EXAMS */
    [
        "title"=>"Medical",
        "image"=>"./assets/images/med.png",
        "type"=>"PG",
        "description"=>"Postgraduate medical entrance exams",
        "sub_exams"=>[
            ["title"=>"NEET PG","image"=>"./assets/images/NEET.jpeg"]
        ]
    ],

    [
        "title"=>"Engineering",
        "image"=>"./assets/images/eng.png",
        "type"=>"PG",
        "description"=>"Postgraduate engineering entrance exams",
        "sub_exams"=>[
            ["title"=>"GATE","image"=>"./assets/images/GATE.jpeg"],
            ["title"=>"GRE","image"=>"./assets/images/JRE.jpeg"]
        ]
    ],

    [
        "title"=>"Pure Science",
        "image"=>"./assets/images/PureSc.jpeg",
        "type"=>"PG"
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Exam Categories</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Tailwind CSS -->
    <link href="./assets/css/output.css" rel="stylesheet">
</head>
<body class="bg-gray-50">

<?php include("./includes/navbar.php"); ?>

<!-- HEADER -->
<div class="relative text-center py-8 bg-gradient-to-r from-orange-400 to-pink-600 text-white">
    <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold">Exam</h1>
</div>

<!-- FILTER -->
<div class="flex justify-center my-12 sm:my-12">
    <div class="flex rounded-xl overflow-hidden shadow flex-wrap">
        <button id="ugTab" onclick="filterExams('UG')" class="px-4 sm:px-6 md:px-8 py-2 sm:py-3 bg-orange-500 text-white text-sm sm:text-base md:text-lg">UG</button>
        <button id="pgTab" onclick="filterExams('PG')" class="px-4 sm:px-6 md:px-8 py-2 sm:py-3 bg-gray-200 text-sm sm:text-base md:text-lg">PG</button>
    </div>
</div>

<!-- EXAM CARDS -->
<div class="container mx-auto px-2 sm:px-4 lg:px-8">
    <div class="flex flex-wrap justify-center gap-4 sm:gap-6 md:gap-8">
        <?php foreach($examCategories as $exam): ?>
        <div class="exam-card w-40 sm:w-56 md:w-64 lg:w-72 xl:w-80 bg-white rounded-xl shadow hover:shadow-2xl transition cursor-pointer p-3 sm:p-4 md:p-5 lg:p-6"
             data-type="<?= $exam['type'] ?>"
             onclick='openSection(<?= json_encode($exam) ?>)'>
            <img src="<?= $exam['image'] ?>" class="w-full h-28 sm:h-36 md:h-40 lg:h-44 xl:h-52 object-contain rounded-t-xl mb-2 sm:mb-3">
            <div class="text-center">
                <h3 class="font-semibold text-sm sm:text-lg md:text-xl lg:text-2xl"><?= $exam['title'] ?></h3>
                <span class="text-xs sm:text-sm md:text-base lg:text-lg text-gray-500"><?= $exam['type'] ?></span>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- SUB-EXAM SECTION -->
<div id="detailSection" class="hidden mt-8 sm:mt-10 md:mt-12 container mx-auto px-2 sm:px-4 lg:px-8">
    <h2 id="sectionTitle" class="text-center text-lg sm:text-xl md:text-2xl lg:text-3xl text-gray-600 mb-4 sm:mb-6 md:mb-8"></h2>
    <div id="subExamsSection" class="flex flex-wrap justify-center gap-3 sm:gap-4 md:gap-6 lg:gap-8 items-center"></div>
</div>

<script>
function filterExams(type){
    document.querySelectorAll('.exam-card').forEach(card=>{
        card.style.display = card.dataset.type===type?'block':'none';
    });

    ugTab.className = type==='UG'
        ? 'px-4 sm:px-6 md:px-8 py-2 sm:py-3 bg-orange-500 text-white text-sm sm:text-base md:text-lg'
        : 'px-4 sm:px-6 md:px-8 py-2 sm:py-3 bg-gray-200 text-sm sm:text-base md:text-lg';

    pgTab.className = type==='PG'
        ? 'px-4 sm:px-6 md:px-8 py-2 sm:py-3 bg-orange-500 text-white text-sm sm:text-base md:text-lg'
        : 'px-4 sm:px-6 md:px-8 py-2 sm:py-3 bg-gray-200 text-sm sm:text-base md:text-lg';

    document.getElementById('detailSection').classList.add('hidden');
}

function openSection(exam){
    const section = document.getElementById('detailSection');
    section.classList.remove('hidden');

    document.getElementById('sectionTitle').innerText = "Admission Process for " + exam.title;

    const sub = document.getElementById('subExamsSection');
    sub.innerHTML = '';

    if(exam.sub_exams){
        exam.sub_exams.forEach(s=>{
            sub.innerHTML += `
            <div class="text-center w-24 sm:w-32 md:w-36 lg:w-40">
                <img src="${s.image}" class="w-24 sm:w-32 md:w-36 lg:w-40 h-24 sm:h-32 md:h-36 lg:h-40 mx-auto mb-2 object-contain rounded-lg">
                <p class="font-medium text-xs sm:text-sm md:text-base lg:text-lg">${s.title}</p>
            </div>`;
        });
    }

    window.scrollTo({ top: section.offsetTop-80, behavior:'smooth' });
}

// Default load UG
filterExams('UG');
</script>

<?php include("./includes/footer.php"); ?>
</body>
</html>
