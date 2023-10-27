<?php
include 'header.php';
?>


     
<div class="container">
  <form name = "myform" action="contact-action.php" method="POST">
    <h1>Contact Us</h1>
     Name:
    <input type="text" name="cname" placeholder="Your  name..">
    Email:
    <input type="text" name="cemail" placeholder="Your email address..">

    Subject:
    <input type="text"  name="csubject" placeholder="write subject..">

    
    Message:
    <textarea name="cmessage" placeholder="type your message here..." style="height:200px"></textarea>

    <input type="submit" value="send" >
  </form>
      </div>
    </form>
  </div>
  



<?php
include 'footer.php';
?>


</body>
</html>


