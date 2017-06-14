<?php
  echo "<li>
       <div class='panel'>
          <form method='post' action='review.php'>
             <div class='form-group'>
                <span>Number of stars </span>
                <input name='numStars' size='1'><span> / 5</span>
                <textarea rows='5' name='reviewText' class='form-control' placeholder='Write Review Here...'></textarea>
                <input type='hidden' name='productID' value='$productID'>
                <input id='submitButton' type='submit' class='btn btn-default'>
             </div>
          </form>
       </div>
    </li>";
?>
