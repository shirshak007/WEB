<?php
session_start();
session_destroy();
?>
<div>
  <strong>Logged out successfully</strong>
</div>
<?php
header( "refresh:1;url=index.php" );
?>