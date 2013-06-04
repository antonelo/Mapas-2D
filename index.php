<html lang="en">
<head></head>
<title>Editor mapas</title>

<body>
  <h1>Editor mapas</h1>

 <FORM action="mapa.php" method="post">
    <P>
    <LABEL for="email">Nombre Mapa: </LABEL>
              <INPUT type="text" id="nombre" name="nombre"><BR>
    <LABEL for="firstname">TilesX: </LABEL>
              <INPUT type="text" id="tilesX" name="tilesX" value="20"><BR>
    <LABEL for="lastname">TilesY: </LABEL>
              <INPUT type="text" id="tilesY" name="tilesY" value="20"><BR>
    <LABEL for="firstname">Tile Ancho: </LABEL>
              <INPUT type="text" id="tileancho" name="tileancho" value="32"><BR>
    <LABEL for="lastname">Tile Alto: </LABEL>
              <INPUT type="text" id="tilealto" name="tilealto"  value="32"><BR>
    <LABEL for="lastname">Paleta de Tiles: </LABEL>
			<SELECT NAME="paleta" SIZE="1"> 
				<OPTION VALUE="1">Star Wars</OPTION> 
				<OPTION VALUE="2">Rpg Maker</OPTION> 
				<OPTION VALUE="3">Zelda</OPTION> 
			</SELECT>
    <INPUT type="submit" value="Send"> <INPUT type="reset">
    </P>
 </FORM>
</body>
</html>