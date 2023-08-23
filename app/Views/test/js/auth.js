async function auth() {
    try {
        let headersList = {
            "Accept": "*/*",
            "User-Agent": "Thunder Client (https://www.thunderclient.com)",
            "Content-Type": "application/json"
        }

        let bodyContent = JSON.stringify({
            "token": localStorage.getItem('token')
        });

        let response = await fetch("http://localhost:3333/dashboard/protect", {
            method: "POST",
            body: bodyContent,
            headers: headersList
        });

        let data = await response.json();
        console.log(data)
        let msg = data.msg
        if(msg === "success"){
            // window.location.href = '../dashboard.html' 
        }else{
            window.location.href = '../loginadmin.html'
        }
        console.log(data);
    } catch (error) {
        window.location.href = '../loginadmin.html'
    }

}
auth()
