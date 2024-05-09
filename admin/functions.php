<?php

// Attraction Functions

function confirm_query($result)
{
    global $connection;
    if (!$result) die('Query Failed: ' . mysqli_error($connection));
}

function create_attractions()
{
    global $connection;
    if (isset($_POST['submit'])) {
        $attraction_name = $_POST['attraction_name'];
        $attraction_description = $_POST['attraction_description'];

        $attraction_image = $_FILES['attraction_image']['name'];
        $attraction_image_temp = $_FILES['attraction_image']['tmp_name'];

        $attraction_opening_hour = $_POST['attraction_opening_hour'];
        $attraction_ticket_price = $_POST['attraction_ticket_price'];

        // echo "$attraction_image";


        if ($attraction_name == "" || $attraction_description == "" || $attraction_image == "" || $attraction_opening_hour == "" || $attraction_ticket_price == "" || empty($attraction_name) || empty($attraction_description) || empty($attraction_image) || empty($attraction_opening_hour) || empty($attraction_ticket_price)) {
            echo "<b>No field should not be empty!</b>";
        } else {

            move_uploaded_file($attraction_image_temp, "../attraction_images/$attraction_image");

            $insert_attraction_query = "INSERT INTO attractions(attraction_name, attraction_description, attraction_image_url, attraction_opening_hour , attraction_ticket_price) ";
            $insert_attraction_query .= "VALUES ('$attraction_name', '$attraction_description', '$attraction_image','$attraction_opening_hour', '$attraction_ticket_price')";

            $result = mysqli_query($connection, $insert_attraction_query);

            confirm_query($result);

            header("Location: attractions.php");
        }
    }
}

function read_attractions()
{
    global $connection;
    $select_attractions_query = "SELECT * FROM attractions";
    $result = mysqli_query($connection, $select_attractions_query);

    confirm_query($result);

    while ($row = mysqli_fetch_assoc($result)) {
        $attraction_id = $row['attraction_id'];
        $attraction_name = $row['attraction_name'];
        $attraction_ticket_price = $row['attraction_ticket_price'];

        echo "
                <tr>
                    <td>{$attraction_id}</td>
                    <td>{$attraction_name}</td>
                    <td>{$attraction_ticket_price}</td>
                    <td>
                        <a href='attractions.php?edit={$attraction_id}'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>
                        &nbsp; &nbsp; 
                        <a href='attractions.php?delete={$attraction_id}'><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>
                    </td>
                </tr>
            ";
    }
}

function update_attractions()
{
    global $connection;
    if (isset($_POST['update'])) {

        $get_attraction_id = $_GET['edit'];

        $attraction_name = $_POST['attraction_name'];
        $attraction_description = $_POST['attraction_description'];

        $attraction_image = $_FILES['attraction_image']['name'];
        $attraction_image_temp = $_FILES['attraction_image']['tmp_name'];

        $attraction_opening_hour = $_POST['attraction_opening_hour'];
        $attraction_ticket_price = $_POST['attraction_ticket_price'];

        // if (file_exists("../attraction_images/$attraction_image"))
        // echo "$attraction_image";

        if ($attraction_name == "" || $attraction_description == "" || $attraction_image == "" || $attraction_opening_hour == "" || $attraction_ticket_price == "" || empty($attraction_name) || empty($attraction_description) || empty($attraction_image) || empty($attraction_opening_hour) || empty($attraction_ticket_price)) {
            echo "<b>No field should not be empty!</b>";
        } else {

            move_uploaded_file($attraction_image_temp, "../attraction_images/$attraction_image");

            $update_attraction_query = "UPDATE attractions SET ";
            $update_attraction_query .= "attraction_name = '$attraction_name', ";
            $update_attraction_query .= "attraction_description = '$attraction_description', ";

            $update_attraction_query .= "attraction_image_url = '$attraction_image', ";

            $update_attraction_query .= "attraction_opening_hour = '$attraction_opening_hour', ";
            $update_attraction_query .= "attraction_ticket_price = '$attraction_ticket_price' ";
            $update_attraction_query .= "WHERE attraction_id = $get_attraction_id ";

            $result = mysqli_query($connection, $update_attraction_query);

            confirm_query($result);

            header("Location: attractions.php");
        }
    }
}

function delete_attractions()
{
    global $connection; {
        if (isset($_GET['delete'])) {

            $get_attraction_id = $_GET['delete'];

            $delete_attraction_query = "DELETE FROM attractions WHERE attraction_id = {$get_attraction_id} ";
            $result = mysqli_query($connection, $delete_attraction_query);

            confirm_query($result);

            header("Location: attractions.php");
        }
    }
}

// User Functions

function all_user_details()
{
    global $connection;

    $select_all_query = "SELECT * FROM users";

    $result = mysqli_query($connection, $select_all_query);
    confirm_query($result);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '
            <tr>
                <td>
                    <span class="custom-checkbox">';
            echo "        <input type='checkbox' id='{$row['user_id']}' name='options[]' value='{$row['user_id']}'>" .
                '<label for="checkbox1"></label>
                    </span>
                </td>
                <th>
                ' .
                $row['user_id']
                . ' 
                </th>
                <td>
                ' .
                $row['name']
                . '
                </td>
                <td>
                ' .
                $row["username"]
                . '  
                </td>
                <td>
                ' .
                $row['email']
                . '
                </td>
                <td>
                ' .
                $row['phone_number']
                . '
                </td>
                <td>
                ' .
                $row['user_type'];
            echo $row['user_type'] == 1 ? ' (admin)' : ' (user)';
            echo
            "
                </td>
                <td>
                <a href='#editEmployeeModal' class='edit' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>
                <a href='#' id='{$row['user_id']}' class='delete text-danger confirm_delete_btn' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>
                </td>
            </tr>
        ";
        }
    } else {
        echo "
            <tr>
                <td colspan='8'>No Record Found!</td>
            </tr>";
    }
}

function delete_user()
{
    global $connection; {
        if (isset($_POST['confirm_delete_btn'])) {

            $user_id = $_POST['delete_id'];

            $delete_user_query = "DELETE FROM users WHERE user_id = {$user_id} ";
            $result = mysqli_query($connection, $delete_user_query);

            confirm_query($result);

            header("Location: users.php");
        }
    }
}

function delete_multiple_users_by_checkbox()
{
    global $connection; {
        if (isset($_POST['confirm_delete_multiple_btn'])) {

            $user_ids = $_POST['delete_ids'];

            $sanitizedIds = array_map('intval', $user_ids);
            $sanitizedIds = implode(',', $user_ids);

            // Construct the SQL query to delete records with the selected IDs
            $delete_user_query = "DELETE FROM users WHERE user_id IN($sanitizedIds) ";

            $result = mysqli_query($connection, $delete_user_query);
            confirm_query($result);

            header("Location: users.php");
        }
    }
}

function add_user()
{
    global $connection;
    if (isset($_POST['add-user-submit'])) {

        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $password = $_POST['password'];

        $name = mysqli_real_escape_string($connection, $name);
        $username =  mysqli_real_escape_string($connection, $username);
        $email = mysqli_real_escape_string($connection, $email);
        $phone_number = mysqli_real_escape_string($connection, $phone_number);
        $password = mysqli_real_escape_string($connection, $password);

        $hashFormat = "$2y$10$";

        $salt = "69hellomotherfucker696";
        $hash_form_and_salt = $hashFormat . $salt;

        $password_hash = crypt($password, $hash_form_and_salt);

        if (!check_user_duplicate($username, $email, $phone_number)) {

            $user_signup_query = "INSERT INTO users(name, username, email, phone_number , password_hash) ";
            $user_signup_query .= "VALUES ('$name', '$username', '$email','$phone_number', '$password_hash')";

            $result = mysqli_query($connection, $user_signup_query);

            if (!$result) {
                die('Query Failed: ' . mysqli_error($connection));
            } else {
                header("Location: users.php");
            }
        } else {
            die('Duplicate Data');
        }
    }
}

function check_user_duplicate($username, $email, $phone_number)
{
    global $connection;

    $select_all_query = "SELECT * FROM users";

    $result = mysqli_query($connection,  $select_all_query);
    if (!$result)  die('Query Failed: ' . mysqli_error($connection));

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
