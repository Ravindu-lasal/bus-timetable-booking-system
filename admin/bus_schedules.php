<?php require_once "include/inc.db_conn.php"; ?>
<?php include "include/header.php"; ?>


<!-- bus Schedules form -->

<div class="modal fade" id="Addschedule" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Schedules</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" id="Addlocation">
                    <div class="col-12">
                        <label for="bus_name" class="form-label">bus name</label>
                        <select class="form-select" class="form-control" id="bus_name">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="bus_location" class="form-label">location</label>
                        <select class="form-select" class="form-control" id="bus_location">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="starttime" class="form-label">Start time</label>
                        <input type="time" class="form-control" id="starttime">
                    </div>
                    <div class="col-6">
                        <label for="endtime" class="form-label">End time</label>
                        <input type="time" class="form-control" id="endtime">
                    </div>
                    <div class="col-md-8">
                        <label for="inputdate" class="form-label">Traval Date</label>
                        <input type="date" class="form-control" id="inputdate">
                    </div>
                    <div class="col-8">
                        <label for="price" class="form-label">Total price (Rs)</label>
                        <input type="text" class="form-control" id="price">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" form="addschedule" class="btn btn-primary">Add Schedules</button>
            </div>
        </div>
    </div>
</div>


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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Addschedule">Add Schedules
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-dark">
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
                            $stmt = $pdo->query("SELECT route_id, start_location, end_location, distance_km FROM routes;");
                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            foreach ($result as $row) {
                                echo '<tr>';
                                echo '<td>' . htmlspecialchars($row['route_id']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['start_location']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['end_location']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['distance_km']) . '</td>';
                                echo '<td class="d-flex align-items-lg-center justify-content-around">';
                                echo '<a href="#" class="edit-route" data-bs-toggle="modal" data-bs-target="#routeModal" data-id="' . $row['route_id'] . '"><i class="fas fa-user-edit fa-lg"></i></a>';
                                echo '<a href="include/delete.php?type=routes&id=' . $row['route_id'] . '" class="m-1" onclick="return confirm(\'Are you sure you want to delete this route?\')"><i class="fas fa-trash-alt fa-lg"></i></a>';
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