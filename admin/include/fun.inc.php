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




// Function to create a new location
function addLocation($pdo, $startLocation, $endLocation, $distanceKm)
{
    try {
        // Insert data into the routes table
        $stmt = $pdo->prepare("INSERT INTO routes (start_location, end_location, distance_km) VALUES (:start_location, :end_location, :distance_km)");
        $stmt->bindParam(':start_location', $startLocation);
        $stmt->bindParam(':end_location', $endLocation);
        $stmt->bindParam(':distance_km', $distanceKm);

        if ($stmt->execute()) {
            return "Location added successfully";
        } else {
            return "Error adding location.";
        }
    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }
}


function editLocation($pdo, $route_id, $startLocation, $endLocation, $distanceKm)
{
    try {
        // Update data in the routes table
        $stmt = $pdo->prepare("UPDATE routes SET start_location = :start_location, end_location = :end_location, distance_km = :distance_km WHERE route_id = :route_id");
        $stmt->bindParam(':start_location', $startLocation);
        $stmt->bindParam(':end_location', $endLocation);
        $stmt->bindParam(':distance_km', $distanceKm);
        $stmt->bindParam(':route_id', $route_id);

        if ($stmt->execute()) {
            return "Location updated successfully";
        } else {
            return "Error updating location.";
        }
    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }
}
