<?php


namespace App\Form\Transformer;


use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class TagModelTransformer implements DataTransformerInterface
{

    /**
     * @inheritDoc
     */
    public function transform($arrayToStringComma)
    {
        if(empty($arrayToStringComma)){
            $arrayToStringComma = [];
        }
        return implode(', ', $arrayToStringComma);
    }

    /**
     * @inheritDoc
     */
    public function reverseTransform($stringCommaToArray)
    {
        return array_map(function($val){ return trim($val); }, explode(', ',$stringCommaToArray));
    }
}