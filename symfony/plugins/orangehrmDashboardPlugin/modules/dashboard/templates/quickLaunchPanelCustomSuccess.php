<div class="quick-links">
    <a href="pim/addEmployee" class="quick-link add-employee">
        <span><?php echo __('Add Employee'); ?></span>
        <i class="fas fa-user-plus"></i>
    </a>
    <a href="leave/assignLeave" class="quick-link assign-leave">
        <span><?php echo __('Assign Leave'); ?></span>
        <i class="far fa-calendar-check"></i>
    </a>
    <a href="leave/viewLeaveList" class="quick-link leave-list">
        <span><?php echo __('Leave List'); ?></span>
        <i class="far fa-calendar-alt"></i>
    </a>
    <a href="time/viewEmployeeTimesheet" class="quick-link time-sheets">
        <span><?php echo __('Timesheets'); ?></span>
        <i class="far fa-clock"></i>
    </a>
</div>

<style>
    .quick-links {
        padding: 0 30px;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        grid-gap: 30px;
    }

    .quick-link {
        padding: 25px;
        background: #F8F8F8;
        border-radius: 3px;
        display: flex;
        justify-content: space-between;
        align-items: end;
        transition: 100ms;
    }

    .quick-link:hover {
        opacity: 0.8;
    }

    .quick-link span {
        font-size: 24px;
        font-weight: 300;
        color: #FFF;
        line-height: 36px;
        max-width: 105px;
    }

    .quick-link i {
        font-size: 42px;
        color: #0003;
    }

    .quick-link.add-employee {
        background: #3689e5;
    }

    .quick-link.assign-leave {
        background: #8e24aa;
    }

    .quick-link.leave-list {
        background: #43a047;
    }

    .quick-link.time-sheets {
        background: #e53934;
    }
</style>