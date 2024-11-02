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
  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-lg-0">
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
          <li><a href="#contact">Contact</a></li>
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

  <!-- bus Booking form -->
  <div class="modal fade" id="AddBooking" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add Booking</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="row g-3" id="addschedule" method="POST" action="./admin/include/Add_booking.php">
            <input type="hidden" name="schedule_id" id="schedule_id">
            <input type="hidden" name="bus_id" id="bus_id">
            <input type="hidden" name="route_id" id="route_id">
            <input type="hidden" name="user_id" value="<?php echo $_SESSION["userid"] ?>">
            <div class="col-12">
              <h6 class="fw-bolder">Bus Name</h6>
              <p id="bus_name"></p>
            </div>
            <div class="col-8">
              <h6 class="fw-bolder">Start Location</h6>
              <p id="start_location"></p>
            </div>
            <div class="col-4">
              <h6 for="starttime" class="fw-bolder">Start Time</h6>
              <p id="starttime"></p>
            </div>
            <div class="col-8">
              <h6 for="end_location" class="fw-bolder">End Location</h6>
              <p id="end_location"></p>
            </div>
            <div class="col-4">
              <h6 for="endtime" class="fw-bolder">End Time</h6>
              <p id="endtime"></p>
            </div>
            <div class="col-md-8">
              <h6 for="inputdate" class="fw-bolder">Travel Date</h6>
              <p id="inputdate"></p>
            </div>
            <div class="col-8">
              <h6 for="price" class="fw-bolder">Ticket Price (Rs)</h6>
              <p id="ticket_price"></p>
            </div>
            <div class="col-12">
              <h6 for="seats_available" class="fw-bolder">Available Seats</h6>
              <p id="seats_available"></p>
            </div>
            <div class="col-12">
              <label for="Bname" class="form-label fw-bolder">Booking name</label>
              <input type="text" class="form-control" id="Bname" name="passenger_name" required>
            </div>
            <div class="col-md-6">
              <label for="inputnumber" class="form-label fw-bolder">How many tickets</label>
              <input type="number" min="0" max="10" class="form-control" id="inputnumber" name="total_ticket" required>
            </div>
            <div class="col-md-6">
              <label for="total_price" class="form-label fw-bolder">Total price</label>
              <input type="text" class="form-control" id="total_price" name="total_price">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" form="addschedule" class="btn btn-primary" id="Add_schedule">Booking Now</button>
        </div>
      </div>
    </div>
  </div>






  <div id="layoutSidenav_content">
    <main>
      <div class="container-fluid px-4">

        <div class="card mb-4">
          <div class="card-header">
            <i class="fas fa-table me-1"></i>
            <h2 class="fw-bold">Booking Your Bus</h2>
          </div>
          <div class="card-body">
            <table id="datatablesSimple">
              <thead>
                <tr class="text-dark">
                  <th scope="col">Id</th>
                  <th scope="col">Bus number</th>
                  <th scope="col">Start location</th>
                  <th scope="col">Stop location</th>
                  <th scope="col">Start time</th>
                  <th scope="col">Traval Date</th>
                  <th scope="col">Price</th>
                  <?php
                  if (isset($_SESSION["username"])) {
                    echo '<th scope="col">Booking</th>';
                  }
                  ?>
                </tr>
              </thead>
              <tfoot>
                <tr class="text-dark">
                  <th scope="col">Id</th>
                  <th scope="col">Bus number</th>
                  <th scope="col">Start location</th>
                  <th scope="col">Stop location</th>
                  <th scope="col">Start time</th>
                  <th scope="col">Traval Date</th>
                  <th scope="col">Price</th>
                  <?php
                  if (isset($_SESSION["username"])) {
                    echo '<th scope="col">Booking</th>';
                  }
                  ?>
                </tr>
              </tfoot>
              <tbody>
                <?php
                // Assuming $pdo is your PDO instance connected to the database
                $stmt = $pdo->query("SELECT s.schedule_id, b.bus_number, r.start_location, r.end_location, 
                            s.start_time, s.end_time, s.travel_date, s.price 
                       FROM schedules s 
                       JOIN buses b ON s.bus_id = b.bus_id 
                       JOIN routes r ON s.route_id = r.route_id;");
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($result as $row) {
                  echo '<tr>';
                  echo '<td>' . htmlspecialchars($row['schedule_id']) . '</td>';
                  echo '<td>' . htmlspecialchars($row['bus_number']) . '</td>';
                  echo '<td>' . htmlspecialchars($row['start_location']) . '</td>';
                  echo '<td>' . htmlspecialchars($row['end_location']) . '</td>';
                  echo '<td>' . htmlspecialchars($row['start_time']) . '</td>';
                  echo '<td>' . htmlspecialchars($row['travel_date']) . '</td>';
                  echo '<td>' . htmlspecialchars($row['price']) . '</td>';
                  if (isset($_SESSION["username"])) {
                    echo '<td class="justify-content-end">';
                    echo '<a class="addbooking btn btn-primary btn-sm" href="#" role="button" data-bs-toggle="modal" 
             data-bs-target="#AddBooking" data-id="' . $row['schedule_id'] . '">
              <i class="fas fa-user-edit fa-lg"></i> Booking Now 
          </a>';
                    echo '</td>';
                  }
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