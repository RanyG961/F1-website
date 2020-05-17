const getCircuit = async function () {
    try {
        let dataCircuits = await fetch(
            "https://ergast.com/api/f1/current.json"
        )
        if (dataCircuits.ok) {
            let circuits = await dataCircuits.json()
            // console.log(circuits)

            let circuit = document.getElementById("listeCircuits")
            let liste_Circuits = circuits.MRData.RaceTable
            // console.log(liste_Circuits)
            circuit.innerHTML = ""

            let select = document.createElement("select")
            select.setAttribute("id", "liste")

            circuit.appendChild(select)

            for (let i = 0; i < liste_Circuits.Races.length; i++) {
                let option = document.createElement("option")

                option.innerHTML = liste_Circuits.Races[i].raceName
                option.value = liste_Circuits.Races[i].raceName

                select.appendChild(option)
            }
        } else {
            console.error("Retour du serveur : ", dataCircuits.status)
        }
    } catch (e) {
        console.log(e)
    }
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
                return { offset: offset, element: child }
            } else {
                return closest
            }
        },
        { offset: Number.NEGATIVE_INFINITY }
    ).element
}

function main() 
{
    getCircuit()
    getPilotes()

}

window.onload = main



