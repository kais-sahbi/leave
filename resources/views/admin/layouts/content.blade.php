

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">  <!--kanet 8-->
                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Departements </h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-building"></i>
<!--                                        <i class="bi bi-grid"></i>-->

                                    </div>
                                    <div class="ps-3">
                                        <h6>{{\App\Models\Departement::all()->count()}}</h6>


                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">


                            <div class="card-body">
                                <h5 class="card-title">Tous les congés </h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-calendar-event"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{\App\Models\Leave::all()->count()}}</h6>


                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->

                    <!-- Customers Card -->
                    <div class="col-xxl-4 col-xl-12">

                        <div class="card info-card customers-card">



                            <div class="card-body">
                                <h5 class="card-title">Utilisateurs </h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{\App\Models\User::all()->count()}}</h6>
<!--                                        <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>-->

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Customers Card -->

                    <!-- Reports -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body pt-3">


                            <div class="card-body">
                                <h5 class="card-title"> Utlisateur <span>/Detaille</span></h5>
                                <ul class="nav nav-tabs nav-tabs-bordered">

                                    <li class="nav-item">
                                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Génerale</button>
                                    </li>
                                </ul>
                                <div class="tab-content pt-2">

                                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                        <h5 class="card-title">Departement</h5>
                                        <p class="small fst-italic">{{auth()->user()->departement->name}} </p>

                                        <h5 class="card-title">Profile</h5>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label ">Nom</div>
                                            <div class="col-lg-9 col-md-8">{{auth()->user()->name}}</div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Email</div>
                                            <div class="col-lg-9 col-md-8">{{auth()->user()->email}}</div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Adresse</div>
                                            <div class="col-lg-9 col-md-8">{{auth()->user()->adresse}}</div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Matricule</div>
                                            <div class="col-lg-9 col-md-8">{{auth()->user()->phone_number}}</div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Poste Occupé</div>
                                            <div class="col-lg-9 col-md-8">{{auth()->user()->designation}}</div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label">Date D'embauche</div>
                                            <div class="col-lg-9 col-md-8">{{auth()->user()->start_from}}</div>
                                        </div>



                                    </div>
                                </div>





                                </div><!-- End Bordered Tabs -->

                            </div>

                        </div>
                    </div><!-- End Reports -->

                    <!-- Recent Sales -->
                    <div class="col-12">
<!--                        <div class="card recent-sales overflow-auto">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Recent Sales <span>| Today</span></h5>

                                <table class="table table-borderless datatable">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Customer</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row"><a href="#">#2457</a></th>
                                        <td>Brandon Jacob</td>
                                        <td><a href="#" class="text-primary">At praesentium minu</a></td>
                                        <td>$64</td>
                                        <td><span class="badge bg-success">Approved</span></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><a href="#">#2147</a></th>
                                        <td>Bridie Kessler</td>
                                        <td><a href="#" class="text-primary">Blanditiis dolor omnis similique</a></td>
                                        <td>$47</td>
                                        <td><span class="badge bg-warning">Pending</span></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><a href="#">#2049</a></th>
                                        <td>Ashleigh Langosh</td>
                                        <td><a href="#" class="text-primary">At recusandae consectetur</a></td>
                                        <td>$147</td>
                                        <td><span class="badge bg-success">Approved</span></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><a href="#">#2644</a></th>
                                        <td>Angus Grady</td>
                                        <td><a href="#" class="text-primar">Ut voluptatem id earum et</a></td>
                                        <td>$67</td>
                                        <td><span class="badge bg-danger">Rejected</span></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><a href="#">#2644</a></th>
                                        <td>Raheem Lehner</td>
                                        <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                                        <td>$165</td>
                                        <td><span class="badge bg-success">Approved</span></td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>

                        </div>-->
                    </div><!-- End Recent Sales -->



                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->


        </div>
    </section>

</main><!-- End #main -->
