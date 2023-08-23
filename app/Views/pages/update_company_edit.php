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

<body class="p-6">
    <div class="flex flex-col">
        <label for="company-name" class="text-gray-700 font-bold mb-2">Company Name</label>
        <input type="text" id="company-name" name="company-name" class="border rounded py-2 px-3 mb-3" placeholder="Enter company name" required>
    </div>

    <div class="flex flex-col">
        <label for="address" class="text-gray-700 font-bold mb-2">Address</label>
        <input type="address" id="address" name="address" class="border rounded py-2 px-3 mb-3" placeholder="Enter address" required>
    </div>

    <div class="flex flex-col">
        <label for="phone-no" class="text-gray-700 font-bold mb-2">Phone Number</label>
        <input type="tel" id="phone-no" name="phone-no" class="border rounded py-2 px-3 mb-3" placeholder="Enter phone number" required>
    </div>

    <div class="flex flex-col">
        <label for="subdistrict" class="text-gray-700 font-bold mb-2">Subdistrict</label>
        <input type="text" id="subdistrict" name="subdistrict" class="border rounded py-2 px-3 mb-3" placeholder="Enter subdistrict" required>
    </div>

    <div class="flex flex-col">
        <label for="district" class="text-gray-700 font-bold mb-2">District</label>
        <input type="text" id="district" name="district" class="border rounded py-2 px-3 mb-3" placeholder="Enter district" required>
    </div>

    <div class="flex flex-col">
        <label for="province" class="text-gray-700 font-bold mb-2">Province</label>
        <input type="text" id="province" name="province" class="border rounded py-2 px-3 mb-3" placeholder="Enter province" required>
    </div>

    <div class="flex flex-col">
        <label for="postcode" class="text-gray-700 font-bold mb-2">Postcode</label>
        <input type="text" id="postcode" name="postcode" class="border rounded py-2 px-3 mb-3" placeholder="Enter postcode" required>
    </div>

    <div class="flex flex-col">
        <label for="latitude" class="text-gray-700 font-bold mb-2">Latitude</label>
        <input type="text" id="latitude" name="latitude" class="border rounded py-2 px-3 mb-3" placeholder="Enter latitude" required>
    </div>

    <div class="flex flex-col">
        <label for="longitude" class="text-gray-700 font-bold mb-2">Longitude</label>
        <input type="text" id="longitude" name="longitude" class="border rounded py-2 px-3 mb-3" placeholder="Enter longitude" required>
    </div>
    <div class="flex justify-center">
        <button onclick="confirm_update_company()" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Update</button>
    </div>

</body>

</html>
<script>
    let ENDPOINT = window.API_URL;
    
    render_company_by_id()
    async function render_company_by_id() {
        document.querySelector(".loader-wrapper").classList.add("active");
        try {
            let headersList = {
                "Accept": "*/*",
                "Content-Type": "application/json"
            }

            let bodyContent = JSON.stringify({
                "token": '<?php echo $_SESSION['token']; ?>',
                "com_id": getCompanyIdFromUrl()
            });

            let response = await fetch(ENDPOINT + "mobile/getCompanyByAdmin", {
                method: "POST",
                body: bodyContent,
                headers: headersList
            });

            let data = await response.json();
            let msg = data.message
            data = data.data
            if (msg == "OK") {
                document.getElementById("company-name").value = data.com_name
                document.getElementById("address").value = data.com_address
                document.getElementById("phone-no").value = data.tel
                document.getElementById('subdistrict').value = data.subdistrict
                document.getElementById('district').value = data.district
                document.getElementById('province').value = data.province
                document.getElementById('postcode').value = data.postcode
                document.getElementById('latitude').value = data.lat
                document.getElementById('longitude').value = data.lng
            }
            document.querySelector(".loader-wrapper").classList.remove("active");
        } catch (err) {
            document.querySelector(".loader-wrapper").classList.remove("active");
            console.log(err)
            alert('something went wrong !!!!')
        }
    }

    function getCompanyIdFromUrl() {
        const urlParams = new URLSearchParams(window.location.search);
        const companyId = urlParams.get('id');
        console.log(companyId)
        return companyId;
    }

    function filterLatLong(latitude, longitude) {
        // Perform filtering logic here
        // For example, let's filter out coordinates outside a specific range

        // Define the range of valid latitude and longitude values
        const minLatitude = -90;
        const maxLatitude = 90;
        const minLongitude = -180;
        const maxLongitude = 180;

        // Check if the latitude and longitude are within the valid range
        if (
            latitude >= minLatitude &&
            latitude <= maxLatitude &&
            longitude >= minLongitude &&
            longitude <= maxLongitude
        ) {
            // The latitude and longitude are within the valid range
            // You can perform further processing or return true to indicate the coordinates are valid
            return true;
        } else {
            // The latitude and longitude are outside the valid range
            // You can perform further processing or return false to indicate the coordinates are invalid
            alert('check your lat long')
            return false;
        }
    }
    async function confirm_update_company() {
        try {
            let company_name = document.getElementById('company-name').value
            let address = document.getElementById('address').value
            let tel = document.getElementById('phone-no').value
            let subdistrict = document.getElementById('subdistrict').value
            let district = document.getElementById('district').value
            let province = document.getElementById('province').value
            let postcode = document.getElementById('postcode').value
            let latitude = document.getElementById('latitude').value
            let longitude = document.getElementById('longitude').value
            if (company_name && address && tel && subdistrict && district && province && postcode && filterLatLong(latitude,longitude)) {
                let headersList = {
                    "Accept": "*/*",
                    "Content-Type": "application/json"
                }

                let bodyContent = JSON.stringify({
                    "token": '<?php echo $_SESSION['token']; ?>',
                    "com_id": getCompanyIdFromUrl(),
                    "com_name": company_name,
                    "com_address": address,
                    "tel": tel,
                    "subdistrict": subdistrict,
                    "district": district,
                    "province": province,
                    "postcode": postcode,
                    "lat": latitude,
                    "lng": longitude
                });

                let response = await fetch(ENDPOINT + "mobile/updateCompanyByAdmin", {
                    method: "POST",
                    body: bodyContent,
                    headers: headersList
                });

                let data = await response.json();
                console.log(data);
                let msg = data.msg
                if (msg === "ok") {
                    console.log('ok')
                    location.reload()
                } else {
                    alert('bad')
                }
            } else {
                alert('bad 2')
            }
        } catch (error) {
            console.log(error)
            alert('err')
        }
    }
    <?php
    $check = isset($_GET['check']) ? $_GET['check'] : '';
    if ($check === "no") {
        echo "console.log('not no')";
    } else {
    ?>
    <?php
    }
    ?>
</script>