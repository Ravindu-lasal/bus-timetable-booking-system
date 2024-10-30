<?php require_once "include/inc.db_conn.php"; ?>
<?php include "include/header.php"; ?>

<!-- Add Bus Modal -->
<div class="modal fade" id="busModal1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="busModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="busModalLabel">Edit/Add Bus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" id="abusForm" action="include/Add_bus.php" method="POST">
                    <div class="col-12">
                        <label for="bus_name" class="form-label">Bus name</label>
                        <input type="text" class="form-control"  name="bus_name" required>
                    </div>
                    <div class="col-12">
                        <label for="bus_number" class="form-label">Input bus number</label>
                        <input type="text" class="form-control" name="bus_number" required>
                    </div>
                    <div class="col-md-6">
                        <label for="bus_seat" class="form-label">Available Seats</label>
                        <input type="number" class="form-control" name="bus_seat" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="abusForm" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Bus Modal -->
<div class="modal fade" id="busModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="busModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="busModalLabel">Edit/Add Bus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" id="busForm" action="include/Add_bus.php" method="POST">
                    <input type="hidden" name="bus_id" id="bus_id">
                    <div class="col-12">
                        <label for="bus_name" class="form-label">Bus name</label>
                        <input type="text" class="form-control" id="bus_name" name="bus_name" required>
                    </div>
                    <div class="col-12">
                        <label for="bus_number" class="form-label">Input bus number</label>
                        <input type="text" class="form-control" id="bus_number" name="bus_number" required>
                    </div>
                    <div class="col-md-6">
                        <label for="bus_seat" class="form-label">Available Seats</label>
                        <input type="number" class="form-control" id="bus_seat" name="bus_seat" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="busForm" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
</div>



<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Buses</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard/buses</li>
        </ol>

        <!-- slide card start -->


        <div class="grey-bg container-fluid bg-primary">
            <section id="minimal-statistics">
                <div class="row">
                    <div class="col-12 mt-3 mb-1">
                        <h4 class="text-uppercase">Availible buses Details</h4>
                    </div>
                </div>
            </section>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                find your buses
            </div>
            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-end mb-4">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#busModal1">Add buses
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-dark">
                                <th scope="col">Bus ID</th>
                                <th scope="col">Bus Name</th>
                                <th scope="col">Bus Number</th>
                                <th scope="col">Seats Available</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Assuming $pdo is your PDO instance connected to the database
                            $stmt = $pdo->query("SELECT bus_id, bus_name, bus_number, seats_available, created_at FROM buses;");
                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            foreach ($result as $row) {
                                echo '<tr>';
                                echo '<td>' . htmlspecialchars($row['bus_id']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['bus_name']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['bus_number']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['seats_available']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['created_at']) . '</td>';
                                echo '<td class="d-flex align-items-lg-center justify-content-around">';
                                echo '<a href="#" class="edit-bus" data-bs-toggle="modal" data-bs-target="#busModal" data-id="' . $row['bus_id'] . '"><i class="fas fa-user-edit fa-lg"></i></a>';
                                echo '<a href="include/delete.php?type=buses&id=' . $row['bus_id'] . '" class="m-1" onclick="return confirm(\'Are you sure you want to delete this bus?\')"><i class="fas fa-trash-alt fa-lg"></i></a>';
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

<script>
document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.edit-bus');

    editButtons.forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault();
            const busId = this.getAttribute('data-id');

            // Fetch bus data (you could do an AJAX call here if needed)
            fetch(`include/get_bus.php?bus_id=${busId}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('bus_id').value = data.bus_id;
                    document.getElementById('bus_name').value = data.bus_name;
                    document.getElementById('bus_number').value = data.bus_number;
                    document.getElementById('bus_seat').value = data.seats_available;
                })
                .catch(error => console.error('Error fetching bus data:', error));
        });
    });
});
</script>



<?php include "./include/footer.php"; ?>