<?php
/**
 * Created by PhpStorm.
 * User: HaVH
 * Date: 8/1/2017
 * Time: 11:09 PM
 */

namespace App\Http\Utils;


class PasswordHasher
{
    const MAX_INT = 2147483647;

    public function __construct()
    {
        $this->hex_chr = "0123456789abcdef";
    }

    private function rhex($num) {
        $str = "";
        for ($j = 0; $j <= 3; $j++) {
            $str .= $this->hex_chr{$num >> ($j * 8 + 4) & 0x0F};
            $str .= $this->hex_chr{$num >> ($j * 8) & 0x0F};
        }
        return $str;
    }

    private function convertToUnsignedInt($tmp) {
        return (bccomp("2147483647", $tmp) < 0) ? bcsub($tmp, "4294967296") : $tmp;
    }

    private function str2blks_MD5($str) {
        $nblk = ((strlen($str) + 8) >> 6) + 1;
        $blks = array();
        for ($i = 0; $i < $nblk * 16; $i++)
            $blks[$i] = 0;
        for ($i = 0; $i < strlen($str); $i++) {
            $blks[$i >> 2] |= $this->convertToUnsignedInt(ord($str{$i}) << (($i % 4) * 8));
        }
        $blks[$i >> 2] |= $this->convertToUnsignedInt(0x80 << (($i % 4) * 8));
        $blks[($nblk * 16 - 2)] = strlen($str) * 8;
        return $blks;
    }

    private function intval_32bits($value)
    {
        $value = ($value & 0xFFFFFFFF);
        if ($value & 0x80000000) $value = -((~$value & 0xFFFFFFFF) + 1);
        return $value;
    }

    private function add($x, $y) {
        $lsw = ($x & 0xFFFF) + ($y & 0xFFFF);
        $msw = ($x >> 16) + ($y >> 16) + ($lsw >> 16);
        $rs = $this->intval_32bits(($msw << 16) | ($lsw & 0xFFFF));
        return $rs;
    }

    private function unsignedRightShift($a, $b) {
        if ($b >= 32 || $b < -32) {
            $m = (int)($b/32);
            $b = $b-($m*32);
        }

        if ($b < 0) {
            $b = 32 + $b;
        }

        if ($b == 0) {
            return (($a>>1)&0x7fffffff)*2+(($a>>$b)&1);
        }

        if ($a < 0)
        {
            $a = ($a >> 1);
            $a &= 2147483647;
            $a |= 0x40000000;
            $a = ($a >> ($b - 1));
        } else {
            $a = ($a >> $b);
        }
        return $a;
    }

    private function rol($num, $cnt) {
        $rs = $this->intval_32bits(($num << $cnt) | $this->unsignedRightShift($num, (32 - $cnt)));
        return $rs;
    }


    private function cmn($q, $a, $b, $x, $s, $t) {
        return $this->intval_32bits($this->add($this->rol($this->add($this->add($a, $q), $this->add($x, $t)), $s), $b));
    }

    private function ff($a, $b, $c, $d, $x, $s, $t) {
        return $this->intval_32bits($this->cmn(($b & $c) | ((~$b) & $d), $a, $b, $x, $s, $t));
    }

    private function gg($a, $b, $c, $d, $x, $s, $t) {
        return $this->intval_32bits($this->cmn(($b & $d) | ($c & (~$d)), $a, $b, $x, $s, $t));
    }

    private function hh($a, $b, $c, $d, $x, $s, $t) {
        return $this->intval_32bits($this->cmn($b ^ $c ^ $d, $a, $b, $x, $s, $t));
    }

    private function ii($a, $b, $c, $d, $x, $s, $t) {
        return $this->intval_32bits($this->cmn($c ^ ($b | (~$d)), $a, $b, $x, $s, $t));
    }

    private function MD5($str) {
        $x = $this->str2blks_MD5($str);
        $a = 1732584193;
        $b = -271733879;
        $c = -1732584194;
        $d = 271733878;
        for ($i = 0; $i < count($x); $i += 16) {
            $olda = $a;
            $oldb = $b;
            $oldc = $c;
            $oldd = $d;
            $a = $this->ff($a, $b, $c, $d, $x[$i + 0], 7, -680876936);
            $d = $this->ff($d, $a, $b, $c, $x[$i + 1], 12, -389564586);
            $c = $this->ff($c, $d, $a, $b, $x[$i + 2], 17, 606105819);
            $b = $this->ff($b, $c, $d, $a, $x[$i + 3], 22, -1044525330);
            $a = $this->ff($a, $b, $c, $d, $x[$i + 4], 7, -176418897);
            $d = $this->ff($d, $a, $b, $c, $x[$i + 5], 12, 1200080426);
            $c = $this->ff($c, $d, $a, $b, $x[$i + 6], 17, -1473231341);
            $b = $this->ff($b, $c, $d, $a, $x[$i + 7], 22, -45705983);
            $a = $this->ff($a, $b, $c, $d, $x[$i + 8], 7, 1770035416);
            $d = $this->ff($d, $a, $b, $c, $x[$i + 9], 12, -1958414417);
            $c = $this->ff($c, $d, $a, $b, $x[$i + 10], 17, -42063);
            $b = $this->ff($b, $c, $d, $a, $x[$i + 11], 22, -1990404162);
            $a = $this->ff($a, $b, $c, $d, $x[$i + 12], 7, 1804603682);
            $d = $this->ff($d, $a, $b, $c, $x[$i + 13], 12, -40341101);
            $c = $this->ff($c, $d, $a, $b, $x[$i + 14], 17, -1502002290);
            $b = $this->ff($b, $c, $d, $a, $x[$i + 15], 22, 1236535329);
            $a = $this->gg($a, $b, $c, $d, $x[$i + 1], 5, -165796510);
            $d = $this->gg($d, $a, $b, $c, $x[$i + 6], 9, -1069501632);
            $c = $this->gg($c, $d, $a, $b, $x[$i + 11], 14, 643717713);
            $b = $this->gg($b, $c, $d, $a, $x[$i + 0], 20, -373897302);
            $a = $this->gg($a, $b, $c, $d, $x[$i + 5], 5, -701558691);
            $d = $this->gg($d, $a, $b, $c, $x[$i + 10], 9, 38016083);
            $c = $this->gg($c, $d, $a, $b, $x[$i + 15], 14, -660478335);
            $b = $this->gg($b, $c, $d, $a, $x[$i + 4], 20, -405537848);
            $a = $this->gg($a, $b, $c, $d, $x[$i + 9], 5, 568446438);
            $d = $this->gg($d, $a, $b, $c, $x[$i + 14], 9, -1019803690);
            $c = $this->gg($c, $d, $a, $b, $x[$i + 3], 14, -187363961);
            $b = $this->gg($b, $c, $d, $a, $x[$i + 8], 20, 1163531501);
            $a = $this->gg($a, $b, $c, $d, $x[$i + 13], 5, -1444681467);
            $d = $this->gg($d, $a, $b, $c, $x[$i + 2], 9, -51403784);
            $c = $this->gg($c, $d, $a, $b, $x[$i + 7], 14, 1735328473);
            $b = $this->gg($b, $c, $d, $a, $x[$i + 12], 20, -1926607734);
            $a = $this->hh($a, $b, $c, $d, $x[$i + 5], 4, -378558);
            $d = $this->hh($d, $a, $b, $c, $x[$i + 8], 11, -2022574463);
            $c = $this->hh($c, $d, $a, $b, $x[$i + 11], 16, 1839030562);
            $b = $this->hh($b, $c, $d, $a, $x[$i + 14], 23, -35309556);
            $a = $this->hh($a, $b, $c, $d, $x[$i + 1], 4, -1530992060);
            $d = $this->hh($d, $a, $b, $c, $x[$i + 4], 11, 1272893353);
            $c = $this->hh($c, $d, $a, $b, $x[$i + 7], 16, -155497632);
            $b = $this->hh($b, $c, $d, $a, $x[$i + 10], 23, -1094730640);
            $a = $this->hh($a, $b, $c, $d, $x[$i + 13], 4, 681279174);
            $d = $this->hh($d, $a, $b, $c, $x[$i + 0], 11, -358537222);
            $c = $this->hh($c, $d, $a, $b, $x[$i + 3], 16, -722521979);
            $b = $this->hh($b, $c, $d, $a, $x[$i + 6], 23, 76029189);
            $a = $this->hh($a, $b, $c, $d, $x[$i + 9], 4, -640364487);
            $d = $this->hh($d, $a, $b, $c, $x[$i + 12], 11, -421815835);
            $c = $this->hh($c, $d, $a, $b, $x[$i + 15], 16, 530742520);
            $b = $this->hh($b, $c, $d, $a, $x[$i + 2], 23, -995338651);
            $a = $this->ii($a, $b, $c, $d, $x[$i + 0], 6, -198630844);
            $d = $this->ii($d, $a, $b, $c, $x[$i + 7], 10, 1126891415);
            $c = $this->ii($c, $d, $a, $b, $x[$i + 14], 15, -1416354905);
            $b = $this->ii($b, $c, $d, $a, $x[$i + 5], 21, -57434055);
            $a = $this->ii($a, $b, $c, $d, $x[$i + 12], 6, 1700485571);
            $d = $this->ii($d, $a, $b, $c, $x[$i + 3], 10, -1894986606);
            $c = $this->ii($c, $d, $a, $b, $x[$i + 10], 15, -1051523);
            $b = $this->ii($b, $c, $d, $a, $x[$i + 1], 21, -2054922799);
            $a = $this->ii($a, $b, $c, $d, $x[$i + 8], 6, 1873313359);
            $d = $this->ii($d, $a, $b, $c, $x[$i + 15], 10, -30611744);
            $c = $this->ii($c, $d, $a, $b, $x[$i + 6], 15, -1560198380);
            $b = $this->ii($b, $c, $d, $a, $x[$i + 13], 21, 1309151649);
            $a = $this->ii($a, $b, $c, $d, $x[$i + 4], 6, -145523070);
            $d = $this->ii($d, $a, $b, $c, $x[$i + 11], 10, -1120210379);
            $c = $this->ii($c, $d, $a, $b, $x[$i + 2], 15, 718787259);
            $b = $this->ii($b, $c, $d, $a, $x[$i + 9], 21, -343485551);
            $a = $this->add($a, $olda);
            $b = $this->add($b, $oldb);
            $c = $this->add($c, $oldc);
            $d = $this->add($d, $oldd);
        }
        return $this->rhex($a) . $this->rhex($b) . $this->rhex($c) . $this->rhex($d);
    }

    private function convertHexToString($hex){

        $sb = "";
        $temp = "";

        for($i = 0; $i < strlen($hex) - 1; $i += 2 ){

            //grab the hex in pairs
            $output = mb_substr($hex, $i, 2);
            //convert hex to decimal
            $decimal = intval($output, 16);
            //convert the decimal to character
            $sb .= chr($decimal);

            $temp .= $decimal;
        }

        return $sb;
    }

    /**
     * Encrypt Zero Password To MD5
     *
     * @param string
     * @return string
     */
    public function encrypt($string) {
        $a = $string;
        $b = $this->convertHexToString("a3aca1a3");
        $c = "fdjf,jkgfkl";
        $s = $a . $b . $c;
        $r = $this->MD5($s);
        return $r;
    }
}