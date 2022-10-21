<?php
require_once './fn-users.php';

// test search user that exists
echo "test: search user that exists";
$result = searchUser("user2", "pass2");
echo "<pre>";
print_r($result);
echo "</pre>";

// test user that does not exist
echo "test: search user that does not exist";
$result = searchUser("user9", "pass9");
echo "<pre>";
print_r($result);
echo "</pre>";


// test insert user that does not exist
echo "test: insert user that does not exist";
$success = insertUser("user07", "pass07", "registered", "name07", "surname07");
echo $success ? "inserted" : "not inserted";

// test insert user that does exist
echo "test: insert user that does not exist";
$success = insertUser("user2", "pass07", "registered", "name07", "surname07");
echo $success ? "inserted" : "not inserted";
?>
