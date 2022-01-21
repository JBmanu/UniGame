<label class="radio_btn_card " for="<?php echo $item["Nome"]; ?>usedItem">
    <input class="circle_obj  radio_circle_card" type="radio" id="<?php echo $item["Nome"]; ?>usedItem" name="used" value="used"/>
    <span>Usato</span> 
</label>
<label class="radio_btn_card " for="<?php echo $item["Nome"]; ?>newItem">
    <input class="circle_obj  radio_circle_card" type="radio" id="<?php echo $item["Nome"]; ?>newItem" name="used" value="new" checked="checked" />
    <span>Nuovo</span> 
</label>
<label class="radio_btn_card " for="<?php echo $item["Nome"]; ?>ps4Item">
    <input class="circle_obj  radio_circle_card" type="radio" id="<?php echo $item["Nome"]; ?>ps4Item" name="ps" value="ps4"/>
    <span>PS4</span> 
</label>
<label class="radio_btn_card" for="<?php echo $item["Nome"]; ?>ps5Item">
    <input class="circle_obj  radio_circle_card" type="radio" id="<?php echo $item["Nome"]; ?>ps5Item" name="ps" value="ps5" checked="checked"/>
    <span>PS5</span> 
</label>
