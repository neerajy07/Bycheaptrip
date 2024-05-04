<?php
include "../connection.php";
session_start();
if (($_SESSION["usersID"] == "")) {
    header("Location:../index");
}
?>
<style>
    .d-flex {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .form-row {
        margin: 5px;
    }

    .hidden {
        display: none !important;
    }
</style>

<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Thailand Package Form </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Forms</li>
                <li class="breadcrumb-item active">Layouts</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <?php
 if(isset($_GET['reff_id'])) {
    $reff_id = $_GET['reff_id'];
    $escaped_reff_id = mysqli_real_escape_string($conn, $reff_id);
    $sql = "SELECT COUNT(*) AS total_rows
            FROM thailand_hotel 
            WHERE reff_id = '$escaped_reff_id'";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        $rows = mysqli_fetch_assoc($result);
        $total_rows = $rows['total_rows'];
    } else {
        echo "Error executing query: " . mysqli_error($conn);
    }
} else {
    echo "No reff_id provided";
}
?>
<?php
if(isset($_GET['reff_id'])) {
    $reff_id = $_GET['reff_id'];
    $escaped_reff_id = mysqli_real_escape_string($conn, $reff_id);
    
    // Query to count the total number of rows in thailand_sightseeing
    $sql_count = "SELECT COUNT(*) AS totalsight  
                  FROM thailand_sightseeing
                  WHERE reff_id = '$escaped_reff_id'";
    
    $result_count = mysqli_query($conn, $sql_count);
    
    if ($result_count) {
        $rowsight = mysqli_fetch_assoc($result_count);
        $total_sightrows = $rowsight['totalsight'];        
        // If there are rows, query to fetch individual column values
        if ($total_sightrows > 0) {
            $sql_data = "SELECT * 
                         FROM thailand_sightseeing
                         WHERE reff_id = '$escaped_reff_id'";
            
            $result_data = mysqli_query($conn, $sql_data);
            
        }
    } else {
        echo "Error executing query to count total sight rows: " . mysqli_error($conn);
    }
} else {
    echo "No reff_id provided";
}
?>
<?php
 if(isset($_GET['reff_id'])) {
    $reff_id = $_GET['reff_id'];
    $escaped_reff_id = mysqli_real_escape_string($conn, $reff_id);
    $sql = "SELECT COUNT(*) AS totaltrans
        FROM thailand_transport
        WHERE reff_id = '$escaped_reff_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $rowtrans = mysqli_fetch_assoc($result);
        $total_transrows = $rowtrans['totaltrans'];
    } else {
        echo "Error executing query: " . mysqli_error($conn);
    }
    } else {
    echo "No reff_id provided";
    }
    ?>
                                    <?php
                                        if(isset($_GET['reff_id'])) {
                                            $reff_id = $_GET['reff_id'];
                                            $escaped_reff_id = mysqli_real_escape_string($conn, $reff_id);
                                            $sql = "SELECT * FROM thailand_customers WHERE reff_id = '$escaped_reff_id'";
                                            $result = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($result) > 0) {
                                                $row = mysqli_fetch_assoc($result); 
                                        ?> 
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Thailand Trip Package</span></h5>
                        <form class="row g-3" action="update_data.php" method="post" id="myForm" >
                            <div class="col-md-12">
                                <input type="text" name="customer_name" id="name" value="<?php echo $row['customer_name']?>" class="form-control" placeholder="Your Name" required>
                                <span id="nameError" style="color: red;"></span>
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" id="email" value="<?php echo $row['email']?>" class="form-control" placeholder="Email" required>
                                <span id="emailError" style="color: red;"></span>
                            </div>
                            <div class="col-md-6">
                                <input type="number" name="phone" value="<?php echo $row['phone']?>" id="phone" class="form-control" placeholder="Phone" required>
                                <span id="phoneError" style="color: red;"></span>
                            </div>
                            <div class="col-md-6">
                                <input type="date" name="travel_date" id="custdate" value="<?php echo $row['travel_date']?>" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control date-input" placeholder="Date" required>
                                <span id="dateError" style="color: red;"></span>
                            </div>
                            <div class="col-md-6">
                                <!-- <input type="number" name="pax" id="pax" class="form-control" placeholder="PAX" required> -->
                                <select class="form-control" id="paxmember" name="pax" required>
                                <option value="0" disabled>0</option>
                                <?php
                                    // Assuming $row['pax'] is defined and contains a value between 1 and 15
                                    $selectedPax = $row['pax']; // Fetch the value from the database row

                                    // Loop through the numbers 1 to 15 to create each option
                                    for ($i = 1; $i <= 15; $i++) {
                                        // Check if the current loop index matches the fetched pax value
                                        $selected = ($i == $selectedPax) ? 'selected' : '';

                                        // Print the option with the selected attribute if it matches
                                        echo "<option value='$i' $selected>$i</option>";
                                    }
                                ?>
                                </select>
                                <span id="personsError" style="color: red;"></span>
                            </div>
                            <?php 
 }
} else {
    echo "No results";
}
?>
                            <br>
                            <br>
                            <h1 class="text-center text-info">THAILAND</h1>
                            <div class="main bg-info">
                                <div id="formContainer1" class="d-flex justify-content-center">
                                    <div class="form-rows-container d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control city" name="hotelcity_name[]" id="city1" data-id="1">
                                                <option value="" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" data-custom-attribute="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Hotel:</label>
                                            <select class="form-control hotel" name="hotels[]" id="hotel1" data-id="1">
                                                <option value="" selected>Select Hotel</option>
                                                <?php
                                                $query = "SELECT * FROM hotels";
                                                $result = mysqli_query($conn, $query);
                                                ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($hotelrow = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $hotelrow['hotel_id']; ?>" data-custom-attribute="<?php echo $hotelrow['hotel_name']; ?>"><?php echo $hotelrow['hotel_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No HOTELS found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="category">Category:</label>
                                            <select class="form-control category" name="category_name[]" id="category1" data-id="1">
                                                <option value="" selected>Select Category</option>
                                                <?php
                                                $query = "SELECT * FROM hotel_categories";
                                                $result = mysqli_query($conn, $query);
                                                ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($categoryrow = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $categoryrow['prices']; ?>" data-custom-attribute="<?php echo $categoryrow['hc_id']; ?>"><?php echo $categoryrow['category_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No Category found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">Rooms:</label>
                                            <select class="form-control" name="rooms[]" id="room1">
                                                <option value="" selected>Select Rooms</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="nights">Nights:</label>
                                            <select class="form-control" name="nights[]" id="night1">
                                                <option value="" selected>Select Nights</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="adults">Adults:</label>
                                            <select class="form-control" name="ex_adults[]" id="adult1">
                                                <option value="" selected>Select Adults</option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="hotelCheckinDate[]" id="hotelCheckinDate1">
                                        </div>
                                    </div>
                                </div>
                                <div id="formContainer2" class="justify-content-center" style="display: none !important;">
                                    <div class="form-rows-container d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control city" name="hotelcity_name[]" id="city2" data-id="2">
                                                <option value="" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" data-custom-attribute="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Hotel:</label>
                                            <select class="form-control hotel" name="hotels[]" id="hotel2" data-id="2">
                                                <option value="" selected>Select Hotel</option>
                                                <?php
                                                $query = "SELECT * FROM hotels";
                                                $result = mysqli_query($conn, $query);
                                                ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($hotelrow = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $hotelrow['hotel_id']; ?>" data-custom-attribute="<?php echo $hotelrow['hotel_name']; ?>"><?php echo $hotelrow['hotel_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No HOTELS found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="category">Category:</label>
                                            <select class="form-control category" name="category_name[]" id="category2" data-id="2">
                                                <option value="" selected>Select Category</option>
                                                <?php
                                                $query = "SELECT * FROM hotel_categories";
                                                $result = mysqli_query($conn, $query);
                                                ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($categoryrow = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $categoryrow['prices']; ?>" data-custom-attribute="<?php echo $categoryrow['hc_id']; ?>"><?php echo $categoryrow['category_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No Category found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">Rooms:</label>
                                            <select class="form-control" name="rooms[]" id="room2">
                                                <option value="" selected>Select Rooms</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="nights">Nights:</label>
                                            <select class="form-control" name="nights[]" id="night2">
                                                <option value="" selected>Select Nights</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="adults">Adults:</label>
                                            <select class="form-control" name="ex_adults[]" id="adult2">
                                                <option value="" selected>Select Adults</option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="hotelCheckinDate[]" id="hotelCheckinDate2">
                                        </div>
                                    </div>
                                </div>
                                <div id="formContainer3" class="justify-content-center" style="display: none !important;">
                                    <div class="form-rows-container d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control city" name="hotelcity_name[]" id="city3" data-id="3">
                                                <option value="" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" data-custom-attribute="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Hotel:</label>
                                            <select class="form-control hotel" name="hotels[]" id="hotel3" data-id="3">
                                                <option value="" selected>Select Hotel</option>
                                                <?php
                                                $query = "SELECT * FROM hotels";
                                                $result = mysqli_query($conn, $query);
                                                ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($hotelrow = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $hotelrow['hotel_id']; ?>" data-custom-attribute="<?php echo $hotelrow['hotel_name']; ?>"><?php echo $hotelrow['hotel_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No HOTELS found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="category">Category:</label>
                                            <select class="form-control category" name="category_name[]" id="category3" data-id="3">
                                                <option value="" selected>Select Category</option>
                                                <?php
                                                $query = "SELECT * FROM hotel_categories";
                                                $result = mysqli_query($conn, $query);
                                                ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($categoryrow = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $categoryrow['prices']; ?>" data-custom-attribute="<?php echo $categoryrow['hc_id']; ?>"><?php echo $categoryrow['category_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No Category found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">Rooms:</label>
                                            <select class="form-control" name="rooms[]" id="room3">
                                                <option value="" selected>Select Rooms</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="nights">Nights:</label>
                                            <select class="form-control" name="nights[]" id="night3">
                                                <option value="" selected>Select Nights</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="adults">Adults:</label>
                                            <select class="form-control" name="ex_adults[]" id="adult3">
                                                <option value="" selected>Select Adults</option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="hotelCheckinDate[]" id="hotelCheckinDate3">
                                        </div>
                                    </div>
                                </div>
                                <div id="formContainer4" class="justify-content-center" style="display: none !important;">
                                    <div class="form-rows-container d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control city" name="hotelcity_name[]" id="city4" data-id="4">
                                                <option value="" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" data-custom-attribute="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Hotel:</label>
                                            <select class="form-control hotel" name="hotels[]" id="hotel4" data-id="4">
                                                <option value="" selected>Select Hotel</option>
                                                <?php
                                                $query = "SELECT * FROM hotels";
                                                $result = mysqli_query($conn, $query);
                                                ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($hotelrow = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $hotelrow['hotel_id']; ?>" data-custom-attribute="<?php echo $hotelrow['hotel_name']; ?>"><?php echo $hotelrow['hotel_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No HOTELS found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="category">Category:</label>
                                            <select class="form-control category" name="category_name[]" id="category4" data-id="4">
                                                <option value="" selected>Select Category</option>
                                                <?php
                                                $query = "SELECT * FROM hotel_categories";
                                                $result = mysqli_query($conn, $query);
                                                ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($categoryrow = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $categoryrow['prices']; ?>" data-custom-attribute="<?php echo $categoryrow['hc_id']; ?>"><?php echo $categoryrow['category_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No Category found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">Rooms:</label>
                                            <select class="form-control" name="rooms[]" id="room4">
                                                <option value="" selected>Select Rooms</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="nights">Nights:</label>
                                            <select class="form-control" name="nights[]" id="night4">
                                                <option value="" selected>Select Nights</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="adults">Adults:</label>
                                            <select class="form-control" name="ex_adults[]" id="adult4">
                                                <option value="" selected>Select Adults</option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="hotelCheckinDate[]" id="hotelCheckinDate4">
                                        </div>
                                    </div>
                                </div>
                                <div id="formContainer5" class="justify-content-center" style="display: none !important;">
                                    <div class="form-rows-container d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control  city" name="hotelcity_name[]" id="city5" data-id="5">
                                                <option value="" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" data-custom-attribute="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Hotel:</label>
                                            <select class="form-control hotel" name="hotels[]" id="hotel5" data-id="5">
                                                <option value="" selected>Select Hotel</option>
                                                <?php
                                                $query = "SELECT * FROM hotels";
                                                $result = mysqli_query($conn, $query);
                                                ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($hotelrow = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $hotelrow['hotel_id']; ?>" data-custom-attribute="<?php echo $hotelrow['hotel_name']; ?>"><?php echo $hotelrow['hotel_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No HOTELS found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="category">Category:</label>
                                            <select class="form-control category" name="category_name[]" id="category5" data-id="5">
                                                <option value="" selected>Select Category</option>
                                                <?php
                                                $query = "SELECT * FROM hotel_categories";
                                                $result = mysqli_query($conn, $query);
                                                ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($categoryrow = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $categoryrow['prices']; ?>" data-custom-attribute="<?php echo $categoryrow['hc_id']; ?>"><?php echo $categoryrow['category_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No Category found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">Rooms:</label>
                                            <select class="form-control" name="rooms[]" id="room5">
                                                <option value="" selected>Select Rooms</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="nights">Nights:</label>
                                            <select class="form-control" name="nights[]" id="night5">
                                                <option value="" selected>Select Nights</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="adults">Adults:</label>
                                            <select class="form-control" name="ex_adults[]" id="adult5">
                                                <option value="" selected>Select Adults</option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="hotelCheckinDate[]" id="hotelCheckinDate5">
                                        </div>
                                    </div>
                                </div>
                                <div id="formContainer6" class="justify-content-center" style="display: none !important;">
                                    <div class="form-rows-container d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control  city" name="hotelcity_name[]" id="city6" data-id="6">
                                                <option value="" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" data-custom-attribute="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Hotel:</label>
                                            <select class="form-control hotel" name="hotels[]" id="hotel6" data-id="6">
                                                <option value="" selected>Select Hotel</option>
                                                <?php
                                                $query = "SELECT * FROM hotels";
                                                $result = mysqli_query($conn, $query);
                                                ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($hotelrow = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $hotelrow['hotel_id']; ?>" data-custom-attribute="<?php echo $hotelrow['hotel_name']; ?>"><?php echo $hotelrow['hotel_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No HOTELS found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="category">Category:</label>
                                            <select class="form-control category" name="category_name[]" id="category6" data-id="6">
                                                <option value="" selected>Select Category</option>
                                                <?php
                                                $query = "SELECT * FROM hotel_categories";
                                                $result = mysqli_query($conn, $query);
                                                ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($categoryrow = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $categoryrow['prices']; ?>" data-custom-attribute="<?php echo $categoryrow['hc_id']; ?>"><?php echo $categoryrow['category_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No Category found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">Rooms:</label>
                                            <select class="form-control" name="rooms[]" id="room6">
                                                <option value="" selected>Select Rooms</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="nights">Nights:</label>
                                            <select class="form-control" name="nights[]" id="night6">
                                                <option value="" selected>Select Nights</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="adults">Adults:</label>
                                            <select class="form-control" name="ex_adults[]" id="adult6">
                                                <option value="" selected>Select Adults</option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="hotelCheckinDate[]" id="hotelCheckinDate6">
                                        </div>
                                    </div>
                                </div>
                                <div id="formContainer7" class="justify-content-center" style="display: none !important;">
                                    <div class="form-rows-container d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control  city" name="hotelcity_name[]" id="city7" data-id="7">
                                                <option value="" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" data-custom-attribute="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Hotel:</label>
                                            <select class="form-control hotel" name="hotels[]" id="hotel7" data-id="7">
                                                <option value="" selected>Select Hotel</option>
                                                <?php
                                                $query = "SELECT * FROM hotels";
                                                $result = mysqli_query($conn, $query);
                                                ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($hotelrow = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $hotelrow['hotel_id']; ?>" data-custom-attribute="<?php echo $hotelrow['hotel_name']; ?>"><?php echo $hotelrow['hotel_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No HOTELS found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="category">Category:</label>
                                            <select class="form-control category" name="category_name[]" id="category7" data-id="7">
                                                <option value="" selected>Select Category</option>
                                                <?php
                                                $query = "SELECT * FROM hotel_categories";
                                                $result = mysqli_query($conn, $query);
                                                ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($categoryrow = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $categoryrow['prices']; ?>" data-custom-attribute="<?php echo $categoryrow['hc_id']; ?>"><?php echo $categoryrow['category_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No Category found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">Rooms:</label>
                                            <select class="form-control" name="rooms[]" id="room7">
                                                <option value="" selected>Select Rooms</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="nights">Nights:</label>
                                            <select class="form-control" name="nights[]" id="night7">
                                                <option value="" selected>Select Nights</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="adults">Adults:</label>
                                            <select class="form-control" name="ex_adults[]" id="adult7">
                                                <option value="" selected>Select Adults</option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="hotelCheckinDate[]" id="hotelCheckinDate7">
                                        </div>
                                    </div>
                                </div>
                                <div id="formContainer8" class="justify-content-center" style="display: none !important;">
                                    <div class="form-rows-container d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control  city" name="hotelcity_name[]" id="city8" data-id="8">
                                                <option value="" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" data-custom-attribute="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Hotel:</label>
                                            <select class="form-control hotel" name="hotels[]" id="hotel8" data-id="8">
                                                <option value="" selected>Select Hotel</option>
                                                <?php
                                                $query = "SELECT * FROM hotels";
                                                $result = mysqli_query($conn, $query);
                                                ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($hotelrow = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $hotelrow['hotel_id']; ?>" data-custom-attribute="<?php echo $hotelrow['hotel_name']; ?>"><?php echo $hotelrow['hotel_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No HOTELS found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="category">Category:</label>
                                            <select class="form-control category" name="category_name[]" id="category8" data-id="8">
                                                <option value="" selected>Select Category</option>
                                                <?php
                                                $query = "SELECT * FROM hotel_categories";
                                                $result = mysqli_query($conn, $query);
                                                ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($categoryrow = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $categoryrow['prices']; ?>" data-custom-attribute="<?php echo $categoryrow['hc_id']; ?>"><?php echo $categoryrow['category_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No Category found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">Rooms:</label>
                                            <select class="form-control" name="rooms[]" id="room8">
                                                <option value="" selected>Select Rooms</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="nights">Nights:</label>
                                            <select class="form-control" name="nights[]" id="night8">
                                                <option value="" selected>Select Nights</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="adults">Adults:</label>
                                            <select class="form-control" name="ex_adults[]" id="adult8">
                                                <option value="" selected>Select Adults</option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="hotelCheckinDate[]" id="hotelCheckinDate8">
                                        </div>
                                    </div>
                                </div>
                                <div id="formContainer9" class="justify-content-center" style="display: none !important;">
                                    <div class="form-rows-container d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control  city" name="hotelcity_name[]" id="city9" data-id="9">
                                                <option value="" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" data-custom-attribute="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Hotel:</label>
                                            <select class="form-control hotel" name="hotels[]" id="hotel9" data-id="9">
                                                <option value="" selected>Select Hotel</option>
                                                <?php
                                                $query = "SELECT * FROM hotels";
                                                $result = mysqli_query($conn, $query);
                                                ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($hotelrow = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $hotelrow['hotel_id']; ?>" data-custom-attribute="<?php echo $hotelrow['hotel_name']; ?>"><?php echo $hotelrow['hotel_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No HOTELS found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="category">Category:</label>
                                            <select class="form-control category" name="category_name[]" id="category9" data-id="9">
                                                <option value="" selected>Select Category</option>
                                                <?php
                                                $query = "SELECT * FROM hotel_categories";
                                                $result = mysqli_query($conn, $query);
                                                ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($categoryrow = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $categoryrow['prices']; ?>" data-custom-attribute="<?php echo $categoryrow['hc_id']; ?>"><?php echo $categoryrow['category_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No Category found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">Rooms:</label>
                                            <select class="form-control" name="rooms[]" id="room9">
                                                <option value="" selected>Select Rooms</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="nights">Nights:</label>
                                            <select class="form-control" name="nights[]" id="night9">
                                                <option value="" selected>Select Nights</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="adults">Adults:</label>
                                            <select class="form-control" name="ex_adults[]" id="adult9">
                                                <option value="" selected>Select Adults</option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="hotelCheckinDate[]" id="hotelCheckinDate9">
                                        </div>
                                    </div>
                                </div>
                                <div id="formContainer10" class="justify-content-center" style="display: none !important;">
                                    <div class="form-rows-container d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control  city" name="hotelcity_name[]" id="city10" data-id="10">
                                                <option value="" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" data-custom-attribute="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Hotel:</label>
                                            <select class="form-control hotel" name="hotels[]" id="hotel10" data-id="10">
                                                <option value="" selected>Select Hotel</option>
                                                <?php
                                                $query = "SELECT * FROM hotels";
                                                $result = mysqli_query($conn, $query);
                                                ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($hotelrow = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $hotelrow['hotel_id']; ?>" data-custom-attribute="<?php echo $hotelrow['hotel_name']; ?>"><?php echo $hotelrow['hotel_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No HOTELS found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="category">Category:</label>
                                            <select class="form-control category" name="category_name[]" id="category10" data-id="10">
                                                <option value="" selected>Select Category</option>
                                                <?php
                                                $query = "SELECT * FROM hotel_categories";
                                                $result = mysqli_query($conn, $query);
                                                ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($categoryrow = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $categoryrow['prices']; ?>" data-custom-attribute="<?php echo $categoryrow['hc_id']; ?>"><?php echo $categoryrow['category_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No Category found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">Rooms:</label>
                                            <select class="form-control" name="rooms[]" id="room10">
                                                <option value="" selected>Select Rooms</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="nights">Nights:</label>
                                            <select class="form-control" name="nights[]" id="night10">
                                                <option value="" selected>Select Nights</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="adults">Adults:</label>
                                            <select class="form-control" name="ex_adults[]" id="adult10">
                                                <option value="" selected>Select Adults</option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="hotelCheckinDate[]" id="hotelCheckinDate10">
                                        </div>
                                    </div>
                                </div>
                                <div id="formContainer11" class="justify-content-center" style="display: none !important;">
                                    <div class="form-rows-container d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control  city" name="hotelcity_name[]" id="city11" data-id="11">
                                                <option value="" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" data-custom-attribute="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Hotel:</label>
                                            <select class="form-control hotel" name="hotels[]" id="hotel11" data-id="11">
                                                <option value="" selected>Select Hotel</option>
                                                <?php
                                                $query = "SELECT * FROM hotels";
                                                $result = mysqli_query($conn, $query);
                                                ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($hotelrow = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $hotelrow['hotel_id']; ?>" data-custom-attribute="<?php echo $hotelrow['hotel_name']; ?>"><?php echo $hotelrow['hotel_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No HOTELS found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="category">Category:</label>
                                            <select class="form-control category" name="category_name[]" id="category11" data-id="11">
                                                <option value="" selected>Select Category</option>
                                                <?php
                                                $query = "SELECT * FROM hotel_categories";
                                                $result = mysqli_query($conn, $query);
                                                ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($categoryrow = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $categoryrow['prices']; ?>" data-custom-attribute="<?php echo $categoryrow['hc_id']; ?>"><?php echo $categoryrow['category_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No Category found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">Rooms:</label>
                                            <select class="form-control" name="rooms[]" id="room11">
                                                <option value="" selected>Select Rooms</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="nights">Nights:</label>
                                            <select class="form-control" name="nights[]" id="night11">
                                                <option value="" selected>Select Nights</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="adults">Adults:</label>
                                            <select class="form-control" name="ex_adults[]" id="adult11">
                                                <option value="" selected>Select Adults</option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="hotelCheckinDate[]" id="hotelCheckinDate11">
                                        </div>
                                    </div>
                                </div>
                                <div id="formContainer12" class="justify-content-center" style="display: none !important;">
                                    <div class="form-rows-container d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control  city" name="hotelcity_name[]" id="city12" data-id="12">
                                                <option value="" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" data-custom-attribute="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Hotel:</label>
                                            <select class="form-control hotel" name="hotels[]" id="hotel12" data-id="12">
                                                <option value="" selected>Select Hotel</option>
                                                <?php
                                                $query = "SELECT * FROM hotels";
                                                $result = mysqli_query($conn, $query);
                                                ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($hotelrow = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $hotelrow['hotel_id']; ?>" data-custom-attribute="<?php echo $hotelrow['hotel_name']; ?>"><?php echo $hotelrow['hotel_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No HOTELS found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="category">Category:</label>
                                            <select class="form-control category" name="category_name[]" id="category12" data-id="12">
                                                <option value="" selected>Select Category</option>
                                                <?php
                                                $query = "SELECT * FROM hotel_categories";
                                                $result = mysqli_query($conn, $query);
                                                ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($categoryrow = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $categoryrow['prices']; ?>" data-custom-attribute="<?php echo $categoryrow['hc_id']; ?>"><?php echo $categoryrow['category_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No Category found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">Rooms:</label>
                                            <select class="form-control" name="rooms[]" id="room12">
                                                <option value="" selected>Select Rooms</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="nights">Nights:</label>
                                            <select class="form-control" name="nights[]" id="night12">
                                                <option value="" selected>Select Nights</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="adults">Adults:</label>
                                            <select class="form-control" name="ex_adults[]" id="adult12">
                                                <option value="" selected>Select Adults</option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="hotelCheckinDate[]" id="hotelCheckinDate12">
                                        </div>
                                    </div>
                                </div>
                                <div id="formContainer13" class="justify-content-center" style="display: none !important;">
                                    <div class="form-rows-container d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control  city" name="hotelcity_name[]" id="city13" data-id="13">
                                                <option value="" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" data-custom-attribute="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Hotel:</label>
                                            <select class="form-control hotel" name="hotels[]" id="hotel13" data-id="13">
                                                <option value="" selected>Select Hotel</option>
                                                <?php
                                                $query = "SELECT * FROM hotels";
                                                $result = mysqli_query($conn, $query);
                                                ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($hotelrow = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $hotelrow['hotel_id']; ?>" data-custom-attribute="<?php echo $hotelrow['hotel_name']; ?>"><?php echo $hotelrow['hotel_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No HOTELS found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="category">Category:</label>
                                            <select class="form-control category" name="category_name[]" id="category13" data-id="13">
                                                <option value="" selected>Select Category</option>
                                                <?php
                                                $query = "SELECT * FROM hotel_categories";
                                                $result = mysqli_query($conn, $query);
                                                ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($categoryrow = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $categoryrow['prices']; ?>" data-custom-attribute="<?php echo $categoryrow['hc_id']; ?>"><?php echo $categoryrow['category_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No Category found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">Rooms:</label>
                                            <select class="form-control" name="rooms[]" id="room13">
                                                <option value="" selected>Select Rooms</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="nights">Nights:</label>
                                            <select class="form-control" name="nights[]" id="night13">
                                                <option value="" selected>Select Nights</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="adults">Adults:</label>
                                            <select class="form-control" name="ex_adults[]" id="adult13">
                                                <option value="" selected>Select Adults</option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="hotelCheckinDate[]" id="hotelCheckinDate13">
                                        </div>
                                    </div>
                                </div>
                                <div id="formContainer14" class="justify-content-center" style="display: none !important;">
                                    <div class="form-rows-container d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control  city" name="hotelcity_name[]" id="city14" data-id="14">
                                                <option value="" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" data-custom-attribute="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Hotel:</label>
                                            <select class="form-control hotel" name="hotels[]" id="hotel14" data-id="14">
                                                <option value="" selected>Select Hotel</option>
                                                <?php
                                                $query = "SELECT * FROM hotels";
                                                $result = mysqli_query($conn, $query);
                                                ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($hotelrow = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $hotelrow['hotel_id']; ?>" data-custom-attribute="<?php echo $hotelrow['hotel_name']; ?>"><?php echo $hotelrow['hotel_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No HOTELS found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="category">Category:</label>
                                            <select class="form-control category" name="category_name[]" id="category14" data-id="14">
                                                <option value="" selected>Select Category</option>
                                                <?php
                                                $query = "SELECT * FROM hotel_categories";
                                                $result = mysqli_query($conn, $query);
                                                ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($categoryrow = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $categoryrow['prices']; ?>" data-custom-attribute="<?php echo $categoryrow['hc_id']; ?>"><?php echo $categoryrow['category_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No Category found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">Rooms:</label>
                                            <select class="form-control" name="rooms[]" id="room14">
                                                <option value="" selected>Select Rooms</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="nights">Nights:</label>
                                            <select class="form-control" name="nights[]" id="night14">
                                                <option value="" selected>Select Nights</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="adults">Adults:</label>
                                            <select class="form-control" name="ex_adults[]" id="adult14">
                                                <option value="" selected>Select Adults</option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="hotelCheckinDate[]" id="hotelCheckinDate14">
                                        </div>
                                    </div>
                                </div>
                                <div id="formContainer15" class="justify-content-center" style="display: none !important;">
                                    <div class="form-rows-container d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control  city" name="hotelcity_name[]" id="city15" data-id="15">
                                                <option value="" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" data-custom-attribute="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Hotel:</label>
                                            <select class="form-control hotel" name="hotels[]" id="hotel15" data-id="15">
                                                <option value="" selected>Select Hotel</option>
                                                <?php
                                                $query = "SELECT * FROM hotels";
                                                $result = mysqli_query($conn, $query);
                                                ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($hotelrow = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $hotelrow['hotel_id']; ?>" data-custom-attribute="<?php echo $hotelrow['hotel_name']; ?>"><?php echo $hotelrow['hotel_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No HOTELS found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="category">Category:</label>
                                            <select class="form-control category" name="category_name[]" id="category15" data-id="15">
                                                <option value="" selected>Select Category</option>
                                                <?php
                                                $query = "SELECT * FROM hotel_categories";
                                                $result = mysqli_query($conn, $query);
                                                ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($categoryrow = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $categoryrow['prices']; ?>" data-custom-attribute="<?php echo $categoryrow['hc_id']; ?>"><?php echo $categoryrow['category_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No Category found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">Rooms:</label>
                                            <select class="form-control" name="rooms[]" id="room15">
                                                <option value="" selected>Select Rooms</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="nights">Nights:</label>
                                            <select class="form-control" name="nights[]" id="night15">
                                                <option value="" selected>Select Nights</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="adults">Adults:</label>
                                            <select class="form-control" name="ex_adults[]" id="adult15">
                                                <option value="" selected>Select Adults</option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="hotelCheckinDate[]" id="hotelCheckinDate15">
                                        </div>
                                    </div>
                                </div>

                                <!-- <button type="button" id="addButton" class="btn btn-primary">Add</button> -->
                                <button type="button" id="addButtonmain" class="btn btn-primary">Add</button>
                                <button type="button" id="removeButton" class="btn btn-danger" style="display:none;">Remove</button>
                                <!-- city transport -->
                                <div id="cityformContainer1" class="d-flex justify-content-center">
                                    <div class="form-rows-container-1 d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control transcity" name="transport_city[]" id="transcity1" data-id="1">
                                                <option value="disabled" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" data-custom-category1="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Transport:</label>
                                            <select class="form-control transport transport" name="transport[]" id="transport1" data-id="1">
                                                <option value="" selected>Select Transport</option>
                                                <?php
                                            $query = "SELECT * FROM transport";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['trans_id']; ?>" data-custom-category1="<?php echo $row['transport_name']; ?>"><?php echo $row['transport_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">No of Persion:</label>
                                            <select class="form-control" name="trans_pax[]" id="transCategory1" data-id="1">
                                                <option value="" selected>Select Persion</option>
                                                <?php
                                            $query = "SELECT * FROM transport_category";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['prices']; ?>" data-custom-category1="<?php echo $row['transport_category']; ?>"><?php echo $row['transport_category']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No Pax found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="transCheckinDate[]" id="transCheckinDate1">
                                        </div>

                                    </div>
                                </div>
                                <div id="cityformContainer2" class="justify-content-center" style="display: none !important;">
                                    <div class="form-rows-container-1 d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control transcity" name="transport_city[]" id="transcity2" data-id="2">
                                                <option value="disabled" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" data-custom-category1="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Transport:</label>
                                            <select class="form-control transport transport" name="transport[]" id="transport2" data-id="2">
                                                <option value="" selected>Select Transport</option>
                                                <?php
                                            $query = "SELECT * FROM transport";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['trans_id']; ?>" data-custom-category1="<?php echo $row['transport_name']; ?>"><?php echo $row['transport_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">No of Persion:</label>
                                            <select class="form-control" name="trans_pax[]" id="transCategory2" data-id="2">
                                                <option value="" selected>Select Persion</option>
                                                <?php
                                            $query = "SELECT * FROM transport_category";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['prices']; ?>" data-custom-category1="<?php echo $row['transport_category']; ?>"><?php echo $row['transport_category']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No Pax found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="transCheckinDate[]" id="transCheckinDate2">
                                        </div>

                                    </div>
                                </div>
                                <div id="cityformContainer3" class="justify-content-center" style="display: none !important;">
                                    <div class="form-rows-container-1 d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control transcity" name="transport_city[]" id="transcity3" data-id="3">
                                                <option value="disabled" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" data-custom-category1="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Transport:</label>
                                            <select class="form-control transport transport" name="transport[]" id="transport3" data-id="3">
                                                <option value="" selected>Select Transport</option>
                                                <?php
                                            $query = "SELECT * FROM transport";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['trans_id']; ?>" data-custom-category1="<?php echo $row['transport_name']; ?>"><?php echo $row['transport_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">No of Persion:</label>
                                            <select class="form-control" name="trans_pax[]" id="transCategory3" data-id="3">
                                                <option value="" selected>Select Persion</option>
                                                <?php
                                            $query = "SELECT * FROM transport_category";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['prices']; ?>" data-custom-category1="<?php echo $row['transport_category']; ?>"><?php echo $row['transport_category']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No Pax found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="transCheckinDate[]" id="transCheckinDate3">
                                        </div>

                                    </div>
                                </div>
                                <div id="cityformContainer4" class="justify-content-center" style="display: none !important;">
                                    <div class="form-rows-container-1 d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control transcity" name="transport_city[]" id="transcity4" data-id="4">
                                                <option value="disabled" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" data-custom-category1="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Transport:</label>
                                            <select class="form-control transport" name="transport[]" id="transport4" data-id="4">
                                                <option value="" selected>Select Transport</option>
                                                <?php
                                            $query = "SELECT * FROM transport";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['trans_id']; ?>" data-custom-category1="<?php echo $row['transport_name']; ?>"><?php echo $row['transport_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">No of Persion:</label>
                                            <select class="form-control" name="trans_pax[]" id="transCategory4" data-id="4">
                                                <option value="" selected>Select Persion</option>
                                                <?php
                                            $query = "SELECT * FROM transport_category";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['prices']; ?>" data-custom-category1="<?php echo $row['transport_category']; ?>"><?php echo $row['transport_category']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No Pax found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="transCheckinDate[]" id="transCheckinDate4">
                                        </div>

                                    </div>
                                </div>
                                <div id="cityformContainer5" class="justify-content-center" style="display: none !important;">
                                    <div class="form-rows-container-1 d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control transcity" name="transport_city[]" id="transcity5" data-id="5">
                                                <option value="disabled" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" data-custom-category1="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Transport:</label>
                                            <select class="form-control transport" name="transport[]" id="transport5" data-id="5">
                                                <option value="" selected>Select Transport</option>
                                                <?php
                                            $query = "SELECT * FROM transport";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['trans_id']; ?>" data-custom-category1="<?php echo $row['transport_name']; ?>"><?php echo $row['transport_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">No of Persion:</label>
                                            <select class="form-control" name="trans_pax[]" id="transCategory5" data-id="5">
                                                <option value="" selected>Select Persion</option>
                                                <?php
                                            $query = "SELECT * FROM transport_category";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['prices']; ?>" data-custom-category1="<?php echo $row['transport_category']; ?>"><?php echo $row['transport_category']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No Pax found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="transCheckinDate[]" id="transCheckinDate5">
                                        </div>

                                    </div>
                                </div>
                                <div id="cityformContainer6" class="justify-content-center" style="display: none !important;">
                                    <div class="form-rows-container-1 d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control transcity" name="transport_city[]" id="transcity6" data-id="6">
                                                <option value="disabled" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" data-custom-category1="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Transport:</label>
                                            <select class="form-control transport" name="transport[]" id="transport6" data-id="6">
                                                <option value="" selected>Select Transport</option>
                                                <?php
                                            $query = "SELECT * FROM transport";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['trans_id']; ?>" data-custom-category1="<?php echo $row['transport_name']; ?>"><?php echo $row['transport_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">No of Persion:</label>
                                            <select class="form-control" name="trans_pax[]" id="transCategory6" data-id="6">
                                                <option value="" selected>Select Persion</option>
                                                <?php
                                            $query = "SELECT * FROM transport_category";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['prices']; ?>" data-custom-category1="<?php echo $row['transport_category']; ?>"><?php echo $row['transport_category']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No Pax found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="transCheckinDate[]" id="transCheckinDate6">
                                        </div>

                                    </div>
                                </div>
                                <div id="cityformContainer7" class="justify-content-center" style="display: none !important;">
                                    <div class="form-rows-container-1 d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control transcity" name="transport_city[]" id="transcity7" data-id="7">
                                                <option value="disabled" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" data-custom-category1="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Transport:</label>
                                            <select class="form-control transport" name="transport[]" id="transport7" data-id="7">
                                                <option value="" selected>Select Transport</option>
                                                <?php
                                            $query = "SELECT * FROM transport";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['trans_id']; ?>" data-custom-category1="<?php echo $row['transport_name']; ?>"><?php echo $row['transport_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">No of Persion:</label>
                                            <select class="form-control" name="trans_pax[]" id="transCategory7" data-id="7">
                                                <option value="" selected>Select Persion</option>
                                                <?php
                                            $query = "SELECT * FROM transport_category";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['prices']; ?>" data-custom-category1="<?php echo $row['transport_category']; ?>"><?php echo $row['transport_category']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No Pax found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="transCheckinDate[]" id="transCheckinDate7">
                                        </div>

                                    </div>
                                </div>
                                <div id="cityformContainer8" class="justify-content-center" style="display: none !important;">
                                    <div class="form-rows-container-1 d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control transcity" name="transport_city[]" id="transcity8" data-id="8">
                                                <option value="disabled" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" data-custom-category1="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Transport:</label>
                                            <select class="form-control transport" name="transport[]" id="transport8" data-id="8">
                                                <option value="" selected>Select Transport</option>
                                                <?php
                                            $query = "SELECT * FROM transport";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['trans_id']; ?>" data-custom-category1="<?php echo $row['transport_name']; ?>"><?php echo $row['transport_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">No of Persion:</label>
                                            <select class="form-control" name="trans_pax[]" id="transCategory8" data-id="8">
                                                <option value="" selected>Select Persion</option>
                                                <?php
                                            $query = "SELECT * FROM transport_category";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['prices']; ?>" data-custom-category1="<?php echo $row['transport_category']; ?>"><?php echo $row['transport_category']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No Pax found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="transCheckinDate[]" id="transCheckinDate8">
                                        </div>

                                    </div>
                                </div>
                                <div id="cityformContainer9" class="justify-content-center" style="display: none !important;">
                                    <div class="form-rows-container-1 d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control transcity" name="transport_city[]" id="transcity9" data-id="9">
                                                <option value="disabled" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" data-custom-category1="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Transport:</label>
                                            <select class="form-control transport" name="transport[]" id="transport9" data-id="9">
                                                <option value="" selected>Select Transport</option>
                                                <?php
                                            $query = "SELECT * FROM transport";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['trans_id']; ?>" data-custom-category1="<?php echo $row['transport_name']; ?>"><?php echo $row['transport_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">No of Persion:</label>
                                            <select class="form-control" name="trans_pax[]" id="transCategory9" data-id="9">
                                                <option value="" selected>Select Persion</option>
                                                <?php
                                            $query = "SELECT * FROM transport_category";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['prices']; ?>" data-custom-category1="<?php echo $row['transport_category']; ?>"><?php echo $row['transport_category']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No Pax found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="transCheckinDate[]" id="transCheckinDate9">
                                        </div>

                                    </div>
                                </div>
                                <div id="cityformContainer10" class="justify-content-center" style="display: none !important;">
                                    <div class="form-rows-container-1 d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control transcity" name="transport_city[]" id="transcity10" data-id="10">
                                                <option value="disabled" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" data-custom-category1="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Transport:</label>
                                            <select class="form-control transport" name="transport[]" id="transport10" data-id="10">
                                                <option value="" selected>Select Transport</option>
                                                <?php
                                            $query = "SELECT * FROM transport";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['trans_id']; ?>" data-custom-category1="<?php echo $row['transport_name']; ?>"><?php echo $row['transport_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">No of Persion:</label>
                                            <select class="form-control" name="trans_pax[]" id="transCategory10" data-id="10">
                                                <option value="" selected>Select Persion</option>
                                                <?php
                                            $query = "SELECT * FROM transport_category";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['prices']; ?>" data-custom-category1="<?php echo $row['transport_category']; ?>"><?php echo $row['transport_category']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No Pax found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="transCheckinDate[]" id="transCheckinDate10">
                                        </div>

                                    </div>
                                </div>
                                <div id="cityformContainer11" class="justify-content-center" style="display: none !important;">
                                    <div class="form-rows-container-1 d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control transcity" name="transport_city[]" id="transcity11" data-id="11">
                                                <option value="disabled" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" data-custom-category1="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Transport:</label>
                                            <select class="form-control transport" name="transport[]" id="transport11" data-id="11">
                                                <option value="" selected>Select Transport</option>
                                                <?php
                                            $query = "SELECT * FROM transport";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['trans_id']; ?>" data-custom-category1="<?php echo $row['transport_name']; ?>"><?php echo $row['transport_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">No of Persion:</label>
                                            <select class="form-control" name="trans_pax[]" id="transCategory11" data-id="11">
                                                <option value="" selected>Select Persion</option>
                                                <?php
                                            $query = "SELECT * FROM transport_category";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['prices']; ?>" data-custom-category1="<?php echo $row['transport_category']; ?>"><?php echo $row['transport_category']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No Pax found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="transCheckinDate[]" id="transCheckinDate11">
                                        </div>

                                    </div>
                                </div>
                                <div id="cityformContainer12" class="justify-content-center" style="display: none !important;">
                                    <div class="form-rows-container-1 d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control transcity" name="transport_city[]" id="transcity12" data-id="12">
                                                <option value="disabled" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" data-custom-category1="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Transport:</label>
                                            <select class="form-control transport" name="transport[]" id="transport12" data-id="12">
                                                <option value="" selected>Select Transport</option>
                                                <?php
                                                $query = "SELECT * FROM transport";
                                                $result = mysqli_query($conn, $query);
                                                ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['trans_id']; ?>" data-custom-category1="<?php echo $row['transport_name']; ?>"><?php echo $row['transport_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">No of Persion:</label>
                                            <select class="form-control" name="trans_pax[]" id="transCategory12" data-id="12">
                                                <option value="" selected>Select Persion</option>
                                                <?php
                                            $query = "SELECT * FROM transport_category";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['prices']; ?>" data-custom-category1="<?php echo $row['transport_category']; ?>"><?php echo $row['transport_category']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No Pax found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="transCheckinDate[]" id="transCheckinDate12">
                                        </div>

                                    </div>
                                </div>
                                <div id="cityformContainer13" class="justify-content-center" style="display: none !important;">
                                    <div class="form-rows-container-1 d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control transcity" name="transport_city[]" id="transcity13" data-id="13">
                                                <option value="disabled" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" data-custom-category1="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Transport:</label>
                                            <select class="form-control transport" name="transport[]" id="transport13" data-id="13">
                                                <option value="" selected>Select Transport</option>
                                                <?php
                                            $query = "SELECT * FROM transport";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['trans_id']; ?>" data-custom-category1="<?php echo $row['transport_name']; ?>"><?php echo $row['transport_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">No of Persion:</label>
                                            <select class="form-control" name="trans_pax[]" id="transCategory13" data-id="13">
                                                <option value="" selected>Select Persion</option>
                                                <?php
                                            $query = "SELECT * FROM transport_category";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['prices']; ?>" data-custom-category1="<?php echo $row['transport_category']; ?>"><?php echo $row['transport_category']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No Pax found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="transCheckinDate[]" id="transCheckinDate13">
                                        </div>

                                    </div>
                                </div>
                                <div id="cityformContainer14" class="justify-content-center" style="display: none !important;">
                                    <div class="form-rows-container-1 d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control transcity" name="transport_city[]" id="transcity14" data-id="14">
                                                <option value="disabled" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" data-custom-category1="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Transport:</label>
                                            <select class="form-control transport" name="transport[]" id="transport14" data-id="14">
                                                <option value="" selected>Select Transport</option>
                                                <?php
                                            $query = "SELECT * FROM transport";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['trans_id']; ?>" data-custom-category1="<?php echo $row['transport_name']; ?>"><?php echo $row['transport_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">No of Persion:</label>
                                            <select class="form-control" name="trans_pax[]" id="transCategory14" data-id="14">
                                                <option value="" selected>Select Persion</option>
                                                <?php
                                            $query = "SELECT * FROM transport_category";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['prices']; ?>" data-custom-category1="<?php echo $row['transport_category']; ?>"><?php echo $row['transport_category']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No Pax found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="transCheckinDate[]" id="transCheckinDate14">
                                        </div>

                                    </div>
                                </div>
                                <div id="cityformContainer15" class="justify-content-center" style="display: none !important;">
                                    <div class="form-rows-container-1 d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control transcity" name="transport_city[]" id="transcity15" data-id="15">
                                                <option value="disabled" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" data-custom-category1="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Transport:</label>
                                            <select class="form-control transport" name="transport[]" id="transport15" data-id="15">
                                                <option value="" selected>Select Transport</option>
                                                <?php
                                            $query = "SELECT * FROM transport";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['trans_id']; ?>" data-custom-category1="<?php echo $row['transport_name']; ?>"><?php echo $row['transport_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">No of Persion:</label>
                                            <select class="form-control" name="trans_pax[]" id="transCategory15" data-id="15">
                                                <option value="" selected>Select Persion</option>
                                                <?php
                                            $query = "SELECT * FROM transport_category";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['prices']; ?>" data-custom-category1="<?php echo $row['transport_category']; ?>"><?php echo $row['transport_category']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No Pax found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="transCheckinDate[]" id="transCheckinDate15">
                                        </div>

                                    </div>
                                </div>
                                <button type="button" id="transportaddButton" class="btn btn-primary">Add</button>
                                <button type="button" id="transportremoveButton" class="btn btn-danger" style="display:none;">Remove</button>
                                <!-- end transport -->
                                <div id="SightformContainer1" class="d-flex justify-content-center">
                                    <div class="form-rows-container-2 d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control sightcity" name="sight_city[]" id="sightcity1" data-id="1">
                                                <option value="disabled" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" custom-data-item="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Sightseeing:</label>
                                            <select class="form-control" name="sightseeing[]" id="sightseeing1" data-id="1">
                                                <option value="" selected>Select Sightseeing</option>
                                                <?php
                                            $query = "SELECT * FROM sightseeing";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['prices']; ?>" custom-data-item="<?php echo $row['sight_name']; ?>"><?php echo $row['sight_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">No of Persion:</label>
                                            <select class="form-control" name="sight_persion[]" id="sightPersion1">
                                                <option value="" selected>Select Persion</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="sightCheckinDate[]" id="sightCheckinDate1">
                                        </div>
                                    </div>
                                </div>
                                <div id="SightformContainer2" class="justify-content-center" style="display: none !important;">
                                    <div class="form-rows-container-2 d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control sightcity" name="sight_city[]" id="sightcity2" data-id="2">
                                                <option value="disabled" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" custom-data-item="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Sightseeing:</label>
                                            <select class="form-control" name="sightseeing[]" id="sightseeing2" data-id="2">
                                                <option value="" selected>Select Sightseeing</option>
                                                <?php
                                            $query = "SELECT * FROM sightseeing";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['prices']; ?>" custom-data-item="<?php echo $row['sight_name']; ?>"><?php echo $row['sight_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">No of Persion:</label>
                                            <select class="form-control" name="sight_persion[]" id="sightPersion2">
                                                <option value="" selected>Select Persion</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="sightCheckinDate[]" id="sightCheckinDate2">
                                        </div>
                                    </div>
                                </div>
                                <div id="SightformContainer3" class="justify-content-center" style="display: none !important;">
                                    <div class="form-rows-container-2 d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control sightcity" name="sight_city[]" id="sightcity[]" data-id="3">
                                                <option value="disabled" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" custom-data-item="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Sightseeing:</label>
                                            <select class="form-control" name="sightseeing[]" id="sightseeing3" data-id="3">
                                                <option value="" selected>Select Sightseeing</option>
                                                <?php
                                            $query = "SELECT * FROM sightseeing";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['prices']; ?>" custom-data-item="<?php echo $row['sight_name']; ?>"><?php echo $row['sight_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">No of Persion:</label>
                                            <select class="form-control" name="sight_persion[]" id="sightPersion3">
                                                <option value="" selected>Select Persion</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="sightCheckinDate[]" id="sightCheckinDate3">
                                        </div>
                                    </div>
                                </div>
                                <div id="SightformContainer4" class="justify-content-center" style="display: none !important;">
                                    <div class="form-rows-container-2 d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control sightcity" name="sight_city[]" id="sightcity4" data-id="4">
                                                <option value="disabled" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" custom-data-item="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Sightseeing:</label>
                                            <select class="form-control" name="sightseeing[]" id="sightseeing4" data-id="4">
                                                <option value="" selected>Select Sightseeing</option>
                                                <?php
                                            $query = "SELECT * FROM sightseeing";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['prices']; ?>" custom-data-item="<?php echo $row['sight_name']; ?>"><?php echo $row['sight_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">No of Persion:</label>
                                            <select class="form-control" name="sight_persion[]" id="sightPersion4">
                                                <option value="" selected>Select Persion</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="sightCheckinDate[]" id="sightCheckinDate4">
                                        </div>
                                    </div>
                                </div>
                                <div id="SightformContainer5" class="justify-content-center" style="display: none !important;">
                                    <div class="form-rows-container-2 d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control sightcity" name="sight_city[]" id="sightcity5" data-id="5">
                                                <option value="disabled" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" custom-data-item="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Sightseeing:</label>
                                            <select class="form-control" name="sightseeing[]" id="sightseeing5" data-id="5">
                                                <option value="" selected>Select Sightseeing</option>
                                                <?php
                                            $query = "SELECT * FROM sightseeing";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['prices']; ?>" custom-data-item="<?php echo $row['sight_name']; ?>"><?php echo $row['sight_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">No of Persion:</label>
                                            <select class="form-control" name="sight_persion[]" id="sightPersion5">
                                                <option value="" selected>Select Persion</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="sightCheckinDate[]" id="sightCheckinDate5">
                                        </div>
                                    </div>
                                </div>
                                <div id="SightformContainer6" class="justify-content-center" style="display: none !important;">
                                    <div class="form-rows-container-2 d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control sightcity" name="sight_city[]" id="sightcity6" data-id="6">
                                                <option value="disabled" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" custom-data-item="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Sightseeing:</label>
                                            <select class="form-control" name="sightseeing[]" id="sightseeing6" data-id="6">
                                                <option value="" selected>Select Sightseeing</option>
                                                <?php
                                            $query = "SELECT * FROM sightseeing";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['prices']; ?>" custom-data-item="<?php echo $row['sight_name']; ?>"><?php echo $row['sight_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">No of Persion:</label>
                                            <select class="form-control" name="sight_persion[]" id="sightPersion6">
                                                <option value="" selected>Select Persion</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="sightCheckinDate[]" id="sightCheckinDate6">
                                        </div>
                                    </div>
                                </div>
                                <div id="SightformContainer7" class="justify-content-center" style="display: none !important;">
                                    <div class="form-rows-container-2 d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control sightcity" name="sight_city[]" id="sightcity7" data-id="7">
                                                <option value="disabled" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" custom-data-item="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Sightseeing:</label>
                                            <select class="form-control" name="sightseeing[]" id="sightseeing7" data-id="7">
                                                <option value="" selected>Select Sightseeing</option>
                                                <?php
                                            $query = "SELECT * FROM sightseeing";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['prices']; ?>" custom-data-item="<?php echo $row['sight_name']; ?>"><?php echo $row['sight_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">No of Persion:</label>
                                            <select class="form-control" name="sight_persion[]" id="sightPersion7">
                                                <option value="" selected>Select Persion</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="sightCheckinDate[]" id="sightCheckinDate7">
                                        </div>
                                    </div>
                                </div>
                                <div id="SightformContainer8" class="justify-content-center" style="display: none !important;">
                                    <div class="form-rows-container-2 d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control sightcity" name="sight_city[]" id="sightcity8" data-id="8">
                                                <option value="disabled" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" custom-data-item="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Sightseeing:</label>
                                            <select class="form-control" name="sightseeing[]" id="sightseeing8" data-id="8">
                                                <option value="" selected>Select Sightseeing</option>
                                                <?php
                                            $query = "SELECT * FROM sightseeing";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['prices']; ?>" custom-data-item="<?php echo $row['sight_name']; ?>"><?php echo $row['sight_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">No of Persion:</label>
                                            <select class="form-control" name="sight_persion[]" id="sightPersion8">
                                                <option value="" selected>Select Persion</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="sightCheckinDate[]" id="sightCheckinDate8">
                                        </div>
                                    </div>
                                </div>
                                <div id="SightformContainer9" class="justify-content-center" style="display: none !important;">
                                    <div class="form-rows-container-2 d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control sightcity" name="sight_city[]" id="sightcity9" data-id="9">
                                                <option value="disabled" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" custom-data-item="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Sightseeing:</label>
                                            <select class="form-control" name="sightseeing[]" id="sightseeing9" data-id="9">
                                                <option value="" selected>Select Sightseeing</option>
                                                <?php
                                            $query = "SELECT * FROM sightseeing";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['prices']; ?>" custom-data-item="<?php echo $row['sight_name']; ?>"><?php echo $row['sight_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">No of Persion:</label>
                                            <select class="form-control" name="sight_persion[]" id="sightPersion9">
                                                <option value="" selected>Select Persion</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="sightCheckinDate[]" id="sightCheckinDate9">
                                        </div>
                                    </div>
                                </div>
                                <div id="SightformContainer10" class="justify-content-center" style="display: none !important;">
                                    <div class="form-rows-container-2 d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control sightcity" name="sight_city[]" id="sightcity10" data-id="10">
                                                <option value="disabled" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" custom-data-item="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Sightseeing:</label>
                                            <select class="form-control" name="sightseeing[]" id="sightseeing10" data-id="10">
                                                <option value="" selected>Select Sightseeing</option>
                                                <?php
                                            $query = "SELECT * FROM sightseeing";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['prices']; ?>" custom-data-item="<?php echo $row['sight_name']; ?>"><?php echo $row['sight_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">No of Persion:</label>
                                            <select class="form-control" name="sight_persion[]" id="sightPersion10">
                                                <option value="" selected>Select Persion</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="sightCheckinDate[]" id="sightCheckinDate10">
                                        </div>
                                    </div>
                                </div>
                                <div id="SightformContainer11" class="justify-content-center" style="display: none !important;">
                                    <div class="form-rows-container-2 d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control sightcity" name="sight_city[]" id="sightcity11" data-id="11">
                                                <option value="disabled" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" custom-data-item="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Sightseeing:</label>
                                            <select class="form-control" name="sightseeing[]" id="sightseeing11" data-id="11">
                                                <option value="" selected>Select Sightseeing</option>
                                                <?php
                                            $query = "SELECT * FROM sightseeing";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['prices']; ?>" custom-data-item="<?php echo $row['sight_name']; ?>"><?php echo $row['sight_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">No of Persion:</label>
                                            <select class="form-control" name="sight_persion[]" id="sightPersion11">
                                                <option value="" selected>Select Persion</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="sightCheckinDate[]" id="sightCheckinDate11">
                                        </div>
                                    </div>
                                </div>
                                <div id="SightformContainer12" class="justify-content-center" style="display: none !important;">
                                    <div class="form-rows-container-2 d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control sightcity" name="sight_city[]" id="sightcity12" data-id="12">
                                                <option value="disabled" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" custom-data-item="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Sightseeing:</label>
                                            <select class="form-control" name="sightseeing[]" id="sightseeing12" data-id="12">
                                                <option value="" selected>Select Sightseeing</option>
                                                <?php
                                            $query = "SELECT * FROM sightseeing";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['prices']; ?>" custom-data-item="<?php echo $row['sight_name']; ?>"><?php echo $row['sight_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">No of Persion:</label>
                                            <select class="form-control" name="sight_persion[]" id="sightPersion12">
                                                <option value="" selected>Select Persion</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="sightCheckinDate[]" id="sightCheckinDate12">
                                        </div>
                                    </div>
                                </div>
                                <div id="SightformContainer13" class="justify-content-center" style="display: none !important;">
                                    <div class="form-rows-container-2 d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control sightcity" name="sight_city[]" id="sightcity13" data-id="13">
                                                <option value="disabled" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" custom-data-item="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Sightseeing:</label>
                                            <select class="form-control" name="sightseeing[]" id="sightseeing13" data-id="13">
                                                <option value="" selected>Select Sightseeing</option>
                                                <?php
                                            $query = "SELECT * FROM sightseeing";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['prices']; ?>" custom-data-item="<?php echo $row['sight_name']; ?>"><?php echo $row['sight_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">No of Persion:</label>
                                            <select class="form-control" name="sight_persion[]" id="sightPersion13">
                                                <option value="" selected>Select Persion</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="sightCheckinDate[]" id="sightCheckinDate13">
                                        </div>
                                    </div>
                                </div>
                                <div id="SightformContainer14" class="justify-content-center" style="display: none !important;">
                                    <div class="form-rows-container-2 d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control sightcity" name="sight_city[]" id="sightcity14" data-id="14">
                                                <option value="disabled" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" custom-data-item="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Sightseeing:</label>
                                            <select class="form-control" name="sightseeing[]" id="sightseeing14" data-id="14">
                                                <option value="" selected>Select Sightseeing</option>
                                                <?php
                                            $query = "SELECT * FROM sightseeing";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['prices']; ?>" custom-data-item="<?php echo $row['sight_name']; ?>"><?php echo $row['sight_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">No of Persion:</label>
                                            <select class="form-control" name="sight_persion[]" id="sightPersion14">
                                                <option value="" selected>Select Persion</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="sightCheckinDate[]" id="sightCheckinDate14">
                                        </div>
                                    </div>
                                </div>
                                <div id="SightformContainer15" class="justify-content-center" style="display: none !important;">
                                    <div class="form-rows-container-2 d-flex">
                                        <div class="form-row mx-1">
                                            <?php
                                            $query = "SELECT * FROM cities";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                            <label for="city">City:</label>
                                            <select class="form-control sightcity" name="sight_city[]" id="sightcity15" data-id="15">
                                                <option value="disabled" selected>Select City</option>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['city_id']; ?>" custom-data-item="<?php echo $row['city_name']; ?>"><?php echo $row['city_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No cities found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="hotel">Sightseeing:</label>
                                            <select class="form-control" name="sightseeing[]" id="sightseeing15" data-id="15">
                                                <option value="" selected>Select Sightseeing</option>
                                                <?php
                                            $query = "SELECT * FROM sightseeing";
                                            $result = mysqli_query($conn, $query);
                                            ?>
                                                <?php
                                                if ($result && mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                                        <option value="<?php echo $row['prices']; ?>" custom-data-item="<?php echo $row['sight_name']; ?>"><?php echo $row['sight_name']; ?></option>
                                                <?php
                                                    }
                                                } else {
                                                    echo '<option disabled>No found</option>';
                                                }
                                                mysqli_free_result($result);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="rooms">No of Persion:</label>
                                            <select class="form-control" name="sight_persion[]" id="sightPersion15">
                                                <option value="" selected>Select Persion</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                        <div class="form-row mx-1">
                                            <label for="checkinDate">Check-in Date:</label>
                                            <input type="date" class="form-control checkin-date" name="sightCheckinDate[]" id="sightCheckinDate15">
                                        </div>
                                    </div>
                                </div>
                                <button type="button" id="SightaddButton" class="btn btn-primary">Add</button>
                                <button type="button" id="SightremoveButton" class="btn btn-danger" style="display:none;">Remove</button>
                            </div>
                            <?php
                            if(isset($_GET['reff_id'])) {
                                $reff_id = $_GET['reff_id'];
                                $escaped_reff_id = mysqli_real_escape_string($conn, $reff_id);

                                // Query to fetch the hotelcity_name values
                                $sql_data = "SELECT hotelcity_name, hotels, category_name, thailand_hotel_id
                                            FROM thailand_hotel
                                            WHERE reff_id = '$escaped_reff_id'";

                                $result_data = mysqli_query($conn, $sql_data);

                                if ($result_data) {
                                    $rowCount = mysqli_num_rows($result_data);
                                    // Loop through each row and generate JavaScript code to select the corresponding option
                                    for ($i = 1; $i <= $rowCount; $i++) {
                                        $rowData = mysqli_fetch_assoc($result_data);
                                        $hotelcity_name = $rowData['hotelcity_name'];
                                        $hotels = $rowData['hotels'];
                                        $categorydata = $rowData['category_name'];
                                        $th_id = $rowData['thailand_hotel_id']; // Store thailand_hotel_id in a variable
                                        $thailand_hotel_id[$i] = $th_id; // Store thailand_hotel_id in array
                                        echo "<script>";
                                        echo "document.addEventListener('DOMContentLoaded', function() {";
                                        echo "  var hotelCityName = '$hotelcity_name';";
                                        echo "  var selectElement = document.getElementById('city$i');";
                                        echo "  for (var i = 0; i < selectElement.options.length; i++) {";
                                        echo "    if (selectElement.options[i].value == hotelCityName) {";
                                        echo "      selectElement.selectedIndex = i;";
                                        echo "      break;";
                                        echo "    }";
                                        echo "  }";
                                        echo "  var hotelId = '$hotels';";
                                        echo "  var selectElementHotel = document.getElementById('hotel$i');";
                                        echo "  for (var k = 0; k < selectElementHotel.options.length; k++) {";
                                        echo "    if (selectElementHotel.options[k].value == hotelId) {";
                                        echo "      selectElementHotel.selectedIndex = k;";
                                        echo "      break;";
                                        echo "    }";
                                        echo "  }";
                                        echo "  var CategoryId = '$categorydata';";
                                        echo "  var selectElementCategory = document.getElementById('category$i');";
                                        echo "  for (var k = 0; k < selectElementCategory.options.length; k++) {";
                                        echo "    if (selectElementCategory.options[k].value == CategoryId) {";
                                        echo "      selectElementCategory.selectedIndex = k;";
                                        echo "      break;";
                                        echo "    }";
                                        echo "  }";
                                        echo "  console.log('thailand_hotel_id for form $i:', $th_id);"; // Log thailand_hotel_id to console
                                        echo "});";
                                        echo "</script>";
                                    }
                                    foreach ($thailand_hotel_id as $index => $th_id) {
                                        echo "<input type='hidden' name='thailand_hotel_id[]' class='hidden-input' id='thailand_hotel$index' value='$th_id'>";
                                    }
                                } else {
                                    echo "Error executing query to fetch hotelcity_name values: " . mysqli_error($conn);
                                }
                            } else {
                                echo "No reff_id provided";
                            }
                            ?>
                            <?php
                            if(isset($_GET['reff_id'])) {
                                $reff_id = $_GET['reff_id'];
                                $escaped_reff_id = mysqli_real_escape_string($conn, $reff_id);
                                $sql = "SELECT thailand_transport_id, transport_city, transport, transCheckinDate, trans_pax
                                        FROM thailand_transport
                                        WHERE reff_id = '$escaped_reff_id'";
                                $result_transport = mysqli_query($conn, $sql);
                                if ($result_transport) {
                                    $rowCount = mysqli_num_rows($result_transport);

                                    // Loop through each row and generate JavaScript code to select the corresponding option
                                    for ($i = 1; $i <= $rowCount; $i++) {
                                        $transportrow = mysqli_fetch_assoc($result_transport);
                                        $thailand_transport_id = $transportrow['thailand_transport_id'];
                                        $transport_city = $transportrow['transport_city'];
                                        $transport = $transportrow['transport'];
                                        $transCheckinDate = $transportrow['transCheckinDate'];
                                        $transPax = $transportrow['trans_pax'];
                                        echo "<script>";
                                        echo "document.addEventListener('DOMContentLoaded', function() {";
                                        echo "  var transportCity = '$transport_city';";
                                        echo "  var selectElement = document.getElementById('transcity$i');";
                                        echo "  for (var j = 0; j < selectElement.options.length; j++) {";
                                        echo "    if (selectElement.options[j].value == transportCity) {";
                                        echo "      selectElement.selectedIndex = j;";
                                        echo "      break;";
                                        echo "    }";
                                        echo "  }";
                                        echo "  var transportValue = '$transport';";
                                        echo "  var selectTransportElement = document.getElementById('transport$i');";
                                        echo "  for (var k = 0; k < selectTransportElement.options.length; k++) {";
                                        echo "    if (selectTransportElement.options[k].value == transportValue) {";
                                        echo "      selectTransportElement.selectedIndex = k;";
                                        echo "      break;";
                                        echo "    }";
                                        echo "  }";
                                        echo "  var transportpaxValue = '$transPax';";
                                        echo "  var selectTransportpaxElement = document.getElementById('transCategory$i');";
                                        echo "  for (var k = 0; k < selectTransportpaxElement.options.length; k++) {";
                                        echo "    if (selectTransportpaxElement.options[k].value == transportpaxValue) {";
                                        echo "      selectTransportpaxElement.selectedIndex = k;";
                                        echo "      break;";
                                        echo "    }";
                                        echo "  }";
                                        echo "  var transCheckinDateValue = '$transCheckinDate';";
                                        echo "  document.getElementById('transCheckinDate$i').value = transCheckinDateValue;";
                                        echo "});";
                                        echo "</script>";
                                    }
                                    mysqli_data_seek($result_transport, 0); // Resetting the result set pointer to the beginning
                                    while ($row = mysqli_fetch_assoc($result_transport)) {
                                        echo "<input type='hidden' name='thailand_transport_id[]' value='" . $row['thailand_transport_id'] . "'>";
                                    }
                                    mysqli_data_seek($result_transport, 0);
                                    $thailandTransportIds = [];
                                    while ($row = mysqli_fetch_assoc($result_transport)) {
                                        $thailandTransportIds[] = $row['thailand_transport_id'];
                                    }
                                    echo "<script>";
                                    echo "console.log('thailand_transport_id values:', " . json_encode($thailandTransportIds) . ");";
                                    echo "</script>";
                                } else {
                                    echo "Error executing query: " . mysqli_error($conn);
                                }
                            } else {
                                echo "No reff_id provided";
                            }
                            ?>
                            <?php
                            if(isset($_GET['reff_id'])) {
                                $reff_id = $_GET['reff_id'];
                                $escaped_reff_id = mysqli_real_escape_string($conn, $reff_id);
                                
                                // Query to fetch the sight_city values
                                $sql_data = "SELECT thailand_sight_id, sight_city, sight_persion, sightCheckinDate, sightseeing
                                            FROM thailand_sightseeing
                                            WHERE reff_id = '$escaped_reff_id'";
                                
                                $result_data = mysqli_query($conn, $sql_data);
                                
                                if ($result_data) {
                                    $rowCount = mysqli_num_rows($result_data);                                            
                                    // Loop through each row and generate JavaScript code to select the corresponding option
                                    for ($i = 1; $i <= $rowCount; $i++) {
                                        $rowcity = mysqli_fetch_assoc($result_data);
                                        $sight_city = $rowcity['sight_city'];
                                        $sight_persion = $rowcity['sight_persion'];
                                        $sightCheckinDate = $rowcity['sightCheckinDate'];
                                        $sightseeing = $rowcity['sightseeing'];
                                        echo "<script>";
                                        echo "document.addEventListener('DOMContentLoaded', function() {";
                                        echo "var sightCityId = $sight_city;";
                                        echo "var selectElement = document.getElementById('sightcity$i');";
                                        echo "  for (var i = 0; i < selectElement.options.length; i++) {";
                                        echo "    if (selectElement.options[i].value == sightCityId) {";
                                        echo "      selectElement.selectedIndex = i;";
                                        echo "      break;";
                                        echo "    }";
                                        echo "  }";
                                        echo "var sightseeingID = $sightseeing;";
                                        echo "var selectsightseeingElement = document.getElementById('sightseeing$i');";
                                        echo "  for (var i = 0; i < selectsightseeingElement.options.length; i++) {";
                                        echo "    if (selectsightseeingElement.options[i].value == sightseeingID) {";
                                        echo "      selectsightseeingElement.selectedIndex = i;";
                                        echo "      break;";
                                        echo "    }";
                                        echo "  }";
                                        echo "  var sightPersionValue = $sight_persion;";
                                        echo "  document.getElementById('sightPersion$i').value = sightPersionValue;";
                                        echo "  var sightCheckinDateValue = '$sightCheckinDate';";
                                        echo "  document.getElementById('sightCheckinDate$i').value = sightCheckinDateValue;";
                                        echo "});";
                                        echo "</script>";
                                    }
                                    mysqli_data_seek($result_data, 0); // Resetting the result set pointer to the beginning
                                    while ($row = mysqli_fetch_assoc($result_data)) {
                                        echo "<input type='hidden' name='thailand_sight_id[]' value='" . $row['thailand_sight_id'] . "'>";
                                    }
                            
                                    // Logging thailand_sight_id values to console
                                    mysqli_data_seek($result_data, 0); // Resetting the result set pointer to the beginning
                                    $thailandSightIds = [];
                                    while ($row = mysqli_fetch_assoc($result_data)) {
                                        $thailandSightIds[] = $row['thailand_sight_id'];
                                    }
                                    echo "<script>";
                                    echo "console.log('thailand_sight_id values:', " . json_encode($thailandSightIds) . ");";
                                    echo "</script>";
                                } else {
                                    echo "Error executing query to fetch sight_city values: " . mysqli_error($conn);
                                }
                            } else {
                                echo "No reff_id provided";
                            }
                            ?>
                            <?php
                            if(isset($_GET['reff_id'])) {
                                $reff_id = $_GET['reff_id'];
                                $escaped_reff_id = mysqli_real_escape_string($conn, $reff_id);

                                // Query to fetch the data
                                $sql_data = "SELECT rooms, nights, ex_adults, hotelCheckinDate 
                                            FROM thailand_hotel
                                            WHERE reff_id = '$escaped_reff_id'";

                                $result_data = mysqli_query($conn, $sql_data);

                                if ($result_data) {
                                    $rowCount = mysqli_num_rows($result_data);
                                    // Loop through each row and generate JavaScript code to populate the fields
                                    for ($i = 1; $i <= $rowCount; $i++) {
                                        $rowData = mysqli_fetch_assoc($result_data);
                                        $rooms = $rowData['rooms'];
                                        $nights = $rowData['nights'];
                                        $ex_adults = $rowData['ex_adults'];
                                        $hotelCheckinDate = $rowData['hotelCheckinDate'];

                                        echo "<script>";
                                        echo "document.addEventListener('DOMContentLoaded', function() {";
                                        echo "  var selectElementRooms = document.getElementById('room$i');";
                                        echo "  selectElementRooms.value = '$rooms';";
                                        echo "  var selectElementNights = document.getElementById('night$i');";
                                        echo "  selectElementNights.value = '$nights';";
                                        echo "  var selectElementAdults = document.getElementById('adult$i');";
                                        echo "  selectElementAdults.value = '$ex_adults';";

                                        // Convert hotelCheckinDate to YYYY-MM-DD format
                                        $formattedCheckinDate = date("Y-m-d", strtotime($hotelCheckinDate));
                                        echo "  var inputElementCheckinDate = document.getElementById('hotelCheckinDate$i');";
                                        echo "  inputElementCheckinDate.value = '$formattedCheckinDate';";
                                        
                                        echo "});";
                                        echo "</script>";
                                    }
                                } else {
                                    echo "Error executing query to fetch hotel data: " . mysqli_error($conn);
                                }
                            } else {
                                echo "No reff_id provided";
                            }
                            ?>
                            <button type="button" class="btn btn-sm btn-block btn-primary" id="fetchDataButton">Calculate</button>
                            <?php
                                if(isset($_GET['reff_id'])) {
                                    $reff_id = $_GET['reff_id'];
                                    $escaped_reff_id = mysqli_real_escape_string($conn, $reff_id);
                                    $sql = "SELECT * FROM thailand_customers WHERE reff_id = '$escaped_reff_id'";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        $row = mysqli_fetch_assoc($result); 
                                ?>
                            <table>
                                <tr class="">
                                    <th>Remarks:</th>
                                    <td><span></span></td>
                                </tr>
                                <!-- <tr>
                                    <th>Total THB:</th>
                                    <td><input type="text" name="" id="totalthb" readonly />
                    </div>
                    </td>
                    </tr> -->
                    <!-- <tr>
                        <th>THB TO INR Rate:</th>
                        <td><input type="text" name="thbtoinr" id="thbtoinr" value="2.2" readonly /></td>
                    </tr> -->
                    <input type="hidden" name="reff_id" id="" value="<?php echo $row['reff_id']; ?>">
                    <tr>
                        <th>Srvice per person INR Rate:</th>
                        <td><input type="text" name="persion_inr" value="<?php echo $row['persion_inr']?>" id="inrperpersion" readonly/></td>
                    </tr>
                    <tr>
                        <th>Total INR:</th>
                        <td><input type="text" name="package_inr" value="<?php echo $row['package_inr']?>" id="totalSumDisplay1" readonly/></td>
                    </tr>
                    </table>

                    <div class="text-center">
                        <button type="submit" id="finalSubmit" class="btn btn-primary">Submit</button>
                        <!-- <button type="reset" class="btn btn-secondary">Reset</button> -->
                    </div>

                    </form>

                </div>
            </div>
        </div>
        </div>
    </section>
</main>
<?php 
 }
} else {
    echo "No results";
}
?>
<?php include "footer.php" ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
    let totalRows = <?php echo $total_rows; ?>; // Get the total number of rows from PHP

    // Show the appropriate number of form containers based on totalRows
    for (let i = 0; i <= totalRows; i++) {
        $('#formContainer' + i).show();
    }

    // Logic for adding and removing form containers remains the same
    let currentVisible = totalRows;

    $('#addButtonmain').click(function() {
        if (currentVisible < 15) {
            currentVisible++;
            $('#formContainer' + currentVisible).show();
            $('#removeButton').show();
        }
        if (currentVisible === 15) {
            $('#addButtonmain').hide();
        }
    });

    $('#removeButton').click(function() {
        if (currentVisible > 1) {
            $('#formContainer' + currentVisible).hide();
            currentVisible--;
        }
        if (currentVisible === 1) {
            $('#removeButton').hide();
        }
        if (currentVisible < 15) {
            $('#addButtonmain').show();
        }
    });
});
</script>
<script>
    $(document).ready(function() {
    let totalRows = <?php echo $total_transrows; ?>; // Get the total number of rows from PHP
    // Show the appropriate number of form containers based on totalRows
    for (let i = 0; i <= totalRows; i++) {
        $('#cityformContainer' + i).show();
    }

    // Logic for adding and removing form containers remains the same
    let currentVisible = totalRows;// First form is already visible

        $('#transportaddButton').click(function() {
            // alert('1');
            if (currentVisible < 15) {
                currentVisible++; // Increment to show the next form container
                $('#cityformContainer' + currentVisible).show(); // Show the next form container
                $('#transportremoveButton').show();
            }
            if (currentVisible === 15) {
                $('#transportaddButton').hide();
            }
        });

        $('#transportremoveButton').click(function() {
            if (currentVisible > 1) {
                var nextFormContainer = document.getElementById('cityformContainer' + currentVisible);
                nextFormContainer.style.display = ''; // Remove the display:flex style
                nextFormContainer.style.display = 'none'; // Hide the next form container
                currentVisible--;
            }
            if (currentVisible === 1) {
                $('#transportremoveButton').hide(); // Hide the remove button if back to the first form
            }
            if (currentVisible < 15) {
                $('#transportaddButton').show(); // Show the add button again if not all forms are visible
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        let totalRows = <?php echo $total_sightrows; ?>; // Get the total number of rows from PHP
        // Show the appropriate number of form containers based on totalRows
        for (let i = 0; i <= totalRows; i++) {
            $('#SightformContainer' + i).show();
        }
        let currentVisible = 1; // First form is already visible

        $('#SightaddButton').click(function() {
            // alert('1');
            if (currentVisible < 15) {
                currentVisible++; // Increment to show the next form container
                $('#SightformContainer' + currentVisible).show(); // Show the next form container
                $('#SightremoveButton').show();
            }
            if (currentVisible === 15) {
                $('#SightaddButton').hide();
            }
        });

        $('#SightremoveButton').click(function() {
            if (currentVisible > 1) {
                var nextFormContainer = document.getElementById('SightformContainer' + currentVisible);
                nextFormContainer.style.display = ''; // Remove the display:flex style
                nextFormContainer.style.display = 'none'; // Hide the next form container
                currentVisible--;
            }
            if (currentVisible === 1) {
                $('#SightremoveButton').hide(); // Hide the remove button if back to the first form
            }
            if (currentVisible < 15) {
                $('#SightaddButton').show(); // Show the add button again if not all forms are visible
            }
        });
    });
</script>
<script>
    function validateForm() {
        var name = document.getElementById("name").value.trim();
        var email = document.getElementById("email").value.trim();
        var phone = document.getElementById("phone").value.trim();
        var date = document.getElementById("custdate").value.trim();
        var numPersons = document.getElementById("pax").value.trim();
        // Reset error messages
        document.getElementById("nameError").textContent = "";
        document.getElementById("emailError").textContent = "";
        document.getElementById("phoneError").textContent = "";
        document.getElementById("dateError").textContent = "";
        document.getElementById("personsError").textContent = "";

        // Check name
        if (name === "") {
            document.getElementById("nameError").textContent = "Please enter a name.";
            return false;
        }

        // Check email
        if (email === "") {
            document.getElementById("emailError").textContent = "Please enter an email address.";
            return false;
        }

        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            document.getElementById("emailError").textContent = "Please enter a valid email address.";
            return false;
        }

        // Check phone
        if (phone === "") {
            document.getElementById("phoneError").textContent = "Please enter a phone number.";
            return false;
        }

        var phonePattern = /^\d{10}$/;
        if (!phonePattern.test(phone)) {
            document.getElementById("phoneError").textContent = "Please enter a valid 10-digit phone number.";
            return false;
        }

        // Check date
        if (date === "") {
            document.getElementById("dateError").textContent = "Please select a booking date.";
            return false;
        }

        // Check number of persons
        if (numPersons === "") {
            document.getElementById("personsError").textContent = "Please enter the number of persons.";
            return false;
        }

        var numPattern = /^\d+$/;
        if (!numPattern.test(numPersons)) {
            document.getElementById("personsError").textContent = "Please enter a valid number.";
            return false;
        }

        // Form passed all validation checks
        return true;
    }
    $('#finalSubmit').click(function() {
        var finalname = $("input[name='name']").val();
        var finalemail = $("input[name='email']").val();
        var finalphone = $("input[name='phone']").val();
        var finaldate = $("input[name='custdate']").val();
        var finalpax = $("input[name='pax']").val();
        var finalhotelcity = $("input[name='city[]'").val();
        var finalhotelname = $("input[name='hotel[]'").val();
        var finalhotelcategory = $("input[name='category[]'").val();
        var finalhotelroom = $("input[name='room[]'").val();
        var finalhotelnight = $("input[name='night[]'").val();
        var finalhoteladult = $("input[name='adult[]'").val();
        var finalhotelcheckindate = $("input[name='hotelCheckinDate[]'").val();
        console.log(finalname);
        console.log(finalemail);
        console.log(finalphone);
        console.log(finaldate);
        console.log(finalpax);
        console.log(finalhotelcity);
        console.log(finalhotelname);
        console.log(finalhotelcategory);
        console.log(finalhotelroom);
        console.log(finalhotelnight);
        console.log(finalhoteladult);
        console.log(finalhotelcheckindate);
    });
    </script>
<script>
    $('#fetchDataButton').click(function() {
        // ================= start hotel calculation ===================
        var TotalPrice = 0;
        var PerPerson = 0;
        var TotalTBH = 0;
        var hotel_price = 0;
        for (i = 1; i <= 15; i++) {
            var book_adult = parseInt(0);
            var adult = parseInt($("#adult" + i).val());
            var night = parseInt($("#night" + i).val());
            var rooms = parseInt($("#room" + i).val());
            var category_charge = parseInt($("#category" + i).val());
            // alert(category_charge);
            var forCategory = category_charge / 2;
            // console.log('category:',forCategory);
            if ((adult > 0 || rooms > 0) && category_charge > 0) {
                if (adult > 0 && night > 0) {
                    book_adult = parseInt(book_adult) + parseInt(adult);
                }
                if (rooms > 0 && night > 0) {
                    hotel_price = parseInt(hotel_price) + (parseInt(category_charge) * parseInt(rooms) * parseInt(night));
                    hotel_price = parseInt(hotel_price) + (parseInt(forCategory) * parseInt(book_adult));
                }
            }
        }
        // console.log(hotel_price);
        console.log('hotel_price= ' + hotel_price);
        // ================== end hotel calculation ========================
        /* ================== start_transport_calculation ================== */
        var transport_price = 0;
        for (i = 1; i <= 15; i++) {
            if ($("#transCategory" + i).val() > 0) {
                var transport_charge = parseInt($("#transCategory" + i).val());
                if (!isNaN(transport_charge) && transport_charge > 0) {
                    transport_price += transport_charge;
                }
            }
        }
        console.log('transport_price= ' + transport_price);
        /* ================== start_sightseeing_calculation ================== */
        var sightseeing_price = 0;
        for (i = 1; i <= 15; i++) {
            var sight_charge = parseInt($("#sightseeing" + i).val());
            var pax = parseInt($("#sightPersion" + i).val());
            if (!isNaN(sight_charge) && sight_charge > 0 && !isNaN(pax) && pax > 0) {
                var person_charge = sight_charge * pax;
                sightseeing_price += person_charge;
            }
        }
        console.log('sightseeing_price= ' + sightseeing_price);
        // ==================== end sightseeing calculation ========================
        // ==================== calculate final price =============================
        TotalPrice = hotel_price + transport_price + sightseeing_price;
        var total_person = parseInt($('#paxmember').val());
        var total_tbh = parseFloat($('#thbtoinr').val());
        // console.log($('#thbtoinr').val());
        console.log(total_tbh);
        PerPerson = TotalPrice / total_person;
        TotalTBH = TotalPrice / total_tbh;
        console.log(TotalTBH);
        console.log('TotalPrice= ' + TotalPrice);
        // display the total price 
        $('#totalthb').val(TotalTBH.toFixed(2));
        $('#inrperpersion').val(PerPerson);
        $('#totalSumDisplay1').val(TotalPrice);
        $('#fetchDataButton').hide();
    });
</script>
<script>
    $(document).ready(function() {
        $('.date-input').change(function() {
            var selectedDate = $(this).val();
            $('.checkin-date').val(selectedDate);
        });
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(".city").change(function() {
            var city_id = $(this).val();
            var data_id = $(this).attr('data-id');
            hotel_id = $('#hotel' + data_id).val();
            getHotelList(city_id, data_id, hotel_id);
        });
        function getHotelList(city_id, data_id, hotel_id) {
            $.ajax({
                url: "hotel.php",
                type: "POST",
                data: {
                    city_id: city_id,
                    data_id: data_id,
                },
                cache: false,
                success: function(result) {
                    $("#hotel" + data_id).html(result);
                }
            });
        }
        $(".hotel").change(function() {
            var hotel_id = $(this).val();
            var hotel_data_id = $(this).attr('data-id');
            var category = $('#category' + hotel_data_id).val();
            getRoomCategoryList(hotel_id, hotel_data_id, category);
        });
        function getRoomCategoryList(hotel_id, hotel_data_id, category) {
            $.ajax({
                url: "category.php",
                type: "POST",
                data: {
                    hotel_id: hotel_id
                },
                cache: false,
                success: function(result) {
                    $("#category" + hotel_data_id).html(result);
                }
            });
        }
        $(".transcity").change(function() {
            var city_id = $(this).val();
            var data_id = $(this).attr('data-id');
            getTransportList(city_id, data_id);
        });
        function getTransportList(city_id, data_id) {
            // alert(city_id);
            $.ajax({
                url: "trans.php",
                type: "POST",
                data: {
                    city_id: city_id
                },
                cache: false,
                success: function(result) {
                    $("#transport" + data_id).html(result);
                }
            });
        }
        $(".transport").change(function() {
            var trans_id = this.value;
            var data_id = $(this).attr('data-id');
            // alert(data_id);
            $.ajax({
                url: "transcategory.php",
                type: "POST",
                data: {
                    trans_id: trans_id
                },
                cache: false,
                success: function(result) {
                    $("#transCategory" + data_id).html(result);
                    // $("#city").html(<option value="">Select State</option>)
                }
            });
        });
        $(".sightcity").change(function() {
            var city_id = this.value;
            var data_id = $(this).attr('data-id');
            // alert(city_id);
            $.ajax({
                url: "sightseeing.php",
                type: "POST",
                data: {
                    city_id: city_id
                },
                cache: false,
                success: function(result) {
                    $("#sightseeing" + data_id).html(result);
                    // $("#city").html(<option value="">Select State</option>)
                }
            });
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        for (var i = 1; i <= 15; i++) {
            var nightSelect = document.getElementById("night" + i);
            if (nightSelect) {
                nightSelect.addEventListener("change", function() {
                    var selectedNights = parseInt(this.value);
                    var index = this.id.substr(5); 
                    var checkinDate1 = new Date(document.getElementById("hotelCheckinDate" + index).value);
                    if (!isNaN(checkinDate1.getTime()) && selectedNights > 0) {
                        var newCheckinDate = new Date(checkinDate1);
                        newCheckinDate.setDate(newCheckinDate.getDate() + selectedNights);
                        var formattedDate = newCheckinDate.toISOString().split('T')[0]; 
                        document.getElementById("hotelCheckinDate" + (parseInt(index) + 1)).value = formattedDate;
                    } else {
                        document.getElementById("hotelCheckinDate" + (parseInt(index) + 1)).value = ""; // Clear the second date if no nights are selected or check-in date is invalid
                    }
                });
            }
        }
    });
</script>
<script>
        $(document).ready(function(){
            // Initially hide the submit button
            $("#finalSubmit").hide();

            // Show/hide the submit button on Calculate button click
            $("#fetchDataButton").click(function(){
                $("#finalSubmit").toggle(); // Toggle visibility of the submit button
            });
        });
    </script>
     <script>
        $(document).ready(function(){
            // Initially hide the submit button
            $("#finalSubmit").hide();

            // Show the submit button whenever any click event occurs within the form
            $("#myForm").click(function(){
                $("#finalSubmit").show();
            });
        });
    </script>
