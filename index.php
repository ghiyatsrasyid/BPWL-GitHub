<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC"); // using mysqli_query instead
?>

<html>
<head>	
	<title>Table V05</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-table100">
            <div class="wrap-table100">
                <div class="table100 ver1">
                    <div class="js-vscroll">
                        <div class="table100-nextcols">
                            <table>
                                <thead>
                                    <tr class="row100 head">
                                        <th class="cell100 column1">Nama</th>
                                        <th class="cell100 column2">usia</th>
                                        <th class="cell100 column3">Email</th>
                                        <th class="cell100 column4">Update</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 
                                    //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
                                    while($res = mysqli_fetch_array($result)) { 		
                                        echo "<tr class='row100 body'>";
                                        echo "<td class='cell100 column1'>".$res['name']."</td>";
                                        echo "<td class='cell100 column2'>".$res['age']."</td>";
                                        echo "<td class='cell100 column3'>".$res['email']."</td>";	
                                        echo "<td class='cell100 column4'><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a> | <a href=\"add.html\">Add</a></td>";		
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script>
        $('.js-pscroll').each(function () {
            var ps = new PerfectScrollbar(this);

            $(window).on('resize', function () {
                ps.update();
            })

            $(this).on('ps-x-reach-start', function () {
                $(this).parent().find('.table100-firstcol').removeClass('shadow-table100-firstcol');
            });

            $(this).on('ps-scroll-x', function () {
                $(this).parent().find('.table100-firstcol').addClass('shadow-table100-firstcol');
            });

        });
    </script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>
</html>
