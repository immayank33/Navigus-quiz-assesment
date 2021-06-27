<!DOCTYPE<html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Quiz Website</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    </head>

    <body>
        <?php
        $name = $_GET['name'];
        $user = $_GET['user'];
        ?>
        <div id="header">
            <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
                <div class="container-fluid" id="header">
                    <div class="navbar-header">

                        <a class="navbar-brand" href="#">
                            <p style="font-size:35px;text-transform: uppercase;margin:auto;padding:5px 5px">Quiz App</p>
                        </a>
                        <a class="navbar-brand" href="#">
                            <?php echo "<p style='font-size:20px;text-transform: uppercase;margin:auto;padding:5px 5px;'>Welcome {$_GET['name']}</p>"; ?>
                        </a>
                        <?php echo "<a class='navbar-brand' href='./view_course.php?name={$name}&user={$user}'>
                            <p style='font-size:20px;text-transform: uppercase;margin:auto;padding:5px 5px'>View Course</p>
                        </a>
                        <a class='navbar-brand' href='./add_course.php?name={$name}&user={$user}'>
                            <p style='font-size:20px;text-transform: uppercase;margin:auto;padding:5px 5px'>Add Course</p>
                        </a>
                        <a class='navbar-brand' href='./edit_course.php?name={$name}&user={$user}'>
                            <p style='font-size:20px;text-transform: uppercase;margin:auto;padding:5px 5px'>Edit Course</p>
                        </a>
                        <a class='navbar-brand' href='./delete_course.php?name={$name}&user={$user}'>
                            <p style='font-size:20px;text-transform: uppercase;margin:auto;padding:5px 5px'>Delete Course</p>
                        </a>
                        <a class='navbar-brand' href='./teacherlogin.php'>
                            <p style='font-size:20px;text-transform: uppercase;margin:auto;padding:5px 5px'>Logout</p>
                        </a>";
                        ?>
                    </div>
                </div>
            </nav>
        </div>
        <div class="outer-div">
            <?php
            function getData($user, $name)
            {

                $file_name = "teacher" . ".json";
                $data = file_get_contents("$file_name");
                $json_data = json_decode($data, true);
                foreach ($json_data as $arr) {
                    foreach ($arr as $key => $val) {
                        if ($key == 'Username') {
                            if ($val == $user) {
                                echo "<div class='container-fluid'>";
                                foreach ($arr['Course'] as $key1 => $val1) {
                                    echo "<div class='row'>
                                <div class='col-sm-4' style='width:300px;height:100px:padding:10px 10px 10px 10px;background-color:#fff'>
                                <h3>$val1</h3>
                                <form method='GET' action='addQuiz.php'>
                                <input type='text' id='user' name='user' value='{$user}' style='display:none;'>
                                <input type='text' id='name' name='name' value='{$name}' style='display:none;'>
                                <input type='text' id='cname' name='cname' value='{$val1}' style='display:none;'>
                                <button type='submit' id='submit' style='width:150px;height:50px;'><p style='color:white'>Add Quiz</p></button>
                                </form>
                                </div></div>";
                                }
                                echo "</div>";
                            }
                        }
                    }
                }
            }
            getData($user, $name);


            ?>
        </div>

        <div id="footer">
            <nav class="navbar navbar-inverse navbar-fixed-bottom ">
                <div class="container-fluid" id="footer">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">
                            <p style="font-size:20px;text-transform: uppercase;">&copy; Mohammad Umaid Ansari</p>
                        </a>
                    </div>
                </div>
            </nav>


        </div>
    </body>

    </html>