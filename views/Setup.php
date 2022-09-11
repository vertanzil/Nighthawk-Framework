<?php

use App\Installation\Installation;

?>
<body>
<div class="callout large-grid-frame">
    <article class="grid-container">
        <div class="grid-x">
            <div class="cell medium-4">

                <?php
                $install = new Installation();
                $install->firstRun();
                ?>
            </div>
            <div class="cell medium-4">
            </div>
            <div class="cell medium-4">
            </div>
            <div class="cell medium-4">
            </div>
        </div>
    </article>
</div>
</body>