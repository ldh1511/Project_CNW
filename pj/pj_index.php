<?php include('../path.php'); ?>
<?php include(ROOT_PATH . "/controllers/pj.php"); ?>
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
</head>

<body>
    <div class="main-container">
        <div class="content-box">
            <?php include(ROOT_PATH . "/includes/left_menu.php") ?>
            <div class="content-right admin-container">
                <!--  resume -->
                <div class="title-box">
                    <h3 class="admin-title">project</h3>
                    <div class="search-box" style="justify-content: flex-end;">
                        <form class="search-box-form">
                            <input type="text" name="" id="" class="input-search" placeholder="Search here...">
                            <button type="button" class="btn"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <?php include(ROOT_PATH . "/includes/message.php") ?>
                <table class="table table-striped table-hover bg-white table-borderless rounded" id="result">
                    <thead>
                        <tr>
                            <th>Number</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Link</th>
                            <th>Detail</th>
                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($projects as $key) : ?>
                            <tr>
                                <td class="align-middle"><?php echo $i ?></td>
                                <td class="align-middle"><?php echo $key[1] ?></td>
                                <td class="align-middle"><?php echo $key[2] ?></td>
                                <td class="align-middle"><?php echo $key[3] ?></td>
                                <td class="align-middle"><?php echo $key[4] ?></td>
                                <td class="align-middle">
                                    <img class="img-col" src="<?php echo '../Img/' . $key[5] ?>" alt="">
                                </td>
                                <td class="align-middle"><?php echo $key[6] ?></td>
                                <td class="align-middle"><a href="pj_detail.php?pj_id=<?php echo $key[0] ?>"><i class="fas fa-book-reader"></i></a></td>
                                <td class="align-middle"><a href="pj_edit.php?edit_id=<?php echo $key[0] ?>"><i class="far fa-edit"></i></a></td>
                                <td class="align-middle"><a href="pj_edit.php?delete_id=<?php echo $key[0] ?>"><i class="far fa-trash"></i></a></td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <a href="pj_add.php" class="btn-skill"><i class="fas fa-plus"></i></a>
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
                                url: "/project/controllers/pj.php",
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
</body>

</html>