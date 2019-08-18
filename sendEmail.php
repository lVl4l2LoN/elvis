<html>
    <title>Elvis Email PHP script</title>
    <body>
        <?php
            $from = 'elmer@makemeelvis.com';
            $subject = $_POST['subject'];
            $text = $_POST['elvisEmail'];
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
                echo '<a href = "sendEmail.html">Go back</a>';
            }
            if(empty($subject) || empty($text) ){
                    echo 'The subject or text or both are empty. <br>'.
                    "<a href=sendEmail.html>Go back</a>";
                
            }
            
            
        ?>
    </body>
</html>