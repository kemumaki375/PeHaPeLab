<?php require_once "controller.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?=html_title()?></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
  <style>
    .current_pages {
        background:yellow ;
    }
  </style>
</head>
<body>
<?php include_once 'top_nav.php' ?>
<div class="container-fluid mt-md-4 mb-md-5">
    <div class="row mt-3">
        <nav class="col-md-2 col-sm-12 ms-md-3 d-none d-sm-block">
            <strong>Index</strong>
            <ul class="list-unstyled">
              <?php foreach ($fn_list as $k) : ?>
                <li><a href="index.php?fn=<?=$k?>" class="<?=($k==$fn)?"current_pages":""?>"><?=$k?></a></li>
              <?php endforeach;?>
            </ul>
        </nav>
        <main class="col">
            <div>
                <div class="row">
                    <div class="col col-sm-12">
                        <?php include_once get_page() ?>
                    </div>
                    <div class="col-3 offset-md-1 mt-2">
                        <!--
                        <h4>Examples</h4>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href=""></a>
                            </li>
                        </ul>
                        !-->
                    </div>
                </div>
            </div>

        </main>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/zepto/1.2.0/zepto.min.js" integrity="sha512-BrvVYNhKh6yST24E5DY/LopLO5d+8KYmIXyrpBIJ2PK+CyyJw/cLSG/BfJomWLC1IblNrmiJWGlrGueKLd/Ekw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>