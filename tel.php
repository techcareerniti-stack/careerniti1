<?php
// ================= SETTINGS =================
$sites = [
    'CET'       => "https://cetcell.mahacet.org/",
    'NEET'      => "https://medicalug2025.mahacet.org/NEET-UG-2025/login",
    'NMC'       => "https://www.nmc.org.in/",
    'NTA'       => "https://nta.ac.in/",
    'PIB'       => "https://pib.gov.in/",
    'Education' => "https://www.education.gov.in/"
];

$storeFile = __DIR__ . "/last_update.json"; // JSON for per-site last update
$telegramBotToken = "8581753072:AAF-p6R6TLgkNI5B19ZGXzWwW5LOJ9UgWPw";
$telegramChatId   = "2117182784";

// ================= FUNCTIONS =================
function fetchUpdates($url) {
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_USERAGENT => "Mozilla/5.0"
    ]);
    $html = curl_exec($ch);
    curl_close($ch);
    return $html;
}

function sendTelegramMessage($chatId, $botToken, $message) {
    $url = "https://api.telegram.org/bot$botToken/sendMessage";
    file_get_contents($url, false, stream_context_create([
        'http' => [
            'method'  => 'POST',
            'header'  => "Content-Type: application/x-www-form-urlencoded",
            'content' => http_build_query([
                'chat_id' => $chatId,
                'text' => $message,
                'disable_web_page_preview' => true
            ])
        ]
    ]));
}

// ================= TEST =================
if (isset($_GET['test'])) {
    sendTelegramMessage($telegramChatId, $telegramBotToken, "✅ System Active\nCET | NEET | NMC | NTA | PIB | Education");
    echo "<script>alert('Test sent');location='index.php';</script>";
    exit;
}

// ================= FETCH =================
$lastSent = file_exists($storeFile) ? json_decode(file_get_contents($storeFile), true) : [];
$allUpdates = [];
$latestNew = [];

foreach ($sites as $name => $url) {
    $html = fetchUpdates($url);
    $updates = [];

    if ($html) {
        libxml_use_internal_errors(true);
        $dom = new DOMDocument();
        $dom->loadHTML($html);
        $xp = new DOMXPath($dom);

        $uniqueTitles = [];

        if ($name === 'Education') {
            foreach ($xp->query("//a") as $a) {
                $t = trim($a->textContent);
                $l = trim($a->getAttribute("href"));
                if ($t !== '' && !isset($uniqueTitles[$t])) {
                    $uniqueTitles[$t] = true;
                    if (!str_starts_with($l,'http')) $l = rtrim($url,'/').'/'.ltrim($l,'/');
                    $updates[] = ['title'=>$t,'link'=>$l];
                }
            }
        } else {
            foreach ($xp->query("//a") as $a) {
                $t = trim($a->textContent);
                $l = trim($a->getAttribute("href"));
                if (strlen($t) > 25 && !isset($uniqueTitles[$t])) {
                    $uniqueTitles[$t] = true;
                    if (!str_starts_with($l,'http')) $l = rtrim($url,'/').'/'.ltrim($l,'/');
                    $updates[] = ['title'=>$t,'link'=>$l];
                }
            }
        }
    }

    $allUpdates[$name] = $updates;
    $latestNew[$name] = !empty($updates) ? $updates[0]['title'] : null;
}

// ================= TELEGRAM NOTIFICATION =================
$newFound = false;
$msg = "📢 NEW UPDATES\n\n";

foreach ($allUpdates as $site => $updates) {
    if (!empty($updates)) {
        $isNew = !isset($lastSent[$site]) || $latestNew[$site] !== $lastSent[$site];
        if ($isNew) $newFound = true;

        $msg .= "🟢 $site:\n";
        for ($i=0; $i<3 && $i<count($updates); $i++) {
            $msg .= ($i+1).". ".$updates[$i]['title']."\n".$updates[$i]['link']."\n";
        }
        $msg .= "\n";
    }
}

if ($newFound) {
    sendTelegramMessage($telegramChatId, $telegramBotToken, $msg);
    file_put_contents($storeFile, json_encode($latestNew));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Exam Live Updates</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.tailwindcss.com"></script>
<style>
.fade { animation: fade 0.4s ease; }
@keyframes fade { from {opacity:0; transform:translateY(6px);} to {opacity:1;} }
.shimmer { background: linear-gradient(90deg, #f1f5f9 25%, #e0f2fe 50%, #f1f5f9 75%); background-size: 200% 100%; animation: shine 1.5s infinite; border-radius: 0.5rem; height: 3rem; margin-bottom: 1rem; }
@keyframes shine { from {background-position: -200% 0;} to {background-position: 200% 0;} }
</style>
</head>

<body class="bg-slate-50 text-slate-800">

<!-- NAVBAR -->
<nav class="bg-white shadow sticky top-0 z-10">
  <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-start md:items-center p-4 gap-2 md:gap-0">
    <h1 class="text-xl font-bold text-sky-600">Exam Updates</h1>
    <div class="flex flex-col md:flex-row md:items-center gap-2 md:gap-4 w-full md:w-auto">
      <input type="text" id="searchBox" placeholder="Search updates..."
             class="border border-slate-300 rounded px-3 py-1 focus:outline-none focus:ring-2 focus:ring-sky-400 flex-1">
      <a href="?test=1" class="bg-sky-500 text-white px-4 py-2 rounded hover:bg-sky-600 text-center">🔔 Test</a>
    </div>
  </div>
</nav>

<!-- ✅ Last Updated at top -->
<div class="max-w-7xl mx-auto mt-2 px-4">
    <p class="text-sm text-slate-500">Last Updated: <?= date("d-M-Y H:i:s") ?></p>
</div>

<!-- TABS -->
<div class="max-w-7xl mx-auto mt-4 p-4">
  <div class="flex flex-wrap border-b border-slate-200 mb-4 gap-2">
    <?php $i=0; foreach ($allUpdates as $site=>$u): ?>
      <button onclick="openTab('<?= $site ?>', this)"
          class="tab-btn px-4 py-2 text-sm font-medium <?= $i===0?'border-b-2 border-sky-500 text-sky-600':'text-slate-500' ?>">
          <?= $site ?>
      </button>
    <?php $i++; endforeach; ?>
  </div>

  <!-- CONTENT -->
  <?php $i=0; foreach ($allUpdates as $site=>$updates): ?>
    <section id="<?= $site ?>" class="<?= $i===0?'':'hidden' ?> fade">
      <?php if ($updates): ?>
      <div id="updateContainer<?= $site ?>" class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <?php 
        $seenTitles = [];
        foreach ($updates as $u) {
            if(isset($seenTitles[$u['title']])) continue;
            $seenTitles[$u['title']] = true;

            $isNew = isset($latestNew[$site]) && $u['title'] === $latestNew[$site];
            echo '<a href="'.htmlspecialchars($u['link']).'" target="_blank" class="updateItem border rounded-lg p-4 transition '.($isNew ? 'bg-yellow-100 border-yellow-400' : 'bg-white border-slate-200 hover:shadow hover:border-sky-400').'">';
            echo '<p class="text-sm">'.htmlspecialchars($u['title']).'</p>';
            if($isNew) echo '<span class="text-xs text-red-600 font-bold ml-2">NEW</span>';
            echo '</a>';
        }
        ?>
      </div>
      <?php else: ?>
        <div class="shimmer w-full"></div>
      <?php endif; ?>
    </section>
  <?php $i++; endforeach; ?>

</div>

<script>
// TAB FUNCTION
function openTab(id, btn){
    document.querySelectorAll('section').forEach(s=>s.classList.add('hidden'));
    document.querySelectorAll('.tab-btn').forEach(b=>{
        b.classList.remove('border-b-2','border-sky-500','text-sky-600');
        b.classList.add('text-slate-500');
    });
    document.getElementById(id).classList.remove('hidden');
    btn.classList.add('border-b-2','border-sky-500','text-sky-600');
}

// SEARCH FUNCTION
document.getElementById('searchBox').addEventListener('input', function(){
    const filter = this.value.toLowerCase();
    document.querySelectorAll('.updateItem').forEach(item=>{
        item.style.display = item.textContent.toLowerCase().includes(filter)?'block':'none';
    });
});
</script>

</body>
</html>
