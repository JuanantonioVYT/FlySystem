<?php

namespace Fly\Commands;

use Fly\Main;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\TextFormat as MG;
use pocketmine\utils\Config;

class FlyCommand extends Command
{
    public function __construct()
    {
        parent::__construct("fly", "Enable/Disable flying!");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if($sender instanceof Player) {
            if (!$sender->hasPermission("fly.cmd.use")) {
                $sender->sendMessage(MG::WHITE . "[" . MG::BLUE . "FlySystem" . MG::WHITE . "]" . MG::RED . "You don't have the permission to run this command!");
                return;
            }
            if($sender->getAllowFlight()) {
                $sender->setAllowFlight(false);
                $sender->setFlying(false);
                $sender->sendMessage(MG::WHITE . "[" . MG::BLUE . "FlySystem" . MG::WHITE . "]" . MG::RED . "Fly Disabled Successfully!");
            }else{
                $sender->setAllowFlight(true);
                $sender->sendMessage(MG::WHITE . "[" . MG::BLUE . "FlySystem" . MG::WHITE . "]" . MG::GREEN . "Fly enabled Successfully!");
            }
            return;
        }
        $sender->sendMessage(TextFormat::RED . "Run this command ingame!");
    }
}