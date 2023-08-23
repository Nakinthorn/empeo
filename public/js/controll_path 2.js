async function check_company() {
    let headersList = {
        "Accept": "*/*",
        "Content-Type": "application/json"
    }

    let bodyContent = JSON.stringify({
        "token": '<?php echo $_SESSION['token']; ?>',
    });

    let response = await fetch("http://localhost:3333/mobile/check/company", {
        method: "POST",
        body: bodyContent,
        headers: headersList
    });

    let data = await response.json();
    if(data.msg === "good"){
        window.location.href = '<?php echo base_url('/menu/add_company') ?>'
    }
}
check_company()