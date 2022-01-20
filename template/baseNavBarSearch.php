<header>
    <div class="topnav" id="myTopnav">
        <a href="./index.html" class="active"> <?php echo $titleUser; ?> </a>
        <a href="../login.html"><img src="./img/menu/user.svg" alt="Login" /> Login</a>
        <a href="../listCart.html"><img src="./img/menu/carrello.svg" alt="Carrello" /> Carrello</a>
        <a href="../listWish.html"><img src="./img/menu/wishlist.svg" alt="Wishlist" /> Wishlist</a>
        <a href="../Ordini.html"><img src="./img/menu/ordini.svg" alt="Ordini" /> Ordini</a>
        <a href="../notification.html"><img src="./img/menu/notifiche.svg" alt="Notifiche" /> Notifiche</a>
        <a href="./index.html"><img src="./img/menu/logout.svg" alt="Logout" /> Logout</a>
        <a href="#" class="icon">
            <img src="./img/menu/menu.svg" alt="Menu" />
        </a>
    </div>
</header>

<nav class = "nav-rotondo">
    <ul>
        <li class="playstation">
            <a class="force_flex_center" href="./listItemPS.html">
                <img src="./img/typeGame/ps.svg" alt="Playstation" title="Playstation" />
            </a>
        </li>
        <li class="xbox">
            <a class="force_flex_center" href="./listItemXbox.html">
                <img src="./img/typeGame/xbox.svg" alt="Xbox" title="Xbox" />
            </a>
        </li>
        <li class="nintendo">
            <a class="force_flex_center" href="./listItemSwitch.html">
                <img src="./img/typeGame/nintendo.svg" alt="Nintendo" title="Nintendo" />
            </a>
        </li>
        <li class="pc">
            <a class="force_flex_center" href="./listItemPC.html">
                <img src="./img/typeGame/pc.svg" alt="PC" title="PC" />
            </a>
        </li>
    </ul>
</nav>

<section class="cntnr_search  margin_top_medium curve_obj_h50  bg_color_third">
    <input class="input_search" id="Search" type="text" placeholder="Search"/>
    <label class="label_search" for="Search">
        <img class="icon_big" src="./img/menu/search.svg" alt="search" />
    </label>
</section>
