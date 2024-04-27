<?php
include "../../connection.php";
session_start();
if (!isset($_SESSION["userid"])) {
    header("Location:../index");
}
?>
<?php $page = "";
include("./incluede/header.php");
$user_id = $_GET['user_id']; ?>
<div class="adminx-content">
    <div class="adminx-main-content">
        <div class="container-fluid">
            <!-- BreadCrumb -->
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb adminx-page-breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Tables</a></li>
                    <li class="breadcrumb-item active  aria-current=" page">Regular Tables</li>
                </ol>
            </nav>

            <div class="pb-3">
                <h3><b><i>Users Wallet Details</i></b></h3>
            </div>
            <div class="row">
                <div class="col">
                    <div class="">
                        <a href="" class="btn btn-primary btn-sm " id="manageWalletsBtn"><i class="bi bi-plus-circle"></i>Manage Wallet</a>
                    </div>
                    <div class="card mb-grid">
                        <div class="table-responsive-md">
                            <table class="table table-actions table-striped table-hover mb-0" data-table>
                                <thead>
                                    <tr>
                                        <th scope="col">
                                            <label class="custom-control custom-checkbox m-0 p-0">
                                                <input type="checkbox" class="custom-control-input table-select-all">
                                                <span class="custom-control-indicator"></span>
                                            </label>
                                        </th>
                                        <th>Sr.No.</th>
                                        <th data-type="date" data-format="YYYY/DD/MM">Date</th>
                                        <th>Details</th>
                                        <th>Transaction_id</th>
                                        <th>Debit</th>
                                        <th>Credit</th>
                                        <th>balance</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $a = 1;
                                    $query = "SELECT * FROM `wallets`
                                JOIN users ON wallets.user_id = users.email
                                JOIN transactions ON wallets.id_wallet = transactions.wallet_id 
                                WHERE wallets.user_id='$user_id' ORDER BY timestamp DESC";
                                    $res = mysqli_query($conn, $query);
                                    while ($payment = mysqli_fetch_assoc($res)) {
                                    ?>
                                        <tr>
                                            <th scope="row">
                                                <label class="custom-control custom-checkbox m-0 p-0">
                                                    <input type="checkbox" class="custom-control-input table-select-row">
                                                    <span class="custom-control-indicator"></span>
                                                </label>
                                            </th>
                                            <td><?php echo $a ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($payment['timestamp'])); ?></td>
                                            <td><?php echo $payment['message'] ?></td>
                                            <td><?php echo $payment['transactions_id'] ?></td>
                                            <?php if ($payment['type'] == 'debit') { ?>
                                                <td class="text-danger"><b><?php echo $payment['amount'] ?></b></td>
                                            <?php } else { ?>
                                            <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($payment['type'] == 'credit') { ?>
                                            <td class="text-success fs-1"><b><?php echo $payment['amount'] ?></b></td>
                                        <?php } else { ?>
                                        <?php } ?>
                                        </td>
                                        <td class="text-primary fs-1"><b><?php echo $payment['remaining_balance'] ?></b></td>
                                        <td>
                                            <!-- <a href="wallet_details?user_id=<?php echo $payment['user_id'] ?>" class="btn btn-info">Manage Wallets</a> -->
                                            <!-- <a href="wallet_details?user_id=<?php echo $payment['user_id'] ?>" class="btn btn-info" id="manageWalletsBtn">Manage Wallets</a> -->
                                        </td>
                                        </tr>
                                    <?php
                                        $a++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <?php
                            $query = "SELECT * FROM `wallets`
                              JOIN users ON wallets.user_id = users.email
                              JOIN transactions ON wallets.id_wallet = transactions.wallet_id 
                              WHERE wallets.user_id='$user_id' ORDER BY timestamp DESC";
                            $res = mysqli_query($conn, $query);
                            while ($payment = mysqli_fetch_assoc($res)) {
                            ?>
                                <div class="modal" id="walletModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!-- Modal content -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Manage Wallets</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="" method="post">
                                                    <div class="form-group">
                                                        <label for="name">Name</label>
                                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $payment['name'] ?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $payment['email'] ?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone">Phone</label>
                                                        <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $payment['phone'] ?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="wallet_balance">Wallet Balance</label>
                                                        <input type="text" class="form-control" id="wallet_balance" name="wallet_balance" value="<?php echo $payment['wallet_balance'] ?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="amount">Amount</label>
                                                        <input type="text" class="form-control" id="amount" name="amount" placeholder="Enter Amount">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="description">Description</label>
                                                        <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="type">Type</label>
                                                        <select class="form-control" id="type" name="type">
                                                            <option value="" disabled>Select Type</option>
                                                            <option value="credit">Credit</option>
                                                            <option value="debit">Debit</option>
                                                            <option value="reward">reward</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="wallet_id">Wallet ID</label>
                                                        <input type="text" class="form-control" id="wallet_id" name="wallet_id" value="<?php echo $payment['id_wallet'] ?>" readonly>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            }
                                ?>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- If you prefer jQuery these are the required scripts -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
<script src="./dist/js/vendor.js"></script>
<script src="./dist/js/adminx.js"></script>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<!-- <script>
    // JavaScript function to handle status change
    function setStatus(customerId, newStatus) {
        // Send an AJAX request to update_status.php
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "update_status.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Update the badge text if the request is successful
                document.getElementById('statusDropdown' + customerId).textContent = xhr.responseText;

                if (xhr.responseText === newStatus) {
                    alert("Status changed successfully.");
                } else {
                    alert("Failed to update status.");
                }
            }
        };
        xhr.send("custId=" + customerId + "&newStatus=" + newStatus);
    }
</script> -->
<script>
    $(document).ready(function() {
        var table = $('[data-table]').DataTable({
            "columns": [
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                {
                    "orderable": false
                }
            ]
        });

        /* $('.form-control-search').keyup(function(){
          table.search($(this).val()).draw() ;
        }); */
    });
</script>
</body>
<script>
    // JavaScript to open the modal when the button is clicked
    document.getElementById("manageWalletsBtn").addEventListener("click", function(event) {
        event.preventDefault(); // Prevent the default action of the link
        $('#walletModal').modal('show'); // Show the modal
    });
</script>

</html>