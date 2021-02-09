<?php
    require 'head.php';
if(($_GET['register'] === 'success')){
    echo '<div class="notification is-success">Registration Successful!</div>';
}

if(($_GET['login'] === 'success')){
    echo '<div class="notification is-success">Successfully logged in!</div>';
}
if(($_GET['postreview'] === 'success')){
    echo '<div class="notification is-success">Review Submitted!</div>';
}

require 'header.php';
    require 'includes/dbc.inc.php';


?>

<section id="hero" class="hero is-large">
    <div class="container">
        <div class="hero-body">
            <h1 id="hero-title" class="title">
                Type, Evolved. - A Typographic Retrospective
            </h1>
            <h2 id="hero-subtitle" class="subtitle">
                Explore the art of letter-craft and the many forms that it can embody. The art of typography is a unique balance of form and function that excels in its key principle of communicating with observers. This exhibition covers several aspects of type; from cultural origins to traditional and industrial manufacturing techniques. Type is all around us, and is a sight to behold.
            </h2>
        </div>
    </div>
</section>

<nav id="sticky-nav" class="non-sticky">
    <div class="container">

        <a class="sticky-link" href="#carousel">What's On</a>
        <a class="sticky-link" href="#events">Events</a>
        <a class="sticky-link" href="#reviews">Reviews</a>

    </div>
</nav>

<section class="section divide-1"></section>

<section id="carousel" class="">
    <div class="slider">
        <div data-title="01" class="slide slide-1">
            <div class="slide-text-container">
                <div class="slide-title slide-title-1">Dawn of Type</div>
                <div class="slide-description slide-description-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci nobis omnis quas quibusdam quisquam quod sapiente vel? Dicta enim, hic illum nemo perspiciatis quas quasi sequi, sunt suscipit temporibus veniam?</div>
            </div>
        </div>
        <div data-title="02" class="slide slide-2">
            <div class="slide-text-container">
                <div class="slide-title slide-title-2">Blackletter</div>
                <div class="slide-description slide-description-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur dolor esse ex fugiat in numquam praesentium quas quasi recusandae sapiente! Eligendi in natus necessitatibus odit quia, quo sequi sunt ut.</div>
            </div>
        </div>
        <div data-title="03" class="slide slide-3">
            <div class="slide-text-container">
                <div class="slide-title slide-title-3">Letterpress</div>
                <div class="slide-description slide-description-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni repellat sunt voluptatibus. Alias blanditiis commodi deleniti error et, facere laboriosam mollitia obcaecati optio repudiandae saepe sed similique soluta temporibus tenetur?</div>
            </div>
        </div>
        <div data-title="04" class="slide slide-4">
            <div class="slide-text-container">
                <div class="slide-title slide-title-4">The Digital Age</div>
                <div class="slide-description slide-description-4">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis,.</div>
            </div>

        </div>
        <div data-title="05" class="slide slide-5">
            <div class="slide-text-container">
                <div class="slide-title slide-title-5">Metro Systems</div>
                <div class="slide-description slide-description-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis dolore doloremque iste itaque iure laudantium, necessitatibus non obcaecati porro rem! Dicta fugiat minima placeat similique soluta. Aut ex provident unde?</div>
            </div>
        </div>
    </div>
</section>

<section id="events" class="section">
    <div class="container">
        <h1 class="title">Events</h1>
            <div class="columns">
            <?php
                $sql = 'SELECT id, name, description, tag, image FROM events';
                $stmt = mysqli_query($connect, $sql);
                while($row = mysqli_fetch_assoc($stmt)) {
                    echo ' 
 <div class="column is-one-third">        
                        <div class="card te-rounded">
                            <div class="card-image">
                                <figure class="image is-16by9">
                                    <img src="assets/'.$row['image'].'" alt="Placeholder image">
                                </figure>
                            </div>
                            <div class="card-content">
                                <div class="content">
                                    <span class="tag is-info">'.$row['tag'].'</span>
                                    <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                                    <br>
                                    <p class="title">' .$row['name'].'</p>
                                    <p class="subtitle">'.$row['description'].'</p>
                                    <form action="bookevent.php" class="te-bottom" method="post">
                                <input type="hidden" name="event-id" value="'.$row['id'].'">
                                <input class="button is-primary is-fullwidth" type="submit" name="event-submit" value="Book Tickets">
                            </form>
                                </div>
                            </div>
                            
                        </div>
                        </div>   
                    ';
                }
            ?>
        </div>
    </div>
</section>

<section class="section divide-2"></section>

<section id="reviews" class="section">
    <div class="container">
<h1 class="title">Reviews</h1>
            <?php
            $userid = $_SESSION['userid'];
            $sql = "SELECT users.username, reviews.review, reviews.rating FROM reviews INNER JOIN users ON reviews.userid=users.id";
            $stmt = mysqli_query($connect, $sql);
            if(mysqli_num_rows($stmt) === 0){
                echo 'noreviews';
            }
            else {
                echo '<div class="columns is-multiline">';
                while($row = mysqli_fetch_assoc($stmt)){
                    echo '
                        <div class="column is-one-third">   
                            <div class="card te-rounded">  
                                <div class="card-content">   
                                    <div class="stars">
                    ';
                    switch ($row['rating']){
                        case 1:
                            echo '<i class="fas fa-star"></i>';
                            break;
                        case 2:
                            echo '<i class="fas fa-star"></i><i class="fas fa-star"></i>';
                            break;
                        case 3:
                            echo '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
                            break;
                        case 4:
                            echo '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
                            break;
                        case 5:
                            echo '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
                            break;
                    }
                    echo '
                                    </div>  
                                    <p class="review subtitle">'.$row['review'].'</p>
                                    <p>'.$row['username'].'</p>    
                                </div>
                            </div>  
                        </div>               
                    ';
                }
                echo '</div>';
            }
            if(isset($userid)) {
                $sql = 'SELECT review, rating FROM reviews WHERE userid='.$userid;
                $result = mysqli_query($connect, $sql);
                if(mysqli_num_rows($result) == 0) {
                    echo'
                        <form action="postreview.php" method="post">
                            <input class="button is-primary" type="submit" value="Post A Review">
                        </form>
                    ';
                }
            }
            else {
                echo'
                        <form action="postreview.php" method="post">
                            <input type="submit" class="button is-primary" value="Post A Review">
                        </form>
                    ';
            }
            ?>
    </div>
</section>

<?php
require 'map.php';
?>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
            $notification = $delete.parentNode;
            $delete.addEventListener('click', () => {
                $notification.parentNode.removeChild($notification);
            });
        });
    });
</script>
 <?php
    require 'scripts.php';
    require 'footer.php';
?>