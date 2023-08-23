<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <?php echo "<script src='".base_url('./backoffice_static/config.js')."'></script>"; ?>
</head>

<body>
    <div>
        <a href="<?php echo base_url('/menu/admin') ?>">Back</a>
    </div>
    <a href="<?php echo base_url('/common_master') ?>">
        <div class="px-4 py-5 border-b border-gray-300 active:bg-[#0063F7]">
            <h3 class="text-lg font-medium text-gray-900 active:text-white ">Common Master</h3>
        </div>
    </a>
    <a href="<?php echo base_url('/social_security_contribution') ?>">
        <div class="px-4 py-5 border-b border-gray-300 active:bg-[#0063F7]">
            <h3 class="text-lg font-medium text-gray-900 active:text-white ">Social Security Contribution</h3>
        </div>
    </a>
    <a href="<?php echo base_url('/year_to_date_earning') ?>">
        <div class="px-4 py-5 border-b border-gray-300 active:bg-[#0063F7]">
            <h3 class="text-lg font-medium text-gray-900 active:text-white ">Year-to-date Earning</h3>
        </div>
    </a>
    <!-- <a href="<?php echo base_url('/notification_template') ?>">
        <div class="px-4 py-5 border-b border-gray-300 active:bg-[#0063F7]">
            <h3 class="text-lg font-medium text-gray-900 active:text-white ">Notification Template</h3>
        </div>
    </a>
    <a href="<?php echo base_url('/employee_data_field') ?>">
        <div class="px-4 py-5 border-b border-gray-300 active:bg-[#0063F7]">
            <h3 class="text-lg font-medium text-gray-900 active:text-white ">Employee Data Field</h3>
        </div>
    </a>
    <a href="<?php echo base_url('/setting_email_notification') ?>">
        <div class="px-4 py-5 border-b border-gray-300 active:bg-[#0063F7]">
            <h3 class="text-lg font-medium text-gray-900 active:text-white ">Setting email notification</h3>
        </div>
    </a> -->
    <a href="<?php echo base_url('/expense_setup') ?>">
        <div class="px-4 py-5 border-b border-gray-300 active:bg-[#0063F7]">
            <h3 class="text-lg font-medium text-gray-900 active:text-white ">Expense</h3>
        </div>
    </a>
</body>

</html>