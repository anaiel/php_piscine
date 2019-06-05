# Piscine PHP

The Piscine PHP is a 2 weeks intensive program to learn the basics of PHP at the 42 computer science school. Exercices are grouped into "days", and each day has to be turned in within a short timeframe; and during the two weekends, a bigger group project, called a "rush", has to be completed.

[Web Branch](https://i.imgur.com/k7oFhWM.png)

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
| [07](#Day07) | 05-29 | 05-30 | Inheritance | ⏳ |
| [08](#Day08) | 05-30 | 05-31 | Traits | ⏳ |
| [09](#Day09) | 05-31 | 06-01 | JavaScript, jQuery, AJAX | ⏳ |

### Day00

| # | Exercise | Notions | Status |
|---|----------|---------|--------|
| 00 | B.A.BA or home | Create a very basic HTML page with minimal CSS styling. | ✅ |
| 01 | Mendeleïev | Reproduce the periodic table. Uses tables and more advanced styling. | ✅ |
| 02 | Day of the 42 | Reproduce a given page. Img, div, links and more styling (with a dedicated .css file). | ✅ |
| 03 | L'agent se tasse | Make the periodic table responsive (width and font size). | ✅ |
| 04 | Sandwich SNCF | Drop down menu using HTML and CSS only, with the :hover selector. | ✅ |
| 05 | SCUMM | Create a scenario on the basis of the "Day of the 42" page with multiple HTML pages | ✖️ |

### Day01

New standard php library functions:
* `array_filter`
* `array_key_exists`
* `array_merge`
* `array_values`
* `count`
* `explode`
* `fgets`
* `feof`
* `is_numeric`
* `ksort`
* `natcasesort`
* `sort`
* `strlen`
* `trim`

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

New pcre php library functions:
* `preg_match`
* `preg_replace`
* `preg_replace_callback`

New standard php library functions:
* `fclose`
* `fopen`
* `fread`
* `is_dir`
* `is_file`
* `mkdir`
* `strtoupper`
* `unpack`

New date php library functions:
* `date`
* `date_default_timezone_set`
* `mktime`

New curl php library functions:
* `curl_close`
* `curl_exec`
* `curl_init`
* `curl_setopt`

Regexp Cheatsheet:

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

| # | Exercise | Status | Correction notes |
|---|----------|--------|-------|
| 00 | Autre monde | ✅ | |
| 01 | Autre temps | ✅ | |
| 02 | La Loupe | ✅ | |
| 03 | Who are you? | ✅ | Blank spaces are actually a little trickier than a simple space character |
| 04 | Livre photos | ✅ | |
| 05 | Dans le D'(e)ni | ✖️ | |
| 06 | Le parchemin | ✖️ | |

### Day03

Instead of using PAMP as per the instructions, I used MAMP Bitnami.

New standard php library functions:
* `base64_encode`
* `header`
* `phpinfo`
* `readfile`
* `setcookie`

New date php library functions:
* `time`

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

New stadard php library functions:
* `file_exists`
* `file_put_contents`
* `serialize`
* `unserialize`

New session php library functions:
* `session_start`

New hash php library functions:
* `hash`

| # | Exercise | Status | Correction notes |
|---|----------|--------|------------------|
| 00 | session | ✅ | |
| 01 | create_account | ✅ | |
| 02 | modif_account | ✅ | |
| 03 | auth | ✅ | |
| 04 | 42chat | ✅ | Password instead of login in the chat ! |

### Day05

This day was corrected automatically, and correction stopped at the first error detected. That's why I have no idea whether the last exercise are correct.

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

| # | Exercise | Status |
|---|----------|--------|
| 00 | Short and proud | ⏳ |
| 01 | Words of honor | ⏳ |
| 02 | Fireproofing | ⏳ |
| 03 | Playing house | ⏳ |
| 04 | His sister? Seriously? | ⏳ |
| 05 | Winter is coming | ⏳ |
| 06 | The wrong kind of pact | ⏳ |

### Day08

| # | Exercise | Status |
|---|----------|--------|
| 00 | Awesome Starship Battles In The Dark Grim Future Of The Grim Dark 41st Century | ⏳ |

### Day09

| # | Exercise | Status |
|---|----------|--------|
| 00 | Veuillez souffler dans le ballon | ⏳ |
| 01 | It's over 9000 | ⏳ |
| 02 | To do or not to do | ⏳ |
| 03 | Si jQuery, j’y vais aussi | ⏳ |
| 04 | AJAX, nettoyant surpuissant | ✖️ |

## Rushes

| # | Start | End | Description | Grade |
|---|-------|-----|-------------|-------|
| 00 | 05-25 | 05-26 | Create a website for an online shop | 92 |

### Rush00

### Rush01
