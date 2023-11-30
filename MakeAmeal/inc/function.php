<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<?php
function dd($s)
{
    echo '<pre>' . var_dump($s) . '</pre>';
}


function usernameExists($conn, $username, $email)
{
    $sql = "SELECT * FROM users Where usersUsername = ? OR usersEmail = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $email);

    $stmt->execute();

    $result = $stmt->get_result(); // get the mysqli result
    $result = $result->fetch_assoc();

    //die(var_dump($result));
    return !!$result;
}

function loginUser()
{
    $conn = db();
    extract($_POST);

    dd("test");
    // die();

    $sql = "SELECT * FROM `users` WHERE `Email` = ? AND `password` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $_SESSION['user'] = $user; // Store user ID in session
        $_SESSION['logged_in'] = true;
        echo "Login successful";
        // Redirect the user to the appropriate page based on userAuthID
        if ($user['userAuthID'] == 1) {
            header("Location: admin.php");
        } else {
            header("Location: customer.php");
        }
        exit();
    } else {
        echo " email or password";
    }
    $conn->close();
}

function registerUser()
{
    $conn = db();
    extract($_POST);

    // Use prepared statements to prevent SQL injection
    $sql = "INSERT INTO `users` (`userName`, `email`, `password`) VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo "Error in preparing statement: " . $conn->error;
        return;
    }

    $stmt->bind_param("sss", $name, $email, $password);

    if ($stmt->execute()) {
        echo "Registration successful";
    } else {
        echo "Error in execution: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

function db()
{
    $servername = "localhost";
    $database = "eatameal";
    $username = "root";
    $password = "";
    // create connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    // check connection
    if (mysqli_connect_error()) {
        die("database connection failed: " . mysqli_connect_error());
    }
    return $conn;
}



function handlePost()
{
    dd($_POST);
    //    die("Ik ben nu op regelnummer " . __LINE__);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['signup'])) {
            // register
            registerUser();
        }

        // login
        if (isset($_POST['login'])) {
            loginUser();
        }

        // logout
       
        // add to cart
        

        // place order


    }
}
?>

<?php

function getCurrentURL()
{
    $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    return $actual_link;
}



function navbar()
{
    session_start();
    // session_destroy();

    $output = '<header>
                <nav>

                  <ul>

                  <header>
                  <a href="index.php"> <img src="eatameal2.png" alt="EatAmeal Logo"></a>
                  <a href="#">About Us</a>
                  <a href="signup.php">Sign Up</a>
                    <li><a href="contact.php">Contact</a></li>';

    // Check if the user is logged in
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
        // User is logged in
        if ($_SESSION['user']['userAuthID'] == 1) {
            // Admin user
            $output .= '<li><a href="admin.php">Profile</a></li>';
        } else {
            // Customer user
            $output .= '<li><a href="dashboard.php">Profile</a></li>';
        }
        $output .= '<li><a href="inc/logout.php">Logout</a></li>';
    } else {
        // User is not logged in
        $output .= '<li class="login"><a href="login.php">Log In</a></li>';
    }

    $output .= '
    
            </nav>
          </header>
          <style>
            .cart-image {
              width: 25px; /* Adjust the width as per your requirement */
              height: 25px; /* Adjust the height as per your requirement */
            }
          </style>';

    return $output;
}
echo navbar()
?>
<?php

// In your function.php file or wherever you have your functions

function addProfile()
{
    $conn = db();
    extract($_POST);

    // Prepare the SQL statement to insert the blog
    $sql = "INSERT INTO profiles (user_id, username, city, favorite_dish, profile_picture, background_img, delivery_method, date, time) 
    VALUES ('$userId', '$username', '$city', '$favoriteDish', '$profilePicture', '$backgroundImg', '$deliveryMethod', '$date', '$time')";
    
    if ($conn->query($sql)) {
        echo "Blog added successfully";
    } else {
        echo "Error adding the blog: " . $conn->error;
    }

    $conn->close();
}

?>
