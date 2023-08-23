<footer>


    <div class="botmenucontainer">
        <div class="half">
            <div class="botmenubox" onclick="<?= esc($home); ?>">
                <img src="<?=base_url('imgs/home_white.png')?>" alt="123">
                <span class="menutext">Home</span>
            </div>
            <div class="botmenubox"  onclick="" >
                <img src="<?=base_url('imgs/calendar_blue.png')?>" alt="123">
                <span class="menutext">Calendar</span>
            </div>

        </div>

        <div class="circle">
        <img src="<?=base_url('imgs/camera.png')?>" alt="123">

        </div>

        <div class="half">
            <div class="botmenubox" onclick="<?= esc($gototeam); ?>">
                <img src="<?=base_url('imgs/people.png')?>" alt="123">
                <span class="menutext">Team</span>
            </div>
            <div class="botmenubox">
                <img src="<?=base_url('imgs/setting2.png')?>" alt="123">
                <span class="menutext">Setting</span>
            </div>

        </div>
       


        

    </div>


<?$url1?>
</footer>


</body>
</html>

<style>
   
    footer
    {
        display: flex;
        width: 100vw;
        height: 10vh;
        padding: 20px;
        position: fixed;
        bottom: 0;
        background-color: white;
    }
    .botmenucontainer
    {
        display: flex;
        width: 100%;
        height: 100%;
        justify-content: space-between;

    }
    .botmenubox
    {
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;    
    }
    .botmenubox img
    {
        width: 30x;
        height: 30px;
    }

    .circle
    {
        height: 20vw;
        width: 20vw;
        border-radius: 50%;
        background: linear-gradient(178.65deg, #608DFF 3.87%, #043C9A 87.75%);
        position: absolute;
        bottom: 2vh;
        left: 40vw;
        display: flex;
        align-items: center;
        justify-content: center;

    }
    .circle img
    {
        width: 40px;
        height: 40px;

    }

    .half
    {
        display: flex;
        width: 35%;
        justify-content: space-between;
        align-items: center;  
    }
    .menutext
    {
        color:#8F90A6;
        font-size: 12px;
    }
</style>
