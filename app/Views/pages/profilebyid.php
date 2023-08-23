<link rel="stylesheet" href="./css/global.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<?php echo "<script src='" . base_url('./backoffice_static/config.js') . "'></script>"; ?>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

<style>
    .greybc {
        width: 100%;
        height: 50px;
        display: flex;
        /* background-color: #FAFAFC; */
        font-size: 16px;
        color: #8F90A6;
        padding: 12px 16px;
        border: 1px solid #C7C9D9;
        gap: 8px;
        border-radius: 8px;
        justify-content: flex-start;
    }

    :focus {
        outline: none;
    }

    .little {
        width: 40%;
    }

    input {
        width: 100%;
    }

    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Noto+Sans:wght@200;400;500;800&display=swap');

    /* font size && weight */
    .font-noto {
        font-family: 'Inter', sans-serif;
    }

    .font-inter {
        font-family: 'Noto Sans', sans-serif;
    }

    .fs-12px {
        font-size: 12px;
    }

    .fs-10px {
        font-size: 10px;
    }

    .fs-16px {
        font-size: 16px;
    }

    .fs-14px {
        font-size: 14px;
    }

    .fs-20px {
        font-size: 20px;
    }

    .fw-500 {
        font-weight: 500;
    }

    .fw-200 {
        font-weight: 200;
    }

    .fw-400 {
        font-weight: 400;
    }

    .fw-600 {
        font-weight: 600;
    }

    .fw-700 {
        font-weight: 700;
    }

    .fw-800 {
        font-weight: 800;
    }

    .f-color-gray {
        color: #838799;
    }

    .mt-10 {
        margin-top: 10px;
    }

    .mt-16 {
        margin-top: 16px;
    }

    .mt-24px {
        margin-top: 24px;
    }

    .mb-20 {
        margin-bottom: 20px;
    }

    .mb-16px {
        margin-bottom: 16px;
    }

    .flex-middle-box {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* tony css */

    header {
        width: 100%;
        height: 10vh;
        display: flex;
        padding: 20px;
        position: sticky;
        top: 0;
        z-index: 1;
        background-color: white !important;
    }

    .content_template {
        width: 100vw;
        height: 90vh;
        padding: 0 20px;
        margin: 0;
        overflow: scroll;
    }

    .bottommargin {
        margin-bottom: 200px;
    }

    .content_templatehome {
        width: 100%;
        height: 90%;
        padding: 0;
        margin: 0;
    }

    img {
        object-fit: cover;

    }

    .col1 {
        display: flex;
        width: 100%;
        height: min-content;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 5%;
    }

    .subcol1 {
        width: 100%;
        display: flex;
        flex-direction: column;
    }

    .btn {
        background-color: #0063F7;
        color: #FFFFFF;
        padding: 2%;
        border-radius: 16px;
        height: 56px;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    footer {
        display: flex;
        width: 100vw;
        height: 15vh;
        padding: 20px;
        position: fixed;
        bottom: 0;
        background-color: white;
    }

    .bottomspace {
        /* height: 15vh; */
        width: 100%;
        margin-bottom: 16vh;
    }

    .hide {
        display: none !important;
    }

    .upload_box {

        width: 100%;
        height: min-content;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .uploadtxt1 {
        color: #3E7BFA;
        font-size: 14px;

    }

    .uploadtxt2 {
        color: #8F90A6;
        font-size: 12px;
    }

    .swal_alert {
        width: 100%;
        display: flex;
        flex-direction: column;
    }

    .swal_header {
        font-weight: 700;
        font-size: 20px;
        width: 100%;
        display: flex;
        margin: 5px 0;
        align-items: flex-start;
    }

    .swal_text {
        font-weight: 400;
        font-size: 14px;
        width: 100%;
        display: flex;
        margin: 5px 0;
        align-items: flex-start;
    }


    .timebigbox {
        width: 100%;
        height: 50px;
        display: flex;
        font-size: 16px;

        gap: 8px;
        border-radius: 8px;
        justify-content: space-between;


    }

    .timebox {
        display: flex;
        flex-direction: row;
        align-items: center;
        padding: 12px 16px;
        gap: 8px;
        color: #8F90A6;
        background-color: #FAFAFC;
        border-radius: 8px;
        width: 48%;
        height: 50px;
    }

    .timebigboxtx {
        width: 100%;
        height: 30px;
        display: flex;
        font-size: 16px;
        justify-content: space-between;
    }

    .timeboxtx {
        display: flex;
        flex-direction: row;
        align-items: flex-end;
        width: 48%;
        height: 100%;
    }

    details {
        position: relative;
        width: 100%;
    }

    details[open] {
        z-index: 1;
    }

    summary {
        padding: 1rem;
        cursor: pointer;
        border-radius: 8px;
        background-color: #F6F7F9;
        list-style: none;
    }

    summary::-webkit-details-marker {
        display: none;
    }

    details[open] summary:before {
        content: '';
        display: block;
        width: 100vw;
        height: 100vh;
        background: transparent;
        position: fixed;
        top: 0;
        left: 0;
    }

    summary:after {
        content: '';
        display: block;
        float: right;
        width: .5rem;
        height: .5rem;
        border-bottom: 1px solid currentColor;
        border-left: 1px solid currentColor;
        border-bottom-left-radius: 2px;
        transform: rotate(45deg) translate(50%, 0%);
        transform-origin: center center;
        transition: transform ease-in-out 100ms
    }

    summary:focus {
        outline: none;
    }

    details[open] summary:after {
        transform: rotate(-45deg) translate(0%, 0%);
    }

    ul {
        width: 100%;
        background: #F6F7F9;
        position: absolute;
        top: calc(100% + .5rem);
        left: 0;
        padding: 1rem;
        margin: 0;
        box-sizing: border-box;
        border-radius: 8px;
        max-height: 200px;
        overflow-y: auto;
    }

    li {
        margin: 0;
        padding: 1rem 0;
        border-bottom: 1px solid #ccc;
    }

    li:first-child {
        padding-top: 0;
    }

    li:last-child {
        padding-bottom: 0;
        border-bottom: none;
    }

    summary.radios {
        counter-reset: radios;
    }

    summary.radios:before {
        content: var(--selection);
    }

    input[type=radio] {
        counter-increment: radios;
        appearance: none;
        display: none;
    }

    input[type=radio]:checked {
        display: inline;
        --display: block;
    }

    input[type=radio]:after {
        content: attr(title);
        display: inline;

        font-size: 1rem;
    }

    ul.list {
        counter-reset: labels;
    }

    label {
        width: 100%;
        display: flex;
        cursor: pointer;
        justify-content: space-between;
    }

    label span {
        --display: none;
        display: var(--display);
        width: 1rem;
        height: 1rem;
        border: 1px solid #727272;
        border-radius: 3px;
    }

    .check-box {
        transform: scale(2);
        margin-right: 20px;
    }

    input[type="checkbox"] {
        position: relative;
        appearance: none;
        width: 20px;
        height: 10px;
        background: #ccc;
        border-radius: 50px;
        box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.2);
        cursor: pointer;
        transition: 0.4s;
    }

    input:checked[type="checkbox"] {
        background: #1B4DFF;

    }

    input[type="checkbox"]::after {
        position: absolute;
        content: "";
        width: 10px;
        height: 10px;
        top: 0;
        left: 0;
        background: #fff;
        border-radius: 50%;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        transform: scale(1.1);
        transition: 0.4s;
    }

    input:checked[type="checkbox"]::after {
        left: 50%;
    }

    ::-webkit-scrollbar {
        display: none;
    }

    #my-element::-webkit-scrollbar {
        display: none;
    }

    .grid-container-dm {
        display: grid;
        grid-template-columns: 50% 50%;
        grid-template-rows: 50% 50%;
        gap: 5px;
    }

    .modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
        z-index: 999;
    }

    .modal_content {
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

    .modal_header {
        display: flex;
        align-items: center;
    }

    .modal_header img {
        width: 50px;
        height: 50px;
        margin-right: 10px;
    }

    .modal_header h2 {
        font-size: 24px;
        margin: 0;
    }

    .modal_body {
        margin-bottom: 20px;
    }

    .modal_footer {
        display: flex;
        justify-content: flex-end;
        width: 100%;
    }

    .modal_btn {
        border: none;
        background-color: #333;
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .modal_btn_shift {
        border: none;
        background-color: #333;
        color: #fff;
        padding: 10px 20px;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .modal_btn_shift_white {
        border: 1px solid #C7C9D9;
        padding: 10px 20px;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .modal_btn:hover {
        background-color: #fff;
        color: #333;
    }

    .cancel_btn {
        margin-right: 10px;
        width: 100%;
        background: red;
    }

    .slide_top {
        position: relative;
        top: -100px;
        opacity: 0;
    }

    .success_btn {
        margin-right: 10px;
        width: 100%;
        background: blue;
    }

    .success_btn_white {
        margin-right: 10px;
        width: 100%;
        background: white;
    }

    @keyframes slide_top {
        from {
            top: -100px;
            opacity: 0;
        }

        to {
            top: 0;
            opacity: 1;
        }
    }

    .modal_msg {
        font-size: 20px;
        font-weight: 700;
    }

    .cal_col {
        width: 100%;
        height: 64px;
        display: flex;
        padding: 0 20px;
        align-items: center;
        flex-direction: column;
    }

    .cal_subcol_main {
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: row;
        align-items: center;

    }

    .cal_subcol1 {
        width: 15%;
        height: 40px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: #28293D;
    }

    .cal_subcol2 {
        width: 85%;
        height: 40px;
        display: flex;
        color: white;
        padding: 8px;
        justify-content: space-between;

    }

    .cal_workday {
        background: #06C270;
        border-radius: 8px;

    }

    .cal_leave {
        background: #608DFF;
        border-radius: 8px;

    }

    .cal_ot {
        background: #FF3B3B;
        border-radius: 8px;

    }

    .cal_offsite {
        background: #C078F7;
        border-radius: 8px;

    }

    .cal_num {
        font-size: 20px;
        font-family: 'Noto Sans';
        font-style: normal;
        font-weight: 700;
        font-size: 20px;

    }

    .cal_txt {
        font-family: 'Noto Sans';
        font-style: normal;
        font-weight: 400;
        font-size: 12px;
        line-height: 16px;
    }

    .cal_name_div {
        display: flex;
        height: 100%;

    }

    .cal_name_div img {
        margin-right: 8px;
    }

    .cal_name_div span {
        font-family: 'Noto Sans';
        font-style: normal;
        font-weight: 400;
        font-size: 14px;
    }

    .dashed {
        width: 100%;
        border-bottom: solid 1px #C7C9D9;
    }

    .nodata {
        display: flex;
        width: 100%;
        justify-content: center;
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

    .btn_select_blue1 {
        margin-top: 17px;
        border: 1px solid #3E7BFA;
        border-radius: 17px;
        width: 20%;
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

    .breakline {
        width: 100%;
        border-bottom: solid 1px #C7C9D9;
        margin: 30px 0;

    }

    input {
        color: black;
    }
</style>

<body style="padding: 10px;">
    <div class='content_template'>
        <div class="flex items-center justify-center">
            <div class="w-24 h-24 rounded-full overflow-hidden bg-gray-100">
                <img id="profile-img-preview" class="w-full h-full object-cover" src="<?= base_url('imgs/Mask1.svg') ?>" alt="">
            </div>
            <div class="ml-5">
                <label class="block text-gray-700 font-bold mb-2" for="profile-image">
                    Profile Image
                </label>
                <input class="hidden" id="profile-image" name="profile_image" type="file" accept="image/*" onchange="previewProfileImage(event)">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" onclick="document.getElementById('profile-image').click()">
                    Upload Image
                </button>
                <p class="text-gray-500 text-xs mt-2">JPEG, PNG, GIF up to 40KB</p>
            </div>
        </div>

        <div class="w-full mb-3 mt-3">
            <label for="category" class="block text-gray-700 font-bold mb-2">Select title Prefix:</label>
            <div>
                <select id="title_name" name="title_name" class="block appearance-none w-4/12 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                    <option value="0" disabled selected>select</option>
                    <option value="Mr">Mr</option>
                    <option value="Mrs">Mrs</option>
                    <option value="Miss">Miss</option>
                    <option value="Ms">Ms</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M14.95 6.95l-3.586 3.586L10 12.586l4-4V3h1.95v3.95zM5.05 13.05l3.586-3.586L10 7.414l-4 4v3H5.05v-3.95z" />
                    </svg>
                </div>
            </div>
        </div>


        <span class="mt-4 block text-gray-700 font-bold mb-2">First Name(EN)*</span>
        <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
            <input id='fname' type="text">
        </div>

        <span class="block text-gray-700 font-bold mb-2">Last Name(EN)*</span>
        <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
            <input id='lastname' type="text">
        </div>
        <span class="block text-gray-700 font-bold mb-2">Nick Name(EN)</span>
        <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
            <input id='nickname' type="text">
        </div>
        <span class="mt-4 block text-gray-700 font-bold mb-2">First Name(TH)*</span>
        <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
            <input id='fname_th' type="text">
        </div>

        <span class="block text-gray-700 font-bold mb-2">Last Name(TH)*</span>
        <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
            <input id='lastname_th' type="text">
        </div>
        <span class="block text-gray-700 font-bold mb-2">Nick Name(TH)</span>
        <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
            <input id='nickname_th' type="text">
        </div>

        <label class="block text-gray-700 font-bold mb-2" for="birthday">
            Birthday
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="birthday" type="date" placeholder="YYYY-MM-DD" value="{{ old('birthday') ? date('Y-m-d', strtotime(old('birthday'))) : '' }}" />

        <span class="mt-4 block text-gray-700 font-bold">Gender</span>
        <div class="flex">
            <div id='gen1' onclick='genderpick("gen1")' class="btn_select_blue btn_active me-3">
                Male
            </div>
            <div id='gen2' onclick='genderpick("gen2")' class="btn_select_blue">
                Female
            </div>
        </div>
        <span class="mt-4 block text-gray-700 font-bold">Type*</span>
        <div class="flex">
            <div id='type1' class="btn_select_blue btn_active me-3">
                Domestic
            </div>
            <div id='type2' class="btn_select_blue">
                Foreigner
            </div>
        </div>
        <div id="swap_type1">
            <span class="mt-4 block text-gray-700 font-bold mb-2">ID CARD Number</span>
            <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
                <input id="id_card" type="text">
            </div>
        </div>
        <div id="swap_type2" style="display: none;">
            <span class="mt-4 block text-gray-700 font-bold mb-2">Tax ID No.</span>
            <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
                <input id="tax_id_no" value="" type="text">
            </div>
            <span class="mt-4 block text-gray-700 font-bold mb-2">ID Passports</span>
            <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
                <input id="passport_id" value="-" type="text">
            </div>
            <span class="mt-4 block text-gray-700 font-bold mb-2">Work Permit No.</span>
            <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
                <input id="work_permit_no" value="" type="text">
            </div>
            <label class="mt-4 block text-gray-700 font-bold mb-2" for="birthday">
                Date Work Permit Issue
            </label>
            <input id="Date_Work_Permit_Issue" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="date" placeholder="YYYY-MM-DD" value="{{ old('birthday') ? date('Y-m-d', strtotime(old('birthday'))) : '' }}" />
            <label class="mt-4 block text-gray-700 font-bold mb-2" for="birthday">
                Date Work Permit Expire
            </label>
            <input id="Date_Work_Permit_Expire" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="date" placeholder="YYYY-MM-DD" value="{{ old('birthday') ? date('Y-m-d', strtotime(old('birthday'))) : '' }}" />

        </div>
        <div class='breakline'></div>
        <span class="block text-gray-700 font-bold mb-2 mt-4 text-2xl"> Work contact information</span>
        <span class="block text-gray-700 font-bold mb-2 mt-4">Company email (Username)</span>
        <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
            <input id='Email' type="email">
        </div>
        <span class="block text-gray-700 font-bold mb-2 mt-4 ">Telephone No</span>
        <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
            <input id='company_tel' type="text">
        </div>
        <!-- <span class="block text-gray-700 font-bold mb-2 mt-4 ">Tel</span>
        <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
            <input id='tel' type="text">
        </div> -->
        <span class="block text-gray-700 font-bold mb-2 mt-4 text-2xl">Contact Information</span>
        <span class="block text-gray-700 font-bold mb-2 mt-4 ">Personal email address</span>
        <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
            <input id='Personal_email_address' type="text">
        </div>
        <span class="block text-gray-700 font-bold mb-2 mt-4 ">Mobile No.</span>
        <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
            <input id='tel' type="text">
        </div>
        <span class="block text-gray-700 font-bold mb-2 mt-4 "> Line ID</span>
        <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
            <input id='Line_ID' type="text">
        </div>
        <span class="block text-gray-700 font-bold mb-2 mt-4 text-2xl">Register Address</span>
        <span class="block text-gray-700 font-bold mb-2 mt-4 ">Address</span>
        <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
            <input id='Register_Address' type="text">
        </div>
        <span class="block text-gray-700 font-bold mb-2 mt-4 ">Province</span>
        <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
            <input id='r_province' type="text">
        </div>
        <span class="block text-gray-700 font-bold mb-2 mt-4 ">District</span>
        <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
            <input id='r_District' type="text">
        </div>
        <span class="block text-gray-700 font-bold mb-2 mt-4 ">Subdistrict</span>
        <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
            <input id='r_Subdistrict' type="text">
        </div>
        <span class="block text-gray-700 font-bold mb-2 mt-4 ">Postal Code</span>
        <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
            <input id='r_Postal_Code' type="text">
        </div>
        <span class="block text-gray-700 font-bold mb-2 mt-4 text-2xl">Contact Address</span>
        <span class="block text-gray-700 font-bold mb-2 mt-4 ">Address</span>
        <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
            <input id='c_Address' type="text">
        </div>
        <span class="block text-gray-700 font-bold mb-2 mt-4 ">Province</span>
        <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
            <input id='c_province' type="text">
        </div>
        <span class="block text-gray-700 font-bold mb-2 mt-4 ">District</span>
        <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
            <input id='c_District' type="text">
        </div>
        <span class="block text-gray-700 font-bold mb-2 mt-4 ">Subdistrict</span>
        <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
            <input id='c_Subdistrict' type="text">
        </div>
        <span class="block text-gray-700 font-bold mb-2 mt-4 ">Postal Code</span>
        <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
            <input id='c_Postal_Code' type="text">
        </div>

        <span class="block text-gray-700 font-bold mb-2 mt-4 text-2xl">Emergency Contacts</span>
        <span class="block text-gray-700 font-bold mb-2 mt-4 ">Name</span>
        <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
            <input id='ec_name' type="text">
        </div>
        <span class="block text-gray-700 font-bold mb-2 mt-4 ">Surname</span>
        <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
            <input id='ec_surname' type="text">
        </div>
        <span class="block text-gray-700 font-bold mb-2 mt-4 ">Relationship</span>
        <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
            <input id='ec_relationship' type="text">
        </div>
        <span class="block text-gray-700 font-bold mb-2 mt-4 ">Mobile No.</span>
        <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
            <input id='ec_mobile_no' type="text">
        </div>
        <div class='breakline'></div>
        <span class="block text-gray-700 font-bold mb-2 mt-4 text-2xl">Corporate Information</span>
        <div style="display: grid;grid-template-columns: 50% 50%;">
            <div class="w-full mb-3">
                <label for="category" class="block text-gray-700 font-bold mb-2">Company*:</label>
                <div>
                    <select id="company_list" onchange="on_company_change()" name="title_name" class="block appearance-none bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                        <option value="0" disabled selected>select</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M14.95 6.95l-3.586 3.586L10 12.586l4-4V3h1.95v3.95zM5.05 13.05l3.586-3.586L10 7.414l-4 4v3H5.05v-3.95z" />
                        </svg>
                    </div>
                </div>
            </div>
            <!-- <div class="w-full mb-3">
                <label for="category" class="block text-gray-700 font-bold mb-2">Role:</label>
                <div>
                    <select id="role" name="title_name" class="block appearance-none bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                        <option value="0" disabled selected>select</option>
                        <option value="admin">Admin</option>
                        <option value="manager">Manager</option>
                        <option value="user">User</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M14.95 6.95l-3.586 3.586L10 12.586l4-4V3h1.95v3.95zM5.05 13.05l3.586-3.586L10 7.414l-4 4v3H5.05v-3.95z" />
                        </svg>
                    </div>
                </div>
            </div> -->
            <div class="w-full mb-3">
                <label for="category" class="block text-gray-700 font-bold mb-2">Department*:</label>
                <div>
                    <select id="department" name="department" class="block appearance-none bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                        <option value="0" disabled selected>select</option>
                        <!-- <option value="manager">Manager</option>
                        <option value="user">User</option>  -->
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M14.95 6.95l-3.586 3.586L10 12.586l4-4V3h1.95v3.95zM5.05 13.05l3.586-3.586L10 7.414l-4 4v3H5.05v-3.95z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="w-full mb-3">
                <label for="category" class="block text-gray-700 font-bold mb-2">Rank*:</label>
                <div>
                    <select id="rank" class="block appearance-none bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline max-w-[120px]">
                        <option value="0" disabled selected>please select</option>
                        <option value="part_time">part time</option>
                        <option value="temporary">temporary</option>
                        <option value="officer">officer</option>
                        <option value="manager">manager</option>
                        <option value="supervisor">supervisor</option>
                        <option value="director">Director</option>
                        <option value="ceo">CEO</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M14.95 6.95l-3.586 3.586L10 12.586l4-4V3h1.95v3.95zM5.05 13.05l3.586-3.586L10 7.414l-4 4v3H5.05v-3.95z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="w-full mb-3">
                <label for="category" class="block text-gray-700 font-bold mb-2">Position*:</label>
                <div>
                    <select id="position" class="block appearance-none bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline max-w-[120px]">
                        <option value="0" disabled selected>please select</option>
                        <option value="normal_employee">normal employee</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M14.95 6.95l-3.586 3.586L10 12.586l4-4V3h1.95v3.95zM5.05 13.05l3.586-3.586L10 7.414l-4 4v3H5.05v-3.95z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <span class="block text-gray-700 font-bold mb-2 mt-4">Employee No.*</span>
        <input id='employee_number' class="w-full px-3 py-2 border border-gray-400 rounded-md appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" type="text">
        <span class="block text-gray-700 font-bold mb-2 mt-4">Work Location</span>
        <input id='Work_Location' class="w-full px-3 py-2 border border-gray-400 rounded-md appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" type="text">
        <label class="block text-gray-700 font-bold mb-2 mt-4">
            Employment Date*
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="hire_date" type="date" placeholder="YYYY-MM-DD" value="{{ old('birthday') ? date('Y-m-d', strtotime(old('birthday'))) : '' }}" />
        <span class="block text-gray-700 font-bold mb-2 mt-4">Job title</span>
        <input id='job_position' class="w-full px-3 py-2 border border-gray-400 rounded-md appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" type="text">
        <!-- <div class="col1 greybc">
            <input id='bank_account' c type="text">
        </div> -->
        <!-- Shift Start Time -->
        <label class="block text-gray-700 font-bold mb-2 mt-4" for="shift_start_time">
            Shift Start Time:
        </label>
        <input class="w-full px-3 py-2 border border-gray-400 rounded-md appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" value="09:00" type="time" id="shift_start_time" name="shift_start_time" placeholder="HH:mm" required>

        <!-- Shift End Time -->
        <label class="block text-gray-700 font-bold mb-2 mt-4" for="shift_end_time">
            Shift End Time:
        </label>
        <input class="w-full px-3 py-2 border border-gray-400 rounded-md appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" value="18:00" type="time" id="shift_end_time" name="shift_end_time" placeholder="HH:mm" required>
        <span class="block text-gray-700 font-bold mb-2 mt-4 text-2xl">Employment Details</span>
        <div class="w-full mb-3">
            <label for="category" class="block text-gray-700 font-bold mb-2">Employee Status*:</label>
            <div>
                <select id="Employee_Status" class="block appearance-none bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline max-w-[120px]">
                    <option value="0" disabled selected>please select</option>
                    <option value="problation">ทดลองงาน</option>
                    <option value="permanent">บรรจุ</option>
                    <option value="waitingStartWork">รอเริ่มงาน</option>
                    <option value="resign">พ้นสภาพ</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M14.95 6.95l-3.586 3.586L10 12.586l4-4V3h1.95v3.95zM5.05 13.05l3.586-3.586L10 7.414l-4 4v3H5.05v-3.95z" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="w-full mb-3">
            <label for="category" class="block text-gray-700 font-bold mb-2">Employee Type*:</label>
            <div>
                <select id="Employee_Type" class="block appearance-none bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline max-w-[120px]">
                    <option value="0" disabled selected>please select</option>
                    <option value="PartTime">พาร์ทไทม์</option>
                    <option value="Apprentice">ฝึกงาน</option>
                    <option value="temporary">ชั่วคราว</option>
                    <option value="Daily">ประจำ</option>
                    <option value="Permanent">รายวัน</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M14.95 6.95l-3.586 3.586L10 12.586l4-4V3h1.95v3.95zM5.05 13.05l3.586-3.586L10 7.414l-4 4v3H5.05v-3.95z" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="w-full mb-3">
            <label for="category" class="block text-gray-700 font-bold mb-2">Supervisor:</label>
            <div>
                <select id="supervisor" name="supervisor" class="block appearance-none bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline max-w-[120px]">
                    <option value="0" disabled selected>no supervisor</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M14.95 6.95l-3.586 3.586L10 12.586l4-4V3h1.95v3.95zM5.05 13.05l3.586-3.586L10 7.414l-4 4v3H5.05v-3.95z" />
                    </svg>
                </div>
            </div>
        </div>

        <label class="block text-gray-700 font-bold mb-2 mt-4" for="">
            Date Contract Expire
        </label>
        <input id="Date_Contract_Expire" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="date" placeholder="YYYY-MM-DD" value="{{ old('birthday') ? date('Y-m-d', strtotime(old('birthday'))) : '' }}" />
        <label class="block text-gray-700 font-bold mb-2 mt-4" for="">
            Holiday Calendar
        </label>
        <input id="Holiday_Calendar" class="w-full px-3 py-2 border border-gray-400 rounded-md appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" type="text">
        <label class="block text-gray-700 font-bold mb-2 mt-4" for="">
            Driver Number
        </label>
        <input id="Driver_Number" class="w-full px-3 py-2 border border-gray-400 rounded-md appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" type="text">
        <span class="mt-4 block text-gray-700 font-bold mt-4">Manpower Type*</span>
        <div class="flex">
            <div id='Manpower_Type1' class="btn_select_blue">
                New
            </div>
            <div id='Manpower_Type2' class="btn_select_blue">
                Replace
            </div>
        </div>
        <!-- <span class="mt-4 block text-gray-700 font-bold mt-4">บันทึกเวลาเข้าออก*</span>
        <div class="flex">
            <div id='Manpower_Type1' class="btn_select_blue btn_active me-3">
                New
            </div>
            <div id='Manpower_Type2' class="btn_select_blue">
                Replace
            </div>
        </div> -->
        <div class="w-full mb-3">
            <label for="category" class="block text-gray-700 font-bold mb-2 mt-4">Employment Type* :</label>
            <div>
                <select id="Employment_type" class="block appearance-none bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline max-w-[120px]">
                    <option value="0" disabled selected>please select</option>
                    <option value="MonthlyPayment">Monthly payment</option>
                    <option value="DailyPayment">Daily payment</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M14.95 6.95l-3.586 3.586L10 12.586l4-4V3h1.95v3.95zM5.05 13.05l3.586-3.586L10 7.414l-4 4v3H5.05v-3.95z" />
                    </svg>
                </div>
            </div>
        </div>
        <span class="block text-gray-700 font-bold mb-2 mt-4 text-2xl">Payment Information</span>
        <div class="flex">
            <div id='bank_payment' class="btn_select_blue ">
                Bank
            </div>
            <div id='cash_payment' class="btn_select_blue">
                Cash
            </div>
        </div>
        <span class="block text-gray-700 font-bold mb-2 mt-4">Bank Account</span>
        <input id='bank_account_name' class="w-full px-3 py-2 border border-gray-400 rounded-md appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" type="text">
        <span class="block text-gray-700 font-bold mb-2 mt-4">Bank Account No.</span>
        <input id='bank_account' class="w-full px-3 py-2 border border-gray-400 rounded-md appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" type="text">
        <span class="block text-gray-700 font-bold mb-2 mt-4 ">Salary</span>
        <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
            <input id='salary' type="number">
            <input id='salary' type="number">
        </div>
        <div class='breakline'></div>
        <span class="block text-gray-700 font-bold mb-2 mt-4 ">Vacation leave max</span>
        <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
            <input id='annual_vacation_leave_max' type="number">
        </div>
        <span class="block text-gray-700 font-bold mb-2 mt-4 ">Sick max</span>
        <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
            <input id='sick_max' type="number">
        </div>
        <span class="block text-gray-700 font-bold mb-2 mt-4 ">Business leave max</span>
        <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
            <input id='business_leave_max' type="number">
            <input id='business_leave_max' type="number">
        </div>
        <span class="block text-gray-700 font-bold mb-2 mt-4 ">Maternity leave max</span>
        <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
            <input id='maternity_leave_max' type="number">
            <input id='maternity_leave_max' type="number">
        </div>
    </div>

    <div class='bottomspace'>
    </div>
    <!-- Overlay modal something when wrong -->
    <div id="md_id" class="hidden fixed z-10 inset-0 overflow-y-auto" aria-modal="true" role="dialog" aria-labelledby="modal-title">
        <div class="flex items-center justify-center min-h-screen px-4 pt-6 pb-20 text-center sm:block sm:p-0">

            <!-- Background overlay -->
            <div class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- Modal content -->
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-title">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <!-- Alert icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="48px" height="48px">
                                <path fill="#F44336" d="M21.5 4.5H26.501V43.5H21.5z" transform="rotate(45.001 24 24)" />
                                <path fill="#F44336" d="M21.5 4.5H26.5V43.501H21.5z" transform="rotate(135.008 24 24)" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Something went wrong
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm leading-5 text-gray-500">
                                    Please try again later or contact support.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:w-auto">
                        <button onclick="my_alert('wrong',false)" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            OK
                        </button>
                    </span>
                </div>
            </div>

        </div>
    </div>

    <!-- Overlay modal add employee -->
    <div class="fixed z-10 inset-0 overflow-y-auto hidden" id="modal_addemp">
        <div class="flex items-center justify-center min-h-screen px-4 text-center">

            <!-- Background overlay -->
            <div class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- Modal content -->
            <div class="inline-block align-middle bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all">
                <div class="bg-white px-4 py-6 sm:px-6">

                    <!-- Modal header -->
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Confirm Action</h2>

                    <!-- Modal body -->
                    <p class="text-gray-700 mb-4">Are you sure you want to proceed with this action?</p>

                    <!-- Modal footer -->
                    <div class="flex justify-end">
                        <button onclick="add_emp_overlay_close()" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded mr-2" id="">
                            Cancel
                        </button>
                        <button onclick="update_emp()" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded" id="">
                            update
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class='btn' onclick="document.getElementById('modal_addemp').classList.remove('hidden')">Update</div>
    </footer>
</body>
<script>
    let ENDPOINT = window.API_URL;

    obj2 = ''
    async function emp_info() {
        try {
            let headersList = {
                "Accept": "*/*",
                "Content-Type": "application/json"
            }

            let bodyContent = JSON.stringify({
                "token": '<?php echo $_SESSION['token'] ?>',
                "eid": await getParamFromUrl()
            });

            let response = await fetch(ENDPOINT + "mobile/editEmployee", {
                method: "POST",
                body: bodyContent,
                headers: headersList
            });

            let data = await response.json();
            let check = data.msg === 'good' ? true : false
            let emp_info = data.emp_info[0]
            let obj = emp_info.obj_detail
            obj = JSON.parse(obj)
            obj2 = obj
            console.log(emp_info)
            console.log('xxxxxxx', obj.department)
            if (check) {
                let title_name = _$('title_name')
                title_name.value = obj.prefix
                let department = _$('department')

                department.value = obj.department
                let fname = _$('fname')
                fname.value = obj.fname_en
                let lname = _$('lastname')
                lname.value = obj.lname_en
                let nickname = _$('nickname')
                nickname.value = obj.nick_name_en
                let fname_th = _$('fname_th')
                fname_th.value = obj.fname_th
                let lname_th = _$('lastname_th')
                lname_th.value = obj.lname_th
                let nickname_th = _$('nickname_th')
                nickname_th.value = obj.nick_name_th
                let birthday = _$('birthday')
                birthday.value = obj.birthday
                let hire_date = _$('hire_date')
                hire_date.value = obj.employment_date
                let id_card = _$('id_card')
                id_card.value = obj.id_card
                let tax_id_no = _$('tax_id_no')
                tax_id_no.value = obj.tax_id_no
                // let passport_id = _$('passport_id').value ? _$('passport_id').value : '-'
                _$('passport_id').value == '-' ? _$('passport_id').value = obj.id_passport : _$('passport_id').value = '-'
                // passport_id.value = obj.passport_id
                document.getElementById('profile-img-preview').src = emp_info.img_profile
                img_base64_global = emp_info.img_profile ? emp_info.img_profile : ""
                obj.gender === "male" ? gen1.onclick() : gen2.onclick()
                obj.emp_type === "thai" ? document.getElementById('type1').click() : document.getElementById('type2').click()
                console.log(obj.emp_type)
                let tel = _$('tel')
                tel.value = obj.mobile_no
                _$('Email').value = obj.company_email
                let job_position = _$('job_position')
                job_position.value = obj.company_email
                let com_id = parseInt(_$('company_list'))
                _$('company_list').value = obj.company
                let bank_account = _$('bank_account')
                bank_account.value = data.private_info.bank_account
                let salary = _$('salary')
                salary.value = data.private_info.salary
                let under_emid = _$('supervisor')
                let shift = get_time_start_end()
                let annual_vacation_leave_max = parseInt(_$('annual_vacation_leave_max'))
                let sick_max = parseInt(_$('sick_max'))
                let business_leave_max = parseInt(_$('business_leave_max'))
                let maternity_leave_max = parseInt(_$('maternity_leave_max'))
                // let work_permit_no = _$('work_permit_no')
                _$('work_permit_no').value = obj.work_permit_no
                console.log(obj)
                let Date_Work_Permit_Issue = _$('Date_Work_Permit_Issue')
                _$('Date_Work_Permit_Issue').value = obj.date_work_permit_issue
                let Date_Work_Permit_Expire = _$('Date_Work_Permit_Expire')
                _$('Date_Work_Permit_Expire').value = obj.date_work_permit_expire
                let company_tel = _$('company_tel')
                company_tel.value = obj.company_tel
                let personal_email = _$('Personal_email_address')
                personal_email.value = obj.personal_email
                let Line_ID = _$('Line_ID')
                Line_ID.value = obj.line_id
                let r_address = _$('Register_Address')
                r_address.value = obj.r_address
                let r_province = _$('r_province')
                r_province.value = obj.r_province
                let r_District = _$('r_District')
                r_District.value = obj.r_district
                let r_Subdistrict = _$('r_Subdistrict')
                r_Subdistrict.value = obj.r_subdistrict
                let r_Postal_Code = _$('r_Postal_Code')
                r_Postal_Code.value = obj.r_postal_code
                let c_Address = _$('c_Address')
                c_Address.value = obj.r_postal_code
                let c_province = _$('c_province')
                c_province.value = obj.c_province
                let c_District = _$('c_District')
                c_District.value = obj.c_district
                let c_Subdistrict = _$('c_Subdistrict')
                c_Subdistrict.value = obj.c_subdistrict
                let c_Postal_Code = _$('c_Postal_Code')
                c_Postal_Code.value = obj.c_postal_code
                let ec_name = _$('ec_name')
                ec_name.value = obj.emergency_name
                let ec_surname = _$('ec_surname')
                ec_surname.value = obj.emergency_surname
                let ec_relationship = _$('ec_relationship')
                ec_relationship.value = obj.emergency_relationship
                let ec_mobile_no = _$('ec_mobile_no')
                ec_mobile_no.value = obj.emergency_mobile_no
                let rank = _$('rank')
                rank.value = obj.rank
                let position = _$('position')
                position.value = obj.position
                let employee_number = _$('employee_number')
                employee_number.value = obj.employee_no
                let Work_Location = _$('Work_Location')
                Work_Location.value = obj.work_location
                let Employee_Status = _$('Employee_Status')
                Employee_Status.value = obj.employee_status
                let Employee_Type = _$('Employee_Type')
                Employee_Type.value = obj.employee_type
                let supervisor = _$('supervisor')
                supervisor.value = obj.supervisor

                let Date_Contract_Expire = _$('Date_Contract_Expire')
                Date_Contract_Expire.value = obj.date_contract_expire
                let Holiday_Calendar = _$('Holiday_Calendar')
                Holiday_Calendar.value = obj.holiday_calendar
                let Driver_Number = _$('Driver_Number')
                Driver_Number.value = obj.driver_number
                let Employment_type = _$('Employment_type')
                Employment_type.value = obj.employment_type
                let bank_account_name = _$('bank_account_name')
                bank_account_name.value = data.private_info.bank_name

                // _$('department').value = obj.department
                _$('annual_vacation_leave_max').value = obj.vacation_leave_max

                _$('sick_max').value = obj.sick_max

                _$('business_leave_max').value = obj.business_leave_max

                _$('maternity_leave_max').value = obj.maternity_leave_max
                let manpower = obj.manpower_type
                // console.log("CHECK :"+manpower)
                manpower === 'new' ? _$('Manpower_Type1').click() : _$('Manpower_Type2').click()

                obj.payment_type == 'bank' ? _$("bank_payment").click() : _$("cash_payment").click()
            } else {
                alert('???????')
            }
        } catch (err) {
            console.log(err)
        }

    }

    console.log('param id : ', getParamFromUrl())

    function getParamFromUrl(paramName = 'id') {
        // Get the query string from the URL
        var queryString = window.location.search;
        // Create a URLSearchParams object from the query string
        var params = new URLSearchParams(queryString);
        // Retrieve the value of the specified parameter
        var paramValue = params.get(paramName);
        // Return the parameter value
        return parseInt(paramValue);
    }

    let emp_payment = 'bank'
    document.getElementById('bank_payment').click()
    document.getElementById('bank_payment').addEventListener("click", () => {
        document.getElementById('bank_payment').classList.add('btn_active')
        document.getElementById('cash_payment').classList.remove('btn_active')
        emp_payment = 'bank'
        console.log(emp_payment)
    })
    document.getElementById('cash_payment').addEventListener("click", () => {
        document.getElementById('cash_payment').classList.add('btn_active')
        document.getElementById('bank_payment').classList.remove('btn_active')
        emp_payment = 'cash'
        console.log(emp_payment)
    })
    document.getElementById('type1').click()
    let type_person_global = 'thai'
    document.getElementById('type1').addEventListener("click", () => {
        document.getElementById('type1').classList.add('btn_active')
        document.getElementById('type2').classList.remove('btn_active')
        document.getElementById('swap_type1').style.display = 'block'
        document.getElementById('swap_type2').style.display = 'none'
        type_person_global = "thai"
        console.log(type_person_global)
    })
    document.getElementById('type2').addEventListener("click", () => {
        document.getElementById('type2').classList.add('btn_active')
        document.getElementById('type1').classList.remove('btn_active')
        document.getElementById('swap_type1').style.display = 'none'
        document.getElementById('swap_type2').style.display = 'block'
        type_person_global = "foreigner"
        console.log(type_person_global)
    })
    let manpower_type = 'new'
    document.getElementById('Manpower_Type1').addEventListener("click", () => {
        document.getElementById('Manpower_Type1').classList.add('btn_active')
        document.getElementById('Manpower_Type2').classList.remove('btn_active')
        manpower_type = 'new'
        console.log(manpower_type)
    })
    document.getElementById('Manpower_Type2').addEventListener("click", () => {
        document.getElementById('Manpower_Type2').classList.add('btn_active')
        document.getElementById('Manpower_Type1').classList.remove('btn_active')
        manpower_type = 'replace'
        console.log(manpower_type)
    })
    async function render_my_under() {
        let headersList = {
            "Accept": "*/*",
            "Content-Type": "application/json"
        }

        let bodyContent = JSON.stringify({
            "token": '<?php echo $_SESSION['token'] ?>'
        });

        let response = await fetch(ENDPOINT + "mobile/employee/by-company", {
            method: "POST",
            body: bodyContent,
            headers: headersList
        });

        let data = await response.json();
        let msg = data.msg
        let em = data.employee
        if (msg === "good") {
            let html = `<option value="0" selected>no supervisor</option>`
            em.forEach(e => {
                html += `<option value="${e.eid}">${e.fname +" : "+e.job_title}</option>`
            });
            supervisor.innerHTML = html
        }
    }
    render_my_under()

    function add_emp_overlay_close() {
        document.getElementById('modal_addemp').classList.add('hidden')
    }

    function my_alert(alert_name, show) {
        if (alert_name == 'wrong') {
            if (show) {
                md_id.classList.remove('hidden')
            } else {
                md_id.classList.add('hidden')
            }
        } else if (alert_name === "model_del") {
            show ? document.getElementById('del_modal').classList.remove('hidden') : document.getElementById('del_modal').classList.add('hidden')
        }
    }
    var _$ = (id) => document.getElementById(id)
    var q$ = (id) => document.querySelector(id)
    let prefixname = '';
    let gender = 'male';
    $(document).ready(function() {
        console.log("ready!");
        $("#DoB").datepicker();
    });

    function genderpick(params) {
        document.getElementById('gen1').classList.remove('btn_active')
        document.getElementById('gen2').classList.remove('btn_active')
        $('#' + params).addClass('btn_active');
        if (params == 'gen1') {
            gender = 'male';
        } else if (params == 'gen2') {
            gender = 'female';
        }
        console.log('gender  = ', gender);
    }
    let img_base64_global = ''

    function previewProfileImage(event) {
        var preview = document.getElementById('profile-img-preview');
        var file = event.target.files[0];
        var reader = new FileReader();

        reader.onloadend = function() {
            var image = new Image();
            image.onload = function() {
                var canvas = document.createElement('canvas');
                var ctx = canvas.getContext('2d');

                // Set the canvas dimensions to the image dimensions
                canvas.width = image.width;
                canvas.height = image.height;

                // Draw the image onto the canvas
                ctx.drawImage(image, 0, 0);

                // Compress the canvas image to a target size of 40KB
                var quality = 0.9;
                var targetSize = 40 * 1024;
                while (canvas.toDataURL('image/jpeg', quality).length > targetSize) {
                    quality -= 0.05;
                }
                var compressedImage = canvas.toDataURL('image/jpeg', quality);

                // Set the preview image source to the compressed image
                preview.src = compressedImage;
                img_base64_global = compressedImage;
            }
            image.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }
    let com_id_global = 0
    async function render_department() {
        try {
            let headersList = {
                "Accept": "*/*",
                "Content-Type": "application/json"
            }
            let bodyContent = JSON.stringify({
                "token": '<?php echo $_SESSION['token'] ?>',
                'com_id': com_id_global
            });
            let response = await fetch(ENDPOINT + "mobile/get/department/bycompany", {
                method: "POST",
                body: bodyContent,
                headers: headersList
            });

            let data = await response.json();
            html = `<option value="0" disabled selected>select</option>`
            // console.log(data)
            let msg = data.msg
            let department = data.departments
            if (msg === "good") {
                department.forEach(e => {
                    html += `<option value="${e.id}">${e.dpname}</option>`
                });
            }
            document.getElementById('department').innerHTML = html
            // console.log(data);
        } catch (error) {
            console.log(error);
            my_alert('wrong', true)
        }
    }

    async function render_company() {

        let headersList = {
            "Accept": "*/*",
            "Content-Type": "application/json"
        }

        let bodyContent = JSON.stringify({
            "token": '<?php echo $_SESSION['token'] ?>'
        });

        let response = await fetch(ENDPOINT + "mobile/my_company/admin", {
            method: "POST",
            body: bodyContent,
            headers: headersList
        });

        let data = await response.json();
        let company = data.company

        html = ``;
        company.forEach(e => {
            html += `<option value="${e.com_id}">${e.com_name}</option>`
        });
        _$('company_list').innerHTML = html
        let department_op = document.getElementById('company_list').value
        com_id_global = department_op
        render_department()
    }
    render_company()

    function on_company_change() {
        let val = event.target.value
        com_id_global = val
        render_department()
    }

    function get_time_start_end() {
        try {
            let time_start = _$('shift_start_time').value
            let time_end = _$('shift_end_time').value
            if (time_start && time_end) {
                return time_start + "-" + time_end
            } else {
                return ''
            }

        } catch (err) {
            console.log(err)
        }
    }

    function validateEmail(email) {
        // Regular expression pattern for email validation
        const pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        // Test the email against the pattern
        return pattern.test(email);
    }

    function sendUserId(userId) {
        // Get the current URL
        var currentUrl = window.location.href;

        // Check if the URL already contains a query string
        var separator = currentUrl.indexOf('?') !== -1 ? '&' : '?';

        // Append the user ID parameter to the URL
        var newUrl = currentUrl + separator + 'userId=' + encodeURIComponent(userId);

        // Redirect the page to the new URL
        window.location.href = newUrl;
    }

    async function update_emp() {
        add_emp_overlay_close()
        console.log('add employee')
        let title_name = _$('title_name').value
        // let role = _$('role').value
        let role = 'user'
        let department = parseInt(_$('department').value)
        let fname = _$('fname').value
        let lname = _$('lastname').value
        let nickname = _$('nickname').value
        let fname_th = _$('fname_th').value
        let lname_th = _$('lastname_th').value
        let nickname_th = _$('nickname_th').value
        let birthday = _$('birthday').value
        let hire_date = _$('hire_date').value
        let id_card = _$('id_card').value
        let tax_id_no = _$('tax_id_no').value
        let passport_id = _$('passport_id').value ? _$('passport_id').value : '-'
        img_base64_global = img_base64_global ? img_base64_global : ''
        let tel = _$('tel').value
        let email = validateEmail(_$('Email').value) ? _$('Email').value : ''
        let job_position = _$('job_position').value
        let com_id = parseInt(_$('company_list').value)
        let bank_account = _$('bank_account').value
        let bank_account_name = _$('bank_account_name').value
        let salary = _$('salary').value
        let under_emid = parseInt(_$('supervisor').value)
        let shift = get_time_start_end()
        let annual_vacation_leave_max = parseInt(_$('annual_vacation_leave_max').value)
        let sick_max = parseInt(_$('sick_max').value)
        let business_leave_max = parseInt(_$('business_leave_max').value)
        let maternity_leave_max = parseInt(_$('maternity_leave_max').value)
        let work_permit_no = _$('work_permit_no').value
        let Date_Work_Permit_Issue = _$('Date_Work_Permit_Issue').value
        let Date_Work_Permit_Expire = _$('Date_Work_Permit_Expire').value
        let company_tel = _$('company_tel').value
        let personal_email = _$('Personal_email_address').value
        let Line_ID = _$('Line_ID').value
        let r_address = _$('Register_Address').value
        let r_province = _$('r_province').value
        let r_District = _$('r_District').value
        let r_Subdistrict = _$('r_Subdistrict').value
        let r_Postal_Code = _$('r_Postal_Code').value
        let c_Address = _$('c_Address').value
        let c_province = _$('c_province').value
        let c_District = _$('c_District').value
        let c_Subdistrict = _$('c_Subdistrict').value
        let c_Postal_Code = _$('c_Postal_Code').value
        let ec_name = _$('ec_name').value
        let ec_surname = _$('ec_surname').value
        let ec_relationship = _$('ec_relationship').value
        let ec_mobile_no = _$('ec_mobile_no').value
        let rank = _$('rank').value
        let position = _$('position').value
        let employee_number = _$('employee_number').value
        let Work_Location = _$('Work_Location').value
        let Employee_Status = _$('Employee_Status').value
        let Employee_Type = _$('Employee_Type').value
        let supervisor = _$('supervisor').value
        let Date_Contract_Expire = _$('Date_Contract_Expire').value
        let Holiday_Calendar = _$('Holiday_Calendar').value
        let Driver_Number = _$('Driver_Number').value
        let Employment_type = _$('Employment_type').value


        let obj_detail = {
            "role": role,
            "prefix": title_name,
            "fname_en": fname,
            "lname_en": lname,
            "nick_name_en": nickname,
            "fname_th": fname_th,
            "lname_th": lname_th,
            "nick_name_th": nickname_th,
            "birthday": birthday,
            "gender": gender,
            "emp_type": type_person_global,
            "id_card": id_card,
            "tax_id_no": tax_id_no,
            "id_passport": passport_id,
            "work_permit_no": work_permit_no,
            "date_work_permit_issue": Date_Work_Permit_Issue,
            "date_work_permit_expire": Date_Work_Permit_Expire,
            "company_email": email,
            "company_tel": company_tel,
            "personal_email": personal_email,
            "mobile_no": tel,
            "line_id": Line_ID,
            "r_address": r_address,
            "r_province": r_province,
            "r_district": r_District,
            "r_subdistrict": r_Subdistrict,
            "r_postal_code": r_Postal_Code,
            "c_address": c_Address,
            "c_province": c_province,
            "c_district": c_District,
            "c_subdistrict": c_Subdistrict,
            "c_postal_code": c_Postal_Code,
            "emergency_name": ec_name,
            "emergency_surname": ec_surname,
            "emergency_relationship": ec_relationship,
            "emergency_mobile_no": ec_mobile_no,
            "company": com_id,
            "department": department,
            "rank": rank,
            "position": position,
            "employee_no": employee_number,
            "work_location": Work_Location,
            "employment_date": hire_date,
            "job_title": job_position,
            "shift": get_time_start_end(),
            "employee_status": Employee_Status,
            "employee_type": Employee_Type,
            "supervisor": supervisor,
            "date_contract_expire": Date_Contract_Expire,
            "holiday_calendar": Holiday_Calendar,
            "driver_number": Driver_Number,
            "manpower_type": manpower_type,
            "employment_type": Employment_type,
            "bank_account": bank_account_name,
            "bank_account_no": bank_account,
            "vacation_leave_max": annual_vacation_leave_max,
            "sick_max": sick_max,
            "business_leave_max": business_leave_max,
            "maternity_leave_max": maternity_leave_max,
            "payment_type": emp_payment
        }
        console.log(obj_detail)
        console.log(Employee_Status,
            Employee_Type,
            manpower_type,
            annual_vacation_leave_max,
            sick_max,
            business_leave_max,
            maternity_leave_max,
            title_name,
            role,
            department,
            fname,
            lname,
            birthday,
            hire_date,
            tel,
            id_card,
            email,
            job_position,
            salary,
            com_id,
            shift,
            fname_th,
            lname_th,
            gender,
            position)
        if (
            Employee_Status &&
            Employee_Type &&
            manpower_type &&
            annual_vacation_leave_max &&
            sick_max &&
            business_leave_max &&
            maternity_leave_max &&
            title_name &&
            role &&
            department &&
            fname &&
            lname &&
            birthday &&
            hire_date &&
            tel &&
            id_card &&
            email &&
            job_position &&
            salary &&
            com_id &&
            shift &&
            fname_th &&
            lname_th &&
            gender &&
            position &&
            bank_account_name

        ) {
            try {
                let headersList = {
                    "Accept": "*/*",
                    "Content-Type": "application/json",

                }

                let bodyContent = JSON.stringify({
                    "token": '<?php echo $_SESSION['token'] ?>',
                    "eid": await getParamFromUrl(),
                    "name_title": title_name,
                    "id_card": id_card,
                    "email": email,
                    "role": role,
                    "fname": fname,
                    "lname": lname,
                    "date_of_birth": birthday,
                    "hire_date": hire_date,
                    "contact_info": tel,
                    "passport_id": passport_id,
                    "gender": gender,
                    "img_profile": img_base64_global,
                    "bank_account": bank_account,
                    "annual_vacation_leave_max": annual_vacation_leave_max,
                    "sick_max": sick_max,
                    "business_leave_max": business_leave_max,
                    "maternity_leave_max": maternity_leave_max,
                    "departments_id": department,
                    "job_title": job_position,
                    "under_emid": under_emid,
                    "shift": shift,
                    "salary": salary,
                    "com_id": com_id,
                    "bank_name": bank_account_name,
                    obj_detail
                });
                let response = await fetch(ENDPOINT + "mobile/update/employee", {
                    method: "POST",
                    body: bodyContent,
                    headers: headersList
                });
                let data = await response.json();
                let msg = data.msg
                if (msg === "good") {
                    // location.reload()
                }
                console.log(data);
            } catch (error) {
                console.log(error)
                my_alert('wrong', true)
            }
        } else {
            my_alert('wrong', true)
        }
    }
    emp_info()
</script>