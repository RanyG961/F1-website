/* const getCircuit = async function () {
    try {
        let dataCircuits = await fetch(
            "https://ergast.com/api/f1/current.json"
        )
        if (dataCircuits.ok) {
            let circuits = await dataCircuits.json()
            // console.log(circuits)

            let circuit = document.getElementById("listeCircuits")
            let liste_Circuits = circuits.MRData.RaceTable
            let raceID
            // console.log(liste_Circuits)
            circuit.innerHTML = ""

            let select = document.createElement("select")
            select.setAttribute("id", "liste")

            circuit.appendChild(select)

            for (let i = 0; i < liste_Circuits.Races.length; i++) {
                let option = document.createElement("option")

                option.innerHTML = liste_Circuits.Races[i].raceName
                option.value = liste_Circuits.Races[i].raceName

                raceID = liste_Circuits.Races[i].round
                console.log(raceID)

                select.appendChild(option)
            }
            //let selected = document.getElementById("liste")

            /* let circuitID = selected.options[selected.selectedIndex].value
            console.log("Le circuit choisit est : " + circuitID)
            return circuitID */
            /* return select
           
        } else {
            console.error("Retour du serveur : ", dataCircuits.status)
        }
    } catch (e) {
        console.log(e)
    }
 } */

function getCircuit() 
{

    fetch("https://ergast.com/api/f1/current.json").then(function(dataCircuits){
        return dataCircuits.json()
    }).then(function(dataCircuits){
            let circuits = dataCircuits
            // console.log(circuits)

            let circuit = document.getElementById("listeCircuits")
            let liste_Circuits = circuits.MRData.RaceTable
            let raceID
            // console.log(liste_Circuits)
            circuit.innerHTML = ""

            let select = document.createElement("select")
            select.setAttribute("id", "liste")

            circuit.appendChild(select)

            for (let i = 0; i < liste_Circuits.Races.length; i++) {
                let option = document.createElement("option")

                option.innerHTML = liste_Circuits.Races[i].raceName
                option.value = liste_Circuits.Races[i].raceName

                raceID = liste_Circuits.Races[i].round

                select.appendChild(option)
            }
            let selected = document.getElementById("liste")
            
            /* let circuitID = selected.options[selected.selectedIndex].value
            console.log("Le circuit choisit est : " + circuitID)
            return circuitID */
    }).catch(function (error){
        console.error(error)
    })
}

const getPilotes = async function () {
    try {
        let dataPilotes = await fetch(
            "https://ergast.com/api/f1/2019/drivers.json"
        )
        if (dataPilotes.ok) {
            let results = await dataPilotes.json()

            let result = document.getElementById("listePilote")
            let tablePilote = results.MRData.DriverTable
            // console.log(tablePilote)
            result.innerHTML = ""

            let ul = document.createElement("ul")
            ul.classList.add("container")
            result.appendChild(ul)

            for (let i = 0; i < tablePilote.Drivers.length; i++) {
                let li = document.createElement("li")

                li.innerHTML = tablePilote.Drivers[i].familyName

                li.classList.add("draggable")
                li.setAttribute("draggable", "true")

                ul.appendChild(li)
            }

            let draggables = document.querySelectorAll(".draggable")
            // console.log(draggables)

            let containers = document.querySelectorAll(".container")

            draggables.forEach((draggable) => {
                draggable.addEventListener("dragstart", () => {
                    draggable.classList.add("dragging")
                    // console.log("Drag start test")
                })

                draggable.addEventListener("dragend", () => {
                    draggable.classList.remove("dragging")
                })
            })

            containers.forEach((container) => {
                container.addEventListener("dragover", (e) => {
                    /* console.log("drag over") */
                    e.preventDefault()

                    let afterElement = getDragAfterElement(
                        container,
                        e.clientY
                    )
                    let draggable = document.querySelector(".dragging")

                    if (afterElement == null) {
                        container.appendChild(draggable)
                    } else {
                        container.insertBefore(draggable, afterElement)
                    }
                })
            })
        }
    } catch (e) {
        console.log(e)
    }
}

function getDragAfterElement(container, y) {
    let draggableElements = [
        ...container.querySelectorAll(".draggable:not(.dragging)"),
    ]

    return draggableElements.reduce(
        (closest, child) => {
            let box = child.getBoundingClientRect()
            let offset = y - box.top - box.height / 2
            // console.log(offset)

            if (offset < 0 && offset > closest.offset) {
                return {
                    offset: offset,
                    element: child
                }
            } else {
                return closest
            }
        }, {
            offset: Number.NEGATIVE_INFINITY
        }
    ).element
}

function sendData(form, circuit)
{
    form.addEventListener("submit", function (e) 
    {
        e.preventDefault()

        let pilotes = document.querySelectorAll(".draggable")
        let pilotesSend = []
        let pilotesObjet = []
        let rang = 0

        for(let i = 0; i < pilotes.length; i++)
        {
            pilotesSend[i] = pilotes[i].innerText
            rang++
            pilotesObjet.push(
                {
                    Rang: rang,
                    Nom: pilotesSend[i],
                    Circuit: circuit
                }
            ) 
        }


        fetch("confirmation_prognosis.php", {
            method: 'post',
            body: JSON.stringify(pilotesObjet),
            headers: {
                "Content-Type": "application/json",
                'Accept': 'application/json'
            }
        }).then(response => response.text()).then(response => {
            console.log(response)
        }).catch(error => console.log(error))
    })
}

function main() {
    
    getPilotes()
    //let selected
    //selected = selected.options[selected.selectedIndex].value
    let form = document.querySelector("#formPrognosis")
    /* getCircuit().then((selected) => {
        console.log(selected)
        let circuit = selected.options[selected.selectedIndex].value
        console.log("La valeur retournée est :" + selected.selectedIndex)
        sendData(form, circuit)
    }) */

    getCircuit()
    //let selected = document.getElementById("liste")
    /* let circuit = selected.options[selected.selectedIndex].value
    console.log("La valeur retournée est :" + selected.selectedIndex) */
    //console.log(selected)
    document.addEventListener('DOMContentLoaded', function() {
        let selected = document.getElementById("liste")
        console.log(selected)
     }, false);
}


window.onload = main

