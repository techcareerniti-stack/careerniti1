<?php
// get selected notification from URL
$selectedNotify = $_GET['tab'] ?? 'career';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Notifications</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/output.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
<?php include("../includes/navbar.php"); ?>

<div class="max-w-7xl mx-auto px-4 py-6">
<?php include __DIR__ . '/notification/notification_index.php'; ?>
</div>
<?php include("../includes/footer.php"); ?>

</body>
</html>
