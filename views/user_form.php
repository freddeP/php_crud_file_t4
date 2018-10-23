<?php
include "header.php";
?>

    <form action="../controllers/user.php" method="post">

        <input type="email" name="email" placeholder="email">
        <input type="password" name="password" placeholder="password">
        <input type="submit" value="Save User">

    </form>

<?php
include "footer.php";
?>