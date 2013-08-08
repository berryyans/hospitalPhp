<?php
require('/Constantes.php');
$ruta = "";
$rutaEncabezado="HOME";
function ejecutaLateral($basedatos, $usuario, $menuPrincipal, $menuSecundario, $entidad) {
    //echo 'Puebla Variables';
    $sSQLmp1a = "Select secondary From usersmodules WHERE entidad='" . $entidad . "' and usuario='" . $usuario . "' 
                and
                primario='" . $menuSecundario . "' 
                and
                extension>0 
                group by secondary    
                ";
    $resultmp1a = mysql_db_query($basedatos, $sSQLmp1a);
    return $resultmp1a;
    /*
      while ($myrowmp1a = mysql_fetch_array($resultmp1a)) {

      print '<li><a href="#">' . $myrowmp1a['secondary'] . '</a></li>';
      } */
}
?>

<ul class="sf-menu header_right">
    <li>
        <a href="?page=home" title="HOME">
            HOME
        </a>        
    </li>
    <?php
    $sSQLmp = "Select * From usersmodules WHERE (entidad='" . $entidad . "' and usuario='" . $usuario . "'
        and
        extension>0  
        )
        or
        (usuario='" . $usuario . "'
        and
        global='si'
        )
        group by main  ";
    $resultmp = mysql_db_query($basedatos, $sSQLmp);
    //$resultmp=mysql_real_escape_string($resultmp);
    while ($myrowmp = mysql_fetch_array($resultmp)) {

        //TRAES EL USUARIO, ASIGNA MODULOS; AHORA DIME LA RUTA
        if ($myrowmp['global'] == 'si') {
            $sSQLmu1 = "Select * From mainmodules WHERE name='" . $myrowmp['main'] . "'";
            $resultmu1 = mysql_db_query($basedatos, $sSQLmu1);
            $myrowmu1 = mysql_fetch_array($resultmu1);
        } else {
            $sSQLmu1 = "Select * From mainmodules WHERE entidad='" . $entidad . "' AND name='" . $myrowmp['main'] . "'";
            $resultmu1 = mysql_db_query($basedatos, $sSQLmu1);
            $myrowmu1 = mysql_fetch_array($resultmu1);
        }
$mainRuta=$myrowmu1['ruta'];
//$mainmenu = $myrowmp['main'];
############NIVEL 1############

        $sSQLmu1 = "Select * From primarymodules WHERE entidad='" . $entidad . "' AND mainmenu='" . $myrowmu1['name'] . "' 
                group by menuname
                order by mainmenu ASC";
        $resultmu1 = mysql_db_query($basedatos, $sSQLmu1);
        $numRows = mysql_num_rows($resultmu1);
        ?>

        <li <?php
        if ($numRows > 0) {
            print 'class="submenu';
            if ($numRows > 15) {
                print ' wide ';
            }
            print '"';
        }
        ?>>        
            <a href="#" title="<?php echo $myrowmp['main']; ?>">
                <?php echo $myrowmp['main']; ?>
            </a>
            <?php
            if ($myrowmp['usuario'] != NULL) {
                if ($numRows > 0) {
                    print '<ul>';
                    while ($myrowmu1 = mysql_fetch_array($resultmu1)) {
                        //$mainmodulename = $myrowmu1['menuname'];
                        print '<li><a href="?ejecutaLateral&main=' . $myrowmp['main'] . '&warehouse=' . $myrowmu1['menuname'] . '&ruta=' . $mainRuta . '" title="' . $myrowmu1['menuname'] . '"><span>' . $myrowmu1['menuname'] . '</span></a>';
                    }
                    print '</ul>';
                }
            }
            ?>
        </li>
        <?php
    }
    $arregloResult;
    if (isset($_GET['cambiarEncabezado'])) {
        $rutaEncabezado="Utilidades-Cambiar Password";
    }
    if (isset($_GET['ejecutaLateral'])) {

        if (isset($_GET['main'])) {
            $mp = $_GET['main'];
        }
        if (isset($_GET['warehouse'])) {
            $ms = $_GET['warehouse'];
        }
        if (isset($_GET['ruta'])) {
            $rutaSeparada=  split('/', $_GET['ruta']);
            $ruta=$rutaSeparada[2].'/';
            //$ruta = $_GET['ruta'];
        }

        $arregloResult = ejecutaLateral($basedatos, $usuario, $mp, $ms, $entidad);
    }
    ?>    
    <!--
        <li class="submenu">
            <a href="#" title="ADMINISTRACION">
                ADMINISTRACION
            </a>
            <ul>
                <li>
                    <a href="?page=home" title="General">
                        General
                    </a>
                </li>
                <li>
                    <a href="?page=home" title="Clientes">
                        Clientes
                    </a>
                </li>
                <li>
                    <a href="?page=home" title="Sistemas">
                        Sistemas
                    </a>
                </li>
                <li>
                    <a href="?page=home" title="Servicios">
                        Servicios
                    </a>
                </li>
                <li>
                    <a href="?page=home" title="Medicos">
                        Medicos
                    </a>
                </li>
            </ul>
        </li>
        <li class="submenu wide">
            <a href="#" title="DEPARTAMENTOS">
                DEPARTAMENTOS
            </a>
            <ul>
                <li>
                    <a href="#" title="Sala 1">
                        Sala 1
                    </a>
                </li>
                <li>
                    <a href="#" title="Endoscopia">
                        Endoscopia
                    </a>
                </li>
                <li>
                    <a href="#" title="CEYE">
                        CEYE
                    </a>
                </li>
                <li>
                    <a href="#" title="Diagnostico">
                        Diagnostico
                    </a>
                </li>
                <li>
                    <a href="#" title="Urgencias">
                        Urgencias
                    </a>
                </li>
                <li>
                    <a href="#" title="Quirofano">
                        Quirofano
                    </a>
                </li>
                <li>
                    <a href="#" title="Sala ECTN">
                        Sala ECTN
                    </a>
                </li>
                <li>
                    <a href="#" title="Farmacia">
                        Farmacia
                    </a>
                </li>
                <li>
                    <a href="#" title="Valoracion">
                        Valoracion
                    </a>
                </li>
                <li>
                    <a href="#" title="Hemodialisis">
                        Hemodialisis
                    </a>
                </li>
                <li>
                    <a href="#" title="Laboratorio">
                        Laboratorio
                    </a>
                </li>
                <li>
                    <a href="#" title="Luz y Vida">
                        Luz y Vida
                    </a>
                </li>
                <li>
                    <a href="#" title="Nefrologia">
                        Nefrologia
                    </a>
                </li>
                <li>
                    <a href="#" title="OtorrinoLaringologia">
                        OtorrinoLaringologia
                    </a>
                </li>
                <li>
                    <a href="#" title="Traumatologia">
                        Traumatologia
                    </a>
                </li>
                <li>
                    <a href="#" title="Procedimiento Cirugias">
                        Procedimiento Cirugias
                    </a>
                </li>
                <li>
                    <a href="#" title="Prequirurgico">
                        Prequirurgico
                    </a>
                </li>
                <li>
                    <a href="#" title="Parto">
                        Parto
                    </a>
                </li>
                <li>
                    <a href="#" title="FisioTerapia">
                        FisioTerapia
                    </a>
                </li>
                <li>
                    <a href="#" title="Gastro">
                        Gastro
                    </a>
                </li>
                <li>
                    <a href="#" title="Ginecologia">
                        Ginecologia
                    </a>
                </li>
            </ul>
        </li>
        <li class="submenu">
            <a href="#" title="MODULOS">
                MODULOS
            </a>
            <ul>
                <li>
                    <a href="#" title="Caja">
                        Caja
                    </a>
                </li>
                <li>
                    <a href="#" title="Compras">
                        Compras
                    </a>
                </li>
                <li>
                    <a href="#" title="Convenios">
                        Convenios
                    </a>
                </li>
                <li>
                    <a href="#" title="Facturacion">
                        Facturacion
                    </a>
                </li>
                <li>
                    <a href="#" title="Inventarios">
                        Inventarios
                    </a>
                </li>
                <li>
                    <a href="#" title="CXC">
                        CXC
                    </a>
                </li>
                <li>
                    <a href="#" title="CXP">
                        CXP
                    </a>
                </li>            
            </ul>
        </li>
        <li class="submenu">
            <a href="#" title="PACIENTES">
                PACIENTES
            </a>
            <ul>
                <li>
                    <a href="#" title="Beneficencia">
                        Beneficencia
                    </a>                
                </li>
                <li>
                    <a href="#" title="Admisiones">
                        Admisiones
                    </a>                
                </li>
                <li>
                    <a href="#" title="Archivo">
                        Archivo
                    </a>                
                </li>
                <li>
                    <a href="#" title="Consulta Externa">
                        Consulta Externa
                    </a>                
                </li>
            </ul>
        </li>
    -->
</ul>
</div>
</div>
<div class="page relative noborder">

    <div class="page_layout page_margin_top_section clearfix">
        <div class="page_left">
            <div class="sidebar_box first">

                <!--test-->
                <!--<div class="aviso_ubicacion">-->        
                <div class="aviso_ubicacion" id="aviso-encabezado">        
                    Usted esta en: <?php
                    print $rutaEncabezado;
                    ?>
                </div>
                <ul id = "menuLateral" class="accordion menu-lateral">
                    <!--
                    ##############Checar aqui para poner el bread_crumb####
                    <li>
                        <div id="accordion-nivel-uno">
                            <h3><a href = "#"> <?php print $mp . '/' . $ms; ?></a></h3>                
                        </div>
                    </li>
                    -->
                    <li>
                        <div id="accordion-nivel-uno">
                            <!--
                            <h3>Utileria</h3>
                            -->
                            <h3><a href = "#"> UTILERIA</a></h3>
                        </div>
                        <ul>
                            <li>
                                <a href = 'SEGURIDADSIMA/cambiarPassword.php?cambiarEncabezado&main='>Cambiar Password</a>
                            </li>
                            <li>
                                <a href = "SEGURIDADSIMA/pruebaMenu.php">Prueba Menu</a>
                            </li>
                        </ul>
                    </li>    
                    <?php
                    if (isset($arregloResult)) {
                        $contador = 1;
                        //echo $arregloResult;
                        while ($myrowmp1a = mysql_fetch_array($arregloResult)) {
                            $contador = $contador + 1;
                            print '<li><div id="accordion-nivel-' . $contador . '"><h3><a href="#">' . $myrowmp1a['secondary'] . '</a></h3></div>';
                            //print '<li><div id="accordion-nivel-'.$contador.'"><h3>' . $myrowmp1a['secondary'] . '</h3></div>';
                            $sSQLmpv2c = "Select * From extensionmodules WHERE entidad='" . $entidad . "'  
                and mainmodulename='" . $ms . "'
                and
                mainmodule='" . $myrowmp1a['secondary'] . "'";
                            $resultmpv2c = mysql_db_query($basedatos, $sSQLmpv2c);
                            print '<ul>';
                            while ($myrowmpv2c = mysql_fetch_array($resultmpv2c)) {
                                //print '<li><a href="' . $ruta . '' . $myrowmpv2c['ruta'] . '">' . $myrowmpv2c['name'] . '</a></li>';
                                print '<li><a href="'.CONSTANT_PATH_SIMA_RAIZ . $ruta .''.$myrowmpv2c['ruta'].'?main='.$ms.'&warehouse='.$ms.'">' . $myrowmpv2c['name'] . '</a></li>';
                            }
                            print '</ul></li>';
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>