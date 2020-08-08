<?php
	$imagePath = theme_path("images");
	echo stylesheet_tag(theme_path('fonts/Roboto/Roboto.css'));
	echo stylesheet_tag(theme_path('css/myStyle.css'));
?>

<div class="login-container">
    <img src="<?php echo "{$imagePath}/myLogo.png"; ?>" class="logo"/>
    <form class="login-box" id="frmLogin" method="post" action="<?php echo url_for('auth/validateCredentials'); ?>">
        <input type="hidden" name="actionID"/>
        <input type="hidden" name="hdnUserTimeZoneOffset" id="hdnUserTimeZoneOffset" value="0" />
        <?php echo $form->renderHiddenFields(); // rendering csrf_token ?>
        <h2 class="title">
            <?php echo __('LOGIN Panel'); ?>
        </h2>
        <div class="input">
            <label for="Username"><?php echo __('Username'); ?></label>
            <?php echo $form['Username']->render(); ?>
        </div>
        <div class="input">
            <label for="Password"><?php echo __('Password'); ?></label>
            <?php echo $form['Password']->render(); ?>
        </div>
        <div class="row">
            <label class="checkbox">
                <span>Remember me</span>
                <input type="checkbox">
                <span class="checkmark"></span>
            </label>
            <a href="<?php echo url_for('auth/requestPasswordResetCode'); ?>" class="reset-password-link">
                <?php echo __('Forgot your password?'); ?>
            </a>
        </div>
        <?php if (!empty($message)) : ?>
            <span id="spanMessage"><?php echo __($message); ?></span>
        <?php endif; ?>
        <button class="btn btn-primary" type="submit" name="Submit" id="btnLogin">
            <?php echo __('LOGIN'); ?>
        </button>
    </form>
</div>

<script type="text/javascript">

    function showMessage(message) {
        if ($('#spanMessage').length == 0) {
            $('<span id="spanMessage"></span>').insertAfter('#btnLogin');
        }

        $('#spanMessage').html(message);
    }

    function validateLogin() {
        var isEmptyPasswordAllowed = false;
        
        if ($('#txtUsername').val() == '') {
            showMessage('<?php echo __js('Username cannot be empty'); ?>');
            return false;
        }
        
        if (!isEmptyPasswordAllowed) {
            if ($('#txtPassword').val() == '') {
                showMessage('<?php echo __js('Password cannot be empty'); ?>');
                return false;
            }
        }
        
        return true;
    }

    $(document).ready(function() {
        $('#frmLogin').submit(validateLogin);
    });

    function checkSavedUsernames(){
        if ($('#txtUsername').val() != '') {
            removeHint();
        }
    }

    if (window.top.location.href != location.href) {
        window.top.location.href = location.href;
    }


    $('.input input').focus(function () {
        $(this).parent().addClass('active');
    });

    $('.input input').blur(function () {
        if ($(this).val().length == 0)
            $(this).parent().removeClass('active');
    });

    $('.input input').each(function (index, elm) {
        $(elm).focus();
        $(elm).blur();
    });
</script>
