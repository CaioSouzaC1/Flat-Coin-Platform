<?php

require "header.php";
?>
<link rel="stylesheet" href="src/css/AdmCss.css">
<main>
    <form action="ThisValidation.php" method="$_POST">
        <?php if (isset($_GET['login']) == 'LoginInválido') {
            echo "<h2 style='margin-top: -20px;margin-bottom: 15px;'>Incorrect, try again.</h2>";
        } ?>
        <label for="user">User</label>
        <input id="user" type="text" placeholder="César BigBoss">
        <label for="pass">Pass</label>
        <input id="pass" type="password" placeholder="****^****">
        <button type="submit">Submit</button>
    </form>
</main>
</body>

</html>