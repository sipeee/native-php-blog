TRUNCATE TABLE posts;
TRUNCATE TABLE users;

INSERT INTO blog_db.users (id, email, password, is_active) VALUES (1, 'sipiszoty@gmail.com', '$2y$12$LliRKVsXa0g.2vwUCrTfduLwKH4AsU3c1Gb41N9A4xdp38XzNZP3y', 1);
INSERT INTO blog_db.users (id, email, password, is_active) VALUES (2, 'sipiszoty2@gmail.com', '$2y$12$RWOLrH0nnsqtjC.jwWpc0Oj0nriIceSFU1jIj3RzHr5.Koo8GShje', 1);
INSERT INTO blog_db.users (id, email, password, is_active) VALUES (3, 'sipiszoty3@gmail.com', '$2y$12$faOU0XhpBKxAOaIHJhq5TOwK2sx5iOAX/r/4zOLTh6a3qu5q5rvi.', 1);
INSERT INTO blog_db.users (id, email, password, is_active) VALUES (4, 'sipiszoty4@gmail.com', '$2y$12$coNG2LRvmUU20LeuTBgyMeoPsStWMqKypOujoukLK2wW4EgAkLT0C', 1);
INSERT INTO blog_db.users (id, email, password, is_active) VALUES (5, 'sipiszoty5@gmail.com', '$2y$12$Ak3H0MwdKYschDFlad2mCerHzBOh1OcHczHmfNL9kf4IrpCFPhm0O', 0);

INSERT INTO blog_db.posts (id, user_id, title, content, created_at, update_at, publish_at) VALUES (1, 1, 'Szerver bérlés dedikált brand szervereken', '<h2 id="fancy-title-4" class="mk-fancy-title  simple-style jupiter-donut-  color-single">
	<span>
				</span><span><div><h2>A szerver bérlést azoknak ajánljuk, akiknek nincs saját szervere, nem akarnak beruházni, vagy elöregedett a szerverparkjuk.</h2></div></span><span>
			</span>
</h2>




	<div class=" vc_custom_1728478992194">

<div id="text-block-5" class="mk-text-block  jupiter-donut- ">


	<div align="justify">A nagy összegű beruházás helyett, havi szerverbérlet díjat kell csak fizetnie, ami már tartalmazza a gépterem bérlet, hűtés, energiaellátás, folyamatos felügyelet, blade szerver használati díj és a hibaelhárítási szolgáltatást. Béreljen szervert és kövesse nyomon havi költéseit! Minden szerver bérlés mellé a szerverhoszting ajándékba jár. Szerver bérlési opciók már 14 900 Ft+Áfa/hó-tól!</div></div><div class="mk-text-block  jupiter-donut- "><br></div><div class="mk-text-block  jupiter-donut- "><table class="table-1"><tbody><tr><td> <div class="title"><b>MINŐSÉG ÉS RUGALMASSÁG</b></div>
	<div class="content">
		<div>Gyors, megbízható dedikált brand szerverek egyedi konfigurációval</div>
	</div></td><td> <div class="title"><b>GEOREDUNDANCIA</b></div>
	<div class="content">
		<div>5 terem – 3 budapesti helyszín</div>
	</div></td></tr><tr><td> <b>SEBESSÉG</b><br>Garantált internet kapcsolat (akár 4x10Gbps)</td><td> <b>BIZTONSÁG</b><br><div class="c-message_kit__gutter">
<div class="c-message_kit__gutter__right" data-qa="message_content">
<div class="c-message_kit__blocks c-message_kit__blocks--rich_text">
<div class="c-message__message_blocks c-message__message_blocks--rich_text">
<div class="p-block_kit_renderer" data-qa="block-kit-renderer">
<div class="p-block_kit_renderer__block_wrapper p-block_kit_renderer__block_wrapper--first">
<div class="p-rich_text_block" dir="auto">
<div class="p-rich_text_section">2 órán belüli hardver csere, 24 órás telefonos ügyfélszolgálat</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div><br></td></tr></tbody></table><br></div></div><br>', '2025-04-12 23:33:35', '2025-04-12 23:33:35', '2025-04-09 00:00:00');
INSERT INTO blog_db.posts (id, user_id, title, content, created_at, update_at, publish_at) VALUES (2, 1, 'Webtárhely bérlés – Webtárhely csomagok', '<div><h2 style="text-align: center;"><strong>Szeretné weboldalát biztonságban tudni?<br></strong><strong>Szeretné, ha profi, lelkes csapat üzemeltetné webtárhelyét?<br>
</strong><strong>Rendelje meg tárhelyét szakértőktől!</strong></h2>Linux-alapú web server bérlés szolgáltatásunk az egyik legmegbízhatóbb a
 piacon, gondosan tesztelt szoftverekkel, nagy tapasztalattal rendelkező
 rendszergazdákkal és képzett ügyfélszolgálattal várja Önt!</div><div><br></div><div><h3 style="text-align: center;">GYŐZŐDJÖN MEG A MINŐSÉGRŐL!</h3><div><br></div><div>Webszervereinken a népszerű <strong>cPanel</strong>-t használjuk. A <strong>CloudLinux</strong>
 biztosítja a web serverek stabilitását úgy, hogy ügyfelenként limitálja
 a felhasznált erőforrás halmazt, így a felhasználók vagy terhelt
webtárhelyek nincsenek hatással a szerveren lévő többi tárhelyre.</div><div><br></div><div><ul class="p-rich_text_list p-rich_text_list__bullet" data-stringify-type="unordered-list" data-indent="0" data-border="false" data-border-radius-top-cap="false" data-border-radius-bottom-cap="false"><li data-stringify-indent="0" data-stringify-border="0">Futtatható PHP verziók 4.4-től 8.3-ig (CloudLinux)</li><li data-stringify-indent="0" data-stringify-border="0">Több mint 80 installálható app (Softaculous) WordPresstől a Joomla-ig</li><li data-stringify-indent="0" data-stringify-border="0">Számos levél szolgáltatás: POP, IMAP vagy akár Webmail kliens</li></ul><br></div><br></div>', '2025-04-12 23:40:21', '2025-04-12 23:40:21', '2025-04-10 00:00:00');
INSERT INTO blog_db.posts (id, user_id, title, content, created_at, update_at, publish_at) VALUES (3, 1, 'Domain regisztráció', '<h2 style="text-align: center">Domain regisztáció pár&nbsp;perc alatt.<br>
Szabadon konfigurálható.<br>
Korlátlan számú domain mellé díjmentes dns szolgáltatás jár.</h2>

<div align="left"><b><br></b></div><div align="left">	<div class=" vc_custom_1727686323937">

<div id="text-block-22" class="mk-text-block  jupiter-donut- ">


	<div><em data-renderer-mark="true"><strong data-renderer-mark="true">Valamennyi</strong>
 új domain végződés (nTLD), illetve az ezt támogató globális és ország
szintű TLD-k esetében is előfordulhat, hogy a választott domain név
prémium kategóriába esik.<br>
A domain végződéseknél a kijelölt központi nyilvántartónak (Registry)
jogában áll a jól marketingelhető, jó hangzású domain neveket magasabb
árkategóriába csoportosítani. Ezen domainekről nem áll rendelkezésünkre
előzetes információ, hanem jellemzően a regisztrációs folyamat során
derül ki, ha a választott név beleesik ebbe a kategóriába, és ilyenkor
jut tudomásunkra az adott domain név aktuális díjazása is. Erről
tájékoztatást küldünk, és ekkor lehetősége van döntést hozni, hogy a
prémium domain lefoglalását véglegesíteni kívánja-e. <strong data-renderer-mark="true"><br>
Fentiekre tekintettel, a domain regisztrációs folyamat során a
Rackforest Zrt. a díjbekérőn szereplő összeg vonatkozásában az utólagos
árváltozás jogát kifejezetten fenntartja.</strong></em></div>

<div>*Amennyiben több évre szeretne hosszabbítani kérjük lépjen kapcsolatba velünk.</div></div></div><br></div><div align="center"><br></div><br>', '2025-04-12 23:52:02', '2025-04-12 23:52:02', '2025-04-11 00:00:00');
INSERT INTO blog_db.posts (id, user_id, title, content, created_at, update_at, publish_at) VALUES (4, 1, 'Infrastrukturánk', '<div><h2 align="center">Helyezze el vagy bérelje nálunk szerverét<br>
professzionális környezetben.<br>BUDAPESTEN, A X., VIII. ÉS A XIII. KERÜLETBEN TALÁLHATÓ HELYSZÍNEINKEN.</h2><div><h2 id="fancy-title-10" class="mk-fancy-title mk-animate-element left-to-right simple-style jupiter-donut- color-single mk-in-viewport">
	<span>
				<div>Könnyű megközelítés, rugalmas hozzáférés, minden egy helyen!</div><div><table class="table-1"><tbody><tr><td>1</td><td>2</td><td>3</td></tr></tbody></table></div></span></h2></div></div>', '2025-04-13 00:01:03', '2025-04-13 00:04:42', '2025-04-17 00:00:00');
INSERT INTO blog_db.posts (id, user_id, title, content, created_at, update_at, publish_at) VALUES (5, 1, 'A cPanel és a webszerver', '<div><h2 id="fancy-title-40" class="mk-fancy-title  simple-style jupiter-donut-  color-single" align="center"><span><span style="font-size:22px;">A
 cPanel és a webkiszolgáláshoz kapcsolódó további szoftverek
webtárhelyeinken kívül virtuális és dedikált bérszervereinken is
használhatók.</span></span></h2><div><table class="table-1"><tbody><tr><td>

<div data-mk-stretch-content="true" class="wpb_row vc_row vc_row-fluid jupiter-donut- mk-fullwidth-false attched-false js-master-row mk-grid mk-in-viewport">

<div class="vc_col-sm-6 wpb_column column_container  jupiter-donut- _ jupiter-donut-height-full">
		<div class=" vc_custom_1716882284391">

<div id="text-block-42" class="mk-text-block  jupiter-donut- ">


	<div><img class="alignnone wp-image-4374" src="https://rackforest.com/wp-content/uploads/2017/06/cpanel_logo.png" alt="" width="136" height="30"></div>
<div><b>cPanel</b></div>
<div>Széles körben elterjed hosting kezelő szoftver grafikus
menürendszerrel, automatizált szolgáltatásokkal. Köszönhetően a
világszerte nagy számú felhasználónak nemcsak a legkülönbözőbb igényekre
 kínál megoldást, de hatalmas tudásbázis is áll mögötte.</div></div></div></div></div></td><td> <div><b><img class="alignnone wp-image-4825" src="https://rackforest.com/wp-content/uploads/2017/06/imunify360_logo.png" alt="" width="217" height="60"></b></div>
<div><b>Immunify360</b></div>
<div>DOS és BruteForce védelem, ami segít a különböző CRM rendszerek
sebezhetőségeit is megvédeni. Szemben más hasonló célú szoftverekkel
egy-egy sebezhető kód megtalálásakor nem letiltja a tárhelyet, hanem
csak a kérdéses kódot teszi elérhetetlenné.</div></td></tr><tr><td> <div><b><img class="alignnone wp-image-4822" src="https://rackforest.com/wp-content/uploads/2017/06/jetbackup_color.png" alt="" width="191" height="30"></b></div>
<div><b>JetBackup</b></div>
<div>Külön modul gondoskodik az automatizált mentésekről. Minden nap
készítünk egy teljes mentést a web serverről, amit egy hétre
visszamenőleg eltárolunk, így bármikor visszaállíthatja a korábbi
állapotot legyen szó akár a levelezésről, az adatbázisról, vagy akár a
teljes webtárhelyről.</div></td><td> <div><b><img class="alignnone wp-image-4826" src="https://rackforest.com/wp-content/uploads/2017/06/cl_company_final.png" alt="" width="153" height="60"></b></div>
<div><b>CloudLinux</b></div>
<div>PHP verziók 4.4-től 8.1-ig. Egy web serveren belül különböző
weboldalak, különböző PHP környezetben is futhatnak és köszönhetően a
CloudLinuxnak ezek a verziók támogatva, patchelve vannak folyamatosan.</div></td></tr></tbody></table><br></div><br></div>', '2025-04-13 00:12:32', '2025-04-13 00:12:32', '2025-04-18 00:00:00');
