<?php
  session_start();
  session_destroy();
  echo "
    <script>
      window.location.href = '../'
      alert('You have been logged out Successfully');
    </script>
  ";

 ?>
