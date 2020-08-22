<!-- Police station
  <input list="police station">
  <datalist id="police station">
  <?php 
  while($result= $commands->fetch_assoc()){
    echo "<option value=" . $result["street"] . $result["postcode"].">";
  }
  ?>
  </datalist> -->
  