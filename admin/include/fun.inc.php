<?php

// Function to create a new bus
function busCreate($pdo, $busName, $busNumber, $busSeat)
{
    try {
        // Insert data into the buses table
        $stmt = $pdo->prepare("INSERT INTO buses (bus_name, bus_number, seats_available) VALUES (:bus_name, :bus_number, :seats_available)");
        $stmt->bindParam(':bus_name', $busName);
        $stmt->bindParam(':bus_number', $busNumber);
        $stmt->bindParam(':seats_available', $busSeat);

        if ($stmt->execute()) {
            return "Bus added successfully";
        } else {
            return "Error adding bus.";
        }
    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }
}



function busUpdate($pdo, $busName, $busNumber, $busSeat, $busId)
{
    try {
        // Prepare the update statement
        $stmt = $pdo->prepare("UPDATE buses SET bus_name = :bus_name, bus_number = :bus_number, seats_available = :seats_available WHERE bus_id = :bus_id");

        // Bind the parameters
        $stmt->bindParam(':bus_name', $busName);
        $stmt->bindParam(':bus_number', $busNumber);
        $stmt->bindParam(':seats_available', $busSeat);
        $stmt->bindParam(':bus_id', $busId);

        // Execute the query and return a message
        if ($stmt->execute()) {
            return "Bus updated successfully";
        } else {
            return "Error updating bus.";
        }
    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }
}
