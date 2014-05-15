<?php

namespace hubapi\pocketmine;

use hubapi\Minigame;

use pocketmine\plugin\PluginBase;

class Main extends PluginBase{
	const NAME = "HubAPI";
	private $mgs;
	public function onEnable(){ // @shoghicp @$#%$(?:-(??:"*&+!!&"&#$+)&$#
		$this->mgs = array();
		$this->getLogger()->log("Waiting for minigames to register to HubAPI");
		@mkdir($this->getDataFolder());
		@mkdir($this->mgFolder = $this->getDataFolder()."mgs/");
		@mkdir($this->pFolder = $this->getDataFolder()."players/");
		$this->getServer()->getScheduler()->scheduleDelayedTask($this, 5);
	}
	public function onRun($t){
		$config = array();
		foreach($this->mgs as $name => $mg){
			$this->getLogger()->log("Loading minigame $name.");
			$config["minigames"][$name] = $mf->getConfig();
		}
		$this->config = new Config($this->getDataFolder()."config.json", $config);
	}
	public function register(Minigame $mg){
		$this->mgs[$mg->getName()] = $mg;
		return true;
	}
}
