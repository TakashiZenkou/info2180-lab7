window.onload = function(){ 
    let url = "world.php?country=";
    let button1 = document.getElementById("lookup");
    let button2 = document.getElementById("lookup-c");
    let country = document.getElementById("country");
    let result = document.getElementById("result");
    let xhr = new XMLHttpRequest();
    button1.addEventListener("click", function(){
        xhr.onreadystatechange = function(){
            if(xhr.readyState === 4 && xhr.status === 200){
                result.innerHTML = this.response;
            }
        }
        xhr.open("GET",url+country.value,true);
        xhr.send();
        country.value = "";
    })
    button2.addEventListener("click", function(){
        xhr.onreadystatechange = function(){
            if(xhr.readyState === 4 && xhr.status === 200){
                result.innerHTML = this.response;
            }
        }
        xhr.open("GET",url+country.value+"&context=cities");
        xhr.send();
        country.value = "";
    })
}