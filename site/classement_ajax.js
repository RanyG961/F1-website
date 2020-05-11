function generateRanking(races) {
    let contestant = {}
    let contestants_array = []

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
    // console.log(contestant)
    // console.log(contestants_array)
    return contestants_array
}

function generateTableHead(table, data)
{
    let thead = table.createTHead()
    let row = thead.insertRow()

    for(let key of data)
    {
        let th = document.createElement("th")
        let text = document.createTextNode(key)

        th.appendChild(text)
        row.appendChild(th)
    }
}

function generateTable(table, data) {
    for (let element of data) 
    {
        let row = table.insertRow();
        for (key in element) 
        {
            let cell = row.insertCell();
            let text = document.createTextNode(element[key]);
            cell.appendChild(text);
        }
    }
  }


function main() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let rep = JSON.parse(this.responseText)
            var classements = generateRanking(rep.MRData.RaceTable.Races)

            const table = document.querySelector("table")

            let titre = []

            classements.forEach(function(classement, rang) 
            {
                var pilote = Object.assign({}, classement.Driver)
                //console.log(`Rang : ${rang + 1} - ${pilote.permanentNumber}  ${pilote.givenName} ${pilote.familyName} - Points : ${classement.points}`)

                titre.push({
                        Rang: rang+1,
                        Numéro : pilote.permanentNumber,
                        Pilote:  pilote.givenName + " "  + pilote.familyName,
                        Points: classement.points,
                        Constructeur: classement.Constructor.name
                    })
            })

            let data = Object.keys(titre[0])

            generateTable(table, titre)
            generateTableHead(table, data)
        }
    }

    xhttp.open("GET", "http://127.0.0.1:8000/site/php_ajax.php", true);
    xhttp.send(null);
}

window.onload = main
