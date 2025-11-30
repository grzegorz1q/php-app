const button = document.getElementById("submit-btn");

function submit() {
    const amount = document.getElementById("pln").value;
    console.log(window.location.href)
    fetch(`../Server?amount=${amount}`)
        .then(r => r.json())
        .then(data => {
            console.log(data);
            if (data.error) {
                document.getElementById("currency-table").innerHTML = data.error;
                return;
            }
            
            document.getElementById("currency-table").innerHTML = `
                <table>
                    <tr><th>Waluta</th><th>Kurs</th><th>Kwota</th></tr>
                    <tr><td>USD</td><td>${data.usdRate}</td><td>${data.usd}</td></tr>
                    <tr><td>EUR</td><td>${data.eurRate}</td><td>${data.eur}</td></tr>
                    <tr><td>CHF</td><td>${data.chfRate}</td><td>${data.chf}</td></tr>
                </table>
            `;
        });
}

button.addEventListener("click", () =>{
    submit();
})