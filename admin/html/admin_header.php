<!--**********************************
            Nav header start
        ***********************************-->
<?php
$admin_id;

if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
}

$sql = "SELECT * FROM admins WHERE admin_id = ?";
$stmt = mysqli_prepare($conn, $sql);

// Bind the parameter
mysqli_stmt_bind_param($stmt, "i", $admin_id);

// Execute the query
mysqli_stmt_execute($stmt);

// Get the result
$result = mysqli_stmt_get_result($stmt);

// Fetch the row
$row = mysqli_fetch_array($result);

?>


<div class="nav-header">
    <a href="admin_profile.php" class="brand-logo">
        <?php 
        if(!is_null($row['avatar'])) {
            echo '<img class="logo-abbr" style="height:40px;border-radius:100%;" src="'.$row['avatar'].'" alt="">';
        }else {
            echo '<img class="logo-abbr" style="height:40px;border-radius:100%;" src="../img/constant/default.png" alt="">';
        }
        ?>
        
        <img class="logo-compact" src="./images/admin_text.png" alt="">
        <img class="brand-title" src="./images/admin_text.png" alt="">   
    </a>

    <div class="nav-control">
        <div class="hamburger">
            <span class="line"></span><span class="line"></span><span class="line"></span>
        </div>
    </div>
</div>
<!--**********************************
            Nav header end
        ***********************************-->

<!--**********************************
            Header start
        ***********************************-->
<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">

                <div class="header-left">

                </div>

                <ul class="navbar-nav header-right">

                    <li class="nav-item dropdown header-profile">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                            <i class="mdi mdi-account"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="admin_profile.php" class="dropdown-item">
                                <i class="icon-user"></i>
                                <span class="ml-2">Profile </span>
                            </a>
                            <a href="admin_process_logout.php" class="dropdown-item">
                                <i class="icon-key"></i>
                                <span class="ml-2">Logout </span>
                            </a>
                        </div>
                    </li>
                </ul>

            </div>
        </nav>
    </div>
</div>
<!--**********************************
            Header end ti-comment-alt
        ***********************************-->