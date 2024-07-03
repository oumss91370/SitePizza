
  <p><?php echo $_GET['montantPaiement'];?> euros</p>

<main>
<link rel="stylesheet"  href="css/formulairePaiement.css">
    <form action="index.php" method="get">
        <input type="hidden" name="objet" value="Paiement">
        <input type="hidden" name="action" value="createPaiement">
        <!-- Champ caché pour conserver le montantPaiement dans l'URL -->
        <input type="hidden" name="montantPaiement" value="<?php echo htmlspecialchars($_GET['montantPaiement']); ?>">

        <div>
            <label for="modePaiement">mode de paiement</label>
            <input type="text" name="modePaiement" placeholder="mode de paiement" required>
        </div>
        <div>
            <label for="numeroCarte">numéro de carte</label>
            <input type="text" name="numeroCarte" placeholder="numéro de carte" required>
        </div>
        <div>
            <label for="numeroCarte">cryptogrammee</label>
            <input type="text" name="numeroCarte" placeholder="cryptogramme" required>
        </div>
        <div>
            <label for="numeroCarte">date de peremption</label>
            <input type="text" name="numeroCarte" placeholder="date de peremption" required>
        </div>

        <button type="submit">créer</button>
    </form>
</main>
