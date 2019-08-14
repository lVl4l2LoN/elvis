<html>
    <head>
        <title>Elvis Store PHP Script</title>
    </head>
    <body>

        <?php
            
            $dbc = mysqli_connect('localhost','root','','elvis_store')
            or die('Error connecting to MYSQL server');

            $first_Name = $_POST['firstName'];
            $last_Name = $_POST['lastName'];
            $email = $_POST['email'];

            $query = "INSERT INTO email_list(first_name, last_name, email)" . 
            "VALUES('$first_Name','$last_Name', '$email' )";

            $result = mysqli_query($dbc,$query)
            or die('Error querying database');

            echo 'Customer added. <a href="addemail.html">Go Back to email form</a>';

            mysqli_close($dbc);
        
        ?>

    </body>
</html>