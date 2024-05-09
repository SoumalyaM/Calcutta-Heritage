<?php

function user_signup()
{
    global $connection;

    if (isset($_POST['submit'])) {

        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $password = $_POST['password'];
        $user_type = $_POST['usertype'];


        $name = mysqli_real_escape_string($connection, $name);
        $username =  mysqli_real_escape_string($connection, $username);
        $email = mysqli_real_escape_string($connection, $email);
        $phone_number = mysqli_real_escape_string($connection, $phone_number);
        $password = mysqli_real_escape_string($connection, $password);
        $user_type = mysqli_real_escape_string($connection, $user_type);


        $hashFormat = "$2y$10$";

        $salt = "69hellomotherfucker696";
        $hash_form_and_salt = $hashFormat . $salt;

        $password_hash = crypt($password, $hash_form_and_salt);

        if (!check_user_duplicate($username, $email, $phone_number)) {

            $user_signup_query = "INSERT INTO users(name, username, email, phone_number , password_hash, user_type) ";
            $user_signup_query .= "VALUES ('$name', '$username', '$email','$phone_number', '$password_hash', '$user_type')";

            $result = mysqli_query($connection, $user_signup_query);

            if (!$result) {
                die('Query Failed: ' . mysqli_error($connection));
            } else {
                header("Location: index.php");
            }
        } else {
            die('Query Failed: ' . mysqli_error($connection));
        }
    }
}

function check_user_duplicate($username, $email, $phone_number)
{
    global $connection;

    $select_all_query = "SELECT * FROM users";

    $result = mysqli_query($connection,  $select_all_query);
    if (!$result)  die('Query Failed.' . mysqli_error($connection));

    while ($row = mysqli_fetch_assoc($result)) {
        if ($username === $row['username']) {
            echo "this username is taken <br>";
            return true;
        } else if ($email === $row['email']) {
            echo "User with this email already exists <br>";
            return true;
        } else if ($phone_number === $row['phone_number']) {
            echo "User with this phone number already exists <br>";
            return true;
        }
    }
    return false;
}

function user_login()
{

    global $connection;

    if (isset($_POST['submit'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];

        $email =  mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);

        $hashFormat = "$2y$10$";

        $salt = "69hellomotherfucker696";
        $hash_form_and_salt = $hashFormat . $salt;

        $password_hash = crypt($password, $hash_form_and_salt);

        $user_login_query = "SELECT * FROM users WHERE email='$email' AND password_hash ='$password_hash'";
        $result = mysqli_query($connection, $user_login_query);

        if (!$result) {

            die('Login Query Failed :' . mysqli_error($connection));
        } else {
            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {

                    $db_name = $row['name'];
                    $db_username = $row['username'];
                    $db_email = $row['email'];
                    $db_phone_number = $row['phone_number'];
                    $db_password_hash = $row['password_hash'];
                    $db_user_type = $row['user_type'];

                    if ($email === $db_email && $password_hash === $db_password_hash) {
                        if ($db_user_type !== '0') {
                            $_SESSION['name'] = $db_name;
                            $_SESSION['username'] = $db_username;
                            $_SESSION['email'] = $db_email;
                            $_SESSION['user_type'] = $db_user_type;

                            header("Location: admin/");
                        } else {
                            header("Location: index.php");
                        }
                    }
                }
            } else {
                echo "Wrong inputs";
                echo "Sign up and then login";
            }
        }
    }

    // if (mysqli_num_rows($result) == 1) {
    //     // User exists and password matches
    //     echo "Login successful! <br>";
    // } else {
    //     // User doesn't exist or password is incorrect
    //     echo "Invalid email or password <br>";
    //     return false;
    // }

}



function view_attractions()
{
    global $connection;

    $select_all_query = "SELECT * FROM attractions";

    $result = mysqli_query($connection, $select_all_query);
    if (!$result)  die('query Failed' . mysqli_error($connection));

    while ($row = mysqli_fetch_assoc($result)) {
        echo
        '
            <div class="card">
        ';
        echo '<div style="background-image: url'
            . "('/otb/attraction_images/" .
            $row['attraction_image_url']
            . "')"
            . ' ;" class="card-img"></div> 
            ';
        echo '         <div class="card-title">
                        <h3>
                        ' .
            $row['attraction_name']
            . '
                        </h3>
                    </div>
                <div class="card-description">
                    <span>Opening Time: 
                        ' .
            $row['attraction_opening_hour']
            . '
                    AM</span>
                    <span>Rs. 
                        ' .
            $row['attraction_ticket_price']
            . '
                    </span>
                </div>
            </div>
        ';
    }
}

function view_attractions_on_search()
{
    global $connection;

    if (isset($_POST['search-submit'])) {

        $search = $_POST['search-input'];

        $search_query = "SELECT * FROM attractions WHERE attraction_name LIKE '%$search%'";
        $result = mysqli_query($connection, $search_query);

        if (!$result)  die('query Failed' . mysqli_error($connection));

        if (mysqli_num_rows($result) == 0) {
            echo "<h1>Nothing found!</h1>";
        } else {

            while ($row = mysqli_fetch_assoc($result)) {
                echo
                '
                    <div class="card">
                        <div class="card-img"></div>
                            <div class="card-title">
                                <h3>
                                ' .
                    $row['attraction_name']
                    . '
                                </h3>
                            </div>
                        <div class="card-description">
                            <span>Opening Time: 
                                ' .
                    $row['attraction_opening_hour']
                    . '
                            AM</span><span>Rs. 
                                ' .
                    $row['attraction_ticket_price']
                    . '
                            </span>
                        </div>
                    </div>
                ';
            }
        }
    }
}

function readRows()
{
    global $connection;

    $query = "SELECT * FROM user_table";

    $result = mysqli_query($connection, $query);
    if (!$result)  die('query Failed' . mysqli_error($connection));

    while ($row = mysqli_fetch_assoc($result)) {
        print_r($row);
    }
}

function showID()
{
    global $connection;

    $query = "SELECT * FROM users";

    $result = mysqli_query($connection, $query);

    if (!$result)  die('query Failed' . mysqli_error($connection));

    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        echo "<option value= 'Option $id'>$id</option>";
    }
}



function updateTable()
{
    if (isset($_POST['update'])) {
        global $connection;

        $username = $_POST['username'];
        $password = $_POST['password'];
        $id = $_POST['id'];
        $id = trim($id, 'Option'); //Trimming Option word

        $query = "UPDATE users SET ";
        $query .= "username = '$username', ";
        $query .= "password = '$password' ";
        $query .= "WHERE id = $id ";

        $result = mysqli_query($connection, $query);
        if (!$result) die('QUERY FAILED' . mysqli_error($connection));
    }
}

function deleteRows()
{
    if (isset($_POST['delete'])) {
        global $connection;

        // $username = $_POST['username'];
        // $password = $_POST['password'];
        $id = $_POST['id'];
        $id = trim($id, 'Option'); //Trimming Option word

        $query = "DELETE FROM users ";
        $query .= "WHERE id = $id ";

        $result = mysqli_query($connection, $query);
        if (!$result) die('QUERY FAILED' . mysqli_error($connection));
    }
}
