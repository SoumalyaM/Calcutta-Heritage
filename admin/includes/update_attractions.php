<h4><b>Edit Attractions:</b></h4>
<form action="" method="post" enctype="multipart/form-data">

    <?php

        global $connection;
        if (isset($_GET['edit'])) {

            $get_attraction_id = $_GET['edit'];


            $select_all_attractions_query = "SELECT * FROM attractions WHERE attraction_id = {$get_attraction_id} ";
            $result = mysqli_query($connection, $select_all_attractions_query);

            if (!$result) die('Query Failed: ' . mysqli_error($connection));

            while ($row = mysqli_fetch_assoc($result)) {
                $attraction_id = $row['attraction_id'];
                $attraction_name = $row['attraction_name'];
                $attraction_description = $row['attraction_description'];
                $attraction_image_present = $row['attraction_image_url'];
                $attraction_opening_hour = $row['attraction_opening_hour'];
                $attraction_ticket_price = $row['attraction_ticket_price'];


    ?>

            <div class="form-group">
                <label for="cat-title">Attraction Name:</label>
                <input value=" <?php if (isset($attraction_name)) echo "$attraction_name"; ?> " type="text" class="form-control" name="attraction_name">
            </div>
            <div class="form-group">
                <label for="cat-title">Description:</label>
                <input value=" <?php if (isset($attraction_description)) echo "$attraction_description" ?> " type="text" class="form-control" name="attraction_description">
            </div>
            <div class="form-group">
                <label for="cat-title">Image:</label>
                <input type="file"  name="attraction_image">
                <?php 
                    if(isset($attraction_image_present)) 
                        echo "  <p>File already present: </p>
                                <img height='100' src='../attraction_images/$attraction_image_present' alt='$attraction_name'>
                                <br>
                                $attraction_image_present
                            "; 
                ?>
            </div>

            <div class="form-group">
                <label for="cat-title">Opening Hour:</label>
                <input value=" <?php if (isset($attraction_opening_hour)) echo "$attraction_opening_hour" ?> " type="text" class="form-control" name="attraction_opening_hour">
            </div>
            <div class="form-group">
                <label for="cat-title">Ticket Price:</label>
                <input value=" <?php if (isset($attraction_ticket_price)) echo "$attraction_ticket_price" ?> " type="text" class="form-control" name="attraction_ticket_price">
            </div>

    <?php    

            }
        }
    
    ?>

            <div class="form-group">
                <input class="btn btn-primary" type="submit" name="update" value="Update Attraction">

                <?php update_attractions(); ?>

            </div>
</form>


