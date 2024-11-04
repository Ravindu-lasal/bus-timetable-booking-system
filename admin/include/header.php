<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SLTB Admin</title>

    <!-- stylesheet table and site -->
    <link href="css/styles.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="../../assets/vendor/bootstrap/css/bootstrap.min.css"> -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        /* Style for the message div */
        .message-popup {
            opacity: 0;
            position: fixed;
            cursor: default;
            top: 20px;
            left: 50%;
            transform: translateX(-50%) translateY(-30px);
            z-index: 2000;
            font-size: 20px;
            padding: 16px;
            color: green;
            font-weight: 200;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            /* Optional: add shadow */
            transition: opacity 0.5s ease, transform 0.5s ease;
            /* Transition for fade-in/fade-out */
        }

        .show-message {
            opacity: 5;
            transform: translateX(-50%) translateY(0);
            /* Move down to its original position */
        }
    </style>

    <!-- stylesheet card -->

</head>

<body class="sb-nav-fixed">

    <!-- Massage show -->
    <div id="messagePopup" class="alert alert-success message-popup">
        <i class="bi bi-check-square-fill">&nbsp;</i>
        <span id="messageText"></span>
    </div>

    <script>
        // ##################Erro massage show function ########################


        function getQueryParam(param) {
            let params = new URLSearchParams(window.location.search);
            return params.get(param);
        }
        // Function to remove the message parameter from the URL
        function removeQueryParam(param) {
            let url = new URL(window.location);
            url.searchParams.delete(param);
            window.history.replaceState({}, document.title, url.pathname); // Update the URL without reloading
        }
        // Function to show the message after the page has loaded
        window.onload = function() {
            let message = getQueryParam('message');
            if (message) {
                let messagePopup = document.getElementById('messagePopup');
                let messageText = document.getElementById('messageText');
                messageText.textContent = decodeURIComponent(message); // Show the message text


                messagePopup.classList.add('show-message'); // Add class to trigger fade-in

                // Remove the message parameter from the URL
                removeQueryParam('message');

                setTimeout(() => {
                    messagePopup.classList.remove('show-message'); // Remove class to trigger fade-out
                }, 5000);
            }
        };
    </script>
    <!--Massage End -->


    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php">ADIMIN PANEL</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="../include/logout.inc.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Add Details
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="buses.php">Add buses</a>
                                <a class="nav-link" href="location.php">Add location</a>
                            </nav>
                        </div>
                        <a class="nav-link" href="bus_schedules.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Bus Schedules
                        </a>
                        <a class="nav-link" href="bus_booking.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Bus Booking
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    SLTB Mawanelle Depot
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">