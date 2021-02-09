<?php
	require 'head.php';
	require 'header.php';
	require 'includes/dbc.inc.php';
?>
<section class="section te-padding">
    <div class="container">
       <div class="card te-form">
           <div class="te-formtitle">Register</div>
           <div class="card-content">
               <form id="register-form" action="includes/register.inc.php" method="post">
                   <div class="field">
                       <label class="label">Email</label>
                       <div class="control">
                           <input id="email" class="input is-medium" type="text" name="email" placeholder="Email">
                       </div>
                   </div>
                   <div class="field">
                       <label class="label">Username</label>
                       <div class="control">
                           <input id="username" class="input is-medium" type="text" name="username" placeholder="Username">
                       </div>
                   </div>
                   <div class="field">
                       <label class="label">Password</label>
                       <div class="control">
                           <input id="password" class="input is-medium" id="password" type="password" name="password" placeholder="Password">
                       </div>
                   </div>
                   <div class="field">
                       <label class="label">Confirm Password</label>
                       <input id="password-confirm" class="input is-medium"  type="password" name="passwordConfirm" placeholder="Confirm Password">
                   </div>
                   <br>
                   <div class="field">
                       <input id="submit" class="input button is-medium is-fullwidth is-link" type="submit" name="registerSubmit" value="Register">
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
