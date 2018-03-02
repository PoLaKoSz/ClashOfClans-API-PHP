<?php

namespace ClashApi\Helpers
{
    use \DateTime;
    use \DateTimeZone;

    class TimeConverter
    {
        public static function dateTimeConverter(string $date)
        {
            // 20180301T175029.000Z

            $date = substr( $date, 0, strpos( $date, '.000Z' ) );

            // 20180301T175029

            $date = str_replace( 'T', '', $date);

            // 20180301175029

            $year  = substr( $date, 0, 4 );
            $month = substr( $date, 4, 2 );
            $day   = substr( $date, 6, 2 );

            $hour  = substr( $date,  8, 2 );
            $min   = substr( $date, 10, 2 );
            $sec   = substr( $date, 12, 2 );

            return new DateTime($year . $month . $day . $hour . $min . $sec, new DateTimeZone('UTC'));
        }
    }
}