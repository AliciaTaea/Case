<?php 
    require_once('connection.php');

    if (isset($_REQUEST['update_id'])) {
        try {
            $id = $_REQUEST['update_id'];
            $select_stmt = $db->prepare("SELECT * FROM football_player WHERE id = :id");
            $select_stmt->bindParam(':id', $id);
            $select_stmt->execute();
            $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
            extract($row);
        } catch(PDOException $e) {
            $e->getMessage();
        }
    }

    if (isset($_REQUEST['btn_update'])) {
        $name_up = $_REQUEST['name'];
        $age_up = $_REQUEST['age'];
        $club_up = $_REQUEST['club'];
        $nation_up = $_REQUEST['nation'];
        $value_up = $_REQUEST['value'];

        if (empty($name_up)) {
            $errorMsg = "กรุณากรอก Name";
        }else if (empty($age_up)) {
         $errorMsg = "กรุณากรอก Age";
        } else if (empty($club_up)) {
            $errorMsg = "กรุณากรอก Club";
        } else if (empty($nation)) {
            $errorMsg = "กรุณากรอก Nation";
        } else if (empty($value_up)) {
            $errorMsg = "กรุณากรอก Value";
        } else {
            try {
                if (!isset($errorMsg)) {
                    $update_stmt = $db->prepare("UPDATE football_player SET name = :Nname_up, age = :Aage_up, club = :Cclub_up, nation = :Nnation_up, value = :Vvalue_up WHERE id = :id");
                    $update_stmt->bindParam(':Nname_up', $name_up);
                    $update_stmt->bindParam(':Aage_up', $age_up);
                    $update_stmt->bindParam(':Cclub_up', $club_up);
                    $update_stmt->bindParam(':Nnation_up', $nation_up);
                    $update_stmt->bindParam(':Vvalue_up', $value_up);
                    $update_stmt->bindParam(':id', $id);

                    if ($update_stmt->execute()) {
                        $updateMsg = "กำลังทำการแก้ไขข้อมูล กรุณารอสักครู่";
                        header("refresh:2;index.php");
                    }
                }
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Football Player(PDO)</title>

    <link rel="stylesheet" href="bootstrap/bootstrap.css">
</head>
<body>

    <div class="container">
    <div class="display-3 text-center">Edit Player</div>

    <?php 
         if (isset($errorMsg)) {
    ?>
        <div class="alert alert-danger">
            <strong>Wrong! <?php echo $errorMsg; ?></strong>
        </div>
    <?php } ?>
    

    <?php 
         if (isset($updateMsg)) {
    ?>
        <div class="alert alert-success">
            <strong>Success! <?php echo $updateMsg; ?></strong>
        </div>
    <?php } ?>

    <form method="post" class="form-horizontal mt-5">
            
            <div class="form-group text-center">
                <div class="row">
                    <label for="name" class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="age" class="col-sm-3 control-label">Age</label>
                    <div class="col-sm-9">
                        <input type="number" name="age" class="form-control" value="<?php echo $age; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="club" class="col-sm-3 control-label">Club</label>
                    <div class="col-sm-9">
                        <input type="text" name="club" class="form-control" value="<?php echo $club; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="nation" class="col-sm-3 control-label">Nation</label>
                    <div class="col-sm-9">
                        <input type="text" name="nation" class="form-control" value="<?php echo $nation; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="value" class="col-sm-3 control-label">Value</label>
                    <div class="col-sm-9">
                        <input type="number" required min ="0.1" step="any" name="value" class="form-control" value="<?php echo $value; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="col-md-12 mt-3">
                    <input type="submit" name="btn_update" class="btn btn-success" value="Update">
                    <a href="index.php" class="btn btn-danger">Back</a>
                </div>
            </div>


    </form>

    <script src="js/slim.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>