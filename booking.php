<?php include "admin/include/inc.db_conn.php"; ?>
<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <!---------------- 
    stylesheet
     -------------->

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- table css file -->
  <link rel="stylesheet" href="./assets/css/search.css">

  <!----------------
     stylesheet
      -------------->
</head>

<body class="">
  <header id="header" class="header d-flex align-items-center mb-4">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="assets/img/logo.jpg" alt="">
        <!-- <h1 class="sitename">SLTB</h1> -->
        <!-- <span>.</span> -->
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="./index.php" class="">Home<br></a></li>
          <li><a href="./index.php#about">About</a></li>
          <li><a href="./index.php#services">Services</a></li>
          <li class="dropdown"><a href="#"><span>Board</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>

              <li class="dropdown"><a href="#"><span>Admin panel</span> <i
                    class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="./admin/admin_login.php">Admin login</a></li>
                </ul>
              </li>
              <li><a href="#">Users</a></li>
              <li><a href="#">Guide line</a></li>
              <li><a href="#">other services</a></li>
              <li><a href="#">help</a></li>
            </ul>
          </li>
          <?php
          if (isset($_SESSION["username"])) {
            echo '<li><a href="#">My Booking</a></li>';
          }
          ?>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      <div>

        <!-- user login php button -->
        <?php
        if (isset($_SESSION["username"])) {
          echo '<a class="btn-getstarted" href="#">' . $_SESSION["username"] . '</a>';
          echo '<a class="btn-getstarted" href="./include/logout.inc.php">Log out</a>';
        } else {
          echo '<a class="btn-getstarted" href="./User Login.php">User login</a>';
        }
        ?>

      </div>

    </div>
  </header>



  <div id="layoutSidenav_content">
    <main>
      <div class="container-fluid px-4 ">

        <div class="card mb-4">
          <div class="card-header">
            <i class="fas fa-table me-1"></i>
            <h2 class="fw-bold">Booking Your Bus</h2>
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
                                echo '<a href="include/delete.php?type=bus_booking&id=' . $row['booking_id'] . '" class="m-1" onclick="return confirm(\'Are you sure you want to delete this booking?\')"><i class="fas fa-trash-alt fa-lg"></i></a>';
                                echo '</td>';
                                echo '</tr>';
                            }
                            ?>



                        </tbody>
                    </table>
                </div>
        </div>
      </div>
    </main>

  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {

      // Function to calculate total price
      function calculateTotalPrice() {
        const ticketPrice = parseFloat(document.getElementById('ticket_price').textContent);
        const seatCount = parseInt(document.getElementById('inputnumber').value) || 0;
        const totalPrice = ticketPrice * seatCount;
        document.getElementById('total_price').value = totalPrice.toFixed(2); // Display the total price
      }

      document.querySelectorAll('.addbooking[data-bs-toggle="modal"]').forEach(button => {
        button.addEventListener('click', (event) => {
          const scheduleId = button.getAttribute('data-id');

          // Make AJAX request to fetch schedule details
          fetch(`admin/include/get_schedule_details.php?schedule_id=${scheduleId}`)
            .then(response => response.json())
            .then(data => {
              if (!data.error) {
                document.getElementById('schedule_id').value = data.schedule_id;
                document.getElementById('bus_id').value = data.bus_id;
                document.getElementById('route_id').value = data.route_id;
                document.getElementById('bus_name').textContent = data.bus_number;
                document.getElementById('start_location').textContent = data.start_location;
                document.getElementById('starttime').textContent = data.start_time;
                document.getElementById('end_location').textContent = data.end_location;
                document.getElementById('endtime').textContent = data.end_time;
                document.getElementById('inputdate').textContent = data.travel_date;
                document.getElementById('ticket_price').textContent = data.price;

                // Update seat availability
                const seatsAvailableElem = document.getElementById('seats_available');
                if (data.available_seats > 0) {
                  seatsAvailableElem.textContent = data.available_seats;
                  document.getElementById('Bname').disabled = false;
                  document.getElementById('inputnumber').disabled = false;
                  document.getElementById('total_price').disabled = false;
                  document.getElementById('Add_schedule').disabled = false;
                } else {
                  seatsAvailableElem.textContent = "All seats are booked";
                  document.getElementById('Bname').disabled = true;
                  document.getElementById('inputnumber').disabled = true;
                  document.getElementById('total_price').disabled = true;
                  document.getElementById('Add_schedule').disabled = true;
                }

                document.getElementById('total_price').value = '0.00';
                document.getElementById('inputnumber').value = '';

                // Enable seat number input only if there are available seats
                if (data.available_seats > 0) {
                  document.getElementById('inputnumber').addEventListener('input', calculateTotalPrice);
                }
              } else {
                alert(data.error);
              }
            })
            .catch(error => {
              console.error('Error fetching data:', error);
            });
        });
      });
    });
  </script>


  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- table js file -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
  <!-- <script src="./assets/js/scripts.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
    crossorigin="anonymous"></script>
  <script src="./assets/js/datatables-simple-demo.js"></script>

</body>

</html>