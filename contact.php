<?php
require 'head.php';
require 'header.php';
require 'includes/dbc.inc.php';
?>
<section class="section te-padding">
    <div class="container">
        <div class="card te-form">
            <div class="te-formtitle">Contact us</div>
            <div class="card-content">
                <form id="contact-form" action="includes/contact.inc.php" method="post">
                    <div class="field">
                        <label class="label">Email</label>
                        <div class="control">
                            <input type="email" class="input is-medium" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Subject</label>
                        <div class="control">
                            <input type="text" class="input is-medium"required class="textarea" name="subject" placeholder="Subject"></input>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Message</label>
                        <div class="control">
                            <textarea class="input is-medium textarea" name="message" placeholder="Message"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="field">
                        <input type="submit" class="input button is-medium is-fullwidth is-link" name="contact-submit" value="Send Message">
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

