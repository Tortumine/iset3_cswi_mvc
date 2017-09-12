<div class=" col-md-offset-0 col-md-3 left">
    <div class="form-login">
        <h2>Users List</h2>
        <ul class="list-group">
            <?php foreach($users as $user){ ?>
                <li class="list-group-item"><?php echo $user['login']; ?></li>
            <?php } ?>
        </ul>
    </div>
</div>