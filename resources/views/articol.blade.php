<?php $isDone = true;?>
@extends('template')

	<!-- Page Title
	============================================= -->
	<section id="page-title" style="padding: 0; color: #EEE">

		<header id="header" class="full-header transparent-header border-full-header static-sticky" data-sticky-class="not-dark" data-sticky-offset="full" data-sticky-offset-negative="100" >
			<div id="header-wrap">
				<div class="container clearfix">
					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>
					<!-- Logo
					============================================= -->
					<div id="logo">
						<a href="index.html" class="standard-logo" data-dark-logo="images/logo.png"><img src="images/logo.png" alt="Canvas Logo"></a>
						<a href="index.html" class="retina-logo" data-dark-logo="images/logo@2x.png"><img src="images/logo@2x.png" alt="Canvas Logo"></a>
					</div><!-- #logo end -->
					<!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu">
						<ul class="one-page-menu" data-easing="easeInOutExpo" data-speed="1250" data-offset="65">
							<li><a href="/" data-href="#wrapper"><div>Home</div></a></li>
							<li><a href="/" data-href="#section-about"><div>About</div></a></li>
							<li><a href="/" data-href="#section-services"><div>Themes</div></a></li>
							<li><a href="/" data-href="#section-signup"><div>Sign up</div></a></li>
							@if($isDone)
								<li><a href="/" data-href="#section-timeline"><div>Event timeline</div></a></li>
								<li><a href="/" data-href="#section-partners"><div>Partners</div></a></li>
							@endif
							<li><a href="#" data-href="#section-contact"><div>Contact</div></a></li>
							<li class="{{$active == 'articol' ? 'current' : ''}}"><a href="/articol">
									<div>Articol</div>
								</a></li>
						</ul>
					</nav><!-- #primary-menu end -->
				</div>
			</div>
		</header>

	</section><!-- #page-title end -->

	<section id="content" style="font-family: 'Lato', sans-serif; font-size: 18px">
		<div style="text-align: center; padding-top: 10px"><h2>Cum au prins ideile lumină la hermesHackathon 2021</h2></div>
		<div class="container clearfix">
			<div class="row">
				<div class="col-md-12 bottommargin">
					<div class="team team-list clearfix">
						<div class="team-desc">
							<div class="team-content">
								<p class="textJustify">
									Dacă ai avut vreodată o idee bună pentru o aplicație, dar nu ai avut motivația sau timpul necesar să o implementezi, hermesHackathon ar putea fi locul ideal pentru tine. Atmosfera, dorința de a da viață viziunii tale și numărătoarea inversă a celor 24 de ore de codat te vor ambiționa să îți urmezi scopul până la final.
								</p>
								<p>
									Ediția de anul acesta s-a desfășurat în mediul virtual, fiind cea mai bună opțiune în situația dată. Deși online, participanții au avut parte de numeroase activități recreative, cu rolul de a-i detensiona și de a crea un mediu distractiv. Ei au avut ocazia de a participa la traininguri ale firmelor partenere, utile în viitoarea lor carieră, un MiniHackathon cu probleme de algoritmică, cât și un Quiz night și alte joculețe având ca scop relaxarea și socializarea. Implicarea participanților în cadrul MiniHackathonului a fost extrem de apreciată de organizatori, iar câștigătorii din echipele <i>Ramy</i>, <i>Heisenberg Studios</i> și <i>Mugurele</i> au fost răsplătiți cu vouchere la o sală VR.
								</p>
								<div style="text-align: center; padding-bottom: 20px"><img src="/images/pozeHH2021/PMs.jpeg" alt="Project Managers" style="width: auto; max-height: 400px;"> </div>
								<p>
									Organizarea hackathonului a presupus o mare responsabilitate pentru project manageri, punerea la punct a tuturor detaliilor menținând tensiunea. Cu toate acestea, au avut parte de o experiență interesantă, distractivă, prin intermediul căreia au dobândit noi cunoștințe. Voluntarii noștri au asigurat lina desfășurare a evenimentului, încurajând, la fiecare pas, echipele de care erau responsabili. Participanții au fost încântați de ideea de a avea un voluntar, un prieten, cu care pot discuta când se simt în impas. Astfel, ghidați de mentori și sprijiniți de voluntari, concurenții și-au transformat liniile de cod într-un produs fascinant.
								</p>
								<p>
									La fiecare ediție, participanții au de creat o aplicație pe una din câteva teme de interes actual, în acest an fiind vorba despre digitalizare, medicină, sport și securitate. Pornind cu tehnologii, idei și abordări diferite, echipele au reușit să creeze proiecte originale, care ar putea reprezenta o reală îmbunătățire în viețile utilizatorilor.
								</p>
								<p>
									Cel mai important aspect pe care participanții noștri l-au avut în vedere pe tot parcursul competiției, pentru a duce la capăt proiectul, este organizarea. După cum detaliază și aceștia, fiecare membru al echipei are anumite taskuri, care trebuie bifate, pentru atingerea țelului final. Această împărțire strategică a sarcinilor împreună cu perseverența, motivația și depășirea provocărilor întâlnite pe parcurs, au unit membrii echipei și au uimit jurații.
								</p>
								<div style="text-align: center; padding-bottom: 20px"><img src="/images/pozeHH2021/prez.jpeg" alt="Presenters" style="width: auto; max-height: 400px;"> </div>
								<p>
									Temele de medicină și sport i-au dus pe mulți cu gândul la gestionarea sănătății prin metode precum exerciții fizice, dietă sau un somn odihnitor, dar și la diverse aplicații utile în situația pandemică. Soluții de securitate s-au implementat prin găsirea potențialelor riscuri în aplicațiile instalate sau prin păstrarea securizată a cardurilor. În ceea ce privește digitalizarea, soluțiile au fost diverse, de la platforme de ecommerce pentru meșteșugari sau fermieri, la gestionarea alimentelor în funcție de data de expirare, managementul restaurantelor, vizualizarea autobuzelor pe hartă în timp real sau găsirea de coechipieri pentru jocuri. Fiindcă proiectele sunt multe și interesante și nu pot fi cuprinse în totalitate aici, puteți viziona întreaga prezentare a acestora în înregistrarea de pe <a href="https://www.youtube.com/watch?v=pvnGz1rDCUI" target="_blank">YouTube</a>!
								</p>
								<p>
									Cu atâtea proiecte diverse și interesante, juraților le-a fost greu să departajeze, dar în cele din urmă s-au ales și câștigătorii celor 4500 de lei, care merită felicitări și mult succes în planurile de viitor!
								</p>
								<p>
									<b>Premiul 1</b> - echipa <i>Manuscrito</i>, pentru proiectul cu același nume, care ajută copiii să-și îmbunătățească scrisul de mână într-un mod interactiv, prin feedback în timp real generat pe bază de AI
								</p>
								<div style="text-align: center; padding-bottom: 20px; justify-content: space-between; display: flex">
									<img src="/images/pozeHH2021/Manuscrito.jpeg" alt="Manuscrito" style="width: 50%; max-height: 400px; padding-right:20px ">
									<img src="/images/pozeHH2021/Manuscrito2.jpeg" alt="Manuscrito" style="width: 50%; max-height: 400px; padding-right:20px">
								</div>
								<p>
									<b>Premiul 2</b> - echipa <i>MMI</i>, pentru aplicația <i>Speak2code</i>, care creează un site pe baza comenzilor vocale
								</p>
								<div style="text-align: center; padding-bottom: 20px; justify-content: space-between; display: flex">
									<img src="/images/pozeHH2021/Speak2code.jpeg" alt="Speak2code" style="width: 50%; max-height: 400px; padding-right:20px ">
									<img src="/images/pozeHH2021/Speak2code2.jpeg" alt="Speak2code" style="width: 50%; max-height: 400px;padding-right:20px">
								</div>
								<p>
									<b>Premiul 3</b> - echipa <i>spargem_capete</i>, pentru aplicația <i>Polytron</i> de vizualizare a conceptelor matematice utile programatorilor
								</p>
								<div style="text-align: center; padding-bottom: 20px; justify-content: space-between; display: flex">
									<img src="/images/pozeHH2021/Polytron.jpeg" alt="Polytron" style="width: 50%; max-height: 400px; padding-right:20px ">
									<img src="/images/pozeHH2021/Polytron2.jpeg" alt="Polytron" style="width: 50%; max-height: 400px;padding-right:20px">
								</div>
								<p>
									<b>Premiul special pentru liceeni</b> - echipa <i>Jinga Peek</i>, pentru aplicația <i>EasyQR App</i> de scanare a certificatului digital
								</p>
								<div style="text-align: center; padding-bottom: 20px; justify-content: space-between; display: flex">
									<img src="/images/pozeHH2021/EasyQR.jpeg" alt="EasyQR" style="width: 50%; max-height: 400px; padding-right:20px ">
									<img src="/images/pozeHH2021/EasyQR2.jpeg" alt="EasyQR" style="width: 50%; max-height: 400px; padding-right:20px">
								</div>
								<p>
									Pentru unii, acest concurs a fost o ocazie de a-și strânge cele mai bune idei și resurse și de a da naștere unui proiect promițător. Alții s-au lăsat purtați de inspirația de moment, sub constanta încurajare a voluntarilor și a mentorilor. Iar pentru alții, hermesHackathon a reprezentat primul pas în lumea concursurilor din domeniul informaticii, experiență care i-a ajutat să se autodepășească și să prindă gustul competițiilor de acest tip.
								</p>
								<p>
									După cum poți vedea, există un loc la hermesHackathon pentru fiecare. Acest concurs nu este doar despre a câștiga: este despre a cerceta, a încerca, a învăța și a găsi drumul potrivit către aducerea la viață a unei idei ce ar putea schimba lumea. Așadar, indiferent de background, te așteptăm și pe tine să participi la ediția următoare și să dai lumină ideilor tale!
								</p>
								<div style="text-align: right">
									<h4 style="color: grey"> Autori: Briana Sălăgean & Alexandra Tudorescu </h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</section><!-- #content end -->

<footer id="footer" class="lightgrey noborder">
	<div id="copyrights">
		<div class="container center clearfix">
			Copyright Societatea Hermes {{date('Y')}} | All Rights Reserved
		</div>
	</div>
</footer>