-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2024 at 06:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwa_projekt_filip_gredelj`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) NOT NULL,
  `prezime` varchar(32) NOT NULL,
  `korisnicko_ime` varchar(32) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `razina` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(4, 'Filip', 'Gredelj', 'Filip', '$2y$10$oJh3ZRv9ynvt4bi9fPUat.tt6WDGb6f8Ej0.hafzlw2meYetMt4VO', 1),
(6, 'test', 'Tset', 'Test', '$2y$10$Kl.fshK7vuUja5nCjuuLmuHPns2vRbhISogHUvoq4zl7Q7NoRzm2y', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) NOT NULL,
  `naslov` varchar(64) NOT NULL,
  `sazetak` text NOT NULL,
  `tekst` text NOT NULL,
  `slika` varchar(64) NOT NULL,
  `kategorija` varchar(64) NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(18, '2024-06-12', 'Metallica dolazi u Fortnite', 'Utjecaj benda osjetit će se u drugim Fortnite igrama, uključujući Rocket Racing i Battle Royale.', 'Prošlo je dosta vremena otkako smo imali koncert Fortnite ili \"imerzivno glazbeno iskustvo\" kako bi ga Epic mogao nazvati ali sljedeći dolazi uskoro, i prvi je vrijedan mosh pita. \"Metallica: Gorivo. Vatra. Bijes.\" je koncert u igri koji dolazi na Fortnite kasnije ovog mjeseca i na ograničeno vrijeme.\r\nManifestacija počinje 22. lipnja s tri projekcije.\r\nKoncert će sadržavati šest Metallicinih pjesama iz slavnog kataloga benda koji se proteže desetljećima, a koji je kreirao VR, AR i metaverse studio Magnopus, koji je napravio iskustvo za Fortnite. Grupe do četiri igrača mogu ići zajedno na nastup. Ako ste već vidjeli koncerte Fortnitea poput onih u kojima glume Travis Scott ili Ariana Grande, znate da očekujete audiovizualni spektakl. Koncert se neće moći izvoditi nakon završetka ovih datuma, pa svakako dođite ako vam se čini da je dobar provod. Spoiler: Bit će to dobar provod.', 'Fortnite_Metalica.jpg', 'popularno', 1),
(19, '2024-06-12', 'DOOM: The Dark Ages najavljen', 'Id Software nam je spremilo najavu za slijedeći nastavak u DOOM franšizi, Doom The Dark Ages.', 'Kao što je ranije objavio Insider Gaming, DOOM: The Dark Ages je prequel koji uključuje mračnu fantaziju sa temom inspiriranom srednjim vijekom. Igra izlazi 2025. godine za Xbox Series X i S, PC ali i PlayStation 5, nastavljajući nedavnu Microsoftovu strategiju za više platformi za Xbox igre.\r\nOvo je slijedeći nastavak u dugoj franšizi pucačina iz prvog lica id Software-a, nakon izlaska DOOM Eternal-a 2020. godine i njegova dva DLC proširenja, The Ancient Gods Part One i Part Two, objavljenih 2020. i 2021. godine.', 'Doom_The_Dark_Ages.png', 'popularno', 1),
(20, '2024-06-12', 'Batman: Arkham Shadow', 'Novi Batman, stare avanture', 'Fanovi DC univerzuma su dobili novu poslasticu u obliku Batmana: Arkham Shadow trailera. Ovoga puta u skroz novoj VR igri Batman će se boriti protiv Rat Kinga za “dušu” Gothama.\r\n\r\nSigurno imate pitanja nakon što ste pogledali trailer. Gdje se ova igra nalazi u vremenskom okviru Arkhama? Tko je uopće Rat King? I gdje se točno ostali Batmanovi negativci nalaze u cijeloj situaciji?\r\n\r\nArkham Shadow je prequel Arkham Asyluma što ga stavlja točno između Arkham Originsa i Arkham Asyluma. Roger Craig Smith ponovno posuđuje glas Batmanu s obzirom da je ovdje Batman mlađi.\r\n\r\nŠto se Batman odijela tiče, dizajn je pao negdje između kostima iz Originsa i oklopnog kostima iz Arkham Knighta. Poput ostalih igara i u ovoj igri ćemo moći mijenjati kostime koje ćemo otključavati kroz igru, iako bi to moglo biti malo čudno s obzirom da se ova VR igra iz prvog lica.\r\n\r\nZa razliku od drugih Batmanovih negativaca, Rat King operira malo više izvan okvira. Ovoga puta, Rat King je negativac koji prijeti baciti Gotham na koljena.\r\n\r\nTko je on ustvari? Izgleda da je Rat King inačica Ratcatchera unutar Arkham univerzuma (postoji i u nekim stripovima). U DC univerzumu, Ratcatcher je negativac imena Otis Flannegan koji je jednom radio za Gotham kao hvatač štakora. Nakon što je zatvoren za ubojstvo, Flannegan razvije kostimiranu personu preko koje iskorištava svoj talent da mami i kontrolira štakore da bi kaznio ljude odgovorne za njegovo uhićenje.\r\n\r\nUnutar igre, ovaj negativac je dobio veliki kult pratitelja koji su spremni učiniti bilo što za njega. Čini se da se cijela priča vrti oko toga da Rat King otima visoko rangirane službenike poput Gordona ili Harvey Denta.', 'Batman_Arkham_Shadow.png', 'popularno', 1),
(21, '2024-06-12', 'Retro igre', 'Dragulji prošlog stoljeća koji će vas vratiti u doba kazeta, disketa i gameboya', 'Kažu da su to bila jednostavnija vremena, gdje smo pričali na fiksni telefon na žicu, gdje su žvake koštale par kovanica i gdje je svega par igara bilo dovoljno da se zabavljamo tjednima, pa i mjesecima. Vratimo se u 80-te i 90-te godine prošlog stoljeća da vidimo što se to vrtjelo na konzolama našeg djetinjstva.\r\nSuper Mario Bros. (1985.)\r\nNakon bezbroj nastavaka, a i nekoliko filmova među kojima je zadnji istinski najbolji dosad, stvarno se o ovoj igri ne treba puno toga reći.\r\nDuck Hunt (1984.)\r\nFirst person shooter gdje su ptice sve samo ne sigurne. Igrali smo kao lovac koji sa svojim psom ide u lov na - pogodili ste, patke. Duck Hunt je jednostavna igra koja je izašla za NES. Zanimljivost ove igre je što se igrala s \"pravim\" pištoljem, odnosno NES Zapperom i morali ste imati onu veliku kutiju od TV-a (CRT).\r\nPokemon Red i Blue (1999.)\r\nZajedno s Yellow koja je izašla nešto nakon Red i Blue, ovo su prve generacije Pokemon igara. Izašle su za Game Boy i prodane su u nekoliko milijuna kopija diljem svijeta. Cilj igre vjerojatno već znate, možete ili skupiti sve bedževe iz raznih gymova ili ispuniti svoj Pokedex ili oboje! Igra je u to vrijeme nudila još jednu posebnu značajku. Uz pomoć Game Link kabla, koji spaja dva utora, mogli ste imati Pokemon borbe s prijateljima. Također ste mogli pristupiti Pokemonima iz druge igre kako biste ispunili Pokedex do kraja bez varanja.\r\nMega Man (1987.)\r\nUz Maria, ovo je vjerojatno među prvim platformerima koje smo igrali. Svega šest ljudi je radilo na originalnog igri, a glavna mehanika combata igre se bazira također na jednoj jako staroj multiplayer igri - kamen, škare, papir. Megaman je izašao za NES, a danas je glavni lik Rock, kasnije nazvan Mega, u filmovima, serijama, stripovima, ali i drugim igrama.', 'Retro.png', 'retro', 1),
(22, '2024-06-12', 'Test ne arhivirano popularno', 'Ovo je test vijest koja nije arhivirana pod kategorijom popularno.', 'Ovo je test vijest koja nije arhivirana pod kategorijom popularno.', 'Titanfall_2.jpg', 'popularno', 0),
(23, '2024-06-12', 'Test ne arhivirano retro', 'Ovo je test vijest koja nije arhivirana pod kategorijom retro.', 'Ovo je test vijest koja nije arhivirana pod kategorijom retro.', 'Cuphead.png', 'retro', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
