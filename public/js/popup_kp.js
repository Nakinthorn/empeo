
export function popup_kp(text,color) {
    return () => {
      const popupHTML = `
        <div class="popup_alert">
          <li> ${text}</li>
        </div>
      `;
  
      const popupStyle = `
        <style>
          .popup_alert {
            
            position: fixed;
            z-index: 999;
            top: 50%;
            left: 50%;
            text-align:center;
            transform: translate(-50%, -50%);
            background-color: #ffffff;
            padding: 40px;
            border: 1px solid #ccc;
            border-radius: 10px;
          }
          li{
            color:${color};
            list-style:none;
          }
        </style>
      `;
  
      const popupContainer = document.createElement('div');
      popupContainer.innerHTML = popupHTML + popupStyle;
        document.body.appendChild(popupContainer);
        document.querySelector('#blur_bg').style.display = 'flex';
        
        document.addEventListener('click', closePopup);

        function closePopup(event) {
          if (!popupContainer.contains(event.target)) {
            document.removeEventListener('click', closePopup);
              popupContainer.remove();
          document.querySelector('#blur_bg').style.display = 'none';
              
          }
        }
    };
  }
  
  