<?php
require 'head.php';
require 'header.php';
require 'includes/dbc.inc.php';
?>

<section class="section te-padding">
    <div class="container">
        <div class="card te-form">

                <?php
                    if(isset($_POST['event-submit']) && isset($_POST['event-id'])){
                        $eventid = $_POST['event-id'];
                        $sql = 'SELECT id, name, description FROM events WHERE id='.$eventid;
                        if($result = mysqli_query($connect, $sql)) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '
                                    <div class="te-formtitle">'.$row['name'].'</div>
                                    <div class="card-content">
                                        <form id="book-form" action="includes/bookevent.inc.php" method="post">
                                        <div class="field has-addons">
                                            <p class="control">
                                                <span class="button is-static is-primary">Adult - &pound;12.00</span>
                                            </p>
                                            <p class="control">
                                                <input type="hidden" name="adultPrice" value="12.00">
                                                <span class="select">
                                                    <select name="adultQuantity" id="">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                    </select>  
                                                </span>
                                            </p>  
                                        </div>  
                                        
                                        <div class="field has-addons">
                                            <p class="control">
                                                <span class="button is-static is-primary">Child - &pound;5.00</span>
                                            </p>
                                            <p class="control">
                                                <input type="hidden" name="childPrice" value="5.00">
                                                <span class="select">
                                                    <select name="childQuantity" id="">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                    </select>  
                                                </span>
                                            </p>  
                                        </div>  
                                        
                                        <div class="field has-addons">
                                            <p class="control">
                                                <span class="button is-static is-primary">Adult - &pound;8.00</span>
                                            </p>
                                            <p class="control">
                                            <input type="hidden" name="concessionPrice" value="8.00">
                                                <span class="select">
                                                    <select name="concessionQuantity" id="">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                    </select>  
                                                </span>
                                            </p>  
                                        </div>  
                                        
                                    
                                        
                                           
                      <input type="hidden" name="eventid" value="'.$eventid.'">
                             
                              
                                <div class="field">
                                    <input type="submit" class="input button is-medium is-link" name="book-submit" value="Book Tickets">
                                </div>
                            ';
                            }
                        }
                        else{
                            header('');
                        }
                    }
                    else {
                        header('Location: ../index.php?error=sqlerror');
                        exit();
                    }
                ?>
            </form>
        </div>
        </div>
    </div>
</section>

<?php
require 'scripts.php';
require 'footer.php';
?>
