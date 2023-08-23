<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="./css/doc_header_footer.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:wght@200;400;500;800&display=swap');
    </style>
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Noto Sans', sans-serif;
        }

        .my-body {
            height: 70vh;
            /* border:  1px solid black; */
            margin: 0px 15px;
        }

        .doc_option {
            background: #F6F7F9;
            width: 100%;
            height: 48px;
            border-radius: 8px;
            margin-top: 5px;
            padding: 10px;
            color: #838799;
        }

        .doc_date {
            background: #FAFAFC;
            padding: 12px 16px;
            color: #8F90A6;
            margin-top: 17px;
            border-radius: 8px;
        }

        .doc-text {
            margin-top: 17px;
            font-size: 14px;
            line-height: 24px;
            font-weight: 400;
            color: #838799;
        }

        .btn_select_blue {
            margin-top: 17px;
            border: 1px solid #3E7BFA;
            border-radius: 17px;
            width: 30%;
        }

        .space_margin {
            margin-top: 17px;
        }

        .color-blue {
            margin: 8px 11px;
            text-align: center;
        }

        .set-space-btn {
            display: flex;
            width: 100%;
            justify-content: space-around;
            color: #3E7BFA;
        }

        .header {
            width: 100%;
            height: 10vh;
            display: flex;
            padding: 20px;
            position: sticky;
            top: 0;
            z-index: 1;
            background-color: white;
        }


        .headerbox {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .headimg {
            position: absolute;
            left: 20px;
        }

        /* loader */
        .loader-wrapper {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: none;
            justify-content: center;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 999;
            opacity: 0;
            transition: opacity 0.2s ease-in-out;
        }

        .loader-wrapper.active {
            opacity: 1;
            display: flex;
        }

        .loader {
            border: 16px solid #f3f3f3;
            border-top: 16px solid #3498db;
            border-radius: 50%;
            width: 100px;
            height: 100px;
            animation: spin 2s linear infinite;
            position: absolute;
            /* top: 50%;
            left: 50%;
            transform: translate(-50%, -50%); */
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
        #btn-menubar-open{
            display:block;
        }
        #btn-menubar-close{
            display:none;
        }
        *{
            box-sizing: border-box;
        }
        .menubarRight_Active{ 
           overflow: auto;
            padding-top:60px;
            margin:0;
            z-index: 8;
            left: 0;
            top: 0;
            width:100%;
            height:100vh;
            background-color:#fff;
            /* display: flex; */
            color:#000;
            position: absolute;
         display:flex;
         flex-direction: column;
         align-items:center;
         justify-content:start;
         /* animation: slide 0.25s forwards; */
     
        }
        @keyframes slide {
        from {left: 100%;}
        to{ left: 0px;}
        }
        
        @keyframes slideCloesed {
        from {left: 0;}
        to{ left: 100%;}
        }
        .menubarRight_Active .menu{
            text-align:center;
            padding: 20px 15px;
            width:100%;
            /* border-bottom: 1px solid yellow; */
            display : flex;
            align-items:center;
            justify-content:start;
           

        }
        .menubarRight_Active div:hover{
            cursor:pointer;
            /* background-color:rgba(0,0,0,0.15); */
        }
        .menubarRight{
            
            display:none;
            /* padding-top:60px;
            margin:0;
            z-index: 8;
            left: -100;
            top: 0;
            width:100%;
            height:100vh;
            background-color:#fff;
            display: flex;
            color:#000;
            position: absolute;
   
         flex-direction: column;
         align-items:center;
         justify-content:start; */
         /* animation: slideCloesed 0.25s forwards; */
        }
        .menubarRightWait{
            animation: slideCloesed 0.25s forwards;
        }
        .menuDrop{
            
            width: 100%;
            
            text-align:left;
            align-items:center;
            justify-content:center;
            flex-direction: column;
            /* background-color:green; */
            animation: slideDrop 0.15s forwards;
            
        }
        @keyframes slideDrop{
            from {height: 10px;font-size: 5px;}
            to{ height: auto;font-size: 16px;}
        }
        .menuDrop a{
            padding:10px 70px;
            width:100%;
            border-bottom: unset;
            /* list-style:none; */
          align-items:center;
            justify-content:center;
            flex-direction: column;
        }
      
        /* .menuDrop a:hover{background-color:red;} */
    #colortest{
        /* background-color:rgba(0,0,0,0.05); */
       
        /* background-color:#0063F7; */
        /* color:#fff; */
    }
    .tgshapDown{
        margin-top:5px;
        margin-left:5px;
        width: 0;
      height: 0;
      border-left: 5px solid transparent;
      border-right: 5px solid transparent;
      border-top: 10px solid black;
    }
    .tgshapUp{
        margin-top:5px;
        margin-left:5px;
        width: 0;
      height: 0;
      border-left: 5px solid transparent;
      border-right: 5px solid transparent;
      border-bottom: 10px solid black;
    }
     #underLine{
        width: 100%;
        height: 1.5px;
        background-color: rgba(0, 0, 0, 0.1);
     }
    </style>
</head>

<body>
    <div class="loader-wrapper">
        <div class="loader"></div>
    </div>
    <div class='header'>
        <div class='headerbox'>
            <div class='headimg' onclick="<?= $url1 ?>">
                <img src="<?= base_url('imgs/arrowleft_black.png') ?>" alt="Image">
            </div>
            <div class='headtxt' style="margin-left: 45px;">
                <?= $header ?>
            </div>
        </div>
        <div style="display: flex;justify-content: center;align-items: center; ">
            <img id='btn-menubar-open'style="width: 30px;position:relative;z-index:9;" src="<?= base_url('imgs/burger-bar.png') ?>" alt="Image" onClick="onCLickMenuBar()">
            <img id="btn-menubar-close" style="width: 25px;position:absolute;z-index:10;" src="<?= base_url('imgs/Close-icon-9iuh.png') ?>" alt="Image" onClick="onCLickMenuBarClose()">
        </div>
        <div class="menubarRight" id="menuBar">
               
                <div class="menu" id="colortest" onClick='onCLickDropDownMenuSalary()'>Salary<div class='tgshapDown' id='tgshapSalary' "></div></div>
                <div class='menuDrop' id='dropSalary'style='display:none;' >
                        <a id="colortest">test1</a>
                        <a id="colortest">test2</a>
                        <a id="colortest">test3</a>
                </div>
           
            <span id="underLine"></span>
            <div class="menu" onClick='onCLickDropDownMenuIncome()'>Income/Deduction<div class='tgshapDown' id='tgshapIncome'></div></div>
            <div class='menuDrop' id='dropIncome'style='display:none;'>
                    <a>1</a>
                    <a>2</a>
                    <a>3</a>
            </div>
            <span id="underLine"></span>

            <div class="menu" id="colortest" onClick='onCLickDropDownMenuOver()'>Overtime<div class='tgshapDown' id='tgshapOver'></div></div>
            <div class='menuDrop' id='dropOver'style='display:none;'>
                    <a id="colortest">1</a>
                    <a id="colortest">2</a>
                    <a id="colortest">3</a>
            </div>
            <span id="underLine"></span>
            <div class="menu" onClick='onCLickDropDownMenuAbsence()'>Absence Deduct<div class='tgshapDown' id='tgshapAbsence'></div></div>
            <div class='menuDrop' id='dropAbsence'style='display:none;'>
                    <a>1</a>
                    <a>2</a>
                    <a>3</a>
            </div>
            <span id="underLine"></span>
            <div class="menu" id="colortest" onClick='onCLickDropDownMenuLate()'>Late/Early Deduct<div class='tgshapDown' id='tgshapLate'></div></div>
            <div class='menuDrop' id='dropLate'style='display:none;'>
                    <a id="colortest">1</a>
                    <a id="colortest">2</a>
                    <a id="colortest">3</a>
            </div>
            <span id="underLine"></span>
            <div class="menu" onClick='onCLickDropDownMenuAccmulate()'>Accumulate<div class='tgshapDown' id='tgshapAccmulate'></div></div>
            <div class='menuDrop' id='dropAccmulate'style='display:none;'>
            <a>1</a>
                    <a>2</a>
                    <a>3</a>
            </div>
            <span id="underLine"></span>
            <div class="menu"id="colortest" onClick='onCLickDropDownMenuLiabi()'>Liabilities<div class='tgshapDown' id='tgshapLiabi'></div></div>
            <div class='menuDrop' id='dropLiabi'style='display:none;'>
                    <a id="colortest">1</a>
                    <a id="colortest">2</a>
                    <a id="colortest">3</a>
            </div>
            <span id="underLine"></span>
            <div class="menu" onClick='onCLickDropDownMenuAllow()'>Allowance<div class='tgshapDown' id='tgshapAllow'></div></div>
            <div class='menuDrop' id='dropAllow'style='display:none;'>
            <a>1</a>
                    <a>2</a>
                    <a>3</a>
            </div>
            <span id="underLine"></span>
            <div class="menu"id="colortest" onClick='onCLickDropDownMenuTax()' >Tax<div class='tgshapDown' id='tgshapTax'></div></div>
            <div class='menuDrop' id='dropTax'style='display:none;'>
                    <a id="colortest">1</a>
                    <a id="colortest">2</a>
                    <a id="colortest">3</a>
            </div>
            <span id="underLine"></span>
            <div class="menu" onClick='onCLickDropDownMenuSocial()'>Social Security<div class='tgshapDown' id='tgshapSocial'></div></div>
            <div class='menuDrop' id='dropSocial' style='display:none;'>
                  <a>1</a>
                    <a>2</a>
                    <a>3</a>
            </div>
            <span id="underLine"></span>
        </div>

    </div>
 
    <script>
       function onCLickDropDownMenuSalary(){

                document.getElementById('dropSalary').style.display == 'none' ?  document.getElementById('dropSalary').style.display = 'flex': document.getElementById('dropSalary').style.display = 'none';
            document.getElementById('dropIncome').style.display = 'none';
            document.getElementById('dropOver').style.display = 'none';
            document.getElementById('dropAbsence').style.display = 'none';
            document.getElementById('dropLate').style.display = 'none';
            document.getElementById('dropAccmulate').style.display = 'none';
            document.getElementById('dropLiabi').style.display = 'none';
            document.getElementById('dropAllow').style.display = 'none';
            document.getElementById('dropTax').style.display = 'none';
            document.getElementById('dropSocial').style.display = 'none';
            document.getElementById('tgshapSalary').className == 'tgshapDown' ? document.getElementById('tgshapSalary').className = 'tgshapUp' : document.getElementById('tgshapSalary').className = 'tgshapDown';
            document.getElementById('tgshapIncome').className = 'tgshapDown';
            document.getElementById('tgshapOver').className = 'tgshapDown'
            document.getElementById('tgshapAbsence').className = 'tgshapDown'
            document.getElementById('tgshapLate').className = 'tgshapDown'
            document.getElementById('tgshapAccmulate').className = 'tgshapDown'
            document.getElementById('tgshapLiabi').className = 'tgshapDown';
            document.getElementById('tgshapAllow').className = 'tgshapDown'
            document.getElementById('tgshapTax').className = 'tgshapDown'
            document.getElementById('tgshapSocial').className = 'tgshapDown'
        }
        function onCLickDropDownMenuIncome(){
            document.getElementById('dropIncome').style.display == 'none' ?  document.getElementById('dropIncome').style.display = 'flex': document.getElementById('dropIncome').style.display = 'none';
            document.getElementById('dropSalary').style.display = 'none';
            document.getElementById('dropOver').style.display = 'none';
            document.getElementById('dropAbsence').style.display = 'none';
            document.getElementById('dropLate').style.display = 'none';
            document.getElementById('dropAccmulate').style.display = 'none';
            document.getElementById('dropLiabi').style.display = 'none';
            document.getElementById('dropAllow').style.display = 'none';
            document.getElementById('dropTax').style.display = 'none';
            document.getElementById('dropSocial').style.display = 'none';
            document.getElementById('tgshapIncome').className == 'tgshapDown' ? document.getElementById('tgshapIncome').className = 'tgshapUp': document.getElementById('tgshapIncome').className = 'tgshapDown';
            document.getElementById('tgshapSalary').className = 'tgshapDown';
            document.getElementById('tgshapOver').className = 'tgshapDown'
            document.getElementById('tgshapAbsence').className = 'tgshapDown'
            document.getElementById('tgshapLate').className = 'tgshapDown'
            document.getElementById('tgshapAccmulate').className = 'tgshapDown'
            document.getElementById('tgshapLiabi').className = 'tgshapDown';
            document.getElementById('tgshapAllow').className = 'tgshapDown'
            document.getElementById('tgshapTax').className = 'tgshapDown'
            document.getElementById('tgshapSocial').className = 'tgshapDown'
        }
        function onCLickDropDownMenuOver(){
            document.getElementById('dropOver').style.display == 'none' ?  document.getElementById('dropOver').style.display = 'flex': document.getElementById('dropOver').style.display = 'none';
            document.getElementById('dropIncome').style.display = 'none';
            document.getElementById('dropSalary').style.display = 'none';
            document.getElementById('dropAbsence').style.display = 'none';
            document.getElementById('dropLate').style.display = 'none';
            document.getElementById('dropAccmulate').style.display = 'none';
            document.getElementById('dropLiabi').style.display = 'none';
            document.getElementById('dropAllow').style.display = 'none';
            document.getElementById('dropTax').style.display = 'none';
            document.getElementById('dropSocial').style.display = 'none';
            document.getElementById('tgshapOver').className == 'tgshapDown' ? document.getElementById('tgshapOver').className = 'tgshapUp': document.getElementById('tgshapOver').className = 'tgshapDown';
            document.getElementById('tgshapSalary').className = 'tgshapDown';
            document.getElementById('tgshapIncome').className = 'tgshapDown'
            document.getElementById('tgshapAbsence').className = 'tgshapDown'
            document.getElementById('tgshapLate').className = 'tgshapDown'
            document.getElementById('tgshapAccmulate').className = 'tgshapDown'
            document.getElementById('tgshapLiabi').className = 'tgshapDown';
            document.getElementById('tgshapAllow').className = 'tgshapDown'
            document.getElementById('tgshapTax').className = 'tgshapDown'
            document.getElementById('tgshapSocial').className = 'tgshapDown'
        }
        function onCLickDropDownMenuAbsence(){
            document.getElementById('dropAbsence').style.display == 'none' ?  document.getElementById('dropAbsence').style.display = 'flex': document.getElementById('dropAbsence').style.display = 'none';
            document.getElementById('dropIncome').style.display = 'none';
            document.getElementById('dropOver').style.display = 'none';
            document.getElementById('dropSalary').style.display = 'none';
            document.getElementById('dropLate').style.display = 'none';
            document.getElementById('dropAccmulate').style.display = 'none';
            document.getElementById('dropLiabi').style.display = 'none';
            document.getElementById('dropAllow').style.display = 'none';
            document.getElementById('dropTax').style.display = 'none';
            document.getElementById('dropSocial').style.display = 'none';
            document.getElementById('tgshapAbsence').className == 'tgshapDown' ? document.getElementById('tgshapAbsence').className = 'tgshapUp': document.getElementById('tgshapAbsence').className = 'tgshapDown';
            document.getElementById('tgshapSalary').className = 'tgshapDown';
            document.getElementById('tgshapIncome').className = 'tgshapDown'
            document.getElementById('tgshapOver').className = 'tgshapDown'
            document.getElementById('tgshapLate').className = 'tgshapDown'
            document.getElementById('tgshapAccmulate').className = 'tgshapDown'
            document.getElementById('tgshapLiabi').className = 'tgshapDown';
            document.getElementById('tgshapAllow').className = 'tgshapDown'
            document.getElementById('tgshapTax').className = 'tgshapDown'
            document.getElementById('tgshapSocial').className = 'tgshapDown'
        }
        function onCLickDropDownMenuLate(){
            document.getElementById('dropLate').style.display == 'none' ?  document.getElementById('dropLate').style.display = 'flex': document.getElementById('dropLate').style.display = 'none';
            document.getElementById('dropIncome').style.display = 'none';
            document.getElementById('dropOver').style.display = 'none';
            document.getElementById('dropAbsence').style.display = 'none';
            document.getElementById('dropSalary').style.display = 'none';
            document.getElementById('dropAccmulate').style.display = 'none';
            document.getElementById('dropLiabi').style.display = 'none';
            document.getElementById('dropAllow').style.display = 'none';
            document.getElementById('dropTax').style.display = 'none';
            document.getElementById('dropSocial').style.display = 'none';
            document.getElementById('tgshapLate').className == 'tgshapDown' ? document.getElementById('tgshapLate').className = 'tgshapUp': document.getElementById('tgshapLate').className = 'tgshapDown';
            document.getElementById('tgshapSalary').className = 'tgshapDown';
            document.getElementById('tgshapIncome').className = 'tgshapDown'
            document.getElementById('tgshapOver').className = 'tgshapDown'
            document.getElementById('tgshapAbsence').className = 'tgshapDown'
            document.getElementById('tgshapAccmulate').className = 'tgshapDown'
            document.getElementById('tgshapLiabi').className = 'tgshapDown';
            document.getElementById('tgshapAllow').className = 'tgshapDown'
            document.getElementById('tgshapTax').className = 'tgshapDown'
            document.getElementById('tgshapSocial').className = 'tgshapDown'
        }
        function onCLickDropDownMenuAccmulate(){
            document.getElementById('dropAccmulate').style.display == 'none' ?  document.getElementById('dropAccmulate').style.display = 'flex': document.getElementById('dropAccmulate').style.display = 'none';
            document.getElementById('dropIncome').style.display = 'none';
            document.getElementById('dropOver').style.display = 'none';
            document.getElementById('dropAbsence').style.display = 'none';
            document.getElementById('dropLate').style.display = 'none';
            document.getElementById('dropSalary').style.display = 'none';
            document.getElementById('dropLiabi').style.display = 'none';
            document.getElementById('dropAllow').style.display = 'none';
            document.getElementById('dropTax').style.display = 'none';
            document.getElementById('dropSocial').style.display = 'none';
            document.getElementById('tgshapAccmulate').className == 'tgshapDown' ? document.getElementById('tgshapAccmulate').className = 'tgshapUp': document.getElementById('tgshapAccmulate').className = 'tgshapDown';
            document.getElementById('tgshapIncome').className = 'tgshapDown';
            document.getElementById('tgshapOver').className = 'tgshapDown'
            document.getElementById('tgshapAbsence').className = 'tgshapDown'
            document.getElementById('tgshapLate').className = 'tgshapDown'
            document.getElementById('tgshapSalary').className = 'tgshapDown'
            document.getElementById('tgshapLiabi').className = 'tgshapDown';
            document.getElementById('tgshapAllow').className = 'tgshapDown'
            document.getElementById('tgshapTax').className = 'tgshapDown'
            document.getElementById('tgshapSocial').className = 'tgshapDown'
        }
        function onCLickDropDownMenuLiabi(){
            document.getElementById('dropLiabi').style.display == 'none' ?  document.getElementById('dropLiabi').style.display = 'flex': document.getElementById('dropLiabi').style.display = 'none';
            document.getElementById('dropIncome').style.display = 'none';
            document.getElementById('dropOver').style.display = 'none';
            document.getElementById('dropAbsence').style.display = 'none';
            document.getElementById('dropLate').style.display = 'none';
            document.getElementById('dropAccmulate').style.display = 'none';
            document.getElementById('dropSalary').style.display = 'none';
            document.getElementById('dropAllow').style.display = 'none';
            document.getElementById('dropTax').style.display = 'none';
            document.getElementById('dropSocial').style.display = 'none';
            document.getElementById('tgshapLiabi').className == 'tgshapDown' ? document.getElementById('tgshapLiabi').className = 'tgshapUp': document.getElementById('tgshapLiabi').className = 'tgshapDown';
            document.getElementById('tgshapIncome').className = 'tgshapDown';
            document.getElementById('tgshapOver').className = 'tgshapDown'
            document.getElementById('tgshapAbsence').className = 'tgshapDown'
            document.getElementById('tgshapLate').className = 'tgshapDown'
            document.getElementById('tgshapAccmulate').className = 'tgshapDown'
            document.getElementById('tgshapSalary').className = 'tgshapDown';
            document.getElementById('tgshapAllow').className = 'tgshapDown'
            document.getElementById('tgshapTax').className = 'tgshapDown'
            document.getElementById('tgshapSocial').className = 'tgshapDown'
        }
        function onCLickDropDownMenuAllow(){
            document.getElementById('dropAllow').style.display == 'none' ?  document.getElementById('dropAllow').style.display = 'flex': document.getElementById('dropAllow').style.display = 'none';
            document.getElementById('dropIncome').style.display = 'none';
            document.getElementById('dropOver').style.display = 'none';
            document.getElementById('dropAbsence').style.display = 'none';
            document.getElementById('dropLate').style.display = 'none';
            document.getElementById('dropAccmulate').style.display = 'none';
            document.getElementById('dropLiabi').style.display = 'none';
            document.getElementById('dropSalary').style.display = 'none';
            document.getElementById('dropTax').style.display = 'none';
            document.getElementById('dropSocial').style.display = 'none';
            document.getElementById('tgshapAllow').className == 'tgshapDown' ? document.getElementById('tgshapAllow').className = 'tgshapUp': document.getElementById('tgshapAllow').className = 'tgshapDown';
            document.getElementById('tgshapIncome').className = 'tgshapDown';
            document.getElementById('tgshapOver').className = 'tgshapDown'
            document.getElementById('tgshapAbsence').className = 'tgshapDown'
            document.getElementById('tgshapLate').className = 'tgshapDown'
            document.getElementById('tgshapAccmulate').className = 'tgshapDown'
            document.getElementById('tgshapLiabi').className = 'tgshapDown';
            document.getElementById('tgshapSalary').className = 'tgshapDown'
            document.getElementById('tgshapTax').className = 'tgshapDown'
            document.getElementById('tgshapSocial').className = 'tgshapDown'
        }

        function onCLickDropDownMenuTax(){
            document.getElementById('dropTax').style.display == 'none' ?  document.getElementById('dropTax').style.display = 'flex': document.getElementById('dropTax').style.display = 'none';
            document.getElementById('dropIncome').style.display = 'none';
            document.getElementById('dropOver').style.display = 'none';
            document.getElementById('dropAbsence').style.display = 'none';
            document.getElementById('dropLate').style.display = 'none';
            document.getElementById('dropAccmulate').style.display = 'none';
            document.getElementById('dropLiabi').style.display = 'none';
            document.getElementById('dropAllow').style.display = 'none';
            document.getElementById('dropSalary').style.display = 'none';
            document.getElementById('dropSocial').style.display = 'none';
            document.getElementById('tgshapTax').className == 'tgshapDown' ? document.getElementById('tgshapTax').className = 'tgshapUp': document.getElementById('tgshapTax').className = 'tgshapDown';
            document.getElementById('tgshapIncome').className = 'tgshapDown';
            document.getElementById('tgshapOver').className = 'tgshapDown'
            document.getElementById('tgshapAbsence').className = 'tgshapDown'
            document.getElementById('tgshapLate').className = 'tgshapDown'
            document.getElementById('tgshapAccmulate').className = 'tgshapDown'
            document.getElementById('tgshapLiabi').className = 'tgshapDown';
            document.getElementById('tgshapAllow').className = 'tgshapDown'
            document.getElementById('tgshapSalary').className = 'tgshapDown'
            document.getElementById('tgshapSocial').className = 'tgshapDown'
        }
        function onCLickDropDownMenuSocial(){
            document.getElementById('dropSocial').style.display == 'none' ?  document.getElementById('dropSocial').style.display = 'flex': document.getElementById('dropSocial').style.display = 'none';
            document.getElementById('dropIncome').style.display = 'none';
            document.getElementById('dropOver').style.display = 'none';
            document.getElementById('dropAbsence').style.display = 'none';
            document.getElementById('dropLate').style.display = 'none';
            document.getElementById('dropAccmulate').style.display = 'none';
            document.getElementById('dropLiabi').style.display = 'none';
            document.getElementById('dropAllow').style.display = 'none';
            document.getElementById('dropTax').style.display = 'none';
            document.getElementById('dropSalary').style.display = 'none';
            document.getElementById('tgshapSocial').className == 'tgshapDown' ? document.getElementById('tgshapSocial').className = 'tgshapUp': document.getElementById('tgshapSocial').className = 'tgshapDown';
            document.getElementById('tgshapIncome').className = 'tgshapDown';
            document.getElementById('tgshapOver').className = 'tgshapDown'
            document.getElementById('tgshapAbsence').className = 'tgshapDown'
            document.getElementById('tgshapLate').className = 'tgshapDown'
            document.getElementById('tgshapAccmulate').className = 'tgshapDown'
            document.getElementById('tgshapLiabi').className = 'tgshapDown';
            document.getElementById('tgshapAllow').className = 'tgshapDown'
            document.getElementById('tgshapTax').className = 'tgshapDown'
            document.getElementById('tgshapSalary').className = 'tgshapDown'
        }
        function onCLickMenuBar(){
            document.getElementById("menuBar").style.animation = 'slide 0.25s forwards'
            document.getElementById("menuBar").className = "menubarRight_Active"
            document.getElementById('btn-menubar-open').style.display = 'none'
            document.getElementById('btn-menubar-close').style.display = 'block'
        }
       function onCLickMenuBarClose(){
// document.getElementById("menuBar").style.animation =  'slideCloesed 0.5s forwards'
// document.getElementById("menuBar").className =  "menubarRightWait"
            document.getElementById('btn-menubar-open').style.display =  'block'
            // // 
            document.getElementById('btn-menubar-close').style.display =  'none'
          
            
            document.getElementById("menuBar").className =  "menubarRight"
        }
     
        </script>