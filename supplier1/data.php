<?php
require 'includes/config.php';

// dept and role relation
if (isset($_POST['dId'])) {
    $dept_id = $_POST['dId'];
    $sql = "SELECT * FROM tbl_role WHERE dept_id =" . $dept_id;


    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        echo '<option disabled="" selected="">--Choose Role -- </option>';
        while ($row = mysqli_fetch_assoc($result)) {
            // json_encode($row);
            echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
        };
    }
}

// kg unit
if (isset($_POST['pid'])) {
    $pid = $_POST['pid'];
    $sql = "SELECT tbl_volume.*,tbl_volume.volume_name  as volume_name , tbl_volume.id as vid  FROM tbl_product 
        JOIN tbl_volume on tbl_product.volume_id = tbl_volume.id
        WHERE tbl_product.id =" . $pid;


    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $sentence = $row['volume_name'];
    $volumeId = $row['vid'];

    // Step 2: Break the sentence into individual words or options
    $options = explode(' ', $sentence);
    // Replace "dropdown" with your desired name for the select element
    
    foreach ($options as $option) {
        echo '<option value="' . $option . '">' . $option . '</option>';
    }
}


if (isset($_POST['category_id'])) {
    $cid = $_POST['category_id'];
    
    // Assuming your database connection is already established and stored in $conn
    
    $sql = "SELECT id, product_name FROM tbl_product WHERE category_id = " . $cid;
    
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        echo '<option value="">Select a product</option>'; 
        
        while ($row = mysqli_fetch_assoc($result)) {
            $productId = $row['id'];
            $productName = $row['product_name'];
            echo '<option value="' . $productId . '">' . $productName . '</option>';
        }
    } else {
            echo '<option value="">No products available</option>';
    }
}




//visibility

if (isset($_POST['id']) && isset($_POST['tbl']) && isset($_POST['field'])) {
    $id = $_POST['id'];
    $tbl = $_POST['tbl'];
    $field = $_POST['field'];
    $sql = "SELECT * from `$tbl` where id ='" . $id . "'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
    $status = $data[$field];

    if ($status == '1') {
        $status = '2';
    } else {
        $status = '1';
    }

    $updateSql = "UPDATE `$tbl`  SET `$field` ='" . $status . "' WHERE id='" . $id . "'";
    $result = mysqli_query($conn, $updateSql);
    if ($result) {
        echo $status;
    }
}



//check department duplicate and add department

if (isset($_POST['department'])) {
    $department = $_POST['deptname'];
    // header('location:manage-department.php');
    $checkDept = "SELECT * FROM tbl_dept WHERE name = ('$department') ";
    $result = mysqli_query($conn, $checkDept);
    if (mysqli_num_rows($result) > 0) {
        echo '<script>alert("Department is already present!");</script>';
        echo '<script>window.location.href = "manage-department.php";</script>';
    } else {
        $checkDept = "INSERT INTO tbl_dept(name) values('$department') ";
        $result = mysqli_query($conn, $checkDept);
        if (!$result) {
            echo '<script>alert("Something Went wrong");</script>';
            echo '<script>window.location.href = "manage-department.php";</script>';
        } else {
            echo '<script>alert("Department is successfuly Inserted..");</script>';
            echo '<script>window.location.href = "manage-department.php";</script>';
        }
    }
}

//add role
if (isset($_POST['addrole'])) {
    $roleName = $_POST['role'];
    $deptId = $_POST['dept1'];
    // header('location:manage-department.php');
    $checkDept = "SELECT * FROM tbl_role WHERE name = ('$roleName') ";
    $result = mysqli_query($conn, $checkDept);
    if (mysqli_num_rows($result) > 0) {
        echo '<script>alert("Role is already present!");</script>';
        echo '<script>window.location.href = "manage-role.php";</script>';
    } else {
        $checkDept = "INSERT INTO tbl_role(name,dept_id) values('$roleName',$deptId) ";
        $result = mysqli_query($conn, $checkDept);
        if (!$result) {
            echo '<script>alert("Something Went wrong");</script>';
            echo '<script>window.location.href = "manage-role.php";</script>';
        } else {
            echo '<script>alert("Role is successfuly Inserted..");</script>';
            echo '<script>window.location.href = "manage-role.php";</script>';
        }
    }
} 

//dept validatoin
// if (isset($_POST['deptName'])) {
//     $deptName = $_POST['deptName'];
//     $checkDept = "SELECT * FROM tbl_dept WHERE name = '" . $deptName . "'";

//     $rows = mysqli_query($conn, $checkDept);
//     if (mysqli_num_rows($rows) > 0) {
//         echo "<span style='color:#ff3b58'>Department Name Already Exist</span>";
//     } else {
//         echo "";
//     }
// }