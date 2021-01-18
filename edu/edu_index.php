<?php
include('../path.php');
include(ROOT_PATH . "/controllers/edu.php");
adminOnly();
?>
<!doctype html>
<html lang="en">

<head>
    <title>OurCV</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../queries.css">
</head>

<body>
    <div class="main-container">
        <div class="content-box-admin">
            <?php include(ROOT_PATH . "/includes/left_menu.php") ?>
            <div class="content-right admin-container">
                <div class="title-box">
                    <h3 class="admin-title">education</h3>
                    <div class="admin-bars">
                        <i class="fas fa-bars"></i>
                    </div>
                    <div class="search-box">
                        <div class="header-btn-container">
                            <div class="header-button">
                                <a href="edu_import.php" class="btn-import"><i class="fas fa-file-import"></i> Import</a>
                            </div>
                        </div>
                        <form class="search-box-form">
                            <input type="text" name="" id="" class="input-search" placeholder="Search here...">
                            <button type="button" class="btn"><i class="fas fa-search"></i></button>
                        </form>

                    </div>
                </div>
                <?php include(ROOT_PATH . "/includes/message.php") ?>
                <table class="table table-striped table-hover bg-white table-borderless rounded table-admin" id="result">
                    <thead>
                        <tr>
                            <th>Number</th>
                            <th>Start date</th>
                            <th class="col-hidden">Finish date</th>
                            <th>School</th>
                            <th class="col-hidden">Description</th>
                            <th>Detail</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; ?>
                        <?php foreach ($list_edu as $edu) {
                            echo '<tr>';
                            echo '<td>' . $i . '</td>';
                            echo '<td>' . $edu[1] . '</td>';
                            echo '<td class="col-hidden">' . $edu[2] . '</td>';
                            echo '<td>' . $edu[3] . '</td>';
                            echo '<td class="col-hidden">' . html_entity_decode(substr($edu[4], 0, 35) . "...") . '</td>';
                            echo '<td><a href="edu_detail.php?detail_id=' . $edu[0] . '"><i class="fas fa-book-reader"></i></a></td>';
                            echo '<td><a href="edu_edit.php?edit_id=' . $edu[0] . '"><i class="far fa-edit"></i></a></td>';
                            echo '<td><a href="edu_edit.php?delete_id=' . $edu[0] . '"><i class="far fa-trash"></i></a></td>';
                            echo '</tr>';
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
                <a href="edu_add.php" class="btn-skill"><i class="fas fa-plus"></i></a>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script type="text/javascript">
        $('document').ready(function() {
            $('.search-box-form input[type="text"]').on('keyup input', function() {
                var inputVal = $(this).val();
                var result = $('#result');
                if (inputVal.length) {
                    $.ajax({
                        url: "/project/controllers/edu.php",
                        type: "get",
                        data: {
                            term: inputVal
                        },
                        success: function(e) {
                            result.html(e)
                        }
                    })
                }
            })
        })
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../script_admin.js"></script>
</body>

</html>