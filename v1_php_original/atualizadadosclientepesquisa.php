<?php
include("conecxao.php");
$saidabot0= isset($_POST  ['bot0']) ? $_POST["bot0"] : "0";
$saidabot1= isset($_POST  ['bot1']) ? $_POST["bot1"] : "0";
$valorpesquisa= isset($_POST  ['pesc']) ? $_POST["pesc"] : "0";
$inicionomes=0;
$icontadordearquivos=1;




if($saidabot0=="bot0"){
    // retrocede a pagina anterior se possivel
    if($_SESSION['nomesdado']>0){$_SESSION['nomesdado']=$_SESSION['nomesdado']-15;}
        
}
if($saidabot1=="bot1"){
    // avança para a proxima pagina se possivel
    $_SESSION['nomesdado']=$_SESSION['nomesdado']+15;
    
}
if(isset($_SESSION['nomesdado'])){
    $inicionomes=$_SESSION['nomesdado'];
}else{
    $_SESSION['nomesdado']=0;
    
}
if(isset($_SESSION['totaldenomessession'])){}else{$_SESSION['totaldenomessession']=0;}

if( $_SESSION['totaldenomessession']<$_SESSION['nomesdado']){
    if($_SESSION['nomesdado']>=15){$_SESSION['nomesdado']=$_SESSION['nomesdado']-15;}
    $inicionomes=$_SESSION['nomesdado'];
    
}
if(isset($_SESSION['paginaatual'])){

if($paginaatual!=$_SESSION['paginaatual']){
    $_SESSION['paginaatual']=$paginaatual;
    $_SESSION['nomesdado']=0;
    $inicionomes=$_SESSION['nomesdado'];
}

}else{
    $_SESSION['paginaatual']=$paginaatual;
    $_SESSION['nomesdado']=0;
    $inicionomes=$_SESSION['nomesdado'];
}



$contadordearquivos=1;
$nicklivre=mysqli_real_escape_string($conecxao,$nick);
$senhalivre=mysqli_real_escape_string($conecxao,$senha);
$valorpesquisalivre=mysqli_real_escape_string($conecxao,$valorpesquisa);

$novasenha=hash("sha256",$senhalivre);
$valordapagina="";
$valordapaginaatual=1;


$displayarquivo= [1 => "none",2 => "none",3 => "none",4 => "none",5 => "none",6 => "none",7 => "none",8 => "none",
9 => "none",10 => "none",11 => "none",12 => "none",13 => "none",14 => "none",15 => "none"];
$nomearquivo= [1 => "none",2 => "none",3 => "none",4 => "none",5 => "none",6 => "none",7 => "none",8 => "none",
9 => "none",10 => "none",11 => "none",12 => "none",13 => "none",14 => "none",15 => "none"];
$identificador= ["1" => "none","2" => "none","3" => "none","4" => "none","5" => "none","6" => "none","7" => "none","8" => "none",
"9" => "none","10" => "none","11" => "none","12" => "none","13" => "none","14" => "none","15" => "none"];
$linkbaixar= [1 => "#",2 => "#",3 => "#",4 => "#",5 => "#",6 => "#",7 => "#",8 => "#",
9 => "#",10 => "#",11 => "#",12 => "#",13 => "#",14 => "#",15 => "#"];
// utilizando o nick pega todos os nomes e ids dos dados arquivos no banco


$sqlnomearq="SELECT `nome` FROM `dados` WHERE nick='$nick' AND nome LIKE '%$valorpesquisalivre%';";
    if(mysqli_query($conecxao,$sqlnomearq)){
           
        $resultado = mysqli_query($conecxao,$sqlnomearq);
        

        // deu certo
        while(1){
        $dados= mysqli_fetch_array($resultado);
        if($dados!=NULL){

            if($contadordearquivos>$inicionomes){


                if($icontadordearquivos<=15){
                $displayarquivo[$icontadordearquivos]="block";
               
                $nomearquivo[$icontadordearquivos]=$dados[0];
                $diretorio = "arquivos/$idpasta/";
                $linkbaixar[$icontadordearquivos]=$diretorio.$nomearquivo[$icontadordearquivos];
                $icontadordearquivos++;
                }
                    
                
            }

            $contadordearquivos++;
            
        }else{break;}
            
        }
     
     }else{
         echo"0"; //deu errado apaga os dados
         mysqli_close($conecxao);
         die();
     }

     $_SESSION['totaldenomessession']=$contadordearquivos;
     $valortotaldapagina=(int)($contadordearquivos/15);
     $valortotaldapagina++;
     $paginaatualizada=$_SESSION['nomesdado'];
     $paginaatualizada=$paginaatualizada/15;
     $valordapaginaatual=$valordapaginaatual+$paginaatualizada;
     $valordapagina="pagina ".$valordapaginaatual." de ".$valortotaldapagina;
     $inicionomes=$_SESSION['nomesdado'];
     
     




?>