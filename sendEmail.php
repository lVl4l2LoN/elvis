<html>
    <title>Elvis Email PHP script</title>
    <body>
        <?php
            $from = 'elmer@makemeelvis.com';
            $subject = $_POST['subject'];
            $text = $_POST['elvisEmail'];
            $output_form = false;
            if(empty($subject)&& empty($text)){
                echo'The subject and body are both empty. <br> <a href="sendEmail.html">Go back</a>';
                $output_form = true;
            }
            if(!(empty($subject))&& empty($text)){
                echo'The body is empty. <br> <a href="sendEmail.html">Go back</a>';
                $output_form = true;
            }
            if(empty($subject)&& !(empty($text))){
                echo' The subject is empty. <br> <a href="sendEmail.html">Go back</a>';
                $output_form = true;
            }
            if(!(empty($subject))&&!(empty($text))){
                
                $dbc = mysqli_connect('localhost','root','','elvis_store')
                or die('Error connecting to MySQL server');

                $query = "SELECT * FROM email_list";
                $result = mysqli_query($dbc, $query)
                or die('Error querying database.');

                while($row = mysqli_fetch_array($result)){
                    $first_name = $row['first_name'];
                    $last_name = $row['last_name'];

                    $msg = "Dear $first_name $last_name,\n $text";

                    $to = $row['email'];

                    mail($to, $subject, $msg, 'From: '. $from);

                    echo 'Email sent to: '. $to.'<br>';
                    
                
                
                }   
             
                mysqli_close($dbc);
    //echo $row['first_name']. ' '. $row['last_name']. ' '. $row['email']. '<br>';
                //echo '<a href = "sendEmail.html">Go back</a>';
            }

          if($output_form){         
        ?>

          <form method ="POST" action = "sendEmail.php">
            <label for="subject">Subject of email:</label><br>
            <input type="text" id="subject" name="subject" size="60"><br>
            <label for="elvisMail">Body of Email: </label><br>
            <textarea id="elvisEmail" name="elvisEmail" rows="8" cols="60"></textarea><br> 
            <input type="submit" name="submit" value="Submit">
          </form>
        <?php
          }
        ?>
    </body>
</html>