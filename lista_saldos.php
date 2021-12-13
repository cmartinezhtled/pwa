<?
include('conex.php');

$dni = $_POST["dni"];

// , será el separador de campos
	$sqldata = "SELECT * FROM datos_ctacte WHERE DNI='$dni' ORDER BY Registro DESC";
	//echo $sqldata;
	$resudata = mysqli_query($conexion, $sqldata);
	if (mysqli_num_rows($resudata) > 0)
	{
		$rowdata = mysqli_fetch_array($resudata);
		$fp = fopen($dni.'.html', 'w');

		//echo "Fecha,Detalle,Movim,Saldo\n";
		$text = "<style>
	.tablageneral {background-color: #e6e6e6;}
.tablasuperiorgeneral {background-color: #ffffff;}
.tablasuperiordatos {background-color: #e0e0e0;}
.tablalistado {background-color: #f0f0f0;}

.fd0 {background-color: #E3F2F7;} /*fondo de todas las pantallas desde admin.php*/
.invisible {color: #C6E3E4;} /*mismo color que el anterior*/
.fd1 {background-color: #F0F8FF;}
.fd2 {background-color: #FFFFFF;}
.ln1 {background-color: #cccccc;}
.blanco {background-color: #ffffff;}
.fondonegro {background-color: #000000;}
.grisoscuro {background-color: #808080;}
.grisclaro {background-color: #e6e6e6;}
.azulsch {font-weight:bold; background-color: #0F4D94;}

.fondofiltros {background-color: #CFEEF9; border: 1px solid black; padding:5px; border-radius: 5px;}
.fondotdtabla {color:white; background-color: #296174; border: 1px solid black; padding:1px; border-radius: 5px; FONT-FAMILY: arial,verdana; FONT-SIZE: 12px; FONT-WEIGHT: bold;}
.fondotdtabla_1 {color:white; background-color: #F02D03; border: 1px solid black; padding:1px; border-radius: 5px; FONT-FAMILY: arial,verdana; FONT-SIZE: 12px; FONT-WEIGHT: bold;}
.fondotdtabla_2 {color:white; background-color: #279B02; border: 1px solid black; padding:1px; border-radius: 5px; FONT-FAMILY: arial,verdana; FONT-SIZE: 12px; FONT-WEIGHT: bold;}
.fondotdtabla_3 {color:white; background-color: #B303F0; border: 1px solid black; padding:1px; border-radius: 5px; FONT-FAMILY: arial,verdana; FONT-SIZE: 12px; FONT-WEIGHT: bold;}

.fondotdtabla2 {color:black; background-color: #B4CDD5; border: 1px solid black; padding:1px; border-radius: 5px; FONT-FAMILY: arial,verdana; FONT-SIZE: 12px; }
.fondotdtablagrande {color:white; background-color: #296174; border: 1px solid black; padding:1px; border-radius: 5px; FONT-FAMILY: arial,verdana; FONT-SIZE: 16px; FONT-WEIGHT: bold;}

.fondotabla {background-color: #B1D3E3; border: 1px solid black; padding:5px; border-radius: 5px;}
.fondotablaacompletar {background-color: #F8DDD1; border: 1px solid black; padding:5px; border-radius: 5px;}
.borderedondo { border: 1px solid black; padding:1px; border-radius: 5px;}
.fondocalendario {background-color: #B9CCD9; border: 1px solid black; border-radius: 5px;}
.mescalendario {background-color: #8D979E;  color: white;}


.bordefino { border: 1px solid black;}

.seleccionado { background-color: orange; border-style:0px; font-size: 11; color: white; font-family: arial,verdana; FONT-WEIGHT: bold;}
.noseleccionado { background-color: white; border-style:0px; font-size: 11; color: black; font-family: arial,verdana; }

.seleccionadogrande { background-color: orange; border-style:0px; font-size: 14; color: white; font-family: arial,verdana; FONT-WEIGHT: bold;}
.noseleccionadogrande { background-color: white; border-style:0px; font-size: 14; color: black; font-family: arial,verdana; }



.titulo {COLOR: #337ab7; FONT-FAMILY: arial,verdana; FONT-SIZE: 12px; FONT-WEIGHT: bold;}
.minititulo {COLOR: #3B7589; FONT-FAMILY: arial,verdana; FONT-SIZE: 10px; FONT-WEIGHT: bold;}
.titulonaranja {COLOR: #ff8000; FONT-FAMILY: arial,verdana; FONT-SIZE: 12px; FONT-WEIGHT: bold;}
.titulorosa {COLOR: pink; FONT-FAMILY: arial,verdana; FONT-SIZE: 12px; FONT-WEIGHT: bold;}
.tituloverde {COLOR: green; FONT-FAMILY: arial,verdana; FONT-SIZE: 12px; FONT-WEIGHT: bold;}
.tituloazul {COLOR: blue; FONT-FAMILY: arial,verdana; FONT-SIZE: 12px; FONT-WEIGHT: bold;}
.titulocyan {COLOR: cyan; FONT-FAMILY: arial,verdana; FONT-SIZE: 12px; FONT-WEIGHT: bold;}
.titulomagenta {COLOR: magenta; FONT-FAMILY: arial,verdana; FONT-SIZE: 12px; FONT-WEIGHT: bold;}
.tituloamarillo {COLOR: yellow; FONT-FAMILY: arial,verdana; FONT-SIZE: 12px; FONT-WEIGHT: bold;}
.titulorojo {COLOR: red; FONT-FAMILY: arial,verdana; FONT-SIZE: 12px; FONT-WEIGHT: bold;}
.titulonaranjamini {COLOR: #FF4000; FONT-FAMILY: arial,verdana; FONT-SIZE: 12px; FONT-WEIGHT: bold; background-color:yellow;}
.tituloblanco {background-color: #337ab7; COLOR: white; FONT-FAMILY: arial,verdana; FONT-SIZE: 12px; FONT-WEIGHT: bold;}
.tituloblancosinfondo { COLOR: white; FONT-FAMILY: arial,verdana; FONT-SIZE: 12px; FONT-WEIGHT: bold;}
.tituloblancochicosinfondo { COLOR: white; FONT-FAMILY: arial,verdana; FONT-SIZE: 12px; }
.titulooscuro {COLOR: #3B1589; FONT-FAMILY: arial,verdana; FONT-SIZE: 12px; FONT-WEIGHT: bold;}
.tituloa {COLOR: blue; FONT-FAMILY: arial,verdana; FONT-SIZE: 12px; FONT-WEIGHT: bold;}
.tituloa14 {COLOR: blue; FONT-FAMILY: arial,verdana; FONT-SIZE: 14px; FONT-WEIGHT: bold;}
.titulo1 {COLOR: #000000; FONT-FAMILY: arial,verdana; FONT-SIZE: 14px; FONT-WEIGHT: bold;}
.titulo1naranja{COLOR: orange; FONT-FAMILY: arial,verdana; FONT-SIZE: 14px; FONT-WEIGHT: bold;}
.titulo1blanco{COLOR: white; FONT-FAMILY: arial,verdana; FONT-SIZE: 14px; FONT-WEIGHT: bold;}
.titulo1a {COLOR: #000000; FONT-FAMILY: arial,verdana; FONT-SIZE: 16px; FONT-WEIGHT: bold;}
.titulo2 {COLOR: #000000; FONT-FAMILY: arial,verdana; FONT-SIZE: 12px; FONT-WEIGHT: bold;}
.titulo2a {COLOR: #000000; FONT-FAMILY: arial,verdana; FONT-SIZE: 12px; }
.titulo2naranja {COLOR: #ff8000; FONT-FAMILY: arial,verdana; FONT-SIZE: 12px; FONT-WEIGHT: bold;}
.titulo2blanco {COLOR: white; FONT-FAMILY: arial,verdana; FONT-SIZE: 12px; FONT-WEIGHT: bold;}
.titulo3 {COLOR: #337ab7; FONT-FAMILY: arial,verdana; FONT-SIZE: 14px; FONT-WEIGHT: bold; border:#337ab7; }
.titulo3rojo {COLOR: red; FONT-FAMILY: arial,verdana; FONT-SIZE: 14px; FONT-WEIGHT: bold; border:#337ab7; }
.titulo3magenta {COLOR: magenta; FONT-FAMILY: arial,verdana; FONT-SIZE: 14px; FONT-WEIGHT: bold; border:#337ab7; }
.titulo3magentainverso {COLOR: white; background-color: magenta; FONT-FAMILY: arial,verdana; FONT-SIZE: 14px; FONT-WEIGHT: bold; border:#337ab7; }
.titulo3inverso {COLOR: white; background-color: crimson; FONT-FAMILY: arial,verdana; FONT-SIZE: 14px; FONT-WEIGHT: bold;}
.titulo3rojoinverso {COLOR: white; background-color: crimson; FONT-FAMILY: arial,verdana; FONT-SIZE: 14px; FONT-WEIGHT: bold;}
.titulo3naranjainverso {COLOR: white; background-color: #ff8000; FONT-FAMILY: arial,verdana; FONT-SIZE: 14px; FONT-WEIGHT: bold;}
.titulo3verde {COLOR: green; FONT-FAMILY: arial,verdana; FONT-SIZE: 14px; FONT-WEIGHT: bold;}
.titulo3blanco {COLOR: white; FONT-FAMILY: arial,verdana; FONT-SIZE: 14px; FONT-WEIGHT: bold;}
.titulo3naranja1 {COLOR: #ff8000; FONT-FAMILY: arial,verdana; FONT-SIZE: 14px; FONT-WEIGHT: bold;}
.titulo3naranja {COLOR: #ff8000; FONT-FAMILY: arial,verdana; FONT-SIZE: 16px; FONT-WEIGHT: bold;}
.titulo3azul {COLOR: BLUE; FONT-FAMILY: arial,verdana; FONT-SIZE: 14px; FONT-WEIGHT: bold;}
.titulo3verdeinverso {background-color: green; COLOR: white; FONT-FAMILY: arial,verdana; FONT-SIZE: 14px; FONT-WEIGHT: bold;}
.titulo3azulinverso {background-color: blue; COLOR: white; FONT-FAMILY: arial,verdana; FONT-SIZE: 14px; FONT-WEIGHT: bold;}
.titulo4 {COLOR: #3C6C8F; FONT-FAMILY: arial,verdana; FONT-SIZE: 20px; FONT-WEIGHT: bold;}
.titulo4medio {COLOR: #3C6C8F; FONT-FAMILY: arial,verdana; FONT-SIZE: 16px; FONT-WEIGHT: bold;}
.titulo4rojo {COLOR: crimson; FONT-FAMILY: arial,verdana; FONT-SIZE: 20px; FONT-WEIGHT: bold;}
.titulo4blanco {COLOR: white; FONT-FAMILY: arial,verdana; FONT-SIZE: 20px; FONT-WEIGHT: bold;}
.titulo4naranja {COLOR: #ff8000; FONT-FAMILY: arial,verdana; FONT-SIZE: 20px; FONT-WEIGHT: bold;}
.titulo4chico {COLOR: #3C6C8F; FONT-FAMILY: arial,verdana; FONT-SIZE: 12px; FONT-WEIGHT: bold;}
.titulo4azulinverso {COLOR: white; background-color: blue; FONT-FAMILY: arial,verdana; FONT-SIZE: 24px; FONT-WEIGHT: bold;}
.titulo4a {COLOR: crimson; background-color: yellow; FONT-FAMILY: arial,verdana; FONT-SIZE: 30px; FONT-WEIGHT: bold;}
.titulo4inverso {COLOR: white; background-color: crimson; FONT-FAMILY: arial,verdana; FONT-SIZE: 24px; FONT-WEIGHT: bold;}
.titulo4rojoinverso {COLOR: white; background-color: crimson; FONT-FAMILY: arial,verdana; FONT-SIZE: 24px; FONT-WEIGHT: bold;}
.titulo4inversochico {COLOR: white; background-color: crimson; FONT-FAMILY: arial,verdana; FONT-SIZE: 14px; FONT-WEIGHT: bold;}
.titulo4inversochicosinfondo {COLOR: white; FONT-FAMILY: arial,verdana; FONT-SIZE: 10px; FONT-WEIGHT: bold;}
.titulo5 {COLOR: black; FONT-FAMILY: arial,verdana; FONT-SIZE: 14px; }
.titulo6 {COLOR: black; FONT-FAMILY: arial,verdana; FONT-SIZE: 16px; }


.grande { FONT-FAMILY: arial,Verdana; FONT-SIZE: 14px; }
.alerta {COLOR: red; FONT-FAMILY: arial,Verdana; FONT-SIZE: 11px; FONT-WEIGHT: bold;}
.minialerta {COLOR: red; FONT-FAMILY: arial,Verdana; FONT-SIZE: 9px; FONT-WEIGHT: bold;}
.alertainvertido {COLOR: white; background-color: crimson; FONT-FAMILY: arial,Verdana; FONT-SIZE: 11px; FONT-WEIGHT: bold;}
.alertafondoamarillo {COLOR: red; background-color: yellow; FONT-FAMILY: arial,Verdana; FONT-SIZE: 11px; FONT-WEIGHT: bold;}
.superverde {COLOR: green; FONT-FAMILY: arial,Verdana; FONT-SIZE: 11px; FONT-WEIGHT: bold;}
.supernaranja {COLOR: orange; FONT-FAMILY: arial,Verdana; FONT-SIZE: 11px; FONT-WEIGHT: bold;}
.rojo {COLOR: red; FONT-FAMILY: arial,Verdana; FONT-SIZE: 14px; }
.verde {COLOR: green; FONT-FAMILY: arial,Verdana; FONT-SIZE: 11px; }
.azul {COLOR: blue; FONT-FAMILY: arial,Verdana; FONT-SIZE: 14px; }
.negro {COLOR: black; FONT-FAMILY: arial,Verdana; FONT-SIZE: 14px; }
.azulgrande {COLOR: blue; FONT-FAMILY: arial,Verdana; FONT-SIZE: 13px; }
.superazul {COLOR: blue; FONT-FAMILY: arial,Verdana; FONT-SIZE: 11px; FONT-WEIGHT: bold;}
.marron {COLOR: brown; FONT-FAMILY: arial,Verdana; FONT-SIZE: 11px; FONT-WEIGHT: bold;}
.rosa {COLOR: pink; FONT-FAMILY: arial,Verdana; FONT-SIZE: 11px; FONT-WEIGHT: bold;}
.amarillo {COLOR: yellow; FONT-FAMILY: arial,Verdana; FONT-SIZE: 11px; FONT-WEIGHT: bold;}
.naranja {COLOR: orange; FONT-FAMILY: arial,Verdana; FONT-SIZE: 11px; FONT-WEIGHT: bold;}
.celeste {COLOR: cyan; FONT-FAMILY: arial,Verdana; FONT-SIZE: 11px; FONT-WEIGHT: bold;}
.magenta {COLOR: magenta; FONT-FAMILY: arial,Verdana; FONT-SIZE: 11px; FONT-WEIGHT: bold;}
.supermagenta {COLOR: magenta; FONT-FAMILY: arial,Verdana; FONT-SIZE: 11px; FONT-WEIGHT: bold;}
.superblanco {COLOR: white; background-color: crimson; FONT-FAMILY: arial,Verdana; FONT-SIZE: 11px; FONT-WEIGHT: bold;}
.superblanco1 {COLOR: white; FONT-FAMILY: arial,Verdana; FONT-SIZE: 11px; FONT-WEIGHT: bold;}
.superamarillo {COLOR: black; background-color: yellow; FONT-FAMILY: arial,Verdana; FONT-SIZE: 11px; FONT-WEIGHT: bold;}
.superblancoverde {COLOR: white; background-color: green; FONT-FAMILY: arial,Verdana; FONT-SIZE: 11px; FONT-WEIGHT: bold;}
.superblancoazul {COLOR: white; background-color: blue; FONT-FAMILY: arial,Verdana; FONT-SIZE: 13px; FONT-WEIGHT: bold;}


.mini {COLOR: #666666; FONT-FAMILY: arial,Verdana; FONT-SIZE: 9px;}
.minioscuro {COLOR: black; FONT-FAMILY: arial,Verdana; FONT-SIZE: 9px;}
.minibold {COLOR: #666666; FONT-FAMILY: arial,Verdana; FONT-SIZE: 9px; FONT-WEIGHT: bold;}
.minisuperazul {COLOR: blue; FONT-FAMILY: arial,Verdana; FONT-SIZE: 9px; FONT-WEIGHT: bold;}
.minirojo {COLOR: crimson; FONT-FAMILY: arial,Verdana; FONT-SIZE: 9px; }
.minirojoinvertido {COLOR: white; background-color:crimson; FONT-FAMILY: arial,Verdana; FONT-SIZE: 9px; }
.miniazul {COLOR: blue; FONT-FAMILY: arial,Verdana; FONT-SIZE: 9px; }
.miniazulinvertido {COLOR: white; background-color:blue; FONT-FAMILY: arial,Verdana; FONT-SIZE: 9px; }
.minisuperrojo {COLOR: crimson; FONT-FAMILY: arial,Verdana; FONT-SIZE: 9px; FONT-WEIGHT: bold;}
.miniverdeclaroinvertido {COLOR: white; background-color: lightgreen; FONT-FAMILY: arial,Verdana; FONT-SIZE: 11px; FONT-WEIGHT: bold;}
.miniverdeinvertido {COLOR: white; background-color: green; FONT-FAMILY: arial,Verdana; FONT-SIZE: 11px; FONT-WEIGHT: bold;}
.normal12 {COLOR: black; FONT-FAMILY: arial,Verdana; FONT-SIZE: 12px;}

A:hover {COLOR: #3B7589; TEXT-DECORATION: underline}
A {COLOR: crimson; TEXT-DECORATION: underline}
A.link1 {COLOR: crimson; FONT-FAMILY: arial,verdana; FONT-SIZE: 11px; TEXT-DECORATION: underline}
A.link1:hover {COLOR: grey;  TEXT-DECORATION: underline}
A.link1a {COLOR: crimson; FONT-FAMILY: arial,verdana; FONT-SIZE: 11px; TEXT-DECORATION: underline; FONT-WEIGHT: bold;}
A.link1a:hover {COLOR: grey;  TEXT-DECORATION: underline}
A.link1bold {COLOR: crimson; FONT-FAMILY: arial,verdana; FONT-SIZE: 13px; TEXT-DECORATION: underline; FONT-WEIGHT: bold;}
A.link1bold:hover {COLOR: grey;  TEXT-DECORATION: underline; FONT-WEIGHT: bold;}




A.linkverde {COLOR: green; FONT-FAMILY: arial,verdana; FONT-SIZE: 11px; TEXT-DECORATION: underline}
A.linkverde:hover {COLOR: grey;  TEXT-DECORATION: underline}

A.linknotaverde {COLOR: green; FONT-FAMILY: arial,verdana; FONT-SIZE: 13px; TEXT-DECORATION: underline; FONT-WEIGHT: bold;}
A.linknotaverde:hover {COLOR: grey;  TEXT-DECORATION: underline; FONT-WEIGHT: bold;}
A.linknotarojo {COLOR: crimson; FONT-FAMILY: arial,verdana; FONT-SIZE: 13px; TEXT-DECORATION: underline; FONT-WEIGHT: bold;}
A.linknotarojo:hover {COLOR: grey;  TEXT-DECORATION: underline; FONT-WEIGHT: bold;}


A.link2 {COLOR: red; FONT-FAMILY: arial,verdana; FONT-SIZE: 11px; TEXT-DECORATION: underline}
A.link2:hover {COLOR: black; TEXT-DECORATION: underline}
A.link2grande {COLOR: white; BACKGROUND-COLOR: crimson; FONT-FAMILY: arial,Verdana; FONT-SIZE: 14px; FONT-WEIGHT: bold; width: 60px; height: 24px; }
A.link2grande:hover {COLOR: black; TEXT-DECORATION: underline}
A.link3 {COLOR: blue; FONT-FAMILY: arial,verdana; FONT-SIZE: 11px; TEXT-DECORATION: underline}
A.link3:hover {COLOR: red; TEXT-DECORATION: underline}
A.link4 {COLOR: pink; FONT-FAMILY: arial,verdana; FONT-SIZE: 11px; TEXT-DECORATION: underline}
A.link4:hover {COLOR: black; TEXT-DECORATION: underline}
A.link5 {COLOR: green; FONT-FAMILY: arial,verdana; FONT-SIZE: 11px; TEXT-DECORATION: underline}
A.link5:hover {COLOR: black; TEXT-DECORATION: underline}
A.link5bold {COLOR: green; FONT-FAMILY: arial,verdana; FONT-SIZE: 11px; TEXT-DECORATION: underline; FONT-WEIGHT: bold;}
A.link5bold:hover {COLOR: black; TEXT-DECORATION: underline; FONT-WEIGHT: bold;}
A.link5a{COLOR: green; FONT-FAMILY: arial,verdana; FONT-SIZE: 14px; TEXT-DECORATION: underline}
A.link5a:hover {COLOR: black; TEXT-DECORATION: underline}
A.link6 {COLOR: pink; FONT-FAMILY: arial,verdana; FONT-SIZE: 11px; TEXT-DECORATION: underline}
A.link6:hover {COLOR: white; TEXT-DECORATION: underline}
A.link7 {COLOR: black; FONT-FAMILY: verdana,arial; FONT-SIZE: 13px; }
A.link7:hover {COLOR: grey; TEXT-DECORATION: underline}
A.link7small {COLOR: black; FONT-FAMILY: verdana,arial; FONT-SIZE: 10px; }
A.link7small:hover {COLOR: grey; TEXT-DECORATION: underline}
A.link7smalla {COLOR: black; FONT-FAMILY: verdana,arial; FONT-SIZE: 10px; FONT-WEIGHT: bold;}
A.link7smalla:hover {COLOR: grey; TEXT-DECORATION: underline}
A.link8 {COLOR: red; FONT-FAMILY: arial,verdana; FONT-SIZE: 10px; }
A.link8:hover {COLOR: white; TEXT-DECORATION: underline}
A.link9 {COLOR: red; FONT-FAMILY: arial,verdana; FONT-SIZE: 14px; }
A.link9:hover {COLOR: black; TEXT-DECORATION: underline}
A.link10 {COLOR: white; BACKGROUND-COLOR: red; FONT-FAMILY: verdana,arial; FONT-SIZE: 10px; FONT-WEIGHT: bold;}
A.link11:hover {COLOR: black; }
A.linkgrande {COLOR: red; FONT-FAMILY: arial,verdana; FONT-SIZE: 16px; FONT-WEIGHT: bold; TEXT-DECORATION: underline}
A.linkgrande:hover {COLOR: blue; TEXT-DECORATION: underline}

A.linktdtabla {COLOR: white; FONT-FAMILY: arial,verdana; FONT-SIZE: 12px; FONT-WEIGHT: bold; TEXT-DECORATION: underline}
A.linktdtabla:hover {COLOR: red; TEXT-DECORATION: underline}



A.linkoscuro{COLOR: black; FONT-FAMILY: arial,verdana; FONT-SIZE: 12px; FONT-WEIGHT: bold; TEXT-DECORATION: none;}
A.linkoscuro:hover{COLOR: crimson; FONT-FAMILY: arial,verdana; FONT-SIZE: 12px; FONT-WEIGHT: bold;}
A.linkselected{COLOR: red; FONT-FAMILY: arial,verdana; FONT-SIZE: 12px; FONT-WEIGHT: bold; TEXT-DECORATION: none;}
A.linkselected:hover{COLOR: #3B1589; FONT-FAMILY: arial,verdana; FONT-SIZE: 12px; FONT-WEIGHT: bold;}

INPUT.Boton1 {BACKGROUND-COLOR: crimson; FONT-FAMILY: arial,Verdana; FONT-SIZE: 11px; width: 60px; height: 22px; color: FFFFFF; cursor:pointer; padding:0px 6px; border-radius: 6px;}
INPUT.Boton2 {BACKGROUND-COLOR: crimson; FONT-FAMILY: arial,Verdana; FONT-SIZE: 9px; width: 50px; height: 17px; color: FFFFFF; cursor:pointer; padding:0px 6px;border-radius: 5px;}
INPUT.Boton3 {BACKGROUND-COLOR: crimson; FONT-FAMILY: arial,Verdana; FONT-SIZE: 11px; width: 100px; height: 20px; color: FFFFFF; cursor:pointer; padding:0px 6px;border-radius: 5px;}
INPUT.Boton3a {BACKGROUND-COLOR: crimson; FONT-FAMILY: arial,Verdana; FONT-SIZE: 12px; width: 100px; height: 25px; color: FFFFFF; cursor:pointer; padding:0px 6px;border-radius: 5px;}
INPUT.Boton4 {BACKGROUND-COLOR: crimson; FONT-FAMILY: arial,Verdana; FONT-SIZE: 12px; width: 200px; height: 25px; color: FFFFFF; cursor:pointer; padding:0px 6px;border-radius: 5px;}


INPUT.Boton1naranja {BACKGROUND-COLOR: orange; FONT-FAMILY: arial,Verdana; FONT-SIZE: 11px; width: 60px; height: 22px; color: FFFFFF; cursor:pointer; padding:0px 6px;border-radius: 5px;}
INPUT.Boton2naranja {BACKGROUND-COLOR: orange; FONT-FAMILY: arial,Verdana; FONT-SIZE: 9px; width: 50px; height: 17px; color: FFFFFF; cursor:pointer; padding:0px 6px;border-radius: 5px;}
INPUT.Boton3naranja {BACKGROUND-COLOR: orange; FONT-FAMILY: arial,Verdana; FONT-SIZE: 10px; width: 100px; height: 20px; color: FFFFFF; cursor:pointer; padding:0px 6px;border-radius: 5px;}
INPUT.Boton4naranja {BACKGROUND-COLOR: orange; FONT-FAMILY: arial,Verdana; FONT-SIZE: 12px; width: 250px; height: 25px; color: 0; cursor:pointer; padding:0px 6px; FONT-WEIGHT: bold;border-radius: 5px;}
INPUT.Boton5naranja {BACKGROUND-COLOR: orange; FONT-FAMILY: arial,Verdana; FONT-SIZE: 12px; width: 300px; height: 25px; color: 0; cursor:pointer; padding:0px 6px; FONT-WEIGHT: bold;border-radius: 5px;}


INPUT.Boton1cyan {BACKGROUND-COLOR: cyan; FONT-FAMILY: arial,Verdana; FONT-SIZE: 11px; width: 60px; height: 22px; color: 0; cursor:pointer; padding:0px 6px;border-radius: 5px;}
INPUT.Boton2cyan {BACKGROUND-COLOR: cyan; FONT-FAMILY: arial,Verdana; FONT-SIZE: 9px; width: 50px; height: 17px; color: 0; cursor:pointer; padding:0px 6px;border-radius: 5px;}
INPUT.Boton3cyan {BACKGROUND-COLOR: cyan; FONT-FAMILY: arial,Verdana; FONT-SIZE: 11px; width: 100px; height: 20px; color: 0; cursor:pointer; padding:0px 6px;border-radius: 5px;}
INPUT.Boton4cyan {BACKGROUND-COLOR: cyan; FONT-FAMILY: arial,Verdana; FONT-SIZE: 12px; width: 250px; height: 25px; color: 0; cursor:pointer; padding:0px 6px; FONT-WEIGHT: bold;border-radius: 5px;}

INPUT.Boton1verde {BACKGROUND-COLOR: lightgreen; FONT-FAMILY: arial,Verdana; FONT-SIZE: 11px; width: 60px; height: 22px; color: 0; cursor:pointer; padding:0px 6px;border-radius: 5px;}
INPUT.Boton2verde {BACKGROUND-COLOR: lightgreen; FONT-FAMILY: arial,Verdana; FONT-SIZE: 9px; width: 50px; height: 17px; color: 0; cursor:pointer; padding:0px 6px;border-radius: 5px;}
INPUT.Boton3verde {BACKGROUND-COLOR: lightgreen; FONT-FAMILY: arial,Verdana; FONT-SIZE: 11px; width: 100px; height: 20px; color: 0; cursor:pointer; padding:0px 6px;border-radius: 5px;}
INPUT.Boton4verde {BACKGROUND-COLOR: green; FONT-FAMILY: arial,Verdana; FONT-SIZE: 12px; width: 200px; height: 25px; color: whitesmoke; cursor:pointer; padding:0px 6px; FONT-WEIGHT: bold;border-radius: 5px;}

INPUT.Boton1amarillo {BACKGROUND-COLOR: lightyellow; FONT-FAMILY: arial,Verdana; FONT-SIZE: 11px; width: 60px; height: 22px; color: 0; cursor:pointer; padding:0px 6px;}
INPUT.Boton2amarillo {BACKGROUND-COLOR: lightyellow; FONT-FAMILY: arial,Verdana; FONT-SIZE: 9px; width: 50px; height: 17px; color: 0; cursor:pointer; padding:0px 6px;}
INPUT.Boton3amarillo {BACKGROUND-COLOR: lightyellow; FONT-FAMILY: arial,Verdana; FONT-SIZE: 11px; width: 100px; height: 20px; color: 0; cursor:pointer; padding:0px 6px;}
INPUT.Boton4amarillo {BACKGROUND-COLOR: lightyellow; FONT-FAMILY: arial,Verdana; FONT-SIZE: 12px; width: 250px; height: 25px; color: 0; cursor:pointer; padding:0px 6px; FONT-WEIGHT: bold;}

INPUT.Boton1superamarillo {BACKGROUND-COLOR: yellow; FONT-FAMILY: arial,Verdana; FONT-SIZE: 11px; width: 60px; height: 22px; color: 0; cursor:pointer; padding:0px 6px;}
INPUT.Boton2superamarillo {BACKGROUND-COLOR: yellow; FONT-FAMILY: arial,Verdana; FONT-SIZE: 9px; width: 50px; height: 17px; color: 0; cursor:pointer; padding:0px 6px;}
INPUT.Boton3superamarillo {BACKGROUND-COLOR: yellow; FONT-FAMILY: arial,Verdana; FONT-SIZE: 11px; width: 100px; height: 20px; color: 0; cursor:pointer; padding:0px 6px;}
INPUT.Boton4superamarillo {BACKGROUND-COLOR: yellow; FONT-FAMILY: arial,Verdana; FONT-SIZE: 12px; width: 250px; height: 25px; color: 0; cursor:pointer; padding:0px 6px;}

INPUT.Boton1blanco {BACKGROUND-COLOR: white; FONT-FAMILY: arial,Verdana; FONT-SIZE: 11px; width: 60px; height: 22px; color: 0;cursor:pointer; padding:0px 6px;}
INPUT.Boton2blanco {BACKGROUND-COLOR: white; FONT-FAMILY: arial,Verdana; FONT-SIZE: 9px; width: 50px; height: 17px; color: 0; cursor:pointer; padding:0px 6px;}
INPUT.Boton3blanco {BACKGROUND-COLOR: white; FONT-FAMILY: arial,Verdana; FONT-SIZE: 11px; width: 100px; height: 20px; color: 0; cursor:pointer; padding:0px 6px;}
INPUT.Boton4blanco {BACKGROUND-COLOR: white; FONT-FAMILY: arial,Verdana; FONT-SIZE: 12px; width: 250px; height: 25px; color: 0; cursor:pointer; padding:0px 6px; FONT-WEIGHT: bold;}

INPUT.Boton1ama {BACKGROUND-COLOR: yellow; FONT-FAMILY: arial,Verdana; FONT-SIZE: 11px; width: 60px; height: 22px; color: 0; cursor:pointer; padding:0px 6px;}
INPUT.Boton2ama {BACKGROUND-COLOR: yellow; FONT-FAMILY: arial,Verdana; FONT-SIZE: 9px; width: 50px; height: 17px; color: 0; cursor:pointer; padding:0px 6px;}
INPUT.Boton3ama {BACKGROUND-COLOR: yellow; FONT-FAMILY: arial,Verdana; FONT-SIZE: 11px; width: 100px; height: 20px; color: 0; cursor:pointer; padding:0px 6px;}

INPUT.Boton1azul {BACKGROUND-COLOR: lightblue; FONT-FAMILY: arial,Verdana; FONT-SIZE: 11px; width: 60px; height: 22px; color: 0; cursor:pointer; padding:0px 6px;}
INPUT.Boton2azul {BACKGROUND-COLOR: lightblue; FONT-FAMILY: arial,Verdana; FONT-SIZE: 9px; width: 50px; height: 17px; color: 0; cursor:pointer; padding:0px 2px;}
INPUT.Boton3azul {BACKGROUND-COLOR: lightblue; FONT-FAMILY: arial,Verdana; FONT-SIZE: 11px; width: 100px; height: 20px; color: 0; cursor:pointer; padding:0px 6px;}

INPUT.Boton4medioazul {BACKGROUND-COLOR: #55A0BA; FONT-FAMILY: arial,Verdana; FONT-SIZE: 12px; width: 250px; height: 25px; color: white; cursor:pointer; padding:0px 6px; FONT-WEIGHT: bold; border-radius: 8px;}
INPUT.Boton4medioazulchico {BACKGROUND-COLOR: #55A0BA; FONT-FAMILY: arial,Verdana; FONT-SIZE: 12px; width: 100px; height: 25px; color: white; cursor:pointer; padding:0px 6px; FONT-WEIGHT: bold; border-radius: 8px;}
INPUT.Boton4medioazulmuychico {BACKGROUND-COLOR: #55A0BA; FONT-FAMILY: arial,Verdana; FONT-SIZE: 10px; width: 70px; height: 20px; color: white; cursor:pointer; padding:0px 4px; FONT-WEIGHT: bold; border-radius: 4px;}

INPUT.Boton4mediorojo {BACKGROUND-COLOR: crimson; FONT-FAMILY: arial,Verdana; FONT-SIZE: 12px; width: 250px; height: 25px; color: white; cursor:pointer; padding:0px 6px; FONT-WEIGHT: bold; border-radius: 8px;}
INPUT.Boton4mediorojochico {BACKGROUND-COLOR: crimson; FONT-FAMILY: arial,Verdana; FONT-SIZE: 12px; width: 100px; height: 25px; color: white; cursor:pointer; padding:0px 6px; FONT-WEIGHT: bold; border-radius: 8px;}

INPUT.Boton4medioverde {BACKGROUND-COLOR: green; FONT-FAMILY: arial,Verdana; FONT-SIZE: 12px; width: 250px; height: 25px; color: white; cursor:pointer; padding:0px 6px; FONT-WEIGHT: bold; border-radius: 8px;}
INPUT.Boton4medioverdechico {BACKGROUND-COLOR: green; FONT-FAMILY: arial,Verdana; FONT-SIZE: 12px; width: 100px; height: 25px; color: white; cursor:pointer; padding:0px 6px; FONT-WEIGHT: bold; border-radius: 8px;}

INPUT.Boton4medionaranja {BACKGROUND-COLOR: orange; FONT-FAMILY: arial,Verdana; FONT-SIZE: 12px; width: 250px; height: 25px; color: black; cursor:pointer; padding:0px 6px; FONT-WEIGHT: bold; border-radius: 8px;}
INPUT.Boton4medionaranjachico {BACKGROUND-COLOR: orange; FONT-FAMILY: arial,Verdana; FONT-SIZE: 12px; width: 100px; height: 25px; color: black; cursor:pointer; padding:0px 6px; FONT-WEIGHT: bold; border-radius: 8px;}

.form {background-color: #F0F8FF; border: 1px solid black; padding: 3px; font-size: 11; color: black; font-family: arial,verdana;}
.bigform {background-color: #F0F8FF; border: 0px solid black; padding: 0px; font-size: 20; color: crimson; font-family: arial,verdana; FONT-WEIGHT: bold; BACKGROUND-COLOR: yellow;}
</style>";

//$text .= "
//<script type='text/javascript'>
//function colorChanger(el)
//{
//		el.style.backgroundColor = '#007d00';
//}
//</script>
//";	

		

		
		
		$text .= "<form method=post>";
		
		
		$text .= "<table width=99% ><tr><td colspan=4 align=center><span class=titulo3>Detalle de &uacute;ltimos movimientos</span></td></tr>";
		$text .= "<tr ><td align=center class=fondotdtabla>Fecha</td><td align=center class=fondotdtabla>Detalle</td><td align=center class=fondotdtabla>Movim</td><td align=center class=fondotdtabla>Saldo</td></tr>";

		$quant = 0;
		do
		{
			if (substr($rowdata["Movimiento"],0,1) == '-')
				$colortexto = 'rojo';
			else
				$colortexto = 'negro';
			$text .= "<tr >";
			$text .= "<td align=center >".substr($rowdata["Fecha"],8,2)."/".substr($rowdata["Fecha"],5,2)."</span></td>";
			$text .= "<td><span class=$colortexto>".$rowdata["DescMovimiento"]."</span></td>";
			$text .= "<td align=right><span class=$colortexto>".$rowdata["Movimiento"]."</span></td>";
			if (substr($rowdata["Saldo"],0,1) == '-')
				$text .= "<td align=right><span class=rojo>".$rowdata["Saldo"]."</span></span></td>";
			else
				$text .= "<td align=right><span class=negro>".$rowdata["Saldo"]."</span></span></td>";
			$text .= "</tr>";
			
			$quant++;
		}
		while ($rowdata = mysqli_fetch_array($resudata));
		$text .= "</table>";
		$text .= "</form>";
		
		fwrite($fp, $text);
		fclose($fp);
		echo "ok".$quant;
	}
	else
		echo "?";

	
?>