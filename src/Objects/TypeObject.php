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
        return preg_replace(
            '/(^|[a-z])([A-Z])/e',
            'strtolower(strlen("\\1") ? "\\1_\\2" : "\\2")',
            $word
        );
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