import './config.js';
let ENDPOINT = window.API_URL;
//set data//
var data_role_add = {
    role_name: '',
    set_start_role: 'กรุณาเลือก*',
    isHR: false,
    des: '',
}
var data_role_edit = {
    r_id: null,
    role_name: '',
    isHR: false,
    des: '',
    status: null
}
var data_payroll_edit = {
    ppr_id: null,
    payroll_calculation: null,
    payroll_verification: null,
    payroll_approval: null,
    payroll_period_close: null,
    payroll_payment: null,
    adjust_closed_payrolls: null,
    rerun_concluded: null,
    delete_special: null
}
var data_payroll_edit_check = {
    ppr_id: null,
    payroll_calculation: null,
    payroll_verification: null,
    payroll_approval: null,
    payroll_period_close: null,
    payroll_payment: null,
    adjust_closed_payrolls: null,
    rerun_concluded: null,
    delete_special: null
}
var get_roles_for_payroll = []
var data_payroll_add = {
    r_id: null,
    payroll_calculation: false,
    payroll_verification: false,
    payroll_approval: false,
    payroll_period_close: false,
    payroll_payment: false,
    adjust_closed_payrolls: false,
    rerun_concluded: false,
    delete_special: false
}
var check_rid_cancel;
var state_role_output = true
var payroll_show_roles = []
// function toggleActive(event) {
//     const container = event.currentTarget.parentElement;
//     const spanElement = document.getElementById('spanElement');
//     container.classList.toggle('active');

//     if (container.classList.contains('active')) {
//         const rect = event.currentTarget.getBoundingClientRect();
//       spanElement.style.display = 'flex';

//       spanElement.style.top = `${rect.top+20}px`;
//       spanElement.style.left = `${rect.left}px`;
//     } else {
//       spanElement.style.display = 'none';
//     }
//   }

//   document.body.addEventListener("click", function (event) {
//     if (!document.querySelector("#spanElement").contains(event.target)&&!document.querySelector(".container").contains(event.target)) {
//         document.querySelector("#spanElement").style.display = "none";

//     }
// });
/// call token ///
var token;
get_token()
async function get_token() {
    try {

        token = localStorage.token
        get_UserDetail();
        get_roles()

    } catch (err) {
        ////console.log('err',err)
    }
}
var get_data_permission = []
var get_data_permission_for_check = []
/// call api ///
var data_user;
var data_roles;
var data_permission;
var get_rid;
var data_payroll;
var data_permission_input = [];
var get_rid_per;
var get_index_per;
async function get_UserDetail() {
    try {

        const headersList = {
            Accept: "*/*",
            "Content-Type": "application/json",
        };

        const bodyContent = JSON.stringify({
            token
        });

        const apiResponse = await fetch(ENDPOINT + "mobile/Get-User_Detail", {
            method: "POST",
            body: bodyContent,
            headers: headersList,
        });

        const data = await apiResponse.json();
        data_user = data.data
        table_user()
        // 
    } catch (err) {
        //console.error('Error:', err);
    }
}
async function get_Payroll_Permission(ppr) {
    ////console.log(ppr)
    try {
        const headersList = {
            Accept: "*/*",
            "Content-Type": "application/json",
        };

        const bodyContent = JSON.stringify({
            token
        });

        const apiResponse = await fetch(ENDPOINT + "mobile/Get-Payroll_Permission", {
            method: "POST",
            body: bodyContent,
            headers: headersList,
        });

        const data = await apiResponse.json();
        data_payroll = data.data
        // 

        data_input_payoll(ppr)

    } catch (err) {
        //console.error('Error:', err);
    }
}
function data_input_payoll(ppr) {
    data_payroll.forEach((item) => {
        // ////console.log('ppr',ppr)
        if (item.ppr_id == ppr) {
            ////console.log('item.ppr_id',item.ppr_id)

            data_payroll_edit.ppr_id = item.ppr_id
            data_payroll_edit_check.ppr_id = item.ppr_id
            document.querySelector('#salarycalculation_payrollpermission').checked = item.payroll_calculation
            data_payroll_edit.payroll_calculation = item.payroll_calculation
            data_payroll_edit_check.payroll_calculation = item.payroll_calculation
            document.querySelector('#checksalary_payrollpermission').checked = item.payroll_verification
            data_payroll_edit.payroll_verification = item.payroll_verification
            data_payroll_edit_check.payroll_verification = item.payroll_verification
            document.querySelector('#approvesalary_payrollpermission').checked = item.payroll_approval
            data_payroll_edit.payroll_approval = item.payroll_approval
            data_payroll_edit_check.payroll_approval = item.payroll_approval
            document.querySelector('#payrollclosing_payrollpermission').checked = item.payroll_period_close
            data_payroll_edit.payroll_period_close = item.payroll_period_close
            data_payroll_edit_check.payroll_period_close = item.payroll_period_close
            document.querySelector('#payinstallmentsalary_payrollpermission').checked = item.payroll_payment
            data_payroll_edit.payroll_payment = item.payroll_payment
            data_payroll_edit_check.payroll_payment = item.payroll_payment
            document.querySelector('#abletoupdatesalaryperioditems_payrollpermission').checked = item.adjust_closed_payrolls
            data_payroll_edit.adjust_closed_payrolls = item.adjust_closed_payrolls
            data_payroll_edit_check.adjust_closed_payrolls = item.adjust_closed_payrolls
            document.querySelector('#abletoreversepayrollperiodafterpayment_payrollpermission').checked = item.rerun_concluded
            data_payroll_edit.rerun_concluded = item.rerun_concluded
            data_payroll_edit_check.rerun_concluded = item.rerun_concluded
            document.querySelector('#abletodeletespecialperiod_payrollpermission').checked = item.delete_special
            data_payroll_edit.delete_special = item.delete_special
            data_payroll_edit_check.delete_special = item.delete_special
        }
        if (ppr == 0) {
            document.querySelector('#salarycalculation_payrollpermission').checked = false
            document.querySelector('#checksalary_payrollpermission').checked = false
            document.querySelector('#approvesalary_payrollpermission').checked = false
            document.querySelector('#payrollclosing_payrollpermission').checked = false
            document.querySelector('#payinstallmentsalary_payrollpermission').checked = false
            document.querySelector('#abletoupdatesalaryperioditems_payrollpermission').checked = false
            document.querySelector('#abletoreversepayrollperiodafterpayment_payrollpermission').checked = false
            document.querySelector('#abletodeletespecialperiod_payrollpermission').checked = false
        }

    })
    // 
    check_update_payroll()
    // ////console.log('data_payroll_edit_check',data_payroll_edit_check)
    // ////console.log('data_payroll_edit',data_payroll_edit)
}
const div_show = document.querySelector('#despart1_payrollpermission')
div_show.querySelector('#salarycalculation_payrollpermission').addEventListener('click', () => {
    data_payroll_edit.payroll_calculation = div_show.querySelector('#salarycalculation_payrollpermission').checked
    // ////console.log(data_payroll_edit)
    check_update_payroll()
})
div_show.querySelector('#checksalary_payrollpermission').addEventListener('click', () => {
    data_payroll_edit.payroll_verification = div_show.querySelector('#checksalary_payrollpermission').checked
    ////console.log(data_payroll_edit)
    check_update_payroll()
})
div_show.querySelector('#approvesalary_payrollpermission').addEventListener('click', () => {
    data_payroll_edit.payroll_approval = div_show.querySelector('#approvesalary_payrollpermission').checked
    ////console.log(data_payroll_edit)
    check_update_payroll()
})
div_show.querySelector('#payrollclosing_payrollpermission').addEventListener('click', () => {
    data_payroll_edit.payroll_period_close = div_show.querySelector('#payrollclosing_payrollpermission').checked
    ////console.log(data_payroll_edit)
    check_update_payroll()
})
div_show.querySelector('#payinstallmentsalary_payrollpermission').addEventListener('click', () => {
    data_payroll_edit.payroll_payment = div_show.querySelector('#payinstallmentsalary_payrollpermission').checked
    ////console.log(data_payroll_edit)
    check_update_payroll()
})
div_show.querySelector('#abletoupdatesalaryperioditems_payrollpermission').addEventListener('click', () => {
    data_payroll_edit.adjust_closed_payrolls = div_show.querySelector('#abletoupdatesalaryperioditems_payrollpermission').checked
    ////console.log(data_payroll_edit)
    check_update_payroll()
})
div_show.querySelector('#abletoreversepayrollperiodafterpayment_payrollpermission').addEventListener('click', () => {
    data_payroll_edit.rerun_concluded = div_show.querySelector('#abletoreversepayrollperiodafterpayment_payrollpermission').checked
    ////console.log(data_payroll_edit)
    check_update_payroll()
})
div_show.querySelector('#abletodeletespecialperiod_payrollpermission').addEventListener('click', () => {
    data_payroll_edit.delete_special = div_show.querySelector('#abletodeletespecialperiod_payrollpermission').checked
    ////console.log(data_payroll_edit)
    check_update_payroll()
})
const div_add_payroll = document.querySelector('#despart1_payrollpermission_add')
div_add_payroll.querySelector('#salarycalculation_payrollpermission').addEventListener('click', () => {
    data_payroll_add.payroll_calculation = div_add_payroll.querySelector('#salarycalculation_payrollpermission').checked
    ////console.log(data_payroll_add)
})
div_add_payroll.querySelector('#checksalary_payrollpermission').addEventListener('click', () => {
    data_payroll_add.payroll_verification = div_add_payroll.querySelector('#checksalary_payrollpermission').checked
    ////console.log(data_payroll_add)
})
div_add_payroll.querySelector('#approvesalary_payrollpermission').addEventListener('click', () => {
    data_payroll_add.payroll_approval = div_add_payroll.querySelector('#approvesalary_payrollpermission').checked
    ////console.log(data_payroll_add)
})
div_add_payroll.querySelector('#payrollclosing_payrollpermission').addEventListener('click', () => {
    data_payroll_add.payroll_period_close = div_add_payroll.querySelector('#payrollclosing_payrollpermission').checked
    ////console.log(data_payroll_add)
})
div_add_payroll.querySelector('#payinstallmentsalary_payrollpermission').addEventListener('click', () => {
    data_payroll_add.payroll_payment = div_add_payroll.querySelector('#payinstallmentsalary_payrollpermission').checked
    ////console.log(data_payroll_add)
})
div_add_payroll.querySelector('#abletoupdatesalaryperioditems_payrollpermission').addEventListener('click', () => {
    data_payroll_add.adjust_closed_payrolls = div_add_payroll.querySelector('#abletoupdatesalaryperioditems_payrollpermission').checked
    ////console.log(data_payroll_add)
})
div_add_payroll.querySelector('#abletoreversepayrollperiodafterpayment_payrollpermission').addEventListener('click', () => {
    data_payroll_add.rerun_concluded = div_add_payroll.querySelector('#abletoreversepayrollperiodafterpayment_payrollpermission').checked
    ////console.log(data_payroll_add)
})
div_add_payroll.querySelector('#abletodeletespecialperiod_payrollpermission').addEventListener('click', () => {
    data_payroll_add.delete_special = div_add_payroll.querySelector('#abletodeletespecialperiod_payrollpermission').checked
    ////console.log(data_payroll_add)
})





function check_add_peyroll() {

}



// document.querySelector('#tapuser-2').addEventListener('click',get_roles)
async function get_roles() {
    try {

        const headersList = {
            Accept: "*/*",
            "Content-Type": "application/json",
        };

        const bodyContent = JSON.stringify({
            token
        });

        const apiResponse = await fetch(ENDPOINT + "mobile/Get-Roles", {
            method: "POST",
            body: bodyContent,
            headers: headersList,
        });

        const data = await apiResponse.json();
        data_roles = data.data
        console.log('data_roles', data_roles)
        // 
        table_roles()
        permission_roles()
        get_permission(data_roles[0].r_id)
        get_Payroll_Permission(data_roles[0].ppr_id)
        permission_payroll_role(data_roles[0].ppr_id)
        // 




    } catch (err) {
        //console.error('Error:', err);
    }
}

async function get_permission(r_id) {
    try {

        const headersList = {
            Accept: "*/*",
            "Content-Type": "application/json",
        };

        const bodyContent = JSON.stringify({
            token,
            r_id: r_id
        });

        const apiResponse = await fetch(ENDPOINT + "mobile/Get-Permission", {
            method: "POST",
            body: bodyContent,
            headers: headersList,
        });

        const data = await apiResponse.json();
        data_permission = data.data

        ////console.log()
        //console.log('r_id ', r_id, 'data_permission', data_permission)
        const lv_0 = document.querySelector('#list_permission_level_1')
        lv_0.innerHTML = ''
        get_data_permission = [];

        data_permission.forEach((item) => {
            // if(item.category_type

            if (item.level === 1) {
                const div = document.createElement('div');
                div.id = 'content_list_permission';
                lv_0.appendChild(div);

                const lv_1 = div
                // let data_input = {
                //     p_id: item.p_id,
                //     access: item.access,
                //     create: item.create,
                //     modify: item.modify,
                //     switch_status:item.switch_status,
                // }
                // data_permission_input.push(data_input)
                const item_name_1 = item.name.trim()
                const item_access = item.access
                let access_html;
                if (item_access != null) {
                    let checked_item_access;
                    if (item_access == true) {

                        checked_item_access = `checked="${item_access}" value="${item_access}"`
                    } else {
                        checked_item_access = ``
                    }
                    access_html = `
                            <label class="container font_normal_1 weight_regular" style="display: flex;" id="check_id">
                            <input type="checkbox" id='input_access' ${checked_item_access} >
                            <span style="margin-left: 5px; margin-top: 17px;" class="checkmark"></span>
                            </label>
                        `
                } else {
                    access_html = ``
                }
                const item_create = item.create
                let create_html;
                if (item_create != null) {
                    let checked_item_create;
                    if (item_create == true) {
                        checked_item_create = `checked="${item_create}" value="${item_create}"`
                    } else {
                        checked_item_create = ``
                    }
                    create_html = `
                        <label class="container font_normal_1 weight_regular" style="display: flex;" id="check_id">
                        <input type="checkbox" id='input_create' ${checked_item_create}>
                        <span style="margin-left: 5px; margin-top: 17px;" class="checkmark"></span>
                      </label>
                        `
                } else {
                    create_html = ``
                }
                const item_modify = item.modify
                let modify_html;
                if (item_modify != null) {
                    let checked_item_modify;
                    if (item_modify == true) {
                        checked_item_modify = `checked="${item_modify}" value="${item_modify}"`
                    } else {
                        checked_item_modify = ``
                    }
                    modify_html = `
                        <label class="container font_normal_1 weight_regular" style="display: flex;" id="check_id">
                        <input type="checkbox" id='input_modify' ${checked_item_modify}>
                        <span style="margin-left: 5px; margin-top: 17px;" class="checkmark"></span>
                        </label>
                        `
                } else {
                    modify_html = ``
                }
                const item_delete = item.delete
                let delete_html;
                if (item_delete != null) {
                    let checked_item_delete;
                    if (item_delete == true) {
                        checked_item_delete = `checked="${item_delete}" value="${item_delete}"`
                    } else {
                        checked_item_delete = ``
                    }
                    delete_html = `
                        <label class="container font_normal_1 weight_regular" style="display: flex;" id="check_id">
                        <input type="checkbox" id='input_delete' ${checked_item_delete}>
                        <span style="margin-left: 5px; margin-top: 17px;" class="checkmark"></span>
                        </label>
                        `
                } else {
                    delete_html = ``
                }
                const item_switch = item.use_switch
                let switch_html;
                if (item_switch == true) {
                    let checked_item_switch;
                    if (item.switch_status == true) {
                        checked_item_switch = `checked="${item.switch_status}" value="${item.switch_status}"`
                    } else {
                        checked_item_switch = ``
                    }
                    switch_html = `  <label class="switch_hrm">
                        <input type="checkbox" id='input_switch' ${checked_item_switch}>
                        <span class="slider round"></span>
                      </label>`
                } else {
                    switch_html = ``
                }
                let item_lv1 = {
                    p_id: item.p_id,
                    name: item.name,
                    access: item.access,
                    create: item.create,
                    modify: item.modify,
                    delete: item.delete,
                    switch_status: item.switch_status
                }
                get_data_permission.push(item_lv1)
                // //console.log(`lv 1 ${item.p_id} ${item.access} ${item.create}  ${item.modify}  ${item.delete} ${item.switch_status}`)
                //innerHTML level 1
                lv_1.innerHTML += `
    
                    <div id="content_list_permission_level"  
                                style="width: 100%; height: 56px; background-color: #fff; display: flex; border-bottom: 1px solid #EAEAEA;">
                                
                              <div
                    style="width: 53%; height: 100%;   font-size: 14px; display: flex; align-items: center; justify-content: start;  ">
                    <p id="text_name_permission" style="margin-left: 10px; display: flex;">${item_name_1}  <img id='img_icon_arrow' style=" height: 20px; margin-left: 10px;" id="imgoilrotae" class="fa-arrow-down"
                        src="./symbol_hrm/arrow-down-black.png" class="" style="height: 40%;" /></p>
                    </div>
    
                    <div style="width: 8%; height: 100%;  font-size: 14px; display: flex;  justify-content: center;">
                        ${access_html}
                    </div>
                    <div style="width: 8%; height: 100%;  font-size: 14px; display: flex; justify-content: center;">
                        ${create_html}
                    </div>
                    <div style="width: 8%; height: 100%;  font-size: 14px; display: flex;  justify-content: center;">
                        ${modify_html}
                    </div>
                    <div style="width: 8%; height: 100%;  font-size: 14px; display: flex;  justify-content: center;">
                        ${delete_html}
                    </div>
                    <div
                        style="width: 15%; height: 100%; font-size: 14px; display: flex; justify-content: center; align-items: center;">
                        ${switch_html}
                    </div>
                        </div>`
                // ////console.log(item_name_1, item.level)

                const name_1 = item_name_1

                data_permission.forEach(async (item2) => {
                    if (item2.level == 2) {

                        // let data_input2 = {
                        //     p_id: item2.p_id,
                        //     access: item2.access,
                        //     create: item2.create,
                        //     modify: item2.modify,
                        //     switch_status:item2.switch_status,
                        // }
                        // data_permission_input.push(data_input2)
                        let check_under_lv2 = item2.category_type.trim()

                        if (check_under_lv2 == name_1) {

                            const item_name_2 = item2.name.trim()

                            const item_access_2 = item2.access
                            let access_html_2;
                            if (item_access_2 != null) {
                                let checked_item_access_2;
                                if (item_access_2 == true) {
                                    checked_item_access_2 = `checked="${item_access_2}" value="${item_access_2}"`
                                } else {
                                    checked_item_access_2 = ``
                                }
                                access_html_2 = `
                                        <label class="container font_normal_1 weight_regular" style="display: flex;" id="check_id">
                                        <input type="checkbox" id='input_access' ${checked_item_access_2} >
                                        <span style="margin-left: 5px; margin-top: 17px;" class="checkmark"></span>
                                        </label>
                                    `
                            } else {
                                access_html_2 = ``
                            }
                            const item_create_2 = item2.create
                            let create_html_2;
                            if (item_create_2 != null) {
                                let checked_item_create_2;
                                if (item_create_2 == true) {
                                    checked_item_create_2 = `checked="${item_create_2}" value="${item_create_2}"`
                                } else {
                                    checked_item_create_2 = ``
                                }
                                create_html_2 = `
                                    <label class="container font_normal_1 weight_regular" style="display: flex;" id="check_id">
                                    <input type="checkbox" id='input_create' ${checked_item_create_2}>
                                    <span style="margin-left: 5px; margin-top: 17px;" class="checkmark"></span>
                                </label>
                                    `
                            } else {
                                create_html_2 = ``
                            }
                            const item_modify_2 = item2.modify
                            let modify_html_2;
                            if (item_modify_2 != null) {
                                let checked_item_modify_2;
                                if (item_modify_2 == true) {
                                    checked_item_modify_2 = `checked="${item_modify_2}" value="${item_modify_2}"`
                                } else {
                                    checked_item_modify_2 = ``
                                }
                                modify_html_2 = `
                                    <label class="container font_normal_1 weight_regular" style="display: flex;" id="check_id">
                                    <input type="checkbox" id='input_modify' ${checked_item_modify_2}>
                                    <span style="margin-left: 5px; margin-top: 17px;" class="checkmark"></span>
                                    </label>
                                    `
                            } else {
                                modify_html_2 = ``
                            }
                            const item_delete_2 = item2.delete
                            let delete_html_2;
                            if (item_delete_2 != null) {
                                let checked_item_delete_2;
                                if (item_delete_2 == true) {
                                    checked_item_delete_2 = `checked="${item_delete}" value="${item_delete}"`
                                } else {
                                    checked_item_delete_2 = ``
                                }
                                delete_html_2 = `
                                    <label class="container font_normal_1 weight_regular" style="display: flex;" id="check_id">
                                    <input type="checkbox" id='input_delete' ${checked_item_delete_2}>
                                    <span style="margin-left: 5px; margin-top: 17px;" class="checkmark"></span>
                                    </label>
                                    `
                            } else {
                                delete_html_2 = ``
                            }
                            const item_switch_2 = item2.use_switch
                            let switch_html_2;
                            if (item_switch_2 == true) {
                                let checked_item_switch_2;
                                if (item2.switch_status == true) {
                                    checked_item_switch_2 = `checked="${item2.switch_status}" value="${item2.switch_status}"`
                                } else {
                                    checked_item_switch_2 = ``
                                }
                                switch_html_2 = `  <label class="switch_hrm">
                                    <input type="checkbox" id='input_switch' ${checked_item_switch_2}>
                                    <span class="slider round"></span>
                                     </label>`
                            } else {
                                switch_html_2 = ``
                            }
                            let item_lv2 = {
                                p_id: item2.p_id,
                                name: item2.name,
                                access: item2.access,
                                create: item2.create,
                                modify: item2.modify,
                                delete: item2.delete,
                                switch_status: item2.switch_status
                            }
                            get_data_permission.push(item_lv2)

                            //  //console.log(`lv 2 ${item2.p_id} ${item2.access} ${item2.create}  ${item2.modify}  ${item2.delete} ${item2.switch_status}`)

                            const div_in2 = document.createElement('div');
                            div_in2.id = 'slidetapperuser2';
                            div_in2.style.cssText += `display:none;flex-direction:column;`
                            lv_1.appendChild(div_in2);
                            const in2 = div_in2
                            //innerHTML level 2
                            in2.innerHTML += `
                                <div  id="content_list_permission_level">
                                <div style="width: 100%; height: 56px; background-color: #fff; display: flex; border-bottom: 1px solid #EAEAEA; ">
                                    <div
                                      style="width: 53%; height: 100%;   font-size: 14px; display: flex; align-items: center; justify-content: start;  ">
                                      <p id="text_name_permission" style="margin-left: 40px; display: flex;">${item_name_2}<img id='img_icon_arrow' style="height: 20px; margin-left: 10px;" id="imgoilrotae" class="fa-arrow-down"
                                          src="./symbol_hrm/arrow-down-black.png" class="" style="height: 40%;" /></p>
                                    </div>
                                    <div style="width: 8%; height: 100%;  font-size: 14px; display: flex;  justify-content: center;">
                                        ${access_html_2}
                                    </div>
                                    <div style="width: 8%; height: 100%;  font-size: 14px; display: flex; justify-content: center;">
                                         ${create_html_2}
    
                                    </div>
                                    <div style="width: 8%; height: 100%;  font-size: 14px; display: flex;  justify-content: center;">
                                           ${modify_html_2}
    
                                    </div>
                                    <div style="width: 8%; height: 100%;  font-size: 14px; display: flex;  justify-content: center;">
                                        ${delete_html_2}
    
                                    </div>
                                    <div
                                      style="width: 15%; height: 100%; font-size: 14px; display: flex; justify-content: center; align-items: center;">
                                         ${switch_html_2}
    
                                    </div>
                                    </div>
                            </div>
                                `
                            // ////console.log(item_name_2, item2.level)
                            const div2 = document.createElement('div');
                            div2.id = 'content_list_permission_drop_3';
                            div2.style.cssText += `display:none;flex-direction:column;`
                            in2.appendChild(div2);
                            const lv2 = div2

                            data_permission.forEach((item3) => {

                                if (item3.level == 3) {

                                    // let data_input3 = {
                                    //     p_id: item3.p_id,
                                    //     access: item3.access,
                                    //     create: item3.create,
                                    //     modify: item3.modify,
                                    //     switch_status:item3.switch_status,
                                    // }
                                    // data_permission_input.push(data_input3)
                                    let check_under_lv3 = item3.category_type.trim()
                                    check_under_lv3 = check_under_lv3.split('-')
                                    check_under_lv3 = check_under_lv3[1]
                                    // ////console.log(check_under_lv3)

                                    if (check_under_lv3 == item_name_2) {
                                        const item_name_3 = item3.name.trim()

                                        const item_access_3 = item3.access
                                        let access_html_3;
                                        if (item_access_3 != null) {
                                            let checked_item_access_3;
                                            if (item_access_3 == true) {
                                                checked_item_access_3 = `checked="${item_access_3}" value="${item_access_3}"`
                                            } else {
                                                checked_item_access_3 = ``
                                            }
                                            access_html_3 = `
                                                    <label class="container font_normal_1 weight_regular" style="display: flex;" id="check_id">
                                                    <input type="checkbox" id='input_access' ${checked_item_access_3} >
                                                    <span style="margin-left: 5px; margin-top: 17px;" class="checkmark"></span>
                                                    </label>
                                                `
                                        } else {
                                            access_html_3 = ``
                                        }
                                        const item_create_3 = item3.create
                                        let create_html_3;
                                        if (item_create_3 != null) {
                                            let checked_item_create_3;
                                            if (item_create_3 == true) {
                                                checked_item_create_3 = `checked="${item_create_3}" value="${item_create_3}"`
                                            } else {
                                                checked_item_create_3 = ``
                                            }
                                            create_html_3 = `
                                                <label class="container font_normal_1 weight_regular" style="display: flex;" id="check_id">
                                                <input type="checkbox" id='input_create' ${checked_item_create_3}>
                                                <span style="margin-left: 5px; margin-top: 17px;" class="checkmark"></span>
                                            </label>
                                                `
                                        } else {
                                            create_html_3 = ``
                                        }
                                        const item_modify_3 = item3.modify
                                        let modify_html_3;
                                        if (item_modify_3 != null) {
                                            let checked_item_modify_3;
                                            if (item_modify_3 == true) {
                                                checked_item_modify_3 = `checked="${item_modify_3}" value="${item_modify_3}"`
                                            } else {
                                                checked_item_modify_3 = ``
                                            }
                                            modify_html_3 = `
                                                <label class="container font_normal_1 weight_regular" style="display: flex;" id="check_id">
                                                <input type="checkbox" id='input_modify' ${checked_item_modify_3}>
                                                <span style="margin-left: 5px; margin-top: 17px;" class="checkmark"></span>
                                                </label>
                                                `
                                        } else {
                                            modify_html_3 = ``
                                        }
                                        const item_delete_3 = item3.delete
                                        let delete_html_3;
                                        if (item_delete_3 != null) {
                                            let checked_item_delete_3;
                                            if (item_delete_3 == true) {
                                                checked_item_delete_3 = `checked="${item_delete}" value="${item_delete}"`
                                            } else {
                                                checked_item_delete_3 = ``
                                            }
                                            delete_html_3 = `
                                                <label class="container font_normal_1 weight_regular" style="display: flex;" id="check_id">
                                                <input type="checkbox" id='input_delete' ${checked_item_delete_3}>
                                                <span style="margin-left: 5px; margin-top: 17px;" class="checkmark"></span>
                                                </label>
                                                `
                                        } else {
                                            delete_html_3 = ``
                                        }
                                        const item_switch_3 = item3.use_switch
                                        let switch_html_3;
                                        if (item_switch_3 == true) {
                                            let checked_item_switch_3;
                                            if (item3.switch_status == true) {
                                                checked_item_switch_3 = `checked="${item3.switch_status}" value="${item3.switch_status}"`
                                            } else {
                                                checked_item_switch_3 = ``
                                            }
                                            switch_html_3 = `  <label class="switch_hrm">
                                                <input type="checkbox" id='input_switch' ${checked_item_switch_3}>
                                                <span class="slider round"></span>
                                                 </label>`
                                        } else {
                                            switch_html_3 = ``
                                        }
                                        let item_lv3 = {
                                            p_id: item3.p_id,
                                            name: item3.name,
                                            access: item3.access,
                                            create: item3.create,
                                            modify: item3.modify,
                                            delete: item3.delete,
                                            switch_status: item3.switch_status
                                        }
                                        get_data_permission.push(item_lv3)
                                        //   //console.log(`lv 3 ${item3.p_id} ${item3.access} ${item3.create}  ${item3.modify}  ${item3.delete} ${item3.switch_status}`)

                                        ///innerHTML
                                        lv2.innerHTML += `
                                            <div  id="content_list_permission_level" >
                                            <div style="width: 100%; height: 56px; background-color: #fff; display: flex; border-bottom: 1px solid #EAEAEA; ">
                                                <div
                                                  style="width: 53%; height: 100%;   font-size: 14px; display: flex; align-items: center; justify-content: start;  ">
                                                  <p style="margin-left: 60px; display: flex;">${item_name_3}</p>
                                                </div>
                                                <div style="width: 8%; height: 100%;  font-size: 14px; display: flex;  justify-content: center;">
                                                  ${access_html_3}
                                                </div>
                                                <div style="width: 8%; height: 100%;  font-size: 14px; display: flex; justify-content: center;">
                                                   ${create_html_3}
                                                </div>
                                                <div style="width: 8%; height: 100%;  font-size: 14px; display: flex;  justify-content: center;">
                                                     ${modify_html_3}
                                                </div>
                                                <div style="width: 8%; height: 100%;  font-size: 14px; display: flex;  justify-content: center;">
                                                    ${delete_html_3}
                                                </div>
                                                <div
                                                  style="width: 15%; height: 100%; font-size: 14px; display: flex; justify-content: center; align-items: center;">
                                                     ${switch_html_3}
                                                </div>
                                                </div>
                                        </div>
                                            `
                                        // ////console.log(item_name_3, item3.level)
                                    }
                                }

                            })
                        }
                    }
                })

            }

        })

        //console.log('get_data_permission', get_data_permission)
        const get_data_permission_for_check = JSON.parse(JSON.stringify(get_data_permission));
        //console.log('get_data_permission_for_check',get_data_permission_for_check)
        const div_content_permission = document.querySelectorAll('#content_list_permission_level')
        // const a = document.querySelectorAll('#input_access')
        div_content_permission.forEach((e, index) => {
            // e.style.display = 'flex';

            e.addEventListener('click', (event) => {
                if (event.target.matches('#input_access')) {
                    const checkedStatus = event.target.checked;

                    get_data_permission[index].access = checkedStatus;
                    //console.log(get_data_permission[index]);
                    check_data_permissions_befor_update(get_data_permission_for_check)

                }
                if (event.target.matches('#input_create')) {
                    const checkedStatus = event.target.checked;

                    get_data_permission[index].create = checkedStatus;

                    //console.log(get_data_permission[index]);
                    check_data_permissions_befor_update(get_data_permission_for_check)
                }
                if (event.target.matches('#input_delete')) {
                    const checkedStatus = event.target.checked;

                    get_data_permission[index].delete = checkedStatus;

                    //console.log(get_data_permission[index]);
                    check_data_permissions_befor_update(get_data_permission_for_check)
                }
                if (event.target.matches('#input_modify')) {
                    const checkedStatus = event.target.checked;

                    get_data_permission[index].modify = checkedStatus;

                    //console.log(get_data_permission[index]);
                    check_data_permissions_befor_update(get_data_permission_for_check)
                }
                if (event.target.matches('#input_switch')) {
                    const checkedStatus = event.target.checked;

                    get_data_permission[index].switch_status = checkedStatus;

                    //console.log(get_data_permission[index]);
                    check_data_permissions_befor_update(get_data_permission_for_check)

                }
            });
        });

        document.querySelectorAll('#content_list_permission').forEach((e) => {

            const get_lv_2 = e.querySelector('#slidetapperuser2')
            if (get_lv_2 == null) {
                e.querySelector('#img_icon_arrow').style.display = 'none'
            } else {
                e.querySelector('#img_icon_arrow').style.display = 'flex'
                // console.log(e)
                e.querySelector('#text_name_permission').addEventListener('click', () => {
                    e.querySelectorAll('#slidetapperuser2').forEach((item) => {
                        item.style.display === 'flex'
                            ? ((item.style.display = 'none'), (e.querySelector('#img_icon_arrow').style.cssText += `transform: rotate(0deg);`))
                            : ((item.style.display = 'flex'), (e.querySelector('#img_icon_arrow').style.cssText += `transform: rotate(180deg);`));

                    })
                })
            }

        })
        document.querySelectorAll('#slidetapperuser2').forEach((e) => {
            // console.log(e)
            const lv3 = e.querySelector('#content_list_permission_drop_3')
            if (lv3.innerHTML == null || lv3.innerHTML == '') {
                e.querySelector('#content_list_permission_level  #img_icon_arrow').style.display = 'none'
            } else {
                const tag_p = e.querySelector('#text_name_permission')
                tag_p.addEventListener('click', () => {
                    lv3.style.display === 'flex'
                        ? ((lv3.style.display = 'none'), (e.querySelector('#img_icon_arrow').style.cssText += `transform: rotate(0deg);`))
                        : ((lv3.style.display = 'flex'), (e.querySelector('#img_icon_arrow').style.cssText += `transform: rotate(180deg);`));

                })

            }
        })


    } catch (err) {
        console.error('Error:', err);
    }
}

function check_data_permissions_befor_update(get_data_permission_for_check) {

    const stringifiedDataForCheck = JSON.stringify(get_data_permission_for_check);
    const stringifiedData = JSON.stringify(get_data_permission);

    // Compare the string representations of the arrays
    if (stringifiedDataForCheck === stringifiedData) {
        document.querySelector('#footer_wrapper2').style.display = 'none'

    } else {
        document.querySelector('#footer_wrapper2').style.display = 'flex'
    }


    document.querySelector('#btn_save_permission').addEventListener('click', () => {
        const data_for_update_permission = []
        get_data_permission.forEach((item, index) => {

            if (item.p_id == get_data_permission_for_check[index].p_id) {
                if (item.access == get_data_permission_for_check[index].access &&
                    item.create == get_data_permission_for_check[index].create &&
                    item.modify == get_data_permission_for_check[index].modify &&
                    item.delete == get_data_permission_for_check[index].delete &&
                    item.switch_status == get_data_permission_for_check[index].switch_status
                ) {
                    //console.log('not update')
                } else {
                    data_for_update_permission.push(get_data_permission[index])
                    //console.log('update : ',data_for_update_permission)
                }
            } else {
                //console.log('not same',item.p_id)

            }
        });
        document.querySelector('#footer_wrapper2').style.display = 'none'
        update_permissions(data_for_update_permission)

    })
}

//table
function table_user() {
    try {
        const tbody_user = document.querySelector('#tbody_user');
        data_user.forEach((item) => {
            let text_state;
            item.status === true ? text_state = '<span class="state_active_content">ใช้งาน</span>' : text_state = '<span class="state_inactive_content">ไม่ใช้งาน</span>';
            tbody_user.innerHTML += `
            <tr id='td_mouseenter'>
                <td>${item.r_id}</td>
                <td>${item.fname} ${item.lname}</td>
                <td>${item.email}</td>
                <td class='user_active'><span class="material-symbols-outlined" id="icon_master_eidit">check</span></td>
                <td>${item.role_name}</td>
                <td class='user_active'>-</td>
                <td class='user_active'>${text_state}</td>
                <td><span onclick="openEdit('${item.email}');" class="material-symbols-outlined" style="color: lightgray;">edit</span></td>
            </tr>`;
        })
        mouseenter()
    } catch (err) {
        console.log('error', err)
    }
}

var modal = document.getElementById("myModal");

// Open the modal
function openModal() {
    modal.style.display = "block";
}

// Close the modal
function closeModal() {
    modal.style.display = "none";
}

async function table_roles() {
    try {

        document.querySelector('#tbody_roles').innerHTML = ''
        const tbody_user = document.querySelector('#tbody_roles');
        data_roles.forEach((item) => {
            let state_state;
            let display_roles
            if (state_role_output == true) {
                if (item.status === true) {
                    display_roles = ""
                    state_state = '<span class="state_active_content">ใช้งาน</span>'
                } else {
                    display_roles = ` color: #fff;
                    background-color: lightgray;`
                    state_state = '<span class="state_inactive_content">ไม่ใช้งาน</span>';
                }
            } else {
                if (item.status === true) {
                    display_roles = ` color: #fff;
                    background-color: lightgray;`

                    state_state = '<span class="state_active_content">ใช้งาน</span>'
                } else {
                    display_roles = ""
                    state_state = '<span class="state_inactive_content">ไม่ใช้งาน</span>';
                }
            }

            let state_hr;
            if (item.isHR === true) {
                state_hr = `<span class="material-symbols-outlined" id="icon_master_eidit">check</span>`
            } else {
                state_hr = ` `

            }
            tbody_user.innerHTML += `
             <tr  id='td_mouseenter'  >
                <td  style=' text-align:left; '><span class='name_roles_check'>${item.role_name}</span></td>
                <td style='text-align:left;'>${item.des}</td>
                <td style='text-align:center;'>${state_hr}</td>
                <td style='text-align:center;'><span class="state_active_content" style='${display_roles}'>${state_state}</span></td>
                <td style=''> 
                    <div style='display:flex; align-item:center; justify-content:space-around;' class='icon_opacity' id='icon_opacity'>
                    <span class="material-symbols-outlined" id="icon_more_edit">edit</span>
                    <span class="material-symbols-outlined" id="icon_more_like_permission" style="transform: rotate(-45deg) scaleX(-1);">key</span>
                    </div>
                </td>
             </tr>
             `;
        })

        const searchInput = document.getElementById('search_bar_role');
        const tableRows = document.querySelectorAll('#td_mouseenter');

        searchInput.addEventListener('input', () => {
            const searchText = searchInput.value.toLowerCase();

            tableRows.forEach((row) => {
                const roleNameElement = row.querySelector('.name_roles_check');
                if (roleNameElement) {
                    const roleName = roleNameElement.textContent.toLowerCase();
                    const display = roleName.includes(searchText) ? 'table-row' : 'none';
                    row.style.display = display;
                }
            });
        });



        document.querySelectorAll('#icon_more_edit').forEach((e, index) => {
            e.addEventListener('click', () => {
                data_role_edit = {
                    r_id: null,
                    role_name: '',
                    isHR: false,
                    des: '',
                    status: null
                }
                data_role_edit.r_id = data_roles[index].r_id
                document.querySelector('#edit_list_role').classList.add('open');
                document.querySelector('#blur_bg').style.display = 'flex';

                data_role_edit.role_name = data_roles[index].role_name
                document.querySelector('#role_name_input_edit').value = data_roles[index].role_name

                data_role_edit.isHR = data_roles[index].isHR
                const btn_hrset = document.getElementById('set_hr_true_edit')
                const btn_hrnone = document.getElementById('set_hr_false_edit')
                if (data_roles[index].isHR == true) {
                    btn_hrset.style.cssText = `
                    border: 1px solid var(--bg_Thridnary_2);
                    background-color: lightseagreen;
                    color: #fff;
                    `
                    btn_hrnone.style.cssText = `
                    border: 1px solid lightgray;
                    background-color: #fff;
                    color: lightgrey;
                    `
                } else {
                    btn_hrnone.style.cssText = `
                    border: 1px solid var(--bg_Thridnary_2);
                    background-color: lightseagreen;
                    color: #fff;
                    `
                    btn_hrset.style.cssText = `
                    border: 1px solid lightgray;
                    background-color: #fff;
                    color: lightgrey;
                    `
                }

                data_role_edit.des = data_roles[index].des
                document.querySelector('#role_des_input_edit').value = data_roles[index].des

                data_role_edit.status = data_roles[index].status
                const eswitch = document.querySelector('#switch-edit_role-status')
                eswitch.checked = data_roles[index].status
                eswitch.addEventListener('click', () => {
                    data_role_edit.status = eswitch.checked
                    ////console.log(data_role_edit)
                })

                const desth = document.getElementById("role_des_input_edit");
                let getdes = desth.value;
                desth.addEventListener("input", function () {
                    if (desth.value !== getdes) {
                        getdes = desth.value;
                        data_role_edit.des = getdes;
                        ////console.log(data_role_edit)
                    }
                });
                const role_name = document.getElementById("role_name_input_edit");
                let getrole = role_name.value;
                role_name.addEventListener("input", function () {
                    if (role_name.value !== getrole) {
                        getrole = role_name.value;
                        data_role_edit.role_name = getrole;
                        ////console.log(data_role_edit)
                    }
                });
                const btn_hr_edit = document.getElementById('set_hr_true_edit')
                const btn_hrnone_edit = document.getElementById('set_hr_false_edit')
                btn_hr_edit.addEventListener('click', () => {
                    data_role_edit.isHR = true

                    btn_hr_edit.style.cssText = `
                    border: 1px solid var(--bg_Thridnary_2);
                    background-color: lightseagreen;
                    color: #fff;
                    `
                    btn_hrnone_edit.style.cssText = `
                    border: 1px solid lightgray;
                    background-color: #fff;
                    color: lightgrey;
                    `
                    ////console.log(data_role_edit)
                })
                btn_hrnone_edit.addEventListener('click', () => {
                    data_role_edit.isHR = false

                    btn_hrnone_edit.style.cssText = `
                    border: 1px solid var(--bg_Thridnary_2);
                    background-color: lightseagreen;
                    color: #fff;
                    `
                    btn_hr_edit.style.cssText = `
                    border: 1px solid lightgray;
                    background-color: #fff;
                    color: lightgrey;
                    `
                    ////console.log(data_role_edit)
                })
                ////console.log(data_role_edit)
            })
        })
        document.querySelector('#btn_submit_data_edit').addEventListener('click', () => {
            document.querySelector('#add_list_role').classList.remove('open');
            document.querySelector('#blur_bg').style.display = 'none';
            edit_role()
        })
        mouseenter()
    } catch (err) {
        ////console.log('error',err)
    }
}


// tab_permission in payroll
function permission_roles() {
    // let id;
    // ////console.log('data_payroll', data_payroll[0])
    const divRole = document.querySelector("#permission_roles_item")
    divRole.innerHTML = ''
    const divadd = document.querySelector('.add_empolyee')
    const divadd_empolyee = document.querySelector('.add_empolyee > div')

    data_roles.forEach((item) => {
        let state_display;
        if (item.status == true) {
            state_display = `display: flex;`
        } else {
            state_display = `display: none;`
        }
        divRole.innerHTML += `
        <div class="colortab" id='role_name_permisson' 
        style="height: 56px; ${state_display} align-items: center;  border-bottom: 1px solid #EAEAEA;  padding: 0 28px; ">
        ${item.role_name}
      </div>`
        if (item.ppr_id == null && item.status == true) {

            divadd_empolyee.innerHTML += `
            <li id='ppr_choice'>${item.role_name}</li>
            `
            // ////console.log(item.r_id,item.role_name)
            let d = {
                r_id: item.r_id,
                role_name: item.role_name
            }
            get_roles_for_payroll.push(d)
        }
    })
    ppr_choice()

    divRole.querySelectorAll("#role_name_permisson").forEach((Element, item) => {
        Element.addEventListener('click', () => {
            const r_id = data_roles[item].r_id
            get_rid_per = r_id
            get_index_per = item
            get_permission(r_id)
        })
    })

    document.querySelectorAll('#role_name_permisson').forEach((e) => {
        e.addEventListener('click', () => {
            e.classList.add('active_colortab');
            document.querySelectorAll('#role_name_permisson').forEach((element) => {
                if (element !== e) {
                    element.classList.remove('active_colortab');
                }
            });
        });
    });

    document.querySelector('#addrolds_payrollpermission').addEventListener('click', () => {
        if (divadd.style.display == 'flex') {
            divadd.style.display = 'none'
        } else {


            divadd.style.display = 'flex'

        }

    })
    document.querySelectorAll('#role_name_permisson').forEach((e, i) => {
        if (i == 0) {
            e.classList.add('active_colortab');

        } else {
            e.classList.remove('active_colortab');

        }
    })

}


function ppr_choice() {

    document.querySelectorAll('#ppr_choice').forEach((e, index) => {
        e.addEventListener('click', () => {
            const chec_part1p1_payrollpermission_add = document.querySelector('#part1p1_payrollpermission_add')
            if (chec_part1p1_payrollpermission_add != null) {
                chec_part1p1_payrollpermission_add.remove()
            }
            ////console.log(get_roles_for_payroll[index].role_name)
            add_divPeyroll(get_roles_for_payroll[index].role_name, get_roles_for_payroll[index].r_id)
        })
    })
}
var element_payroll = document.querySelector('#permission_payroll_role')

function add_divPeyroll(name, r_id) {

    let data_div = element_payroll.innerHTML
    let date_new = `
    <div id="part1p1_payrollpermission_add" class="colortab" style='  width: 99%; 
            display: flex;
             align-items: center;
              height: 65px; background-color: white; border-bottom: 1px solid lightgray;
              cursor: pointer;'>
                <span style="padding-left: 7px;">${name}</span>
    </div>
    `
    element_payroll.innerHTML = date_new + data_div
    // data_input_payoll(0)
    data_payroll_add.r_id = r_id
    ////console.log(name)

    document.querySelector('#part1p1_payrollpermission_add').addEventListener('click', () => {
        document.querySelector('#footer_wrapper_add').style.display = 'flex'
        document.querySelector('#footer_wrapper_edit').style.display = 'none';
        document.querySelector('#despart1_payrollpermission').style.display = 'none'
        document.querySelector('#despart1_payrollpermission_add').style.display = 'flex'

        document.querySelector('#part1p1_payrollpermission_add').classList.add('active_colortab');
        document.querySelectorAll('#part1p1_payrollpermission').forEach((element) => {
            element.classList.remove('active_colortab');
            element.addEventListener('click', () => {
                if (document.querySelector('#part1p1_payrollpermission_add') != null) {
                    document.querySelector('#btn_cancel_payroll').click()
                }

            })
        });
        get_Payroll_Permission(0)
    })

    document.querySelector('#part1p1_payrollpermission_add').click()
    // document.querySelector('#footer_wrapper_edit').style.display = 'none';

}
document.querySelector('#btn_save_payroll_add').addEventListener('click', () => {
    document.querySelector('#footer_wrapper_add').style.display = 'none'
    ////console.log('data_payroll_add', data_payroll_add)
    add_payroll()
})
// var check_access;
// var check_create;
// var check_delete;
// var check_modify;
// var check_switch;
// function check_update_permission() {

// }
// tab permission_payroll

function permission_payroll_role(id) {

    element_payroll.innerHTML = ''
    data_roles.forEach((item, index) => {

        if (item.ppr_id != null) {
            element_payroll.innerHTML += `
            <div id="part1p1_payrollpermission" class="colortab" style='  width: 99%; 
            display: flex;
             align-items: center;
              height: 65px; background-color: white; border-bottom: 1px solid lightgray;
              cursor: pointer;'>
                <span style="padding-left: 7px;">${item.role_name}</span>
            </div>
            `
            if (item.ppr_id == id) {
                document.querySelectorAll('#part1p1_payrollpermission')[index].classList.add('active_colortab');
            }
        }
    })
    data_roles.forEach((item) => {
        if (item.ppr_id != null && item.status != false) {
            let a = {
                role_name: item.role_name,
                ppr_id: item.ppr_id,
                r_id: item.r_id
            }
            payroll_show_roles.push(a)
        }
    })
    document.querySelectorAll('#part1p1_payrollpermission').forEach((e, index) => {
        ////console.log(payroll_show_roles[index].ppr_id)


        e.addEventListener('click', () => {

            e.classList.add('active_colortab');
            // ////console.log()
            check_rid_cancel = payroll_show_roles[index].ppr_id
            console.log('check_rid_cancel', check_rid_cancel)
            get_Payroll_Permission(payroll_show_roles[index].ppr_id)

            // ////console.log(e)
            data_input_payoll()
            document.querySelectorAll('#part1p1_payrollpermission').forEach((element) => {
                if (element !== e) {
                    element.classList.remove('active_colortab');
                }
            });
        });
    })
}

function mouseenter() {
    const Element = document.querySelectorAll('#td_mouseenter')
    Element.forEach((e) => {
        const div_opacity = e.querySelector('#icon_opacity')
        e.addEventListener('mouseenter', () => {
            div_opacity.style.opacity = '100';
        })
        e.addEventListener('mouseleave', () => {
            div_opacity.style.opacity = '0';
        })
    })
    const e_icon_edit = document.querySelectorAll('#icon_more_edit')
    e_icon_edit.forEach((e) => {
        e.addEventListener('mouseenter', () => {
            e.style.color = ' var(--bg_Thridnary_2)'
        })
        e.addEventListener('mouseleave', () => {
            e.style.color = 'lightgray'
        })
    })
    const e_icon_key = document.querySelectorAll('#icon_more_like_permission')
    e_icon_key.forEach((e) => {
        e.addEventListener('mouseenter', () => {
            e.style.color = ' var(--bg_Thridnary_2)'
        })
        e.addEventListener('mouseleave', () => {
            e.style.color = 'lightgray'
        })
    })
}

const rank_start_list = [
    { id: 1, name: 'เริ่มจากค่าว่าง', name_data: 'start' },
    { id: 2, name: 'Staff', name_data: 'staff' },
    { id: 3, name: 'Supervisor', name_data: 'supervisor' },
]
document.querySelector('#menu_add_roles').addEventListener('click', () => {
    document.querySelector('#add_list_role').classList.add('open');
    document.querySelector('#blur_bg').style.display = 'flex';
    document.querySelector('#role_name_input').value = data_role_add.role_name
    document.querySelector('#role_des_input').value = data_role_add.des
    const btn_hrset = document.getElementById('set_hr_true')
    const btn_hrnone = document.getElementById('set_hr_false')
    if (data_role_add.isHR == true) {
        btn_hrset.style.cssText = `
        border: 1px solid var(--bg_Thridnary_2);
        background-color: lightseagreen;
        color: #fff;
        `
        btn_hrnone.style.cssText = `
        border: 1px solid lightgray;
        background-color: #fff;
        color: lightgrey;
        `
    } else {
        btn_hrnone.style.cssText = `
        border: 1px solid var(--bg_Thridnary_2);
        background-color: lightseagreen;
        color: #fff;
        `
        btn_hrset.style.cssText = `
        border: 1px solid lightgray;
        background-color: #fff;
        color: lightgrey;
        `
    }
    document.querySelector('#content_list_master_menu').innerHTML = `${data_role_add.set_start_role}`

    ////console.log(data_role_add)

})
document.querySelector('#master_group_list').addEventListener('click', () => {
    document.querySelector('#position_popup_list').style.display == 'flex'
        ? document.querySelector('#position_popup_list').style.display = 'none'
        : document.querySelector('#position_popup_list').style.display = 'flex';
    document.querySelector('#master_group_list-icon').style.cssText == 'transform: rotate(180deg);'
        ? document.querySelector('#master_group_list-icon').style.cssText += 'transform: rotate(0deg);'
        : document.querySelector('#master_group_list-icon').style.cssText += 'transform: rotate(180deg);'

})
document.querySelectorAll('#rank_start_id').forEach((e, index) => {
    e.addEventListener('click', () => {
        document.querySelector('#content_list_master_menu').innerHTML = `${rank_start_list[index].name}`
        document.querySelector('#content_list_master_menu').style.color = 'black';
        document.querySelector('#position_popup_list').style.display = 'none'
        data_role_add.set_start_role = rank_start_list[index].name
        ////console.log(data_role_add)
    })

})
document.body.addEventListener("click", function (event) {
    if (!document.querySelector("#master_list_muenu_click").contains(event.target)) {
        document.querySelector("#position_popup_list").style.display = "none";
    }
});
document.querySelector('#btn_cancel_data_add').addEventListener(('click'), () => {
    data_role_add = {
        role_name: '',
        set_start_role: 'กรุณาเลือก*',
        isHR: false,
        des: '',
    }
    document.querySelector('#content_list_master_menu').style.color = 'lightgray'
    ////console.log(data_role_add)
})
document.querySelector("#btn_submit_data_add").addEventListener(('click'), () => {
    add_roles()
})
//
autoinput_data()
function autoinput_data() {
    const nameth = document.getElementById("role_name_input");
    let getnameth = nameth.value;
    nameth.addEventListener("input", function () {
        if (nameth.value !== getnameth) {
            getnameth = nameth.value;
            data_role_add.role_name = getnameth;
            ////console.log(data_role_add)
        }
    })
    const desth = document.getElementById("role_des_input");
    let getdes = desth.value;
    desth.addEventListener("input", function () {
        if (desth.value !== getdes) {
            getdes = desth.value;
            data_role_add.des = getdes;
            ////console.log(data_role_add)
        }
    });
    const btn_hrset = document.getElementById('set_hr_true')
    const btn_hrnone = document.getElementById('set_hr_false')
    btn_hrset.addEventListener('click', () => {
        data_role_add.isHR = true

        btn_hrset.style.cssText = `
        border: 1px solid var(--bg_Thridnary_2);
        background-color: lightseagreen;
        color: #fff;
        `
        btn_hrnone.style.cssText = `
        border: 1px solid lightgray;
        background-color: #fff;
        color: lightgrey;
        `
        ////console.log(data_role_add)
    })
    btn_hrnone.addEventListener('click', () => {
        data_role_add.isHR = false

        btn_hrnone.style.cssText = `
        border: 1px solid var(--bg_Thridnary_2);
        background-color: lightseagreen;
        color: #fff;
        `
        btn_hrset.style.cssText = `
        border: 1px solid lightgray;
        background-color: #fff;
        color: lightgrey;
        `
        ////console.log(data_role_add)
    })
}

//

async function add_roles() {
    const new_data = {
        role_name: data_role_add.role_name?.trim(),
        set_start_role: data_role_add.set_start_role?.trim(),
        des: data_role_add.des?.trim(),
        isHR: data_role_add.isHR
    };
    ////console.log('new_data',new_data)
    try {
        let headersList = {
            Accept: "*/*",
            "Content-Type": "application/json",
        };

        let bodyContent = JSON.stringify({
            token: token,
            obj: new_data
        });

        let response = await fetch(
            ENDPOINT + "mobile/Add-Role",
            {
                method: "POST",
                body: bodyContent,
                headers: headersList,
            }
        );
        // location.reload()
        let data = await response.json();

        if (data.checkstate == true) {
            document.querySelector('#tbody_roles').innerHTML = ''
            document.querySelector('#add_list_role').classList.remove('open');
            document.querySelector('#blur_bg').style.display = 'none';
            // table_roles()
            get_roles()
        } else {
            ////console.log("wrong!!")
        }
        data_role_add = {
            role_name: '',
            set_start_role: 'กรุณาเลือก*',
            isHR: false,
            des: '',
        }
        document.querySelector('#content_list_master_menu').style.color = 'lightgray'
    } catch (err) {
        ////console.log(err)
    }
}
async function edit_role() {
    const new_data = {
        r_id: data_role_edit.r_id,
        role_name: data_role_edit.role_name?.trim(),
        des: data_role_edit.des?.trim(),
        isHR: data_role_edit.isHR,
        status: data_role_edit.status
    };
    ////console.log('new_data',new_data)
    try {
        let headersList = {
            Accept: "*/*",
            "Content-Type": "application/json",
        };

        let bodyContent = JSON.stringify({
            token: token, obj: new_data
        });

        let response = await fetch(
            ENDPOINT + "mobile/Edit-Role_use",
            {
                method: "POST",
                body: bodyContent,
                headers: headersList,
            }
        );
        // location.reload()
        let data = await response.json();
        ////console.log(data)
        if (data.checkstate == true) {
            ////console.log(data.checkstate)
            document.querySelector('#tbody_roles').innerHTML = ''
            document.querySelector('#edit_list_role').classList.remove('open');
            document.querySelector('#blur_bg').style.display = 'none';
            // table_roles()
            get_roles()
        } else {
            ////console.log("wrong!!")
        }
        data_role_edit = {
            r_id: null,
            role_name: '',
            isHR: false,
            des: '',
            status: null
        }
        document.querySelector('#content_list_master_menu').style.color = 'lightgray'
    } catch (err) {
        ////console.log(err)
    }
}

// const tab_roles = document.querySelector('#tab_roles')
// tab_roles.querySelector('#filter_active').addEventListener('click', () => {
//     if (state_role_output == true) {
//         state_role_output = false
//         tab_roles.querySelector('#filter_active').style.cssText += `   border: 2px solid gray;
//         background-color: gray;
//         color: white;
//          `
//     } else {
//         state_role_output = true
//         tab_roles.querySelector('#filter_active').style.cssText += ` border: 2px solid var(--bg_Thridnary_2);
//         background-color: #eafffa;
//         color: var(--bg_Thridnary_2);
//        `}
//     ////console.log(state_role_output)
//     table_roles()
// })


function check_update_payroll() {
    if (data_payroll_edit_check.ppr_id == data_payroll_edit.ppr_id &&
        data_payroll_edit_check.payroll_calculation == data_payroll_edit.payroll_calculation &&
        data_payroll_edit_check.payroll_verification == data_payroll_edit.payroll_verification &&
        data_payroll_edit_check.payroll_approval == data_payroll_edit.payroll_approval &&
        data_payroll_edit_check.payroll_period_close == data_payroll_edit.payroll_period_close &&
        data_payroll_edit_check.payroll_payment == data_payroll_edit.payroll_payment &&
        data_payroll_edit_check.adjust_closed_payrolls == data_payroll_edit.adjust_closed_payrolls &&
        data_payroll_edit_check.rerun_concluded == data_payroll_edit.rerun_concluded &&
        data_payroll_edit_check.delete_special == data_payroll_edit.delete_special
    ) {
        document.querySelector('#footer_wrapper_edit').style.display = 'none';
        // ////console.log('none update')
    } else {
        document.querySelector('#footer_wrapper_edit').style.display = 'flex';
        // ////console.log('update')
    }
}
document.querySelector('#btn_save_payroll').addEventListener('click', () => {
    document.querySelector('#footer_wrapper_edit').style.display = 'none';
    update_payroll()
})
//update payroll
async function update_payroll() {

    try {
        let headersList = {
            Accept: "*/*",
            "Content-Type": "application/json",
        };

        let bodyContent = JSON.stringify({
            token:
                token,
            obj: data_payroll_edit
        });

        let response = await fetch(
            ENDPOINT + "mobile/Update-RoleForPayroll",
            {
                method: "POST",
                body: bodyContent,
                headers: headersList,
            }
        );
        // location.reload()
        let data = await response.json();
        let dataecheck = data.checkstate

        if (dataecheck == true) {
            get_Payroll_Permission(data.ppr_id)
        } else {
            ////console.log('err')
        }
    } catch (err) {
        ////console.log('err',err)
    }
}
//add payroll 
async function add_payroll() {
    try {

        let headersList = {
            Accept: "*/*",
            "Content-Type": "application/json",
        };

        let bodyContent = JSON.stringify({
            token:
                token,
            obj: data_payroll_add
        });

        let response = await fetch(
            ENDPOINT + "mobile/Add-RoleForPayroll",
            {
                method: "POST",
                body: bodyContent,
                headers: headersList,
            }
        );
        // location.reload()
        let data = await response.json();
        let dataecheck = data.checkstate

        if (dataecheck == true) {
            ////console.log('add success')
            document.querySelector('#despart1_payrollpermission').style.display = 'flex'
            document.querySelector('#despart1_payrollpermission_add').style.display = 'none'
            // get_roles()
            location.reload()
            // get_Payroll_Permission(data.ppr_id)
        } else {
            ////console.log('err')
        }
    } catch (err) {
        ////console.log('err',err)
    }
}

async function update_permissions(data_for_update_permission) {
    try {

        let headersList = {
            Accept: "*/*",
            "Content-Type": "application/json",
        };

        let bodyContent = JSON.stringify({
            token: token, obj: data_for_update_permission
        });

        let response = await fetch(
            ENDPOINT + "mobile/Update-Permissions",
            {
                method: "POST",
                body: bodyContent,
                headers: headersList,
            }
        );
        // location.reload()
        let data = await response.json();
        let dataecheck = data.checkstate

        if (dataecheck == true) {
            console.log('update success')


        } else {
            //console.log('err')
        }
    } catch (err) {
        ////console.log('err',err)
    }
}

document.querySelector('#btn_cancel_payroll').addEventListener('click', () => {

    document.querySelector('#part1p1_payrollpermission_add').remove()
    document.querySelector('#despart1_payrollpermission_add').style.display = 'none'
    document.querySelector('#despart1_payrollpermission').style.display = 'flex'
    document.querySelector('#footer_wrapper_add').style.display = 'none'


    after_remove_pr()
    // get_permission(check_rid_cancel)
    // console.log('asd')

})
function after_remove_pr() {
    document.querySelectorAll('#part1p1_payrollpermission').forEach((e, index) => {

        e.addEventListener('click', () => {
            document.querySelector('#despart1_payrollpermission').style.display = 'flex'

            e.classList.add('active_colortab');
            check_rid_cancel = payroll_show_roles[index].ppr_id
            console.log('after', index)


            // e[index].click()
            // data_input_payoll(payroll_show_roles[0].ppr_id)
            data_input_payoll(check_rid_cancel)
            document.querySelectorAll('#part1p1_payrollpermission').forEach((element) => {
                if (element !== e) {
                    element.classList.remove('active_colortab');
                }
            });
        });
        if (index == 0) {
            e.click()
        }
    })
}

document.querySelector('#btn_cancel_payroll_edit').addEventListener('click', () => {
    document.querySelector('#footer_wrapper_edit').style.display = 'none'
    // data_input_payoll(check_rid_cancel)
    if (check_rid_cancel != null) {
        data_input_payoll(check_rid_cancel)
        console.log(check_rid_cancel)
    } else {
        data_input_payoll(payroll_show_roles[0].ppr_id)
        console.log(payroll_show_roles[0].ppr_id)


    }


})


document.body.addEventListener("click", function (event) {
    if (!document.querySelector("#btn_add_empolyee").contains(event.target)) {
        document.querySelector(".add_empolyee").style.display = "none";
    }
});

document.querySelector('#btn_cancel_permission').addEventListener('click', () => {
    if (get_rid_per != null) {
        // document.querySelectorAll('#role_name_permisson')[get_index_per].classList.add('active_colortab');
        document.querySelectorAll("#role_name_permisson")[get_index_per].click()
        document.querySelector('#footer_wrapper2').style.display = 'none'


    } else {
        document.querySelectorAll("#role_name_permisson")[0].click()
        document.querySelector('#footer_wrapper2').style.display = 'none'

    }
})
