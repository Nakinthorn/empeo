<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="icon" href="https://media.discordapp.net/attachments/1065176955445587988/1123534910381117491/350885243_2871046769695349_6895795451906942072_n.jpg?width=372&height=580"> -->

  <title>HRM</title>

  <!-- CSS -->
  <link rel="stylesheet" href="./global.css">
  <script src="./global.js"></script>

  <!-- Fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
    integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Swal2 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.0.11/sweetalert2.all.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"
    integrity="sha512-E8QSvWZ0eCLGk4km3hxSsNmGWbLtSCSUcewDQPQWZF6pEU8GlT8a5fF32wOl1i8ftdMhssTrF/OhyGWwonTcXA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- jquery -->
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
    crossorigin="anonymous"></script>

  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

  <!-- CSS -->
  <link rel="stylesheet" href="<?= base_url('css/global_hrm.css'); ?>" />

  <!-- Global JS -->
  <script src="<?php echo base_url('js/global_js.js'); ?>"></script>

  <!-- This css font  -->
  <link
    href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300;400;500&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100&display=swap"
    rel="stylesheet">


</head>
<style>
  html,
  body {
    height: 100%;
    margin: 0;
    padding: 0;
  }

  * {
    margin: 0;
    padding: 0;
  }

  .fadeIn{
	opacity: 0;
	animation: fadeIn 0.4s ease-in both;
}
@keyframes fadeIn {
	from {
		opacity: 0;
		transform: translate3d(0, -20%, 0);
	}
	to {
		opacity: 1;
		transform: translate3d(0, 0, 0);
	}
}

.fadeIn:nth-child(2) {
	animation-delay: 0.2s;
}
.fadeIn:nth-child(3) {
	animation-delay: 0.5s;
}
.fadeIn:nth-child(4) {
	animation-delay: 0.8s;
}
.fadeIn:nth-child(5) {
	animation-delay: 1.1s;
}

.fadeIn:hover{
    transform: scale(105%) !important;
    cursor: pointer;
}

</style>

<body style="overflow: hidden;">
<script>
  // โหลดไฟล์ menu-top.html และใส่เนื้อหาใน #sidebar-tabtop
  $.get("<?= base_url('menu-top.html'); ?>", function (data) {
    $("#sidebar-tabtop").html(data);
  });
</script>

<script>
  // โหลดไฟล์ menu-left.html และใส่เนื้อหาใน #sidebar-tableft
  $.get("<?= base_url('menu-left.html'); ?>", function (data) {
    $("#sidebar-tableft").html(data);
  });
</script>

<script>
  // โหลดไฟล์ setup-menu.html และใส่เนื้อหาใน #setup-menu
  $.get("<?= base_url('setup-menu.html'); ?>", function (data) {
    $("#setup-menu").html(data);
  });
</script>

  <div style="display: flex;">

    <div id="blur_bg"
      style="width: 100%; height: 100%; position: absolute; top: 0; z-index: 2; background-color: rgb(151 151 151 / 20%); backdrop-filter: blur(3px); display: none;">
    </div>

    <div class="overlay_branch_info overlay-slide_branch_info">
      <div
        style="height: 10%; display: flex; align-items: center; justify-content: space-between; padding: 0 24px; border-bottom: 1px solid #d9d9d9; background-color: white;">
        <p style="font-size: 1.5vw;"> เพิ่มสาขา </p>
        <img src="./symbol_hrm/close_black.png" alt="" style="height: 30%; cursor: pointer;"
          onclick="$('.overlay_branch_info').removeClass('open'); $('#blur_bg').css('display','none');">
      </div>

      <div style="height: 80%; padding: 0 25px;">
        <p style="padding-top: 20px;"> ข้อมูลสาขา </p>

        <div style="margin-top: 20px;">
          <span style="font-size: 12px;">ชื่อสาขา*</span>
          <div class="inpu_long" style="width: unset;">
            <input id="" type="text" class="kanit font_normal inputinside_css" placeholder="กรอกชื่อสาขา">
          </div>
        </div>

        <div style="margin-top: 20px;">
          <span style="font-size: 12px;">ชื่อสาขา (EN)</span>
          <div class="inpu_long" style="width: unset;">
            <input id="" type="text" class="kanit font_normal inputinside_css" placeholder="กรอกชื่อสาขา (EN)">
          </div>
        </div>

        <div style="margin-top: 20px;">
          <span style="font-size: 12px;">เลขที่สาขา</span>
          <div class="inpu_long" style="width: unset;">
            <input id="" type="text" class="kanit font_normal inputinside_css" placeholder="กรอกเลขที่สาขา">
          </div>
        </div>

        <div
          style="align-items: center; justify-content: space-between; display: flex; margin-top: 30px; margin-bottom: 15px;">
          <span>ข้อมูลสถานที่ตั้ง</span>
          <label class="switch_hrm">
            <input type="checkbox">
            <span class="slider round"></span>
          </label>
        </div>

        <div style="align-items: center; justify-content: space-between; display: flex;">
          <span> อัตราสมทบเงินทดแทน </span>
          <label class="switch_hrm">
            <input type="checkbox">
            <span class="slider round"></span>
          </label>
        </div>
      </div>

      <div
        style="height: 10%; display: flex; align-items: center; justify-content: space-between; padding: 0 15px; border-bottom: 1px solid #d9d9d9; box-shadow: 0 0 8px #00000014; background-color: white;">
        <div style="align-items: center; display: flex;">
          <span style="margin-right: 10px;">สถานะใช้งาน</span>
          <label class="switch_hrm">
            <input type="checkbox">
            <span class="slider round"></span>
          </label>
        </div>

        <div style="width: 45%; height: 100%; display: flex; justify-content: space-between; align-items: center;">
          <div
            style="width: 45%; height: 50%; border-radius: 6px; align-items: center; justify-content: center; display: flex; border: var(--border_dotDark_4);">
            ยกเลิก
          </div>
          <div
            style="width: 45%; height: 50%; border-radius: 6px; align-items: center; justify-content: center; display: flex; background-color: var(--color_blue); color: var(--color_white_Light_4);">
            บันทึก
          </div>
        </div>
      </div>

    </div>

    <div class="overlay_doccompany_info overlay-slide_doccompany_info">
      <div
        style="height: 10%; display: flex; align-items: center; justify-content: space-between; padding: 0 24px; border-bottom: 1px solid #d9d9d9; background-color: white;">
        <p style="font-size: 1.5vw;"> หนังสือรับรองการทำงาน </p>
        <img src="./symbol_hrm/close_black.png" alt="" style="height: 30%; cursor: pointer;"
          onclick="$('.overlay_doccompany_info').removeClass('open'); $('#blur_bg').css('display','none'),$('#showiconedit_doc').css('display','none');;">
      </div>

      <div style="height: 80%; padding: 0 25px; ">
        <div style="width: 100% ">
          <div style="display: flex; align-items: baseline;">
            <p class="" style="margin-top: 16px; margin-bottom: 5px; margin-right: 5px;">ผู้มีอำนาจลงนาม </p>
            <span style="color: var(--color_gray_Dark_3);">*</span>
          </div>
          <div style="position: relative;">
            <select id="" class="input_box">กรุณาเลือก
              <option value="0">1</option>
              <option value="0">2</option>
            </select>
            <img class="dropdown_arrow_input" src="./symbol_hrm/arrow-down-black.png">
          </div>
        </div>
        <div style="width: 100%; display: flex; flex-direction: column;">
          <div style="display: flex; align-items: baseline;">
            <p class="" style="margin-top: 16px; margin-bottom: 5px; margin-right: 5px;">ผู้มีอำนาจลงนาม </p>
          </div>
          <div
            style="display: flex; border: 1px dashed  gray; cursor: pointer; flex-direction: column; justify-content: center; align-items: center; border-radius: 6px; width: 100%;height: 80px;background-color: white;">
            <img src="./symbol_hrm/scanandpay_info_circle_icon.png" style="width: 20px; height: 20px;" />
            <span>เลือกไฟล์</span>
          </div>
          <!-- if add img  -->
          <!-- <div style="display: flex; border: 1px dashed  gray; cursor: pointer; flex-direction: column; justify-content: center; align-items: center; border-radius: 6px; width: 100px;height: 80px;background-color: white;">
                      <img id="haveimg_modal"  src="./symbol_hrm/scanandpay_info_circle_icon.png" style=" height: 80%" />
                    </div> -->
        </div>
      </div>

      <div
        style="height: 10%; display: flex; align-items: center; justify-content: end; padding: 0 15px; border-bottom: 1px solid #d9d9d9; box-shadow: 0 0 8px #00000014; background-color: white;">
        <div style="width: 45%; height: 100%; display: flex; justify-content: space-between; align-items: center;">
          <div
            style="width: 45%; height: 50%; border-radius: 6px; align-items: center; justify-content: center; display: flex; border: var(--border_dotDark_4);">
            ยกเลิก
          </div>
          <div
            style="width: 45%; height: 50%; border-radius: 6px; align-items: center; justify-content: center; display: flex; background-color: var(--color_blue); color: var(--color_white_Light_4);">
            บันทึก
          </div>
        </div>
      </div>

    </div>

    <div id="sidebar-tableft"></div>
    <div style="width: calc(100% - 60px);">
      <div id="sidebar-tabtop">

      </div>
      <div>
        <div style="width: 100%; height: calc(100vh - 60px); display: flex;">
          <!-- <div style="width: 25%; padding: 25px; border-right: var(--border_dotDark_4); overflow: scroll;">

            <div style="height: 60px; font-size: 2vw;">
              ตั้งค่า
            </div>

            <div id="basicinfo" onclick="setup_menu('basicinfo')" style="height: 60px; border-radius: 15px; display: flex; padding: 0 10px; border: var(--border_unset); box-shadow: var(--box_shadow_sos); cursor: pointer; margin-top: 10px; padding: 5%; border: 1.5px solid transparent; transition: 0.5s; border: 1.5px solid #ef6d35;">
              <div style="width: 25%;">
                <img style="width: 85%; height: 100%;" src="data:image/svg+xml,%3Csvg width='49' height='48' viewBox='0 0 49 48' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M4.00535 0H44.9946C46.9265 0 48.5 1.57352 48.5 3.50536V44.4946C48.5 46.4265 46.9265 48 44.9946 48H4.00535C2.07351 48 0.5 46.4265 0.5 44.4946V3.50536C0.5 1.57352 2.07351 0 4.00535 0Z' fill='url(%23paint0_linear_891_6341)'/%3E%3Cpath fill-rule='evenodd' clip-rule='evenodd' d='M33.2932 35.7859V15.8599C33.2932 14.1773 31.9222 12.7908 30.2241 12.7908H17.9631C16.2805 12.7908 14.894 14.1618 14.894 15.8599V35.7859H13.3672V37.3127H34.82V35.7859H33.2932ZM25.6281 17.3867H28.6973V20.4558H25.6281V17.3867ZM25.6281 21.9982H28.6973V25.0673H25.6281V21.9982ZM25.6281 26.5941H28.6973V29.6632H25.6281V26.5941ZM19.4899 17.3867H22.559V20.4558H19.4899V17.3867ZM19.4899 21.9982H22.559V25.0673H19.4899V21.9982ZM19.4899 26.5941H22.559V29.6632H19.4899V26.5941ZM21.0322 35.7859V31.19H27.1549V35.7859H21.0322Z' fill='white'/%3E%3Cdefs%3E%3ClinearGradient id='paint0_linear_891_6341' x1='24.5002' y1='6.29967' x2='24.5002' y2='45.2418' gradientUnits='userSpaceOnUse'%3E%3Cstop offset='0.000604984' stop-color='%23EE883F'/%3E%3Cstop offset='1' stop-color='%23F06431'/%3E%3C/linearGradient%3E%3C/defs%3E%3C/svg%3E%0A" alt="">
              </div>
                
              <div style="width: 75%; height: 100%; display: flex; flex-direction: column; justify-content: space-between;"> 
                <p>ข้อมูลพื้นฐาน</p>

                <div style="width: 100%;">
                    <div style="display: flex; align-items: center;">
                        <div style="width: 100%; height: 9px; border-radius: 100px; position: relative; background-color: #e0e0e0;">
                            <div style="width: 30%; height: 9px; border-radius: 100px; position: absolute; top: 0; background-color: #ef6d35;"></div>
                        </div>
                        <p style="margin-left: 10px; font-size: 1vw; font-weight: 300; margin-top: -2px;">30%</p>
                    </div>
                </div>
              </div>
            </div>

            <div id="timeattendance" onclick="setup_menu('timeattendance')" style="height: 60px; border-radius: 15px; display: flex; padding: 0 10px; border: var(--border_unset); box-shadow: var(--box_shadow_sos); cursor: pointer; margin-top: 10px; border: 1.5px solid transparent; padding: 5%; transition: 0.5s;">
                <div style="width: 25%;">
                  <img style="width: 85%; height: 100%;" src="data:image/svg+xml,%3Csvg width='49' height='48' viewBox='0 0 49 48' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Crect x='0.5' width='48' height='48' rx='4' fill='url(%23paint0_linear_891_10640)'/%3E%3Cpath fill-rule='evenodd' clip-rule='evenodd' d='M30.8718 16.4741C30.4409 16.0101 29.8443 15.6786 29.1814 15.6786H27.4909V14.6842C27.4909 14.2533 27.1263 13.9219 26.7286 13.9219H25.5685C25.1376 13.9219 24.8061 14.2865 24.8061 14.6842V15.6786H18.7073V14.6842C18.7073 14.2533 18.3427 13.9219 17.9449 13.9219H16.7848C16.3539 13.9219 16.0225 14.2865 16.0225 14.6842V15.6786H14.3652C14.1 15.6786 13.7686 15.7449 13.5034 15.8775C12.9399 16.1095 12.4759 16.5735 12.2439 17.137C12.1113 17.4022 12.0781 17.7005 12.0781 17.9657V30.097C12.0781 31.3566 13.1056 32.3841 14.3652 32.3841H23.977C23.578 31.9197 23.2321 31.4083 22.9489 30.8594H14.4315C14.0006 30.8594 13.6691 30.4948 13.6691 30.097V20.8493H25.365C26.6572 19.9217 28.2418 19.3754 29.9539 19.3754C30.4719 19.3754 30.9783 19.4254 31.4684 19.5209V17.9657C31.4684 17.4353 31.2364 16.905 30.8718 16.4741ZM18.0715 24.8442H16.1591C15.7835 24.8442 15.4761 24.5383 15.4761 24.1643V22.9744C15.4761 22.6344 15.7835 22.2944 16.1591 22.2944H18.0715C18.413 22.3284 18.7545 22.6004 18.7545 22.9744V24.1643C18.7545 24.5043 18.4471 24.8442 18.0715 24.8442ZM18.0715 28.8511H16.1591C15.7835 28.8511 15.4761 28.5791 15.4761 28.1712V26.9812C15.4761 26.6413 15.7835 26.3013 16.1591 26.3013H18.0715C18.413 26.3013 18.7545 26.6073 18.7545 26.9812V28.1712C18.7545 28.5111 18.4471 28.8511 18.0715 28.8511ZM23.3893 22.7967C23.3053 22.5081 23.0263 22.2944 22.7474 22.2944H20.8786C20.5116 22.2944 20.2112 22.6344 20.2112 22.9744V24.1643C20.2112 24.5383 20.5116 24.8442 20.8786 24.8442H22.4294C22.6551 24.1112 22.9804 23.4232 23.3893 22.7967ZM22.2856 26.3013H20.9326C20.5358 26.3013 20.2112 26.6413 20.2112 26.9812V28.1712C20.2112 28.5791 20.5358 28.8511 20.9326 28.8511H22.4842C22.3344 28.2529 22.2551 27.629 22.2551 26.9876C22.2551 26.7564 22.2654 26.5275 22.2856 26.3013ZM29.9662 20.25C31.8506 20.25 33.5133 20.9456 34.8712 22.2811C36.1182 23.5331 36.8665 25.3138 36.9219 27.1502C36.9219 28.9865 36.2014 30.7115 34.8989 32.047C33.5688 33.3825 31.8506 34.0781 29.994 34.0781C28.165 34.0781 26.3914 33.3269 25.1444 32.047C23.8143 30.7115 23.0938 28.9865 23.0938 27.1502C23.0938 25.3416 23.842 23.561 25.1444 22.2811C26.3637 20.9734 28.1373 20.25 29.9662 20.25ZM33.1808 28.6526C33.3471 28.6526 33.5133 28.597 33.6242 28.4578C33.735 28.3187 33.8182 28.124 33.7627 27.957C33.7627 27.6231 33.4579 27.3449 33.1254 27.3449L30.2157 27.3171V24.2009C30.2157 23.867 29.9385 23.5888 29.606 23.5888C29.2735 23.5888 28.9963 23.8392 28.9963 24.2009V27.957C28.9963 28.3744 29.2457 28.6526 29.606 28.6526H33.1808Z' fill='white'/%3E%3Cdefs%3E%3ClinearGradient id='paint0_linear_891_10640' x1='24.5' y1='0' x2='24.5' y2='48' gradientUnits='userSpaceOnUse'%3E%3Cstop stop-color='%2374B0F6'/%3E%3Cstop offset='1' stop-color='%23387BFF'/%3E%3C/linearGradient%3E%3C/defs%3E%3C/svg%3E%0A" alt="">
                </div>
                  
                <div style="width: 75%; height: 100%; display: flex; flex-direction: column; justify-content: space-between;"> 
                  <p>การลงเวลางาน</p>
  
                  <div style="width: 100%;">
                      <div style="display: flex; align-items: center;">
                          <div style="width: 100%; height: 9px; border-radius: 100px; position: relative; background-color: #e0e0e0;">
                              <div style="width: 30%; height: 9px; border-radius: 100px; position: absolute; top: 0; background-color: #5797fb;"></div>
                          </div>
                          <p style="margin-left: 10px; font-size: 1vw; font-weight: 300; margin-top: -2px;">30%</p>
                      </div>
                  </div>
                </div>
            </div>

            <div id="salary" onclick="setup_menu('salary')" style="height: 60px; border-radius: 15px; display: flex; padding: 0 10px; border: var(--border_unset); box-shadow: var(--box_shadow_sos); cursor: pointer; margin-top: 10px; padding: 5%; border: 1.5px solid transparent; transition: 0.5s;">
                <div style="width: 25%;">
                  <img style="width: 85%; height: 100%;" src="data:image/svg+xml,%3Csvg width='49' height='48' viewBox='0 0 49 48' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Crect x='0.5' width='48' height='48' rx='4' fill='url(%23paint0_linear_891_6361)'/%3E%3Cpath fill-rule='evenodd' clip-rule='evenodd' d='M22.8673 32.9207C22.8673 32.9207 23.1741 32.9171 23.1773 32.9207C23.8177 33.6392 24.59 34.2282 25.4523 34.6558H15.171C14.9803 34.6558 14.7915 34.6183 14.6153 34.5453C14.4391 34.4724 14.279 34.3655 14.1441 34.2306C14.0093 34.0958 13.9023 33.9357 13.8293 33.7595C13.7563 33.5834 13.7188 33.3945 13.7188 33.2038V14.671C13.7188 14.2859 13.8719 13.9166 14.1442 13.6442C14.4166 13.3719 14.7859 13.2188 15.171 13.2188H27.9505C28.3356 13.2188 28.7049 13.3719 28.9773 13.6442C29.2496 13.9166 29.4026 14.2859 29.4027 14.671V20.4558C29.1967 20.4376 28.9864 20.4287 28.7753 20.4287C27.6362 20.4276 26.5118 20.6865 25.4878 21.1856C24.4638 21.6847 23.5672 22.411 22.8662 23.309C22.868 23.285 22.868 23.2608 22.868 23.2375C22.8681 22.9526 22.7751 22.6754 22.6032 22.4482C22.4313 22.221 22.1899 22.0561 21.9157 21.9787C21.6415 21.9013 21.3495 21.9155 21.0841 22.0193C20.8187 22.1231 20.5945 22.3107 20.4456 22.5536C20.2966 22.7965 20.2311 23.0815 20.259 23.365C20.2869 23.6486 20.4066 23.9153 20.6 24.1246C20.7933 24.3339 21.0498 24.4742 21.3303 24.5244C21.6108 24.5745 21.9 24.5317 22.1539 24.4024C21.8911 24.8937 21.6849 25.4132 21.5393 25.951C21.2173 25.9563 20.9086 26.0803 20.6725 26.2992C20.4363 26.5181 20.2893 26.8165 20.2596 27.1371C20.23 27.4578 20.3198 27.7781 20.5118 28.0366C20.7038 28.2951 20.9845 28.4736 21.3001 28.5378C21.3473 29.14 21.4683 29.7341 21.6604 30.3068H16.7683C16.5966 30.3068 16.4267 30.3406 16.2681 30.4063C16.1096 30.472 15.9655 30.5682 15.8441 30.6896C15.7228 30.8109 15.6265 30.955 15.5608 31.1136C15.4951 31.2722 15.4613 31.4421 15.4613 31.6137C15.4613 31.7854 15.4951 31.9553 15.5608 32.1139C15.6265 32.2724 15.7228 32.4165 15.8441 32.5379C15.9655 32.6592 16.1096 32.7555 16.2681 32.8212C16.4267 32.8869 16.5966 32.9207 16.7683 32.9207H22.8673ZM15.8868 15.385C15.6145 15.6574 15.4614 16.0267 15.4613 16.4118V18.735C15.4614 19.1202 15.6145 19.4895 15.8868 19.7618C16.1591 20.0342 16.5285 20.1872 16.9136 20.1873H26.2075C26.5926 20.1871 26.9618 20.034 27.2341 19.7617C27.5063 19.4894 27.6593 19.1201 27.6594 18.735V16.4118C27.6593 16.0268 27.5063 15.6575 27.2341 15.3851C26.9618 15.1128 26.5926 14.9597 26.2075 14.9595H16.9136C16.5285 14.9596 16.1591 15.1127 15.8868 15.385ZM16.6399 21.9353C16.3389 21.9651 16.0575 22.0984 15.8438 22.3123V22.312C15.7223 22.4334 15.626 22.5776 15.5604 22.7363C15.4947 22.895 15.4611 23.0651 15.4613 23.2368C15.4615 23.5393 15.5665 23.8323 15.7584 24.0661C15.9504 24.2998 16.2175 24.4597 16.5142 24.5186C16.8108 24.5774 17.1187 24.5316 17.3854 24.3889C17.6521 24.2462 17.861 24.0155 17.9766 23.736C18.0923 23.4565 18.1074 23.1456 18.0195 22.8562C17.9315 22.5668 17.746 22.3169 17.4944 22.1489C17.2428 21.981 16.9408 21.9055 16.6399 21.9353ZM16.6399 25.9551C16.3389 25.9848 16.0575 26.1181 15.8438 26.3321V26.3317C15.7223 26.4531 15.626 26.5973 15.5604 26.756C15.4947 26.9147 15.4611 27.0848 15.4613 27.2566C15.4615 27.559 15.5665 27.8521 15.7584 28.0858C15.9504 28.3195 16.2175 28.4794 16.5142 28.5383C16.8108 28.5972 17.1187 28.5514 17.3854 28.4087C17.6521 28.266 17.861 28.0352 17.9766 27.7557C18.0923 27.4762 18.1074 27.1653 18.0195 26.8759C17.9315 26.5865 17.746 26.3366 17.4944 26.1687C17.2428 26.0008 16.9408 25.9253 16.6399 25.9551ZM29.402 21.2297C29.5512 21.2432 29.6983 21.2625 29.8444 21.2857L29.8458 21.285C31.5159 21.5536 33.0234 22.4415 34.0681 23.7719C35.1127 25.1022 35.6178 26.7773 35.4827 28.4634C35.3476 30.1495 34.5822 31.7228 33.339 32.8698C32.0958 34.0168 30.4661 34.6533 28.7746 34.6525H28.6603C28.5093 34.6493 28.3593 34.6425 28.2111 34.63C26.6357 34.4966 25.1576 33.8129 24.0359 32.6988C22.9141 31.5846 22.2204 30.1111 22.0763 28.5367C22.0755 28.5256 22.0747 28.5144 22.0738 28.5031C22.0727 28.489 22.0716 28.4748 22.0706 28.4603C22.057 28.2839 22.0492 28.1054 22.0492 27.9268C22.0497 27.7099 22.06 27.4944 22.0803 27.2801C22.1161 26.904 22.184 26.5316 22.2834 26.1671C22.5865 25.0572 23.1683 24.0432 23.9735 23.2214C24.7787 22.3996 25.7807 21.7973 26.8842 21.4717C27.1522 21.3926 27.4251 21.3309 27.7012 21.2868C28.0561 21.2297 28.415 21.2009 28.7746 21.2007C28.9857 21.2007 29.1949 21.2104 29.402 21.2297ZM29.6894 31.452C29.7419 31.4391 29.794 31.4248 29.8444 31.4091C31.1513 31.017 31.6091 30.0851 31.608 29.3887C31.608 28.2514 30.7832 27.6754 29.8433 27.2998C29.6973 27.2416 29.5491 27.1884 29.4009 27.1391C29.3775 27.1307 29.3544 27.123 29.3316 27.1154C29.3224 27.1124 29.3132 27.1093 29.3041 27.1062C28.2382 26.7549 27.8983 26.5349 27.8983 26.2271C27.8983 25.9414 28.2275 25.6557 28.9642 25.6557C29.2602 25.6492 29.5557 25.6815 29.8433 25.7518C30.0696 25.8064 30.2896 25.8846 30.4997 25.985C30.5828 26.0233 30.6776 26.0276 30.7638 25.9968C30.85 25.966 30.9207 25.9027 30.9606 25.8204L31.2906 25.1176C31.327 25.0343 31.3303 24.9401 31.2997 24.8545C31.2691 24.7688 31.207 24.698 31.126 24.6566C30.7204 24.4674 30.2875 24.3433 29.8433 24.2888C29.8391 24.2883 29.835 24.2879 29.8309 24.2875C29.8199 24.2863 29.8091 24.2852 29.798 24.2831L29.5898 24.2606V23.5579C29.5872 23.4673 29.5508 23.381 29.4877 23.316C29.4247 23.251 29.3396 23.2119 29.2491 23.2065H28.4278C28.3347 23.2069 28.2455 23.2441 28.1795 23.3098C28.1135 23.3756 28.0761 23.4647 28.0754 23.5579V24.3377L27.9001 24.3806C26.8952 24.6284 26.2496 25.2101 26.0928 25.9739C26.0673 26.0965 26.0546 26.2215 26.055 26.3467C26.055 27.1876 26.6235 27.7115 27.3669 28.0804C27.7306 28.2553 28.1073 28.4019 28.4935 28.5189C28.813 28.613 29.1187 28.7487 29.4027 28.9227C29.6991 29.1202 29.7562 29.2984 29.7562 29.4523C29.7489 29.5601 29.7121 29.6638 29.6497 29.752C29.5874 29.8402 29.5019 29.9094 29.4027 29.9522C29.1272 30.0888 28.8223 30.1553 28.515 30.1458C27.9046 30.1458 27.3027 30.0026 26.7577 29.7276C26.7103 29.7018 26.6577 29.6869 26.6038 29.684C26.5665 29.686 26.5297 29.6935 26.4946 29.7062C26.4037 29.7399 26.329 29.8068 26.2853 29.8933L26.09 30.3318L25.9668 30.6067C25.933 30.6847 25.9289 30.7723 25.9552 30.853C25.9815 30.9338 26.0364 31.0022 26.1096 31.0452C26.5924 31.2937 27.1161 31.4528 27.6554 31.5148C27.6659 31.5162 27.676 31.5177 27.6862 31.5192C27.7089 31.5224 27.7314 31.5257 27.7562 31.5284L27.9654 31.5516V32.2865C27.9641 32.3811 28.0003 32.4723 28.0662 32.5402C28.1321 32.6081 28.2222 32.6471 28.3168 32.6486H29.162C29.2084 32.6491 29.2544 32.6404 29.2973 32.6229C29.3403 32.6054 29.3793 32.5795 29.4121 32.5468C29.445 32.514 29.4709 32.475 29.4885 32.4321C29.5061 32.3892 29.5149 32.3432 29.5145 32.2968V31.4963L29.6894 31.452Z' fill='white'/%3E%3Cdefs%3E%3ClinearGradient id='paint0_linear_891_6361' x1='24.5' y1='0' x2='24.5' y2='48' gradientUnits='userSpaceOnUse'%3E%3Cstop stop-color='%236EEAB6'/%3E%3Cstop offset='1' stop-color='%232EB9A3'/%3E%3C/linearGradient%3E%3C/defs%3E%3C/svg%3E%0A" alt="">
                </div>
                  
                <div style="width: 75%; height: 100%; display: flex; flex-direction: column; justify-content: space-between;"> 
                  <p>เงินเดือน</p>
  
                  <div style="width: 100%;">
                      <div style="display: flex; align-items: center;">
                          <div style="width: 100%; height: 9px; border-radius: 100px; position: relative; background-color: #e0e0e0;">
                              <div style="width: 30%; height: 9px; border-radius: 100px; position: absolute; top: 0; background-color: #45c9aa;"></div>
                          </div>
                          <p style="margin-left: 10px; font-size: 1vw; font-weight: 300; margin-top: -2px;">30%</p>
                      </div>
                  </div>
                </div>
            </div>

            <hr style="margin-top: 25px;">

            <div onclick="location.href='user-hrm.html'" style="height: 35px; border-radius: 8px; align-items: center; display: flex; padding: 0 10px; cursor: pointer; cursor: pointer; margin-top: 15px; background-color: #f2f2f2;">
                <span style="margin-left: 10px;">ผู้ใช้</span>
            </div>

            <div style="height: 35px; border-radius: 8px; align-items: center; display: flex; padding: 0 10px; cursor: pointer; margin-top: 15px; background-color: #f2f2f2;">
                <span style="margin-left: 10px;">มาสเตอร์</span>
            </div>

          </div> -->

          <div id="setup-menu" style="width: 25%;"></div>
          <div style="width: 75%; padding: 25px; overflow: scroll; ">

            <div id="basic_info" style="display: block;">
                <div style="width: 100%; grid-template-columns: repeat(4,1fr); display: grid; align-items: center; flex-wrap: wrap; gap: 16px; width: 100%; margin-top: 8px;">
                    <div class="fadeIn"  onclick="location.href='settingcompany.html'"style="width: 80%; height: 80%; text-align: center; padding: 15% 10% 10%; border-radius: 10px; box-shadow: 0 0 8px #00000014; background-color: white;">
                        <img style="width: 60%;" src="https://app.empeo.com/assets/images/tenant-setup/easySetup/img-component-mas003.png" alt="">
                        <p style="font-size: 1.2vw; display: flex; align-items: center; justify-content: center; margin-top: 15px; margin-bottom: 5px;"><span style="height: 18px; font-size: 1vw; padding: 0 6px; background-color: #ef6d35; color: white; border-radius: 50px; display: inline-flex; justify-content: center; align-items: center; margin-right: 5px;">1.1</span> ข้อมูลบริษัท </p>
                        <p style="font-size: 0.9vw;"> ระบุข้อมูลของบริษัทและสาขา พร้อมกำหนดเงื่อนไขการเข้างาน ทดลองงาน เกษียณ พ้นสภาพ และล่วงเวลา </p>
                    </div>

                    <div class="fadeIn" onclick="location.href='organization.html'" style="width: 80%; height: 80%; text-align: center; padding: 15% 10% 10%; border-radius: 10px; box-shadow: 0 0 8px #00000014; background-color: white;">
                        <img style="width: 60%;" src="https://app.empeo.com/assets/images/tenant-setup/easySetup/img-component-mas004.png" alt="">
                        <p style="font-size: 1.2vw; display: flex; align-items: center; justify-content: center; margin-top: 15px; margin-bottom: 5px;"><span style="height: 18px; font-size: 1vw; padding: 0 6px; background-color: #ef6d35; color: white; border-radius: 50px; display: inline-flex; justify-content: center; align-items: center; margin-right: 5px;">1.2</span> โครงสร้างองค์กร </p>
                        <p style="font-size: 0.9vw;"> กำหนดแผนผังองค์กร ระดับองค์กร และข้อมูลบัญชีในแต่ละหน่วยงาน </p>
                    </div>

                    <div class="fadeIn" style="width: 80%; height: 80%; text-align: center; padding: 15% 10% 10%; border-radius: 10px; box-shadow: 0 0 8px #00000014; background-color: white;">
                        <img style="width: 60%;" src="https://app.empeo.com/assets/images/tenant-setup/easySetup/img-component-mas005.png" alt="">
                        <p style="font-size: 1.2vw; display: flex; align-items: center; justify-content: center; margin-top: 15px; margin-bottom: 5px;"><span style="height: 18px; font-size: 1vw; padding: 0 6px; background-color: #ef6d35; color: white; border-radius: 50px; display: inline-flex; justify-content: center; align-items: center; margin-right: 5px;">1.3</span> ตำแหน่ง </p>
                        <p style="font-size: 0.9vw;"> ระบุข้อมูลของบริษัทและสาขา พร้อมกำหนดเงื่อนไขการเข้างาน ทดลองงาน เกษียณ พ้นสภาพ และล่วงเวลา </p>
                    </div>

                    <div onclick="location.href='shift_setting.html'" class="fadeIn" style="width: 80%; height: 80%; text-align: center; padding: 15% 10% 10%; border-radius: 10px; box-shadow: 0 0 8px #00000014; background-color: white;">
                        <img style="width: 60%;" src="https://app.empeo.com/assets/images/tenant-setup/easySetup/img-component-mas007.png" alt="">
                        <p style="font-size: 1.2vw; display: flex; align-items: center; justify-content: center; margin-top: 15px; margin-bottom: 5px;"><span style="height: 18px; font-size: 1vw; padding: 0 6px; background-color: #ef6d35; color: white; border-radius: 50px; display: inline-flex; justify-content: center; align-items: center; margin-right: 5px;">1.4</span> กะการทำงาน </p>
                        <p style="font-size: 0.9vw;"> กำหนดกะการทำงาน เพื่อระบุช่วง เวลาในการเริ่มงาน เลิกงาน ทำงานล่วงเวลา และการคำนวณค่ากะ </p>
                    </div>
                </div>
            </div>

            <div id="time_attendance" style="display: none;">
                <div style="width: 100%; grid-template-columns: repeat(4,1fr); display: grid; align-items: center; flex-wrap: wrap; gap: 16px; width: 100%; margin-top: 8px;">
                    <div class="fadeIn" style="width: 80%; height: 80%; text-align: center; padding: 15% 10% 10%; border-radius: 10px; box-shadow: 0 0 8px #00000014; background-color: white;">
                        <img style="width: 60%;" src="https://app.empeo.com/assets/images/tenant-setup/easySetup/img-component-sys012.png" alt="">
                        <p style="font-size: 1.2vw; display: flex; align-items: center; justify-content: center; margin-top: 15px; margin-bottom: 5px;"><span style="height: 18px; font-size: 1vw; padding: 0 6px; background-color: #ef6d35; color: white; border-radius: 50px; display: inline-flex; justify-content: center; align-items: center; margin-right: 5px;">2.1</span> สถานที่เวิร์กอิน </p>
                        <p style="font-size: 0.9vw;"> กำหนดสถานที่ลงเวลางานผ่าน GPS, Beacon, IOMO และ empeo Station เพื่อบันทึกเวลาการทำงาน </p>
                    </div>

                    <div onclick="location.href='holiday-calendar.html'" class="fadeIn" style="width: 80%; height: 80%; text-align: center; padding: 15% 10% 10%; border-radius: 10px; box-shadow: 0 0 8px #00000014; background-color: white;">
                        <img style="width: 60%;" src="https://app.empeo.com/assets/images/tenant-setup/easySetup/img-component-mas006.png" alt="">
                        <p style="font-size: 1.2vw; display: flex; align-items: center; justify-content: center; margin-top: 15px; margin-bottom: 5px;"><span style="height: 18px; font-size: 1vw; padding: 0 6px; background-color: #ef6d35; color: white; border-radius: 50px; display: inline-flex; justify-content: center; align-items: center; margin-right: 5px;">2.2</span> ปฏิทิน </p>
                        <p style="font-size: 0.9vw;"> กำหนดวันหยุดบริษัท วันหยุดตามประเพณี พร้อมสร้างปฏิทินสำหรับพนักงานแบบกำหนดเอง </p>
                    </div>

                    <div onclick="location.href='leavetype.html'"  class="fadeIn" style="width: 80%; height: 80%; text-align: center; padding: 15% 10% 10%; border-radius: 10px; box-shadow: 0 0 8px #00000014; background-color: white;">
                        <img style="width: 60%;" src="https://app.empeo.com/assets/images/tenant-setup/easySetup/img-component-mas008.png" alt="">
                        <p style="font-size: 1.2vw; display: flex; align-items: center; justify-content: center; margin-top: 15px; margin-bottom: 5px;"><span style="height: 18px; font-size: 1vw; padding: 0 6px; background-color: #ef6d35; color: white; border-radius: 50px; display: inline-flex; justify-content: center; align-items: center; margin-right: 5px;">2.3</span> ประเภทการลา </p>
                        <p style="font-size: 0.9vw;"> กำหนดประเภทการลา ปฏิบัติงานนอกสถานที่ และอื่นๆ พร้อมระบุสิทธิการลาตามระดับและอายุงานพนักงาน </p>
                    </div>
                </div>
            </div>

            <div id="salary_info" style="display: none;">
                <div style="width: 100%; grid-template-columns: repeat(4,1fr); display: grid; align-items: center; flex-wrap: wrap; gap: 16px; width: 100%; margin-top: 8px;">
                    <div  onclick="location.href='payment-method.html'" class="fadeIn" style="width: 80%; height: 80%; text-align: center; padding: 15% 10% 10%; border-radius: 10px; box-shadow: 0 0 8px #00000014; background-color: white;">
                        <img style="width: 60%;" src="https://app.empeo.com/assets/images/tenant-setup/easySetup/img-component-mas014.png" alt="">
                        <p style="font-size: 1.2vw; display: flex; align-items: center; justify-content: center; margin-top: 15px; margin-bottom: 5px;"><span style="height: 18px; font-size: 1vw; padding: 0 6px; background-color: #ef6d35; color: white; border-radius: 50px; display: inline-flex; justify-content: center; align-items: center; margin-right: 5px;">3.1</span>  ประเภทการจ้าง  </p>
                        <p style="font-size: 0.9vw;"> กำหนดประเภทการจ้างพนักงาน (รายวัน, รายเดือน) พร้อมเงื่อนไขรายหักและการทำงานล่วงเวลา </p>
                    </div>

                    <div class="fadeIn" onclick="location.href='pay-period.html'" style="width: 80%; height: 80%; text-align: center; padding: 15% 10% 10%; border-radius: 10px; box-shadow: 0 0 8px #00000014; background-color: white;">
                        <img style="width: 60%;" src="https://app.empeo.com/assets/images/tenant-setup/easySetup/img-component-mas011.png" alt="">
                        <p style="font-size: 1.2vw; display: flex; align-items: center; justify-content: center; margin-top: 15px; margin-bottom: 5px;"><span style="height: 18px; font-size: 1vw; padding: 0 6px; background-color: #ef6d35; color: white; border-radius: 50px; display: inline-flex; justify-content: center; align-items: center; margin-right: 5px;">3.2</span>  กำหนดงวด  </p>
                        <p style="font-size: 0.9vw;"> กำหนดงวดการจ่ายเงินเดือน วันที่จ่าย และเงื่อนไขการคำนวณนอกงวด </p>
                    </div>

                    <div onclick="location.href='income.html'" class="fadeIn" style="width: 80%; height: 80%; text-align: center; padding: 15% 10% 10%; border-radius: 10px; box-shadow: 0 0 8px #00000014; background-color: white;">
                        <img style="width: 60%;" src="https://app.empeo.com/assets/images/tenant-setup/easySetup/img-component-mas010.png" alt="">
                        <p style="font-size: 1.2vw; display: flex; align-items: center; justify-content: center; margin-top: 15px; margin-bottom: 5px;"><span style="height: 18px; font-size: 1vw; padding: 0 6px; background-color: #ef6d35; color: white; border-radius: 50px; display: inline-flex; justify-content: center; align-items: center; margin-right: 5px;">3.3</span>  รายได้ รายหัก  </p>
                        <p style="font-size: 0.9vw;"> กำหนดรายได้และรายหัก พร้อมตั้งค่าการคำนวณภาษี กองทุน รอบการจ่าย และหมวดบัญชี </p>
                    </div>
                </div>
            </div>

          </div>

        </div>

      </div>
    </div>

  </div>

  </div>



</body>

<!-- <script>
    function setup_menu(id){
        $('#basic_info').css('display','none')
        $('#time_attendance').css('display','none')
        $('#salary_info').css('display','none')

        $('#basicinfo').css('border','1.5px solid transparent')
        $('#timeattendance').css('border','1.5px solid transparent')
        $('#salary').css('border','1.5px solid transparent')

        if(id == 'basicinfo'){
            $('#basic_info').css('display','block')

            $('#basicinfo').css('border','1.5px solid #ef6d35')
        }
        else if(id == 'timeattendance'){
            $('#time_attendance').css('display','block')

            $('#timeattendance').css('border','1.5px solid #5797fb')
        }
        else if(id == 'salary'){
            $('#salary_info').css('display','block')

            $('#salary').css('border','1.5px solid #45c9aa')
        }
    }
</script> -->

<script>




  function slideworking_conditions() {
    $(".slideworking").slideToggle("slow");
    // $(".cardslide").css('border-bottom','none');

  }


</script>


</html>