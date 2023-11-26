        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first text-white">Main Menu</li>

                    <li class=""><a href="index.php" class="text-white" aria-expanded="false"><i class="fa-solid fa-chart-simple"></i><span class="nav-text">Dashboard</span></a></li>
                    <li class=""><a class="text-white" href="admin_banner.php" aria-expanded="false"><i class="fa-solid fa-panorama"></i></i><span class="nav-text">Banners</span></a></li>

                    <li class="nav-label text-white">Orders</li>
                    <li>
                        <a class="text-white" href="pending_all.php" aria-expanded="false" style="padding-top: .3rem !important; padding-bottom: .3rem !important">
                            <table id="is_pending_count" class="display" style="width: 100%;">
                                <tbody>
                                </tbody>
                            </table>
                        </a>
                    </li>

                    <li class="m-0 p-0">
                        <a class="text-white" href="in_production.php" aria-expanded="false" style="padding-top: .3rem !important; padding-bottom: .3rem !important">
                            <table id="in_production_count" class="display" style="width: 100%; padding: 0px; margin: 0px;">
                                <tbody style="width: 100%; padding: 0px; margin: 0px; height: 20px;">
                                </tbody>
                            </table>
                        </a>
                    </li>

                    <li>
                        <a class="text-white" href="to_ship.php" aria-expanded="false" style="padding-top: .3rem !important; padding-bottom: .3rem !important">
                            <table id="to_ship_count" class="display" style="width: 100%;">
                                <tbody>
                                </tbody>
                            </table>
                        </a>
                    </li>

                    <li>
                        <a class="text-white" href="to_deliver.php" aria-expanded="false" style="padding-top: .3rem !important; padding-bottom: .3rem !important">
                            <table id="to_deliver_count" class="display" style="width: 100%;">
                                <tbody>
                                </tbody>
                            </table>
                        </a>
                    </li>

                    <!-- <li>
                        <a href="received.php" aria-expanded="false" style="padding-top: .3rem !important; padding-bottom: .3rem !important">
                            <table id="is_received_count" class="display" style="width: 100%;">
                                <tbody>
                                </tbody>
                            </table>
                        </a>
                    </li> -->

                    <li>
                        <a class="text-white" href="canceled.php" aria-expanded="false" style="padding-top: .3rem !important; padding-bottom: .3rem !important">
                            <table id="is_canceled_count" class="display" style="width: 100%;">
                                <tbody>
                                </tbody>
                            </table>
                        </a>
                    </li>



                    <li class="nav-label text-white">Approve / Deny</li>
                    <li><a class="text-white" href="games_approval_requests.php"><i class="fa-solid fa-dice"></i><span class="nav-text">Games Pending Approval</span></a></li>
                    <li><a class="text-white" href="pending_details_request.php"><i class="fa-solid fa-flag-checkered"></i><span class="nav-text">Publish Game Details Requests</span></a></li>
                    <li><a class="text-white" href="edit_published_game_requests.php"><i class="fa-solid fa-font-awesome"></i><span class="nav-text">Edit Published Game Requests</span></a></li>
                    <li><a class="text-white" href="admin_comment_report.php"><i class="fa-solid fa-triangle-exclamation"></i><span class="nav-text">Reported Comments</span></a></li>


                    <li class="nav-label text-white">Cash Out</li>
                    <li><a class="text-white" href="cashout_requests.php" aria-expanded="false"><i class="fa-solid fa-money-bill-transfer"></i><span class="nav-text">Cashout Requests</span></a></li>

                    <li class="nav-label"></li>
                    <li>
                        <a class="has-arrow text-white" href="javascript:void()" aria-expanded="false">
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
                                echo '<li><a class="text-white" href="add_game_piece.php?category=' . $row['category'] . '">' . $row['category'] . '</a></li>';
                            }
                            ?>

                            <a class="btn btn-outline-primary text-white" id="addComponent" style="display: block; margin:20px;" role="button" style="text-align:center;">Add New Component</a>
                        </ul>
                    </li>


                    <li class="nav-label text-white"></li>
                    <li>
                        <a class="has-arrow text-white" href="javascript:void()" aria-expanded="false"><i class="fa-solid fa-hand-holding-hand"></i>
                            <span class="nav-text">Help Desk</span>
                        </a>
                        <ul aria-expanded="false">
                            <?php
                            include("connection.php");

                            $sql = "SELECT * FROM faq";
                            $stmt = $conn->prepare($sql);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            while ($row = $result->fetch_assoc()) {
                                echo '
                                <li>
                                <a class="text-white" href="admin_help.php?category=' . $row['faq_category'] . '"> ' . $row['faq_category'] . ' </a>
                                </li>
                                ';
                            }

                            ?>

                            <a class="text-white btn btn-outline-primary text-white" id="addCategory" style="width:200px;margin:20px;" role="button" style="text-align:center;">Add New Category</a>
                        </ul>
                    </li>


                    <!-- ACCOUNT MANAGEMETN -->
                    <?php
                    if (isset($_SESSION['admin_id'])) {
                        $admin_id = $_SESSION['admin_id'];

                        $sql = "SELECT * FROM admins WHERE admin_id = $admin_id";
                        $query = mysqli_query($conn, $sql);
                        $result = mysqli_fetch_assoc($query);

                        if ($result["is_super_admin"] == 1) {

                            echo '<li class="nav-label text-white">Account Management</li>
                            <li><a class="text-white" href="admin_user_management.php"><i class="fa-solid fa-users"></i><span class="nav-text">User Accounts</span></a></li>
                            <li><a class="text-white" href="admin_account_management.php"><i class="fa-solid fa-users"></i><span class="nav-text">Admin Accounts</span></a></li>

                            <li class="nav-label text-white"><span class="nav-text">Service Charges & Others</li>
                            <li><a class="text-white" href="admin_weight_charges.php"><i class="fa-solid fa-box"></i><span class="nav-text">Weight Charges</span></a></li>
                            <li><a class="text-white" href="admin_service_percentage.php"><i class="fa-solid fa-person-breastfeeding"></i><span class="nav-text">Service Fees</span></a></li>
                            <li><a class="text-white" href="admin_constant_thumbnail.php"><i class="fa-regular fa-images"></i><span class="nav-text">Thumbnail Images</span></a></li>
                            <li><a class="text-white" href="admin_paypal_royalty.php"><i class="fa-brands fa-paypal"></i><span class="nav-text">Paypal Account & Royalties</span></a></li>';
                        } else {

                            echo '<li class="nav-label text-white">Account Management</li>
                            <li><a class="text-white" href="admin_user_management.php"><i class="fa-solid fa-users"></i><span class="nav-text">User Accounts</span></a></li>';
                        }
                    }

                    ?>


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
                        // Check if the result is confirmed or if the modal was closed without confirmation
                        if (result.isConfirmed) {
                            Swal.fire("Success", "New Game Component added successfully", "success").then(() => {
                                // Redirect to the specified location
                                window.location.href = "add_game_piece.php?category=" + categoryValue;
                            });
                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            // Handle the cancel action
                            // You can add any specific logic for cancel here, or leave it empty if no action is needed
                        } else {
                            // Error handling
                            Swal.fire("Error", "Error adding Game Component", "error");
                        }
                    });
                });



                $('#addCategory').on('click', function() {
                    let categoryValue; // Variable to store the category value

                    Swal.fire({
                        title: "Add New Category",
                        html: '<div class="form-container">' +
                            '<label for="category">Category Name:</label>' +
                            '<input type="text" id="category" name="category" required><br>' +

                            '<label for="type"> Category Type: </label>' +
                            '<select id="type" name="type" required><br>' +
                            '<option value="1"> Tutorial </option>' +
                            '<option value="0"> Help </option>' +
                            '</select><br>',
                        showCancelButton: true,
                        confirmButtonText: "Add",
                        cancelButtonText: "Cancel",
                        preConfirm: () => {
                            // Handle the "Add" button click here
                            categoryValue = $('#category').val(); // Store the category value
                            var formData = {
                                category: categoryValue,
                                type: $('#type').val(), // Use $('#type').val() to get the selected value
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
                        // Check if the result is confirmed or if the modal was closed without confirmation
                        if (result.isConfirmed) {
                            Swal.fire("Success", "New Category added successfully", "success").then(() => {
                                // Redirect to the specified location
                                window.location.href = "admin_help.php?category=" + categoryValue;
                            });
                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            // Handle the cancel action
                            // You can add any specific logic for cancel here, or leave it empty if no action is needed
                        } else {
                            // Error handling
                            Swal.fire("Error", "Error adding Category", "error");
                        }
                    });
                });





            });
        </script>