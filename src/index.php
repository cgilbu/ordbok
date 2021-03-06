<!DOCTYPE html>
<html lang="no">
<head>
	<title>Ordboka</title>

	<meta charset="UTF-8">
	<meta name="theme-color" content="#08253b"> <!-- Dark blue -->
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="description" content="Er det mange vanskelige ord i Bibelen? Finn forklaringene her!">

	<meta property="og:url" content="https://<?= $_SERVER['HTTP_HOST'] ?>">
	<meta property="og:title" content="Ordboka">
	<meta property="og:description" content="Er det mange vanskelige ord i Bibelen? Finn forklaringene her!">
	<meta property="og:image" content="https://<?= $_SERVER['HTTP_HOST'] ?>/resources/images/apple-touch-icon.png?v=2">

	<link rel="shortcut icon" href="/favicon.png">
	<link rel="apple-touch-icon" href="/resources/images/apple-touch-icon.png?v=2">

	<link rel="stylesheet" href="/resources/css/app.css">
	<link rel="stylesheet" href="/resources/css/responsive.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700">

	<link rel="manifest" href="/manifest.json">
</head>
<body>
	<input type="text" id="search" autocomplete="off">
	<div id="dictionary"></div>
	<div id="loading"><img src="/resources/images/loading.svg" alt="Laster"></div>

	<div id="infoTip" class="tip"></div>
	<div id="closeTip" class="tip hidden">Tips: Klikk utenfor teksten for å gå tilbake</div>

	<div id="menuButton">
		<img id="openMenu" src="/resources/images/bars.svg" alt="Åpne meny">
		<img id="closeMenu" src="/resources/images/times.svg" alt="Lukk meny">
	</div>

	<div id="menu" class="popup hidden">
		<div>
			<div id="downloadMenuItem" data-popup-id="downloadPopup">Last ned som app</div>
			<div data-popup-id="faqPopup">Spørsmål og svar</div>
			<div data-popup-id="contactPopup">Kom med forslag</div>
			<div data-popup-id="definingPopup">Definering av ord</div>
			<div id="shareMenuItem" data-popup-id="sharePopup">Del med andre</div>
			<div data-popup-id="aboutPopup">Om Ordboka</div>
		</div>
	</div>

	<div id="welcomePopup" class="popup hidden">
		<div>
			<p>Finn <b>forklaringer</b> på <b>vanskelige ord</b> i Bibelen! <b>Trykk på ordene</b> for å se hva de betyr.</p>
			<p>I <b>menyen</b> finner du mer info. Der kan du også komme med forslag til <b>forbedringer</b>.</p>
			<div class="button close">Sett i gang</div>
		</div>
	</div>

	<div id="updatePopup" class="popup hidden">
		<div>
			<p>En <b>ny versjon</b> av Ordboka er tilgjengelig! <a href="https://github.com/cgilbu/ordboka/releases" target="_blank" rel="noreferrer">Klikk her</a> for å se hva som er nytt.</p>
			<div id="updateButton" class="button close">Oppdater</div>
		</div>
	</div>

	<div id="playStorePopup" class="popup hidden">
		<div>
			<p id="webUser">Ordboka kan lastes ned fra <b>Google Play Store</b>. For å gjøre det <a href="https://play.google.com/store/apps/details?id=com.redcreek.ordboka" target="_blank" rel="noreferrer"><b>klikk her</b></a>. Du kan også gjøre det senere via menyen.</p>
			<p id="appUser" class="hidden">Ordboka kan nå lastes ned fra <b>Google Play Store</b>. For å gjøre det <a href="https://play.google.com/store/apps/details?id=com.redcreek.ordboka" target="_blank" rel="noreferrer"><b>klikk her</b></a>.</p>
			<div class="button close">Greit</div>
		</div>
	</div>

	<div id="downloadPopup" class="popup hidden">
		<div>
			<div id="iosInfo" class="hidden">
				<p><img src="/resources/images/ios-add-home-screen.png" alt="Add to Home Screen"></p>
			</div>
			<div class="button close">Gå tilbake</div>
		</div>
	</div>

	<div id="faqPopup" class="popup hidden">
		<div>
			<p><b>Hva betyr tegnet <span style="color: var(--color-green);">|</span> i forklaringene?</b><br>
			Dersom et ord har flere betydninger er de delt opp med dette tegnet.</p>
			<p><b>Hvorfor har noen av ordene en stjerne ved siden av seg?</b><br>
			Dette er utvalgte ord vi tenker det er verdt å ta en titt på.</p>
			<p><b>Kan dere se hvilke ord jeg klikker på?</b><br>
			Nei. <a href="/privacy.php" target="_blank" rel="noreferrer">Klikk her</a> for å lese mer om personvern.</p>
			<p><b>Jeg fant en feil forklaring</b><br>
			Vi gjør vårt beste for at definisjonene skal bli så korrekte som mulig og beklager dersom noe er feil. Du kan selv sende inn forslag til endringer via menyen.</p>
			<div class="button close">Gå tilbake</div>
		</div>
	</div>

	<div id="contactPopup" class="popup hidden">
		<div>
			<p>Ordboka inneholder nå såpass mange ord at vi kun ser over nye forslag et par ganger i året. Du kan likevel fortsatt sende inn forslag til nye ord nedenfor.</p>
			<p>Ordet burde være vesentlig for forståelsen av evangeliet for yngre tenåringer, og helst nevnes ofte i Bibelen eller under kristelige sammenkomster.</p>
			<p>Du kan sende inn forslag til nye ord ved å opprette en "Issue" på <a href="https://github.com/cgilbu/ordboka/issues" target="_blank">denne siden</a>.</p>
			<div class="button close">Gå tilbake</div>
		</div>
	</div>

	<div id="suggestionSentPopup" class="popup hidden">
		<div>
			<p>Takk for forslaget! Alle henvendelser blir nøye vurdert og sjekket opp. Dersom forslaget ditt blir godkjent vil det bli synlig i Ordboka ved neste oppdatering.</p>
			<div class="button close">Greit</div>
		</div>
	</div>

	<div id="definingPopup" class="popup hidden">
		<div>
			<p>Vi ønsker å hjelpe yngre tenåringer med å forstå vanskelige og kanskje utdaterte ord i Bibelen og under kristelige sammenkomster. Vi fokuserer derfor på å gjøre forklaringene så enkle som mulig, uten at ordene svekkes.</p>
			<p>Man kan ha ulike oppfatninger av hva et ord betyr. Vi har derfor valgt å forholde oss til norske ordbøker. Man får dermed en grunnleggende forståelse av hva ordet betyr, og kan bygge på toppen av det, basert på det man hører og lærer.</p>
			<p>Vi benytter oss hovedsakelig av <a href="https://www.naob.no" target="_blank" rel="noreferrer">Det Norske Akademis ordbok</a>, men kryssjekker også noen ganger med andre kilder, som for eksempel engelske ordbøker, Bibelen, eller BCC sine egne skrifter. Dersom definisjonen er basert på andre kilder enn Det Norske Akademis ordbok vil dette være fremhevet.</p>
			<div class="button close">Greit</div>
		</div>
	</div>

	<div id="sharePopup" class="popup hidden">
		<div>
			<p>Du kan dele Ordboka med andre ved å sende dem linken nedenfor, eller du kan trykke på <b>delingsknappen</b> på mobilen.</p>
			<p><b><?= $_SERVER['HTTP_HOST'] ?></b></p>
			<div class="button close">Lukk</div>
		</div>
	</div>

	<div id="aboutPopup" class="popup hidden">
		<div>
			<p>Ordboka er et <b>frivillig samarbeidsprosjekt</b>, og de fleste av ordene stammer fra innsendte forslag. Appen har en <a href="https://github.com/cgilbu/ordboka" target="_blank" rel="noreferrer">åpen kildekode</a> og er tilgjengelig for alle.</p>
			<p>Ordboka er utarbeidet av medlemmer i Brunstad Christian Church (BCC). Nesten halvparten av BCC sine norske medlemmer er under 20 år og behovet for en slik app er derfor stort. Ordboka er likevel et <b>privat initiativ</b> og en <b>frittstående app</b> uten direkte tilknytning til denne foreningen.</p>
			<p>Vi gjør vårt beste for at definisjonene skal bli så korrekte som mulig, men står ikke ansvarlige for feilaktige eller mangelfulle definisjoner. Alle som vil kan sende inn forslag til forbedringer.</p>
			<p><a href="https://github.com/cgilbu/ordboka/releases" target="_blank" rel="noreferrer">Klikk her</a> for å se hva som er nytt i siste versjon av Ordboka.</p>
			<div class="button close">Greit</div>
		</div>
	</div>

	<script src="https://analytics.redcreek.no/js/analytics.js"></script>
	<script src="/resources/js/helpers.js"></script>
	<script src="/resources/js/model.js"></script>
	<script src="/resources/js/view.js"></script>
	<script src="/resources/js/controller.js"></script>
</body>
</html>
