# Piscine PHP

The Piscine PHP is a 2 weeks intensive program to learn the basics of PHP at the 42 computer science school. Exercices are grouped into "days", and each day has to be turned in within a short timeframe; and during the two weekends, a bigger group project, called a "rush", has to be completed.

The piscine is the first step to access other web projects. Day 00 is about **HTML** and **CSS**, day 01 to 04 are to discover the **PHP** language, day 05 is about **MySQL**, and days 06 to 08 are about **object oriented programming** in php and day 09 is about **JavaScript** and **jQuery**.

![Web Branch](https://i.imgur.com/k7oFhWM.png)

I participated in the piscine between 19-05-20 and 19-06-02.

## Table of contents

1. [Breakdown of the days](#Breakdown-of-the-days)
2. [Rushes](#Rushes)

## Breakdown of the days

| Day | Start (08:42) | End (23:42) | Notions | Grade |
|-----|-------|-----|---------|-------|
| [00](#Day00) | 05-20 | 05-21 | HTML, CSS | 90 |
| [01](#Day01) | 05-20 | 05-22 | Basic PHP functionc | 85 |
| [02](#Day02) | 05-22 | 05-23 | RegExpr, files, curl | 60 |
| [03](#Day03) | 05-23 | 05-24 | PHP using a server (MAMP), superglobals | 100 |
| [04](#Day04) | 05-24 | 05-25 | User session, hash | 100 |
| [05](#Day05) | 05-27 | 05-28 | mySQL queries | 45 |
| [06](#Day06) | 05-28 | 05-29 | Object oriented programming (modular) | 44 |
| [07](#Day07) | 05-29 | 05-30 | Inheritance | 100 |
| [08](#Day08) | 05-30 | 05-31 | Traits | 78 |
| [09](#Day09) | 05-31 | 06-01 | JavaScript, jQuery, AJAX | 65 |

### Day00

Day 00 gives notions of HTML (table, divs, links) and css (responsive styling).

| # | Exercise | Notions | Status |
|---|----------|---------|--------|
| 00 | B.A.BA or home | Create a very basic HTML page with minimal CSS styling. | ✅ |
| 01 | Mendeleïev | Reproduce the periodic table. Uses tables and more advanced styling. | ✅ |
| 02 | Day of the 42 | Reproduce a given page. Img, div, links and more styling (with a dedicated .css file). | ✅ |
| 03 | L'agent se tasse | Make the periodic table responsive (width and font size). | ✅ |
| 04 | Sandwich SNCF | Drop down menu using HTML and CSS only, with the :hover selector. | ✅ |
| 05 | SCUMM | Create a scenario on the basis of the "Day of the 42" page with multiple HTML pages | ✖️ |

### Day01

Day 01 is a collection of short exercise to learn the syntax and some basic functions of the standard library of PHP. A big part of the exercises revolve around the use of arrays, which are handled differently than in C.

These are the relevant function that were used in these exercises: `array_filter`, `array_key_exists`, `array_merge`, `array_values`, `count`, `explode`, `fgets`, `feof`, `is_numeric`, `ksort`, `natcasesort`, `sort`, `strlen`, `trim`.

| # | Exercise | Status | Correction notes |
|---|----------|--------|------|
| 00 | HW | ✅ | |
| 01 | mlX | ✅ | |
| 02 | Au divin | ✅ | |
| 03 | ft_split | ✅ | |
| 04 | aff_param | ✅ | |
| 05 | epur_str | ✅ | |
| 06 | ssap | ✅ | |
| 07 | rostring | ✅ | |
| 08 | ft_is_sort | ✅ | It's only sorted one way |
| 09 | ssap - le retour - | ❌ | Numbers are sorted in numerical order, not ASCII |
| 10 | do_op | ✅ | |
| 11 | do_op_2 | ❌ | Not protected against rm -rf / Negative numbers are not handled correctly |
| 12 | search_it! | ✅ | |
| 13 | sing_it! | ✖️ | |
| 14 | L'agent se tâte | ✅ | |

### Day02

Day 02 explores regular expressions, handling files, and curl.

Here is a quick cheatsheet of the regular expressions metacharacters and flags that are useful to complete the exercises :

| `metacharacters` or *flags* | Effect |
|---|---|
| `[...]` | Either character within the brackets |
| `[^...]` | Any character but those between brackets |
| `+` | One or more of the preceding token |
| `?` | Zero or one of the preceding toker |
| `*` | Any number of the preceding token (greedy) |
| `*?` | Any number of the preceding token (non greedy) |
| `{int}` | Exact number of the preceding token |
| `{int1, int2}` | Between `int1` and `int2` of the preceding token |  
| `...-...` | Range of values |
| /`^...`/ | Match the begining of a line |
| /`...$`/ | Match the end of a line |
| `(...\|...)` | Either expression or the other |
| *i* | Case insensitive |
| *s* | Consider new line as any character |

Here are the new php function that are handy for these exercises :
* pcre library: `preg_match`, `preg_replace`, `preg_replace_callback`
* standard library: `fclose`, `fopen`, `fread`, `is_dir`, `is_file`, `mkdir`, `strtoupper`, `unpack`
* date library: `date`, `date_default_timezone_set`, `mktime`
* curl library: `curl_close`, `curl_exec`, `curl_init`, `curl_setopt`

| # | Exercise | Status | Correction notes |
|---|----------|--------|-------|
| 00 | Autre monde | ✅ | |
| 01 | Autre temps | ✅ | |
| 02 | La Loupe | ✅ | |
| 03 | Who are you? | ✅ | Blank spaces are apparently a little trickier than a simple space character |
| 04 | Livre photos | ✅ | |
| 05 | Dans le D'(e)ni | ✖️ | |
| 06 | Le parchemin | ✖️ | |

### Day03

Day 03 introduces the use of php with a server. It can be done either with the `php -S` command or with *MAMP Bitnami*.

Here are the relevant php functions: `base64_encode`, `header`, `phpinfo`, `readfile`, `setcookie`, `time`

| # | Exercise | Status |
|---|----------|--------|
| 00 | Dat vhost! | ✖️ |
| 01 | phpinfo | ✅ |
| 02 | print_get | ✅ |
| 03 | cookie_crisp | ✅ |
| 04 | raw_text | ✅ |
| 05 | read_img | ✅ |
| 06 | members_only | ✅ |

### Day04

Day04 furthers the use of servers with the creation of simple account features (create, login, logout, etc.) and introduces the need for security in storing information such as a password.

Relevant functions: `file_exists`, `file_put_contents`, `serialize`, `unserialize`, `session_start`, `hash`

| # | Exercise | Status | Correction notes |
|---|----------|--------|------------------|
| 00 | session | ✅ | |
| 01 | create_account | ✅ | |
| 02 | modif_account | ✅ | |
| 03 | auth | ✅ | |
| 04 | 42chat | ✅ | Password instead of login in the chat ! |

### Day05

Day 05 is a collection of MySQL queries, that get weirder with each exercise. We are presented with database without any context and must try to answer the exercises as best as we can. This day was corrected automatically (and so, the correction allows fr very little leeway), and correction stopped at the first error detected (that's why I have no idea whether the last exercise are correct or not).

| # | Exercise | Status | Correction notes |
|---|----------|--------|------------------|
| 00 | db_local | ✅ | |
| 01 | ft_table | ✅ | |
| 02 | Données en masse | ✅ | |
| 03 | Copieur! | ✅ | |
| 04 | Mise à joue, veuillez redémarrer | ✅ | |
| 05 | Petit nettoyage | ✅ | |
| 06 | Où est vinc'? | ✅ | |
| 07 | 42 is everywhere! | ✅ | |
| 08 | La belle époque | ✅ | |
| 09 | Court-tragemé | ❌ | I pushed a test version that doesn't at all match the instructions... |
| 10 | On est pas bien là ? | ❓ | |
| 11 | L'argent c'est capital | ❓ | |
| 12 | Pourquoi faire simple quand on veut faire compliqué? | ❓ | |
| 13 | Tu veux des maths? | ❓ | |
| 14 | Toi, tu vas relire... | ❓ | |
| 15 | C'est quoi ton phone? | ❓ | |
| 16 | Noël avant l'heure | ❓ | |
| 17 | Les mats - LE RETOUR | ❓ | |
| 18 | Y'a des limites quand même | ❓ | |
| 19 | Retour vers le futur | ❓ | |
| 20 | La totale | ❓ | |
| 21 | MD5? Non FT5! | ❓ | |

### Day06

Day 06 is the first step into object oriented programming. Unlike other days where the exercises are independant from one another and range from very easy to hardest, here each exercise is one part of a bigger project, which is to visualize a 3D object. For each exercise, we have to define a class with the necessary contructor and methods.
It also serves as an introduction to documenting code, which we hardly ever do at 42.

| # | Exercise | Status | Correction notes |
|---|----------|--------|------------------|
| 00 | La classe Color | ✅ | |
| 01 | La classe Vertex | ✅ | |
| 02 | La classe Vector | ✅ | |
| 03 | La classe Matrix | ❌ | Disputable because the subject isn't clear, but the mult method should not return a new matrix, but only modify the current matrix |
| 04 | La classe Camera | ✅ | |
| 05 | Les classes Triangle et Render | ✖️ | |
| 06 | Bonus : La classe Texture | ✖️ | |

### Day07

Day 07 dives into inheritance, and how classes interact. This is a quick series of simple exercises, quite fun to complete as they give the opportunity for a little role play in the universe of Westeros.

| # | Exercise | Status |
|---|----------|--------|
| 00 | Short and proud | ✅ |
| 01 | Words of honor | ✅ |
| 02 | Fireproofing | ✅ |
| 03 | Playing house | ✅ |
| 04 | His sister? Seriously? | ✅ |
| 05 | Winter is coming | ✅ |
| 06 | The wrong kind of pact | ✅ |

### Day08

Day 08 is a much more complete look at classes. Unlike other days, there is only one exercise, and the goal is to use every aspect of object oriented programming that has previously been studied to complete the assignment.
The assignment is to create a game, based in the universe of Warhammer 40000, where two players battle each other on a battlefield represented by a grid. There should be obstacles on the battlefield, the players should be able to have several ships, and ships should have different weapons. The game is played turn by turn, where at each turn each player can give orders (which modify the statistics of the ships or weapons), move their ships and then use the weapons.
This is a lot to do in less than 36 hours. I managed to have a grid with two ships with one weapon each. The ships can move (but their movement doesn't respect all the instructions), and the weapons can inflict damage on the opponent (I didn't handle the fact that an ennemy ship should be within range to be able to be shot at...). I slapped some very simple CSS onto that, and so, it remains what it is: a very crappy game, very slow (it doesn't use JS and I didn't have much time to think about performance, so the page reloads every time an action is performed), but the programming uses everything from classes to interfaces and abstract methods to static declarations.

![ASBITDGFOTGD41C](https://i.imgur.com/n6eRNLd.png)

| # | Exercise | Status |
|---|----------|--------|
| 00 | Awesome Starship Battles In The Dark Grim Future Of The Grim Dark 41st Century | 78 |

### Day09

The Last day of the piscine is a quick introduction to Javascript, jQuery and AJAX. The first 3 exercises must be completed once with JS, and then with jQuery.

| # | Exercise | Status | Notes |
|---|----------|--------|-------|
| 00 | Veuillez souffler dans le ballon | ✅ | |
| 00bis | Si jQuery, j’y vais aussi | ✅ | |
| 01 | It's over 9000 | ❌ | There's a couple edge cases I didn't take into account |
| 01bis | Si jQuery, j’y vais aussi | ❌ | Edge cases weren't fixed with jQuery... |
| 02 | To do or not to do | ✅ | |
| 02bis | Si jQuery, j’y vais aussi | ✅ | |
| 04 | AJAX, nettoyant surpuissant | ✖️ | |

## Rushes

| # | Start | End | Description | Grade |
|---|-------|-----|-------------|-------|
| 00 | 05-25 | 05-26 | Create a website for an online shop | 92 |
| 01 | 06-01 | 06-02 | Create a game | ✖️ |

### Rush00

The goal of the first rush is to create the website for an online shop. It should first look like a shop (so there's a bit of front-end to do) and also offer various posibilities, such as creating and managing an account, adding items to a shopping cart and then checking out your items, addind/managing users and commands from an administrator account, sorting items following different categories, etc.

We chose to do a furniture web store, based on a very famous scandinavian store (ours is basically a rot42 of the name and iems of aid store). There was little time and a lot to do. Unfortunately, I tried to do everything but a lot of the features don't actually work, which is very frustrating. It's something I took into account when I worked on Day08: I favoured making something small that works over doing something more extensive that doesn't work, and I think it paid off.

![Yauq](https://i.imgur.com/kxhZMWp.png)

### Rush01

With its reputation of being impossible to complete, I prefered finishing Day09 rather than launching myself into this project.

🚩 Final tally : one exhausted person, but a lot of fun was had over the course of these 13 days. I validated the Piscine which grants me access to the web projects.

<img align="right" src="https://i.imgur.com/rxex4Qm.png" />
