<?php include "includes/admin_header.php"; ?>


<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin_navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Manage Users
                        <!-- <small>Author</small> -->
                    </h1>
                    <div class="container-xl">
                        <div class="table-responsive">
                            <div class="table-wrapper">
                                <div class="table-title">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <!-- <h2>Manage <b>Employees</b></h2> -->
                                        </div>
                                        <div class="col-sm-4">
                                            <a href=""><a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a></a>
                                            <a href="" class="btn btn-danger delete_multiple_user_btn" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete Selected</span></a>
                                        </div>
                                    </div>
                                </div>
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                <span class="custom-checkbox">
                                                    <input type="checkbox" id="selectAll">
                                                    <label for="selectAll"></label>
                                                </span>
                                            </th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>User Type</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php all_user_details(); ?>

                                    </tbody>
                                </table>
                                <div class="clearfix">
                                    <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                                    <ul class="pagination">
                                        <li class="page-item disabled"><a href="#">Previous</a></li>
                                        <li class="page-item"><a href="#" class="page-link">1</a></li>
                                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                                        <li class="page-item active"><a href="#" class="page-link">3</a></li>
                                        <li class="page-item"><a href="#" class="page-link">4</a></li>
                                        <li class="page-item"><a href="#" class="page-link">5</a></li>
                                        <li class="page-item"><a href="#" class="page-link">Next</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Add Modal HTML -->
                    <div id="addEmployeeModal" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="" method="POST">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Add User</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input name="name" type="text" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input name="username" type="text" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input name="email" type="email" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input name="phone_number" type="number" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input name="password" type="password" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                        <input name="add-user-submit" type="submit" class="btn btn-success" value="Add">
                                        <?php add_user(); ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Modal HTML -->
                    <div id="editEmployeeModal" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form>
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit Employee</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea class="form-control" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="text" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                        <input name="submit-save" type="submit" class="btn btn-info" value="Save">

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Modal HTML -->
                    <div id="deleteUserModal" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="" method="POST">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Delete Employee</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="user_id" id="confirm_delete_id">
                                        <p>Are you sure you want to delete these Records?</p>
                                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                        <input type="submit" class="btn btn-danger" value="Delete">

                                        <?php delete_user(); ?>

                                        <?php delete_multiple_users_by_checkbox(); ?>

                                    </div>
                                </form>
                            </div>
                        </div>
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

<script>
    $(document).ready(function() {

        // Delete single user
        $(".confirm_delete_btn").click(function() {

            user_id = $(this).attr('id')
            $('#confirm_delete_id').val(user_id)
            // alert(user_id)

            $('#deleteUserModal').modal('show')

            $.ajax({
                url: 'users.php',
                method: 'POST',
                data: {
                    'confirm_delete_btn': true,
                    'delete_id': user_id,
                },
                success: function(result) {
                    // $("#deleteUserModal").html(result);
                }
            });

        });

        // Delete multiple users at once by selecting the checkbox
        $(".delete_multiple_user_btn").click(function() {

            let selectedCheckboxes = [];
            $('input[type="checkbox"]:checked').each(function() {
                // Push the ID of the selected checkbox into the array
                if ($(this).attr('value') !== undefined && $(this).attr('value') !== '') selectedCheckboxes.push($(this).attr('value'));
            });
            $('#confirm_delete_id').val(selectedCheckboxes)

            $('#deleteUserModal').modal('show')

            $.ajax({
                url: 'users.php',
                method: 'POST',
                data: {
                    'confirm_delete_multiple_btn': true,
                    'delete_ids': selectedCheckboxes,
                },
                success: function(result) {
                    // console.log(result);
                }
            });

        });

        // Activate tooltip
        $('[data-toggle="tooltip"]').tooltip();

        // Select/Deselect checkboxes
        var checkbox = $('table tbody input[type="checkbox"]');
        $("#selectAll").click(function() {
            if (this.checked) {
                checkbox.each(function() {
                    this.checked = true;
                });
            } else {
                checkbox.each(function() {
                    this.checked = false;
                });
            }
        });
        checkbox.click(function() {
            if (!this.checked) {
                $("#selectAll").prop("checked", false);
            }
        });
    });
</script>

<?php "includes/admin_footer.php";  ?>