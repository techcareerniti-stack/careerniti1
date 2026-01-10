<?php
require_once 'config/db.php';
$db = (new Database())->getConnection();

$program_id = filter_input(INPUT_GET, 'program_id', FILTER_VALIDATE_INT);
$type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_STRING);

if(!$program_id || !$type){
    echo json_encode([]);
    exit;
}

$stmt = $db->prepare("SELECT * FROM exam_processes WHERE program_id=? AND program_type=? AND is_active=1 ORDER BY display_order");
$stmt->bind_param("is", $program_id, $type);
$stmt->execute();
$processes = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt->close();

echo json_encode($processes);
