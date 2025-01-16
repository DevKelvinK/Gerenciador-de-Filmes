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
  const isOpen = modal.classList.contains("open");

  const overlay = document.querySelector(".overlay");
  const divBlur = document.querySelectorAll(".modalBlur");
  const divOverFlow = document.querySelector(".modalOverFlow");

  if (isOpen) {
    modal.show();

    divBlur.forEach((div) => {
      div.classList.add("blur-sm");
    });

    divOverFlow.classList.toggle("overflow-hidden");
    overlay.classList.toggle("hidden");
  }

  const focusableElements = "button, [href], textarea";
  let firstFocusableElement;
  let lastFocusableElement;

  

  showBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
      modal.show();

      divBlur.forEach((div) => {
        div.classList.toggle("blur-sm");
      });

      divOverFlow.classList.toggle("overflow-hidden");
      overlay.classList.toggle("hidden");

      // Começar evento de focar apenas elementos do modal
      const focusableContent = modal.querySelectorAll(focusableElements);
      firstFocusableElement = focusableContent[0];
      lastFocusableElement = focusableContent[focusableContent.length - 1];

      document.addEventListener("keydown", trapFocus);

      // Remover foco automatico do primeiro elemento do modal
      document.activeElement.blur();
    });
  });

  closeBtn.addEventListener("click", () => {
    modal.close();

    divBlur.forEach((div) => {
      div.classList.toggle("blur-sm");
    });

    divOverFlow.classList.toggle("overflow-hidden");
    overlay.classList.toggle("hidden");

    // Remover evento para focar apenas elementos do modal
    document.removeEventListener("keydown", trapFocus);
  });

  // Função para focar apenas elementos do modal
  function trapFocus(event) {
    if (event.key === "Tab") {
      if (event.shiftKey) {
        if (document.activeElement === firstFocusableElement) {
          lastFocusableElement.focus();
          event.preventDefault();
        }
      } else {
        if (document.activeElement === lastFocusableElement) {
          firstFocusableElement.focus();
          event.preventDefault();
        }
      }
    }
  }
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
