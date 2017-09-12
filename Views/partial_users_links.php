<div class=" col-md-offset-0 col-md-6 left">
    <div class="form-login">
        <h2>Users List</h2>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Login</th>
                <th>Birth date</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($users as $user){ if($user['login']!='admin'){?>
                <tr>
                    <td class="col-md-2"><?php echo $user['login']; ?></td>
                    <td class="col-md-2"><?php echo $user['birth_date']; ?></td>
                    <td class="col-md-2"><?php echo $user['e_mail']; ?></td>
                    <td class="btn-group col-md-2">
                        <a href="index.php?action=get_user&user=<?php echo $user['login']; ?>" class="btn btn-default btn-xs">Update <i class="fa fa-pencil"></i></a>
                        <a href="index.php?action=delete_user&user=<?php echo $user['login']; ?>" class="btn btn-danger btn-xs">Delete <i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php } } ?>
            </tbody>
        </table>
    </div>
</div>