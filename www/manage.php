<html>
    <head>
        <title>Account Management</title>
        <meta content="text/html;charset=gb2312" http-equiv="Content-Type">
    </head>
    <body>
        <?php
        require('config.php');
        if ($_POST['Display']) {
            $UserName1 = $_POST["UserName"];
        } else {
            echo "cannot get post";
        }
        $query = "SELECT * FROM Members WHERE UserName='$UserName1'";
        $result = mysql_query($query);
        if ($result)
        {
            $row = mysql_fetch_array($result);

            $patient_id = $row['Patients_ID'];
            $query = "SELECT * FROM Patient WHERE ID='$patient_id'";
            
            $result1 = mysql_query($query);
            if ($result1)
            {
                $row = mysql_fetch_array($result1);
                echo "<table border='1'>
                <tr>
                <th>Name of Patient</th>
                <th>Age of Patient</th>
                <th>Heart Rate of Patient</th>
                <th>Body Temperature of Patient</th>
                </tr>";

                echo "<tr>";
                echo "<td>" . $row['Name'] . "</td>";
                echo "<td>" . $row['Age'] . "</td>";
                echo "<td>" . $row['Heart Rate'] . "</td>";
                echo "<td>" . $row['Body Temperature'] . "</td>";
                echo "</tr>";

                echo "</table>";
            }
            else
                echo "Result is FALSE";
        } else {
            echo mysql_error();
        }
        //echo $row['Name'] . " " . $row['Heart Rate'] . " " . $row['Body Temperature'];

        mysql_close();
        ?>
    </body>
</html>
