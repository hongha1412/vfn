<?php

include 'config.php';

set_time_limit(0);

$token = '
EAAAAUaZA8jlABANECvmMhJXH7SNErG11lMlP9vl3hQXKZAd2nnLKk3eO6Ohwcsk7eMQvoio3mvZBgc5YiPcwMnnKCjDFmJJG1PpdTFYStZC4IROYSqyzFSCZBKGjPEGyWCzVaaxaS6gewyYeA13dyXsGfwG1zjhlMlbt0kJqCJy0rlWlyN9Ic4Ptkgf1IayEZD
EAAAAUaZA8jlABADKBCPHzgJ9unHosOe0jWJjbGtmp9P0GwZA70Pjco6rqByumn3gEatHmZBvILkh7wtcUvPFnRf3bETyxIZBuExTGxBWRGV9WEYRTJjohVie0cqaUMrXySOxZAhpuM6arHSFa98M3xHqybZCpfTTcakFs6hI1BLmLCnGUhzQQsU940NRWZAQ3wZD
EAAAAUaZA8jlABAMGQnTY7hi0ZCnwZBTXjuKbrhG3DdJUAzXBEsoQqegV40oEZAPVqViggII1V2TuO6Xp4lQ0FkIdDBlvc7mvgbrUX41JA5ipxZAAi237TydZCcs6wOy2xTYn9ZBAU8Lki7VlX8oponl3JAbZAjOBYRFlnSmlUQZAm7QqcjO67dle38OzTEkM6k0UZD
EAAAAUaZA8jlABAOdjNEZAR0nZC6cdI288SS3aMFKyHY3k4nRiUFmUF3H6Avx0AZAZBf3pH6VZBBOw6rbyLpPbggDzJd1nu0YstgvGiFPwbXTlXJiIeA9frnkISMcplWo3ZAoIErreM9O2pEMIyAPGa7ZCXilZBFn2ZA1GUZBULu5v0NeAKC62AAYQkE0XnYaKxABOwZD
EAAAAUaZA8jlABABqSZA39YLUFjqI7sxpE3B3MVZAnNbtzLUy0IbQC8pZAAiwj5ZBP9ek9wc5X0TL4pNSp9FMeYMTwwZCyMMD7YgN1lTHOJdFlcHnSNXnzekNlP5nrIA5rGXw38tLcX5DfGUEaZCfuDP0USAdofRvAC0RknkllqNHz4uaVxGwwZBhN3z8TFLRVHAZD
EAAAAUaZA8jlABAH5Cs23r3DkpTyhZAlXwV6fFSuD2P6xey7KXqacivEekKCwhTnQQHBQ2sAC2ZCAvV96dZC7hKGkWQgtlL3LrwpNxh4SOJhyLMfohy1KEEzoQUNlB8rGq4mCuWidhYVRrfjFq3VbAEdzDeYeKCLp2txZCc9K1Cx5jIE0WAQihVjLcnpozgMoZD
EAAAAUaZA8jlABAAkVwxXiS8FFxeXmZCRudZASQJvMdbzB5IwOMIZCKX2XwzgsZAQBlcdsG6Tbn0yeo4LYRwqZBj0UTSbaj51nZBC2ePZCVMM2EXs1ZALkbZCCCAh84IfrvktgJ4VjrXSjbKSQtdPLbC2Cs0ZALNTnTJCjZBm8xcZBGHninHKXdrxyfDGIKTH237gbZBi4ZD
EAAAAUaZA8jlABAHeUeP1YV7JgUzE4kbiV7fF6tOnBd06ZAE1ZBBXBqWQHm3uMZCVfITHkuzEsKY8Mbk0oCgZB2zr5vbqbWDHhE7lVP7kk5a8pptZAQwh7R04ncVz3tWcPEdAlJH10M31FaQ2VBGKVFExG9xduZCd9DqoGIwqIIpv5SeCsOL9NZA1hjn6MwaXyYAZD
EAAAAUaZA8jlABACGIDYDRx4QVQxookpxHSnOhXpM4VZAPGAnl124m1fV5eQaGFpfe59EUix1SqXQNiRQKSRZBh1M2V1NY8p0dNV81puGWBlBEEkHZAkXZAl5eFmTjWOb6RBW9ZCMeXZCiZCIRZAzxg65Nl4CjrL1RtgcGSejpPgwvcFyULBqYrFdQg5n0MeQ1ZB9gZD
EAAAAUaZA8jlABAFhZCFJTIQpUwZCJfHDUpr6dqMxY3wLzA3KHHVYRJBnKs26VRlbbeLwM76lKSmd2XeZB4QGOjPdC15GGWUNhRAB7CYWKZBKUzx2T7JFrDKU9AasS8Fu9rSmTEcUW90s6cf5oFXR3Tp4ZBwBlIJOYp3l0GitpFWflto7rzhPXoPkzGQGMnzIkZD
EAAAAUaZA8jlABAN6ZAy6oCZCf8NcD7bMCdAmg3bYP1449uifoVLYBVBf5TgZBUlMYgjZCdXl9UllcYTsxzxLE1OtJ1OqmrZA7rar1l3dYZCjBAEcZBMyReuA5hMyoFcH7M19XndwNm6CwWQ7AhFVsmGpSVe2hEMUZAS4JHeVHZB8M1IZCWsHZBXYB3RMI0pbPs4ql3MZD
EAAAAUaZA8jlABAEzWJWZCGC39Si80uS8ybPTLdKgSMFERNKHUrysiXFDwyZCW18Ftb2vlXIuJ5n5h9WFQxFjZAZBI6woSxKrGYpJparZBCjgBYar0GXpxl8yvoMUsIkQBC847KRVp7qEG78c3ZBHIj3p5ibsgVy0okobC1KXble0K7e7yH4x8buSqOutT9PwZCoZD
EAAAAUaZA8jlABAPdT5uTsEvaI0ne2UEorHTZC2Yo2sQp5zdYKKIII9EvOM1jm3oX6z0R7vdVwDhoxOBqPy4f0Oinsd5Af7F5qEuncVRsvt9Qq8sApT0ZCSMsUbxYGqzh68x0Bj9ISKJ8fBRh00wgq2mHXIhH8PziB0jL2YqXQDlGKd2rLhPzMRPcgDBQlIZD
EAAAAUaZA8jlABAMBqtjwiF8O6MPLgT1yHStewDKQqrZABj8heIhY66ECeaM6rbI6ixnR491ZCN1RCrFHIXfrbrEx0joES4CofGeZAJaYpM8ZC1tKjFyZCDBl891ku7mGtwKvKpP91ITSmxya5WbCIaCmVnFx8L4iqWHkfZAvBb5f9VrBklBcif7NO1BIZBgHj7wZD
EAAAAUaZA8jlABADW0rXs8O1L0AIKiuBKHah0abwULWPCieYcJCPWfoHNTriSNNwpc67F064qk2El0EZAoSZCgfR63BuVUXbthBs0nwAuGOgnkytlJpGLL02AtZBqdzCDh0isZCQiKlUW7boWkhBhx2Sv7aw1gD0QXS7i4TWIwR4H5SmVyQucWhtgvZA7ElcewZD
EAAAAUaZA8jlABAND2COToHsxYQbFnTvqFdpewJxGLm43bJT5FixsGLSKxrhqZCvEOuDGPTERPZBfcPdgsxkMBP2UtrDD9RoETIYAi2kbXFZAFQgeJrLaThviS6AAt7JVTWBOLwZBITLTucRAtohGC9OUlU0ZAGfMZATXreAGSrZCff5ikZB1blcDGuFkCTZCHOI4mtNBk8DQFQnAZDZD
EAAAAUaZA8jlABAIBhRcs7nmprS89cMZAoxcZCtmD28O3PQ1RYhDH0ZCqtLxPisDqOtqn8ZCI2FGixeIsrgVW4dHetVhIYZAxvLk0zfngEUhpIBMihdT6V9KuCZBKWorRbJlBrkfiZBygKRYkQ35o1ZBwalW3gI9Ct2JxckgByhippdNEuV5TZB7x7o8OZBIywljGOcZD
EAAAAUaZA8jlABALAZAE5NQMjCafDkPKKailGyEKJng42RJJn5znBUoepB3dIjLkZCudwtyXTL7Ean5htdw63PHuhZB5eADrqzPinoafLOZCrEtMvDKNxUGyzsj0ZAqckKvhOx8wqsQtwO4oXXwFl34mrAWYInC06nX9aczuEi7VccBdbtdMmVxNT7ii9m0u08ZD
EAAAAUaZA8jlABALDgY6ZBjQkHYznyEhUuockzK7dUjQcIOzNgUNF1cXCNNUFw9SWTrXGF8VbLlAcdGf9SwxjXqbH3lQP3VJem9bZAH81MwtIiYgu1ZADTgEBxdZAQv9ZCoDKkFFix5wCKmPyPqzWm14F5QRji0UMMe44YE2Ln3BPwZBB0X822T4ZBtnrjOZCul3EZD
EAAAAUaZA8jlABAEbHsJujiEyy1tuW8kbDolv0BLPBG2pOGXv6UJAZBlOe1ZC9zcQzqkxaL5LKhGsct49VA1rwt9scSWlurFDABZBVIyjZAD553HgZChK9uZA6gsKm7XiiwKK17uZC8vaplZA953i6ugLv1rOZAzmzNSv4KOfUvoB0S6y4gtGUryC26eP1aZBbdZCsfcZD
EAAAAUaZA8jlABACZCdT4LpBFmjkIXqongIu7SKd7cMY6SfjdKK6JqqLTMjm2q3L7lKSCfZB2IytOJ9Pl1YpGhNO9y0qGcXJ2P5K1hbuF8MoZAWoDcleLZCZA1gbWEhcKurGWZAVCgzEoGIWgXOOsZBSkc6csM9bhXpNZBV0NlvzfVotxbA63LOsNkwzzQ60A36twZD
EAAAAUaZA8jlABAIK6dZCEP7ZC0Bsdy2DhsiukKmZABXD0ESD28XSDHrHsIKV4ZBCsTkBRDbVTrDAqQlkdp2By6clEiurcZBbLa7qNVTUJtkX0NrjaOEQCQ3ZAvp9JIUp6iXoQgT4MhNFG6ViQzapnpiNpxDtcju8QsgDZBGjLknM8dHtyZCYzipV9Btqv8hkA2HIZD
EAAAAUaZA8jlABAHx2VqKfiEfFD1IzvAzR8GirfyCz0cmc8BeLPCWPgp3Afo57JSIblH2CauZAZAWxpKXzzG58ofhcoc8haSA6YkwFNNssHD6YySgjGvwUmU9XxWTYtkTGIdfsR4W5HZAcy7agnWSvTD8GPEBjKlCOE9pgoIccSzKJVQxbT0EgV8EZC2Bg0C4T0QZBdZBEKL2wZDZD
EAAAAUaZA8jlABAKSZBPauBqqgUYI8yBHFyQHgzXbXmmAKImB0ZAVHMZAsa2vTGJeG6OpNBZCTEyZBYcGbkizzXMnYQCQXYbgDIR0XUZCdMQFNrKT4kbacoSSt7TLDsXXEZC6wNKyZCc8zMuZBFpSxn8J5rVZAi2bencIy2V5jTPc5A9tRIY1myWQVAera0ja2q9MdEZD
EAAAAUaZA8jlABAAZCzfWO092l8lw5IKzI9BuHvwY6caMb2bpsJWK776C8TJ4ezqZAmZA5CcVYs8jqyswYbfeGLZAWqAUrKA21mb65lccPFg7SYxZBCFsZCVV7XoGIOM55xx0jOL9B12ZAxZCbAVqvxnk9Wvhce9EDJsh3nBPtOhrSBNoEK3zsUgUHl8xf6YbyQRIZD
EAAAAUaZA8jlABALFXkgz2RP1eTTeYHFU63Q9EMrTiollK8SypxK9fJ407z4Wm2bstbJUGSrQUA8b8INHuYyrezyvpp4vIwdPXsp40rpTm7HFVnRxjcNE1ppZBDqtBq2sPIjGFsHIwC0YrZBkZCeJrnCmZB5aDpDRhO8S0zcXYPmJ6xDoBpB3jIfZB1WAkpgZBsbzfb6YU6L3gZDZD
EAAAAUaZA8jlABAGN1odT3dG7cGbfHifQZA4NzFf2P1ZAxtSLUCqZAcXL9TeSELKDcBPyyJNBHr5uniQeAvmn1srBA8BJ7cubyaUbiTZCEMI7510Y3LJ2WZA7poJsp7XBANgI2CgsGAOAZC2C0XSn7G7ZB0jp3dQ0kZCecuLGHcYz2pSN94xIRvqly972tTeHUaxcZD
EAAAAUaZA8jlABANR2OHSsjnjPLYJq0ZBUXlU0Jwmwe1JxrrbcJMSdJ23MqK6EWZCABWJNkHYurm8nB7YY4IcwZBXvinbuxjK9tCaVTIlTi1v0kVNmMSH0Xn4Qtn8eQdlZCorPR7TsvvyX6DMCenrWQxrFnYLqHQi58B7qT18SZCYF6SvizB2cyF37WY6hV1n8ZD
EAAAAUaZA8jlABAB7VGP59HsiaFttqy3WZCRZAWjc515M9QI8Ni5UQMYhqZBdiid7YVu5XPVkpubbzYtX1jrTn34BQub6Qy7FFkjquLLrqaZCSZASdBH8iPjvKAbGmE1uS3MCyML6flElQet75YeN3pZCM3J59oopOSWCKrpPFazG0FkKhEWiT8yNRmnPUn0M64ZD
EAAAAUaZA8jlABADWOrglBs8feiohWe4JyUjSNXZAWBlsqu0reyUslvUZBk2nn1eJTWISm2Mi2o3pZApJeGMtxADHyLJNhPHPCMpOBneynzJgr61T3O7DFI9yayIE4ju94ZBS2tqRSwl9ZC1ZA6PbVbIiWZCYRhNEyZC5T9YvsorEZB3lurF6Ke48QKCClrztXzZBfgZD
EAAAAUaZA8jlABAK5EgDef6tKLxV3FrPG10T7alvjyfUYWpOULFqaPnTsTN32w2pjd0VNQwQyYNZCMYmWpk6v5zsLAQTVKDvRZAoqODZCyL6YNvKPog3qBlt8FI4gDZCjScExnziW2CJq9wcZACxsIgwml5DZAAdh8nAMUoHefskR2ZAMBYDL7wZCysdWkMGPgQbkZD
EAAAAUaZA8jlABAOhZCK0rjLKxrHX5IVFirSpvegDwvcBGiHROZAwGhvJ1qXHzWN5Y2v8MW0EvbhwSzUTK9aBJONaLai4lsWZAOfOwrZAWoZCnuQn4b0kPx1ilCvh98cFGHisvP4Cch8EssZCQkHkoR4pOnPVAZBNhYB9UoRnXwCLtwVrwcaVmgGAU6t7M3oSDFMZD
EAAAAUaZA8jlABAMK6rjBe55jGE9IYNZBvPDBkcviNO1SpkIQxutyeqTRKZABBub66OMm40GTQIxfLcQpZBRONzkB5DvROLs1928kK8ar1I0LLHw3aNE7NbaK4TTIf4zjKhSnfxZAyqYXAVvbqZCvV64aCgpyYBUqZAzJ57w68NQKLzLMTJASQlpf2B8b3Jd4vIZD
EAAAAUaZA8jlABAOEEcvscfsLVRvGlmENCRsYz4WYvZCFSB6grTLDsx9FNap5UaCO5pEZALsdhbT6ZBllyiQ9zu6SjEEgZBFudEcE6rD98enI6Vjb0rOZBo86fAm1T2JOKauLgInAUyI0iEX3dJjOzXvLZCl0x7HNZCvnKtTabfHTWaeXTmdy2p1ss4dlKhnqU6cZD
EAAAAUaZA8jlABAPSpVBZAHoddiZA4p7bniN957EJiHPaMsvJwqgCFc0uJ5TVubj4iMLSyM3VTVeLdtI7zbyrPJYzbHeAHJPi25FBHruFRQfT6XZCjzP1rrAKuEFHLKOh8p69EgP7Xy6mGKVGpicDKiSTTZA5ZA4tKWBnSNoGeju9jzTYdtRQ2rVmbtIrBrVkMZD
EAAAAUaZA8jlABANWvt9ZA2kKx32SxZCMD80QrWxAsk3QvxOlwZBcQUedJiNv9gSX2o9Y4wASxZAAeWN5ZAOe3lOWyYc3p09fqz7DIek0b224Tt9bgxNW8FKTamxSZBZCJJXFiBU4C26lhJVAkTKna95ITtPwIg2mZBWFy90dUkvIGhRwZBbljqJlaGKjEKpe8QkbEZD
EAAAAUaZA8jlABAB2ZAiZCm5SskDxY3sKZCC1CibioYtveyuZCNDCGUEgiadbz5DduhdhAsnou4YMkNgx29sMZCyYN8IiseuvjTwExNj08IBL3Ir5oMQ2NemdqmgZB9qYyG1ynioq4sEYj6ZA3Go6WLlKz5ZCEhbniBHYmIEg6TbrCHhgUuIIT1cBkiZBrkocEMArsZD
EAAAAUaZA8jlABAImovbB4fA1p4ZBk0WYxqOmp2GWxC9szzu2waAeleNQh8hzX7d8XZAcdcwMpzomSQcXFXSMpzhZCdu4OH9Bi2XXcGJLjAUAuXTC0doRwg16BEZCFvYZCSUZC6YlPZAYgrlrVIhzgnFKdJeetKMmcbPmF3cdATB13N5rV24sYMZAs3gfaYkTbxagZD
EAAAAUaZA8jlABAO9bxCnkE7xRaluZAlXjmEYh269jXF4VnGZCMfijmboQDjN9ZApCBA75yrPfaGKyV5nNxhvrj4Xfz6FbEbZCGYuK0ZAHDTKeQUHxOKPk8EtDDKo8ZBWZCEcKncq2Yq3hxnfTqUaoyZCyPn1ZBJjmeUpHas3X7Wf8phxZCDz4PdpqQawaFEZAr7jjNcZD
EAAAAUaZA8jlABAM3XX7C1ZBACqracu50GEGXHubyysZAUm3kS0oEUEkfWs2QIZCe5m2eBAFrE12ofybCxIBTTyt7A55qPhjaVEpVZAtwoJRBhP1kBFtetZBURWMWmuEwRZANmBV4UAkvjlIZBCzulhVlhUR18A73VgZCIn0f1UAdAg0G7ucwthbzUVD6AXL5otPEZD
EAAAAUaZA8jlABAOHi8kRwejV7BTX3NZB4B7CuqB48D7TCNFj9c6hF9i4MIInG5cgLHEUF4d8e0mIbpBjvYOljFQGt0Q43V9faoH2OT2wFrZAghYvlW6ECon3un1SFiYLeu7ZBG2AoQZCY56nhftG6M3HmPZBefPwRwvV4dFDZC0y1cjbSZBBEpzjlTGm1t2PgPcZD
'; 
$table='token'; 

$insert = $update = 0;

$data  = explode("\n", $token);

foreach ($data as $token) {
   $me = cek(trim($token));

   if ($me['id']) {
      if (mysql_num_rows(mysql_query("SELECT `ten` FROM ".$table." WHERE idfb = '" . mysql_real_escape_string($me['id']) . "'"))) {
         mysql_query("UPDATE ".$table." SET `token` = '" . mysql_real_escape_string($token) . "' WHERE `idfb` = " . $me['id'] . "");
         ++$insert;
      } else {
         mysql_query("INSERT INTO ".$table." SET
               `idfb` = '" . mysql_real_escape_string($me['id']) . "',
               `ten` = '" . mysql_real_escape_string($me['name']) . "',
               `token` = '" . mysql_real_escape_string($token) . "'
         ");
         ++$update;
      }
   }
}

echo 'UPDATE ' . $insert;
echo '<br>INSERT ' . $update;

function cek($o) {
   return json_decode(auto('https://graph.facebook.com/me?access_token='.$o),true);
}

function auto($url) {
   $ch = curl_init();
   curl_setopt_array($ch, array(
      CURLOPT_CONNECTTIMEOUT => 5,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_URL            => $url,
      )
   );
   $result = curl_exec($ch);
   curl_close($ch);
   return $result;
}

?>