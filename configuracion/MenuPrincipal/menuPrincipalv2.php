
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <style>
        
        ul.tabs {list-style:none; width:1500px;}
ul.tabs li:first-child {border-left:1px solid #ccc;}
ul.tabs li {float:left; border-right:1px solid #ccc; border-top:1px solid #ccc; }
ul.tabs li.active {border-bottom:1px solid #fff;  margin-bottom:-1px;}
ul.tabs li a {display:block; padding:5px 10px; color:#777; letter-spacing:-1px; outline:none; text-decoration:none; font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;}
ul.tabs li.active a {font-weight:600; color:#000;}
div.tabs_content {width:500px; border:1px solid #ccc;}
div.tabs_content div {padding:20px; display:none;}
 
	.capa1 {width: 100%; height: 200px; clear: both; }
	.capa2 {width: 10%; height: 200px; float: left;}
	.capa3 {width: 70%; height: 200px; float: left; }
        .capa3a {width: 100%; height: 200px; clear: both; }
	.capa4 {width: 100%; height: 50px; clear: both; }
	.contenido {padding: 10px;}
	</style>

</head>
<body>

<div class='capa1'>
<div class='contenido'>
    
<?php require_once('header.php');?>   
    
</div>
</div>

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
<div class='capa2'>
<div class='contenido'><?php //title;?></div>
 <div>
    <ol class='romanos'>
<?php

$sSQLmp1= "Select * From usersmodules WHERE entidad='".$entidad."' and usuario='".$usuario."' 

   
and primario='".$_GET['page']."' 
        and
extension>0 
group by secondary    
order by secondary desc
";
$resultmp1=mysql_db_query($basedatos,$sSQLmp1);
while($myrowmp1 = mysql_fetch_array($resultmp1)){?>
  <ul  class="sf-menu">



<?php 
/*
$sSQLmpv2= "Select * From extensionmodules WHERE keyEM='".$myrowmp1['extension']."'";
$resultmpv2=mysql_db_query($basedatos,$sSQLmpv2);
while($myrowmpv2 = mysql_fetch_array($resultmpv2)){    
//*PREFIX

$sSQLmp2= "Select prefix From modulosSecundarios where 
codigoModuloRaiz='".$myrowmp1['primario']."'    

";
$resultmp2=mysql_db_query($basedatos,$sSQLmp2);
$myrowmp2 = mysql_fetch_array($resultmp2);
$prefix=$myrowmp2['prefix'];
///        
    ?>
    

      
<li class="submenu<?php echo ($_GET["page"]=="gallery_2_columns" || $_GET["page"]=="gallery_3_columns" || $_GET["page"]=="gallery_4_columns" || $_GET["page"]=="gallery_with_sidebar" ? " selected" : ""); ?>">
		<a href="#" title="Gallery">
			<?php echo strtolower($myrowmp1['secondary']);?>
		</a>
		
    
       <ul style="margin-left: -100px;">
    <?php 
    
 $sSQLmpv2a= "Select * From extensionmodules WHERE entidad='".$entidad."' and 
 mainmodulename='".$myrowmpv2['mainmodulename']."'
     and
mainmodule='".$myrowmpv2['mainmodule']."'";
$resultmpv2a=mysql_db_query($basedatos,$sSQLmpv2a);
while($myrowmpv2a = mysql_fetch_array($resultmpv2a)){    
    ?>
 
			<li<?php echo ($_GET["page"]==$myrowmpv2a['name'] ? " class='selected'" : ""); ?>>
				<a href="<?php echo $prefix.$myrowmpv2a['ruta'];?>?page=<?php echo $myrowmpv2a['mainmodule'];?>&warehouse=<?php echo $_GET['page'];?>" title="<?php echo $myrowmpv2a['name'];?>">
					<?php echo $myrowmpv2a['name'];?>
				</a>
			</li>
                       
			
		
	
        <?php 
 */ 
 
  ?>
 
                        </ul>
        </li>
        </ul>   
<?php
}
?>  
        
        
        
        <style>
            
#button {
	width: 12em;
	border-right: 1px solid #000;
	padding: 0 0 1em 0;
	margin-bottom: 1em;
	font-family: 'Trebuchet MS', 'Lucida Grande', Verdana, Arial, sans-serif;
	background-color: #90bade;
	color: #333;
}

#button ul {
	list-style: none;
	margin: 0;
	padding: 0;
	border: none;
}
	
#button li {
	border-bottom: 1px solid #90bade;
	margin: 0;
	list-style: none;
	list-style-image: none;
}
	
#button li a {
	display: block;
	padding: 5px 5px 5px 0.5em;
	border-left: 10px solid #1958b7;
	border-right: 10px solid #508fc4;
	background-color: #2175bc;
	color: #fff;
	text-decoration: none;
	width: 100%;
}

html>body #button li a {
	width: auto;
}

#button li a:hover {
	border-left: 10px solid #1c64d1;
	border-right: 10px solid #5ba3e0;
	background-color: #2586d7;
	color: #fff;
}            
            
        </style>  
        
        
        

    </ol>
    </div>














<div id="value">
  <ul>
<?php 
 $sSQLmpv2c= "Select * From extensionmodules WHERE entidad='".$entidad."' and 
 mainmodulename='".$_GET['page']."'
     group by mainmodule
     ";
$resultmpv2c=mysql_db_query($basedatos,$sSQLmpv2c);
while($myrowmpv2c = mysql_fetch_array($resultmpv2c)){    
    ?>              
  <li><a href="<?php echo $_SERVER['php_self'];?>?page=<?php echo $_GET['page'];?>&mainmodule=<?php echo $myrowmpv2c['mainmodule'];?>&keyEM=<?php echo $myrowmpv2c['keyEM'];?>" >
        <?php echo strtolower($myrowmpv2c['mainmodule']);?></a></li>
    
    <?php } ?>

  </ul>
</div>


</div>

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    <style>
 #tabsF {
      float:left;
      width:100%;
      
      font-size:93%;
      line-height:normal;
	  border-bottom:1px solid #666;
}
#tabsF ul {
	margin:0;
	padding:10px 10px 0 50px;
	list-style:none;
}
#tabsF li {
      display:inline;
      margin:0;
      padding:0;
      }
#tabsF a {
      float:left;
      background:url("/sima/images/tableftF.gif") no-repeat left top;
      margin:0;
      padding:0 0 0 4px;
      text-decoration:none;
}
#tabsF a span {
      float:left;
      display:block;
      background:url("/sima/images/tabrightF.gif") no-repeat right top;
      padding:5px 15px 4px 6px;
      
}
/* Commented Backslash Hack hides rule from IE5-Mac \*/
#tabsF a span {float:none;}
/* End IE5-Mac hack */
#tabsF a:hover span {
      color:#FFF;
}
#tabsF a:hover {
      background-position:0% -42px;
}
#tabsF a:hover span {
      background-position:100% -42px;
}
    </style>    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
<div class='capa3'>
    
    
    <div id="tabsF">
 <ul>
<?php 
 $sSQLmpv2d= "Select * From extensionmodules WHERE 
 mainmodulename='".$_GET['page']."'
     and
     mainmodule='".$_GET['mainmodule']."'
   group by name
     ";
$resultmpv2d=mysql_db_query($basedatos,$sSQLmpv2d);
while($myrowmpv2d = mysql_fetch_array($resultmpv2d)){    
    ?>       
  <li><a href="<?php echo $_SERVER['php_self'];?>?page=<?php echo $_GET['page'];?>&mainmodule=<?php echo $_GET['mainmodule']?>&keyEM=<?php echo $myrowmpv2d['keyEM']?>" title="<?php echo  $myrowmpv2d['name'];?>">
          <span><?php echo  strtolower($myrowmpv2d['name']);?></span></a></li>
  <?php }?>  
 </ul>
</div>
    
    
      
  
    


    
    
   
    
    

</div>
</div>
    
    
    
    
    
    
    
    
    
    
 <div class='capa3a'>
<?php 
echo $sSQLmpv2e= "Select * From extensionmodules WHERE keyEM='".$_GET['keyEM']."'
   
     ";
$resultmpv2e=mysql_db_query($basedatos,$sSQLmpv2e);
$myrowmpv2e = mysql_fetch_array($resultmpv2e);  
include($myrowmpv2e['ruta']);
    ?>  
 </div>
    
    
    
    
    
    

<div class='capa4'>
<div class='contenido'>
    
<?php require_once('footer.php');    ?>
</div>
</div>

</body>
</html>