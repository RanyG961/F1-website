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
        if(key == "Points" || key == "Rang" || key == "Numéro"){
            th.setAttribute("class", "center-title")
        }
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
            
            if(key == "Points"){
                let span = document.createElement("div")
                span.setAttribute("class", "center-cell points-red")
                span.innerHTML = element[key]
                cell.appendChild(span)
            }
            else{
                let span = document.createElement("div")
                span.setAttribute("class", "center-cell")
                span.innerHTML = element[key]
                cell.appendChild(span)
            }
        }
    }
}

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

const demandeClassement = async function()
{
    try
    {
        let dataCourses = await fetch("races_json/2019_races.json")
        let dataJoueurs = await fetch("races_json/position.json")

        if(dataCourses.ok && dataJoueurs.ok)
        {
            let rep = await dataCourses.json()
            let repJoueurs = await dataJoueurs.json()

            var classements = generateRanking(rep.MRData.RaceTable.Races)
            var classementsConstructeur = classements.classementConstructeur
            var classementsPilote = classements.classementPilote
            var classementsJoueur = generateRanking_joueurs(repJoueurs)

            // var table = document.querySelector("table")
            var tablePilotes = document.getElementById("tablePilote")
            var tableConstructeurs = document.getElementById("tableConstructeur")
            let tableJoueurs = document.getElementById("tableJoueur")

            let pilotes = document.getElementById("pilotes")
            let constructeurs = document.getElementById("constructeurs")
            let joueurs = document.getElementById("joueurs")

            affichagePilote(classementsPilote, tablePilotes)
            affichageConstructeur(classementsConstructeur, tableConstructeurs)
            affichageJoueurs(classementsJoueur, tableJoueurs)

            tablePilotes.style.display = "table"
            tableConstructeurs.style.display = "none"
            tableJoueurs.style.display = "none"

            constructeurs.onclick = function () {
                tableConstructeurs.style.display = "table"
                tablePilotes.style.display = "none"
                tableJoueurs.style.display = "none"
            }

            pilotes.onclick = function () {
                tablePilotes.style.display = "table"
                tableConstructeurs.style.display = "none"
                tableJoueurs.style.display = "none"
            }

            joueurs.onclick = function () {
                tableJoueurs.style.display = "table"
                tablePilotes.style.display = "none"
                tableConstructeurs.style.display = "none"
            }
        }
        else
        {
            console.error("Retour du serveur :", dataCourses.status)
        }
    }
    catch(e)
    {
        console.log(e)
    }
}

function affichageJoueurs(classementJoueurs, table)
{
    let titre = []

    classementJoueurs.forEach(function (classement, rang){
        titre.push(
            {
                Rang: rang + 1,
                Joueur: classement.Joueur,
                Points: classement.points
            }
        )
    })
    let data = Object.keys(titre[0])

    generateTable(table, titre)
    generateTableHead(table, data)
}

function generateRanking_joueurs(rep)
{
        let contestant = {} 
        let contestants_array = []
        let i

        for (i = 0; i < rep.length; i++) {
            let joueurs = rep[i].user_nickname

            let p_pilotID = rep[i].pronostic_pilotID
            let p_position = rep[i].pronostic_position
            let p_raceID = rep[i].pronostic_raceID

            let r_pilotID = rep[i].raceResultat_pilotID
            let r_position = rep[i].raceResultat_position
            let r_raceID = rep[i].raceResultat_raceID


            if ((p_pilotID === r_pilotID) && (p_position === r_position) && (p_raceID === r_raceID)) {

                if (typeof contestant[joueurs] === 'undefined') {
                    contestant[joueurs] = {
                        Joueur: joueurs,
                        points: 0
                    }
                }
                contestant[joueurs].points++
            }
        }

        for (let joueur in contestant) {
            contestants_array.push(
                contestant[joueur]
            )
        }

        contestants_array.sort((d1, d2) => {
            console.log(contestants_array)
            return d2.points - d1.points
        })

        return contestants_array
}


function main() {
    demandeClassement()
}

window.onload = main
