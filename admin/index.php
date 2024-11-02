<?php include "include/header.php"; ?>
<?php
require_once 'include/inc.db_conn.php';
// Query total students
$usersquery = $pdo->query("SELECT COUNT(*) as total_users FROM users");
$total_users = $usersquery->fetch(PDO::FETCH_ASSOC)['total_users'];

$bookingsquery = $pdo->query("SELECT COUNT(*) as total_bookings FROM bookings");
$total_bookings= $bookingsquery->fetch(PDO::FETCH_ASSOC)['total_bookings'];

$usersbuses = $pdo->query("SELECT COUNT(*) as total_buses FROM buses");
$total_buses = $usersbuses->fetch(PDO::FETCH_ASSOC)['total_buses'];

$usersroutes = $pdo->query("SELECT COUNT(*) as total_routes FROM routes");
$total_routes = $usersroutes->fetch(PDO::FETCH_ASSOC)['total_routes'];

?>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>

            <!-- slide card start -->


            <div class="grey-bg container-fluid">
                <section id="minimal-statistics">
                    <div class="row">
                        <div class="col-12 mt-3 mb-1">
                            <h4 class="text-uppercase">SLTB Bus Management</h4>
                        </div>
                    </div>
                    <div class="row mb-3 ">
                        <div class="col-xl-3 col-sm-6 col-12 mb-2">
                            <div class="card ">
                                <div class="card-content ">
                                    <div class="card-body bg-primary">
                                        <div class="media d-flex ">
                                            <div class="align-self-center">
                                                <i class="icon-pencil primary font-large-2 float-left"></i>
                                            </div>
                                            <div class="media-body text-right">
                                                <h3><?= $total_users ?></h3>
                                                <span>Useres</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12 mb-2">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="align-self-center">
                                                <i class="icon-speech warning font-large-2 float-left"></i>
                                            </div>
                                            <div class="media-body text-right">
                                                <h3><?= $total_bookings?></h3>
                                                <span>Total Bookings</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12 mb-2">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="align-self-center">
                                                <i class="icon-graph success font-large-2 float-left"></i>
                                            </div>
                                            <div class="media-body text-right">
                                                <h3><?= $total_buses?></h3>
                                                <span>All buses</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12 mb-2">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="media d-flex">
                                            <div class="align-self-center">
                                                <i class="icon-pointer danger font-large-2 float-left"></i>
                                            </div>
                                            <div class="media-body text-right">
                                                <h3><?= $total_routes?></h3>
                                                <span>All Locations</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>


            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    DataTable Example
                </div>
                <div class="card-body">
                   
                </div>
            </div>
        </div>
    </main>


<?php include "./include/footer.php"; ?>