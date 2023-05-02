

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{url('/')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                {{--@if(isset(Auth()->user()->role->permission['name']['department']['can-add']))--}}
                <i class="bi bi-menu-button-wide"></i><span>Gérer les Departements</span><i class="bi bi-chevron-down ms-auto"></i>

            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                <li>
                    @if(isset(Auth()->user()->role->permission['name']['department']['can-add']))
                    <a href="{{route('departement.create')}}">
                        <i class="bi bi-circle"></i><span>Créer</span>
                    </a>
                    @endif
                </li>


                <li>
                    @if(isset(Auth()->user()->role->permission['name']['department']['can-list']))
                    <a href="{{route('departement.list')}}">
                        <i class="bi bi-circle"></i><span>Lister</span>
                    </a>
                    @endif
                </li>

            </ul>
            {{--@endif--}}
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Gérer les Roles</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    @if(isset(Auth()->user()->role->permission['name']['role']['can-add']))
                    <a href="{{route('role.create')}}">
                        <i class="bi bi-circle"></i><span>Créer </span>
                    </a>
                    @endif
                </li>
                <li>
                    @if(isset(Auth()->user()->role->permission['name']['role']['can-list']))
                    <a href="{{route('role.list')}}">
                        <i class="bi bi-circle"></i><span>View </span>
                    </a>
                    @endif
                </li>
              {{--  <li>
                    <a href="forms-editors.html">
                        <i class="bi bi-circle"></i><span>Form Editors</span>
                    </a>
                </li>
                <li>
                    <a href="forms-validation.html">
                        <i class="bi bi-circle"></i><span>Form Validation</span>
                    </a>
                </li>--}}
            </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Gérer les Employes</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    @if(isset(Auth()->user()->role->permission['name']['user']['can-add']))
                    <a href="{{route('user.create')}}">
                        <i class="bi bi-circle"></i><span>Créer </span>
                    </a>
                    @endif
                </li>
                <li>
                    @if(isset(Auth()->user()->role->permission['name']['user']['can-list']))
                    <a href="{{route('user.list')}}">
                        <i class="bi bi-circle"></i><span>Afficher</span>
                    </a>
                    @endif
                </li>
            </ul>
        </li><!-- End Tables Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Gérer les Permessions</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    @if(isset(Auth()->user()->role->permission['name']['permission']['can-add']))
                    <a href="{{route('permisssion.create')}}">
                        <i class="bi bi-circle"></i><span>Créer </span>
                    </a>
                    @endif
                </li>
                <li>
                    @if(isset(Auth()->user()->role->permission['name']['permission']['can-list']))
                    <a href="{{route('permisssion.list')}}">
                        <i class="bi bi-circle"></i><span>Afficher </span>
                    </a>
                    @endif
                </li>

            </ul>
        </li><!-- End Tables Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gem"></i><span>Congés</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{route('leave.create')}}">
                        <i class="bi bi-circle"></i><span>Demander un congé</span>
                    </a>
                </li>
                <li>
                    @if(isset(Auth()->user()->role->permission['name']['leave']['can-list']))
                    <a href="{{route('leave.list')}}">
                        <i class="bi bi-circle"></i><span>Liste des congés</span>
                    </a>
                    @endif
                </li>
<!--                <li>
                    <a href="icons-boxicons.html">
                        <i class="bi bi-circle"></i><span>Boxicons</span>
                    </a>
                </li>-->
            </ul>
        </li><!-- End Icons Nav -->

<!--        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li>&lt;!&ndash; End Profile Page Nav &ndash;&gt;

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>F.A.Q</span>
            </a>
        </li>&lt;!&ndash; End F.A.Q Page Nav &ndash;&gt;

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-contact.html">
                <i class="bi bi-envelope"></i>
                <span>Contact</span>
            </a>
        </li>&lt;!&ndash; End Contact Page Nav &ndash;&gt;

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-register.html">
                <i class="bi bi-card-list"></i>
                <span>Register</span>
            </a>
        </li>&lt;!&ndash; End Register Page Nav &ndash;&gt;

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-login.html">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Login</span>
            </a>
        </li>&lt;!&ndash; End Login Page Nav &ndash;&gt;

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-error-404.html">
                <i class="bi bi-dash-circle"></i>
                <span>Error 404</span>
            </a>
        </li>&lt;!&ndash; End Error 404 Page Nav &ndash;&gt;

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-blank.html">
                <i class="bi bi-file-earmark"></i>
                <span>Blank</span>
            </a>
        </li>&lt;!&ndash; End Blank Page Nav &ndash;&gt;-->

    </ul>

</aside><!-- End Sidebar-->


