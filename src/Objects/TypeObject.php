<?php

namespace Ainias\Library\TelegramBot\Objects;

class TypeObject
{
    /**
     * TypeObject constructor.
     * @param null $arrayData
     */
    public function __construct($arrayData = null)
    {
        if (is_array($arrayData)) {
            $this->hydrate($arrayData);
        }
    }

    public function hydrate($arrayData)
    {
        foreach ($arrayData as $property => $value) {
            $funcName = self::camelize("set_" . $property);
            if (method_exists($this, $funcName)) {
                $this->$funcName($value);
            }
        }
    }

    public static function hydrateArray($array, $class)
    {
        foreach ($array as &$val) {
            $val = new $class($val);
        }
        return $array;
    }

    public static function staticExtractArray($array){
        $data = [];
        foreach ($array as $elem)
        {
            $data[] = $elem->extract();
        }
        return $data;
    }

    /** @return array */
    public function extract()
    {
        $data = [];
        $methods = get_class_methods($this);
        if ($methods != null) {
            foreach ($methods as $method) {
                if (substr($method, 0, 3) == "get" || substr($method, 0, 2) == "is") {
                    $value = $this->$method();
                    if ($value != null) {
                        if ($value instanceof TypeObject) {
                            $value = $value->extract();
                        } else if (is_array($value)) {
                            $value = $this->extractArray($value);
                        }
                        $data[self::decamelize(substr($method, 3))] = $value;
                    }
                }
            }
        }
        return $data;
    }

    private function extractArray($arr)
    {
        foreach ($arr as &$val) {
            if ($val instanceof TypeObject) {
                $val = $val->extract();
            } else if (is_array($val)) {
                $val = $this->extractArray($val);
            }
        }
        return $arr;
    }


    private static function decamelize($word)
    {
        preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $word, $matches);
        $ret = $matches[0];
        foreach ($ret as &$match) {
            $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
        }
        return implode('_', $ret);
    }

    function camelize($scored)
    {
        return lcfirst(
            implode(
                '',
                array_map(
                    'ucfirst',
                    array_map(
                        'strtolower',
                        explode(
                            '_', $scored)))));
    }
}