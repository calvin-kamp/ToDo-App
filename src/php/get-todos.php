<?php
    // Database credentials
    $host = 'localhost:3306';
    $username = 'twntysmth-todo';
    $password = '&cV1m3y35';
	$dbname = 'todo-app';

    try {
        // Connect to MySQL database
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // SQL query to fetch data from your table (replace 'your_table' with your actual table name)
        $sql = "SELECT * FROM todos";
        
        // Prepare and execute the query
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
        // Fetch all rows as associative arrays
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Output data as JSON
        header('Content-Type: application/json');
        echo json_encode($result);
    } catch(PDOException $e) {
        // Handle errors
        echo "Error: " . $e->getMessage();
    }

    // Close the connection
    $conn = null;
?>