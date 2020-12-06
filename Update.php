<!DOCTYPE html>
<html>
<head>
    <title>Update</title>
    <meta charset='utf-8' />
    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="bingo.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>

<body>
    <?php 
        
         $bdd= new PDO("mysql:host=localhost; dbname=gestionstock", 'root', '');
		if (isset($_POST['nom']) AND isset($_POST['quantite']) AND isset($_POST['fabriquant']))
		{
			$nom= htmlspecialchars($_POST['nom']);
			$quantite= htmlspecialchars($_POST['quantite']);
			$fabriquant= htmlspecialchars($_POST['fabriquant']);
		
			$row	=$bdd->prepare("SELECT * FROM produit WHERE nom=? AND Quantite=? AND Fabriquant=?");
			$row->execute(array($nom, $quantite, $fabriquant));
	
	if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
		extract($_REQUEST);
		if($username==""){
			header('location:'.$_SERVER['PHP_SELF'].'?msg=un&editid='.$_REQUEST['editId']);
			exit;
		}elseif($useremail==""){
			header('location:'.$_SERVER['PHP_SELF'].'?msg=ue&editid='.$_REQUEST['editid']);
			exit;
		}elseif($userphone==""){
			header('location:'.$_SERVER['PHP_SELF'].'?msg=up&editid='.$_REQUEST['editid']);
			exit;
		}
		$data	=	array(
			'username'=>$username,
			'useremail'=>$useremail,
			'userphone'=>$userphone,
			);
		$update	=	$db->update('produit',$data,array('id'=>$editid));
		if($update){
		header('location: browse-users.php?msg=ras');
		exit;
		}else{
		header('location: browse-users.php?msg=rna');
		exit;
}
}
}
?>



    <h1 align="center"> PHP_CRUD Gestion de stock </h1>
    <div class="card" align="center">
			<div class="card-header"><i class="fa fa-fw fa-plus-circle"></i> <strong>Add User</strong> <a href="action.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i> Page d'acceuil</a></div>
			<div class="card-body">
			<?php
		if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="un"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User name is mandatory field!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ue"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User email is mandatory field!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="up"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User phone is mandatory field!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){
			echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';
		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){
			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';
		}
		?>
				
				<div class="col-sm-6">
					<h5 class="card-title">Les champs<span class="text-danger">*</span> sont obligatoires!</h5>
					<form method="post">
						<div class="form-group">
							<label>Nom du produit <span class="text-danger">*</span></label>
							<input type="text" name="nom" id="productname" class="form-control" value="<?php echo $row[0]['nom']; ?>" placeholder="Nom du produit" required>
						</div>
						<div class="form-group">
							<label>Quantité <span class="text-danger">*</span></label>
							<input type="number" name="quantite" id="Quantite" class="form-control" value="<?php echo $row[0]['Quantite']; ?>" placeholder="Quantité de produit" required>
						</div>
						<div class="form-group">
							<label>Fabriquant <span class="text-danger">*</span></label>
							<input type="text" name="fabriquant" id="Fabriquant" maxlength="12" class="form-control" value="<?php echo $row[0]['Fabriquant']; ?>" placeholder="Fabriquant" required>
						</div>
						<div class="form-group">
							<input type="hidden" name="editid" id="editid">
							<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> Update User</button>
						</div>
					</form>
				</div>
			</div>
		</div>
    </body>
    </html>