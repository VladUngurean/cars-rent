function togglePassrwordVisability(inputId, passwordShowIcon, passwordHideIcon) {
    let passInput = document.getElementById(`${inputId}`);
    let passShowIcon = document.getElementById(`${passwordShowIcon}`);
    let passHideIcon = document.getElementById(`${passwordHideIcon}`);
    if (passInput.type === "password") {
        passHideIcon.style.display = "flex"
        passShowIcon.style.display = "none"
        passInput.type = "text";
    } else {
        passHideIcon.style.display = "none"
        passShowIcon.style.display = "flex"
        passInput.type = "password";
    }
  } 