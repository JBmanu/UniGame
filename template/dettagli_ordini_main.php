<div class="circle  force_flex_center">
            <a href="./Ordini.php"><img src="../img/back/backPage.svg" alt="back"></a>
        </div>

        <main class="margin_top_big">

            <section class="cntnr_top_details  margin_bottom_medium">
                <h2 class="top_row  top_row_text" >Ordine #<?php echo $templateParams["Id_ordine"]; ?> | <?php echo $dbh->getNumProductbyIdOrdine($templateParams["Id_ordine"])[0]["NumProduct"]; ?> oggetti</h2>
                <p class="middle_row  middle_row_text_big">Consegna prevista</p>
                <section class="top_row  lower_row_text_big">
                    <img src="../img/ordini/clock.png" alt="Data" title="Data" />
                    <p><?php echo $templateParams["ordine"][0]["Data_consegna"]; ?> </p>
                </section>
            </section>

            <div class="divisore"></div>

            <section class="cntnr_top_details  margin_top_medium margin_bottom_medium">
                <h2 class="top_row  top_row_text_big">Lista Ordine</h2>
                <p class="middle_row  middle_row_text_big">Oggetti</p>

                <?php for($i = 0; $i < count($templateParams["prodotti"]); $i++): 
                        foreach($templateParams["prodotti"][$i] as $prodotto): ?>

                    <div class=" top_row  lower_row_text_big_bold">
                        <img class="game_left_img" src="<?php echo UPLOAD_DIR_DETAILS_ORDINE.$prodotto["Url_immagine"]; ?>" alt="<?php echo $prodotto["Nome"]; ?>" title="<?php echo $prodotto["Nome"]; ?>" />
                        <p class="force_flex_center"><?php echo $prodotto["Nome"]; ?></p>
                    </div>

                <?php endforeach; endfor; ?>

                <p class="top_row  lower_row_text_big_bold">Totale <?php echo $templateParams["prezzo_totale_prodotti_ordine"]; ?> €</p>
            </section>

            <div class="divisore"></div>

            <section class="cntnr_top_details  margin_top_medium  margin_bottom_medium status">
                <h2 class="top_row  top_row_text_big">Info Consegna</h2>

                <div class="lower_row  lower_row_text">
                    <div class="info_left">
                        <div class="img_cntnr  force_flex_center">
                            <img src="../img/ordini/info1.png" alt="Ordini" title="Ordini" />
                        </div>
                        <p class="force_flex_center">Ordine effettuato</p>
                    </div>
                    <div class="image_right">
                        <img src="../img/ordini/track1.png" alt="Done" title="Ordine fatto" />
                        <!-- <img src="../img/ordini/bigTick.png" alt="Done" /> -->
                    </div>
                </div>

                <div class="divisore_linea">
                    <img src="../img/ordini/line.png" alt="Line" />
                </div>

                <div class="lower_row  lower_row_text">
                    <div class="info_left">
                        <div class="img_cntnr  force_flex_center">
                            <img src="../img/ordini/info2.png" alt="Ordini" title="Ordini" />
                        </div>
                        <p class="force_flex_center">L'ordine e' in lavorazione</p>
                    </div>
                    <div class="image_right">
                        <img src="../img/ordini/track1.png" alt="Done" title="Ordine in lavorazione" />
                        <!-- <img src="../img/ordini/bigTick.png" alt="Done" /> -->
                    </div>
                </div>

                <div class="divisore_linea">
                    <img src="../img/ordini/line.png" alt="Line" />
                </div>

                <div class="lower_row  lower_row_text">
                    <div class="info_left">
                        <div class="img_cntnr  force_flex_center">
                            <img src="../img/ordini/info3.png" alt="Ordini" title="Ordini" />
                        </div>
                        <p class="force_flex_center">Il tuo ordine e' in arrivo</p>
                    </div>
                    <button type="button" class="button_tracking  circle_obj">
                        <img src="../img/ordini/truck.png" alt="Tracking" title="Tracking" /> 
                    </button> 
                </div>

                <div class="divisore_linea">
                    <img src="../img/ordini/line.png" alt="Line" />
                </div>

                <div class="lower_row  lower_row_text_bold">
                    <div class="info_left">
                        <div class="img_cntnr4  force_flex_center">
                            <img src="../img/ordini/bigTick.png" alt="Ordini" title="Ordini" />
                        </div>
                        <p class="force_flex_center">Ordine ricevuto</p>
                    </div>
                    <div class="image_right">
                        <img src="../img/ordini/track1.png" alt="Done" title="Ordine ricevuto" />
                        <!-- <img src="../img/ordini/bigTick.png" alt="Done" /> -->
                    </div>
                </div>
            </section>

            <section class="tracking_cntnr">

                <div class="tracking_content_row  main_tracking_text">
                    <div class="info_left">
                        <div class="img_tracking_cntnr force_flex_center">
                            <img src="../img/ordini/track1.png" alt="Tracking" title="Tracking" />
                        </div>
                        <p class="force_flex_center">Pacco spedito</p>
                    </div>

                    <p class="right_text"><!--06/01/2022--></p>
                </div>

                <div class="divisore_linea_tracking">
                    <img src="../img/ordini/line2.png" alt="Line" />
                </div>

                <div class="tracking_content_row  main_tracking_text">
                    <div class="info_left">
                        <div class="img_tracking_cntnr force_flex_center">
                            <img src="../img/ordini/track1.png" alt="Tracking" title="Tracking" />
                        </div>
                        <p class="force_flex_center">Pacco in transito</p>
                    </div>
                    <p class="right_text"><!--07/01/2022--></p>
                </div>

                <div class="divisore_linea_tracking">
                    <img src="../img/ordini/line2.png" alt="Line" />
                </div>

                <div class="tracking_content_row  main_tracking_text">
                    <div class="info_left">
                        <div class="img_tracking_cntnr2  force_flex_center">
                            <img src="../img/ordini/track1.png" alt="Tracking" title="Tracking" />
                        </div>
                        <p class="force_flex_center">Pacco arrivato<br/>allo stabilimento</p>
                    </div>
                    <p class="right_text"><!--10/01/2022--></p>
                </div>

                <div class="divisore_linea_tracking">
                    <img src="../img/ordini/line2.png" alt="Line" />
                </div>

                <div class="tracking_content_row  main_tracking_text">
                    <div class="info_left">
                        <div class="img_tracking_cntnr  force_flex_center">
                            <img src="../img/ordini/track3.png" alt="Tracking" title="Tracking" />
                        </div>
                        <p class="force_flex_center">In consegna</p>
                    </div>
                    <p class="right_text force_flex_center"><!--11/01/2022--></p>
                </div>

                <div class="right_text">
                    <button type="button" class="button_exit_tracking">
                        <img src="../img/ordini/exitTracking.png" alt="Go Back" title="Go Back" />
                    </button>
                </div>
            </section>
        </main>

        <?php 
            $Id_status =  $dbh->getOrderbyId($templateParams["Id_ordine"])[0]["Id_status"];
            $data_agg =  $dbh->getOrderbyId($templateParams["Id_ordine"])[0]["Data_agg_status"];
        ?>

        <script> 
            let stato = <?php echo json_encode($Id_status, JSON_HEX_TAG); ?>;
            let data = <?php echo json_encode($data_agg, JSON_HEX_TAG); ?>;
            const divs = document.querySelectorAll("section.status > div > div.image_right");
            const paragraf = document.querySelectorAll("p.right_text");
            
            if(stato<8 && stato>1){
                for(let i=0; i<2; i++){
                    let img = divs[i].children[0];
                    img.setAttribute("src", "../img/ordini/bigTick.png");
                }
                switch (stato){
                    case 4:
                        paragraf[0].innerText = data;
                        break;
                    case 5:
                        paragraf[1].innerText = data;
                        break;
                    case 6:
                        paragraf[2].innerText = data;
                        break;
                    case 7:
                        paragraf[3].innerText = data;
                        break;
                }
            }else if(stato==0 || stato==1){
                for(let i=0; i<stato; i++){
                    let img = divs[i].children[0];
                    img.setAttribute("src", "../img/ordini/bigTick.png");
                }
            }else{
                for(let i=0; i<3; i++){
                    let img = divs[i].children[0];
                    img.setAttribute("src", "../img/ordini/bigTick.png");
                }
                    paragraf[3].innerText = data;
            }               
        </script>