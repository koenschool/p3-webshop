getal=0;
function option(){
  kies = document.getElementById("kies").value;
  if(kies == "naam"){
    getal = 2;
  }
  else if(kies == "merk"){
    getal = 1;
  }
  document.getElementById("myInput").placeholder="Zoek op "+kies;
}

function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[getal];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
  }

  var sortAsc = true; // Declare sortAsc outside the function

    var sortAsc = true; // Declare sortAsc outside the function so its value persists across calls

    function sortTable() {
      var table, rows, switching, i, x, y, shouldSwitch;
      table = document.getElementById("myTable");
      switching = true;
      while (switching) {
        switching = false;
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
          shouldSwitch = false;
          x = rows[i].getElementsByTagName("TD")[3];
          y = rows[i + 1].getElementsByTagName("TD")[3];
          if (sortAsc ? x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase() : x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
            shouldSwitch = true;
            break;
          }
        }
        if (shouldSwitch) {
          rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
          switching = true;
        }
      }
      sortAsc = !sortAsc; // Flip the sort order for the next call
    }