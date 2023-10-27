<?php
include 'connect.php';

    $search=$_POST['search'];
    

    //$search=mysqli_real_escape_string($conn,$result);
    $sql="SELECT upper(substring(rev_name,1,1)) as short_rev_name ,rev_name, uni_name,dept_name,details,date from review where rev_name like '%$search%' OR uni_name like '%$search%' or dept_name like '%$search%' or details like '%$search%' or date like '%$search%' ";
    $result2 = mysqli_query($conn, $sql);
    $row_count=mysqli_num_rows($result2);
    echo $row_count.' results found';
    if (mysqli_num_rows($result2) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result2))
         
            {
                
                echo "
                <link rel='stylesheet' href='mystyle.css'>
                <link rel='stylesheet' href='card_style.css'>
                <div class='flex-container'>
                  <div class='left-side'>
                      <div class='avatar-img'>".$row['short_rev_name']."</div>
                    <div class='student-name'>".$row['rev_name']."<br>".$row['date']."</div>
                  </div>
                  <div class='right-side'>
                      <div>".$row['uni_name']."</div>
                      <div>".$row['dept_name']."</div>
                      <p>".$row['details']."</P>
                  </div>
                </div>
                ";
               
            }
        }
        
     
   
?>
