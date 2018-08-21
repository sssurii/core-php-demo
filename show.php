<?php

       $host = getenv('DB_HOST')? getenv('DB_HOST') : 'localhost';
    $dbname = getenv('DB_NAME')? getenv('DB_NAME') :'test_db';
    $user = getenv('DB_USER')? getenv('DB_USER') :'postgres';
    $password = getenv('DB_PASSWORD')? getenv('DB_PASSWORD') : 'postgres';
    $port = getenv('DB_PORT')? getenv('DB_PORT') : '5432';


    $conn = pg_connect("host=$host dbname=$dbname user=$user password=$password port=$port");

    if(!$conn) {
        echo 'There has been an error connecting';
        die;
    }

    $create_table = pg_query($conn, "CREATE TABLE IF NOT EXISTS test_data (
                                        id SERIAL PRIMARY KEY,
                                        content CHARACTER VARYING(255) NOT NULL,
                                        created_at DATE NOT NULL
                                    );");

    $select =  pg_query($conn, "Select * from test_data");

    $data = pg_fetch_all($select);

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Core PHP Demo</title>
</head>

<body >
    <?php 
    if(!empty($data)){ ?>
        <h2> Records Table </h2>
        <table border="1">
            <thead>
                <tr>
                    <th>
                        Sno.
                    </th>

                    <th>
                        Content
                    </th>

                    <th>
                        Created
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $key => $row) { ?>
                    <tr>
                        <th>
                            <?php echo ($key+1); ?>
                        </th>

                        <th>
                            <?php echo $row['content']; ?>
                        </th>

                        <th>
                            <?php echo $row['created_at']; ?>
                        </th>
                    </tr>  
               <?php } ?>
            </tbody>
        </table>
      <?php 
    echo '<a href="/add.php" title="Add record">Add record </a>';
    }
    else {
        echo 'No Record found! <a href="/add.php" title="Add record"> Add record </a>';
    } 
    ?>
</body>

</html>