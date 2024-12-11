<?php

function getCountOfActivities($conn, $act_type, $act_level, $sem, $year, $matricNo) {
    $sql = "SELECT COUNT(*) as act_count FROM activities WHERE act_type = ? AND act_level = ? AND sem = ? AND year = ? AND matricNo = ?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ssiis", $act_type, $act_level, $sem, $year, $matricNo);

    $stmt->execute(); // Execute the statement
    $result = $stmt->get_result();
    $row = $result->fetch_assoc(); // Fetch the result
    $activityCount = $row['act_count']; // Get the activity count

    return $activityCount; // Return the count or 0 if no records are found
}

function getCountOfCertification($conn, $act_type, $sem, $year, $matricNo) {
    $sql = "SELECT COUNT(*) as act_count FROM activities WHERE act_type = ? AND sem = ? AND year = ? AND matricNo = ?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("siis", $act_type, $sem, $year, $matricNo);

    $stmt->execute(); // Execute the statement
    $result = $stmt->get_result();
    $row = $result->fetch_assoc(); // Fetch the result
    $activityCount = $row['act_count']; // Get the activity count

    return $activityCount; // Return the count or 0 if no records are found
}

function updateKPI($conn, $matricNo, $year, $sem, $act_FL, $act_UL, $act_NL, $act_IL, $comp_FL, $comp_UL, $comp_NL, $comp_IL, $certification) {
    $sql = "UPDATE indicators SET act_FL = ?, act_UL = ?, act_NL = ?, act_IL = ?, comp_FL = ?, comp_UL = ?, comp_NL = ?, comp_IL = ?, professional_certification = ? WHERE matricNo = ? AND i_year = ? AND i_sem = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiiiiiiiisii", $act_FL, $act_UL, $act_NL, $act_IL, $comp_FL, $comp_UL, $comp_NL, $comp_IL, $certification, $matricNo, $year, $sem);
    $stmt->execute();
    $stmt->close();
}
?>