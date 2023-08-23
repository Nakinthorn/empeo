<?php
$session = session();
$token = $session->get('token');
// echo $token;
/* token: '<?php echo $token; ?>', 
    <img src="<?= base_url('imgs/left-arrow-grey.svg') ?>" alt="Image" width=20>
    <img src="<?= base_url('imgs/right-arrow-grey.svg') ?>" alt="Image" width=20>
    <img src="<?= base_url('imgs/weekend-icon.svg') ?>" alt="Image">
    <img src="<?= base_url('imgs/workday-icon.svg') ?>" alt="Image">
*/
?>
<?php echo "<script src='".base_url('./backoffice_static/config.js')."'></script>"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600&display=swap");

        * {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: "Manrope", sans-serif;
        }

        .backHome {
            border: none;
            background: none;
            padding: 30px;
            font-size: 18px;
        }

        .calendar {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 10px;
            margin: 20px;
        }

        .headCalendar {
            display: flex;
            align-items: center;
            justify-content: space-around;
            margin-top: -20px;
        }

        .day {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 40px;
            height: 40px;
        }

        .day:hover {
            background-color: rgba(96, 141, 255, 0.5);
            border-radius: 50%;
        }

        .week {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 40px;
            height: 40px;
        }

        .current-day {}

        .current-day-calendar {
            background-color: #608DFF;
            border-radius: 50%;
        }

        .current-day-calendar div {
            background-color: green;
            border: solid 1px #fff;
        }

        .monthDetail {
            display: flex;
            align-items: center;
        }

        .weekend-day {
            color: red;
        }

        #detailMonthContainer {
            height: 400px;
            overflow-y: auto;
            padding: 20px;
        }

        .day-details {
            display: flex;
            align-items: center;
            border-bottom: 1px solid #C7C9D9;
            padding: 5px;
        }

        .dotSick {
            width: 10px;
            height: 10px;
            background-color: red;
            border-radius: 50%;
            position: absolute;
            margin-top: 25px;
        }

        .dotVacation {
            width: 10px;
            height: 10px;
            background-color: green;
            border-radius: 50%;
            position: absolute;
        }

        .haveEvent {
            width: 100%;
            height: 40px;
            background-color: #608DFF;
            color: #fff;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-left: 10px;
            padding-right: 10px;
        }

        .dayDateLeftSide {
            width: 50px;
            text-align: center;
        }

        .weekendBox {
            width: 100%;
            height: 40px;
            background-color: #FF3B3B;
            color: #fff;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-left: 10px;
            padding-right: 10px;
        }

        .workdayBox {
            width: 100%;
            height: 40px;
            background-color: #06C270;
            color: #fff;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-left: 10px;
            padding-right: 10px;
        }
    </style>
</head>

<body>
    <button class="backHome" onclick="backhome();">X</button>
    <div class="headCalendar">
        <img src="<?= base_url('imgs/left-arrow-grey.svg') ?>" id="previousBtn" width=20>
        <p style="font-size: 16px; font-weight: 700;" id="calendarHeading">Calendar</p>
        <img src="<?= base_url('imgs/right-arrow-grey.svg') ?>" id="nextBtn" width=20>
    </div>
    <div id="calendarContainer"></div>

    <div id="detailMonthContainer"></div>

    <script>
        let ENDPOINT = window.API_URL;
        
        let currentYear;
        let currentMonth;
        let selectedDate;

        var myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/json");

        var raw = JSON.stringify({
            "token": "<?php echo $token; ?>"
        });

        var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: raw,
            redirect: 'follow'
        };

        function backhome() {
            window.location.href = "<?= base_url("home") ?>";
        }

        fetch(ENDPOINT + "api/calendar", requestOptions)
            .then(response => response.json())
            .then(result => {
                console.log(result)
                const events = result.dataRequest || [];

                let work_time_start = result.dataWorkTime[0].work_time_start;
                let work_time_end = result.dataWorkTime[0].work_time_end;

                let workTime = `${work_time_start} - ${work_time_end}`
             
                function createCalendar(year, month) {
                    const calendarContainer = document.getElementById('calendarContainer');
                    const daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
                    const currentDate = new Date(year, month - 1, 1);
                    const daysInMonth = new Date(year, month, 0).getDate();
                    const startDayIndex = currentDate.getDay();
                    let calendarHTML = '<div class="calendar">';

                    // Create days of the week headers
                    for (let i = 0; i < daysOfWeek.length; i++) {
                        let dayClass = 'workDay';
                        let weekClass = 'week';
                        if (daysOfWeek[i] === 'Sun' || daysOfWeek[i] === 'Sat') {
                            weekClass += ' weekend-day';
                        }
                        calendarHTML += `<div class="${weekClass}">${daysOfWeek[i]}</div>`;
                    }

                    // Create empty cells for previous month's days
                    for (let i = 0; i < startDayIndex; i++) {
                        calendarHTML += `<div class="day"></div>`;
                    }

                    // Create cells for current month's days
                    for (let i = 1; i <= daysInMonth; i++) {
                        let dayCellClass = 'day';
                        let dayCellContent = i;

                        // Compare time_start with current day
                        const currentDateObj = new Date(year, month - 1, i);
                        const currentDayTimestamp = currentDateObj.getTime();

                        const dayEvents = events.filter(event => {
                            const timeStart = Number(event.time_start);
                            const timeEnd = Number(event.time_end);
                            const eventStartDate = new Date(timeStart);
                            const eventEndDate = new Date(timeEnd);
                            const eventStartDay = eventStartDate.getDate();
                            const eventEndDay = eventEndDate.getDate();
                            const eventStartMonth = eventStartDate.getMonth() + 1;
                            const eventEndMonth = eventEndDate.getMonth() + 1;
                            return (
                                eventStartDay <= i &&
                                i <= eventEndDay &&
                                eventStartMonth === month &&
                                eventEndMonth === month
                            );
                        });

                        if (dayEvents.length > 0) {
                            dayCellClass += ' event-day';
                            let cellContent = i;

                            dayEvents.forEach(event => {
                                if (event.leave_type === 'Sick Leave') {
                                    cellContent += `<div class="dotSick"></div>`;
                                }
                                if (event.leave_type === 'Vacational Leave') {
                                    cellContent += `<div class="dotVacation"></div>`;
                                }
                            });

                            dayCellContent = cellContent;
                        }

                        // Highlight current date
                        const today = new Date();
                        if (
                            year === today.getFullYear() &&
                            month === today.getMonth() + 1 &&
                            i === today.getDate()
                        ) {
                            dayCellClass += ' current-day-calendar';
                            dayCellContent = `<span style="color: #fff;">${dayCellContent}</span>`;
                        }

                        // Check if current day is a Sunday (0) or Saturday (6)
                        const currentDay = currentDateObj.getDay();
                        if (currentDay === 0 || currentDay === 6) {
                            dayCellClass += ' weekend-day';
                        }

                        calendarHTML += `<div class="${dayCellClass}" data-date="${i}">${dayCellContent}</div>`;
                    }

                    calendarHTML += '</div>';
                    calendarContainer.innerHTML = calendarHTML;

                    // Attach event listeners to day cells
                    const dayCells = calendarContainer.querySelectorAll('.day');
                    dayCells.forEach(cell => {
                        cell.addEventListener('click', handleDayCellClick);
                    });
                }


                function handleDayCellClick(event) {
                    const clickedDayCell = event.target;
                    const clickedDate = clickedDayCell.dataset.date;
                    if (clickedDate) {
                        selectedDate = Number(clickedDate) || new Date().getDate();
                        updateDetailMonth(events);
                        const detailMonthContainer = document.getElementById('detailMonthContainer');
                        const selectedDay = detailMonthContainer.querySelector('.current-day');
                        if (selectedDay) {
                            const containerHeight = detailMonthContainer.offsetHeight;
                            const dayOffsetTop = selectedDay.offsetTop;
                            const dayHeight = selectedDay.offsetHeight;
                            const scrollTo = dayOffsetTop - containerHeight + dayHeight;
                            detailMonthContainer.scrollTo({
                                top: scrollTo,
                                behavior: 'smooth'
                            });
                        }
                    }
                }

                function showPreviousMonth() {
                    currentMonth--;
                    if (currentMonth < 1) {
                        currentMonth = 12;
                        currentYear--;
                    }
                    updateCalendar();
                }

                function showNextMonth() {
                    currentMonth++;
                    if (currentMonth > 12) {
                        currentMonth = 1;
                        currentYear++;
                    }
                    updateCalendar();
                }

                function updateCalendar() {
                    createCalendar(currentYear, currentMonth);
                    updateCalendarHeading();
                    updateDetailMonth(events);
                }

                function updateCalendarHeading() {
                    const calendarHeading = document.getElementById('calendarHeading');
                    const monthNames = [
                        'January', 'February', 'March', 'April', 'May', 'June',
                        'July', 'August', 'September', 'October', 'November', 'December'
                    ];
                    const monthName = monthNames[currentMonth - 1];
                    calendarHeading.textContent = `${monthName} ${currentYear}`;
                }

                function updateDetailMonth(events) {
                    const daysInMonth = new Date(currentYear, currentMonth, 0).getDate();
                    let html = '';

                    for (let i = 1; i <= daysInMonth; i++) {
                        const currentDateObj = new Date(currentYear, currentMonth - 1, i === selectedDate ? selectedDate : (i === new Date().getDate() ? new Date().getDate() : i));
                        const currentDayTimestamp = currentDateObj.getTime();
                        const dayOfWeek = currentDateObj.toLocaleString('en-us', {
                            weekday: 'short'
                        });

                        const filteredEvents = events.filter(event => {
                            const timeStart = Number(event.time_start);
                            const timeEnd = Number(event.time_end);
                            const eventStartDate = new Date(timeStart);
                            const eventEndDate = new Date(timeEnd);
                            const eventStartDay = eventStartDate.getDate();
                            const eventEndDay = eventEndDate.getDate();
                            const eventStartMonth = eventStartDate.getMonth() + 1;
                            const eventEndMonth = eventEndDate.getMonth() + 1;
                            return eventStartDay <= i && i <= eventEndDay && eventStartMonth === currentMonth && eventEndMonth === currentMonth;
                        });
                        if (i === selectedDate || (i === new Date().getDate() && !selectedDate)) {
                            html += `<div class="day-details current-day">`;
                        } else {
                            html += `<div class="day-details">`;
                        }

                        html += `<div class="dayDateLeftSide">
                                    <p style="font-weight: 700;font-size: 20px;color: #28293D;">${i}</p>
                                    <p>${dayOfWeek}</p>
                                </div>`;

                        if (filteredEvents.length > 0) {
                            for (let j = 0; j < filteredEvents.length; j++) {
                                const event = filteredEvents[j];
                                const dateStart = parseInt(event.time_start);
                                const dateEnd = parseInt(event.time_end);
                                const timeStartString = convertMillisecondsToTimeString(dateStart);
                                const timeEndString = convertMillisecondsToTimeString(dateEnd);
                                const timeString = `${timeStartString}-${timeEndString}`;

                                html += `<div class="haveEvent"> 
                                            <div style="display: flex;">
                                                <img src="<?= base_url('imgs/weekend-icon.svg') ?>" style="padding-right: 10px;">
                                                <p>${event.leave_type}</p>
                                            </div>
                                            <p>${timeString}</p>
                                        </div>`;
                            }
                        } else {
                            if (currentDateObj.getDay() === 0 || currentDateObj.getDay() === 6 || (currentDateObj.getDate() === 24 && currentDateObj.getMonth() === 5) || (currentDateObj.getDate() === 25 && currentDateObj.getMonth() === 5)) {
                                html += `<div class="weekendBox">
                                            <div style="display: flex;">
                                                <img src="<?= base_url('imgs/weekend-icon.svg') ?>" style="padding-right: 10px;">
                                                <p>Weekend</p>
                                            </div>   
                                            <p>-</p>
                                        </div>
                                        `;

                            } else {
                                html += `<div class="workdayBox">
                                            <div style="display: flex;">
                                                <img src="<?= base_url('imgs/workday-icon.svg') ?>" style="padding-right: 10px;">
                                                <p>Work day</p>
                                            </div>   
                                            <p>${workTime ? workTime : ''}</p>
                                        </div>
                                    `;
                            }
                        }
                        html += `</div>`;
                    }

                    if (!selectedDate) {
                        selectedDate = new Date().getDate();
                    }

                    const detailMonthContainer = document.getElementById('detailMonthContainer');
                    detailMonthContainer.innerHTML = html;

                    // Scroll ไปยังวันปัจจุบัน
                    const currentDateElement = document.querySelector('.current-day');
                    if (currentDateElement) {
                        currentDateElement.scrollIntoView({
                            block: 'start'
                        });
                        // currentDateElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                }

                function convertMillisecondsToTimeString(milliseconds) {
                    const date = new Date(milliseconds);
                    let hours = date.getHours().toString().padStart(2, '0');
                    let minutes = date.getMinutes().toString().padStart(2, '0');
                    return `${hours}:${minutes}`;
                }

                const today = new Date();
                currentYear = today.getFullYear();
                currentMonth = today.getMonth() + 1;
                selectedDate = today.getDate();

                createCalendar(currentYear, currentMonth);
                updateCalendarHeading();
                updateDetailMonth(events);

                const previousBtn = document.getElementById('previousBtn');
                previousBtn.addEventListener('click', showPreviousMonth);

                const nextBtn = document.getElementById('nextBtn');
                nextBtn.addEventListener('click', showNextMonth);
            })
            .catch(error => console.log('error', error));
    </script>
</body>

</html>