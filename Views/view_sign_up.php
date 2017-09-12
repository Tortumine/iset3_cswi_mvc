<?php
/**
 * Created by PhpStorm.
 * User: Tortumine
 * Date: 17-08-17
 * Time: 14:55
 */
$this->title = "Join us !"; ?>
<div class=" col-md-offset-0 col-md-3 left" xmlns="http://www.w3.org/1999/html">
    <h3><?= $message ?></h3>
    <script src="Javascript/validate_rules.js"></script>
    <script src="Javascript/jquery.validate.min.js"></script>
    <div class="form-login">
        <form action="index.php?action=sign_up" id="form" method="post" name='sign_up'>
            <input type="text"      name="userName"         id="userName"       class="form-control input-sm chat-input" placeholder="username" />
            <input type="email"     name="userEmail"        id="userEmail"      class="form-control input-sm chat-input" placeholder="email" />
            <input type="date"      name="userBirthDate"    id="userBirthDate"  class="form-control input-sm chat-input" placeholder="birth date" />
            <input type="password"  name="userPassword_A"   id="userPassword_A" class="form-control input-sm chat-input" placeholder="password" />
            <input type="password"  name="userPassword_B"   id="userPassword_B" class="form-control input-sm chat-input" placeholder="repeat password" />
            <input type="submit"    name="submit"           id="signUp"         class="btn btn-primary btn-block btn-md"  value="Sign-up">
        </form>
    </div>
</div>