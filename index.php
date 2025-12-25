
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerNiti</title>
    <link rel="stylesheet" href="assets/css/output.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" type="image/png" href="./assets/images/title-logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">  
    <!-- Tailwind CSS -->
    <link href="./assets/css/output.css" rel="stylesheet">
</head>
<body>
<?php include './includes/navbar.php'; ?> 
 <?php
    $quickCategories = [
        [
            'id' => 'engineering',
            'name' => 'Engineering',
            'icon' => '🔧',
            'category' => 'engineering',
            'gradient' => 'bg-gradient-to-br from-orange-400 via-orange-500 to-red-500',
            'description' => 'Design, build, and innovate with cutting-edge technology',
            'courses' => [
                'Computer Science Engineering',
                'Mechanical Engineering', 
                'Civil Engineering',
                'Electrical Engineering',
                'Electronics Engineering',
                'Biomedical Engineering',
                'Chemical Engineering',
                'Aerospace Engineering'
            ],
            'colleges' => [
                'Indian Institute of Technology (IIT)',
                'National Institute of Technology (NIT)',
                'BITS Pilani',
                'Vellore Institute of Technology (VIT)',
                'Delhi Technological University (DTU)'
            ],
            'exams' => [
                'JEE Main & Advanced',
                'BITSAT',
                'VITEEE',
                'MHT CET',
                'WBJEE'
            ]
        ],
        [
            'id' => 'medical',
            'name' => 'Medical',
            'icon' => '⚕️',
            'category' => 'medical',
            'gradient' => 'bg-gradient-to-br from-blue-400 via-blue-500 to-purple-600',
            'description' => 'Heal, care, and save lives in healthcare sector',
            'courses' => [
                'MBBS (Doctor of Medicine)',
                'BDS (Dentistry)',
                'BAMS (Ayurvedic Medicine)',
                'B.Sc Nursing',
                'Physiotherapy',
                'Pharmacy',
                'Veterinary Science',
                'Medical Laboratory Technology'
            ],
            'colleges' => [
                'All India Institute of Medical Sciences (AIIMS)',
                'Christian Medical College (CMC)',
                'Armed Forces Medical College (AFMC)',
                'Maulana Azad Medical College (MAMC)',
                "King George's Medical University"
            ],
            'exams' => [
                'NEET UG',
                'NEET PG',
                'AIIMS MBBS',
                'JIPMER MBBS',
                'FMGE'
            ]
        ],
        [
            'id' => 'science',
            'name' => 'Pure Science',
            'icon' => '🔬',
            'category' => 'science',
            'gradient' => 'bg-gradient-to-br from-green-400 via-green-500 to-teal-600',
            'description' => 'Discover, research, and explore scientific frontiers',
            'courses' => [
                'B.Sc Physics',
                'B.Sc Chemistry',
                'B.Sc Mathematics',
                'B.Sc Biology',
                'B.Sc Computer Science',
                'B.Sc Statistics',
                'B.Sc Biotechnology',
                'B.Sc Environmental Science'
            ],
            'colleges' => [
                "St. Stephen's College, Delhi",
                'Presidency College, Chennai',
                'Loyola College, Chennai',
                'Hindu College, Delhi',
                'Miranda House, Delhi'
            ],
            'exams' => [
                'IISER Aptitude Test',
                'NEST',
                'CUCET',
                'BHU UET',
                'DU Entrance Exam'
            ]
            ],
        [
    'id' => 'engineering',
    'name' => 'Engineering College Predictor',
    'icon' => '⚙️',

    
    
],
[
    'id' => 'medical',
    'name' => 'Medical College Predictor',
    'icon' => '🩺',
    'category' => 'medical',
    
]

        
    ];
    ?>
    <div class="relative h-[500px] w-full mb-7">
        <div class="absolute inset-0 bg-cover bg-center h-full w-full"
         style="background-image: url('assets/images/misssion.jpg');">
            <div class="absolute inset-0 bg-black/40"></div>
        </div>
        <div class="relative h-full flex flex-col items-center justify-center px-4">
            <h1 class="text-4xl md:text-5xl text-white font-bold mb-2 mt-20 text-center">Choose the right career with</h1>
            <h2 class="text-3xl md:text-4xl text-white font-bold">Careerniti</h2>
            <p class="text-white text-lg mb-8 opacity-90">Guide your future with us</p>
            <div class="w-full max-w-3xl relative mb-20 text-white">
                <input type="text" placeholder="Search for careers..." 
                class="w-full px-6 py-4 rounded-full text-lg focus:outline-none shadow-lg focus:ring-2 
                focus:ring-orange-400 text-white-800 border border-black"/>
                
                <!-- Buttons -->
<div class="w-full max-w-4xl mt-12 flex flex-col items-center gap-4">
    <!-- Row 1: 3 buttons -->
    <div class="flex flex-wrap justify-center gap-4 w-full">
        <?php foreach (array_slice($quickCategories, 0, 3) as $item): ?>
        <button type="button"
            class="flex items-center justify-center gap-1 bg-gradient-to-r
             from-orange-500 to-pink-500 text-white border border-white/20 shadow-md 
             rounded-lg flex-1 min-w-[120px] py-2 sm:py-3 text-[10px] 
             sm:text-sm md:text-base [&>span:first-child]:text-sm sm:[&>span:first-child]:text-xl
              hover:bg-white/20 transition-all duration-300 category-button"
            data-category='<?php echo htmlspecialchars(json_encode($item), ENT_QUOTES, 'UTF-8'); ?>'
            onclick="handleCategoryClick(this, event)">
            <span class="text-xl"><?php echo $item['icon']; ?></span>
            <span class="font-semibold whitespace-nowrap"><?php echo htmlspecialchars($item['name']); ?></span>
        </button>
        <?php endforeach; ?>
    </div>

    <!-- Row 2: 2 buttons -->
    <div class="flex flex-wrap justify-center gap-4 w-full">
        <?php foreach (array_slice($quickCategories, 3, 2) as $item): ?>
        <button type="button"
            class="flex items-center bg-gradient-to-r from-blue-500 to-pink-500 
            justify-center gap-1 
            text-white border border-white/20 shadow-md rounded-lg flex-1 
            min-w-[120px] py-2 sm:py-3 text-[10px] sm:text-sm 
            md:text-base [&>span:first-child]:text-sm sm:[&>span:first-child]:text-xl 
            hover:bg-white/20 transition-all duration-300 category-button"
            data-category='<?php echo htmlspecialchars(json_encode($item), ENT_QUOTES, 'UTF-8'); ?>'
            onclick="handleCategoryClick(this, event)">
            <span class="text-xl"><?php echo $item['icon']; ?></span>
            <span class="font-semibold whitespace-nowrap"><?php echo htmlspecialchars($item['name']); ?></span>
        </button>
        <?php endforeach; ?>
    </div>
</div>

<!-- Modal -->
<div id="category-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex justify-center items-center z-50">
    <div class="bg-white rounded-xl shadow-xl max-w-3xl w-11/12 p-6 relative">
        <button id="close-modal" class="absolute top-3 right-3 text-gray-500 hover:text-red-500 text-2xl font-bold">&times;</button>
        <div id="modal-header" class="p-4 text-white font-bold text-xl bg-gradient-to-r from-orange-500 to-pink-500 rounded-t-xl"></div>
        <div class="p-4">
            <div id="tabs" class="flex border-b border-gray-200 mb-8"></div>
            <div id="tab-content" class="transition-all duration-300"></div>
        </div>
    </div>
</div>

<script>
function handleCategoryClick(button, event) {
    event.preventDefault();
    const category = JSON.parse(button.getAttribute('data-category'));

    const modalHeader = document.getElementById('modal-header');
    const buttonClasses = button.className.split(' ').filter(c => c.startsWith('bg-'));
    modalHeader.className = `p-4 text-white font-bold text-xl rounded-t-xl ${buttonClasses.join(' ')}`;
    modalHeader.textContent = category.name + " " + category.icon;

    const tabsDiv = document.getElementById('tabs');
    const tabContentDiv = document.getElementById('tab-content');
    tabsDiv.innerHTML = '';
    tabContentDiv.innerHTML = '';

    const tabs = [];
    if(category.courses) tabs.push('Courses');
    if(category.colleges) tabs.push('Colleges');
    if(category.exams) tabs.push('Exams');

    tabs.forEach((tab, index) => {
        const tabBtn = document.createElement('button');
        tabBtn.textContent = tab;
        tabBtn.className = `px-4 py-2 font-semibold text-gray-600 hover:text-orange-500 focus:outline-none ${index===0?'border-b-2 border-orange-500 text-orange-500':''}`;
        tabBtn.addEventListener('click', () => {
            tabsDiv.querySelectorAll('button').forEach(b=>b.classList.remove('border-b-2','text-orange-500'));
            tabBtn.classList.add('border-b-2','text-orange-500');

            let html = '';
            if(tab==='Courses') html = `<ul class="list-disc ml-6">${category.courses.map(c=>`<li>${c}</li>`).join('')}</ul>`;
            if(tab==='Colleges') html = `<ul class="list-disc ml-6">${category.colleges.map(c=>`<li>${c}</li>`).join('')}</ul>`;
            if(tab==='Exams') html = `<ul class="list-disc ml-6">${category.exams.map(c=>`<li>${c}</li>`).join('')}</ul>`;
            tabContentDiv.innerHTML = html;
        });
        tabsDiv.appendChild(tabBtn);
    });

    if(tabsDiv.querySelector('button')) tabsDiv.querySelector('button').click();

    const modal = document.getElementById('category-modal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

document.getElementById('close-modal').addEventListener('click', () => {
    const modal = document.getElementById('category-modal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
});

document.getElementById('category-modal').addEventListener('click', e => {
    if(e.target === document.getElementById('category-modal')){
        e.target.classList.add('hidden');
        e.target.classList.remove('flex');
    }
});
</script>

            </div>
        </div>
    </div>
 <!-- Notification & Updates Section -->
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 mb-12 md:mb-16">
        <div class="text-center mb-8 md:mb-12">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-3"> Notification & Updates</h2>
            <p class="text-gray-600 text-sm sm:text-base">Stay updated with the latest career opportunities and exam notifications</p>
        </div>
        <div class="marquee-container bg-gradient-to-r from-orange-50 to-orange-100 rounded-xl p-4 border border-orange-200">
            <div class="marquee-content">
                <?php
                $notifications = [
                    "📢 JEE Main 2024 registration starts from December 15!",
                    "🎓 NEET UG 2024 exam date announced: May 5, 2024",
                    "🔥 New scholarship program for engineering students launched",
                    "📅 IIM CAT 2023 results to be declared on January 4, 2024",
                    "🏆 Career counseling session with IIT alumni on Saturday",
                    "📚 Free webinar on 'How to crack UPSC' this Sunday",
                    "🎯 BITSAT 2024 application portal now open",
                    "🌟 Internship opportunities with top IT companies"
                ];
                
                foreach ($notifications as $notification) {
                    echo '<span class="inline-block mx-6 md:mx-10 px-4 py-2 bg-white rounded-lg shadow-sm border border-orange-300 text-gray-800 font-medium">' . $notification . '</span>';
                }
                foreach ($notifications as $notification) {
                    echo '<span class="inline-block mx-6 md:mx-10 px-4 py-2 bg-white rounded-lg shadow-sm border border-orange-300 text-gray-800 font-medium">' . $notification . '</span>';
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Top to Explore Section -->
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 ">
        <h1 class="text-4xl font-bold text-center mb-3">Top to Explore</h1>    
        <div class="mb-8">
            <h1 class="text-xl text-gray-600 text-center mb-5">Find cities for you</h1>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4 sm:gap-5 justify-items-center">
                <div class="w-full max-w-[160px]">
                    <img src="assets/images/chennai.png" alt="Chennai image" class="w-full h-40 object-cover rounded-lg shadow-md hover:scale-105 transition-transform" />
                </div>
                <div class="w-full max-w-[160px]">
                    <img src="assets/images/Delhi.png" alt="Delhi image" class="w-full h-40 object-cover rounded-lg shadow-md hover:scale-105 transition-transform" />
                </div>
                <div class="w-full max-w-[160px]">
                    <img src="assets/images/hydrabad.png" alt="Hyderabad image" class="w-full h-40 object-cover rounded-lg shadow-md hover:scale-105 transition-transform" />
                </div>
                <div class="w-full max-w-[160px]">
                    <img src="assets/images/kolkata.png" alt="Kolkata image" class="w-full h-40 object-cover rounded-lg shadow-md hover:scale-105 transition-transform" />
                </div>
                <div class="w-full max-w-[160px]">
                    <img src="assets/images/mumbai.png" alt="Mumbai image" class="w-full h-40 object-cover rounded-lg shadow-md hover:scale-105 transition-transform" />
                </div>
                <div class="w-full max-w-[160px]">
                    <img src="assets/images/pune.png" alt="Pune image" class="w-full h-40 object-cover rounded-lg shadow-md hover:scale-105 transition-transform" />
                </div>
            </div>
        </div>
        <div class="mb-8">
            <h1 class="text-xl text-gray-600 text-center mb-2">Find colleges for you</h1>
            <div class="flex flex-wrap justify-center gap-5">
                <div class="max-w-sm rounded-lg border-2 border-orange-300 overflow-hidden bg-white shadow-lg hover:shadow-xl transition-shadow">
                    <div class="relative h-48">
                        <img src="assets/images/college.png" alt="IIT Madras" class="w-full h-full object-cover" />
                        <span class="absolute top-2 right-2 bg-gray-100 text-gray-800 text-xs px-3 py-1 rounded-md font-medium">Full Time</span>
                        <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/60 to-transparent">
                            <h3 class="text-xl font-bold text-orange-400">IIT Madras</h3>
                            <p class="text-white">B.Tech</p>
                            <div class="flex items-center mt-1">
                                <span class="text-white font-medium mr-1">4.8</span>
                                <div class="flex text-yellow-400">
                                    ★★★★☆
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">College rank</span>
                            <span class="text-gray-900 font-medium">1st</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">No. of courses</span>
                            <span class="text-gray-900">12</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Avg. Fees</span>
                            <span class="text-gray-900">32.10 K</span>
                        </div>
                        <hr />
                        <button class="flex items-center w-full justify-center text-orange-500 hover:text-orange-600 font-medium transition-colors">
                            Course overview →
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-5">
            <h1 class="text-xl text-gray-600 text-center mb-3">Find courses for you</h1>
            <div class="flex flex-wrap justify-center gap-5">
                <div class="max-w-sm w-full">
                    <div class="bg-white rounded-lg border-2 border-orange-300 p-4 shadow-lg hover:shadow-xl transition-shadow">
                        <div class="flex flex-col space-y-4">
                            <div class="flex justify-start">
                                <span class="bg-gray-100 text-gray-800 text-xs px-3 py-1 rounded-md font-medium">Full-Time</span>
                            </div>
                            <h3 class="text-orange-500 text-xl font-semibold">Computer Science</h3>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Duration</span>
                                    <span class="text-gray-900">4 Years</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Avg. Fees</span>
                                    <span class="text-gray-900">12000</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">No. of Colleges</span>
                                    <span class="text-gray-900">50</span>
                                </div>
                            </div>
                            <hr />
                            <div class="pb-2">
                                <button class="flex items-center justify-center w-full text-orange-500 hover:text-orange-600 font-medium transition-colors">Course overview →</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Services Section -->
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
        <div class="text-center mb-6 md:mb-16">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 mb-3">Our Services</h2>
            <p class="text-gray-600 text-sm sm:text-base"> Comprehensive career solutions tailored for your success</p>
        </div>
        <div class="space-y-12 md:space-y-16">
            <div class="flex flex-col lg:flex-row items-center gap-8 bg-white rounded-2xl border border-gray-200 p-6 md:p-8">
                <div class="lg:w-1/2">
                    <img src="assets/images/serviceCareer.png" alt="Career Guidance" class="w-full sm:w-3/4 md:w-1/2 lg:w-3/5 xl:w-2/3 h-auto object-contain mx-auto"/>
                </div>
                <div class="lg:w-1/2">
                    <h3 class="text-lg sm:text-xl md:text-2xl lg:text-3xl font-bold text-gray-900 mb-4">Career Guidance</h3>
                    <p class="text-gray-600 mb-6 text-justify leading-relaxed">Career guidance works by combining professional expertise with personalized assessment to help individuals identify their skills, interests, and goals. It then provides actionable insights and strategies to navigate the job market effectively, empowering individuals to make informed career decisions and achieve their aspirations.</p>
                    <button class="px-6 py-3 bg-gradient-to-r from-orange-500 to-red-500 text-white font-medium rounded-lg hover:shadow-lg transition-all">Take a Free Career Guidance Session »</button>
                </div>
            </div>
            <div class="flex flex-col lg:flex-row-reverse items-center gap-8 bg-white rounded-2xl border border-gray-200 p-6 md:p-8">
                <div class="lg:w-1/2"><img src="assets/images/serviceEntrance.png" alt="Entrance Exam Guidance" class="w-full sm:w-3/4 md:w-1/2 lg:w-3/5 xl:w-2/3 h-auto object-contain mx-auto"/></div>
                <div class="lg:w-1/2">
                    <h3 class="text-lg sm:text-xl md:text-2xl lg:text-3xl font-bold text-gray-900 mb-4">Entrance Exam Guidance</h3>
                    <p class="text-gray-600 mb-6 text-justify leading-relaxed">Career counseling operates by offering one-on-one sessions with trained counselors who assess an individual's strengths, weaknesses, and aspirations. Through a holistic approach, they provide tailored advice, resources, and strategies to guide clients in making informed career choices and achieving their professional goals.</p>
                    <button class="px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 text-white font-medium rounded-lg hover:shadow-lg transition-all">Take a Free Entrance Guidance Session »</button>
                </div>
            </div>
            <div class="flex flex-col lg:flex-row items-center gap-8 bg-white rounded-2xl border border-gray-200 p-6 md:p-8">
                <div class="lg:w-1/2"><img src="assets/images/serviceAdmission.png" alt="Admission Guidance" class="w-full sm:w-3/4 md:w-1/2 lg:w-3/5 xl:w-2/3 object-contain mx-auto"/></div>
                <div class="lg:w-1/2">
                    <h3 class="text-lg sm:text-xl md:text-2xl lg:text-3xl font-bold text-gray-900 mb-4">Admission Guidance</h3>
                    <p class="text-gray-600 mb-6 text-justify leading-relaxed">Taking an aptitude test is crucial for finding the best career fit, as it assesses one's innate abilities and interests, guiding individuals towards professions that align with their natural strengths. This personalized insight helps in making informed career choices, leading to greater job satisfaction and success.</p>
                    <button class="px-6 py-3 bg-gradient-to-r from-green-500 to-teal-600 text-white font-medium rounded-lg hover:shadow-lg transition-all">Take a Free Admission Guidance Session »</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Statistics Section -->
    <div class="bg-orange-500 text-white py-12 md:py-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 text-center">
                <div class="space-y-3">
                    <div class="text-4xl sm:text-5xl md:text-6xl font-bold">2,000+</div>
                    <div class="text-lg sm:text-xl opacity-90">Students Counseled</div>
                </div>
                <div class="space-y-3">
                    <div class="text-4xl sm:text-5xl md:text-6xl font-bold">10,000+</div>
                    <div class="text-lg sm:text-xl opacity-90">Students Guided</div>
                </div>
                <div class="space-y-3">
                    <div class="text-4xl sm:text-5xl md:text-6xl font-bold">200+</div>
                    <div class="text-lg sm:text-xl opacity-90">Classes Connected</div>
                </div>
            </div>
        </div>
    </div>
    <!-- Student Testimonials Section - Full Width -->
    <div class="testimonials-full-width bg-gradient-to-b from-gray-50 to-white py-12 md:py-16 overflow-hidden">
        <div class="text-center mb-10 md:mb-14">
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-900 mb-3">Student Testimonials</h2>
        </div>
        <div class="testimonials-scroll-container">
            <div class="gradient-overlay-left"></div>
            <div class="gradient-overlay-right"></div>            
            <div class="animate-infinite-scroll">
                <?php
                $testimonials = [
                    [
                        'name' => 'Sakshi Ingale',
                        'college' => 'Seth G S Medical College (KEM), Mumbai',
                        'image' => 'assets/images/sakshiIngale.png',
                        'rating' => 'assets/images/ratingStar.png',
                        'text' => 'Career Niti helped me in proper per result procedures like form filling was kept in batches so that students don\'t have to wait for their turn to come n waste their preparatory time. Many informative n guiding google meets were arranged that kept me up to date with the live notifications n I didn\'t have to keep searching. After results admission related queries were solved through google meetings. The round procedures were smooth enough n the staff was always available for any queries.'
                    ],
                    [
                        'name' => 'Kartikeyan Rajan Kumar',
                        'college' => 'IIT Bhilai',
                        'image' => 'assets/images/kartikeyan.png',
                        'rating' => 'assets/images/ratingStar.png',
                        'text' => 'I received assistance from Career Niti in understanding appropriate procedures based on the results for form filling. I was able to stay updated with live notifications. They organized Google meets to resolve the queries. The personnel was always willing to answer any questions and the round procedures went smoothly. They provide effective and beneficial guidance.'
                    ],
                    [
                        'name' => 'Sumit Garad',
                        'college' => 'IIT Palakkad',
                        'image' => 'assets/images/sumitGarad.png',
                        'rating' => 'assets/images/ratingStar4.png',
                        'text' => 'From start to finish, CareerNiti demonstrated a commitment to excellence that significantly eased the often stressful journey of applying to colleges. The team at CareerNiti is comprised of knowledgeable and dedicated professionals who are well-versed in the intricacies of the admission process.'
                    ],
                    [
                        'name' => 'Bhushan Shinde',
                        'college' => 'IISER Pune',
                        'image' => 'assets/images/bhushanShinde.png',
                        'rating' => 'assets/images/ratingStar.png',
                        'text' => 'Suraj sir from Career Niti provided valuable guidance on medical field options and IISER, suggesting a career in the research field. His professionalism, knowledge, and experience in guiding students through the complex admissions and counseling processes are commendable.'
                    ],
                    [
                        'name' => 'Sumit Garad',
                        'college' => 'IIT Palakkad',
                        'image' => 'assets/images/sumitGarad.png',
                        'rating' => 'assets/images/ratingStar4.png',
                        'text' => 'From start to finish, CareerNiti demonstrated a commitment to excellence that significantly eased the often stressful journey of applying to colleges. The team at CareerNiti is comprised of knowledgeable and dedicated professionals who are well-versed in the intricacies of the admission process.'
                    ],
                    [
                        'name' => 'Sakshi Ingale',
                        'college' => 'Seth G S Medical College (KEM), Mumbai',
                        'image' => 'assets/images/sakshiIngale.png',
                        'rating' => 'assets/images/ratingStar.png',
                        'text' => 'Career Niti helped me in proper per result procedures like form filling was kept in batches so that students don\'t have to wait for their turn to come n waste their preparatory time. Many informative n guiding google meets were arranged that kept me up to date with the live notifications n I didn\'t have to keep searching.'
                    ],
                    [
                        'name' => 'Kartikeyan Rajan Kumar',
                        'college' => 'IIT Bhilai',
                        'image' => 'assets/images/kartikeyan.png',
                        'rating' => 'assets/images/ratingStar.png',
                        'text' => 'I received assistance from Career Niti in understanding appropriate procedures based on the results for form filling. I was able to stay updated with live notifications. They organized Google meets to resolve the queries. The personnel was always willing to answer any questions.'
                    ]
                ];   
                $duplicatedTestimonials = array_merge($testimonials, $testimonials, $testimonials, $testimonials);                
                foreach ($duplicatedTestimonials as $index => $testimonial) {
                    echo '
                    <div class="flex-shrink-0 w-80 md:w-96 px-4">
                        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6 md:p-8 h-full">
                            <div class="flex items-start space-x-4 md:space-x-6 mb-6">
                                <img src="' . $testimonial['image'] . '"  alt="' . $testimonial['name'] . '"class="w-20 h-20 md:w-24 md:h-24 rounded-full object-cover border-4 border-white shadow-lg flex-shrink-0"/>
                                <div>
                                    <h3 class="text-xl md:text-2xl font-bold text-gray-900 mb-1">' . $testimonial['name'] . '</h3>
                                    <p class="text-blue-600 font-medium text-sm md:text-base"> ' . $testimonial['college'] . '</p>
                                    <div class="mt-2">
                                        <img src="' . $testimonial['rating'] . '" alt="Rating" class="w-24 md:w-28 h-auto"/>
                                    </div>
                                </div>
                            </div>
                            <div class="text-gray-700 leading-relaxed text-sm md:text-base">"' . $testimonial['text'] . '"</div>
                        </div>
                    </div>';
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Associations Section - Full Width -->
    <div class="associations-full-width bg-white py-12 md:py-16">
        <div class="text-center mb-2 md:mb-12"> <h1 class="text-4xl font-bold text-center mb-2"> Associates With Us </h1></div>
        <div class="partners-marquee-container">
            <div class="partners-marquee-content space-x-8 md:space-x-12">
                <?php
                $partners = [
                    'assets/images/dice.jpeg',
                    'assets/images/chate.jpeg',
                    'assets/images/kcp.jpeg',
                    'assets/images/kapsan.jpeg',
                    'assets/images/guidancePoint.jpeg',
                    'assets/images/photon.jpeg',
                    'assets/images/rajlakshmi.jpeg',
                    'assets/images/royalAcademy.jpeg',
                    'assets/images/hiremath.jpeg',
                    'assets/images/saraswatiAcademy.jpeg'
                ];
                
                foreach ($partners as $partner) {
                    echo '<div class="flex-shrink-0 w-32 h-32 md:w-40 md:h-40 bg-white rounded-xl flex items-center justify-center p-2 border border-gray-200 shadow-sm">';
                    echo '<img src="' . $partner . '" alt="Partner Logo" class="w-full h-full object-contain" />';
                    echo '</div>';
                }
                foreach ($partners as $partner) {
                    echo '<div class="flex-shrink-0 w-32 h-32 md:w-40 md:h-40 bg-white rounded-xl flex items-center justify-center p-2 border border-gray-200 shadow-sm">';
                    echo '<img src="' . $partner . '" alt="Partner Logo" class="w-full h-full object-contain" />';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>
    <!-- CTA Section -->
    <div class="bg-gradient-to-r from-orange-500 to-red-600 text-white py-12 md:py-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-4">Ready to Transform Your Career?</h2>
            <p class="text-lg sm:text-xl opacity-90 mb-8 max-w-2xl mx-auto">Take the first step towards your dream career with personalized guidance</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button class="px-6 py-3 bg-white text-orange-600 font-bold rounded-lg hover:bg-gray-100 transition-colors">Book Free Consultation</button>
                <button class="px-6 py-3 border-2 border-white text-white font-bold rounded-lg hover:bg-white/10 transition-colors">Explore All Services</button>
            </div>
        </div>
    </div>  
    <?php include 'includes/footer.php'; ?>
    <div id="hoverModal" class="fixed z-50">
        <div class="modal-arrow"></div>
        <div class="p-0"></div>
    </div>   
    <div id="mobileModal" class="fixed z-50">
        <div class="mobile-modal-content">
            <div class="p-4"></div>
        </div>
    </div>
    <script>
        let hoverTimer;
        let activeModal = null;
        let currentCategory = null;
        let isMobile = window.innerWidth < 768; 
        window.addEventListener('resize', () => {
            isMobile = window.innerWidth < 768;
        });   
        function handleCategoryHover(button, event) {
            if (isMobile) return;            
            clearTimeout(hoverTimer);            
            hoverTimer = setTimeout(() => {
                try {
                    const categoryData = parseCategoryData(button);
                    currentCategory = categoryData;
                    if (categoryData) {
                        showDesktopModal(categoryData, event);
                    }
                } catch (error) {
                    console.error('Error in hover handler:', error);
                }
            }, 300);
        }      
        function handleCategoryLeave() {
            if (isMobile) return;            
            hoverTimer = setTimeout(() => {
                const modal = document.getElementById('hoverModal');
                if (modal && !modal.matches(':hover')) {
                    hideDesktopModal();
                }
            }, 150);
        }        
        function handleCategoryClick(button, event) {
            clearTimeout(hoverTimer);   
            try {
                const categoryData = parseCategoryData(button);
                currentCategory = categoryData;                
                if (isMobile) {
                    showMobileModal(categoryData);
                } else {
                    showDesktopModal(categoryData, event);
                }
            } catch (error) {
                console.error('Error in click handler:', error);
                alert('Error loading category data. Please try again.');
            }
        }       
        function parseCategoryData(button) {
            try {
                const dataString = button.getAttribute('data-category');
                return JSON.parse(dataString);
            } catch (error) {
                console.error('Error parsing JSON:', error);
                console.log('Raw data string:', button.getAttribute('data-category'));
                return null;
            }
        } 
        function showDesktopModal(categoryData, event) {
            clearTimeout(hoverTimer);            
            const modal = document.getElementById('hoverModal');
            const modalContent = modal.querySelector('.p-0');
            const buttonRect = event.currentTarget.getBoundingClientRect();  
            const modalWidth = 320;
            let left = buttonRect.left + (buttonRect.width / 2) - (modalWidth / 2);
            let top = buttonRect.bottom + window.scrollY + 10;  
            left = Math.max(20, Math.min(left, window.innerWidth - modalWidth - 20));     
            if (top + 400 > window.innerHeight + window.scrollY - 20) {
                top = buttonRect.top + window.scrollY - 410;
            }            
            modal.style.left = left + 'px';
            modal.style.top = top + 'px';  
            modalContent.innerHTML = createModalContent(categoryData, false);            
            modal.style.display = 'block';
            activeModal = modal;            
            modal.addEventListener('mouseenter', () => clearTimeout(hoverTimer));
            modal.addEventListener('mouseleave', () => {
                hoverTimer = setTimeout(hideDesktopModal, 150);
            });           
            initializeTabs(modal, categoryData);            
            const closeBtn = modalContent.querySelector('.close-desktop-modal');
            if (closeBtn) {
                closeBtn.onclick = hideDesktopModal;
            }
        }
        function showMobileModal(categoryData) {
            const modal = document.getElementById('mobileModal');
            const content = modal.querySelector('.mobile-modal-content .p-4');            
            content.innerHTML = createModalContent(categoryData, true);            
            modal.style.display = 'block';
            activeModal = modal;            
            initializeTabs(modal.querySelector('.mobile-modal-content'), categoryData);            
            const closeBtn = content.querySelector('.close-mobile-modal');
            if (closeBtn) {
                closeBtn.onclick = closeMobileModal;
            }
        }        
        function createModalContent(categoryData, isMobile) {
            const name = categoryData.name;
            const icon = categoryData.icon;
            const gradient = categoryData.gradient;
            const description = categoryData.description;
            const categoryId = categoryData.id;           
            return `
                <div>
                    <div class="${gradient} p-4 text-white ${isMobile ? 'rounded-t-2xl' : 'rounded-t-lg'}">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-white/20 flex items-center justify-center"><span class="text-xl">${icon}</span> </div>
                                <div><h3 class="text-lg font-bold">${name}</h3><p class="text-white/90 text-sm">${description}</p></div>
                            </div>
                            <button class="${isMobile ? 'close-mobile-modal' : 'close-desktop-modal'} w-8 h-8 flex items-center justify-center rounded-full hover:bg-white/20 transition-colors"><i class="fas fa-times"></i></button>
                        </div>
                    </div>                   
                    <div class="flex border-b">
                        <button class="modal-tab active flex-1 py-3 text-center text-sm font-semibold" data-tab="courses"> Courses</button>
                        <button class="modal-tab flex-1 py-3 text-center text-sm font-semibold text-gray-600" data-tab="colleges">Colleges</button>
                        <button class="modal-tab flex-1 py-3 text-center text-sm font-semibold text-gray-600" data-tab="exams">Exams </button>
                    </div>                   
                    <div class="hover-modal-content p-4 ${isMobile ? 'max-h-[50vh]' : ''}" id="modalContent"> ${renderTabContent(categoryData.courses, 'courses')}</div>                    
                    <div class="border-t p-4 bg-gray-50 ${isMobile ? 'rounded-b-2xl' : ''}"><a href="/careers/${categoryId}" class="block w-full py-3 text-center text-sm font-semibold text-white ${gradient.replace('bg-gradient-to-br', 'bg-gradient-to-r')} rounded-lg hover:shadow-lg transition-all">View all ${name} options</a>
                    </div>
                </div>
            `;
        }      
        function renderTabContent(items, tabType) {
            let content = '';
            const colors = {
                'courses': { bg: 'bg-orange-100', text: 'text-orange-600' },
                'colleges': { bg: 'bg-blue-100', text: 'text-blue-600' },
                'exams': { bg: 'bg-green-100', text: 'text-green-600' }
            };           
            const color = colors[tabType] || colors.courses;
            if (!items || items.length === 0) {
                return '<p class="text-gray-500 text-center p-4">No data available</p>';
            }            
            items.forEach((item, index) => {
                if (index < 5) {
                    const safeItem = item.replace(/'/g, "\\'").replace(/"/g, '&quot;');
                    content += `
                        <div class="modal-item p-3 rounded-lg mb-2 border border-transparent hover:border-orange-200 cursor-pointer" 
                             onclick="selectItem('${safeItem}', '${tabType}')">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-md ${color.bg} flex items-center justify-center flex-shrink-0">
                                    <span class="text-sm font-semibold ${color.text}">${index + 1}</span>
                                </div>
                                <span class="text-gray-800 font-medium text-sm">${item}</span>
                                <i class="fas fa-chevron-right text-gray-400 ml-auto text-xs"></i>
                            </div>
                        </div>
                    `;
                }
            });
            
            return content;
        }       
        function initializeTabs(container, categoryData) {
            const tabButtons = container.querySelectorAll('.modal-tab');
            const contentDiv = container.querySelector('#modalContent');       
            tabButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const tab = button.getAttribute('data-tab');    
                    tabButtons.forEach(btn => {
                        btn.classList.remove('active', 'text-orange-600');
                        btn.classList.add('text-gray-600');
                    });
                    button.classList.add('active', 'text-orange-600');
                    button.classList.remove('text-gray-600');  
                    const items = categoryData[tab];
                    if (items) {
                        contentDiv.innerHTML = renderTabContent(items, tab);
                    } else {
                        contentDiv.innerHTML = '<p class="text-gray-500 text-center p-4">No data available for this tab</p>';
                    }
                });
            });
        }   
        function hideDesktopModal() {
            const modal = document.getElementById('hoverModal');
            if (modal) {
                modal.style.display = 'none';
                activeModal = null;
                currentCategory = null;
            }
        }  
        function closeMobileModal() {
            const modal = document.getElementById('mobileModal');
            if (modal) {
                modal.style.display = 'none';
                activeModal = null;
                currentCategory = null;
            }
        } 
        function selectItem(item, type) {
            console.log(`Selected ${type}: ${item}`);
            alert(`You selected: ${item}`);
            
            if (isMobile) {
                closeMobileModal();
            } else {
                hideDesktopModal();
            }
        }
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.querySelector('input[type="text"]');
            const searchButton = searchInput.nextElementSibling;
            searchButton.addEventListener('click', function() {
                const searchTerm = searchInput.value.trim();
                if (searchTerm) {
                    window.location.href = `/search.php?q=${encodeURIComponent(searchTerm)}`;
                }
            });  
            searchInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    const searchTerm = searchInput.value.trim();
                    if (searchTerm) {
                        window.location.href = `/search.php?q=${encodeURIComponent(searchTerm)}`;
                    }
                }
            });  
            console.log('CareerNiti Platform Loaded');
            console.log('Is mobile:', isMobile);
            console.log('Testing all 3 categories...');
            const buttons = document.querySelectorAll('.category-button');
            buttons.forEach((button, index) => {
                const data = parseCategoryData(button);
                console.log(`Button ${index + 1} (${data?.name}):`, data ? '✓ Valid' : '✗ Invalid');
            });
        });       
        document.addEventListener('click', (e) => {
            const desktopModal = document.getElementById('hoverModal');
            const mobileModal = document.getElementById('mobileModal');
            if (desktopModal && desktopModal.style.display === 'block' && 
                !e.target.closest('.category-button') && 
                !desktopModal.contains(e.target)) {
                hideDesktopModal();
            }
            if (mobileModal && mobileModal.style.display === 'block' && 
                !e.target.closest('.category-button') && 
                !mobileModal.contains(e.target)) {
                closeMobileModal();
            }
        });
        window.addEventListener('scroll', () => {
            if (activeModal) {
                if (isMobile) {
                    closeMobileModal();
                } else {
                    hideDesktopModal();
                }
            }
        });
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && activeModal) {
                if (isMobile) {
                    closeMobileModal();
                } else {
                    hideDesktopModal();
                }
            }
        });   
    </script>
</body>
</html>
