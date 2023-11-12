        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>

                    <li><a href="index.php" aria-expanded="false"><i class="icon icon-globe-2"></i><span class="nav-text">Dashboard</span></a></li>

                    <?php 
                   
                    if (isset($_SESSION['admin_id'])){
                        $admin_id = $_SESSION['admin_id'];

                        $sql = "SELECT * FROM admins WHERE admin_id = $admin_id";
                        $query = mysqli_query($conn, $sql);
                        $result = mysqli_fetch_assoc($query);

                        if ($result["is_super_admin"] == 1){ 

                            echo '<li class="nav-label">Account Management</li>
                            <li><a href="admin_user_management.php">User Accounts</a></li>
                            <li><a href="admin_account_management.php">Admin Accounts</a></li>
        
                            <li class="nav-label">Service Charges & Others</li>
                            <li><a href="admin_weight_charges.php">Weight Charges</a></li>
                            <li><a href="admin_service_percentage.php">Service Fees</a></li>
                            <li><a href="admin_constant_thumbnail.php">Thumbnail Images</a></li>
                            <li><a href="admin_paypal_royalty.php">Paypal Account & Royalties</a></li>';
                        }

                    }
                    
                    ?>

                    


            

                    <li class="nav-label">Approve / Deny</li>
                    <li><a href="games_approval_requests.php">Games Pending Approval</a></li>
                    <li><a href="pending_details_request.php">Publish Game Details Requests</a></li>
                    <li><a href="./app-calender.html">Edit Published Game Requests</a></li>

                    <li class="nav-label">Cash Out</li>
                    <li><a href="cashout_requests.php" aria-expanded="false"><i class="icon icon-globe-2"></i><span class="nav-text">Cashout Requests</span></a></li>

                    <li class="nav-label">Orders</li>
                    <li><a href="pending_all.php" aria-expanded="false"><i class="icon icon-globe-2"></i><span class="nav-text">All Pending Orders</span></a></li>
                    <li><a href="in_production.php" aria-expanded="false"><i class="icon icon-globe-2"></i><span class="nav-text">In Production Orders</span></a></li>
                    <li><a href="to_ship.php" aria-expanded="false"><i class="icon icon-globe-2"></i><span class="nav-text">To Ship</span></a></li>
                    <li><a href="to_deliver.php" aria-expanded="false"><i class="icon icon-globe-2"></i><span class="nav-text">Completed Orders</span></a></li>
                    <li><a href="canceled.php" aria-expanded="false"><i class="icon icon-globe-2"></i><span class="nav-text">Canceled Orders</span></a></li>


                    <li class="nav-label"></li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon icon-app-store"></i>
                            <span class="nav-text">Game Components</span>
                        </a>
                        <ul aria-expanded="false">
                            <?php
                            include("connection.php");

                            $sql = "SELECT * FROM component_category";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            while ($row = $result->fetch_assoc()) {
                                echo '<li><a href="add_game_piece.php?category=' . $row['category'] . '">' . $row['category'] . '</a></li>';
                            }
                            ?>

                            <a class="btn btn-outline-primary" id="addComponent" style="display: block;" role="button" style="text-align:center;">Add New Component</a>


                        </ul>
                    </li>


                    <li class="nav-label"></li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="icon icon-app-store"></i><span class="nav-text">Help Desk</span></a>
                        <ul aria-expanded="false">
                            <?php
                            include("connection.php");

                            $sql = "SELECT * FROM faq";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            while ($row = $result->fetch_assoc()) {
                                echo '<li><a href="admin_help.php?category=' . $row['faq_category'] . '"> ' . $row['faq_category'] . ' </a></li>';
                            }

                            ?>

                            <a class="btn btn-outline-primary" id="addCategory" style="display: block;" role="button" style="text-align:center;">Add New Category</a>
                        </ul>
                    </li>


                </ul>
                </li>
                </ul>
            </div>


        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
        <script>
            $(document).ready(function() {
                // Add a click event listener to the "Add Address" button
                $('#addComponent').on('click', function() {
                    let categoryValue; // Variable to store the category value

                    Swal.fire({
                        title: "Add New Game Component",
                        html: '<div class="form-container">' +
                            '<label for="category">Component Name:</label>' +
                            '<input type="text" id="category" name="category" required><br>' +

                            '<label for="upload"> Upload Only: </label>' +
                            '<select id="upload" name="upload" required><br>' +
                            '<option value="1"> Yes </option>' +
                            '<option value="0"> No </option>' +
                            '</select><br>',
                        showCancelButton: true,
                        confirmButtonText: "Add",
                        cancelButtonText: "Cancel",
                        preConfirm: () => {
                            // Handle the "Add" button click here
                            categoryValue = $('#category').val(); // Store the category value
                            var formData = {
                                category: categoryValue,
                                upload: $('#upload').val(),
                            };

                            // Send an AJAX request to add the category
                            return $.ajax({
                                url: "swal_add_component.php", // Create this PHP file to add the category
                                method: "POST",
                                data: formData,
                            });
                        },
                        didClose: () => {
                            // Handle the case when the modal is closed (cancel button or outside click)
                            // You can add any cleanup or additional logic here if needed.
                            // For example, you can clear the form fields.
                        },
                    }).then((result) => {
                        // Handle the AJAX response
                        if (result.isConfirmed) {
                            Swal.fire("Success", "New Game Component added successfully", "success").then(() => {
                                // Redirect to the specified location
                                window.location.href = "add_game_piece.php?category=" + categoryValue;
                            });
                        } else {
                            // Error handling
                            Swal.fire("Error", "Error adding Game Component", "error");
                        }
                    });
                });


                $('#addCategory').on('click', function() {
                    let categoryValue; // Variable to store the category value

                    Swal.fire({
                        title: "Add New Game Component",
                        html: '<div class="form-container">' +
                            '<label for="category">Component Name:</label>' +
                            '<input type="text" id="category" name="category" required><br>',
                        showCancelButton: true,
                        confirmButtonText: "Add",
                        cancelButtonText: "Cancel",
                        preConfirm: () => {
                            // Handle the "Add" button click here
                            categoryValue = $('#category').val(); // Store the category value
                            var formData = {
                                category: categoryValue,
                            };

                            // Send an AJAX request to add the category
                            return $.ajax({
                                url: "swal_add_category.php", // Create this PHP file to add the category
                                method: "POST",
                                data: formData,
                            });
                        },
                        didClose: () => {
                            // Handle the case when the modal is closed (cancel button or outside click)
                            // You can add any cleanup or additional logic here if needed.
                            // For example, you can clear the form fields.
                        },
                    }).then((result) => {
                        // Handle the AJAX response
                        if (result.isConfirmed) {
                            Swal.fire("Success", "New Game Component added successfully", "success").then(() => {
                                // Redirect to the specified location
                                window.location.href = "admin_help.php?category=" + categoryValue;
                            });
                        } else {
                            // Error handling
                            Swal.fire("Error", "Error adding Game Component", "error");
                        }
                    });
                });


            });
        </script>