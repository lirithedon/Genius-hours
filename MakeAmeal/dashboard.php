<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include "inc/function.php";
    ?>
    <link rel="stylesheet" href="css/style.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EatAmeal - Connect with Local Food Sellers</title>

</head>

<body>

    <main>
        <div id="sidebar">
            <input type="text" id="search-bar" placeholder="Search...">
            <h2>Choose a City</h2>
            <select id="city-selector">
                <option value="city1">Helmond</option>
                <option value="city2">Eindhoven</option>
                <option value="city3">Roermond</option>
                <!-- Add more cities as needed -->
            </select>
        </div>

        <!-- Editable Profile Section -->
        <form method="post" action="dashboard.php">
        <div class="profile">
        <div class="profile">
        <form method="post" action="function.php">
    <!-- Add a hidden input field for the user ID -->
    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['user_id']; ?>">

    <div class="profile">
    <div class="profile-content">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="username" required>

        <label for="city">City:</label>
        <input type="text" id="city" name="city" value="city" required>

        <label for="favorite_dish">Favorite Dish:</label>
        <input type="text" id="favorite_dish" name="favorite_dish" value="favorite_dish" required>

        <label for="profile_picture">Profile Picture (URL):</label>
        <input type="text" id="profile_picture" name="profile_picture" value="profile_picture" required>

        <label for="profile_date">Date:</label>
        <input type="date" id="profile_date" name="profile_date" value="date" required>

        <label for="profile_time">Time:</label>
        <input type="time" id="profile_time" name="profile_time" value="time" required>

        <label for="delivery_method">Delivery Method:</label>
        <input type="text" id="delivery_method" name="delivery_method" value="delivery_method" required>
        
        <label for="background_image">Background Image (URL):</label>
        <input type="text" id="background_image" name="background_image" value="background_image" required>
    </div>
</div>
</form>
</div>
            <button type="submit" name="save_profile">insert in database</button>
        </form>
        <?php
        // Your existing PHP code.
        ?>
    </main>

</body>
</html>