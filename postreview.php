<?php
    require 'head.php';
    require 'header.php';
    require 'includes/dbc.inc.php';
?>
<section class="section te-padding">
    <div class="container">
    <div class="card te-form">
        <div class="te-formtitle">Post a review</div>
        <div class="card-content">
            <form id="review-form" action="includes/postreview.inc.php" method="post">
                    <div class="field">
                        <label class="label">Rating</label>
                        <div class="rating">
                            <input required type="radio" id="star5" name="rating" value="5">
                            <label for="star5" class="te-star"></label>
                            <input required type="radio" id="star4" name="rating" value="4">
                            <label for="star4" class="te-star"></label>
                            <input required type="radio" id="star3" name="rating" value="3">
                            <label for="star3" class="te-star"></label>
                            <input required type="radio" id="star2" name="rating" value="2">
                            <label for="star2" class="te-star"></label>
                            <input required type="radio" checked id="star1" name="rating" value="1">
                            <label for="star1" class="te-star"></label>
                        </div>
                    </div>
                <div class="field">
                    <label class="label">Description</label>
                    <div class="control">
                        <textarea required class="textarea" name="review" placeholder="Description"></textarea>
                    </div>
                </div>
                <br>
                <div class="field">
                    <input type="submit" class="button is-medium is-fullwidth is-link" name="review-submit" value="Submit Review">
                </div>
            </form>
        </div>
    </div>
    </div>
</section>
<?php
    require 'scripts.php';
    require 'footer.php';
?>

