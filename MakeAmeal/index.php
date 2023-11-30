<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/style.css">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EatAmeal - Connect with Local Food Sellers</title>
    <?php
  include "inc/function.php";
  ?>
 
</head>
<body>
    

    <main>
        
        <div id="sidebar">

           <h2>Bezorg methode</h2>
            <select id="bezorg-methode">
                <option value="city1">Afhalen</option>
                <option value="city2">Bezorgen</option>
            </select>

            <h2>kies een stad</h2>
            <select id="city-selector">
                <option value="city1">Helmond</option>
                <option value="city2">Eindhoven</option>
                <option value="city3">Roermond</option>
                <!-- Add more cities as needed -->
            </select>
            <h2>voedsel filter</h2>
            <select id="city-selector">
                <option value="Sweet">Sweet</option>
                <option value="Salty">Salty</option>
                <option value="Pasta">Pasta</option>
                <option value="Meat">Meat</option>
                <!-- Add more cities as needed -->
            </select>
        </div>

        <div id="profiles">
    <!-- ... (existing form content) ... -->
</form>

            <!-- Example Profile 1 -->
            <div class="profile" style="background-image: url('yeet.png'); background-size: cover; background-position: center;">
                <div class="profile-content">
                    <h3>John Doe</h3>
                    <p>City: Helmond</p>
                    <p>Favorite Dish: Pizza</p>
                    <img src="sonic.jpg" alt="Profile 1">
                </div>
                <div class="time">Date: 2023-11-28<br>Time: 08:00 <br> bezorg methode</div>
            </div>
            <!-- Add more profiles as needed -->
            
        <div id="profiles">
            <?php foreach ($profiles as $profile) : ?>
                <div class="profile" style="background-image: url('<?php echo $profile['profile_image']; ?>'); background-size: cover; background-position: center;">
                    <div class="profile-content">
                        <h3><?php echo $profile['name']; ?></h3>
                        <p>City: <?php echo $profile['city']; ?></p>
                        <p>Favorite Dish: <?php echo $profile['favorite_dish']; ?></p>
                        <img src="<?php echo $profile['profile_image']; ?>" alt="<?php echo $profile['name']; ?>">
                    </div>
                    <div class="time">
                        Date: <?php echo $profile['date']; ?><br>
                        Time: <?php echo $profile['time']; ?><br>
                        Bezorg Methode: <?php echo $profile['bezorg_methode']; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <!-- Omitted map-related code -->

</body>
</html>
