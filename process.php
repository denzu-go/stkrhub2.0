<?php
include "connection.php";

$page = isset($_POST["page"]) ? $_POST["page"] : 1;
$sql = '';

if (isset($_POST["minimumPrice"], $_POST["maximumPrice"])) {
    $minimumPrice = $_POST["minimumPrice"];
    $maximumPrice = $_POST["maximumPrice"];
    $sql .= " marketplace_price BETWEEN '" . $minimumPrice . "' AND '" . $maximumPrice . "' ";
}

if (isset($_POST["minimumRating"], $_POST["maximumRating"])) {
    $minimumRating = $_POST["minimumRating"];
    $maximumRating = $_POST["maximumRating"];
    $sql .= " rating BETWEEN '" . $minimumRating . "' AND '" . $maximumRating . "' ";
}

if (isset($_POST["brand"])) {
    $brand = $_POST["brand"];
    $brand = implode("','", $brand);
    $customSql = "category IN('" . $brand . "') ";
    $sql .= empty($sql) ? $customSql : "AND ($customSql)";
}


if (isset($_POST["searchKeyword"])) {
    $searchKeyword = $_POST["searchKeyword"];
    $customSql = "
    game_name LIKE ('%" . $searchKeyword . "%') ||
    category LIKE ('%" . $searchKeyword . "%') ||
    short_description LIKE ('%" . $searchKeyword . "%')";
    $sql .= empty($sql) ? $customSql : "AND ($customSql)";
}

//Pagination
$recordsPerPage = 12;
$recordsFetched = ($page - 1) * $recordsPerPage; 

$totalRecords = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM published_built_games WHERE $sql"));
$totalPages = ceil($totalRecords / $recordsPerPage);

$completeSql = "SELECT * FROM published_built_games WHERE $sql ORDER BY published_game_id DESC  LIMIT $recordsFetched,$recordsPerPage ";
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

while ($fetched = mysqli_fetch_array($query)) {

    $published_game_id = $fetched['published_game_id'];
        $game_name = $fetched['game_name'];
        $category = $fetched['category'];
        $edition = $fetched['edition'];
        $published_date = $fetched['published_date'];
        $formatted_date = date("M. d, Y", strtotime($published_date));
        $creator_id = $fetched['creator_id'];
        $age_id = $fetched['age_id'];
        $short_description = $fetched['short_description'];
        $long_description = $fetched['long_description'];
        $category = $fetched['category'];
        $website = $fetched['website'];
        $logo_path = $fetched['logo_path'];
        $min_players = $fetched['min_players'];
        $max_players = $fetched['max_players'];
        $min_playtime = $fetched['min_playtime'];
        $max_playtime = $fetched['max_playtime'];
        $marketplace_price = $fetched['marketplace_price'];

        $getAvatarUser = "SELECT * FROM users WHERE user_id = $creator_id";
        $sqlGetAvatarUser = $conn->query($getAvatarUser);
        while ($fetchedAvatarUser = $sqlGetAvatarUser->fetch_assoc()) {
            $avatar = $fetchedAvatarUser['avatar'];
            $username = $fetchedAvatarUser['username'];
            $firstLetter = strtoupper(substr($username, 0, 1));
            if (!is_null($avatar)) {
                $avatar_value = '
                    <div style="position: relative; display: inline-block; width: 40px; height: 40px; border-radius: 50%; background-color: #333;">
                        <img src="' . $avatar . '" alt="" style="
                                position: absolute;
                                top: 0;
                                left: 0;
        
                                height: 100%;
                                width: 100%;
                                object-fit: cover;
                                border-radius: 50%;
                        ">
        
                    </div>
                    ';
            } else {
                $avatar_value = '
                        <div style="position: relative; display: flex; justify-content: center; align-items: center; width: 40px; height: 40px; border-radius: 50%;
                        background: rgb(38,211,224);
                        background: linear-gradient(90deg, rgba(38,211,224,1) 0%, rgba(182,96,232,1) 100%);">
                        
                            <span style="font-family: sans-serif; color: white; font-weight: bold; font-size:17px; padding-top: 0px;">' . $firstLetter . '</span>
            
                        </div>
                    ';
            }
        } 



        // rating
        $rating = "SELECT rating FROM ratings WHERE published_game_id = $published_game_id";
        $sqlGetRating = $conn->query($rating);
        $ratingsArray = [];
        while ($fetchedRating = $sqlGetRating->fetch_assoc()) {
            $ratingsArray[] = $fetchedRating['rating'];
        }


        $ratingCounts = array(
            '5' => 0,
            '4' => 0,
            '3' => 0,
            '2' => 0,
            '1' => 0
        );

        foreach ($ratingsArray as $ratingValue) {
            if (array_key_exists($ratingValue, $ratingCounts)) {
                $ratingCounts[$ratingValue]++;
            }
        }

        // Now you have the count of each rating value
        $count5 = $ratingCounts['5'];
        $count4 = $ratingCounts['4'];
        $count3 = $ratingCounts['3'];
        $count2 = $ratingCounts['2'];
        $count1 = $ratingCounts['1'];


        $ratingSum = array_sum($ratingsArray);
        $ratingCount = count($ratingsArray);
        $averageRating = ($ratingCount > 0) ? ($ratingSum / $ratingCount) : 0;

        // Round to one decimal place
        $roundedRating = round($averageRating, 1);

        // Round to the nearest half
        $roundedRating = round($roundedRating * 2) / 2;

        if (isset($_SESSION['user_id'])) {
            $a_cart = '
                    <a href="#" id="ajax-link" data-published-game-id="' . $published_game_id . '" class="social-info">
                ';
        } else {
            $a_cart = '
                    <a href="login_page.php" class="social-info">
                ';
        }

        
    
    
    $products .= '<div class="product_card m-3 scroll_reveal" id="published_game" data-published_game_id="' . $published_game_id . '" style="width: 20rem;">
    
    <div class="card" style="border: none;">

    
            <div class="container p-0" style="margin-bottom: 4rem;">
                <div class="image-mini-container" style="overflow: hidden; width: 100%; border-radius: 10px; position: relative; padding-top: 45.25%;">
                    <img class="card-img-top image-mini" src="'.$logo_path.'" style="position: absolute; top: 0; left: 0; height: 100%; width: 100%; object-fit: cover; -webkit-mask-image: linear-gradient(to top, transparent 0%, black 40%); mask-image: linear-gradient(to bottom, transparent 0%, black 40%);">
                </div>
            </div>
        </a>

        <div class="title-subtitle-container px-2" style="position: absolute; bottom: 0; left: 0; width: 100%;">
            <div class="row" style="width: 100%;">

                <div class="col-1">
                    '.$avatar_value.'
                </div>

                <div class="col" style="margin-left: 30px;">

                    <div class="row">
                        <a href="marketplace_item_page.php?published_game_id=' . $published_game_id . '">
                            <span class="d-inline-block text-truncate" style="max-width: 240px; color: white; font-size:17px;" data-toggle="tooltip" title="'.$game_name.'">
                                '.$game_name.'
                            </span>
                        </a>
                    </div>

                    <div class="row">
                        <span class="d-inline-block text-truncate" style="max-width: 240px;color: #26d3e0;" data-toggle="tooltip" title="'.$marketplace_price.'">
                            &#8369;' . $marketplace_price . '
                        </span>
                        <span class="d-inline-block text-truncate" style="max-width: 240px;" data-toggle="tooltip" title="Category">
                            &nbsp; | &nbsp;'.$category.'
                        </span>
                    </div>

                    <div class="row">
                        <span class="d-inline-block small text-muted text-truncate" style="max-width: 180px;" data-toggle="tooltip" title="Edition">
                            Edition: '.$edition.' 
                        </span>
                    </div>

                </div>

                <div class="title-subtitle-container px-2 py-0" style="position: absolute; bottom: 0%; right: 0; transform: translateY(0%);">
                    <div class="row d-flex justify-content-end p-0 m-0">
                        <span class="" style="color: #f7f799;" data-toggle="tooltip" title="Ratings">
                            <i class="fa-solid fa-star"></i>&nbsp;
                            '.$roundedRating.'
                        </span>
                    </div>
                    <span class="d-flex justify-content-end small">'.$formatted_date.'</span>
                </div>



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
            
        </center>
    </div>
</div>';

$output = new stdClass;
$output->products = $products;
$output->pagination = $pagination;
echo json_encode($output);
