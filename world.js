

$(document).ready(function() {
    
    var res = document.getElementById("result");
    var httpRequest = new XMLHttpRequest();
    $("#lookup").click(function (event){
        event.preventDefault();
        
        var txt = document.getElementById("country").value;
        var url = "http://localhost/info2180-lab5/world.php?country="+txt;
        httpRequest.onreadystatechange = doSomething;
        httpRequest.open('GET', url);
        httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        httpRequest.send('name=' + encodeURIComponent(txt));
 
    });
 
    function doSomething() {

        if (httpRequest.readyState === XMLHttpRequest.DONE) {
            if (httpRequest.status === 200) {
                var response = httpRequest.responseText;
                res.innerHTML = response; 
            }else {
                console.log("There was a problem with the request.");
            }
        }
    }
});
                   