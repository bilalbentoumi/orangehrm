<?php

// Allow header partial to be overridden in individual actions
// Can be overridden by: slot('header', get_partial('module/partial'));
include_slot('header', get_partial('global/header'));
$subscribed = $sf_user->isSubscribed();

echo stylesheet_tag(theme_path('fonts/Roboto/Roboto.css'));
echo stylesheet_tag(theme_path('fontawesome/css/all.css'));
echo stylesheet_tag(theme_path('css/myStyle.css'));
?>
</head>
<body>

<div class="wrapper">
    <div class="navbar">
        <a href="" class="logo">
            <img src="<?php echo theme_path('images/myLogo.png')?>"/>
        </a>
        <div class="nav">
            <a href="" class="nav-link">
                <i class="fas fa-arrow-left"></i>
            </a>
            <a class="nav-link" onclick="fullscreen()">
                <i class="fas fa-expand"></i>
            </a>
            <a href="" class="nav-link">
                <i class="fas fa-search"></i>
            </a>
            <div class="fill"></div>
            <a href="" class="nav-link">
                FR
            </a>
            <a href="" class="nav-link">
                <i class="fas fa-bell"></i>
            </a>
            <a href="" class="profile-pic">
                <img src="<?php echo theme_path('images/profile.jpg')?>"/>
                <div class="online"></div>
            </a>
        </div>
    </div>
    <div class="container">
        <div class="sidebar">
            <div class="sidebar-header"></div>
            <div class="sidebar-body">
                <?php include_component('core', 'mainMenuCustom'); ?>
            </div>
            <div class="sidebar-footer">
                <div class="footer-nav">
                    <a href="" class="nav-link">
                        <i class="fas fa-lock"></i>
                    </a>
                    <a href="" class="nav-link">
                        <i class="fas fa-eye-slash"></i>
                    </a>
                    <a href="<?php echo url_for('auth/logout'); ?>" class="nav-link">
                        <i class="fas fa-power-off"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="main">
            <?php echo $sf_content ?>
        </div>
    </div>
</div>

<?php include_slot('footer', get_partial('global/footer'));?>
<script>
    var elem = document.documentElement;
    function fullscreen() {
        if (elem.requestFullscreen) {
            elem.requestFullscreen();
        } else if (elem.mozRequestFullScreen) { /* Firefox */
            elem.mozRequestFullScreen();
        } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari and Opera */
            elem.webkitRequestFullscreen();
        } else if (elem.msRequestFullscreen) { /* IE/Edge */
            elem.msRequestFullscreen();
        }
    }
</script>