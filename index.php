<?php
/**
 * Created by PhpStorm.
 * User: Jesse de Jong
 * Date: 18-11-2017
 * Time: 13:59
 */

//Make connection
$dbc = new PDO('mysql:host=localhost;dbname=PDO', 'root', 'root');
//Prepare statement
$stmt = $dbc->prepare("INSERT INTO messages VALUES (?,?,?) ");
//Bind parameters
$stmt->bindParam(1, $userid);
$stmt->bindParam(2, $name);
$stmt->bindParam(3, $message);
//Assign values
$userid = 0;
$name = "Jesse";
$message = "Hallo";
//Fire PDO
$stmt->execute() or die ("Error PDO");
$stmt = null;

//Prepare statement
$stmt = $dbc->prepare("SELECT * FROM messages");
//Give the variable a value
$stmt->bindParam(':message', $text);
$text = 'Jesse';
//Execute PDO
$stmt->execute() or die ('Select error');
//Display all data
while($row = $stmt->fetch()){
    echo $row['message'] . '<br>';
}
