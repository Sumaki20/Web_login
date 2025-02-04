<!-- <style>
  textarea {
    width: 100%; /* ให้เต็มความกว้างของ container */
    min-height: 40px; /* กำหนดความสูงเริ่มต้น */
    resize: none; /* ปิดการปรับขนาด */
    overflow: hidden; /* ซ่อน scrollbar */
    border: 1px solid #ccc;
    padding: 5px;
    font-size: 16px;
  }
</style>

<textarea id="autoExpand" oninput="adjustHeight(this)" placeholder="พิมพ์ข้อความที่นี่..."></textarea>

<script>
  function adjustHeight(textarea) {
    textarea.style.height = "auto"; // รีเซ็ตความสูงก่อนคำนวณใหม่
    textarea.style.height = textarea.scrollHeight + "px"; // ปรับความสูงตามเนื้อหา
  }
</script> -->

<!-- <style>
  table {
    width: 50%; /* ให้ตารางขยายเต็มพื้นที่ */
    border-collapse: collapse;
    table-layout: fixed; /* คงขนาด td ตาม width ที่กำหนด */
  }

  td {
    table-layout: auto;
    border: 1px solid #ccc;
    padding: 8px;
    text-align: left;
    white-space: normal; /* อนุญาตให้ขึ้นบรรทัดใหม่ */
    word-wrap: break-word; /* บังคับตัดคำถ้ายาวเกิน */
    overflow-wrap: break-word; /* ใช้กับเบราว์เซอร์ใหม่ๆ */
  }

</style>

<table>
  <tr>
     <td style="width: 60%;">Cosssssssssssssssssssssssn 1</td>
    <td style="width: 10%;">sdasdassssssssssssssssssssssssssssssssssssssssssssssssssssssdasda</td>
    <td style="width: 10%;">sdasdasdssssssssssssssasda</td>
    <td style="width: 10%;">sdasdasdasda</td>
    <td style="width: 10%;">sdasdasdasda</td>
    <td style="max-width: 60%;">Cosssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssn 1</td>
    <td style="max-width: 10%;">sdasdadasda</td>
    <td style="max-width: 10%;">sdasda</td>
    <td style="max-width: 10%;">sdasdasdasda</td>
    <td style="max-width: 10%;">sdasdasdasda</td>
  </tr>
</table> -->

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Layout</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        th, td {
            padding: 15px;
            text-align: center;
            border: 1px solid #ddd;
            white-space: normal; /* ทำให้ข้อความสามารถขึ้นบรรทัดใหม่ได้ */
            word-wrap: break-word; /* ทำให้ข้อความยาวๆ ขึ้นบรรทัดใหม่ */
        }

        /* คอลัมน์แรกจะมีความกว้างขั้นต่ำ 60% และสามารถขยายตามเนื้อหาได้ */
        .col1 {
            width: 60%; 
        }
        /* คอลัมน์ที่เหลือจะมีความกว้างขั้นต่ำ 10% */
        .col2, .col3, .col4, .col5 {
            width: 10%;
        }
    </style>
</head>
<script>
function saveData() {
    let txtInput = document.getElementById("txta");
    let txtReceive = document.getElementById("txtb");

      let newValue = txtInput.value.trim();
      txtReceive.innerText = newValue; // อัปเดตข้อความใหม่
    
  }
</script>
<body>
<textarea id="txta">asdasdasd</textarea>
<button onclick="saveData()">sure</button>
    <table>
        <thead>
            <tr>
                <th class="col1"></th>
                <th class="col2">คอลัมน์ 2 (10%)</th>
                <th class="col3">คอลัมน์ 3 (10%)</th>
                <th class="col4">คอลัมน์ 4 (10%)</th>
                <th class="col5">คอลัมน์ 5 (10%)</th>
            </tr>
        </thead>
        
        <tbody>
            <tr>
                <td><span><?php for($i = 0; $i<=100;$i++){echo"s";}?></span></td>
                <td><span id="txtb">ข้อมูล 2</span></td>
                <td>ข้อมูล 3</td>
                <td>ข้อมูล 4</td>
                <td>ข้อมูล 5</td>
            </tr>
            <tr>
                <td></td>
                <td>ข้อมูล 7</td>
                <td>ข้อมูล 8</td>
                <td>ข้อมูล 9</td>
                <td>ข้อมูล 10</td>
            </tr>
        </tbody>
    </table>
</body>
</html>


<!-- <style>
  textarea {
    width: 100%;
    min-height: 40px;
    resize: none; /* ปิดการปรับขนาด */
    overflow: hidden; /* ซ่อน Scrollbar */
    border: 1px solid #ccc;
    padding: 5px;
    font-size: 16px;
  }
</style>

<textarea id="autoExpand" oninput="this.style.height = 'auto'; this.style.height = this.scrollHeight + 'px';" placeholder="พิมพ์ข้อความที่นี่..."></textarea> -->
<!-- <script>
function editData() {
    for(let i = 1; i<=3; i++)
    {
        document.getElementById('text' + i).style.display = "none"; // ซ่อนข้อความเดิม
        let textarea = document.getElementById("edit-input" + i);
        textarea.style.display = "block"; // แสดง textarea
        textarea.style.height = "auto"; // ตั้งค่าความสูงเริ่มต้น
    }
    // แสดงปุ่มบันทึก
    document.getElementById("edit-btn").style.display = "none";
    document.getElementById("save-btn").style.display = "inline-block"; 
    document.getElementById("cancel-btn").style.display = "inline-block"; 
}
function cancelEdit() {
    for(let i = 1; i <= 3; i++)
    {
        let inputElement = document.getElementById("edit-input"+i);
        let textElement = document.getElementById("text"+i);
        inputElement.value = textElement.innerText; // คืนค่าข้อความเดิม
        textElement.style.display = "inline"; // แสดงข้อความเดิม
        inputElement.style.display = "none"; // ซ่อน input
    }
    document.getElementById("edit-btn").style.display = "inline-block";
    document.getElementById("save-btn").style.display = "none";
    document.getElementById("cancel-btn").style.display = "none";
}

function saveData() {
    for (let i = 1; i <= 3; i++) {
        let textarea = document.getElementById("edit-input"+i);
        let newValue = textarea.value.trim();
        document.getElementById("text"+i).innerText = newValue; // อัปเดตข้อความใหม่
        document.getElementById("text"+i).style.display = "inline-block"; // แสดงข้อความ
        textarea.style.display = "none"; // ซ่อน textarea
    }
    // ซ่อนปุ่มบันทึก
    document.getElementById("edit-btn").style.display = "inline-block";
    document.getElementById("save-btn").style.display = "none"; 
    document.getElementById("cancel-btn").style.display = "none";
}
function saveCreateData() {
    for (let i = 1; i <= 2; i++) {
        let textarea = document.getElementById("edit-input1"+i);
        let newValue = textarea.value.trim();
        document.getElementById("text1"+i).innerText = newValue; // อัปเดตข้อความใหม่
        document.getElementById("text1"+i).style.display = "inline-block"; // แสดงข้อความ
        textarea.style.display = "none"; // ซ่อน textarea
    }
    // ซ่อนปุ่มบันทึก
    document.getElementById("edit-btn").style.display = "inline-block";
    document.getElementById("save-btn").style.display = "none";
    document.getElementById("saveCreate-btn").style.display = "none"; 
    document.getElementById("cancel-btn").style.display = "none";
}
function myCreateFunction() {
  let table = document.getElementById("myTable");
  let row = table.insertRow(1);
  let cell1 = row.insertCell(0);
  let cell2 = row.insertCell(1);
  let cell3 = row.insertCell(2);
  let cell4 = row.insertCell(3);
     cell1.innerHTML = '<span id="text11"style="display: none; width: 100; height: auto;  word-wrap: break-word;">ตัวอย่างข้อมูล</span>'+
                    '<textarea id="edit-input11" style="display: block; width: 100; height: auto; resize: none; ">ตัวอย่างข้อมูล</textarea>';
    cell2.innerHTML = '<span id="text12"style="display: none; width: 100; height: auto;  word-wrap: break-word;">ตัวอย่างข้อมูล</span>'+
                    '<textarea id="edit-input12" style="display: block; width: 100; height: auto; resize: none; ">ตัวอย่างข้อมูล</textarea>';
    cell3.innerHTML = '<span id="text13"style="display: none; width: 100; height: auto;  word-wrap: break-word;">ตัวอย่างข้อมูล</span>'+
                    '<textarea id="edit-input13" style="display: block; width: 100; height: auto; resize: none; ">ตัวอย่างข้อมูล</textarea>';
    cell4.innerHTML = '<button onclick="editData()"style="display: none;" id="edit-btn">แก้ไข</button>'+
                    '<button onclick="saveData()" style="display: none;" id="save-btn">บันทึก</button>'+
                    '<button onclick="saveCreateData()" style="display: inline-block;" id="saveCreate-btn">บันทึก</button>'+
                    '<button onclick="cancelEdit()" style="display: none;" id="cancel-btn">ยกเลิก</button>';
}
</script> -->

<!-- crate row -->

<!-- <!DOCTYPE html>
<html>
<head>
<style>
table, td {
  border: 1px solid black;
}
</style>
</head>
<body>
<button onclick="myCreateFunction()">Create row</button>
<p>Click the buttons to create and delete row(s) for the table.</p>
<table id="myTable">
  <tr>
    <th>cell1</th>
    <th>cell2</th>
    <th>Cell3</th>
    <th>Edit</th>
  </tr>
  <tr>
    <td>
        <span id="text1"style="width: 100; height: auto; display: block; word-wrap: break-word;">ตัวอย่างข้อมูล</span>
        <textarea id="edit-input1" style="display: none; width: 100; height: auto; resize: none; ">ตัวอย่างข้อมูล</textarea>
    </td>
    <td>
        <span id="text2"style="width: 100; height: auto; display: block; word-wrap: break-word;">ตัวอย่างข้อมูล</span>
        <textarea id="edit-input2" style="display: none; width: 100; height: auto; resize: none; ">ตัวอย่างข้อมูล</textarea>
    </td>
    <td>
        <span id="text3"style="width: 100; height: auto; display: block; word-wrap: break-word;">ตัวอย่างข้อมูล</span>
        <textarea id="edit-input3" style="display: none; width: 100; height: auto; resize: none; ">ตัวอย่างข้อมูล</textarea>
    </td>
    <td>
        <button onclick="editData()" id="edit-btn">แก้ไข</button>
        <button onclick="saveData()" style="display: none;" id="save-btn">บันทึก</button>
        <button onclick="cancelEdit()" style="display: none;" id="cancel-btn">ยกเลิก</button>
    </td>
  </tr>
  
  <tr>
    <td>Row3 cell1</td>
    <td>Row3 cell2</td>
  </tr>
</table>
<br>

<button onclick="myCreateFunction()">Create row</button>
<button onclick="myDeleteFunction()">Delete row</button>

<script>


function myDeleteFunction() {
  document.getElementById("myTable").deleteRow(1);
}
</script>

</body>
</html> -->
<!-- ---end Crate row ---- -->

<!-- <div id="data-container">
    <span id="text">ตัวอย่างข้อมูล</span>
    <input type="text" id="edit-input" value="ตัวอย่างข้อมูล" style="display: none;">
    <button onclick="editData()">แก้ไข</button>
    <button onclick="saveData()" style="display: none;" id="save-btn">บันทึก</button>
</div>

<script>
function editData() {
    document.getElementById("text").style.display = "none"; // ซ่อนข้อความเดิม
    document.getElementById("edit-input").style.display = "inline-block"; // แสดง input
    document.getElementById("save-btn").style.display = "inline-block"; // แสดงปุ่มบันทึก
}

function saveData() {
    let newValue = document.getElementById("edit-input").value;
    document.getElementById("text").innerText = newValue; // อัปเดตข้อความใหม่
    document.getElementById("text").style.display = "inline-block"; // แสดงข้อความ
    document.getElementById("edit-input").style.display = "none"; // ซ่อน input
    document.getElementById("save-btn").style.display = "none"; // ซ่อนปุ่มบันทึก
}
</script> -->

<!-- <button onclick="createNewData()">เพิ่มข้อมูลใหม่</button>

<script>
function createNewData() {
    let container = document.createElement("div");
    
    let text = document.createElement("span");
    text.innerText = "ข้อมูลใหม่";
    
    let input = document.createElement("input");
    input.type = "text";
    input.value = "ข้อมูลใหม่";
    input.style.display = "none";
    input.onkeydown = function(event) {
        if (event.key === "Enter") saveData(input, text, saveBtn);
        else if (event.key === "Escape") cancelEdit(input, text, saveBtn);
    };

    let editBtn = document.createElement("button");
    editBtn.innerText = "แก้ไข";
    editBtn.onclick = function() {
        editData(input, text, saveBtn);
    };

    let saveBtn = document.createElement("button");
    saveBtn.innerText = "บันทึก";
    saveBtn.style.display = "none";
    saveBtn.onclick = function() {
        saveData(input, text, saveBtn);
    };

    container.appendChild(text);
    container.appendChild(input);
    container.appendChild(editBtn);
    container.appendChild(saveBtn);
    
    document.body.appendChild(container);
}

function editData(input, text, saveBtn) {
    text.style.display = "none";
    input.style.display = "inline-block";
    input.focus();
    saveBtn.style.display = "inline-block";
}

function saveData(input, text, saveBtn) {
    let newValue = input.value.trim();
    if (newValue !== "") text.innerText = newValue;
    
    text.style.display = "inline-block";
    input.style.display = "none";
    saveBtn.style.display = "none";
}

function cancelEdit(input, text, saveBtn) {
    input.style.display = "none";
    text.style.display = "inline-block";
    saveBtn.style.display = "none";
}
</script> -->

<!-- <div id="data-container">
    <div>
        <span id="text1">ข้อมูลที่ 1</span>
        <input type="text" id="edit-input1" value="ข้อมูลที่ 1" style="display: none;">
    </div>

    <div>
        <span id="text2">ข้อมูลที่ 2</span>
        <input type="text" id="edit-input2" value="ข้อมูลที่ 2" style="display: none;">
    </div>

    <div>
        <span id="text3">ข้อมูลที่ 3</span>
        <input type="text" id="edit-input3" value="ข้อมูลที่ 3" style="display: none;">
    </div>

    <button onclick="editData()">แก้ไข</button>
    <button onclick="saveData()" style="display: none;" id="save-btn">บันทึก</button>
</div>

<script>
function editData() {
    for (let i = 1; i <= 3; i++) {
        document.getElementById(`text${i}`).style.display = "none";
        let input = document.getElementById(`edit-input${i}`);
        input.style.display = "inline-block";
    }
    document.getElementById("save-btn").style.display = "inline-block";
}

function saveData() {
    for (let i = 1; i <= 3; i++) {
        let input = document.getElementById(`edit-input${i}`);
        let newValue = input.value.trim();

        if (newValue !== "") {
            document.getElementById(`text${i}`).innerText = newValue;
        }

        document.getElementById(`text${i}`).style.display = "inline-block";
        input.style.display = "none";
    }
    document.getElementById("save-btn").style.display = "none";
}
</script> -->

<!-- <div >
    <div>
        <span id="text1-1">ข้อมูลที่ 1-1</span>
        <input type="text" id="edit-input1-1" value="ข้อมูลที่ 1-1" style="display: none;">
    </div>
    <div>
        <span id="text1-2">ข้อมูลที่ 1-2</span>
        <input type="text" id="edit-input1-2" value="ข้อมูลที่ 1-2" style="display: none;">
    </div>
    <div>
        <span id="text1-3">ข้อมูลที่ 1-3</span>
        <input type="text" id="edit-input1-3" value="ข้อมูลที่ 1-3" style="display: none;">
    </div>
    <button onclick="editData(1)">แก้ไข</button>
    <button onclick="saveData(1)" style="display: none;" id="save-btn1">บันทึก</button>
</div>

<br>

<div >
    <div>
        <span id="text2-1">ข้อมูลที่ 2-1</span>
        <input type="text" id="edit-input2-1" value="ข้อมูลที่ 2-1" style="display: none;">
    </div>
    <div>
        <span id="text2-2">ข้อมูลที่ 2-2</span>
        <input type="text" id="edit-input2-2" value="ข้อมูลที่ 2-2" style="display: none;">
    </div>
    <div>
        <span id="text2-3">ข้อมูลที่ 2-3</span>
        <input type="text" id="edit-input2-3" value="ข้อมูลที่ 2-3" style="display: none;">
    </div>
    <button onclick="editData(2)">แก้ไข</button>
    <button onclick="saveData(2)" style="display: none;" id="save-btn2">บันทึก</button>
</div>

<script>
function editData(id) {
    for (let i = 1; i <= 3; i++) {
        document.getElementById(`text${id}-${i}`).style.display = "none";
        let input = document.getElementById(`edit-input${setId}-${i}`);
        input.style.display = "inline-block";
    }
    document.getElementById(`save-btn${id}`).style.display = "inline-block";
}

function saveData(setId) {
    for (let i = 1; i <= 3; i++) {
        let input = document.getElementById(`edit-input${setId}-${i}`);
        let newValue = input.value.trim();

        if (newValue !== "") {
            document.getElementById(`text${setId}-${i}`).innerText = newValue;
        }

        document.getElementById(`text${setId}-${i}`).style.display = "inline-block";
        input.style.display = "none";
    }
    document.getElementById(`save-btn${setId}`).style.display = "none";
}
</script> -->
