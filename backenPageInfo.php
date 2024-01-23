<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>PHP Website Common</title>
    <link rel="stylesheet" href="./backenPage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Charm:wght@400;700&family=Cinzel+Decorative:wght@400;700;900&family=Homemade+Apple&family=Italianno&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Kaushan+Script&family=Merienda:wght@300..900&family=Oranienbaum&family=Rubik+Doodle+Shadow&family=Satisfy&family=Tangerine:wght@400;700&display=swap" rel="stylesheet">
</head>

<body class="p-3 m-0 border-0 bd-example m-0 border-0 bg-dark text-white">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <div class="container-fluid">
            <h1>Computer languages</h1>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0" style="margin-left:60%">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="userData.php">UserInfo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="content.php">Content</a>
                    </li>

                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    $con = mysqli_connect('localhost', 'root', '', 'userdate') or die("Couldn't Connect");

    if ($con) {
        // echo "Connected Successfully";
    } else {
        echo "Not Connected";
    }

    mysqli_select_db($con, 'userdate');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user = $_POST['user'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];

        $query = "INSERT INTO userinfomationdata (user, email, mobile) VALUES ('$user', '$email', '$mobile')";
        mysqli_query($con, $query);
    }

    $result = mysqli_query($con, "SELECT * FROM userinfomationdata");


    ?>

    <section class="mt-5">
        <div class="container">
            <table class="table table-bordered table-dark">
                <thead >
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile Number</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['user'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['mobile'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

    <footer class="mt-5 text-center bg-white text-dark">
        <h2 class="pt-2">@Computer languages</h2>
        <a href=""><i class="fa-brands fa-instagram" style="color:#cd486b" id="insta"></i></a>
        <a href=""><i class="fa-brands fa-facebook" style="color: #316FF6;"></i></a>
        <a href=""><i class="fa-brands fa-twitter" style="color: #1DA1F2;"></i></a>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>