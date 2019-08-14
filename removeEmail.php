<html>
    <title>Make Me Elvis - Remove Email Page</title>
    <body>

        <?php
            $dbc = mysqli_connect('localhost','root','','elvis_store')
            or die('Error connecting to MySQL server.');

            $email = $_POST['email'];

            $query = "DELETE FROM email_list WHERE email = '$email'";

            mysqli_query($dbc, $query)
            or die('Error querying database.');

            echo'Customer removed: '. $email.'<br>';
            mysqli_close($dbc);
            echo'<a href="removeEmail.html">Go Back</a>'
        ?>

    </body>
</html>