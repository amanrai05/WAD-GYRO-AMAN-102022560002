<?php
require_once __DIR__ . "/config.php"; // Ensure DB connection is loaded

if (!isset($conn) || $conn === null) {
    die("Database connection not found. Check config.php.");
}

// Add Member
function addMember($name, $email, $studentID, $major, $reason) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO members (name, email, studentID, major, reason) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $studentID, $major, $reason);
    $stmt->execute();
    $insertId = $conn->insert_id;
    $stmt->close();
    return $insertId;
}

// Get all Members
function getAllMembers() {
    global $conn;
    $result = $conn->query("SELECT * FROM members ORDER BY id DESC");
    return $result;
}

// Get Member by ID
function getMemberById($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM members WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    $stmt->close();
    return $data;
}

// Update Member
function updateMember($id, $name, $email, $studentID, $major, $reason) {
    global $conn;
    $stmt = $conn->prepare("UPDATE members SET name=?, email=?, studentID=?, major=?, reason=? WHERE id=?");
    $stmt->bind_param("sssssi", $name, $email, $studentID, $major, $reason, $id);
    $ok = $stmt->execute();
    $stmt->close();
    return $ok;
}

// Delete Member
function deleteMember($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM members WHERE id=?");
    $stmt->bind_param("i", $id);
    $ok = $stmt->execute();
    $stmt->close();
    return $ok;
}
?>
