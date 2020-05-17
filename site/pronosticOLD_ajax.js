function main()
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function ()
    {
        if (this.readyState == 4 && this.status == 200)
        {

            let result = document.getElementById("listePilote");
            let results = JSON.parse(xhttp.responseText);

            let tablePilote = results.MRData.DriverTable;
            //console.log(tablePilote)
            result.innerHTML = "";

            let ul = document.createElement("ul");
            ul.classList.add("container");
            result.appendChild(ul);

            for (let i = 0; i < tablePilote.Drivers.length; i++)
            {
                let li = document.createElement("li");

                li.innerHTML = tablePilote.Drivers[i].familyName;

                li.classList.add("draggable");
                li.setAttribute("draggable", "true");

                ul.appendChild(li);
            }




            var draggables = document.querySelectorAll(".draggable");
            //console.log(draggables);

            var containers = document.querySelectorAll(".container");

            draggables.forEach((draggable) =>
            {
                draggable.addEventListener("dragstart", () =>
                {
                    draggable.classList.add("dragging");
                    //console.log("Drag start test");
                });

                draggable.addEventListener("dragend", () =>
                {
                    draggable.classList.remove("dragging");
                });
            });

            containers.forEach((container) =>
            {
                container.addEventListener("dragover", (e) =>
                {
                    /* console.log("drag over") */
                    e.preventDefault();

                    var afterElement = getDragAfterElement(
                        container,
                        e.clientY
                    );
                    var draggable = document.querySelector(".dragging");

                    console.log(afterElement);

                    if (afterElement == null)
                    {
                        container.appendChild(draggable);
                    } else
                    {
                        container.insertBefore(draggable, afterElement);
                    }
                });
            });


        }
    };
    xhttp.open("GET", "https://ergast.com/api/f1/2019/drivers.json", true);
    xhttp.send();
}

function getDragAfterElement(container, y)
{
    var draggableElements = [
        ...container.querySelectorAll(".draggable:not(.dragging)"),
    ];

    return draggableElements.reduce(
        (closest, child) =>
        {
            var box = child.getBoundingClientRect();
            var offset = y - box.top - box.height / 2;
            //console.log(offset)

            if (offset < 0 && offset > closest.offset)
            {
                return {
                    offset: offset,
                    element: child
                };
            } else
            {
                return closest;
            }
        }, {
        offset: Number.NEGATIVE_INFINITY
    }
    ).element;
}

window.onload = main