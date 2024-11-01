<?php require_once "include/inc.db_conn.php"; ?>
<?php include "include/header.php"; ?>

<!-- bus Booking form -->
<div class="modal fade" id="AddBooking" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Booking</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" id="Addlocation">
                    <div class="col-12">
                        <label for="Scheduleid" class="form-label">Schedule Details</label>
                        <input type="text" class="form-control" id="Scheduleid">
                    </div>
                    <div class="col-12">
                        <label for="ref" class="form-label">Ref.No</label>
                        <input type="text" class="form-control" id="ref">
                    </div>

                    <div class="col-12">
                        <label for="Bname" class="form-label">Booking name</label>
                        <input type="text" class="form-control" id="Bname">
                    </div>

                    <div class="col-md-6">
                        <label for="inputnumber" class="form-label">Total seats</label>
                        <input type="number" class="form-control" id="inputnumber">
                    </div>
                    <div class="col-md-6">
                        <label for="price" class="form-label">Total price</label>
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
        <h1 class="mt-4">Booking</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard/bus booking</li>
        </ol>

        <!-- slide card start -->


        <div class="grey-bg container-fluid bg-primary">
            <section id="minimal-statistics">
                <div class="row">
                    <div class="col-12 mt-3 mb-1">
                        <h4 class="text-uppercase">Booking Details</h4>
                    </div>
                </div>
            </section>
        </div>
        <div class="card mb-4">

            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-end mb-4">
                    <button type="button" class="btn btn-primary">Delete All
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-dark">
                                <th scope="col">Ref.No</th>
                                <th scope="col">User name</th>
                                <th scope="col">schedule location</th>
                                <th scope="col">bus name</th>
                                <th scope="col">Booking date</th>
                                <th scope="col">Booking name</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Total</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Assuming $pdo is your PDO instance connected to the database
                            $stmt = $pdo->query("
    SELECT 
        bookings.booking_id,
        bookings.ref_no,
        bookings.user_id,
        bookings.schedule_id,
        bookings.booking_date,
        bookings.passenger_name,
        bookings.seats_booked,
        bookings.total_price,
        bookings.status,
        schedules.bus_id,
        buses.bus_name,
        users.username,
        routes.start_location,
        routes.end_location
    FROM 
        bookings
    JOIN schedules ON bookings.schedule_id = schedules.schedule_id
    JOIN buses ON schedules.bus_id = buses.bus_id
    JOIN users ON bookings.user_id = users.user_id
    JOIN routes ON schedules.route_id = routes.route_id
");

                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            foreach ($result as $row) {
                                echo '<tr>';
                                echo '<td>' . htmlspecialchars($row['ref_no']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['username']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['start_location']) .'-'. htmlspecialchars($row['end_location']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['bus_name']) . '</td>'; // Displaying bus name
                                echo '<td>' . htmlspecialchars($row['booking_date']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['passenger_name']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['seats_booked']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['total_price']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['status']) . '</td>';
                                echo '<td class="d-flex align-items-lg-center justify-content-around">';
                                echo '<a href="include/delete.php?type=routes&id=' . $row['booking_id'] . '" class="m-1" onclick="return confirm(\'Are you sure you want to delete this booking?\')"><i class="fas fa-trash-alt fa-lg"></i></a>';
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