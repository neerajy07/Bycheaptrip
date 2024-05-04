<?php
include "../../connection.php";
session_start();
if (!isset($_SESSION["userid"])) {
    header("Location:../index");
}
?>
<?php $page = "customer";
include("./incluede/header.php") ?>
<!-- Main Content -->
<style>
    .form-row {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 10px;
        text-align: center;
    }

    .form-row label {
        margin-bottom: 5px;
    }

    .form-row select,
    .form-row input[type="date"] {
        width: 200px;
    }
</style>
<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $tsight_id = isset($_POST['tsight_id']) ? $_POST['tsight_id'] : '';
//     $sight_name = isset($_POST['sight_name']) ? $_POST['sight_name'] : '';
//     $prices = isset($_POST['prices']) ? $_POST['prices'] : '';
//     $errors = [];
//     if ($tsight_id == 'disabled') {
//         $errors[] = "Please select a sightSeeing.";
//     }
   
//     if (empty($errors)) {
//     $query = "INSERT INTO sightseeing (tsight_id,sight_name,prices) VALUES (?, ?, ?)";
//     $stmt = mysqli_prepare($conn, $query);
//     mysqli_stmt_bind_param($stmt, "iss", $tsight_id, $sight_name, $prices);

//     if (mysqli_stmt_execute($stmt)) {
//         echo "<script>alert('Data inserted successfully.');</script>";
//     } else {
//         echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
//     }
//     mysqli_stmt_close($stmt);
//     } else {
//         foreach ($errors as $error) {
//             echo "<script>alert('Error: $error');</script>";
//         }
//     }
// }    
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tsight_id = isset($_POST['tsight_id']) ? $_POST['tsight_id'] : '';
    $sight_name = isset($_POST['sight_name']) ? $_POST['sight_name'] : '';
    $prices = isset($_POST['prices']) ? $_POST['prices'] : '';
    $errors = [];

    // Check if sightSeeing is selected
    if ($tsight_id == 'disabled') {
        $errors[] = "Please select a sightSeeing.";
    }

    // Check if prices field is not empty
    if (empty($prices)) {
        $errors[] = "Please enter prices.";
    }

    // Check if prices are unique
    $query = "SELECT COUNT(*) AS count FROM sightseeing WHERE prices = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $prices);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    if ($row['count'] > 0) {
        $errors[] = "Prices already exist. Please enter unique prices.";
    }
    mysqli_stmt_close($stmt);

    if (empty($errors)) {
        // Insert data into the database
        $query = "INSERT INTO sightseeing (tsight_id, sight_name, prices) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "iss", $tsight_id, $sight_name, $prices);

        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('Data inserted successfully.');</script>";
        } else {
            echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
        }
        mysqli_stmt_close($stmt);
    } else {
        // Display errors
        foreach ($errors as $error) {
            echo "<script>alert('Error: $error');</script>";
        }
    }
}
?>

<div class="adminx-content">
    <div class="adminx-main-content">
        <div class="container-fluid">
            <div class="pb-3">
                <h1><b><i>Sightseeing Details</i></b></h1>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card mb-grid">
                        <div class="card-body collapse show" id="card1">
                            <form id="yourFormId" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <div class="form-group">
                                    <label class="form-label" for="">City</label>
                                    <select class="form-control" id="tcity_id" name="tsight_id">
                                        <option value="disabled">Select City</option>
                                        <?php
                                        $query = "SELECT * FROM cities";
                                        $result = mysqli_query($conn, $query);
                                        if ($result && mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                                <option value="<?php echo $row['city_id']; ?>">
                                                    <?php echo $row['city_name']; ?></option>
                                        <?php
                                            }
                                        } else {
                                            echo '<option disabled>No city found</option>';
                                        }
                                        mysqli_free_result($result);
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="category hotel">SightSeeing Details</label>
                                    <input type="text" class="form-control" id="category_name" aria-describedby="name" placeholder="Enter SightSeeing Details " name="sight_name">
                                    <p id="categoryNameError" class="error text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for=" category hotel">Price</label>
                                    <input type="text" class="form-control" id="prices" aria-describedby="name" placeholder="Enter SightSeeing Price" name="prices">
                                    <p id="pricesError" class="error text-danger"></p>
                                </div>
                                <button type="submit" class="btn btn-sm btn-block btn-primary" name="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
               
<script>
    document.getElementById('yourFormId').addEventListener('submit', function(event) {
        var hc_id = document.getElementById('tcity_id').value;
        var category_name = document.getElementById('category_name').value;
        var prices = document.getElementById('prices').value;
        var errors = [];

        if (hc_id === 'disabled') {
            errors.push("Please select a hotel.");
        }
        if (!category_name.trim()) {
            errors.push("Transport name is required.");
            document.getElementById('categoryNameError').textContent = "Transport name is required.";
        } else {
            document.getElementById('categoryNameError').textContent = "";
        }
        if (!prices.trim()) {
            errors.push("Price is required.");
            document.getElementById('pricesError').textContent = "Price is required.";
        } else {
            document.getElementById('pricesError').textContent = "";
        }

        if (errors.length > 0) {
            event.preventDefault();
            return false;
        }
    });
</script>
                <?php include("./incluede/footer.php") ?>