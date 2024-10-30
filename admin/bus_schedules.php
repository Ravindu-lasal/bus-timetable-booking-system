<?php require_once "include/inc.db_conn.php"; ?>
<?php include "include/header.php"; ?>


<!-- Add Bus Schedules Form -->
<div class="modal fade" id="Addschedule" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Schedules</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" id="AddScheduleForm" action="include/Add_schedule.php" method="POST">
                    <input type="hidden" name="schedule_id">
                    <div class="col-12">
                        <label for="bus_name" class="form-label">Bus Name</label>
                        <select class="form-select" name="bus_id" required>
                            <option selected disabled>Select Bus</option>
                            <?php
                            include "./inc.db_conn.php";
                            // Fetch bus details
                            $stmt = $pdo->prepare("SELECT bus_id, bus_number FROM buses");
                            $stmt->execute();
                            $buses = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($buses as $bus) {
                                echo "<option value='{$bus['bus_id']}'>{$bus['bus_number']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="bus_location" class="form-label">Location</label>
                        <select class="form-select" name="route_id" required>
                            <option selected disabled>Select Location</option>
                            <?php
                            // Fetch route details
                            $stmt = $pdo->prepare("SELECT route_id, start_location, end_location FROM routes");
                            $stmt->execute();
                            $routes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($routes as $route) {
                                echo "<option value='{$route['route_id']}'>{$route['start_location']} - {$route['end_location']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="starttime" class="form-label">Start Time</label>
                        <input type="time" class="form-control" name="start_time" required>
                    </div>
                    <div class="col-6">
                        <label for="endtime" class="form-label">End Time</label>
                        <input type="time" class="form-control" name="end_time" required>
                    </div>
                    <div class="col-md-8">
                        <label for="inputdate" class="form-label">Travel Date</label>
                        <input type="date" class="form-control" name="travel_date" required>
                    </div>
                    <div class="col-8">
                        <label for="price" class="form-label">Total Price (Rs)</label>
                        <input type="text" class="form-control" name="price" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="AddScheduleForm" class="btn btn-primary">Add Schedule</button>
            </div>
        </div>
    </div>
</div>


<!-- Edit Bus Schedules Form -->
<div class="modal fade" id="editschedule" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" id="eScheduleForm" action="include/Add_schedule.php" method="POST">
                    <input type="hidden" name="schedule_id" id="schedule_id">
                    <div class="col-12">
                        <label for="bus_name" class="form-label">Bus Name</label>
                        <select class="form-select" name="bus_id" id="bus_name" required>
                            <option selected disabled>Select Bus</option>
                            <?php
                            include "./inc.db_conn.php";
                            // Fetch bus details
                            $stmt = $pdo->prepare("SELECT bus_id, bus_number FROM buses");
                            $stmt->execute();
                            $buses = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($buses as $bus) {
                                echo "<option value='{$bus['bus_id']}'>{$bus['bus_number']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="bus_location" class="form-label">Location</label>
                        <select class="form-select" name="route_id" id="bus_location" required>
                            <option selected disabled>Select Location</option>
                            <?php
                            // Fetch route details
                            $stmt = $pdo->prepare("SELECT route_id, start_location, end_location FROM routes");
                            $stmt->execute();
                            $routes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($routes as $route) {
                                echo "<option value='{$route['route_id']}'>{$route['start_location']} - {$route['end_location']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="starttime" class="form-label">Start Time</label>
                        <input type="time" class="form-control" name="start_time" id="starttime" required>
                    </div>
                    <div class="col-6">
                        <label for="endtime" class="form-label">End Time</label>
                        <input type="time" class="form-control" name="end_time" id="endtime" required>
                    </div>
                    <div class="col-md-8">
                        <label for="inputdate" class="form-label">Travel Date</label>
                        <input type="date" class="form-control" name="travel_date" id="inputdate" required>
                    </div>
                    <div class="col-8">
                        <label for="price" class="form-label">Total Price (Rs)</label>
                        <input type="text" class="form-control" name="price" id="price" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="eScheduleForm" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editScheduleButtons = document.querySelectorAll('.edit-schedule');

        editScheduleButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const scheduleId = this.getAttribute('data-id');

                // Fetch schedule data
                fetch(`include/get_schedule.php?schedule_id=${scheduleId}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('schedule_id').value = data.schedule_id;
                        document.getElementById('bus_name').value = data.bus_id;
                        document.getElementById('bus_location').value = data.route_id;
                        document.getElementById('starttime').value = data.start_time;
                        document.getElementById('endtime').value = data.end_time;
                        document.getElementById('inputdate').value = data.travel_date;
                        document.getElementById('price').value = data.price;
                    })
                    .catch(error => console.error('Error fetching schedule data:', error));
            });
        });
    });
</script>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Schedules</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard/Schedules</li>
        </ol>

        <!-- slide card start -->


        <div class="grey-bg container-fluid bg-primary">
            <section id="minimal-statistics">
                <div class="row">
                    <div class="col-12 mt-3 mb-1">
                        <h4 class="text-uppercase">Availible Schedules Details</h4>
                    </div>
                </div>
            </section>
        </div>
        <div class="card mb-4">

            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-end mb-4">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editschedule">Add Schedules
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-dark">
                                <th scope="col">Id</th>
                                <th scope="col">Bus number</th>
                                <th scope="col">Location name</th>
                                <th scope="col">Start time</th>
                                <th scope="col">End time</th>
                                <th scope="col">Traval Date</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Assuming $pdo is your PDO instance connected to the database
                            $stmt = $pdo->query("SELECT s.schedule_id, b.bus_number, r.start_location, r.end_location, s.start_time, s.end_time, s.travel_date, s.price 
                      FROM schedules s 
                      JOIN buses b ON s.bus_id = b.bus_id 
                      JOIN routes r ON s.route_id = r.route_id;");
                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            foreach ($result as $row) {
                                echo '<tr>';
                                echo '<td>' . htmlspecialchars($row['schedule_id']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['bus_number']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['start_location']) . " - " . htmlspecialchars($row['end_location']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['start_time']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['end_time']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['travel_date']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['price']) . '</td>';
                                echo '<td class="d-flex align-items-lg-center justify-content-around">';
                                echo '<a href="#" class="edit-schedule" data-bs-toggle="modal" data-bs-target="#editschedule" data-id="' . $row['schedule_id'] . '"><i class="fas fa-user-edit fa-lg"></i></a>';
                                echo '<a href="include/delete.php?type=schedules&id=' . $row['schedule_id'] . '" class="m-1" onclick="return confirm(\'Are you sure you want to delete this schedule?\')"><i class="fas fa-trash-alt fa-lg"></i></a>';
                                echo '</td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>


<?php include "./include/footer.php"; ?>