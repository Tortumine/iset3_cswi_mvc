<?php $this->message = "<a href='index.php'>Or you could leave</a>"; ?>
<!--Pulling Awesome Font -->
<div class="form-login">
    <script src="Javascript/validate_rules.js"></script>
    <script src="Javascript/jquery.validate.min.js"></script>
    <h2><?php echo $message; ?></h2>
    <div>
        <form action="index.php?action=sign_in" id="form" method="post" name='sign_in'>
            <input type="text"      name="userName"         id="userName"       class="form-control input-sm chat-input" placeholder="username" />
            <input type="password"  name="userPassword"     id="userPassword"   class="form-control input-sm chat-input" placeholder="password" />
            <div class="wrapper">
            <span class="group-btn ">
                <input type="submit"    name="submit"           id="signIn"         class="btn btn-primary btn-block btn-md"  value="Sign-in">
                <a href="index.php?action=sign_up_form" class="btn btn-default btn-block btn-xs">Sign-up <i class="fa fa-sign-in"></i></a>
            </span>
            </div>
        </form>
    </div>
</div>