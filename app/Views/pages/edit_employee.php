<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <?php echo "<script src='".base_url('./backoffice_static/config.js')."'></script>"; ?>
</head>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600&display=swap");

    body {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Manrope", sans-serif;
    }

    .employee {
        display: flex;
        align-items: center;
        margin: 8vw;
        padding: 10px;
        border: #0063F7 1px solid;
        border-radius: 10px;
    }

    .employee img {
        width: 50px;
        margin-right: 10px;
    }

    .imgProfile {
        border-radius: 50%;
    }

    .employee:hover {
        background-color: #0063F7;
        color: #fff;
    }
</style>

<body>
    <div id="employee-container">

    </div>

</body>
<script>
    let ENDPOINT = window.API_URL;

    var myHeaders = new Headers();
    myHeaders.append("Content-Type", "application/json");

    var raw = JSON.stringify({
        "token": '<?php echo $_SESSION['token']; ?>'
    });

    var requestOptions = {
        method: 'POST',
        headers: myHeaders,
        body: raw,
        redirect: 'follow'
    };

    fetch(ENDPOINT + "api/pickEmployee", requestOptions)
        .then(response => response.json())
        .then(result => {
            let html = ''
            for (let i = 0; i < result.data.length; i++) {
                html += `
                        <div class="employee">
                            <img src="${result.data[i].img_profile}" onerror="this.src='https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png'" class="imgProfile">
                            <p style="margin-right: 5px;">${result.data[i].fname}  ${result.data[i].lname}</p>
                        </div>
                    `;
            }
            document.getElementById('employee-container').innerHTML = html;
        })
        .catch(error => console.log('error', error));
</script>

</html>