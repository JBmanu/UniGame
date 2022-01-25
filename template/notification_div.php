<div class="div-notifiche">
    <?php if(isset($templateParams["erroreNotifica"])): ?>
        <h3 class="force_flex_center"><?php echo $templateParams["erroreNotifica"]; ?></h3>
    <?php else: ?>
        <?php foreach($templateParams["notifiche"] as $notifica): ?>
            <div class="notifica">
                <h2 class="status-notifica">Ordine #<?php echo $notifica["Id_ordine"];?> <?php echo $dbh->getNotifybyID($notifica["Id_notifica"])[0]["Testo"];?> </h2>
                <p class="clicca-visualizza-notifica"><a href="./dettagliOrdini.php?Id_ordine=<?php echo $notifica["Id_ordine"]; ?>">Clicca qui</a> per visualizzarlo</p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>