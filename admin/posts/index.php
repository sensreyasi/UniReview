<?php
include '../admheader.php';
include '../postfunc.php';
?>


        <!-- Admin Page Wrapper -->

            <!-- // Left Sidebar -->

            <?php
            $reviews = getAllReview();
            ?>
            <!-- Admin Content -->
            <div class="admin-content">
                <div class="button-group">
                    <a href="../../review.php" class="btn btn-big">Add Post</a>
                    <a href="#" class="btn btn-big">Manage Posts</a>
                </div>

                <?php
                include '../message.php';
                ?>
                <div class="content">

                    <h2 class="page-title">Manage Posts</h2>
                    <?php if (empty($reviews)): ?>
                        <h1>No Reviews in the database.</h1>
                    <?php else: ?>
                    <table>
                        <thead>
                            <th>No</th>
                            <th>University</th>
                            <th>Review</th>
                            <th>Author</th>
                            <th colspan="3">Action</th>
                        </thead>

                        <tbody>
                        <?php $i=1; ?>
                        <?php foreach ($reviews as $key => $review): ?>
                            
                            <tr>
                                <td><?php echo $i; ?></td>
                                <?php $i++; ?>
                                <td><?php echo $review['uni_name']; ?></td>
                                <td><?php echo $review['details']; ?></td>
                                <td><?php echo $review['rev_name']; ?></td>
                                <td><a href="index.php?delete-review=<?php echo $review['id'] ?>" class="delete">delete</a></td>
                                <?php if ($review['published'] == true): ?>
                                <td>    <a class="unpublish"
                                       href="index.php?unpublish=<?php echo $review['id']; ?>">Unpublish
                                    </a></td>
                                <?php else: ?>
                                   <td> <a class="publish"
                                       href="index.php?publish=<?php echo $review['id']; ?>">Publish
                                    </a>
                                   </td>
                                <?php endif ?>
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
