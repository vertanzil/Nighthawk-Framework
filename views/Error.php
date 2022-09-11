<body>
<div class="grid-container" style="Background: #424242;">
    <h1>Error</h1>
    <p>NightHawk Framework has encountered a serious error and is unable to continue, please see the error below.
        This has also been logged in the /logs/ folder in the directory root, please resolve this issue to contiune.
        If you are unable to do sp, please paste a copy of this error and the log to the NightHawk Framework Githubpage.
    </p>
    <?php

    use App\controllers\ErrorPage;

    $var_value = $_GET['Errno'];
    echo '<p>' . ErrorPage::process($var_value) . '</p>';
    ?>
</body>