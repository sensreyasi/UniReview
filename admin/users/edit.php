<?php
include '../admheader.php';
?>
            <!-- //Left Sidebar -->


            <!-- Admin Content -->
            <div class="admin-content">
                <div class="button-group">
                    <a href="create.php" class="btn btn-big">Add User</a>
                    <a href="index.php" class="btn btn-big">Manage Users</a>
                </div>


                <div class="content">

                    <h2 class="page-title">Edit User</h2>
<?php
$user = edituser($email);
?>
                    <form method="post" action="<?php echo BASE_URL . 'admin/users/edit.php'; ?>">
                        <div>
                            <label>First name</label>
                            <input type="text" name="fname"
                                class="text-input" >
                        </div>
                        <div>
                            <label>last name</label>
                            <input type="text" name="lname"
                                   class="text-input">
                        </div>
                        <div>
                            <label>Email</label>
                            <input type="email" name="email" class="text-input">
                        </div>
                        <div>
                            <label>Country</label>
                            <input type="text" name="country"
                                   class="text-input">
                        </div>
                        <div>
                            <label>Institute</label>
                            <input type="text" name="inst"
                                   class="text-input">
                        </div>
                        <div>
                            <label>Password</label>
                            <input type="password" name="password"
                                class="text-input">
                        </div>
                        <div>
                            <label>Password Confirmation</label>
                            <input type="password" name="passwordConf"
                                class="text-input">
                        </div>
                        <div>
                            <label>Role</label>
                            <select name="u_type" class="text-input">

                                <option value="Author">Author</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>


                        <button type="submit" class="btn" name="update_user">UPDATE</button>

                    </form>

                </div>

            </div>
            <!-- // Admin Content -->


        <!-- // Page Wrapper -->

</div>


    </body>

</html>
