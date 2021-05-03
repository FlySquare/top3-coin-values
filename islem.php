<?php

/*Bitcoin Başlangıç */

$bitcoin_site = "https://www.doviz.com/kripto-paralar/bitcoin";
$site = file_get_contents($bitcoin_site);

preg_match_all('@<span class="value" data-socket-key="bitcoin" data-socket-type="D" data-socket-attr="s" data-socket-animate="true">(.*?)</span>@si',$site,$btcvaluearray);
$bitcoin_fiyat= $btcvaluearray[1][0];

preg_match_all('@<div class="change status up" data-socket-key="bitcoin" data-socket-type="D" data-socket-attr="c">(.*?)</div>@si',$site,$btchrsarray);
$bitcoin_saatlik_deger= trim($btchrsarray[1][0]);

preg_match_all('@<div class="text-md font-semibold text-white mt-4">(.*?)</div>@si',$site,$btctoplu);

$bitcoin_tl = $btctoplu[1][0];
$bitcoin_hacim = $btctoplu[1][1];
$bitcoin_gunluk_aralik = $btctoplu[1][2];




/*Ethereum Başlangıç */

$ethereum_site = "https://www.doviz.com/kripto-paralar/ethereum";
$site = file_get_contents($ethereum_site);

preg_match_all('@<div class="text-xl font-semibold text-white" data-socket-key="ethereum" data-socket-type="D" data-socket-attr="s">(.*?)</div>@si',$site,$btcvaluearray);
$ethereum_fiyat= $btcvaluearray[1][0];

preg_match_all('@<div data-socket-key="ethereum" data-socket-type="D" data-socket-attr="c">(.*?)</div>@si',$site,$btchrsarray);
$ethereum_saatlik_deger= trim($btchrsarray[1][0]);

preg_match_all('@<div class="text-md font-semibold text-white mt-4">(.*?)</div>@si',$site,$btctoplu);

$ethereum_tl = $btctoplu[1][0];
$ethereum_hacim = $btctoplu[1][1];
$ethereum_gunluk_aralik = $btctoplu[1][2];

/*Tether Başlangıç */

$tether_site = "https://www.doviz.com/kripto-paralar/tether";
$site = file_get_contents($tether_site);

preg_match_all('@<div class="text-xl font-semibold text-white" data-socket-key="tether" data-socket-type="D" data-socket-attr="s">(.*?)</div>@si',$site,$btcvaluearray);
$tether_fiyat= $btcvaluearray[1][0];

preg_match_all('@<div data-socket-key="tether" data-socket-type="D" data-socket-attr="c">(.*?)</div>@si',$site,$btchrsarray);
$tether_saatlik_deger= trim($btchrsarray[1][0]);

preg_match_all('@<div class="text-md font-semibold text-white mt-4">(.*?)</div>@si',$site,$btctoplu);

$tether_tl = $btctoplu[1][0];
$tether_hacim = $btctoplu[1][1];
$tether_gunluk_aralik = $btctoplu[1][2];







$array = array(

  'bitcoin_fiyat' => $bitcoin_fiyat,
  'bitcoin_saatlik_deger' => $bitcoin_saatlik_deger,
  'bitcoin_tl' => $bitcoin_tl,
  'bitcoin_hacim' => $bitcoin_hacim,
  'bitcoin_gunluk_aralik' => $bitcoin_gunluk_aralik,

  'ethereum_fiyat' => $ethereum_fiyat,
  'ethereum_saatlik_deger' => $ethereum_saatlik_deger,
  'ethereum_tl' => $ethereum_tl,
  'ethereum_hacim' => $ethereum_hacim,
  'ethereum_gunluk_aralik' => $ethereum_gunluk_aralik,

  'tether_fiyat' => $tether_fiyat,
  'tether_saatlik_deger' => $tether_saatlik_deger,
  'tether_tl' => $tether_tl,
  'tether_hacim' => $tether_hacim,
  'tether_gunluk_aralik' => $tether_gunluk_aralik

);

echo  $json = json_encode($array);

 ?>
