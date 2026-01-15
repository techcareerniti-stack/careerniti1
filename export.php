<?php
$txtFile = 'CAP 3 MHT CET.txt';
$csvFile = 'output_clean.csv';

$lines = file($txtFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$fp = fopen($csvFile, 'w');

// CSV Headers
fputcsv($fp, ['College Name','Institute Type','Seat Level','Branch','Category','Rank','Percentile']);

$college = $branch = $instituteType = $seatLevel = '';
$categoryLine = $rankLine = $percentileLine = [];

foreach ($lines as $line) {
    $line = trim($line);
    if ($line === '') continue;

    // College
    if (preg_match('/^\d{5} - (.+)$/', $line, $m)) {
        $college = $m[1];
        continue;
    }

    // Branch
    if (preg_match('/^\d{10} - (.+)$/', $line, $m)) {
        $branch = $m[1];
        continue;
    }

    // Institute Type
    if (preg_match('/^Status:\s*(.+)$/i', $line, $m)) {
        $instituteType = $m[1];
        continue;
    }

    // Seat Level
    if (preg_match('/^(State Level|Home University|Other Than Home University)/i', $line, $m)) {
        $seatLevel = $m[1];
        continue;
    }
// Category line
if (preg_match('/^Stage\s+(.+)$/i', $line, $m)) {
    $categoryLine = preg_split('/\s+/', trim($m[1])); // 1 ya more space se split
    continue;
}

// Rank line
if (preg_match('/^I\s+(.+)$/', $line, $m)) {
    preg_match_all('/\d+/', $m[1], $ranks);
    $rankLine = $ranks[0]; // saare ranks
    continue;
}

// Percentile line
if (preg_match_all('/\(([\d\.]+)\)/', $line, $m)) {
    $percentileLine = $m[1];

    // Make sure counts match categoryLine
    $count = max(count($categoryLine), count($rankLine), count($percentileLine));

    for ($i = 0; $i < $count; $i++) {
        $cat = $categoryLine[$i] ?? 'NA';
        $rank = $rankLine[$i] ?? 'NA';
        $perc = $percentileLine[$i] ?? 'NA';

        if ($perc !== 'NA') $perc = number_format((float)$perc, 2);

        // Determine seat level based on category suffix
        $level = $seatLevel;
        if (!empty($cat)) {
            if (preg_match('/H$/i', $cat)) $level = 'Home University';
            elseif (preg_match('/O$/i', $cat)) $level = 'Other Than Home University';
        }

        fputcsv($fp, [$college, $instituteType, $level, $branch, $cat, $rank, $perc]);
    }

    // Reset for next block
    $categoryLine = $rankLine = $percentileLine = [];
}}

fclose($fp);

echo '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://cdn.tailwindcss.com"></script>
<title>Clean CSV Export</title>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
<div class="bg-white p-8 rounded-xl shadow-lg text-center">
    <h1 class="text-2xl font-bold mb-4 text-green-600">Clean CSV Generated!</h1>
    <a href="'.$csvFile.'" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 transition">Download CSV</a>
</div>
</body>
</html>';
