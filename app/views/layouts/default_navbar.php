<?php

use system\app\App;
use app\models\user\Privilege;
use app\models\AppConfig;
?>

<nav class="shadow navbar fixed-top navbar-expand-md bg-primary navbar-dark">
    <div>


        <div class="collapse navbar-collapse" id="navbarBrandText">
            <!-- Brand -->
            <a class="navbar-brand" href="/">
                <i class="text-light fas fa-graduation-cap mr-1"></i>
                <?php echo AppConfig::getAppName(); ?>
            </a>
        </div>

        <div  data-toggle="collapse" data-target="#collapseAbbreviation">

        </div>
        <div class="" >

            <!-- Brand -->
            <a class="navbar-brand d-md-none" href="/">
                <i class="text-light fas fa-graduation-cap mr-1"></i>
                <?php echo AppConfig::getAppAbbreviation(); ?>
            </a>
        </div>
    </div>
    <?php
    if ($this->userPrivs > Privilege::UNAUTHENTICATED) {
        ?>
        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
    <?php } ?>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">






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
                        <div class="shadow dropdown-menu">


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
        <?php if ($this->userPrivs > Privilege::UNAUTHENTICATED) {
            ?>
            <div class="d-md-flex text-center flex-md-row-reverse w-100">
                <?php if ($this->userPrivs >= Privilege::TECH) {
                    ?>
                    <ul class="order-md-1 navbar-nav">
                        <!-- Settings Dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                <i class="fas fa-tools d-none d-md-inline"></i>
                                <p class="d-inline d-md-none">Settings</p>
                            </a>
                            <div class="shadow dropdown-menu dropdown-menu-right">




                                <a class="dropdown-item" href="/settings/application">Application</a>
                                <a class="dropdown-item" href="/settings/districts">District Setup</a>

                                <?php
                                $debugMode = App::get()->inDebugMode();
                                if ($debugMode) {
                                    ?>
                                    <a id="debugConfigButton" class="dropdown-item" href="#"><text data-toggle="modal" data-target="#debugConfigModal">View Config</text></a>
                                    <?php
                                }
                                ?>
                            </div>
                        </li>
                    </ul>
                    <?php
                }
                ?>
                <ul class="order-md-0 navbar-nav">
                    <!-- User Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            <i class="fas fa-user-circle d-none d-md-inline"></i>
                            <p class="d-inline d-md-none">User</p>

                        </a>
                        <div class="shadow dropdown-menu dropdown-menu-right pt-0">
                            <div class="dropdown-header bg-secondary text-light"> <?php echo $this->user->username; ?></div>

                            <a class="dropdown-item" href="/settings/profile">Profile</a>

                            <a class="dropdown-item" href="/logout">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
            <?php
        }
        ?>

    </div>
</nav>
<?php
if ($this->userPrivs > Privilege::UNAUTHENTICATED and $debugMode and $this->userPrivs == Privilege::TECH) {
    echo $this->view('modals/debugConfigModal');
}
?>







