<ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
    <li class="nav-item">
        <a class="nav-link" href="add_custom_component.php?game_id=<?php echo $game_id ?>">All</a>
    </li>
    <?php
    $sql = "SELECT * FROM component_category";
    $query = $conn->query($sql);
    while ($row = $query->fetch_assoc()) {
        $category = $row["category"];

        echo '
        <li class="nav-item">
            <a class="nav-link" href="add_custom_component.php?category=' . $category . ' &game_id='.$game_id.'">' . $category . '</a>
        </li>
        ';
    }
    ?>

</ul>