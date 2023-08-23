<?php
    $session = session();
    $token = $session->get('token');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= base_url('/css/global.css'); ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <?php echo "<script src='".base_url('./backoffice_static/config.js')."'></script>"; ?>
    <title>PIN</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:wght@200;400;500;800&display=swap');

    body {
        margin: 0;
        padding: 0;
        font-family: "Inter", sans-serif;
    }

    .head-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        height: 12vh;
        width: 100%;
    }

    .inputView {
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    .inputView input {
        width: 60px;
        height: 62px;
        background: #FFFFFF;
        box-shadow: 0px 5px 20px rgba(169, 169, 169, 0.1);
        border-radius: 8px;
        border: none;
        font-size: 36px;
        font-weight: 400;
        text-align: center;
    }

    .touchpad {
        display: flex;
        flex-wrap: wrap;
        margin-top: 5px;
    }

    .row {
        display: flex;
        justify-content: center;
        width: 100%;
        margin-bottom: 10px;
    }

    button {
        width: 100px;
        height: 80px;
        font-size: 36px;
        font-weight: 400;
        margin: 10px;
        border: none;
        background: none;
    }

    button:focus {
        outline: none;
    }

    button:active {
        background-color: #d9d9d9;
        height: 60px;
        width: 60px;
    }

    button:hover {
        transform: scale(1.2);
        border-radius: 50%;
    }

    .pinTitle {
        text-align: center;
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
        font-size: 16px;
    }

    .modal_btn_check_cancel {
        border: 1px solid #C7C9D9;
        border-radius: 8px;
        padding: 8px 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 16px;
        width: 40vw;
        height: 7vh;
    }

    .modal_btn_check {
        background: #0063F7;
        color: #FFFFFF;
        width: 40vw;
        height: 7vh;
    }
</style>

<body>
    <div class="head-container">
        <img src="<?= base_url('imgs/arrowleft_black.png') ?>" alt="Image" onclick="backSetting();" style="margin-left: 16px;">
        <p class="p-head">Pin</p>
        <p style="visibility:hidden;">&NotPrecedesEqual;</p>
    </div>
    <div class="pinTitle">
        <p style="font-weight: 500;font-size: 14px;color: #555770;">Please enter your pin.</p>
        <p style="font-weight: 400;font-size: 12px;color: #C7C9D9;">Enter your old pin code to edit.</p>
    </div>
    <div class="inputView">
        <input id="input1" type="text">
        <input id="input2" type="text">
        <input id="input3" type="text">
        <input id="input4" type="text">
    </div>

    <div class="touchpad">
        <div class="row">
            <button onclick="valueNumber(1)">1</button>
            <button onclick="valueNumber(2)">2</button>
            <button onclick="valueNumber(3)">3</button>
        </div>
        <div class="row">
            <button onclick="valueNumber(4)">4</button>
            <button onclick="valueNumber(5)">5</button>
            <button onclick="valueNumber(6)">6</button>
        </div>
        <div class="row">
            <button onclick="valueNumber(7)">7</button>
            <button onclick="valueNumber(8)">8</button>
            <button onclick="valueNumber(9)">9</button>
        </div>
        <div style="display: flex; justify-content: end; width: 96%; margin-bottom: 10px;">
            <button onclick="valueNumber(0)">0</button>
            <button onclick="deleteNumber()">X</button>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal hide" id='modal_fail' style='display:flex;'>
        <div class="modal_content_check">
            <div class="modal_header">
                <img src="<?= base_url("imgs/fail_icon.svg") ?>" alt="Modal Header Image">
            </div>
            <div class="modal_body">
                <div class="modal_msg">Please check again.</div>
                <div class="gray fs-14px modal_text" id="fail_txt">Password must be at least 8 characters long</div>
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
                <div class="modal_msg">Set PIN successfully</div>
            </div>
            <div class="modal_footer_check">
                <button class="modal_btn_check_cancel cancel_btn_changePassword" onclick='closeModal();refresh();'>Cancel</button>
                <button class="modal_btn_check success_btn" onclick='closeModal();backhome();'>Closed</button>
            </div>
        </div>
    </div>
    <!-- end modal -->
    <script>
        let ENDPOINT = window.API_URL;

        var currentInput = 1;

        function valueNumber(value) {
            var input = document.getElementById("input" + currentInput);
            input.value = value;
            currentInput++;
            if (currentInput > 4) {
                currentInput = 1;
                var filled = true;
                var pinValue = '';
                for (var i = 1; i <= 4; i++) {
                    var inputField = document.getElementById("input" + i);
                    if (inputField.value == "") {
                        filled = false;
                        break;
                    }
                    pinValue += inputField.value;
                }
                if (filled) {
                    for (var i = 1; i <= 4; i++) {
                        var inputField = document.getElementById("input" + i);
                        inputField.value = "";
                        inputField.type = "text";
                    }
                    console.log('pin : ', pinValue);

                    var myHeaders = new Headers();
                    myHeaders.append("Content-Type", "application/json");

                    var raw = JSON.stringify({
                        "token": '<?php echo $token; ?>',
                        "pin": pinValue
                    });

                    var requestOptions = {
                        method: 'POST',
                        headers: myHeaders,
                        body: raw,
                        redirect: 'follow'
                    };

                    fetch(ENDPOINT + "api/setPin", requestOptions)
                        .then(response => response.json())
                        .then(result => {
                            if (result.code === 200) {
                                model_success();
                            }
                            console.log(result)
                        })
                        .catch(error => console.log('error', error));

                    function redirectToPage() {
                        window.location.href = "<?= base_url("settings") ?>";
                    }
                }
            }
            setTimeout(function() {
                input.type = "password";
                console.log(input.value);
            }, 500);
        }

        function deleteNumber() {
            if (currentInput == 1) {
                return;
            }
            currentInput--;
            var input = document.getElementById("input" + currentInput);
            input.value = "";
            input.type = "text";

            for (var i = currentInput + 1; i <= 4; i++) {
                var current = document.getElementById("input" + (i - 1));
                var next = document.getElementById("input" + i);
                current.value = next.value;
                current.type = "password";
                next.value = "";
                next.type = "text";
            }
        }

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

        function backhome() {
            window.location.href = "<?= base_url("home") ?>";
        }
        function backSetting() {
            window.location.href = "<?= base_url("settings") ?>";
        }
        
    </script>
</body>

</html>