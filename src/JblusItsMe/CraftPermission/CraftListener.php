<?php

namespace JblusItsMe\CraftPermission;

use pocketmine\event\inventory\CraftItemEvent;
use pocketmine\event\Listener;

class CraftListener implements Listener {

  public function craftPermission(CraftItemEvent $event) {
    $sender = $event->getPlayer();
    $craft = $event->getOutputs();
    foreach($craft as $crafts) {
      foreach(Main::getConfigPlugin()->get("craft") as $id => $perms) {
        if($crafts->getId() === $id) {
          if(!$sender->hasPermission($perms)) {
            $event->cancel();;
            $sender->sendMessage(str_replace(
              array("{prefix}"),
              array(Main::getConfigPlugin()->get("prefix")),
              Main::getConfigPlugin()->get("message")
            ));
          }
        }
      }
    }
  }

}