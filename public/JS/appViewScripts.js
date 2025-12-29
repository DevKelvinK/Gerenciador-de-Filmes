/* Submit quando avatar de perfil for selecionado*/
function submitFormOnFileSelect() {
  var fileInput = document.getElementById("avatarProfile");
  fileInput.addEventListener("change", function () {
    document.getElementById("formAvatarProfile").submit();
  });
}
window.onload = submitFormOnFileSelect;

/* Abrir e Fechar o modal para avaliar um filme */
function Modal() {
  const modal = document.querySelector("dialog");
  const showBtns = document.querySelectorAll(".showModal");
  const closeBtn = document.querySelector(".closeModal");
  const overlay = document.querySelector(".overlay");
  const divBlur = document.querySelectorAll(".modalBlur");
  const divOverFlow = document.querySelector(".modalOverFlow");

  const focusableElements = 'a[href], button, textarea, input, select, [tabindex]:not([tabindex="-1"])';
  let firstFocusableElement, lastFocusableElement;

  function openModal() {
    modal.showModal();
    divBlur.forEach((div) => div.classList.add("blur-sm"));
    divOverFlow.classList.add("overflow-hidden");
    overlay.classList.remove("hidden");

    const focusableContent = modal.querySelectorAll(focusableElements);
    firstFocusableElement = focusableContent[0];
    lastFocusableElement = focusableContent[focusableContent.length - 1];
    document.addEventListener("keydown", trapFocus);
    document.activeElement.blur();
  }

  function closeModal() {
    modal.close();
    divBlur.forEach((div) => div.classList.remove("blur-sm"));
    divOverFlow.classList.remove("overflow-hidden");
    overlay.classList.add("hidden");
    document.removeEventListener("keydown", trapFocus);
  }

  function trapFocus(event) {
    if (event.key === "Tab") {
      if (event.shiftKey && document.activeElement === firstFocusableElement) {
        lastFocusableElement.focus();
        event.preventDefault();
      } else if (!event.shiftKey && document.activeElement === lastFocusableElement) {
        firstFocusableElement.focus();
        event.preventDefault();
      }
    }
  }

  showBtns.forEach((btn) => btn.addEventListener("click", openModal));
  closeBtn.addEventListener("click", closeModal);

  modal.addEventListener("cancel", (event) => {
    event.preventDefault();
    closeModal();
  });

  modal.addEventListener("close", closeModal);
}
document.addEventListener("DOMContentLoaded", Modal);

/* Selecionar avaliação */
function starRating() {
  const stars = document.querySelectorAll(".star-icon");

  stars.forEach((star) => {
    star.addEventListener("click", () => {
      stars.forEach((s) => {
        s.classList.remove("starActive", "firstStar");
      });

      star.classList.add("starActive");
    });
  });
}
document.addEventListener("DOMContentLoaded", starRating);
