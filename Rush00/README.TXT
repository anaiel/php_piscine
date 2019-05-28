============================= Tips ============================

Pour les references a des fichiers dans le php, utiliser:
	$root = $_SERVER['DOCUMENT_ROOT']."/Rush0";
comme arborescence. (ex $root."/my_folder/my_file.php")
Dans le html ou les redirection avec header('Location: ...'), retourner
a la source avec '/Rush0/'

===================== Gestion des donnees =====================

Utilisateurs
	/private/users: serialized list of array with keys:
		passwd          	# hashed
		email
		lname           	# last name
		fname           	# first name
		id					# hashed email
		admin				# true if user is an admin

Paniers
	Paniers temporaires:
		$_SESSION['cart']	# array ref => quantity
	Paniers des Utilisateurs: /private/carts: serialize array from $_SESSION['cart']

Admin

Catalogue
	/catalog: ';' separated csv with:
		reference			# four digits
		name				# string, max 40 characteres
		descrition			# max 500 characteres (pas de ';')
		image				# image file path
		price				# float
		color				# string (separees par des ',' si plusieurs)
		categories			# ',' separated relevant categories

Superglobals
	$_SESSION
		logged_id			# hashed mail
		logged_fname
		logged_lname
		error_msg			# contains an array of messages is there was an error
		success_msg
		cart

======================== Architecture =========================

├── auteur
├── README.txt
├── index.php			    # page d’entree, permet connexion, navigation
├── catalog.php
├── install.php		    	# cree les tables, initialisation
├── print_error.php			# outputs the error message if set
├── print_success.php
├── header.php
├── footer.php
├── nav_bar.php
├── display_item.php		# function that generates a div for an item
├── style.css
├── catalog.csv
├── /admin				    # files pour la partie gestion: add/del, paniers valides, usrs
│   ├── admin.php
│   ├── add_admin.php
│	└── new_item.php
├── /images
│   └── /catalog
├── /private                # stocker les donnees
│   ├── users           	# serialized information about the users (for now: login, passwd)
│	└── carts				# users temporary carts
├── /perso					# personal pages (access to change password, validate basket)
│   └── main.php
└── /users					# user handling
	├── login.php
	├── create.php      	# create new account
	├── logout.php
	├── my_hash.php     	# hash function
	├── auth.php        	# function that returns true if user and password match
	└── user_exists.php 	# function that returns true if the email is already in the user database

================ DIAG ====================
[FIX ME] Le menu déroulant du header est caché sous le contenu
[FIX ME] Impossible de cliquer sur le menu deroulant avant qu'il ne disparaisse (pb de hover)
[FIX ME] cart.php not found
[FIX ME] perso/main.php not found
[FIX ME] Quand on ajoute un item au panier depuis une sous categorie, on est automatiquement redirigé vers all
[FIX ME] Install renvoie erreur si /private/users existe
[FIX ME] Decallage moche du header sur create.php
[FIX ME] logout erreur si un cart est deja enregistré
[FIX ME] telechargement du panier ne fonctionne pas
[FIX ME] Pas d'acces a la page de l'objet