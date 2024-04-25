let sections = document.querySelectorAll(".section");
let index = sections.length;

for (let section in sections) {
  sections[section].style.zIndex = `${index}`;
  if (index > 0) {
    index-=1;
  }
  if(index == 0){
    break
  }
}

function transicionFormulario(index) {
  let seccion_activa = document.querySelector(".section.active");
  let boton_activo = document.querySelector(".list-sections button.active");
  let boton_activo1 = document.querySelector(".buttonsnum button.active");
  let seccion_seleccionada = document.querySelectorAll(".section")[index - 1];
  let boton_seleccionado = document.querySelectorAll(".list-sections button")[
    index - 1
  ];
  let boton_seleccionado1 = document.querySelectorAll(".buttonsnum button")[
    index - 1
  ];

  let auxIndex = 0;
  seccion_activa.classList.remove("active");
  auxIndex = seccion_activa.style.zIndex;
  boton_activo.classList.remove("active");
  boton_activo1.classList.remove("active");
  seccion_activa.style.zIndex = seccion_seleccionada.style.zIndex;
  seccion_seleccionada.classList.add("active");
  seccion_seleccionada.style.zIndex = auxIndex;
  boton_seleccionado.classList.add("active");
  boton_seleccionado1.classList.add("active");
}
