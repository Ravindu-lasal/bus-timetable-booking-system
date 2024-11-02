<?php require_once "include/inc.db_conn.php"; ?>
<?php include "include/header.php"; ?>



<!-- Add Location Form -->
<div class="modal fade" id="AddLocation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Location</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" id="Addlocation" action="include/Add_location.php" method="POST">
                    <input type="hidden" name="route_id">
                    <div class="col-12">
                        <label for="startlocation" class="form-label">Start Location</label>
                        <input type="text" class="form-control" name="start_location" required>
                    </div>
                    <div class="col-12">
                        <label for="endlocation" class="form-label">End Location</label>
                        <input type="text" class="form-control" name="end_location" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputkm" class="form-label">Distance (km)</label>
                        <input type="number" class="form-control" name="distance_km" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="Addlocation" class="btn btn-primary">Add Location</button>
            </div>
        </div>
    </div>
</div>



<!-- Edit Location Form -->
<div class="modal fade" id="editLocation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Location</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" id="elocation" action="include/Add_location.php" method="POST">
                    <input type="hidden" name="route_id" id="route_id">
                    <div class="col-12">
                        <label for="startlocation" class="form-label">Start Location</label>
                        <input type="text" class="form-control" name="start_location" id="startlocation" required>
                    </div>
                    <div class="col-12">
                        <label for="endlocation" class="form-label">End Location</label>
                        <input type="text" class="form-control" name="end_location" id="endlocation" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputkm" class="form-label">Distance (km)</label>
                        <input type="number" class="form-control" name="distance_km" id="inputkm" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="elocation" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editButtons = document.querySelectorAll('.edit-route');

        editButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const routeId = this.getAttribute('data-id');

                // Fetch route data
                fetch(`include/get_route.php?route_id=${routeId}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('route_id').value = data.route_id;
                        document.getElementById('startlocation').value = data.start_location;
                        document.getElementById('endlocation').value = data.end_location;
                        document.getElementById('inputkm').value = data.distance_km;
                    })
                    .catch(error => console.error('Error fetching route data:', error));
            });
        });
    });
</script>



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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddLocation">Add location
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
                                echo '<a href="#" class="edit-route" data-bs-toggle="modal" data-bs-target="#editLocation" data-id="' . $row['route_id'] . '"><i class="fas fa-user-edit fa-lg"></i></a>';
                                echo '<a href="include/delete.php?type=location&id=' . $row['route_id'] . '" class="m-1" onclick="return confirm(\'Are you sure you want to delete this route?\')"><i class="fas fa-trash-alt fa-lg"></i></a>';
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