<?php
include_once  'nav.php';
?>

<div id="container">
  <div class="form-wrap" id="bg">
    <h1>Contact Us</h1>
    <p>It's Only Takes a Minute</p>
    <p>We Look Forward To Hearing From You</p>
    <form>
      <div class="form-group">
        <label for="first-name">Full Name</label>
        <input type="text" name="firstName" id="first-name" />
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" />
      </div>

      <div class="form-group">
        <label for="comment">Comment</label>
        <textarea name="comment" id="comment" cols="40" rows="2"></textarea>
      </div>
      <button type="button" class="btn">Submit</button>
    </form>
  </div>
</div>
</body>

</html>