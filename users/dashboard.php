
<?php
include "../connection.php";
session_start();
if (($_SESSION["usersID"] == "")) {
  header("Location:../index");
}
?>

<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>

<style>
    .pagetitle h1,li{
        color:black;
        font-family:"poppins";
    }
   
   
    main .insights{
        display:grid;
        grid-template-columns: repeat(3,1fr);
        gap:1.6rem
    }
    main .insights>div{
        background:white;
        padding: 20px;
        border-radius:20px;
        margin-top:1rem;
        box-shadow: 7px 7px 5px lightblue;
        transition:all .3s ease;
    }

    main .insights > div:hover{
        box-shadow:none;
        transition-duration:2s;
        transition-timing-function:ease-out;
    }
    

     main .insights > div i{
        background:orange;
        padding: 0.5rem;
        border-radius:50%;
        color:white;
        font-size:1.5rem;
    } 
    main .insights > div.expenses span{
        /* background:orange; */
        border-radius:50%;
        font-size:2rem;
    }
    main .insights > div.sales span{
        /* background:orange; */
    }
    main .insights > div.income span{
        /* background:orange; */
    }
    main .insights > div .middle{
        display:flex;
        align-items:center;
        justify-content:space-between;
    }
    main .insights > div .middle h2{
        font-size:1.5rem
    }
    main .insights > div .middle h4{
        font-size:1.5rem;
        font-weight:700;
        font-family:"poppins";
        padding-top:5%;
    }
    main .insights .progress{
        position: relative;
        height:50px;
        width:50px;
        border-radius:50%;
        background:#fff;
        border:5px solid orange;
    }
    main .insights svg{
        height:150px;
        
        position:absolute;
        top:0;
        left:2rem
        
    }
    main .insights svg circle{
        fill:none;
        /* stroke:orange; */
        transform:rotate(270,80,80);
        stroke-width:5;
    }
    main .insights .progress .number{
        position:absolute;
        /* top:1%;
        left:1%; */
        height:100%;
        width: 100%;
        display:flex;
        justify-content:center;
        align-items:center;
        font-size:1rem;
        font-weight:600;
        /* border:2px solid orange; */
    }
    main .recent_order{
        margin-top:2rem;
    }
    main .recent_order h2{
        font-family:"poppins"

    }
    
    main .recent_order table{
        background:white;
        width: 100%;
        border-radius:10px;
        padding:10px;
        text-align:center;
        box-shadow: 7px 7px 5px lightblue;
        transition:all .3s ease;
    }
    main .recent_order table:hover{
        box-shadow:none;
    }
    main table tbody tr{
       
        height:3.5rem;
        border-bottom:1px solid white;
        
    }
    main table thead tr th{
        font-family:"poppins" 
    }
    main table tbody td{
        font-family:"poppins";
        height:3.5rem;
        /* border-bottom:1px solid black; */
    }
    main table tbody tr:last-child td{
        border:none;
    }
    .datatable-input {
        box-shadow:5px 6px 5px;
        border:2px solid black;
        border-radius:10px;
    }

    /* media query for mobile */
    @media screen and (max-width:768px) {
        main .insights{
            display:grid;
            grid-template-columns: repeat(1,1fr);
            gap:1.6rem;
            padding: 40px;

        }
        main .recent_order{
            padding:30px;
            margin:0 auto;
        }
    }

</style>

    <main id="main" class="main">
        <div class="pagetitle" >
            <h1 >Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <!-- <li class="breadcrumb-item"><a href="index.h">Home</a></li> -->
                    <!-- <li class="breadcrumb-item active" style="color:black">Dashboard</li> -->
                </ol>
            </nav>
        </div><!-- End Page Title -->
        
        <div class="insights">
            <!-- start selling -->
            <div class="sales">
                <span class="material-symbols-sharp"><i class='bx bx-trending-up'></i></span>
                <div class="middle">
                    <div class="left">
                        <h4>Total Booking</h4>
                        <!-- <h2>25,025</h2> -->
                    </div>
                    <div class="progress">
                        <svg>
                            <circle r="30"cy="40"></circle>
                        </svg>
                        <div class="number">80%</div>
                    </div>
                </div>
                <!-- <small>last 24 hours</small> -->
            </div>
            <!-- end selling section -->
            <!-- start expenses -->
            <div class="expenses">
                <span class="material-symbols-sharp"><i class='bx bx-shopping-bag'></i></span>
                <div class="middle">
                    <div class="left">
                        <h4>Total Expenses</h4>
                        <!-- <h2>$25,025</h2> -->
                    </div>
                    <div class="progress">
                        <svg>
                            <circle r="30"cy="40"></circle>
                        </svg>
                        <div class="number">90%</div>
                    </div>
                </div>
                <!-- <small>last 24 hours</small> -->
            </div>
            <!-- end expenses section -->

            <!-- start income -->
            <div class="income">
                <span class="material-symbols-sharp"><i class='bx bx-line-chart'></i></span>
                <div class="middle">
                    <div class="left">
                        <h4>Income</h4>
                        <!-- <h2>$25,025</h2> -->
                    </div>
                    <div class="progress">
                        <svg>
                            <circle r="30"cy="40"></circle>
                        </svg>
                        <div class="number">99%</div>
                    </div>
                </div>
                <!-- <small>last 24 hours</small> -->
            </div>
            <!-- end selling section -->
        </div> <!-- end inside -->
        <!-- start recent order -->
        <div class="recent_order">
            <h2>Recent Order</h2>
        </div>
        <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <!-- <div class="card-header"><a href="thailand_payment_form" class="btn btn-primary float-end" style="color:orange;background:black;border:none"><i class="bi bi-plus-circle"></i> Add Payment</a></div> -->
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Sr.No.</th>
                                    <th>Payment Date</th>
                                    <th>Details</th>
                                    <th>Ammount</th>
                                    <th data-type="date" data-format="YYYY/DD/MM">Created Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $a = 1;
                                $query = "SELECT * FROM `thailand_payment` where account_details='$_SESSION[userEmail]' ORDER BY pay_id DESC";
                                $res = mysqli_query($conn, $query);
                                while ($payment = mysqli_fetch_assoc($res)) {
                                ?>
                                    <tr>
                                        <td><?php echo $a ?></td>
                                        <?php
                                        $timestamp = strtotime($payment['payment_date']);
                                        $formatted_date = date("d M Y", $timestamp);
                                        ?>
                                        <td><?php echo $formatted_date ?></td>
                                        <td> <a href="thailand_payment_details?payment_id=<?php echo $payment['payment_id'] ?>"><?php echo $payment['description'] ?></a></td>
                                        <td><?php echo $payment['user_ammount'] ?></td>
                                        <!-- <td><?php echo $payment['created_date'] ?> </td> -->
                                        <td><?php echo date('d-m-Y', strtotime($payment['created_date'])); ?></td>

                                        <td>
                                            <?php
                                            if ($payment['status'] == 'Pending') {
                                                echo "<span class='badge bg-warning'>Pending</span>";
                                            } elseif ($payment['status'] == 'Accept') {
                                                echo "<span class='badge bg-success'>Success</span>";
                                            } else {
                                                echo "<span class='badge bg-danger'>Failed</span>";
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php
                                    $a++;
                                }
                                ?>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
    </main><!-- End #main -->

   <?php include('footer.php'); ?>