<?php

namespace App\Helper;

use App\Event\EventDispatcher;

class Event
{
    /**
     * Função auxiliar para fornecer acesso global aos eventos.
     */
    public static function events(): EventDispatcher
    {
        // $eventDispatcher é um singleton
        static $eventDispatcher;

        if (!$eventDispatcher) {
            $eventDispatcher = new EventDispatcher();
        }

        return $eventDispatcher;
    }
}



