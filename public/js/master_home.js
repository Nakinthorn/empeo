var token;
get_token()
async function get_token() {
    try {
        token = localStorage.token;
        getAPI_listmenu()
        
    } catch (err) {
        console.log('err',err)
    }
}
//
let response_list;
async function getAPI_listmenu() {
    
        try {
          let headersList = {
            Accept: "*/*",
            "Content-Type": "application/json",
          };
      
          let bodyContent = JSON.stringify({
            token: token          });
      
          let response = await fetch(
            "http://localhost:3333/mobile/Get-Master-List",
            {
              method: "POST",
              body: bodyContent,
              headers: headersList,
            }
          );
      
            let data = await response.json();
            response_list = data.data
            data = data.data;
            console.log(data);
            
            //list master_data
            data.forEach((item, index) => {
                const i = index + 1
                let text_des;
                const check_name_th = ["ธนาคาร","อาชีพ","เหตุผลการลาออก","ประเภทเอกสารแนบ","ประเภทพนักงาน","กฎระเบียบบริษัท","หมวดหมู่หลักสูตร","ประเภททักษะ","ชุดทักษะ","เหตุผลการพ้นสภาพ"]
                const check_name_en = [' ตัวเลือกธนาคารในการทำจ่ายรายการต่างๆ เช่น การทำจ่ายเงินเดือนให้พนักงาน '
                    , 'ตัวเลือกในการเพิ่มข้อมูลอาชีพของสมาชิกครอบครัวพนักงาน',
                    ' ตัวเลือกเหตุผลเบื้องต้น กรณีพนักงานสร้างเอกสารขอลาออก ',
                    ' สำหรับจำแนกประเภทเอกสารการทำงาน และเอกสารทางราชการของพนักงาน ',
                    ' สำหรับจำแนกพนักงานบนระบบ เช่น พนักงานประจำ พาร์ตไทม์ ชั่วคราว รายวัน หรือฝึกงาน เป็นต้น ',
                    ' สำหรับจำแนกลักษณะการกระทำที่พนักงานได้ฝ่าฝืน ในการสร้างหนังสือเตือน ',
                    ' สำหรับจำแนกทักษะในระบบ ตามคุณสมบัติของทักษะ ',
                    '  สำหรับจำแนกทักษะในระบบ ตามคุณสมบัติของทักษะ ',
                    ' สำหรับจำแนกทักษะในระบบ ตามความเหมาะสมในแต่ละตำแหน่งหรือลักษณะงาน ',
                    ' เหตุผลการพ้นสภาพ ']
                  if (check_name_th[index] == item.mastergroup) {
                    text_des= check_name_en[index].trim()
                  }
                document.querySelector('#master_home-content').innerHTML += `
                <div class="master_home-content-item" id="master_home-content-item">
                                <div class="master_home-content-item-icon">
                                   <span></span>
                                </div>
                                <div class="master_home-content-item-detail">
                                    <div class="master_home-content-item-detail-name">
                                            ${item.mastergroup}
                                    </div>
                                    <div class="master_home-content-item-detail-des">
                                        ${text_des}
                                    </div>
                                </div>
                 </div>
                
                `

            })
//  <span class="material-symbols-outlined">
//                                         quick_reference_all
//                                     </span>
            click_master_list() 

        }catch(err){
            console.log(err)
        }
    

} 
//
    //
//
let checkpage;
function click_master_list() {
    const list_menu = [ ]
    document.querySelectorAll('#master_home-content-item').forEach((e,index) => {
        const i = index+1
        e.addEventListener('click', () => {
            document.querySelector(".container_master_data").style.cssText += `overflow : hidden;`
            document.querySelector('#master_home-content').style.display = 'none';
            document.querySelector('#master_home-content-table').style.display = 'flex'
            checkpage = i
            fetch_table(i)
        })
    })
    document.querySelector('#master_home-header-icon').addEventListener('click', () => {
        document.querySelector('#data_table_master').innerHTML = ``
        document.querySelector(".container_master_data").style.cssText += `overflow : scroll;`
        document.querySelector('#master_home-content').style.display = 'flex';                        
        document.querySelector('#master_home-content-table').style.display= 'none'
    })
}

//
    //
//
let number_menu;
async function fetch_table(num) {
    console.log('income',num-1)
    number_menu = num-1
    const callfuc = [
        getAPI_master_bank,
        getAPI_master_creer,
        getAPI_master_reasonforleaving,
        getAPI_master_attachment,
        getAPI_master_employee_type,
        getAPI_master_companyreg,
        getAPI_master_coursecategory,
        getAPI_master_skilltype,
        getAPI_master_skillset,
        getAPI_master_reasonforseparation
        
    ];
    
    if (num >= 1 && num <= callfuc.length) {
      try {
          const data = await callfuc[num - 1]();
            hovermosuer()
          
        // console.log(data);
      } catch (error) {
        console.log(error);
      }
    } else {
        console.log('data null')
    }
}

/////////////////////////////
/////////
/////////////////////////////
   

/////////////////////////////
/////////
/////////////////////////////
let data_page


async function getAPI_master_bank() {
    try {
        let headersList = {
            Accept: "*/*",
            "Content-Type": "application/json",
        };
    
        let bodyContent = JSON.stringify({
            token: token        });
   
        let response = await fetch(
            "http://localhost:3333/mobile/Get-Master-Bank",
            {
                method: "POST",
                body: bodyContent,
                headers: headersList,
            }
        );
    
        let data = await response.json();
        data = data.data;
        console.log(data)
        document.querySelector('#data_table_master').innerHTML = ``
        data.forEach((e,index) => {
            
            let statenew;const loop = index+1
            let creatID ;
            if(e.status == 'active'){
                statenew = 'ใช้งาน'
                creatID = 'active';displaytr = 'table-row'
            }else if(e.status == 'Inactive'){
                statenew = 'ไม่ใช้งาน'
                creatID = 'Inactive';displaytr = 'table-row'
            }else{
                statenew = 'ถูกลบ'
                creatID = 'unactive';displaytr = 'none'
            }
            
            // console.log(e)
            document.querySelector('#data_table_master').innerHTML += `

            <tr id="tr_master_data" style="display : `+displaytr+`;">
                <td style="text-align: center;">${loop}</td>
                <td>${e.mastergroup}</td>
                <td>${e.optionname}</td>
                <td class="master_data_des">${e.description}</td>
                <td>${e.payrolldata}</td>
                <td><p>${e.name_modified}</p>${e.date_modified}</td>
                <td class="master_data_status_td"><span class='state_active_content' id="state_${creatID}">${statenew}</span></td>
                <td  id="tr_icon">
                <div class="master_data_icon_more" >
                     <span class="material-symbols-outlined" id="master_data_icon_more">more_vert</span>
                    <div class="master_data_icon_more-popup" style="display:none">
                        <div class="arrow_pop_inside"></div>
                        <div class="list_inside_master" style="margin-bottom: 5px;" id="open_edit_master_data"><span class="material-symbols-outlined" id="icon_master_eidit">edit</span>แก้ไข</div>
                        <div class="list_inside_master" id="open_delete_master_data"><span class="material-symbols-outlined" id="icon_master_eidit">delete</span>ลบ</div></div>
                     </div>
                </td>
            </tr>
            `
          
        })
        
        
        const searchInput = document.getElementById('search_position');
        searchInput.value = '';

        searchInput.addEventListener('input', () => {
            const searchText = searchInput.value.toLowerCase();
            const tableRows = document.querySelectorAll('#data_table_master tr'); // Get all table rows

            tableRows.forEach((row) => {
            const optionname = row.querySelector('td:nth-child(3)').innerText.toLowerCase();
            const displaytr = optionname.includes(searchText) ? 'table-row' : 'none';
            row.style.display = displaytr;
            });
        });
        intable(data)
        
    } catch (err) {
        console.log(err)
    }
}
async function getAPI_master_creer() {
    try {
        let headersList = {
            Accept: "*/*",
            "Content-Type": "application/json",
        };
    
        let bodyContent = JSON.stringify({
            token:
                token,
        });
    
        let response = await fetch(
            "http://localhost:3333/mobile/Get-Master-Career",
            {
                method: "POST",
                body: bodyContent,
                headers: headersList,
            }
        );
    
        let data = await response.json();
        data = data.data;
        document.querySelector('#data_table_master').innerHTML = ``
        data.forEach((e,index) => {
            let statenew;const loop = index+1
            let creatID ;
            if(e.status == 'active'){
                statenew = 'ใช้งาน'
                creatID = 'active';displaytr = 'table-row'
            }else if(e.status == 'Inactive'){
                statenew = 'ไม่ใช้งาน'
                creatID = 'Inactive';displaytr = 'table-row'
            }else{
                statenew = 'ถูกลบ'
                creatID = 'unactive';displaytr = 'none'
            }
            
            // console.log(e)
            document.querySelector('#data_table_master').innerHTML += `

            <tr id="tr_master_data" style="display : `+displaytr+`;">
                <td style="text-align: center;">${loop}</td>
                <td>${e.mastergroup}</td>
                <td>${e.optionname}</td>
                <td class="master_data_des">${e.description}</td>
                <td>${e.payrolldata}</td>
                <td><p>${e.name_modified}</p>${e.date_modified}</td>
                <td class="master_data_status_td"><span class='state_active_content' id="state_${creatID}">${statenew}</span></td>
                <td  id="tr_icon">
                <div class="master_data_icon_more" >
                     <span class="material-symbols-outlined" id="master_data_icon_more">more_vert</span>
                    <div class="master_data_icon_more-popup" style="display:none">
                        <div class="arrow_pop_inside"></div>
                        <div class="list_inside_master" style="margin-bottom: 5px;" id="open_edit_master_data"><span class="material-symbols-outlined" id="icon_master_eidit">edit</span>แก้ไข</div>
                        <div class="list_inside_master" id="open_delete_master_data"><span class="material-symbols-outlined" id="icon_master_eidit">delete</span>ลบ</div></div>
                     </div>
                </td>
            </tr>
            `
          
        })
        const searchInput = document.getElementById('search_position');
        searchInput.value = '';

        searchInput.addEventListener('input', () => {
            const searchText = searchInput.value.toLowerCase();
            const tableRows = document.querySelectorAll('#data_table_master tr'); // Get all table rows

            tableRows.forEach((row) => {
            const optionname = row.querySelector('td:nth-child(3)').innerText.toLowerCase();
            const displaytr = optionname.includes(searchText) ? 'table-row' : 'none';
            row.style.display = displaytr;
            });
        });
        intable(data)
    } catch (err) {
        console.log(err)
    }
}
async function getAPI_master_reasonforleaving() {
    try {
        let headersList = {
            Accept: "*/*",
            "Content-Type": "application/json",
        };
    
        let bodyContent = JSON.stringify({
            token:
                token,
        });
    
        let response = await fetch(
            "http://localhost:3333/mobile/Get-Master-Reasonforleaving",
            {
                method: "POST",
                body: bodyContent,
                headers: headersList,
            }
        );
    
        let data = await response.json();
        data = data.data;
        document.querySelector('#data_table_master').innerHTML = ``
        data.forEach((e,index) => {
            let statenew;const loop = index+1
            let creatID ;
            if(e.status == 'active'){
                statenew = 'ใช้งาน'
                creatID = 'active';displaytr = 'table-row'
            }else if(e.status == 'Inactive'){
                statenew = 'ไม่ใช้งาน'
                creatID = 'Inactive';displaytr = 'table-row'
            }else{
                statenew = 'ถูกลบ'
                creatID = 'unactive';displaytr = 'none'
            }
            
            // console.log(e)
            document.querySelector('#data_table_master').innerHTML += `

            <tr id="tr_master_data" style="display : `+displaytr+`;">
                <td style="text-align: center;">${loop}</td>
                <td>${e.mastergroup}</td>
                <td>${e.optionname}</td>
                <td class="master_data_des">${e.description}</td>
                <td>${e.payrolldata}</td>
                <td><p>${e.name_modified}</p>${e.date_modified}</td>
                <td class="master_data_status_td"><span class='state_active_content' id="state_${creatID}">${statenew}</span></td>
                <td  id="tr_icon">
                <div class="master_data_icon_more" >
                     <span class="material-symbols-outlined" id="master_data_icon_more">more_vert</span>
                    <div class="master_data_icon_more-popup" style="display:none">
                        <div class="arrow_pop_inside"></div>
                        <div class="list_inside_master" style="margin-bottom: 5px;" id="open_edit_master_data"><span class="material-symbols-outlined" id="icon_master_eidit">edit</span>แก้ไข</div>
                        <div class="list_inside_master" id="open_delete_master_data"><span class="material-symbols-outlined" id="icon_master_eidit">delete</span>ลบ</div></div>
                     </div>
                </td>
            </tr>
            `
          
        })
        const searchInput = document.getElementById('search_position');
        searchInput.value = '';

        searchInput.addEventListener('input', () => {
            const searchText = searchInput.value.toLowerCase();
            const tableRows = document.querySelectorAll('#data_table_master tr'); // Get all table rows

            tableRows.forEach((row) => {
            const optionname = row.querySelector('td:nth-child(3)').innerText.toLowerCase();
            const displaytr = optionname.includes(searchText) ? 'table-row' : 'none';
            row.style.display = displaytr;
            });
        });
        
        intable(data)
        
    } catch (err) {
        console.log(err)
    }
}
async function getAPI_master_attachment() {
    try {
        let headersList = {
            Accept: "*/*",
            "Content-Type": "application/json",
        };
    
        let bodyContent = JSON.stringify({
            token:
                token,
        });
    
        let response = await fetch(
            "http://localhost:3333/mobile/Get-Master-Attachment",
            {
                method: "POST",
                body: bodyContent,
                headers: headersList,
            }
        );
    
        let data = await response.json();
        data = data.data;
        document.querySelector('#data_table_master').innerHTML = ``
        data.forEach((e,index) => {
            let statenew;const loop = index+1
            let creatID ;
            if(e.status == 'active'){
                statenew = 'ใช้งาน'
                creatID = 'active';displaytr = 'table-row'
            }else if(e.status == 'Inactive'){
                statenew = 'ไม่ใช้งาน'
                creatID = 'Inactive';displaytr = 'table-row'
            }else{
                statenew = 'ถูกลบ'
                creatID = 'unactive';displaytr = 'none'
            }
            
            // console.log(e)
            document.querySelector('#data_table_master').innerHTML += `

            <tr id="tr_master_data" style="display : `+displaytr+`;">
                <td style="text-align: center;">${loop}</td>
                <td>${e.mastergroup}</td>
                <td>${e.optionname}</td>
                <td class="master_data_des">${e.description}</td>
                <td>${e.payrolldata}</td>
                <td><p>${e.name_modified}</p>${e.date_modified}</td>
                <td class="master_data_status_td"><span class='state_active_content' id="state_${creatID}">${statenew}</span></td>
                <td  id="tr_icon">
                <div class="master_data_icon_more" >
                     <span class="material-symbols-outlined" id="master_data_icon_more">more_vert</span>
                    <div class="master_data_icon_more-popup" style="display:none">
                        <div class="arrow_pop_inside"></div>
                        <div class="list_inside_master" style="margin-bottom: 5px;" id="open_edit_master_data"><span class="material-symbols-outlined" id="icon_master_eidit">edit</span>แก้ไข</div>
                        <div class="list_inside_master" id="open_delete_master_data"><span class="material-symbols-outlined" id="icon_master_eidit">delete</span>ลบ</div></div>
                     </div>
                </td>
            </tr>
            `
          
        })

        const searchInput = document.getElementById('search_position');
        searchInput.value = '';

        searchInput.addEventListener('input', () => {
            const searchText = searchInput.value.toLowerCase();
            const tableRows = document.querySelectorAll('#data_table_master tr'); // Get all table rows

            tableRows.forEach((row) => {
            const optionname = row.querySelector('td:nth-child(3)').innerText.toLowerCase();
            const displaytr = optionname.includes(searchText) ? 'table-row' : 'none';
            row.style.display = displaytr;
            });
        });
        intable(data)
        
    } catch (err) {
        console.log(err)
    }
}
async function getAPI_master_employee_type() {
    try {
        let headersList = {
            Accept: "*/*",
            "Content-Type": "application/json",
        };
    
        let bodyContent = JSON.stringify({
            token:
                token,
        });
    
        let response = await fetch(
            "http://localhost:3333/mobile/Get-Master-Employee_type",
            {
                method: "POST",
                body: bodyContent,
                headers: headersList,
            }
        );
        
        let data = await response.json();
        data = data.data;
        document.querySelector('#data_table_master').innerHTML = ``
        data.forEach((e,index) => {
            let statenew;const loop = index+1
            let creatID ;
            if(e.status == 'active'){
                statenew = 'ใช้งาน'
                creatID = 'active';displaytr = 'table-row'
            }else if(e.status == 'Inactive'){
                statenew = 'ไม่ใช้งาน'
                creatID = 'Inactive';displaytr = 'table-row'
            }else{
                statenew = 'ถูกลบ'
                creatID = 'unactive';displaytr = 'none'
            }
            
            // console.log(e)
            document.querySelector('#data_table_master').innerHTML += `

            <tr id="tr_master_data" style="display : `+displaytr+`;">
                <td style="text-align: center;">${loop}</td>
                <td>${e.mastergroup}</td>
                <td>${e.optionname}</td>
                <td class="master_data_des">${e.description}</td>
                <td>${e.payrolldata}</td>
                <td><p>${e.name_modified}</p>${e.date_modified}</td>
                <td class="master_data_status_td"><span class='state_active_content' id="state_${creatID}">${statenew}</span></td>
                <td  id="tr_icon">
                <div class="master_data_icon_more" >
                     <span class="material-symbols-outlined" id="master_data_icon_more">more_vert</span>
                    <div class="master_data_icon_more-popup" style="display:none">
                        <div class="arrow_pop_inside"></div>
                        <div class="list_inside_master" style="margin-bottom: 5px;" id="open_edit_master_data"><span class="material-symbols-outlined" id="icon_master_eidit">edit</span>แก้ไข</div>
                        <div class="list_inside_master" id="open_delete_master_data"><span class="material-symbols-outlined" id="icon_master_eidit">delete</span>ลบ</div></div>
                     </div>
                </td>
            </tr>
            `
          
        })
        const searchInput = document.getElementById('search_position');
        searchInput.value = '';

        searchInput.addEventListener('input', () => {
            const searchText = searchInput.value.toLowerCase();
            const tableRows = document.querySelectorAll('#data_table_master tr'); // Get all table rows

            tableRows.forEach((row) => {
            const optionname = row.querySelector('td:nth-child(3)').innerText.toLowerCase();
            const displaytr = optionname.includes(searchText) ? 'table-row' : 'none';
            row.style.display = displaytr;
            });
        });
        intable(data)
        
    } catch (err) {
        console.log(err)
    }
}
async function getAPI_master_companyreg() {
    try {
        let headersList = {
            Accept: "*/*",
            "Content-Type": "application/json",
        };
    
        let bodyContent = JSON.stringify({
            token:
                token,
        });
    
        let response = await fetch(
            "http://localhost:3333/mobile/Get-Master-Companyreg",
            {
                method: "POST",
                body: bodyContent,
                headers: headersList,
            }
        );
    
        let data = await response.json();
        data = data.data;
        document.querySelector('#data_table_master').innerHTML = ``
        data.forEach((e,index) => {
            let statenew;const loop = index+1
            let creatID ;
            if(e.status == 'active'){
                statenew = 'ใช้งาน'
                creatID = 'active';displaytr = 'table-row'
            }else if(e.status == 'Inactive'){
                statenew = 'ไม่ใช้งาน'
                creatID = 'Inactive';displaytr = 'table-row'
            }else{
                statenew = 'ถูกลบ'
                creatID = 'unactive';displaytr = 'none'
            }
            
            // console.log(e)
            document.querySelector('#data_table_master').innerHTML += `

            <tr id="tr_master_data" style="display : `+displaytr+`;">
                <td style="text-align: center;">${loop}</td>
                <td>${e.mastergroup}</td>
                <td>${e.optionname}</td>
                <td class="master_data_des">${e.description}</td>
                <td>${e.payrolldata}</td>
                <td><p>${e.name_modified}</p>${e.date_modified}</td>
                <td class="master_data_status_td"><span class='state_active_content' id="state_${creatID}">${statenew}</span></td>
                <td  id="tr_icon">
                <div class="master_data_icon_more" >
                     <span class="material-symbols-outlined" id="master_data_icon_more">more_vert</span>
                    <div class="master_data_icon_more-popup" style="display:none">
                        <div class="arrow_pop_inside"></div>
                        <div class="list_inside_master" style="margin-bottom: 5px;" id="open_edit_master_data"><span class="material-symbols-outlined" id="icon_master_eidit">edit</span>แก้ไข</div>
                        <div class="list_inside_master" id="open_delete_master_data"><span class="material-symbols-outlined" id="icon_master_eidit">delete</span>ลบ</div></div>
                     </div>
                </td>
            </tr>
            `
          
        })

        const searchInput = document.getElementById('search_position');
        searchInput.value = '';

        searchInput.addEventListener('input', () => {
            const searchText = searchInput.value.toLowerCase();
            const tableRows = document.querySelectorAll('#data_table_master tr'); // Get all table rows

            tableRows.forEach((row) => {
            const optionname = row.querySelector('td:nth-child(3)').innerText.toLowerCase();
            const displaytr = optionname.includes(searchText) ? 'table-row' : 'none';
            row.style.display = displaytr;
            });
        });
        intable(data)
        
    } catch (err) {
        console.log(err)
    }
}

async function getAPI_master_coursecategory() {
    try {
        let headersList = {
            Accept: "*/*",
            "Content-Type": "application/json",
        };
    
        let bodyContent = JSON.stringify({
            token:
                token,
        });
    
        let response = await fetch(
            "http://localhost:3333/mobile/Get-Master-Coursecategory",
            {
                method: "POST",
                body: bodyContent,
                headers: headersList,
            }
        );
    
        let data = await response.json();
        data = data.data;
        document.querySelector('#data_table_master').innerHTML = ``
        data.forEach((e,index) => {
            let statenew;const loop = index+1
            let creatID ;
            if(e.status == 'active'){
                statenew = 'ใช้งาน'
                creatID = 'active';displaytr = 'table-row'
            }else if(e.status == 'Inactive'){
                statenew = 'ไม่ใช้งาน'
                creatID = 'Inactive';displaytr = 'table-row'
            }else{
                statenew = 'ถูกลบ'
                creatID = 'unactive';displaytr = 'none'
            }
            
            // console.log(e)
            document.querySelector('#data_table_master').innerHTML += `

            <tr id="tr_master_data" style="display : `+displaytr+`;">
                <td style="text-align: center;">${loop}</td>
                <td>${e.mastergroup}</td>
                <td>${e.optionname}</td>
                <td class="master_data_des">${e.description}</td>
                <td>${e.payrolldata}</td>
                <td><p>${e.name_modified}</p>${e.date_modified}</td>
                <td class="master_data_status_td"><span class='state_active_content' id="state_${creatID}">${statenew}</span></td>
                <td  id="tr_icon">
                <div class="master_data_icon_more" >
                     <span class="material-symbols-outlined" id="master_data_icon_more">more_vert</span>
                    <div class="master_data_icon_more-popup" style="display:none">
                        <div class="arrow_pop_inside"></div>
                        <div class="list_inside_master" style="margin-bottom: 5px;" id="open_edit_master_data"><span class="material-symbols-outlined" id="icon_master_eidit">edit</span>แก้ไข</div>
                        <div class="list_inside_master" id="open_delete_master_data"><span class="material-symbols-outlined" id="icon_master_eidit">delete</span>ลบ</div></div>
                     </div>
                </td>
            </tr>
            `
          
        })

        
        const searchInput = document.getElementById('search_position');
        searchInput.value = '';

        searchInput.addEventListener('input', () => {
            const searchText = searchInput.value.toLowerCase();
            const tableRows = document.querySelectorAll('#data_table_master tr'); // Get all table rows

            tableRows.forEach((row) => {
            const optionname = row.querySelector('td:nth-child(3)').innerText.toLowerCase();
            const displaytr = optionname.includes(searchText) ? 'table-row' : 'none';
            row.style.display = displaytr;
            });
        });
        intable(data)
        
    } catch (err) {
        console.log(err)
    }
}
async function getAPI_master_skilltype() {
    try {
        let headersList = {
            Accept: "*/*",
            "Content-Type": "application/json",
        };
    
        let bodyContent = JSON.stringify({
            token:
                token,
        });
    
        let response = await fetch(
            "http://localhost:3333/mobile/Get-Master-Skilltype",
            {
                method: "POST",
                body: bodyContent,
                headers: headersList,
            }
        );
    
        let data = await response.json();
        data = data.data;
        document.querySelector('#data_table_master').innerHTML = ``
        data.forEach((e,index) => {
            let statenew;const loop = index+1
            let creatID ;
            if(e.status == 'active'){
                statenew = 'ใช้งาน'
                creatID = 'active';displaytr = 'table-row'
            }else if(e.status == 'Inactive'){
                statenew = 'ไม่ใช้งาน'
                creatID = 'Inactive';displaytr = 'table-row'
            }else{
                statenew = 'ถูกลบ'
                creatID = 'unactive';displaytr = 'none'
            }
            
            // console.log(e)
            document.querySelector('#data_table_master').innerHTML += `

            <tr id="tr_master_data" style="display : `+displaytr+`;">
                <td style="text-align: center;">${loop}</td>
                <td>${e.mastergroup}</td>
                <td>${e.optionname}</td>
                <td class="master_data_des">${e.description}</td>
                <td>${e.payrolldata}</td>
                <td><p>${e.name_modified}</p>${e.date_modified}</td>
                <td class="master_data_status_td"><span class='state_active_content' id="state_${creatID}">${statenew}</span></td>
                <td  id="tr_icon">
                <div class="master_data_icon_more" >
                     <span class="material-symbols-outlined" id="master_data_icon_more">more_vert</span>
                    <div class="master_data_icon_more-popup" style="display:none">
                        <div class="arrow_pop_inside"></div>
                        <div class="list_inside_master" style="margin-bottom: 5px;" id="open_edit_master_data"><span class="material-symbols-outlined" id="icon_master_eidit">edit</span>แก้ไข</div>
                        <div class="list_inside_master" id="open_delete_master_data"><span class="material-symbols-outlined" id="icon_master_eidit">delete</span>ลบ</div></div>
                     </div>
                </td>
            </tr>
            `
          
        })
        const searchInput = document.getElementById('search_position');
        searchInput.value = '';

        searchInput.addEventListener('input', () => {
            const searchText = searchInput.value.toLowerCase();
            const tableRows = document.querySelectorAll('#data_table_master tr'); // Get all table rows

            tableRows.forEach((row) => {
            const optionname = row.querySelector('td:nth-child(3)').innerText.toLowerCase();
            const displaytr = optionname.includes(searchText) ? 'table-row' : 'none';
            row.style.display = displaytr;
            });
        });
        intable(data)
        
    } catch (err) {
        console.log(err)
    }
}
async function getAPI_master_skillset() {
    try {
        let headersList = {
            Accept: "*/*",
            "Content-Type": "application/json",
        };
    
        let bodyContent = JSON.stringify({
            token:
                token,
        });
    
        let response = await fetch(
            "http://localhost:3333/mobile/Get-Master-Skillset",
            {
                method: "POST",
                body: bodyContent,
                headers: headersList,
            }
        );
    
        let data = await response.json();
        data = data.data;
        document.querySelector('#data_table_master').innerHTML = ``
        data.forEach((e,index) => {
            let statenew;const loop = index+1
            let creatID ;
            if(e.status == 'active'){
                statenew = 'ใช้งาน'
                creatID = 'active';displaytr = 'table-row'
            }else if(e.status == 'Inactive'){
                statenew = 'ไม่ใช้งาน'
                creatID = 'Inactive';displaytr = 'table-row'
            }else{
                statenew = 'ถูกลบ'
                creatID = 'unactive';displaytr = 'none'
            }
            
            // console.log(e)
            document.querySelector('#data_table_master').innerHTML += `

            <tr id="tr_master_data" style="display : `+displaytr+`;">
                <td style="text-align: center;">${loop}</td>
                <td>${e.mastergroup}</td>
                <td>${e.optionname}</td>
                <td class="master_data_des">${e.description}</td>
                <td>${e.payrolldata}</td>
                <td><p>${e.name_modified}</p>${e.date_modified}</td>
                <td class="master_data_status_td"><span class='state_active_content' id="state_${creatID}">${statenew}</span></td>
                <td  id="tr_icon">
                <div class="master_data_icon_more" >
                     <span class="material-symbols-outlined" id="master_data_icon_more">more_vert</span>
                    <div class="master_data_icon_more-popup" style="display:none">
                        <div class="arrow_pop_inside"></div>
                        <div class="list_inside_master" style="margin-bottom: 5px;" id="open_edit_master_data"><span class="material-symbols-outlined" id="icon_master_eidit">edit</span>แก้ไข</div>
                        <div class="list_inside_master" id="open_delete_master_data"><span class="material-symbols-outlined" id="icon_master_eidit">delete</span>ลบ</div></div>
                     </div>
                </td>
            </tr>
            `
          
        })
        const searchInput = document.getElementById('search_position');
        searchInput.value = '';

        searchInput.addEventListener('input', () => {
            const searchText = searchInput.value.toLowerCase();
            const tableRows = document.querySelectorAll('#data_table_master tr'); // Get all table rows

            tableRows.forEach((row) => {
            const optionname = row.querySelector('td:nth-child(3)').innerText.toLowerCase();
            const displaytr = optionname.includes(searchText) ? 'table-row' : 'none';
            row.style.display = displaytr;
            });
        });
        
        intable(data)
    } catch (err) {
        console.log(err)
    }
}
async function getAPI_master_reasonforseparation() {
    try {
        let headersList = {
            Accept: "*/*",
            "Content-Type": "application/json",
        };
    
        let bodyContent = JSON.stringify({
            token:
                token,
        });
    
        let response = await fetch(
            "http://localhost:3333/mobile/Get-Master-Reasonforseparation",
            {
                method: "POST",
                body: bodyContent,
                headers: headersList,
            }
        );
    
        let data = await response.json();
        data = data.data;
        document.querySelector('#data_table_master').innerHTML = ``
        data.forEach((e,index) => {
            let statenew;const loop = index+1
            let creatID ;
            let displaytr ;
            if(e.status == 'active'){
                statenew = 'ใช้งาน'
                creatID = 'active';displaytr = 'table-row'

            }else if(e.status == 'Inactive'){
                statenew = 'ไม่ใช้งาน'
                creatID = 'Inactive';displaytr = 'table-row'
            }else{
                statenew = 'ถูกลบ'
                creatID = 'unactive';displaytr = 'none'
            }
             
            // console.log(e)
            document.querySelector('#data_table_master').innerHTML += `

            <tr id="tr_master_data" style="display : `+displaytr+`;">
                <td style="text-align: center;">${loop}</td>
                <td>${e.mastergroup}</td>
                <td>${e.optionname}</td>
                <td class="master_data_des">${e.description}</td>
                <td>${e.payrolldata}</td>
                <td><p>${e.name_modified}</p>${e.date_modified}</td>
                <td class="master_data_status_td"><span class='state_active_content' id="state_${creatID}">${statenew}</span></td>
                <td  id="tr_icon">
                <div class="master_data_icon_more" >
                     <span class="material-symbols-outlined" id="master_data_icon_more">more_vert</span>
                    <div class="master_data_icon_more-popup" style="display:none">
                        <div class="arrow_pop_inside"></div>
                        <div class="list_inside_master" style="margin-bottom: 5px;" id="open_edit_master_data"><span class="material-symbols-outlined" id="icon_master_eidit">edit</span>แก้ไข</div>
                        <div class="list_inside_master" id="open_delete_master_data"><span class="material-symbols-outlined" id="icon_master_eidit">delete</span>ลบ</div></div>
                     </div>
                </td>
            </tr>
            `
          
        })
        const searchInput = document.getElementById('search_position');
        searchInput.value = '';

        searchInput.addEventListener('input', () => {
            const searchText = searchInput.value.toLowerCase();
            const tableRows = document.querySelectorAll('#data_table_master tr'); // Get all table rows

            tableRows.forEach((row) => {
            const optionname = row.querySelector('td:nth-child(3)').innerText.toLowerCase();
            const displaytr = optionname.includes(searchText) ? 'table-row' : 'none';
            row.style.display = displaytr;
            });
        });
        intable(data)
       
    } catch (err) {
        console.log(err)
    }
}



//////////////////////////////
const obj_add = {
    mastergroup: null,
    optionname: null,
    optionnameen: null,
    description: null,
    descriptionen: null,
    status: true,
}  
const obj_edit = {
    id:null,
    mastergroup: null,
    payrolldata: null,
    optionname: null,
    optionnameen: null,
    description: null,
    descriptionen: null,
    status: true,
}
const obj_delete = {
    mastergroup: null,
    id:null
}
//////
//insert into master
//////

document.querySelector("#btn_submit_data").addEventListener('click', () => {
    document.querySelector('#master_right_menu').classList.remove('open');
    document.querySelector('#blur_bg').style.display = 'none';
    console.log(obj_add)
    postAPI_master_data(obj_add)
})
async function postAPI_master_data(itemobj) {
    const new_data = itemobj
    try {
        let headersList = {
            Accept: "*/*",
            "Content-Type": "application/json",
        };
    
        let bodyContent = JSON.stringify({
            token:
                token,
        obj:new_data
        });
    
        let response = await fetch(
            "http://localhost:3333/mobile/Add-Master_Data",
            {
                method: "POST",
                body: bodyContent,
                headers: headersList,
            }
        );
    
        let data = await response.json();
        if (data.checkstate == true) {

            document.querySelector('#data_table_master').innerHTML = ''
            fetch_table(checkpage)
            
        } else {
            console.log("wrong!!")
        }
        
        for (let key in obj_add) {
            obj_add[key] = null;
        }

    } catch (err) {
        console.log(err)
    }
}

/////////////////////////////
/////////
autoInputData()
openAddRightTab()

/////////;
/////////////////////////////

function autoInputData() {
    const switch_status = document.querySelector("#switch-master_data-status")
    switch_status.addEventListener('click', () => {
       
        obj_add.status = switch_status.checked
        console.log(obj_add)
    })
    const nameth = document.getElementById("master_group-name_th");
    let getnameth = nameth.value;
    nameth.addEventListener("input", function () {
        if (nameth.value !== getnameth) {
            getnameth = nameth.value;
        obj_add.optionname = nameth.value;
        console.log(obj_add)
        }
    });
    const nameen = document.getElementById("master_group-name_en");
    let getnamen = nameen.value;
    nameen.addEventListener("input", function () {
        if (nameen.value !== getnamen) {
            getnamen = nameen.value;
        obj_add.optionnameen = nameen.value;
        console.log(obj_add)
    }
    });
    const des = document.getElementById("master_group-des_th");
    let getdes = des.value;
    des.addEventListener("input", function () {
        if (des.value !== getdes) {
            getdes = des.value;
        obj_add.description = des.value;
        console.log(obj_add)
        }
    });
    const desen = document.getElementById("master_group-des_en");
    let getdesen = desen.value;
    desen.addEventListener("input", function () {
        if (desen.value !== getdesen) {
            getdesen = desen.value;
        obj_add.descriptionen = getdesen;
        console.log(obj_add)
        }
    });
}

    
function openAddRightTab() {
  
    document.querySelector('#position-filter-right-menu_addmaster').addEventListener('click', () => {
        document.querySelector("#content_popup_rank_1_edit  ul").innerHTML = ``
        response_list.forEach((item, index) => {
            // el_content_rank_edit.innerHTML += `` 
                document.querySelector("#content_popup_rank_1_edit  ul").innerHTML += `<li class="list_rank_1_edit" id="li_master_data">${item.mastergroup}</li>`
                if (number_menu == index) {
                // console.log(item)
                    document.querySelector("#content_list_master_menu").innerHTML = item.mastergroup
                    obj_add.mastergroup = item.mastergroup
            
                } 
            })
        document.getElementById("master_group-name_th").value = ''
        document.getElementById("master_group-name_en").value = ''
        document.getElementById("master_group-des_th").value = ''
        document.getElementById("master_group-des_en").value = ''
        document.querySelector('#master_right_menu').classList.add('open');
        document.querySelector('#blur_bg').style.display = 'flex';
        obj_add.status = true
        // 
       
        document.querySelectorAll("#li_master_data").forEach((e,i) => {
            e.addEventListener('click', () => {
                document.querySelector("#content_list_master_menu").innerHTML = response_list[i].mastergroup
                document.querySelector("#position_popup_list").style.display = 'none'
                obj_add.mastergroup = response_list[i].mastergroup
                console.log(obj_add)
            })
        })
     

        // console.log()
        
        // document.querySelector("#content_popup_rank_1_edit  ul").innerHTML = ``
        // document.querySelector("#content_list_master_menu").innerHTML = ''
        
    })
   
    
}

function hovermosuer() {

    const elements = document.querySelectorAll('#tr_master_data');
    elements.forEach((element) => {
      element.addEventListener('mouseenter', () => {
        element.style.backgroundColor = '#FAFAFC';
        
        element.querySelector(".master_data_icon_more span").style.cssText += `opacity : 100%`
      });
    
      element.addEventListener('mouseleave', () => {
  
            element.style.backgroundColor = ''
       
            
        // element.querySelector(".master_data_icon_more span").style.cssText += `opacity : 0%`
      });
    });


  
}

////////
document.querySelector("#master_group_list").addEventListener('click', () => {
    document.querySelector("#position_popup_list").style.display == 'flex'
    ?
    document.querySelector("#position_popup_list").style.display = 'none'
    :
    document.querySelector("#position_popup_list").style.display = 'flex'
    ;

})
document.body.addEventListener("click", function (event) {
    if (!document.querySelector("#position_popup_list").contains(event.target)&&!document.querySelector("#master_group_list").contains(event.target)) {
    document.querySelector("#position_popup_list").style.display = "none";
    }
});





function intable(data) {
    document.querySelector("#name_menu_edit").innerHTML = `แก้ไขตัวเลือก (${data[0].mastergroup})`;
    function printMousePos(event) {
        //     console.log("clientX: " + event.clientX)
           
        //   console.log(" - clientY: " + event.clientY)
      }
      
      
    document.querySelectorAll('#tr_master_data').forEach((e) => {
        e.querySelector('#master_data_icon_more').addEventListener("click", printMousePos);
        
        e.querySelector('#master_data_icon_more').addEventListener('click', () => {

            const popup = e.querySelector('.master_data_icon_more-popup')
            if (popup != null) {
                e.querySelector(".master_data_icon_more-popup").style.display = 'flex'   
                e.querySelector("#master_data_icon_more").style.cssText +=`color: var(--bg_Thridnary_2);`
            }
        })
        document.body.addEventListener("click", function (event) {
            if (!e.querySelector(".master_data_icon_more").contains(event.target)&&!e.querySelector(".master_data_icon_more-popup").contains(event.target)) {
                e.querySelector(".master_data_icon_more-popup").style.display = "none";
                e.querySelector("#master_data_icon_more").style.cssText +=`color: lightgray;`

            }
        });
        e.querySelectorAll('.list_inside_master').forEach((item) => {
            item.addEventListener('mouseenter', () => {
                item.style.cssText += `background-color: var(--bg_Thridnary_2); color: #fff;`
                item.querySelector('#icon_master_eidit').style.cssText += `color: #fff;`
            })
            item.addEventListener('mouseleave', () => {
                item.style.cssText += `background-color: #fff; color: var(--bg_Thridnary_2);`
                item.querySelector('#icon_master_eidit').style.cssText += `color: var(--bg_Thridnary_2);`
            })
        })
    })
    
    const name_th = document.getElementById("master_group-name_th-edit");
    console.log()
    let get_name_th = name_th.value;
    name_th.addEventListener("input", function () {
        if (name_th.value !== get_name_th) {
            get_name_th = name_th.value;
        obj_edit.optionname = get_name_th;
        console.log(obj_edit)
        }
    });
    const name_en = document.getElementById("master_group-name_en-edit");
    let get_name_en = name_en.value;
    name_en.addEventListener("input", function () {
        if (name_en.value !== get_name_en) {
            get_name_en = name_en.value;
        obj_edit.optionnameen = get_name_en;
        console.log(obj_edit)
        }
    });
    const des_th = document.getElementById("master_group-des_th_edit");
    let descriptionth = des_th.value;
    des_th.addEventListener("input", function () {
        if (des_th.value !== descriptionth) {
            descriptionth = des_th.value;
        obj_edit.description = descriptionth;
        console.log(obj_edit)
        }
    });
    const des_en = document.getElementById("master_group-des_en_edit");
    let description = des_en.value;
    des_en.addEventListener("input", function () {
        if (des_en.value !== description) {
            description = des_en.value;
        obj_edit.descriptionen = description;
        console.log(obj_edit)
        }
    });
    const switch_edit_master = document.querySelector('#switch-master_data-status_edit')
  
    switch_edit_master.addEventListener('click', () => {
        
        obj_edit.status = switch_edit_master.checked
        console.log(obj_edit)
    })

    document.querySelectorAll('#tr_master_data').forEach((e,index) => {
        e.querySelector("#open_edit_master_data").addEventListener('click', () => {
            e.querySelector('.master_data_icon_more-popup').style.display = 'none'
            document.querySelector('#master_right_menu_edit').classList.add('open');
            document.querySelector('#blur_bg').style.display = 'flex';
            document.querySelector('#content_list_master_menu_edit').innerHTML = data[index].mastergroup
            
            obj_edit.id = data[index].id
            obj_edit.mastergroup = data[index].mastergroup
            obj_edit.optionname = data[index].optionname
            obj_edit.optionnameen = ""
            obj_edit.description = data[index].description
            obj_edit.descriptionen = ""
            if( data[index].status == 'active'){
                document.querySelector('#switch-master_data-status_edit').checked = true
         
                obj_edit.status = true
            }else{
                document.querySelector('#switch-master_data-status_edit').checked = false

                obj_edit.status = false
            }
            console.log(obj_edit)
            if (data[index].optionname != null) {
                name_th.value = data[index].optionname                
            } else {
                name_th.value = ''             
            }
            if (data[index].optionnameen != null) {
                name_en.value = data[index].optionnameen              
            } else {
                name_en.value = ''             
            }
            if (data[index].description != null) {
                des_th.value = data[index].description          
            } else {
                des_th.value = ''             
            }
            if (data[index].descriptionen != null) {
                des_en.value = data[index].descriptionen      
            } else {
                des_en.value = ''             
            }
            if (data[index].status != null) {
                des_en.checked = data[index].status    
            } else {
                des_en.checked = false             
            }


        })
        e.querySelector("#open_delete_master_data").addEventListener('click', () => {
            obj_delete.mastergroup =  data[index].mastergroup
            obj_delete.id = data[index].id
            document.querySelector('#master_right_menu').classList.remove('open');
            document.querySelector('#blur_bg').style.display = 'none';
            // const confirmation = confirm("Are you sure you want to submit the form?");
            const confirmation = confirm("Are you sure you want to submit the form?");
    
          if (confirmation) {
            Swal.fire(
                'Form submitted successfully!',
                '',
                'success'
              )
            // alert("Form submitted successfully!");
            postAPI_master_Delete_data(obj_delete)

          } else {
            Swal.fire(
                'Form submission canceled!',
                '',
                'success'
              )
            
            // alert("Form submission canceled!");
          }
           
              
       
        })
    })
    document.querySelector("#btn_cancel_data_edit").addEventListener('click', () => {
        for (let key in obj_edit) {
            obj_edit[key] = null;
        }
    })
    document.querySelector("#btn_cancel_data_edit_icon").addEventListener('click', () => {
        for (let key in obj_edit) {
            obj_edit[key] = null;
        }
    })
  
}
document.querySelector('#btn_submit_data_edit').addEventListener('click', () => {
    document.querySelector('#master_right_menu_edit').classList.remove('open');
    document.querySelector('#blur_bg').style.display = 'none';
    postAPI_master_Edit_data(obj_edit)

    
})
async function postAPI_master_Edit_data(itemobj) {
    const new_data = {
        id: itemobj.id,
        mastergroup: itemobj.mastergroup?.trim(),
        payrolldata: itemobj.payrolldata?.trim(),
        optionname: itemobj.optionname?.trim(),
        optionnameen: itemobj.optionnameen?.trim(),
        description: itemobj.description?.trim(),
        descriptionen: itemobj.descriptionen?.trim(),
        status: itemobj.status
    };
    try {
        let headersList = {
            Accept: "*/*",
            "Content-Type": "application/json",
        };
    
        let bodyContent = JSON.stringify({
            token:
                token,
        obj:new_data
        });
    
        let response = await fetch(
            "http://localhost:3333/mobile/Update-Master_Data",
            {
                method: "POST",
                body: bodyContent,
                headers: headersList,
            }
        );
            // location.reload()
        let data = await response.json();

        if (data.checkstate == true) {
            document.querySelector('#data_table_master').innerHTML = ''
            fetch_table(checkpage)
        } else {
            console.log("wrong!!")
        }
        for (let key in obj_edit) {
            obj_edit[key] = null;
        }
    } catch (err) {
        console.log(err)
    }
} 

async function postAPI_master_Delete_data(itemobj) {
    const new_data = itemobj
    try {
        let headersList = {
            Accept: "*/*",
            "Content-Type": "application/json",
        };
    
        let bodyContent = JSON.stringify({
            token:
                token,
        obj:new_data
        });
    
        let response = await fetch(
            "http://localhost:3333/mobile/Delete-Master_Data",
            {
                method: "POST",
                body: bodyContent,
                headers: headersList,
            }
        );
            // location.reload()
        
        let data = await response.json();
        if (data.checkstate == true) {
            document.querySelector('#data_table_master').innerHTML = ''
            fetch_table(checkpage)
        } else {
            console.log("wrong!!")
        }
        for (let key in obj_delete) {
            obj_delete[key] = null;
        }
    } catch (err) {
        console.log(err)
    }
} 

///
