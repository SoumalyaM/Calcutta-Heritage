<?php include "includes/admin_header.php" ?>
<?php

if (isset($_SESSION['username'])) {

    $username = $_SESSION['username'];

    $select_user_profile_query = "SELECT * FROM users WHERE username = '{$username}' ";

    $result = mysqli_query($connection, $select_user_profile_query);

    while ($row = mysqli_fetch_array($result)) {

        $user_id = $row['user_id'];
        $name = $row['name'];
        $username = $row['username'];
        $email = $row['email'];
        $password = $row['password_hash'];
        $user_type = $row['user_type'];
    }
}

?>


<?php



if (isset($_POST['edit_user'])) {

    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $email =  mysqli_real_escape_string($connection, $email);
    $password = mysqli_real_escape_string($connection, $password);

    $hashFormat = "$2y$10$";

    $salt = "69hellomotherfucker696";
    $hash_form_and_salt = $hashFormat . $salt;

    $password_hash = crypt($password, $hash_form_and_salt);

    $query = "UPDATE users SET ";
    $query .= "name  = '{$name}', ";
    $query .= "username = '{$username}', ";
    $query .= "email = '{$email}', ";
    $query .= "password_hash   = '{$password_hash}' ";
    $query .= "WHERE username = '{$username}' ";


    $result = mysqli_query($connection, $query);

    confirm_query($result);
}

?>


<div id="wrapper">

    <!-- Navigation -->

    <?php include "includes/admin_navigation.php" ?>


    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">
                        Welcome to admin
                        <span><b><?php echo $_SESSION['username']; ?></b></span>
                    </h1>

                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="title">Name</label>
                            <input type="text" value="<?php echo $name; ?>" class="form-control" name="name">
                        </div>

                        <div class="form-group">
                            <label for="post_tags">Username</label>
                            <input type="text" value="<?php echo $username; ?>" class="form-control" name="username">
                        </div>

                        <div class="form-group">
                            <label for="post_content">Email</label>
                            <input type="email" value="<?php echo $email; ?>" class="form-control" name="email">
                        </div>

                        <div class="form-group">
                            <label for="post_content">Password</label>
                            <input autocomplete="off" type="password" class="form-control" name="password">
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="edit_user" value="Update Profile">
                        </div>

                    </form>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>


    <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php" ?>