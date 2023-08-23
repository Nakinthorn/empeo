<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>document_detail</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('/css/global.css'); ?>">
    <?php echo "<script src='".base_url('./backoffice_static/config.js')."'></script>"; ?>
</head>
<style>
    .mybody {
        height: 85vh;
        padding: 16px;
    }

    .box2 {
        display: flex;
    }

    .mybox-shadow {
        box-shadow: 24px 8px 38px 0px rgba(0, 0, 0, 0.2);
        -webkit-box-shadow: 24px 8px 38px 0px rgba(0, 0, 0, 0.2);
        -moz-box-shadow: 24px 8px 38px 0px rgba(0, 0, 0, 0.2);
    }
</style>

<body>
    <div class="mybody">
        <div class="box2">
            <div class="circle box1">
                <img style="object-fit: contain; width: 100px;" src="<?= base_url('/imgs/avatar_wrap.png') ?>" alt="">
            </div>
            <div style="display: flex; flex-direction: column; justify-content: center;">
                <div class="fs-16px fw-500"><?php echo $fullname ?></div>
                <div class="fs-12px f-color-gray"><?php echo $job_title ?></div>
            </div>
        </div>
        <div class="mt-10" style="display: flex; justify-content: space-between; align-items: center;">
            <span class="fw-400 fs-14px">Business Leave </span>
            <span class="fw-400 fs-14px f-color-gray">1 Day</span>
        </div>
        <div class="mt-10" style="display: flex; justify-content: space-between; align-items: center;">
            <span class="fw-400 fs-14px">Date </span>
            <div class="fw-400 fs-14px f-color-gray flex-middle-box">
                <img style="width:15px;" src="<?= base_url('imgs/calendar.svg') ?>" alt="">
                <span style="margin-left: 10px;"> <?php echo $date_start ?> - <?php echo $date_end ?></span>

            </div>
        </div>
        <div class="mt-10" style="display: flex;flex-direction: column;">
            <span class="fw-400 fs-14px">About </span>
            <div class="fw-400 fs-14px f-color-gray mt-10" style="height: 15vh;">
            <?php echo $about ?> 
            </div>
            <div class="mt-10" style="display: flex;justify-content: space-around;">
                <div style="width: 168px;height: 100.94px;" class="mybox-shadow flex-middle-box">
                    document
                </div>
                <div style="width: 168px;height: 100.94px;" class="mybox-shadow flex-middle-box">
                    document
                </div>
            </div>
        </div>
</body>

</html>
