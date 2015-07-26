<?php

/*
 * This page will create cascade widget, so it's needed to include the file funcion
 */
require_once("cascade_widget.php");

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <title>Extract</title>
    <style>
      .inputcontainer {
        position: relative;
        width: 100%;
      }
      #uri {
        width: 100%;
        box-sizing: border-box;
      }
    </style>
    <script language="javascript" src="cascade_widget.js"></script>
  </head>

  <body>
  
    <h1>Extract</h1>

    <form action="extract_core.php" method="get">
    
    <?php cascade_widget('Título aqui'); ?>
    
    <?php cascade_widget('Meu cascade para bosy'); ?>

    <div class="inputcontainer">
        <label for="id_value">Div ID</label><br />
        <input name="id_value" id="id_value" type="text" value="texto" />
    </div>
    
    <div class="inputcontainer">
        <label for="id_title_value">Title ID</label><br />
        <input name="id_title_value" id="id_title_value" type="text" value="pg-color10" />
    </div>

    <div class="inputcontainer">
      <label for="file_name">File Name</label><br />
      <input name="file_name" id="file_name" type="text" value="extract.txt" />
    </div>

    <div class="inputcontainer">
      <label for="uri">URI:</label>
      <input name="uri" id="uri" type="text" value="http://blogdosakamoto.blogosfera.uol.com.br/2015/06/28/como-sera-o-dia-seguinte-a-reducao-da-maioridade-penal/" />
    </div>
	
	<div class="inputcontainer">
      <label for="uri">Folder to save:</label>
	  <br />
      <input name="folder" id="folder" type="file" webkitdirectory directory multiple />
    </div>

    <div class="inputcontainer">
        <input type="submit" value="Submit" />
    </div>

	</form>
	
  </body>
</html>		
