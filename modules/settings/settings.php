<?php
session_start();
	   include('modules/login/login_check.php');
		if ($numRows1 == 1 && ($perms == "ops" || $perms == "adm" )) { 
		
		?>
<div id="left">

<?php
    $rrd_onoff = $_POST["rrd_onoff"];
    if (($_POST['rrd_onoff1'] == "rrd_onoff2") ){
    $db = new PDO('sqlite:dbf/nettemp.db');
    $db->exec("UPDATE settings SET rrd='$rrd_onoff'") or die ($db->lastErrorMsg());
    header("location: " . $_SERVER['REQUEST_URI']);
    exit();
    }

    $hc_onoff = $_POST["hc_onoff"];
    if (($_POST['hc_onoff1'] == "hc_onoff2") ){
    $db = new PDO('sqlite:dbf/nettemp.db');
    $db->exec("UPDATE settings SET highcharts='$hc_onoff'") or die ($db->lastErrorMsg());
    header("location: " . $_SERVER['REQUEST_URI']);
    exit();
    }

    $ss_onoff = $_POST["ss_onoff"];
    if (($_POST['ss_onoff1'] == "ss_onoff2") ){
    $db = new PDO('sqlite:dbf/nettemp.db');
    $db->exec("UPDATE settings SET sms='$ss_onoff'") or die ($db->lastErrorMsg());
    header("location: " . $_SERVER['REQUEST_URI']);
    exit();
    }

    $ms_onoff = $_POST["ms_onoff"];
    if (($_POST['ms_onoff1'] == "ms_onoff2") ){
    $db = new PDO('sqlite:dbf/nettemp.db');
    $db->exec("UPDATE settings SET mail='$ms_onoff'") or die ($db->lastErrorMsg());
    header("location: " . $_SERVER['REQUEST_URI']);
    exit();
    }

?>
<?php
$db = new PDO('sqlite:dbf/nettemp.db');
$sth = $db->prepare("select * from settings ");
$sth->execute();
$result = $sth->fetchAll();
foreach ($result as $a) {
$rrd=$a["rrd"];
$hc=$a["highcharts"];
$ss=$a["sms"];
$ms=$a["mail"];

}
?>
<span class="belka">&nbsp View settings<span class="okno">

<table>
<tr>	
    <form action="settings" method="post">
    <td>RRD</td>
    <td><input type="checkbox" name="rrd_onoff" value="on" <?php echo $rrd == 'on' ? 'checked="checked"' : ''; ?> onclick="this.form.submit()" /></td>
    <input type="hidden" name="rrd_onoff1" value="rrd_onoff2" />
    </form>
</tr> 
<tr>	
    <form action="settings" method="post">
    <td>Highcharts</td>
    <td><input type="checkbox" name="hc_onoff" value="on" <?php echo $hc == 'on' ? 'checked="checked"' : ''; ?> onclick="this.form.submit()" /></td>
    <input type="hidden" name="hc_onoff1" value="hc_onoff2" />
    </form>
</tr> 


</table>


</span></span>


<span class="belka">&nbsp Notification settings<span class="okno">

<table>
<tr>	
    <form action="settings" method="post">
    <td>SMS</td>
    <td><input type="checkbox" name="ss_onoff" value="on" <?php echo $ss == 'on' ? 'checked="checked"' : ''; ?> onclick="this.form.submit()" /></td>
    <input type="hidden" name="ss_onoff1" value="ss_onoff2" />
    </form>
</tr> 
<tr>	
    <form action="settings" method="post">
    <td>Mail</td>
    <td><input type="checkbox" name="ms_onoff" value="on" <?php echo $ms == 'on' ? 'checked="checked"' : ''; ?> onclick="this.form.submit()" /></td>
    <input type="hidden" name="ms_onoff1" value="ms_onoff2" />
    </form>
</tr> 


</table>


</span></span>
</div>	 




<?php }
	 ?>
