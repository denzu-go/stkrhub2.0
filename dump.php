<!DOCTYPE html>
<html>
<head>
    <title>Shuffle.js Example</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/shufflejs@5.0.2/dist/shuffle.min.css">
</head>
<body>
    <div class="filter-options">
        <label for="filter">Filter by: </label>
        <select id="filter">
            <option value="all">All</option>
            <option value="category1">Category 1</option>
            <option value="category2">Category 2</option>
        </select>
    </div>
    
    <div class="shuffle-container">
        <div class="shuffle-item category1">Item 1 (Category 1)</div>
        <div class="shuffle-item category2">Item 2 (Category 2)</div>
        <div class="shuffle-item category1">Item 3 (Category 1)</div>
        <div class="shuffle-item category2">Item 4 (Category 2)</div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/shufflejs@5.0.2/dist/shuffle.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
