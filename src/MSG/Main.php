<?php

namespace Main;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;

class Main extends PluginBase{
	public function onEnable(){
		$this->getLogger()->info("Enabled");
	}
	public function onDisable(){
		
	}
	
	public function onCommand(CommandSender $sender, Command $command, $label, array $args){
		switch($command->getName()){
			case "message":
			case "msg": 
			if(count($args) < 2){
				$sender->sendMessage(TextFormat::RED . "Usage: " . TextFormat::RESET . "/msg <player> [message]");
				return true;
			}else{
				$name = strtolower(array_shift($args));
				$player = $sender->getServer()->getPlayer($name);
				
				if($player instanceof Player){
					$sender->sendMessage("[" .TextFormat::ORANGE . "me" . TextFormat::PURPLE . "->" . TextFormat::ORANGE . $player->getName(). TextFormat::RESET . "] " .implode(" ", $args));
					$player->sendMessage("[" .TextFormat::ORANGE .$sender-.getName(). TextFormat::PURPLE . "->" . TextFormat::ORANGE. "me" . TextFormat::RESET . "] " .implode(" ", $args));
					$this->getLogger()->info("[" . TextFormat::ORANGE . $sender->getName() . TextFormat::PURPLE . "->" . TextFormat::ORANGE . $player->getName() . TextFormat::RESET . "] " implode(" ", $args));
					return true;
				}else{
					$sender->sendMessage(TextFormat::RED . "Error: " TextFormat::RESET . "That player isn't online!");
					return true;
				}
			}
		}
	}
}
