<?php

namespace JblusItsMe\CraftPermission;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase {

  public static Config $config;

  protected function onEnable(): void {
    self::$config = new Config($this->getDataFolder() . "config.yml", Config::YAML, [
      "prefix" => "§6CraftPermission §7> §r",
      "message" => "{prefix} §cVous n'avez pas la permission de craft cet item.",
      "craft" => array(
        266 => "craft-gold-ingot",
        317 => "craft-gold-boots"
      )
    ]);
    $this->getServer()->getPluginManager()->registerEvents(new CraftListener(), $this);
  }

  public static function getConfigPlugin(): Config {
    return self::$config;
  }

}