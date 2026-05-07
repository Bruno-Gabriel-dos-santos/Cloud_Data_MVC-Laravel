var xhr = new XMLHttpRequest()



xhr.onreadystatechange = function(){

    if(xhr.readyState == 4){
        
        if(xhr.status==200){
           
        }
    }else{
       // console.log("outra rota")
    }

    xhr.onload=()=>{
        // utilizavel para resposta
        resultado=xhr.response
        resultado2=xhr.responseType
        
        if(resultado=="0"){console.log("resultado 0");
                            // alert("Erro no sistema")
                            document.getElementById("form").style.display="none";
                            document.getElementById("janela").style.height = '300px';
                            document.getElementById("resultado").style.display="block";
                            document.getElementById("resultadoparag").textContent="Erro no sistema";
                        }
                            
        if(resultado=="1"){console.log("resultado 1");
                           // alert("Cadatrado com sucesso")
                           document.getElementById("form").style.display="none";
                           document.getElementById("janela").style.height = '300px';
                            document.getElementById("resultado").style.display="block";
                            document.getElementById("resultadoparag").textContent="Cadastrado com sucesso";}

        if(resultado=="2"){console.log("resultado 2");
                           // alert("Usiario ja existe no sistema")
                         
                            document.getElementById("resultado").style.display="block";
                            document.getElementById("resultadoparag").textContent="Usuario ja existe";}

        if(resultado=="3"){console.log("resultado 3");
                            //alert("Erro no capcha")
                            
                            document.getElementById("resultado").style.display="block";
                            document.getElementById("resultadoparag").textContent="Capcha incorreto";}
       // console.log(resultado)
        
        
    }

}
 

function cad(){
     dado1="capcha=";
     dado2="nick=";
     dado3="senha=";
     senha=document.getElementById("senha").value;
     nic=document.getElementById("nick").value;
     capacha=document.getElementById("capcha").value;
     
  

    // Obtém o token CSRF do meta tag no HTML
    var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    var cap = dado2 + nic + "&" + dado3 + senha + "&" + dado1 + capacha + "&_token=" + token;

    
    var capcha=[cap];
    
    console.log(capcha)
    xhr.open("POST","https://cloud-data.rede-iroha.com/novocadastro",true);
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.send(capcha);

    //console.log(xhr.response)
    //console.log(xhr.responseText)

}

function inicio(){

    window.location.assign("/");
}