<?php

namespace studioesspresso\molliemails;

use Craft;
use craft\base\Element;
use craft\base\Plugin;
use craft\mail\Message;
use craft\web\View;
use studioespresso\molliepayments\elements\Payment;
use studioespresso\molliepayments\elements\Subscription;
use studioespresso\molliepayments\events\TransactionUpdateEvent;
use studioespresso\molliepayments\MolliePayments;
use studioespresso\molliepayments\services\Transaction;
use yii\base\Event;

/**
 * Mollie Mails plugin
 *
 * @method static MollieMails getInstance()
 */
class MollieMails extends Plugin
{
    public string $schemaVersion = '1.0.0';

    public static function config(): array
    {
        return [
            'components' => [],
        ];
    }

    public function init(): void
    {
        parent::init();
        Craft::$app->onInit(function () {
            // Only register our events if Mollie Payments is enabled
            if (Craft::$app->getPlugins()->isPluginEnabled('mollie-payments')) {
                $this->attachEventHandlers();
            }
        });
    }

    private function attachEventHandlers(): void
    {
        Event::on(
            Transaction::class,
            MolliePayments::EVENT_AFTER_TRANSACTION_UPDATE,
            function (TransactionUpdateEvent $event) {
                if (get_class($event->element) === Subscription::class) {
                    //Example admin email:
                    // $this->sendEmail('inf@mydomain.com', 'new subscription created', 'path/to/your/template', $event->element);
                    // Email user email:
                    // $this->sendEmail($event->element->email, 'Thanks for subscribing', 'path/to/your/template', $event->element);

                } elseif (get_class($event->element) === Payment::class) {
                    //Example admin email:
                    // $this->sendEmail('inf@mydomain.com', 'new payment', 'path/to/your/template', $event->element);
                    // Email user email:
                    // $this->sendEmail($event->element->email, 'Thanks for your purchase', 'path/to/your/template', $event->element);                }
                }
            }
        );
    }

    private function sendEmail(string $recipient, string $subject, string $template, Element $element)
    {
        try {
            $message = new Message();
            $message->setSubject($subject);
            $message->setTo($recipient);
            $message->setHtmlBody(Craft::$app->getView()->renderTemplate($template, ['element' => $element], View::TEMPLATE_MODE_SITE));
            Craft::$app->getMailer()->send($message);
        } catch (\Throwable $e) {
            Craft::error($e->getMessage(), 'mollie-mails');
        }
    }


}
