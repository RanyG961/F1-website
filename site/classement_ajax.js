function generateRanking(races) {
    let contestant = {}
    let contestants_array = []
    let contestant_team = {}
    let contestantsTeam_array = []

    races.forEach(race => {
        let drivers = race.Results;
        drivers.forEach(driver => {
            let code = driver.Driver.code
            let points = parseInt(driver.points, 10)

            if (typeof contestant[code] === 'undefined') {
                contestant[code] = {
                    Constructor: driver.Constructor,
                    Driver: driver.Driver,
                    points: 0
                }
            }
            contestant[code].points += points
        })
    })

    for (var driver in contestant) {
        contestants_array.push(
            contestant[driver]
        )
    }

    contestants_array.sort((d1, d2) => {
        return d2.points - d1.points
    })

    contestants_array.forEach(function (classement, rang) {
        let constructeur = Object.assign({}, classement.Constructor)
        let code = constructeur.constructorId

        if (typeof contestant_team[code] === 'undefined') {
            contestant_team[code] = {
                Name: constructeur.name,
                Nationality: constructeur.nationality,
                points: 0
            }
        }

        if (constructeur.constructorId === constructeur.constructorId) {
            contestant_team[code].points += classement.points
        }
    })
    for (var constructeur in contestant_team) {
        contestantsTeam_array.push(
            contestant_team[constructeur]
        )
    }

    contestantsTeam_array.sort((d1, d2) => {
        return d2.points - d1.points
    })

    return { classementPilote: contestants_array, classementConstructeur: contestantsTeam_array }
}

function generateTableHead(table, data) {
    let thead = table.createTHead()
    let row = thead.insertRow()

    for (let key of data) {
        let th = document.createElement("th")
        let text = document.createTextNode(key)

        th.appendChild(text)
        row.appendChild(th)
    }
}

function generateTable(table, data) {
    for (let element of data) {
        let row = table.insertRow();
        for (key in element) {
            let cell = row.insertCell();
            let text = document.createTextNode(element[key]);
            cell.appendChild(text);
        }
    }
}

function affichageListeAnnee() {
    let test = document.getElementById("test")
    let date = new Date()
    let annee_fin = date.getFullYear()

    let annee_liste = document.createElement("ul")
    annee_liste.setAttribute("id", `annee-list`)

    test.appendChild(annee_liste)

    for (let annee = 2000; annee < annee_fin; annee++) {
        let li = document.createElement("li")

        li.setAttribute("id", `annee-list-${annee}`)
        li.setAttribute("class", `annee-list`)

        li.innerHTML = annee
        annee_liste.appendChild(li)
    }


    for (let annee = 2000; annee < annee_fin; annee++) {
        let li = document.getElementById(`annee-list-${annee}`)

        li.addEventListener('click', () => {
            let table_pilote = document.createElement("table")
            let table_constructeur = document.createElement("table")
            table_pilote.setAttribute("id", `table-pilote-${annee}`)
            table_constructeur.setAttribute("id", `table-constructeur-${annee}`)

            table_pilote.setAttribute("class", `table-pilote`)
            table_constructeur.setAttribute("class", `table-constructeur`)

            let to_remove = document.getElementsByClassName("annee-list")

            for (let annee_bis = 2000; annee_bis < annee_fin; annee_bis++) {
                let li_bis = document.getElementById(`annee-list-${annee_bis}`)
                let tp = document.getElementById(`table-pilote-${annee_bis}`)
                let tc = document.getElementById(`table-constructeur-${annee_bis}`)

                if (tp != null && annee_bis != annee) {
                    li_bis.removeChild(tp)
                    li_bis.removeChild(tc)
                }
                else if (annee_bis == annee && tp == null) {
                    li.appendChild(table_pilote)
                    li.appendChild(table_constructeur)

                    demandeClassement(annee, `table-pilote-${annee}`, `table-constructeur-${annee}`)
                }

            }
        })
    }


}

function demandeClassement(annee, table_pilote, table_constructeur) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var rep = JSON.parse(this.responseText)

            var classements = generateRanking(rep.MRData.RaceTable.Races)
            var classementsConstructeur = classements.classementConstructeur
            var classementsPilote = classements.classementPilote

            // var table = document.querySelector("table")
            var tablePilotes = document.getElementById(table_pilote)
            var tableConstructeurs = document.getElementById(table_constructeur)

            let pilotes = document.getElementById("pilotes")
            let constructeurs = document.getElementById("constructeurs")

            affichagePilote(classementsPilote, tablePilotes)
            affichageConstructeur(classementsConstructeur, tableConstructeurs)

            tablePilotes.style.display = "block"
            tableConstructeurs.style.display = "none"

            constructeurs.onclick = function () {
                tablePilotes.style.display = "none"
                tableConstructeurs.style.display = "block"
            }

            pilotes.onclick = function () {
                tableConstructeurs.style.display = "none"
                tablePilotes.style.display = "block"
            }
        }
    }

    xhttp.open("GET", `http://127.0.0.1:8000/site/php_ajax.php?annee=${annee}`, true);
    xhttp.send(null);
}


function main() {
    affichageListeAnnee()
}

window.onload = main

function affichagePilote(classementsPilote, table) {
    //console.log(classementsPilote)
    let titre = []

    classementsPilote.forEach(function (classement, rang) {
        var pilote = Object.assign({}, classement.Driver)
        //console.log(`Rang : ${rang + 1} - ${pilote.permanentNumber}  ${pilote.givenName} ${pilote.familyName} - Points : ${classement.points}`)
        titre.push
            (
                {
                    Rang: rang + 1,
                    Numéro: pilote.permanentNumber,
                    Pilote: pilote.givenName + " " + pilote.familyName,
                    Nationalité: pilote.nationality,
                    Constructeur: classement.Constructor.name,
                    Points: classement.points
                }
            )

    })
    let data = Object.keys(titre[0])

    generateTable(table, titre)
    generateTableHead(table, data)
}

function affichageConstructeur(classementsConstructeur, table) {
    //console.log(classementsConstructeur)
    let titre = []

    classementsConstructeur.forEach(function (constructeur, rang) {
        // console.log(constructeur)
        titre.push
            (
                {
                    Rang: rang + 1,
                    Constructeur: constructeur.Name,
                    Nationalité: constructeur.Nationality,
                    Points: constructeur.points
                }
            )
    })
    let data = Object.keys(titre[0])

    generateTable(table, titre)
    generateTableHead(table, data)
}
