<?
$nombre=$_POST["nombre"];
$tilesX=$_POST["tilesX"];
$tilesY=$_POST["tilesY"];
$tileancho=$_POST["tileancho"];
$tilealto=$_POST["tilealto"];

switch ($_POST["paleta"]) 
{
    case 1:
        $image_path = "images/tilestarwars.png";
        break;
    case 2:
        $image_path = "images/rpgmaker.png";
        break;
    case 3:
        $image_path = "images/zelda.png";
        break;
}

list($width, $height, $type, $attr)= getimagesize($image_path); 
$celdashorizontal = $width / 32;
$celdasvertical = $height / 32;
$numerocapas = 5;
?>

<html lang="en"><head></head>
<title>Editor de mapas</title>

<style type="text/css">
body {color:#000;background-color:#FFF; font-family:Arial, Helvetica, sans-serif;}

#dragger {width:100px;height:100px;border:1px solid pink;position:relative;z-index:50;padding:4px;}
.item {width:<?=$tileancho?>px;height:<?=$tilealto?>px;position:relative;float:left;margin:0px;padding:0px; float:left;}
.drag:hover{ filter:progid:DXImageTransform.Microsoft.Alpha(opacity=50); -moz-opacity: 0.5; opacity: 0.5; }
.drag {background-color:#EFE;float:left;}
.dragover {border:1px solid #900;background-color:#FEE;color:#000;}
<?
 for($x=0;$x<$celdasvertical;$x++)
	{ 
	for($y=0;$y<$celdashorizontal;$y++)
		{ 
			echo ".tilebase".$x."a".$y." {background:url(".$image_path.") -". ($y*32) ."px -". ($x*32) ."px; width: 32px; height: 32px; } 
			";
		} 
	}
?>
.tile {border:1px solid #009;background-color:#339;color:#FFF;}
p { width:10px; float:left;}
</style>
<script type="text/javascript" src="mootools.release.51.js"></script>

<script type="text/javascript">

function CambiarEstilo(id,clase) {
	var elemento = document.getElementById(id);
	elemento.className = clase;
}
function CogerEstilo(id,idelemento) {
	var elemento = document.getElementById(id);
	var clase = document.getElementById('seleccionado').className;
	CambiarEstilo(idelemento, clase);
}

function showMe (it, box) {
var vis = (box.checked) ? "block" : "none";
document.getElementById(it).style.display = vis;
}

function bordear() {
var vis = (this.checked) ? "block" : "none";
getElementByClass("item");
}

var allHTMLTags = new Array();

function getElementByClass(theClass) {
    // Creamos un array con todas las etiquetas del HTML
    var allHTMLTags=document.getElementsByTagName("*");
    // Las recorremos
    for (i=0; i<allHTMLTags.length; i++) {
        // Y comprobamos que la clase sea la adecuada
        if (allHTMLTags[i].className==theClass) {
            // Aqui ejecutamos lo que queramos a los elementos
            // que coincidan con la clase.
			if(allHTMLTags[i].style.border=='none')
				{
					allHTMLTags[i].style.border='1px solid grey';
				}
			else
				{
					allHTMLTags[i].style.border='none';
				}
        }
    }
}

  </script>
<body>

<div id="seleccionado" class="item" style="border: 3px solid; color: red; float: right;" width="32px" height="32px">&nbsp;</div>




<FORM ACTION="" style="float: right; width: 150px; height: 100px; text-align: center; vertical-align: middle;">
<?
for($i=0;$i<$numerocapas;$i++)
	{
		echo "<input checked type=\"checkbox\" name=\"c".$i."\" onclick=\"showMe('div".$i."', this)\">Capa ".$i." <br>";
	}
//		echo "<input checked type=\"checkbox\" onclick=\"bordear()\">borde <br>";
	
?>
</FORM>



<div style="overflow: auto; width: 80%; height: 350px;">
<?

	for($a=0;$a<$celdasvertical;$a++)
		{ 
		echo '<div style="width: 100%; position: relative; float: left; display: table;">';
		for($b=0;$b<$celdashorizontal;$b++)
			{ 

				echo "<div id='tilebase".$i."a".$a."a".$b."' class='drag' onClick=\"CambiarEstilo('seleccionado','item tilebase".$a."a".$b."');\" style='background:url(\"".$image_path."\") -". ($b*32) ."px -". ($a*32) ."px; width: 32px; height: 32px; float:left;'></div>";
			} 
		echo "</div>";
		}
?>
</div>

<br>
<div style="width: 100%; position: relative; float: left; display: table;">
	<?
	 for($m=0;$m<$celdasvertical;$m++)
		{ 
		for($n=0;$n<$celdashorizontal;$n++)
			{ 
				echo "<div id='tilebase".$m."a".$n."' width: 32px; height: 32px; class='drag'></div>";
			} 
		}
	?>
</div>
  <?
for($e=0;$e<$numerocapas;$e++)
{
	echo "<div id='div".$e."' style='float:left; position: absolute;'>";
    for($c=0;$c<$tilesX;$c++)
	{ 
	echo "<div style='display: table;'>";
		for($d=0;$d<$tilesY;$d++)
			{ 
				if($e==0)
					{
						echo "<div name='celdas' style='border: none;background-image: url(\"images/fondo32x32.JPG\");' id='".$e."a".$c."a".$d."' onClick=\"CogerEstilo('seleccionado','".$e."a".$c."a".$d."');\" onmousedown=\"CogerEstilo('seleccionado','".$e."a".$c."a".$d."');\" class='item'></div>";
					}
				else
					{
						echo "<div name='celdas' id='".$e."a".$c."a".$d."' onClick=\"CogerEstilo('seleccionado','".$e."a".$c."a".$d."');\" onmousedown=\"CogerEstilo('seleccionado','".$e."a".$c."a".$d."');\" class='item'></div>";
					}

			} 
	echo "</div>"; 
   } 
echo "</div>";
}
  ?>
</body>
</html>