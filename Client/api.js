const button = document.getElementById("submit-btn");
const inputPln = document.getElementById("pln");
const table = document.querySelector("#currency-table table")
const tableBody = table.querySelector("tbody");
const dateParagraph = document.getElementById("date");
const errorMessage = document.getElementById("error-message");

function printError(message){
    errorMessage.textContent = message;
}

function renderTable(data){
    tableBody.innerHTML = "";
    errorMessage.innerHTML = "";
    const rates = data.rates.sort((a, b) => a.value - b.value);

    rates.forEach(rate => {
        const tr = document.createElement("tr");
        tr.innerHTML = `
            <td>${rate.currency}</td>
            <td>${rate.rate}</td>
            <td>${rate.value}</td>`;
        
        tableBody.appendChild(tr);
    });

    dateParagraph.textContent = `Data kursów: ${data.date}`;
    table.classList.remove("hidden");
}

async function submit() {
    const amount = parseFloat(inputPln.value);
    if(!amount || amount <=0){
        printError('Podana wartość musi być liczbą większą od 0');
        table.classList.add("hidden");
        dateParagraph.innerHTML = "";
        return;
    }
    try {
        const response = await fetch(`../Server/index.php?amount=${amount}`);
        const data = await response.json();
        if (!response.ok) {
            const error = data.error;
            throw error;
        }

        renderTable(data);
    }
    catch (error) {
        console.error(error);
    }
}

button.addEventListener("click", submit);