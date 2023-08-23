<link rel="stylesheet" href="./css/global.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
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
		<div class='line1'></div>
		<div class="imgbox">
			<img src="<?= base_url('imgs/profile.png') ?>" alt="image">
			<span>Person 1</span>
		</div>
	</div>

	<div class="col1">
		<div class="subcol1">
			<details class="custom-select">
				<summary class="radios">
					<input type="radio" name="item" id="item1" title="Vacational Leave" checked value="vacational" onchange="checkleave()">
					<input type="radio" name="item" id="item2" title="Business Leave" value="business" onchange="checkleave()">
					<input type="radio" name="item" id="item3" title="Business Leave(without pay)" value="business withoutpay" onchange="checkleave()">
					<input type="radio" name="item" id="item4" title="Sick Leave" value="sick" onchange="checkleave()">
					<input type="radio" name="item" id="item5" title="Sick Leave(without pay)" value="sick withoutpay" onchange="checkleave()">
					<input type="radio" name="item" id="item6" title="Maternity Leave" value="maternity" onchange="checkleave()">
					<input type="radio" name="item" id="item7" title="Maternity Leave(without pay)" value="maternity withoutpay" onchange="checkleave()">
				</summary>
				<ul class="list">
					<li>
						<label for="item1">Vacational Leave</label>
					</li>
					<li>
						<label for="item2">Business Leave</label>
					</li>
					<li>
						<label for="item3">Business Leave(without pay)</label>
					</li>
					<li>
						<label for="item4">Sick Leave</label>
					</li>
					<li>
						<label for="item5">Sick Leave(without pay)</label>
					</li>
					<li>
						<label for="item6">Maternity Leave</label>
					</li>
					<li>
						<label for="item7">Maternity Leave(without pay)</label>
					</li>
				</ul>
			</details>
			<span class="fs-12px txt01 ">
				Remaining leave Benefit
				<span class="fs-12px txtcolor01" id='leave_remain'>2 day</span>
			</span>
		</div>
	</div>

	<div class="col1 fs-14px txt2">
		<div class="subcol2">
			<div class="check-box">
				<input type="checkbox" id="allday">
			</div>
			<span class="allday" for='allday'> All day</span>
		</div>
	</div>

	<div class="col1 greybc">
		<img src="<?= base_url('imgs/calendar_icon.png') ?>" alt="" for='datepicker1'>
		<!-- Select date -->
		<input type="text" id="datepicker1" class="datepicker" name="datepicker" placeholder="Select date">
	</div>

	<div class="col1 timebigbox">
		<div class='timebox'>
			<!-- <img src="<?= base_url('imgs/time.png') ?>" alt=""> -->
			<input type="time" id="timepicker1" class="timepicker" name="timepicker" placeholder="Select time" value="09:00">
		</div>
		<div class='timebox'>
			<!-- <img src="<?= base_url('imgs/time.png') ?>" alt=""> -->
			<input type="time" id="timepicker2" class="timepicker" name="timepicker" placeholder="Select time" value="13:00">
		</div>
	</div>

	<div class='col1'>
		<div class="subcol1">
			<div class="doc-text">
				About
			</div>
			<textarea style="width: 100%;height: 100px; border: 1px solid #C7C9D9; border-radius: 8px;" name="" id="text_area_about" cols="30" rows="10"></textarea>
		</div>
	</div>

	<div class='col1'>
		<div class="subcol1">
			<div class="doc-text">
				Cover photo
			</div>
			<div style="width: 100%; border: 2px dashed #C7C9D9;height: 100px; border-radius: 8px;">

			</div>
		</div>
	</div>
</div>

<footer>
	<div class='btn' onclick="<?= $url1 ?>">Confirm</div>
</footer>

<script>
	let ENDPOINT = window.API_URL;

	$(document).ready(function() {
		console.log("ready!");
		$("#datepicker1").datepicker();
	});

	function checkleave() {
		const leavetype = document.querySelector('.custom-select').querySelector('input[name="item"]:checked').value;
		let vacational = <?= esc($leave_vacation); ?>;
		let business = <?= esc($leave_business); ?>;
		let sick = <?= esc($leave_sick); ?>;
		let maternity = <?= esc($leave_maternity); ?>;

		if (leavetype == 'vacational') {
			$('#leave_remain').text(vacational + ' days')
		} else if (leavetype == 'business') {
			$('#leave_remain').text(business + ' days')
		} else if (leavetype == 'sick') {
			$('#leave_remain').text(sick + ' days')

		} else if (leavetype == 'maternity') {
			$('#leave_remain').text(maternity + ' days')

		} else if (leavetype == 'business withoutpay' || leavetype == 'maternity withoutpay' || leavetype == 'sick withoutpay') {
			$('#leave_remain').text('0 days')

		}
	}

	function sendreq() {
		// Get the details element
		const leavetype = document.querySelector('.custom-select').querySelector('input[name="item"]:checked').value;
		const allday = $('#allday').prop('checked');
		const reqdate = $('#datepicker1').val();
		const timestart = $('#timepicker1').val();
		const timeend = $('#timepicker2').val();
		const about = $('#text_area_about').val();

		if (allday == false) {
			timestart = <?= esc($timein); ?>;
			timeend = <?= esc($timeout); ?>;

		}

		const data = {
			leavetype: leavetype,
			allday: allday,
			reqdate: reqdate,
			timestart: timestart,
			timeend: timeend,
			about: about,
			coverimg: 'cover img test'
		};
	}
</script>