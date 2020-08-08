<div class="page-heading">
    <h1><?php echo __('Dashboard'); ?></h1>
</div>

<?php
foreach ($settings->getRawValue() as $groupKey => $config): ?>

    <?php if ($groupKey == 0): ?>
        <?php foreach ($config['panels'] as $panelKey => $panel): ?>
            <?php include_component('dashboard', 'ohrmDashboardSection', $panel['attributes']); ?>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if ($groupKey == 1): ?>
        <div class="box">
            <div class="dashboard-grid-35-fill">
                <?php foreach ($config['panels'] as $panelKey => $panel): ?>
                    <?php if($panel['attributes']['action_name'] != 'baseLegend'): ?>
                        <div class="widget">
                            <div class="widget-header">
                                <h2><?php echo __($panel['name']); ?></h2>
                            </div>
                            <div class="widget-body">
                                <?php include_component('dashboard', 'ohrmDashboardSection', $panel['attributes']); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>

<?php endforeach; ?>


<style>
    .dashboard-grid-35-fill {
        display: grid;
        grid-template-columns: 35% auto;
        grid-gap: 30px;
    }

    .box {
        padding: 30px;
        margin: 0;
    }

    .widget {
        background: #FFF;
        box-shadow: 0 2px 2px #0001;
    }

    .widget .widget-header {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
        border-bottom: 1px solid #EEE;
    }

    .widget .widget-body {
        padding: 20px;
    }

</style>
