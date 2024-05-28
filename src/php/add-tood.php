<?php 

    $host = '178.250.170.158:3306';
    $dbname = 'todo-app';
    $username = 'twntysmth-todo';
    $password = '&cV1m3y35';

    $mysqli = new mysqli($host, $username, $password, $dbname);

    // Get the POST data
    $data = json_decode(file_get_contents("php://input"), true);

    $title = $data['title'];
    $description = $data['description'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO todos (title, description) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $description);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Record inserted successfully"]);
    } else {
        echo json_encode(["message" => "Error: " . $stmt->error]);
    }

    $stmt->close();
    $conn->close();

?>