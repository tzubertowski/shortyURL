<!DOCTYPE html>
<html lang="pl">
    <head>
        <title>a.dr.es</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
		<div class="belka"></div>
			<div class="all_center">
				<div class="bialak">
				<?php
				function generateRandomString($length = 6) {
					$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
					$randomString = '';
					for ($i = 0; $i < $length; $i++) {
						$randomString .= $characters[rand(0, strlen($characters) - 1)];
					}
					return $randomString;
				}
				function Visit($url){
					   $agent = "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)";$ch=curl_init();
					   curl_setopt ($ch, CURLOPT_URL,$url );
					   curl_setopt($ch, CURLOPT_USERAGENT, $agent);
					   curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
					   curl_setopt ($ch,CURLOPT_VERBOSE,false);
					   curl_setopt($ch, CURLOPT_TIMEOUT, 5);
					   curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, FALSE);
					   curl_setopt($ch,CURLOPT_SSLVERSION,3);
					   curl_setopt($ch,CURLOPT_SSL_VERIFYHOST, FALSE);
					   $page=curl_exec($ch);
					   //echo curl_error($ch);
					   $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
					   curl_close($ch);
					   if($httpcode>=200 && $httpcode<300) return true;
					   else return false;
				}
				
				include 'db.inc';
				$short = $_GET['short'];
				$pa_url =  $_GET['url'];
				$main_url = "http://tnij.url.ph/";
				
				if(empty($short)){
						$short = generateRandomString();
				}
				$query_exists = "SELECT url FROM short_link WHERE short = '".$short."'";
				$response = mysql_query($query_exists) or die ("Blad mysql");;
				$fetch_query = mysql_fetch_array($response);
				$liczba_response = mysql_num_rows($response);
				$url = $fetch_query['url'];
				$query_exists = "SELECT url FROM short_link WHERE short = '". $short ."'";
				$response = mysql_query($query_exists) or die ("Blad mysql");;
				$fetch_query = mysql_fetch_array($response);
				$liczba_response = mysql_num_rows($response);
				$url = $fetch_query['url'];

				if ( $liczba_response > 0 ) {
					header("Location: ".$url);
					die();
				}
				else {

						if(Visit($pa_url)){
							@mysql_query("INSERT INTO short_link SET short='". $short ."', url='". $pa_url ."'") or die ("nie wstawilem");

							echo "<h1>Alias created:</h1>";
							echo "<br><h4>";
							echo "<textarea rows=\"1\" cols=\"25\" onclick=\"this.focus();this.select()\" readonly=\"readonly\">";
							echo "http://your.domain/";
							echo $short;
							echo "</textarea></h4>";
							echo "<br><br><br><h6>Redirecting in a moment.</h6>";
							header("refresh: 7; '". $pa_url ."'");
						}
						else
						{
							echo "The site you've tried to shorten a link to seems not to be up right now.";
							header("Refresh: 3; '". $main_url ."'");
						}


				}


				mysql_close($connection_string);

				?>
				</div>
			</div>
			<script src="https://code.jquery.com/jquery.js"></script>
			<script src="js/bootstrap.min.js"></script>
	</body>
</html>

