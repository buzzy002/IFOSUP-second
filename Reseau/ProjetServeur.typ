#set page(
  paper: "a4",
  margin: (x: 2.5cm, y: 2.5cm),
  fill: white,
  numbering: "1",
  number-align: center,
)

#set text(
  font: "New Computer Modern",
  size: 11pt,
  fill: rgb("#334155"),
)

#set par(
  justify: true,
  leading: 0.65em,
)

#set heading(numbering: (..nums) => {
  let values = nums.pos()
  if values.len() == 1 {
    none
  } else if values.len() == 2 {
    numbering("1", values.at(1))
  } else {
    numbering("1.1", values.at(1), values.at(2))
  }
})

// Heading styles
#show heading.where(level: 1): it => block(
  width: 100%,
  above: 1.5em,
  below: 0.8em,
)[
  #set text(
    size: 20pt,
    weight: "bold",
    fill: rgb("#0ea5e9"),
  )
  #it
]

#show heading.where(level: 2): it => block(
  width: 100%,
  above: 1.2em,
  below: 0.6em,
)[
  #set text(
    size: 16pt,
    weight: "bold",
    fill: rgb("#06b6d4"),
  )
  #it
]

#show heading.where(level: 3): it => block(
  width: 100%,
  above: 1em,
  below: 0.4em,
)[
  #set text(
    size: 13pt,
    weight: "semibold",
    fill: rgb("#334155"),
  )
  #it
]

// Code block styling
#show raw.where(block: true): it => block(
  width: 100%,
  fill: rgb("#f1f5f9"), // Very light gray background
  inset: 10pt,
  radius: 4pt,
  text(size: 9pt, it)
)

// Inline code styling
#show raw.where(block: false): it => box(
  fill: rgb("#f1f5f9"),
  inset: (x: 3pt, y: 0pt),
  outset: (y: 3pt),
  radius: 2pt,
  text(fill: rgb("#334155"), it)
)

// Custom file content block
#let file-block(filename, content) = {
  block(
    width: 100%,
    breakable: false,
  )[
    // File header
    #block(
      width: 100%,
      fill: rgb("#334155"),
      inset: (x: 10pt, y: 6pt),
      radius: (top: 4pt),
      above: 0pt,
      below: 0pt
    )[
      #set text(fill: white, size: 9pt, font: "New Computer Modern")
      #filename
    ]
    // File content
    #block(
      width: 100%,
      fill: rgb("#f1f5f9"),
      inset: 10pt,
      radius: (bottom: 4pt),
    )[
      #set text(size: 9pt, font: "New Computer Modern")
      #raw(content, lang: none, block: true)
    ]
  ]
}

// FRONT PAGE
#set page(
  margin: 0pt,
  numbering: none, 
)

#align(center + horizon)[
  #block(
    width: 100%,
    inset: 2em,
  )[
    #text(size: 14pt, weight: "semibold")[
      IFOSUP WAVRE \
      Bachelier en informatique orientation développement d'applications
    ]
    
    #v(0.5em)
    
    #text(size: 12pt)[
      5IBRE-1 — Bases des réseaux \
      Année académique 2025-2026
    ]
  ]
  
  #v(3em)
  
  #block(
    width: 85%,
  )[
    #text(
      size: 28pt, 
      weight: "bold", 
      fill: rgb("#0ea5e9")
    )[
      Laboratoire de réseau
    ]
    
    #v(1em)
    
    #text(
      size: 18pt,
      fill: rgb("#06b6d4")
    )[
      Serveur Linux Multi-services
    ]
  ]
  
  #v(4em)
  
  #line(length: 60%, stroke: 2pt + rgb("#0ea5e9"))
  
  #v(4em)
  
  #block(
    width: 100%,
  )[
    #text(size: 13pt)[
      *Soumis par:* \
      Maes Gilles \
      Warez Michael
    ]
    
    #v(2em)
    
    #text(size: 13pt)[
      *Professeur:* \
      Cédric Vanconingsloo 
    ]
    
    #v(2em)
    
    #text(size: 13pt)[
      *Date:* \
      25 novembre 2025
    ]
  ]
]

#pagebreak()

#set page(
  margin: (x: 2.5cm, y: 2.5cm),
  numbering: "1",
  number-align: center,
)

#counter(page).update(1)

// TABLE OF CONTENTS

#outline(
  title: "Table of Contents",
  depth: 3, 
  indent: auto,
)

#pagebreak()

// MAIN CONTENT

= Introduction

Ce projet a pour but de concevoir et déployer un serveur Linux complet dans une machine virtuelle. Ce serveur aura un stockage fiable, des partages de fichier multi-protocoles et une interface à distance.


= Commandes utilisées
== Préparation d'une machine virtuelle

Installation d'une machine virtuelle via VirtualBox avec Ubuntu. \
Dans la configuration VirtualBox, mettre le réseau en "réseau interne NAT"


== Installation de base

Mise à jour du système et installation du service SSH sécurisé.

```sh
# Mise à jour du système et installation de SSH
sudo apt update && sudo apt upgrade -y
sudo apt install openssh-server -y
reboot

# Vérification et activation du service SSH
sudo systemctl status ssh
sudo systemctl enable ssh
sudo systemctl status ssh
```


== configuration IP (Netplan)

Avec Netplan, nous allons pouvoir assurer une accessibilité constante du serveur via une adresse IP fixe.


```sh
sudo nano /etc/netplan/50-netcfg.yaml
```
#file-block("/etc/netplan/50-netcfg.yaml",
"Network :
  version: 2
  ethernets:
    enp0s3 :
      dhcp4 : no
      addresses:
        - 192.168.56.30/24
      nameservers:
        addresses: [8.8.8.8, 1.1.1.1]
"
)

```sh
# Application de la configuration faite précedemment
sudo netplan apply

# Si problème de droit, ajouter les droits à netplan
sudo chmod 600 /etc/netplan/01-netcfg.yaml
sudo chmod 600 /etc/netplan/50-cloud-init.yaml

# Après ajout des droits, réessayer l'application de la configuration
sudo netplan apply
```


== Préparation des disques

Avec la VM éteinte, aller dans VirtualBox, puis dans configuration stockage, Contrôleur SATA, ADD Hard Disk, Créer, 4 Disk de même taille, sélectionner les 4 disks et les ajouter. \
Ensuite, cocher l'option branchable à chaud (cela permet de débrancher et rebrancher un disque sans éteindre le serveur).

Création des partitions RAID sur chaque disque. Elles doivent être de type LINUX RAID

```sh
sudo fdisk /dev/sdb
sudo fdisk /dev/sdc
sudo fdisk /dev/sdd
sudo fdisk /dev/sde
```

Pour les 4 commandes, suivre ces options de `fdisk` :
1. `n -> new partition`
2. `p -> primary`
3. `1 -> numero 1`
4. `ENTER`
5. `ENTER`
6. `t -> changer le type`
7. `fd -> Linux RAID`
8. `w -> write and quit`

```sh
# Vérification si les disks sont bien présents
lsblk
```


== Création du RAID 10
=== Pourquoi en RAID 10 et pas dans un autre RAID ?

Le RAID 10 permet est plus rapide pour récupérer des données ainsi que pour la lecture et réécriture de celles-ci.

Par exemple, le RAID 5 est plus lent car il nécessite un calcul de parité.


=== Installation du RAID 10

```sh
# Creation d'un utilitatire de gestion et surveillance des périphériques
sudo apt install mdadm -y

# Création du RAID 10
sudo mdadm --create --verbose /dev/md0 --level=10 --raid-devices=4 \ /dev/sdb /dev/sdc /dev/sdd /dev/sde

# Vérification du statut des disks physiques
cat /proc/mdstat

# Affichage les détails complets du raid
sudo mdadm --detail /dev/md0
```


== Formatage du RAID et montage

Cela a pour but de paramétrer les systèmes de fichier ainsi que la création d'un ou plusieurs répertoires.

```sh
sudo mkfs.ext4 /dev/md0
sudo mkdir /data
sudo mount /dev/md0 /data
```


== Montage automatique (fstab)

Le montage automatique via fstab est la méthode standard et universelle dans les systèmes Linux pour monter des sytèmes de fichiers au démarrage. Le fichier `/etc/fstab` contient les informations nécessaires pour que le système sache quelle partition monter et à quel endroit plus précisément.

```sh
# Affichage des informations d'identification du système de fichiers présents sur le RAID md0
sudo blkid /dev/md0

# Création d'un backup de fstab au cas où
sudo cp /etc/fstab /etc/fstab.bak

# Identification du UUID du disque de données avec le label Data
lsblk -f 

# Création du point de montage
sudo mkdir -p /mnt/data

# Modification du fichier fstab
sudo nano /etc/fstab
```

On ajoute la ligne suivante à la fin du fichier

#file-block("/etc/fstab",
"UUID=12345678-abcd-1234-abcd-1234567890ab    /mnt/data    ext4    defaults    0    2"
)

Le fichier `fstab` ressemblera à ceci :

#file-block("/etc/fstab",
"# /etc/fstab: static file system information
# ... (Other comments) ...

UUID=98765432-abcd-1234-abcd-9876543210ab /               ext4    errors=remount-ro 0       1

# /boot/efi was on /dev/sda1 during installation
UUID=A1B2-C3D4  /boot/efi       vfat    utf8            0       1
/swapfile                                 none            swap    sw              0       0

# The mount for the disk data we added
UUID=12345678-abcd-1234-abcd-1234567890ab    /mnt/data    ext4    defaults    0    2
")


```sh
# Montage de tout ce qui est listé dans fstab et qui n'est pas encore monté
sudo mount -a 
```

- *Si la commande réussit* sans afficher de message d'erreur, c'est parfait ! Le disque est monté et le sera automatiquement après chaque démarrage
- *Si on obtient une erreur*, il y a une faute de frappe ou une erreur de syntaxe. Il faut corriger le fichier `fstab`

== Sauvegarde de la configuration RAID

```sh
# Ajout de la configuration RAID
sudo mdadm --detail --scan >> /etc/mdadm/mdadm.conf

# Mise à jour du système de fichier chargé en mémoire au démarrage avant le montage du système de fichiers principal
sudo update-initramfs -u
```


== Installation de Cockpit (interface web)

Cockpit est une inferface graphique pour les serveurs linux pour la gestion de système de fichiers via un navigateur web

```sh
sudo apt install cockpit -y
sudo systemctl enable --now cockpit.socket

# Ajout de l'accessibilité depuis l'extérieur
sudo ufw allow 9090/tcp
```


=== Pourquoi le choix du port 9090 ?

Le choix du port 9090 est le choix par défaut et évite ainsi tout conflit avec d'autre port connus :
- Port 80 -> HTTP
- Port 443 -> HTTPS
- Port 22 -> SSH
- etc


== Setup du pare-feu ufw

Réglage du pare-feu avec tous ses accès ainsi que le partage de fichiers

```sh
sudo ufw allow OpenSSH
sudo ufw allow 80/tcp
sudo ufw allow 139,445/tcp
sudo ufw allow 21/tcp
sudo ufw allow 20/tcp
sudo ufw allow 30000:31000/tcp
sudo ufw allow 9090/tcp
sudo ufw enable
```


== Gestion des utilisateurs

Création des utilisateurs ainsi que les droits pour le partage de fichiers

```sh
# Création de l'utilisateur admin avec les droits d'administration
sudo adduser admin && sudo usermod -aG sudo admin

# Création des 3 autres utilisateurs
sudo adduser rocky
sudo adduser anne
sudo adduser anonyme

# Création d'un groupe et ajout de rocky et anne
sudo groupadd partage
sudo usermod -aG partage rocky && sudo usermod -aG partage anne

# Vérification que tout a fonctionné
cat /etc/group
```


== Création des différents répertoires

```sh
sudo mkdir -p /data/publique /data/data /www

# Tout le monde peut lire, écrire et exécuter dans le dossier publique
sudo chmod 777 /data/publique

#rocky et tous les membres du groupe partage peuvent interragir
sudo chown rocky:partage /data/data

# Accès au répertoire sans permission
sudo chmod 770 /data/data

# Changement du propriétaire et le groupe du répertoire pour rocky
sudo chown rocky:rocky /www

# rocky gère le contenu du site web, mais les autres utlisateurs ne peuvent pas le modifier
sudo chmod 755 /www
```


== Installation et configuration de Samba

Samba est un logiciel qui permet de partager les fichiers sous un serveur linux.

```sh
sudo apt install samba

# Configuration de samba
sudo nano /etc/samba/smb.conf
```

#file-block("/etc/samba/smb.conf",
"[public]
path = /data/publique
browseable = yes
read only = yes
guest ok = yes
force user = nobody

[data]
path = /data/data
browseable = yes
read only = no
valid users = rocky
write list = rocky
read list = anne

[www]
path = /www
valid users = rocky
read only = no
browseable = no
")

```sh
# Définition des mots de passe de chaque utilisateur
sudo smbpasswd -a rocky
sudo smbpasswd -a anne
sudo smbpasswd -a admin

# Redémarrage du service Samba pour appliquer les modifications
sudo systemctl restart smdb
```


== Installation et configuration du serveur FTP (vsftpd)

vsftpd est un logiciel qui permet le transfert de fichiers sécurisé

```sh
sudo apt install vsftpd

# Configuration de vsftpd
sudo nano /etc/vsftpd.conf
```

#file-block("/etc/vsftpd.conf",
"anonymous_enable=NO # Désactive l’accès anonyme
local_enable=YES # Activation des utilisateurs locaux
write_enable=YES # Autorise la modification
chroot_local_user=YES # Accès au répertoire de base
local_root=/www # Accès à la page d’accueil
pasv_enable=YES # Active le mode passif (indispensable pour que les pares-feu fonctionnent correctement)
pasv_min_port=3000 # limitation de ports au minimum
pasv_max_port=3100 # limitation de ports au maximum
")

```sh
# Redémarrage du service vsftpd pour appliquer les modifications
sudo systemctl restart vsftpd
```


== Installation et configuration du serveur web Apache

Apache HTTP Server (souvent simplement appelé Apache) est un logiciel de serveur web libre et open-source. C'est l'un des logiciels de serveur web les plus utilisés au monde.

```sh
sudo apt install apache2

# Vérification du status du service apache2
sudo systemctl status apache2

# Configuration d'apache
sudo nano /etc/apache2/sites-available/site.conf
```

#file-block("/etc/apache2/sites-available/site.conf",
"<VirtualHost *:80>
    ServerAdmin webmaster@localhost
    DocumentRoot /www

    <Directory /www>
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>
")

```sh
# Désactivation du par défaut d'Apache
sudo a2dissite 000-default.conf

# Activation du nouveau site
sudo a2ensite site.conf

# Activation du module de réécriture d'URL
sudo a2enmod rewrite

# Redémarrage du service apache pour appliquer les modifications
sudo systemctl reload apache2
```

= Conclusion

Ce projet met en place un serveur Ubuntu complet, fonctionnel et sécurisé intégrant :
- Un stockage fiable en RAID 10
- Une organisation claire des utilisateurs et permissions
- Plusieurs services essentiels (FTP, Samba, Apache, Cockpit)
- Une configuration réseau statique
- Un pare-feu correctement réglé

L’ensemble constitue une architecture serveur stable et adaptée à un environnement professionnel ou pédagogique. Des améliorations futures pourraient inclure le back up de données via BTRFS, l’automatisation via des scripts, la surveillance avancée, ou encore l’intégration de services supplémentaires.

#pagebreak()

// SITOGRAPHIE

= Sitographie

#set par(hanging-indent: 1.5em, first-line-indent: 0em)

+ Cockpit Project. (n.d.). Cockpit documentation. \
  #link("https://cockpit-project.org/guide/latest")[https://cockpit-project.org/guide/latest]

+ Kernel.org. (n.d.). mdadm – RAID management tool. \
  #link("https://raid.wiki.kernel.org/index.php/Mdadm")[https://raid.wiki.kernel.org/index.php/Mdadm]

+ Raid Calculator \
  #link("https://www.raid-calculator.com/")[https://www.raid-calculator.com/]

+ Man7.org. (n.d.). mdadm(8) — Linux manual page. \
  #link("https://man7.org/linux/man-pages/man8/mdadm.8.html")[https://man7.org/linux/man-pages/man8/mdadm.8.html]

+ Netplan.io. (n.d.). Netplan documentation. \
  #link("https://netplan.readthedocs.io")[https://netplan.readthedocs.io]

+ Samba Team. (n.d.). Samba documentation. \
  #link("https://www.samba.org/samba/docs/")[https://www.samba.org/samba/docs/]

+ The Apache Software Foundation. (n.d.). Apache HTTP Server documentation. \
  #link("https://httpd.apache.org/docs/")[https://httpd.apache.org/docs/]

+ Ubuntu. (n.d.). Ubuntu Server documentation. \
  #link("https://ubuntu.com/server/docs")[https://ubuntu.com/server/docs]

+ Ubuntu. (n.d.). UFW — Uncomplicated Firewall. \
  #link("https://help.ubuntu.com/community/UFW")[https://help.ubuntu.com/community/UFW]

+ vsftpd Project. (n.d.). vsftpd — Very Secure FTP Daemon. \
  #link("https://security.appspot.com/vsftpd.html")[https://security.appspot.com/vsftpd.html]

+ VirtualBox. (n.d.). VirtualBox User Manual. \
  #link("https://www.virtualbox.org/manual/")[https://www.virtualbox.org/manual/]

+ Man7.org. (n.d.). vsftpd.conf(5) — Linux manual page. \
  #link("https://man7.org/linux/man-pages/man5/vsftpd.conf.5.html")[https://man7.org/linux/man-pages/man5/vsftpd.conf.5.html]

+ Man7.org. (n.d.). smb.conf(5) — Linux manual page. \
  #link("https://man7.org/linux/man-pages/man5/smb.conf.5.html")[https://man7.org/linux/man-pages/man5/smb.conf.5.html]

+ Claude AI \
  #link("https://claude.ai")[https://claude.ai/new]