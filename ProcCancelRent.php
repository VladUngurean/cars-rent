<?php
    $stmt = $conn->prepare("CALL cancelRent(?,?,?)");
    
    if ($stmt->execute([$carPlate,$rentStartDatetime,$rentEndDatetime])) {
        echo '<script>alert("Car rent canceled.")</script>'; 
        echo '<script>window.location.href = "userProfile.php";</script>';
    } else {
        echo '<script>alert("Error deleting car: ' . $stmt->error . '")</script>'; 
    }

    // Close the statement
    $stmt->close();

?>