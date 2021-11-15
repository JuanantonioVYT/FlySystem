<?php

namespace Fly;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\Config;

use Fly\Commands\FlyCommand;

class Main extends PluginBase implements Listener{


    public function onEnable(){
        $this->getLogger()->info("FlySystem Enabled successfully, plugin made by JuanantonioVYT");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getServer()->getCommandMap()->register("/fly", new FlyCommand($this));
    }

    public function onDisabled(){
        $this->getLogger()->info("FlySystem Disabled");
    }
}