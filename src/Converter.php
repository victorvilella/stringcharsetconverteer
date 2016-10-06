<?php
/**
 * @author Victor Vilella <victor.cbl@gmail.com>
 * @author Felippe Maurício Vieira <felippemauriciov@gmail.com>
 * @author Dmitri Goosens <dgoosens@gmail.com>
 *
 * @license https://opensource.org/licenses/MIT MIT
 */
namespace victor\convertwin1252utf8;

/**
 * Class Converter
 * @package victor\convertwin1252utf8
 */
class Converter
{
    /**
     * converts any type of object from utf8 to win1252
     *
     * @param mixed $var
     * @return mixed
     */
    public function convert_utf8_win1252 ($var)
    {
        if (is_string($var)) {
            $var = iconv("UTF-8", "Windows-1252", $var);
        }
        elseif (is_array($var)) {
            foreach ($var as $key => $value) {
                $var[$key] = $this->convert_utf8_win1252($value);
            }
        }
        elseif (is_object($var)) {
            $keys = array_keys((array) $var);
            foreach ($keys as $key) {
                $var->$key = $this->convert_utf8_win1252($var->$key);
            }
        }
        return $var;
    }

    /**
     * converts any type of object from win1252 to utf8
     *
     * @param mixed $var
     * @return mixed
     */
    public function convert_win1252_utf8 ($var)
    {
        if (is_string($var)) {
            $var = utf8_encode($var);
        }
        elseif (is_array($var)) {
            foreach ($var as $key => $value) {
                $var[$key] = $this->convert_win1252_utf8($value);
            }
        }
        elseif (is_object($var)) {
            $keys = array_keys((array) $var);
            foreach ($keys as $key) {
                $var->$key = $this->convert_win1252_utf8($var->$key);
            }
        }
        return $var;
    }
}
