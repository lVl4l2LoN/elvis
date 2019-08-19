<html>
    <title>Make Me Elvis - Remove Email Page</title>
    <body>
        <p>Please  select the email addresses to delete from the email list and click Remove</p>
        <form method = "POST" action = "<?php echo $_SERVER['PHP_SELF']; ?>">
            <?php
                $dbc = mysqli_connect('localhost','root','','elvis_store')
                or die('Error connecting to MySQL server.');
                
                if(isset($_POST['submit'])&& !empty($_POST['todelete'])){

                    foreach($_POST['todelete'] as $delete_id){
                        $query="DELETE FROM email_list WHERE id=$delete_id";
                        mysqli_query($dbc,$query)
                        or die('Error querying database');
                        $delete_flag = true;
                    }
                         echo'Customer(s) removed: '.'<br>';
                         
                   
                }
                

                //Display customer rows with checkboxes for deleting

                $query = "SELECT * FROM email_list";
                $result = mysqli_query($dbc, $query);

                while($row=mysqli_fetch_array($result)){
                    echo'<input type ="checkbox" value="' .$row['id'].'" name="todelete[]">';
                    echo $row['first_name'];
                    echo ' '.$row['last_name'];
                    echo ' '.$row['email'];
                    echo '<br>';

                }
                mysqli_close($dbc);
                
                

                
                
                //echo'<a href="removeEmail.html">Go Back</a>'
            ?>
            <input type="submit" name="submit" value = "Remove">
        </form>
        

    </body>
</html>