<?php

echo '

<div class="product_card m-3 scroll_reveal" id="published_game" data-published_game_id="' . $published_game_id_FR . '" style="width: 20rem;">
    <div class="card" style="border: none;">

        <a href="marketplace_item_page.php?published_game_id=' . $published_game_id_FR . '" data-toggle="tooltip" title="'.$game_name_FR.'">
            <div class="container p-0" style="margin-bottom: 4rem;">
                <div class="image-mini-container" style="overflow: hidden; width: 100%; border-radius: 10px; position: relative; padding-top: 45.25%;">
                    <img class="card-img-top image-mini" src="'.$logo_path_FR.'" style="position: absolute; top: 0; left: 0; height: 100%; width: 100%; object-fit: cover; -webkit-mask-image: linear-gradient(to top, transparent 0%, black 40%); mask-image: linear-gradient(to bottom, transparent 0%, black 40%);">
                </div>
            </div>
        </a>

        <div class="title-subtitle-container px-2" style="position: absolute; bottom: 0; left: 0; width: 100%;">
            <div class="row" style="width: 100%;">

                <div class="col-1">
                    '.$avatar_value_FR.'
                </div>

                <div class="col" style="margin-left: 30px;">

                    <div class="row">
                        <a href="marketplace_item_page.php?published_game_id=' . $published_game_id_FR . '">
                            <span class="d-inline-block text-truncate" style="max-width: 240px; color: white; font-size:17px;" data-toggle="tooltip" title="'.$game_name_FR.'">
                                '.$game_name_FR.'
                            </span>
                        </a>
                    </div>

                    <div class="row">
                        <span class="d-inline-block text-truncate" style="max-width: 240px;color: #26d3e0;" data-toggle="tooltip" title="'.$marketplace_price_FR.'">
                            &#8369;' . $marketplace_price_FR . '
                        </span>
                        <span class="d-inline-block text-truncate" style="max-width: 240px;" data-toggle="tooltip" title="Category">
                            &nbsp; | &nbsp;'.$category_FR.'
                        </span>
                    </div>

                    <div class="row">
                        <span class="d-inline-block small text-muted text-truncate" style="max-width: 180px;" data-toggle="tooltip" title="Edition">
                            '.$edition_FR.'
                        </span>
                    </div>

                </div>

                <div class="title-subtitle-container px-2 py-0" style="position: absolute; bottom: 0%; right: 0; transform: translateY(0%);">
                    <div class="row d-flex justify-content-end p-0 m-0">
                        <span class="" style="color: #f7f799;" data-toggle="tooltip" title="Ratings">
                            <i class="fa-solid fa-star"></i>&nbsp;
                            '.$roundedRating_FR.'
                        </span>
                    </div>
                    <span class="d-flex justify-content-end small">'.$formatted_date_FR.'</span>
                </div>



            </div>
        </div>

    </div>
</div>

';

?>