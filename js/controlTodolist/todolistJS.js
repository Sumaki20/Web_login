let isCreate = 0;
function cancelEdit(rowId) {
    let row = document.getElementById(rowId);
    if (!row) return; // ถ้าไม่มีแถวให้หยุดทำงาน

    if(isCreate === 0)
    {
        for(i=1; i<=5; i++){
            let showDetails = document.getElementById("e"+i+"-"+rowId);
            let inputDetails = document.getElementById("edit-input"+i+"-"+rowId);
            if(i <= 2)
            {
                let newValue = showDetails.textContent.trim();
                inputDetails.textContent = newValue;
                inputDetails.style.display = "none";
                showDetails.style.display = "block";
            }
            else if(i == 3)
            {
                showDetails.style.display = "block";
                inputDetails.style.display = "none";
            }
            else if(i > 3)
            {
                //date button 
                let showDetails = document.getElementById("e"+i+"-"+rowId);
                let inputDetails = document.getElementById("edit-input"+i+"-"+rowId);
                // action date
                var x = inputDetails.value.split('-');
                if (!inputDetails || !inputDetails.value) {
                    showDetails.textContent = "No Dead Line";
                }
                else{
                    showDetails.textContent = x[1]+'/'+x[2]+'/'+x[0];
                }
                inputDetails.style.display = "none";
                showDetails.style = "display: block; width: 100%;";
            }
        }
        document.getElementById("edit-btn-"+rowId).style = "display: ; margin: auto;";
        document.getElementById("delete-btn-"+rowId).style = "display: ; margin: auto;";
        document.getElementById("save-btn-"+rowId).style = "display: none; margin: auto;";
        document.getElementById("cancel-btn-"+rowId).style = "display: none; margin: auto;";
    }
    else
    {
        isCreate = 0;
        row.remove();
        document.getElementById("create-btn").style = "display: contents;";
    }
}
                    
function editData(rowId) {
    let row = document.getElementById(rowId);
    if (!row) return; // ถ้าไม่มีแถวให้หยุดทำงาน

    // name task action
    for(i=1; i<=5;i++)
    {
        // find id
        let showDetails = document.getElementById("e"+i+"-"+rowId);
        let inputDetails = document.getElementById("edit-input"+i+"-"+rowId);
        if(i<=2){
            // action&show textarea NameTask and task details
            let newValue = showDetails.textContent.trim();
            inputDetails.textContent = newValue; // อัปเดตข้อความใหม่
            inputDetails.style.display = "block"; // แสดงข้อความ
            inputDetails.style.height = 'auto';
            inputDetails.style.height = inputDetails.scrollHeight + 'px';
            inputDetails.oninput = function () {
                this.style.height = 'auto'; // รีเซ็ตความสูงก่อน เพื่อให้ scrollHeight ถูกต้อง
                this.style.height = this.scrollHeight + 'px';
                this.placeholder="พิมพ์ข้อความที่นี่...";
            };
            showDetails.style.display = "none"; // ซ่อน textarea
        }
        else if(i==3)
        {
            // show select status
            inputDetails.style.display = "block";
            showDetails.style.display = "none";
        }
        else if (i>3){
            // date button
            // action due date and complete date
            let dateText = showDetails.textContent.trim(); // ใช้ .textContent แทน .value
            let x = dateText.split('/'); // ตรวจสอบรูปแบบวันที่ที่เก็บอยู่ก่อน
            if (x.length === 3) {
                inputDetails.textContent = x[1]+'/'+x[2]+'/'+x[0]; // yyyy-mm-dd
            }
            showDetails.style.display = "none";
            inputDetails.style = "display: block; width: 100%;";
        }
    }
    
    document.getElementById("edit-btn-"+rowId).style = "display: none; margin: 2px;";
    document.getElementById("delete-btn-"+rowId).style = "display: none; margin: 2px;";
    document.getElementById("save-btn-"+rowId).style = "display: inline-flex; margin: 2px;";
    document.getElementById("cancel-btn-"+rowId).style = "display: inline-flex; margin: 2px;";
}
function saveData(rowId) {
    let row = document.getElementById(rowId);
    if (!row) return; // ถ้าไม่มีแถวให้หยุดทำงาน
    isCreate = 0;
                        
    // action task Details
    for(i=1;i<=5;i++)
    {
        let showDetails = document.getElementById("e"+i+"-"+rowId);
        let inputDetails = document.getElementById("edit-input"+i+"-"+rowId);
    
         if(i<=2)
        {
            let newValue = inputDetails.value.trim();
            showDetails.textContent = newValue; // อัปเดตข้อความใหม่
            showDetails.style.display = "block"; // แสดงข้อความ
            inputDetails.style.display = "none"; // ซ่อน textarea
        }
        else if(i == 3)
        {
            showDetails.style.display = "block";
            inputDetails.style.display = "none";
        }
        else if(i>3)
        {
            // action date
            var x = inputDetails.value.split('-');
            console.log(inputDetails.value);
            if (!inputDetails || !inputDetails.value) {
                showDetails.textContent = "No Dead Line";
            }
            else{
                showDetails.textContent = x[2]+'/'+x[1]+'/'+x[0];
            }
            inputDetails.style.display = "none";
            showDetails.style = "display: block; width: 100%;";
        }
    }
    // ซ่อนปุ่มบันทึก
    row.querySelector("#edit-btn-"+rowId).style = "display: inline-block; margin: auto;";
    row.querySelector("#delete-btn-"+rowId).style = "display: inline-block; margin: auto;";
    row.querySelector("#save-btn-"+rowId).style = "display: none; margin: auto;";
    row.querySelector("#cancel-btn-"+rowId).style = "display: none; margin: auto;";
    document.getElementById("create-btn").style = "display: contents;";
    
}
// รับค่า dropdown status
function selectOption(value,rowId) {
    document.getElementById("e3-"+rowId).textContent = value;
    document.getElementById("edit-input3-"+rowId).textContent = value;
}
                  
function myDeleteFunction(rowId) {
    let row = document.getElementById(rowId);
    if (!row) return; // ถ้าไม่มีแถวให้หยุดทำงาน
    
    row.remove();
}

let indexRowid; //เอาไว้ชี้แถว
function myDeleteCon(rowId)
{
    indexRowid = rowId;
    console.log(indexRowid);
}

function myCreateFunction() {
    console.log("create");
    let tbody = document.getElementById("mainbody");
    let index = tbody.rows.length;
    let rowId = `row-${index + 1}`; // ใช้ index ที่เพิ่มขึ้นหนึ่งเพื่อให้มี id ที่เหมาะสม

    let row = tbody.insertRow(index); // แทรกแถวใน <tbody>

    isCreate = 1;
    row.id = rowId;
    row.innerHTML = `
        <td >
            <span id="e1-${rowId}" style="display: none;"></span>
            <textarea id="edit-input1-${rowId}" style="display: block;" oninput="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px';" placeholder="Input Title..."></textarea>
        </td>
        <td >
            <span id="e2-${rowId}" style="display: none;"></span>
            <textarea id="edit-input2-${rowId}" style="display: block;" oninput="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px';" placeholder="Write your Details..."></textarea>
        </td>
        <td style="text-align: center; vertical-align: middle;">
            <span id="e3-${rowId}" style="width: 100%; display:none;"></span>
            <div class="dropdown" >
                <button class="btn btn-info" type="button" id="edit-input3-${rowId}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 100%; display:block;">
                    Select Status
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item"  onclick="selectOption('Pending','${rowId}')">Pending</a></li>
                    <li><a class="dropdown-item"  onclick="selectOption('Hold','${rowId}')">Hold</a></li>
                    <li><a class="dropdown-item"  onclick="selectOption('Complete','${rowId}')">Complete</a></li>
                </ul>
            </div>
        </td>
        <td style="text-align: center; vertical-align: middle;">
            <p id="e4-${rowId}" style="display: none; "></p>
            <input type="date" id="edit-input4-${rowId}" style="display: block; width: 100%;"></input>
        </td>
        <td style="text-align: center; vertical-align: middle;">
            <p id="e5-${rowId}" style="display: none; ">2</p>
            <input type="date" id="edit-input5-${rowId}" style="display: block; width: 100%;"></input>
        </td>
        <td style="text-align: center; vertical-align: middle;">
            <button onclick="editData('${rowId}')" id="edit-btn-${rowId}" class="btn btn-warning" style="display: none;">
                <div class="icon text-white-50">
                    <i class="fas fa-tools"></i>
                </div>
            </button>
            <button onclick="myDeleteCon('${rowId}')" id="delete-btn-${rowId}" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" style="display: none;">
                <div class="icon text-white-50">
                    <i class="fas fa-trash"></i>
               </div>
            </button>
            </button><button onclick="saveData('${rowId}')" id="save-btn-${rowId}" class="btn btn-success" style="display: inline-block;">
                <div class="icon text-white-50">
                    <i class="fas fa-save" ></i>
                </div>
            </button>
            <button onclick="cancelEdit('${rowId}')" id="cancel-btn-${rowId}" class="btn btn-warning" style="display: inline-block;">
                <div class="icon text-white-50">
                    <i class="fas fa-times" ></i>
                </div>
            </button>
        </td>
    `;
    document.getElementById("create-btn").style.display = "none";
}
                  
