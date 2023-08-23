<style>
    *,
    *:before,
    *:after {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
    }

    .canvas {
        height: 500px;
        width: 100%;
        position: absolute;
        margin: auto;
        bottom: 100px;
    }

    ::selection {
        background: rgba(255, 255, 255, 0.1);
    }

    html,
    body {
        height: 100%;
        background: #3a3a3a;
        background: radial-gradient(ellipse, crimson -350%, black 90%);
    }

    .text-imposter {
        color: crimson;
        font-family: "Dhurjati", sans-serif;
        letter-spacing: 7.5px;
        font-size: 2.3em;
        position: absolute;
        left: 22%;
    }

    input {
        background: transparent;
        color: white;
        border: 1px transparent;
        text-align: center;
        outline: none;
    }

    input::placeholder {
        color: #EF5350;
        opacity: 1;
    }

    input ::ms-input-placeholder,
    input ::-ms-input-placeholder {
        color: red;
    }

    .player-name,
    h2 {
        position: absolute;
        top: 80%;
        left: 38%;
    }

    h2 {
        background: transparent;
        color: white;
        border: 1px transparent;
        text-align: center;
    }

    .player {
        background-color: #840931;
        border: 10px solid #000;
        border-bottom: none;
        border-radius: 60px 80px 0 0;
        height: 200px;
        width: 140px;
        position: absolute;
        margin: auto;
        top: 50%;
        left: 55%;
        z-index: 1;
        transform: translate(-50%, -50%);
    }

    .player:after {
        content: "";
        position: absolute;
        width: 92%;
        height: 85%;
        background-color: #EA1616;
        border-radius: 58% 70% 28% 42%/28% 56% 88% 89%;
        top: 2.5px;
        left: 6px;
    }

    .legs {
        height: 50px;
        width: 60px;
        background-color: #840931;
        position: absolute;
        left: -10px;
        bottom: -50px;
        border: 10px solid black;
        border-top: none;
        border-radius: 0 0 22px 22px;
        z-index: 1;
    }

    .legs:before {
        content: "";
        height: 45px;
        width: 60px;
        background-color: #840931;
        position: absolute;
        right: -90px;
        border: 10px solid black;
        border-top: none;
        border-radius: 0 0 22px 22px;
    }

    .legs:after {
        content: "";
        height: 10px;
        width: 55px;
        background-color: black;
        position: absolute;
        top: -10px;
        left: 40px;
        border-radius: 0 0 10px 0;
    }

    .back {
        height: 120px;
        width: 35px;
        background-color: #EA1616;
        border: 10px solid black;
        border-right: none;
        position: absolute;
        left: -45px;
        top: 65px;
        border-radius: 20px 0 0 20px;
    }

    .back:before {
        content: "";
        position: absolute;
        height: 78px;
        width: 26px;
        background-color: #840931;
        bottom: -0.5px;
        left: -1px;
        border-radius: 12px 0 0 8px;
    }

    .glass {
        height: 75px;
        width: 110px;
        background-color: #225381;
        position: absolute;
        top: 30px;
        left: 40px;
        border: 10px solid black;
        border-radius: 25px 50px 30px 30px;
        z-index: 2;
    }

    .glass:before {
        content: "";
        position: absolute;
        width: 85%;
        height: 65%;
        background-color: #71D4EC;
        border-radius: 0 28px 3px 30px;
        right: 0px;
        top: 0px;
    }

    .glass:after {
        content: "";
        position: absolute;
        width: 45%;
        height: 22%;
        background-color: #F7F7F7;
        left: 39px;
        top: 5px;
        border-radius: 25px;
        transform: rotate(6deg);
    }

    .shadow {
        height: 40px;
        width: 210px;
        background-color: rgba(153, 130, 0, 0.1);
        position: absolute;
        bottom: -60px;
        right: -40px;
        border-radius: 50%;
        z-index: 0;
    }
</style>
<div class="canvas">
    <div class="text-imposter">
        <h1>404 NOT FOUND</h1>
        <h3>FUCKER IMPOSTER</h3>
    </div>
    <div class="player">
        <div class="legs"></div>
        <div class="back"></div>
        <div class="glass"></div>
        <div class="shadow"></div>
    </div>
</div>