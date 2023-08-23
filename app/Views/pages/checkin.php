<?php
$session = session();
$token = $session->get('token');
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" type="text/css" href="<?= base_url('/css/global.css'); ?>">
  <title>Live Camera Stream</title>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600&display=swap');

    <?php echo "<script src='" . base_url('./backoffice_static/config.js') . "'></script>"; ?>body {
      margin: 0;
      height: 100vh;
      font-family: 'Inter', sans-serif;
    }

    #videoElement {
      width: 90vw;
      height: 65vh;
      border-radius: 47px;
      object-fit: cover;
      margin-top: 10px;
    }

    #photoButton {
      display: block;
      margin: 10px auto;
      padding: 10px 20px;
      background-color: #064BF9;
      color: white;
      border: none;
      border-radius: 50%;
      font-size: 16px;
      cursor: pointer;
      margin-top: 20px;
      width: 70px;
      height: 70px;
      display: flex;
      align-items: center;
      transition: box-shadow 400ms cubic-bezier(0.2, 0, 0.7, 1), transform 200ms cubic-bezier(0.2, 0, 0.7, 1);
    }

    #photoButton:after {
      font-size: 2.5em;
      line-height: 1.1em;
    }

    #photoButton:hover {
      box-shadow: 0 0 1px 25px #E6EDFF;
    }

    #photo {
      display: none;
      margin: 10px auto;
      border: 1px solid #ddd;
      border-radius: 5px;
    }

    .overlay {
      position: fixed;
      width: 100%;
      height: 100vh;
      top: 0vh;
      left: 0;
      background: #fff;
      z-index: 99;
      overflow: scroll;
    }

    .overlay-slidedown {
      visibility: hidden;
      -webkit-transform: translateY(100%);
      transform: translateY(100%);
      -webkit-transition: -webkit-transform 0.8s ease-in-out, visibility 0s 0.8s;
      transition: transform 0.8s ease-in-out, visibility 0s 0.8s;
    }

    .overlay-slidedown.open {
      visibility: visible;
      -webkit-transform: translateY(0%);
      transform: translateY(0%);
      -webkit-transition: -webkit-transform 0.8s ease-in-out;
      transition: transform 0.8s ease-in-out;
    }

    .overlay img {
      max-width: 100%;
      max-height: 100%;
    }

    .previewPic {
      margin-top: 85px;
    }

    .previewImage {
      border-radius: 47px;
    }

    .container-check {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .video-container {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .controls {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 20px;
      width: 80%;
    }

    .controls input,
    .controls button {
      margin: 0 5px;
      width: 40px;
      height: 40px;
      display: flex;
      justify-content: center;
      align-items: center;
      border-radius: 50%;
      background-color: #fff;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
      cursor: pointer;
    }

    .controls div:hover {
      background-color: #f7f7f7;
    }

    .controls i {
      font-size: 20px;
    }

    .item-head {
      font-style: normal;
      font-weight: 400;
      font-size: 16px;
      margin-top: 15px;
      margin-left: 18px;
    }

    .item-date-time {
      font-weight: 400;
      font-size: 14px;
      color: #C7C9D9;
      margin-top: 12px;
      margin-left: 20px;
    }

    .item-details {
      margin: 15px 20px;
      font-weight: 400;
      font-size: 14px;
      color: #C7C9D9;
    }

    .button-container {
      display: flex;
      justify-content: center;
      align-items: center;

    }

    .button_check {
      margin: 0 10px;
      width: 167px;
      height: 56px;
      font-weight: 700;
      font-size: 14px;
      background: #FFFFFF;
      border: 1px solid #C7C9D9;
      border-radius: 16px;
      margin-top: 4vh;
    }

    #backButton:hover,
    #sendButton:hover {
      background-color: #0063F7;
      color: #FFFFFF;
      cursor: pointer;
    }

    #sendSelectButton {
      background-color: #0063F7;
      color: #FFFFFF;
      cursor: pointer;
    }

    .plus {
      transition: box-shadow 400ms cubic-bezier(0.2, 0, 0.7, 1), transform 200ms cubic-bezier(0.2, 0, 0.7, 1);
    }

    .plus:after {
      font-size: 2.5em;
      line-height: 1.1em;
    }

    .plus:hover {
      transform: rotate(45deg);
      box-shadow: 0 0 1px 45px #E6EDFF;
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
      background: #FFFFFF;
      border: 1px solid #C7C9D9;
      border-radius: 8px;
      padding: 8px 12px;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .modal_btn_check:hover {
      background: #0063F7;
      color: #FFFFFF;
    }

    .modal_btn_check_cancel:hover {
      background: red;
      color: #FFFFFF;
    }

    .modal_msg {
      color: #2D3643;
      font-weight: 700;
      font-size: 20px;
      line-height: 32px;
    }


    .gallery-btn {
      cursor: pointer;
    }

    .gallery-btn img {
      pointer-events: none;
    }

    #preview {
      max-width: 100%;
      max-height: 200px;
      object-fit: contain;
    }

    #preview {
      max-width: 100%;
      max-height: 340px;
      object-fit: contain;
    }

    .select-overlay {
      position: fixed;
      width: 100%;
      height: 100vh;
      top: 0vh;
      left: 0;
      background: #fff;
      z-index: 99;
      overflow: scroll;
    }

    .select-overlay-slidedown {
      visibility: hidden;
      -webkit-transform: translateY(100%);
      transform: translateY(100%);
      -webkit-transition: -webkit-transform 0.8s ease-in-out, visibility 0s 0.8s;
      transition: transform 0.8s ease-in-out, visibility 0s 0.8s;
    }

    .select-overlay-slidedown.open {
      visibility: visible;
      -webkit-transform: translateY(0%);
      transform: translateY(0%);
      -webkit-transition: -webkit-transform 0.8s ease-in-out;
      transition: transform 0.8s ease-in-out;
    }

    .select-overlay img {
      max-width: 100%;
      max-height: 100%;
    }

    .previewPic {
      margin-top: 85px;
    }

    .selectPreview {
      border-radius: 47px;
    }
  </style>
</head>

<body>
  <div class="container-check">
    <div class="video-container">
      <video id="videoElement" width="550" height="360" autoplay></video>
    </div>
    <div class="controls">
      <input type="file" accept="image/*" id="fileInput" style="display: none;" onchange="previewImage(event)">
      <div class="gallery-btn" onclick="document.getElementById('fileInput').click()">
        <img src="<?= base_url('/imgs/gallery_check_in_out.svg') ?>" style="height: 30px; width: 30px;">
      </div>
      <div id="photoButton">
        <img src="<?= base_url('/imgs/camera_check_in_out.svg') ?>" style="height: 30px; width: 30px;">
      </div>
      <div id="switchButton">
        <img src="<?= base_url('/imgs/maximize-circle_check_in_out.svg') ?>" style="height: 30px; width: 30px;">
      </div>

    </div>
  </div>
  <!-- sssss -->

  <!-- <input type="file" accept="image/*" onchange="previewImage(event)"> -->

  <div class="select-overlay select-overlay-slidedown previewPic">
    <div class="select-overlay-content">
      <img id="selectPreview" class="previewSelect">
      <div style="display: flex; align-items: center; justify-content: center;">
        <img id="preview" src="" alt="Image preview" style="border-radius: 47px;">
      </div>
      <div class="schedule">
        <div class="schedule-item">
          <div class="item-head">Detail</div>

          <div class="item-date-time">

            <div class="item-date" style="display: inline-block;">
              <img src="<?= base_url('/imgs/uil_calendar-alt.svg') ?>" style="height: 15px; width: 15px; display: inline-block; vertical-align: middle;">
              <span id="to_date_select" style="display: inline-block; vertical-align: middle;">12/11/2021</span>
            </div>

            <div class="item-time" style="display: inline-block;">
              <img src="<?= base_url('/imgs/clock_check_in_out.svg') ?>" style="margin-left: 48px; height: 15px; width: 15px; display: inline-block; vertical-align: middle;">
              <span id="to_day_select" style="display: inline-block; vertical-align: middle;">12:00:00</span>
            </div>
          </div>

          <div class=""></div>
          <div class="item-details" style="display: inline-block;">
            <img src="<?= base_url('/imgs/map_check_in_out.svg') ?>" style="height: 15px; width: 15px; display: inline-block; vertical-align: middle;">
            <span id="company_name_select" style="display: inline-block; vertical-align: middle;">Unit.Co.,Ltd....</span>
          </div>
        </div>
      </div>
      <div class="button-container">
        <button class="close-button button_check">Close</button>
        <button id="sendSelectButton" class="button_check">Confirm</button>
      </div>
    </div>
  </div>
  <!-- sssss -->

  <canvas id="photo"></canvas>


  <div class="overlay overlay-slidedown previewPic">
    <div class="overlay-content">


      <div style="display: flex; align-items: center; justify-content: center; padding: 20px;">
        <img id="preview" src="" alt="Image preview" style="border-radius: 47px;">
        <img id="photoPreview" class="previewImage" style="border-radius: 47px;">
      </div>

      <div class="schedule">
        <div class="schedule-item">
          <div class="item-head">Detail</div>

          <div class="item-date-time">

            <div class="item-date" style="display: inline-block;">
              <img src="<?= base_url('/imgs/uil_calendar-alt.svg') ?>" style="height: 15px; width: 15px; display: inline-block; vertical-align: middle;">
              <span id="to_date" style="display: inline-block; vertical-align: middle;">12/11/2021</span>
            </div>

            <div class="item-time" style="display: inline-block;">
              <img src="<?= base_url('/imgs/clock_check_in_out.svg') ?>" style="margin-left: 48px; height: 15px; width: 15px; display: inline-block; vertical-align: middle;">
              <span id="to_day" style="display: inline-block; vertical-align: middle;">12:00:00</span>
            </div>
          </div>
          <div class=""></div>
          <div class="item-details" style="display: inline-block;">
            <img src="<?= base_url('/imgs/map_check_in_out.svg') ?>" style="height: 15px; width: 15px; display: inline-block; vertical-align: middle;">
            <span id="company_name" style="display: inline-block; vertical-align: middle;">Unit.Co.,Ltd....</span>
          </div>
        </div>
      </div>

      <div class="button-container">
        <button id="backButton" class="button_check">Cancel</button>
        <button id="sendButton" class="button_check">Confirm</button>
      </div>
    </div>
  </div>



  <div class="modal hide" id='modal_fail' style='display:flex;'>
    <div class="modal_content_check">
      <div class="modal_header">
        <img src="<?= base_url("imgs/fail_icon.svg") ?>" alt="Modal Header Image">
      </div>
      <div class="modal_body">
        <div class="modal_msg">You so far from check point</div>
        <div class="gray fs-14px modal_text" id="fail_txt">Do you want to disapprove?</div>
      </div>
      <div class="modal_footer_check">
        <button class="modal_btn_check cancel_btn" onclick='closeModal();refresh();'>try again</button>
      </div>
    </div>
  </div>

  <div class="modal hide" id='modal_success' style='display:flex;'>
    <div class="modal_content_check">
      <div class="modal_header">
        <img src="<?= base_url("imgs/success_icon.svg") ?>" alt="Modal Header Image">
      </div>
      <div class="modal_body">
        <div class="modal_msg">The check-in system is complete</div>
        <div class="gray fs-14px modal_text2" style="color: #6B6F80">Check in and take pictures.</div>
      </div>
      <div class="modal_footer_check">
        <button class="modal_btn_check_cancel cancel_btn" onclick='closeModal();refresh();'>Cancel</button>
        <button class="modal_btn_check success_btn" onclick='closeModal();backhome();'>Closed</button>
      </div>
    </div>
  </div>

  <script>
    let ENDPOINT = window.API_URL;

    const video = document.getElementById("videoElement");
    const photoButton = document.getElementById("photoButton");
    const canvas = document.getElementById("photo");
    const context = canvas.getContext("2d");
    const overlay = document.querySelector(".overlay");
    const photoPreview = document.getElementById("photoPreview");
    const selectPreview = document.getElementById("selectPreview");

    selectPreview

    navigator.mediaDevices.getUserMedia({
        video: true
      })
      .then(stream => {
        video.srcObject = stream;
      })
      .catch(error => {
        console.log(error);
      });

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
    fetch(ENDPOINT + "mobile/status", requestOptions)
      .then(response => response.json())
      .then(result => {
        console.log(result)
        document.getElementById('to_date').innerHTML = result.date;
        document.getElementById('to_day').innerHTML = result.time;
        document.getElementById('company_name').innerHTML = result.data[0].company_name;
        document.getElementById('to_date_select').innerHTML = result.date;
        document.getElementById('to_day_select').innerHTML = result.time;
        document.getElementById('company_name_select').innerHTML = result.data[0].company_name;
      })
      .catch(error => console.log('error', error));

    photoButton.addEventListener("click", function() {
      canvas.width = video.videoWidth;
      canvas.height = video.videoHeight;
      context.drawImage(video, 0, 0, canvas.width, canvas.height);
      canvas.toBlob(function(blob) {
        const url = URL.createObjectURL(blob);
        photoPreview.src = url;
      });


      overlay.classList.add("open");
    });

    const backButton = document.getElementById('backButton');

    backButton.addEventListener('click', () => {
      overlay.classList.remove('open');
      const photoPreview = document.getElementById('photoPreview');
      photoPreview.src = '';
    });

    function previewImage(event) {
      const input = event.target;
      if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
          const previewImg = document.getElementById("preview");
          previewImg.src = e.target.result;
          const overlay = document.querySelector('.select-overlay');
          overlay.classList.add('open');
        }
        reader.readAsDataURL(input.files[0]);
      }
    }

    const closeButton = document.querySelector('.close-button');
    closeButton.addEventListener('click', function() {
      const overlay = document.querySelector('.select-overlay');
      overlay.classList.remove('open'); // Remove class to slide overlay back up
    });

    const sendButton = document.getElementById('sendButton');

    sendButton.addEventListener('click', () => {
      const photoPreview = document.getElementById('photoPreview');
      const image = photoPreview.src;
      const canvas = document.createElement('canvas');
      const ctx = canvas.getContext('2d');

      const MAX_WIDTH = 640;
      const MAX_HEIGHT = 480;

      let width = photoPreview.width;
      let height = photoPreview.height;
      if (width > MAX_WIDTH) {
        height *= MAX_WIDTH / width;
        width = MAX_WIDTH;
      }
      if (height > MAX_HEIGHT) {
        width *= MAX_HEIGHT / height;
        height = MAX_HEIGHT;
      }
      canvas.width = width;
      canvas.height = height;
      ctx.drawImage(photoPreview, 0, 0, width, height);

      const MAX_SIZE = 25 * 360; // 100kb

      let scale = 1.0;
      while (canvas.toDataURL('image/jpeg', scale).length > MAX_SIZE) {
        scale -= 0.1;
        canvas.width = width * scale;
        canvas.height = height * scale;
        ctx.drawImage(photoPreview, 0, 0, canvas.width, canvas.height);
      }

      let quality = 1.0;
      let base64Image = '';
      while (base64Image.length < MAX_SIZE && quality > 0.1) {
        base64Image = canvas.toDataURL('image/jpeg', quality);
        quality -= 0.2;
      }
      // console.log(base64Image);

      const byteCharacters = atob(base64Image.split(',')[1]);
      const byteNumbers = new Array(byteCharacters.length);

      for (let i = 0; i < byteCharacters.length; i++) {
        byteNumbers[i] = byteCharacters.charCodeAt(i);
      }
      const byteArray = new Uint8Array(byteNumbers);
      const imageSizeInKB = byteArray.length / 1024;
      console.log(`Image size: ${imageSizeInKB} KB`);

      var myHeaders = new Headers();
      myHeaders.append("Content-Type", "application/json");

      navigator.geolocation.getCurrentPosition(function(position) {
        var userlat = position.coords.latitude;
        var userlng = position.coords.longitude;
        var raw = JSON.stringify({
          "token": '<?php echo $token; ?>',
          "userlat": userlat, //13.7697562 //userlat  // 13.770668061079983 the street lat, 
          "userlng": userlng, //100.5735826 //userlng // 100.57225965217982 the street lng

          "img_in": base64Image
        });

        var requestOptions = {
          method: 'POST',
          headers: myHeaders,
          body: raw,
          redirect: 'follow'
        };
        fetch(ENDPOINT + "mobile/checkIn", requestOptions)
          .then(response => response.json())
          .then(data => {
            if (data.code == 200) {
              model_success();
            }
            if (data.code == 400) {
              const errorMessage = `${data.message}`
              model_try_again(errorMessage);
            }
            console.log(data)
          })
          .catch(error => console.log('error', error));
      }, function(error) {
        console.log(error);
      })
    });


    const sendSelectButton = document.getElementById('sendSelectButton');

    sendSelectButton.addEventListener('click', () => {
      const selectPreview = document.getElementById('selectPreview');
      const image = selectPreview.src;
      const canvas = document.createElement('canvas');
      const ctx = canvas.getContext('2d');

      const MAX_WIDTH = 640;
      const MAX_HEIGHT = 480;

      let width = selectPreview.width;
      let height = selectPreview.height;
      if (width > MAX_WIDTH) {
        height *= MAX_WIDTH / width;
        width = MAX_WIDTH;
      }
      if (height > MAX_HEIGHT) {
        width *= MAX_HEIGHT / height;
        height = MAX_HEIGHT;
      }
      canvas.width = width;
      canvas.height = height;
      ctx.drawImage(selectPreview, 0, 0, width, height);

      const MAX_SIZE = 25 * 360; // 100kb

      let scale = 1.0;
      while (canvas.toDataURL('image/jpeg', scale).length > MAX_SIZE) {
        scale -= 0.1;
        canvas.width = width * scale;
        canvas.height = height * scale;
        ctx.drawImage(selectPreview, 0, 0, canvas.width, canvas.height);
      }

      let quality = 1.0;
      let base64Image = '';
      while (base64Image.length < MAX_SIZE && quality > 0.1) {
        base64Image = canvas.toDataURL('image/jpeg', quality);
        quality -= 0.2;
      }
      // console.log(base64Image);

      const byteCharacters = atob(base64Image.split(',')[1]);
      const byteNumbers = new Array(byteCharacters.length);

      for (let i = 0; i < byteCharacters.length; i++) {
        byteNumbers[i] = byteCharacters.charCodeAt(i);
      }
      const byteArray = new Uint8Array(byteNumbers);
      const imageSizeInKB = byteArray.length / 1024;
      console.log(`Image size: ${imageSizeInKB} KB`);

      var myHeaders = new Headers();
      myHeaders.append("Content-Type", "application/json");

      navigator.geolocation.getCurrentPosition(function(position) {
        var userlat = position.coords.latitude;
        var userlng = position.coords.longitude;
        var raw = JSON.stringify({
          "token": '<?php echo $token; ?>',
          "userlat": userlat, //13.7697562 //userlat
          "userlng": userlng, //100.5735826 //userlng
          "img_in": base64Image
        });

        var requestOptions = {
          method: 'POST',
          headers: myHeaders,
          body: raw,
          redirect: 'follow'
        };
        fetch(ENDPOINT + "mobile/checkIn", requestOptions)
          .then(response => response.json())
          .then(data => {
            if (data.code == 200) {
              model_success();
            }
            if (data.code == 400) {
              const errorMessage = `${data.message} ${data.distance}`
              model_try_again(errorMessage);
            }
            console.log(data)
          })
          .catch(error => console.log('error', error));
      }, function(error) {
        console.log(error);
      })
    });

    function model_try_again(alert = 'some thing went wrong 222') {
      console.log('model_try_again()01');
      setTimeout(function() {
        console.log('alert', alert);
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

    function model_success() {
      setTimeout(function() {
        console.log('tony');
        $('#modal_success').removeClass('hide');
        $('.modal_content_check').addClass('slide_top');
      }, 100);
    }

    function backhome() {
      window.location.href = "<?= base_url("home") ?>";
    }

    function refresh() {
      location.reload();
    }
  </script>
</body>

</html>