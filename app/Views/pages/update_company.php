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
    <script src="https://cdn.tailwindcss.com"></script>
    <?php echo "<script src='".base_url('./backoffice_static/config.js')."'></script>"; ?>
</head>

<body class="p-6">
    <div class="flex flex-col">
        <label for="company-name" class="text-gray-700 font-bold mb-2">Company Name</label>
        <input type="text" id="company-name" name="company-name" class="border rounded py-2 px-3 mb-3" required>
    </div>

    <div class="flex flex-col">
        <label for="address" class="text-gray-700 font-bold mb-2">Address</label>
        <input type="text" id="address" name="address" class="border rounded py-2 px-3 mb-3" required>
    </div>

    <div class="flex flex-col">
        <label for="phone-no" class="text-gray-700 font-bold mb-2">Phone Number</label>
        <input type="tel" id="phone-no" name="phone-no" class="border rounded py-2 px-3 mb-3" required>
    </div>

    <div class="flex flex-col">
        <label for="subdistrict" class="text-gray-700 font-bold mb-2">Subdistrict</label>
        <input type="text" id="subdistrict" name="subdistrict" class="border rounded py-2 px-3 mb-3" required>
    </div>

    <div class="flex flex-col">
        <label for="district" class="text-gray-700 font-bold mb-2">District</label>
        <input type="text" id="district" name="district" class="border rounded py-2 px-3 mb-3" required>
    </div>

    <div class="flex flex-col">
        <label for="province" class="text-gray-700 font-bold mb-2">Province</label>
        <input type="text" id="province" name="province" class="border rounded py-2 px-3 mb-3" required>
    </div>

    <div class="flex flex-col">
        <label for="postcode" class="text-gray-700 font-bold mb-2">Postcode</label>
        <input type="text" id="postcode" name="postcode" class="border rounded py-2 px-3 mb-3" required>
    </div>

    <div class="flex flex-col">
        <label for="latitude" class="text-gray-700 font-bold mb-2">Latitude</label>
        <input type="text" id="latitude" name="latitude" class="border rounded py-2 px-3 mb-3" required>
    </div>

    <div class="flex flex-col">
        <label for="longitude" class="text-gray-700 font-bold mb-2">Longitude</label>
        <input type="text" id="longitude" name="longitude" class="border rounded py-2 px-3 mb-3" required>
    </div>
    <div class="flex justify-center">
        <button onclick="updateCompany()" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Submit</button>
    </div>
    <script>
        let ENDPOINT = window.API_URL;
        var companyID;
        var myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/json");

        var raw = JSON.stringify({
            "token": "eyJhbGciOiJIUzI1NiJ9.Mjg.dvJHlvAEm5yse8tu0-DM9fmZhVWx0UjDk2pF2P3u4TQ", // mock
            "com_id": 17// mock
        });

        var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: raw,
            redirect: 'follow'
        };

        fetch(ENDPOINT + "mobile/getCompanyByAdmin", requestOptions)
            .then(response => response.json())
            .then(result => {
                console.log(result.data);
                companyID = result.data.com_id;
                document.getElementById('company-name').value = result.data.com_name;
                document.getElementById('address').value = result.data.com_address;
                document.getElementById('phone-no').value = result.data.tel;
                document.getElementById('subdistrict').value = result.data.subdistrict;
                document.getElementById('district').value = result.data.district;
                document.getElementById('province').value = result.data.province;
                document.getElementById('postcode').value = result.data.postcode;
                document.getElementById('latitude').value = result.data.lat;
                document.getElementById('longitude').value = result.data.lng;
            })
            .catch(error => {
                console.log('error', error)
            });

        function updateCompany() {
            let companyNameValue = document.getElementById('company-name').value;
            let addressValue = document.getElementById('address').value;
            let phoneValue = document.getElementById('phone-no').value;
            let subDistrictValue = document.getElementById('subdistrict').value;
            let districtValue = document.getElementById('district').value;
            let provinceValue = document.getElementById('province').value;
            let postcodeValue = document.getElementById('postcode').value;
            let latValue = document.getElementById('latitude').value;
            let lngValue = document.getElementById('longitude').value;

            var myHeaders = new Headers();
            myHeaders.append("Content-Type", "application/json");

            var raw = JSON.stringify({
                "com_id": companyID,
                "com_name": companyNameValue,
                "com_address": addressValue,
                "tel": phoneValue,
                "subdistrict": subDistrictValue,
                "district": districtValue,
                "province": provinceValue,
                "postcode": postcodeValue,
                "lat": latValue,
                "lng": lngValue
            });

            var requestOptions = {
                method: 'POST',
                headers: myHeaders,
                body: raw,
                redirect: 'follow'
            };

            fetch(ENDPOINT + "mobile/updateCompanyByAdmin", requestOptions)
                .then(response => response.json())
                .then(result => console.log(result))
                .catch(error => console.log('error', error));
        }
    </script>
</body>

</html>