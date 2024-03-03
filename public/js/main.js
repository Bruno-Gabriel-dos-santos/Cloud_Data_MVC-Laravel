
let menu = false;

let bot_op=0;

function funabrir() {
    tela = document.getElementById("menuprinc");
    bot = document.getElementById("botescondido");

    const larguraTela = window.innerWidth;


    if (larguraTela > 400 && larguraTela < 680) {

        if (!menu) {
          
           tela.style.left = '0px';
           bot.style.left = '260px';
        } else {
           
            tela.style.left = '-250px';
            bot.style.left = '10px';
           
        }
        
        
      
    }
    if (larguraTela > 680 && larguraTela < 959) {

        if (!menu) {
          
           tela.style.left = '0px';
           bot.style.left = '270px';
        } else {
           
            tela.style.left = '-250px';
            bot.style.left = '20px';
           
        }
         
       
      
    }

   

    menu=!menu;
   
}





function verificarTamanhoTela() {
    tela = document.getElementById("menuprinc");
    bot = document.getElementById("botescondido");

    const larguraTela = window.innerWidth;

    if (larguraTela < 959 && larguraTela > 680 && bot_op==1) {
        menu=false;
        tela.style.left = '-250px';
        bot.style.left = '20px';

        bot_op=0;
    }

    if (larguraTela > 959) {

        bot_op=1;
           tela.style.left = '0px';
           if(menu==false){
            bot.style.left = '270px';
           }else{
            bot.style.left = '20px';
           }
           
      
        
        
      
    }
   
}


verificarTamanhoTela();

window.addEventListener('resize', verificarTamanhoTela);

function mostrarenvarqu(){
    tela = document.getElementById("enviaarquivostela")
    saida= document.getElementById("enviaarquivostela").style.display
    
   
   if(saida==""){
    tela.style.display = "block";
   }
   if(saida=="block"){
    tela.style.display = "";
   }
} 