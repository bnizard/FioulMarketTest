# FioulMarketTest

Première partie : Création d'une commande permettant l'import d'un fichier csv de 200000 élements

Commande : php app/console import:prices ../prices.csv 

Commande lancée avec time pour 200000 éléments (Variable entre 1m30 et 2m)

![capture du 2017-07-02 17-46-09](https://user-images.githubusercontent.com/7196430/27771437-94e063a4-5f4e-11e7-9296-8a038b8ed072.png)

On a bien les 200000 éléments en bdd

![capture du 2017-07-02 17-47-12](https://user-images.githubusercontent.com/7196430/27771455-d3baea40-5f4e-11e7-89aa-a80888b93a9f.png)

Deuxieme partie : Créer une API REST afin d'extraire des prix d'un ID code postal entre 2 dates

Utilisation de FosRestBundle couplé à JMS SerializerBundle.

Création de la route Get suivante: 

http://127.0.0.1:8000/fiouls/{id}/{fdate}/{sdate}.{format} avec les paramètres suivant:
id: l'id code postal
fdate: première date de l'interval à chercher
sdate: deuxième date de l'interval à chercher
format: le format de la réponse (ex json)

Test avec Postman

requète valide

http://127.0.0.1:8000/api/fiouls/5561/2015-08-01/2015-08-17.json
