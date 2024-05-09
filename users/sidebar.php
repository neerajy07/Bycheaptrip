

<style>
    .sidebar {
  position: fixed;
  top: 60px;
  left: 0;
  bottom: 0;
  width: 300px;
  z-index: 996;
  transition: all 0.3s;
  padding: 20px;
  overflow-y: auto;
  scrollbar-width: thin;
  scrollbar-color:#000 transparent;
  box-shadow: 0px 0px 20px rgba(1, 41, 112, 0.1);
  background-color:white;
}
@media (max-width: 1199px) {
  .sidebar {
    left: -300px;
  }
}

.sidebar::-webkit-scrollbar {
  width: 5px;
  height: 8px;
  background-color:white;
}

.sidebar::-webkit-scrollbar-thumb {
  background-color:white;
}

@media (min-width: 1200px) {

  #main,
  #footer {
    margin-left: 300px;
  }
}

@media (max-width: 1199px) {
  .toggle-sidebar .sidebar {
    left: 0;
  }
}

@media (min-width: 1200px) {

  .toggle-sidebar #main,
  .toggle-sidebar #footer {
    margin-left: 0;
  }

  .toggle-sidebar .sidebar {
    left: -300px;
  }
}

.sidebar-nav {
  padding: 0;
  margin: 0;
  list-style: none;
}

.sidebar-nav li {
  padding: 0;
  margin: 0;
  list-style: none;
}

.sidebar-nav .nav-item {
  margin-bottom: 5px;
}

.sidebar-nav .nav-heading {
  font-size: 11px;
  text-transform: uppercase;
  color: #000;
  font-weight: 600;
  margin: 10px 0 5px 15px;
}

.sidebar-nav .nav-link {
  display: flex;
  align-items: center;
  font-size: 15px;
  font-weight: 600;
  color: #000;
  transition: 0.3;
  background: #f6f9ff;
  padding: 10px 15px;
  border-radius: 4px;
}

.sidebar-nav .nav-link i {
  font-size: 16px;
  margin-right: 10px;
  color: #000;
}

.sidebar-nav .nav-link.collapsed {
  color: #000 ;
  background: #fff;
}

.sidebar-nav .nav-link.collapsed i {
  color: #899bbd;
}

.sidebar-nav .nav-link:hover {
  color: #000;
  background: #f6f9ff;
}

.sidebar-nav .nav-link:hover i {
  color:#000;
}

.sidebar-nav .nav-link .bi-chevron-down {
  margin-right: 0;
  transition: transform 0.2s ease-in-out;
}

.sidebar-nav .nav-link:not(.collapsed) .bi-chevron-down {
  transform: rotate(180deg);
}

.sidebar-nav .nav-content {
  padding: 5px 0 0 0;
  margin: 0;
  list-style: none;
}

.sidebar-nav .nav-content a {
  display: flex;
  align-items: center;
  font-size: 14px;
  font-weight: 600;
  color: #000;
  transition: 0.3;
  padding: 10px 0 10px 40px;
  transition: 0.3s;
}

.sidebar-nav .nav-content a i {
  font-size: 6px;
  margin-right: 8px;
  line-height: 0;
  border-radius: 50%;
}

.sidebar-nav .nav-content a:hover,
.sidebar-nav .nav-content a.active {
  color:#000;
}

.sidebar-nav .nav-content a.active i {
  background-color: #000;
}

</style>
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="dashboard">
                <i class="bi bi-grid" style="color:orange"></i>
                <span style="font-family:poppins">Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <!-- <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button-wide"></i><span>Components</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="components-alerts.html">
                    <i class="bi bi-circle"></i><span>Alerts</span>
                </a>
            </li>
            <li>
                <a href="components-accordion.html">
                    <i class="bi bi-circle"></i><span>Accordion</span>
                </a>
            </li>
            <li>
                <a href="components-badges.html">
                    <i class="bi bi-circle"></i><span>Badges</span>
                </a>
            </li>
            <li>
                <a href="components-breadcrumbs.html">
                    <i class="bi bi-circle"></i><span>Breadcrumbs</span>
                </a>
            </li>
            <li>
                <a href="components-buttons.html">
                    <i class="bi bi-circle"></i><span>Buttons</span>
                </a>
            </li>
            <li>
                <a href="components-cards.html">
                    <i class="bi bi-circle"></i><span>Cards</span>
                </a>
            </li>
            <li>
                <a href="components-carousel.html">
                    <i class="bi bi-circle"></i><span>Carousel</span>
                </a>
            </li>
            <li>
                <a href="components-list-group.html">
                    <i class="bi bi-circle"></i><span>List group</span>
                </a>
            </li>
            <li>
                <a href="components-modal.html">
                    <i class="bi bi-circle"></i><span>Modal</span>
                </a>
            </li>
            <li>
                <a href="components-tabs.html">
                    <i class="bi bi-circle"></i><span>Tabs</span>
                </a>
            </li>
            <li>
                <a href="components-pagination.html">
                    <i class="bi bi-circle"></i><span>Pagination</span>
                </a>
            </li>
            <li>
                <a href="components-progress.html">
                    <i class="bi bi-circle"></i><span>Progress</span>
                </a>
            </li>
            <li>
                <a href="components-spinners.html">
                    <i class="bi bi-circle"></i><span>Spinners</span>
                </a>
            </li>
            <li>
                <a href="components-tooltips.html">
                    <i class="bi bi-circle"></i><span>Tooltips</span>
                </a>
            </li>
        </ul>
    </li> -->

        <!-- <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="forms-elements.html">
                    <i class="bi bi-circle"></i><span>Form Elements</span>
                </a>
            </li>
            <li>
                <a href="forms-layouts.html">
                    <i class="bi bi-circle"></i><span>Form Layouts</span>
                </a>
            </li>
            <li>
                <a href="forms-editors.html">
                    <i class="bi bi-circle"></i><span>Form Editors</span>
                </a>
            </li>
            <li>
                <a href="forms-validation.html">
                    <i class="bi bi-circle"></i><span>Form Validation</span>
                </a>
            </li>
        </ul>
    </li> -->

        <!-- <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="tables-general.html">
                    <i class="bi bi-circle"></i><span>General Tables</span>
                </a>
            </li>
            <li>
                <a href="tables-data.html">
                    <i class="bi bi-circle"></i><span>Data Tables</span>
                </a>
            </li>
        </ul>
    </li> -->

        <!-- <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-bar-chart"></i><span>Charts</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="charts-chartjs.html">
                    <i class="bi bi-circle"></i><span>Chart.js</span>
                </a>
            </li>
            <li>
                <a href="charts-apexcharts.html">
                    <i class="bi bi-circle"></i><span>ApexCharts</span>
                </a>
            </li>
            <li>
                <a href="charts-echarts.html">
                    <i class="bi bi-circle"></i><span>ECharts</span>
                </a>
            </li>
        </ul>
    </li> -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gem"style="color:orange"></i><span style="color:black;font-family:poppins">Thailand Tour</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="thailand_form">
                        <i class="bi bi-circle"style="color:orange"></i><span style="color:black;font-family:poppins">Add Tour</span>
                    </a>
                </li>
                <li>
                    <a href="thailand_package">
                        <i class="bi bi-circle"style="color:orange"></i><span style="color:black;font-family:poppins">Thailand Package</span>
                    </a>
                </li>
                <li>
                    <a href="icons-boxicons.html">
                        <!-- <i class="bi bi-circle"></i><span>Boxicons</span> -->
                    </a>
                </li>
            </ul>
        </li>

       <!-- <li class="nav-heading">Pages</li> -->

        <!-- <li class="nav-item">
            <a class="nav-link collapsed" href="final_cust">
                <i class="bi bi-person">Final Customer</i>
                <span></span>
            </a>
        </li> -->
        
        <li class="nav-item">
            <a class="nav-link collapsed" href="thailand_payment" style="color:black;font-family:poppins">
                <i class="bi bi-envelope"style="color:orange"></i>
                <span >Payments</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="thailand_wallet" style="color:black;font-family:poppins">
            <i class="bi bi-question-circle"style="color:orange"></i>
                <span>Wallet</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="reward" style="color:black;font-family:poppins">
                <i class="bi bi-card-list" style="color:orange"></i>
                <span>Reward</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="final_cust" style="color:black; font-family:poppins">
                <i class="bi bi-box-arrow-in-right"style="color:orange"></i>
                <span>Final Customer</span>
            </a>
        </li>
        <!--  <li class="nav-item">
            <a class="nav-link collapsed" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>F.A.Q</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-login.html">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Login</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-error-404.html">
                <i class="bi bi-dash-circle"></i>
                <span>Error 404</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-blank.html">
                <i class="bi bi-file-earmark"></i>
                <span>Blank</span>
            </a>
        </li> -->

    </ul>

</aside><!-- End Sidebar-->
