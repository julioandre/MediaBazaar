function addRowHandlers() {
    var rows = document.getElementById("shifttable").rows;
    for (i = 0; i < rows.length; i++) {
        rows[i].onclick = function(){ return function(){
            var id = this.cells[0].innerHTML;
            document.getElementById("myForm").style.display = "block";
        };}(rows[i]);
    }
}
window.onload = addRowHandlers();
document.getElementById("myForm").style.display = "none";
function closeForm() {
    document.getElementById("myForm").style.display = "none";
}
