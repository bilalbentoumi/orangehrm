<?php

function getMenuUrl($menuItem) {
    $url = '#';
    if (!empty($menuItem['module']) && !empty($menuItem['action'])) {
        $url = url_for($menuItem['module'] . '/' . $menuItem['action']);
        $url = empty($menuItem['urlExtras']) ? $url : $url . $menuItem['urlExtras'];
    }
    return $url;
}

function getHtmlId($menuItem) {
    $id = '';
    if (!empty($menuItem['action'])) {
        $id = 'menu_' . $menuItem['module'] . '_' . $menuItem['action'];
    } else {
        $module             = '';
        $firstSubMenuItem   = $menuItem['subMenuItems'][0];
        $module             = $firstSubMenuItem['module'] . '_';

        $id = 'menu_' . $module . str_replace(' ', '', $menuItem['menuTitle']);
    }
    return $id;
}

function getClasses($menuItem, $currentItemDetails) {
    if ($menuItem['level'] == 1 && $menuItem['id'] == $currentItemDetails['level1']) {
        return 'current';
    }
}

?>

<div class="nav">
    <div class="label">GENERAL</div>
    <?php foreach ($menuItemArray as $firstLevelItem) : ?>
        <?php if (sizeof($firstLevelItem['subMenuItems']) == 0): ?>
            <a href="<?php echo getMenuUrl($firstLevelItem); ?>"
               id="<?php echo getHtmlId($firstLevelItem); ?>"
               class="nav-item <?php echo getClasses($firstLevelItem, $currentItemDetails); ?>">
                <span><?php echo __($firstLevelItem['menuTitle']) ?></span>
            </a>
        <?php else: ?>
            <div class="nav-item has-menu" id="<?php echo getHtmlId($firstLevelItem); ?>">
                <span><?php echo __($firstLevelItem['menuTitle']) ?></span>
                <div class="fill"></div>
                <i class="fas fa-chevron-right"></i>
            </div>
            <div class="menu">
                <?php foreach ($firstLevelItem['subMenuItems'] as $secondLevelItem) : ?>
                    <?php if (sizeof($secondLevelItem['subMenuItems']) == 0): ?>
                        <a href="<?php echo getMenuUrl($secondLevelItem); ?>" class="menu-item">
                            <?php echo __($secondLevelItem['menuTitle']); ?>
                        </a>
                    <?php else: ?>
                        <div class="menu-item has-sub-menu">
                            <?php echo __($secondLevelItem['menuTitle']); ?>
                            <div class="fill"></div>
                            <i class="fas fa-chevron-right"></i>
                        </div>
                        <div class="sub-menu">
                            <?php foreach ($secondLevelItem['subMenuItems'] as $thirdLevelItem) : ?>
                                <a href="<?php echo getMenuUrl($thirdLevelItem); ?>" class="sub-menu-item">
                                    <?php echo __($thirdLevelItem['menuTitle']); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>


<script>

    $('.input input').focus(function () {
        $(this).parent().addClass('active');
    });

    $('.input input').blur(function () {
        if ($(this).val().length == 0)
            $(this).parent().removeClass('active');
    });

    function showMenu(menu) {
        $('.sidebar .nav .menu').removeClass('active');
        $(menu).addClass('active');
    }

    function hideMenus(menu) {
        $('.sidebar .nav .nav-item').removeClass('active');
        $('.sidebar .nav .menu').removeClass('active');
    }

    function showSubMenu(subMenu) {
        $('.sidebar .nav .sub-menu').removeClass('active');
        $(subMenu).addClass('active');
    }

    function hideSubMenus() {
        $('.sidebar .nav .menu-item').removeClass('active');
        $('.sidebar .nav .sub-menu').removeClass('active');
    }

    $('.sidebar .nav .has-menu').click(function () {
        if ($(this).hasClass('active')) {
            hideMenus();
            hideSubMenus();
        } else {
            hideMenus();
            hideSubMenus();
            $(this).addClass('active');
            showMenu($(this).next('.menu'));
        }
    });

    $('.sidebar .nav .has-sub-menu').click(function () {
        if ($(this).hasClass('active')) {
            hideSubMenus();
        } else {
            hideSubMenus();
            $(this).addClass('active');
            showMenu($(this).parent());
            showSubMenu($(this).next('.sub-menu'));
        }
    });

</script>

<style>

    .nav-item span:before {
        font-family: 'Font Awesome 5 Pro';
        font-weight: 600;
        margin-inline-end: 15px;
    }

    /* Admin */
    #menu_admin_viewAdminModule span:before {
        content: '\f023';
    }

    /* PIM */
    #menu_pim_viewPimModule span:before {
        content: '\f007';
    }

    /* Leave */
    #menu_leave_viewLeaveModule span:before {
        content: '\f073';
    }

    /* Time */
    #menu_time_viewTimeModule span:before {
        content: '\f017';
    }

    /* Recruitment */
    #menu_recruitment_viewRecruitmentModule span:before {
        content: '\f07b';
    }

    /* My Info */
    #menu_pim_viewMyDetails span:before {
        content: '\f05a';
    }

    /* Performance */
    #menu__Performance span:before {
        content: '\f200';
    }

    /* Dashboard */
    #menu_dashboard_index span:before {
        content: '\f12e';
    }

    /* Directory */
    #menu_directory_viewDirectory span:before {
        content: '\f0e8';
    }

    /* Maintenance */
    #menu_maintenance_purgeEmployee span:before {
        content: '\f013';
    }

    /* Buzz */
    #menu_buzz_viewBuzz span:before {
        content: '\f0e7';
    }
</style>