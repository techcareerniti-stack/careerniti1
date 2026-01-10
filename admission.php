<?php
// admission.php
require_once 'config/db.php';

$database = new Database();
$db = $database->getConnection();
$currentTab = isset($_GET['tab']) ? $_GET['tab'] : 'UG';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerNiti - Admission</title>
    <link rel="icon" type="image/png" href="assets/images/title-logo.png">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

<?php include 'includes/navbar.php'; ?>

<!-- HEADER -->
<div class="relative text-center py-8 bg-gradient-to-r from-orange-400 to-pink-600 text-white">
    <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold">Admission</h1>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <!-- UG/PG FILTER TABS -->
    <div class="flex justify-center my-12">
        <div class="flex rounded-xl overflow-hidden shadow flex-wrap">
            <button 
                id="ugTab" 
                onclick="window.location.href='?tab=UG'" 
                class="px-6 py-2 font-semibold transition-colors <?php echo $currentTab === 'UG' ? 'bg-orange-500 text-white' : 'bg-gray-200 text-gray-700 hover:bg-orange-400 hover:text-white'; ?>">
                UG
            </button>
            <button 
                id="pgTab" 
                onclick="window.location.href='?tab=PG'" 
                class="px-6 py-2 font-semibold transition-colors <?php echo $currentTab === 'PG' ? 'bg-orange-500 text-white' : 'bg-gray-200 text-gray-700 hover:bg-orange-400 hover:text-white'; ?>">
                PG
            </button>
        </div>
    </div>
<!-- Program Cards -->
<div id="programCards" class="flex flex-wrap justify-center gap-6">
    <?php
    $query = "SELECT * FROM admission_programs WHERE is_active = 1 ORDER BY display_order";
    $result = $db->query($query);

    if ($result && $result->num_rows > 0):
        while ($program = $result->fetch_assoc()):
            $programKey = strtolower(str_replace(' ', '-', $program['title']));
    ?>
    <div 
        class="program-card w-full max-w-[250px] bg-white rounded-xl shadow cursor-pointer p-4 transition transform hover:-translate-y-1 hover:shadow-lg"
        data-program="<?php echo $programKey; ?>" 
        data-program-id="<?php echo $program['id']; ?>" 
        data-type="<?php echo $currentTab; ?>">
        
        <img src="<?php echo htmlspecialchars($program['image_path']); ?>" 
             alt="<?php echo htmlspecialchars($program['alt_text']); ?>" 
             class="w-full h-32 object-contain mb-3">

        <div class="text-center">
            <h3 class="font-semibold text-gray-800"><?php echo htmlspecialchars($program['title']); ?></h3>
            <span class="text-sm text-gray-500"><?php echo $currentTab; ?></span>
        </div>
    </div>
    <?php 
        endwhile;
    else:
        echo '<p class="text-center text-gray-600 col-span-full">No programs available.</p>';
    endif;
    $db->close();
    ?>
</div>

    <!-- Admission Processes -->
    <div id="admissionProcesses" class="hidden mt-10 container mx-auto px-4">
        <h2 id="admissionTitle" class="text-center text-2xl text-gray-600 mb-8"></h2>
        <div id="processCards" class="flex flex-wrap justify-center gap-6"></div>
    </div>


</div>

<?php include 'whatsapp.php'; ?>
<?php include 'includes/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const programCards = document.querySelectorAll('.program-card');
    const admissionProcessesContainer = document.getElementById('admissionProcesses');
    const processCards = document.getElementById('processCards');
    const admissionTitle = document.getElementById('admissionTitle');

    programCards.forEach(card => {
        card.addEventListener('click', function() {
            const programId = this.getAttribute('data-program-id');
            const programType = this.getAttribute('data-type');
            const programName = this.querySelector('h3').textContent;

            // Highlight selected card
            programCards.forEach(c => c.classList.remove('ring-2', 'ring-orange-500', 'ring-offset-2'));
            this.classList.add('ring-2', 'ring-orange-500', 'ring-offset-2');

            admissionTitle.innerText = `Admission Process for ${programName} (${programType})`;
            processCards.innerHTML = '';
            admissionProcessesContainer.classList.remove('hidden');

            // Fetch processes
            fetch(`api/get_admission_processes.php?program_id=${programId}&type=${programType}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success && data.processes.length > 0) {
                        data.processes.forEach(process => {
                            processCards.innerHTML += `
                            <div class="w-40 sm:w-56 md:w-64 bg-white rounded-xl shadow cursor-pointer p-4 transition transform hover:-translate-y-1 hover:shadow-lg"
                                 onclick="window.location.href='admission/medical/details.php?id=${process.id}'">
                                <img src="${process.image_path}" alt="${process.alt_text}" class="w-full h-32 object-contain mb-3">
                                <div class="text-center">
                                    <h3 class="font-semibold text-gray-800">${process.title}</h3>
                                </div>
                            </div>`;
                        });
                    } else {
                        processCards.innerHTML = `<p class="text-gray-500 text-center w-full">No admission processes available.</p>`;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    processCards.innerHTML = `<p class="text-red-600 text-center w-full">Error loading admission processes. Please try again.</p>`;
                });

            // Scroll to processes
            admissionProcessesContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    });

    // Handle URL params for program selection and tab
    const urlParams = new URLSearchParams(window.location.search);
    const programParam = urlParams.get('program');
    const tabParam = urlParams.get('tab') || 'UG';

    if (programParam) {
        const targetCard = document.querySelector(`[data-program="${programParam}"]`);
        if (targetCard) {
            setTimeout(() => { targetCard.click(); }, 500);
        }
    }

    if (tabParam) { sessionStorage.setItem('admissionTab', tabParam); }
    const storedTab = sessionStorage.getItem('admissionTab');
    if (!urlParams.get('tab') && storedTab) {
        window.history.replaceState(null, '', `?tab=${storedTab}`);
    }
});
</script>

</body>
</html>
