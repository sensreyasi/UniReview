<?php
include '../admheader.php';


?>
            <!-- Admin Content -->
            <div class="admin-content">
                <div class="button-group">
                    <a href="create.php" class="btn btn-big">Add User</a>
                    <a href="index.php" class="btn btn-big">Manage Users</a>
                </div>
                <?php
                $users = getUsers();
                ?>
                <?php
                include '../message.php';
                ?>


                <div class="content">

                    <h2 class="page-title">Manage Users</h2>
                    <?php if (empty($users)): ?>
                        <h1>No Users in the database.</h1>
                    <?php else: ?>
                    <table>
                        <thead>
                            <th>No</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th colspan="2">Action</th>
                        </thead>
                        <tbody>
                        <?php foreach ($users as $key => $user): ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $user['first_name']; ?></td>
                                <td><?php echo $user['u_type']; ?></td>
                                <td><a href="edit.php?edit_user=<?php echo $user['email'] ?>" class="edit">edit</a></td>
                                <td><a href="index.php?delete_user=<?php echo $user['email'] ?>" class="delete">delete</a></td>
                            </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                    <?php endif ?>
                </div>

            </div>
            <!-- // Admin Content -->

        </div>
        <!-- // Page Wrapper -->





    </body>

</html>
