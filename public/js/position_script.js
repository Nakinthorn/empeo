import { popup_kp } from './popup_kp.js';
var token;
get_token()
async function get_token() {
  try {

    token = localStorage.token;
    ////call function ( position page )///////////////////////////////////////////////
    getAPI_position() //Fetch Data in Table From API (position)
    getAPI_rank()


  } catch (err) {
    //console.log('err',err)
  }
}

// Fetch Data in Table From API (rank)
onClickTabsView() // Swap Tab viewer
onClickSelectAll() // click check box in <th> for select all elements
AddPositionData() // overlay right side _ option add rank
stateRankToFrom() // switch limit posistion _ open and close to div rank
getDataInputAuto() // auto get data from input name_th and name_en
btn_cancel()
btn_submit()
/////////////////////////////////////////////////////////////////////////////////
////call function ( rank page )/////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////
const insert_data = {
  name_th: null,
  name_en: null,
  rank_limit: null,
  rank_from: null,
  rank_to: null,
  status: 'active'
}
const getDataInput = {
  position_id: null,
  name_en: null,
  name_th: null,
  rank_limit: null,
  rank_from: null,
  rank_to: null,
  status: null
}
const getDataRankSwap = {
  drag: null,
  drop: null
}
const getData_addrank = {
  name_r: null,
  name_en_r: null,
  reason: null
}
const getData_editrank = {
  rank_id: null,
  name_r: null,
  name_en_r: null,
  reason: null
}
const getData_deleterank = {
  rank_id: null
}
const delet_data_select = []

////////////////////

// Function Area //
async function getAPI_position() {
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
      "http://localhost:3333/mobile/Get-Sequence-Position",
      {
        method: "POST",
        body: bodyContent,
        headers: headersList,
      }
    );

    let data = await response.json();
    data = data.dataSend;
    console.log('position', data);

    document.querySelector("#data_position").innerHTML = ''
    let tbody_html = "";
    await data.forEach((Element) => {
      Element.rank != null ? Element.rank = Element.rank : Element.rank = '';
      let rankname = Element.rank;
      let sty = ''
      rankname = rankname.split('-')
      let rankText;
      if (rankname.length > 1) {
        rankText = rankname[0] + '-' + rankname[1]
      } else {
        rankText = rankname[0]
      }
      let displayTR;
      if (Element.status == 'Inactive') {
        displayTR = 'table-row'
        sty = ` color: #fff;
        background-color: lightgray;`
      } else {
        sty = ''
        displayTR = 'table-row';
      }
      let status_show;
      Element.status == 'active' ? status_show = 'ใช้งาน' : status_show = 'ไม่ใช้งาน';
      tbody_html += `<tr class="menu_rank" id="table_ranking" style="display : ${displayTR};">
                               <td class="checkbox_master" style="padding: 10px 15px;"> <div style="width: 18px;height: 18px;"><input type="checkbox" name="checkbox" id="position_checkbox_td" style="width: 100%;height: 100%;"></div></td>
                               <td class="name_rank" id='name_position'><span>${Element.name_th}</span></td>
                               <td class="name_rank"><span>${Element.name_en}</span></td>
                               <td class="position_rank"><span>${rankText}</span></td>
                               <td class="status_rank" id="status_active" ><span class="state_active_content" style='${sty}'>${status_show}</span></td>
                               <td>
                                <div class="table_position-icon" id="position-icon">
                                  <span class="material-symbols-outlined" id="edit_position_onerow">edit</span>
                                  <span class="material-symbols-outlined" id="btn_delet_onerow" >delete</span>
                                </div>
                               </td>
                               </tr>`;

    });

    document.querySelector("#data_position").innerHTML = tbody_html;

    // const divPo = document.querySelector('#content_position-wrapper-position')
    const searchInput = document.getElementById('search_position');

    searchInput.addEventListener('input', () => {
      const searchText = searchInput.value.toLowerCase();

      const rows = document.querySelectorAll('#table_ranking');
      rows.forEach((row) => {
        const name_th = row.querySelector('#name_position span').textContent.toLowerCase();
        if (name_th.includes(searchText)) {
          row.style.display = 'table-row';
        } else {
          row.style.display = 'none';
        }
      });
    });


    showData_popup_position() // show popUp rank
    hoverShowIcon()// show icon edit and delete
    onClickSelcetShowDelete(data) // show div bottom 
    deleteonerow(data)
    editeposition(data)

  } catch (err) {
    //console.log(err)
  }
}
//////////////////
function onClickTabsView() {

  document.querySelector("#content_position-tabs_view-position").addEventListener('click', () => {
    location.reload()
    document.querySelector("#content_position-tabs_view-position").style.cssText += `
        color: var(--bg_Thridnary_2);
        box-shadow: 0 2px 0 var(--bg_Thridnary_2);`;
    document.querySelector("#content_position-tabs_view-rank").style.cssText += `
        color: lightgray;
        box-shadow: unset;`;
    document.querySelector("#content_position-wrapper-position").style.cssText += `display : flex;`
    document.querySelector("#content_position-wrapper-rank").style.cssText += `display : none;`

  })
  document.querySelector("#content_position-tabs_view-rank").addEventListener('click', () => {


    document.querySelector("#content_position-tabs_view-position").style.cssText += `
        color: lightgray;
        box-shadow: unset;`;
    document.querySelector("#content_position-tabs_view-rank").style.cssText += `
        color: var(--bg_Thridnary_2);
        box-shadow: 0 2px 0 var(--bg_Thridnary_2);`;
    document.querySelector("#content_position-wrapper-position").style.cssText += `display : none;`
    document.querySelector("#content_position-wrapper-rank").style.cssText += `display : flex;`
    getAPI_rank()
  })
}
//////////////////
function onClickSelectAll() {
  document.querySelector("#position_checkbox_master").addEventListener('click', () => {
    document.querySelectorAll("#position_checkbox_td").forEach((Element, Index) => {
      Element.checked = document.querySelector("#position_checkbox_master").checked
    })
  })
}
//////////////////

async function getAPI_rank() {
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
      "http://localhost:3333/mobile/Get-Sequence-Rank",
      {
        method: "POST",
        body: bodyContent,
        headers: headersList,
      }
    );

    let data = await response.json();
    data = data.data;
    console.log(data);


    let tbody_html = "";
    await data.forEach((Element) => {
      if (Element.status_r == 'active') {
        tbody_html += `<tr class="menu_rank" id="table_ranking_rank" style="cursor:pointer;" draggable="true">
              <td><div class="rank_icon_drag" id="rank_icon_drag"><span class="material-symbols-outlined" id="icon_drag" > apps</span></td>
              <td class="name_rank"><span>${Element.name_r}</span></td>
              <td class="name_rank"><span>${Element.name_en_r}</span></td>
              <td class="status_rank" id="status_active" ><span>${Element.reason}</span></td>
              <td><div class="table_position-icon" id="position-icon_rank">
                <span class="material-symbols-outlined" id="rank_edit">edit</span>
                <span class="material-symbols-outlined" id="rank_delete">delete</span>
              </div></td>
          </tr>`;
      }


    });
    document.querySelector("#data_rank").innerHTML = tbody_html;


    const searchInput = document.getElementById('search_rank');

    searchInput.addEventListener('input', () => {

      const searchText = searchInput.value.toLowerCase();

      const rows = document.querySelectorAll('#table_ranking_rank');
      rows.forEach((row) => {
        const name_th = row.querySelector('.name_rank span').textContent.toLowerCase();
        if (name_th.includes(searchText)) {
          row.style.display = 'table-row';
        } else {
          row.style.display = 'none';
        }
      });
    });








    dragdrop()
    document.querySelectorAll('#table_ranking_rank').forEach((e, i) => {

      e.addEventListener('mouseenter', () => {
        if (e.querySelector("#rank_icon_drag")) {
          e.querySelector("#rank_icon_drag").style.cssText += `opacity : 100%`
        }
        e.querySelector("#position-icon_rank").style.cssText += `opacity : 100%`
      })
      e.addEventListener('mouseleave', () => {
        if (e.querySelector("#rank_icon_drag")) {
          e.querySelector("#rank_icon_drag").style.cssText += `opacity : 0%`
        }
        e.querySelector("#position-icon_rank").style.cssText += `opacity : 0%`
      })

      e.querySelector("#rank_edit").addEventListener('click', () => {
        getData_editrank.rank_id = data[i].rank_id
        document.querySelector('#position_rank-edit').classList.add('open');
        document.querySelector('#blur_bg').style.display = 'flex';
        document.querySelector("#position_name_th_rank-edit").value = data[i].name_r
        getData_editrank.name_r = data[i].name_r
        document.querySelector("#position_name_en_rank-edit").value = data[i].name_en_r
        getData_editrank.name_en_r = data[i].name_en_r
        document.querySelector("#position_name_des_rank-edit").value = data[i].reason
        getData_editrank.reason = data[i].reason
        // //console.log(getData_editrank)
      })
      e.querySelector("#rank_delete").addEventListener('click', () => {
        getData_deleterank.rank_id = data[i].rank_id
        //console.log(getData_deleterank)
        const confirmation = confirm("Are you sure you want to submit the form?");

        if (confirmation) {


          Swal.fire(
            'Form submitted successfully!',
            '',
            'success'
          )
          delete_rank()
        } else {
          Swal.fire(
            'Form submission canceled',
            '',
            'error'
          )
        }

      })
    })
    let drag_e;
    let drop_e;
    let arr_drag;

    document.querySelectorAll("#table_ranking_rank").forEach((e, i) => {
      e.addEventListener("dragstart", function (event) {
        drag_e = e.innerHTML;
        arr_drag = i;
        getDataRankSwap.drag = data[i].rank_id;
      });

      e.addEventListener("dragover", function (event) {
        event.preventDefault();

        const rect = e.getBoundingClientRect();
        const mouseY = event.clientY;
        const elementHeight = rect.height;

        if (mouseY < rect.top + elementHeight / 2) {
          // Mouse is in the top half of the element
          e.style.boxShadow = "0 -1px 0 var(--bg_Thridnary_2)";
          drop_e = i; // Set drop position as current index
        } else {
          // Mouse is in the bottom half of the element
          e.style.boxShadow = "0 1px 0 var(--bg_Thridnary_2)";
          drop_e = i + 1; // Set drop position as next index
        }
      });

      e.addEventListener("dragleave", function (event) {
        e.style.boxShadow = ""; // Reset box shadow
      });

      e.addEventListener("drop", function (event) {
        event.preventDefault();
        e.style.boxShadow = ""; // Reset box shadow
        swapE(arr_drag, drop_e);
      });
    });

    function swapE(index, drop_e) {
      if (getDataRankSwap.drag !== drop_e) {
        const elements = document.querySelectorAll("#table_ranking_rank");
        const targetElement = elements[index];

        if (index !== drop_e) {
          const parentElement = targetElement.parentNode;
          parentElement.removeChild(targetElement);

          const newRow = document.createElement("tr");
          newRow.innerHTML = drag_e;

          if (drop_e >= 0 && drop_e <= elements.length) {
            // Insert the new row at the top or bottom based on drop position
            if (drop_e === 0) {
              parentElement.insertBefore(newRow, elements[0]);
            } else if (drop_e === elements.length) {
              parentElement.appendChild(newRow);
            } else {
              parentElement.insertBefore(newRow, elements[drop_e]);
            }
          }
        }
        getDataRankSwap.drop = data[drop_e].rank_id;
        // getDataRankSwap.drop = drop_e;
        if (drop_e < arr_drag) {
          getDataRankSwap.drop = data[drop_e].rank_id;
        }

        if (drop_e > arr_drag) {
          drop_e -= 1;
          // //console.log("asdasd1 : "+drop_e)
          // //console.log("drag : "+arr_drag)
          getDataRankSwap.drop = data[drop_e].rank_id;
        }
        if (drop_e == arr_drag) {
          //console.log("empty");
        } else {
          //console.log(getDataRankSwap)
          swap_sequence();
        }
        //console.log('new ',getDataRankSwap)
      } else {
        //console.log("empty");
      }
    }
  } catch (err) {
    //console.log(err)
  }
}
/////////////////
function hoverShowIcon() {
  const elements = document.querySelectorAll('#table_ranking');
  elements.forEach((element) => {
    element.addEventListener('mouseenter', () => {
      // element.style.backgroundColor = '#FAFAFC';

      element.querySelector("#position-icon").style.cssText += `opacity : 100%`
    });

    element.addEventListener('mouseleave', () => {
      // element.style.backgroundColor = '';

      element.querySelector("#position-icon").style.cssText += `opacity : 0%`
    });
  });


}
////////////////
function onClickSelcetShowDelete(data) {
  const positionCheckboxes = document.querySelectorAll('#position_checkbox_td');
  const footerWrapper = document.querySelector("#footer_wrapper");
  const check_boxMaster = document.querySelector("#position_checkbox_master")

  positionCheckboxes.forEach((element, index) => {

    element.addEventListener('click', () => {
      4
      let datatracking = {
        p_id: data[index].position_id
      };

      if (element.checked === true) {
        delet_data_select.push(datatracking);
      } else {
        const indexToRemove = delet_data_select.findIndex(item => item.p_id === datatracking.p_id);
        if (indexToRemove !== -1) {
          delet_data_select.splice(indexToRemove, 1);
        }
      }

      //console.log(delet_data_select)

      const allUnchecked = Array.from(positionCheckboxes).every((checkbox) => !checkbox.checked);
      if (allUnchecked) {

        footerWrapper.style.display = 'none';
      } else {

        footerWrapper.style.display = 'flex';
      }



    });

  });
  check_boxMaster.addEventListener('click', () => {
    if (check_boxMaster.checked == true) {
      footerWrapper.style.display = 'flex';
    } else {
      footerWrapper.style.display = 'none';
    }
  })


}
////////////////
function AddPositionData() {

  document.querySelector("#selection_text_1").addEventListener('click', () => {
    if (document.querySelector("#container_popup_rank_1").style.display == 'flex') {
      document.querySelector("#container_popup_rank_1").style.display = 'none'
    }
    else {
      document.querySelector("#container_popup_rank_1").style.display = 'flex';
      document.querySelector("#container_popup_rank_2").style.display = 'none'
    }
  })
  document.querySelector("#selection_text_2").addEventListener('click', () => {
    if (document.querySelector("#container_popup_rank_2").style.display == 'flex') {
      document.querySelector("#container_popup_rank_2").style.display = 'none'
    }
    else {
      document.querySelector("#container_popup_rank_2").style.display = 'flex';
      document.querySelector("#container_popup_rank_1").style.display = 'none'
    }
  })

}
///////////////
function stateRankToFrom() {
  const switch_limit_rank = document.querySelector(".rank_swap");
  const input_limit = document.querySelector("#check_limit_position")
  input_limit.addEventListener('click', () => {
    if (switch_limit_rank.style.display == 'flex') {
      switch_limit_rank.style.display = 'none';
      insert_data.rank_limit = 'false'
    } else {
      switch_limit_rank.style.display = 'flex';
      insert_data.rank_limit = 'true'
    }
    document.querySelector("#container_popup_rank_1").style.display = 'none';
    document.querySelector("#container_popup_rank_2").style.display = 'none'
    //console.log(insert_data)
  })
}
///////////////
async function showData_popup_position() {
  try {

    let headersList = {
      Accept: "*/*",
      "Content-Type": "application/json",
    };

    let bodyContent = JSON.stringify({
      token:
        token
    });

    let response = await fetch(
      "http://localhost:3333/mobile/Get-Sequence-Rank",
      {
        method: "POST",
        body: bodyContent,
        headers: headersList,
      }
    );

    let data = await response.json();
    data = data.data;
    console.log('data', data)
    const el_content_rank = document.querySelector("#content_popup_rank_1 ul")
    const el_content_rank_2 = document.querySelector("#content_popup_rank_2 ul")
    const el_content_rank_edit = document.querySelector("#content_popup_rank_1_edit ul")
    const el_content_rank_2_edit = document.querySelector("#content_popup_rank_2_edit ul")

    data.forEach((i) => {
      el_content_rank.innerHTML += `<li class="list_rank_1">${i.name_r} (${i.reason})</li>`
      el_content_rank_2.innerHTML += `<li class="list_rank_2">${i.name_r} (${i.reason})</li>`
      el_content_rank_edit.innerHTML += `<li class="list_rank_1_edit">${i.name_r} (${i.reason})</li>`
      el_content_rank_2_edit.innerHTML += `<li class="list_rank_2_edit">${i.name_r} (${i.reason})</li>`
      console.log(i.name_r)
    })
    const getRoleLi = document.querySelectorAll(".list_rank_1")
    if (getRoleLi) {
      getRoleLi.forEach((items, index) => {
        items.addEventListener('click', () => {
          const sl = document.querySelector('#selection_text_1 span')
          sl.textContent = `${data[index].name_r} (${data[index].reason})`
          sl.style.cssText = `color: #000;`
          // ele1.style.cssText += `border: 1px solid lightgrey;`
          document.querySelector("#container_popup_rank_1").style.display = 'none';
          insert_data.rank_from = data[index].rank_id
          //console.log(insert_data)
        })
      })
    }
    const getRoleLi_edit = document.querySelectorAll(".list_rank_1_edit")
    if (getRoleLi_edit) {
      getRoleLi_edit.forEach((items, index) => {
        items.addEventListener('click', () => {
          const sl = document.querySelector('#selection_text_1_edit span')
          sl.textContent = `${data[index].name_r} (${data[index].reason})`
          sl.style.cssText = `color: #000;`
          // ele1.style.cssText += `border: 1px solid lightgrey;`
          document.querySelector("#container_popup_rank_1_edit").style.display = 'none';
          getDataInput.rank_from = data[index].rank_id

          //console.log(getDataInput)
        })
      })
    }
    const getRoleLi_2edit = document.querySelectorAll(".list_rank_2_edit")
    if (getRoleLi_2edit) {
      getRoleLi_2edit.forEach((items, index) => {
        items.addEventListener('click', () => {
          const sl = document.querySelector('#selection_text_2_edit span')
          sl.textContent = `${data[index].name_r} (${data[index].reason})`
          sl.style.cssText = `color: #000;`
          // ele1.style.cssText += `border: 1px solid lightgrey;`
          document.querySelector("#container_popup_rank_2_edit").style.display = 'none';
          getDataInput.rank_to = data[index].rank_id
          //console.log(getDataInput)
        })
      })
    }
    const getRoleLi_2 = document.querySelectorAll(".list_rank_2")
    if (getRoleLi_2) {
      getRoleLi_2.forEach((items, index) => {
        items.addEventListener('click', () => {
          const sl = document.querySelector('#selection_text_2 span')
          sl.textContent = `${data[index].name_r} (${data[index].reason})`
          sl.style.cssText = `color: #000;`
          // ele1.style.cssText += `border: 1px solid lightgrey;`
          document.querySelector("#container_popup_rank_2").style.display = 'none';
          insert_data.rank_to = data[index].rank_id
          //console.log(insert_data)
        })
      })
    }
  } catch (error) {
    console.error("Error:", error);
  }
}
/////////////////
async function insertPosition() {
  try {
    let headersList = {
      Accept: "*/*",
      "Content-Type": "application/json",
    };

    let bodyContent = JSON.stringify({
      token:
        token,
      obj: insert_data
    });

    let response = await fetch(
      "http://localhost:3333/mobile/Add-Position",
      {
        method: "POST",
        body: bodyContent,
        headers: headersList,
      }
    );

    let data = await response.json();
    // data = data.dataSend;
    //console.log(data.msg);
    location.reload();
  } catch (err) {
    //console.log(err)
  }
}
/////////////////
function getDataInputAuto() {
  const edit_rank_r = document.getElementById("position_name_th_rank-edit");
  let previousValue_edit_r = edit_rank_r.value;
  edit_rank_r.addEventListener("input", function () {
    if (edit_rank_r.value !== previousValue_edit_r) {
      previousValue_edit_r = edit_rank_r.value;
      getData_editrank.name_r = edit_rank_r.value;
      //console.log(getData_editrank)
    }
  });
  const edit_rank_r_en = document.getElementById("position_name_en_rank-edit");
  let previousValue_edit_r_en = edit_rank_r_en.value;
  edit_rank_r_en.addEventListener("input", function () {
    if (edit_rank_r_en.value !== previousValue_edit_r_en) {
      previousValue_edit_r_en = edit_rank_r_en.value;
      getData_editrank.name_en_r = edit_rank_r_en.value;
      //console.log(getData_editrank)
    }
  });
  const edit_rank_des = document.getElementById("position_name_des_rank-edit");
  let previousValue_edit_des = edit_rank_des.value;
  edit_rank_des.addEventListener("input", function () {
    if (edit_rank_des.value !== previousValue_edit_des) {
      previousValue_edit_des = edit_rank_des.value;
      getData_editrank.reason = edit_rank_des.value;
      //console.log(getData_editrank)
    }
  });
  const inputElement_th = document.getElementById("position_name_th");
  let previousValue_th = inputElement_th.value;
  inputElement_th.addEventListener("input", function () {
    if (inputElement_th.value !== previousValue_th) {
      previousValue_th = inputElement_th.value;
      insert_data.name_th = inputElement_th.value;
      //console.log(insert_data)
    }
  });
  const inputElement_th_rank = document.getElementById("position_name_th_rank");
  let previousValue_th_rank = inputElement_th_rank.value;
  inputElement_th_rank.addEventListener("input", function () {
    if (inputElement_th_rank.value !== previousValue_th_rank) {
      previousValue_th_rank = inputElement_th_rank.value;
      getData_addrank.name_r = inputElement_th_rank.value;
      //console.log(getData_addrank)
    }
  });
  const inputElement_en_rank = document.getElementById("position_name_en_rank");
  let previousValue_en_rank = inputElement_en_rank.value;
  inputElement_en_rank.addEventListener("input", function () {
    if (inputElement_en_rank.value !== previousValue_en_rank) {
      previousValue_en_rank = inputElement_en_rank.value;
      getData_addrank.name_en_r = inputElement_en_rank.value;
      //console.log(getData_addrank)
    }
  });
  const inputElement_en_rank_des = document.getElementById("position_name_des_rank");
  let previousValue_en_rank_des = inputElement_en_rank_des.value;
  inputElement_en_rank_des.addEventListener("input", function () {
    if (inputElement_en_rank_des.value !== previousValue_en_rank_des) {
      previousValue_en_rank_des = inputElement_en_rank_des.value;
      getData_addrank.reason = inputElement_en_rank_des.value;
      //console.log(getData_addrank)
    }
  });
  const inputElement_th_edit = document.getElementById("position_name_th-edit");
  let previousValue_th_edit = inputElement_th_edit.value;
  inputElement_th_edit.addEventListener("input", function () {
    if (inputElement_th_edit.value !== previousValue_th_edit) {
      previousValue_th_edit = inputElement_th_edit.value;
      getDataInput.name_th = inputElement_th_edit.value;
      //console.log(getDataInput)
    }
  });
  const inputElement_en = document.getElementById("position_name_en")
  let previousValue_en = inputElement_en.value
  inputElement_en.addEventListener("input", function () {
    if (inputElement_en.value !== previousValue_en) {
      previousValue_en = inputElement_en.value;
      insert_data.name_en = inputElement_en.value;
      //console.log(insert_data)
    }
  });
  const inputElement_en_edit = document.getElementById("position_name_en-edit");
  let previousValue_en_edit = inputElement_en_edit.value;
  inputElement_en_edit.addEventListener("input", function () {
    if (inputElement_en_edit.value !== previousValue_en_edit) {
      previousValue_en_edit = inputElement_en_edit.value;
      getDataInput.name_en = inputElement_en_edit.value;
      //console.log(getDataInput)
    }
  });
  const swt_p_input = document.querySelector("#switch_position_enable_input")


  swt_p_input.addEventListener('click', () => {
    swt_p_input.checked == true ? insert_data.status = 'active' : insert_data.status = 'Inactive';
    //console.log(insert_data)
  })



}
const swt_p_input = document.querySelector("#switch_position_enable_input")

if (insert_data.status = 'active') {
  swt_p_input.checked = true
}
/////////////////
function btn_cancel() {
  document.querySelector('#btn_cancel_data').addEventListener('click', () => {
    Object.keys(insert_data).forEach((key) => {
      insert_data[key] = null;
    });
    document.querySelector('.overlay_branch_info').classList.remove('open');
    document.querySelector('#blur_bg').style.display = 'none'
    document.querySelector('#position_name_th').value = null
    document.querySelector('#position_name_en').value = null
    document.querySelector('#selection_text_1 span').textContent = "กรุณาเลือก"
    document.querySelector('#selection_text_1 span').style.color = "#C7C9D9"
    document.querySelector('#selection_text_2 span').textContent = "กรุณาเลือก"
    document.querySelector('#selection_text_2 span').style.color = "#C7C9D9"
    document.querySelector('#check_limit_position').checked = false
    document.querySelector('#rank_swap_content').style.display = 'none'
    //console.log(insert_data)
  })
  document.querySelector('#btn_cancel_data_rank').addEventListener('click', () => {
    Object.keys(getData_addrank).forEach((key) => {
      getData_addrank[key] = null;
    });
    document.querySelector('#position_addrank').classList.remove('open');
    document.querySelector('#blur_bg').style.display = 'none'
    document.querySelector('#position_name_th_rank').value = null
    document.querySelector('#position_name_en_rank').value = null
    document.querySelector('#position_name_des_rank').value = null
    //console.log(getData_addrank)
  })
  document.querySelector('#btn_cancel_data_edit').addEventListener('click', () => {

    Object.keys(getDataInput).forEach((key) => {
      getDataInput[key] = null;
    });
    document.querySelector('#position_editposition').classList.remove('open');
    document.querySelector('#blur_bg').style.display = 'none'
    //console.log(getDataInput)
  })
  document.querySelector('#btn_cancel_data_rank-edit').addEventListener('click', () => {

    Object.keys(getDataInput).forEach((key) => {
      getDataInput[key] = null;
    });
    document.querySelector('#position_rank-edit').classList.remove('open');
    document.querySelector('#blur_bg').style.display = 'none'
    //console.log(getDataInput)
  })
}
//////////////////\
function setInactive() {
  insert_data.status = 'Inactive'
}
/////////////////
function btn_submit() {
  const btn_submit_input = document.querySelector("#btn_submit_data")
  btn_submit_input.addEventListener('click', () => {
    //check data in input
    //
    const confirmation = confirm("Are you sure you want to submit the form?");

    if (confirmation) {

      Swal.fire(
        'Form submitted successfully!',
        '',
        'success'
      )
      insertPosition()
    } else {
      Swal.fire(
        'Form submission canceled!',
        '',
        'error'
      )
      // alert("Form submission canceled!");
    }
  })
  const btn_submit_input_rank = document.querySelector("#btn_submit_data_rank")
  btn_submit_input_rank.addEventListener('click', () => {
    //check data in input
    //
    const confirmation = confirm("Are you sure you want to submit the form?");

    if (confirmation) {

      Swal.fire(
        'Form submitted successfully!',
        '',
        'success'
      )
      insertRank()
    } else {
      Swal.fire(
        'Form submission canceled!',
        '',
        'success'
      )
    }
  })
  const btn_submit_edit_rank = document.querySelector("#btn_submit_data_rank-edit")
  btn_submit_edit_rank.addEventListener('click', () => {
    //check data in input
    //
    const confirmation = confirm("Are you sure you want to submit the form?");

    if (confirmation) {

      Swal.fire(
        'Form submitted successfully!',
        '',
        'success'
      )
      update_rank()
    } else {
      Swal.fire(
        'Form submission canceled!',
        '',
        'success'
      )
    }
  })
  const btn_submit_edit = document.querySelector("#btn_submit_data_edit")
  btn_submit_edit.addEventListener('click', () => {
    //check data in input
    const checkDataupload = { ...getDataInput };

    const checkLimitRank = getDataInput.rank_limit

    if (checkLimitRank == false) {
      checkDataupload.rank_from = null
      checkDataupload.rank_to = null

      //send checkDataupload
      update_position(checkDataupload)
      //console.log(checkDataupload)
    } else {

      //send getDataInput
      update_position(getDataInput)
      //console.log(getDataInput)
    }
  })


}
/////////////////
document.querySelector("#btn_delete_postion").addEventListener('click', () => {
  const confirmation = confirm("Are you sure you want to submit the form?");
  if (confirmation) {
    Swal.fire(
      'Form submitted successfully!',
      '',
      'success'
    )
    btn_deleterow()
  } else {
    // alert("Form submission canceled!");
    Swal.fire(
      'Form submission canceled!',
      '',
      'success'
    )
  }

})
async function btn_deleterow() {
  try {
    let headersList = {
      Accept: "*/*",
      "Content-Type": "application/json",
    };

    let bodyContent = JSON.stringify({
      token:
        token,
      obj: delet_data_select
    });

    let response = await fetch(
      "http://localhost:3333/mobile/Delete-position",
      {
        method: "POST",
        body: bodyContent,
        headers: headersList,
      }
    );

    let data = await response.json();
    // data = data.dataSend;
    //console.log(data.msg);
    location.reload();

  } catch (err) {
    //console.log(err)
  }

}
/////////////////
async function deleteonerow(data) {
  document.querySelectorAll("#btn_delet_onerow").forEach((e, i) => {
    e.addEventListener('click', () => {
      let aSet = { p_id: data[i].position_id }
      delet_data_select[0] = aSet
      var confirmation = confirm("Are you sure you want to submit the form?");

      if (confirmation) {

        Swal.fire(
          'Form submitted successfully!',
          '',
          'success'
        )
        btn_deleterow()
      } else {
        Swal.fire(
          'Form submission canceled!',
          '',
          'error'
        )
        // alert("Form submission canceled!");
      }

    })
  })
}
/////////////////
function editeposition(data) {
  //console.log(data)
  const limit_btn = document.querySelector('#check_limit_position_edit')
  document.querySelectorAll("#edit_position_onerow").forEach((e, i) => {
    e.addEventListener('click', () => {
      getDataInput.position_id = data[i].position_id

      document.querySelector('#position_editposition').classList.add('open');
      document.querySelector('#blur_bg').style.display = 'flex';
      document.querySelector("#position_name_th-edit").value = data[i].name_th
      getDataInput.name_th = data[i].name_th
      document.querySelector("#position_name_en-edit").value = data[i].name_en
      getDataInput.name_en = data[i].name_en
      //console.log('va : ',data[i])
      if (limit_btn !== undefined) {
        if (data[i].rank !== '') {
          getDataInput.rank_limit = true
          document.querySelector("#rank_swap_content_edit").style.display = 'flex'
          limit_btn.checked = true;
          let dataranktext = data[i].rank.split('-')
          let data_from;
          let data_to
          // dataranktext = dataranktext

          if (dataranktext.length > 1) {

            document.querySelector("#selection_text_1_edit span").textContent = dataranktext[0]
            document.querySelector("#selection_text_2_edit span").textContent = dataranktext[1]
            getDataInput.rank_from = data[i].rank_id_from
            getDataInput.rank_to = data[i].rank_id_to
            document.querySelector('#selection_text_1_edit span').style.color = "#000"
            document.querySelector('#selection_text_2_edit span').style.color = "#000"

          } else {
            document.querySelector("#selection_text_1_edit span").textContent = dataranktext[0]
            document.querySelector("#selection_text_2_edit span").innerHTML = dataranktext[0]
            getDataInput.rank_from = data[i].rank_id_from
            getDataInput.rank_to = data[i].rank_id_to
            document.querySelector('#selection_text_1_edit span').style.color = "#000"
            document.querySelector('#selection_text_2_edit span').style.color = "#000"
          }

        } else {

          document.querySelector("#selection_text_1_edit span").textContent = 'กรุณาเลือก'
          document.querySelector('#selection_text_1_edit span').style.color = "#C7C9D9"

          document.querySelector("#selection_text_2_edit span").textContent = 'กรุณาเลือก'
          document.querySelector('#selection_text_2_edit span').style.color = "#C7C9D9"

          document.querySelector("#rank_swap_content_edit").style.display = 'none'
          getDataInput.rank_limit = false
          getDataInput.rank_from = null
          getDataInput.rank_to = null
          limit_btn.checked = false;
        }
      }

      if (data[i].status == 'active') {
        document.querySelector("#switch_position_enable_input_edit").checked = true
      }
      getDataInput.status = data[i].status

      //console.log(getDataInput)

    })
  })
  limit_btn.addEventListener('click', () => {
    getDataInput.rank_limit = document.querySelector('#check_limit_position_edit').checked
    document.querySelector("#rank_swap_content_edit").style.display == 'flex'
      ?
      document.querySelector("#rank_swap_content_edit").style.display = 'none'
      :
      document.querySelector("#rank_swap_content_edit").style.display = 'flex'
      ;
    //console.log(getDataInput)

  })
  // document.querySelector("#").addEventListener('click',()=>{
  // })
  document.querySelector("#selector_rank_from_1_edit").addEventListener('click', () => {
    if (document.querySelector("#container_popup_rank_1_edit").style.display == 'flex') {
      document.querySelector("#container_popup_rank_1_edit").style.display = 'none'
    }
    else {
      document.querySelector("#container_popup_rank_1_edit").style.display = 'flex';
      document.querySelector("#container_popup_rank_2_edit").style.display = 'none'
    }
  })
  document.querySelector("#selector_rank_to_2_edit").addEventListener('click', () => {
    if (document.querySelector("#container_popup_rank_2_edit").style.display == 'flex') {
      document.querySelector("#container_popup_rank_2_edit").style.display = 'none'
    }
    else {
      document.querySelector("#container_popup_rank_2_edit").style.display = 'flex';
      document.querySelector("#container_popup_rank_1_edit").style.display = 'none'
    }
  })
  document.querySelector("#switch_position_enable_input_edit").addEventListener('click', () => {
    document.querySelector("#switch_position_enable_input_edit").checked == true ? getDataInput.status = 'active' : getDataInput.status = 'Inactive'
    //console.log(getDataInput)
  })


}
////////////////
async function update_position(objData) {
  //console.log(objData)

  try {
    let headersList = {
      Accept: "*/*",
      "Content-Type": "application/json",
    };

    let bodyContent = JSON.stringify({
      token:
        token,
      obj: objData
    });

    let response = await fetch(
      "http://localhost:3333/mobile/Update-Position",
      {
        method: "POST",
        body: bodyContent,
        headers: headersList,
      }
    );

    let data = await response.json();
    // data = data.dataSend;
    //console.log(data.msg);
    location.reload();

  } catch (err) {
    //console.log(err)
  }
}
/////////////////
function dragdrop() {

}
/////////////////
async function swap_sequence() {

  try {
    let headersList = {
      Accept: "*/*",
      "Content-Type": "application/json",
    };

    let bodyContent = JSON.stringify({
      token:
        token,
      drag: getDataRankSwap.drag,
      drop: getDataRankSwap.drop
    });

    let response = await fetch(
      "http://localhost:3333/mobile/Swap-Sequence",
      {
        method: "POST",
        body: bodyContent,
        headers: headersList,
      }
    );

    let data = await response.json();
    // data = data.dataSend;
    //console.log(data.msg);

    const tbody = document.getElementById('data_rank');
    tbody.innerHTML = '';

    getAPI_rank()

    // localStorage.setItem('tab_view', 'rank')
    // location.reload();

  } catch (err) {
    //console.log(err)
  }
}
/////////////////
document.querySelector('#btn_addrank').addEventListener('click', () => {
  document.querySelector('#position_addrank').classList.add('open');
  document.querySelector('#blur_bg').style.display = 'flex';
})
async function insertRank() {
  try {
    let headersList = {
      Accept: "*/*",
      "Content-Type": "application/json",
    };

    let bodyContent = JSON.stringify({
      token:
        token,
      obj: getData_addrank
    });

    let response = await fetch(
      "http://localhost:3333/mobile/Add-Rank",
      {
        method: "POST",
        body: bodyContent,
        headers: headersList,
      }
    );

    let data = await response.json();
    // data = data.dataSend;
    //console.log(data.msg);
    location.reload();
  } catch (err) {
    //console.log(err)
  }

}
/////////////////
async function update_rank() {
  try {
    let headersList = {
      Accept: "*/*",
      "Content-Type": "application/json",
    };

    let bodyContent = JSON.stringify({
      token:
        token,
      obj: getData_editrank
    });

    let response = await fetch(
      "http://localhost:3333/mobile/Update-Rank",
      {
        method: "POST",
        body: bodyContent,
        headers: headersList,
      }
    );

    let data = await response.json();
    // data = data.dataSend;
    //console.log(data.msg);
    location.reload();
  } catch (err) {
    //console.log(err)
  }

}
/////////////////
async function delete_rank() {
  try {
    let headersList = {
      Accept: "*/*",
      "Content-Type": "application/json",
    };

    let bodyContent = JSON.stringify({
      token:
        token,
      obj: getData_deleterank
    });

    let response = await fetch(
      "http://localhost:3333/mobile/Delete-Rank",
      {
        method: "POST",
        body: bodyContent,
        headers: headersList,
      }
    );

    let data = await response.json();
    // data = data.dataSend;
    //console.log(data);

    if (data.state_count == false) {
      const text = 'ไม่สามารถลบระดับตำแหน่งที่ถูกใช้งานอยู่ได้'
      const color = 'crimson'
      const result = popup_kp(text, color);
      result();

    } else {

      location.reload();
    }

    // location.reload();
  } catch (err) {
    //console.log(err)
  }

}
