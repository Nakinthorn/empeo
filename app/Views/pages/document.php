<link rel="stylesheet" href="./css/global.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<?php echo "<script src='".base_url('./backoffice_static/config.js')."'></script>"; ?>
<style>
    .imgbox {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .imgbox span {
        color: #8F90A6;
    }


    .line1 {
        border: 1px solid #8F90A6;
        width: 60%;
    }

    .subcol1 {
        width: 100%;
        display: flex;
        flex-direction: column;
    }

    .txt01 {
        display: flex;
        color: #6B6F80;
        justify-content: space-between;
    }

    .txt2 {
        color: #2D3643;
    }

    .subcol2 {
        display: flex;
        justify-content: flex-end;
        width: 100%;
    }

    .allday {
        margin-left: 5px;
    }

    .greybc {
        width: 100%;
        height: 50px;
        display: flex;
        background-color: #FAFAFC;
        font-size: 16px;
        color: #8F90A6;
        padding: 12px 16px;
        gap: 8px;
        border-radius: 8px;
        justify-content: flex-start;
    }

    .datepicker {
        width: 100%;
        height: 100%;
        background: transparent;

    }

    .timepicker {
        width: 300%;
        height: 100%;
        background: transparent;
    }

    .doc-text {
        margin-top: 17px;
        font-size: 14px;
        line-height: 24px;
        font-weight: 400;
        color: #838799;
    }

    .btn_select_blue {
        margin-top: 17px;
        border: 1px solid #3E7BFA;
        border-radius: 17px;
        width: 30%;
        height: 34px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #3E7BFA;
    }

    .btn_select_blue_lang {
        margin-top: 17px;
        border: 1px solid #3E7BFA;
        border-radius: 17px;
        width: 30%;
        height: 34px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #3E7BFA;
    }

    .btn_active {
        background-color: #3E7BFA !important;
        color: #FFFFFF !important;
    }

    #countryDropdown select {
        width: 200px;
        padding: 8px;
        border: 1px solid #FAFAFC;
        border-radius: 4px;
        background-color: #fff;
        font-size: 16px;
    }

    #countryDropdown select:hover {
        background-color: #FAFAFC;
    }
</style>
<div class='content_template'>
    <div class="col1">
        <div class="subcol1">
            <details class="custom-select">
                <summary class="radios">
                    <input type="radio" name="item" id="item1" value='Certificate of Salary' title="Certificate of Salary" checked onchange='closeSelector()'>
                    <input type="radio" name="item" id="item2" value='Certificate of Employment' title="Certificate of Employment" onchange='closeSelector()'>
                    <input type="radio" name="item" id="item3" value='Certificate of Employment for VISA' title="Certificate of Employment for VISA" onchange='closeSelector()'>
                </summary>
                <ul class="list">
                    <li>
                        <label for="item1">Certificate of Salary</label>
                    </li>
                    <li>
                        <label for="item2">Certificate of Employment</label>
                    </li>
                    <li>
                        <label for="item3">Certificate of Employment for VISA</label>
                    </li>
                </ul>
            </details>
        </div>
    </div>
    <div id="countryDropdown" style="display: none;">
        Country
        <select id="countrySelect" style="width: 90vw; border: solid; height: 50px">
            <!-- Add more country options here -->
        </select>
    </div>

    <div class="dateStart" style="display: none;">
        <span>Date Start</span>
        <div class="col1 greybc">
            <img src="<?= base_url('imgs/calendar_icon.png') ?>" alt="" for='dateStart'>
            <!-- Select date -->
            <input type="text" id="dateStart" class="datepicker" name="datepicker" placeholder="Date Start">
        </div>
    </div>

    <div class="dateEnd" style="display: none;">
        <span>Date End</span>
        <div class="col1 greybc">
            <img src="<?= base_url('imgs/calendar_icon.png') ?>" alt="" for='dateEnd'>
            <!-- Select date -->
            <input type="text" id="dateEnd" class="datepicker" name="datepicker" placeholder="Date End">
        </div>
    </div>

    <div class="datePick">
        <span>Date</span>
        <div class="col1 greybc">
            <img src="<?= base_url('imgs/calendar_icon.png') ?>" alt="" for='datepicker1'>
            <!-- Select date -->
            <input type="text" id="datepicker1" class="datepicker" name="datepicker" placeholder="Select date">
        </div>
    </div>


    <div class="doc-text">Delivery Method*</div>
    <div class="set-space-btn">
        <div id='deli2' onclick='chosedeli(2)' class="btn_select_blue">
            By Email
        </div>
        <div id='deli3' onclick='chosedeli(3)' class="btn_select_blue">
            Self-Pickup
        </div>
        <div id='deli1' onclick='chosedeli(1)' class="btn_select_blue btn_active" style="visibility:hidden;">
            In App
        </div>

    </div>
    <div class="doc-text">
        Languge Format*
    </div>
    <div class="set-space-btn">
        <div id='lang1' onclick='choselang(1)' class="btn_select_blue_lang btn_active">
            Thai
        </div>
        <div id='lang2' onclick='choselang(2)' class="btn_select_blue_lang">
            English
        </div>
        <div id='lang3' onclick='choselang(3)' class="btn_select_blue_lang">
            Both
        </div>
    </div>

    <div class='col1'>
        <div class="subcol1">
            <div class="doc-text">
                About
            </div>
            <textarea style="width: 100%;height: 100PX; border: 1px solid #C7C9D9; border-radius: 8px;padding: 5px;" name="" id="text_area_about" cols="30" rows="10"></textarea>
        </div>
    </div>

    <div class='col1'>
        <div class="subcol1">
            <div class="doc-text">
                Cover photo
            </div>
            <div style="width: 100%; border: 2px dashed #C7C9D9;height: min-content; border-radius: 8px;padding :10px" onclick='uploadpic()'>
                <div class="upload_box">
                    <img src="<?= base_url('imgs/Add_image.svg') ?>" alt="upload img">
                    <span class='uploadtxt1'>Upload Image</span>
                    <span class='uploadtxt2'>PNG, JPG, GIF up to 10MB</span>

                </div>
                <div id="upload_imgs" class="b1 more grid-img-show close"></div>

            </div>
        </div>
        <input style="margin-top: 5px;" type="file" class='hide' onchange="preview()" id="fileInput" multiple>
    </div>
</div>
</div>
<div class='bottomspace'>
</div>
<footer>
    <div class='btn' onclick="sendRequest()">Confirm</div>
</footer>


<div class="modal hide" id='modal_fail' style='display:flex;'>
    <div class="modal_content">
        <div class="modal_header">
            <img src="<?= base_url("imgs/fail_icon.svg") ?>" alt="Modal Header Image">
            <!-- <h2>Modal Title</h2> -->
        </div>
        <div class="modal_body">
            <div class="modal_msg">Please check again.</div>
            <div class="gray fs-14px modal_text" id="fail_txt">Do you want to disapprove?</div>
        </div>
        <div class="modal_footer">
            <button class="modal_btn cancel_btn" onclick='closeModal();refresh();'>try again</button>
        </div>
    </div>
</div>
<div class="modal hide" id='modal_success' style='display:flex;'>
    <div class="modal_content">
        <div class="modal_header">
            <img src="<?= base_url("imgs/success_icon.svg") ?>" alt="Modal Header Image">
            <!-- <h2>Modal Title</h2> -->
        </div>
        <div class="modal_body">
            <div class="modal_msg2">Document sent successfully</div>
            <div class="gray fs-14px modal_text2">Your documents have been successfully submitted.</div>
        </div>
        <div class="modal_footer">
            <button class="modal_btn success_btn" onclick='closeModal();backhome();'>Confirm</button>
        </div>
    </div>
</div>

<script>
    let ENDPOINT = window.API_URL;

    function closeSelector() {
        var customSelect = document.querySelector('.custom-select');
        customSelect.removeAttribute('open');
        var selectedValue = document.querySelector("input[name='item']:checked").value;
        if (selectedValue === 'Certificate of Employment for VISA') {
            renderCountryDropdown();
            document.getElementById('countryDropdown').style.display = 'block';
            document.querySelector('.dateStart').style.display = 'block'; // Show the dateStart section
            document.querySelector('.dateEnd').style.display = 'block'; // Show the dateEnd section

        } else {
            document.getElementById('countryDropdown').style.display = 'none';
            document.querySelector('.dateStart').style.display = 'none'; // Hide the dateStart section
            document.querySelector('.dateEnd').style.display = 'none'; // Hide the dateEnd section
        }
    }

    function renderCountryDropdown() {
        var countrySelect = document.getElementById('countrySelect');
        countrySelect.innerHTML = '';
        var countries = ['USA', 'Canada', 'UK', 'Australia', 'Japan']; // Example list of countries

        for (var i = 0; i < countries.length; i++) {
            var option = document.createElement('option');
            option.value = countries[i];
            option.textContent = countries[i];
            countrySelect.appendChild(option);
        }

        countrySelect.addEventListener('change', function() {
            console.log(countrySelect.value); // Log the selected value
        });
    }

    $(document).ready(function() {
        $("#datepicker1").datepicker();
        $("#datepicker2").datepicker();
        $("#dateStart").datepicker();
        $("#dateEnd").datepicker();
    });

    formData = new FormData();

    function preview() {
        let obj_length = fileInput.files.length
        let input = event.target
        let html = upload_imgs.innerHTML
        for (let i = 0; i < obj_length; i++) {
            formData.append('file', input.files[i]);
            let src = URL.createObjectURL(event.target.files[i]);
            html += `<div>
							<img class='img-width' src="${src}" alt="">
					</div>`
        }
        upload_imgs.innerHTML = html
        upload_imgs.classList.remove('close')
        hideupload();

    }

    function sendRequest() {
        
        let document_type = document.querySelector('.custom-select').querySelector('input[name="item"]:checked').value;
        let datestart = $('#datepicker1').val();
        let dateend = $('#datepicker2').val();
        let timestart = $('#timepicker1').val();
        let timeend = $('#timepicker2').val();
        let about = $('#text_area_about').val();


        let dateStart = $('#dateStart').val();
        let dateEnd = $('#dateEnd').val();

        var convertDateStart = new Date(dateStart);
        var convertDateEnd = new Date(dateEnd);

        var dateGo = convertDateStart.getTime();
        var dateBack = convertDateEnd.getTime();

        console.log('dateGo', dateGo);

        let country = $('#countrySelect').val();

        let token = "<?= esc($token); ?>"

        if (dateend == null || dateend == "") {
            dateend = datestart;
        }
    
        date = new Date().getTime()
        const datetimeStart = new Date(datestart + ' ' + timestart).getTime();
        const datetimeEnd = new Date(dateend + ' ' + timeend).getTime();
        let formData = new FormData();
        let obj_length = fileInput.files.length
        console.log('obj_length', obj_length)

        for (let i = 0; i < obj_length; i++) {
            formData.append('file', fileInput.files[i]);
        }

        // document
        formData.append('token', token);
        formData.append('request_type', "document");
        formData.append('document_type', document_type);
        formData.append('date', date);
        formData.append('delivery_method', delivery_method);
        formData.append('lang_format', lang_format);
        formData.append('reason', about);
        formData.append('dateStart', dateGo);
        formData.append('dateEnd', dateBack);
        formData.append('country', country);

        for (const [key, value] of formData.entries()) {
            console.log(`${key}: ${value}`);
        }

        fetch(ENDPOINT + 'mobile/request/admin', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                try {
                    console.log(1)
                    if (data.msg == 'success') {
                        model_success();
                    } else {
                        model_try_again('uploads file ไม่สำเร็จกรุณาลองใหม่')

                    }
                } catch (error) {
                    model_try_again('มีบางอย่างทำการผิดพลาด')

                }
            })
            .catch(error => {
                console.log(error)
            });
    }

    let delivery_method = 'In App';
    let lang_format = 'Thai';

    function chosedeli(choice) {
        console.log("use chosedeli()");
        $(".btn_select_blue").removeClass('btn_active');
        if (choice == 1) {
            delivery_method = 'In App';
            $("#deli1").addClass('btn_active');
        } else if (choice == 2) {
            delivery_method = 'By Email';
            $("#deli2").addClass('btn_active');
        } else if (choice == 3) {
            delivery_method = 'Self-Pickup';
            $("#deli3").addClass('btn_active');
        }
        console.log("delivery_method", delivery_method);
    }

    function choselang(choice) {
        console.log("use chosedeli()");
        $(".btn_select_blue_lang").removeClass('btn_active');
        if (choice == 1) {
            lang_format = 'Thai';
            $("#lang1").addClass('btn_active');
        } else if (choice == 2) {
            lang_format = 'English';
            $("#lang2").addClass('btn_active');
        } else if (choice == 3) {
            lang_format = 'Both';
            $("#lang3").addClass('btn_active');
        }
        console.log("lang_format", lang_format);
    }

    function uploadpic() {
        console.log(`$('#fileInput').click()`);
        $('#fileInput').click()

    }

    function model_try_again(alert = 'some thing went wrong') {
        console.log('model_try_again()01');
        setTimeout(function() {
            $('#fail_txt').html(alert);
            $('#modal_fail').removeClass('hide')
            $('.modal_content').addClass('slide_top');
        }, 100);
    }

    function closeModal() {
        $('.modal_content').removeClass('slide_top');
        setTimeout(function() {
            $('.modal').addClass('hide');
        }, 100);
    }

    function model_success() {
        setTimeout(function() {
            console.log('tony');
            $('#modal_success').removeClass('hide');
            $('.modal_content').addClass('slide_top');
        }, 100);
    }

    function backhome() {
        window.location.href = "<?= base_url("home") ?>";
    }

    function hideupload() {
        $('.upload_box').addClass('hide');
    }

    function refresh() {
        location.reload();
    }
</script>