<!DOCTYPE html>

<html lang="en">
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-132345912-1"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-132345912-2');
	</script>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="theme-color" content="#4e4e86">
	<title>hyperverse</title>
	<link rel="icon" href="/icns/favicon.png">
	<meta name="viewport" content="width=device-width initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Mono:100,400" rel="stylesheet">
	<link rel="stylesheet" href="/main.css">

	<meta property="og:site_name" content="hyperverse">
	<meta property="og:title" content="Page Log">
	<meta property="og:url" content="https://hyperve.rs/log/">
	<meta property="og:description" content="Log of every page that has been created.">
	<meta property="og:image" content="https://hyperve.rs/story/1/panel1.gif">

	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="@hyprverse">
	<meta name="twitter:creator" content="@mjexlad">
	<meta property="twitter:title" content="hyperverse | Page Log">
	<meta property="twitter:description" content="Log of every page that has been created.">
	<meta property="twitter:image" content="https://hyperve.rs/story/1/panel1.gif">
</head>

<style>
	body {
		background: #1f2038;
		color: lightgray;
		font-family: 'Roboto Mono', monospace;
	}

	li {
		margin-bottom: 10pt;
	}

	#container {
		text-align: left;
	}

	#container a {
		font-size: inherit;
	}

	/* Mobile Styling */
	@media only screen and (max-width: 1052px) {
		#container a {
			line
		}
	}

	/* Desktop Styling */
	@media only screen and (min-width: 1053px) {
		#container {
			width: 1024px;
		}
	}
</style>

<body>
	<div id="exoskeleton">
		<div id="header">
			<a href="/" class="logo"></a>

			<div class="controls">
				<a href="javascript:window.history.back()">back</a>
				<a href="javascript:load()">load</a>
				<a href="../story/1">first</a>
			</div>
		</div>

		<div id="container">
			<?php
			require('../global.php');

			$folders = glob('../story/*', GLOB_ONLYDIR);
			natsort($folders);
			$pages = [];

			$prevAction = 'start';

			foreach($folders as $pagepath) {
				$page = substr($pagepath, 9);
				$nextButton = 'Next';

				ob_start();
				require($pagepath . '/index.html');
				ob_end_clean();

				// echo($page . ' - <span class="timestamp" data-clipboard-text="' . $rss->channel->item[count($folders) - intval($page)]->pubDate . '">' . $rss->channel->item[count($folders) - intval($page)]->pubDate . '</span><br>');

				$timestamp = strftime("%m/%d/%y", strtotime($pubdate));
				// $timestamp = date('m/d/y', filectime($pagepath));

				// $pages[intval($page)] = $timestamp . ' - ' . $page . ': ';
				$pages[intval($page)] = $timestamp . ': ';

				$pages[intval($page)] .= '<a href="/story/' . $page . '">' . $prevAction . '</a><br>';

				$prevAction = $nextButton;
			}

			$pages = array_reverse($pages);

			foreach($pages as $item) {
				echo($item);
			}
			?>
		</div>

		<div id="footer">
			<a href="/credits/">© 2019 all rights reserved.</a><br>
			<a href="javascript:toggleSwearing()" title="<?=swear('Disable', 'Enable')?> swearing"><img src="/icns/options-icon.svg"></a>
			<?php include('../footer.php')?>
		</div>
	</div>
	

	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
	<script src="https://hyperspace.sfo2.cdn.digitaloceanspaces.com/js/fitty.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/clipboard@1/dist/clipboard.min.js"></script>
	<script src="/global.js"></script>

	<script>
		window.mobilecheck = function() {
			var check = false;
			(function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
			return check;
		};

		$(() => {
			if(window.mobilecheck()) {};
				new Clipboard('.timestamp')
		});
	</script>
</body>
</html>
