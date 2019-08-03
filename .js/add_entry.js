function MDiv() {
    var x = document.getElementById("M_div");
    if(x.style.display === "block") {
        x.style.display = "none";
        document.getElementById('DBut').disabled=false;
        document.getElementById('MBut');               
    } else {
        x.style.display = "block";
        document.getElementById('DBut').disabled=true;
        document.getElementById('MBut');
    } 
}			  
function DDiv() {
    var y = document.getElementById("D_div");
    if (y.style.display === "block") {
        y.style.display = "none";
        document.getElementById('MBut').disabled=false;
        document.getElementById('DBut');             
    } else {
        y.style.display = "block";
        document.getElementById('MBut').disabled=true;
        document.getElementById('DBut');
    } 
}