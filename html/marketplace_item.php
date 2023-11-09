<script id="movie-template" type="text/html">
<div class="product_card m-3 scroll_reveal" id="published_game" data-published_game_id="<%= id %>" style="width: 20rem;">
    <div class="card" style="border: none;">

        <a href="marketplace_item_page.php?id=<%= id %>">
            <div class="container p-0" style="margin-bottom: 4rem;">
                <div class="image-mini-container" style="overflow: hidden; width: 100%; border-radius: 10px; position: relative; padding-top: 45.25%;">
                    <img class="card-img-top image-mini" src="../img/i1.jpg" style="position: absolute; top: 0; left: 0; height: 100%; width: 100%; object-fit: cover; -webkit-mask-image: linear-gradient(to top, transparent 0%, black 40%); mask-image: linear-gradient(to bottom, transparent 0%, black 40%);">
                </div>
            </div>
        </a>

        <div class="title-subtitle-container px-2" style="position: absolute; bottom: 0; left: 0; width: 100%;">
            <div class="row" style="width: 100%;">

                <!-- <div class="col-1">
                    '.$avatar_value.'
                </div> -->

                <div class="col" style="margin-left: 30px;">

                    <div class="row">
                        <a href="marketplace_item_page.php?id=<%= id %>">
                            <span class="d-inline-block text-truncate" style="max-width: 240px; color: white; font-size:17px;" data-toggle="tooltip" title="<%= name %>">
                                <%= name %>
                            </span>
                        </a>
                    </div>

                    <div class="row">
                        <span class="d-inline-block text-truncate" style="max-width: 240px;color: #26d3e0;" data-toggle="tooltip" title="<%= stars %>">
                            &#8369;<%= stars %>
                        </span>
                        <span class="d-inline-block text-truncate" style="max-width: 240px;" data-toggle="tooltip" title="Category">
                            &nbsp; | &nbsp;<%= genre %>
                        </span>
                    </div>

                    <div class="row">
                        <span class="d-inline-block small text-muted text-truncate" style="max-width: 180px;" data-toggle="tooltip" title="Edition">
                            edition
                        </span>
                    </div>

                </div>

                <div class="title-subtitle-container px-2 py-0" style="position: absolute; bottom: 0%; right: 0; transform: translateY(0%);">
                    <div class="row d-flex justify-content-end p-0 m-0">
                        <span class="" style="color: #f7f799;" data-toggle="tooltip" title="Ratings">
                            <i class="fa-solid fa-star"></i>&nbsp;
                            <%= rating %>
                        </span>
                    </div>
                    <span class="d-flex justify-content-end small"><%= year %></span>
                </div>



            </div>
        </div>

    </div>
</div>
</script>