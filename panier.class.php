<?php 
class panier{
	private $DB;
	public function __construct($DB){
		if(!isset($_SESSION)){
			session_start();
		}
		if(!isset($_SESSION['panier'])){
			$_SESSION['panier'] = array();
		}
		if(!isset($_SESSION['jack'])){
			$_SESSION['jack'] = array();
		}
		$this->DB = $DB;
		if (isset($_GET['delPanier'])) {
			$this->del($_GET['delPanier']);
		}
		if (isset($_POST['panier']['quantite'])) {
			$this->recalc();
		}
		if (isset($_POST['jack']['price'])) {
			$this->recalcul();
		}
	}
	public function recalc(){
		foreach ($_SESSION['panier'] as $piece_id	 => $quantite) {
			$qtrec = $_POST['panier']['quantite'][$piece_id];
			if (isset($qtrec)) {
				$qtverf = $this->DB->query("SELECT * FROM medoc WHERE id = '$piece_id'");
				foreach ($qtverf as  $piece) {
					$ms ="";
					if ($piece->qt < $qtrec) {
						$_SESSION['panier'][$piece_id] = 0?>
						<script type="text/javascript">
							alert("La Quantite demande est superieur a la quantite disponible !");
						</script>
						;
						<?php
					}else{
						$_SESSION['panier'][$piece_id] = $qtrec;			
					}	
				}
			}	
		}	
	}
	public function recalcul(){
		foreach ($_SESSION['jack'] as $piece_id	 => $price) {
			$qtrec = $_POST['jack']['price'][$piece_id];
			if (isset($qtrec)) {
				$qtverf = $this->DB->query("SELECT * FROM medoc WHERE id = '$piece_id'");
				foreach ($qtverf as  $piece) {
					$ms ="";
					if ($piece->rems < $qtrec) {
						$_SESSION['jack'][$piece_id] = $qtrec;/*?>
						<script type="text/javascript">
							alert("La Quantite demande est superieur a la quantite disponible !");
						</script>
						;
						<?php*/
					}else{
						?>
						<script type="text/javascript">
							alert("Le montant est inferieur au montant d'achat du système : <?php echo($piece->rems);?> FDJ");
						</script>
						;
						<?php
						//$_SESSION['jack'][$piece_id] = $qtrec;			
					}	
				}
			}	
		}	
	}
	public function count(){
		return array_sum($_SESSION['panier']);
	}
	public function total(){
		$total = 0;
		$ids = array_keys($_SESSION['panier']);
		//unset($_SESSION['panier'][2]);
		if (empty($ids)){
			$pieces = array();
		}else{
			$pieces = $this->DB->query('SELECT id, prix FROM medoc WHERE id IN('.implode(',',$ids).')');
		}
		foreach ($pieces as  $piece) {
			$total += $piece->prix * $_SESSION['panier'][$piece->id];	
		}
		return $total;
	}
	public function toteles(){
		$totel = 0;
		$ids = array_keys($_SESSION['jack']);
		//unset($_SESSION['panier'][2]);
		if (empty($ids)){
			$pieces = array();
		}else{
			$pieces = $this->DB->query('SELECT id, prix FROM medoc WHERE id IN('.implode(',',$ids).')');
		}
		foreach ($pieces as  $piece) {
			//var_dump($_SESSION['panier']);
			//var_dump($_SESSION['jack']);
			if (isset($_SESSION['panier'][$piece->id])) {
				$totel += ($_SESSION['panier'][$piece->id] * $_SESSION['jack'][$piece->id]);
			}else{
				
			}
		}
		return $totel;
	}
	public function add($piece_id){
		if (isset($_SESSION['panier'][$piece_id])) {
			$_SESSION['panier'][$piece_id]++;
		}else{
			$_SESSION['panier'][$piece_id] = 1;
		}
		if (isset($_SESSION['jack'][$piece_id])) {
			$pieces = $this->DB->query("SELECT id, prix FROM medoc WHERE id = '$piece_id'");
			foreach ($pieces as  $piece) {
				$_SESSION['jack'][$piece_id] = $piece->prix;
			}
		}else{
			$pieces = $this->DB->query("SELECT id, prix FROM medoc WHERE id = '$piece_id'");
			foreach ($pieces as  $piece) {
				$_SESSION['jack'][$piece_id] = $piece->prix;
			}
		}
	}
	public function del($piece_id){
		unset($_SESSION['panier'][$piece_id]);
		unset($_SESSION['jack'][$piece_id]);
	}
}
?>
