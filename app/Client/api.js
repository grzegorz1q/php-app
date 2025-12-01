const button = document.getElementById("submit-btn");

function submit() {
    const amount = document.getElementById("pln").value;
    console.log(window.location.href)
    fetch(`../Server?amount=${amount}`)
        .then(r => r.json())
        .then(data => {
            console.log(data);
        });
}

button.addEventListener("click", () =>{
    submit();
})