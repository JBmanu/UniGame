class StaticFactoryObj {

    static createCntnrMathodPay() {
        return `<div class="cntnr_pay  bg_third  curve_obj_h50">
                    <strong class="title_pay  font_secondary  fg_text_accent ">Metodo Di Pagamento</strong>
                    <form class="cntnr_form_method_pay  space_top_margin_big  font_secondary  fg_text_primary" action="">
                        <label class="radio_btn_pay ">
                            <input class="circle_obj  space_bottom_margin_card  radio_circle" type="radio" id="usedItem" name="pay" value="used"/>
                            <span>MasterCard</span> 
                        </label>
                        <label class="radio_btn_pay">
                            <input class="circle_obj  space_bottom_margin_card  radio_circle" type="radio" id="newItem" name="pay" value="new" />
                            <span>PayPal</span> 
                        </label>
                        <label class="radio_btn_pay">
                            <input class="circle_obj  space_bottom_margin_card  radio_circle" type="radio" id="ps4Item" name="pay" value="ps4"/>
                            <span>Bancomat</span> 
                        </label>
                        <label class="radio_btn_pay">
                            <input class="circle_obj  space_bottom_margin_card  radio_circle" type="radio" id="ps5Item" name="pay" value="ps5" checked="checked"/>
                            <span>American Express</span> 
                        </label>
                        <input class="submit_method_pay  space_top_margin_big  curve_obj_h15  font_primary  fg_text_white" type="submit" value="Conferma"/>
                    </form>
                </div>`;
    }

}

