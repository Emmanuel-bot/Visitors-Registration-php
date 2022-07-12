<!DOCTYPE html>
<html>
<head>
    <title>Zetech</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
</head>
<body>
<div class="Container">
    <div class="row col-md-8 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading text-center">
                <h1> List of visitors </h1>
            </div>
            
            <?php
            $conn = new mysqli('localhost', 'root', '', 'zetech_db');

            if ($conn -> connect_error){
                echo "$conn -> connect_error";
                die("connection Failed.. :" .conn -> connect_error);
            }
            $sql = "SELECT id, firstname, lastname, Purpose FROM visitors";
            $result=$conn->query($sql);
            echo "<b>", "id", " " , " " ," Firstname", "</b>";
            if ($result->num_rows > 0){
                while($row = $result ->fetch_assoc()){
                    echo "<br>" .$row["id"] . $row["firstname"]. " ". 
                    $row["lastname"] . $row["Purpose"]. "<br>";
                    // echo "<br> id : ". $row["id"]. " -Name: ". $row["firstname"]. " ". 
                    // $row["lastname"] ." ". "Purpose: " . $row["Purpose"]. "<br>";
                }
            }else {
                echo "o results";
            }
            $conn->close();
            ?>
        </div>
    </div>
</div>
</body>
</html>