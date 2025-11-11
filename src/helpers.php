<?php

use Abitbt\TablerBlade\TablerMenu\TablerMenu;

if (! function_exists('tabler_menu')) {
    /**
     * Create a new menu builder instance or retrieve a processed menu array from config.
     */
    function tabler_menu(?string $config = null): TablerMenu|array
    {
        if ($config !== null) {
            return TablerMenu::fromConfig($config);
        }

        return TablerMenu::make();
    }
}
