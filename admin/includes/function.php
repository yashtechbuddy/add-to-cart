<?php
function deleteRecord($table, $condition)
{

    global $conn;

    $query = "DELETE FROM $table WHERE $condition";

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<script type="text/javascript">alert("Record is deleted") </script>';
    } else {
        echo '<script type="text/javascript">alert("some thing went wrong!") </script>';
    }
}

// function generateUniqueID()
// {
//     $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_=+';
//     $length = 12;
//     $id = '';

//     do {
//         $id = '';
//         for ($i = 0; $i < $length; $i++) {
//             $id .= $characters[rand(0, strlen($characters) - 1)];
//         }
//     } while (!isIDUnique($id));

//     return $id;
// }

// function isIDUnique($id)
// {

//     global $conn;
//     // Check if the ID exists in the database
//     $query = "SELECT id FROM tbl_inquiry WHERE autogenrated_id = '$id'";
//     $result = mysqli_query($conn, $query);

//     if (mysqli_num_rows($result) > 0) {
//         return false; // ID already exists
//     }

//     return true; // ID is unique
// }

function generateID()
{
    $alphabets = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $specialCharacter = '!@#$%^&*()-_=+';
    $numbers = '0123456789';

    $id = '';
    $id .= $alphabets[rand(0, strlen($alphabets) - 1)];
    $id .= $alphabets[rand(0, strlen($alphabets) - 1)];
    $id .= $alphabets[rand(0, strlen($alphabets) - 1)];
    $id .= $alphabets[rand(0, strlen($alphabets) - 1)];
    $id .= $alphabets[rand(0, strlen($alphabets) - 1)];
    $id .= $specialCharacter[rand(0, strlen($specialCharacter) - 1)];

    for ($i = 0; $i < 10; $i++) {
        $id .= $numbers[rand(0, strlen($numbers) - 1)];
    }

    return $id;
}

function generateUniqueID()
{
    global $conn;

    do {
        $newID = generateID();
        $query = "SELECT id FROM tbl_inquiry WHERE autogenrated_id = '$newID'";
        $result = mysqli_query($conn, $query);
    } while (mysqli_num_rows($result) > 0);

    return $newID;
}


function Insert($table, $data)
{

    global $conn;
    //print_r($data);

    $fields = array_keys($data);
    $values = array_map(array($conn, 'real_escape_string'), array_values($data));

    //echo "INSERT INTO $table(".implode(",",$fields).") VALUES ('".implode("','", $values )."');";
    //exit;  
    $qry = mysqli_query($conn, "INSERT INTO $table(" . implode(",", $fields) . ") VALUES ('" . implode("','", $values) . "');") or die(mysqli_error($conn));

    return true;
}
function Update($table_name, $form_data, $where_clause = '')
{
    global $conn;
    // check for optional where clause
    $whereSQL = '';
    if (!empty($where_clause)) {
        // check to see if the 'where' keyword exists
        if (substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE') {
            // not found, add key word
            $whereSQL = " WHERE " . $where_clause;
        } else {
            $whereSQL = " " . trim($where_clause);
        }
    }
    // start the actual SQL statement
    $sql = "UPDATE " . $table_name . " SET ";

    // loop and build the column /
    $sets = array();
    foreach ($form_data as $column => $value) {
        $sets[] = "`" . $column . "` = '" . $value . "'";
    }
    $sql .= implode(', ', $sets);

    // append the where statement
    $sql .= $whereSQL;

    // run and return the query result
    return mysqli_query($conn, $sql);
}
