<link rel="stylesheet" href="./css/global.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<?php echo "<script src='".base_url('./backoffice_static/config.js')."'></script>"; ?>
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

    .content_bank {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        height: auto;
    }

    .content_bank_choice #choice_banks {
        padding: 5px 0;
    }

    .content_bank_choice {
        position: absolute;
        padding: 10px 10px;
        display: none;
        width: 100%;
        height: auto;
        background-color: #fff;
        box-shadow: 0 0 3px rgba(73, 25, 25, 0.2);
        border-radius: 5px;
        margin-top: 10px;
        font-size: 14px;

    }

    .menu_bank_selector {
        list-style: none;
        background-color: #fff;
        display: flex;
        align-items: center;
        justify-content: space-between;
        outline: 1px solid rgb(0, 0, 0, 0.2);
        border-radius: 5px;
        width: 100%;
        padding: 10px 10px;
        font-size: 14px;
    }

    .container_bank {
        width: 100%;
        display: inline-block;
        position: relative;
    }
</style>
<style>
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
                    <select id="department" name="department" class="block appearance-none bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline w-36">
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
                <label for="category" class="block text-gray-700 font-bold mb-2">Rank*:</label>
                <div>
                    <select id="rank" class="block appearance-none bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline max-w-[120px]">
                        <option value="0" disabled selected>please select</option>
                        <option value="part_time">part time</option>
                        <option value="temporary">temporary</option>
                        <option value="officer">officer</option>
                        <option value="manager">manager</option>
                        <option value="manager">supervisor</option>
                        <option value="manager">Director</option>
                        <option value="manager">CEO</option>
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
            <div id='Manpower_Type1' class="btn_select_blue btn_active me-3">
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
            <div id='bank_payment' class="btn_select_blue btn_active me-3">
                Bank
            </div>
            <div id='cash_payment' class="btn_select_blue">
                Cash
            </div>
        </div>
        <span class="block text-gray-700 font-bold mb-2 mt-4">Bank Account</span>
        <div id="container_bank" class="container_bank">
            <div class="menu_bank_selector">
                <div class="content_bank" id="content_bank">
                    <div id="img_bank"><img></div>
                    <div id="name_bank"><span style="color:grey">กรุณาเลือก</span></div>
                </div>
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAgAAAAIACAMAAADDpiTIAAAAA3NCSVQICAjb4U/gAAAACXBIWXMAABcpAAAXKQE1kMoEAAAAGXRFWHRTb2Z0d2FyZQB3d3cuaW5rc2NhcGUub3Jnm+48GgAAADNQTFRF////AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA8YBMDAAAABB0Uk5TAAIDLWKTnJ6foKGio6Tq/nVX6LcAAATnSURBVHja7dKLEQEBFARB53ccx8s/WlFQqqY3hO05HOy7O18XJ5T937MqIO0/Coj7K6Dur4C6vwLq/gqo+yug7q+Auv/MTQFpfwXU/RVQ91dA3V8BdX8F1P0VUPdXQN1/5q6AtL8C6v4KqPsroO6vgLq/Aur+Cqj7K6Dur4C6/8ymgLS/Aur+Cqj7K6Dur4C6vwLq/gqo+yug7q+Auv/MQwFpfwXU/RVQ91dA3V8BdX8F1P0VUPdXQN1/5qmAtL8C6v4KqPsroO6vgLq/Aur+Cqj7K6Dur4C6/8yugLT/zH50d9lfAXV/BdT9FVD3V0DdXwF1/5mL59P+r5Pr+Rt/42/8jb/xN/7G3/gbf+Nv/I2/8Tf+xt/4G3/jb/yNv/E3/sbf+Bt/42/8jb/xN/7G3/gbf/78+fPnz58/f/78+fPnz58/f/78+fPnz58/f/78+fPnz58/f/78+fPnz58/f/78+fPnz58/f/78+fPnz58/f/78+fPnb/yNv/E3/sbf+Bt/42/8jb/xN/7G3/gbf+Nv/I2/8Tf+xt/4G3/jb/yNv/E3/sbf+Bt/42/8+fPnz58/f/78+fPnz58/f/78+fPnz58/f/78+fPnz58/f/78+fPnz58/f/78+fPnz58/f/78+fPnz58/f/78+fPnz5+/6/kbf+Nv/I2/8Tf+xt/4G3/jb/yNv/E3/sbf+Bt/42/8jb/xN/7G3/gbf+Nv/I2/8Tf+xt/4G3/+/Pnz58+fP3/+/Pnz58+fP3/+/Pnz58+fP3/+/Pnz58+fP3/+/Pnz58+fP3/+/Pnz58+fP3/+/Pnz58+fP3/+/Pnz52/8TQCmAFOAKcAUYAowBZgCTAGmAFOAKcAUYAowBZgCTAGmAFOAKcAUYAowBZgCTAGmAFOAKcAUYAowBZgCTAGmAFOAKcAUYAowBZgCTAGmAFOAKcAUYAowBZgCTAGmAFOAKcAUYAowBZgCTAGmAFOAKcAUYAowBZgCTAEKUIACFKAABShAAQpQgAIUoAAFKEABClCAAhSgAAUoQAEKUIACFKAABShAAQpQgAIUoAAFKEABClCAAhSgAAUoQAEKUIACFKAABShAAQpQgAIUoAAFKEABClCAAhSgAAUoQAEKUIACFKAABShAAQpQgAIUoAAFKEABClCAAhSgAAUoQAEKUIACFKAABShAAQpQgAIUoAAFKEABClCAAhSgAAUoQAEKMAWYAkwBpgBTgCnAFGAKMAWYAkwBpgBTgCnAFGAKMAWYAkwBpgBTgCnAFGAKMAWYAkwBpgBTgCnAFGAKMAWYAkwBpgBTgCnAFGAKMAWYAkwBpgBTgCnAFGAKMAWYAkwBpgBTgCnAFGAKMAWYAkwBpgBTgCnAFGAKMAWYAkwBpgAFKEABClDAz3fxfLqA/ej4cgH82wXwbxfAv10A/3YB/NsF7IuzywU8+acL4N8ugH+7AP7tAvi3C+DfLoB/uwD+7QL4twt48E8XwL9dAP92AfzbBfBvF8C/XQD/dgH82wVs/NMF8G8XwL9dAP92AfzbBfBvF8C/XQD/dgH82wXc+acL4N8ugH+7AP7tAvi3C+DfLoB/uwD+7QL4twu48U8XwL9dAP92AfzbBfBvF8C/XQD/dgH82wWs/NMF8G8XwL9dAP92AfzbBfBvF8C/XQD/dgHXv/b/AM2vK2qD/TR9AAAAAElFTkSuQmCC" alt='icon' style="width:10px;height:10px" id="imgarrowbank">
            </div>
            <div id="content_bank_choice" class="content_bank_choice">
            </div>
        </div>
        <!-- <input id='bank_account_name' class="w-full px-3 py-2 border border-gray-400 rounded-md appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" type="text"> -->
        <span class="block text-gray-700 font-bold mb-2 mt-4">Bank Account No.</span>
        <input id='bank_account' class="w-full px-3 py-2 border border-gray-400 rounded-md appearance-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" type="text">
        <span class="block text-gray-700 font-bold mb-2 mt-4 ">Salary</span>
        <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
            <input id='salary' value="9000" type="number">
        </div>
        <div class='breakline'></div>
        <span class="hidden text-gray-700 font-bold mb-2 mt-4 ">Vacation leave max</span>
        <div class="hidden">
            <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
                <input id='annual_vacation_leave_max' value="6" type="number">
            </div>
        </div>
        <span class="hidden text-gray-700 font-bold mb-2 mt-4 ">Sick max</span>
        <div class="hidden">
            <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
                <input id='sick_max' value="30" type="number">
            </div>
        </div>
        <span class="hidden text-gray-700 font-bold mb-2 mt-4 ">Business leave max</span>
        <div class="hidden">
            <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
                <input id='business_leave_max' value="3" type="number">
            </div>
        </div>
        <span class="hidden text-gray-700 font-bold mb-2 mt-4 ">Maternity leave max</span>
        <div class="hidden">
            <div class="col1 w-full px-3 py-2 border border-gray-400 rounded-md appearance-none hover:outline-none hover:ring-2 hover:ring-blue-500 hover:border-transparent">
                <input id='maternity_leave_max' value="30" type="number">
            </div>
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
    <footer>
        <!-- main function -->
        <div class='btn' onclick="document.getElementById('modal_addemp').classList.remove('hidden')">Confirm</div>
        <!-- test -->
        <!-- <div class='btn' onclick="add_emp_test()">Confirm</div> -->
        <!-- <a onclick="<?= $url1 ?>" class="btn">Confirm</a> -->
    </footer>
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
                        <button onclick="add_emp()" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded" id="">
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

    let bank_select = null;
    let emp_payment = 'bank'
    document.getElementById('bank_payment').click()
    document.getElementById('bank_payment').addEventListener("click", () => {
        document.getElementById('bank_payment').classList.add('btn_active')
        document.getElementById('cash_payment').classList.remove('btn_active')
        emp_payment = 'bank'
        // console.log(emp_payment)
    })
    document.getElementById('cash_payment').addEventListener("click", () => {
        document.getElementById('cash_payment').classList.add('btn_active')
        document.getElementById('bank_payment').classList.remove('btn_active')
        emp_payment = 'cash'
        // console.log(emp_payment)
    })
    document.getElementById('type1').click()
    let type_person_global = 'thai'
    document.getElementById('type1').addEventListener("click", () => {
        document.getElementById('type1').classList.add('btn_active')
        document.getElementById('type2').classList.remove('btn_active')
        document.getElementById('swap_type1').style.display = 'block'
        document.getElementById('swap_type2').style.display = 'none'
        type_person_global = "thai"
        // console.log(type_person_global)
    })
    document.getElementById('type2').addEventListener("click", () => {
        document.getElementById('type2').classList.add('btn_active')
        document.getElementById('type1').classList.remove('btn_active')
        document.getElementById('swap_type1').style.display = 'none'
        document.getElementById('swap_type2').style.display = 'block'
        type_person_global = "foreigner"
        // console.log(type_person_global)
    })
    let manpower_type = 'new'
    document.getElementById('Manpower_Type1').addEventListener("click", () => {
        document.getElementById('Manpower_Type1').classList.add('btn_active')
        document.getElementById('Manpower_Type2').classList.remove('btn_active')
        manpower_type = 'new'
        // console.log(manpower_type)
    })
    document.getElementById('Manpower_Type2').addEventListener("click", () => {
        document.getElementById('Manpower_Type2').classList.add('btn_active')
        document.getElementById('Manpower_Type1').classList.remove('btn_active')
        manpower_type = 'replace'
        // console.log(manpower_type)
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
            // <select id="department" name="department" class="block appearance-none bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
            //                 <option value="0" disabled selected>no supervisor</option>
            //             </select>
            let html = `<option value="0" selected>no supervisor</option>`
            em.forEach(e => {
                html += `<option value="${e.eid}">${e.fname +" : "+e.job_title}</option>`
                // console.log(html)
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
            show ? document.getElementById('del_modal').classList.remove('hidden') : document.getElementById('del_modal')
                .classList.add('hidden')
        }
    }
    var _$ = (id) => document.getElementById(id)
    var q$ = (id) => document.querySelector(id)
    let prefixname = '';
    let gender = 'male';
    $(document).ready(function() {
        // console.log("ready!");
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
        // console.log('gender  = ', gender);
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
        // console.log(company)
        html = ``
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
    async function add_emp() {
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
        let bank_account_name = bank_select

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
            position

        ) {
            try {
                let headersList = {
                    "Accept": "*/*",
                    "Content-Type": "application/json"
                }
                let bodyContent = JSON.stringify({
                    "token": '<?php echo $_SESSION['token'] ?>',
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
                    "bank_account_no": bank_account,
                    "bank_account": bank_account_name,
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
                    obj_detail
                });
                let response = await fetch(ENDPOINT + "mobile/add/employee", {
                    method: "POST",
                    body: bodyContent,
                    headers: headersList
                });
                let data = await response.json();
                let msg = data.msg
                if (msg === "good") {
                    location.reload()
                }
                // console.log(data);
            } catch (error) {
                console.log(error)
                my_alert('wrong', true)
            }
        } else {
            my_alert('wrong', true)
        }
    }

    async function getAPIlist_bank() {
        let headersList = {
            Accept: "*/*",
            "Content-Type": "application/json",
        };

        let bodyContent = JSON.stringify({});

        let response = await fetch(ENDPOINT + "mobile/test_list_bank", {
            method: "POST",
            body: bodyContent,
            headers: headersList,
        });

        let dataA = await response.json();
        const dataobj = dataA.data;

        const bank_list = document.getElementById("content_bank_choice")
        for (let i = 0; i < dataobj.length; i++) {
            const create_list = document.createElement("div")
            create_list.id = 'choice_banks'
            create_list.innerHTML =
                "<div id='img_bank_choice' style='display:flex;align-items:center;justify-content:center;'><img src='data:image/png;base64," +
                dataobj[i].img + "' alt='logo_'" + i +
                " style='width:20px;height:20px;border-radius:50%;margin-right: 5px;'></div><div id='name_bank_chocice' style='display:flex;align-items:center;justify-content:center;'><span style='padding-bottom:2px;'>" +
                dataobj[i].optionname + "</span></div>"
            create_list.style.cssText = 'display:flex;align-items:center;justify-content:flex-start;height:auto;'
            bank_list.appendChild(create_list)

        }
        let checkOpenMenu = true;
        //select choice
        const getChoice = document.querySelectorAll("#choice_banks")
        getChoice.forEach(element => {

            element.addEventListener('click', () => {
                const getContent = document.getElementById('content_bank')
                const spanElement = document.querySelector('#content_bank #name_bank_chocice');
                checkOpenMenu == true ? checkOpenMenu = false : checkOpenMenu = true;

                getContent.innerHTML = element.innerHTML
                bank_list.style.display = 'none'

                const spanInNameBank = document.querySelector('#content_bank span');
                const textSend = spanInNameBank.textContent
                bank_select = textSend

                getnamemenu.style.cssText = 'outline: 1px solid rgb(0,0,0,0.2);'
                // console.log("change to : "+)
            })

        });

        //open_menu

        const getnamemenu = document.getElementsByClassName("menu_bank_selector")[0]
        const arrowSelect = document.getElementById('imgarrowbank');
        getnamemenu.addEventListener('click', () => {
            checkOpenMenu == true ? checkOpenMenu = false : checkOpenMenu = true;
            bank_list.style.display == 'block' ?
                bank_list.style.display = 'none' :
                bank_list.style.display = 'block';
            if (checkOpenMenu == true) {
                arrowSelect.style.cssText =
                    'transform: rotate(0deg);  transition: transform 0.1s; width:10px; height:10px;'
                getnamemenu.style.cssText = 'outline: 1px solid rgb(0,0,0,0.2);'
            } else {
                arrowSelect.style.cssText =
                    'transform: rotate(-90deg);  transition: transform 0.1s; position:relative;left:-1px;width:10px; height:10px;';
                getnamemenu.style.cssText = 'outline: 1px solid #0033F7;';
            }

        })


    }
    getAPIlist_bank();
    console.log("เลืิอก : " + bank_select)

    async function getRank() {
        try {
            let headersList = {
                "Accept": "*/*",
                "Content-Type": "application/json"
            }

            let bodyContent = JSON.stringify({
                "token": "<?php echo $_SESSION['token']; ?>"
            });

            let response = await fetch(ENDPOINT + "mobile/Get-Sequence-Rank", {
                method: "POST",
                body: bodyContent,
                headers: headersList
            });
            let data = await response.json();
            if (data.msg === 'good') {
                data = data.data
                // console.log('dom', data);
                let html = ` <option value="0" disabled selected>please select</option>`
                RANK_DATA = data
                data.forEach(e => {
                    html += `<option value="${e.rank_id}">${e.name_r}</option>`
                })
                document.getElementById('rank').innerHTML = html
                get_position()
            }
        } catch (error) {
            console.log(error)
            alert('err')
        }

    }
    let POSITION_DATA;
    let RANK_DATA;
    getRank()
    async function get_position() {
        try {
            let headersList = {
                "Accept": "*/*",
                "Content-Type": "application/json"
            }
            let bodyContent = JSON.stringify({
                "token": "<?php echo $_SESSION['token']; ?>"

            });
            let response = await fetch(ENDPOINT + "mobile/Get-Sequence-Position", {
                method: "POST",
                body: bodyContent,
                headers: headersList
            });

            let data = await response.json();
            console.log('xxxddd',data);
            let list = data.dataSend
            if (data.msg === 'good') {
                POSITION_DATA = list
                // console.log('dom', POSITION_DATA);
                // action_position(Input_rank.value)
            }

        } catch (error) {
            console.log(error)
            alert('err')
        }
    }

    function action_position(id) {
        console.log(1)
        let rank_position = RANK_DATA
        console.log(1)
        let a = RANK_DATA.filter(e => e.rank_id === parseInt(id))
        a = a[0]
        console.log(1)
        console.log('a', a)
        console.log(1)
        console.log('aaa',a.level)
        POSITION_DATA.filter(e => a.rank_id >= e.rank_id_to && a.rank_id <= e.rank_id_from && e.status === 'active')
        console.log(2)
    }
    let Input_rank = document.getElementById('rank')
    Input_rank.addEventListener('change', () => {
        action_position(Input_rank.value)
    })
</script>