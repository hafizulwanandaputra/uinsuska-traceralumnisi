-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Sep 2024 pada 15.40
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tracerstudy`
--
CREATE DATABASE IF NOT EXISTS `db_tracerstudy` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_tracerstudy`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `alumni`
--

CREATE TABLE `alumni` (
  `id_alumni` int(10) NOT NULL,
  `nim_alumni` varchar(512) NOT NULL,
  `nama_alumni` varchar(512) NOT NULL,
  `jenis_kelamin` varchar(512) NOT NULL,
  `agama` varchar(512) NOT NULL,
  `tempat_lahir` varchar(512) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat_rumah` varchar(512) DEFAULT NULL,
  `nomor_hp` varchar(512) DEFAULT NULL,
  `nomor_hp_2` varchar(512) DEFAULT NULL,
  `email` varchar(512) NOT NULL,
  `pekerjaan` varchar(512) DEFAULT NULL,
  `aktif` varchar(512) NOT NULL,
  `tgl_lulus` date DEFAULT NULL,
  `kuesioner` int(11) NOT NULL,
  `ijazah` varchar(512) DEFAULT NULL,
  `sk_lulus` varchar(512) DEFAULT NULL,
  `transkrip_nilai` varchar(512) DEFAULT NULL,
  `foto_alumni` varchar(512) DEFAULT NULL,
  `password` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuesioner`
--

CREATE TABLE `kuesioner` (
  `id_kuesioner` int(24) NOT NULL,
  `id_alumni` int(24) NOT NULL,
  `nama_alumni` varchar(512) NOT NULL,
  `nim_alumni` varchar(512) NOT NULL,
  `alamat_rumah` varchar(512) NOT NULL,
  `tgl_lulus` date NOT NULL,
  `ipk` float NOT NULL,
  `nomor_hp` varchar(512) DEFAULT NULL,
  `email` varchar(512) NOT NULL,
  `thn_masuk` year(4) NOT NULL,
  `bekerja` int(11) NOT NULL,
  `jenis` varchar(512) DEFAULT NULL,
  `nama_kantor` varchar(512) DEFAULT NULL,
  `nama_pimpinan` varchar(512) DEFAULT NULL,
  `email_pimpinan` varchar(512) DEFAULT NULL,
  `bidang` varchar(512) DEFAULT NULL,
  `thn_mulai_kerja` year(4) DEFAULT NULL,
  `no_telp_pimpinan` varchar(20) DEFAULT NULL,
  `website_kantor` varchar(512) DEFAULT NULL,
  `alamat_kantor` varchar(512) DEFAULT NULL,
  `penghasilan` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `sesuai_ilmu` int(11) DEFAULT NULL,
  `dapat_kerja` int(11) DEFAULT NULL,
  `tingkat_pendidikan` int(11) DEFAULT NULL,
  `kerja_stlh_lulus` int(11) DEFAULT NULL,
  `tempat_tinggal` int(11) NOT NULL,
  `uang_kuliah` int(11) NOT NULL,
  `anggota_org` int(11) NOT NULL,
  `aktif_org` int(11) DEFAULT NULL,
  `ikut_kursus` int(11) DEFAULT NULL,
  `kursus` varchar(512) DEFAULT NULL,
  `saran` longtext DEFAULT NULL,
  `tgl_isi` datetime NOT NULL,
  `tgl_ubah` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(24) NOT NULL,
  `judul` varchar(256) NOT NULL,
  `tgl_posting` datetime DEFAULT NULL,
  `tgl_sunting` datetime DEFAULT NULL,
  `isi` longtext NOT NULL,
  `posted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `judul`, `tgl_posting`, `tgl_sunting`, `isi`, `posted`) VALUES
(3, 'Li Europan lingues', '2023-10-24 13:17:16', '2023-11-08 10:50:51', '<p>Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores. At solmen va esser necessi far uniform grammatica, pronunciation e plu sommun paroles. Ma quande lingues coalesce, li grammatica del resultant lingue es plu simplic e regulari quam ti del coalescent lingues. Li nov lingua franca va esser plu simplic e regulari quam li existent Europan lingues.</p>\r\n<p>It va esser tam simplic quam Occidental in fact, it va esser Occidental. A un Angleso it va semblar un simplificat Angles, quam un skeptic Cambridge amico dit me que Occidental es. Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores. At solmen va esser necessi far uniform grammatica, pronunciation e plu sommun paroles.</p>\r\n<p>Ma quande lingues coalesce, li grammatica del resultant lingue es plu simplic e regulari quam ti del coalescent lingues. Li nov lingua franca va esser plu simplic e regulari quam li existent Europan lingues. It va esser tam simplic quam Occidental in fact, it va esser Occidental. A un Angleso it va semblar un simplificat Angles, quam un skeptic Cambridge amico dit me que Occidental es. Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores. At solmen va esser necessi far uniform grammatica, pronunciation e plu sommun paroles. Ma quande lingues coalesce, li grammatica del resultant lingue es plu simplic e regulari quam ti del coalescent lingues. Li nov lingua franca va esser plu simplic e regulari quam li existent Europan lingues. It va esser tam simplic quam Occidental in fact, it va esser Occidental. A un Angleso it va semblar un simplificat Angles, quam un skeptic Cambridge amico dit me que Occidental es. Li</p>', 1),
(4, 'Cicero', '2023-10-24 13:17:45', '2023-11-08 20:20:21', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?</p>\r\n<p>Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p>\r\n<p>Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias</p>', 0),
(5, 'Sample text for Roma : the novel of ancient Rome / Steven Saylor', '2023-11-08 05:55:19', '2023-11-08 13:16:42', '<div><strong>Chapter One</strong></div>\r\n<div>&nbsp;</div>\r\n<div>A Stop on the Salt Route</div>\r\n<div>&nbsp;</div>\r\n<div>1000 B.C.</div>\r\n<div>&nbsp;</div>\r\n<div>As they rounded a bend in the path that ran beside the river, Lara recognized the silhouette of a fig tree atop a nearby hill. The weather was hot and the days were long. The fig tree was in full leaf, but not yet bearing fruit.</div>\r\n<div>&nbsp;</div>\r\n<div>Soon Lara spotted other landmarks&mdash;an outcropping of limestone beside the path that had a silhouette like a man&rsquo;s face, a marshy spot beside the river where the waterfowl were easily startled, a tall tree that looked like a man with his arms upraised. They were drawing near to the place where there was an island in the river. The island was a good spot to make camp. They would sleep on the island tonight.</div>\r\n<div>&nbsp;</div>\r\n<div>Lara had been back and forth along the river path many times in her short life. Her people had not created the path&mdash;it had always been there, like the river&mdash;but their deerskin-shod feet and the wooden wheels of their handcarts kept the path well worn. Lara&rsquo;s people were salt traders, and their livelihood took them on a continual journey.</div>\r\n<div>&nbsp;</div>\r\n<div>At the mouth of the river, the little group of half a dozen intermingled families gathered salt from the great salt beds beside the sea. They groomed and sifted the salt and loaded it into handcarts. When the carts were full, most of the group would stay behind, taking shelter amid rocks and simple lean-tos, while a band of fifteen or so of the heartier members set out on the path that ran alongside the river.</div>\r\n<div>&nbsp;</div>\r\n<div>With their precious cargo of salt, the travelers crossed the coastal lowlands and traveled toward the mountains. But Lara&rsquo;s people never reached the mountaintops; they traveled only as far as the foothills. Many people lived in the forests and grassy meadows of the foothills, gathered in small villages. In return for salt, these people would give Lara&rsquo;s people dried meat, animal skins, cloth spun from wool, clay pots, needles and scraping tools carved from bone, and little toys made of wood.</div>\r\n<div>&nbsp;</div>\r\n<div>Their bartering done, Lara and her people would travel back down the river path to the sea. The cycle would begin again.</div>\r\n<div>&nbsp;</div>\r\n<div>It had always been like this. Lara knew no other life. She traveled back and forth, up and down the river path. No single place was home. She liked the seaside, where there was always fish to eat, and the gentle lapping of the waves lulled her to sleep at night. She was less fond of the foothills, where the path grew steep, the nights could be cold, and views of great distances made her dizzy. She felt uneasy in the villages, and was often shy around strangers. The path itself was where she felt most at home. She loved the smell of the river on a hot day, and the croaking of frogs at night. Vines grew amid the lush foliage along the river, with berries that were good to eat. Even on the hottest day, sundown brought a cool breeze off the water, which sighed and sang amid the reeds and tall grasses.</div>\r\n<div>&nbsp;</div>\r\n<div>Of all the places along the path, the area they were approaching, with the island in the river, was Lara&rsquo;s favorite.</div>\r\n<div>&nbsp;</div>\r\n<div>The terrain along this stretch of the river was mostly flat, but in the immediate vicinity of the island, the land on the sunrise side was like a rumpled cloth, with hills and ridges and valleys. Among Lara&rsquo;s people, there was a wooden baby&rsquo;s crib, suitable for strapping to a cart, that had been passed down for generations. The island was shaped like that crib, longer than it was wide and pointed at the upriver end, where the flow had eroded both banks. The island was like a crib, and the group of hills on the sunrise side of the river were like old women mantled in heavy cloaks gathered to have a look at the baby in the crib&mdash;that was how Lara&rsquo;s father had once described the lay of the land.</div>\r\n<div>&nbsp;</div>\r\n<div>Larth spoke like that all the time, conjuring images of giants and monsters in the landscape. He could perceive the spirits, called numina, that dwelled in rocks and trees. Sometimes he could speak to them and hear what they had to say. The river was his oldest friend and told him where the fishing would be best. From whispers in the wind he could foretell the next day&rsquo;s weather. Because of such skills, Larth was the leader of the group.</div>\r\n<div>&nbsp;</div>\r\n<div>&ldquo;We&rsquo;re close to the island, aren&rsquo;t we, Papa?&rdquo; said Lara.</div>\r\n<div>&nbsp;</div>\r\n<div>&ldquo;How did you know?&rdquo;</div>\r\n<div>&nbsp;</div>\r\n<div>&ldquo;The hills. First we start to see the hills, off to the right. The hills grow bigger. And just before we come to the island, we can see the silhouette of that fig tree up there, along the crest of that hill.&rdquo;</div>\r\n<div>&nbsp;</div>\r\n<div>&ldquo;Good girl!&rdquo; said Larth, proud of his daughter&rsquo;s memory and powers of observation. He was a strong, handsome man with flecks of gray in his black beard. His wife had borne several children, but all had died very young except Lara, the last, whom his wife had died bearing. Lara was very precious to him. Like her mother, she had golden hair. Now that she had reached the age of childbearing, Lara was beginning to display the fullness of a woman&rsquo;s hips and breasts. It was Larth&rsquo;s greatest wish that he might live to see his own grandchildren. Not every man lived that long, but Larth was hopeful. He had been healthy all his life, partly, he believed, because he had always been careful to show respect to the numina he encountered on his journeys.</div>\r\n<div>&nbsp;</div>\r\n<div>Respecting the numina was important. The numen of the river could suck a man under and drown him. The numen of a tree could trip a man with its roots, or drop a rotten branch on his head. Rocks could give way underfoot, chuckling with amusement at their own treachery. Even the sky, with a roar of fury, sometimes sent down fingers of fire that could roast a man like a rabbit on a spit, or worse, leave him alive but robbed of his senses. Larth had heard that the earth itself could open and swallow a man; though he had never actually seen such a thing, he nevertheless performed a ritual each morning, asking the earth&rsquo;s permission before he went striding across it.</div>\r\n<div>&nbsp;</div>\r\n<div>&ldquo;There&rsquo;s something so special about this place,&rdquo; said Lara, gazing at the sparkling river to her left and then at the rocky, tree-spotted hills ahead and to her right. &ldquo;How was it made? Who made it?&rdquo;</div>\r\n<div>&nbsp;</div>\r\n<div>Larth frowned. The question made no sense to him. A place was never made, it simply was. Small features might change over time. Uprooted by a storm, a tree might fall into the river. A boulder might decide to tumble down the hillside. The numina that animated all things went about reshaping the landscape from day to day, but the essential things never changed, and had always existed: the river, the hills, the sky, the sun, the sea, the salt beds at the mouth of the river.</div>\r\n<div>&nbsp;</div>\r\n<div>He was trying to think of some way to express these thoughts to Lara, when a deer, drinking at the river, was startled by their approach. The deer bolted up the brushy bank and onto the path. Instead of running to safety, the creature stood and stared at them. As clearly as if the animal had whispered aloud, Larth heard the words &ldquo;Eat me.&rdquo; The deer was offering herself.</div>\r\n<div>&nbsp;</div>\r\n<div>Larth turned to shout an order, but the most skilled hunter of the group, a youth called Po, was already in motion. Po ran forward, raised the sharpened stick he always carried and hurled it whistling through the air between Larth and Lara.</div>\r\n<div>&nbsp;</div>\r\n<div>A heartbeat later, the spear struck the deer&rsquo;s breast with such force that the creature was knocked to the ground. Unable to rise, she thrashed her neck and flailed her long, slender legs. Po ran past Larth and Lara. When he reached the deer, he pulled the spear free and stabbed the creature again. The deer released a stifled noise, like a gasp, and stopped moving.</div>\r\n<div>&nbsp;</div>\r\n<div>There was a cheer from the group. Instead of yet another dinner of fish from the river, tonight there would be venison.</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<div>The distance from the riverbank to the island was not great, but at this time of year&mdash;early summer&mdash;the river was too high to wade across. Lara&rsquo;s people had long ago made simple rafts of branches lashed together with leather thongs, which they left on the riverbanks, repairing and replacing them as needed. When they last passed this way, there had been three rafts, all in good condition, left on the east bank. Two of the rafts were still there, but one was missing.</div>\r\n<div>&nbsp;</div>\r\n<div>&ldquo;I see it! There&mdash;pulled up on the bank of the island, almost hidden among those leaves,&rdquo; said Po, whose eyes were sharp. &ldquo;Someone must have used it to cross over.&rdquo;</div>\r\n<div>&nbsp;</div>\r\n<div>&ldquo;Perhaps they&rsquo;re still on the island,&rdquo; said Larth. He did not begrudge others the use of the rafts, and the island was large enough to share. Nonetheless, the situation required caution. He cupped his hands to his mouth and gave a shout. It was not long before a man appeared on the bank of the island. The man waved.</div>\r\n<div>&nbsp;</div>\r\n<div>&ldquo;Do we know him?&rdquo; said Larth, squinting.</div>\r\n<div>&nbsp;</div>\r\n<div>&ldquo;I don&rsquo;t think so,&rdquo; said Po. &ldquo;He&rsquo;s young&mdash;my age or younger, I&rsquo;d say. He looks strong.&rdquo;</div>\r\n<div>&nbsp;</div>\r\n<div>&ldquo;Very strong!&rdquo; said Lara. Even from this distance, the young stranger&rsquo;s brawniness was impressive. He wore a short tunic without sleeves, and Lara had never seen such arms on a man.</div>\r\n<div>&nbsp;</div>\r\n<div>Po, who was small and wiry, looked at Lara sidelong and frowned. &ldquo;I&rsquo;m not sure I like the look of this stranger.&rdquo;</div>\r\n<div>&nbsp;</div>\r\n<div>&ldquo;Why not?&rdquo; said Lara. &ldquo;He&rsquo;s smiling at us.&rdquo;</div>\r\n<div>&nbsp;</div>\r\n<div>In fact, the young man was smiling at Lara, and Lara alone.</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<div>His name was Tarketios. Much more than that, Larth could not tell, for the stranger spoke a language which Larth did not recognize, in which each word seemed as long and convoluted as the man&rsquo;s name. Understanding the deer had been easier than understanding the strange noises uttered by this man and his two companions! Even so, they seemed friendly, and the three of them presented no threat to the more numerous salt traders.</div>\r\n<div>&nbsp;</div>\r\n<div>Tarketios and his two older companions were skilled metalworkers from a region some two hundred miles to the north, where the hills were rich with iron, copper, and lead. They had been on a trading journey to the south and were returning home. Just as the river path carried Larth&rsquo;s people from the seashore to the hills, so another path, perpendicular to the river, traversed the long coastal plain. Because the island provided an easy place to ford the river, it was here that the two paths intersected. On this occasion, the salt traders and the metal traders happened to arrive at the island on the same day. Now they met for the first time.</div>\r\n<div>&nbsp;</div>\r\n<div>The two groups made separate camps at opposite ends of the island. As a gesture of friendship, speaking with his hands, Larth invited Tarketios and the others to share the venison that night. As the hosts and their guests feasted around the roasting fire, Tarketios tried to explain something of his craft. Firelight glittered in Lara&rsquo;s eyes as she watched Tarketios point at the flames and mime the act of hammering. Firelight danced across the flexing muscles of his arms and shoulders. When he smiled at her, his grin was like a boast. She had never seen teeth so white and so perfect.</div>\r\n<div>&nbsp;</div>\r\n<div>Po saw the looks the two exchanged and frowned. Lara&rsquo;s father saw the same looks and smiled.</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<div>The meal was over. The metal traders, after many gestures of gratitude for the venison, withdrew to their camp at the far side of the island. Before he disappeared into the shadows, Tarketios looked over his shoulder and gave Lara a parting grin.</div>\r\n<div>&nbsp;</div>\r\n<div>While the others settled down to sleep, Larth stayed awake a while longer, as was his habit. He liked to watch the fire. Like all other things, fire possessed a numen that sometimes communicated with him, showing him visions. As the last of the embers faded into darkness, Larth fell asleep.</div>\r\n<div>&nbsp;</div>\r\n<div>Larth blinked. The flames, which had dwindled to almost nothing, suddenly shot up again. Hot air rushed over his face. His eyes were seared by white flames brighter than the sun.</div>\r\n<div>&nbsp;</div>\r\n<div>Amid the dazzling brightness, he perceived a thing that levitated above the flames. It was a masculine member, disembodied but nonetheless rampant and upright. It bore wings, like a bird, and hovered in midair. Though it seemed to be made of flesh, it was impervious to the flames.</div>\r\n<div>&nbsp;</div>\r\n<div>Larth had seen the winged phallus before, always in such circumstances, when he stared at a fire and entered a dream state. He had even given it a name, or more precisely, the thing had planted its name in his mind: Fascinus.</div>\r\n<div>&nbsp;</div>\r\n<div>Fascinus was not like the numina that animated trees, stones, or rivers. Those numina existed without names. Each was bound to the object in which it resided, and there was little to differentiate one from another. When such numina spoke, they could not always be trusted. Sometimes they were friendly, but at other times they were mischievous or even hostile.</div>\r\n<div>&nbsp;</div>\r\n<div>Fascinus was different. It was unique. It existed in and of itself, without beginning or end. Clearly, from its form, it had something to do with life and the origin of life, yet it seemed to come from a place beyond this world, slipping for a few moments through a breach opened by the heat of the dancing flames. An appearance by Fascinus was always significant. The winged phallus never appeared without giving Larth an answer to a dilemma that had been troubling him, or planting an important new thought in his mind. The guidance given to him by Fascinus had never led Larth astray.</div>\r\n<div>&nbsp;</div>\r\n<div>Elsewhere, in distant lands&mdash;Greece, Israel, Egypt&mdash;men and women worshiped gods and goddesses. Those people made images of their gods, told stories about them, and worshiped them in temples. Larth had never met such people. He had never even heard of the lands where they lived, and he had never encountered or conceived of a god. The very concept of a deity such as those other men worshiped was unknown to Larth, but the closest thing to a god in his imagination and experience was Fascinus.</div>\r\n<div>&nbsp;</div>\r\n<div>With a start, he blinked again.</div>\r\n<div>&nbsp;</div>\r\n<div>The flames had died. In place of intolerable brightness there was only the darkness of a warm summer night lit by the faintest sliver of a moon. The air on his face was no longer hot but fresh and cool.</div>\r\n<div>&nbsp;</div>\r\n<div>Fascinus had vanished&mdash;but not without planting a thought in Larth&rsquo;s mind. He hurried to the leafy bower beside the river where Lara liked to sleep, thinking to himself, It must be made so, because Fascinus says it must!</div>\r\n<div>&nbsp;</div>\r\n<div>He knelt beside her, but there was no need to wake her. She was already awake.</div>\r\n<div>&nbsp;</div>\r\n<div>&ldquo;Papa? What is it?&rdquo;</div>\r\n<div>&nbsp;</div>\r\n<div>&ldquo;Go to him!&rdquo;</div>\r\n<div>&nbsp;</div>\r\n<div>She did not need to ask for an explanation. It was what she had been yearning to do, lying restless and eager in the dark.</div>\r\n<div>&nbsp;</div>\r\n<div>&ldquo;Are you sure, Papa?&rdquo;</div>\r\n<div>&nbsp;</div>\r\n<div>&ldquo;Fascinus . . . ,&rdquo; He did not finish the thought, but she understood. She had never seen Fascinus, but he had told her about it. Many times in the past, Fascinus had given guidance to her father. Now, once again, Fascinus had made its will known.</div>\r\n<div>&nbsp;</div>\r\n<div>The darkness did not deter her. She knew every twist and turn of every path on the little island. When she came to the metal trader&rsquo;s camp, she found Tarketios lying in a leafy nook secluded from the others; she recognized him by his brawny silhouette. He was awake and waiting, just as she had been lying awake, waiting, when her father came to her.</div>\r\n<div>&nbsp;</div>\r\n<div>At her approach, Tarketios rose onto his elbows. He spoke her name in a whisper. There was a quiver of something like desperation in his voice; his neediness made her smile. She sighed and lowered herself beside him. By the faint moonlight, she saw that he wore an amulet of some sort, suspended from a strap of leather around his neck. Nestled amid the hair on his chest, the bit of shapeless metal seemed to capture and concentrate the faint moonlight, casting back a radiance brighter than the moon itself.</div>\r\n<div>&nbsp;</div>\r\n<div>His arms&mdash;the arms she had so admired earlier&mdash;reached out and closed around her in a surprisingly gentle embrace. His body was as warm and naked as her own, but much bigger and much harder. She wondered if Fascinus was with them in the darkness, for she seemed to feel the beating of wings between their legs as she was entered by the thing that gave origin to life.</div>\r\n<div>&nbsp;</div>\r\n<div>Copyright &copy; 2007 by Steven Saylor. All rights reserved.</div>', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(24) NOT NULL,
  `nama_lengkap` varchar(256) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `foto_user` varchar(128) DEFAULT NULL,
  `type` int(24) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `username`, `password`, `foto_user`, `type`, `active`) VALUES
(1, 'Master Admin', 'masteradmin', '$2y$10$ZXFSTjgObZyD0eneOiKAke6uSy24IjLdsY85nQLhB06qGmXpVt60K', '', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id_alumni`),
  ADD UNIQUE KEY `nim_alumni` (`nim_alumni`);

--
-- Indeks untuk tabel `kuesioner`
--
ALTER TABLE `kuesioner`
  ADD PRIMARY KEY (`id_kuesioner`),
  ADD UNIQUE KEY `id_alumni` (`id_alumni`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alumni`
--
ALTER TABLE `alumni`
  MODIFY `id_alumni` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kuesioner`
--
ALTER TABLE `kuesioner`
  MODIFY `id_kuesioner` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
