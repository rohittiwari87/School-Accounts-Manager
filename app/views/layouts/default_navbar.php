<nav class="navbar navbar-expand-md bg-primary navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="/">School Accounts Manager</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">




        <?php if ($this->userPrivs > \app\models\user\Privilege::UNAUTHENTICATED) {
            ?>
            <ul class="navbar-nav  align-right">
                <!-- Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        <img style="height:2em;" class="mr-1" src="/img/user_avatar.png"/>Username
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="#">Settings</a>
                        <?php if (app\App::get()->inDebugMode() and $this->userPrivs == \app\models\user\Privilege::TECH) {
                            ?>
                            <a class="dropdown-item" href="#"><text data-toggle="modal" data-target="#debugConfigModal">View Config</text></a>
                            <?php
                        }
                        ?>
                        <a class="dropdown-item" href="#">Logout</a>
                    </div>
                </li>
            </ul>
            <?php
        }
        ?>

        <ul class="navbar-nav">

            <?php
            //var_dump($this);
            if (isset($this->items) and $this->items != null) {
                foreach ($this->items as $topItem) {
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            <?php echo $topItem->displayText; ?>
                        </a>
                        <div class="dropdown-menu">


                            <?php
                            foreach ($topItem->subItems as $subItem) {
                                ?>
                                <a class="dropdown-item" href="<?php echo $subItem->targetURL; ?>"><?php echo $subItem->displayText; ?></a>



                                <?php
                            }
                            ?>

                        </div>
                    </li>



                    <?php
                }
            }
            ?>

        </ul>

    </div>
</nav>
<?php
if (app\App::get()->inDebugMode() and $this->userPrivs == \app\models\user\Privilege::TECH) {
    echo $this->view('modals/debugConfigModal');
}
?>







