<?php

echo "<h1>Hello World from SQL</h1>";

// Define connection parameters
define("DB_SERVERNAME", "localhost:8889");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_NAME", "db_university");

// Connect
$conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn && $conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;

    return;
}

echo "<h2>Connection ok</h2>";

$sql = "
SELECT *
FROM degrees
";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<div><h2>" . $row['name'] . " (" . $row['level'] . ")</h2>"
            . $row['address'] . "<br>" . $row['website'] . "<br>" . $row['email']
            . "</div>";
    }
} elseif ($result) {
    echo "0 results";
} else {
    echo "query error";
}

$conn->close();