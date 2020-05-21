const myInit = {
    method: "GET",
    headers: {
        "Content-Type": "application/json"
    },
    mode: "cors",
    cache: "default"
}

function getCircuit() {
    let req = new Request("../Admin/circuits_2019.json", myInit)
    fetch(req).then(function (dataCircuits) {
        return dataCircuits.json()
    }).then(function (dataCircuits) {
        let circuits = dataCircuits
        // console.log(circuits)

        let circuit = document.getElementById("listeCircuits")
        let liste_Circuits = circuits
        let raceID
        circuit.innerHTML = ""

        let select = document.createElement("select")
        select.setAttribute("id", "liste")

        circuit.appendChild(select)

        for (let i = 0; i < liste_Circuits.length; i++) {
            let option = document.createElement("option")
            raceID = liste_Circuits[i].id
            option.innerHTML = liste_Circuits[i].country
            option.value = raceID + " " + liste_Circuits[i].country

            select.appendChild(option)

        }
        sendData(select)

        select.addEventListener('change', () => {
            let circuitName = select.options[select.selectedIndex].value
            let mot = circuitName.split(" ")

            circuitName = mot[1]
            console.log(circuitName)
            let circuitID = mot[0]
            

            let res = fetch("affiche_prognosis.php", {
                method: 'post',
                body: JSON.stringify(circuitID),
                headers: {
                    "Content-Type": "application/json",
                    'Accept': 'application/json'
                }
            }).then(response => response.text()).then(response => {
                return response
            }).catch(error => console.log(error))

            res.then(pilotesPosition => {
                if (pilotesPosition) {
                    let result = document.getElementById("listePilote")
                    let tablePilote = JSON.parse(pilotesPosition)
                    //console.log(tablePilote[0].last_name)
                    result.innerHTML = ""

                    let ul = document.createElement("ul")
                    ul.classList.add("container")
                    ul.setAttribute("id", "pilotList")
                    result.appendChild(ul)

                    for (let i = 0; i < tablePilote.length; i++) {
                        let li = document.createElement("li")

                        li.innerHTML = tablePilote[i].last_name
                        //li.value = tablePilote[i].id
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
                            // console.log("drag over") 
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
                } else {
                    getPilotes()
                }
            })
        })

        

    }).catch(function (error) {
        console.error(error)
    })
}

const getPilotes = async function () {

    let req = new Request("../Admin/pilotes_2019.json", myInit)
    try {
        let dataPilotes = await fetch(req)
        if (dataPilotes.ok) {
            let results = await dataPilotes.json()

            let result = document.getElementById("listePilote")
            let tablePilote = results
            // console.log(tablePilote)
            result.innerHTML = ""

            let ul = document.createElement("ul")
            ul.classList.add("container")
            ul.setAttribute("id", "pilotList")
            result.appendChild(ul)

            for (let i = 0; i < tablePilote.length; i++) {
                let li = document.createElement("li")

                li.innerHTML = tablePilote[i].last_name
                li.value = tablePilote[i].id
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
                    // console.log("drag over") 
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

function sendData(select) {
    let button = document.getElementById("boutonPronostic")

    let pilot = document.getElementById("pilotList")
    let pilotli = pilot.getElementsByTagName("li")

    
    button.addEventListener("click", function (e) {
        e.preventDefault()

        let circuit = select.options[select.selectedIndex].value
        let mot = circuit.split(" ")
        let circuitID = mot[0]

        circuit = mot[1]
        circuitID = parseInt(circuitID)

        //console.log(select.selectedIndex)
        let pilotes = document.querySelectorAll(".draggable")
        let pilotesID
        let pilotesSend = []
        let pilotesObjet = []
        let rang = 0

        for (let i = 0; i < pilotes.length; i++) {
            pilotesID = pilotli[i].value
            //console.log(pilotesID)
            pilotesSend[i] = pilotes[i].innerText
            rang++
            pilotesObjet.push({
                Rang: rang,
                Nom: pilotesSend[i],
                piloteID: pilotesID,
                Circuit: circuit,
                circuitID: circuitID
            })
        }
        alert("salut")
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

    getCircuit()
}


window.onload = main