<?php
/**
 * Created by PhpStorm.
 * User: Tortumine
 * Date: 17-08-17
 * Time: 12:00
 */

$this->title = "Update data"; ?>

<div class=" col-md-offset-3 col-md-5">
    <h2><?= $user5['login'] ?> old values</h2>
    <table class="table table-bordered">
        <tbody>
        <tr>
            <td>Email</td>
            <td><?= $user5['e_mail'] ?></td>
        </tr>
        <tr>
            <td>Birth date</td>
            <td><?= $user5['birth_date'] ?></td>
        </tr>
        </tbody>
    </table>
    <h2>New Values</h2>
    <script src="Javascript/validate_rules.js"></script>
    <script src="Javascript/jquery.validate.min.js"></script>
    <div class="form-login">
        <form action="index.php?action=update5" id="form" method="post" name='update5'>
            <input type="email"     name="userEmail"        id="userEmail"      class="form-control input-sm chat-input" value="<?= $user5['e_mail'] ?>" />
            <input type="date"      name="userBirthDate"    id="userBirthDate"  class="form-control input-sm chat-input" value=<?= $user5['birth_date'] ?> />
            <input type="password"  name="userPassword_A"   id="userPassword_A" class="form-control input-sm chat-input" placeholder="New password" />
            <input type="password"  name="userPassword_B"   id="userPassword_B" class="form-control input-sm chat-input" placeholder="Repeat password" />
            <input type="submit"    name="submit"           id="signUp"         class="btn btn-primary btn-block btn-md"  value="Sign-up">
        </form>
    </div>

</div>
