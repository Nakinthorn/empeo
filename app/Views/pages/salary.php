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
    <a href="<?php echo base_url('/employment_type') ?>">
        <div class="px-4 py-5 border-b border-gray-300 active:bg-[#0063F7]">
            <h3 class="text-lg font-medium text-gray-900 active:text-white ">Employment type</h3>
        </div>
    </a>
    <a href="<?php echo base_url('/pay_installment') ?>">
        <div class="px-4 py-5 border-b border-gray-300 active:bg-[#0063F7]">
            <h3 class="text-lg font-medium text-gray-900 active:text-white ">Pay Installment</h3>
        </div>
    </a>
    <a href="<?php echo base_url('/income_deduction') ?>">
        <div class="px-4 py-5 border-b border-gray-300 active:bg-[#0063F7]">
            <h3 class="text-lg font-medium text-gray-900 active:text-white ">Income Deduction</h3>
        </div>
    </a>
</body>

</html>