<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Scrolling Nav - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for homepage -->
  <link href="public/css/scrolling-nav.css" rel="stylesheet">

  <!-- Custom styles for groupe -->
  <link href="public/css/heroic-features.css" rel="stylesheet">

</head>
    <body id="page-top">

        <!--Header -->
        <?php include("header.php");?>

        <div class="contenu">
          <div class="flash">
            <?php if(isset($_SESSION['flashMessage'])):?>
                  <?= $_SESSION['flashMessage'];?>
                  <?php unset($_SESSION['flashMessage']);?>
            <?php endif;?>
          </div>

              <?= $content;?>
        </div>

        <!--footer-->
        <?php include("footer.php");?>


        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom JavaScript for this theme -->
        <script src="public/js/scrolling-nav.js"></script>
    </body>
</html>
