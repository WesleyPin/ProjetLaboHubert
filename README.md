# ProjetLaboHubert
Le projet du laboratoire de M.Hubert (GeePs).

Pour mettre à jour php en version 7.2 sur votre VM :
https://linuxhostsupport.com/blog/how-to-install-php-7-2-on-debian-9/

Paquets supplémentaires à installer

php7.2-xml et php7.2-curl

Pour les dossiers 'annuaire/src/Entity' et 'annuaire/src/Repository' créer les liens symboliques :
1) 'cd annuaire/src/Entity'
2) 'ln -s ../../../trombinoscope/src/Entity/*.php ./'
3) 'cd ../Repository'
4) 'ln -s ../../../trombinoscope/src/Repository/*.php ./'

