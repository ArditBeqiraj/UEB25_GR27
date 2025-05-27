<?php
session_start();
include("db.php");

// Function to increment visit count for an airplane
function incrementVisitCount($airplaneId) {
    $cookieName = "visit_count_" . $airplaneId;
    $visitCount = isset($_COOKIE[$cookieName]) ? (int)$_COOKIE[$cookieName] : 0;
    $visitCount++;
    setcookie($cookieName, $visitCount, time() + (60 * 60), "/"); // 1 hour expiration
    return $visitCount;
}

// Check if airplane_id is provided via POST
if (isset($_POST['airplane_id']) && is_numeric($_POST['airplane_id'])) {
    $airplaneId = (int)$_POST['airplane_id'];
    $visitCount = incrementVisitCount($airplaneId);
    echo json_encode(['success' => true, 'visit_count' => $visitCount]);
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid airplane ID']);
}
?>