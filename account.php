<?php
require 'head.php';
require 'header.php';
require 'includes/dbc.inc.php';
?>
<section class="section te-padding">
<section class="section">
    <div class="container">
        <h2 class="title is-2">My Account</h2>
    </div>
</section>
<section class="section">
    <div class="container">
        <div class="columns">
<?php
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];

if(isset($userid))
{
    require 'includes/dbc.inc.php';

    $sql = 'SELECT username, email FROM users WHERE id='.$userid;
    $result = mysqli_query($connect, $sql);
    if(mysqli_num_rows($result)){
        if($row = mysqli_fetch_assoc($result)){
            echo'
                <div class="column is-one-half">
                    <p class="title">My Details</p>
                    <div class="card te-rounded">
                        <div class="card-content">
                            <p class="subtitle"><strong>Username: </strong> '.$row['username'].'</p>
                            <p class="subtitle"><strong>Email: </strong>'.$row['email'].'</p>
                        </div>
                    </div>
                </div>
            ';
        }
    }
?>
<div class="column is-one-half">
    <p class="title">My Reviews</p>
    <div class="card te-rounded">
        <div class="card-content">
<?php
    $sql = 'SELECT review, rating FROM reviews WHERE userid='.$userid;
    $result = mysqli_query($connect, $sql);
    if(mysqli_num_rows($result) == 1)
    {
        if($row = mysqli_fetch_assoc($result))
        {
            echo '
                <p class="subtitle">'.$row['review'].'</p>
                <div class="stars">
            ';
            switch ($row['rating']) {
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
        }
    }
    else if(mysqli_num_rows($result) == 0)
    {
        echo'
            <p class="subtitle">No Reviews.</p>
            <form action="postreview.php" method="post">
                <input class="button is-primary" type="submit" value="Post A Review">
            </form>     
        ';
    }
?>

        </div>
    </div>
</div>
            <div class="column is-one-half">
                <p class="title">My Events</p>
                <div class="card te-rounded">
                    <div class="card-content">
<?php
    $sql = 'SELECT bookings.eventid, bookings.price, bookings.quantity, bookings.total, events.name FROM bookings INNER JOIN events ON bookings.eventid = events.id WHERE bookings.userid ='.$_SESSION['userid'];
    $result = mysqli_query($connect, $sql);
    if(mysqli_num_rows($result) > 0)
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            echo '<p class="title">'.$row['name'].'</p>';
            while ($row = mysqli_fetch_assoc($result))
            {
                if ($row['price'] == 12.00)
                {
                    echo '<p>Adult x ' . $row['quantity'].' @ &pound;'. $row['total'].'</p>';
                }
                if ($row['price'] == 5.00)
                {
                    echo '<p>Child x ' . $row['quantity'] . ' @ &pound;' . $row['total'] . '</p>';
                }
                if ($row['price'] == 8.00)
                {
                    echo '<p>Concession x ' . $row['quantity'] . ' @ &pound;' . $row['total'] . '</p>';
                }
            }
        }
    }
    else{
        echo '<p class="subtitle">No Events Booked.</p>';    }
}
else
{
    header('Location: index.php');
}
?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</section>

<?php
require 'scripts.php';
require 'footer.php';
?>


