<?php

header("Access-Control-Allow-Origin: *");
require '../vendor/autoload.php';
$router = new \Bramus\Router\Router();
$dotenv = Dotenv\Dotenv::createImmutable("../")->load();

$router->get("/academic", function () {
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("SELECT * FROM academic_area");
    $res->execute();
    $res = $res->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($res);
});

$router->post("/academic", function () {
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

$router->put("/academic", function () {
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

$router->delete("/academic", function () {
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

$router->get("/adminarea", function () {
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("SELECT * FROM admin_area");
    $res->execute();
    $res = $res->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($res);
});

$router->post("/adminarea", function () {
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

$router->put("/adminarea", function () {
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

$router->delete("/adminarea", function () {
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

$router->get("/areas", function () {
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("SELECT * FROM areas");
    $res->execute();
    $res = $res->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($res);
});

$router->post("/areas", function () {
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("INSERT INTO areas(name_area) VALUES(:nameArea);");
    $res->bindValue('nameArea', $_DATA['nameArea']);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router->put("/areas", function () {
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("UPDATE areas SET name_area = :nameArea WHERE id = :id;");
    $res->bindValue('id', $_DATA['id']);
    $res->bindValue('nameArea', $_DATA['nameArea']);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router->delete("/areas", function () {
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

$router->get("/campers", function () {
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("SELECT * FROM campers");
    $res->execute();
    $res = $res->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($res);
});

$router->post("/campers", function () {
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

$router->put("/campers", function () {
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

$router->delete("/campers", function () {
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

$router->get("/chapters", function () {
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("SELECT * FROM chapters");
    $res->execute();
    $res = $res->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($res);
});

$router->post("/chapters", function () {
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

$router->put("/chapters", function () {
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

$router->delete("/chapters", function () {
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("DELETE FROM chapters WHERE id = :id;");
    $res->bindValue('id', $_DATA['id']);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

/**
 * ! - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - !
 */

$router->get("/cities", function () {
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("SELECT * FROM cities");
    $res->execute();
    $res = $res->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($res);
});

$router->post("/cities", function () {
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("INSERT INTO cities(name_city, id_region) VALUES(:name_city, :id_region);");
    $res->bindValue('name_city', $_DATA['name_city']);
    $res->bindValue('id_region', $_DATA['id_region']);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router->put("/cities", function () {
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("UPDATE cities SET name_city = :name_city, id_region = :id_region WHERE id = :id;");
    $res->bindValue('id', $_DATA['id']);
    $res->bindValue('name_city', $_DATA['name_city']);
    $res->bindValue('id_region', $_DATA['id_region']);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router->delete("/cities", function () {
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("DELETE FROM cities WHERE id = :id;");
    $res->bindValue('id', $_DATA['id']);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

/**
 * ! - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - !
 */

$router->get("/contact_info", function () {
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("SELECT * FROM contact_info");
    $res->execute();
    $res = $res->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($res);
});

$router->post("/contact_info", function () {
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("INSERT INTO contact_info(id_staff, whatsapp, instagram, linkedin, email, address, cel_number) VALUES(:id_staff, :whatsapp, :instagram, :linkedin , :email, :address, :cel_number);");
    $res->bindValue('id_staff', $_DATA['id_staff']);
    $res->bindValue('whatsapp', $_DATA['whatsapp']);
    $res->bindValue('instagram', $_DATA['instagram']);
    $res->bindValue('linkedin', $_DATA['linkedin']);
    $res->bindValue('email', $_DATA['email']);
    $res->bindValue('address', $_DATA['address']);
    $res->bindValue('cel_number', $_DATA['cel_number']);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router->put("/contact_info", function () {
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("UPDATE contact_info SET id_staff = :id_staff, whatsapp = :whatsapp, instagram = :instagram, linkedin = :linkedin, email = :email, address =:address, cel_number = :cel_number WHERE id = :id;");
    $res->bindValue('id', $_DATA['id']);
    $res->bindValue('id_staff', $_DATA['id_staff']);
    $res->bindValue('whatsapp', $_DATA['whatsapp']);
    $res->bindValue('instagram', $_DATA['instagram']);
    $res->bindValue('linkedin', $_DATA['linkedin']);
    $res->bindValue('email', $_DATA['email']);
    $res->bindValue('address', $_DATA['address']);
    $res->bindValue('cel_number', $_DATA['cel_number']);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router->delete("/contact_info", function () {
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("DELETE FROM contact_info WHERE id = :id;");
    $res->bindValue('id', $_DATA['id']);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

/**
 * ! - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - !
 */

$router->get("/countries", function () {
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("SELECT * FROM countries");
    $res->execute();
    $res = $res->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($res);
});

$router->post("/countries", function () {
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("INSERT INTO countries(name_country) VALUES(:name_country);");
    $res->bindValue('name_country', $_DATA['name_country']);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router->put("/countries", function () {
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("UPDATE countries SET name_country = :name_country WHERE id = :id;");
    $res->bindValue('id', $_DATA['id']);
    $res->bindValue('name_country', $_DATA['name_country']);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router->delete("/countries", function () {
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("DELETE FROM countries WHERE id = :id;");
    $res->bindValue('id', $_DATA['id']);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

/**
 * ! - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - !
 */

$router->get("/design_area", function () {
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("SELECT * FROM design_area");
    $res->execute();
    $res = $res->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($res);
});

$router->post("/design_area", function () {
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("INSERT INTO design_area(id_area, id_staff, id_position, id_journey) VALUES(:idArea, :idStaff, :idPosition, :idJourney);");
    $res->bindValue('idArea', $_DATA['id_area']);
    $res->bindValue('idStaff', $_DATA['id_staff']);
    $res->bindValue('idPosition', $_DATA['id_position']);
    $res->bindValue('idJourney', $_DATA['id_journey']);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router->put("/design_area", function () {
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("UPDATE design_area SET id_area = :idArea, id_staff = :idStaff, id_position = :idPosition, id_journey = :idJourney WHERE id = :id;");
    $res->bindValue('id', $_DATA['id']);
    $res->bindValue('idArea', $_DATA['id_area']);
    $res->bindValue('idStaff', $_DATA['id_staff']);
    $res->bindValue('idPosition', $_DATA['id_position']);
    $res->bindValue('idJourney', $_DATA['id_journey']);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router->delete("/design_area", function () {
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("DELETE FROM design_area WHERE id = :id;");
    $res->bindValue('id', $_DATA['id']);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

/**
 * ! - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - !
 */

$router->get("/emergency_contact", function () {
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("SELECT * FROM emergency_contact");
    $res->execute();
    $res = $res->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($res);
});

$router->post("/emergency_contact", function () {
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("INSERT INTO emergency_contact(id_staff, cel_number, relationship, full_name, email) VALUES(:id_staff, :cel_number, :relationship, :full_name, :email);");
    $res->bindValue('id_staff', $_DATA['id_staff']);
    $res->bindValue('cel_number', $_DATA['cel_number']);
    $res->bindValue('relationship', $_DATA['relationship']);
    $res->bindValue('full_name', $_DATA['full_name']);
    $res->bindValue('email', $_DATA['email']);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router->put("/emergency_contact", function () {
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("UPDATE emergency_contact SET id_staff = :id_staff, cel_number = :cel_number, relationship = :relationship, full_name = :full_name, email = :email WHERE id = :id;");
    $res->bindValue('id', $_DATA['id']);
    $res->bindValue('id_staff', $_DATA['id_staff']);
    $res->bindValue('cel_number', $_DATA['cel_number']);
    $res->bindValue('relationship', $_DATA['relationship']);
    $res->bindValue('full_name', $_DATA['full_name']);
    $res->bindValue('email', $_DATA['email']);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router->delete("/emergency_contact", function () {
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $conn = new \App\Connect();
    $res = $conn->conn->prepare("DELETE FROM emergency_contact WHERE id = :id;");
    $res->bindValue('id', $_DATA['id']);
    $res->execute();
    $res = $res->rowCount();
    echo json_encode($res);
});

$router->run();
