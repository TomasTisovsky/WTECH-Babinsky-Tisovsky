function setAsideButtonFontSize() {
  const aside_buttons = document.querySelectorAll(".aside-buttons button");

  for (let i = 0; i < 1; i++) {
    let cButton = aside_buttons[0];
    const c_width = cButton.clientWidth;
    const c_height = cButton.clientHeight;

    const textSpan = cButton.childNodes[0];
    console.log("------------");
    console.log(textSpan.textContent);
    console.log(`Cwitdth ${c_width} Switdh ${textSpan.offsetWidth}`);

    if (c_width < textSpan.offsetWidth) {
      console.log("Stoooj");
    }

    /*  while (c_width < textSpan.offsetWidth) {
      textSpan.style.fontSize = `${textSpan.style.fontSize - 1}px`;
      console.log(textSpan.style.fontSize);
    } */
  }
}

window.addEventListener("resize", setAsideButtonFontSize);
