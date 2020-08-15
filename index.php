<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
include_once 'utils.php';
$user = get_user();
$purchases = get_purchases();
$receipts = get_receipts();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="Abijah Kajabika" />
    <title>Voody - Your awesome health and finance tracker</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
</head>
<body id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none"><?php echo $user['name'] ?></span>
        <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="assets/img/profile.jpg" alt="" /></span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">Home</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#experience">My Receipts</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#education">Health</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#skills">Finance</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#interests">Goals</a></li>
            <hr class="m-0" />
            <li><a href="index.php?logout='1'" class="nav-link js-scroll-trigger">Logout</a></li>
        </ul>
    </div>
</nav>
<!-- Page Content-->
<div class="container-fluid p-0">
    <!-- About-->
    <section class="resume-section" id="about">
        <div class="resume-section-content">
            <h1 class="mb-0">
                Voody
                <span class="text-primary text-md-left" id="desc">Health&Finance</span>
            </h1>
            <div class="subheading mb-5">
                <?php echo $user['name'] ?>
                <a href="mailto:name@email.com"><?php echo $user['email'] ?></a>
            </div>
            <p class="lead mb-5">
                This is your personal assistance and health&finance tracker, just upload a receipt and Voody will extract and arrange the information for you.
            </p>
            <div class="jumbotron">
                <p>Drag&Drop a receipt or click the button to take a photo or choose from the gallery.</p>
                <div class="social-icons">
                    <input class="btn btn-block" id="upload" type="file" accept="image/*;capture=camera" value="Upload a receipt">
                </div>
            </div>

        </div>
    </section>
    <hr class="m-0" />
    <!-- Receipts-->
    <section class="resume-section" id="experience">
        <div class="resume-section-content">
            <h2 class="mb-5">My Receipts</h2>
            <?php
            $id = 0;
            foreach ($receipts as $receipt): ?>
            <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                <div class="flex-grow-1">
                    <h3 class="mb-0">Receipt N <?php echo $id; ?></h3>
                    <div class="subheading mb-3">
                        <img src="<?php echo $receipt['img']; ?>" class="img-thumbnail receipt">
                    </div>

                </div>
                <div class="flex-shrink-0"><span class="text-primary"><?php echo date('y M Y', $receipt['date']) ?></span></div>
            </div>
            <?php
            $id++;
            endforeach;
            if(empty($receipts)):
                ?>
                <p>No receipts yet, please add some receipts photos!</p>
            <?php endif; ?>

        </div>
    </section>
    <hr class="m-0" />
    <!-- Education-->
    <section class="resume-section" id="education">
        <div class="resume-section-content">
            <h2 class="mb-5">Health</h2>
            <div class="list-group">
                <?php
                $id = 0;
                foreach ($purchases as $purchase): ?>
                    <div class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">Purchase N <?php echo $id; ?></h5>
                            <small class="text-muted">3 days ago</small>
                        </div>
                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                        <small class="text-muted">Donec id elit non mi porta.</small>
                    </div>
                <?php
                $id++;
                endforeach;
                if(empty($purchases)):
                ?>
                <p>No purchases yet, please add some receipts!</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <hr class="m-0" />
    <!-- Skills-->
    <section class="resume-section" id="skills">
        <div class="resume-section-content">
            <h2 class="mb-5">Finance</h2>

        </div>
    </section>
    <hr class="m-0" />
    <!-- Interests-->
    <section class="resume-section" id="interests">
        <div class="resume-section-content">
            <h2 class="mb-5">Goals</h2>
            <p>Apart from being a web developer, I enjoy most of my time being outdoors. In the winter, I am an avid skier and novice ice climber. During the warmer months here in Colorado, I enjoy mountain biking, free climbing, and kayaking.</p>
            <p class="mb-0">When forced indoors, I follow a number of sci-fi and fantasy genre movies and television shows, I am an aspiring chef, and I spend a large amount of my free time exploring the latest technology advancements in the front-end web development world.</p>
        </div>
    </section>
    <hr class="m-0" />

</div>
<!-- Bootstrap core JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
<!-- Third party plugin JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
<script>
    $("#upload").change((e) => {
        var fd = new FormData();
        var files = $('#upload')[0].files[0];
        fd.append('file',files);

        $.ajax({
            url: 'upload.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response){
                console.log(response);
                if(response.status === 1){
                    location.reload();
                }
            },
        });
    })
    function updateReceipts(data) {

    }
</script>
</body>
</html>

