
<?php include "includes/admin_header.php"; ?>

<?php delete_attractions(); ?>


<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin_navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Manage attractions
                        <!-- <small>Author</small> -->
                    </h1>

                    <!--Add Category Form-->
                    <div class="col-xs-6">

                    <!-- Update attraction form -->
                        <?php if (isset($_GET['edit'])) include "includes/update_attractions.php"; ?>

                        <h4><b>Add Attractions:</b></h4>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="cat-title">Attraction Name:</label>
                                <input type="text" class="form-control" name="attraction_name">
                            </div>
                            <div class="form-group">
                                <label for="cat-title">Description:</label>
                                <input type="text" class="form-control" name="attraction_description">
                            </div>
                            <div class="form-group">
                                <label for="cat-title">Image:</label>
                                <input type="file"  name="attraction_image">
                            </div>
                            <div class="form-group">
                                <label for="cat-title">Opening Hour:</label>
                                <input type="text" class="form-control" name="attraction_opening_hour">
                            </div>
                            <div class="form-group">
                                <label for="cat-title">Ticket Price:</label>
                                <input type="text" class="form-control" name="attraction_ticket_price">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Attraction">
                            </div>

                            <?php create_attractions(); ?>

                        </form>
                    </div>


                    <div class="col-xs-6">
                    <h4><b>All Attractions:</b></h4>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Attraction Name</th>
                                    <th>Ticket Price</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php read_attractions(); ?>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include "includes/admin_footer.php"; ?>