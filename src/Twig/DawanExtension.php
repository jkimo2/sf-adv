<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\Extension\GlobalsInterface;
use Twig\TwigFilter;
use Twig\TwigFunction;

class DawanExtension extends AbstractExtension implements GlobalsInterface
{
    private const BEFORE = 'before', AFTER = 'after';
    private const FORMAT = [
        'fr' => ['decimals' => 2, 'decPoint' => ',', 'sep' => ' ', 'position' => self::AFTER],
        'de' => ['decimals' => 2, 'decPoint' => '.', 'sep' => ',', 'position' => self::AFTER],
        'us' => ['decimals' => 2, 'decPoint' => '.', 'sep' => ',', 'position' => self::BEFORE],
    ];

    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/2.x/advanced.html#automatic-escaping
            new TwigFilter('currency', [$this, 'currency']),
        ];
    }

    public function getFunctions(): array
    {
        return [
           new TwigFunction('malade_du', [$this, 'malade']),  // a commenter sinon ca va nous embeter
        ];
    }

    public function currency($number, $code = 'us', $symbol = '$')
    {
        if(!array_key_exists($code, self::FORMAT)){   //test si le code est parmi ceux prévu sinon on prend le us
            $code = 'us';
        }
        list('decimals' => $decimal, 'decPoint' => $point, 'sep' => $sep, 'position' => $position) = self::FORMAT[$code];
        $price = number_format($number,$decimal,$point,$sep);

        if( self::AFTER === $position){
            $price .= ' '. html_entity_decode($symbol); //pour utiliser des code html '&euro;' (= €)
        }
        else {

            $price = html_entity_decode($symbol) . $price;
        }
        return $price;
    }

    public function malade($value){
        return "je suis malade du " . $value ;
    }

    public function getGlobals(): array
    {
        return [
            'Location' => 'Dawan Lille',
            'ben' => 'Benjamin'
        ];
    }
}
