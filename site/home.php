<?php 
    require 'header.php'; 
    header('Access-Control-Allow-Origin: *');  
?>
        <div id="content">
            <div id="preTweets">
                <div id="presentation">
                    <p id="presentationF1"> 
                    La Formule 1 est généralement abrégée en F1, qui est une discipline des sports mécaniques et est considérée comme la principale catégorie de ce sport. Au fil des ans, elle s'est propagé dans le monde entier, avec les Jeux Olympiques et la Coupe du Monde de Football, est devenue l'un des événements sportifs les plus connus et célèbres.
                    <br>
                    Depuis 1950, le Championnat du monde d'auto est organisé chaque année et depuis 1958, le championnat du monde est proposé aux constructeurs automobiles. La compétition est basée sur le Grand Prix, avec des courses de monoplaces sur des routes fermées en permanence, mais parfois sur des villes et des circuits temporaires comme Monaco, Singapour et Bakou..
                    <br>
                    Ce sport est géré par la Fédération internationale de l'automobile (FIA), géré par la Formula One Authority (FOA) et une série de sociétés satellites contrôlées par Liberty Media. Après l'ère des artisans dans les années 1960 et 1970, il a progressivement attiré de grands constructeurs automobiles mondiaux, qui y ont investi beaucoup d'argent, espérant utiliser les médias pour signaler d'éventuels succès. 
                    La Formule 1 est considérée comme une vitrine technologique pour l'industrie automobile. La voiture expérimente des innovations technologiques, parfois dérivées de la technologie spatiale, qui peuvent ensuite être appliquées aux voitures de série. En plus de la compétition, le terme de Formule 1 représente également toutes les règles techniques de la monoplace que la FIA met à jour chaque année.
                    <br>
                    Ces règles sont très strictes sur la taille de la voiture, la cylindrée du moteur et la technologie utilisée. Ils ont également défini des mesures de sécurité automobile pour assurer la protection du conducteur. Les voitures monoplaces qui satisfont aux exigences du règlement de la Formule Un sont généralement mentionnées dans les conditions générales de la Formule Un.
                    </p>
                    <p id="presentationSite">
                    Notre site web vise et a pour objectif d'être votre meilleur accompagnant lors de chaque week-end de grand-prix, il vise aussi à être le site web qui vous permettra de ne plus avoir à dire à vos amis et aux autres passionnés comme vous un certain "tu vois je te l'avais dit qu'y aura ce classement à la fin de la course", votre pronostic se chargera de le faire pour vous !
                    <br>
                    Ce site vous permettra de voir le classement de chaque pilote, constructeur mais aussi joueur et surtout il vous permettra donc de pronostiquer chaque course que vous souhaitez pour que vous puissiez vous comparer et vivre pleinement avec tout les passionnés comme vous chaque saison de Formule 1.
                    <br>
                    Pour que ce projet puisse atteindre cet objectif, nous nous sommes inspirés du site officiel de la Formule 1 car qui d'autre que le site de la discipline elle-même, pourra vous faire ressentir et ressortir ce monde si exclusif qu'est la Formule 1.
                    <br>
                    Mais à la différence du site officiel, nous avons décidé d'opter pour un site plus épuré et simplifié avec des fonctionnalités simples mais qui va à l'essentiel pour pouvoir garder cette authenticité et ne pas sentir une si grande différence entre le site d'une entreprise de plusieurs milliards de dollars et le site d'un passionné.
                    </p>
                </div>
                <div id="tweets">
                    <a class="twitter-timeline" data-width="425" data-height="400" data-theme="light" href="https://twitter.com/F1?ref_src=twsrc%5Etfw">Tweets by F1</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
            </div>
                
            <div id="classement">
                <script src="js/classementCourse.fetch.js"></script>
                <h2> Classement </h2>
                <ul id="classementGeneral">
                    <li id="pilotes"> Pilotes </li>
                    <li id="constructeurs"> Constructeurs </li>
                    <li id="joueurs"> Joueurs </li>
                </ul>
                <table id="tablePilote"></table>
                <table id="tableConstructeur"></table>
                <table id="tableJoueur"></table>
            </div>
        </div>    
<?php require_once 'footer.php'; ?>
