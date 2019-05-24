# Piscine PHP

The Piscine PHP is a 2 weeks intensive program to learn the basics of PHP at the 42 computer science school. Exercices are grouped into "days", and each day has to be turned in within a specific timeframe; and during the two weekends, a bigger group projects, called a "rush", has to be completed.

I participated in the piscine between 19-05-20 and 19-06-02.

## Breakdown of the days

| Day | Start (08:42) | End (23:42) | Notions | Grade |
|-----|-------|-----|---------|-------|
| [00](#Day00) | 05-20 | 05-21 | HTML, CSS | 90 |
| [01](#Day01) | 05-20 | 05-22 | Basic PHP functionc | 85 |
| [02](#Day02) | 05-22 | 05-23 | RegExpr, files, curl | ⏳ |
| [03](#Day03) | 05-23 | 05-24 | PHP using a server (MAMP), superglobals | ⏳ |
| [04](#Day04) | 05-24 | 05-25 | User session, hash | 🚧 |

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
| 00 | Autre monde | ⏳ | |
| 01 | Autre temps | ⏳ | |
| 02 | La Loupe | ⏳ | |
| 03 | Who are you? | ⏳ | Blank spaces are actually a little trickier than a simple space character |
| 04 | Livre photos | ⏳ | |
| 05 | Dans le D'(e)ni | ✖️ | |
| 06 | Le parchemin | ✖️ | |

### Day 03

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
| 01 | phpinfo | ⏳ |
| 02 | print_get | ⏳ |
| 03 | cookie_crisp | ⏳ |
| 04 | raw_text | ⏳ |
| 05 | read_img | ⏳ |
| 06 | members_only | ⏳ |

### Day 04

New stadard php library functions:
* `file_exists`
* `file_put_contents`
* `serialize`
* `unserialize`

New session php library functions:
* `session_start`

New hash php library functions:
* `hash`

| # | Exercise | Status |
|---|----------|--------|
| 00 | session | ⏳ |
| 01 | create_account | ⏳ |
| 02 | modif_account | 🚧 |
| 03 | auth | ✖️ |
| 04 | 42chat | ✖️ |
