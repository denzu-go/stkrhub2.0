<?php
include "database.php";

$page = isset($_POST["page"]) ? $_POST["page"] : 1;
$sql = '';

if (isset($_POST["minimumPrice"], $_POST["maximumPrice"])) {
    $minimumPrice = $_POST["minimumPrice"];
    $maximumPrice = $_POST["maximumPrice"];
    $sql .= " product_price BETWEEN '" . $minimumPrice . "' AND '" . $maximumPrice . "' ";
}

if (isset($_POST["brand"])) {
    $brand = $_POST["brand"];
    $brand = implode("','", $brand);
    $customSql = "product_brand IN('" . $brand . "') ";
    $sql .= empty($sql) ? $customSql : "AND ($customSql)";
}

if (isset($_POST["ram"])) {
    $ram = $_POST["ram"];
    $ram = implode("','", $ram);
    $customSql = "product_ram IN('" . $ram . "')";
    $sql .= empty($sql) ? $customSql : "AND ($customSql)";
}

if (isset($_POST["storage"])) {
    $storage = $_POST["storage"];
    $storage = implode("','", $storage);
    $customSql =  "product_storage IN('" . $storage . "') ";
    $sql .= empty($sql) ? $customSql : "AND ($customSql)";
}

if (isset($_POST["searchKeyword"])) {
    $searchKeyword = $_POST["searchKeyword"];
    $customSql = "
    product_brand LIKE ('%" . $searchKeyword . "%') ||
    product_storage LIKE ('%" . $searchKeyword . "%') ||
    product_name LIKE ('%" . $searchKeyword . "%') ||
    product_ram LIKE ('%" . $searchKeyword . "%') ||
    product_price LIKE ('%" . $searchKeyword . "%') ||
    product_camera LIKE ('%" . $searchKeyword . "%')";
    $sql .= empty($sql) ? $customSql : "AND ($customSql)";
}

//Pagination
$recordsPerPage = 12;
$recordsFetched = ($page - 1) * $recordsPerPage;  
$totalRecords = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM product WHERE $sql"));
$totalPages = ceil($totalRecords / $recordsPerPage);

$completeSql = "SELECT * FROM product WHERE $sql ORDER BY product_id DESC  LIMIT $recordsFetched,$recordsPerPage ";
$query = mysqli_query($conn, $completeSql);
$products = '';

$paginationData = '';
if ($page > 1) {
    $paginationData .=  '<li class="paginate_button page-item previous" ><a data-page="' . ($page - 1) . '" class="page-link"><i class="previous"></i></a></li>';
} 

for ($i = 1; $i <= $totalPages; $i++) {
    $active = $i == $page ? "active": "";
    $paginationData .= '<li class="paginate_button page-item '. $active. '"><a data-page="' .$i. '" class="page-link">' . $i . '</a></li>';
}

if ($totalPages > $page) {
    $paginationData .= '<li class="paginate_button page-item next" ><a data-page="' . ($page + 1) . '" class="page-link"><i class="next"></i></a></li>';
}

$pagination = empty($paginationData) ? '' :  '<div class="card my-2 py-4">
                           <ul class="pagination"> ' . $paginationData . '</ul>
                </div>';

while ($row = mysqli_fetch_array($query)) {
    $product_image = $row["product_image"];
    $image_src = 'assets/images/' . $product_image;
    $products .= '<div class="product-card col-md-6 col-lg-4 col-xxl-3">
                                    <div class="card h-100">
                                        <div class="h-250px text-center card-heading">
                                                <img class="mh-250px img-fluid" src="' . $image_src . '" alt="image">
                                        </div>
                                        <div class="separator separator-dashed"></div>
                                        <div class="card-body p-4">
                                            <a class="fs-5 wrap-text-1 fw-bold" >' . $row["product_name"] . '</a>

                                        <div class="fs-4 text-gray-700 d-flex">
                                            <span class="fw-bold">Price:</span>
                                            <div class="ms-2 fw-bolder">₹' . number_format($row["product_price"],2) . '</div>
                                        </div>

                                        <div class="fs-4 text-gray-700 d-flex">
                                            <span class="fw-bold">Ram:</span>
                                            <div class="ms-2 fw-bolder">' . $row["product_ram"] . ' GB</div>
                                        </div>

                                        <div class="fs-4 text-gray-700 d-flex">
                                            <span class="fw-bold">Camera:</span>
                                            <div class="ms-2 fw-bolder">' . $row["product_camera"] . ' MP</div>
                                        </div>

                                        <div class="fs-4 text-gray-700 d-flex">
                                            <span class="fw-bold">Storage:</span>
                                            <div class="ms-2 fw-bolder">' . $row["product_storage"] . ' GB</div>
                                        </div>
                                            
                                        </div>
                                    </div>
                                </div>';
}

if(!mysqli_num_rows($query)) $products .= '<div class="card min-h-400px col-lg-12">
    <div div="" class="card-body justify-align-center less-container">
        <center><img style="width: 200px;opacity: .5;"
                src="assets/images/empty_search.jpg" alt="">
            <h2>Sorry, no results found!</h2>
            <h4 class="text-muted">Please check the spelling or try searching for something else:)</h4>
        </center>
    </div>
</div>';

$output = new stdClass;
$output->products = $products;
$output->pagination = $pagination;
echo json_encode($output);
