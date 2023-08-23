<!DOCTYPE html>
<html>

<head>
    <title>Setup</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;200;300;400;500&family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100&display=swap" rel="stylesheet">

</head>
<style>
    * {
        margin: 0;
        padding: 0;
    }

    .container {
        padding: 15px;
        margin-left: 5vw;
    }

    .add-edit-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .button-container {
        display: flex;
        gap: 20px;
    }

    .btn-holiday {
        display: flex;
        align-items: center;
        width: 221px;
        border: 1px solid #009688;
        border-radius: 10px;
        margin: 10px;
        padding: 8px;
        cursor: pointer;
    }

    .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 999;
    }

    .overlay-content {
        position: absolute;
        right: 0;
        background-color: white;
        border-radius: 5px;
        height: 100%;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    table td {
        padding: 12px;
    }

    table thead td {
        background-color: #009688;
        color: #ffffff;
        font-weight: bold;
        font-size: 13px;
        border: 1px solid #009688;
    }

    table tbody tr {
        background-color: #f9fafb;
    }

    table tbody tr:nth-child(odd) {
        background-color: #ffffff;
    }

    .three-dot {
        width: 20px;
        margin-left: 50px;
        margin-bottom: 45px;
        cursor: pointer;
    }

    .option {
        padding: 5px;
        margin: 5px;
        background: #fff;
        box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
        border-radius: 13px;
    }

    .option-box {
        display: flex;
        gap: 10px;
        cursor: pointer;
    }

    .add-holiday-box {
        display: flex;
        align-items: center;
        width: 221px;
        border: 1px solid #009688;
        border-radius: 10px;
        margin: 10px;
        padding: 8px;
        height: 10vh;
        justify-content: center;
        gap: 10px;
        cursor: pointer;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.8);

    }

    .modal-content {
        background-color: #fefefe;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 400px;
        margin-top: 21%;
    }

    .close-modal {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close-modal:hover,
    .close-modal:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>

<body>
    <?php include 'sidebar.php'; ?>
    <?php include 'navbar.php'; ?>

    <div class="container">
        <h2>ปฏิทินวันหยุด</h2>
        <br>
        <hr>

        <div class="add-edit-container">
            <div class="button-container">

                <div class="btn-holiday" id="button1" onclick="showContent('content1')">
                    <img src="<?php echo base_url('imgs/calendar-backoffice.png'); ?>" style="width: 11%;">
                    <div style="margin-left: 2vw; width: 120px;">
                        <p id="title-holiday">วันหยุด jaaaa</p>
                        <p id="count-holiday">วันหยุด 22 วัน</p>
                    </div>
                    <div>
                        <img onclick="openModal('title-holiday');" src="<?php echo base_url('imgs/three-dot.png'); ?>" class="three-dot">
                    </div>
                </div>

            </div>

            <div class="add-holiday-box" onclick="openOverlay()">
                <p style="font-size: 44px;">+</p>
                <p>เพิ่มปฏิทิน</p>
            </div>

        </div>
        <br>
        <div class="tab-container">
            <div id="content1" style="display: none;">
                <table>
                    <thead>
                        <tr>
                            <td style="width: 15%;">Day</td>
                            <td>Holiday Name TH</td>
                            <td>Holiday Name EN</td>
                            <td>Holiday Type</td>
                            <td>Active</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="overlay" id="overlay">
        <div class="overlay-content" id="overlayContent">

            <div class="create-button-container">
                <input type="text" id="buttonNameInput" placeholder="Enter button name">
                <button onclick="createButtonAndContent(); closeOverlay();">Copy</button>
            </div>
            <button onclick="closeOverlay()">Close</button>
        </div>
    </div>


    <!-- The modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <!-- Add a close button -->
            <span class="close" onclick="closeModal()">&times;</span>
            <!-- <div id="modalContentContainer"></div> -->
            <div class="option-box">
                <img src="<?php echo base_url('imgs/edit-one.png'); ?>">
                <input type="text" id="modalContentContainer">
                <p>Edit</p>
            </div>
            <br>
            <div class="option-box">
                <img src="<?php echo base_url('imgs/delete.png'); ?>">
                <p>Delete</p>
            </div>
        </div>
    </div>

    <!-- Other scripts or footer goes here -->

    <script>
        var myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/json");

        var raw = JSON.stringify({
            "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJlbXBsb3llZV9pZCI6MzgsImJfaWQiOjEsImJ1c2luZXNzX2lkIjoiNzQ4ZWJkOGEtMTE4MS0xMWVlLWJlNTYtMDI0MmFjMTIwMDAyIiwicm9sZV9pZCI6NDU5LCJpYXQiOjE2OTAyNTY2NDJ9.AKExY-afKB5Bn8RFzYzsQbWfhdnhlvN1ZUhZOXCXeww"
        });

        var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: raw,
            redirect: 'follow'
        };

        fetch("http://localhost:3333/api/readHoliday/v2", requestOptions)
            .then(response => response.json())
            .then(result => console.log(result))
            .catch(error => console.log('error', error));


        function openOverlay() {
            const overlay = document.getElementById('overlay');
            overlay.style.display = 'block';
        }

        function closeOverlay() {
            const overlay = document.getElementById('overlay');
            overlay.style.display = 'none';
        }

        function showContent(contentId) {
            const contents = document.querySelectorAll('[id^="content"]');
            contents.forEach(content => {
                content.style.display = 'none';
            });

            document.getElementById(contentId).style.display = 'block';
        }

        function createButtonAndContent() {
            const buttonName = document.getElementById('buttonNameInput').value;

            if (buttonName.trim() !== '') {
                const buttonContainer = document.querySelector('.button-container');
                const tabContainer = document.querySelector('.tab-container');


                buttonContainer.innerHTML += `
                    
                <div class="btn-holiday" onclick="showContent('content${tabContainer.children.length + 1}')">
                    <img src="<?php echo base_url('imgs/calendar-backoffice.png'); ?>" style="width: 11%;">
                    <div style="margin-left: 2vw; width: 120px;">
                        <p id="title-holiday">${buttonName}</p>
                        <p id="count-holiday">วันหยุด 22 วัน</p>
                    </div>
                    <div>
                        <img onclick="openModal('title-holiday');" src="<?php echo base_url('imgs/three-dot.png'); ?>" class="three-dot">
                    </div>
                </div>
                `;

                // buttonContainer.innerHTML += `

                //     <div class="btn-holiday" onclick="showContent('content${tabContainer.children.length + 1}')">
                //         <p>${buttonName}</p>
                //     </div>
                // `;


                const existingContent = document.getElementById('content1');
                tabContainer.innerHTML += `
                    <div id="content${tabContainer.children.length + 1}" style="display: none;">
                        ${existingContent.innerHTML}
                    </div>
                `;

                document.getElementById('buttonNameInput').value = '';
            }
        }
        showContent('content1');

        const modal = document.getElementById('modal-edit');

        // Function to open the modal and set the content dynamically
        function openModal(contentID) {
            const modal = document.getElementById('myModal');
            const content = document.getElementById(contentID).innerText;
            document.getElementById('modalContentContainer').innerText = content;
            modal.style.display = 'block';
        }

        // Function to close the modal
        function closeModal() {
            const modal = document.getElementById('myModal');
            modal.style.display = 'none';
        }

        // Close the modal if the user clicks outside of it
        window.onclick = function(event) {
            const modal = document.getElementById('myModal');
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        }
    </script>
</body>

</html>