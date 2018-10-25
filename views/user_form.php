<?php
include "header.php";
?>
<h2> Add New User </h2>
    <form action="../controllers/user.php" method="post">

        <input type="email" name="email" placeholder="email">
        <input type="password" name="password" placeholder="password">
        <input type="submit" value="Save User">

    </form>
<hr>
<?php
include "footer.php";
?>