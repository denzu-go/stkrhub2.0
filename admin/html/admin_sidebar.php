        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>

                    <li><a href="index.php" aria-expanded="false"><i class="icon icon-globe-2"></i><span class="nav-text">Dashboard</span></a></li>


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
                        </ul>
                    </li>

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
                            var formData = {
                                category: $('#category').val(),
                            };

                            // Send an AJAX request to add the category
                            return $.ajax({
                                url: "swal_add_category.php", // Create this PHP file to add the category
                                method: "POST",
                                data: formData,
                            });
                        },
                    }).then((result) => {
                        // Handle the AJAX response
                        if (result.isConfirmed) {
                            // This block is executed when the user clicks "Confirm" in Swal.fire
                            // You don't need to check result.status here

                            // Category added successfully
                            Swal.fire("Success", "New Game Component added successfully", "success").then(() => {
                                // Redirect to the specified location
                                window.location.href = "add_game_piece.php?category=" + $('#category').val();
                            });
                        } else {
                            // Error handling
                            Swal.fire("Error", "Error adding Game Component", "error");
                        }
                    });
                });
            });
        </script>