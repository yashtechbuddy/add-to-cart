<?php 

function formatNumberWithSpaces($number) {
    // Remove any existing spaces from the number
    // $number = str_replace(' ', '', $number);

    // Add spaces after every 4 digits
    $number = preg_replace('/(\d{4})(?=\d)/', '$1 ', $number);

    // Add an additional space after every 3 digits (excluding the first space added)
    $number = preg_replace('/(\d{3})(?=\d{2}(\d{2})?$)/', '$1 ', $number);
    
    return $number;
}

function generateID()
{
    $alphabets = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $specialCharacter = '_';
    $numbers = '0123456789';

    $id = '';
    $id .= strtoupper($alphabets[rand(0, strlen($alphabets) - 1)]);
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
    global $db; // Assuming $pdo is your PDO database connection

    do {
        $newID = generateID();
        $query = "SELECT id FROM tbl_inquiry WHERE autogenrated_id = :newID";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':newID', $newID, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } while (!empty($result));

    return $newID;
}



?>