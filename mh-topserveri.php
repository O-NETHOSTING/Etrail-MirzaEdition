<?php
session_start();
include("includes.php");
$naslov = "eWest TOP";
$fajl = "gp";
$return = "gp.php";
$ucp = "mh-topserveri";


if(!isset($_SESSION['klijentid'])){
	header("Location: process.php?task=logout");
	die();
}

require("./includes/libs/lgsl/lgsl_class.php");

$sql = "SELECT * FROM `serveri` where startovan = '1' ORDER BY `rank` ASC LIMIT 15";
$serveri = mysql_query($sql);

include("./assets/header.php");
?>
   <div class="main-other">
        <div class="panel">

            <div class="panel-main-other">
                <div class="panel-padding">
                    <div class="panel-title">
                        <h4 class="c-red"><i class="icon-th"></i> TOP SERVERI</h4>
                        <p>Ovdje se nalaze top serveri na našem hostingu</p>
                        <?php if(mysql_num_rows($serveri) == 0) echo'<h3>'.$jezik['text585'].'</h3>'; ?>
                    </div>


<div class="user-files"> 
	<div class="user-server-single">
	<table>
		<tr>
			<th><?php echo $jezik['text604']; ?></th>
			<th><?php echo $jezik['text204']; ?></th>
			<th><?php echo $jezik['text398']; ?></th>
			<th><?php echo $jezik['text413']; ?></th>
		</tr>
<?php
	require("./includes/libs/lgsl/lgsl_class.php");
	if(mysql_num_rows($serveri) == 0) echo '<tr><td colspan="7">'.$jezik['text414'].'</td></tr>';
	while($row = mysql_fetch_array($serveri))
	{

		$box = query_fetch_assoc("SELECT `name` FROM `box` WHERE `boxid` = '".$row['box_id']."'");
		$boxip = query_fetch_assoc("SELECT * FROM `boxip` WHERE `ipid` = '".$row['ip_id']."'");

		if($row['igra'] == "1") $querytype = "halflife";
		else if($row['igra'] == "2") $querytype = "samp";
		else if($row['igra'] == "3") $querytype = "minecraft";
		else if($row['igra'] == "4") $querytype = "samp";
		else if($row['igra'] == "5") $querytype = "mta";

		if($row['startovan'] == "1")
		{
			if($row['igra'] == "5") $serverl = lgsl_query_live($querytype, $boxip['ip'], NULL, $row['port']+123, NULL, 's');
			else $serverl = lgsl_query_live($querytype, $boxip['ip'], NULL, $row['port'], NULL, 's');

			$srvime = @$serverl['s']['name'];
			$srvigraci = @$serverl['s']['players'].'/'.@$serverl['s']['playersmax'];
		}	
?>
		<tr>
			<td>#<?php echo $row['rank']; ?></td>			
			<td><?php echo igra_no_name($row['igra']); ?> <a href="server.php?id=<?php echo $row['id']; ?>"><?php if($srvime == "")echo "eWest-hosting.info"; else echo $srvime; ?></a></td>
			<td><?php echo $srvigraci; ?></td>
			<td><?php echo srv_status($row['status']); ?></td>
		</tr>

<?php
	}
?>
	</table>
</div> </div></div></div></div></div>

<?php
include("./assets/footer.php");
?>
