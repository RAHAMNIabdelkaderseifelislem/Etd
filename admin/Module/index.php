<?php
    include 'functions.php';
    $pdo = pdo_connect_mysql();

    $stmt = $pdo->prepare('SELECT * FROM srms.module ORDER BY id');
    $stmt->execute();
    $contacts = $stmt->fetchAll();
    $nums_contacts = $pdo->query('SELECT COUNT(*) FROM srms.module') ->fetchColumn();
?>
<?=template_header('Etudiant')?>
<div class="topnav">
    <a href="../home.php">Administration</a>
    <a href="../student">Gerer les Etudiants</a>
    <a class="active" href="index.php">Gerer les Modules</a>
    <a href="../results">Gerer les Resultats</a>
</div>
<div class="content read">
	<h2>Liste des Modules</h2>
	<a href="create.php" class="create-contact">Ajouter un Module</a>
	<table id="mod">
        <thead>
            <tr>
                <td>#</td>
                <td>Libelle</td>
                <td>Coefecient</td>
                <td>Semestre</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $contact): ?>
            <tr>
                <td><?=$contact['id']?></td>
                <td><?=$contact['titre']?></td>
                <td><?=$contact['coeficient']?></td>
                <td><?=$contact['semseter']?></td>
                <td class="actions">
                    <a href="update.php?id=<?=$contact['id']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="delete.php?id=<?=$contact['id']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<script>
    $(document).ready( function () {
        $('#mod').DataTable();
    } );
</script>

<?=template_footer()?>