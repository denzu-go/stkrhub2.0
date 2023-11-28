<?php
session_start();
include 'connection.php';

$category;

if (isset($_GET['category'])) {
    $category = $_GET['category'];
    unset($_SESSION['credentials']);
}

// check if admin logged in
if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
} else {
    header("Location: admin_login.php");
    exit;
}
// end of check if admin logged in
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>STKR Admin - Add <?php echo htmlspecialchars($category); ?> </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="./vendor/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <link href="./vendor/chartist/css/chartist.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">


    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Include DataTables CSS and JS files -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <!-- Include SweetAlert library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="">


</head>


<body>

    <div id="main-wrapper">
        <?php
        include 'html/admin_header.php';
        include 'html/admin_sidebar.php';



        ?>

        <div class="content-body">
            <div class="container-fluid">

                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Add <?php echo htmlspecialchars($category); ?> Content</h4>
                            <p class="mb-0">Fill Up Details</p>
                        </div>
                    </div>
                </div>
                <!-- row -->

                <div class="row">

                    <div class="col">
                        <div class="card">
                            <div class="card-body">

                                <div class="container my-5">
                                    <form id="myForm" enctype="multipart/form-data" method="post">

                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label" for="name">Component Name:</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="name" name="name" required>
                                            </div>
                                        </div>


                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label" for="description">Description:</label>
                                            <div class="col-sm-6">
                                                <textarea id="description" name="description" rows="4" cols="50" required></textarea>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label" for="price">Price:</label>
                                            <div class="col-sm-6">
                                                <input type="number" id="price" name="price" min="0" placeholder="0" required>
                                            </div>
                                        </div>



                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label" for="size">Size:</label>
                                            <div class="col-sm-6">
                                                <input type="text" id="size" name="size" required><br><br>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label" for="color">Has color:</label>
                                            <div class="col-sm-6">
                                                <select name="color" id="color">
                                                    <option value=""> Select Option</option>
                                                    <option value="1"> yes </option>
                                                    <option value="0"> no </option>
                                                </select><br><br>
                                            </div>
                                        </div>

                                        <div id="colorInput" style="display: none;">

                                            <div class="offset-sm-3 col-sm-3 d-grid">
                                                <div id="colorInput">
                                                    <label for="color_number">No. of Colors</label>
                                                    <input type="number" id="color_number" name="color_number" min="0" placeholder="0"><br><br>
                                                </div>

                                                <div id="colorFields" style="display: none;"> </div>

                                            </div>

                                            <div id="colorFields" style="display: none;">



                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label" for="No_template">No. Template</label>
                                            <div class="col-sm-6">
                                                <input type="number" id="No_template" name="No_template" min="0" placeholder="0">

                                                <div id="TemplateFields" style="display: block;"> </div>
                                            </div>
                                        </div>


                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label" for="No_thumbnail">No. Thumbnail</label>
                                            <div class="col-sm-6">
                                                <input type="number" id="No_thumbnail" name="No_thumbnail" min="0" placeholder="0">
                                                <p> note: first upload will always be the thumbnail.</p>

                                                <div id="thumbnailFields" style="display: block;"> </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="offset-sm-3 col-sm-3 d-grid">
                                                <button type="submit" class="btn btn-primary"> Submit </button>
                                            </div>
                                            <div class=" col-sm-3 d-grid">
                                                <a class="btn btn-outline-primary" href="add_game_piece.php?category=<?php echo $category ?>" role="button">Cancel</a>
                                            </div>
                                        </div>

                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>











        </div>





        <?php include 'html/admin_footer.php'; ?>



    </div>











    <!-- Include global.min.js first -->
    <script src="./vendor/global/global.min.js"></script>

    <!-- Include DataTables JS after global.min.js -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>

    <script src="./vendor/chartist/js/chartist.min.js"></script>

    <script src="./vendor/moment/moment.min.js"></script>
    <script src="./vendor/pg-calendar/js/pignose.calendar.min.js"></script>


    <script src="./js/dashboard/dashboard-2.js"></script>


    <script>
        $(document).ready(function() {
            // JavaScript
            $(document).ready(function() {
                $(".remove-coverPhoto").click(function(e) {
                    e.preventDefault();
                    var coverId = $(this).data('cover-id');
                    var fileInput = $("#" + coverId);

                    // Clear the file input field
                    fileInput.val('');
                });
            });

            $("#myForm").submit(function(e) {
                e.preventDefault(); // Prevent the default form submission
                var formData = new FormData(this); // Create a FormData object

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Do you want to add this new game component',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    // If the user clicks "Yes," proceed with the AJAX request
                    if (result.isConfirmed) {
                        // Make the AJAX request using the fetched imageId
                        $.ajax({
                            type: "POST",
                            url: "admin_process_add_gamepiece.php", // Your server-side script URL
                            data: formData,
                            contentType: false, // Prevent jQuery from adding a content-type header
                            processData: false, // Prevent jQuery from processing the data
                            success: function(response) {
                                if (response.startsWith("Error")) {
                                    // Display an error message using SweetAlert
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error!',
                                        text: response,
                                    });
                                } else {
                                    // Display a SweetAlert with a success message
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success!',
                                        text: 'Data inserted successfully!',
                                    }).then(function() {
                                        // Redirect to add_game_piece.php with the category parameter
                                        var category = "<?php echo $category; ?>";
                                        window.location.href = "add_game_piece.php?category=" + category;
                                    });

                                }
                            },
                            error: function(xhr, status, error) {
                                // Display a SweetAlert with an error message including the response text
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: 'Error in submitting data: ' + xhr.responseText,
                                });
                            }

                        });
                    }
                });
                // Send an AJAX POST request

            });

        });


        const selectElement = document.getElementById('color');
        const colorFields = document.getElementById('colorFields');
        const colorInput = document.getElementById('colorInput');

        // Add an event listener to the select element
        selectElement.addEventListener('change', function() {
            // Show/hide colorFields based on the selected option
            if (this.value === '1') {
                colorFields.style.display = 'block';
                colorInput.style.display = 'block';
            } else {
                colorFields.style.display = 'none';
                colorInput.style.display = 'none';

            }
        });


        // Get references to the input fields and the container for color fields
        const colorNumberInput = document.getElementById('color_number');
        const colorFieldsContainer = document.getElementById('colorFields');

        // Add an event listener to the color_number input
        colorNumberInput.addEventListener('input', function() {
            // Get the selected number of colors
            const numberOfColors = parseInt(this.value);

            // Clear the existing color fields
            colorFieldsContainer.innerHTML = '';

            // Create and add input fields for Color Name and Color Code
            for (let i = 1; i <= numberOfColors; i++) {
                const colorNameLabel = document.createElement('label');
                colorNameLabel.textContent = `Color Name ${i}:`;

                const colorNameInput = document.createElement('input');
                colorNameInput.type = 'text';
                colorNameInput.name = `colorName${i}`;
                colorNameInput.id = `colorName${i}`;

                const colorCodeLabel = document.createElement('label');
                colorCodeLabel.textContent = `Color Code ${i}:`;

                const colorCodeInput = document.createElement('input');
                colorCodeInput.type = 'text';
                colorCodeInput.name = `colorCode${i}`;
                colorCodeInput.id = `colorCode${i}`;

                // Add line breaks for spacing
                const lineBreak1 = document.createElement('br');
                const lineBreak2 = document.createElement('br');
                const lineBreak3 = document.createElement('br');

                // Append elements to the container
                colorFieldsContainer.appendChild(colorNameLabel);
                colorFieldsContainer.appendChild(colorNameInput);
                colorFieldsContainer.appendChild(lineBreak1);
                colorFieldsContainer.appendChild(colorCodeLabel);
                colorFieldsContainer.appendChild(colorCodeInput);
                colorFieldsContainer.appendChild(lineBreak2);
                colorFieldsContainer.appendChild(lineBreak3);
            }
        });





        const NoTemplate = document.getElementById('No_template');
        const TemplateFields = document.getElementById('TemplateFields');

        // Add an event listener to the color_number input
        NoTemplate.addEventListener('input', function() {
            // Get the selected number of colors
            const numberOfTemplate = parseInt(this.value);

            // Clear the existing color fields
            TemplateFields.innerHTML = '';

            // Create and add input fields for Color Name and Color Code
            for (let i = 1; i <= numberOfTemplate; i++) {
                const templateNameLabel = document.createElement('label');
                templateNameLabel.textContent = `Template Name ${i}:`;

                const templateNameInput = document.createElement('input');
                templateNameInput.type = 'text';
                templateNameInput.name = `templateName${i}`;
                templateNameInput.id = `templateName${i}`;

                const templateCodeLabel = document.createElement('label');
                templateCodeLabel.textContent = `Template File ${i}:`;

                //<input type="file" id="images" name="images[]" accept="image/*" multiple><br><br>

                const templateCodeInput = document.createElement('input');
                templateCodeInput.type = 'file';
                templateCodeInput.name = `templateCode${i}`;
                templateCodeInput.id = `templateCode${i}`;
                templateCodeInput.accept = `image/*`;


                // Add line breaks for spacing
                const lineBreak1 = document.createElement('br');
                const lineBreak2 = document.createElement('br');
                const lineBreak3 = document.createElement('br');

                // Append elements to the container
                TemplateFields.appendChild(templateNameLabel);
                TemplateFields.appendChild(templateNameInput);
                TemplateFields.appendChild(lineBreak1);
                TemplateFields.appendChild(templateCodeLabel);
                TemplateFields.appendChild(templateCodeInput);
                TemplateFields.appendChild(lineBreak2);
                TemplateFields.appendChild(lineBreak3);
            }
        });






        //<label for="No_thumbnail">No. Thumbnail</label><br>
        //<input type="number" id="No_thumbnail" name="No_thumbnail" min="0" placeholder="0"><br><br>

        //<div id="thumbnailFields" style="display: block;"> </div>

        const NoThumbnail = document.getElementById('No_thumbnail');
        const ThumbnailFields = document.getElementById('thumbnailFields');

        // Add an event listener to the color_number input
        NoThumbnail.addEventListener('input', function() {
            // Get the selected number of colors
            const numberOfThumbnail = parseInt(this.value);

            // Clear the existing color fields
            ThumbnailFields.innerHTML = '';

            // Create and add input fields for Color Name and Color Code
            for (let i = 1; i <= numberOfThumbnail; i++) {


                const thumbnailCodeLabel = document.createElement('label');
                thumbnailCodeLabel.textContent = `Thumbnail File ${i}:`;

                //<input type="file" id="images" name="images[]" accept="image/*" multiple><br><br>

                const thumbnailCodeInput = document.createElement('input');
                thumbnailCodeInput.type = 'file';
                thumbnailCodeInput.name = `thumbnailCode${i}`;
                thumbnailCodeInput.id = `thumbnailCode${i}`;
                thumbnailCodeInput.accept = `image/*`;


                // Add line breaks for spacing

                const lineBreak2 = document.createElement('br');
                const lineBreak3 = document.createElement('br');

                // Append elements to the container

                ThumbnailFields.appendChild(thumbnailCodeLabel);
                ThumbnailFields.appendChild(thumbnailCodeInput);
                ThumbnailFields.appendChild(lineBreak2);
                ThumbnailFields.appendChild(lineBreak3);
            }
        });
    </script>



</body>

</html>