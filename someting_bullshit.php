<button onclick="confirmDelete('row-1')" id="delete-btn-row-1">Delete row</button>

<script>
function confirmDelete(rowId) {
    if (confirm("Are you sure you want to delete this row?")) {
        myDeleteFunction(rowId);
    }
}
</script>
<script>
  
  function cancelEdit(rowId) {
    let row = document.getElementById(rowId);
    if (!row) return; // ถ้าไม่มีแถวให้หยุดทำงาน

    let textareas = row.querySelectorAll("textarea");
    let spans = row.querySelectorAll("span");

    spans.forEach((span, index) => {
      let newValue = span.value.trim();
      
      textareas[index].value = newValue;
      textareas[index].style.display = "none"; // แสดงข้อความ
      span.style.display = "inline-block"; // ซ่อน textarea
    });
    document.getElementById("edit-btn-"+rowId).style.display = "inline-block";
    document.getElementById("delete-btn-"+rowId).style.display = "inline-block";
    document.getElementById("save-btn-"+rowId).style.display = "none";
    document.getElementById("cancel-btn-"+rowId).style.display = "none";
  }
  
  function editData(rowId) {
    let row = document.getElementById(rowId);
    if (!row) return; // ถ้าไม่มีแถวให้หยุดทำงาน

    let textareas = row.querySelectorAll("textarea");
    let spans = row.querySelectorAll("span");

    spans.forEach((span, index) => {
      let newValue = span.value.trim();
      textareas[index].innerText = newValue; // อัปเดตข้อความใหม่
      textareas[index].style.display = "inline-block"; // แสดงข้อความ
      span.style.display = "none"; // ซ่อน textarea
    });
    document.getElementById("edit-btn-"+rowId).style.display = "none";
    document.getElementById("delete-btn-"+rowId).style.display = "none";
    document.getElementById("save-btn-"+rowId).style.display = "inline-block";
    document.getElementById("cancel-btn-"+rowId).style.display = "inline-block";
  }

  function saveData(rowId) {
    let row = document.getElementById(rowId);
    if (!row) return; // ถ้าไม่มีแถวให้หยุดทำงาน

    let textareas = row.querySelectorAll("textarea");
    let spans = row.querySelectorAll("span");

    textareas.forEach((textarea, index) => {
      let newValue = textarea.value.trim();
      spans[index].innerText = newValue; // อัปเดตข้อความใหม่
      spans[index].style.display = "inline-block"; // แสดงข้อความ
      textarea.style.display = "none"; // ซ่อน textarea
    });
    // ซ่อนปุ่มบันทึก
    row.querySelector("#edit-btn-"+rowId).style.display = "inline-block";
    row.querySelector("#delete-btn-"+rowId).style.display = "inline-block";
    row.querySelector("#save-btn-"+rowId).style.display = "none";
    row.querySelector("#cancel-btn-"+rowId).style.display = "none";
  }
  
  function saveCreateData(rowId) {
    let row = document.getElementById(rowId);
    if (!row) return; // ถ้าไม่มีแถวให้หยุดทำงาน

    let textareas = row.querySelectorAll("textarea");
    let spans = row.querySelectorAll("span");

    textareas.forEach((textarea, index) => {
      let newValue = textarea.value.trim();
      spans[index].innerText = newValue; // อัปเดตข้อความใหม่
      spans[index].style.display = "inline-block"; // แสดงข้อความ
      textarea.style.display = "none"; // ซ่อน textarea
    });

    // ซ่อนปุ่มบันทึกและแสดงปุ่มแก้ไข
    row.querySelector("#edit-btn-"+rowId).style.display = "inline-block";
    row.querySelector("#delete-btn-"+rowId).style.display = "inline-block";
    row.querySelector("#save-btn-"+rowId).style.display = "none";
    row.querySelector("#cancel-btn-"+rowId).style.display = "none";
    row.querySelector("#saveCreate-btn-"+rowId).style.display = "none";
    document.getElementById("create-btn").style.display = "inline-block";
  }

  function myDeleteFunction(rowId) {
    let row = document.getElementById(rowId);
    if (!row) return; // ถ้าไม่มีแถวให้หยุดทำงาน

    row.remove();
  }

  function myCreateFunction() {
    let table = document.getElementById("myTable");
    let index = table.rows.length; // คำนวณ index ใหม่
    let rowId = `row-${index}`;

    let row = table.insertRow(-1);
    row.id = rowId;

    row.innerHTML = `
        <td>
            <span id="e1-${index}" style="display: none;"></span>
            <textarea id="edit-input${index}" style="display: inline-block;"></textarea>
        </td>
        <td>
            <span id="e2-${index}" style="display: none;"></span>
            <textarea id="edit-input${index}" style="display: inline-block;"></textarea>
        </td>
        <td>
            <span id="e3-${index}" style="display: none;"></span>
            <textarea id="edit-input${index}" style="display: inline-block;"></textarea>
        </td>
        <td>
            <button onclick="editData('${rowId}')" id="edit-btn-${rowId}" style="display: none;">แก้ไข</button>
            <button onclick="myDeleteFunction('${rowId}')" id="delete-btn-${rowId}" style="display: none;">delete</button>
            <button onclick="saveCreateData('${rowId}')" id="saveCreate-btn-${rowId}" style="display: inline-block;">บันทึก</button>
            <button onclick="saveData('${rowId}')" id="save-btn-${rowId}" style="display: none;">บันทึก</button>
            <button onclick="cancelEdit('${rowId}')" id="cancel-btn-${rowId}" style="display: inline-block;">ยกเลิก</button>
        </td>
    `;
    document.getElementById("create-btn").style.display = "none";
  }
</script>

<!-- crate row -->

<!DOCTYPE html>
<html>

<body>
  <table id="myTable">
    <tr>
      <th>Cell1</th>
      <th>Cell2</th>
      <th>Cell3</th>
      <th>Edit</th>
    </tr>
    <tr id="row-1">
      <td>
        <span id="e1-1">ตัวอย่างข้อมูล</span>
        <textarea id="edit-input1" style="display: none;">ตัวอย่างข้อมูล</textarea>
      </td>
      <td>
        <span id="e2-1">ตัวอย่างข้อมูล</span>
        <textarea id="edit-input2" style="display: none;">ตัวอย่างข้อมูล</textarea>
      </td>
      <td>
        <span id="e3-1">ตัวอย่างข้อมูล</span>
        <textarea id="edit-input3" style="display: none;">ตัวอย่างข้อมูล</textarea>
      </td>
      <td>
        <button onclick="editData('row-1')" id="edit-btn-row-1">แก้ไข</button>
        <button onclick="myDeleteFunction('row-1')" id="delete-btn-row-1">Delete row</button>
        <button onclick="saveData('row-1')" id="save-btn-row-1" style="display: none;">บันทึก</button>
        <button onclick="cancelEdit('row-1')" id="cancel-btn-row-1" style="display: none;">ยกเลิก</button>
      </td>
    </tr>
  </table>

  <button onclick="myCreateFunction()" id="create-btn" >เพิ่มแถวใหม่</button>

  <br>

</body>

</html>