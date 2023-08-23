<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <?php echo "<script src='".base_url('./backoffice_static/config.js')."'></script>"; ?>
</head>
<style>
    /* Hide the scrollbar */
    ::-webkit-scrollbar {
        display: none;
    }
</style>

<body class="p-3">
    <div class="w-full mb-3 mt-3">
        <label for="category" class="block text-gray-700 font-bold mb-2">company :</label>
        <div>
            <select id="list_com" onchange="on_company_change()" name="list_com" class="block appearance-none w-4/12 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                <option value="0" disabled="" selected="">select</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M14.95 6.95l-3.586 3.586L10 12.586l4-4V3h1.95v3.95zM5.05 13.05l3.586-3.586L10 7.414l-4 4v3H5.05v-3.95z"></path>
                </svg>
            </div>
        </div>
    </div>
    <div class="w-full rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto max-h-[80vh]">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Department Name</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody id="tbody_dpname" class="bg-white divide-y">
                    <tr class="text-gray-700">
                        <td class="px-4 py-3">1</td>
                        <td class="px-4 py-3">Sales</td>
                        <td class="px-4 py-3">
                            <button class="bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded">
                                Edit
                            </button>
                            <button class="bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded">
                                Delete
                            </button>
                        </td>
                    </tr>
                    <tr class="text-gray-700">
                        <td class="px-4 py-3">2</td>
                        <td class="px-4 py-3">Marketing</td>
                        <td class="px-4 py-3">
                            <button class="bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded">
                                Edit
                            </button>
                            <button class="bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded">
                                Delete
                            </button>
                        </td>
                    </tr>
                    <tr class="text-gray-700">
                        <td class="px-4 py-3">2</td>
                        <td class="px-4 py-3">Marketing</td>
                        <td class="px-4 py-3">
                            <button class="bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded">
                                Edit
                            </button>
                            <button class="bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded">
                                Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">
        <button onclick="open_overlay_department()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Add Department
        </button>
    </div>
    <!-- Modal tailwind delete-->
    <div id="del_modal" class="fixed z-10 inset-0 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen">
            <!-- Background overlay -->
            <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"></div>

            <!-- Modal box -->
            <div class="relative z-10 w-full max-w-sm p-6 bg-white rounded-md shadow-lg">
                <!-- Modal header -->
                <div class="mb-4 text-lg font-semibold">
                    Are you sure you want to delete this department?
                </div>

                <!-- Modal body -->
                <div class="mb-6">
                    <p class="text-sm text-gray-700">
                        This action cannot be undone.
                    </p>
                </div>

                <!-- Modal footer -->
                <div class="flex justify-end">
                    <button onclick="_$('del_modal').classList.add('hidden')" class="px-4 py-2 mr-2 text-white bg-blue-500 rounded hover:bg-blue-600">
                        Cancel
                    </button>
                    <button onclick="remove_departments()" class="px-4 py-2 text-white bg-red-500 rounded hover:bg-red-600">
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- overlay edit department -->
    <div id="edit_department" class="fixed z-10 inset-0 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen">
            <!-- Background overlay -->
            <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"></div>
            <!-- Modal box -->
            <div class="relative z-10 w-full max-w-sm p-6 bg-white rounded-md shadow-lg">
                <!-- Modal header -->
                <div class="mb-4 text-lg font-semibold">
                    Edit Department
                </div>
                <!-- Modal body -->
                <div class="mb-6">
                    <!-- Department Name Input -->
                    <label class="block mb-2 font-bold text-gray-700" for="department_name">
                        Department Name:
                    </label>
                    <input class="w-full px-3 py-2 border border-gray-400 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" type="text" id="department_name_edit" name="department_name" placeholder="Enter Department Name">
                    <label class="inline-flex items-center mt-4">
                        <input id="checked_com_edit" onclick="checked_com_edit2()" type="checkbox" class="form-checkbox h-5 w-5 text-blue-600">
                        <span class="ml-2 text-gray-700">at company</span>
                    </label>
                    <!-- Latitude Input -->
                    <label class="block mt-4 mb-2 font-bold text-gray-700" for="latitude">
                        Latitude:
                    </label>
                    <input class="w-full px-3 py-2 border border-gray-400 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" type="text" id="latitude_edit" name="latitude" placeholder="Enter Latitude">

                    <!-- Longitude Input -->
                    <label class="block mt-4 mb-2 font-bold text-gray-700" for="longitude">
                        Longitude:
                    </label>
                    <input class="w-full px-3 py-2 border border-gray-400 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" type="text" id="longitude_edit" name="longitude" placeholder="Enter Longitude">
                </div>

                <!-- Modal footer -->
                <div class="flex justify-end">
                    <button class="px-4 py-2 mr-2 text-white bg-gray-500 rounded hover:bg-gray-600" onclick="close_overlay_department_edit()">
                        Cancel
                    </button>
                    <button onclick="edit_department_confirm()" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">
                        Edit Department
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- overlay department -->
    <div id="add_department" class="fixed z-10 inset-0 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen">
            <!-- Background overlay -->
            <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"></div>

            <!-- Modal box -->
            <div class="relative z-10 w-full max-w-sm p-6 bg-white rounded-md shadow-lg">
                <!-- Modal header -->
                <div class="mb-4 text-lg font-semibold">
                    Add Department
                </div>

                <!-- Modal body -->
                <div class="mb-6">
                    <!-- Department Name Input -->
                    <label class="block mb-2 font-bold text-gray-700" for="department_name">
                        Department Name:
                    </label>
                    <input class="w-full px-3 py-2 border border-gray-400 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" type="text" id="department_name" name="department_name" placeholder="Enter Department Name">
                    <label class="inline-flex items-center mt-4">
                        <input id="checked_com" onclick="checked_com()" type="checkbox" class="form-checkbox h-5 w-5 text-blue-600">
                        <span class="ml-2 text-gray-700">at company</span>
                    </label>
                    <!-- Latitude Input -->
                    <label class="block mt-4 mb-2 font-bold text-gray-700" for="latitude">
                        Latitude:
                    </label>
                    <input class="w-full px-3 py-2 border border-gray-400 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" type="text" id="latitude" name="latitude" placeholder="Enter Latitude">

                    <!-- Longitude Input -->
                    <label class="block mt-4 mb-2 font-bold text-gray-700" for="longitude">
                        Longitude:
                    </label>
                    <input class="w-full px-3 py-2 border border-gray-400 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" type="text" id="longitude" name="longitude" placeholder="Enter Longitude">
                </div>

                <!-- Modal footer -->
                <div class="flex justify-end">
                    <button class="px-4 py-2 mr-2 text-white bg-gray-500 rounded hover:bg-gray-600" onclick="close_overlay_department()">
                        Cancel
                    </button>
                    <button onclick="add_department_confirm()" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">
                        Add Department
                    </button>
                </div>
            </div>
        </div>
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

</body>

</html>
<script>
    let ENDPOINT = window.API_URL;

    var _$ = (e) => document.getElementById(e);
    var q$ = (e) => document.querySelector(e);
    let com_id_global = 0;

    async function render_company() {
        document.querySelector(".loader-wrapper").classList.add("active");
        let headersList = {
            "Accept": "*/*",
            "User-Agent": "Thunder Client (https://www.thunderclient.com)",
            "Content-Type": "application/json"
        }

        let bodyContent = JSON.stringify({
            "token": '<?php echo $_SESSION['token']; ?>',
        });

        let response = await fetch(ENDPOINT + "mobile/listCompanyByAdmin", {
            method: "POST",
            body: bodyContent,
            headers: headersList
        });

        let data = await response.json();
        let company = await data.data

        html = `<option value="0" disabled="" selected="">select</option>`;

        if (company.length) {
            company.forEach((e, index) => {
                html += `
                <option value="${e.com_id}"selected="">${e.com_name}</option>
                `
                console.log(e)
            });
        }

        document.getElementById('list_com').innerHTML = await html;
        let department_op = document.getElementById('list_com').value
        com_id_global = department_op
        document.querySelector(".loader-wrapper").classList.remove("active");
        render_table()
    }
    render_company();

    async function open_edit_department(id, name, lat, long) {
        _$('edit_department').classList.remove('hidden')
        _$('department_name_edit').value = name
        _$('latitude_edit').value = lat
        _$('longitude_edit').value = long
        set_edit_value(id, name, lat, long)
        if (dp_name_global && lat_edit_global && long_edit_global) {
            console.log('set_edit_value :ok')
        } else {
            console.log('set_edit_value : bad')
        }
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

    function close_overlay_department() {
        document.getElementById('add_department').classList.add('hidden')
        clear_add_department()
    }

    function close_overlay_department_edit() {
        document.getElementById('edit_department').classList.add('hidden')
        clear_add_department_edit()
    }

    function open_overlay_department() {
        document.getElementById('add_department').classList.remove('hidden')
    }

    function checked_com_edit2() {
        let checked = event.target.checked
        if (checked) {
            latitude.disabled = true
            longitude.disabled = true
            latitude.value = lat_company_global
            longitude.value = long_company_global
        } else {
            latitude.disabled = false
            longitude.disabled = false
            latitude.value = ''
            longitude.value = ''
        }
    }

    function checked_com() {
        let checked = event.target.checked
        if (checked) {
            latitude.disabled = true
            longitude.disabled = true
            latitude.value = lat_company_global
            longitude.value = long_company_global
        } else {
            latitude.disabled = false
            longitude.disabled = false
            latitude.value = ''
            longitude.value = ''
        }
    }
    let lat_company_global = ''
    let long_company_global = ''

    function on_company_change() {
        let val = event.target.value
        com_id_global = val
        render_table()
    }

    function sendparam(com_id, under, level) {
        var url = `/menu/my_department?com_id=${com_id}&under=${under}&level=${level}`; // Append the parameter to the URL
        window.location.href = url;
    }

    function getParamFromURL(paramName) {
        const queryString = window.location.search.substring(1);
        const urlParams = new URLSearchParams(queryString);
        return urlParams.get(paramName);
    }
    let f_under = 0
    let f_level = parseInt(getParamFromURL('level')) > 1 ? parseInt(getParamFromURL('level')) : 1
    
    async function render_table() {
        document.querySelector(".loader-wrapper").classList.add("active");
        let headersList = {
            "Accept": "*/*",
            "Content-Type": "application/json"
        }
        let bodyContent = JSON.stringify({
            "token": '<?php echo $_SESSION['token']; ?>',
            "com_id": com_id_global,
            "under": parseInt(getParamFromURL('under')) ? parseInt(getParamFromURL('under')) : 0,
            "level": parseInt(getParamFromURL('level')) ? f_level : 1
        });

        let response = await fetch(ENDPOINT + "Get-Sequence-departments", {
            method: "POST",
            body: bodyContent,
            headers: headersList
        });

        let data = await response.json();
        let departments = await data.data
        lat_company_global = data.lat
        long_company_global = data.long
        let des = data.des
        console.log(data);
        document.querySelector(".loader-wrapper").classList.remove("active");
        
        if (des === 'go_add_company') {
            return window.location.href = '<?php echo base_url('/menu/add_company') ?>'
        }

        html = ``;

        if (departments.length) {
            departments.forEach((e, index) => {
                html += `
                <tr class="text-gray-700">
                        <td class="px-4 py-3">${index+1}</td>
                        <td class="px-4 py-3" onclick="sendparam(${com_id_global},${e.id},${f_level+1})">${e.dpname}</td>
                        <td class="px-4 py-3">
                            <button onclick="open_edit_department(${e.id},'${e.dpname}',${e.lat},${e.long});edit_id(${e.id})" class="bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded w-16">
                                Edit
                            </button>
                            <button onclick="my_alert('model_del',true);remove_id(${e.id})" class="bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded w-16">
                                Delete
                            </button>
                        </td>
                    </tr>
                `
                console.log(e)
            });
        } else {
            html += `<tr class="">
                        <td class="px-4 py-2 text-center" colspan="3">No departments found.</td>
                    </tr>`
        }
        document.getElementById('tbody_dpname').innerHTML = await html;

    }


    function clear_add_department_edit() {
        document.getElementById('latitude_edit').value = ''
        document.getElementById('longitude_edit').value = ''
        document.getElementById('department_name_edit').value = ''
        document.getElementById('checked_com_edit').checked = false
        edit_id_global = ''
    }

    function clear_add_department() {
        document.getElementById('latitude').value = ''
        document.getElementById('longitude').value = ''
        document.getElementById('department_name').value = ''
        document.getElementById('checked_com').checked = false
    }

    async function add_department_confirm() {
        try {
            document.querySelector(".loader-wrapper").classList.add("active");
            let dpname = document.getElementById('department_name').value.toUpperCase()
            let lat = document.getElementById('latitude').value
            let long = document.getElementById('longitude').value
            console.log(dpname, long, lat)
            if (dpname && lat && long) {
                let headersList = {
                    "Accept": "*/*",
                    "Content-Type": "application/json"
                }
                let bodyContent = JSON.stringify({
                    "token": '<?php echo $_SESSION['token']; ?>',
                    "dpname": dpname,
                    "lat": lat,
                    "long": long,
                    "com_id": com_id_global,
                    "status": "active",
                    "under": parseInt(getParamFromURL('under')) ? parseInt(getParamFromURL('under')) : 0,
                    "level": parseInt(getParamFromURL('level')) ? f_level : 1,
                    "type_account": "สำนักงาน",
                    "cost_center": "-",
                    "business_code": "-"
                });

                let response = await fetch(ENDPOINT + "mobile/Add-departments", {
                    method: "POST",
                    body: bodyContent,
                    headers: headersList
                });

                let data = await response.json();
                let msg = data.msg
                if (msg === "good") {
                    close_overlay_department()
                    render_table()
                } else {
                    my_alert('wrong', true)
                    document.querySelector(".loader-wrapper").classList.remove("active");
                }
            } else {
                my_alert('wrong', true)
                document.querySelector(".loader-wrapper").classList.remove("active");
            }
        } catch (error) {
            console.log(error)
            my_alert('wrong', true)
        }
    }

    let remove_id_global = '';
    let edit_id_global = '';

    async function remove_id(id) {
        remove_id_global = id
    }

    async function edit_id(id) {
        edit_id_global = id
    }

    let dp_name_global = ''
    let lat_edit_global = ''
    let long_edit_global = ''

    function set_edit_value(id, d1, d2, d3) {
        console.log(d1, d2, d3)
        dp_name_global = d1
        lat_edit_global = d2
        long_edit_global = d3
        edit_id_global = id
    }

    async function remove_departments(id) {
        try {
            if (remove_id_global) {
                document.querySelector(".loader-wrapper").classList.add("active");
                let headersList = {
                    "Accept": "*/*",
                    "Content-Type": "application/json"
                }
                let bodyContent = JSON.stringify({
                    "token": '<?php echo $_SESSION['token']; ?>',
                    "dp_id": remove_id_global
                });
                let response = await fetch(ENDPOINT + "mobile/department/remove", {
                    method: "POST",
                    body: bodyContent,
                    headers: headersList
                });
                let data = await response.json();
                let msg = data.msg
                if (msg === "good") {
                    render_table()
                    //clear value
                    document.querySelector(".loader-wrapper").classList.remove("active");
                    _$('del_modal').classList.add('hidden')

                } else {
                    my_alert('wrong', true)
                    document.querySelector(".loader-wrapper").classList.remove("active");
                }
            }
        } catch (error) {
            console.log(error)
            my_alert('wrong', true)
            document.querySelector(".loader-wrapper").classList.remove("active");
        }
    }

    async function edit_department_confirm() {
        try {
            let dpname = document.getElementById('department_name_edit').value.toUpperCase()
            let lat = document.getElementById('latitude_edit').value
            let long = document.getElementById('longitude_edit').value
            let id = edit_id_global
            console.log(id, dpname, lat, long)
            if (id && dpname && lat && long) {
                let headersList = {
                    "Accept": "*/*",
                    "Content-Type": "application/json"
                }
                let bodyContent = JSON.stringify({
                    "token": '<?php echo $_SESSION['token']; ?>',
                    "dp_id": id,
                    "dpname": dpname,
                    "lat": lat,
                    "long": long
                });

                let response = await fetch(ENDPOINT + "mobile/department/edit", {
                    method: "POST",
                    body: bodyContent,
                    headers: headersList
                });

                let data = await response.json();
                let msg = data.msg
                if (msg === "good") {
                    render_table()
                    //clear value
                    document.querySelector(".loader-wrapper").classList.remove("active");
                    _$('edit_department').classList.add('hidden')
                    dp_name_global = ''
                    lat_edit_global = ''
                    long_edit_global = ''
                    edit_id_global = ''
                } else {
                    my_alert('wrong', true)
                    document.querySelector(".loader-wrapper").classList.remove("active");
                }
            } else {
                my_alert('wrong', true)
            }
        } catch (error) {
            console.log(error);
            my_alert('wrong', true)
        }
    }
</script>