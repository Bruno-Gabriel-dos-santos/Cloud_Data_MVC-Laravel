
xhr.onreadystatechange = function(){

    if(xhr.readyState == 4){
        console.log("ok")
        if(xhr.status==200){
            console.log("status 200 ")
        }
    }else{
        console.log("indo para outra rota")
    }
    xhr.onload=()=>{
        // utilizavel para resposta
        resultado=xhr.response
        resultado2=xhr.responseType
        
       // if(resultado=="0"){console.log("resultado 0")
         //                   alert("Erro no sistema")}
                            
    }

}
 

function cad(){
     dado1="capcha=";
     dado2="nick=";
     dado3="senha=";
     senha=document.getElementById("senha").value;
     nic=document.getElementById("nick").value;
     capacha=document.getElementById("capcha").value;
     
    var cap=dado2+nic+"&"+dado3+senha+"&"+dado1+capacha;
    
    
    var capcha=[cap];
    
    console.log(capcha)
    xhr.open("POST","http://www.localhost/teste/log.php",true);
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.send(capcha);

    //console.log(xhr.response)
    //console.log(xhr.responseText)

}