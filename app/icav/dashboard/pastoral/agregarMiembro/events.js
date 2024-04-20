AIsi.addEventListener("click", ()=>{
    resAIsino.disabled = false
})
AIno.addEventListener("click", ()=>{
    resAIsino.disabled = true
})
CMsi.addEventListener("click", ()=>{
    resCMsino.disabled = false
})
CMno.addEventListener("click", ()=>{
    resCMsino.disabled = true
})
form.addEventListener("submit", (e)=>{
    e.preventDefault()
    let formdata = new FormData(form)
    formdata.append("op", "insert")
    formdata.append("table", "miembros")
    fetch("./../../../../../api/DB/dbcontroller.php", {
        method: "POST",
        body: formdata
    })
        .then((response)=>response.text())
        .then((data)=>{
            console.log(data)
        })
})