<span class="belka">&nbsp New or not detected sensors<span class="okno">
	<table><tr>	
	<?php	
	$db = new PDO('sqlite:dbf/nettemp.db');
	$sth = $db->prepare("SELECT rom FROM sensors");
	$sth->execute();
	$result = $sth->fetchAll();
	foreach ($result as $a) { 
	$file_expl_array2[]=$a["rom"];	
	}
	
	foreach ($digitemprc as $rom_new) { ?>
	<?php 
	$trim_rom_new=trim($rom_new);
	if (!in_array($trim_rom_new, $file_expl_array2)) { ?>
   <form action="sensors" method="post">
   <?php $new_empty_array[]=$trim_rom_new; ?>
   <td><img src="media/ico/TO-220-icon.png" />&nbsp </td>
	<td><?php echo $trim_rom_new; ?></td>
	<input type="hidden" name="id_rom_new" value="<?php echo "$trim_rom_new"; ?>" > 
	<input type="hidden" name="name_new" value="nowy_czujnik" />
	<input type="hidden" name="button" value="Add to base" />
    <td><input type="image" src="media/ico/Add-icon.png"  /></td>
	</tr>    
    </form>
   <?php } 					
     	}
     	if (empty($new_empty_array)) { 
     	echo "<span class=\"brak\"><img src=\"media/ico/Sign-Stop-icon.png\" /></span>";
     	}
    
     	?>
     	</table>
<hr>
	    
     <?php 
    $sth = $db1->prepare("SELECT rom FROM sensors");
    $sth->execute();
    $result = $sth->fetchAll();
    foreach ($result as $a) { 		
	
	
    $array20[]=$a["rom"];
    }	 
    
    foreach($array20 as $rom_no){
	   if (!in_array($rom_no, $digitemprc)){ ?>
       <table>	
       <tr>
       <?php $del_empty_array[]=$rom_no; ?>
       <form action="sensors" method="post">
       <td><img src="media/ico/TO-220-icon.png" />&nbsp</td>
        <td><?php echo $rom_no;?></td>
	<input type="hidden" name="usun_nw" value="<?php echo "$rom_no"; ?>" />
	<input type="hidden" name="usun_nw2" value="usun_nw3" />
      <td><input type="image" src="media/ico/Close-2-icon.png" />
      </form></td></tr>
      
	<?php	
	}
	    }	if (empty($del_empty_array)) { echo "<span class=\"brak\"><img src=\"media/ico/Sign-Stop-icon.png\" /></span>"; }  
	    
	    ?>
	    </table>
	    </span></span>	
