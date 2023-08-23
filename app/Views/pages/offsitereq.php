<link rel="stylesheet" href="./css/global.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php echo "<script src='" . base_url('./backoffice_static/config.js') . "'></script>"; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
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

	.line2 {
		border: 1px solid #8F90A6;
		width: 20%;
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
</style>

<div class='content_template'>

	<div class="col1">
		<div class="imgbox">
			<img src="<?= base_url('imgs/receipt-edit.png') ?>" alt="image">
			<span>Draft</span>
		</div>
		<div class='line2'></div>
		<div class="imgbox">
			<img src="<?= base_url('imgs/profile.png') ?>" alt="image">
			<span>Person 1</span>
		</div>
		<div class='line2'></div>

		<div class="imgbox">
			<img src="<?= base_url('imgs/profile.png') ?>" alt="image">
			<span>Person 2</span>
		</div>
	</div>

	<div class="col1">
		<div class="subcol1">
			<select class="custom-select greybc" name="" id="offsite_req">
				<option value="">Please Select</option>
			</select>
		</div>
	</div>

	<div class="col1 fs-14px txt2">
		<div class="subcol2">
			<div class="check-box">
				<input type="checkbox" id="allday" onchange='allday()'>
			</div>
			<span class="allday" for='allday'> All day</span>
		</div>
	</div>

	<span>Date start</span>
	<div class="col1 greybc">
		<img src="<?= base_url('imgs/calendar_icon.png') ?>" alt="" for='datepicker1'>
		<!-- Select date -->
		<input type="text" id="datepicker1" class="datepicker" name="datepicker" placeholder="Select date">
	</div>

	<div id='datebox2' class='hide'>
		<span>Date end</span>
		<div class="col1 greybc">
			<img src="<?= base_url('imgs/calendar_icon.png') ?>" alt="" for='datepicker1'>
			<!-- Select date -->
			<input type="text" id="datepicker2" class="datepicker" name="datepicker" placeholder="Select date">
		</div>
	</div>

	<div id='timebox'>
		<div class=" timebigbox">
			<div class='timeboxtx'>
				<span>Time start</span>
			</div>
			<div class='timeboxtx'>
				<span>Time end</span>
			</div>
		</div>

		<div class="col1 timebigbox">
			<div class='timebox'>
				<input type="time" id="timepicker1" class="timepicker" name="timepicker" placeholder="Select time" value="<?= esc($timein); ?>:00">
			</div>
			<div class='timebox'>
				<input type="time" id="timepicker2" class="timepicker" name="timepicker" placeholder="Select time" value="<?= esc($timeout); ?>:00">
			</div>
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

<div class='bottomspace'>

	<footer>
		<div class='btn' onclick="sendreq()">Confirm</div>
	</footer>

	<div class="modal hide" id='modal_fail' style='display:flex;'>
		<div class="modal_content">
			<div class="modal_header">
				<img src="<?= base_url("imgs/fail_icon.svg") ?>" alt="Modal Header Image">
			</div>
			<div class='line1'></div>

			<div class="modal_body">
				<div class="modal_msg">Please check again.</div>
				<div class="gray fs-14px modal_text" id="fail_txt">Do you want to disapprove?</div>
			</div>
			<div class='line1'></div>

			<div class="modal_footer">
				<button class="modal_btn cancel_btn" onclick='closeModal();refresh();'>try again</button>
			</div>
		</div>
	</div>

	<div class="modal hide" id='modal_success' style='display:flex;'>
		<div class="modal_content">
			<div class="modal_header">
				<img src="<?= base_url("imgs/success_icon.svg") ?>" alt="Modal Header Image">
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
</div>


<script>
	$(document).ready(function() {
		console.log("ready!");
		$("#datepicker1").datepicker();
		$("#datepicker2").datepicker();
	});

	let ENDPOINT = window.API_URL;

	formData = new FormData();

	function preview() {
		let obj_length = fileInput.files.length
		let input = event.target
		let html = upload_imgs.innerHTML
		for (let i = 0; i < obj_length; i++) {
			formData.append('file', input.files[i]);
			// console.log('formData', formData)
			let src = URL.createObjectURL(event.target.files[i]);
			html += `<div>
							<img class='img-width' src="${src}" alt="">
					</div>`
		}
		upload_imgs.innerHTML = html
		upload_imgs.classList.remove('close')
		hideupload();
	}

	function uploadpic() {
		console.log(`$('#fileInput').click()`);
		$('#fileInput').click()

	}

	function sendreq() {
		let allday = $('#allday').prop('checked');
		let datestart = $('#datepicker1').val();
		let dateend = $('#datepicker2').val();
		let timestart = $('#timepicker1').val();
		let timeend = $('#timepicker2').val();
		let about = $('#text_area_about').val();
		let token = "<?= esc($token); ?>"

		if (dateend == null || dateend == "") {
			dateend = datestart;
		}
		if (allday == true) {
			timestart = <?= esc($timein); ?> + ":00";
			timeend = <?= esc($timeout); ?> + ":00";

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

		//leave type
		formData.append('token', token);
		formData.append('request_type', "offsite_work");
		formData.append('date', date);
		formData.append('timestart', datetimeStart);
		formData.append('timeend', datetimeEnd);
		formData.append('reason', about);
		formData.append('offsite_work_type', '-');
		formData.append('l_id', document.getElementById('offsite_req').value);
		formData.append('allday', allday);

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
					console.log(2)
					model_try_again('มีบางอย่างทำการผิดพลาด')

				}
			})
			.catch(error => {
				console.log(3)
				console.log(error)

			});

	}

	function allday() {
		const allday = $('#allday').prop('checked');

		if (allday) {
			$('#datebox2').removeClass('hide');
			$('#timebox').addClass('hide');

		} else {
			$('#datebox2').addClass('hide');
			$('#timebox').removeClass('hide');
		}
	}

	function closeselector() {
		$('.custom-select').removeAttr('open', '');

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
	render_offsite_list()
	let LEAVE_DATA = ''

	async function render_offsite_list() {
		let headersList = {
			"Accept": "*/*",
			"Content-Type": "application/json"
		}

		let bodyContent = JSON.stringify({
			"token": "<?php echo $_SESSION['token'] ?>"
		});

		let response = await fetch(ENDPOINT + "mobile/GET-OFFSITE", {
			method: "POST",
			body: bodyContent,
			headers: headersList
		});

		let data = await response.json();
		let html = `<option value="">Please Select</option>`
		data.data.forEach(e => {
			html += `<option value="${e.l_id}">${e.name_en}</option>`
		});
		document.getElementById('offsite_req').innerHTML = html
		LEAVE_DATA = data.data
	}
</script>