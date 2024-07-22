var circulos = document.querySelectorAll(".circles")
for(var element of circulos){
    element.style.top = `${((Math.random()*window.innerHeight)+1) - 150}px`
    element.style.left = `${((Math.random()*window.innerWidth)+1) - 150}px`
}