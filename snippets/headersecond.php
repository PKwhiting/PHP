
<img src="../images/site/logo.png" alt="php motors logo">
<?php 
if(isset($_SESSION['loggedin'])){
    if($_SESSION['loggedin'] == TRUE){
        $welcome = '<a class="adminlink" href="index.php?action=adminview" title="Access important information about account">Welcome ' ;
        $welcome .= $_SESSION['firstname'];
        $welcome .= '</a>';
        echo '<a href="/phpmotors/accounts/index.php?action=logout" title="Log Out">Log Out</a>';
        echo $welcome;
       //echo '<a class="adminlink" href="index.php?action=adminview" title="Access important information about account">Welcome $name</a>';
        }
        else {
            echo '<a href="/phpmotors/accounts/index.php?action=loginview" title="Access important information about account">My Account</a>';
        }
    }
else {
    echo '<a href="/phpmotors/accounts/index.php?action=loginview" title="Access important information about account">My Account</a>';
}
?>


