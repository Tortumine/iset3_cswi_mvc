<?php
/**
 * Created by PhpStorm.
* User: Tortumine
* Date: 17-08-17
* Time: 14:50
*/
$this->title = "Home"; ?>

<div class=" col-md-offset-0 col-md-3">
    <?php
    if($_SESSION['lvl']==1)
    {
        require 'partial_sign_in.php';
    }
    else
    {
        require 'partial_menu.php';
    }
    ?>
</div>

<?php
if($_SESSION['lvl']==10)
{
    require 'partial_users_links.php';
}
else
{
    require 'partial_users_list.php';
}
?>
<?php
if($_SESSION['lvl']!=10){?>
    <div class=" col-md-offset-0 col-md-3 left">
    <img src="Content/its-something.jpg" alt="It's something">
    </div>
<?php } ?>