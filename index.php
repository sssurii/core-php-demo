<?php
    //$conn = pg_connect("host=ec2-54-217-214-201.eu-west-1.compute.amazonaws.com dbname=d8rg9krv4umqqm user=amdaovxrrzdnus password=9771ce3b5913a52b9da9e1db877e057c449ebcccf94134c0cecb2ece0f51d070 port=5432");
    $conn = pg_connect("host=ec2-54-217-250-0.eu-west-1.compute.amazonaws.com
 dbname=df0nfcuo9qv7p7 user=nkkcieenykgcdx password=d9d937829675d251c89805f9d940817b03107f351ba1da84515082fb41e705fb port=5432");

    if($conn) {
       echo 'connected';
    } else {
        echo 'there has been an error connecting';
    } 

    $create_table = pg_query($conn, "CREATE TABLE IF NOT EXISTS table1 (
                                        id SERIAL PRIMARY KEY,
                                        column1 CHARACTER VARYING(255) NOT NULL UNIQUE
                                    );");
    $insert = pg_query($conn, "INSERT INTO table1(column1) VALUES('Hello Word!')");

    $select =  pg_query($conn, "Select * from table1");
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Core PHP Demo</title>
</head>

<body style="background: url(https://s3-eu-west-1.amazonaws.com/clientshare-docs/company_logo/949638008.png); color:red;">
  <?php  print_r($select);
    
    echo "<br/>";
    print_r(var_dump(pg_fetch_all($select)));

    echo 'exit!';
    ?>
</body>

</html>