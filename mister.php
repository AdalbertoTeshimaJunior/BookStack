<?php
   // Create a PHP array
   $sample_array = array(
      0 => "Hello",
      1 => "there",
   )
?>
<script src="auxiliar.js" type="text/javascript"></script>

<script>

   // Access the elements of the array
   var passed_array = <?php echo json_encode($sample_array); ?>;
   // Display the elements inside the array

   mostrarDados(passed_array);
</script>