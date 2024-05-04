<?php
// include "../connection.php";
// session_start();
// if (($_SESSION["usersID"] == "")) {
//     header("Location:../index");
// }

// Start a transaction
// mysqli_begin_transaction($conn);
// $reff_id = $_POST['reff_id'];
// try {
//     // Insert data into thailand_customer table
//     $account_id = $_SESSION["userEmail"];
//     // $random_number = "BCT" . str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
//     $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
//     $email = mysqli_real_escape_string($conn, $_POST['email']);
//     $phone = mysqli_real_escape_string($conn, $_POST['phone']);
//     $travel_date = mysqli_real_escape_string($conn, $_POST['travel_date']);
//     $pax = mysqli_real_escape_string($conn, $_POST['pax']);
//     $package_inr = mysqli_real_escape_string($conn, $_POST['package_inr']);
//     $persion_inr = mysqli_real_escape_string($conn, $_POST['persion_inr']);
//     $sql_customer = "UPDATE thailand_customers SET customer_name = '$customer_name', email = '$email', phone = '$phone', travel_date = '$travel_date', pax = '$pax', package_inr = '$package_inr', persion_inr = '$persion_inr' WHERE reff_id = '$reff_id' ";
//     mysqli_query($conn, $sql_customer);

//     for ($i = 0; $i < count($_POST['hotelcity_name']); $i++) {
//         if (!empty($_POST['hotelcity_name'][$i]) && !empty($_POST['hotels'][$i]) && !empty($_POST['category_name'][$i])) {
//             // Retrieve the form data for each set
//             $hotelcity_name = mysqli_real_escape_string($conn, $_POST['hotelcity_name'][$i]);
//             $hotels = mysqli_real_escape_string($conn, $_POST['hotels'][$i]);
//             $category = mysqli_real_escape_string($conn, $_POST['category_name'][$i]);
//             $rooms = mysqli_real_escape_string($conn, $_POST['rooms'][$i]);
//             $nights = mysqli_real_escape_string($conn, $_POST['nights'][$i]);
//             $adults = mysqli_real_escape_string($conn, $_POST['ex_adults'][$i]);
//             $checkinDate = mysqli_real_escape_string($conn, $_POST['hotelCheckinDate'][$i]);
//             $thailand_hotel_id = $_POST['thailand_hotel_id'][$i];
//             // echo $thailand_hotel_id;
//             // exit;
//             if ($reff_id != "" && $account_id != "" && $thailand_hotel_id != "") {
//                 $query = "UPDATE thailand_hotel SET hotelcity_name = '$hotelcity_name', hotels = '$hotels', category_name = '$category', rooms = '$rooms', nights = '$nights', ex_adults = '$adults', hotelCheckinDate = '$checkinDate' WHERE reff_id = '$reff_id' AND thailand_hotel_id = '$thailand_hotel_id'";
//                 mysqli_query($conn, $query); // execute the query
//             } else {
//                 $query = "INSERT INTO thailand_hotel (hotelcity_name, hotels, category_name, rooms, nights, ex_adults, hotelCheckinDate,account_id,reff_id) 
//                   VALUES ('$hotelcity_name', '$hotels', '$category', '$rooms', '$nights', '$adults', '$checkinDate', '$account_id','$reff_id')";
//                 mysqli_query($conn, $query);
//             }
//         }
//     }

//     for ($i = 0; $i < count($_POST['transport_city']); $i++) {
//         // Retrieve the form data for each set
//         if (!empty($_POST['transport_city'][$i]) && !empty($_POST['transport'][$i])) {
//             $transport_city = mysqli_real_escape_string($conn, $_POST['transport_city'][$i]);
//             $transport = mysqli_real_escape_string($conn, $_POST['transport'][$i]);
//             $trans_pax = mysqli_real_escape_string($conn, $_POST['trans_pax'][$i]);
//             $transCheckinDate = mysqli_real_escape_string($conn, $_POST['transCheckinDate'][$i]);
//             $thailand_transport_id = $_POST['thailand_transport_id'][$i];

//             if ($reff_id != "" && $account_id != "" && $thailand_transport_id != "") {
//                 $query = "UPDATE thailand_transport SET transport_city = '$transport_city', transport = '$transport', trans_pax = '$trans_pax', transCheckinDate = '$transCheckinDate' WHERE reff_id = '$reff_id' AND thailand_transport_id = '$thailand_transport_id'";
//                 mysqli_query($conn, $query); // execute the query
//             } else {
//                 $query = "INSERT INTO thailand_transport (transport_city, transport, trans_pax, transCheckinDate,account_id,reff_id) 
//                   VALUES ('$transport_city', '$transport', '$trans_pax', '$transCheckinDate', '$account_id','$reff_id')";
//             }
//         }
//     }

//     for ($i = 0; $i < count($_POST['sight_city']); $i++) {
//         // Retrieve the form data for each set
//         if (!empty($_POST['sight_city'][$i]) && !empty($_POST['sightseeing'][$i])) {
//             $sightCity = mysqli_real_escape_string($conn, $_POST['sight_city'][$i]);
//             $sightseeing = mysqli_real_escape_string($conn, $_POST['sightseeing'][$i]);
//             $sightPersion = mysqli_real_escape_string($conn, $_POST['sight_persion'][$i]);
//             $sightCheckinDate = mysqli_real_escape_string($conn, $_POST['sightCheckinDate'][$i]);
//             $thailand_sight_id = $_POST['thailand_sight_id'][$i];


//             // Prepare and execute the SQL statement
//             if ($reff_id != "" && $account_id != "" && $thailand_sight_id != "") {
//                 $query = "UPDATE thailand_sightseeing SET sight_city = '$sightCity', sightseeing = '$sightseeing', sight_persion = '$sightPersion', sightCheckinDate = '$sightCheckinDate' WHERE reff_id = '$reff_id' AND thailand_sight_id=`$thailand_sight_id`";
//                 mysqli_query($conn, $query); // execute the query
//             } else {
//                 $query = "INSERT INTO thailand_sightseeing (sight_city, sightseeing, sight_persion, sightCheckinDate,account_id,reff_id) 
//                   VALUES ('$sightCity', '$sightseeing', '$sightPersion', '$sightCheckinDate', '$account_id','$reff_id')";
//                 mysqli_query($conn, $query);
//             }
//         }
//     }

//     mysqli_commit($conn);

//     echo "<script>alert('Updated Successfully'); window.location='thailand_form.php';</script>";
// } catch (Exception $e) {
//     mysqli_rollback($conn);
//     echo "Error: " . $e->getMessage();
// }

// mysqli_close($conn);
?>
<?php
include "../connection.php";
session_start();

if (!isset($_SESSION["usersID"]) || empty($_SESSION["usersID"])) {
    header("Location:../index.php");
    exit();
}

// Start a transaction
mysqli_begin_transaction($conn);

try {
    // Retrieve data from the form
    $reff_id = $_POST['reff_id'];
    $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $travel_date = mysqli_real_escape_string($conn, $_POST['travel_date']);
    $pax = mysqli_real_escape_string($conn, $_POST['pax']);
    $package_inr = mysqli_real_escape_string($conn, $_POST['package_inr']);
    $persion_inr = mysqli_real_escape_string($conn, $_POST['persion_inr']);

    // Update customer data
    $sql_customer = "UPDATE thailand_customers SET customer_name = '$customer_name', email = '$email', phone = '$phone', travel_date = '$travel_date', pax = '$pax', package_inr = '$package_inr', persion_inr = '$persion_inr' WHERE reff_id = '$reff_id' ";
    mysqli_query($conn, $sql_customer);

    // Update or insert hotel data
    for ($i = 0; $i < count($_POST['hotelcity_name']); $i++) {
        // Retrieve the form data for each set
        $hotelcity_name = mysqli_real_escape_string($conn, $_POST['hotelcity_name'][$i]);
        $hotels = mysqli_real_escape_string($conn, $_POST['hotels'][$i]);
        $category = mysqli_real_escape_string($conn, $_POST['category_name'][$i]);
        $rooms = mysqli_real_escape_string($conn, $_POST['rooms'][$i]);
        $nights = mysqli_real_escape_string($conn, $_POST['nights'][$i]);
        $adults = mysqli_real_escape_string($conn, $_POST['ex_adults'][$i]);
        $checkinDate = mysqli_real_escape_string($conn, $_POST['hotelCheckinDate'][$i]);
        $thailand_hotel_id = $_POST['thailand_hotel_id'][$i];

        if ($reff_id != "" && $thailand_hotel_id != "") {
            $query = "UPDATE thailand_hotel SET hotelcity_name = '$hotelcity_name', hotels = '$hotels', category_name = '$category', rooms = '$rooms', nights = '$nights', ex_adults = '$adults', hotelCheckinDate = '$checkinDate' WHERE reff_id = '$reff_id' AND thailand_hotel_id = '$thailand_hotel_id'";
            mysqli_query($conn, $query);
        } else {
            if (!empty($_POST['hotelcity_name'][$i]) && !empty($_POST['hotels'][$i]) && !empty($_POST['category_name'][$i])) {
            $query = "INSERT INTO thailand_hotel (hotelcity_name, hotels, category_name, rooms, nights, ex_adults, hotelCheckinDate, account_id, reff_id) VALUES ('$hotelcity_name', '$hotels', '$category', '$rooms', '$nights', '$adults', '$checkinDate', '$account_id','$reff_id')";
            mysqli_query($conn, $query);
            }
        }
    }

    // Update or insert transport data
    for ($i = 0; $i < count($_POST['transport_city']); $i++) {
        // Retrieve the form data for each set
        $transport_city = mysqli_real_escape_string($conn, $_POST['transport_city'][$i]);
        $transport = mysqli_real_escape_string($conn, $_POST['transport'][$i]);
        $trans_pax = mysqli_real_escape_string($conn, $_POST['trans_pax'][$i]);
        $transCheckinDate = mysqli_real_escape_string($conn, $_POST['transCheckinDate'][$i]);
        $thailand_transport_id = $_POST['thailand_transport_id'][$i];

        if ($reff_id != "" && $thailand_transport_id != "") {
            $query = "UPDATE thailand_transport SET transport_city = '$transport_city', transport = '$transport', trans_pax = '$trans_pax', transCheckinDate = '$transCheckinDate' WHERE reff_id = '$reff_id' AND thailand_transport_id = '$thailand_transport_id'";
            mysqli_query($conn, $query);
        } else {
            if (!empty($_POST['transport_city'][$i]) && !empty($_POST['transport'][$i])) {
            $query = "INSERT INTO thailand_transport (transport_city, transport, trans_pax, transCheckinDate, account_id, reff_id) VALUES ('$transport_city', '$transport', '$trans_pax', '$transCheckinDate', '$account_id','$reff_id')";
            mysqli_query($conn, $query);
            }
        }
    }

    // Update or insert sightseeing data
    for ($i = 0; $i < count($_POST['sight_city']); $i++) {
        // Retrieve the form data for each set
        $sightCity = mysqli_real_escape_string($conn, $_POST['sight_city'][$i]);
        $sightseeing = mysqli_real_escape_string($conn, $_POST['sightseeing'][$i]);
        $sightPersion = mysqli_real_escape_string($conn, $_POST['sight_persion'][$i]);
        $sightCheckinDate = mysqli_real_escape_string($conn, $_POST['sightCheckinDate'][$i]);
        $thailand_sight_id = $_POST['thailand_sight_id'][$i];

        if ($reff_id != "" && $thailand_sight_id != "") {
            $query = "UPDATE thailand_sightseeing SET sight_city = '$sightCity', sightseeing = '$sightseeing', sight_persion = '$sightPersion', sightCheckinDate = '$sightCheckinDate' WHERE reff_id = '$reff_id' AND thailand_sight_id = '$thailand_sight_id'";
            mysqli_query($conn, $query);
        } else {
            if (!empty($_POST['sight_city'][$i]) && !empty($_POST['sightseeing'][$i])) {
            $query = "INSERT INTO thailand_sightseeing (sight_city, sightseeing, sight_persion, sightCheckinDate, account_id, reff_id) VALUES ('$sightCity', '$sightseeing', '$sightPersion', '$sightCheckinDate', '$account_id','$reff_id')";
            mysqli_query($conn, $query);
            }
        }
    }

    // Commit the transaction
    mysqli_commit($conn);

    echo "<script>alert('Updated Successfully'); window.location='thailand_package.php';</script>";
} catch (Exception $e) {
    mysqli_rollback($conn);
    echo "Error: " . $e->getMessage();
}

mysqli_close($conn);
?>
