<?php
include 'header.php';
if($_SESSION['user']['u_type']==NULL)
{
    header('location: login.php');
}
?>


     
<div class="container">
  <form name = "myform" action="review-action.php" method="POST">
    <h1>write your review</h1>
    Reviewer Name:
    <input type="text" name="rename" placeholder="Your  name..">
    University Name:
    <input type="text" name="uname" placeholder="Your University name..">

    Department Name:
    <input type="text"  name="dname" placeholder="Your Department name..">

    
    Details:
    <textarea name="details" placeholder="Description..." style="height:200px"></textarea>

    <input type="submit" value="Post" >
  </form>
      </div>
    </form>
  </div>
  




<div class="footer">
  <p>Footer</p>
</div>

</body>
</html>


