<?php

use Contracts\Notification;

require_once 'autoload.php';

/**
 * O código do cliente pode funcionar com qualquer classe que siga a interface Target.
 */
function clientCode(Notification $notification)
{
    $title = "Website is down!";
    $message = "
        <p>
            <strong style='color:red;font-size: 50px;'>Alert!</strong>
            Our website is not responding. Call admins and bring it up!
        </p>
    ";

    echo $notification->send($title, $message);
}

echo "Client code is designed correctly and works with email notifications:\n";
$notification = new EmailNotification("developers@example.com");
clientCode($notification);
echo "\n\n";

echo "The same client code can work with other classes via adapter:\n";
$slackApi = new SlackApi("example.com", "XXXXXXXX");
$notification = new SlackNotification($slackApi, "Example.com Developers");
clientCode($notification);

