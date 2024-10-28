<?php require_once "include/inc.db_conn.php"; ?>
<?php include "include/header.php"; ?>

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Location</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard/location</li>
        </ol>

        <!-- slide card start -->


        <div class="grey-bg container-fluid bg-primary">
            <section id="minimal-statistics">
                <div class="row">
                    <div class="col-12 mt-3 mb-1">
                        <h4 class="text-uppercase">Availible location Details</h4>
                    </div>
                </div>
            </section>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                find your location
            </div>
            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-end mb-4">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#batchModal">Add location
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-dark">
                                <th scope="col">Route ID</th>
                                <th scope="col">Start Location</th>
                                <th scope="col">End Location</th>
                                <th scope="col">Distance (km)</th>
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