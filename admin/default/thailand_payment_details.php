<?php
include "../../connection.php";
session_start();
if (!isset($_SESSION["userid"])) {
    header("Location:../index");
}
?>
<?php $page = "";
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
function sanitize_input($conn, $data)
{
    $data = trim($data);
    $data = mysqli_real_escape_string($conn, $data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $trans_id = $_POST['trans_id'];
    $transport_name = sanitize_input($conn, $_POST['transport_name']);

    $tcity_id = sanitize_input($conn, $_POST['tcity_id']);

    $prices = sanitize_input($conn, $_POST['prices']);
    $update_query = "UPDATE transport SET transport_name = '$transport_name',prices = '$prices', tcity_id = '$tcity_id' WHERE trans_id = $trans_id";
    if (mysqli_query($conn, $update_query)) {
        echo "<script>alert(' updated successfully.');
        window.location.href = 'transport_all';
        </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} elseif (isset($_GET['pay_id'])) {
    $pay_id = $_GET['pay_id'];
    // Retrieve trans details from the database
    $query = "SELECT * FROM thailand_payment WHERE pay_id = $pay_id";
    $result = mysqli_query($conn, $query);
    // $row = mysqli_fetch_assoc($result);
    $trans = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
} else {
    header("Location:thailand_payment");
    exit;
}
?>
<div class="adminx-content">
    <div class="adminx-main-content">
        <div class="container-fluid">
            <div class="pb-3">
                <h1><b><i>Transport Details</i></b></h1>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-grid">
                        <div class="card-body collapse show" id="card1">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <input type="hidden" name="pay_id" value="<?php echo $trans['pay_id']; ?>">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label" for="">Account Email</label>
                                            <input type="text" class="form-control" placeholder="" name="" value="<?php echo htmlspecialchars($trans['account_details']); ?>" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label" for="">Description</label>
                                            <input type="text" class="form-control" placeholder="" name="" value="<?php echo htmlspecialchars($trans['description']); ?>" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label" for="">Payment Date</label>
                                            <input type="text" class="form-control" placeholder="" name="" value="<?php echo htmlspecialchars($trans['payment_date']); ?>" required readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label" for="">Payment Details</label>
                                            <input type="text" class="form-control" placeholder="" name="" value="<?php echo htmlspecialchars($trans['payment_id']); ?>" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label" for="">User Ammount</label>
                                            <input type="text" class="form-control" placeholder="" name="" value="<?php echo htmlspecialchars($trans['user_ammount']); ?>" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label" for="">Created Date</label>
                                            <input type="text" class="form-control" placeholder="" name="" value="<?php echo htmlspecialchars($trans['created_date']); ?>" required readonly>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label" for="">Payment Details</label>
                                            <input type="text" class="form-control" placeholder="" name="" value="<?php echo htmlspecialchars($trans['payment_id']); ?>" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label" for="">User Ammount</label>
                                            <input type="text" class="form-control" placeholder="" name="" value="<?php echo htmlspecialchars($trans['user_ammount']); ?>" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label" for=""></label>
                                            <input type="text" class="form-control" placeholder="" name="" value="<?php echo htmlspecialchars($trans['payment_date']); ?>" required readonly>
                                        </div>
                                    </div>
                                </div> -->
                                <button type="submit" class="btn btn-sm btn-block btn-primary" name="submit">Upadte</button>
                            </form>
                        </div>
                    </div>
                    <?php include("./incluede/footer.php") ?>