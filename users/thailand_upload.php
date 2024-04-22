<?php
include "../connection.php";
session_start();
if (($_SESSION["usersID"] == "")) {
  header("Location:../index");
}
?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php
if (isset($_GET['reff_id'])) {
  $reff_id = $_GET['reff_id'];
  $escaped_reff_id = mysqli_real_escape_string($conn, $reff_id);
  $sql = "SELECT * FROM thailand_customers WHERE reff_id = '$escaped_reff_id'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>
      <?php
      // if ($_SERVER["REQUEST_METHOD"] == "POST") {
      //   // Upload file
      //   $file_name = $_FILES['file']['name'];
      //   $file_tmp = $_FILES['file']['tmp_name'];
      //   $file_type = $_FILES['file']['type'];
      //   $uploads_dir = "uploads/";
      //   $upload_details = $_POST['upload_details'];
      //   $reff_upload = $row['reff_id'];
      //   $account_file_id = $row['account_id'];

      //   if (move_uploaded_file($file_tmp, $uploads_dir . $file_name)) {
      //     $sql = "INSERT INTO thailand_upload (`file`, `upload_details`, `reff_upload`, `account_file_id`) VALUES (?, ?, ?, ?)";


      //     // Prepare statement
      //     $stmt = $conn->prepare($sql);

      //     if ($stmt) {
      //       // Bind parameters
      //       $stmt->bind_param("ssii", $file_name, $upload_details, $reff_upload, $account_file_id);

      //       // Execute statement
      //       if ($stmt->execute()) {
      //         echo "<script>alert('File uploaded successfully');</script>";
      //       } else {
      //         echo "Error executing SQL statement: " . $stmt->error;
      //       }

      //       // Close statement
      //       $stmt->close();
      //     } else {
      //       echo "Error preparing SQL statement: " . $conn->error;
      //     }
      //   } else {
      //     echo "File upload failed.";
      //   }
      // }
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Upload file
        $file_name = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_type = $_FILES['file']['type'];
        $uploads_dir = "uploads/";
        $upload_details = $_POST['upload_details'];
        $reff_upload = $row['reff_id'];
        $account_file_id = $row['account_id'];
    
        if (move_uploaded_file($file_tmp, $uploads_dir . $file_name)) {
            $sql = "INSERT INTO thailand_upload (`file`, `upload_details`, `reff_upload`, `account_file_id`) VALUES ('$file_name', '$upload_details','$reff_id', '$account_file_id')";
            echo "<script> alert('$sql');</script>";
            exit;
            // Prepare statement
            $stmt = $conn->prepare($sql);
           
    
            // if ($stmt) {
            //     // Bind parameters
            //     $stmt->bind_param("ssii", $file_name, $upload_details, $reff_upload, $account_file_id);
                
            //     // Execute statement
            //     if ($stmt->execute()) {
            //         echo "<script>alert('File uploaded successfully');</script>";
            //     } else {
            //         echo "Error executing SQL statement: " . $stmt->error;
            //     }
    
                // Close statement
                $stmt->close();
            } else {
                echo "Error preparing SQL statement: " . $conn->error;
            }
        } else {
            echo "File upload failed.";
        }
    // }
    
    


      ?>
      <main id="main" class="main">

        <div class="pagetitle">
          <h1>Form Elements</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a></li>
              <li class="breadcrumb-item">Forms</li>
              <li class="breadcrumb-item active">Elements</li>
            </ol>
          </nav>

        </div><!-- End Page Title -->

        <section class="section">
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">File Upload Form</h5>

                  <?php $action = $_SERVER['PHP_SELF'] . "?reff_id=" . urlencode($reff_id); ?>
                  <form action="<?php echo $action ?>" method="post" enctype="multipart/form-data">
                    <div class="row mb-3">
                      <label for="inputNumber" class="col-sm-3 col-form-label">File Upload</label>
                      <div class="col-sm-9">
                        <input class="form-control" type="file" id="formFile" name="file" required>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="inputText" class="col-sm-3 col-form-label">Upload Details</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputText" name="upload_details" required placeholder="Documents Details ...">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary">Uploads</button>
                      </div>
                    </div>

                  </form>

                </div>
              </div>

            </div>

            <div class="col-lg-6">

              <div class="card">
                <div class="card-body">
                  <!-- <h5 class="card-title">Advanced Form Elements</h5> -->

                  <!-- Advanced Form Elements -->

                  <section class="section profile">
                    <div class="row">

                      <div class="col-xl-12">

                        <div class="card">
                          <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                              <li class="nav-item">
                                <!-- <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button> -->
                              </li>
                            </ul>
                            <div class="tab-content pt-2">

                              <div class="tab-pane fade show active profile-overview" id="profile-overview text-center">

                                <!-- <h5 class="card-title">Details</h5> -->

                                <div class="row pt-5">
                                  <div class="col-lg-3 col-md-4 label ">Customer</div>
                                  <div class="col-lg-9 col-md-8"><?php echo $row['customer_name']; ?></div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-3 col-md-4 label">Phone</div>
                                  <div class="col-lg-9 col-md-8"><?php echo $row['phone']; ?></div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-3 col-md-4 label">Ref#</div>
                                  <div class="col-lg-9 col-md-8"><?php echo $row['reff_id']; ?></div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-3 col-md-4 label">Package Cost</div>
                                  <div class="col-lg-9 col-md-8"><?php echo $row['package_inr']; ?></div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-3 col-md-4 label">Travel Date</div>
                                  <div class="col-lg-9 col-md-8"><?php echo date('d-m-Y', strtotime($row['create_date'])); ?></div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-3 col-md-4 label">Total Pax</div>
                                  <div class="col-lg-9 col-md-8"> <?php echo $row['pax']; ?></div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-3 col-md-4 label">Payment</div>
                                  <div class="col-lg-9 col-md-8 text-success">Paid</div>
                                </div>
                              </div>

                        <?php
                      }
                    }
                  }
                        ?>

                            </div><!-- End Bordered Tabs -->

                          </div>
                        </div>

                      </div>
                    </div>
                  </section>
                </div>
              </div>

            </div>
          </div>
        </section>

      </main><!-- End #main -->
      <?php include('footer.php'); ?>