<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kiemtra";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

// Get all
function getAllDonor()
{
    $result = $conn->query("SELECT * FROM `blood_donor`");
    return mysql_fetch_array($result);
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cao Van Canh | </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<body>
<div class="container">
    <div class="row" style="margin-top: 50px;">
        <div class="panel panel-primary">
            <div class="panel-heading">He thong quan ly ngan hang mau</div>
            <div class="panel-body">
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#newPopup">Them thong
                    tin hien mau
                </button>

                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col"> Mã người hiến máu</th>
                        <th scope="col">Tên người hiến máu</th>
                        <th scope="col">Gioi Tinh</th>
                        <th scope="col">Nam Sinh</th>
                        <th scope="col">Nhom mau</th>
                        <th scope="col">Ngay dang ky</th>
                        <th scope="col">So dien thaoi</th>
                        <th scope="col">Hanh dong</th>
                    </tr>
                    </thead>
                    <tbody>

<!--                    // BLOOD_DONOR: (bd_id, bd_name, bd_sex, bd_age, bd_bgroup, bd_reg_date, bd_phno)-->

                    <?php
                    $doners = getAllDonor();
                    foreach ($doners as $index => $doner):
                        ?>
                        <tr>
                            <th scope="row"><?=$index++?></th>
                            <td><?=$doner["bd_id"]?></td>
                            <td><?=$doner["bd_name"]?></td>

                            <td><?=$doner["bd_sex"]?></td>

                            <td><?=$doner["bd_age"]?></td>

                            <td><?=$doner["bd_bgroup"]?></td>

                            <td><?=$doner["bd_reg_date"]?></td>

                            <td><?=$doner["bd_phno"]?></td>

                            <td>
                                <button type="button" class="btn btn-xs btn-info">Edit</button>
                                <button type="button" class="btn btn-xs btn-info">Delete</button>
                            </td>
                        </tr>

                    <?php
                    endforeach;
                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div id="newPopup" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Them nguoi hien moi</h4>
            </div>
            <div class="modal-body">
                <form id="create_new_blood_donor">
                    <div class="form-group">
                        <label for="">ten nguoi hien mau:</label>
                        <input type="text" class="form-control" name="bd_name" required>
                    </div>

                    <div class="form-group">
                        <label>Gio tinh:</label>
                        <div class="form-group">
                            <label for="sel1">Gioi tinh:</label>
                            <select class="form-control" name="bd_sex" id="sel1" required>
                                <option value="1">Nam</option>
                                <option value="0">Nu</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nhom mau:</label>
                        <select class="form-control" name="bd_sex" required>
                            <option>A</option>
                            <option>B</option>
                            <option>AB</option>
                            <option>O</option>
                        </select></div>

                    <div class="form-group">
                        <label for="">Ngay dang ky kien mau:</label>
                        <input type="text" class="form-control" id="bd_reg_date">
                    </div>


                    <div class="form-group">
                        <label for="">So dien thoai:</label>
                        <input type="text" class="form-control" id="bd_phno">
                    </div>


                    <button class="btn btn-primary">Them</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

</body>
</html>
