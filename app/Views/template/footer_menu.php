<?php
$session = session();
$token = $session->get('token');
?>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url('/css/global.css'); ?>">
<footer>
    <div class="botmenucontainer">
        <div class="half">
            <div class="botmenubox">
                <img src="<?= base_url('imgs/home3.svg') ?>" alt="123">
                <span class="menutext">Home</span>
            </div>
            <div class="botmenubox" onclick="<?= esc($gotocalendar); ?>">
                <img src="<?= base_url('imgs/calendar.svg') ?>" alt="123">
                <span class="menutext">Calendar</span>
            </div>

        </div>

        <div class="circle" onclick="checkStatus()">
            <img src="<?= base_url('imgs/check_in_out_icon.png') ?>" alt="123">

        </div>

        <div class="half">
            <div class="botmenubox" onclick="<?= esc($gototeam); ?>">
                <img src="<?= base_url('imgs/people.svg') ?>" alt="123">
                <span class="menutext">Team</span>
            </div>
            <div class="botmenubox" onclick="window.location.href='<?php echo base_url('settings'); ?>'">
                <img src="<?= base_url('imgs/setting2.svg') ?>" alt="123">
                <span class="menutext">Setting</span>
            </div>

        </div>
    </div>

    <div class="modal hide" id='modal_fail' style='display:flex;'>
        <div class="modal_content_check">
            <div class="modal_header">
                <img src="<?= base_url("imgs/fail_icon.svg") ?>" alt="Modal Header Image">
            </div>
            <div class="modal_body">
                <div class="modal_msg">Today you Check in and Check out already</div>
                <div class="gray fs-14px modal_text" id="fail_txt">You can continue tomorrow</div>
            </div>
            <div class="modal_footer_check">
                <button class="modal_btn_check_cancel cancel_btn_changePassword" onclick='closeModal();refresh();'>try again</button>
            </div>
        </div>
    </div>

    <div class="modal hide" id='modal_success' style='display:flex;'>
        <div class="modal_content_check">
            <div class="modal_header">
                <img src="<?= base_url("imgs/success_icon.svg") ?>" alt="Modal Header Image">
            </div>
            <div class="modal_body">
                <div class="modal_msg">Email send successfully</div>
                <div class="gray fs-14px modal_text2" style="color: #6B6F80">Your salary have been send to email</div>
            </div>
            <div class="modal_footer_check">
                <button class="modal_btn_check_cancel cancel_btn_changePassword" onclick='closeModal();refresh();'>Cancel</button>
                <button class="modal_btn_check success_btn" onclick='closeModal();backhome();'>Closed</button>
            </div>
        </div>
    </div>

    <? $url1 ?>
</footer>


</body>

</html>
<script>
     function model_try_again(alert = 'some thing went wrong 222') {
        setTimeout(function() {
            $('#modal_fail').removeClass('hide')
            $('.modal_content_check').addClass('slide_top');
            $('#fail_txt').html(alert);
        }, 100);
    }

    function closeModal() {
        $('.modal_content_check').removeClass('slide_top');
        setTimeout(function() {
            $('.modal').addClass('hide');
        }, 100);
    }

    function model_success(alert = 'Success') {
        setTimeout(function() {
            $('#modal_success').removeClass('hide');
            $('.modal_content_check').addClass('slide_top');
        }, 100);
    }
    function checkStatus() {
        var myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/json");

        var raw = JSON.stringify({
            "token": '<?php echo $token; ?>'
        });

        var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: raw,
            redirect: 'follow'
        };

        fetch("http://localhost:3333/mobile/checkStatus_in_out", requestOptions)
            .then(response => response.json())
            .then(result => {
                if (result.data === 'fully') {
                    model_try_again('You can check in check out tomorrow');
                }
                if (result.data === 'check_in') {
                    window.location.href = "<?php echo base_url('checkin'); ?>";
                }
                if (result.data === 'check_out') {
                    window.location.href = "<?php echo base_url('checkout'); ?>";
                }
            })
            .catch(error => console.log('error', error));
    }
</script>
<style>
    footer {
        display: flex;
        width: 100vw;
        height: 10vh;
        padding: 20px;
        position: fixed;
        bottom: 0;
        background-color: white;
    }

    .botmenucontainer {
        display: flex;
        width: 100%;
        height: 100%;
        justify-content: space-between;

    }

    .botmenubox {
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .botmenubox img {
        width: 30x;
        height: 30px;
    }

    .circle {
        height: 20vw;
        width: 20vw;
        border-radius: 50%;
        background: linear-gradient(178.65deg, #608DFF 3.87%, #043C9A 87.75%);
        position: absolute;
        bottom: 2vh;
        left: 40vw;
        display: flex;
        align-items: center;
        justify-content: center;

    }

    .circle img {
        width: 40px;
        height: 40px;

    }

    .half {
        display: flex;
        width: 35%;
        justify-content: space-between;
        align-items: center;
    }

    .menutext {
        color: #8F90A6;
        font-size: 12px;
    }

    .modal_content_check {
        background-color: #fff;
        width: 80%;
        max-width: 600px;
        padding: 20px;
        border-radius: 16px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        position: relative;
        animation-name: slide_top;
        animation-duration: 0.5s;
        animation-delay: 1s;
        animation-fill-mode: forwards;
    }

    .modal_footer_check {
        display: flex;
    }

    .modal_btn_check {
        background: #FFFFFF;
        border: 1px solid #C7C9D9;
        border-radius: 8px;
        padding: 8px 12px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .modal_btn_check_cancel {
        border: 1px solid #C7C9D9;
        border-radius: 8px;
        padding: 8px 12px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .modal_btn_check {
        background: #0063F7;
        color: #FFFFFF;
    }

</style>