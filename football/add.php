<?php 
    require_once('connection.php');

    if (isset($_REQUEST['btn_insert'])) {
        $name = $_REQUEST['name'];
        $age = $_REQUEST['age'];
        $club = $_REQUEST['club'];
        $nation = $_REQUEST['nation'];
        $value = $_REQUEST['value'];
      

        if (empty($name)) {
            $errorMsg = "กรุณากรอก Name";
        }else if (empty($age)) {
                $errorMsg = "กรุณากรอก Age";
        } else if (empty($club)) {
            $errorMsg = "กรุณากรอก Club";
        } else if (empty($nation)) {
            $errorMsg = "กรุณากรอก Nation";
        } else if (empty($value)) {
            $errorMsg = "กรุณากรอก Value";
        } else {
            try {
                if (!isset($errorMsg)) {
                    $insert_stmt = $db->prepare("INSERT INTO football_player(name ,age ,club ,nation ,value) VALUES (:Nname, :Aage, :Cclub, :Nnation, :Vvalue)");
                    $insert_stmt->bindParam(':Nname', $name);
                    $insert_stmt->bindParam(':Aage', $age);
                    $insert_stmt->bindParam(':Cclub', $club);
                    $insert_stmt->bindParam(':Nnation', $nation);
                    $insert_stmt->bindParam(':Vvalue', $value);

                    if ($insert_stmt->execute()) {
                        $insertMsg = "เพิ่มข้อมูลเรียบร้อยแล้ว กรุณารอสักครู่";
                        header("refresh:2;index.php");
                    }
                }
            } catch (PDOException $e) {
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
    <div class="display-3 text-center">Add Player</div>

    <?php 
         if (isset($errorMsg)) {
    ?>
        <div class="alert alert-danger">
            <strong>Wrong! <?php echo $errorMsg; ?></strong>
        </div>
    <?php } ?>
    

    <?php 
         if (isset($insertMsg)) {
    ?>
        <div class="alert alert-success">
            <strong>Success! <?php echo $insertMsg; ?></strong>
        </div>
    <?php } ?>

    <form method="post" class="form-horizontal mt-5">
            
            <div class="form-group text-center">
                <div class="row">
                    <label for="name" class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" name="name" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="age" class="col-sm-3 control-label">Age</label>
                    <div class="col-sm-9">
                        <input type="number" name="age" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="club" class="col-sm-3 control-label">Club</label>
                    <div class="col-sm-9">
                        <input type="text" name="club" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="nation" class="col-sm-3 control-label">Nation</label>
                    <div class="col-sm-9">
                        <input type="text" name="nation" class="form-control" >
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="value" class="col-sm-3 control-label">Value</label>
                    <div class="col-sm-9">
                        <input type="number" required min ="0.1" step="any" name="value" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="col-md-12 mt-3">
                    <input type="submit" name="btn_insert" class="btn btn-success" value="Insert">
                    <a href="index.php" class="btn btn-danger">Back</a>
                </div>
            </div>


    </form>

    <script src="js/slim.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>