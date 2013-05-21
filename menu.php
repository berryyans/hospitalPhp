<ul class="sf-menu header_right">
	
    
<li<?php echo ($_GET["page"]=="contact" ? " class='selected'" : ""); ?>>
		<a href="?page=contact" title="Inicio">
			Inicio
		</a>
	</li>    
    
    <?php
//LEVEL 1
$sSQLmp= "Select * From usersmodules WHERE (entidad='".$entidad."' and usuario='".$usuario."'
    and
extension>0  
)
or
(usuario='".$usuario."'
    and
    global='si'
)
group by main  ";
$resultmp=mysql_db_query($basedatos,$sSQLmp);
while($myrowmp = mysql_fetch_array($resultmp)){

    echo '<li  class="submenu">';    //abre principal
    echo '<a href="#" title="'. strtolower($myrowmp['main']).'">';
    echo strtolower($myrowmp['main']);
    echo '</a>';
    echo '<ul>';?>
			
    
    
    
    
    
<?php $sSQLmp1= "Select * From usersmodules WHERE (entidad='".$entidad."' and usuario='".$usuario."' and main='".$myrowmp['main']."'
    and
extension>0)
or
(

 usuario='".$usuario."' and main='".$myrowmp['main']."' and global='si'

)
group by primario order by primario ASC ";
$resultmp1=mysql_db_query($basedatos,$sSQLmp1);

while($myrowmp1 = mysql_fetch_array($resultmp1)){ //while level 2?>    
                        <li<?php echo ($_GET["page"]==$myrowmp1['primario'] ? " class='selected'" : ""); ?>>
				<a href="?page=<?php echo $myrowmp1['primario'];?>" title="<?php echo $myrowmp1['primario'];?>">
					<?php echo strtolower($myrowmp1['primario']);?>
				</a>
                        
                            
                            
                            
                            
                            
                            
			</li>
<?php }?>                        
                              
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
			
<?php		echo '</ul>';
    echo '</li>';
}
 ?>   
    
    
    
	<li<?php echo ($_GET["page"]=="contact" ? " class='selected'" : ""); ?>>
		<a href="?page=contact" title="CONTACT">
			Contacto
		</a>
	</li>
</ul>    
    
    
    





























    
    
    
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
$sSQLmpv2= "Select * From extensionmodules WHERE keyEM='".$myrowmp1['extension']."'";
$resultmpv2=mysql_db_query($basedatos,$sSQLmpv2);
while($myrowmpv2 = mysql_fetch_array($resultmpv2)){    
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
				<a href=<?php echo $myrowmpv2a['ruta'];?>?page=<?php echo $myrowmpv2a['name'];?>" title="<?php echo $myrowmpv2a['name'];?>">
					<?php echo $myrowmpv2a['name'];?>
				</a>
			</li>
                       
			
		
	
        <?php }}?>
                        </ul>
        </li>
        </ul>   
<?php
}
?>  
  