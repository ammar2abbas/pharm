<!-- page for logout website  -->

<?php
session_start();
session_unset();
session_destroy();
//after logout website go to index page
header('Location: index.php' )


?>