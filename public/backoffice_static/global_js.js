async function authen_with_jwt() {
    let headersList = {
        "Accept": "*/*",
        "Content-Type": "application/json"
    }

    let bodyContent = JSON.stringify({
        "token": localStorage.token ? localStorage.token : ''
    });

    let response = await fetch("https://hrm-api-uat.unit.co.th/mobile/auth/admin", {
        method: "POST",
        body: bodyContent,
        headers: headersList
    });

    let data = await response.json();
    console.log(data);
    let msg = data.msg
    if (msg !== "good") {
        window.location.href = './login.html'
        localStorage.token = ''
    }
}
let currentUrl_auth = window.location.href;
if (!currentUrl_auth.includes('login.html')) {
    authen_with_jwt()
}
function open_loader(s = true) {
    let loader_ = document.getElementById('open-loader')
    if (s) {
        loader_.style.display = 'flex'
    } else {
        loader_.style.display = 'none'
    }
}
