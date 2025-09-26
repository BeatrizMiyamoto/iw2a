<?php
header('Content-Type: applicativo/json; charset-utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');


$host = "localhost";
$user = "root";
$pass = "";
$db = "api_video";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error){
    http_response_code(500);
    echo json_encode(["error" -> "Falha na conexão: " . $conn->connect_error]);
    exit;
}

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isse($_GET['PESQUISA'])){
            $pesquisa= "%" . $_GET['pesquisa'] . "%";

            $stmt = $conn->prepare("SELECT * FROM projetos WHERE LOGIN LIKE ? OR NOME LIKE?");

            $stmt->bind_param("ss", $pesquisa, $pesquisa);

            $stmt->execute();

            $result = $stmt->get_result();


        }
}