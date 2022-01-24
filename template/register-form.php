<form action="#" method="post" class="form">
<?php if(isset($templateParams["erroreRegister"])): ?>
        <p><?php echo $templateParams["erroreRegister"]; ?></p>
    <?php endif; ?>
                <div>
                    <label for="nome">Inserire nome</label>
                    <input name="nome" id="nome" class="form_input" type="text" placeholder="Nome" required/>
                </div>
                <div>
                    <label for="cognome">Inserire cognome</label>
                    <input name="cognome" id="cognome" class="form_input" type="text" placeholder="Cognome" required/>
                </div>
                <div>
                    <label for="email">Inserire email</label>
                    <input name="email" id="email" class="form_input" type="email" placeholder="E-mail" required/>
                </div>
                <div>
                    <label for="passw">Inserire Password</label>
                    <input name="passw" id="passw" class="form_input" type="password" placeholder="Password" required/>
                </div>
                <button type="submit" name="submit" class="form_button" value="Accedi" >Accedi</button>
            </form>