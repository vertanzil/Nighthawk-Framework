<?php

use App\classes\builder\Pagebuilder;
use App\controllers\Index;



?>
<html lang="en">

<?php Index::render() ?>
<body>
<?php include_once('./templates/navtop.php');
?>

<main class="mt-4 pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 mb-2">


            </div>

            <div class="col-md-4 mb-2">

            </div>

            <div class="col-md-4 mb-2">

            </div>

        </div>

        <div class="row">


            <div class="col-md-6 mb-3">

            </div>


            <div class="col-md-6 mb-3">

            </div>
        </div>

</main>

</div>
</div>
<?php
Pagebuilder::loadJS("./views/js/bootstrap.bundle.min.js");
Pagebuilder::loadJS("./views/js/jquery-3.5.1.js");
Pagebuilder::loadJS("./views/js/jquery.dataTables.min.js");
Pagebuilder::loadJS("./views/js/bootstrap.min.js");
?>
</body>
</html>