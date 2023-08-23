<link rel="stylesheet" href="./css/global.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<?php echo "<script src='".base_url('./backoffice_static/config.js')."'></script>"; ?>
<style>
    .greybc {
        width: 100%;
        height: 50px;
        display: flex;
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
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

<body>
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
                    Edit Profile
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

        <!-- <div id='otherprefixbox' class="col1 greybc hide">
        <input id='therprefix' type="text">
    </div> -->


        <span class="mt-4 block text-gray-700 font-bold mb-2">First Name</span>
        <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
            <input id='fname' type="text">
        </div>

        <span class="block text-gray-700 font-bold mb-2">Last Name</span>
        <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
            <input id='lastname' type="text">
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

        <span class="mt-4 block text-gray-700 font-bold mb-2">ID CARD Number</span>
        <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
            <input id="id_card" disabled type="text">
        </div>
        <span class="mt-4 block text-gray-700 font-bold mb-2">ID Passports</span>
        <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
            <input id="passport_id" disabled value="-" type="text">
        </div>
        <label class="block text-gray-700 font-bold mb-2" for="birthday">
            Hire Date
        </label>
        <input disabled class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="hire_date" type="date" placeholder="YYYY-MM-DD" value="{{ old('birthday') ? date('Y-m-d', strtotime(old('birthday'))) : '' }}" />

        <span class="block text-gray-700 font-bold mb-2 mt-4">Email</span>
        <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
            <input id='Email' disabled type="email">
        </div>
        <span class="block text-gray-700 font-bold mb-2 mt-4 ">Tel</span>
        <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
            <input id='tel' type="text">
        </div>
        <div class='breakline'></div>
        <div style="display: grid;grid-template-columns: 50% 50%;">
            <div class="w-full mb-3">
                <label for="category" class="block text-gray-700 font-bold mb-2">Company:</label>
                <div>
                    <select id="company_list" disabled name="title_name" class="block appearance-none bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                        <option value="0" disabled selected>select</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M14.95 6.95l-3.586 3.586L10 12.586l4-4V3h1.95v3.95zM5.05 13.05l3.586-3.586L10 7.414l-4 4v3H5.05v-3.95z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="w-full mb-3">
                <label for="category" class="block text-gray-700 font-bold mb-2">Role:</label>
                <div>
                    <select id="role" disabled name="title_name" class="block appearance-none bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
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
            </div>
            <div class="w-full mb-3">
                <label for="category" class="block text-gray-700 font-bold mb-2">Department:</label>
                <div>
                    <select id="department" name="department" disabled class="block appearance-none bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                        <option value="0" disabled selected>select</option>
                        <!-- <option value="manager">Manager</option>
                    <option value="user">User</option> -->
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
                    <select id="supervisor" disabled name="supervisor" class="block appearance-none bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline max-w-[120px]">
                        <option value="0" disabled selected>no supervisor</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M14.95 6.95l-3.586 3.586L10 12.586l4-4V3h1.95v3.95zM5.05 13.05l3.586-3.586L10 7.414l-4 4v3H5.05v-3.95z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <span class="block text-gray-700 font-bold mb-2 mt-4">Job Position</span>
        <input id='job_position' disabled class="w-full px-3 py-2 border border-gray-400 rounded-md appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" type="text">
        <span class="block text-gray-700 font-bold mb-2 mt-4">Bank account</span>
        <input id='bank_account' disabled class="w-full px-3 py-2 border border-gray-400 rounded-md appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" type="text">
        <span class="block text-gray-700 font-bold mb-2 mt-4 ">Salary</span>
        <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
            <input id='salary' value="" disabled type="password">
        </div>
        <!-- <div class="col1 greybc">
            <input id='bank_account' c type="text">
        </div> -->
        <!-- Shift Start Time -->
        <label class="block text-gray-700 font-bold mb-2 mt-4" for="shift_start_time">
            Shift Start Time:
        </label>
        <input disabled class="w-full px-3 py-2 border border-gray-400 rounded-md appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" value="" type="time" id="shift_start_time" name="shift_start_time" placeholder="HH:mm" required>

        <!-- Shift End Time -->
        <label class="block text-gray-700 font-bold mb-2 mt-4" for="shift_end_time">
            Shift End Time:
        </label>
        <input disabled class="w-full px-3 py-2 border border-gray-400 rounded-md appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" value="" type="time" id="shift_end_time" name="shift_end_time" placeholder="HH:mm" required>
        <div class='breakline'></div>
        <!-- <span class="block text-gray-700 font-bold mb-2 mt-4 ">Vacation leave max</span>
        <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
            <input id='annual_vacation_leave_max' disabled value="0" type="number">
        </div>
        <span class="block text-gray-700 font-bold mb-2 mt-4 ">Sick max</span>
        <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
            <input id='sick_max' value="0" disabled type="number">
        </div>
        <span class="block text-gray-700 font-bold mb-2 mt-4 ">Business leave max</span>
        <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
            <input id='business_leave_max' value="0" disabled type="number">
        </div>
        <span class="block text-gray-700 font-bold mb-2 mt-4 ">Maternity leave max</span>
        <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
            <input id='maternity_leave_max' value="0" disabled type="number">
        </div> -->
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
    <footer>
        <div class='btn' onclick="document.getElementById('modal_addemp').classList.remove('hidden')">Update Profile</div>
        <!-- <a onclick="<?= $url1 ?>" class="btn">Confirm</a> -->
    </footer>
    <!-- Overlay modal edit profile -->
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
                        <button onclick="document.getElementById('modal_addemp').classList.add('hidden')" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded mr-2" id="">
                            Cancel
                        </button>
                        <button onclick="update_myprofile()" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded" id="">
                            Confirm
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    let ENDPOINT = window.API_URL;

    async function update_myprofile() {
        try {
            let title_name = _$('title_name').value
            let fname = _$('fname').value
            let lname = _$('lastname').value
            let birthday = _$('birthday').value
            let img_profile = isBase64Img(_$('profile-img-preview').src) ? _$('profile-img-preview').src : ''
            let tel = _$('tel').value
            if (tel.length < 10) {
                console.log(tel, 'less')
                my_alert('wrong', true)
                return
            }
            if (gender && title_name && fname && lname && birthday) {
                let headersList = {
                    "Accept": "*/*",
                    "Content-Type": "application/json"
                }

                let bodyContent = JSON.stringify({
                    "token": '<?php echo $_SESSION['token'] ?>',
                    "prefix": title_name,
                    "fname": fname,
                    "lname": lname,
                    "date_of_birth": birthday,
                    "contact_info": tel,
                    "gender": gender,
                    "img_profile": img_profile
                });

                let response = await fetch(ENDPOINT + "mobile/update/edit-profile", {
                    method: "POST",
                    body: bodyContent,
                    headers: headersList
                });

                let data = await response.json();
                let msg = data.msg
                if (msg === 'good') {
                    location.reload()
                } else {
                    my_alert('wrong', true)
                }
                console.log(data);
            }
        } catch (error) {
            console.log(error)
            my_alert('wrong', true)
        }
    }

    async function render_myprofile() {
        try {
            document.querySelector(".loader-wrapper").classList.add("active");
            let headersList = {
                "Accept": "*/*",
                "Content-Type": "application/json"
            }
            let bodyContent = JSON.stringify({
                "token": '<?php echo $_SESSION['token'] ?>'
            });
            let response = await fetch(ENDPOINT + "mobile/my/profile", {
                method: "POST",
                body: bodyContent,
                headers: headersList
            });

            let data = await response.json();
            let employee = await data.employee
            let job_info = await data.job_info
            let leave_count = await data.leave_count
            let role = await data.role
            let private_info = await data.private_info
            if (data.msg === 'good') {
                await render_department()
                await render_my_under()
                console.log('render my profile ok')
                _$('title_name').value = employee.prefix ? employee.prefix : ''
                _$('fname').value = employee.fname ? employee.fname : ''
                _$('lastname').value = employee.lname ? employee.lname : ''
                _$('birthday').value = employee.date_of_birth ? employee.date_of_birth : ''
                _$('id_card').value = employee.id_card ? employee.id_card : ''
                console.log(employee.date_of_birth)
                let gender_res = employee.gender ? employee.gender : ''
                _$('hire_date').value = employee.hire_date ? employee.hire_date : ''
                _$('Email').value = job_info.email ? job_info.email : ''
                _$('tel').value = employee.contact_info ? employee.contact_info : ''
                _$('passport_id').value = employee.passport_id ? employee.passport_id : ''
                _$('profile-img-preview').src = employee.img_profile ? employee.img_profile : "<?= base_url('imgs/Mask1.svg') ?>"
                _$('department').value = job_info.departments_id
                _$('supervisor').value = job_info.under_emid
                _$('job_position').value = job_info.job_title
                if (gender_res === "male") {
                    _$('gen1').onclick()
                } else if (gender_res === "female") {
                    _$('gen2').onclick()
                }
                _$('role').value = role
                _$('bank_account').value = private_info.bank_account
                _$('salary').value = private_info.salary
                let shift = job_info.shift.split('-')
                console.log(shift)
                _$('shift_start_time').value = shift[0]
                _$('shift_end_time').value = shift[1]

                // _$('shift_start_time').value = 
                document.querySelector(".loader-wrapper").classList.remove("active");
            } else {
                document.querySelector(".loader-wrapper").classList.remove("active");
                my_alert('wrong', true)
            }
        } catch (error) {
            document.querySelector(".loader-wrapper").classList.remove("active");
            console.log(error)
            my_alert('wrong', true)
        }
    }
    render_myprofile()
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
                console.log(html)
            });
            supervisor.innerHTML = html
        }


    }

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
    let _$ = (id) => document.getElementById(id)
    let q$ = (id) => document.querySelector(id)
    let prefixname = '';
    let gender = 'male';
    $(document).ready(function() {
        console.log("ready!");
        $("#DoB").datepicker();
    });

    function genderpick(params) {
        $('.btn_select_blue').removeClass('btn_active');
        // console.log('this id ==',params);
        $('#' + params).addClass('btn_active');
        if (params == 'gen1') {
            gender = 'male';
        } else if (params == 'gen2') {
            gender = 'female';
        }
        console.log('gender  = ', gender);
    }
    let img_base64_global = ''

    function previewProfileImage() {
        var preview = document.getElementById('profile-img-preview');
        var file = document.getElementById('profile-image').files[0]
        // console.log(event.target.files[0])
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
    let f_img = document.getElementById('profile-img-preview')

    function getImageSrcToBase64(imageElement) {
        let preview = document.getElementById('profile-img-preview');
        const canvas = document.createElement('canvas');
        const ctx = canvas.getContext('2d');

        // Set the canvas dimensions to match the image
        canvas.width = imageElement.width;
        canvas.height = imageElement.height;

        // Draw the image onto the canvas
        ctx.drawImage(imageElement, 0, 0);
        var quality = 0.9;
        var targetSize = 40 * 1024;
        while (canvas.toDataURL('image/jpeg', quality).length > targetSize) {
            quality -= 0.05;
        }
        var compressedImage = canvas.toDataURL('image/jpeg', quality);
        // Set the preview image source to the compressed image
        preview.src = compressedImage;
        img_base64_global = compressedImage;

        return img_base64_global;
    }

    function isBase64Img(base64String) {
        // Remove data URL prefix (e.g., "data:image/png;base64,")
        const base64Data = base64String.replace(/^data:image\/(png|jpeg|jpg);base64,/, '');

        // Create a regular expression pattern to match valid base64 characters
        const base64Pattern = /^[A-Za-z0-9+/=]+$/;

        // Check if the string is a valid base64 image
        return base64Pattern.test(base64Data);
    }

    async function render_department() {
        try {
            let headersList = {
                "Accept": "*/*",
                "Content-Type": "application/json"
            }
            let bodyContent = JSON.stringify({
                "token": '<?php echo $_SESSION['token'] ?>'
            });
            let response = await fetch(ENDPOINT + "mobile/get/v2/department/all", {
                method: "POST",
                body: bodyContent,
                headers: headersList
            });
            let data = await response.json();
            html = `<option value="0" disabled selected>select</option>`
            console.log(data)
            let msg = data.msg
            let department = data.departments
            if (msg === "good") {
                department.forEach(e => {
                    html += `<option value="${e.id}">${e.dpname}</option>`
                    console.log(e)
                });
            }
            document.getElementById('department').innerHTML = html
            console.log(data);
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

        let response = await fetch(ENDPOINT + "mobile/my_company", {
            method: "POST",
            body: bodyContent,
            headers: headersList
        });
        
        let data = await response.json();
        let company = data.company
        html = ``
        company.forEach(e => {
            html += `<option value="${e.com_id}">${e.com_name}</option>`
        });
        _$('company_list').innerHTML = html
    }
    render_company()

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
        const pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return pattern.test(email);
    }
</script>