<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modal</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('/css/modal_alert.css'); ?>">
    <?php echo "<script src='".base_url('./backoffice_static/config.js')."'></script>"; ?>
</head>

<body>
    <div class="modal">
        <div class="modal-content slide-top">
            <div class="modal-header">
                <img src="<?= base_url("imgs/fail_icon.svg") ?>" alt="Modal Header Image">
            </div>
            <div class="modal-body">
                <div class="modal-msg">Please check again.</div>
                <div class="gray fs-14px">Do you want to disapprove?</div>
            </div>
            <div class="modal-footer">
                <button onclick="closeModal()" class="modal-btn cancel-btn">try again</button>
            </div>
        </div>
    </div>

</body>

</html>
<script>
    
    const modal = document.querySelector('.modal');
    const modalContent = document.querySelector('.modal-content');
    const cancelBtn = document.querySelector('.cancel-btn');
    const confirmBtn = document.querySelector('.confirm-btn');

    function model_try_again() {
        modal.style.display = 'flex';
        setTimeout(function () {
            modalContent.classList.add('slide-top');
        }, 100);
    }

    function closeModal() {
        modalContent.classList.remove('slide-top');
        setTimeout(function () {
            modal.style.display = 'none';
        }, 500);
    }

    cancelBtn.addEventListener('click', closeModal);
    confirmBtn.addEventListener('click', closeModal);

</script>