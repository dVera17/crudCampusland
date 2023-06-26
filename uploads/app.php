<?php

require '../vendor/autoload.php';
$router = new \Bramus\Router\Router();
$dotenv = Dotenv\Dotenv::createImmutable("../")->load();

$router->get("/academic", function(){
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("SELECT * FROM academic_area");
    $res->execute();    
    $res = $res->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($res);
});

$router->post("/academic", function(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("INSERT INTO academic_area(id_area, id_staff, id_position, id_journey) VALUES(:idArea, :idStaff, :idPosition, :idJourney);");
    $res->bindValue('idArea', $_DATA['id_area']);
    $res->bindValue('idStaff', $_DATA['id_staff']);
    $res->bindValue('idPosition', $_DATA['id_position']);
    $res->bindValue('idJourney', $_DATA['id_journey']);
    $res->execute();    
    $res = $res->rowCount();
    echo json_encode($res);
});

$router->put("/academic", function(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("UPDATE academic_area SET id_area = :idArea, id_staff = :idStaff, id_position = :idPosition, id_journey = :idJourney WHERE id = :id;");
    $res->bindValue('id', $_DATA['id']);
    $res->bindValue('idArea', $_DATA['id_area']);
    $res->bindValue('idStaff', $_DATA['id_staff']);
    $res->bindValue('idPosition', $_DATA['id_position']);
    $res->bindValue('idJourney', $_DATA['id_journey']);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router->delete("/academic", function(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("DELETE FROM academic_area WHERE id = :id;");
    $res->bindValue('id', $_DATA['id']);
    $res->execute();    
    $res = $res->rowCount();
    echo json_encode($res);
});

/**
 * ! - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - !
*/

$router->get("/adminarea", function(){
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("SELECT * FROM admin_area");
    $res->execute();    
    $res = $res->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($res);
});

$router->post("/adminarea", function(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("INSERT INTO admin_area(id_area, id_staff, id_position, id_journey) VALUES(:idArea, :idStaff, :idPosition, :idJourney);");
    $res->bindValue('idArea', $_DATA['id_area']);
    $res->bindValue('idStaff', $_DATA['id_staff']);
    $res->bindValue('idPosition', $_DATA['id_position']);
    $res->bindValue('idJourney', $_DATA['id_journey']);
    $res->execute();    
    $res = $res->rowCount();
    echo json_encode($res);
});

$router->put("/adminarea", function(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("UPDATE admin_area SET id_area = :idArea, id_staff = :idStaff, id_position = :idPosition, id_journey = :idJourney WHERE id = :id;");
    $res->bindValue('id', $_DATA['id']);
    $res->bindValue('idArea', $_DATA['id_area']);
    $res->bindValue('idStaff', $_DATA['id_staff']);
    $res->bindValue('idPosition', $_DATA['id_position']);
    $res->bindValue('idJourney', $_DATA['id_journey']);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router->delete("/adminarea", function(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("DELETE FROM admin_area WHERE id = :id;");
    $res->bindValue('id', $_DATA['id']);
    $res->execute();    
    $res = $res->rowCount();
    echo json_encode($res);
});

/**
 * ! - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - !
*/

$router->get("/areas", function(){
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("SELECT * FROM areas");
    $res->execute();    
    $res = $res->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($res);
});

$router->post("/areas", function(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("INSERT INTO areas(name_area) VALUES(:nameArea);");
    $res->bindValue('nameArea', $_DATA['nameArea']);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router->put("/areas", function(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("UPDATE areas SET name_area = :nameArea WHERE id = :id;");
    $res->bindValue('id', $_DATA['id']);
    $res->bindValue('nameArea', $_DATA['nameArea']);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router->delete("/areas", function(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("DELETE FROM areas WHERE id = :id;");
    $res->bindValue('id', $_DATA['id']);
    $res->execute();    
    $res = $res->rowCount();
    echo json_encode($res);
});

/**
 * ! - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - !
*/

$router->get("/campers", function(){
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("SELECT * FROM campers");
    $res->execute();    
    $res = $res->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($res);
});

$router->post("/campers", function(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("INSERT INTO campers(id_team_schedule, id_route, id_trainer, id_psycologist, id_teacher, id_level, id_journey, id_staff) VALUES(:id_team_schedule, :id_route, :id_trainer, :id_psycologist , :id_teacher, :id_level, :id_journey, :id_staff);");
    $res->bindValue('id_team_schedule', $_DATA['id_team_schedule']);
    $res->bindValue('id_route', $_DATA['id_route']);
    $res->bindValue('id_trainer', $_DATA['id_trainer']);
    $res->bindValue('id_psycologist', $_DATA['id_psycologist']);
    $res->bindValue('id_teacher', $_DATA['id_teacher']);
    $res->bindValue('id_level', $_DATA['id_level']);
    $res->bindValue('id_journey', $_DATA['id_journey']);
    $res->bindValue('id_staff', $_DATA['id_staff']);
    $res->execute();    
    $res = $res->rowCount();
    echo json_encode($res);
});
    
$router->put("/campers", function(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("UPDATE campers SET id_team_schedule = :id_team_schedule, id_route = :id_route, id_trainer = :id_trainer, id_psycologist = :id_psycologist, id_teacher = :id_teacher, id_level =:id_level, id_journey = :id_journey, id_staff = :id_staff WHERE id = :id;");
    $res->bindValue('id', $_DATA['id']);
    $res->bindValue('id_team_schedule', $_DATA['id_team_schedule']);
    $res->bindValue('id_route', $_DATA['id_route']);
    $res->bindValue('id_trainer', $_DATA['id_trainer']);
    $res->bindValue('id_psycologist', $_DATA['id_psycologist']);
    $res->bindValue('id_teacher', $_DATA['id_teacher']);
    $res->bindValue('id_level', $_DATA['id_level']);
    $res->bindValue('id_journey', $_DATA['id_journey']);
    $res->bindValue('id_staff', $_DATA['id_staff']);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router->delete("/campers", function(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("DELETE FROM campers WHERE id = :id;");
    $res->bindValue('id', $_DATA['id']);
    $res->execute();    
    $res = $res->rowCount();
    echo json_encode($res);
});

/**
 * ! - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - !
*/

$router->get("/chapters", function(){
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("SELECT * FROM chapters");
    $res->execute();    
    $res = $res->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($res);
});

$router->post("/chapters", function(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("INSERT INTO chapters(id_thematic_units, name_chapter, start_date, end_date, description, duration_days) VALUES(:id_thematic_units, :name_chapter, :start_date, :end_date, :description, :duration_days);");
    $res->bindValue('id_thematic_units', $_DATA['id_thematic_units']);
    $res->bindValue('name_chapter', $_DATA['name_chapter']);
    $res->bindValue('start_date', $_DATA['start_date']);
    $res->bindValue('end_date', $_DATA['end_date']);
    $res->bindValue('description', $_DATA['description']);
    $res->bindValue('duration_days', $_DATA['duration_days']);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});
    
$router->put("/chapters", function(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("UPDATE chapters SET id_thematic_units = :id_thematic_units, name_chapter = :name_chapter, start_date = :start_date, end_date = :end_date, description = :description, duration_days =:duration_days WHERE id = :id;");
    $res->bindValue('id', $_DATA['id']);
    $res->bindValue('id_thematic_units', $_DATA['id_thematic_units']);
    $res->bindValue('name_chapter', $_DATA['name_chapter']);
    $res->bindValue('start_date', $_DATA['start_date']);
    $res->bindValue('end_date', $_DATA['end_date']);
    $res->bindValue('description', $_DATA['description']);
    $res->bindValue('duration_days', $_DATA['duration_days']);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router->delete("/chapters", function(){
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("DELETE FROM chapters WHERE id = :id;");
    $res->bindValue('id', $_DATA['id']);
    $res->execute();    
    $res = $res->rowCount();
    echo json_encode($res);
});

$router->run();

?>