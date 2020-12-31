<?php
/**
 * PHP version 7.3
 *
 * @category TimezoneDeserializeSubscriber
 * @package  RetailCrm\Component\JMS\EventSubscriber
 */

namespace RetailCrm\Component\JMS\EventSubscriber;

use DateTime;
use DateTimeInterface;
use DateTimeZone;
use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\ObjectEvent;

/**
 * Class TimezoneDeserializeSubscriber
 *
 * @category TimezoneDeserializeSubscriber
 * @package  RetailCrm\Component\JMS\EventSubscriber
 */
class TimezoneDeserializeSubscriber implements EventSubscriberInterface
{
    private const RFC3339_WITHOUT_TZ = 'Y-m-d\TH:i:s';

    /**
     * @inheritDoc
     */
    public static function getSubscribedEvents(): array
    {
        return [[
            'event' => 'serializer.post_deserialize',
            'method' => 'onPostDeserialize',
        ]];
    }

    public function onPostDeserialize(ObjectEvent $event): void
    {
        $object = $event->getObject();

        foreach (get_object_vars($object) as $property => $value) {
            if ($value instanceof DateTimeInterface
                && $value->getTimezone()->getName() === 'UTC'
            ) {
                $object->$property = DateTime::createFromFormat(
                    self::RFC3339_WITHOUT_TZ,
                    $value->format(self::RFC3339_WITHOUT_TZ),
                    new DateTimeZone('PST')
                );
            }
        }
    }
}
