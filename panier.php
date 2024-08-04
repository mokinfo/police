<?php 
require 'header.php';
?>

			<a href="index.php">Accueil</a>
			<a href="panier.php">Panier</a>
<?php 
$ids = array_keys($_SESSION['panier']);
//unset($_SESSION['panier'][2]);
if (empty($ids)) {
	$products = array();
}
else{
	$products = $DB->query('SELECT * FROM products WHERE id IN('.implode(',',$ids).')');
}
?>
<table>
<tr>
	<th> ID pièce </th>
	<th> Description </th>
	<th> Prix </th>
	<th> TVA </th>
	<th> Quantité </th>
	<th> Action </th>
<?php 
foreach ($products as $product):
	echo "<tr>";
	echo "<td>" . $product->id . "</td>";
	echo "<td>" . $product->name . "</td>";
	echo "<td>" . number_format($product->price,2,',',' ') . "FDJ</td>";
	echo "<td>" . number_format($product->price * 1.196,2,',',' ') . "FDJ</td>";
	echo "<td>" . $_SESSION['panier'][$product->id] . "</td>";
	?>
	<td>
		<a href="panier.php?del=<?php echo $product->id;?>">
			<img src="del.png" width="30" height="30">
		</a>
	</td>
<?php 
endforeach
?>

	Total : <?php echo number_format($panier->total(),2,',',' ');?>FDJ 
	Pièces commander : <?php echo $panier->count(); ?>