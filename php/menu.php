<?php
    function print_menu($i){

      echo '
        <div id="navigation-menu">
                    <div >
                        <div style:"padding-left: 2cm;">
                            <div id="navigation-menu-logo">
                                <ul id="nav">';
            if($i == 1)
                echo '<li id="current">';
            else
                echo '<li>';
            echo '
                                    <a href="stores.php">Poslovnice</a></li>';
            if($i == 2)
                echo '<li id="current">';
            else
                echo '<li>';
            echo '
                                    <a href="create_discount.php">Kreiraj popust</a></li>';
            if($i == 3)
                echo '<li id="current">';
            else
                echo '<li>';
            echo '
                                    <a href="create_store.php">Kreiraj poslovnicu</a></li>';

        echo '
                                </ul>
                            </div>
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                </div>
                ';
    }
?>
