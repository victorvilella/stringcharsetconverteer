<?php
/**
 * @author Victor Vilella
 * @license https://opensource.org/licenses/MIT MIT
 */
namespace victor\win1252utf8;

class Converter
{
    public function convert_utf8_win1252 ($var)
    {
        if (is_string($var)) {
            $var = iconv("UTF-8", "Windows-1252", $var);
        }
        elseif (is_array($var)) {
            foreach ($var as $chave => $valor) {
                $var[$chave] = $this->convert_utf8_win1252($valor);
            }
        }
        elseif (is_object($var)) {
            $chaves = array_keys((array) $var);
            foreach ($chaves as $chave) {
                $var->$chave = $this->convert_utf8_win1252($var->$chave);
            }
        }
        return $var;
    }

    function convert_win1252_utf8 ($var)
    {
        if (is_string($var)) {
            $var = utf8_encode($var);
        }
        elseif (is_array($var)) {
            foreach ($var as $chave => $valor) {
                $var[$chave] = $this->convert_win1252_utf8($valor);
            }
        }
        elseif (is_object($var)) {
            $chaves = array_keys((array) $var);
            foreach ($chaves as $chave) {
                $var->$chave = $this->convert_win1252_utf8($var->$chave);
            }
        }
        return $var;
    }
}