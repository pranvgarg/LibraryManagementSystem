<?php
require_once "connection.php";
$d = date("d-m-Y");
mysqli_query($link, "update issue_books set books_return_date='$d' where id='$_GET[id]'");
// mysqli_query($link, "update add_books set available_qty=available_qty+1 where name='$_GET[bname]'");
?>

<script type="text/javascript">
  window.location="return_book.php";
</script>
