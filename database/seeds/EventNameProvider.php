<?php

class EventNameProvider extends \Faker\Provider\Base
{

    protected static $formats = [
        '{{eventPrefix}} {{catchPhrase}}',
    ];

    protected static $namePrefix = [
        'تصوير',
        'حفل',
        'حفل إفطار',
        'حملة',
        'برنامج',
        'حملة توعوية',
        'دورة',
        'برنامج ترفيهي',
    ];

    /**
     * @example 'حملة توعوية'
     *
     * @return string
     */
    public function eventPrefix()
    {
        return static::randomElement(static::$namePrefix);
    }


    /**
     * @example 'حملة الخدمات المتخصصه'
     *
     * @return string
     */
    public function eventName()
    {
        $format = static::randomElement(static::$formats);

        return $this->generator->parse($format);
    }
}
