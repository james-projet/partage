<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/libre/images/favicon-16x16.png" />

  <title>Partage</title>

  <!-- Bootstrap core CSS -->
  <link href="/libre/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for homepage -->
  <link href="/libre/css/scrolling-nav.css" rel="stylesheet">

  <!-- Custom styles for groupe -->
  <link href="/libre/css/heroic-features.css" rel="stylesheet">

  <link href="/libre/css/style.css" rel="stylesheet">

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

        <script src="/libre/javascript/ajax.js"></script>
        <script type="text/javascript" src="/libre/javascript/identifiant.js"></script>
        <script src="/libre/vendor/jquery/jquery.min.js"></script>
        <script src="/libre/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="/libre/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom JavaScript for this theme -->
        <script src="/libre/js/scrolling-nav.js"></script>
    </body>
</html>
