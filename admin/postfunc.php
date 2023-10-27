<?php
include_once '../config.php';
// Post variables
$isEditingPost = false;
$published = 0;




/*if (isset($_POST['create_post'])) { createPost($_POST); }
// if user clicks the Edit post button
if (isset($_GET['edit-post'])) {
    $isEditingPost = true;
    $post_id = $_GET['edit-post'];
    editPost($post_id);
}
// if user clicks the update post button
if (isset($_POST['update_post'])) {
    updatePost($_POST);
}*/
// if user clicks the Delete post button
if (isset($_GET['delete-review'])) {
    $id = $_GET['delete-review'];
    deletereview($id);
}

/* - - - - - - - - - -
-  Post functions
- - - - - - - - - - -*/
// get all posts from DB



function getAllReview()
{
    global $db;

    // Admin can view all posts
    // Author can only view their posts

        $sql = "SELECT * FROM review";

    $result = mysqli_query($db, $sql);
    $reviews = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $reviews;
}







function deletereview($id)
{
    global $db;
    $sql = "DELETE FROM review WHERE id='$id'";
    if (mysqli_query($db, $sql)) {
        $_SESSION['message'] = "Post successfully deleted";
        header("location: index.php");
        exit(0);
    }
}

if (isset($_GET['publish']) || isset($_GET['unpublish'])) {
    $message = "";
    if (isset($_GET['publish'])) {
        $message = "Post published successfully";
        $id = $_GET['publish'];
    } else if (isset($_GET['unpublish'])) {
        $message = "Post successfully unpublished";
        $id = $_GET['unpublish'];
    }
    togglePublishPost($id, $message);
}
// delete blog post
function togglePublishPost($id, $message)
{
    global $db;
    $sql = "UPDATE review SET published=!published WHERE id='$id'";

    if (mysqli_query($db, $sql)) {
        $_SESSION['message'] = $message;
        header("location: index.php");
        exit(0);
    }
}
?>
