<?php
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'demandeConnexion';
}
$action = $_REQUEST['action'];
switch($action){
	case 'demandeConnexion':{
		include("vues/v_daf.php");
		break;
	}
	case 'valideConnexion':{
		$login = $_REQUEST['login'];
		$mdp = $_REQUEST['mdp'];
		$DAF = $pdo->getInfosDaf($login,$mdp);
		if(!is_array( $DAF)){
			ajouterErreur("Login ou mot de passe incorrect");
			include("vues/v_erreurs.php");
			include("vues/v_daf.php");
		}
		else{
			$id = $DAF['id'];
			$nom =  $DAF['nom'];
			$prenom = $DAF['prenom'];
			connecter($id,$nom,$prenom);
			include("vues/v_admin.php");
		}
		break;
	}
	default :{
		include("vues/v_daf.php");
		break;
	}
}
?>